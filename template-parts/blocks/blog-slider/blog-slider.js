(function($){

    var initializeBlock = function( $block ) {
        $block.find('.blog-sec').owlCarousel({
            loop:true,
			margin:30,
			dots:true,
			nav: true,
			navText: ["<i class='fas fa-arrow-left'></i>","<i class='fas fa-arrow-right'></i>"],
			responsive:{
				0:{
					items:1,
					dots:false
				},
				600:{
					items:1,
					dots:false
				},
				768:{
					items:2
					
				},
				1200:{
					items:3
					
				}
			}
        });     
    }

    // Initialize each block on page load (front end).
    $(document).ready(function(){
        $('.blogslider').each(function(){
            initializeBlock( $(this) );
        });
    });

    // Initialize dynamic block preview (editor).
    if( window.acf ) {
        window.acf.addAction( 'render_block_preview/type=blog-slider-block', initializeBlock );
    }

})(jQuery);