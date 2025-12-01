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
                                        <th>SL</th>
                                        <th>Adm ID</th>
                                        <th>PT Name</th>
                                        <th>Gender</th>
                                        <th>Age</th>
                                        <th>OT Name</th>
                                        <th>Surgeon</th>
                                        <th>Assits</th>
                                        <th>Anes</th>
                                        <th>OT Date</th>
                                        <th>Charge</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr wire:loading wire:target="render">
                                        <td colspan="12">
                                            <div
                                                class="d-flex align-items-center justify-content-center all-loading-header">
                                                <div class="text-center">
                                                    <div class="spinner-border text-secondary mb-2" role="status">
                                                    </div><br>
                                                    <span class="text-muted">Loading ..</span>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @forelse($datas as $index => $data)
                                        <tr>
                                            <td>{{ $datas->firstItem() + $index }}</td>
                                            <td>{{ $data->admission_id }} <i class="fa-regular fa-copy" onclick="copyToClipboard('{{ $data->admission_id }}')"></i></td>
                                            <td>{{ $data->patient_name }}</td>
                                            <td>{{ $data->gender }}</td>
                                            <td>{{ $data->age }}</td>
                                            <td>{{ $data->operation_name }}</td>
                                            <td>{{ $data->surgeon }}</td>
                                            <td>{{ $data->assistant }}</td>
                                            <td>{{ $data->anesthesiologist }}</td>
                                            <td>{{ $data->ot_date }}</td>
                                            <td>{{ $data->charge }}</td>
                                            <td>
                                                <a href="/view-consent/{{$data->id}}" class="btn btn-sm bg-success-light mr-2" wire:navigate><i class="fa-solid fa-folder-open"></i> View</a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="12" class="text-center">No records found</td>
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
