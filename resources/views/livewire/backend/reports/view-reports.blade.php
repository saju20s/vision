<div>
    <section class="product-section">
        <div class="content">
            <div class="container-fluid mt-5 pt-4">
                @include('backend.template.header')
                @include('backend.template.sidebar')
                <div class="row g-4">
                    <div class="col-md-12">
                        <div class="table-responsive table-show">
                            <table class="table table-hover align-middle ">

                                <div class="user-table-add row g-2 align-items-center mb-3">
                                    <!-- Buttons -->
                                    <div class="col-12 col-md-8 d-flex flex-wrap gap-2">
                                        <button wire:click="setFilter('pending')"
                                            class="btn bg-danger-light {{ $statusFilter === 'pending' ? 'active' : '' }}">
                                            Pending ({{ $countPending }})
                                        </button>

                                        @if (auth()->user()->getRoleNames()->first() === 'Master Admin')
                                            <button wire:click="setFilter('complete')"
                                                class="btn bg-success-light {{ $statusFilter === 'complete' ? 'active' : '' }}">
                                                Complete ({{ $countComplete }})
                                            </button>
                                        @endif
                                    </div>

                                    <!-- Search -->
                                    <div class="col-12 col-md-4">
                                        <div class="input-group">
                                            <span class="input-group-text">
                                                <i class="fa-solid fa-magnifying-glass"></i>
                                            </span>
                                            <input type="search" class="form-control search-box-input"
                                                placeholder="Search Here..." wire:model.debounce.300ms="search">
                                        </div>
                                    </div>
                                </div>


                                <thead class="table-secondary">
                                    <tr>
                                        <th scope="col">SL</th>
                                        <th scope="col">Invoice No</th>
                                        <th scope="col">Patient</th>
                                        <th scope="col">Phone</th>
                                        <th scope="col">Date</th>
                                        @role('Master Admin')
                                            <th scope="col">Status</th>
                                        @endrole
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr wire:loading wire:target="render">
                                        <td colspan="9">
                                            <div
                                                class="d-flex align-items-center justify-content-center all-loading-header">
                                                <div class="text-center">
                                                    <div class="spinner-border text-secondary mb-2" role="status">
                                                    </div><br>
                                                    <span class="text-muted">Loading invoices...</span>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                    @forelse($datas as $index => $data)
                                        <tr wire:loading.remove>
                                            <th scope="row">
                                                {{ ($datas->currentPage() - 1) * $datas->perPage() + $loop->iteration }}
                                            </th>
                                            <td>{{ $data->invoice_number }}</td>
                                            <td>{{ $data->patient->name }}</td>
                                            <td>{{ $data->patient->phone }}</td>
                                            <td>{{ $data->created_at->format('d M Y') }}</td>
                                            @role('Master Admin')
                                                {{-- ✅ Only Master Admin can see this --}}
                                                <td>
                                                    <button
                                                        class="btn btn-sm {{ $data->status == 'pending' ? 'btn btn-sm bg-danger-light' : 'btn btn-sm bg-success-light' }}"
                                                        wire:click="toggleStatus({{ $data->id }})">
                                                        @if ($data->status == 'pending')
                                                            <i class="fas fa-hourglass-start"></i> Pending
                                                        @else
                                                            <i class="fas fa-check-square"></i> Complete
                                                        @endif
                                                    </button>
                                                </td>
                                            @endrole

                                            <td>
                                                @can('reports.view')
                                                    <a href="{{ route('add.report', $data->id) }}"
                                                        class="btn btn-sm bg-success-light mr-2" wire:navigate>
                                                        <i class="fas fa-flask"></i> All Test
                                                    </a>
                                                @endcan
                                            </td>
                                        </tr>
                                    @empty
                                        <tr wire:loading.remove>
                                            <td colspan="9" class="text-center text-muted">No data available</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                    @include('backend.template.pagination')
                </div>
            </div>
        </div>
    </section>
    @include('backend.template.delete-modal')
</div>
