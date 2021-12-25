(function($) {

    var flipBoxHandler = function($scop, $){

        $('.hover').hover(function(){
            $(this).addClass('flip');
        },function(){
            $(this).removeClass('flip');
        });

    };

    $( window ).on( 'elementor/frontend/init', function(){

        elementorFrontend.hooks.addAction( 'frontend/element_ready/flip_box.default', flipBoxHandler );
    });

})(jQuery);
