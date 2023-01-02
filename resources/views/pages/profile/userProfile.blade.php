<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{Auth::user()->user_type ===1?'Admin':'User'}} Profile</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com"/>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet"/>


    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="{{asset('assets/vendor/fonts/boxicons.css')}}"/>
    <!-- Core CSS -->
    <link rel="stylesheet" href="{{asset('assets/vendor/css/core.css')}}" class="template-customizer-core-css"/>
    <link rel="stylesheet" href="{{asset('assets/vendor/css/theme-default.css')}}"
          class="template-customizer-theme-css"/>
    <!-- toaster -->
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/css/profile.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/tooltip.css')}}">
</head>
<body>
<div class="main-content">
    <!-- Header -->
    <div class="header pb-2 pt-5 pt-lg-2 d-flex align-items-center"
         style="min-height: 200px; background-image: url(https://raw.githubusercontent.com/creativetimofficial/argon-dashboard/gh-pages/assets-old/img/theme/profile-cover.jpg); background-size: cover; background-position: center top;">
        <!-- Mask -->
        <span class="mask bg-gradient-default opacity-8"></span>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
                <div class="card card-profile shadow">
                    <div class="row justify-content-center">
                        <div class="col-lg-3 order-lg-2">
                            <div class="card-profile-image">
                                <a href="#">
                                    <img
                                        src="https://demos.creative-tim.com/argon-dashboard/assets-old/img/theme/team-4.jpg"
                                        class="rounded-circle" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
                    </div>
                    <div class="card-body pt-0 pt-md-4">
                        <div class="row">
                            <div class="col">
                                <div class="card-profile-stats d-block justify-content-center mt-md-5">
                                    <div class="text-center">
                                        <h3 class="heading">{{Auth::user()->name}}</h3>
                                        <div class="h5 font-weight-300">
                                            <i class="ni location_pin mr-2"></i>Bucharest, Romania
                                        </div>
                                    </div>
                                    <div>
                                        <span class="heading">{{Auth::user()->user_type ===1?'Full':'maintain'}}</span>
                                        <span
                                            class="description">{{Auth::user()->user_type ===1?'Control':'By Admin'}}</span>
                                    </div>
                                    <div class="d-flex justify-content-center">
                                        <span
                                            class="btn border-primary">{{Auth::user()->user_type ===1?'Admin':'User'}}</span>
                                        <form action="{{route('verification.send')}}" method="post">
                                            @csrf
                                            <button type="submit"
                                                    class="btn btn-primary position-relative tooltip-button">
                                                {{Auth::user()->email_verified_at ===null?'Unverified':'Verified'}}
                                                @if(Auth::user()->email_verified_at ===null)
                                                    <span class="tooltip-message">Click to verify now</span>
                                                @endif
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <div class="h5 mt-4">
                                <i class="ni business_briefcase-24 mr-2"></i>Solution Manager - Creative Tim Officer
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{--  user info --}}
            <div class="col-xl-8 order-xl-1 user-info-box">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">My account</h3>
                            </div>
                            <div class="col-4 text-right">
                                <button class="btn btn-sm btn-primary user-info-edit-button">Edit Info</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form>
                            <h6 class="heading-small text-muted mb-4">User information</h6>
                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group focused">
                                            <label class="form-control-label" for="input-username">Username</label>
                                            <div class="form-control form-control-alternative">{{Auth::user()->name}}</div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-email">Email
                                                address</label>
                                            <div class="form-control form-control-alternative">{{Auth::user()->email}}</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group focused">
                                            <label class="form-control-label" for="input-first-name">First
                                                name</label>
                                            <div class="form-control form-control-alternative">{{Auth::user()->first_name}}</div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group focused">
                                            <label class="form-control-label" for="input-last-name">Last
                                                name</label>
                                            <div class="form-control form-control-alternative">{{Auth::user()->last_name}}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr class="my-4">
                            <!-- Address -->
                            <h6 class="heading-small text-muted mb-4">Contact information</h6>
                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group focused">
                                            <label class="form-control-label" for="input-address">Address</label>
                                            <div class="form-control form-control-alternative">{{Auth::user()->address}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group focused">
                                            <label class="form-control-label" for="input-city">City</label>
                                            <div class="form-control form-control-alternative">{{Auth::user()->city}}</div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group focused">
                                            <label class="form-control-label" for="input-country">Country</label>
                                            <div class="form-control form-control-alternative">{{Auth::user()->country}}</div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-country">Postal
                                                code</label>
                                            <div id="input-username" class="form-control form-control-alternative">
                                                {{Auth::user()->post_code}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr class="my-4">
                            <!-- Description -->
                            <h6 class="heading-small text-muted mb-4">About me</h6>
                            <div class="pl-lg-4">
                                <p class="form-control form-control-alternative">{{Auth::user()->about}}</p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            {{-- user info edit --}}
            <div class="col-xl-8 order-xl-1 user-info-edit-box" style="display: none;">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">My account</h3>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="" method="post">
                            @csrf
                            <h6 class="heading-small text-muted mb-4">User information</h6>
                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group focused">
                                            <label class="form-control-label" for="input-username">Username</label>
                                            <input type="text" name="user-name" id="input-username"
                                                   class="form-control form-control-alternative"
                                                   placeholder="Username">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-email">Email
                                                address</label>
                                            <input type="email" name="email" id="input-email"
                                                   class="form-control form-control-alternative"
                                                   placeholder="jesse@example.com">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group focused">
                                            <label class="form-control-label" for="input-first-name">First
                                                name</label>
                                            <input type="text" name="first-name" id="input-first-name"
                                                   class="form-control form-control-alternative"
                                                   placeholder="First name">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group focused">
                                            <label class="form-control-label" for="input-last-name">Last
                                                name</label>
                                            <input type="text" name="last-name" id="input-last-name"
                                                   class="form-control form-control-alternative"
                                                   placeholder="Last name">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr class="my-4">
                            <!-- Address -->
                            <h6 class="heading-small text-muted mb-4">Contact information</h6>
                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group focused">
                                            <label class="form-control-label" for="input-address">Address</label>
                                            <input id="input-address" name="address" class="form-control form-control-alternative"
                                                   placeholder="Home Address" type="text">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group focused">
                                            <label class="form-control-label" for="input-city">City</label>
                                            <input type="text" name="city" id="input-city"
                                                   class="form-control form-control-alternative" placeholder="City">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group focused">
                                            <label class="form-control-label" for="input-country">Country</label>
                                            <input type="text" name="country" id="input-country"
                                                   class="form-control form-control-alternative"
                                                   placeholder="Country">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-postal-code">Postal
                                                code</label>
                                            <input type="number" name="postal-code" id="input-postal-code"
                                                   class="form-control form-control-alternative"
                                                   placeholder="Postal code">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr class="my-4">
                            <!-- Description -->
                            <h6 class="heading-small text-muted mb-4">About me</h6>
                            <div class="pl-lg-4">
                                <div class="form-group focused">
                                    <label for="about-me">About Me</label>
                                    <textarea rows="4" name="about-me" id="about-me"
                                              class="form-control form-control-alternative"
                                              placeholder="A few words about you ..."></textarea>
                                </div>
                            </div>
                            <div class="pl-lg-4">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<footer class="footer">
    <div class="row align-items-center justify-content-xl-between">
        <div class="col-xl-6 m-auto text-center">
            <div class="copyright">
                <p>Made with <a href="https://www.creative-tim.com/product/argon-dashboard" target="_blank">Argon
                        Dashboard</a> by Creative Tim</p>
            </div>
        </div>
    </div>
</footer>
{{--toaster--}}


<div class="bs-toast toast fade  alertToaster" role="alert" aria-live="assertive" aria-atomic="true" data-delay="1000"
     style="position:fixed; top: 30px; right:30px">
    <div class="toast-header">
        <i class=" messageIcon bx me-2"></i>
        <div class="me-auto fw-semibold text-capitalize toast-title"></div>
        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"
                style="margin:8px 0 0 0"></button>
    </div>
    <div class="toast-body text-capitalize toast-message"></div>
</div>

<script src="{{asset('assets/vendor/libs/jquery/jquery.js')}}"></script>
<script src="{{asset('assets/vendor/libs/popper/popper.js')}}"></script>
<script src="{{asset('assets/vendor/js/bootstrap.js')}}"></script>
<script src="{{asset('assets/js/ui-toasts.js')}}"></script>
@if(Session::has('status'))
    <script>
        toasterShow('{{Session::get('status')}}', '{{Session::get('message')}}')
    </script>
@endif
<script>
    $('.user-info-edit-button').click(function () {
        $('.user-info-edit-box').css('display', 'block')
        $('.user-info-box').css('display', 'none')
    });
</script>
</body>
</html>

