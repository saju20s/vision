<div>
    <section class="product-section">
        <div class="content">
            <div class="container mt-5 pt-4">

                @include('backend.template.header')
                @include('backend.template.sidebar')

                <div class="row justify-content-center">
                    <div class="col-md-7">

                        <div class="card shadow-lg border-0 rounded-4">
                            <div class="card-body p-5">

                                <!-- Header -->
                                <div class="text-center mb-4">
                                    <h2 class="fw-bold text-primary">ICONSOFTBD</h2>
                                    <p class="text-muted">Invoice No: INV-{{ $payment->id }}</p>
                                </div>

                                <!-- Info Section -->
                                <div class="border rounded-3 p-4 mb-4 bg-light">
                                    <h5 class="fw-semibold mb-3 text-secondary">Payment Details</h5>

                                    <div class="row mb-2">
                                        <div class="col-5 text-muted">Payment Method:</div>
                                        <div class="col-7 fw-semibold text-dark text-end">
                                            {{ ucfirst($payment->payment_method) }}
                                        </div>
                                    </div>

                                    <div class="row mb-2">
                                        <div class="col-5 text-muted">Transaction ID:</div>
                                        <div class="col-7 fw-semibold text-dark text-end">
                                            {{ $payment->transaction_id }}
                                        </div>
                                    </div>

                                    <div class="row mb-2">
                                        <div class="col-5 text-muted">Phone:</div>
                                        <div class="col-7 fw-semibold text-dark text-end">
                                            {{ $payment->phone }}
                                        </div>
                                    </div>

                                    <div class="row mb-2">
                                        <div class="col-5 text-muted">Paid For:</div>
                                        <div class="col-7 fw-semibold text-dark text-end">
                                            {{ $payment->paid_for_month }}
                                        </div>
                                    </div>

                                    <div class="row mb-2">
                                        <div class="col-5 text-muted">Status:</div>
                                        <div class="col-7 fw-semibold text-success text-end">
                                            {{ ucfirst($payment->status) }}
                                        </div>
                                    </div>


                                </div>


                                <!-- Amount Box -->
                                <div class="border rounded-3 p-4 bg-white text-center shadow-sm">
                                    <h4 class="fw-bold mb-1">Total Paid</h4>
                                    <h2 class="fw-bold text-primary">৳ {{ number_format($payment->amount, 2) }}</h2>
                                </div>

                                <!-- Footer -->
                                <div class="text-center mt-4">
                                    <button onclick="window.print()" class="btn btn-primary btn-sm">
                                        <i class="fa-solid fa-print"></i> Print Invoice
                                    </button>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>
    <style>
        @media print {
            body * {
                visibility: hidden;
            }

            .card,
            .card * {
                visibility: visible;
            }

            .card {
                position: absolute;
                left: 0;
                top: 0;
                width: 100%;
            }
        }
    </style>

</div>
