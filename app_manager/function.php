<?php
	function getCategories(){
		include 'connection.php';

		$query = $conn->query("SELECT * FROM categories WHERE status=1 ORDER BY name");
		$categories = array();

		while ($result = $query->fetch_assoc()) {
		$categories[] = array(
				'category_id'	=> $result['category_id'],
				'category_name'	=> $result['name'],
			);
		}
		$conn->close();
		return $categories;
	}

	// function getCompany(){
	// 	include 'connection.php';
	// 	$query = $conn->query("SELECT * FROM app_manager WHERE app_status=1");
	// 	$company = array();
	// 	while ($result = $query->fetch_assoc()) {
	// 	$company[] = array(
	// 			'app_manager_id'	=> $result['app_manager_id'],
	// 			'company_name'	=> $result['company_name'],
	// 		);
	// 	}
	// 	$conn->close();
	// 	return $company;
	// }
	
	// 

	function getApplicationData($application_id = 0,$app_manager_id = 0){
		include 'connection.php';

		$query = $conn->query("SELECT * FROM applications WHERE application_id='" . (int)$application_id . "' AND app_manager_id='".(int)$app_manager_id."'");

		$application = $query->fetch_assoc();
		
		return $application;
	}

	function getAppmanagerData($app_manager_id = 0){
		include 'connection.php';

		$query = $conn->query("SELECT * FROM app_manager WHERE app_manager_id= '".$_SESSION['app_manager_id']."'");

		$admin = $query->fetch_assoc();

		return $admin;
	}

	function totalapp($app_manager_id = 0)
	{
		include 'connection.php';

		$query = $conn->query("SELECT COUNT(*) as total FROM applications WHERE app_manager_id= '". (int)$app_manager_id."'");

		$totalapp = $query->fetch_assoc();

		return $totalapp['total'];
	}

	function totalActiveapp($app_manager_id = 0)
	{
		include 'connection.php';

		$query = $conn->query("SELECT COUNT(*) as total FROM applications WHERE app_status =1 AND app_manager_id= '".(int)$app_manager_id."'");

		$totalactive = $query->fetch_assoc();

		return $totalactive['total'];
	}

	function totaldeactiveapp($app_manager_id = 0)
	{
		include 'connection.php';

		$query = $conn->query("SELECT COUNT(*) as total FROM applications WHERE app_status=0 AND app_manager_id= '".(int)$app_manager_id."'");

		$totaldeactive = $query->fetch_assoc();

		return $totaldeactive['total'];
	}

	function pr($data){
		echo '<pre>';print_r($data);die;
	}
?>	