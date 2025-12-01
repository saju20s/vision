<div>

    <section class="product-section">
        <div class="content">
            <div class="container-fluid mt-5 pt-4">
                @include('backend.template.header')
                @include('backend.template.sidebar')

                <div class="row g-4">
                    <div class="table-responsive table-edit">
                        <form wire:submit.prevent="store" enctype="multipart/form-data">
                            <div class="row">
                                {{-- Left Column --}}
                                <div class="col-lg-8 col-md-8 mb-3">
                                    <div class="mb-3">
                                        <label for="name" class="form-label fw-semibold">Name</label>
                                        <input type="text" id="name" wire:model.defer="name" placeholder="Name"
                                            class="form-control" />
                                    </div>

                                    <div class="mb-3">
                                        <label for="email" class="form-label fw-semibold">Email</label>
                                        <input type="text" id="email" wire:model.defer="email" placeholder="Email"
                                            class="form-control" />
                                    </div>
                                    <div class="mb-3">
                                        <label for="edit_permissions">Role</label>
                                        <select wire:model="selectedRole" class="form-control custom-select-highlight "
                                            id="edit_permissions" required>
                                            <option value="" selected>Select Role</option>
                                            @foreach ($roles as $role)
                                                <option value="{{ $role }}">{{ $role }}</option>
                                            @endforeach
                                        </select>
                                    </div>


                                </div>

                                {{-- Right Column --}}
                                <div class="col-lg-4 col-md-4 mb-3">
                                    <div class="mb-3 position-relative">
                                        <label for="password" class="form-label fw-semibold">Password</label>
                                        <div class="input-group">
                                            <input type="password" id="password" wire:model.defer="password" placeholder="Password"
                                                class="form-control" />
                                            <span class="input-group-text bg-white">
                                                <i class="fa-solid fa-eye toggle-password"
                                                    onclick="togglePassword('password', this)"></i>
                                            </span>
                                        </div>
                                    </div>

                                    <div class="mb-3 position-relative">
                                        <label for="password_confirmation" class="form-label fw-semibold">Confirm
                                            Password</label>
                                        <div class="input-group">
                                            <input type="password" id="password_confirmation"
                                                wire:model.defer="password_confirmation" class="form-control" placeholder="Confirm Password" />
                                            <span class="input-group-text bg-white">
                                                <i class="fa-solid fa-eye toggle-password"
                                                    onclick="togglePassword('password_confirmation', this)"></i>
                                            </span>
                                        </div>
                                    </div>


                                    <button type="submit" class="btn btn-primary form-control my-2"
                                        wire:loading.attr="disabled">Add User</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @push('scripts')
        <script>
            function togglePassword(fieldId, icon) {
                const field = document.getElementById(fieldId);
                if (field.type === "password") {
                    field.type = "text";
                    icon.classList.remove("fa-eye");
                    icon.classList.add("fa-eye-slash");
                } else {
                    field.type = "password";
                    icon.classList.remove("fa-eye-slash");
                    icon.classList.add("fa-eye");
                }
            }
        </script>
    @endpush


</div>
