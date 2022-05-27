<?php include 'header.php'?>
	<div class="contact-block">
		<div class="container pad-top-lg">
			<div class="about-inline text-center">
				<div class="col-xs-12 col-sm-10 col-sm-push-1 col-lg-8 col-lg-push-2 text-center mar-bottom-md">
					<span class="subheading text-uppercase main-color">CONTACT US</span>
						<h4>Customer satisfaction is our top priority,  <br>  Don’t hesitate to contact us </h4>
				</div>
	       </div>
		</div>
		
		<!-- CONTACT INFO -->
		<div class="pad-bottom-md"> 
			<div class="container">
				<div class="row">
					<div class="col-lg-3 col-sm-6">
						<div class="c-info">
							<i class="fas fa-mobile-alt"></i>
							<h5><b>Call Us</b></h5>
							<p>+91 7896541230</p>
						</div>
					</div>

					<div class="col-lg-3 col-sm-6">
						<div class="c-info">
							<i class="far fa-envelope"></i>
							<h5><b>Email</b></h5>
							<p><a href="#">easyapp11@gmail.com</a></p>
						</div>
					</div>

					<div class="col-lg-3 col-sm-6">
						<div class="c-info">
							<i class="fas fa-map-marker-alt"></i>
							<h5><b>Address</b></h5>
							<p>101- sudamachowk, Surat.</p>
						</div>
					</div>
	                
	                <div class="col-lg-3 col-sm-6">
						<div class="c-info">
							<i class="fas fa-globe-americas"></i>
							<h5><b>WEBSITE</b></h5>
							<p><a href="#" >www.easyapp.com</a></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>	

	<section class="contact-section contact-form">
		<div class="container">
			<!-- main heading start here -->
			<header class="main-heading row">
				<div class="col-xs-12 col-sm-10 col-sm-push-1 col-lg-8 col-lg-push-2 text-center ">
					
					<h2 class="heading feedback">Get In Touch</h2>
				</div>
			</header><!-- main heading end here -->
			<div class="row">
				<div class="col-xs-12 col-sm-8 col-sm-push-2 col-md-6 col-md-push-3">
					<form id="feedback-form" method="POST">
						
		  					<div class="form-group">
		    	   				<input type="text" class="form-control" name="name" id="name" placeholder="Your Name" >
		  					</div>
		  					
		  					<div class="form-group ">
		    					<input type="text" class="form-control" name="email" id="email" placeholder="Your Email">
		  					</div>
		  					
		  					<div class="form-group ">
		    					<textarea type="text" class="form-control" name="message" id="message" rows="8" placeholder="Your Message"></textarea>
		  					</div>
		  					
		  					<div class="text-center">
								<button class="btn btn-default main-bg-color text-uppercase" type="submit" id="submit">SEND MESSAGE</button>
							</div>
	  				</form>
				</div>
			</div>
		</div>
	</section>
	
	<div class="mapouter">
		<div class="gmap_canvas">
			<iframe width="100%" height="450" id="gmap_canvas" src="https://maps.google.com/maps?q=sdj%20international%20college&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0">	
			</iframe><a href="https://www.embedgooglemap.net"></a>
		</div>
	</div>
	
<?php include 'footerscript.php'?>

<script>
	$(document).ready(function(){
		$('#submit').click(function(){
		$('#feedback-form').validate({
			rules:
			{
				name:{
						required:true,
					},
					email:{
						required:true, 
						email:true,					  
					},
			},
			messages:
			{
				name:{
						required:"Please enter the name",
					},
					email:{
						required:"Please enter the Email",
						email:"Please enter the valid email",
					},	
			},
			errorElement: 'span',
			errorClass: 'form-error-elemet',
			submitHandler: function(){
				event.preventDefault();
				$.ajax({
					url  : 'insert_inquiry.php',
					type : 'POST',
					data : $('#feedback-form input[type="text"], #feedback-form textarea[type="text"]'),
					dataType : 'json',
					beforeSend: function(){
						$('.alert').remove();
						$('#feedback-form button[type="submit"]').prop('disabled',true);
					},					
					complete: function(){
						$('#feedback-form button[type="submit"]').prop('disabled',false);	
					},
					success: function(response){
						if(response['success']){	//response.success
							$('#feedback-form').trigger('reset');
						}
					}
				});
			}
		});
		});		
	});	
</script>
<?php include 'footer.php'?>