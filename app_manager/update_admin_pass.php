<?php
include 'connection.php';
include 'function.php';
session_start();

$result = getAppmanagerData('password');

$json = array();

$oldpass = md5($_POST['oldpassword']);
$newpass = md5($_POST['newpassword']);

if($oldpass == $result['password']){
	$query = $conn->query("UPDATE app_manager SET  password='".$newpass ."' WHERE app_manager_id= '".$_SESSION['app_manager_id']."'");

	$json['success'] = 'Password update successfully ';
} else {
	
$json['error'] = 'Old Password Does not Match !!! ';
}

header('Content-Type: application/json');
echo json_encode($json);
?>