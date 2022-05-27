<?php
include 'connection.php';

$id=$_POST['inquiry_id'];

  $sql=$conn->query("DELETE from inquiry where inquiry_id = $id");
  $inquiryid = $conn->affected_rows; 

if(!empty($inquiryid)){
    $json['sucess'] = 'Inquiry deleted sucessfully';

} else{
    $json['error'] = 'Inquiry not deleted from system.';
}

header('Content-Type: application/json');
echo json_encode($json);



?>

