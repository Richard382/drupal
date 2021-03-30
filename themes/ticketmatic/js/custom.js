jQuery(document).ready(function() {
    jQuery(window).scroll(function() {
        if (jQuery(window).scrollTop() > 80) {
            jQuery('body').addClass('sticky');
        } else {
            jQuery('body').removeClass('sticky');
        }
    })
});