<?php include 'connection.php';
include 'function.php';

if(isset($_GET['application_id']) && !empty($_GET['application_id'])){
	$result = getApplicationData($_GET['application_id']);
}

	$query = $conn->query("UPDATE applications SET app_aproval=1 WHERE application_id='".$result['application_id']."'");

if($query){
	header('Location: app_request_pending.php');
}
?>