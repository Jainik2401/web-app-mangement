<?php include 'header.php';
include 'function.php';

$result = array(
	'category_id' => '',
	'app_manager_id' => '',
	'name' => '',
	'logo' => '',
	'description' => '',
	'url' => '',
	'date_modify' => '',	
);

if(isset($_GET['application_id']) && !empty($_GET['application_id'])){
	$result = getApplicationData($_GET['application_id']); 
		if ($_GET['application_id'] == ''){
		header('Location: find_app.php');
	}
}
	$result_category = getCategoryData($result['category_id']);
	$result_company = getCompanyData($result['app_manager_id']);
	$result_app = getApplicationData($result['application_id']);
?>
<input type="hidden" name="app_manager_id" value="<?php echo $result['app_manager_id'];?>">
<div class="find-app-detail-block">
	<div class="container">
		<div class="row main-detail">
			<div class="col-md-6">
			<div class="">
				<img src="upload/<?php echo $result['logo']?>">
				<div class="main-detail-text">
					<h2><?php echo $result['name'];?></h2>
					<h6 class="txt-color"><?php echo $result_category['name'];?></h6>
					<h5><?php echo $result_company['company_name'];?></h5>
				</div>
			</div>
		</div>
			<div class="col-md-6">
				<div class="main-detail-button mar-top-sm">
					<button class="btn btn-lg btn-pil btn-primary partnerbtn">CONTACT PARTENER</button>
					<button class="btn btn-lg btn-pil btn-primary getappbtn" onclick="window.location.href = '<?php echo $result_app['url'];?>'">GET THIS APP</button>
				</div>
			</div>	
		</div>
	</div>
	<div class="row sub-detail">
		<div class="container">
			<div class="col-md-7 detail-desc mar-bottom-sm">
				<h3>About The App</h3>
				<p><?php echo $result['description'];?></p>
			</div>

			<div class="col-md-5 detail-company">
				<h3>About The App</h3>
				<ul>
					<li><strong>Company Name :</strong><?php echo $result_company['company_name'];?></li>
					<li><strong>Category Name :</strong><?php echo $result_category['name'];?></li>
					<li><strong>Last Update date :</strong><?php echo $result['date_modify'];?></li>
				</ul>
				
					<button class="btn btn-default main-bg-color text-uppercase mar-bottom-sm" onclick="window.location.href = '<?php echo $result_app['support_url']?>';" type="submit" id="getsupport">Get Support</button>
			</div>
		</div>
	</div>
	<section class="main-review-block">
		<div class="container">
			<div class="review-block">
				<h3>You may also Like This</h3>
				<div class="row grid review-row">
					
				</div>
			</div>
		</div>
	</section>
</div>

<?php include 'footerscript.php'?>
<script>
	$(document).ready(function(){
		$.ajax({
		url  : 'get_similarapp.php',
		type : 'POST',
		dataType : 'html',
		data : $('input[type="hidden"]'),

		success: function(response){
			$('.grid').html(response);
			
		}
		});
	});
</script>
<?php include 'footer.php'?>
