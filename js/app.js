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




jQuery(document).ready(function(){
	
    jQuery('.SSscroll').slimScroll({
        height: '250px',
        color: 'black',
        allowPageScroll: true
    
    });
    
    
});


///Isotope

jQuery( function() {
  // init Isotope
  var $container = jQuery('#reviews').isotope({
    itemSelector: '.review',
    getSortData: {
    vintage: '.sort-vintage', // text from querySelector
    author: '.sort-author', // text from querySelector
    wine: '.sort-wine', // text from querySelector
    rating: '.sort-rating', // text from querySelector
        },
    sortBy :  [ 'vintage', 'wine','rating' ],
    sortAscending: false
       
  });

  // store filter for each group
  var filters = {};

  jQuery('#filters').on( 'click', '.filter', function() {
    var $this = jQuery(this);
    // get group key
    var $buttonGroup = $this.parents('.button-group');
    var filterGroup = $buttonGroup.attr('data-filter-group');
    // set filter for group
    filters[ filterGroup ] = $this.attr('data-filter');
    // combine filters
    var filterValue = '';
    for ( var prop in filters ) {
      filterValue += filters[ prop ];
    }
    // set filter for Isotope
    $container.isotope({ filter: filterValue });
  });
  // bind sort button click
  jQuery('#sorts').on( 'click', 'button', function() {
    var sortValue = jQuery(this).attr('data-sort-value');
    $container.isotope({ sortBy: sortValue });
  });
  // change is-checked class on buttons
  jQuery('.button-group').each( function( i, buttonGroup ) {
    var $buttonGroup = jQuery( buttonGroup );
    $buttonGroup.on( 'click', '.filter', function() {
      $buttonGroup.find('.is-checked').removeClass('is-checked');
      jQuery( this ).addClass('is-checked');
    });
  });
  
});




