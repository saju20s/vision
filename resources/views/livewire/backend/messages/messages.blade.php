<div>
    <section class="product-section">
        <div class="content">
            <div class="container-fluid mt-5 pt-4">
                @include('backend.template.header')
                @include('backend.template.sidebar')
                <div class="row g-4">
                    <div class="col-md-12">
                        <div class="table-responsive table-show">
                            {{-- Filter Buttons --}}
                            <div class="user-table-add d-flex flex-wrap justify-content-between align-items-center mb-3">
                                <div class="d-flex flex-wrap align-items-center gap-2">
                                    <button wire:click="setFilter('all')"
                                        class="btn bg-success-light mr-2 {{ $filter === 'all' ? 'active' : '' }}">
                                        All Messages ({{ $all_count }})
                                    </button>
                                    <button wire:click="setFilter('replied')"
                                        class="btn bg-success-light mr-2 {{ $filter === 'replied' ? 'active' : '' }}">
                                        Replied ({{ $replied_count }})
                                    </button>
                                    <button wire:click="setFilter('noreply')"
                                        class="btn bg-danger-light {{ $filter === 'noreply' ? 'active' : '' }}">
                                        No Reply ({{ $noreply_count }})
                                    </button>
                                </div>
                            </div>

                            {{-- Table --}}
                            <div class="table-responsive">
                                <table class="table table-hover align-middle">
                                    <thead class="table-secondary">
                                        <tr>
                                            <th scope="col">SL</th>
                                            <th scope="col">User Info</th>
                                            <th scope="col">Message</th>
                                            <th scope="col">Date</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr wire:loading wire:target="render">
                                            <td colspan="6">
                                                <div class="d-flex align-items-center justify-content-center all-loading-header">
                                                    <div class="text-center">
                                                        <div class="spinner-border text-secondary mb-2" role="status">
                                                        </div><br>
                                                        <span class="text-muted">Loading...</span>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>

                                        @forelse($datas as $index => $data)
                                            <tr wire:loading.remove>
                                                <th scope="row">
                                                    {{ ($datas->currentPage() - 1) * $datas->perPage() + $loop->iteration }}
                                                </th>

                                                {{-- User Info --}}
                                                <td class="message-user-info">
                                                    <div class="d-flex flex-column flex-wrap">
                                                        <span class="mb-1 d-flex align-items-center">
                                                            <i class="fas fa-user-tie me-2 text-secondary"></i>
                                                            <span class="text-truncate">{{ $data->name }}</span>
                                                        </span>                                                       
                                                        <span class="mb-1 d-flex align-items-center">
                                                            <i class="fa-solid fa-square-phone me-2 text-secondary"></i>
                                                            <span class="text-truncate">{{ $data->phone }}</span>
                                                        </span>
                                                        <span class="d-flex align-items-center">
                                                            <i
                                                                class="fa-solid fa-envelope-open-text me-2 text-secondary"></i>
                                                            <span class="text-truncate">{{ $data->email }}</span>
                                                        </span>
                                                    </div>
                                                </td>

                                                {{-- Message --}}
                                                <td class="w-50 message-show">
                                                    <span id="short-message-{{ $data->id }}">
                                                        {{ $data->short_message }}
                                                    </span>

                                                    @if (str_word_count($data->message) > 20)
                                                        <a href="{{ route('reply.edit', $data->id) }}" class="btn btn-sm bg-success-light mr-2" wire:navigate>See
                                                            More
                                                            <i class="fas fa-angle-down"></i></a>
                                                    @endif
                                                </td>

                                                {{-- Status --}}
                                                <td>
                                                    @if ($data->replies_count == 0)
                                                        <span class="badge bg-danger-light">🚫 Not Reply</span>
                                                    @else
                                                        <span class="badge bg-success-light">Replied</span>
                                                    @endif
                                                </td>

                                                {{-- Date --}}
                                                <td>{{ $data->created_at->format('d M Y') }}</td>

                                                {{-- Action --}}
                                                <td>
                                                    <div class="d-flex flex-wrap gap-2">
                                                        @can('messages.edit')
                                                            <a href="{{ route('reply.edit', $data->id) }}"
                                                                class="btn btn-sm bg-success-light" wire:navigate><i
                                                                    class="fa-solid fa-reply"></i> Reply</a>
                                                        @endcan
                                                        @can('messages.delete')
                                                            <button class="btn btn-sm bg-danger-light"
                                                                data-bs-toggle="modal" data-bs-target="#deleteModal"
                                                                wire:click="confirmDelete({{ $data->id }})"> <i
                                                                    class="fa-solid fa-trash-can"></i> Delete </button>
                                                        @endcan
                                                    </div>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr wire:loading.remove>
                                                <td colspan="6" class="text-center text-muted">No data available</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    @include('backend.template.pagination')
                </div>
            </div>
        </div>
    </section>
    @include('backend.template.delete-modal')
</div>
