<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--favicon-->
    <link rel="icon" href="{{ asset('adminBackend/assets/images/favicon/favicon.ico') }}" type="image/x-icon" />
    <link rel="icon" href="{{ asset('adminBackend/assets/images/favicon/favicon-16x16.png') }}" type="image/png" />
    <link rel="icon" href="{{ asset('adminBackend/assets/images/favicon/favicon-32x32.png') }}" type="image/png" />
    <link rel="icon" href="{{ asset('adminBackend/assets/images/favicon/mstile-150x150.png') }}" type="image/png" />
    <link rel="icon" href="{{ asset('adminBackend/assets/images/favicon/android-chrome-192x192.png') }}"
        type="image/png" />
    <link rel="icon" href="{{ asset('adminBackend/assets/images/favicon/apple-touch-icon.png') }}"
        type="image/png" />
    <link rel="icon" href="{{ asset('adminBackend/assets/images/favicon/android-chrome-256x256.png') }}"
        type="image/png" />
    <!--plugins-->
    <link href="{{ asset('adminBackend/assets/plugins/simplebar/css/simplebar.css') }}" rel="stylesheet" />
    <link href="{{ asset('adminBackend/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}"
        rel="stylesheet" />
    <link href="{{ asset('adminBackend/assets/plugins/metismenu/css/metisMenu.min.css') }}" rel="stylesheet" />
    <!-- loader-->
    <link href="{{ asset('adminBackend/assets/css/pace.min.css') }}" rel="stylesheet" />
    <script src="{{ asset('adminBackend/assets/js/pace.min.js') }}"></script>
    <!-- Bootstrap CSS -->
    <link href="{{ asset('adminBackend/assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('adminBackend/assets/css/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('adminBackend/assets/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('adminBackend/assets/css/icons.css') }}" rel="stylesheet">
    <title>Admin Login</title>
</head>

<body class="bg-login">
    <!--wrapper-->
    <div class="wrapper">
        <div class="section-authentication-signin d-flex align-items-center justify-content-center my-5 my-lg-0">
            <div class="container-fluid">
                <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
                    <div class="col mx-auto">
                        <div class="card">
                            <div class="card-body">
                                <div class="border p-4 rounded">
                                    <div class="text-center mb-3">
                                        <img src="{{ asset('adminBackend/assets/images/logo-img.png') }}"
                                            width="200" alt="" />
                                    </div>
                                    <div class="login-separater text-center mb-4"> <span>ADMIN LOGIN</span>
                                        <hr />
                                    </div>
                                    <div class="form-body">
                                        <form class="row g-3" method="POST" action="{{ route('login') }}">
                                            @csrf
                                            <div class="col-12">
                                                <label for="email" class="form-label">Email Address</label>
                                                <input type="email"
                                                    class="form-control @error('email') is-invalid @enderror"
                                                    id="email" name="email" placeholder="Email Address" required>
                                                @error('email')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-12">
                                                <label for="password" class="form-label">Enter Password</label>
                                                <div class="input-group" id="show_hide_password">
                                                    <input type="password" class="form-control border-end-0"
                                                        id="password" name="password" placeholder="Enter Password"
                                                        required>
                                                    <a href="javascript:;" class="input-group-text bg-transparent">
                                                        <i class='bx bx-hide'></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox" id="remember_me"
                                                        name="remember" checked>
                                                    <label class="form-check-label" for="remember_me">Remember
                                                        Me</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6 text-end">
                                                @if (Route::has('password.request'))
                                                    <a href="{{ route('password.request') }}">Forgot Password ?</a>
                                                @endif
                                            </div>
                                            <div class="col-12">
                                                <div class="d-grid">
                                                    <button type="submit" class="btn btn-primary"><i
                                                            class="bx bxs-lock-open"></i>Sign in</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end row-->
            </div>
        </div>
    </div>
    <!--end wrapper-->
    <!-- Bootstrap JS -->
    <script src="{{ asset('adminBackend/assets/js/bootstrap.bundle.min.js') }}"></script>
    <!--plugins-->
    <script src="{{ asset('adminBackend/assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('adminBackend/assets/plugins/simplebar/js/simplebar.min.js') }}"></script>
    <script src="{{ asset('adminBackend/assets/plugins/metismenu/js/metisMenu.min.js') }}"></script>
    <script src="{{ asset('adminBackend/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
    <!--Password show & hide js -->
    <script>
        $(document).ready(function() {
            $("#show_hide_password a").on('click', function(event) {
                event.preventDefault();
                if ($('#show_hide_password input').attr("type") == "text") {
                    $('#show_hide_password input').attr('type', 'password');
                    $('#show_hide_password i').addClass("bx-hide");
                    $('#show_hide_password i').removeClass("bx-show");
                } else if ($('#show_hide_password input').attr("type") == "password") {
                    $('#show_hide_password input').attr('type', 'text');
                    $('#show_hide_password i').removeClass("bx-hide");
                    $('#show_hide_password i').addClass("bx-show");
                }
            });
        });
    </script>
    <!--app JS-->
    <script src="{{ asset('adminBackend/assets/js/app.js') }}"></script>
</body>

</html>
