<?php
include 'connection.php';
include 'function.php';
session_start();

$json = array();

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$contactnumber = $_POST['contactnumber'];

$update = $conn->query("UPDATE app_manager SET  firstname='" .$firstname . "', lastname='" . $lastname . "', contact_number='" . $contactnumber . "' WHERE app_manager_id= '".$_SESSION['app_manager_id']."' ");

$adm_id = $conn->affected_rows;

if($adm_id) {

$json['success'] = 'Admin Profile Updated successfully!';

} else {
	$json['error'] = 'Something went wrong, please try again';
}


header('Content-Type: application/json');
echo json_encode($json);
?>