(function ($) {
	/**
	 * @param $scope The Widget wrapper element as a jQuery element
	 * @param $ The jQuery alias
	 */

	var WidgetFancyElementorFlipboxHandler = function ($scope, $) {
		$('.clweb-flipbox').each(function () {
			var me = $(this);
			var clweb_fb_holder = me.find('.clweb-flipbox__holder');
			var clweb_fb_content_height = me.find('.clweb-flipbox__content').height();
			var clweb_fb_front_height = me
				.find('.clweb-flipbox__front .clweb-flipbox__content')
				.height();
			var clweb_fb_back_height = me
				.find('.clweb-flipbox__back .clweb-flipbox__content')
				.height();

			if (clweb_fb_back_height > clweb_fb_front_height) {
				clweb_fb_holder.css('min-height', clweb_fb_back_height);
			}
			if (clweb_fb_back_height < clweb_fb_front_height) {
				clweb_fb_holder.css('min-height', clweb_fb_front_height);
			}
		});
	};

	// Make sure you run this code under Elementor.
	$(window).on('elementor/frontend/init', function () {
		elementorFrontend.hooks.addAction(
			'frontend/element_ready/fancy-elementor-flipbox.default',
			WidgetFancyElementorFlipboxHandler
		);
	});
})(jQuery);
