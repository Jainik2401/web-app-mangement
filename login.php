<?php include 'connection.php';
include 'header.php';

session_start();
if(isset($_SESSION['app_manager_id']) && !empty($_SESSION['app_manager_id'])){
    header('Location: app_manager/index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="images/logo.png">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/custome.css">

<style>
	input {
	outline: none;
	border: none;
  }

  .field-icon {
    float: right; 
    margin-top: -50px;
    margin-right: 10px;
    position: relative;
    z-index: 2;
  }
  textarea {
    outline: none;
    border: none;
  }

textarea:focus, input:focus {
  border-color: transparent !important;
}
.alert {
    padding: 0rem 0.25rem;
    margin-bottom: 1rem;
    border: 1px solid transparent;
    border-radius: .25rem;
}
</style>
</head>
<body>

	<div class="limiter">
		<div class="container-login100" style="margin-top:92px;">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="images/img-01.png" alt="IMG">
				</div>

				<form class="login100-form validate-form" method="POST" id="login-form">
					<span class="login100-form-title">
						Login here
					</span>

					<div class="wrap-input100 form-group validate-input form-wrap">
						<input class="input100" type="email" name="email" placeholder="Email">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 form-group validate-input" >
						<input class="input100 " id="password" type="password" name="pass" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div><span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password"></span>
					
					<div class="container-login100-form-btn">
						<button id="submit" type="submit" class="login100-form-btn">
							Login
						</button>
					</div>

					<div class="text-center p-t-12">
						<span class="txt1">
							Forgot your 
 						</span>
						<a class="txt2" href="forget-password.php">
						 Password?
						</a>
					</div>
<!-- 
					<div class="text-center p-t-136" style="margin-top: 17px;">
						<a class="txt2" style="font-size: 16px;" href="#">
							Create your Account
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div> -->
				</form>
			</div>
		</div>
	</div>
	
  <script src="js/jquery-3.2.1.min.js"></script>
	<script src="bootstrap/js/popper.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
	<script src="js/tilt.jquery.min.js"></script>
  <script src="js/jquery.validate.js"></script>

	<script type="text/javascript">
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
            email:{
                required:true,
                email:true,                  
            },
            pass:{
                required:true,
                minlength:6,
            }
        },
        messages:
        {
            email:{
                email:"Please enter valide email",
                required:"Please enter the email",
            },
            pass:{
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
              data : $('#login-form input[type="email"], #login-form input[type="password"]'),
              dataType : 'json',
              success: function(response){
                  if(response['success']){    //response.success
                     window.location.href = "app_manager/index.php";
                  }
                  if(response['redirect']){    //response.success
                     window.location.href = response['redirect'];
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