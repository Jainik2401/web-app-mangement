<?php include 'connection.php';

$id = $_GET['feedback_id'];

	$query = $conn->query("UPDATE feedback SET status=1 WHERE feedback_id='".$id."'");

if($query){
	header('Location: feedback.php');
}
?>