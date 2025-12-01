<div class="text-center">
    @if ($installed)
        <!-- success message -->
        <div class="mb-4">
            <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" fill="#198754" class="bi bi-check-circle" viewBox="0 0 16 16">
                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                <path d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z"/>
            </svg>
        </div>

        <h4>Installation Complete!</h4>
        <p>Your policebd application has been successfully installed.</p>

        <div class="alert alert-success mt-4">
            <strong>Admin Credentials:</strong><br>
            Email: shariful971@gmail.com<br>
            Password: shariful971@gmail.com
        </div>

        <div class="mt-4">
            <a href="{{ url('/') }}" class="btn btn-primary btn-lg">
                Go to Homepage <i class="bi bi-box-arrow-right"></i>
            </a>
        </div>
    @else
        @if ($message)
            <div class="alert alert-danger">
                <strong>Installation failed:</strong><br>
                {{ $message }}
            </div>
        @else
            <p>Finishing installation...</p>
        @endif
    @endif
</div>
