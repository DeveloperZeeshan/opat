  
 $(document).ready(function () {
  $("#subscribe").click(function (e) {
  alert('yes');
                e.preventDefault();
                var data = $(this).serialize();
                var email = $("input#email").val();
                var _token = $('input[name="_token"]').val();

                if (email == "") {
                    $("#error").html("Please enter valid email").css("color", "rgb(249 119 119)");
                } else {
                    console.log(data);
                    $.ajax({
                        type: 'POST',
                        url: "{{route('email_available_check')}}",
                        data: {
                            email: email,
                            _token: _token
                        },
                        success: function (result) {
                            if (result.msg == 'success') {
                                swal({
                                    title: 'Done',
                                    text: result.data,
                                    icon: 'success',
                                    timer: 5000,
                                    buttons: false,
                                }).then(() => {
                                    window.location.reload();
                                })
                            } else {
                                swal({
                                    text: result.data,
                                    icon: 'error',
                                    title: 'Oops...',
                                    timer: 5000,
                                    buttons: false,
                                }).then(() => {
                                    window.location.reload();
                                })
                            }
                        },
                        error: function (error) {}
                    });
                }

            });
     });