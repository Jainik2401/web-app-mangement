<?php include 'connection.php';
session_start();
if(isset($_SESSION['admin_id']) && !empty($_SESSION['admin_id'])){
    header('Location: index.php');
}
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>Easy App</title>
        <meta content="Admin Dashboard" name="description" />
        <meta content="Themesbrand" name="author" />
        <link rel="shortcut icon" href="assets/images/logo.png">
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="assets/css/metismenu.min.css" rel="stylesheet" type="text/css">
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css">
        <link href="assets/css/style.css" rel="stylesheet" type="text/css">
        <link href="./assets/css/_main.css" rel="stylesheet" type="text/css">        
        
    </head>

    <body>
        
        <div class="wrapper-page">

            <div class="card overflow-hidden account-card mx-3 ">
                
                <div class="bg-primary p-4 text-white text-center position-relative">
                    <h4 class="font-20 m-b-5">Welcome Back !</h4>
                    <p class="text-white-50 mb-4">Sign in to continue to Easy App.</p>
                    <a href="index.php" class="logo logo-admin "><img class=" text-center  " style="margin-top:-6px" src="assets/images/logo.png" height="48" alt="logo"></a>
                </div>
                <div class="account-card-content">
                    <form class="m-t-30" id="login-form" method="POST">
                        <div class="form-group row form-wrap">
                            <label for="username" class="col-sm-12 col-form-label">User Name<span class="text-danger">*</span></label>
                            <div class="col-sm-12">
                                <input type="text" id="input-usename" class="form-control" name="username" placeholder="Enter the User Name"/>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-sm-12 col-form-label">Password<span class="text-danger">*</span></label>
                            <div class="col-sm-12">
                                <input type="password" id="input-password" class="form-control" name="password" placeholder="Enter the Password"/><span toggle="#input-password" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                            </div>
                        </div>
                        <div class="col-sm-12 text-center mt-5">
                            <button id="submit" class="btn btn-primary w-md mt-2 waves-effect waves-light" type="submit">Log In</button>
                        </div>
                    </form>

                </div>
            </div>

            <div class=" text-center">
                <p>Easy App © 2020 All Rights Reserved.</p>
            </div>

        </div>
        <!-- end wrapper-page -->


        <!-- jQuery  -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.bundle.min.js"></script>
        <script src="assets/js/metisMenu.min.js"></script>
        <script src="assets/js/jquery.slimscroll.js"></script>
        <script src="assets/js/waves.min.js"></script>
        <script src=assets/js/jquery.validate.js></script>

        <!-- App js -->
        <script src="assets/js/app.js"></script>
    <script>
        $(document).ready(function(){
        $(".toggle-password").click(function() {
            $(this).toggleClass("fa-eye fa-eye-slash");
            var input = $($(this).attr("toggle"));
            if (input.attr("type") == "password") {
              input.attr("type", "text");
            } else {
              input.attr("type", "password");
            }
          });
            $('#login-form').validate({
                rules:
                {
                    username:{
                        required:true,                    
                    },
                    password:{
                        required:true,
                        minlength:6,
                    }
                },
                messages:
                {
                    username:{
                        required:"Please enter the username",
                    },
                    password:{
                        required:"Please enter the password",
                        minlength:"Password must be at least 6 characters",
                    }
                },
                errorElement: 'span',
                errorClass: 'form-error-elemet',
                highlight: function(element, errorClass, validClass) {
                  $(element).parents("div.form-group").addClass('element-error');
                  $(element).parents("div.form-group").removeClass('element-success');
                },
                unhighlight: function(element, errorClass, validClass) {
                  $(element).parents("div.form-group").removeClass('element-error');
                  $(element).parents("div.form-group").addClass('element-success');
                },
                submitHandler: function(){
                        event.preventDefault();
                        $.ajax({
                            url  : 'login_processing.php',
                            type : 'POST',
                            data : $('#login-form input[type="text"], #login-form input[type="password"]'),
                            dataType : 'json',
                            success: function(response){
                                if(response['success']){    //response.success
                                   window.location.href = "index.php";
                                }

                                if(response['error']){
                                  //response.error
                                  $('.form-wrap').before('<div class="alert alert-danger bg-danger text-white" role="alert"><i class="fa fa-exclamation-circle"></i> ' + response['error'] + '</div>');
                                    $('.alert').delay(2000).fadeOut(3000);
                                }
                            }
                        });
                    }
            });
        });
    </script>
    </body>

</html>