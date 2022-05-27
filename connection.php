<?php
	//	Global define
	if(!defined('BASE_URL')) define('BASE_URL', 'http://localhost/project/');
	if(!defined('LOGO_UPLOAD_DIR')) define('LOGO_UPLOAD_DIR', '../upload/');
	if(!defined('PROFILE_UPLOAD_DIR')) define('PROFILE_UPLOAD_DIR', './upload/');

	if(!defined('HOSTNAME')) define('HOSTNAME','localhost');	
	if(!defined('DB_NAME')) define('DB_NAME', 'app_management');	
	if(!defined('USERNAME')) define('USERNAME', 'root');	
	if(!defined('PASSWORD')) define('PASSWORD', '');
	
	$conn = new mysqli(HOSTNAME, USERNAME, PASSWORD, DB_NAME);
?>	