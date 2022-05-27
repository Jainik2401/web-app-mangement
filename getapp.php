<?php include 'connection.php';

sleep(2);

$category_id = $_POST['category'];
$company_id = $_POST['companyname'];
$search = $_POST['search'];

$sorting = $_POST['sorting'];
$sorting = explode('.', $sorting);

$order_by = $sorting[0];
$sort = $sorting[1];


$limit = "12";
$page = $_POST['page'];
$start = ($page - 1) * $limit;

$query = "SELECT a.*, c.name AS category_name FROM applications a LEFT JOIN categories c  ON (a.category_id=c.category_id) where 1=1";

if(!empty($search))
{
	$query .=" AND a.name LIKE '" . $search . "%'";
}

if(!empty($category_id))
{
	$query .=" AND a.category_id ='" . (int)$category_id . "'";
}

if(!empty($company_id))
{
	$query .=" AND a.app_manager_id ='" . (int)$company_id . "'";
}

$query .= " AND a.app_aproval=1 AND a.app_status=1 ORDER BY a." . $order_by . " " . $sort . " LIMIT " . $start . ", " . $limit;

$sql = $conn->query($query);
while($row = $sql->fetch_assoc()){
?>	
	<div class="col-md-6 col-lg-4 col-sm-6 app-col">
		<div class="main-app-detail">
			<input type="hidden" name="app-id" value="<?php echo $row['application_id']?>">
			<img src="./upload/<?php echo $row['logo']?>">
			<div class="main-app-desc">
				<h4><?php echo $row['name']?></h4>
				<h6 class="txt-color"><?php echo $row['category_name']?></h6>
				<h5><a href="find_app_detail.php?application_id=<?php echo $row['application_id']; ?>">view more detail</a></h5>
			</div>
		</div>
	</div>
<?php } ?>
<?php if($sql->num_rows >= $limit){ ?>
<div class="text-center">
	<button type="button" class="btn btn-default main-bg-color text-uppercase" id="loadmore">Load more</button>
</div>
<?php } ?>
