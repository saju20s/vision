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
        <div class="step completed">
            <div class="step-number">3</div>
            <div class="step-title">Permissions</div>
        </div>
        <div class="step active">
            <div class="step-number">4</div>
            <div class="step-title">Environment</div>
        </div>
        <div class="step">
            <div class="step-number">5</div>
            <div class="step-title">Finish</div>
        </div>
    </div>


    <h2 class="fw-bold mb-3">Environment Configuration</h2>

    @foreach ($groups as $groupName => $groupVars)
        <div class="card shadow-sm mb-4">
            <div class="card-header bg-primary text-white d-flex justify-content-between">
                <span>
                    <i class="bi bi-gear me-2"></i> {{ ucfirst($groupName) }} Settings
                </span>

                @if (in_array($groupName, ['database', 'mail', 'imap']))
                    <button wire:click="testConnection('{{ $groupName }}')" type="button"
                        class="btn btn-sm btn-light">
                        Test {{ ucfirst($groupName) }}
                    </button>
                @endif
            </div>
            <div class="card-body row g-3">
                @foreach ($groupVars as $var)
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">{{ $var }}</label>
                        @if (str($var)->contains(['PASSWORD', 'APP_KEY']))
                            <input type="password" wire:model.defer="envVars.{{ $var }}" class="form-control">
                        @elseif ($var === 'APP_DEBUG')
                            <select wire:model.defer="envVars.{{ $var }}" class="form-select">
                                <option value="true">True</option>
                                <option value="false">False</option>
                            </select>
                        @else
                            <input type="text" wire:model.defer="envVars.{{ $var }}" class="form-control">
                        @endif
                        <small class="text-muted">{{ $this->getEnvDescription($var) }}</small>
                    </div>
                @endforeach
            </div>
        </div>
    @endforeach

    <div class="d-flex justify-content-between mt-4">
        <a href="/installer/permissions" class="btn btn-outline-secondary" wire:navigate>
            <i class="bi bi-arrow-left-short"></i> Back
        </a>
        <!-- If you want to keep it as a link style, use button with wire:click -->
        <button type="button" class="btn btn-primary" wire:click="save">
            Save & Continue <i class="bi bi-arrow-right-short"></i>
        </button>

    </div>

    <!-- Modal -->
    @if ($testModalVisible)
        <div class="modal fade show d-block" tabindex="-1" style="background-color: rgba(0,0,0,0.5);">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5>Connection Test: {{ ucfirst($testType) }}</h5>
                        <button type="button" wire:click="$set('testModalVisible', false)" class="btn-close"></button>
                    </div>
                    <div class="modal-body">
                        <p>{!! $testMessage !!}</p>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
