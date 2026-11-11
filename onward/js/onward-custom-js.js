jQuery(document).ready(function() {

    /** Base */
    
        var primary_menu_toggle     = jQuery('#mainheader .menu-toggle');
        var secondary_menu_toggle   = jQuery('#secondary-navigation .menu-toggle');
        var dropdown_toggle         = jQuery('button.dropdown-toggle');
        var primary_nav_menu        = jQuery('#mainheader .main-navigation');
        var secondary_nav_menu      = jQuery('#secondary-navigation .main-navigation');
        var menu_toggle             = jQuery('#mainheader');
    
    /** Main Menu */
    primary_menu_toggle.click(function(){
        primary_nav_menu.slideToggle();
        jQuery(this).toggleClass('active');
        jQuery('.menu-overlay').toggleClass('active');
        jQuery('#mainheader .main-navigation').toggleClass('menu-open');
        jQuery('body').toggleClass('main-navigation-active');
    });

    secondary_menu_toggle.click(function(){
        secondary_nav_menu.slideToggle();
        jQuery(this).toggleClass('active');
        jQuery('#secondary-navigation .main-navigation').toggleClass('menu-open');
        jQuery('body').toggleClass('main-navigation-active');
    });

    dropdown_toggle.click(function() {
        jQuery(this).toggleClass('active');
        jQuery(this).parent().find('.sub-menu').first().slideToggle();
        jQuery('#primary-menu > li:last-child button.active').unbind('keydown');
    });

    jQuery(window).scroll(function() {
        if (jQuery(this).scrollTop() > 1) {
            jQuery('#mainheader').addClass('nav-shrink');
        } 
        else {
            jQuery('#mainheader').removeClass('nav-shrink');
        }
    });

    if (jQuery(window).width() < 1024) {
        jQuery( ".nav-menu ul.sub-menu li:last-child" ).focusout(function() {
            dropdown_toggle.removeClass('active');
            jQuery('.main-navigation .sub-menu').slideUp();
        });
    }

    /** Keyboard Navigation */
    if( jQuery(window).width() < 1024 ) {
        jQuery('#primary-menu').find("li").last().bind( 'keydown', function(e) {
            if( e.which === 9 ) {
                e.preventDefault();
                jQuery('#mainheader').find('.menu-toggle').focus();
            }
        });
    
        jQuery('#primary-menu > li:last-child button:not(.active)').bind( 'keydown', function(e) {
            if( e.which === 9 ) {
                e.preventDefault();
                jQuery('#mainheader').find('.menu-toggle').focus();
            }
        });    
    }
    else {
        jQuery('#primary-menu').find("li").unbind('keydown');
    }
    
    jQuery(window).resize(function() {
        if( jQuery(window).width() < 1024 ) {
            jQuery('#primary-menu').find("li").last().bind( 'keydown', function(e) {
                if( e.which === 9 ) {
                    e.preventDefault();
                    jQuery('#mainheader').find('.menu-toggle').focus();
                }
            });
            jQuery('#primary-menu > li:last-child button:not(.active)').bind( 'keydown', function(e) {
                if( e.which === 9 ) {
                    e.preventDefault();
                    jQuery('#mainheader').find('.menu-toggle').focus();
                }
            });    
        }
        else {
            jQuery('#primary-menu').find("li").unbind('keydown');
        }
    });

    primary_menu_toggle.on('keydown', function (e) {
        var tabKey    = e.keyCode === 9;
        var shiftKey  = e.shiftKey;

        if( menu_toggle.hasClass('active') ) {
            if ( shiftKey && tabKey ) {
                e.preventDefault();
                primary_menu.slideUp();
                jQuery('.main-navigation').removeClass('menu-open');
                jQuery('.menu-overlay').removeClass('active');
                primary_menu_toggle.removeClass('active');
            };
        }
    });

    /** End jQuery */
});


/**
 * WooCommerce: Ship To A Different Address?
 */

// ( function() {
//     var ship_to_different_address_checkbox = document.getElementById( 'ship-to-different-address' );
//     ship_to_different_address_checkbox.addEventListener( 'click', function() {
//         setTimeout( function() {
//             // Your code here
//         }, 10000 );
//     }, false );
// })();


