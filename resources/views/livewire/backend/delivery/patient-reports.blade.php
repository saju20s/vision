<div>
    <section class="product-section">
        <div class="content">
            <div class="container-fluid mt-5 pt-4">
                @include('backend.template.header')
                @include('backend.template.sidebar')

                <div class="row g-4">
                    <div class="col-12 bg-white pb-4 px-3 column-twelve">

                        {{-- Header with patient info box and filters --}}
                        <div
                            class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center gap-3 mb-3">

                            {{-- Left: Patient Info Box --}}
                            <div class="p-3 border rounded w-100 w-md-auto mt-2">
                                <span class="d-block mb-1 border-bottom pb-1"><strong>Name:</strong>
                                    {{ $patientName }}</span>
                                <span class="d-block mb-1 border-bottom pb-1"><strong>Mob:</strong>
                                    {{ $patientPhone }}</span>
                                <span class="d-block mb-0"><strong>Age:</strong> {{ $patientAge }}</span>
                            </div>

                            {{-- Right: Search & Date Filter --}}
                            <div class="d-flex flex-column flex-md-row gap-2 w-100 w-md-auto">

                                {{-- Invoice Search + Button --}}
                                <div class="input-group flex-grow-1 flex-md-grow-0">
                                    <input type="text" class="form-control" placeholder="Invoice number search..."
                                        wire:model.defer="invoiceSearch">
                                    <button class="btn btn-primary" type="button" wire:click="searchInvoice">
                                        Search
                                    </button>
                                </div>

                                {{-- Date Search --}}
                                <div class="input-group w-auto">
                                    <input type="date" class="form-control" wire:model="dateSearch"
                                        wire:change="searchInvoice">
                                </div>

                            </div>

                        </div>

                        @php
                            $groupedReports = $reports->groupBy(fn($r) => $r->bill->invoice_number ?? 'N/A');
                        @endphp

                        {{-- Table --}}
                        <div class="table-responsive patient-table-border">
                            <table class="table table-sm table-hover align-middle mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th>Invoice</th>
                                        <th>SL</th>
                                        <th>Test Name</th>
                                        <th>Date</th>
                                        <th>Time</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($groupedReports as $invoiceNumber => $invoiceReports)
                                        @foreach ($invoiceReports as $report)
                                            @php
                                                $reportDate = $report->created_at
                                                    ->timezone('Asia/Dhaka')
                                                    ->format('d M Y');
                                                $reportTime = $report->created_at
                                                    ->timezone('Asia/Dhaka')
                                                    ->format('h:i A');
                                            @endphp
                                            <tr>
                                                @if ($loop->first)
                                                    <td rowspan="{{ $invoiceReports->count() }}"
                                                        class="text-center fw-bold align-middle border-end">
                                                        {{ $invoiceNumber }}
                                                    </td>
                                                @endif
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $report->investigation->test_name ?? 'N/A' }}</td>
                                                <td>{{ $reportDate }}</td>
                                                <td>{{ $reportTime }}</td>
                                                <td>
                                                    @php
                                                        $dueAmount = $report->bill->due_amount ?? 0;
                                                    @endphp

                                                    @if ($dueAmount <= 0)
                                                        <a href="{{ route('laboratory.print', $report->id) }}"
                                                            class="btn btn-sm bg-success-light mr-2" wire:navigate>
                                                            <i class="fa-solid fa-folder-open"></i> View
                                                        </a>
                                                    @else
                                                        @hasanyrole('Master Admin|laboratory')
                                                            <a href="{{ route('laboratory.print', $report->id) }}"
                                                                class="btn btn-sm bg-success-light mr-2" wire:navigate>
                                                                <i class="fa-solid fa-folder-open"></i> View
                                                            </a>
                                                        @else
                                                            <button class="btn btn-sm bg-danger-light mr-2" disabled>
                                                                <i class="fa-solid fa-ban"></i> Bill Due
                                                            </button>
                                                        @endhasanyrole
                                                    @endif
                                                    @can('reports.delete')
                                                        <button class="btn btn-sm bg-danger-light" data-bs-toggle="modal"
                                                            data-bs-target="#deleteModal"
                                                            wire:click="confirmDelete({{ $report->id }})">
                                                            <i class="fa-solid fa-trash-can"></i> Delete
                                                        </button>
                                                    @endcan
                                                </td>
                                            </tr>
                                        @endforeach
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center text-muted">No reports found</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                        <div class="col-lg-12 my-4">
                            {{ $reports->links() }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('backend.template.delete-modal')
</div>
