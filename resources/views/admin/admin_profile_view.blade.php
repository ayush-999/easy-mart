@extends('admin.admin_dashboard')
@section('admin')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Admin User Profile</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.dashboard') }}"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Admin Profile</li>
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
                                    action="{{ route('admin.profile.additionalDetails') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="d-flex flex-column align-items-center text-center">
                                        <div class="adminProfilePic">
                                            <img src="{{ !empty($adminData->photo) ? url('upload/admin_images/' . $adminData->photo) : url('upload/no_image.jpg') }}"
                                                alt="{{ $adminData->name }}"
                                                class="img-fluid p-1 bg-light bg-gradient adminShowImage"
                                                id="adminShowImage">
                                            <div class="adminProfileUpload">
                                                <input type="file" class="form-control p-0" name="photo"
                                                    id="adminImage" accept=".jpg, .png, image/jpeg, image/png" />
                                                <i class="fa-solid fa-camera"></i>
                                            </div>
                                        </div>
                                        <div class="mt-3">
                                            <h4>{{ $adminData->name }}</h4>
                                            <p class="text-secondary mb-1">{{ $adminData->email }}</p>
                                            <p class="text-muted mb-0 font-size-sm">{{ $adminData->address }}</p>
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
                                                data-bs-target="#collapseOne" aria-expanded="true"
                                                aria-controls="collapseOne">
                                                Personal Details
                                            </button>
                                        </h2>
                                        <div id="collapseOne" class="accordion-collapse collapse show"
                                            aria-labelledby="personalDetails" data-bs-parent="#profileAccordion">
                                            <div class="accordion-body">
                                                <form class="row g-3" id="profile-form" method="post"
                                                    action="{{ route('admin.profile.personalDetails') }}"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="col-md-6">
                                                        <label for="username"
                                                            class="form-label @error('username')text-danger @enderror">Username
                                                            <span class="text-danger">*</span></label>
                                                        <input type="text"
                                                            class="form-control @error('username') is-invalid @enderror"
                                                            id="username" name="username"
                                                            value="{{ $adminData->username }}" disabled />
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
                                                            value="{{ $adminData->email }}" disabled />
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
                                                            value="{{ $adminData->name }}" />
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
                                                            value="{{ $adminData->phone }}" />
                                                        @error('phone')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>

                                                    <div class="col-md-6">
                                                        <label for="dob" class="form-label">
                                                            Date of Birth
                                                        </label>
                                                        <input type="date" class="result form-control" id="dob"
                                                            name="dob" value="{{ $adminData->dob }}"
                                                            placeholder="Date Picker..." />
                                                    </div>

                                                    <div class="col-md-4">
                                                        <label for="country" class="form-label">Country</label>
                                                        <select class="form-select" id="country" name="country">
                                                            @if ($adminData->country)
                                                                <option value="{{ $adminData->country }}" selected>
                                                                    {{ $adminData->country }}</option>
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
                                                            @if ($adminData->state)
                                                                <option value="{{ $adminData->state }}" selected>
                                                                    {{ $adminData->state }}
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
                                                            @if ($adminData->city)
                                                                <option value="{{ $adminData->city }}" selected>
                                                                    {{ $adminData->city }}
                                                                </option>
                                                            @else
                                                                <option value="">Select City</option>
                                                            @endif
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="street" class="form-label">Street</label>
                                                        <input type="text" class="form-control" id="street"
                                                            name="street" value="{{ $adminData->street }}" />
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label for="landmark" class="form-label">Landmark</label>
                                                        <input type="text" class="form-control" id="landmark"
                                                            name="landmark" value="{{ $adminData->landmark }}" />
                                                    </div>
                                                    <div class="col-md-2 mb-2">
                                                        <label for="pincode" class="form-label">Pincode</label>
                                                        <input type="text" class="form-control" id="pincode"
                                                            name="pincode" value="{{ $adminData->pincode }}" />
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
    <script type="text/javascript">
        $(document).ready(function() {
            var originalFormData = $('#profile-form').serialize(); // Store the initial form data
            $('#adminImage').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#adminShowImage').attr('src', e.target.result);
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
                    url: "/admin/api/fetch-state",
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
                    url: "/admin/api/fetch-cities",
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
        });
    </script>
@endsection
