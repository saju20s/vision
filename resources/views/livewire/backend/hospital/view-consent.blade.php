<div class="product-section">
    <div class="content">
        <div class="container-fluid mt-5 pt-4">
            @include('backend.template.header')
            @include('backend.template.sidebar')

            <div class="row g-4">
                <div class="col-12">
                    <div class="card consent-card p-5 shadow-lg">

                        <!-- Header Section -->
                        <div class="text-center pb-3 mb-3 position-relative">
                            <img src="{{ asset('backend/images/qr.png') }}" alt="Hospital Logo" height="50"
                                class="mb-2 consent-img">
                            <h3 class="text-muted mb-0" style="font-size:16px;">{!! str_replace(',,', '<br>', e($setting->address)) !!}</h3>
                            <h5 class="mt-3 fw-bold text-uppercase text-decoration-underline">Admission & Consent Form
                            </h5>
                            <button class="btn btn-primary btn-sm" onclick="printInvoice()">
                                <i class="fa-solid fa-print"></i> Print
                            </button>
                        </div>

                        <!-- Patient Info Table -->
                        <table class="table table-bordered form-table mb-4">
                            <tbody>
                                <tr>
                                    <td><strong>Reg. No:</strong> {{ $consent->admission_id ?? '' }}</td>
                                    <td><strong>Bed:</strong>
                                        {{ $consent->bed_category ?? '' }}({{ $consent->floor_no ?? '' }} -
                                        {{ $consent->room_no ?? '' }} ) <strong></td>
                                </tr>
                                <tr>
                                    <td><strong>Name:</strong> {{ $consent->patient_name ?? '' }}</td>
                                    <td><strong>Age:</strong> {{ $consent->age ?? '' }} Years &nbsp; | &nbsp;
                                        <strong>Sex:</strong> {{ $consent->gender ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2"><strong>Guardian Name:</strong>
                                        {{ $consent->guardian_name ?? '' }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Religion:</strong> {{ $consent->religion ?? '' }}</td>
                                    <td><strong>Marital Status:</strong> {{ $consent->marrital_status ?? '' }}</td>
                                </tr>
                                <tr>
                                    <td colspan="2"><strong>Address:</strong> {{ $consent->address ?? '' }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Date of Admission:</strong>
                                        {{ $consent->created_at ? $consent->created_at->format('Y-m-d') : '' }}</td>
                                    <td><strong>Time:</strong>
                                        {{ $consent->created_at ? $consent->created_at->format('h:i:s A') : '' }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Date of Discharge:</strong> {{ $consent->discharge_date ?? '' }}</td>
                                    <td><strong>Time:</strong> ................................................</td>
                                </tr>
                                <tr>
                                    <td colspan="2"><strong>Admitted Under:</strong>
                                        {{ $consent->admitted_under_doctor ?? '' }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Reference Name:</strong> {{ $consent->reference_by ?? '' }}</td>
                                </tr>
                                <tr>
                                    <td colspan="2"><strong>Diagnosis:</strong>
                                        {{ $consent->operation_diagnosis ?? '' }}</td>
                                </tr>
                            </tbody>
                        </table>

                        <!-- Consent Section -->
                        <div class="consent-text mt-4">
                            <p class="fw-bold mb-2 text-decoration-underline">অ্যানেস্থেসিয়া ও অস্ত্রোপচার করার
                                সম্মতিপত্র</p>
                            <div class="border rounded-3 p-3"
                                style="font-size:15px; line-height:1.6; background:#fafafa;">
                                আমি আমার রোগীকে অ্যানেস্থেসিয়া/অজ্ঞান করাইয়া অস্ত্রোপচার করাইতে সুস্থ মস্তিষ্কে রাজি
                                আছি।
                                ইহাতে কোন প্রকার অসুবিধা হইলে অথবা দুর্ঘটনা ঘটিলে ডাক্তার এবং হাসপাতাল কর্তৃপক্ষ দায়ী
                                থাকিবে না।
                            </div>
                        </div>

                        <!-- Signature Section -->
                        <div class="d-flex justify-content-between mt-5 pt-4 border-top">
                            <div>
                                <p class="mb-2"><strong>Signature of Guardian:</strong>
                                    ..............................................................</p>
                                <p class="mb-0"><strong>Mobile:</strong> {{ $consent->phone ?? '' }}</p>
                            </div>
                            <div class="text-start">
                                <p class="mb-2"><strong>Admission Clerk:</strong>
                                    ..............................................................</p>
                                <p class="text-muted small mb-0">Authorized Signature</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>

    <style>
        @media print {
            @page {
                size: A4 portrait;
                margin: 20mm;
            }

            body * {
                visibility: hidden;
            }

            .consent-img {
                position: absolute;
                top: -15px;
                left: 120px;
                width: 50px;
            }

            .consent-card,
            .consent-card * {
                visibility: visible;
            }

            .consent-card {
                position: absolute;
                left: 0;
                top: 0;
                width: 100%;
            }

            .btn,
            .btn * {
                display: none !important;
            }
        }
    </style>

</div>


<script>
    function printInvoice() {
        window.print();
    }
</script>
