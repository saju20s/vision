<div>

    <section class="product-section">
        <div class="content">
            <div class="container-fluid mt-5 pt-4">
                @include('backend.template.header')
                @include('backend.template.sidebar')

                <div class="row g-4">
                    <div class="table-responsive table-edit">
                        <form wire:submit.prevent="update">
                            <div class="row">
                                {{-- Left Column --}}
                                <div class="col-lg-8 col-md-8 mb-3">
                                    <div class="mb-3">
                                        <label for="name" class="form-label fw-semibold">Name</label>
                                        <input type="text" id="name" wire:model.defer="name" placeholder="Name"
                                            class="form-control" />
                                    </div>

                                    <div class="mb-3">
                                        <label for="email" class="form-label fw-semibold">Email <small
                                                class="text-warning">
                                                (Note: This email is linked to your account
                                                identity. Change with caution.)
                                            </small></label>
                                        <input type="text" id="email" wire:model.defer="email"
                                            placeholder="Email" class="form-control" />
                                    </div>
                                </div>

                                {{-- Right Column --}}
                                <div class="col-lg-4 col-md-4">
                                    <div class="mb-3">
                                        <label for="edit_permissions">Roles</label>
                                        <select wire:model="selectedRoles" id="edit_permissions" multiple
                                            class="form-control custom-select-highlight user-select-height" required>
                                            @foreach ($roles as $role)
                                                <option value="{{ $role }}">{{ $role }}</option>
                                            @endforeach
                                        </select>
                                        <small class="text-muted">Hold Ctrl (Windows) or Command (Mac) to select
                                            multiple roles.</small>
                                    </div>
                                    <button type="submit" class="btn btn-primary form-control my-2"
                                        wire:loading.attr="disabled">Update User</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>
