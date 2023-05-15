(function ($) {
    $(document).ready(function() {
        $('.xzoom, .xzoom-gallery').xzoom({
            mposition:'fullscreen',
            zoomWidth: 600,
            zoomHeight:600, 
            title: true, 
            tint: '#333', 
            Xoffset: 5,
            Yoffset: -150,
            fadeIn:true,
            fadeOut:true,
            adaptive:false,
            hover:true
        });

        //Integration with fancybox plugin
        $('#xzoom-fancy').on('click', function(event) {
            event.preventDefault();
            var xzoom = $(this).data('xzoom');
            xzoom.closezoom();
            $.fancybox.open(xzoom.gallery().cgallery, {padding: 0, helpers: {overlay: {locked: false}}});
        });
        
        //Integration with magnific popup plugin
        // $('#xzoom-magnific').bind('hover', function(event) {
        //     var xzoom = $(this).data('xzoom');
        //     xzoom.closezoom();
        //     var gallery = xzoom.gallery().cgallery;
        //     var i, images = new Array();
        //     for (i in gallery) {
        //         images[i] = {src: gallery[i]};
        //     }
        //     $.magnificPopup.open({items: images, type:'image', gallery: {enabled: true}});
        //     event.preventDefault();
        // });
    });
})(jQuery);