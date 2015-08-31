<?php
session_start();
$loggedin = isset($_SESSION['username']);
$currentpage = basename($_SERVER['PHP_SELF']);
?>
<!DOCTYPE html>
<html lang="de">
<head>
	<!-- Encoding -->
	<meta http-equiv="content-type" content="text/html; charset=utf-8">

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

	<!-- Ampel -->
	<link href="css/lights.css" rel="stylesheet">

	<!-- Page Script -->
	<script type="text/javascript">
		var CURRENTPAGE = '<?php echo $currentpage?>';
	</script>
	<script src="./scripts/youstudy.js"></script>

	<!-- Slideshow -->
	<link type="text/css" rel="stylesheet" href="./css/slideshow.css" />
	<script src="./scripts/slideshow.js"></script>
	<script src="./scripts/spin.min.js"></script>
</head>
<body>
	<nav role="navigation">
		<div class="container">
			<a href="./index.php"><div class="logo"></div></a>
			<div id="mobilenavigation"><i class="fa fa-bars"></i></div>
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
				<?php if ($loggedin == true) { ?>
				<li class="right"><a href="./logout.php">
					<span>Logout</span>
					<i class="fa fa-sign-out"></i>
				</a></li>
				<?php } else { ?>
				<li class="right"><a href="./login.php">
					<span>Login</span>
					<i class="fa fa-sign-out"></i>
				</a></li>
				<?php } ?>
			</ul>
			<a href="#" data-activates="nav-mobile" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
		</div>
	</nav>