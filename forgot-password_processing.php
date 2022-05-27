<?php
include 'connection.php';

$json = array();

$email = $_POST['email'];
$newpass = md5($_POST['newpass']);


$query = $conn->query("SELECT * FROM app_manager WHERE email='".$email."' AND app_status=1");

if($query->num_rows>0){
	
	$query = $conn->query("UPDATE app_manager SET  password='".$newpass ."' WHERE email='".$email."'");

	$json['success'] = 'Password update successfully ';
} else {
	$json['error'] = 'Email Does not Match !!! ';
}

header('Content-Type: application/json');
echo json_encode($json);
?>