<?php include 'connection.php';

$limit = "6";
$id = $_POST['app_manager_id'];

$query = $conn->query("SELECT a.*, c.name AS category_name FROM applications a LEFT JOIN categories c  ON (a.category_id=c.category_id) WHERE app_manager_id = '".$id."' AND a.app_aproval=1 AND a.app_status=1  ORDER BY RAND() LIMIT ".$limit);

while($row = $query->fetch_assoc()){ ?>

	<div class="col-md-2 col-sm-4 col-xs-6">
		<div class="panel panel-default panel-default-cust" style="width: 180px;">
			<div class="panel-body" style="min-height: 325px;">
				<div class="panel-image">
					<a href="find_app_detail.php?application_id=<?php echo $row['application_id']; ?>"><img src="./upload/<?php echo $row['logo']?>" alt="image"></a>
				</div>
				<div class="panel-image-content">
					<h4><?php echo $row['name']?></h4>
					<h5><?php echo $row['category_name']?></h5>
					<h6><a href="find_app_detail.php?application_id=<?php echo $row['application_id']; ?>">View More Detail</a></h6>
				</div>
			</div>
		</div>
	</div>

<?php } ?>