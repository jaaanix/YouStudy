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
<?php include "footer.tpl"; ?>