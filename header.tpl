<?php
session_start();
$loggedin = true;
if (!isset($_SESSION['username']) || !isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == false)
	$loggedin = false;
?>
<!DOCTYPE html>
<html lang="de">
<head>
	<!-- Encoding -->
	<meta charset="utf-8"/>

	<!-- Default Stlyesheet -->
	<link type="text/css" rel="stylesheet" href="./css/style.css" />

	<!-- Font Awesome -->
	<link type="text/css" rel="stylesheet" href="./css/font-awesome.css" />

	<!-- Ubuntu Font -->
	<link href='http://fonts.googleapis.com/css?family=Ubuntu:400,400italic,700,700italic' rel='stylesheet' type='text/css'>

	<!-- Jquery -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

	<!-- Jquery UI -->
	<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>

	<!-- Responsive -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0,userscalable=no"/>

	<!-- Slideshow -->
	<link type="text/css" rel="stylesheet" href="./css/slideshow.css" />
	<script src="./scripts/slideshow.js"></script>
	<script src="./scripts/spin.min.js"></script>
</head>
<body>
	<nav role="navigation">
		<div class="container">
			<a href="./index.php"><div class="logo"></div></a>
			<ul class="right hide-on-med-and-down">
				<li><a href="./parkplatz.php">
						<span>Parkplatz</span>
						<i class="fa fa-car"></i>
				</a></li>
				<li><a href="./mensa.php">
						<span>Mensa</span>
						<i class="fa fa-cutlery"></i>
				</a></li>
				<li><a href="./kino.php">
						<span>Campus-Kino</span>
						<i class="fa fa-video-camera"></i>
				</a></li>
			</ul>
			
			<ul id="nav-mobile" class="side-nav" style="left: -250px;">
				<li><a href="#"><i class="large mdi-navigation-apps"></i></a></li>
			</ul>
			<a href="#" data-activates="nav-mobile" class="button-collapse"><i class="mdi-navigation-menu"></i	></a>
		</div>
	</nav>
	<div class="container">