<?php
include 'connection.php';
include 'function.php';
session_start();

$result = getAdminData('password');

$json = array();

$oldpass = md5($_POST['oldpassword']);
$newpass = md5($_POST['newpassword']);

if($oldpass == $result['password']){
	$query = $conn->query("UPDATE admin SET  password='" .$newpass . "' WHERE admin_id= '".$_SESSION['admin_id']."' ");
	$json['success'] = 'Password update successfully ';
} else {
	
$json['error'] = 'Old Password Does not Match !!! ';
}

header('Content-Type: application/json');
echo json_encode($json);
?>