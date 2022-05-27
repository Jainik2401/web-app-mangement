<?php include 'function.php';
?>
<?php 

$result = array(
	'name' => '',
	'status' => 1,
);

if(isset($_GET['category_id']) && !empty($_GET['category_id'])){
	
	$result = getCategoryData($_GET['category_id']);
	if (empty($result)){
		header('Location: add_app_catagory.php');
	}

}
include 'header.php';
?>

<div class="page-title-box">
	<div class="row align-items-center">
		<div class="col-sm-6">
			<h4 class="page-title">App Category</h4>
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="index.php">App Catagory</a></li>
				<?php if(isset($_GET['category_id']) && !empty($_GET['category_id'])){ ?>
					<li class="breadcrumb-item active" aria-current="page">Update App Catagory (#<?php echo $_GET['category_id']; ?>)</li>
				<?php } else { ?>
				<li class="breadcrumb-item active" aria-current="page">Add New App Catagory</li>
				<?php } ?>
			</ol>
		</div>
	</div>
</div>
	<div class="row form-wrap">
		<div class="col-lg-6">
			<div class="p-3 back-color">
				<?php if(isset($_GET['category_id']) && !empty($_GET['category_id'])){ ?>
					<h3 class="	text-center mb-4">Update App Catagory(#<?php echo $_GET['category_id']; ?>)</h3>
				<?php } else { ?>
				<h3 class="	text-center mb-4">Add New App Catagory</h3>
				<?php } ?>

				<form id="add-catagory-form" method="POST">
					<?php if(isset($_GET['category_id']) && !empty($_GET['category_id'])){?>
						<input type="hidden" name="category_id" value="<?php echo $_GET['category_id']; ?>" />
					<?php } ?>
					<div class="form-group row">
						<label for="input-catagory" class="col-sm-4 col-form-label">Catagory Name<span class="text-danger">*</span></label>
						<div class="col-sm-8">
							<input type="text" class="form-control" id="input-catagory" value="<?php echo $result['name']; ?>" name="catagoryname" placeholder="Enter Catagory Name" />
						</div>
					</div>
					<div class="form-group row">
						<label for="input-catagory" class="col-sm-4 col-form-label">Catagory Status</label>
						<div class="col-sm-8 mt-1" >
	        				<input type="checkbox" name="switchstatus" id="switch3" switch="bool" value="1" <?php if ($result['status'] == 1){ ?>checked <?php } ?> />
							<label for="switch3" data-on-label="Active" data-off-label="Deactive"></label>
	        			</div>
					</div>
					<div class="text-center mt-4">
						<button type="submit" name="submit" class="btn btn-primary mr-3" id="submit">Submit</button>
						
					</div>
				</form>
			</div>
		</div>
	</div>

<?php include 'footerscripts.php'; ?>
	<script>
		$(document).ready(function(){ 	
			$('#submit').click(function(){
				$('#add-catagory-form').validate({
					rules:
					{
						catagoryname:{
							required:true,
						},
					},
					messages:
					{
						catagoryname:{
							required:"Please enter the catagory name",
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
							url  : 'insert_app_category.php',
							type : 'POST',
							data : $('#add-catagory-form input[type="text"], #add-catagory-form input[type="hidden"], #add-catagory-form input[type="checkbox"]:checked, #add-catagory-form input[type="radio"]:checked, #add-catagory-form select'),
							dataType : 'json',
							beforeSend: function(){
								$('.alert').remove();
								$('#add-catagory-form button[type="submit"]').prop('disabled',true);
							},
							complete: function(){
								$('#add-catagory-form button[type="submit"]').prop('disabled',false);	
							},
							success: function(response){
								if(response['success']){	//response.success
									$('.form-wrap').before('<div class="alert alert-success bg-success text-white" role="alert"><i class="fa fa-check-circle"></i> ' + response['success'] + '</div>');

				            		$('#add-catagory-form').trigger('reset');
				            	}

				            	if(response['error']){	//response.error
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

