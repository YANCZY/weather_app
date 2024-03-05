<!doctype html>
<html lang="en">


<!-- Mirrored from themesbrand.com/skote/layouts/auth-register.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 31 Oct 2022 10:49:38 GMT -->

<head>

    <meta charset="utf-8" />
    <title>Register | Skote - Admin & Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- Bootstrap Css -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('design/css/app.css') }}" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">

</head>

<body>

    <div class="account-pages my-5 pt-sm-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card overflow-hidden">
                        <div class="bg-primary bg-soft">
                            <div class="row">
                                <div class="col-7">
                                    <div class="text-primary p-4">
                                        <h5 class="text-primary">Free Register</h5>
                                        <p>Welcome</p>
                                    </div>
                                </div>
                                <div class="col-5 align-self-end">
                                    <img src="{{ asset('assets/images/profile-img.png') }}" alt=""
                                        class="img-fluid">
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <div>
                                <a href="index.html">
                                    <div class="avatar-md profile-user-wid mb-4">
                                        <span class="avatar-title rounded-circle bg-light">
                                            <img src="{{ asset('assets/images/logo.svg') }}" alt=""
                                                class="rounded-circle" height="34">
                                        </span>
                                    </div>
                                </a>
                            </div>
                            <div class="p-2">
                                <form method="POST" class="from-prevent-multiple-submits" id="registrationForm"
                                    action="{{ route('register') }}">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="firstname" class="form-label">First Name</label>
                                        <input type="text" class="form-control" name="first_name" id="first_name"
                                            placeholder="Enter First Name" required>
                                        <div class="invalid-feedback">
                                            Please Enter First Name
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="lastname" class="form-label">Last Name</label>
                                        <input type="text" class="form-control" name="last_name" id="last_name"
                                            placeholder="Enter Last Name" required>
                                        <div class="invalid-feedback">
                                            Please Enter Last Name
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="sex" class="form-label">Sex</label>
                                        <select name="sex" id="sex" class="form-control" required>
                                            <option value="" disabled selected hidden>Select</option>
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            Please Select Sex
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="birthdate" class="form-label">Birthdate</label>
                                        <input type="date" class="form-control birthdate" name="birthdate"
                                            id="birthdate" value="09-01-2013" placeholder="Enter Birthdate" required>
                                        <div class="invalid-feedback">
                                            Please Enter Birthdate
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="birthdate" class="form-label">Address</label>
                                        <textarea class="form-control" id="address" name="address" rows="4" cols="50" required></textarea>
                                        <div class="invalid-feedback">
                                            Please Enter Address
                                        </div>
                                    </div>




                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control" name="email" id="email"
                                            placeholder="Enter email" required>
                                        <div class="invalid-feedback">
                                            Please Enter Email
                                        </div>
                                    </div>


                                    <div class="mb-3">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" class="form-control" name="password" id="password"
                                            placeholder="Enter password" required minlength="8">
                                        <div class="invalid-feedback">
                                            Please Enter Password
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="password_confirmation" class="form-label">Confirm Password</label>
                                        <input type="password" class="form-control" name="password_confirmation"
                                            id="password_confirmation" placeholder="Enter Confirm Password" required
                                            minlength="8">
                                        <div class="invalid-feedback">
                                            Please Enter Confirm Password
                                        </div>
                                    </div>

                                    <div class="mb-3 mt-4 flex items-center space-x-2">

                                        <input type="checkbox"
                                            class="form-checkbox is-basic h-5 w-5 rounded border-slate-400/70 checked:border-primary checked:bg-primary hover:border-primary focus:border-primary dark:border-navy-400 dark:checked:border-accent dark:checked:bg-accent dark:hover:border-accent dark:focus:border-accent"
                                            name="terms" id="terms" required>
                                        <p class="line-clamp-1">
                                            I agree with
                                            <a href="#"
                                                class="text-slate-400 hover:underline dark:text-navy-300">
                                                privacy policy
                                            </a>
                                        </p>
                                        <div class="invalid-feedback">
                                            Please accept the Terms and Condition
                                        </div>
                                    </div>

                                    <div class="mt-4 d-grid">
                                        <button
                                            class="from-prevent-multiple-submits btn w-full bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90"
                                            type="submit" id="submitButton"
                                            onclick="disable(this)">{{ __('Register') }}</button>
                                    </div>



                                </form>
                            </div>

                        </div>
                    </div>
                    <div class="mt-5 text-center">

                        <div>
                            <p>Already have an account ? <a href="{{ route('login') }}"
                                    class="fw-medium text-primary">
                                    Login</a> </p>
                            <p>©
                                <script>
                                    document.write(new Date().getFullYear())
                                </script> Yancy. Crafted with <i class="mdi mdi-heart text-danger"></i>
                                by Z
                            </p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- JAVASCRIPT -->
    <script src="{{ asset('assets/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/libs/metismenu/metisMenu.min.js') }}"></script>
    <script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/libs/node-waves/waves.min.js') }}"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>


    <!-- validation init -->
    <script src="{{ asset('assets/js/pages/validation.init.js') }}"></script>

    <!-- App js -->
    <script src="{{ asset('assets/js/app.js') }}"></script>
    <script>
        var today = new Date();
        var dd = 30;
        var mm = 12; //January is 0!
        var yyyy = today.getFullYear() - 15;
        if (dd < 10) {
            dd = '0' + dd;
        }
        if (mm < 10) {
            mm = '0' + mm;
        }
        today = yyyy + '-' + mm + '-' + dd;
        document.getElementById("birthdate").setAttribute("max", today);
    </script>

    <script type="text/javascript">
        (function() {
            $('.from-prevent-multiple-submits').on('submit', function() {
                $('.from-prevent-multiple-submits').attr('disabled', 'true');
            })
        })();
    </script>

    <script>
        @if (Session::has('message'))
            var type = "{{ Session::get('alert-type', 'info') }}"
            switch (type) {
                case 'info':
                    toastr.info(" {{ Session::get('message') }} ");
                    break;

                case 'success':
                    toastr.success(" {{ Session::get('message') }} ");
                    break;

                case 'warning':
                    toastr.warning(" {{ Session::get('message') }} ");
                    break;

                case 'error':
                    toastr.error(" {{ Session::get('message') }} ");
                    break;
            }
        @endif
    </script>


</body>

<!-- Mirrored from themesbrand.com/skote/layouts/auth-register.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 31 Oct 2022 10:49:38 GMT -->

</html>
