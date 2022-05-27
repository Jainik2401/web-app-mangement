<?php include 'connection.php';

$query = $conn->query("SELECT * FROM feedback WHERE status=1 ORDER BY RAND() LIMIT 3");

while($row = $query->fetch_assoc()){
?>

<div class="col-md-4 col-xs-12 col-sm-6	">
	<div class="review-content mar-top-xs">
		<div class="content-detail">
			<img src="upload/<?php echo $row['profile']?>">
			<div class="detail-text">
				<h5><span>&#xFF02; </span><?php echo $row['feedback']?><span> &#xFF02;</span></h5>
				<h4 class="detail-text-name"><span>&mdash; </span><?php echo $row['first_name'].' '.$row['last_name']?></h4>
				<span class="detail-text-email"><?php echo $row['email']?></span>
			</div>
		</div>
	</div>
</div>

<?php } ?>