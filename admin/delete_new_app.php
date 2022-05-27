<?php
include 'connection.php';

$id=$_POST['application_id'];

  $sql=$conn->query("DELETE from applications where application_id = $id");
  $appid = $conn->affected_rows; 

if(!empty($appid)){
    $json['sucess'] = 'Application deleted sucessfully';

} else{
    $json['error'] = 'Application not deleted from system.';
}

header('Content-Type: application/json');
echo json_encode($json);



?>

