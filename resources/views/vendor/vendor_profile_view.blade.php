@extends('vendor.vendor_dashboard')
@section('vendor')
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Vendor User Profile</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item">
                            <a href="{{ route('vendor.dashboard') }}"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Vendor Profile</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->
        <div class="container">
            <div class="main-body">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <form class="row g-3" id="store-profile-form" method="post"
                                    action="{{ route('vendor.profile.additionalDetails') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="d-flex flex-column align-items-center text-center">
                                        <div class="vendorProfilePic">
                                            <img src="{{ !empty($vendorData->photo) ? url('upload/vendor_images/' . $vendorData->photo) : url('upload/no_image.jpg') }}"
                                                alt="{{ $vendorData->name }}"
                                                class="img-fluid p-1 bg-light bg-gradient vendorShowImage"
                                                id="vendorShowImage">
                                            <div class="vendorProfileUpload">
                                                <input type="file" class="form-control p-0" name="photo"
                                                    id="vendorImage" accept=".jpg, .png, image/jpeg, image/png" />
                                                <i class="fa-solid fa-camera"></i>
                                            </div>

                                        </div>
                                        <div class="mt-3">
                                            <h4>{{ $vendorData->name }}</h4>
                                            <p class="text-secondary mb-1">{{ $vendorData->email }}</p>
                                            <p class="text-muted mb-0 font-size-sm">{{ $vendorData->address }}</p>
                                            {{-- 
                                                //TODO : How i show ckeditor value in UI  
                                                <p class="text-muted mb-0 font-size-sm">{!! $vendorData->vendor_short_info !!} 
                                            --}}
                                            </p>
                                        </div>

                                    </div>
                                    <hr class="my-3" />
                                    <div class="socialMedia-wrapper mt-0">
                                        <button type="button" class="socialMedia-addBtn float-end" data-bs-toggle="modal"
                                            data-bs-target="#socialMedia-addBtn">
                                            <i class="fa-solid fa-plus"></i>
                                        </button>
                                    </div>
                                    <div class="socialMedia-wrapper mt-0">
                                        <ul class="list-group list-group-flush mt-2">
                                            <li
                                                class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                                <div class="d-flex align-items-center ">
                                                    <img src="{{ asset('adminBackend/assets/images/Instagram-logo.svg') }}"
                                                        class="img-fluid socialMedia-icon" alt="">
                                                    <h6 class="mb-0">Instagram</h6>
                                                </div>
                                                <a class="text-secondary" href="#" target="_blank">codervent</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-md-12 text-secondary text-center">
                                        <input type="submit" class="btn btn-primary px-4" value="Update" disabled />
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-body">
                                <div class="accordion" id="profileAccordion">

                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="personalDetails">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#personalDetailsCollapse" aria-expanded="true"
                                                aria-controls="personalDetailsCollapse">
                                                Personal Details
                                            </button>
                                        </h2>
                                        <div id="personalDetailsCollapse" class="accordion-collapse collapse show"
                                            aria-labelledby="personalDetails" data-bs-parent="#profileAccordion">
                                            <div class="accordion-body">
                                                <form class="row g-3" id="profile-form" method="post"
                                                    action="{{ route('vendor.profile.personalDetails') }}"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="col-md-6">
                                                        <label for="username"
                                                            class="form-label @error('username')text-danger @enderror">Username
                                                            <span class="text-danger">*</span></label>
                                                        <input type="text"
                                                            class="form-control @error('username') is-invalid @enderror"
                                                            id="username" name="username"
                                                            value="{{ $vendorData->username }}" disabled />
                                                        @error('username')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="email"
                                                            class="form-label @error('email')text-danger @enderror">Email
                                                            <span class="text-danger">*</span></label>
                                                        <input type="email"
                                                            class="form-control @error('email') is-invalid @enderror"
                                                            id="email" name="email"
                                                            value="{{ $vendorData->email }}" disabled />
                                                        @error('email')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-12">
                                                        <label for="name"
                                                            class="form-label @error('name')text-danger @enderror">Full
                                                            Name <span class="text-danger">*</span></label>
                                                        <input type="text"
                                                            class="form-control @error('name') is-invalid @enderror"
                                                            id="name" name="name"
                                                            value="{{ $vendorData->name }}" />
                                                        @error('name')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="phone"
                                                            class="form-label @error('phone')text-danger @enderror">Phone
                                                            <span class="text-danger">*</span></label>
                                                        <input type="text"
                                                            class="form-control @error('phone') is-invalid @enderror"
                                                            id="phone" name="phone"
                                                            value="{{ $vendorData->phone }}" />
                                                        @error('phone')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>

                                                    <div class="col-md-6">
                                                        <label for="dob" class="form-label">
                                                            Date of Birth
                                                        </label>
                                                        <input type="date" class="result form-control" id="dob"
                                                            name="dob" value="{{ $vendorData->dob }}"
                                                            placeholder="Date Picker..." />
                                                    </div>

                                                    <div class="col-md-4">
                                                        <label for="country" class="form-label">Country</label>
                                                        <select class="form-select" id="country" name="country">
                                                            @if ($vendorData->country)
                                                                <option value="{{ $vendorData->country }}" selected>
                                                                    {{ $vendorData->country }}</option>
                                                            @else
                                                                <option value="">Select Country</option>
                                                            @endif
                                                            @foreach ($countries as $data)
                                                                <option value="{{ $data->id }}">{{ $data->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label for="state" class="form-label">State</label>
                                                        <select class="form-select" id="state" name="state"
                                                            disabled>
                                                            @if ($vendorData->state)
                                                                <option value="{{ $vendorData->state }}" selected>
                                                                    {{ $vendorData->state }}
                                                                </option>
                                                            @else
                                                                <option value="">Select State</option>
                                                            @endif
                                                        </select>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label for="city" class="form-label">City</label>
                                                        <select class="form-select" id="city" name="city"
                                                            disabled>
                                                            @if ($vendorData->city)
                                                                <option value="{{ $vendorData->city }}" selected>
                                                                    {{ $vendorData->city }}
                                                                </option>
                                                            @else
                                                                <option value="">Select City</option>
                                                            @endif
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="street" class="form-label">Street</label>
                                                        <input type="text" class="form-control" id="street"
                                                            name="street" value="{{ $vendorData->street }}" />
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label for="landmark" class="form-label">Landmark</label>
                                                        <input type="text" class="form-control" id="landmark"
                                                            name="landmark" value="{{ $vendorData->landmark }}" />
                                                    </div>
                                                    <div class="col-md-2 mb-2">
                                                        <label for="pincode" class="form-label">Pincode</label>
                                                        <input type="text" class="form-control" id="pincode"
                                                            name="pincode" value="{{ $vendorData->pincode }}" />
                                                    </div>

                                                    <div class="col-md-12 mb-2">
                                                        <label for="shortInfo" class="form-label">Short
                                                            Description</label>
                                                        <textarea class="form-control" id="shortInfo" name="shortInfo" rows="3">
                                                            {{ $vendorData->vendor_short_info }}
                                                        </textarea>
                                                    </div>

                                                    <div class="col-md-12 text-secondary text-center">
                                                        <input type="submit" class="btn btn-primary px-4"
                                                            value="Update Details" disabled />
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="shopDetails">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#shopDetailsCollapse"
                                                aria-expanded="true" aria-controls="shopDetailsCollapse">
                                                Shop Details
                                            </button>
                                        </h2>
                                        <div id="shopDetailsCollapse" class="accordion-collapse collapse"
                                            aria-labelledby="shopDetails" data-bs-parent="#profileAccordion">
                                            <div class="accordion-body">
                                                <form class="row g-3" id="shop-profile-form" method="post"
                                                    action="{{ route('vendor.profile.shopDetails') }}">
                                                    @csrf
                                                    <div class="col-md-12">
                                                        <label for="vendorShopName"
                                                            class="form-label @error('vendorShopName')text-danger @enderror">
                                                            Shop Name <span class="text-danger">*</span></label>
                                                        <input type="text"
                                                            class="form-control @error('vendorShopName') is-invalid @enderror"
                                                            id="vendorShopName" name="vendorShopName"
                                                            value="{{ $vendorData->shop_name }}" />
                                                        @error('vendorShopName')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-6 mb-2">
                                                        <label for="vendorJoinDate"
                                                            class="form-label @error('vendorJoinDate')text-danger @enderror">Join
                                                            Date <span class="text-danger">*</span></label>
                                                        <input type="date"
                                                            class="form-control @error('vendorJoinDate') is-invalid @enderror"
                                                            id="vendorJoinDate" name="vendorJoinDate"
                                                            value="{{ $vendorData->vendor_join }}" />
                                                        @error('vendorJoinDate')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-6 mb-2">
                                                        <label for="vendorGst"
                                                            class="form-label @error('vendorGst')text-danger @enderror">GST
                                                            Number <span class="text-danger">*</span></label>
                                                        <input type="text"
                                                            class="form-control @error('vendorGst') is-invalid @enderror"
                                                            id="vendorGst" name="vendorGst"
                                                            value="{{ $vendorData->vendor_gst }}" />
                                                        @error('vendorGst')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-12 text-secondary text-center">
                                                        <input type="submit" class="btn btn-primary px-4"
                                                            value="Update Details" disabled />
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Social Media Add Modal -->
    <div class="modal fade" id="socialMedia-addBtn" tabindex="-1" aria-labelledby="socialMedia-addBtnLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="socialMedia-addBtnLabel">Add Social Media</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 mb-2">
                            <label for="platform-icon" class="form-label">Platform icon</label>
                            <input type="file" class="form-control" id="platform-icon" name="platform-icon"
                                value="" accept=".jpg, .png, .svg, image/jpeg, image/png" />
                        </div>
                        <div class="col-md-12 mb-2">
                            <label for="platform-link" class="form-label">Platform link</label>
                            <input type="text" class="form-control" id="platform-link" name="platform-link"
                                value="" />
                        </div>
                        <div class="col-md-6 mb-2">
                            <label for="platform-title" class="form-label">Platform title</label>
                            <input type="text" class="form-control" id="platform-title" name="platform-title"
                                value="" />
                        </div>
                        <div class="col-md-6 mb-4">
                            <label for="usertitle" class="form-label">Usertitle / Prefer title</label>
                            <input type="text" class="form-control" id="usertitle" name="usertitle"
                                value="" />
                        </div>
                        <div class="col-md-12 text-center">
                            <button type="button" class="btn btn-primary">Add changes</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#shortInfo'), {
                toolbar: {
                    items: [
                        'undo', 'redo',
                        '|', 'heading',
                        '|', 'bold', 'italic',
                        '|', 'alignment',
                        '|', 'link', ,
                        '|', 'bulletedList',
                    ],
                    shouldNotGroupWhenFull: false
                },
                placeholder: 'Enter short description here',
                htmlEmbed: {
                    showPreviews: false
                },
            })
            .catch(error => {
                console.error(error);
            });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            var originalFormData = $('#profile-form').serialize(); // Store the initial form data

            $('#vendorImage').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#vendorShowImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });

            // Disable state and city dropdowns initially
            $("#state, #city").prop("disabled", true);

            // Enable state dropdown when country is selected
            $('#country').change(function(event) {
                if ($(this).val() !== "") {
                    $("#state").prop("disabled", false);
                } else {
                    $("#state").prop("disabled", true);
                    $("#city").prop("disabled", true);
                }
                var idCountry = this.value;
                $('#state').html('');

                $.ajax({
                    url: "/vendor/api/fetch-state",
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        country_id: idCountry,
                        _token: "{{ csrf_token() }}"
                    },
                    success: function(response) {
                        $('#state').html('<option value="">Select State</option>');
                        $.each(response.states, function(index, val) {
                            $('#state').append('<option value="' + val.id + '"> ' + val
                                .name + ' </option>')
                        });
                        // $('#city').html('<option value="">Select City</option>');
                    }
                })
            });

            // Enable city dropdown when state is selected
            $('#state').change(function(event) {
                if ($(this).val() !== "") {
                    $("#city").prop("disabled", false);
                } else {
                    $("#city").prop("disabled", true);
                }
                var idState = this.value;
                $('#city').html('');
                $.ajax({
                    url: "/vendor/api/fetch-cities",
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        state_id: idState,
                        _token: "{{ csrf_token() }}"
                    },
                    success: function(response) {
                        $('#city').html('<option value="">Select City</option>');
                        $.each(response.cities, function(index, val) {
                            $('#city').append('<option value="' + val.id + '"> ' + val
                                .name + ' </option>')
                        });
                    }
                })
            });

            // Check for changes in the form fields
            $('#profile-form :input').on('input change', function() {
                // Serialize the current form data
                var currentFormData = $('#profile-form').serialize();

                // Enable/disable the button based on whether there are changes
                if (currentFormData !== originalFormData) {
                    $('#profile-form .btn').prop('disabled', false);
                } else {
                    $('#profile-form .btn').prop('disabled', true);
                }
            });

            $('#store-profile-form :input').on('input change', function() {
                // Serialize the current form data
                var currentFormData = $('#store-profile-form').serialize();

                // Enable/disable the button based on whether there are changes
                if (currentFormData !== originalFormData) {
                    $('#store-profile-form .btn').prop('disabled', false);
                } else {
                    $('#store-profile-form .btn').prop('disabled', true);
                }
            });

            $('#shop-profile-form :input').on('input change', function() {
                // Serialize the current form data
                var currentFormData = $('#shop-profile-form').serialize();

                // Enable/disable the button based on whether there are changes
                if (currentFormData !== originalFormData) {
                    $('#shop-profile-form .btn').prop('disabled', false);
                } else {
                    $('#shop-profile-form .btn').prop('disabled', true);
                }
            });
        });
    </script>
@endsection
