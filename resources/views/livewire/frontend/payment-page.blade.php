<div class="container my-5">
    <div class="card shadow-lg border-0 rounded-4 overflow-hidden p-0" style="background:#FDF2F7;">
        <div class="row g-0">

            <!-- Left: Instructions -->
            <div class="col-lg-6 text-white p-4 p-lg-5" style="background: linear-gradient(135deg, #E2136E, #C51163);">

                <div class="d-flex align-items-center mb-4">
                    <div class="me-3 bg-white bg-opacity-25 p-3 rounded-3">
                        <svg width="40" height="40" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 2L20 6V18L12 22L4 18V6L12 2Z" stroke="white" stroke-width="1.5"
                                stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </div>
                    <div>
                        <h2 class="h4 fw-bold mb-1">bKash Send Money</h2>
                        <p class="small opacity-75 mb-0">অতি সহজ ভাবে মাসিক 1000৳ পাঠান</p>
                    </div>
                </div>

                <div class="bg-white bg-opacity-20 rounded-3 p-3 mb-4 border border-white border-opacity-25">
                    <p class="small mb-1">Send Money To:</p>
                    <p class="h4 fw-bold mb-1">01601153971</p>
                    <p class="small opacity-75 mb-0">TrxID জমা দিন।</p>
                </div>

                <ol class="ps-3 small mb-4">
                    <li>bKash App → Send Money</li>
                    <li>Recipient: <strong>01601153971</strong></li>
                    <li>Amount: <strong>1000৳</strong></li>
                    <li>Reference: আপনার নাম</li>
                    <li>Send করুন → TrxID</li>
                </ol>
            </div>

            <!-- Right: Payment Form -->
            <div class="col-lg-6 p-4 p-lg-5 bg-white">

                <h3 class="h4 fw-bold mb-4 text-dark">Payment Submit করুন</h3>

                @if (session('error'))
                    <div class="alert alert-danger rounded-3 shadow-sm">{{ session('error') }}</div>
                @endif
                @if (session('success'))
                    <div class="alert alert-success rounded-3 shadow-sm">{{ session('success') }}</div>
                @endif

                <form wire:submit.prevent="payNow">

                    <!-- Payment Method -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Payment Method</label>
                        <select wire:model="payment_method" class="form-select rounded-3 border-primary">
                            <option value="bkash">bKash</option>
                        </select>
                        @error('payment_method')
                            <span class="text-danger small">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- TrxID -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Phone Number</label>
                        <input wire:model="phone" type="text" class="form-control rounded-3"
                            placeholder="e.g. 017xxxxxxxx">
                        @error('phone')
                            <span class="text-danger small">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Transaction ID (TrxID)</label>
                        <input wire:model="transaction_id" type="text" class="form-control rounded-3"
                            placeholder="e.g. A9CD45KLMN">
                        @error('transaction_id')
                            <span class="text-danger small">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Amount -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Amount (৳)</label>
                        <input wire:model="amount" type="number" class="form-control rounded-3" readonly>
                        @error('amount')
                            <span class="text-danger small">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Footer -->
                    <div class="d-flex flex-column flex-sm-row justify-content-between align-items-center gap-2 mt-4">

                        <div class="small text-muted">
                            সহায়তার জন্য:
                            <a href="tel:01601153971" class="text-primary fw-semibold">01601153971</a>
                        </div>

                        <button type="submit" class="btn text-white px-4 py-2 rounded-3" style="background:#E2136E;">
                            Submit Payment
                        </button>
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>
