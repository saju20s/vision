<div>
    <section class="product-section">
        <div class="content">
            <div class="container-fluid mt-5 pt-4">
                @include('backend.template.header')
                @include('backend.template.sidebar')
                <div class="row g-4">
                    <div class="col-12">
                        <div class="card role-card">
                            <div class="card-body">
                                <div class="form-group mb-4">
                                    <label for="role_name" class="form-label fw-semibold">Role Name</label>
                                    <input type="text" wire:model.lazy="role_name"
                                        class="form-control form-control-lg mt-1" placeholder="Role name">
                                </div>
                                <div class="row">
                                    <div class="mb-3">

                                        <div class="form-group">
                                            <div
                                                class="row bg-light border rounded py-2 fw-semibold align-items-center mb-3 role-header-m">
                                                <div class="col-2">Menu</div>
                                                <div class="col-2">Select All</div>
                                                <div class="col-6">Permissions</div>
                                            </div>

                                            @foreach ($groupedPermissions as $groupName => $permissions)
                                                <div
                                                    class="row mb-3 align-items-start border-bottom pb-3 permission-checkbox role-header-m">
                                                    <div class="col-2 d-flex align-items-center">
                                                        <label
                                                            class="form-check-label mb-0 fw-semibold text-capitalize">
                                                            {{ ucwords(str_replace('_', ' ', $groupName)) }}
                                                        </label>
                                                    </div>

                                                    <div class="col-2">
                                                        <button type="button"
                                                            class="btn btn-sm btn-outline-success w-25 {{ $this->isGroupFullySelected($permissions) ? 'active' : '' }}"
                                                            wire:click="toggleGroupPermissions('{{ $groupName }}', @js($permissions->values()))">
                                                            All
                                                        </button>
                                                    </div>

                                                    <div class="col-6 d-flex flex-wrap gap-4 mb-2">
                                                        @foreach ($permissions as $permission)
                                                            <div class="form-check">
                                                                <input type="checkbox" class="form-check-input"
                                                                    wire:model="selectedPermissions"
                                                                    value="{{ $permission->name }}"
                                                                    id="permission-{{ $permission->id }}">
                                                                <label for="permission-{{ $permission->id }}"
                                                                    class="form-check-label text-muted small">
                                                                    {{ explode('.', $permission->name)[1] ?? $permission->name }}
                                                                </label>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            @endforeach
                                            <div class="text-end mt-4">
                                                <button wire:click.prevent="update" class="btn btn-primary px-4 py-2">
                                                    <i class="fas fa-save me-1"></i> Update
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- card-body -->
                        </div> <!-- card -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    @push('scripts')
        <script>
            Livewire.on('syncSelectAllCheckboxes', () => {
                // Optional: do nothing for now
            });
        </script>
    @endpush
</div>
