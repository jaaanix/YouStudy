<?php include 'header.tpl'; ?>
<main>
<div class="row">
	<div class="box100">
		<span class="caption">Gerichte heute</span>
		<table id="mensa-heute">
			<thead>
			<tr>
				<th>Gericht</th>
				<th>Bild</th>
				<th>Beschreibung</th>
				<th>Preis</th>
				<th>Bewertung</th>
				</tr>
				</thead><tbody></tbody>
			</table>
		</div>
		<div class="box100">
			<span class="caption">Gerichte morgen</span>
			<table id="mensa-morgen">
				<tr>
					<th>Gericht</th>
					<th>Bild</th>
					<th>Beschreibung</th>
					<th>Preis</th>
					<th>Bewertung</th>
				</tr>
			</table>
		</div>
	</div>
	</main>
	<?php include 'footer.tpl'; ?>