<?php

namespace App\Livewire\Backend\Delivery;

use Livewire\Component;
use App\Models\Report;
use App\Models\Setting;
use Picqer\Barcode\BarcodeGeneratorPNG;
use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\Writer\PngWriter;

class PrintReport extends Component
{
    public $report;
    public $testForm = [];
    public $barcode;
    public $qrCodeData;

    public function mount($report)
    {
        $this->report = Report::with(['patient', 'investigation', 'bill.doctor'])->findOrFail($report);

        $this->testForm = $this->report->test_form ?? [];

        // Existing Barcode
        if ($this->report->bill && $this->report->bill->invoice_number) {
            $generator = new BarcodeGeneratorPNG();
            $this->barcode = base64_encode(
                $generator->getBarcode($this->report->bill->invoice_number, $generator::TYPE_CODE_128)
            );
        }

        // Single Report QR Code (scan করলে PDF download)
        $qrCode = Builder::create()
            ->writer(new PngWriter())
            ->data(route('qr.report.download', ['reportId' => $this->report->id]))
            ->encoding(new Encoding('UTF-8'))
            ->size(150)
            ->margin(10)
            ->build();

        $this->qrCodeData = 'data:image/png;base64,' . base64_encode($qrCode->getString());
    }

    public function render()
    {
        $setting = Setting::find(1);
        return view('livewire.backend.delivery.print-report', compact('setting'))
            ->layout('backend.template.body');
    }
}
