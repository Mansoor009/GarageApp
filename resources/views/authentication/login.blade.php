<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/icons.css') }}">
    <title>My Garage - Login</title>
</head>
<style>
    .login-wrapper {
        min-height: 100vh;
        height: 100%;
        width: 100%;
        background-image: url('{{ asset('assets/img/background-auth.jpg') }}');
        background-size: 100% 100%;
        background-repeat: no-repeat;
    }

    .card {
        border-radius: 13px;
        padding: 7px;
        box-shadow: rgba(190, 228, 245) 0px 3px 8px;
    }

    .fe-eye {
        cursor: pointer;
        border-radius: 0 4px 4px 0 !important;
    }
</style>

<body>
    <section class="login-wrapper d-flex align-items-center">
        <div class="container">
            <div class="login-cover">
                <div class="row align-items-center">
                    <div class="col-lg-4"></div>
                    <div class="col-lg-4 align-items-center">
                        <h3>Welcome Back!</h3>
                        <div class="login-form">
                            <form id="login-form" method="POST" enctype="application/x-www-form-urlencoded">
                                @csrf
                                <div class="card mt-3">
                                    <div class="card-body">
                                        <h5 class="card-title mb-3">Please Log In to continue</h5>
                                        <hr>
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email address</label>
                                            <input type="email" class="form-control" id="email" name="email"
                                                placeholder="Enter Email">
                                        </div>
                                        <div class="mb-3">
                                            <label for="password" class="form-label">Password</label>
                                            <div class="input-group">
                                                <input type="password" class="form-control" id="password"
                                                    name="password" placeholder="Enter Password">
                                                <i class="input-group-text fe fe-eye"></i>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary mt-2">Log In</button>
                                        <div class='mt-2'>New User? <a href="{{ route('register.view') }}">Sign Up</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-4"></div>
                </div>
            </div>
        </div>
    </section>
    <script>
        let loginControl    =    '{{ route('login.control') }}';
        let AdminDash       =    '{{route('admin.index')}}';
        let MemberDash      =    '{{route('member.index')}}';
    </script>
    <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap/popper.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/jqueryvalidation/dist/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/sweetalert2/src/sweetalert2.js') }}"></script>
    <script src="{{ asset('assets/custom/js/login.js') }}"></script>
</body>

</html>
