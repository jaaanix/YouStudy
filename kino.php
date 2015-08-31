<?php include "header.tpl"; ?>
<main>
	<div class="col s12 m7">
		<div class="card small">
			<div class="card-image waves-effect waves-block waves-light">
				<?php if ($loggedin) { ?>
					<img class="activator" src="images/madmax.jpg">
				<?php } ?>
			</div>
			<div class="card-content">
				<span class="card-title activator grey-text text-darken-4">Mad Max<i class="mdi-navigation-more-vert right"></i></span>
				<p><a href="#">This is a link</a></p>
			</div>
			<div class="card-reveal">
				<span class="card-title grey-text text-darken-4">Card Title <i class="mdi-navigation-close right"></i></span>
				<p>Here is some more information about this product that is only revealed once clicked on.</p>
			</div>
		</div>
	</div>
</main>




<div id="lightbox">
	<div id="lightboxupper">
		<div id="lightboxleftarrow"><i class="fa fa-arrow-circle-left"></i></div>
		<div id="lightboximagecontainer">
			<img class="fakeimage">
			<div class="realimage"></div>
			<div id="lightboxloadoverlay">
				<div class="bg"></div>
				<div id="lightboxspinner"></div>
			</div>
		</div>
		<div id="lightboxrightarrow"><i class="fa fa-arrow-circle-right"></i></div>
	</div>
	<div id="lightboxlower">
		<div id="lightboxrailleftarrow" class="lightboxrailarrow"><i class="fa fa-arrow-left fa-2"></i></div>
		<div id="lightboxrail">
			<div class="lightboxthumb">
				<div class="image">
				</div>
			</div>
		</div>
		<div id="lightboxrailrightarrow" class="lightboxrailarrow"><i class="fa fa-arrow-right fa-2"></i></div>
	</div>
	<div id="lightboxexit"><div class="icon"><i class="fa fa-times"></i></div><div class="text"> Ansicht schlie&szlig;en  </div></div>
</div>
<?php include "admin.php"; include "footer.tpl"; ?>