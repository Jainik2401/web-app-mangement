<?php include 'connection.php';

$query = "SELECT * FROM app_manager" ;

if(isset($_POST['limit'])){
  $query .= " ORDER BY app_manager_id DESC LIMIT " . $_POST['limit'];
} else {
  $query .= " ORDER BY firstname ASC";
}


$sql = $conn->query($query);
$i = 1;
$app_manager_table = array();

if($sql->num_rows > 0){

     while($row = $sql->fetch_assoc()){
     if($row['app_status'] == 1)
      {
        $status ='<span class="badge badge-success">Active</span>';
      }else 
      {
        $status = '<span class="badge badge-danger">Deactive</span>';
      }
      $delete = '<a href="#" type="button" class="btn btn-danger btn-sm delete" data-id="'.$row['app_manager_id'].'"><i class="fa fa-trash"></i> Delete</a>';
      $edit = '<a href="add_new_appmanager.php?app_manager_id='.$row['app_manager_id'].'" type="button" class="btn edit btn-success btn-sm" data-id="'.$row['app_manager_id'].'"><i class="fa fa-edit"></i> Edit</a>';
          $app_manager_sub = array($i,$row['firstname'].' '.$row['lastname'],$status, $delete . $edit);
          array_push($app_manager_table, $app_manager_sub);
          $i++;
    }
}
$json = array(
    "data" => $app_manager_table,
);
header('Content-Type: application/json');
echo json_encode($json); 

?>

