$(function() {
	var tmp = new imageGalery();
	tmp.SetImages(["images/madmax.jpg"]);
});

function imageGalery() {
	var that = this;
	var images = [];
	var thumbs = [];

	var imageIndex = -1;


	var thumbTemplate = null;
	var thumbImage = null;
	var lightboximagecontainer = null;
	var lightboxexit = null;

	var lightboxlower = null;
	var lightboxrail = null;
	var lightboxrailleftarrow = null;
	var lightboxrailrightarrow = null;
	var lightboxrailwidth = -1;
	var lightboxrailmove = -1;
	var lightboxrailright = -1;
	var lightboxrailestimatedleft = 0;

	var lightboxleftarrow = null;
	var lightboxrightarrow = null;
	var lightboxreal = null;
	var lightboxfake = null;
	var loadoverlay = null;

	var isVisible = false;

	function initialize() {
		lightboxcontainer = $('#lightbox');
		lightboxexit = $('#lightboxexit');
		lightboxlower = $('#lightboxlower');
		lightboxrail = $('#lightboxrail');
		lightboxrailleftarrow = $('#lightboxrailleftarrow');
		lightboxrailrightarrow = $('#lightboxrailrightarrow');
		lightboxleftarrow = $('#lightboxleftarrow');
		lightboxrightarrow = $('#lightboxrightarrow');
		thumbTemplate = lightboxlower.find('div.lightboxthumb').remove();
		thumbImage = thumbTemplate.find('div.image');
		lightboximagecontainer = $('#lightboximagecontainer');
		lightboxfake = lightboximagecontainer.find('img.fakeimage');
		lightboxreal = lightboximagecontainer.find('div.realimage')
		loadoverlay = $('#lightboxloadoverlay');


		lightboxlower.on('click','.lightboxthumb', onThumbClick);
		lightboxleftarrow.on('click', onLeftClick);
		lightboxrightarrow.on('click', onRightClick);
		lightboxrailleftarrow.on('click', onLeftRailClick);
		lightboxrailrightarrow.on('click', onRightRailClick);
		lightboxfake.on('load', onImageLoaded);
		lightboxexit.on('click', onExitClick);

		var opts = {
			  lines: 3 // The number of lines to draw
			, length: 60 // The length of each line
			, width: 10 // The line thickness
			, radius: 30 // The radius of the inner circle
			, scale: 1 // Scales overall size of the spinner
			, corners: 0 // Corner roundness (0..1)
			, opacity: 0.25 // Opacity of the lines
			, rotate: 0 // The rotation offset
			, direction: 1 // 1: clockwise, -1: counterclockwise
			, speed: 1 // Rounds per second
			, trail: 50 // Afterglow percentage
			, fps: 20 // Frames per second when using setTimeout() as a fallback for CSS
			, zIndex: 2e9 // The z-index (defaults to 2000000000)
			, className: 'spinner' // The CSS class to assign to the spinner
			, top: '50%' // Top position relative to parent
			, left: '50%' // Left position relative to parent
			, shadow: false // Whether to render a shadow
			, hwaccel: false // Whether to use hardware acceleration
			, position: 'absolute' // Element positioning
			, color: '#AACCFF'
		};
		new Spinner(opts).spin(loadoverlay.find('#lightboxspinner')[0]);

	}




	function reset() {
		imageIndex = -1;
		images = [];
		thumbs = [];
		lightboxrail.html('');
	}

	function onThumbClick() {
		if (imageIndex == $(this).attr('data-index'))
			return;
		setImage(imageIndex = $(this).attr('data-index'));

	}

	function onRightClick () {
		++imageIndex;
		if (imageIndex >= images.length) {
			jumpRailToLeft();
			imageIndex = 0;
		}
		setImage(imageIndex);
	}
	function onLeftClick () {
		--imageIndex;
		if (imageIndex < 0) {
			jumpRailToRight();
			imageIndex =  images.length - 1;
		}
		setImage(imageIndex);
	}
	function onExitClick () {
		isVisible = false;
		lightboxcontainer.hide();
	}

	function onLeftRailClick () {
		console.log(lightboxrailestimatedleft);
		if (lightboxrailestimatedleft < 0) {
			lightboxrailestimatedleft = Math.min(0, lightboxrailestimatedleft + lightboxrailmove);
			lightboxrail.stop().animate({left: lightboxrailestimatedleft});
		} else {
			jumpRailToRight();
		}
	}
	function onRightRailClick () {
		if (lightboxrailestimatedleft > lightboxrailright) {
			lightboxrailestimatedleft = Math.max(lightboxrailright, lightboxrailestimatedleft - lightboxrailmove);
			lightboxrail.stop().animate({left: lightboxrailestimatedleft});
		} else {
			jumpRailToLeft();
		}
	}
	function jumpRailToLeft() {	jumpRail(0); }
	function jumpRailToRight() { jumpRail(lightboxrailright); }
	function jumpRail (leftvalue) {
		if (lightboxrailright == -1)
			return;

		lightboxrailestimatedleft = leftvalue;
		lightboxrail.stop().animate({left: lightboxrailestimatedleft});
	}

	function onImageLoaded() {
		loadoverlay.fadeOut(750, function() { lightboxreal.css({'background-image': 'url(' + images[imageIndex] + ')'}).show('fold', {}, 1000); });
	}

	function setImage (index) {
		loadoverlay.stop().fadeIn(1000, function() { lightboxfake.attr('src',images[index]); });
		var currentthumb = lightboxrail.children('div.lightboxthumb').removeClass('active').filter('[data-index="' + index + '"]');
		currentthumb.addClass('active');
		lightboxreal.hide('fold', 1000);

		if (lightboxrailright == -1)
			return;
		if (currentthumb.position().left > + Math.abs(lightboxrailestimatedleft) + lightboxrailwidth) {
			//onRightRailClick(); 
			jumpRail((-currentthumb.position().left + 50).clamp(lightboxrailright, 0));
		}
		if (currentthumb.position().left < Math.abs(lightboxrailestimatedleft)) {
			jumpRail((-currentthumb.position().left + 50).clamp(lightboxrailright, 0));
			//onLeftRailClick();
		}
	}


	this.SetImages = function(imgArr, startimage) {
		startimage = startimage || 0;
		reset();

		var thumbwidth = 0;
		images = imgArr;
		for (var i = 0; i < imgArr.length; i++) {
			thumbTemplate.attr('data-index',i);
			thumbImage.css( {'background-image': 'url(' + imgArr[i] + ')'} );
			var clone = thumbTemplate.clone();
			lightboxrail.append(clone);
			if (i == 0)
				thumbwidth = clone.outerWidth();
		}
		if (thumbwidth * imgArr.length > lightboxlower.width()) {
			lightboxrail.css("width", thumbwidth * imgArr.length + 100)
			lightboxrailwidth = lightboxlower.width() - 100;
			lightboxrailmove = Math.min(5, parseInt(lightboxrailwidth / thumbwidth)) * thumbwidth;
			lightboxrailright = lightboxrailwidth - lightboxrail.width(); 
		} else {
			lightboxrail.css('padding',0);
			lightboxrailrightarrow.hide();
			lightboxrailleftarrow.hide();
		}
		setImage(imageIndex = startimage);

	};


	initialize();
}



/**
 * Returns a number whose value is limited to the given range.
 *
 * Example: limit the output of this computation to between 0 and 255
 * (x * 255).clamp(0, 255)
 *
 * @param {Number} min The lower boundary of the output range
 * @param {Number} max The upper boundary of the output range
 * @returns A number in the range [min, max]
 * @type Number
 */
 Number.prototype.clamp = function(min, max) {
 	return Math.min(Math.max(this, min), max);
 };