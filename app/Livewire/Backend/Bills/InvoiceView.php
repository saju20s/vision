<?php

namespace App\Livewire\Backend\Bills;

use App\Models\Bill;
use App\Models\Setting;
use Livewire\Component;
use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Writer\PngWriter;

class InvoiceView extends Component
{
    public $billId;
    public $bill;
    public $gross_total;
    public $payment_method;
    public $payment_address;
    public $transaction_id;
    public $amount_in_words;


    public function mount($billId)
    {
        $this->billId = $billId;
        $this->bill = Bill::with('patient', 'items.investigation', 'doctor', 'marketing')->findOrFail($billId);

        // Gross total
        $this->gross_total = $this->bill->items->sum(function ($item) {
            return $item->price * $item->quantity;
        });

        // Payment info init
        $this->payment_method = 'cash';  // default
        $this->payment_address = null;
        $this->transaction_id = null;

        if (!empty($this->bill->payment)) {   // <-- here use $this->bill->payment
            $transaction = $this->bill->payment; // already casted as array
            if (isset($transaction['method'])) {
                $this->payment_method = strtolower(trim($transaction['method'])); // banking or cash
                if ($this->payment_method === 'banking') {
                    $this->payment_address = $transaction['payment_address'] ?? null;
                    $this->transaction_id = $transaction['transaction_id'] ?? null;
                }
            }
        }
        $this->amount_in_words = $this->numberToWords($this->bill->total_amount);
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

        if ($this->bill->first()) {
            $generator = new \Picqer\Barcode\BarcodeGeneratorPNG();
            $barcode = base64_encode(
                $generator->getBarcode($this->bill->first()->invoice_number, $generator::TYPE_CODE_128)
            );
        }

        $settings = Setting::find(1);

        return view('livewire.backend.bills.invoice-view', [
            'bill' => $this->bill,
            'qrCode' => $qrCode,
            'barcode' => $barcode,
            'settings' => $settings,
            'amount_in_words' => $this->amount_in_words,
        ])->layout('backend.template.body');
    }
}
