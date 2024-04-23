$(document).ready(function() {
    $('.fe-eye').on('click', function() {
        if ($(this).hasClass('fe-eye')) {
            $(this).removeClass('fe-eye').addClass('fe-eye-off');
            $('#password').attr('type', 'text');
        } else {
            $(this).addClass('fe-eye').removeClass('fe-eye-off');
            $('#password').attr('type', 'password');
        }
    });

    $("#login-form").validate({
        rules: {
            email: "required",
            password: "required"
        },
        submitHandler: function() {
            let data = $("#login-form").serialize()
            $('.error').text('');
            $.ajax({
                url: loginControl,
                type: "post",
                data: data,
                success: function(res) {
                    if (res.success == "denied") {
                        Swal.fire({
                            icon: "warning",
                            title: "Oops...",
                            text: "Your Account is De-Activated",
                        });
                    } else if (res.success == false) {
                        Swal.fire({
                            icon: "error",
                            title: "Oops...",
                            text: "Wrong Credentials, Please Try Again!",
                        });
                    } else if (res.success == "admin") {
                        window.location = AdminDash;

                    } else if (res.success == "member") {
                        window.location = MemberDash;
                    }

                },
                error: function(xhr) {
                    $.each(xhr.responseJSON.errors, function(index, message) {
                        $(`.${index}_error`).text(message[0]).css('color',
                            'red');
                    });
                    if (xhr.responseJSON.status == false) {
                        Swal.fire({
                            icon: "error",
                            title: "Oops...",
                            text: "Wrong Credentials, Please Try Again!",
                        });
                    }
                }
            });
        }
    });
});