<?php
	function getCategories(){
		include 'connection.php';

		$query = $conn->query("SELECT * FROM categories WHERE status=1 	ORDER BY name ASC");
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
		$query = $conn->query("SELECT * FROM app_manager WHERE app_status=1 ORDER BY company_name ASC");
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

	function getApplicationData($application_id = 0){
		include 'connection.php';

		$query = $conn->query("SELECT * FROM applications WHERE application_id='" . (int)$application_id . "'");

		$application = $query->fetch_assoc();
		
		return $application;
	}

	function getCategoryData($category_id = 0){
		include 'connection.php';

		$query = $conn->query("SELECT * FROM categories WHERE category_id='" . (int)$category_id . "'");

		$category = $query->fetch_assoc();
		
		return $category;
	}

	function getCompanyData($app_manager_id = 0){
		include 'connection.php';

		$query = $conn->query("SELECT * FROM app_manager WHERE app_manager_id='" . (int)$app_manager_id . "'");

		$appmanager = $query->fetch_assoc();
		
		return $appmanager;
	}

	
?>	