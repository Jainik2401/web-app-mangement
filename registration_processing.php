<?php include 'connection.php';
session_start();

$json = array();

$fname = $_POST['fname'];
$lname = $_POST['lname'];
$cname =$_POST['companyname'];
$email = $_POST['email'];
$mobile =$_POST['mobile'];
$pass = md5($_POST['pass']);
$cpass = $_POST['confirmpass'];

if(isset($_SESSION['email']) && !empty($_SESSION['email']))
{
	$json['redirect'] = 'app_manager/index.php';
}else{
$query = $conn->query("SELECT * FROM app_manager WHERE email='" . $email . "' or contact_number='" . $mobile . "'");

if($query->num_rows<1) {

$insert = $conn->query("INSERT INTO app_manager SET firstname='".$fname."', lastname='".$lname."', company_name='".$cname."', email='".$email."', contact_number='".$mobile."', password='".$pass."', date_added=NOW()");

if($conn->insert_id) {

  $json['success'] = 'Register successfully!';
  	$_SESSION['app_manager_id'] = $conn->insert_id;
	$_SESSION['firstname'] = $_POST['fname'];
	$_SESSION['lastname'] = $_POST['lname'];
	$_SESSION['company_name'] = $_POST['companyname'];
	$_SESSION['email'] = $_POST['email'];
	$_SESSION['contact_number'] = $_POST['mobile'];
	
} else {
  $json['error'] = 'Something went wrong, please try agan';
}
} else {
	$json['error'] = 'User already exist, please try again';
}
}
header('Content-Type: application/json');
echo json_encode($json);
?>