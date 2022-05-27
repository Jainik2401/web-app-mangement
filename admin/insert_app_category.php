<?php
include 'connection.php';
include 'function.php';

$json = array();

$catagoryname = $_POST['catagoryname'];
$switchstatus = isset($_POST['switchstatus']) ? $_POST['switchstatus'] : 0;

if(isset($_POST['category_id']) && !empty($_POST['category_id'])){

	//$query = $conn->query("SELECT * FROM categories WHERE name='".$catagoryname."'"); 
	//if($query->num_rows<1)
	//{
		$insert = $conn->query("UPDATE categories SET name='".$catagoryname."', status='".$switchstatus."' WHERE category_id='" . $_POST['category_id'] . "' ");
	
		if($conn->insert_id) {

			$json['error'] = 'Something went wrong, please try agan';
			} else {
			$json['success'] = 'Category is updated successfully!';
			}
		// } else {
		// 	$json['error'] = 'Category  already exist, please try again';
		// 	}		
} else {

	$query = $conn->query("SELECT * FROM categories WHERE name='".$catagoryname."'"); 

	if($query->num_rows<1)
	{
		$insert = $conn->query("INSERT INTO categories SET name='".$catagoryname."', status='".$switchstatus."', date_added=NOW()");
 
		if($conn->insert_id) {

		$json['success'] = 'Category in added successfully!';
		} else {
		$json['error'] = 'Something went wrong, please try agan';
		}
	} else {
		$json['error'] = 'Category  already exist, please try again';
		}
}

// 	$insert = $conn->query("INSERT INTO categories SET name='".$catagoryname."', status='".$switchstatus."', date_added=NOW()");
 
// 	if($conn->insert_id) {

// 	  $json['success'] = 'Category in added successfully!';
// 	}else {

// 	  $json['error'] = 'Something went wrong, please try again';
// 	}
// }

header('Content-Type: application/json');
echo json_encode($json);
?>