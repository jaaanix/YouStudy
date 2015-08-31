<?php include 'header.tpl'; ?>
<html lang="de">
<head>
	<meta charset="utf-8">
	<link href="css/grids.css" rel="stylesheet">
	<link href="css/lights.css" rel="stylesheet">
</head>
<body>

	<div class="section group">
		<div class="col span_1_of_2">
			<div class = "center deco-box">
				<br>
				<div class="section group">
				<div class="col span_1_of_3">
						<div id="light">
							<span class="active" id="red"></span>
							<span id="orange"></span>
							<span id="green"></span>
						</div>
					</div>
					<div class="col span_2_of_3">
						<div class = "park-text">
							Parkplätze frei: 47 <br><br><br>
							Parkplätze belegt: 213
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col span_1_of_2">
			<div>
			<img src="images/parkplatz.jpg" height="360" width="640" >
			</div>
			<div class="deco-box park-text">
				Öffnungszeiten der Schranke<br><br>
				Montags- Freitags: 08:00 bis 10:00 geöffnet<br><br>
				Montags- Freitags: 10:00 bis 20:00 MultiCa nötig<br><br>
			</div>
		</div>
	</div>

</body>
</html>

<?php include 'footer.tpl'; ?>