<div class="modal fade" id="feedback-form" tabindex="-1" role="dialog" aria-labelledby="feedback-form-title" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered"  role="document">
			<div class="modal-content">
				<div class="modal-header main-bg-color" >
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<center><h3 class="modal-title " id="feedback-form-title" style="color: white;margin-bottom: 5px;">Welcome to EASY APP</h3></center>
					<center><h5 class="modal-title" style="color: white;">GIVE FEEDBACK TO EASY APP </h5></center>
				</div>
				
				<form id="user-feedback-form" method="POST">
					<div class="modal-body contact-section">
						<div class="row form-wrap">
							<div class="col-md-12 ">
								<div class="form-group"> 
									<input type="file" class="filestyle " data-buttonname="btn-secondary" id="input-profile" name="profile" accept=".png,.jpg,.jpeg" placeholder="profile" />
								</div>
							</div>
						</div>
								
						<div class="row ">
							<div class="col-md-6 col-xs-6">
								<div class="form-group"> 
									<input placeholder="First name" type="text" class="form-control " name="fname" />
								</div>
							</div>
							<div class="col-md-6 col-xs-6">
								<div class="form-group"> 
									<input placeholder="Last name" type="text" class="form-control" name="lname" />
								</div>
							</div>
						</div>

						<div class="row ">
							<div class="col-md-6 col-xs-6" >
								<div class="form-group">
								<input placeholder="Email" type="email" class="form-control" name="email" />
								</div>
							</div>
							<div class="col-md-6 col-xs-6">
								<div class="form-group">
								<input placeholder="Mobile" type="text" class="form-control" name="mobile" />
								</div>
							</div>
						</div>							
						
						<div class="row ">
							<div class="col-md-12 col-xs-6">
								<div class="form-group"> 
									<textarea type="text" id="input-feedback" class="form-control" rows="4"  name="feedback" placeholder="Enter Feedback"></textarea>
								</div>
							</div>
						</div>	
					</div>

					<div class="modal-footer">
						<div class="text-center ">
							<button  type="submit"  style="width: 200px" class="btn btn-default text-uppercase main-bg-color" >Submit</button>
						</div>
					</div>
				
				</form>
			</div>
		</div>
	</div>