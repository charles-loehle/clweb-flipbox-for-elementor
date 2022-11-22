(function ($) {
	/**
	 * @param $scope The Widget wrapper element as a jQuery element
	 * @param $ The jQuery alias
	 * @description Fix for if the flipbox Min Height widget setting is set too small to contain all the elements, this will add more height to the containing div
	 */

	var WidgetFancyElementorFlipboxHandler = function ($scope, $) {
		// loop through all flipboxes
		$('.clweb-flipbox').each(function () {
			// var me = $(this);
			// reference dom elements
			var clweb_fb_holder = $(this).find('.clweb-flipbox__holder');
			// get flipbox front and back content heights
			var clweb_fb_front_height = $(this)
				.find('.clweb-flipbox__front .clweb-flipbox__content')
				.height();
			var clweb_fb_back_height = $(this)
				.find('.clweb-flipbox__back .clweb-flipbox__content')
				.height();

			// if back height and front height don't match, set a min height for containing div to whichever height is greater
			if (clweb_fb_back_height > clweb_fb_front_height) {
				clweb_fb_holder.css('min-height', clweb_fb_back_height);
			}
			if (clweb_fb_back_height < clweb_fb_front_height) {
				clweb_fb_holder.css('min-height', clweb_fb_front_height);
			}
		});
	};

	// On Elementor frontend load
	$(window).on('elementor/frontend/init', function () {
		elementorFrontend.hooks.addAction(
			// when element with data-widget_type="clweb-elementor-flipbox.default"
			'frontend/element_ready/clweb-elementor-flipbox.default',
			// callback function
			WidgetFancyElementorFlipboxHandler
		);
	});
})(jQuery);
