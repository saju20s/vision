<?php

namespace App\Livewire\Backend\Bills;

use App\Models\Setting;
use Livewire\Component;
use App\Models\Billhistory;
use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Writer\PngWriter;

class BillhistoryInvoice extends Component
{
    public $invoice_number;
    public $bills;      // একাধিক payment row
    public $setting;
    public $amount_in_words;

    public function mount($invoice_number)
    {
        $this->bills = Billhistory::with(['patient', 'doctor', 'marketing', 'items.investigation'])
            ->where('invoice_number', $invoice_number)
            ->get();

        $this->setting = Setting::first();
        $firstBill = $this->bills->first();

        if ($firstBill) {
            $this->amount_in_words = $this->numberToWords($firstBill->total_amount);
        } else {
            $this->amount_in_words = 'Zero Taka Only';
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
        if ($this->bills->first()) {
            $result = Builder::create()
                ->writer(new PngWriter())
                ->data(route('reports.download', [
                    'billid' => $this->bills->first()->id,
                    'patientid' => $this->bills->first()->patient_id
                ]))
                ->size(150)
                ->margin(10)
                ->build();


            $qrCode = base64_encode($result->getString());
        }

        return view('livewire.backend.bills.billhistory-invoice', [
            'bills' => $this->bills,
            'settings' => $this->setting,
            'qrCode' => $qrCode,
            'amount_in_words' => $this->amount_in_words,
        ])->layout('backend.template.body');
    }
}
