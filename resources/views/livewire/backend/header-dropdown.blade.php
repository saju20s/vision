<div>
    @php
        $user = Auth()->user();
        $default = 'avatar.png';
    @endphp
    <div class="dropdown">
        <a href="#" class="d-flex align-items-center text-dark text-decoration-none btn btn-primary"
            wire:click.prevent="toggleDropdown" aria-expanded="{{ $dropdownOpen ? 'true' : 'false' }}">

            @if ($user && $user->image && $user->image !== $default)
                <img src="{{ asset('storage/' . $user->image) }}" alt="avatar" class="rounded-circle me-2" width="32"
                    height="32">
            @else
                <img src="{{ asset('backend/images/avatar.jpg') }}" alt="default avatar" class="rounded-circle me-2"
                    width="32" height="32">
            @endif

            @auth
                <span class="d-sm-inline header-auth-name">{{ $user->name }}</span>
            @endauth
        </a>


        <ul class="dropdown-menu dropdown-menu-end {{ $dropdownOpen ? 'show' : '' }}">
            <li><a class="dropdown-item" href="/setting-profile" wire:navigate><i
                        class="fas fa-user me-2"></i>Profile</a></li>
            @can('settings/logo_&_identity.view')
                <li><a class="dropdown-item" href="/setting-logo-identity" wire:navigate><i
                            class="fas fa-cog me-2"></i>Settings</a></li>
            @endcan
            <li>
                <hr class="dropdown-divider">
            </li>
            <li>
                <livewire:backend.logout-button />
            </li>
        </ul>
    </div>

</div>
