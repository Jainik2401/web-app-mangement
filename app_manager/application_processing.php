<?php include 'connection.php';
session_start();

$query = "SELECT a.*, c.name AS category_name, am.company_name AS comp_name FROM applications a LEFT JOIN categories c ON(a.category_id=c.category_id) LEFT JOIN app_manager am ON(a.app_manager_id=am.app_manager_id)  WHERE am.app_manager_id='".$_SESSION['app_manager_id']."'";

if(isset($_POST['limit'])){
  $query .= " ORDER BY application_id DESC LIMIT " . $_POST['limit'];
} else {
  $query .= " ORDER BY name ASC";
}

$sql = $conn->query($query);

$applicationtable = array();

if($sql->num_rows > 0){

     while($row = $sql->fetch_assoc()){  

      if($row['app_status'] == 1) {
        $status ='<span class="badge  badge-success">Active</span>';
      } else {
        $status = '<span class="badge badge-danger">Deactive</span>';
      }

      if($row['app_aproval'] == 1) {
        $aproval ='<span class="badge  badge-success">Approve</span>';
      } else {
        $aproval = '<span class="badge badge-danger">Disapprove </span>';
      }

      $delete = '<a href="#" type="button" class="btn btn-danger btn-sm delete" data-id="'.$row['application_id'].'"><i class="fa fa-trash"></i> Delete</a>';
      $edit = '<a href="add_new_app.php?application_id='.$row['application_id'].'" type="button" class="btn btn-sm btn-success edit" data-id="'.$row['application_id'].'"><i class="fa fa-edit"></i> Edit</a>';

      $applicationsub = array("<img class='image ml-3' src='" . BASE_URL . "upload/".$row['logo']."'>",'<div style="max-width:200px; white-space:pre-wrap;">'.$row['name'].'</div>',$row['comp_name'],$row['category_name'],$status,$aproval, $delete . $edit);

      array_push($applicationtable, $applicationsub);
      
    }
}
$json = array(
    "data" => $applicationtable,
);
header('Content-Type: application/json');
echo json_encode($json); 

?>

