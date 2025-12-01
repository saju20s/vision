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
                                <div class="col-lg-6 col-md-8 mb-3">
                                    <div class="mb-3">
                                        <label for="name" class="form-label fw-semibold">Name</label>
                                        <input type="text" id="name" wire:model.defer="name"
                                            class="form-control" placeholder="Name" />
                                    </div>
                                    <div class="mb-3">
                                        <label for="phone" class="form-label fw-semibold">Phone</label>
                                        <input type="text" id="phone" wire:model.defer="phone"
                                            class="form-control" placeholder="Phone" />
                                    </div>
                                    <div class="mb-3">
                                        <label for="age" class="form-label fw-semibold">Age</label>
                                        <input type="text" id="age" wire:model.defer="age" class="form-control"
                                            placeholder="Age" />
                                    </div>                                  

                                    <div class="mb-3">
                                        <label for="specialization"
                                            class="form-label fw-semibold">Specialization</label>
                                        <select id="specialization" wire:model.defer="specialization"
                                            class="form-control">
                                            <option value="">-- Select Specialization --</option>
                                            <option value="Internal Medicine">Internal Medicine</option>
                                            <option value="Cardiology">Cardiology</option>
                                            <option value="Gastroenterology">Gastroenterology</option>
                                            <option value="Pulmonology">Pulmonology</option>
                                            <option value="Nephrology">Nephrology</option>
                                            <option value="Endocrinology">Endocrinology</option>
                                            <option value="Rheumatology">Rheumatology</option>
                                            <option value="Hematology">Hematology</option>
                                            <option value="Oncology">Oncology</option>
                                            <option value="Geriatrics">Geriatrics</option>
                                            <option value="Infectious Disease">Infectious Disease</option>
                                            <option value="Allergy & Immunology">Allergy & Immunology</option>
                                            <option value="General Surgery">General Surgery</option>
                                            <option value="Orthopedic Surgery">Orthopedic Surgery</option>
                                            <option value="Neurosurgery">Neurosurgery</option>
                                            <option value="Cardiothoracic Surgery">Cardiothoracic Surgery</option>
                                            <option value="Plastic Surgery">Plastic Surgery</option>
                                            <option value="Urology">Urology</option>
                                            <option value="Vascular Surgery">Vascular Surgery</option>
                                            <option value="Pediatric Surgery">Pediatric Surgery</option>
                                            <option value="Obstetrics & Gynecology">Obstetrics & Gynecology</option>
                                            <option value="Pediatrics">Pediatrics</option>
                                            <option value="Neurology">Neurology</option>
                                            <option value="Psychiatry">Psychiatry</option>
                                            <option value="Ophthalmology">Ophthalmology</option>
                                            <option value="ENT">ENT</option>
                                            <option value="Dentistry">Dentistry</option>
                                            <option value="Pathology">Pathology</option>
                                            <option value="Radiology">Radiology</option>
                                            <option value="Anesthesiology">Anesthesiology</option>
                                            <option value="Dermatology">Dermatology</option>
                                        </select>
                                    </div>



                                </div>

                                {{-- Right Column --}}
                                <div class="col-lg-6 col-md-4 mb-3">

                                    <div class="mb-3">
                                        <label for="qualification" class="form-label fw-semibold">Qualification</label>
                                        <input type="text" id="qualification" wire:model.defer="qualification"
                                            class="form-control" placeholder="Qualification MBBS, FCPS, MD..." />
                                    </div>                                   

                                    <div class="mb-3">
                                        <label for="designation" class="form-label fw-semibold">Designation</label>
                                        <select id="designation" wire:model.defer="designation" class="form-control">
                                            <option value="">-- Select Designation --</option>
                                            <option value="Professor">Professor</option>
                                            <option value="Associate Professor">Associate Professor</option>
                                            <option value="Assistant Professor">Assistant Professor</option>
                                            <option value="Consultant">Consultant</option>
                                            <option value="Associate Consultant">Associate Consultant</option>
                                            <option value="Junior Consultant">Junior Consultant</option>
                                            <option value="Senior Consultant">Senior Consultant</option>
                                            <option value="Resident Physician">Resident Physician</option>
                                            <option value="Medical Officer">Medical Officer</option>
                                            <option value="Junior Medical Officer">Junior Medical Officer</option>
                                            <option value="Senior Medical Officer">Senior Medical Officer</option>
                                            <option value="Registrar">Registrar</option>
                                            <option value="Assistant Registrar">Assistant Registrar</option>
                                            <option value="Specialist">Specialist</option>
                                            <option value="Junior Doctor">Junior Doctor</option>
                                            <option value="Intern Doctor">Intern Doctor</option>
                                            <option value="Honorary Medical Officer">Honorary Medical Officer</option>
                                            <option value="Lecturer">Lecturer</option>
                                        </select>
                                    </div>


                                    <div class="mb-3">
                                        <label for="gender" class="form-label fw-semibold">Gender</label>
                                        <select wire:model.defer="gender" id="gender" class="form-control">
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        {{-- Image Preview --}}
                                        @if ($image)
                                            <div class="mb-3">
                                                <img src="{{ $image->temporaryUrl() }}" loading="lazy"
                                                    class="img-fluid rounded shadow image-preview" alt="Preview">
                                            </div>
                                        @endif

                                        <label for="image" class="form-label fw-semibold">Thumbnail Image (736x736)</label>
                                        <input type="file" id="image" wire:model="image"
                                            class="form-control fImage" />
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary form-control my-2"
                                        wire:loading.attr="disabled">Add Doctor</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>

</div>
