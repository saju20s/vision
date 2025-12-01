<div>
    <section class="product-section">
        <div class="content">
            <div class="container-fluid mt-5 pt-4">
                @include('backend.template.header')
                @include('backend.template.sidebar')

                <div class="row g-4">
                    <div class="table-responsive table-edit">
                        <form wire:submit.prevent="store">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="commision_amount" class="form-label fw-semibold">
                                            Commision Amount (Required)
                                        </label>
                                        <input type="text" id="commision_amount" wire:model.defer="commision_amount"
                                            class="form-control" placeholder="Amount" />
                                    </div>
                                    <div class="mb-3">
                                        <label for="commision_type" class="form-label fw-semibold">
                                            Commision Type (Required)
                                        </label>
                                        <select class="form-control" wire:model.defer="commision_type">
                                            <option value="">--Select Type--</option>
                                            <option value="percentage">Percentage(%)</option>
                                            <option value="amount">Amount(৳)</option>
                                        </select>
                                    </div>
                                </div>

                                @can('commisions.edit')
                                    <button type="submit" class="btn btn-primary form-control w-25 setting-button"
                                        wire:loading.attr="disabled">Save</button>
                                @endcan
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>
</div>
