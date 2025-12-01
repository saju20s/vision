{{-- Sharif Delete Modal --}}
<div wire:ignore.self class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <div class="my-3 text-center">
                    <h1 class="text-danger delete-close animate__animated animate__bounceIn"><i class="fa-regular fa-circle-xmark"></i></h1>
                    <h5 class="text-muted"> Are you sure ?</h5>
                    <p>Delete this Data</p>
                </div>
            </div>
            <div class="mb-4 text-center m-auto">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" wire:click="delete" data-bs-dismiss="modal">
                    Yes
                </button>
            </div>
        </div>
    </div>
</div>
