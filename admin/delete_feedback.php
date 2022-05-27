<?php
include 'connection.php';

$id=$_POST['feedback_id'];

  $sql=$conn->query("DELETE from feedback where feedback_id = $id");
  $feedbackid = $conn->affected_rows; 

if(!empty($feedbackid)){
    $json['sucess'] = 'Feedback deleted sucessfully';

} else{
    $json['error'] = 'Feedback not deleted from system.';
}

header('Content-Type: application/json');
echo json_encode($json);



?>

