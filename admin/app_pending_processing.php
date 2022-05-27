<?php include 'connection.php';

$query = "SELECT a.*, c.name AS category_name, am.company_name AS comp_name FROM applications a LEFT JOIN categories c ON(a.category_id=c.category_id) LEFT JOIN app_manager am ON(a.app_manager_id=am.app_manager_id) WHERE app_aproval=0";

if(isset($_POST['limit'])){
  $query .= " ORDER BY application_id DESC LIMIT " . $_POST['limit'];
} else {
  $query .= " ORDER BY name ASC";
}

$sql = $conn->query($query);

$applicationtable = array();

if($sql->field_count > 0){

     while($row = $sql->fetch_assoc()){  

      if($row['app_status'] == 1) {
        $status ='<span class="badge  badge-success">Active</span>';
      } else {
        $status = '<span class="badge badge-danger">Deactive</span>';
      }

      $approv = '<a href="pending_update.php?application_id='.$row['application_id'].'" type="button" class="btn btn-success btn-sm approv" style="margin-right:5px;" data-id="'.$row['application_id'].'"><i class="fa fa-thumbs-up"></i> Approve </a>';

      $delete = '<a href="#" type="button" class="btn btn-danger btn-sm delete" data-id="'.$row['application_id'].'"><i class="fa fa-trash"></i> Delete </a>';

      $applicationsub = array("<img class='image ml-3' src='" . BASE_URL . "upload/".$row['logo']."'>",'<div style="max-width:200px; white-space:pre-wrap;">'.$row['name'].'</div>',$row['comp_name'],$row['category_name'],$status, $approv . $delete);

      array_push($applicationtable, $applicationsub);
      
    }
}
$json = array(
    "data" => $applicationtable,
);
header('Content-Type: application/json');
echo json_encode($json); 

?>

