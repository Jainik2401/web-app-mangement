<?php include 'connection.php';

$query = "SELECT * FROM inquiry ";

$sql = $conn->query($query);
// echo '<pre>' ; print_r($query);
$i = 1;

$inquirytable = array();
if($sql->num_rows > 0){

     while($row = $sql->fetch_assoc()){  
      $delete = '<a href="#" type="button" class="btn btn-danger btn-sm delete" data-id="'.$row['inquiry_id'].'"><i class="fa fa-trash"></i> Delete</a>';
      
          $inquirysub = array($i,$row['name'],$row['email'],'<div style="max-width:200px; white-space:pre-wrap;">'.$row['message'].'</div>',$row['date_added'],$delete);
          array_push($inquirytable, $inquirysub);
          $i++;
    }
}
$json = array(
    "data" => $inquirytable,
);
header('Content-Type: application/json');
echo json_encode($json); 

?>

