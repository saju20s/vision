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
                                <div class="col-lg-9 col-md-8 mb-3">
                                    <div class="mb-3">
                                        <label for="name" class="form-label fw-semibold">Expense Name</label>
                                        <input type="text" id="name" wire:model.defer="name"
                                            class="form-control" placeholder="Enter Expense Name" />
                                    </div>

                                    <div class="mb-3">
                                        <label for="expense_category_id" class="form-label fw-semibold">Category</label>
                                        <select id="expense_category_id" wire:model.defer="expense_category_id"
                                            class="form-control">
                                            <option value="">-- Select Category --</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="amount" class="form-label fw-semibold">Amount</label>
                                        <input type="number" id="amount" wire:model.defer="amount"
                                            class="form-control" step="0.01" placeholder="Enter Amount" />
                                    </div>
                                </div>

                                {{-- Right Column --}}
                                <div class="col-lg-3 col-md-4 mb-3">
                                    <div class="mb-3">
                                        <label for="date" class="form-label fw-semibold">Date</label>
                                        <input type="date" id="date" wire:model.defer="date"
                                            class="form-control" />
                                    </div>

                                    <div class="mb-3">
                                        <label for="note" class="form-label fw-semibold">Note</label>
                                        <textarea id="note" wire:model.defer="note" class="form-control" rows="3"
                                            placeholder="Enter Note (optional)"></textarea>
                                    </div>

                                    <button type="submit" class="btn btn-primary form-control my-2"
                                        wire:loading.attr="disabled">
                                        Add Expense
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>
</div>
