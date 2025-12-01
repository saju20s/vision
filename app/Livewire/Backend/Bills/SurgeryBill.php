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

class SurgeryBill extends Component
{

    public $patient_id, $investigations = [], $items = [];
    public $status = 'pending';
    public $doctor_id;
    public $marketing_id;
    public $discount = 0;
    public $note;
    public $discount_type = 'amount';
    public $paid_amount = 0, $total_amount = 0, $due_amount = 0;
    public $createdBillId = null;
    public $gross_total = 0;
    public $patientSearch = '';
    public $patientResults = [];
    public $investigationSearch = '';
    public $investigationResults = [];
    public $amount_in_words;
    public $bill;
    public $payment = '';
    public $payment_address = '';
    public $transaction_id = '';
    public $doctorSearch = '';
    public $doctorResults = [];
    public $marketingSearch = '';
    public $marketingResults = [];
    public $selectedPatient;
    public $manual_total = null;
    
    public $editIndex = null;
    public $editName;
    public $editPrice;
    public $editQuantity;
    
    public $newPatient = [
        'name' => '',
        'phone' => '',
        'age' => '',
        'gender' => '',
        'address' => ''
    ];

    protected $rules = [
        'newPatient.name' => 'required|string|max:255',
        'newPatient.phone' => 'required|string|max:20',
        'newPatient.gender' => 'required|string|max:20',
        'newPatient.age' => 'nullable|numeric|min:0',
        'newPatient.address' => 'nullable|string|max:500',      
    ];


    public $newMarketing = [
        'name' => '',
        'phone' => '',
        'age' => '',
        'gender' => '',
        'address' => ''
    ];


    public function saveMarketing()
    {
        try {
            // $validated = $this->validate();

            $date_of_birth = $this->newMarketing['age']
                ? Carbon::create(
                    now()->year - $this->newMarketing['age'],
                    1,
                    1
                )->toDateString()
                : null;


            $marketing = Marketing::create([
                'name'         => $this->newMarketing['name'],
                'phone'        => $this->newMarketing['phone'],
                'date_of_birth' => $date_of_birth,
                'gender'      => $this->newMarketing['gender'],
                'address'      => $this->newMarketing['address'],
            ]);

            // Optional: Select marketing or trigger any event
            $this->selectMarketing($marketing->id);

            // Close modal
            $this->dispatch('close-marketing-modal');

            // Reset form
            $this->reset('newMarketing');

            // Success message
            $this->dispatch('toastr:success', message: 'Marketing added successfully!');
        } catch (ValidationException $e) {
            foreach ($e->validator->getMessageBag()->all() as $message) {
                $this->dispatch('toastr:error', message: $message);
            }
        } catch (\Exception $e) {
            $this->dispatch('toastr:error', message: $e->getMessage());
        }
    }


    public function savePatient()
    {
        try {
            $validated = $this->validate();

            $date_of_birth = $this->newPatient['age']
                ? Carbon::create(
                    now()->year - $this->newPatient['age'],
                    1,
                    1
                )->toDateString()
                : null;

            // Generate unique patient_id
            $yearShort = now()->format('y'); // যেমন: 25
            $lastPatient = Patient::where('patient_id', 'like', "H{$yearShort}-%")
                ->orderBy('patient_id', 'desc')
                ->first();

            if ($lastPatient) {
                $lastSeq = (int)substr($lastPatient->patient_id, 4);
                $newSeq = str_pad($lastSeq + 1, 6, '0', STR_PAD_LEFT);
            } else {
                $newSeq = '000001';
            }

            $patient_id = "H{$yearShort}-{$newSeq}";

            $patient = Patient::create([
                'patient_id'    => $patient_id,
                'name'          => $this->newPatient['name'],
                'phone'         => $this->newPatient['phone'],
                'date_of_birth' => $date_of_birth,
                'gender'        => $this->newPatient['gender'],
                'address'       => $this->newPatient['address'],
            ]);

            // Patient select
            $this->selectPatient($patient->id);

            // Modal close event
            $this->dispatch('close-patient-modal');

            // Reset modal form
            $this->reset('newPatient');

            $this->dispatch('toastr:success', message: 'Patient added successfully!');
        } catch (ValidationException $e) {
            foreach ($e->validator->getMessageBag()->all() as $message) {
                $this->dispatch('toastr:error', message: $message);
            }
        } catch (\Exception $e) {
            $this->dispatch('toastr:error', message: $e->getMessage());
        }
    }


    public function editItem($index)
    {
        $this->editIndex = $index;
        $this->editName = $this->items[$index]['name'];
        $this->editPrice = $this->items[$index]['price'];
        $this->editQuantity = $this->items[$index]['quantity'];
    }


    public function updateItem()
    {
        if ($this->editIndex === null) {
            return;
        }

        $this->items[$this->editIndex]['name'] = $this->editName;
        $this->items[$this->editIndex]['price'] = $this->editPrice;
        $this->items[$this->editIndex]['quantity'] = $this->editQuantity;
        $this->items[$this->editIndex]['subtotal'] = $this->editPrice * $this->editQuantity;

        $this->editIndex = null;
        $this->editName = $this->editPrice = $this->editQuantity = null;

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
        // Only show investigations from 'accessories' or 'surgery_charge'
        $this->investigationResults = Investigation::whereIn('department', ['accessories', 'surgery_charge'])
            ->orderBy('test_name')
            ->limit(30)
            ->get();
    }

    public function searchInvestigation()
    {
        $search = trim($this->investigationSearch);

        if (empty($search)) {
            $this->investigationResults = [];
            return;
        }

        $this->investigationResults = Investigation::whereIn('department', ['accessories', 'surgery_charge'])
            ->where(function ($query) use ($search) {
                $query->where('test_name', 'like', '%' . $search . '%')
                    ->orWhere('sell_price', $search); // exact match
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


    public function loadAllPatients()
    {
        $this->patientResults = Patient::orderBy('name')->limit(30)->get();
    }

    public function searchByPhone()
    {
        $search = trim($this->patientSearch);

        if (empty($search)) {
            $this->patientResults = [];
            $this->dispatch('toastr:error', message: 'Please enter a mobile number or Patient HID.');
            return;
        }

        $patient = Patient::where('patient_id', $search)->first();
        if ($patient) {
            $this->patientResults = collect([$patient]);
            return;
        }

        // Search by phone or name
        $patients = Patient::where('phone', 'like', '%' . $search . '%')
            ->orWhere('name', 'like', '%' . $search . '%')
            ->get();

        if ($patients->isNotEmpty()) {
            $this->patientResults = $patients;
        } else {
            $this->patientResults = [];
            $this->dispatch('toastr:error', message: 'No patient found with this phone, code, or name.');
        }
    }



    public function selectPatient($id)
    {
        $patient = Patient::find($id);
        if ($patient) {
            $this->patient_id = $patient->id;
            $this->patientSearch = $patient->name . ' (' . $patient->phone . ')';
            $this->patientResults = [];
            $this->selectedPatient = $patient;
        }
    }





    public function mount()
    {
        $this->investigations = Investigation::all();
    }

    public function generateInvoiceNumber()
    {
        $year = date('y');
        $prefix = 'DVDC' . $year . '-';

        // latest bill of this year
        $latest = Bill::where('invoice_number', 'like', $prefix . '%')->latest()->first();

        if (!$latest) {
            return $prefix . str_pad(1, 6, '0', STR_PAD_LEFT);
        }

        $lastInvoice = $latest->invoice_number;
        // last 6 digits
        $num = intval(substr($lastInvoice, -6));
        $num++;

        return $prefix . str_pad($num, 6, '0', STR_PAD_LEFT);
    }

    public function addItem($investigationId)
    {
        // Check if item already added
        foreach ($this->items as $item) {
            if ($item['investigation_id'] == $investigationId) {
                $this->dispatch('toastr:error', message: 'This investigation is already added.');
                return; // Stop adding duplicate
            }
        }

        $investigation = Investigation::find($investigationId);
        if ($investigation) {
            $this->items[] = [
                'investigation_id' => $investigation->id,
                'name' => $investigation->test_name,
                'price' => $investigation->sell_price,
                'quantity' => 1,
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
        $this->items = array_values($this->items); // index reset
        $this->calculateTotal();
    }


    public function calculateTotal()
    {
        $totalSubtotal = collect($this->items)->sum('subtotal');

        // Discount calculation
        if ($this->discount_type === 'percentage') {
            $discountValue = intval(round(($totalSubtotal * ((float) $this->discount)) / 100));
        } else {
            $discountValue = intval(round((float) $this->discount));
        }

        $this->gross_total = intval(round($totalSubtotal)); // সবসময় পূর্ণসংখ্যা
        $this->total_amount = max(0, $this->gross_total - $discountValue); // discount বাদ দিয়ে
        $this->due_amount = max(0, $this->total_amount - intval(round($this->paid_amount)));

        // Paid limit check
        if ($this->paid_amount > $this->total_amount) {
            $this->paid_amount = $this->total_amount;
            $this->due_amount = 0;
            $this->dispatch('toastr:error', message: 'Paid amount cannot exceed total amount.');
        }
        $this->amount_in_words = $this->numberToWords($this->total_amount);
    }



    // Real-time check when paid amount changes
    public function updatedPaidAmount()
    {
        if ((float) $this->paid_amount > (float) $this->total_amount) {
            $this->paid_amount = $this->total_amount;
            $this->due_amount = 0;
            $this->dispatch('toastr:error', message: 'Paid amount cannot exceed total amount.');
        }
    }

    public function store()
    {
        try {
            $this->validate([
                'patient_id' => 'required|exists:patients,id',
                'items' => 'required|array|min:1',
                'doctor_id' => 'required|exists:doctors,id',
                'marketing_id' => 'nullable|exists:marketings,id',
                'note' => 'nullable|string|max:255'
            ]);

            if ((float) $this->paid_amount > (float) $this->total_amount) {
                throw new \Exception('Paid amount cannot exceed total amount.');
            }

            $invoiceNumber = $this->generateInvoiceNumber();

            $paymentData = ['method' => $this->payment];
            if ($this->payment === 'banking') {
                $paymentData['payment_address'] = $this->payment_address;
                $paymentData['transaction_id'] = $this->transaction_id;
            }

            $commissionSettings = Setting::first(); // ধরলাম একটাই row আছে
            $commission = json_decode($commissionSettings->commision, true);

            $doctor_commision_type   = $commission['commision_type'] ?? 'percentage';
            $doctor_commision_amount = 0;

            // হিসাব
            if ($doctor_commision_type === 'percentage') {
                $doctor_commision = 0;
            } else {
                $doctor_commision = $doctor_commision_amount;
            }

            $doctor_commision = 0;


            $bdTime = Carbon::now();

            $bill = Bill::create([
                'patient_id' => $this->patient_id,
                'doctor_id' => $this->doctor_id,
                'marketing_id' => $this->marketing_id,
                'invoice_number' => $invoiceNumber,
                'total_amount' => round($this->total_amount),
                'discount' => intval(round($this->discount)),
                'discount_type' => $this->discount_type,
                'paid_amount' => round($this->paid_amount),
                'due_amount' => round($this->due_amount),
                'entry_by' => auth()->user()->name,
                'status' => $this->status,
                'note' => $this->note,
                'payment'        => $paymentData,
                'doctor_commision_type' => $doctor_commision_type,
                'doctor_commision'      => round($doctor_commision),
                'created_at' => $bdTime,
                'updated_at' => $bdTime,
            ]);


            // Bill History Create
            Billhistory::create([
                'bill_id'       => $bill->id,
                'invoice_number' => $bill->invoice_number,
                'patient_id'    => $bill->patient_id,
                'doctor_id'     => $bill->doctor_id,
                'marketing_id'  => $bill->marketing_id,
                'doctor_commision'      => $bill->doctor_commision,
                'doctor_commision_type'      => $bill->doctor_commision_type,
                'discount'      => $bill->discount,
                'discount_type' => $bill->discount_type,
                'total_amount'  => $bill->total_amount,
                'paid_amount'   => $bill->paid_amount,
                'due_amount'    => $bill->due_amount,
                'payment'       => $bill->payment,
                'status'        => $bill->status,
                'entry_by'      => $bill->entry_by,
                'created_at' => $bdTime,
                'updated_at' => $bdTime,
            ]);

            foreach ($this->items as $item) {
                Billitem::create([
                    'bill_id' => $bill->id,
                    'investigation_id' => $item['investigation_id'],
                    'price' => $item['price'],
                    'quantity' => $item['quantity'],
                    'total' => $item['subtotal']
                ]);
            }

            $this->bill = $bill;
            $this->createdBillId = $bill->id;

            $this->dispatch('toastr:success', message: 'Bill Created Successfully. Invoice: ' . $invoiceNumber);
            $this->createdBillId = $bill->id;
            $this->reset([
                'items',
                'discount',
                'discount_type',
                'doctor_id',
                'patient_id',
                'paid_amount',
                'total_amount',
                'due_amount',
                'gross_total',
                'payment',
                'payment_address',
                'transaction_id',
                'marketing_id'
            ]);
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


        return view('livewire.backend.bills.surgery-bill', [
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
