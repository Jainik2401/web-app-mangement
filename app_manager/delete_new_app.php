<?php
include 'connection.php';

$id=$_POST['application_id'];
  // echo '<pre>'; print_r($id); die;

  $sql=$conn->query("DELETE from applications where application_id = $id");
  $appid = $conn->affected_rows; 

if(!empty($appid)){
    $json['sucess'] = 'Order deleted sucessfully';

} else{
    $json['error'] = 'Order not deleted from system.';
}

header('Content-Type: application/json');
echo json_encode($json);



?>

