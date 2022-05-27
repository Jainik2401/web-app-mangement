<?php include 'connection.php'; 
session_start();
	
$json = array();

$email = $_POST['email'];
$pass = md5($_POST['pass']);

#echo "<pre>";print_r($pass);die;

if(isset($_SESSION['app_manager_id']) && !empty($_SESSION['app_manager_id'])){
	$json['redirect'] = 'app_manager/index.php';
	$email = "";
	$pass = "";
} else {

if($email != "" AND $pass != ""){

	$query = $conn->query("SELECT * FROM app_manager WHERE email='".$email."' and password='".$pass."' and app_status=1");
	
	if($row = $query->fetch_assoc()){
		
		$_SESSION['app_manager_id'] = $row['app_manager_id'];
		$_SESSION['company_name'] = $row['company_name'];
		$_SESSION['firstname'] = $row['firstname'];
		$_SESSION['lastname'] = $row['lastname'];
		$_SESSION['email'] = $row['email'];
		$_SESSION['contact_number'] = $row['contact_number'];

		$json['success'] = 'Login successfully!';
		
	} else {
		$json['error'] = 'Invalid Email or Password, Try again!';
	}
}

}

header('Content-Type: application/json');
echo json_encode($json);
?>