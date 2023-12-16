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
                                <form class="row g-3" method="post" action="{{ route('admin.profile.store') }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="d-flex flex-column align-items-center text-center">
                                        <img src="{{ !empty($adminData->photo) ? url('upload/admin_images/' . $adminData->photo) : url('upload/no_image.jpg') }}"
                                            alt="{{ Auth::user()->name }}"
                                            class="rounded-circle img-fluid p-1 bg-light bg-gradient showImage"
                                            id="showImage">

                                        <div class="col-md-12">
                                            <input type="file" class="form-control" name="photo" id="image"
                                                accept=".jpg, .png, image/jpeg, image/png" />
                                        </div>
                                        <div class="mt-3">
                                            <h4>{{ Auth::user()->name }}</h4>
                                            <p class="text-secondary mb-1">{{ Auth::user()->email }}</p>
                                            <p class="text-muted mb-0 font-size-sm">{{ $adminData->address }}</p>
                                        </div>
                                    </div>
                                    <hr class="my-3" />
                                    <ul class="list-group list-group-flush">
                                        <li
                                            class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                            <h6 class="mb-0"><i class="fa-brands fa-instagram"></i> Instagram</h6>
                                            <span class="text-secondary">codervent</span>
                                        </li>
                                    </ul>
                                    <div class="col-md-12 text-secondary text-center">
                                        <input type="submit" class="btn btn-primary px-4" value="Update" />
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-body">
                                <form class="row g-3" method="post" action="{{ route('admin.profile.details') }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="col-md-6">
                                        <label for="username"
                                            class="form-label @error('username')text-danger @enderror">Username <span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control @error('username') is-invalid @enderror"
                                            id="username" name="username" value="{{ $adminData->username }}" disabled />
                                        @error('username')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="email" class="form-label @error('email')text-danger @enderror">Email
                                            <span class="text-danger">*</span></label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                                            id="email" name="email" value="{{ $adminData->email }}" disabled />
                                        @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="name" class="form-label @error('name')text-danger @enderror">Full
                                            Name <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            id="name" name="name" value="{{ $adminData->name }}" />
                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="phone" class="form-label @error('phone')text-danger @enderror">Phone
                                            <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control @error('phone') is-invalid @enderror"
                                            id="phone" name="phone" value="{{ $adminData->phone }}" />
                                        @error('phone')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
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
                                                <option value="{{ $data->id }}">{{ $data->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="state" class="form-label">State</label>
                                        <select class="form-select" id="state" name="state" disabled>
                                            @if ($adminData->state)
                                                <option value="{{ $adminData->state }}" selected>{{ $adminData->state }}
                                                </option>
                                            @else
                                                <option value="">Select State</option>
                                            @endif
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="city" class="form-label">City</label>
                                        <select class="form-select" id="city" name="city" disabled>
                                            @if ($adminData->city)
                                                <option value="{{ $adminData->city }}" selected>{{ $adminData->city }}
                                                </option>
                                            @else
                                                <option value="">Select City</option>
                                            @endif
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="street" class="form-label">Street</label>
                                        <input type="text" class="form-control" id="street" name="street"
                                            value="{{ $adminData->street }}" />
                                    </div>
                                    <div class="col-md-4">
                                        <label for="landmark" class="form-label">Landmark</label>
                                        <input type="text" class="form-control" id="landmark" name="landmark"
                                            value="{{ $adminData->landmark }}" />
                                    </div>
                                    <div class="col-md-2 mb-2">
                                        <label for="pincode" class="form-label">Pincode</label>
                                        <input type="text" class="form-control" id="pincode" name="pincode"
                                            value="{{ $adminData->pincode }}" />
                                    </div>

                                    <div class="col-md-12 text-secondary text-center">
                                        <input type="submit" class="btn btn-primary px-4" value="Update Details" />
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#image').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result);
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
        });
    </script>
@endsection
