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
                                <div class="table-add text-end d-flex justify-content-between align-items-center">
                                    <div class="input-group w-25 search-input-group">
                                        <span class="input-group-text"><i
                                                class="fa-solid fa-magnifying-glass"></i></span>
                                        <input type="search" class="form-control search-box-input"
                                            placeholder="Search Here....." wire:model.live="search">
                                    </div>
                                </div>
                                <thead class="table-secondary">
                                    <tr>
                                        <th scope="col">SL</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Phone & HID</th>
                                        <th scope="col">Gender</th>
                                        <th scope="col">Age</th>
                                        <th scope="col">Address</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr wire:loading wire:target="render">
                                        <td colspan="6">
                                            <div
                                                class="d-flex align-items-center justify-content-center all-loading-header">
                                                <div class="text-center">
                                                    <div class="spinner-border text-secondary mb-2" role="status">
                                                    </div><br>
                                                    <span class="text-muted">Loading ...</span>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @forelse($datas as $index => $data)
                                        <tr wire:loading.remove>
                                            <th scope="row">
                                                {{ ($datas->currentPage() - 1) * $datas->perPage() + $loop->iteration }}
                                            </th>
                                            <td>{{ $data->patient->name ?? 'N/A' }}</td>
                                            <td>{{ $data->patient->phone ?? 'N/A' }} <i class="fa-regular fa-copy"
                                                    role="button"
                                                    onclick="copyToClipboard('{{ $data->patient->phone ?? 'N/A' }}')"></i>
                                                <br> <span class="bg-success-light">
                                                    {{ $data->patient->patient_id ?? 'N/A' }} <i
                                                        class="fa-regular fa-copy" role="button"
                                                        onclick="copyToClipboard('{{ $data->patient->patient_id ?? 'N/A' }}')"></i></span>
                                            </td>
                                            <td>{{ ucfirst($data->patient->gender ?? 'N/A') }}</td>
                                            <td>{{ $data->patient->age ?? 'N/A' }}yrs</td>
                                            <td class="table-ten"><i class="fa-solid fa-location-dot"
                                                    style="color:{{ $setting->menu_color }}"></i>
                                                {{ $data->patient->address ?? 'N/A' }}</td>
                                            <td>{{ $data->created_at->format('d M Y') }}</td>
                                            <td>
                                                @can('reports_delivery.view')
                                                    <a href="{{ route('patient.reports', $data->patient->id) }}"
                                                        class="btn btn-sm bg-success-light mr-2" wire:navigate><i
                                                            class="fa-regular fa-file-lines"></i> All Reports</a>
                                                @endcan

                                            </td>
                                        </tr>
                                    @empty
                                        <tr wire:loading.remove>
                                            <td colspan="8" class="text-center text-muted">No data available</td>
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
