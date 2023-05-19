(function ($) {
    $(document).ready(function() {
        $('.xzoom, .xzoom-gallery').xzoom({
            zoomWidth: 450, 
            tint: '#333', 
            Xoffset: 5,
        });

        
        $(".psmall-image").click(function(){
            $("#xzoom-fancy").attr("src",$(this).attr('src'));
            $("#xzoom-fancy").attr("xoriginal",$(this).attr('src'));
        });
    });
})(jQuery);