<?php include 'connection.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>FORGOT PASSWORD</title>
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
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="images/img-01.png" alt="IMG">
				</div>

				<form class="login100-form validate-form" method="POST" id="forgot-form">
					<span class="login100-form-title">
						Forgot Password
					</span>

					<div class="wrap-input100 form-group validate-input form-wrap">
						<input class="input100" type="email" name="email" placeholder="Email">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 form-group validate-input" >
						<input class="input100 " id="input-newpassword" type="password" name="newpass" placeholder="New Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 form-group validate-input" >
						<input class="input100" id="input-conpassword" type="password" name="conpass" placeholder="Confirm Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					
					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Change Password
						</button>
					</div>

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
      $('#forgot-form').validate({
        rules:
        {
            email:{
                required:true,
                email:true,                  
            },
            newpass:{
                required:true,
                minlength:6,
            },
            conpass:{
                required:true,
                minlength:6,
            	equalTo: "#input-newpassword",
            }
        },
        messages:
        {
            email:{
                email:"Please enter valide email",
                required:"Please enter the email",
            },
            newpass:{
                required:"Please enter the new password",
                minlength:"Password must be at least 6 characters",
            },
            conpass:{
                required:"Please enter the confirm password",
                minlength:"Password must be at least 6 characters",
               equalTo :"Confirmpass should be match with newpass"
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
              url  : 'forgot-password_processing.php',
              type : 'POST',
              data : $('#forgot-form input[type="email"], #forgot-form input[type="password"]'),
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
  