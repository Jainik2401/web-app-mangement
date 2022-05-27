<?php
include 'connection.php';

$id=$_POST['category_id'];
  // echo '<pre>'; print_r($id); die;

  $sql=$conn->query("DELETE from categories where category_id = $id");
  $categoryid = $conn->affected_rows; 

if(!empty($categoryid)){
    $json['sucess'] = 'Category deleted sucessfully';

} else{
    $json['error'] = 'Category not deleted from system.';
}

header('Content-Type: application/json');
echo json_encode($json);



?>

