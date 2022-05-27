<?php include 'header.php'?>
	<div class="main-banner bg-img-full section text-center" style="background-image: url(images/background.jpg);" data-scroll-index="0">
		<div class="pad-top-md hidden-xs"></div>
			<div class="pad-bottom-lg"></div>
				<div class="container">
					<div class="row">
						<div class="col-xs-12">
							<h1 class="heading text-uppercase">we <span class="main-color">Present</span> <br>your app</h1>
							<span class="divider main-bg-color"></span>
							<p>Our main goal is our user get satisfaction to use this plateform they can present their app here and other people can get<br> secure and verified app.We are providing one type of maeketing plateform for application.</p>
							<a href="#" class="btn btn-default main-bg-color text-uppercase" data-scroll-nav="6">download app</a>
							<ul class="list-inline icons">
								<li><a href="#"><i class="fab fa-android"></i></a></li>
								<li><a href="#"><i class="fab fa-windows" aria-hidden="true"></i></a></li>
								<li><a href="#"><i class="fab fa-apple" aria-hidden="true"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			<div class="pad-top-sm hidden-xs"></div>
		<div class="overlay"></div>
	</div>
	
	<div class="trendiing-block grey-bg">
		<div class="container">	
		<h3>Trending Apps</h3>		
			<div class="row pad-top-xs app-slider grid">
				<!-- <div class="col-md-3 ">
					<div class="panel panel-default">
						<div class="panel-body ">
							<div class="panel-image">
								<img src="images/9.jpg">
							</div>
							<div class="panel-image-content">
								<h4>Adobe Photoshop CC</h4>
								<p>Editing Images</p>
							</div>
						</div>
					</div>
				</div> -->

				<!-- <div class="col-md-3">
					<div class="panel panel-default">
						<div class="panel-body">
							<div class="panel-image">
								<img src="images/12.jpg">
							</div>
							<div class="panel-image-content">
								<h4>MuleSoft</h4>
								<p>Software Maintence</p>
							</div>
						</div>
					</div>
				</div>

				<div class="col-md-3">
					<div class="panel panel-default">
						<div class="panel-body">
							<div class="panel-image">
								<img src="images/15.jpg">
							</div>
							<div class="panel-image-content">
								<h4>DeepL</h4>
								<p>Online Shopping</p>
							</div>
						</div>
					</div>
				</div>

				<div class="col-md-3">
					<div class="panel panel-default">
						<div class="panel-body">
							<div class="panel-image">
								<img src="images/14.jpg">
							</div>
							<div class="panel-image-content">
								<h4>KING LAND</h4>
								<p>Ecommerce and transfer</p>
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
					<span class="subtitle main-color text-uppercase">we are here for help you</span>
					<h2 class="heading">Metro App is the Best Solution for Your Business</h2>
					<button type="button" class="btn btn-default main-bg-color text-uppercase" data-toggle="modal" data-target="#reg-form" class="reg-form">Register Here</button>
				</div>
			</div>
		</div>
	</section>

	<div class="section grey-bg text-center pad-top-sm">
		<!-- start of line box -->
		<div class="container line-box">
			<div class="row">
				<div class="col-xs-12 ">
					<div class="line-slider ">
						 <div class="box pad-bottom-sm">
							<img src="images/1.jpg" alt="image">
						</div>
						<div class="box pad-bottom-sm">
							<img src="images/2.jpg" alt="image">
						</div>
						<div class="box pad-bottom-sm">
							<img src="images/3.jpg" alt="image">
						</div>
						<div class="box pad-bottom-sm">
							<img src="images/4.jpg" alt="image">
						</div>
						<div class="box pad-bottom-sm">
							<img src="images/5.jpg" alt="image">
						</div>
						<div class="box pad-bottom-sm">
							<img src="images/6.jpg" alt="image">
						</div>
						<div class="box pad-bottom-sm">
							<img src="images/3.jpg" alt="image">
						</div> 
					</div>
				</div>
			</div>
		</div><!-- end of line box -->
	</div>

<?php include 'footerscript.php'?>
<?php include 'registration.php'?>
<script>
$(document).ready(function(){
	$('.line-slider').slick({
		speed: 2000,
	 	dots: false,
	 	arrows: false,
	 	infinite: true,
	 	autoplay: true,
	 	slidesToShow: 5,
	 	autoplaySpeed: 2000,
	 	adaptiveHeight: true,
	});
	$.ajax({
		url  : 'app.php',
		type : 'POST',
		dataType : 'html',
		data : '',
		
		success: function(response){
			$('.grid').html(response);
			$('.app-slider').slick({
			speed: 2000,
		 	dots: false,
		 	arrows: true,
		 	infinite: true,
		 	autoplay: true,
		 	slidesToShow: 5,
		 	slidesToScroll: 1,
		 	autoplaySpeed: 2000,
		 	adaptiveHeight: true,
		 	 responsive: [
				{
			  	breakpoint: 1024,
			  	settings: {
				    slidesToShow: 3,
				    slidesToScroll: 1,
				    infinite: true,
			  		}
				},
				{
				breakpoint: 600,
				settings: {
				    slidesToShow: 2,
				    slidesToScroll: 1,
				    infinite: true
				  	}
				},
				{
			  	breakpoint: 480,
			  	settings: {
			    	slidesToShow: 1,
			    	slidesToScroll: 1,
			    	infinite: true
			  		}
				}
				]
			});
		}
	});		
		$("#manager-reg-form").validate({
			rules: {
				fname:{
					required:true,
				},
				lname:{
					required:true,
				},
				companyname:{
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
				pass:{
			 		required:true,
			 		minlength:6,
				},
				confirmpass:{
					required:true,
					minlength:6,
					equalTo:"#pass",
				},
			},
			messages:{
				fname:{
					required:" Please enter firstname",
				},
				lname:{
					required:" Please enter lastname",
				},
				companyname:{
					required:" Please enter companyname",
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
				pass:{
				 	required:"Please enter the password",
				 	minlength:"Password should be atleast 6 digit",
				},
				confirmpass:{
				 	required:"Please enter the confirm password",
				 	minlength:"Password should be atleast 6 digit",
				 	equalTo:"Please enter confirm Password Same as password",
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
					url  : 'registration_processing.php',
					type : 'POST',
					data : $('#manager-reg-form input[type="text"], #manager-reg-form input[type="email"], #manager-reg-form input[type="password"]'),
					dataType : 'json',
					beforeSend: function(){
						$('.alert').remove();
						$('#manager-reg-form button[type="submit"]').prop('disabled',true);
					},					
					complete: function(){
						$('#manager-reg-form button[type="submit"]').prop('disabled',false);	
					},
					success: function(response){
						if(response['success']){	//response.success
							$('#manager-reg-form').trigger('reset');
							window.location.href = "app_manager/index.php";
						}
						if(response['redirect']){
							window.location.href = response['redirect'];
						}
						if(response['error']){	//response.error
							$('.form-wrap').before('<div class="alert alert-danger bg-danger text-white" role="alert"><i class="fa fa-exclamation-circle"></i> ' + response['error'] + '</div>');
							$('.alert').delay(2000).fadeOut(3000);
						}
					}
				});
			}
		});
		$('.close').click(function(){
			$('#manager-reg-form')[0].reset();
		});
	});
</script>
<?php include 'footer.php'?>