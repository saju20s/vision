<div>
    @php
        use Jenssegers\Agent\Agent;
        $agent = new Agent();
    @endphp

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
                                    <button class="btn btn-sm bg-danger-light me-2" wire:click="delete" wire:loading.attr="disabled">
                                        <i class="fa-solid fa-trash-can"></i> Delete Selected
                                    </button>
                                </div>
                                <thead class="table-secondary">
                                    <tr>
                                        <th>
                                            <input type="checkbox" class="activity-input" wire:model="deleteIds" value="all"
                                                wire:click="confirmBatchDelete">
                                        </th>
                                        <th scope="col">SL</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Details</th>
                                        <th scope="col">Location</th>
                                        <th scope="col">User Agent</th>
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
                                                    <span class="text-muted">Loading...</span>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @forelse($datas as $index => $data)
                                        @php

                                            $agent->setUserAgent($data->user_agent);

                                            $browser = $agent->browser();

                                            // Detect device type
                                            if ($agent->isDesktop()) {
                                                $deviceIcon = '<i class="fa-solid fa-desktop me-1"></i>Desktop';
                                            } elseif ($agent->isTablet()) {
                                                $deviceIcon =
                                                    '<i class="fa-solid fa-tablet-screen-button me-1"></i>Tablet';
                                            } elseif ($agent->isMobile()) {
                                                $deviceIcon =
                                                    '<i class="fa-solid fa-mobile-screen-button me-1"></i>Mobile';
                                            } else {
                                                $deviceIcon = '<i class="fa-solid fa-question-circle me-1"></i>Unknown';
                                            }

                                            // Match browser with icon
                                            $browserIcons = [
                                                'Chrome' => 'fa-brands fa-chrome',
                                                'Firefox' => 'fa-brands fa-firefox-browser',
                                                'Safari' => 'fa-brands fa-safari',
                                                'Opera' => 'fa-brands fa-opera',
                                                'Edge' => 'fa-brands fa-edge',
                                                'Internet Explorer' => 'fa-brands fa-internet-explorer',
                                            ];

                                            $browserIcon = $browserIcons[$browser] ?? 'fa-solid fa-globe';
                                        @endphp

                                        <tr wire:loading.remove>
                                            <td>
                                                <input type="checkbox" class="activity-input" wire:model="deleteIds"
                                                    value="{{ $data->id }}">
                                            </td>
                                            <th scope="row">
                                                {{ ($datas->currentPage() - 1) * $datas->perPage() + $loop->iteration }}
                                            </th>
                                            <td>
                                                {{ $data->user?->name ?? 'N/A' }}
                                            </td>
                                            <td>
                                                <span><i class="{{ $data->icon }}"></i></span>
                                                <span>{{ $data->details }}</span>
                                            </td>
                                            <td>
                                                @if ($data->latitude && $data->longitude)
                                                    <a href="https://www.google.com/maps?q={{ $data->latitude }},{{ $data->longitude }}"
                                                        target="_blank" class="btn btn-sm bg-success-light mr-2">
                                                        <i class="fa-solid fa-location-dot"></i> View Map
                                                    </a>
                                                @else
                                                    <span class="text-muted">N/A</span>
                                                @endif
                                            </td>
                                            <td> <i class="{{ $browserIcon }} me-1"></i>{{ $browser }} <br>
                                                {!! $deviceIcon !!}
                                            </td>
                                            <td>{{ $data->created_at->timezone('Asia/Dhaka')->format('d M Y, h:i A') }}
                                            </td>
                                            <td>
                                                @can('blogs.delete')
                                                    <button class="btn btn-sm bg-danger-light" data-bs-toggle="modal"
                                                        data-bs-target="#deleteModal"
                                                        wire:click="confirmDelete({{ $data->id }})"> <i
                                                            class="fa-solid fa-trash-can"></i> Delete </button>
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
