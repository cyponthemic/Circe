// Foundation JavaScript
// Documentation can be found at: http://foundation.zurb.com/docs
// $(document).foundation(); 
jQuery(document).ready(function($) {
var gap = ($(window).width()-1000)/2;
$( "#floating" ).offset({ top: 20, left: gap });

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
