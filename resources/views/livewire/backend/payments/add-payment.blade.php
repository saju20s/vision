<div>


    <section class="product-section">
        <div class="content">
            <div class="container-fluid mt-5 pt-4">
                @include('backend.template.header')
                @include('backend.template.sidebar')

                <div class="row g-4">
                    <div class="table-responsive table-edit">
                        <form wire:submit.prevent="payNow">

                            <!-- Payment Method -->
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Payment Method</label>
                                <select wire:model="payment_method" class="form-select rounded-3 border-primary">
                                    <option value="bkash">bKash</option>
                                </select>                               
                            </div>

                            <!-- TrxID -->
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Phone Number</label>
                                <input wire:model="phone" type="text" class="form-control rounded-3"
                                    placeholder="e.g. 017xxxxxxxx">                              
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Transaction ID (TrxID)</label>
                                <input wire:model="transaction_id" type="text" class="form-control rounded-3"
                                    placeholder="e.g. A9CD45KLMN">                               
                            </div>

                            <!-- Amount -->
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Amount (৳)</label>
                                <input wire:model="amount" type="number" class="form-control rounded-3" readonly>                                
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-semibold">Date</label>
                                <input wire:model="date" type="date" class="form-control rounded-3">                                
                            </div>

                            <!-- Footer -->
                            <div
                                class="d-flex flex-column flex-sm-row justify-content-between align-items-center gap-2 mt-4">                               

                                <button type="submit" class="btn btn-primary px-4 py-2 rounded-3">
                                    Submit Payment
                                </button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>



</div>
