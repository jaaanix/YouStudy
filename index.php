<?php include "header.html"?>
<main>
<!--Import jQuery before materialize.js-->
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="js/materialize.min.js"></script>
<nav class="light-blue lighten-1" role="navigation">
	<div class="nav-wrapper container"><a id="logo-container" href="#" class="brand-logo">YouStudy</a>
	<ul class="right hide-on-med-and-down">
		<li><a href="#">
			<i class="large mdi-navigation-apps"></i>
		</a></li>
		<li><a href="./parkplatz.html">
			<i class="large mdi-maps-directions-car"></i>
		</a></li>
		<li><a href="./mensa.html">
			<i class="large mdi-maps-local-restaurant"></i>
		</a></li>
		<li><a href="./kino.html">
			<i class="large mdi-action-theaters"></i>
		</a></li>
	</ul>
	
	<ul id="nav-mobile" class="side-nav" style="left: -250px;">
		<li><a href="#"><i class="large mdi-navigation-apps"></i></a></li>
	</ul>
	<a href="#" data-activates="nav-mobile" class="button-collapse"><i class="mdi-navigation-menu"></i	></a>
</div>
</nav>
<a href="www.google.de" id="google_btn" class="btn-large waves-effect waves-light orange">Google</a>
<a href="www.iphone-ticker.de" id="ifun_btn" class="btn-large waves-effect waves-light blue">iPhone-Ticker</a>
<a href="www.computerbase.de" id="cb_btn" class="btn-large waves-effect waves-light green">ComputerBase</a>
<a href="www.google.de" id="ico_btn" class="btn-floating btn-large waves-effect waves-light red">
<i class="large mdi-maps-local-restaurant"></i></a>
<img src="cat.gif">
</main>
<?php include "footer.html"?>