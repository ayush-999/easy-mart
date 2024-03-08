@extends('dashboard')
@section('user')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="/" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                <span></span> My Account
            </div>
        </div>
    </div>
    <div class="page-content pt-150 pb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 m-auto">
                    <div class="row">
                        <div class="col-md-3">
                            <form class="row g-3" id="store-profile-form" method="post" action=""
                                enctype="multipart/form-data">
                                @csrf
                                <div
                                    class="profile-container-wrapper d-flex flex-column justify-content-center align-items-center mb-3">
                                    <div class="profile-container">
                                        <img src="https://i.pravatar.cc/300?u=fake@pravatar.com" alt=""
                                            class="profile-image" id="userShowImage">
                                        <label for="userImage" class="camera-icon">
                                            <i class="fa-solid fa-camera"></i>
                                            <input type="file" class="form-control p-0 file-input" name="photo"
                                                id="userImage" accept=".jpg, .png, image/jpeg, image/png">
                                        </label>
                                    </div>
                                    <input type="submit" class="btn btn-primary custom-userPic-btn mt-2" value="Update" />
                                </div>
                            </form>
                            <div class="dashboard-menu">
                                <ul class="nav flex-column" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="dashboard-tab" data-bs-toggle="tab" href="#dashboard"
                                            role="tab" aria-controls="dashboard" aria-selected="false"><i
                                                class="fi-rs-settings-sliders mr-10"></i>Dashboard</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="account-detail-tab" data-bs-toggle="tab"
                                            href="#account-detail" role="tab" aria-controls="account-detail"
                                            aria-selected="true"><i class="fi-rs-user mr-10"></i>Account
                                            details</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="orders-tab" data-bs-toggle="tab" href="#orders"
                                            role="tab" aria-controls="orders" aria-selected="false"><i
                                                class="fi-rs-shopping-bag mr-10"></i>Orders</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="track-orders-tab" data-bs-toggle="tab" href="#track-orders"
                                            role="tab" aria-controls="track-orders" aria-selected="false"><i
                                                class="fi-rs-shopping-cart-check mr-10"></i>Track Your Order</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="address-tab" data-bs-toggle="tab" href="#address"
                                            role="tab" aria-controls="address" aria-selected="true"><i
                                                class="fi-rs-marker mr-10"></i>My Address</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('user.logout') }}"><i
                                                class="fi-rs-sign-out mr-10"></i>Logout</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="tab-content account dashboard-content pl-50">
                                <div class="tab-pane fade active show" id="dashboard" role="tabpanel"
                                    aria-labelledby="dashboard-tab">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="mb-0">Hello {{ Auth::user()->name }}</h3>
                                        </div>
                                        <div class="card-body">
                                            <p>
                                                From your account dashboard. you can easily check &amp; view your <a
                                                    href="#">recent orders</a>,<br />
                                                manage your <a href="#">shipping and billing addresses</a>
                                                and <a href="#">edit your password and account details.</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="account-detail" role="tabpanel"
                                    aria-labelledby="account-detail-tab">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5>Account Details</h5>
                                        </div>
                                        <div class="card-body">
                                            <form method="post" name="enq">
                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        <label for="username"
                                                            class="form-label @error('username')text-danger @enderror">Username
                                                            <span class="text-danger">*</span></label>
                                                        <input type="text"
                                                            class="form-control @error('username') is-invalid @enderror"
                                                            id="username" name="username"
                                                            value="{{ $userData->username }}" disabled />
                                                        @error('username')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="name"
                                                            class="form-label @error('name')text-danger @enderror">Full
                                                            Name <span class="text-danger">*</span></label>
                                                        <input type="text"
                                                            class="form-control @error('name') is-invalid @enderror"
                                                            id="name" name="name"
                                                            value="{{ $userData->name }}" />
                                                        @error('name')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label for="email"
                                                            class="form-label @error('email')text-danger @enderror">Email
                                                            <span class="text-danger">*</span></label>
                                                        <input type="email"
                                                            class="form-control @error('email') is-invalid @enderror"
                                                            id="email" name="email" value="{{ $userData->email }}"
                                                            disabled />
                                                        @error('email')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="phone"
                                                            class="form-label @error('phone')text-danger @enderror">Phone
                                                            <span class="text-danger">*</span></label>
                                                        <input type="text"
                                                            class="form-control @error('phone') is-invalid @enderror"
                                                            id="phone" name="phone"
                                                            value="{{ $userData->phone }}" />
                                                        @error('phone')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>Date Of Birth</label>
                                                        <input type="date" class="form-control"
                                                            value="{{ $userData->dob }}" name="dob" />
                                                    </div>

                                                    <div class="form-group col-md-4">
                                                        <label for="country" class="form-label">Country</label>
                                                        <select class="form-select customSelect form-control"
                                                            id="country" name="country">
                                                            @if ($userData->country)
                                                                <option value="{{ $userData->country }}" selected>
                                                                    {{ $userData->country }}</option>
                                                            @else
                                                                <option value="">Select Country</option>
                                                            @endif
                                                            @foreach ($countries as $data)
                                                                <option value="{{ $data->id }}">{{ $data->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="state" class="form-label">State</label>
                                                        <select class="form-select customSelect form-control"
                                                            id="state" name="state" disabled>
                                                            @if ($userData->state)
                                                                <option value="{{ $userData->state }}" selected>
                                                                    {{ $userData->state }}
                                                                </option>
                                                            @else
                                                                <option value="">Select State</option>
                                                            @endif
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="city" class="form-label">City</label>
                                                        <select class="form-select customSelect form-control"
                                                            id="city" name="city" disabled>
                                                            @if ($userData->city)
                                                                <option value="{{ $userData->city }}" selected>
                                                                    {{ $userData->city }}
                                                                </option>
                                                            @else
                                                                <option value="">Select City</option>
                                                            @endif
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="street" class="form-label">Street</label>
                                                        <input type="text" class="form-control" id="street"
                                                            name="street" value="{{ $userData->street }}" />
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="landmark" class="form-label">Landmark</label>
                                                        <input type="text" class="form-control" id="landmark"
                                                            name="landmark" value="{{ $userData->landmark }}" />
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="pincode" class="form-label">Pincode</label>
                                                        <input type="text" class="form-control" id="pincode"
                                                            name="pincode" value="{{ $userData->pincode }}" />
                                                    </div>
                                                    <div class="col-md-12">
                                                        <button type="submit"
                                                            class="btn btn-fill-out submit font-weight-bold"
                                                            name="submit" value="Submit">Save Change</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="orders" role="tabpanel" aria-labelledby="orders-tab">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="mb-0">Your Orders</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>Order</th>
                                                            <th>Date</th>
                                                            <th>Status</th>
                                                            <th>Total</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>#1357</td>
                                                            <td>March 45, 2020</td>
                                                            <td>Processing</td>
                                                            <td>$125.00 for 2 item</td>
                                                            <td><a href="#" class="btn-small d-block">View</a>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>#2468</td>
                                                            <td>June 29, 2020</td>
                                                            <td>Completed</td>
                                                            <td>$364.00 for 5 item</td>
                                                            <td><a href="#" class="btn-small d-block">View</a>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>#2366</td>
                                                            <td>August 02, 2020</td>
                                                            <td>Completed</td>
                                                            <td>$280.00 for 3 item</td>
                                                            <td><a href="#" class="btn-small d-block">View</a>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="track-orders" role="tabpanel"
                                    aria-labelledby="track-orders-tab">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="mb-0">Orders tracking</h3>
                                        </div>
                                        <div class="card-body contact-from-area">
                                            <p>To track your order please enter your OrderID in the box below and
                                                press "Track" button. This was given to you on your receipt and in
                                                the confirmation email you should have received.</p>
                                            <div class="row">
                                                <div class="col-lg-8">
                                                    <form class="contact-form-style mt-30 mb-50" action="#"
                                                        method="post">
                                                        <div class="input-style mb-20">
                                                            <label>Order ID</label>
                                                            <input name="order-id"
                                                                placeholder="Found in your order confirmation email"
                                                                type="text" />
                                                        </div>
                                                        <div class="input-style mb-20">
                                                            <label>Billing email</label>
                                                            <input name="billing-email"
                                                                placeholder="Email you used during checkout"
                                                                type="email" />
                                                        </div>
                                                        <button class="submit submit-auto-width"
                                                            type="submit">Track</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="address" role="tabpanel" aria-labelledby="address-tab">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="card mb-3 mb-lg-0">
                                                <div class="card-header">
                                                    <h3 class="mb-0">Billing Address</h3>
                                                </div>
                                                <div class="card-body">
                                                    <address>
                                                        3522 Interstate<br />
                                                        75 Business Spur,<br />
                                                        Sault Ste. <br />Marie, MI 49783
                                                    </address>
                                                    <p>New York</p>
                                                    <a href="#" class="btn-small">Edit</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h5 class="mb-0">Shipping Address</h5>
                                                </div>
                                                <div class="card-body">
                                                    <address>
                                                        4299 Express Lane<br />
                                                        Sarasota, <br />FL 34249 USA <br />Phone: 1.941.227.4444
                                                    </address>
                                                    <p>Sarasota</p>
                                                    <a href="#" class="btn-small">Edit</a>
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
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            // $(document).ready(function() {
            //     $('.customSelect').select2({
            //         closeOnSelect: false
            //     });
            // });
            $('#userImage').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#userShowImage').attr('src', e.target.result);
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
                    url: "/user/api/fetch-state",
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
                    url: "/user/api/fetch-cities",
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
