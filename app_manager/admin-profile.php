<?php include 'header.php'; 
include 'function.php';
?>

<?php 
$result = array(
	'app_manager_id' => '',
	'firstname' => '',
	'lastname' => '',
	'company_name' => '',
	'email' => '',
	'contact_number' => '',
	'password' => '',
);
$result = getAppmanagerData();

?>
<div class="page-title-box">
    <div class="row align-items-center">
        
        <div class="col-sm-6">
            <h4 class="page-title">Admin Profile</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Change Profile</a></li>
    			<li class="breadcrumb-item active" aria-current="page">Profile Details</li>
            </ol>

        </div>
    </div>
</div>

	<div class="row form-wrap">
		<div class="col-md-12 mt-2" >			
			<div class="row">
				<div class="col-md-6">
       	 			<div class="p-3 back-color">
        				<h3 class="	text-center mb-4">Admin Profile Details</h3>
    					<form method="post"  id="change-profile-form">

							<div class="form-group row">
								<label for="input-firstname" class="col-sm-3 col-form-label">First Name</label>
								<div class="col-sm-9">
					        		<input type="text" class="form-control" id="input-firstname" name="firstname" value="<?php echo $result['firstname']; ?>"disabled />
							</div>
				    		</div>

				    		<div class="form-group row">
								<label for="input-lastname" class="col-sm-3 col-form-label">Last Name</label>
								<div class="col-sm-9">
					        		<input type="text" class="form-control" id="input-lastname" name="lastname" value="<?php echo $result['lastname']; ?>"disabled />
					        	</div>
				    		</div>
				    		<div class="form-group row">
								<label for="input-username" class="col-sm-3 col-form-label">Company Name</label>
								<div class="col-sm-9">
					        		<input type="text" class="username-formcontrol" id="input-username" name="companyname" value="<?php echo $result['company_name']; ?>" disabled />
					        	</div>
				    		</div>
							
							<div class="form-group row">
								<label for="input-email" class="col-sm-3 col-form-label">Email</label>
								<div class="col-sm-9">
					        		<input type="text" class="username-formcontrol" id="input-email" name="email" value="<?php echo $result['email']; ?>" disabled />
					        	</div>
				    		</div>

				    		<div class="form-group row">
        						<label for="input-contactnumber" class="col-sm-3 col-form-label">Contact No</label>
        						<div class="col-sm-9">
        							<input type="number" id="input-contactnumber" class="form-control" name="contactnumber" value="<?php echo $result['contact_number']; ?>" disabled />
								</div>
       						</div>


							<div class="col-sm-8 col-sm-2">
								<button class="btn btn-primary edit1" type="submit" id="edit-profile">Edit Profile</button>
								<button class="btn btn-primary update d-none" type="submit" id="update-profile">Update Profile</button>
							</div>
						</form>
        			</div>
				</div>

				<div class="col-lg-6">
       	 			<div class="p-3 back-color">
        				<h3 class="	text-center mb-4">Change Password</h3>
    					<form method="post" action="#" id="change-password-form">	
							<div class="form-group row">
								<label for="input-oldpassword" class="col-sm-3 col-form-label">Old Password</label>
								<div class="col-sm-9">
									<input type="password" class="form-control" id="input-oldpassword" name="oldpassword" disabled />
					        	</div>
				    		</div>
				    		
				    		<div class="form-group row">
								<label for="input-newpassword" class="col-sm-3 col-form-label">New Password</label>
								<div class="col-sm-9">
					        		<input type="password" class="form-control" id="input-newpassword" name="newpassword" disabled />
					        	</div>
				    		</div>
				    		
				    		<div class="form-group row">
								<label for="input-cpassword" class="col-sm-3  col-form-label">Confirm Password</label>
								<div class="col-sm-9">
					        		<input type="password" class="form-control mt-1"  id="input-cpassword" name="cpassword" disabled />
					        	</div>
				    		</div>

							<div class="col-sm-8 col-sm-2">
								<button class="btn btn-primary edit2" type="submit" id="edit-password">Edit Password</button>
								<button type="submit" class="btn btn-primary update2 d-none" id="update-password">Update Password</button>
							</div>
						</form>
					</div>
				</div>
				</div>
			</div>
		</div>	
	</div>

<?php include 'footerscripts.php'; ?>
	<script>

		$(document).ready(function(){
			$('#edit-profile').click(function(e){
				e.preventDefault();	
				var id = "change-profile-form"; 
				$('#' + id + ' .form-control').prop("disabled",false);
				$('#' + id + ' .edit1').addClass("d-none");
				$('#' + id + ' .update').removeClass("d-none");
			});

			$('#update-profile').click(function(){
				$('#change-profile-form').validate({
					rules:
					{
						firstname:{
							required:true,
						},
						lastname:{
							required:true,
						},
						contactnumber:{
							required:true,
							minlength:10,
							maxlength:10,
							number:true,
						},
					},
					messages:
					{
						firstname:{
							required:"Please enter the First Name",
						},
						lastname:{
							required:"Please enter the Last Name",
						},
						contactnumber:{
							required:"Please enter the contact Number",
							minlength:"Number must be atleast 10 digits",
							maxlength:"Number must be not more than 10 digits",
						},
					},
					errorElement: 'span',
					errorClass: 'form-error-elemet',
					highlight: function(element, errorClass, validClass){
				      $(element).parents("div.form-group").addClass('element-error');
				      $(element).parents("div.form-group").removeClass('element-success');
				    },
				    unhighlight: function(element, errorClass, validClass){
				      $(element).parents("div.form-group").removeClass('element-error');
				      $(element).parents("div.form-group").addClass('element-success');
				    },
				    submitHandler: function(){
						event.preventDefault();
						var formdata = $("#change-profile-form").serialize();
						$.ajax({
							url  : 'update_admin.php',
							type : 'POST',
							data : formdata,
							dataType : 'json',
							success: function(response){
								if(response.success){
									$('.form-wrap').before('<div class="alert alert-success bg-success text-white" role="alert"><i class="fa fa-check-circle"></i> ' + response['success'] + '</div>');

									var id = "change-profile-form"; 
									$('#' + id + ' .form-control').prop("disabled",true);
									$('#' + id + ' .update').addClass("d-none");
									$('#' + id + ' .edit1').removeClass("d-none");
								}
								if(response.error){
									$('.form-wrap').before('<div class="alert alert-danger bg-danger text-white" role="alert"><i class="fa fa-exclamation-circle"></i> ' + response['error'] + '</div>');
								}
								$('.alert').delay(2000).fadeOut(3000);
							}
				    	});       	
					}
				});
			});
			$('#edit-password').click(function(e){
				e.preventDefault();
				var id = "change-password-form"; 
				$('#' + id + ' .form-control').prop("disabled",false);
				$('#' + id + ' .edit2').addClass("d-none");
				$('#' + id + ' .update2').removeClass("d-none");
			});
			$('#update-password').click(function(){
				$('#change-password-form').validate({
					rules:
					{
						oldpassword:{
							required:true,
							minlength:6,
						},
						
						newpassword:{
							required:true,
							minlength:6,
						},
						cpassword:{
							required:true,
							minlength:6,
							equalTo: "#input-newpassword",
						},

					},
					messages:
					{
						oldpassword:{
							required:"Please enter the  Old password",
							minlenght:"Password must be atleast 6 characters",
						},
						newpassword:{
							required:"Please enter the New password",
							minlenght:"Password must be atleast 6 characters",
						},
						cpassword:{
							required:"Please enter the Confirm password",
							minlenght:"Password must be atleast 6 characters",
							equalTo:"Confirm Password should be match with New Password ",
						},
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
						var formdata1 = $("#change-password-form").serialize();
						$.ajax({
							url  : 'update_admin_pass.php',
							type : 'POST',
							data : formdata1,
							dataType : 'json',
							success: function(response){
								if(response.success){
									$('.form-wrap').before('<div class="alert alert-success bg-success text-white" role="alert"><i class="fa fa-check-circle"></i> ' + response['success'] + '</div>');

									var id = "change-profile-form"; 
									$('#' + id + ' .form-control').prop("disabled",true);
									$('#' + id + ' .update').addClass("d-none");
									$('#' + id + ' .edit1').removeClass("d-none");
								}
								if(response.error){
									$('.form-wrap').before('<div class="alert alert-danger bg-danger text-white" role="alert"><i class="fa fa-exclamation-circle"></i> ' + response['error'] + '</div>');
								}
								$('.alert').delay(2000).fadeOut(3000);
							}
				    	});       	
					}
				});
			});
		});
	</script>
<?php include 'footer.php'; ?>