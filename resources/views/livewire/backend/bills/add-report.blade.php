<div>
    <section class="product-section">
        <div class="content">
            <div class="container-fluid mt-5 pt-4">
                @include('backend.template.header')
                @include('backend.template.sidebar')
                <div class="row g-4">
                    <div class="col-md-12">
                        <div class="table-responsive table-show">

                            <div class="p-3 w-100 w-md-auto mb-2 position-relative">
                                <span class="d-block mb-1 border-bottom pb-1"><strong>Name:</strong>
                                    {{ $patient->name ?? 'Unknown' }}</span>
                                <span class="d-block mb-1 border-bottom pb-1"><strong>Mob:</strong>
                                    {{ $patient->phone ?? 'Unknown' }}</span>
                                <span class="d-block mb-0"><strong>Age:</strong>
                                    {{ $patient->full_age ?? 'Unknown' }}</span>
                                <button class="btn btn-sm bg-success-light mr-2 position-absolute add-report-sms" wire:click="sendSms">
                                    <i class="fa-solid fa-comment-dots"></i> Send SMS
                                </button>
                            </div>

                            <table class="table table-hover align-middle ">
                                <thead class="table-secondary">
                                    <tr>
                                        <th scope="col">SL</th>
                                        <th scope="col">Investigation Name</th>
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

                                    @forelse($investigations as $investigation)
                                        <tr wire:loading.remove>
                                            <td>
                                                {{ $loop->index + 1 }}
                                            </td>
                                            <td>
                                                {{ $investigation->test_name ?? 'No Name' }}
                                            </td>
                                            <td>
                                                @if ($investigation->has_report)
                                                    <a href="{{ route('edit.report', ['id' => $investigation->id, 'bill_id' => $investigation->bill_id]) }}"
                                                        class="btn btn-sm bg-success-light mr-2" wire:navigate>
                                                        <i class="fas fa-check-square"></i> Complete
                                                    </a>
                                                @else
                                                    <a href="{{ route('edit.report', ['id' => $investigation->id, 'bill_id' => $investigation->bill_id]) }}"
                                                        class="btn btn-sm bg-success-light mr-2" wire:navigate>
                                                        <i class="fa-solid fa-pencil"></i> Add Result
                                                    </a>
                                                @endif
                                            </td>

                                        </tr>
                                    @empty
                                        <tr wire:loading.remove>
                                            <td colspan="3" class="text-center text-muted">No data available</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('backend.template.delete-modal')
</div>
