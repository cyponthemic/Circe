// Foundation JavaScript
// Documentation can be found at: http://foundation.zurb.com/docs
// $(document).foundation(); 


	jQuery(document).ready(function($) {
	if ( jQuery(window).width()>1025 ) {
	var gap = ($(window).width()-1025)/2;
	$( "#floating" ).offset({ left: gap }).fadeIn("slow");
	}
	});
	
	jQuery(window).resize(function($) {
	if ( jQuery(window).width()<1025 ) {
	jQuery( "#floating" ).fadeOut(1);
	}
	else {
	jQuery( "#floating" ).fadeIn("slow");
	var gap = (jQuery(window).width()-1025)/2;
	jQuery( "#floating" ).offset({ left: gap }).fadeIn("slow");
	}
	});
	

//Skrollr Init 
// https://ihatetomatoes.net/how-to-create-a-parallax-scrolling-website/


( function( $ ) {
    // Init Skrollr
    var s = skrollr.init({
        render: function(data) {
            //Debugging - Log the current scroll position.
            //console.log(data.curTop);
        }
    });
} )( jQuery );
