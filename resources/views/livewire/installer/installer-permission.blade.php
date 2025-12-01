<div>

    <div class="step-progress">
        <div class="step completed">
            <div class="step-number">1</div>
            <div class="step-title">Welcome</div>
        </div>
        <div class="step completed">
            <div class="step-number">2</div>
            <div class="step-title">Requirements</div>
        </div>
        <div class="step active">
            <div class="step-number">3</div>
            <div class="step-title">Permissions</div>
        </div>
        <div class="step">
            <div class="step-number">4</div>
            <div class="step-title">Environment</div>
        </div>
        <div class="step">
            <div class="step-number">5</div>
            <div class="step-title">Finish</div>
        </div>
    </div>


    <div class="installation-permissions">
        <h4>File Permissions</h4>
        <p>These folders and files need to be writable by the web server.</p>

        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th>File/Folder</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($permissions as $permission => $status)
                    <tr>
                        <td>{{ $permission }}</td>
                        <td>
                            @if ($status)
                                <span class="badge bg-success">Writable</span>
                            @else
                                <span class="badge bg-danger">Not Writable</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-4 d-flex justify-content-between">
            <a href="/installer/requirements" class="btn btn-outline-secondary" wire:navigate>
                <i class="bi bi-arrow-left"></i> Back
            </a>
            @if (!in_array(false, $permissions))
                <a href="/installer/environment" class="btn btn-primary" wire:navigate>
                    Next <i class="bi bi-arrow-right"></i>
                </a>
            @else
                <button class="btn btn-primary" disabled>
                    Next <i class="bi bi-arrow-right"></i>
                </button>
            @endif
        </div>
    </div>



</div>
