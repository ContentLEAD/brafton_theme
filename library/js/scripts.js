/*
 * Bones Scripts File
 * Author: Eddie Machado/Mike DeWitt
 *
 * This file should contain any js scripts you want to add to the site.
 * Instead of calling it in the header or throwing it inside wp_head()
 * this file will be called automatically in the footer so as not to
 * slow the page load.
 *
 * There are a lot of example functions and tools in here. If you don't
 * need any of it, just remove it. They are meant to be helpers and are
 * not required. It's your world baby, you can do whatever you want.
 */
/*
 * Get Viewport Dimensions
 * returns object with viewport dimensions to match css in width and height properties
 * ( source: http://andylangton.co.uk/blog/development/get-viewport-size-width-and-height-javascript )
 */
function updateViewportDimensions() {
    var w = window,
        d = document,
        e = d.documentElement,
        g = d.getElementsByTagName('body')[0],
        x = w.innerWidth || e.clientWidth || g.clientWidth,
        y = w.innerHeight || e.clientHeight || g.clientHeight;
    return {
        width: x,
        height: y
    }
}
// setting the viewport width
var viewport = updateViewportDimensions();
/*
 * Throttle Resize-triggered Events
 * Wrap your actions in this function to throttle the frequency of firing them off, for better performance, esp. on mobile.
 * ( source: http://stackoverflow.com/questions/2854407/javascript-jquery-window-resize-how-to-fire-after-the-resize-is-completed )
 */
var waitForFinalEvent = (function() {
    var timers = {};
    return function(callback, ms, uniqueId) {
        if (!uniqueId) {
            uniqueId = "Don't call this twice without a uniqueId";
        }
        if (timers[uniqueId]) {
            clearTimeout(timers[uniqueId]);
        }
        timers[uniqueId] = setTimeout(callback, ms);
    };
})();
// how long to wait before deciding the resize has stopped, in ms. Around 50-100 should work ok.
var timeToWaitForLast = 100;
/*
 * Here's an example so you can see how we're using the above function
 *
 * This is commented out so it won't work, but you can copy it and
 * remove the comments.
 *
 *
 *
 * If we want to only do it on a certain page, we can setup checks so we do it
 * as efficient as possible.
 *
 * if( typeof is_home === "undefined" ) var is_home = $('body').hasClass('home');
 *
 * This once checks to see if you're on the home page based on the body class
 * We can then use that check to perform actions on the home page only
 *
 * When the window is resized, we perform this function
 * $(window).resize(function () {
 *
 *    // if we're on the home page, we wait the set amount (in function above) then fire the function
 *    if( is_home ) { waitForFinalEvent( function() {
 *
 *      // if we're above or equal to 768 fire this off
 *      if( viewport.width >= 768 ) {
 *        console.log('On home page and window sized to 768 width or more.');
 *      } else {
 *        // otherwise, let's do this instead
 *        console.log('Not on home page, or window sized to less than 768.');
 *      }
 *
 *    }, timeToWaitForLast, "your-function-identifier-string"); }
 * });
 *
 * Pretty cool huh? You can create functions like this to conditionally load
 * content and other stuff dependent on the viewport.
 * Remember that mobile devices and javascript aren't the best of friends.
 * Keep it light and always make sure the larger viewports are doing the heavy lifting.
 *
 */
/*
 * We're going to swap out the gravatars.
 * In the functions.php file, you can see we're not loading the gravatar
 * images on mobile to save bandwidth. Once we hit an acceptable viewport
 * then we can swap out those images since they are located in a data attribute.
 */
function loadGravatars() {
    // set the viewport using the function above
    viewport = updateViewportDimensions();
    // if the viewport is tablet or larger, we load in the gravatars
    if (viewport.width >= 768) {
        jQuery('.comment img[data-gravatar]').each(function() {
            jQuery(this).attr('src', jQuery(this).attr('data-gravatar'));
        });
    }
} // end function
//And let's begin our custom scripts...
//load responsive nav...
var nav = responsiveNav("#menu-primary", { // Selector
    animate: true, // Boolean: Use CSS3 transitions, true or false
    transition: 284, // Integer: Speed of the transition, in milliseconds
    label: "Nav", // String: Label for the navigation toggle
    insert: "before", // String: Insert the toggle before or after the navigation
    customToggle: "nav-toggle", // Selector: Specify the ID of a custom toggle
    closeOnNavClick: false, // Boolean: Close the navigation when one of the links are clicked
    openPos: "static", // String: Position of the opened nav, relative or static
    navClass: "nav-collapse", // String: Default CSS class. If changed, you need to edit the CSS too!
    navActiveClass: "js-nav-active", // String: Class that is added to  element when nav is active
    jsClass: "js", // String: 'JS enabled' class which is added to  element
    init: function() {}, // Function: Init callback
    open: function() {}, // Function: Open callback
    close: function() {} // Function: Close callback
});
/*
 * Put all your regular jQuery in here.
 */
jQuery(document).ready(function($) {
    //sharrre buttons...
    //CHANGE load: and urlCurl FROM OLD TO WWW WHEN MIGRATING!!!
    Modernizr.load([{
        load: 'http://www.brafton.com/wp-content/themes/brafton/library/js/libs/jquery.sharrre.min.js',
        complete: function() {
            var template = '<div class="count">{total}</div>';
            var url = 'http://www.brafton.com' + window.location.pathname;
            var title = $('h1').text();
            $('a[data-service="linkedin"]').sharrre({
                click: function(api, options) {
                    api.simulateClick();
                    api.openPopup('linkedin');
                },
                share: {
                    linkedin: true
                },
                enableHover: false,
                enableTracking: true,
                title: title,
                template: '<div class="cube linkedin"></div>' + template,
                url: url
            });
            $('a[data-service="twitter"]').sharrre({
                buttons: {
                    twitter: {
                        via: 'Brafton',
                        related: 'Brafton'
                    }
                },
                click: function(api, options) {
                    api.simulateClick();
                    api.openPopup('twitter');
                },
                enableHover: false,
                enableTracking: true,
                enableCounter: false,
                share: {
                    twitter: true
                },
                title: title,
                //template: '<div class="cube twitter"></div>' + template,
                url: url
            });
            $('a[data-service="facebook"]').sharrre({
                click: function(api, options) {
                    api.simulateClick();
                    api.openPopup('facebook');
                },
                enableHover: false,
                enableTracking: true,
                share: {
                    facebook: true
                },
                title: title,
                template: '<div class="cube facebook"></div>' + template,
                url: url
            });
            $('a[data-service="gplus"]').sharrre({
                click: function(api, options) {
                    api.simulateClick();
                    api.openPopup('googlePlus');
                },
                enableHover: false,
                enableTracking: true,
                share: {
                    googlePlus: true
                },
                title: title,
                template: '<div class="cube gplus"></div>' + template,
                url: url,
                urlCurl: 'http://www.brafton.com/wp-content/themes/brafton/library/php/sharrre.php'
            });
            $('a[data-service="pinterest"]').sharrre({
                click: function(api, options) {
                    api.simulateClick();
                    api.openPopup('pinterest');
                },
                enableHover: false,
                enableTracking: true,
                share: {
                    pinterest: true
                },
                title: title,
                template: '<div class="cube pinterest"></div>' + template,
                url: url,
                urlCurl: 'http://www.brafton.com/wp-content/themes/brafton/library/php/sharrre.php'
            });
            $('a[data-service="stumbleupon"]').sharrre({
                click: function(api, options) {
                    api.simulateClick();
                    api.openPopup('stumbleupon');
                },
                enableHover: false,
                enableTracking: true,
                share: {
                    stumbleupon: true
                },
                title: title,
                template: '<div class="cube stumbleupon"></div>' + template,
                url: url,
                urlCurl: 'http://www.brafton.com/wp-content/themes/brafton/library/php/sharrre.php'
            });
        }
    }, ]);


    //Hide social icons in mobile view when the menu is selected

    $("#nav-toggle").click( function() {
        $(".share").hide();
        return false;
    });


    //some jquery for single.php

    $.fn.followFrom = function(pos) {
        var $this = this,
            $window = $(window);

        $window.scroll(function(e) {
            if ( $window.scrollTop() < pos ) {
                $this.css({
                    position: 'relative',
                    top: 0,
                    width: '263px',
                    'max-width': '100%',
                });
            } else {
                $this.css({
                    position: 'fixed',
                    top: '25px',
                    width: '21%',
                    'max-width': '263px',
                });
            }
        });
    };

    //Scroll to fixed 

    if($(".fixed-page-footer").length) {

        $(".fixed-page-footer").scrollToFixed( {
            bottom:0,
            limit: $(".fixed-page-footer").offset().top 
        });

    }




    //lightbox popup marketo form for blog and single post pages...

    $(".askamarketer").click(function(){
        MktoForms2.loadForm("//app-sj04.marketo.com", "447-XFF-352", 1337, function (form){
            MktoForms2.lightbox(form).show();
            form.onSubmit(function(){
                ga('send', 'event', 'Ask A Marketer', 'Form Completion', 'Ask_A_Marketer');
            });
        });
    });


    //lightbox popup marketo form for page templates

    $(".fixed-page-footer .contact_us").click(function(){
        MktoForms2.loadForm("//app-sj04.marketo.com", "447-XFF-352", 1409, function (form){
            MktoForms2.lightbox(form).show();
            form.onSubmit(function(){
                ga('send', 'event', 'Contact Us', 'Form Completion', 'Contact_Us');
            });
        });
    });

    //lightbox popup marketo forms for eBook CTAs

    $(".eBook_cta").click(function(){
        MktoForms2.loadForm("//app-sj04.marketo.com", "447-XFF-352", 1456, function (form){
            MktoForms2.lightbox(form).show();
            form.onSubmit(function(){
                ga('send', 'event', 'Resource', 'Download', '<?php the_permalink(); ?>');
            });
        });
    });

    $(".branding_eBook_cta").click(function(){
        MktoForms2.loadForm("//app-sj04.marketo.com", "447-XFF-352", 1418, function (form){
            MktoForms2.lightbox(form).show();
            form.onSubmit(function(){
                ga('send', 'event', 'Resource', 'Download', '<?php the_permalink(); ?>');
            });
        });
    });

    $(".convert_eBook_cta").click(function(){
        MktoForms2.loadForm("//app-sj04.marketo.com", "447-XFF-352", 1457, function (form){
            MktoForms2.lightbox(form).show();
            form.onSubmit(function(){
                ga('send', 'event', 'Resource', 'Download', '<?php the_permalink(); ?>');
            });
        });
    });

    $(".engage_eBook_cta").click(function(){
        MktoForms2.loadForm("//app-sj04.marketo.com", "447-XFF-352", 1442, function (form){
            MktoForms2.lightbox(form).show();
            form.onSubmit(function(){
                ga('send', 'event', 'Resource', 'Download', '<?php the_permalink(); ?>');
            });
        });
    });

    $(".seo_eBook_cta").click(function(){
        MktoForms2.loadForm("//app-sj04.marketo.com", "447-XFF-352", 1436, function (form){
            MktoForms2.lightbox(form).show();
            form.onSubmit(function(){
                ga('send', 'event', 'Resource', 'Download', '<?php the_permalink(); ?>');
            });
        });
    });

    $(".thought_eBook_cta").click(function(){
        MktoForms2.loadForm("//app-sj04.marketo.com", "447-XFF-352", 1454, function (form){
            MktoForms2.lightbox(form).show();
            form.onSubmit(function(){
                ga('send', 'event', 'Resource', 'Download', '<?php the_permalink(); ?>');
            });
        });
    });

    //ui effects for executive leadership page

    //These are hidden initially by CSS

    $(".exec_outer_container").click(function() {
        $(this).next(".exec_info_onclick").fadeIn(400);
        $(".exec_onclick_shadow").show();
    });

    //exit
    $(".exec_exit").click( function() {
        $(this).parents(".exec_info_onclick").hide();
        $(".exec_onclick_shadow").hide();
    });

    //And a similar effect for the blog popup form...

    //These are hidden initially by CSS
    
    //$(".marketzine").click(function() {
        //$(".popup_form").fadeIn(400);
        //$(".popup_form_shadow").show();
    //});

    $(".content_body .request_demo").click(function() {
        $(".popup_form").fadeIn(400);
        $(".popup_form_shadow").show();
    });

    $(".scrolly .request_demo").click(function() {
        $(".popup_form").fadeIn(400);
        $(".popup_form_shadow").show();
    });

    $(".fixed-page-footer .request_demo").click(function() {
        $(".popup_form").fadeIn(400);
        $(".popup_form_shadow").show();
    });

    $(".popup_form_exit").click(function() {
        $(".popup_form").hide();
        $(".popup_form_shadow").hide();
    });

    //Close popup on successful form submission

     function popup_form_hide() {
        $(".popup_form").hide();
        $(".popup_form_shadow").hide();
        console.log("I passed");
    }


    //ui effects for support page

    $('.support-link-container').hide();

    $('.support-cta').click(function() {
        $(this).hide();
        $('.support-link-container').fadeIn(400);
    });


    //Scrolly nav for support page

    $(".jumper").on("click", function( e ) {

        e.preventDefault();

        $("body, html").animate({ 
            scrollTop: $( $(this).attr('href') ).offset().top 
        }, 500);

    });

    $("a[href='#top']").click(function() {
        $("html, body").animate({ scrollTop: 0 }, "slow");
        return false;
    });


    //Add jQuery UI tabs to blog sidebar

    $( "#tabs" ).tabs();

    //Center videos the hard way

    //$('.sublimevideo-View').removeAttr('style').css('margin','auto');


}); /* end of as page load scripts */

