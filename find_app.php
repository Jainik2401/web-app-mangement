<?php include 'header.php';
include 'function.php';

$result = array(
	'category_id' => '',
	'app_manager_id' => '',
);
?>

<div class="nospace " id="filter-sticky">
	<div class="filter-sticky">
		<div class="container" >
			<div class="row" >

				<div class="col-sm-2 col-xs-2 col-md-2" >
					<input type="text" class="filter-select" placeholder="Search.." name="search">	
				</div>
				
				<div class="col-sm-2 col-xs-2 col-md-2" >
					<select class="category" name="category">
		                <option value="">Select Category</option>
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
				
				<div class="col-sm-2 col-xs-2 col-md-2" >
				<select class="companyname " name="companyname">
	                <option value="">Select Companyname</option>
					<?php $company = getCompany();
					#$company = array();
					foreach($company as $comp){
						if($comp['app_manager_id'] == $result['app_manager_id']){
							echo '<option  value="' . $comp['app_manager_id'] . '" selected>' . $comp['company_name'] . '</option>';
						} else {
							echo '<option  value="' . $comp['app_manager_id'] . '">' . $comp['company_name'] . '</option>';
						}
					} ?>
				</select>
				</div>

				<div class="col-sm-2 col-xs-2 col-md-2" > 
					<select class="sorting filter-select " name="sorting">
		                <option value="date_added.desc"> Latest App </option>
		                <option value="name.asc"> A - Z</option>
		                <option value="name.desc"> Z - A</option>
					</select>
				</div>	
				
				<div class="col-sm-2 col-xs-2 col-md-2" >
					<button type="submit"  class="btn btn-default main-bg-color find" id="find"> Find <i class="fas fa-filter"></i></button>
					<button type="submit"  class="btn btn-default btn-danger find" id="reset"> Reset <i class="fa fa-times" aria-hidden="true"></i></button>

				</div>
			</div>		
		</div>
	</div>
</div>

<div class="find-app-block" >
	<div class="container">	
		<!-- <div class="category-block">
			<div class="row ">
				<div class="col-md-3 ">
					<div class="panel panel-default">
						<div class="panel-body">
							<div class="panel-image">
								<img src="images/9.jpg">
							</div>
							<div class="panel-image-content">
								<h4>Adobe Photoshop CC</h4>
								<p>Editing Images</p>
							</div>
						</div>
					</div>
				</div>

				<div class="col-md-3">
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
				</div>

			</div>
		</div>

		<div class="recommends-block">
			<h3>BigCommerce recommends</h3>
			<div class="row" style="margin-top: 50px;margin-bottom: 80px;">
				<div class="col-md-4">
					<div class="recommends-content">
						<div class="content-detail">
							<img src="images/16.jpg">
							<div>
								<h4>Nosto Personalization</h4>
								<h6 class="txt-color">Merchandising</h6>
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
				</div>
			</div>
		</div> -->

			<div class="main-app-list mar-bottom-lg pad-top-xs">
				<h3>All Application Listing</h3>
				<div class="rows">
					<input type="hidden" name="page" id="page" value="1">
					<div class="row grid"><!-- 
						<div class="col-md-4 app-col">
							<div class="main-app-detail">
								<img src="./images/19.jpg">
								<div class="main-app-desc">
									<h4>MailChimp</h4>
									<h6 class="txt-color">Marketing</h6>
								</div>
							</div>
						</div> -->
					</div>
				</div>
				<div class='loader'><i class="fas fa-spinner fa-spin"></i><!-- <img src="images/icons/loading.gif"> -->	
				</div>
			</div>
		
	</div>
</div>
<?php include 'footerscript.php'?>
<script type="text/javascript">
function loadApps(replace = false){
	$.ajax({
		url  : 'getapp.php',
		type : 'POST',
		dataType : 'html',
		data : $('input[type="hidden"],input[type="text"],select'),
		
		success: function(response){
			if(replace){
				$('.grid').html(response);
			} else {
				$('.grid').append(response);
			}
			$('.loader').addClass('hide');

			$('#page').val( function(i, oldval) {
				return ++oldval;
			});
		}
	});
}

loadApps();

$(document).delegate("#loadmore", 'click', function(){
	$('.loader').removeClass('hide');
	$(this).remove();

	loadApps();		
});
$(document).ready(function(){
		initStickyHeader();
	function initStickyHeader() {
		
		"use strict";

		var win = jQuery(window),
			stickyClass = 'sticky-1';

		jQuery('#filter-sticky').each(function() {
			var header = jQuery(this);
			var headerOffset = header.offset().top || 0;
			var flag = true;	

			function scrollHandler() {
				if (win.scrollTop() > headerOffset) {
					if (flag){
						flag = false;
						header.addClass(stickyClass);
					}
				} else {
					if (!flag) {
						flag = true;
						header.removeClass(stickyClass);
					}
				}
			}

			scrollHandler();
			win.on('scroll resize orientationchange', scrollHandler);
		});
	}
	$(".category").select2({
    	
	});
	$(".companyname").select2({
    
	});
	$("#find").click(function(){
		$('#page').val(1);
		loadApps(true);	
		
	});
	$("#reset").click(function(){
		window.location.reload();
	});
	
});
</script>
<?php include 'footer.php'?>
