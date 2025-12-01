<div>
    <section class="product-section">
        <div class="content">
            <div class="container-fluid mt-5 pt-4">
                @include('backend.template.header')
                @include('backend.template.sidebar')

                <div class="row g-4">
                    <div class="col-md-12">
                        <div class="table-responsive table-show" style="max-height: 600px; overflow-y: auto;">
                            <div class="card p-3 mb-3 shadow-sm border-0">
                                <div class="row g-2 align-items-center">

                                    <!-- Search -->
                                    <div class="col-12 col-md-4">
                                        <div class="input-group">
                                            <input type="text" class="form-control"
                                                placeholder="Search by Name / PID / Phone"
                                                wire:model.defer="searchInput">
                                            <button class="btn btn-primary" wire:click="submitSearch">Go</button>
                                        </div>
                                    </div>

                                    <!-- Date Filter -->
                                    <div class="col-12 col-md-4">
                                        <div class="input-group">
                                            <input type="date" class="form-control" wire:model="from_date"
                                                placeholder="From Date">
                                            <input type="date" class="form-control" wire:model="to_date"
                                                placeholder="To Date">
                                            <button class="btn btn-outline-primary" wire:click="submitSearch">
                                                <i class="fa-solid fa-calendar-check"></i> Filter
                                            </button>
                                        </div>
                                    </div>

                                    <!-- Status Filter -->
                                    <div class="col-12 col-md-4">
                                        <div class="input-group">
                                            <select class="form-select" wire:model="status">
                                                <option value="">All Status</option>
                                                <option value="admitted">Admitted</option>
                                                <option value="discharged">Discharged</option>
                                            </select>
                                            <button class="btn btn-outline-success" wire:click="submitSearch">
                                                <i class="fa-solid fa-filter"></i> Apply
                                            </button>
                                        </div>
                                    </div>

                                </div>
                            </div>



                            <table class="table table-hover table-striped table-bordered align-middle mb-0">
                                <thead class="table-secondary position-sticky top-0" style="z-index: 10;">
                                    <tr>
                                        <th>SL</th>
                                        <th>Date</th>
                                        <th>Adm ID</th>
                                        <th>HID</th>
                                        <th>Bed No</th>
                                        <th>Name</th>
                                        <th>Phone</th>
                                        <th>Age</th>
                                        <th>Sex</th>
                                        <th>Adm Date</th>
                                        <th>Dsc. Date</th>
                                        <th>Bill ID</th>
                                        <th>Prepared By</th>
                                        <th>Bed Type</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr wire:loading wire:target="render">
                                        <td colspan="13" class="text-center">
                                            <div class="spinner-border text-secondary" role="status"></div>
                                            <span class="text-muted">Loading admissions...</span>
                                        </td>
                                    </tr>

                                    @forelse($datas as $index => $data)
                                        <tr wire:loading.remove>
                                            <td>{{ ($datas->currentPage() - 1) * $datas->perPage() + $loop->iteration }}
                                            </td>
                                            <td>{{ $data->created_at->format('d-m-Y') }}</td>
                                            <td>{{ $data->admission_id ?? '-' }}</td>
                                            <td> <span class="bg-success-light">{{ $data->patient->patient_id ?? '-' }}
                                                    <i class="fa-regular fa-copy" role="button"
                                                        onclick="copyToClipboard('{{ $data->patient->patient_id ?? '-' }}')"></i>
                                                </span></td>
                                            <td>{{ $data->bed->floor_no ?? '-' }} ({{ $data->bed->bed_no ?? '-' }})
                                            </td>
                                            <td>{{ $data->patient->name ?? '-' }}</td>
                                            <td>{{ $data->patient->phone ?? '-' }}</td>
                                            <td>{{ $data->patient->full_age ?? '-' }}</td>
                                            <td>{{ $data->patient->gender ? ucfirst($data->patient->gender) : '-' }}
                                            </td>
                                            <td>{{ $data->admit_date ? $data->admit_date->format('d-m-Y') : '-' }}</td>
                                            <td>{{ $data->discharge_date ? $data->discharge_date->format('d-m-Y') : '-' }}
                                            </td>
                                            <td>
                                                @if (is_array($data->bill_id))
                                                    {!! implode('<br>', array_map(fn($id) => str_replace(',', '<br>', trim($id, ',')), $data->bill_id)) !!}
                                                @else
                                                    {!! str_replace(',', '<br>', trim($data->bill_id, ',')) !!}
                                                @endif
                                            </td>
                                            <td>{{ $data->user->name ?? '-' }}</td>
                                            <td>{{ $data->bed->bed_category ?? '-' }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="14" class="text-center text-muted">No data available</td>
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

    <style>
        .table-responsive {
            overflow-x: auto;
        }

        .table thead th {
            white-space: nowrap;
        }

        .table tbody td {
            white-space: nowrap;
        }

        .table thead {
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
    </style>

    @push('scripts')
        <script>
            function copyToClipboard(text) {
                navigator.clipboard.writeText(text).then(function() {
                    Livewire.dispatch('toastr:success', {
                        message: 'Copied: ' + text
                    });
                }, function(err) {
                    console.error('Failed to copy: ', err);
                });
            }
        </script>
    @endpush

</div>
