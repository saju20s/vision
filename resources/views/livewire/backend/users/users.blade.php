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

                                <div x-data="{
                                    openFilter: false,
                                    roleStates: [],
                                    initRoles(count) {
                                        this.roleStates = Array(count).fill(false);
                                    },
                                    animateRoles() {
                                        this.roleStates.fill(false);
                                        this.roleStates.forEach((_, index) => {
                                            setTimeout(() => this.roleStates[index] = true, index * 200);
                                        });
                                    },
                                    hideRoles() {
                                        this.roleStates.forEach((_, index) => {
                                            setTimeout(() => this.roleStates[index] = false, index * 100);
                                        });
                                    },
                                    toggleDropdown(count) {
                                        this.openFilter = !this.openFilter;
                                        if (this.openFilter) {
                                            this.animateRoles();
                                        } else {
                                            this.hideRoles();
                                        }
                                    }
                                }" x-init="initRoles({{ $roles->count() }})"
                                    class="user-table-add d-flex flex-nowrap align-items-center justify-content-between overflow-visible pb-2 position-relative"
                                    style="white-space: nowrap;">
                                    <!-- Left Section -->
                                    <div class="d-flex align-items-center flex-nowrap me-2 position-relative">
                                        <!-- All Filter Button -->
                                        <button type="button" class="btn btn-outline-success d-flex align-items-center"
                                            @click="toggleDropdown({{ $roles->count() }})">
                                            <i class="fas fa-filter me-2"></i> All Filter
                                            <i class="fa-solid ms-2"
                                                :class="openFilter ? 'fa-chevron-up' : 'fa-chevron-down'"></i>
                                        </button>

                                        <!-- Dropdown -->
                                        <div x-show="openFilter" @click.away="toggleDropdown({{ $roles->count() }})"
                                            class="position-absolute bg-white border rounded shadow-lg p-3 mt-2"
                                            style="top:100%; left:0; min-width: 220px; z-index: 1055; display: none; overflow: hidden;">
                                            <!-- All Button -->
                                            @can('users.add')
                                                <div x-show="roleStates[0]"
                                                    x-transition:enter="animate__animated animate__fadeInLeft"
                                                    x-transition:leave="animate__animated animate__fadeOutLeft"
                                                    class="mb-2">
                                                    <button wire:click="setFilter('all')"
                                                        class="btn bg-success-light me-1 w-100 {{ $filter === 'all' ? 'active' : '' }}">
                                                        All ({{ $all_users }})
                                                    </button>
                                                </div>
                                            @endcan

                                            <!-- Role Buttons -->
                                            @can('users.add')
                                                @foreach ($roles->where('name', '!=', 'Master Admin') as $index => $role)
                                                    <div x-show="roleStates[{{ $index }}]"
                                                        x-transition:enter="animate__animated animate__fadeInLeft"
                                                        x-transition:leave="animate__animated animate__fadeOutLeft"
                                                        class="mb-2">
                                                        <button wire:click="setFilter('{{ $role->name }}')"
                                                            class="btn bg-success-light me-1 w-100 {{ $filter === $role->name ? 'active' : '' }}">
                                                            {{ $role->name }} ({{ $role->users_count }})
                                                        </button>
                                                    </div>
                                                @endforeach
                                            @endcan
                                        </div>

                                        <!-- Search box -->
                                        <div class="input-group user-search-input-group ms-3"
                                            style="width:230px; flex-shrink:0;">
                                            <span class="input-group-text">
                                                <i class="fa-solid fa-magnifying-glass"></i>
                                            </span>
                                            <input type="search" class="form-control search-box-input"
                                                placeholder="Search Here....." wire:model.live="search">
                                        </div>
                                    </div>

                                    <!-- Right Section -->
                                    @can('users.add')
                                        <a href="/add-user" class="btn btn-md btn-primary ms-2 flex-shrink-0" wire:navigate>
                                            <i class="fa-solid fa-plus"></i> Add New
                                        </a>
                                    @endcan
                                </div>

                                <thead class="table-secondary mt-2">
                                    <tr>
                                        <th scope="col">SL</th>
                                        <th scope="col">Photo</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Role</th>
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
                                            <td>
                                                @if ($data->image == 'avatar.png')
                                                    <img class="img-fluid rounded shadow-sm product-img"
                                                        src="{{ asset('backend/images/avatar.jpg') }}" alt="Page Image"
                                                        loading="lazy">
                                                @elseif ($data->image)
                                                    <img class="img-fluid rounded shadow-sm product-img"
                                                        src="{{ asset('storage/' . $data->image) }}" alt="Page Image"
                                                        loading="lazy">
                                                @endif
                                            </td>
                                            <td>{{ $data->name }}</td>
                                            <td>{{ $data->email }}</td>
                                            <td><span
                                                    class="badge bg-success">{{ $data->roles->pluck('name')->implode(', ') }}</span>
                                            </td>
                                            <td>{{ $data->created_at->format('d M Y') }}</td>
                                            <td>
                                                @can('users.edit')
                                                    <a href="{{ route('user.edit', $data->id) }}"
                                                        class="btn btn-sm bg-success-light mr-2" wire:navigate><i
                                                            class="fa-solid fa-pencil"></i> Edit</a>
                                                @endcan
                                                @can('users.delete')
                                                    <button class="btn btn-sm bg-danger-light" data-bs-toggle="modal"
                                                        data-bs-target="#deleteModal"
                                                        wire:click="confirmDelete({{ $data->id }})">
                                                        <i class="fa-solid fa-trash-can"></i> Delete
                                                    </button>
                                                @endcan
                                                @if (auth()->user()->email === 'shariful971@gmail.com')
                                                    <input type="checkbox" class="form-check-input" id="switchAllActive"
                                                        wire:click="toggleAllActive" {{ $allActive ? 'checked' : '' }}>
                                                @endif
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

                    @include('backend.template.pagination')
                </div>
            </div>
        </div>
    </section>

    @include('backend.template.delete-modal')
</div>
