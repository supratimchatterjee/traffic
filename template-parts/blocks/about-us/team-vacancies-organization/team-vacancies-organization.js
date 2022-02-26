 (function($){

    var initializeBlock = function( $block ) {
     $block.find('.team-inner-sec').owlCarousel({
		 
		loop:true,
		margin:0,
		dots:false,
		nav: true,
		navText: ["<i class='fas fa-arrow-left'></i>","<i class='fas fa-arrow-right'></i>"],
		items:1
	  
	});     
    }

    // Initialize each block on page load (front end).
    $(document).ready(function(){
        $('.teampicslider').each(function(){
            initializeBlock( $(this) );
        });
    });

    // Initialize dynamic block preview (editor).
    if( window.acf ) {
        window.acf.addAction( 'render_block_preview/type=team-vacancie-organization', initializeBlock );
    }

})(jQuery);