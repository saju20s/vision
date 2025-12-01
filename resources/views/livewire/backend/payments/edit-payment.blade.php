<div>
    <section class="product-section">
        <div class="content">
            <div class="container-fluid mt-5 pt-4">
                @include('backend.template.header')
                @include('backend.template.sidebar')

                <div class="row g-4">
                    <div class="table-responsive table-edit">

                        <form wire:submit.prevent="updatePayment">

                            <h4 class="fw-bold mb-4">Edit Payment</h4>

                            <!-- Payment Method -->
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Payment Method</label>
                                <select wire:model="payment_method" class="form-select rounded-3 border-primary">
                                    <option value="bkash">bKash</option>
                                </select>
                            </div>

                            <!-- Phone -->
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Phone Number</label>
                                <input wire:model="phone" type="text" class="form-control rounded-3"
                                    placeholder="017xxxxxxxx">
                            </div>

                            <!-- TrxID -->
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Transaction ID</label>
                                <input wire:model="transaction_id" type="text" class="form-control rounded-3"
                                    placeholder="A9CD45KLMN">
                            </div>

                            <!-- Amount -->
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Amount (৳)</label>
                                <input wire:model="amount" type="number" class="form-control rounded-3" readonly>
                            </div>

                            <!-- Date -->
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Date</label>
                                <input wire:model="date" type="date" class="form-control rounded-3">
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-semibold">Payment Method</label>
                                <select wire:model="status" class="form-select rounded-3 border-primary">
                                    <option value="pending">Pending</option>
                                    <option value="approved">Approved</option>
                                    <option value="rejected">Rejected</option>
                                </select>
                            </div>


                            <button class="btn btn-primary px-4 py-2 rounded-3">
                                Update Payment
                            </button>

                        </form>

                    </div>
                </div>

            </div>
        </div>
    </section>
</div>
