<?php
	function getCategories(){
		include 'connection.php';

		$query = $conn->query("SELECT * FROM categories WHERE status=1 	ORDER BY name");
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

	function getCompany(){
		include 'connection.php';
		$query = $conn->query("SELECT * FROM app_manager WHERE app_status=1");
		$company = array();
		while ($result = $query->fetch_assoc()) {
		$company[] = array(
				'app_manager_id'	=> $result['app_manager_id'],
				'company_name'	=> $result['company_name'],
			);
		}
		$conn->close();
		return $company;
	}

		function getCategoryData($category_id = 0){
		include 'connection.php';

		$query = $conn->query("SELECT * FROM categories WHERE category_id='" . (int)$category_id . "'");

		$category = $query->fetch_assoc();

		return $category;
	}

	function getManagerData($app_manager_id = 0){
		include 'connection.php';

		$query = $conn->query("SELECT * FROM app_manager WHERE app_manager_id='" . (int)$app_manager_id . "'");

		$app_manager = $query->fetch_assoc();

		return $app_manager;
	}

	function getApplicationData($application_id = 0){
		include 'connection.php';

		$query = $conn->query("SELECT * FROM applications WHERE application_id='" . (int)$application_id . "'");

		$application = $query->fetch_assoc();

		return $application;
	}

	function getAdminData($application_id = 0){
		include 'connection.php';

		$query = $conn->query("SELECT * FROM admin WHERE admin_id= '".$_SESSION['admin_id']."'");

		$admin = $query->fetch_assoc();

		return $admin;
	}

	function totalapp()
	{
		include 'connection.php';

		$query = $conn->query("SELECT COUNT(*) as total FROM applications");

		$totalapp = $query->fetch_assoc();

		return $totalapp['total'];
	}

	function totalappmanager()
	{
		include 'connection.php';

		$query = $conn->query("SELECT COUNT(*) as total FROM app_manager");

		$totaluser = $query->fetch_assoc();

		return $totaluser['total'];
	}
	function totalActiveapp()
	{
		include 'connection.php';

		$query = $conn->query("SELECT COUNT(*) as total FROM applications WHERE app_status =1");

		$totalactive = $query->fetch_assoc();

		return $totalactive['total'];
	}
	function totalweekapp()
	{
		include 'connection.php';
		$date = date("Y-m-d");
		$datetime = date("Y-m-d", strtotime($date. ' - 7 days'));

		$query = $conn->query("SELECT COUNT(*) as total FROM applications WHERE DATE(date_added) between '$datetime' and  '$date' ");

		$totalweekapp = $query->fetch_assoc();
//echo "<pre>";print_r($query);
		return $totalweekapp['total'];
	}
	function pr($data){
		echo '<pre>';print_r($data);die;
	}
?>	