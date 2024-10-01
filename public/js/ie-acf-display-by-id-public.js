(function( $ ) {
	'use strict';

	jQuery(document).ready(function($) {

		if (typeof ie_product_info !== 'undefined' && ie_product_info.is_ie_product) {
            // Perform actions specific to when the od-scheduler shortcode is encountered
            console.log('value: ', ie_product_info);
            
            // Example: Add a class to the body or perform any other action
            // $('body').addClass('od-scheduler-active');

			$('.ie_title .elementor-heading-title').text(ie_product_info.ie_title);
			$('.ie_desc .elementor-widget-container').text(ie_product_info.ie_desc);
			$('.ie_beds .elementor-icon-box-title').text(ie_product_info.ie_beds);
			$('.ie_baths .elementor-icon-box-title').text(ie_product_info.ie_baths);
			$('.ie_sq_ft .elementor-icon-box-title').text(ie_product_info.ie_sq_ft);

        }

	});
})( jQuery );

