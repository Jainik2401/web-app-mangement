<?php include 'connection.php';

$query = "SELECT * FROM categories ORDER BY name ASC";

$sql = $conn->query($query);
// echo '<pre>' ; print_r($query);
$i = 1;
$categorytable = array();

if($sql->num_rows > 0){

     while($row = $sql->fetch_assoc()){  
      if($row['status'] == 1)
      {
        $status ='<span class="badge badge-success">Active</span>';
      }else 
      {
        $status = '<span class="badge badge-danger">Deactive</span>';
      }
      $delete = '<a href="#" type="button" class="btn btn-sm btn-danger delete" data-id="'.$row['category_id'].'"><i class="fa fa-trash"></i> Delete</a>';
       $edit = '<a href="add_app_catagory.php?category_id='.$row['category_id'].'" type="button" class="btn btn-sm btn-success edit" data-id="'.$row['category_id'].'"><i class="fa fa-edit"></i> Edit</a>';
      
      $categorysub = array($i,$row['name'],$status, $delete . $edit);
      array_push($categorytable, $categorysub);
      $i++;
    }
}
$json = array(
    "data" => $categorytable,
);
header('Content-Type: application/json');
echo json_encode($json); 

?>

