		
<?php include 'connection.php';

$query = $conn->query("SELECT a.*, c.name AS category_name FROM applications a LEFT JOIN categories c  ON (a.category_id=c.category_id) WHERE trending=1 AND app_status=1"); 

while($row = $query->fetch_assoc()){ ?>	
	<div class="col-md-3 ">
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="panel-image">
					<img src="./upload/<?php echo $row['logo']?>" alt="image">
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
