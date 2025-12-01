<?php

namespace App\Livewire\Backend\Bills;

use Carbon\Carbon;
use App\Models\Bill;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Setting;
use Livewire\Component;
use App\Models\Billitem;
use App\Models\Marketing;
use App\Models\Billhistory;
use App\Models\Investigation;
use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Writer\PngWriter;
use Illuminate\Validation\ValidationException;

class EditBill extends Component
{
    public $bill_id;
    public $patient_id, $investigations = [], $items = [];
    public $status = 'pending';
    public $doctor_id;
    public $marketing_id;
    public $discount = 0;
    public $discount_type = 'amount';
    public $vat = 0;
    public $vat_type = 'percentage';
    public $paid_amount = 0, $total_amount = 0, $due_amount = 0;
    public $gross_total = 0;
    public $patientSearch = '';
    public $patientResults = [];
    public $investigationSearch = '';
    public $investigationResults = [];
    public $amount_in_words;
    public $bill;
    public $note;
    public $labtolab;
    public $payment = '';
    public $payment_address = '';
    public $transaction_id = '';
    public $doctorSearch = '';
    public $doctorResults = [];
    public $marketingSearch = '';
    public $marketingResults = [];
    public $selectedPatient;
    public $paidError = '';
    public $vat_amount = 0;
    public $delivery_date;

    public function validatePaidAmount()
    {
        if ($this->paid_amount < 0) {
            $this->paidError = 'Paid amount cannot be less than 0';
            $this->paid_amount = 0;
        } else {
            $this->paidError = '';
        }

        $this->calculateTotal();
    }


    public function mount($bill_id)
    {
        $this->bill_id = $bill_id;
        $this->bill = Bill::with('items', 'patient', 'doctor', 'marketing')->findOrFail($bill_id);

        $this->patient_id = $this->bill->patient_id;
        $this->doctor_id = $this->bill->doctor_id;
        $this->marketing_id = $this->bill->marketing_id;
        $this->discount = $this->bill->discount;
        $this->discount_type = $this->bill->discount_type;
        $this->vat = $this->bill->vat;
        $this->vat_type = $this->bill->vat_type;
        $this->paid_amount = $this->bill->paid_amount;
        $this->total_amount = $this->bill->total_amount;
        $this->due_amount = $this->bill->due_amount;
        $this->status = $this->bill->status;
        $this->delivery_date = $this->bill->delivery_date;
        $this->note = $this->bill->note;
        $this->labtolab = $this->bill->labtolab;
        $this->payment = $this->bill->payment['method'] ?? '';
        $this->payment_address = $this->bill->payment['payment_address'] ?? '';
        $this->transaction_id = $this->bill->payment['transaction_id'] ?? '';

        if ($this->bill->patient) {
            $this->selectedPatient = $this->bill->patient;
            $this->patientSearch = $this->bill->patient->name . ' (' . $this->bill->patient->phone . ')';
        }

        if ($this->bill->doctor) {
            $this->doctorSearch = $this->bill->doctor->name . ' (ID: ' . $this->bill->doctor->id . ')';
        }

        if ($this->bill->marketing) {
            $this->marketingSearch = $this->bill->marketing->name . ' (ID: ' . $this->bill->marketing->id . ')';
        }

        $this->items = $this->bill->items->map(function ($item) {
            return [
                'investigation_id' => $item->investigation_id,
                'name' => $item->investigation->test_name ?? '',
                'price' => $item->price,
                'quantity' => $item->quantity,
                'discount' => $item->discount ?? 0, // <-- add this
                'discount_type' => $item->discount_type ?? 'amount', // <-- add this
                'subtotal' => $item->total,
            ];
        })->toArray();

        $this->calculateTotal();
    }


    public function loadAllMarketings()
    {
        $this->marketingResults = Marketing::where('is_active', true)
            ->orderBy('name')
            ->limit(10)
            ->get();
    }

    public function searchMarketing()
    {
        $search = trim($this->marketingSearch);
        if (empty($search)) {
            $this->loadAllMarketings();
            return;
        }
        $this->marketingResults = Marketing::where('is_active', true)
            ->where('name', 'like', '%' . $search . '%')
            ->orderBy('name')
            ->limit(20)
            ->get();
    }

    public function selectMarketing($id)
    {
        $marketing = Marketing::find($id);
        if ($marketing) {
            $this->marketing_id = $marketing->id;
            $this->marketingSearch = $marketing->name . ' (ID: ' . $marketing->id . ')';
            $this->marketingResults = [];
        }
    }

    public function loadAllDoctors()
    {
        $this->doctorResults = Doctor::where('is_active', true)
            ->orderBy('name')
            ->limit(10)
            ->get();
    }

    public function searchDoctor()
    {
        $search = trim($this->doctorSearch);
        if (empty($search)) {
            $this->loadAllDoctors();
            return;
        }
        $this->doctorResults = Doctor::where('is_active', true)
            ->where('name', 'like', '%' . $search . '%')
            ->orderBy('name')
            ->limit(20)
            ->get();
    }

    public function selectDoctor($id)
    {
        $doctor = Doctor::find($id);
        if ($doctor) {
            $this->doctor_id = $doctor->id;
            $this->doctorSearch = $doctor->name . ' (ID: ' . $doctor->id . ')';
            $this->doctorResults = [];
        }
    }

    public function loadAllInvestigations()
    {
        $this->investigationResults = Investigation::orderBy('test_name')->limit(30)->get();
    }

    public function searchInvestigation()
    {
        $search = trim($this->investigationSearch);
        if (empty($search)) {
            $this->investigationResults = [];
            return;
        }
        $this->investigationResults = Investigation::where('test_name', 'like', '%' . $search . '%')
            ->orWhere(function ($query) use ($search) {
                $query->where('sell_price', $search);
            })
            ->limit(30)
            ->get();
    }

    public function selectInvestigation($id)
    {
        $investigation = Investigation::find($id);
        if ($investigation) {
            $this->addItem($investigation->id);
            $this->investigationSearch = '';
            $this->investigationResults = [];
        }
    }

    public function addItem($investigationId)
    {
        foreach ($this->items as $item) {
            if ($item['investigation_id'] == $investigationId) {
                $this->dispatch('toastr:error', message: 'This investigation is already added.');
                return;
            }
        }

        $investigation = Investigation::find($investigationId);
        if ($investigation) {
            $this->items[] = [
                'investigation_id' => $investigation->id,
                'name' => $investigation->test_name,
                'price' => $investigation->sell_price,
                'quantity' => 1,
                'discount' => 0,
                'discount_type' => 'amount',
                'subtotal' => $investigation->sell_price
            ];
            $this->calculateTotal();
            $this->dispatch('toastr:success', message: 'Test added: ' . $investigation->test_name);
        }
    }

    public function updateQty($index, $qty)
    {
        $qty = max(1, (int) $qty);
        $this->items[$index]['quantity'] = $qty;
        $this->items[$index]['subtotal'] = $this->items[$index]['price'] * $qty;
        $this->calculateTotal();
    }

    public function removeItem($index)
    {
        unset($this->items[$index]);
        $this->items = array_values($this->items);
        $this->calculateTotal();
    }

    public function calculateTotal()
    {
        $totalSubtotal = collect($this->items)->sum('subtotal');

        $vatDepartments = ['laboratory', 'cardiology', 'ultrasonography', 'radiology', 'ultrasonography'];
        $vatAmount = 0;

        foreach ($this->items as $item) {
            $investigation = Investigation::find($item['investigation_id']);

            if ($investigation && in_array($investigation->department, $vatDepartments)) {

                if ($this->vat_type === 'percentage') {
                    $vatAmount += ($item['subtotal'] * ($this->vat / 100));
                } else {
                    $vatAmount = $this->vat;
                }
            }
        }

        $this->vat_amount = $vatAmount;

        // Discount calculation
        if ($this->discount_type === 'percentage') {
            $discountValue = intval(round(($totalSubtotal * ((float) $this->discount)) / 100));
        } else {
            $discountValue = intval(round((float) $this->discount));
        }

        // GROSS TOTAL = subtotal
        $this->gross_total = intval(round($totalSubtotal));

        // FINAL TOTAL = subtotal - discount + VAT
        $this->total_amount = max(0, ($this->gross_total - $discountValue) + $vatAmount);

        // Due calculation
        $this->due_amount = max(0, $this->total_amount - intval(round($this->paid_amount)));

        // Paid limit check
        if ($this->paid_amount > $this->total_amount) {
            $this->paid_amount = $this->total_amount;
            $this->due_amount = 0;
            $this->dispatch('toastr:error', message: 'Paid amount cannot exceed total amount.');
        }

        $this->amount_in_words = $this->numberToWords($this->total_amount);
    }

    public function updatedPaidAmount()
    {
        if ((float)$this->paid_amount > (float)$this->total_amount) {
            $this->paid_amount = $this->total_amount;
            $this->due_amount = 0;
            $this->dispatch('toastr:error', message: 'Paid amount cannot exceed total amount.');
        }
    }

    public function updateBill()
    {
        try {
            $this->validate([
                'patient_id' => 'required|exists:patients,id',
                'items' => 'required|array|min:1',
                'doctor_id' => 'nullable|exists:doctors,id',
                'marketing_id' => 'nullable|exists:marketings,id',
                'note' => 'nullable|string|max:255',
                'paid_amount' => 'required|numeric|min:0|max:' . $this->total_amount,
            ]);

            $bill = Bill::findOrFail($this->bill_id);
            $old_paid_amount = $bill->paid_amount;

            $bill->update([
                'patient_id' => $this->patient_id,
                'doctor_id' => $this->doctor_id,
                'marketing_id' => $this->marketing_id,
                'total_amount' => round($this->total_amount),
                'discount' => intval(round($this->discount)),
                'discount_type' => $this->discount_type,
                'vat' => intval(round($this->vat)),
                'vat_type' => $this->vat_type,
                'paid_amount' => round($this->paid_amount),
                'due_amount' => round($this->due_amount),
                'status' => $this->status,
                'delivery_date' => $this->delivery_date,
                'note' => $this->note,
                'labtolab' => $this->labtolab,
                'payment' => [
                    'method' => $this->payment,
                    'payment_address' => $this->payment_address,
                    'transaction_id' => $this->transaction_id,
                ],
                'updated_at' => Carbon::now(),
            ]);

            Billitem::where('bill_id', $bill->id)->delete();
            foreach ($this->items as $item) {
                $discountAmount = ($item['price'] * $item['quantity']) * ($item['discount'] / 100);
                Billitem::create([
                    'bill_id' => $bill->id,
                    'investigation_id' => $item['investigation_id'],
                    'price' => $item['price'],
                    'quantity' => $item['quantity'],
                    'discount' => $item['discount'],
                    'discount_amount' => round($discountAmount),
                    'total' => round($item['subtotal']),
                ]);
            }

            $new_paid_amount = round($this->paid_amount);
            $diff_amount = $new_paid_amount - $old_paid_amount;

            Billhistory::create([
                'bill_id' => $bill->id,
                'invoice_number' => $bill->invoice_number,
                'patient_id' => $bill->patient_id,
                'doctor_id' => $bill->doctor_id,
                'marketing_id' => $bill->marketing_id,
                'discount' => $bill->discount,
                'discount_type' => $bill->discount_type,
                'vat'           => $bill->vat,
                'vat_type'      => $bill->vat_type,
                'total_amount' => $bill->total_amount,
                'paid_amount' => $diff_amount,
                'due_amount' => $bill->due_amount,
                'payment' => $bill->payment,
                'status' => $bill->status,
                'entry_by' => auth()->user()->name,
                'doctor_commision' => $bill->doctor_commision ?? 0,
            ]);

            $this->bill = Bill::with('items', 'patient', 'doctor', 'marketing')
                ->find($this->bill_id);

            $this->calculateTotal();


            $this->dispatch('toastr:success', message: 'Bill Updated Successfully.');
        } catch (ValidationException $e) {
            foreach ($e->validator->getMessageBag()->all() as $message) {
                $this->dispatch('toastr:error', message: $message);
            }
        } catch (\Exception $e) {
            $this->dispatch('toastr:error', message: $e->getMessage());
        }
    }

    private function numberToWords($number)
    {
        // same numberToWords function from AddBill
        $no = floor($number);
        $point = round($number - $no, 2) * 100;
        $hundred = null;
        $digits_1 = strlen($no);
        $i = 0;
        $str = [];
        $words = [
            0 => '',
            1 => 'One',
            2 => 'Two',
            3 => 'Three',
            4 => 'Four',
            5 => 'Five',
            6 => 'Six',
            7 => 'Seven',
            8 => 'Eight',
            9 => 'Nine',
            10 => 'Ten',
            11 => 'Eleven',
            12 => 'Twelve',
            13 => 'Thirteen',
            14 => 'Fourteen',
            15 => 'Fifteen',
            16 => 'Sixteen',
            17 => 'Seventeen',
            18 => 'Eighteen',
            19 => 'Nineteen',
            20 => 'Twenty',
            30 => 'Thirty',
            40 => 'Forty',
            50 => 'Fifty',
            60 => 'Sixty',
            70 => 'Seventy',
            80 => 'Eighty',
            90 => 'Ninety'
        ];
        $digits = ['', 'Hundred', 'Thousand', 'Lakh', 'Crore'];
        while ($i < $digits_1) {
            $divider = ($i == 2) ? 10 : 100;
            $number = floor($no % $divider);
            $no = floor($no / $divider);
            $i += ($divider == 10) ? 1 : 2;
            if ($number) {
                $plural = (count($str) && $number > 9) ? '' : null;
                $hundred = (count($str) == 1 && $str[0]) ? ' and ' : null;
                if ($number < 21) {
                    $str[] = $words[$number] . " " . $digits[count($str)] . $plural . " " . $hundred;
                } else {
                    $str[] = $words[floor($number / 10) * 10] . " " . $words[$number % 10] . " " . $digits[count($str)] . $plural . " " . $hundred;
                }
            } else {
                $str[] = null;
            }
        }
        $str = array_reverse($str);
        $result = implode('', $str);
        $points = ($point) ? " Point " . $words[$point / 10] . " " . $words[$point = $point % 10] : '';
        return trim($result) . " Taka Only" . $points;
    }

    public function render()
    {
        $qrCode = null;
        if ($this->bill) {
            $result = Builder::create()
                ->writer(new PngWriter())
                ->data(route('reports.download', [
                    'billid' => $this->bill->id,
                    'patientid' => $this->bill->patient_id
                ]))
                ->size(150)
                ->margin(10)
                ->build();
            $qrCode = base64_encode($result->getString());
        }

        $barcode = null;
        if ($this->bill) {
            $generator = new \Picqer\Barcode\BarcodeGeneratorPNG();
            $barcode = base64_encode(
                $generator->getBarcode($this->bill->invoice_number, $generator::TYPE_CODE_128)
            );
        }

        $patients = Patient::all();
        $doctors = Doctor::where('is_active', true)->get();
        $marketings = Marketing::where('is_active', true)->get();
        $settings = Setting::find(1);

        return view('livewire.backend.bills.edit-bill', [
            'patients' => $patients,
            'doctors' => $doctors,
            'bill' => $this->bill,
            'qrCode' => $qrCode,
            'barcode' => $barcode,
            'settings' => $settings,
            'marketings' => $marketings,
        ])->layout('backend.template.body');
    }
}
