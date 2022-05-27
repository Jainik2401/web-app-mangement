<?php include 'connection.php';

$limit = "6";
$i = 1;

while($i<29){

$query = "SELECT a.*, c.name AS category_name FROM applications a LEFT JOIN categories c  ON (a.category_id=c.category_id) where c.category_id='".$i."' and  a.app_aproval=1 AND a.app_status=1  ORDER BY RAND() LIMIT " . $limit ; 


$sql = $conn->query($query);

$select = $conn->query("SELECT name FROM categories WHERE category_id = '".$i."' "); 

$category_name = $select->fetch_assoc()['name'];
?>
<div class="row">
	<h3 style="padding-bottom: 10px;"><?php echo $category_name; ?></h3>

<?php
while($row = $sql->fetch_assoc()){
?>	

	<div class="col-md-2 col-lg-2 col-sm-4 col-xs-6" >
		<div class="panel panel-default " style="width: 185px;">
			<div class="panel-body" style="min-height: 290px;">
				<div class="panel-image-category text-center">
					<img src="./upload/<?php echo $row['logo']?>" alt="image">
						<div class="main_overlay"></div>
				</div>
				<div class="panel-image-content">
					<h4><?php echo $row['name']?></h4>
				</div>
			</div>
		</div>
	</div>
<?php } ?>
	</div>
<?php
$i++;
}
?>