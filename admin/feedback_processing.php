<?php include 'connection.php';

$query = "SELECT * FROM feedback ";

$sql = $conn->query($query);
// echo '<pre>' ; print_r($query);
$i = 1;

$feedbacktable = array();
if($sql->num_rows > 0){

    while($row = $sql->fetch_assoc()){  
    $delete = '<a href="#" type="button" class="btn btn-danger btn-sm delete" data-id="'.$row['feedback_id'].'"><i class="fa fa-trash"></i> Delete</a>';

    $aprove = '<a href="feedback_aprove_processing.php?feedback_id='.$row['feedback_id'].'" type="button" class="btn btn-success btn-sm aprove" data-id="'.$row['feedback_id'].'"><i class="fa fa-thumbs-up"></i> Aprove</a>';

    $disaprove = '<a href="feedback_disaprove_processing.php?feedback_id='.$row['feedback_id'].'" type="button" class="btn btn-dark btn-sm disaprove" data-id="'.$row['feedback_id'].'"><i class="fas fa-thumbs-down"></i> Disaprove</a>';
      	
      	$feedbacksub = array($i,$row['first_name'].' '.$row['last_name'],$row['email'],'<div style="max-width:300px; white-space:pre-wrap;">'.$row['feedback'].'</div>',$row['date_added'],$aprove.' '.$disaprove,$delete);
        
        array_push($feedbacktable, $feedbacksub);
        $i++;
    }
}
$json = array(
    "data" => $feedbacktable,
);
header('Content-Type: application/json');
echo json_encode($json); 

?>

