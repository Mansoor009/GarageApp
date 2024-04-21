$(document).ready(function() {

    $('#register-form').validate({
        rules: {
            first_name: "required",
            last_name: "required",
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
                minlength: 6
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
                url: registerControl,
                type: "post",
                data: data,
                beforeSend: function() {
                    $("#register").prop("disabled", true).text("Please Wait");
                },
                success: function(res) {
                    if (res.success === true) {
                        Swal.fire({
                            icon: "success",
                            title: res.message,
                        }).then(function(res){
                            window.location = loginRedirect;
                        });
                    }
                },
                error: function(xhr) {
                    $.each(xhr.responseJSON.errors, function(index, message) {
                        $(`.${index}_error`).text(message[0]).css('color',
                            'red');
                    });
                },
                complete: function() {
                    $('.register').html('Create Account')
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