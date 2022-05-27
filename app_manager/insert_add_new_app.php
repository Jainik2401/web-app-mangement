<?php
include 'connection.php';
include 'function.php';
$json = array();
session_start();

$appname = $_POST['appname'];
$appdescription = $_POST['appdescription'];
$appurl = $_POST['appurl'];
$supporturl = $_POST['supporturl'];
$category = $_POST['category'];
$status_switchstatus = isset($_POST['status-switchstatus']) ? $_POST['status-switchstatus'] : 0;
$aproval_switchstatus = isset($_POST['aproval-switchstatus']) ? $_POST['aproval-switchstatus'] : 0;

if(isset($_POST['application_id']) && !empty($_POST['application_id'])) {

	$uploaddir = 'upload/'.$_FILES['applogo']['name'].'';


	$insert = $conn->query("UPDATE applications SET category_id=".$category.", app_manager_id='".$_SESSION['app_manager_id']."', name='".$appname."', description='".$appdescription."',url='".$appurl."',support_url='".$supporturl."', app_status='".$status_switchstatus."' WHERE application_id='" . $_POST['application_id'] . "' ");

	$json['success'] = 'Application Updated successfully!';
	// $app_id = $conn->affected_rows;
	if($_FILES['applogo']['name'] != ""){

	$ext = pathinfo($_FILES['applogo']['name']);

	$logoname= $_POST['application_id'];

	$trim_logo=trim($logoname);

	$newimage = 'app-'.$trim_logo.'.'.$ext['extension'];
	
	$target_path = LOGO_UPLOAD_DIR.$newimage;

	move_uploaded_file($_FILES['applogo']['tmp_name'], $target_path);

	$update = $conn->query("UPDATE applications SET logo='".$newimage."' WHERE application_id='". (int)$_POST['application_id'] ."'");
	}
	else {
	$json['success'] = 'Application Updated successfully!';
	}
} else {

	$uploaddir = 'upload/'.$_FILES['applogo']['name'].'';

	$ext = pathinfo($_FILES['applogo']['name']);

	$insert = $conn->query("INSERT INTO applications SET category_id=".$category.",app_manager_id=".$_SESSION['app_manager_id'].", name='".$appname."', description='".$appdescription."',url='".$appurl."',support_url='".$supporturl."', app_status='".$status_switchstatus."', date_added=NOW()");

	$app_id = $conn->insert_id;
	 
	if($app_id) {

		$newimage = 'app-'.$app_id.'.'.$ext['extension'];

		$target_path = LOGO_UPLOAD_DIR.$newimage;

		move_uploaded_file($_FILES['applogo']['tmp_name'], $target_path);

		$insert = $conn->query("UPDATE applications SET logo='".$newimage."' WHERE application_id='". (int)$app_id ."'");

	  $json['success'] = 'Application added successfully!';
	} else {

	  $json['error'] = 'Something went wrong, please try agan';
	}

}
header('Content-Type: application/json');
echo json_encode($json);
?>