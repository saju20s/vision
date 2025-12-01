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
                                <div class="user-table-add overflow-auto">
                                    <div class="d-flex align-items-center flex-nowrap gap-2 py-2">
                                        <!-- All Button -->
                                        <button wire:click="setFilter('all')"
                                            class="btn btn-sm bg-success-light {{ $filter === 'all' ? 'active' : '' }}">
                                            All ({{ $all_tests }})
                                        </button>

                                        <!-- Department Buttons -->
                                        @foreach ($departments as $dept)
                                            <button wire:click="setFilter('{{ $dept['name'] }}')"
                                                class="btn btn-sm bg-success-light {{ $filter === $dept['name'] ? 'active' : '' }}">
                                                {{ ucfirst($dept['name']) }} ({{ $dept['count'] }})
                                            </button>
                                        @endforeach

                                        <!-- Search Input -->
                                        <div class="input-group user-search-input-group inv-search-input">
                                            <span class="input-group-text">
                                                <i class="fa-solid fa-magnifying-glass"></i>
                                            </span>
                                            <input type="search" class="form-control search-box-input"
                                                placeholder="Search Here....." wire:model.live="search">
                                        </div>

                                        <!-- Add New Button -->
                                        <a href="/add-investigation" class="btn btn-sm btn-primary" wire:navigate>
                                           <i class="fa-solid fa-plus"></i> Add New
                                        </a>
                                    </div>
                                </div>

                                <thead class="table-secondary">
                                    <tr>
                                        <th scope="col">SL</th>
                                        <th scope="col">Investigation Name</th>
                                        <th scope="col">Sell Price</th>
                                        <th scope="col">Department</th>
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
                                                    <span class="text-muted">Loading blogs...</span>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @forelse($datas as $index => $data)
                                        <tr wire:loading.remove>
                                            <th scope="row">
                                                {{ ($datas->currentPage() - 1) * $datas->perPage() + $loop->iteration }}
                                            </th>
                                            <td>{{ $data->test_name }}</td>
                                            <td>{{ $data->sell_price }}</td>
                                            <td><span class="badge bg-success">{{ ucfirst($data->department) }}</span>
                                            </td>
                                            <td>{{ $data->created_at->format('d M Y') }}</td>
                                            <td>
                                                @can('investigations.edit')
                                                    <a href="{{ route('investigation.edit', $data->id) }}"
                                                        class="btn btn-sm bg-success-light mr-2" wire:navigate><i
                                                            class="fa-solid fa-pencil"></i> Edit</a>
                                                @endcan
                                                @can('investigations.delete')
                                                    <button class="btn btn-sm bg-danger-light" data-bs-toggle="modal"
                                                        data-bs-target="#deleteModal"
                                                        wire:click="confirmDelete({{ $data->id }})"> <i
                                                            class="fa-solid fa-trash-can"></i> Delete </button>
                                                @endcan
                                            </td>
                                        </tr>
                                    @empty
                                        <tr wire:loading.remove>
                                            <td colspan="7" class="text-center text-muted">No data available</td>
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
