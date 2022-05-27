<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<!-- set the encoding of your site -->
	<meta charset="utf-8">
	<!-- set the viewport width and initial-scale on mobile devices -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- set the apple mobile web app capable -->
	<meta name="apple-mobile-web-app-capable" content="yes">
	<!-- set the HandheldFriendly -->
	<meta name="HandheldFriendly" content="True">
	<!-- set the apple mobile web app status bar style -->
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<!-- set the description -->
	<meta name="description" content="Metro App - 5 in 1 App landing page">
	<meta name="keywords" content="agency, bootstrap, business, corporate,App landing, creative, minimal, modern, onepage, personal, portfolio,  html5, responsive">
	<meta name="author" content="Metro App - 5 in 1 App landing page">
	<!-- Page Title -->
	<title>Easy App</title>

    <link rel="shortcut icon" href="images/logo.png">
	<!-- include the site stylesheet -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600%7cRaleway:400,600,700" rel="stylesheet">
	<!-- include the site stylesheet -->
	<link rel="stylesheet" href="css/bootstrap.css">
	<!-- include the site stylesheet -->
	<link rel="stylesheet" href="css/plugin-resets.css">
	<!-- include the site stylesheet -->
	<link rel="stylesheet" href="css/style.css">
		<!-- include the site stylesheet -->
	<link rel="stylesheet" href="css/responsive.css">
	<!-- include the site stylesheet -->
	<link rel="stylesheet" href="css/color.css">
	<link rel="stylesheet" type="text/css" href="css/all.css">
	<link rel="stylesheet" type="text/css" href="css/custome.css">
	<link rel="stylesheet" type="text/css" href="slick/slick-theme.css">
	<link rel="stylesheet" type="text/css" href="css/select2.css">	

</head>
<body>
	<div id="wrapper">
		<header id="header" class="nospace">
			<div class="holder">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 text-center">
							<!-- mobile logo -->
							<div class="logo main-bg-color text-uppercase pull-left visible-xs"><a href="#">M</a></div>
							<a href="#" class="nav-opener pull-right visible-xs"><i class="fa fa-bars" aria-hidden="true"></i></a>
							<!-- page navigation start here -->
							<nav id="nav">
								<ul class="nav-list list-inline text-center" style="font-size:16px;">
									<li><a href="home.php"  class="smooth">Home</a></li>
									<li><a href="how_it_work.php" class="smooth">How it Works</a></li>
									<li><a href="find_app.php"  class="smooth">Finds App</a></li>
								</ul>
								<ul class="nav-list list-inline text-center" style="font-size:16px;">
									<li><a href="gallery.php" class="smooth">Gallery</a></li>
									<li><a href="contactus.php" class="smooth">Contact Us</a></li>
									<?php if(isset($_SESSION['app_manager_id']) && !empty($_SESSION['app_manager_id'])) { ?>
										<li class="dropdown">
												<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?php echo "Hey ".$_SESSION['firstname'];?><span class="caret"></span></a>
											<ul class="dropdown-menu" role="menu" style="background-color: #272c3f">
												<li><a href="app_manager/index.php" class="login">Dashboard</a></li>
												<li><a href="logout.php" class="login">Log Out</a></li>
											</ul>
										</li>
									<?php } else { ?>
										<li><a href="login.php" class="smooth">Log in</a></li>
									<?php } ?>
								</ul>
								<!-- desktop logo -->
								<div class="logo main-bg-color text-uppercase hidden-xs"><a href="home.php">E</a></div>
							</nav>
						</div>
					</div>
				</div>
			</div>
			<!-- page navigation end here -->
		</header>
		<main id="main">