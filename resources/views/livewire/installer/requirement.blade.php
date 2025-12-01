<div>

    <div class="step-progress">
        <div class="step completed">
            <div class="step-number">1</div>
            <div class="step-title">Welcome</div>
        </div>
        <div class="step active">
            <div class="step-number">2</div>
            <div class="step-title">Requirements</div>
        </div>
        <div class="step">
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


    <div class="installation-requirements">
        <div class="requirements-header mb-4">
            <h2 class="fw-bold">System Requirements Verification</h2>
            <p class="text-muted">Before proceeding with installation, we need to verify that your server environment
                meets all necessary requirements.</p>
        </div>

        <div class="card shadow-sm">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead class="table-light">
                            <tr>
                                <th width="70%">Requirement Extensions</th>
                                <th width="30%" class="text-center">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($requirements as $requirement => $status)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            @if (str_contains($requirement, 'PHP'))
                                                <i class="bi bi-filetype-php text-primary me-2"></i>
                                            @elseif(str_contains($requirement, 'extension'))
                                                <i class="bi bi-puzzle text-info me-2"></i>
                                            @else
                                                <i class="bi bi-gear text-secondary me-2"></i>
                                            @endif
                                            {{ $requirement }}
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        @if ($status)
                                            <span class="badge bg-success rounded-pill px-3 py-2">
                                                <i class="bi bi-check-circle-fill me-1"></i> Passed
                                            </span>
                                        @else
                                            <span class="badge bg-danger rounded-pill px-3 py-2">
                                                <i class="bi bi-exclamation-circle-fill me-1"></i> Failed
                                            </span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        @if (!in_array(false, $requirements))
            <div class="alert alert-success mt-4 d-flex align-items-center">
                <i class="bi bi-check-circle-fill fs-4 me-3"></i>
                <div>
                    <h5 class="alert-heading mb-1">All requirements satisfied!</h5>
                    <p class="mb-0">Your server meets all the necessary requirements to proceed with the installation.
                    </p>
                </div>
            </div>
        @else
            <div class="alert alert-danger mt-4 d-flex align-items-center">
                <i class="bi bi-exclamation-triangle-fill fs-4 me-3"></i>
                <div>
                    <h5 class="alert-heading mb-1">Requirements not met</h5>
                    <p class="mb-0">Please address the failed requirements before continuing with the installation.
                    </p>
                </div>
            </div>
        @endif

        <div class="d-flex justify-content-between mt-4 pt-3 border-top">
            <a href="/installer/welcome" class="btn btn-outline-secondary px-4" wire:navigate>
                <i class="bi bi-arrow-left-short"></i> Back
            </a>
            @if (!in_array(false, $requirements))
                <a href="/installer/permissions" class="btn btn-primary px-4" wire:navigate>
                    Next <i class="bi bi-arrow-right-short"></i>
                </a>
            @else
                <button class="btn btn-primary px-4" disabled>
                    next <i class="bi bi-arrow-right-short"></i>
                </button>
            @endif
        </div>
    </div>



</div>
