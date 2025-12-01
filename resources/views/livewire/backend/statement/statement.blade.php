<div>


    <section class="product-section">
        <div class="content">
            <div class="container-fluid mt-5 pt-4">
                @include('backend.template.header')
                @include('backend.template.sidebar')
                <div class="row g-4">
                    <div class="col-md-12">
                        <div class="table-responsive table-show">
                            <table class="table table-hover align-middle  mt-5">
                                <thead class="table-secondary">
                                    <tr>
                                        <th scope="col">Statement One</th>
                                        <th scope="col">Statement Two</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr wire:loading wire:target="render">
                                        <td colspan="6">
                                            <div class="d-flex align-items-center justify-content-center all-loading-header">
                                                <div class="text-center">
                                                    <div class="spinner-border text-secondary mb-2" role="status">
                                                    </div><br>
                                                    <span class="text-muted">Loading ...</span>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr wire:loading.remove>
                                        <td>{!! $datas->affidavit_one !!}</td>
                                        <td>{!! $datas->affidavit_two !!}</td>
                                        <td>
                                            @can('statement.edit')
                                                <a href="{{ route('statement.edit', $datas->id) }}"
                                                    class="btn btn-sm bg-success-light mr-2" wire:navigate><i
                                                        class="fa-solid fa-pencil"></i> Edit</a>
                                            @endcan
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>
