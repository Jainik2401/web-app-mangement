<?php include 'connection.php'; 
session_start();
	
$json = array();

$user = $_POST['username'];
$pass = md5($_POST['password']);
//echo "<pre>";print_r($pass);die;
if($user != "" AND $pass != ""){

	$query = $conn->query("SELECT * FROM admin WHERE username='".$user."' and password='".$pass."' ");
		
	if($row = $query->fetch_assoc()){
		
		$_SESSION['admin_id'] = $row['admin_id'];
		$_SESSION['username'] = $row['username'];
		
		$_SESSION['email'] = $row['email'];
		$_SESSION['contact_number'] = $row['contact_number'];

		$json['success'] = 'Login successfully!';
		
	} else {
		$json['error'] = 'Invalid Username or Password, Try again!';
	}
}

header('Content-Type: application/json');
echo json_encode($json);
?>