<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\Report;
use App\Models\Setting;
use Barryvdh\DomPDF\Facade\Pdf;
use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Writer\PngWriter;
use Endroid\QrCode\Encoding\Encoding;

class ReportDownloadController extends Controller
{
    // All reports download with QR codes
    public function downloadAllReports($billid, $patientid)
    {
        $bill = Bill::with('patient', 'doctor')
            ->where('id', $billid)
            ->where('patient_id', $patientid)
            ->first();

        if (!$bill) abort(404, 'Bill not found');
        if ($bill->due_amount > 0) abort(403, 'বিল ক্লিয়ার হয়নি, রিপোর্ট ডাউনলোড করা যাবে না।');

        $reports = Report::where('bill_id', $billid)
            ->where('patient_id', $patientid)
            ->get();

        if ($reports->isEmpty()) abort(404, 'কোনো রিপোর্ট পাওয়া যায়নি।');

        // Generate QR codes for each report
        $reportsWithQr = $reports->map(function ($report) {
            $qrCode = Builder::create()
                ->writer(new PngWriter())
                ->data(route('qr.report.download', ['reportId' => $report->id]))
                ->encoding(new Encoding('UTF-8'))
                ->size(150)
                ->margin(10)
                ->build();
            $report->qrCodeData = 'data:image/png;base64,' . base64_encode($qrCode->getString());
            return $report;
        });

        $setting = Setting::find(1);

        $pdf = Pdf::loadView('pdf.reports', [
            'bill' => $bill,
            'reports' => $reportsWithQr,
            'setting' => $setting
        ])->setPaper('a4');

        $patientName = str_replace(' ', '_', $bill->patient->name ?? 'Unknown');
        $invoiceNumber = $bill->invoice_number ?? 'N/A';
        $fileName = "{$patientName}_{$invoiceNumber}.pdf";

        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->output();
        }, $fileName, [
            'Content-Type' => 'application/pdf'
        ]);
    }

    // Single report download (called via QR scan)
    public function downloadSingleReport($reportId)
    {
        $report = Report::with('bill.patient', 'bill.doctor')->findOrFail($reportId);

        if ($report->bill->due_amount > 0) abort(403, 'বিল ক্লিয়ার হয়নি, রিপোর্ট ডাউনলোড করা যাবে না।');

        // Generate QR code for this report (optional, can skip if not needed)
        $qrCode = Builder::create()
            ->writer(new PngWriter())
            ->data(route('qr.report.download', ['reportId' => $report->id]))
            ->encoding(new Encoding('UTF-8'))
            ->size(150)
            ->margin(10)
            ->build();
        $report->qrCodeData = 'data:image/png;base64,' . base64_encode($qrCode->getString());

        $setting = Setting::find(1);

        $pdf = Pdf::loadView('pdf.reports', [
            'bill' => $report->bill,
            'reports' => collect([$report]),
            'setting' => $setting
        ])->setPaper('a4');

        $patientName = str_replace(' ', '_', $report->bill->patient->name ?? 'Unknown');
        $invoiceNumber = $report->bill->invoice_number ?? 'N/A';
        $fileName = "{$patientName}_{$invoiceNumber}.pdf";

        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->output();
        }, $fileName, [
            'Content-Type' => 'application/pdf'
        ]);
    }
}
