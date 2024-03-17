<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/icons.css') }}">
    <title>My Garage - Register</title>
</head>
<style>
    .register-wrapper {
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
    <section class="register-wrapper d-flex align-items-center">
        <div class="container">
            <div class="register-cover">
                <div class="row align-items-center">
                    <div class="col-lg-4"></div>
                    <div class="col-lg-4 align-items-center">
                        <h3>Welcome!</h3>
                        <div class="register-form">
                            <form id="register-form" name="register-form">
                                @csrf
                                <div class="card mt-3">
                                    <div class="card-body">
                                        <h5 class="card-title mb-3">Please Register with My Garage</h5>
                                        <hr>
                                        <div class="mb-3">
                                            <label for="first_name" class="form-label">First Name</label>
                                            <input type="text" class="form-control" id="first_name" name="first_name"
                                                placeholder="Enter First Name">
                                        </div>
                                        <div class="mb-3">
                                            <label for="last_name" class="form-label">Last Name</label>
                                            <input type="text" class="form-control" id="last_name" name="last_name"
                                                placeholder="Enter Last Name">
                                        </div>
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email address</label>
                                            <input type="email" class="form-control" id="email" name="email"
                                                placeholder="Enter Email">
                                        </div>
                                        <div class="mb-3">
                                            <label for="mobile_number" class="form-label">Mobile Number</label>
                                            <input type="text" class="form-control" id="mobile_number" maxlength="10"
                                                name="mobile_number" placeholder="Enter Mobile Number">
                                        </div>
                                        <div class="mb-3">
                                            <label for="password" class="form-label">Password</label>
                                            <div class="input-group">
                                                <input type="password" class="form-control" id="password"
                                                    name="password" placeholder="Enter Password">
                                                <i class="input-group-text fe fe-eye"></i>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary mt-3" id="register">Register</button>
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
    <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap/popper.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/jqueryvalidation/dist/jquery.validate.min.js') }}"></script>
    <script>
        $(document).ready(function() {

            $('#register-form').validate({
                rules: {
                    full_name: "required",
                    email: {
                        required: true,
                        email: true
                    },
                    mobile_number: {
                        required: true,
                        maxlength: 10,
                        minlength: 10,
                        digits: true
                    },
                    password: {
                        required: true,
                        minlength: 8
                    }
                },
                messages: {
                    mobile_number: {
                        required: 'Enter Valid Mobile Number'
                    }
                },
                submitHandler: function() {
                    let data = $('#register-form').serialize();
                    $.ajax({
                        url: '{{ route('register.control') }}',
                        type: "post",
                        data: data,
                        beforeSend: function() {
                            $("#register").prop("disabled", true).text("Please Wait");
                        },
                        success: function(res) {
                            console.log(res);
                        },
                        error: function(xhr, status, error) {

                        },
                        complete: function() {
                            $("#register").text('Register');
                        }
                    });
                }
            });
            $('.fe-eye').on('click', function() {
                if ($(this).hasClass('fe-eye')) {
                    $(this).removeClass('fe-eye').addClass('fe-eye-off');
                    $('#password').attr('type', 'text');
                } else {
                    $(this).addClass('fe-eye').removeClass('fe-eye-off');
                    $('#password').attr('type', 'password');
                }
            });

        });
    </script>
</body>

</html>
