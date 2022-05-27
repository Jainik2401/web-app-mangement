<?php include 'header.php';
include 'function.php';
?>

<section class="gallery-block" style="background: #eeeeee">
	<div class="container ">	
		<h3 class="grid-1">Category app</h3>		
			<!-- <div class="row pad-top-xs"> -->
				<!-- <div class="col-md-2 col-sm-3 col-xs-4">
					<div class="panel panel-default">
						<div class="panel-body ">
							<div class="panel-image">
								<img src="images/9.jpg">
							</div>
							<div class="panel-image-content">
								<h4>Adobe Photoshop CC</h4>
								
							</div>
						</div>
					</div>
				</div>-->
			<!-- </div> -->
	</div>
</section>
<section class="main-review-block">
	<div class="container">
		<div class="review-block">
			<h3>Users Review</h3>
			<div class="row grid review-row">
				<!-- <div class="col-md-4">
					<div class="review-content">
						<div class="content-detail">
							<img src="images/16.jpg">
							<div class="detail-text">
								<h5><span>&#xFF02; </span>Increase Conversion by 65% and ABOV<span> &#xFF02;</span></h5>
								<h5 class="detail-text-name"><span>&mdash; </span>Learn More</h5>
							</div>
						</div>
					</div>
				</div> -->

				<!-- <div class="col-md-4">
					<div class="recommends-content">
						<div class="content-detail">
							<img src="images/17.jpg">
							<div>
								<h4>Affiliatly</h4>
								<h6 class="txt-color">Merketing</h6>
								<h6>No riwes yet</h6>
								<h5>Increase Conversion by 65% and ABOV</h5>
								<h5 class="txt-color">Learn More</h5>
							</div>
						</div>
					</div>
				</div>

				<div class="col-md-4">
					<div class="recommends-content">
						<div class="content-detail">
							<img src="images/18.jpg">
							<div>
								<h4>accessiBe</h4>
								<h6 class="txt-color">Site tools</h6>
								<h6>No riwes yet</h6>
								<h5>Increase Conversion by 65% and ABOV</h5>
								<h5 class="txt-color">Learn More</h5>
							</div>
						</div>
					</div>
				</div> -->

			</div>
		</div>
	</div>

	<section class="bg-img-full bg-img-parallax quote-section pad-top-lg pad-bottom-lg" data-scroll-index="5" style="background-image: url(images/31.jpg);">
		<span class="overlay"></span>
		<div class="container">
			<div class="row">
				<div class="col-cs-12 text-center">
					<span class="subtitle main-color text-uppercase">we are need your feedback</span>
					<h2 class="heading">we want to know how our users feels after using our app.</h2>
					<button type="button" class="btn btn-default main-bg-color text-uppercase" data-toggle="modal" data-target="#feedback-form" class="feedback-form">Give Feedback</button>
				</div>
			</div>
		</div>
	</section>
</section>
<?php include 'footerscript.php'?>
<?php include 'feedback_form.php'?>
<script>
	$.ajax({
		url  : 'get_feedback.php',
		type : 'POST',
		dataType : 'html',
		data : $(),

		success: function(response){
			$('.grid').html(response);
		}
	});


	$.ajax({
		url  : 'get_category.php',
		type : 'POST',
		dataType : 'html',
		data : $(),
		
		success: function(response){
			$('.grid-1').html(response);
			
		}
	});

	
	$(document).ready(function(){
		
		$("#user-feedback-form").validate({
			rules: {
				fname:{
					required:true,
				},
				lname:{
					required:true,
				},
				email:{
					required:true,
					email:true,
				},
				mobile:{
					required:true,
					minlength:10,
					maxlength:10,
					number:true,
				},
			},
			messages:{
				fname:{
					required:" Please enter firstname",
				},
				lname:{
					required:" Please enter lastname",
				},
				email:{
					required:" Please enter email",
					email:" Please enter valid email",
				},
				mobile:{
					required:"Please enter the mobilenumber",
					minlength:"Number must be atleast 10 digits",
					maxlength:"Number must be not more than 10 digits",
				},
			},
			errorElement: 'span',
			errorClass: 'form-error-elemet-modal',
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
					url  : 'feedback_processing.php',
					type : 'POST',
					data :new FormData($('#user-feedback-form')[0]),
					cache: false,
					processData: false,
					contentType: false,
					dataType : 'json',
					beforeSend: function(){
						$('.alert').remove();
						$('#user-feedback-form button[type="submit"]').prop('disabled',true);
					},					
					complete: function(){
						$('#user-feedback-form button[type="submit"]').prop('disabled',false);	
					},
					success: function(response){
						if(response['success']){	//response.success
							$('#user-feedback-form').trigger('reset');

							$('.form-wrap').before('<div class="alert alert-success bg-success text-white" role="alert"><i class="fa fa-check-circle"></i> ' + response['success'] + '</div>');

							$('.alert').delay(2000).fadeOut(3000);
						}
						if(response['error']){	//response.error
							$('.form-wrap').before('<div class="alert alert-danger bg-danger text-white" role="alert"><i class="fa fa-exclamation-circle"></i> ' + response['error'] + '</div>');
							$('.alert').delay(2000).fadeOut(3000);
						}
					}
				});
			}
		});
	});
</script>
<?php include 'footer.php'?>
