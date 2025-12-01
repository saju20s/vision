<div>
    <section class="product-section">
        <div class="content">
            <div class="container-fluid mt-5 pt-4">

                @include('backend.template.header')
                @include('backend.template.sidebar')

                <div class="row g-4">
                    <div class="col-md-12">
                        <div class="table-responsive table-show">
                            <table class="table table-hover align-middle">

                                <!-- Search Bar -->
                                <div
                                    class="user-table-add d-flex align-items-center flex-nowrap">

                                    <!-- Search -->
                                    <div class="input-group user-search-input-group me-2">
                                        <input type="text" wire:model.live="search"
                                            class="form-control rounded-0" placeholder="Search Expense...">
                                        <button class="btn btn-primary" wire:click="$refresh">Search</button>
                                    </div>

                                    <!-- From Date -->
                                    <div class="input-group me-2" style="width: 200px;">
                                        <input type="date" wire:model.live="from_date" class="form-control">
                                    </div>

                                    <!-- To Date -->
                                    <div class="input-group" style="width: 200px;">
                                        <input type="date" wire:model.live="to_date" class="form-control">
                                    </div>

                                </div>


                                <thead class="table-secondary">
                                    <tr>
                                        <th>SL</th>
                                        <th>Expense ID</th>
                                        <th>Category</th>
                                        <th>Total Bill</th>
                                        <th>Payment History</th>
                                        <th>Date</th>
                                        <th>Note</th>
                                    </tr>
                                </thead>

                                <tbody>

                                    @forelse ($datas as $expense_id => $allHistories)
                                        <tr wire:loading.remove>
                                            <td>{{ $loop->iteration }}</td>

                                            {{-- Expense ID + Name --}}
                                            <td>
                                                {{ $allHistories->first()->name }} ({{ $expense_id }})
                                            </td>

                                            {{-- Category --}}
                                            <td>
                                                <span class="badge bg-success">
                                                    {{ $allHistories->first()->category->name ?? '-' }}
                                                </span>
                                            </td>

                                            <td>
                                                @php
                                                    $total = $allHistories->sortBy('id')->first()->amount;
                                                    $paid = $allHistories->sum('amount');
                                                    $due = $total - $paid;

                                                    $dueClass = 'bg-warning';

                                                    if ($due == 0) {
                                                        $dueClass = 'badge bg-success-light';
                                                    } elseif ($due < 0) {
                                                        $dueClass = 'badge bg-danger-light';
                                                    }
                                                @endphp

                                                Total : {{ number_format($total, 2) }} ৳ <br>
                                                Paid : {{ number_format($paid ?? 0, 2) }} ৳ <br>

                                                Due :
                                                <span class="badge {{ $dueClass }}">
                                                    {{ number_format($due ?? 0, 2) }} ৳
                                                </span>
                                            </td>



                                            {{-- Payment History --}}
                                            <td>
                                                @foreach ($allHistories as $h)
                                                    Date: {{ $h->created_at->format('d M Y h:i A') }} <br>
                                                    Amount: {{ number_format($h->amount, 2) }} <br>
                                                    Entry By: {{ $h->entry_by }} <br><br>
                                                @endforeach
                                            </td>

                                            <td>
                                                {{ $allHistories->first()->created_at->format('d M Y') }}
                                            </td>

                                            {{-- Note --}}
                                            <td>
                                                @foreach ($allHistories as $h)
                                                    {{ $h->note ?? '—' }} <br>
                                                @endforeach
                                            </td>
                                        </tr>
                                    @empty
                                        <tr wire:loading.remove>
                                            <td colspan="7" class="text-center text-muted">
                                                No Expense History Found
                                            </td>
                                        </tr>
                                    @endforelse

                                </tbody>

                            </table>
                        </div>
                    </div>

                    <!-- Pagination -->
                    {{ $unique->links() }}

                </div>
            </div>
        </div>
    </section>

    @include('backend.template.delete-modal')
</div>
