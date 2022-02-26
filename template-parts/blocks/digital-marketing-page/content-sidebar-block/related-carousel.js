(function($){

    var initializeBlock = function( $block ) {
        $block.find('.related-crsl').owlCarousel({
      loop:true,
    margin:20,
    dots:false,
    nav: true,
    navText: ["<i class='fas fa-arrow-left'></i>","<i class='fas fa-arrow-right'></i>"],
    responsive:{
        0:{
            items:1,
            dots:false
        },
        600:{
            items:2,
            dots:false
        },
        768:{
            items:3
            
        },
        1200:{
            items:6
            
        }
      }
        });     
    }

    // Initialize each block on page load (front end).
    $(document).ready(function(){
        $('.rltslider').each(function(){
            initializeBlock( $(this) );
        });
    });

    // Initialize dynamic block preview (editor).
    if( window.acf ) {
        window.acf.addAction( 'render_block_preview/type=content-with-sidebar', initializeBlock );
    }

})(jQuery);