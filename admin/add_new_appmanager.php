<?php include 'function.php';
?>
<?php 

$result = array(
	'firstname' => '',
	'lastname' => '',
	'company_name' => '',
	'email' => '',
	'contact_number' => '',
	'gender' => '',
	'password' => '',
	'app_status' => 1,
);

if(isset($_GET['app_manager_id']) && !empty($_GET['app_manager_id'])){
	$result = getManagerData($_GET['app_manager_id']);
	if (empty($result)){
		header('Location: add_new_appmanager.php');
	}

}
include 'header.php';
?>


<div class="page-title-box">
    <div class="row align-items-center">
        
        <div class="col-sm-6">
            <h4 class="page-title">App Manager</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">App Manager</a></li>
                <?php if(isset($_GET['app_manager_id']) && !empty($_GET['app_manager_id'])){ ?>
					<li class="breadcrumb-item active" aria-current="page">Update App Manager (#<?php echo $_GET['app_manager_id']; ?>)</li>
				<?php } else { ?>
    			<li class="breadcrumb-item active" aria-current="page">Add New App Manager</li>
    			<?php } ?>
            </ol>

        </div>
    </div>
</div>
	
	<div class="row form-wrap">
        <div class="col-lg-8">
        	<div class="p-3 back-color">
        		<?php if(isset($_GET['app_manager_id']) && !empty($_GET['app_manager_id'])){ ?>
					<h3 class="	text-center mb-4">Update App Manager (#<?php echo $_GET['app_manager_id']; ?>)</h3>
				<?php } else { ?>
    			<h3 class="	text-center mb-4">Add New App Manager</h3>
    			<?php } ?>
		    	<form id="appmanager-reg-form" method="POST">
		    			<?php if(isset($_GET['app_manager_id']) && !empty($_GET['app_manager_id'])){?>
						<input type="hidden" name="app_manager_id" value="<?php echo $_GET['app_manager_id']; ?> " />
						<?php } ?>

		    		<div class="form-group row">
						<label for="input-firstname" class="col-sm-3 col-form-label">First Name<span class="text-danger">*</span></label>
						<div class="col-sm-9">
			        		<input type="text" class="form-control" id="input-firstname" value="<?php echo $result['firstname']; ?>" name="firstname" placeholder="Enter First Name" />
			        	</div>
	        		</div>
	        
			        <div class="form-group row">		
			        	<label for="input-lastname" class="col-sm-3 col-form-label">Last Name<span class="text-danger">*</span></label>
			        	<div class="col-sm-9">
			        		<input type="text" id="input-lastname" class="form-control" value="<?php echo $result['lastname']; ?>" name="lastname" placeholder="Enter Last Name" />
			        	</div>	
			        </div>
			        
			        <div class="form-group row">
						<label for="input-companyname" class="col-sm-3 col-form-label">Comapany Name<span class="text-danger">*</span></label>	
						<div class="col-sm-9">
							<input type="text" id="input-companyname" class="form-control" value="<?php echo $result['company_name']; ?>" name="companyname" placeholder="Enter Comapany Name" />
						</div>
					</div>

			        <div class="form-group row">	
			        	<label for="input-email" class="col-sm-3 col-form-label">Email<span class="text-danger">*</span></label>
			        	<div class="col-sm-9">
			        		<input type="email" class="form-control" id="input-email" value="<?php echo $result['email']; ?>" name="email" placeholder="Enter Email" />
			        	</div>
			        </div>

			       	<div class="form-group row">
			        	<label for="input-contactnumber" class="col-sm-3 col-form-label">Contact Number<span class="text-danger">*</span></label>
			        	<div class="col-sm-9">
			        		<input type="number" id="input-contactnumber" class="form-control" value="<?php echo $result['contact_number']; ?>" name="contactnumber" placeholder="Enter Contact Number"/>
			       		</div>
			       </div>
			  
			       	<div class="form-group row">
			        	<label for="input-male" class="col-sm-3 col-form-label">Gender :</label>
			        	<div class="custom-control custom-radio custom-control-inline ml-3 mt-2">
			         		<input type="radio" id="input-male" class="custom-control-input" value="1" name="gender"  <?php if($result['gender'] == 1 ) {echo 'checked';} ?> />
			        		<label for="input-male" class="custom-control-label">Male </label>
			        	</div>
			        	<div class="custom-control custom-radio custom-control-inline ml-3 mt-2">
			          		<input type="radio" id="input-female" class="custom-control-input" value="2" name="gender" <?php if($result['gender'] == 2 ) {echo 'checked';} ?> />
				   	    	<label for="input-female" class="custom-control-label">Female </label>
				   		</div>
				   	</div>
				   	
				   	<div class="form-group row">   
				    	<label for="input-password" class="col-sm-3 col-form-label">Password<?php if(!isset($_GET['app_manager_id'])) echo '<span class="text-danger">*</span>'; ?></label>
				    	<div class="col-sm-9">
				    		<input type="password" id="input-password" class="form-control" name="password"placeholder="Enter password" <?php if(!isset($_GET['app_manager_id'])) echo 'required'; ?> />
				    	</div>
				    </div> 
				    
				    <div class="form-group row">	
				    	<label for="input-confirmpassword" class="col-sm-3 col-form-label">Confirm Password<?php if(!isset($_GET['app_manager_id'])) echo '<span class="text-danger">*</span>'; ?></label>
				    	<div class="col-sm-9">
				    	<input type="password" id="input-confirmpassword" class="form-control" name="confirmpassword" placeholder="Enter Confirm password"/>
				    	</div>
				    </div> 

				    <div class="form-group row">
	        			<label for="input-catagory" class="col-sm-3 col-form-label">App Status</label>
	        			<div class="col-sm-9 mt-1" >
	        				<input type="checkbox" name="switchstatus" id="switch3" switch="bool" value="1" <?php if($result['app_status'] == 1 ) {echo 'checked';} ?>>
	        				<label for="switch3" data-on-label="Active" data-off-label="Deactive"></label></div>
	        		</div>
				    
				    <div class="text-center mt-4">
						<button type="submit" class="btn btn-primary mr-3" id="submit" >Submit</button>
					</div>
				</form>  
			</div>	 	                 
		</div> <!-- end col -->
	</div> <!-- end row -->

<?php include 'footerscripts.php'; ?>
<script src="assets/js/jquery.validate.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$('#submit').click(function(){
				$("#appmanager-reg-form").validate({
					rules:{
						firstname: {
							required:true,
						},
						lastname: {
							required:true,
						},
						email:{
							required:true,
							email:true,
						},
						companyname:{
							required:true,
						},
						contactnumber:{
							required:true,
							minlength:10,
							maxlength:10,
							number:true,
						},
						password:{
							//required:true,
							minlength:6,
						},
						confirmpassword:{
							//required:true,
							minlength:6,
							equalTo:"#input-password"
						},
					},
					messages: {
						firstname: {
							required: "Please enter the first name",
						},
						lastname:{
							required: "Please enter the last name",
						},		
						email:{
							required: "Please enter the email",
							email:"Please enter valid email",
						},
						companyname:{
							required:"Please enter the companyname",
						},
						contactnumber:{
							required:"Please enter the contactnumber",
							minlength:"Number must be atleast 10 digits",
							maxlength:"Number must be not more than 10 digits",
						},
						password:{
							required:"Please enter the password",
							minlenght:"Password must be atleast 6 characters",	
						},
						confirmpassword:{
							required:"Please enter the confirm password",
							minlenght:"Password must be atleast 6 characters",
							equalTo:"Please Enter Confirm Password Same as Password ",
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
						$.ajax({
							url  : 'insert_add_new_appmanager.php',
							type : 'POST',
							data : $('#appmanager-reg-form input[type="text"], #appmanager-reg-form input[type="number"], #appmanager-reg-form input[type="email"], #appmanager-reg-form input[type="radio"]:checked, #appmanager-reg-form input[type="password"], #appmanager-reg-form input[type="checkbox"]:checked, #appmanager-reg-form input[type="hidden"]'),
							dataType : 'json',
							beforeSend: function(){
								$('.alert').remove();
								$('#appmanager-reg-form button[type="submit"]').prop('disabled',true);
							},
							complete: function(){
								$('#appmanager-reg-form button[type="submit"]').prop('disabled',false);	
							},
							success: function(response){
								if(response.success){
									//response.success
									$('.form-wrap').before('<div class="alert alert-success bg-success text-white" role="alert"><i class="fa fa-check-circle"></i> ' + response['success'] + '</div>');

									$('#appmanager-reg-form').trigger('reset');
								}

				            	if(response.error){	//response.error
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