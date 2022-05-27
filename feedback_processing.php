<?php include 'connection.php';

$json = array();

$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$mobile =$_POST['mobile'];
$feedback = $_POST['feedback'];

$uploaddir = 'upload/'.$_FILES['profile']['name'].'';

$ext = pathinfo($_FILES['profile']['name']);

$insert = $conn->query("INSERT INTO feedback SET first_name='".$fname."', last_name='".$lname."', email='".$email."', mobile='".$mobile."', feedback='".$feedback."',status=0, date_added=NOW()");

$user_id = $conn->insert_id;

if($user_id){

	$newimage = 'user-'.$user_id.'.'.$ext['extension'];

		$target_path = PROFILE_UPLOAD_DIR.$newimage;

		move_uploaded_file($_FILES['profile']['tmp_name'], $target_path);

		$insert = $conn->query("UPDATE feedback SET profile='".$newimage."' WHERE feedback_id='". (int)$user_id ."'");

	$json['success'] = 'Feedback sent successfully!';
} else {
	$json['error'] = 'Something went wrong, please try agan';
}

header('Content-Type: application/json');
echo json_encode($json);
?>