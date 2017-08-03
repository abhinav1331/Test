jQuery(function() {
	// We can attach the `fileselect` event to all file inputs on the page
	jQuery(document).on('change', '.file-713 :file', function() {
		var input = jQuery(this),
			numFiles = input.get(0).files ? input.get(0).files.length : 1,
			label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
		input.trigger('fileselect', [numFiles, label]);
	});
	// We can watch for our custom `fileselect` event like this
	jQuery(document).ready(function() {
		jQuery(':file').on('fileselect', function(event, numFiles, label) {
			var input = jQuery('.sideform-input ').find(':text'),
				log = numFiles > 1 ? numFiles + ' files selected' : label;
			if (input.length) {
				input.val(log);
			}
		});
	});
	jQuery('.sideform-input .wpcf7-text').on('click', function() {
		jQuery('.file-713').find(':file').trigger('click');
	});
});


jQuery(document).ready(function() {
	var jQuerytimeline_block = jQuery('.cd-timeline-block');
	//hide timeline blocks which are outside the viewport
	jQuerytimeline_block.each(function() {
		if (jQuery(this).offset().top > jQuery(window).scrollTop() + jQuery(window).height() * 0.75) {
			jQuery(this).find('.cd-timeline-img, .cd-timeline-content').addClass('is-hidden');
		}
	});
	//on scolling, show/animate timeline blocks when enter the viewport
	jQuery(window).on('scroll', function() {
		jQuerytimeline_block.each(function() {
			if (jQuery(this).offset().top <= jQuery(window).scrollTop() + jQuery(window).height() * 0.75 && jQuery(this).find('.cd-timeline-img').hasClass('is-hidden')) {
				jQuery(this).find('.cd-timeline-img, .cd-timeline-content').removeClass('is-hidden').addClass('bounce-in');
			}
		});
	});
});
