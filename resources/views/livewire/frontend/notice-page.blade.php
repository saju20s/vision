<div>
    <section class="notice-section">
        <div class="container-fluid p-0 mb-4">
            @if ($setting->banner)
                <img src="{{ asset('storage/' . $setting->banner) }}" alt="Banner" class="w-100 rounded-bottom shadow banner-img">
            @else
                <span class="text-muted text-center"></span>
            @endif
        </div>
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-12 mt-4">
                    <h1 class="text-primary mb-1 fw-bold three-d-text subheading">Health Checkup Packages</h1>
                </div>
                <!-- Notice Item -->
                <div class="col-lg-12">
                    <table class="table table-bordered">
                        <tr class="table-secondary">
                            <th>SL</th>
                            <th>Package Name</th>
                            <th>File</th>
                            <th>Details</th>
                        </tr>
                        @foreach ($datas as $data)
                            <tr>
                                <td>{{ $loop->iteration + ($datas->currentPage() - 1) * $datas->perPage() }}</td>
                                <td width="70%">
                                    <p>{{ $data->title }}</p>
                                </td>
                                <td>
                                    <a href="{{ url('/view-notice/' . $data->id) }}"
                                        class="btn btn-sm bg-success-light mr-2" wire:navigate>
                                        <i class="fas fa-eye"></i> View
                                    </a>
                                </td>

                                @php
                                    $downloadSource = $data->file
                                        ? asset('storage/' . $data->file)
                                        : ($data->image
                                            ? asset('storage/' . $data->image)
                                            : null);
                                @endphp

                                <td>
                                    @if ($downloadSource)
                                        <a href="{{ $downloadSource }}" class="btn btn-sm bg-success-light mr-2"
                                            download>
                                            <i class="fas fa-download"></i> Download
                                        </a>
                                    @else
                                        <button class="btn btn-secondary" disabled>
                                            <i class="fas fa-ban"></i> No File
                                        </button>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
                {{ $datas->links() }}

            </div>
        </div>
    </section>
    <hr>
</div>
