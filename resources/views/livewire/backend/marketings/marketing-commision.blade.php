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
                                {{-- Left Column --}}
                                <div class="col-lg-12 col-md-12 mb-3">
                                    <div class="mb-3 position-relative">
                                        <div class="input-group">
                                            <input type="text" wire:model.defer="invoice_number" class="form-control"
                                                placeholder="Invoice Number" />

                                            <button type="button" class="btn btn-primary"
                                                wire:click="searchInvoice">Search</button>
                                        </div>
                                    </div>


                                    @if ($bill && $bill->marketing)
                                        <div class="alert alert-info">
                                            <strong>Marketing Info:</strong><br>
                                            Name: {{ $bill->marketing->name }}({{ $bill->marketing->id }}) <br>
                                            Phone: {{ $bill->marketing->phone }}
                                        </div>
                                    @endif


                                    <div class="mb-3">
                                        <label for="commision_amount" class="form-label fw-semibold">Commision Amount
                                            (Required)</label>
                                        <input type="text" id="commision_amount" wire:model.defer="commision_amount"
                                            class="form-control" placeholder="Amount" />
                                    </div>

                                    <div class="mb-3">
                                        <label for="commision_type" class="form-label fw-semibold">Commision
                                            Type
                                            (Required)</label>
                                        <select class="form-control" wire:model.defer="commision_type">
                                            <option value="">--Select Type--</option>
                                            <option value="percentage">Percentage(%)</option>
                                            <option value="amount">Amount(৳)</option>
                                        </select>
                                    </div>

                                    @can('commisions.edit')
                                        <button type="submit" class="btn btn-primary form-control my-2"
                                            wire:loading.attr="disabled">Add Commision</button>
                                    @endcan



                                </div>


                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>

</div>
