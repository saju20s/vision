<div>
    <section class="product-section">
        <div class="content">
            <div class="container-fluid mt-5 pt-4">
                @include('backend.template.header')
                @include('backend.template.sidebar')
                <div class="row g-4">
                    <div class="col-md-12">
                        <div class="card reply-card">
                            <div class="card-header">
                                <strong><i class="fas fa-envelope-open-text me-2"></i>Message Conversation</strong>
                            </div>

                            {{-- Messages --}}
                            <div class="card-body chat-box">
                                {{-- User Message --}}
                                <div class="d-flex align-items-start mb-4">
                                    <img src="{{ asset('backend/images/avatar.jpg') }}" alt="User Photo"
                                        class="rounded-circle me-2 user-photo">
                                    <div class="user-message">
                                        <span class="text-dark">{{ $message->message }}</span> {{-- Eloquent model --}}
                                    </div>
                                </div>


                                {{-- Admin Replies (looped) --}}
                                @foreach ($replies as $reply)
                                    <div class="d-flex align-items-start justify-content-end mb-3">
                                        <div class="admin-message">
                                            <span>{{ $reply->reply }}</span><br>
                                            <small class="d-block mt-1 fst-italic">{{ $reply->user->name }}</small>
                                        </div>
                                        @if ($reply->user->image == 'avatar.png')
                                            <img class="rounded-circle ms-2 admin-photo"
                                                src="{{ asset('backend/images/avatar.jpg') }}" alt="Page Image"
                                                loading="lazy">
                                        @elseif ($reply->user->image)
                                            <img class="rounded-circle ms-2 admin-photo"
                                                src="{{ asset('storage/' . $reply->user->image) }}" alt="Page Image"
                                                loading="lazy">
                                        @endif
                                    </div>
                                @endforeach
                            </div>

                            {{-- Reply Form --}}
                            <form wire:submit.prevent="store"
                                class="card-footer bg-white rounded-bottom-4 p-3 border-top">
                                <div class="input-group">
                                    <input type="text" wire:model.defer="reply_message"
                                        class="form-control rounded-start-pill" placeholder="Type your reply...">
                                    <button type="submit" class="btn btn-primary rounded-end-pill">
                                        <i class="fas fa-paper-plane"></i>
                                    </button>
                                </div>
                                @error('reply_message')
                                    <small class="text-danger d-block mt-1">{{ $message }}</small>
                                @enderror
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
