<?php include 'function.php'; 

$session_id = session_id();
if(!$session_id) session_start();

$result = array(
	'category_id' => '',
	'app_manager_id' => '',
	'name' => '',
	'logo' => '',
	'description' => '',
	'url' => '',
	'support_url' => '',
	'app_status' => 1,
	
);

if(isset($_GET['application_id']) && !empty($_GET['application_id'])){
	$result = getApplicationData($_GET['application_id'],$_SESSION['app_manager_id']);
		if (empty($result)){
		header('Location: app_listing.php');
	}
}
include 'header.php';
?>
	<div class="page-title-box">
	    <div class="row align-items-center">
	
	        <div class="col-sm-6">
				<h4 class="page-title"> App Management</h4>
	            <ol class="breadcrumb">
	                <li class="breadcrumb-item"><a href="index.php">App Management</a></li>
	                <?php if(isset($_GET['application_id']) && !empty($_GET['application_id'])){ ?>
	    			<li class="breadcrumb-item active" aria-current="page">Update App (#<?php echo $_GET['application_id']; ?>)</li>
	    			<?php } else { ?>
	    			<li class="breadcrumb-item active" aria-current="page">Add New App</li>
	    			<?php } ?>
	            </ol>
	        </div>
	    </div>
	</div>
	<div class="row form-wrap">
        <div class="col-lg-8">
        	<div class="p-4 back-color">
        		<?php if(isset($_GET['application_id']) && !empty($_GET['application_id'])){ ?>
					<h3 class="	text-center mb-4">Update App Manager (#<?php echo $_GET['application_id']; ?>)</h3>
				<?php } else { ?>
	        	<h3 class="	text-center mb-4">Add New Application</h3>		
	        	<?php } ?>
		    	<form action="" id="app-reg-form" method="POST">
		    		<?php if(isset($_GET['application_id']) && !empty($_GET['application_id'])){?>
						<input type="hidden" name="application_id" value="<?php echo $_GET['application_id']; ?> " />
						<?php } ?>

					<div class="form-group row">
						<label for="input-appname" class="col-sm-3 col-form-label">Application Name<span class="text-danger">*</span></label>
						<div class="col-sm-9">
							<input type="text" id="input-appname" class="form-control" name="appname" value="<?php echo $result['name']; ?>"placeholder="Enter Application Name"/>
						</div>
					</div>
					
					<div class="form-group row">
						<label for=	"input-applogo" class="col-sm-3 col-form-label">Application Logo<?php if(!isset($_GET['application_id'])) echo '<span class="text-danger">*</span>'; ?></label>
						<div class="col-sm-9">
	                        <input type="file" class="filestyle " data-buttonname="btn-secondary" id="input-applogo" name="applogo" accept=".png,.jpg,.jpeg" placeholder="logo" <?php if(!isset($_GET['application_id'])) echo 'required'; ?> />
	                   	</div>
					</div>			

					<div class="form-group row">	
						<label for=	"input-appdescription" class="col-sm-3 col-form-label">Application Description</label>
						<div class="col-sm-9">
							<textarea type="text" id="input-appdescription" class="form-control" rows="5"  name="appdescription" placeholder="Enter Application Description"><?php echo $result['description']; ?></textarea>
						</div>	
					</div>

					<div class="form-group row">
						<label for="input-appurl" class="col-sm-3 col-form-label">Application URL<span class="text-danger">*</span></label>		
						<div class="col-sm-9">
							<input type="text" id="input-appurl" class="form-control" name="appurl" value="<?php echo $result['url']; ?>"placeholder="Enter Application URL" />
						</div>
					</div>

					<div class="form-group row">
						<label for="input-supporturl" class="col-sm-3 col-form-label">Supporting URL<span class="text-danger">*</span></label>
						<div class="col-sm-9">
							<input type="text" id="input-supporturl" class="form-control" name="supporturl" value="<?php echo $result['support_url']; ?>"placeholder="Enter Supporting URL" />
						</div>
					</div>

					<div class="form-group row">
	                    <label class="col-sm-3 col-form-label">App Category<span class="text-danger">*</span>
	                    </label>
	                        <div class="col-sm-9">
	                           <select class="js-example-basic-single" name="category">
	                           	
	                                <option value="">Select</option>
	                                <?php $categories = getCategories();
									foreach($categories as $catagory){
										if($catagory['category_id'] == $result['category_id']){
											echo '<option value="' . $catagory['category_id'] . '" selected>' . $catagory['category_name'] . '</option>' ;
										} else {
											echo '<option value="' . $catagory['category_id'] . '">' . $catagory['category_name'] . '</option>' ;
										}

										} ?>                   
								</select>
	                        </div>
	                </div>	
					
					<div class="form-group row">
	        			<label for="input-catagory" class="col-sm-3 col-form-label">App Status</label>
	        			<div class="col-sm-9 mt-1" >
	        				<input type="checkbox" name="status-switchstatus" value="1" id="switch3" switch="bool" <?php if($result['app_status'] == 1 ) {echo 'checked';} ?>>
	        				<label for="switch3" data-on-label="Active" data-off-label="Deactive"></label></div>
	        		</div>
					
					<div class="text-center mt-4">
						<button type="submit"class="btn btn-primary mr-3" id="submit">Submit</button>
					</div>
				</form>
			</div>
	    </div> <!-- end col -->


	    <div class="col-lg-3">
	    	<?php
	    if(isset($_GET['application_id']) && !empty($_GET['application_id'])){
				$result = getApplicationData($_GET['application_id'],$_SESSION['app_manager_id']);?>

				<img src="../upload/<?php echo $result['logo']; ?>" class="border img-fluid border-dark"  id="input-applogo-img"> 
				<?php
				} else{ ?>

					<img src="assets/images/no-image.jpg"  data-placeholder="assets/images/no-image.jpg" class="border img-fluid border-dark" id="input-applogo-img" >
						<?php } ?>
		</div>
	</div> <!-- end row -->
	
	
<?php include 'footerscripts.php'; ?>
<script>
$(document).ready(function(){
	$('.js-example-basic-single').select2();
		$('#submit').click(function(){
			$('#app-reg-form').validate({
			rules:
			{
				appname:{
					required:true,
				},
				companyname:{
					required:true,	
				},
				applogo:{
					//required:true,
				},
				appurl:{
					required:true,
				},
				supporturl:{
					required:true,
				},
				category:{
					required:true,	
				}
			},
			messages:
			{
				appname:{
					required:"Please enter the Application name",
				},
				companyname:{
					required:"Please Select the Comapany name",
				},
				applogo:{
					required:"Please choose Application logo",
				},
				appurl:{
					required:"Please enter the Application URL",
				},
				supporturl:{
					required:"Please enter the Supporting URL",
				},
				category:{
					required:"Please enter the Application URL",
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
					url  : 'insert_add_new_app.php',
					type : 'POST',
					data : new FormData($('#app-reg-form')[0]),
					cache: false,
					processData: false,
					contentType: false,
					dataType : 'json',
					beforeSend: function(){
						$('.alert').remove();
						$('#app-reg-form button[type="submit"]').prop('disabled',true);
					},
					complete: function(){
						$('#app-reg-form button[type="submit"]').prop('disabled',false);	
					},
					success: function(response){
						if(response.success){

							$("div.form-group").removeClass('element-success');

							$("#input-applogo-img").attr('src', $('#input-applogo-img').data('placeholder'));
								
							$('.form-wrap').before('<div class="alert alert-success bg-success text-white" role="alert"><i class="fa fa-check-circle"></i> ' + response['success'] + '</div>');

		            		$('#app-reg-form').trigger('reset');
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

 	function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#input-applogo-img').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#input-applogo").change(function(){
        readURL(this);
    });

</script>
<?php include 'footer.php'; ?>