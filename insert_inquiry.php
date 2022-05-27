<?php
include 'connection.php';

$json = array();
 
$name = $_POST['name'];
$email = $_POST['email'];
$message =$_POST['message'];

$insert = $conn->query("INSERT INTO inquiry SET name='".$name."', email='".$email."', message='".$message."', date_added=NOW()");
 
if($conn->insert_id) {

  $json['success'] = 'Category in added successfully!';
}else {

  $json['error'] = 'Something went wrong, please try agan';
}

header('Content-Type: application/json');
echo json_encode($json);
?>