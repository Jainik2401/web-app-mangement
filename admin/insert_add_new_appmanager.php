<?php
include 'connection.php';
include 'function.php';

$json = array();

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$companyname = $_POST['companyname'];
$email = $_POST['email'];
$contactnumber = $_POST['contactnumber'];
$gender = isset($_POST['gender']) ? $_POST['gender'] : 0;
$password = md5($_POST['password']);
$confirmpassword = $_POST['confirmpassword'];
$switchstatus = isset($_POST['switchstatus']) ? $_POST['switchstatus'] : 0;

if(isset($_POST['app_manager_id']) && !empty($_POST['app_manager_id'])){

	$query = $conn->query("SELECT * FROM app_manager WHERE (email='" . $email . "' or contact_number='" . $contactnumber . "') AND app_manager_id !='" . $_POST['app_manager_id'] . "' ");

	if($query->num_rows<1)
	{
		if($_POST['password'] != ""){
			$insert = $conn->query("UPDATE app_manager SET firstname='".$firstname."',lastname='".$lastname."',company_name='".$companyname."',email='".$email."',contact_number='".$contactnumber."',gender='".$gender."',password='".$password."', app_status='".$switchstatus."'  WHERE app_manager_id='" . $_POST['app_manager_id'] . "' ");
		} else {
		$insert = $conn->query("UPDATE app_manager SET firstname='".$firstname."',lastname='".$lastname."',company_name='".$companyname."',email='".$email."',contact_number='".$contactnumber."',gender='".$gender."', app_status='".$switchstatus."'  WHERE app_manager_id='" . $_POST['app_manager_id'] . "' ");
		}
	$json['success'] = 'App Manager is updated successfully!';
	} else {
	$json['error'] = 'App Manager is already exist, please try again';
	}
}
else {

	$query = $conn->query("SELECT * FROM app_manager WHERE email='" . $email . "' or contact_number='" . $contactnumber . "' "); 

	if($query->num_rows<1)
	{

	$insert = $conn->query("INSERT INTO app_manager SET firstname='".$firstname."',lastname='".$lastname."',company_name='".$companyname."',email='".$email."',contact_number='".$contactnumber."',gender='".$gender."',password='".$password."', app_status='".$switchstatus."', date_added=NOW()");
 
	if($conn->insert_id) {

	$json['success'] = 'App Manager added successfully!';
	} else {

	$json['error'] = 'Something went wrong, please try agan';
	}
} else {
	$json['error'] = 'App Manger already exist, please try again';
}
}

header('Content-Type: application/json');
echo json_encode($json);
?>