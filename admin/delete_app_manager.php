<?php
include 'connection.php';

$id=$_POST['app_manager_id'];
  // echo '<pre>'; print_r($id); die;

  $sql=$conn->query("DELETE from app_manager where app_manager_id = $id");
  $appmanagerid = $conn->affected_rows; 

if(!empty($appmanagerid)){
    $json['sucess'] = 'Appmanager deleted sucessfully';

} else{
    $json['error'] = 'Appmanager not deleted from system.';
}

header('Content-Type: application/json');
echo json_encode($json);



?>

