<?php
include 'connection.php';
include 'function.php';
session_start();


$json = array();
 

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$contactnumber = $_POST['contactnumber'];

$update = $conn->query("UPDATE admin SET  firstname='" .$firstname . "', lastname='" . $lastname . "',email='" . $email . "', contact_number='" . $contactnumber . "' WHERE admin_id= '".$_SESSION['admin_id']."' ");

$adm_id = $conn->affected_rows;

if($adm_id) {

$json['success'] = 'Admin Profile Updated successfully!';

} else {
	$json['error'] = 'Something went wrong, please try again';
}


header('Content-Type: application/json');
echo json_encode($json);
?>