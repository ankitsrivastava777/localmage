/**
 * This script is a simple wrapper that allows you to use OwlCarousel with Magento 2
 */
define([
    "jquery",
    "Excellence_JqueryWidget/js/owl.carousel.min"
], function($) {
    return function(config, element) {
        return $(element).owlCarousel(config);
    }
});