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
	<link type="text/css" rel="stylesheet" href="css/style.css" />

	<!-- Jquery -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

	<!-- Jquery UI -->
	<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>

	<!-- Responsive -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0,userscalable=no"/>
</head>
<body>
	<nav class="light-blue lighten-1" role="navigation">
		<div class="nav-wrapper container"><a id="logo-container" href="#" class="brand-logo">YouStudy</a>
			<ul class="right hide-on-med-and-down">
				<li><a href="#">
					<i class="large mdi-navigation-apps"></i>
				</a></li>
				<li><a href="./parkplatz.php">
					<i class="large mdi-maps-directions-car"></i>
				</a></li>
				<li><a href="./mensa.php">
					<i class="large mdi-maps-local-restaurant"></i>
				</a></li>
				<li><a href="./kino.php">
					<i class="large mdi-action-theaters"></i>
				</a></li>
			</ul>
			
			<ul id="nav-mobile" class="side-nav" style="left: -250px;">
				<li><a href="#"><i class="large mdi-navigation-apps"></i></a></li>
			</ul>
			<a href="#" data-activates="nav-mobile" class="button-collapse"><i class="mdi-navigation-menu"></i	></a>
		</div>
	</nav>