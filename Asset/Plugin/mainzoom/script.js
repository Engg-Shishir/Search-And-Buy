(function($){
	$.fn.picZoomer = function(options){
		var opts = $.extend({}, $.fn.picZoomer.defaults, options),
		$this = this,
		$picBD = $('<div class="picZoomer-pic-wp"></div>').css({'width' : opts.picWidth+'px', 'height':opts.picHeight+'px'}).appendTo($this),

		$pic = $this.children('img').addClass('picZoomer-pic').appendTo($picBD),
		$cursor = $('<div class="picZoomer-cursor"><i class="f-is picZoomCursor-ico"></i></div>').appendTo($picBD),

		cursorSizeHalf = {w:$cursor.width()/2 , h:$cursor.height()/2},
		$zoomWP = $('<div class="picZoomer-zoom-wp"><img class="picZoomer-zoom-pic"></img></div>').appendTo($this),

		$zoomPic = $zoomWP.find('.picZoomer-zoom-pic'),
		picBDOffset = {x:$picBD.offset().left,y:$picBD.offset().top};

		opts.zoomWidth = opts.zoomWidth||opts.picWidth;
		opts.zoomHeight = opts.zoomHeight||opts.picHeight;
		var zoomWPSizeHalf = {w:opts.zoomWidth/1, h:opts.zoomHeight/1};


		$zoomWP.css({'width': opts.zoomWidth+'px', 'height':opts.zoomHeight+'px'});

		$zoomWP.css(opts.zoomerPosition || {top:0 , left: opts.picWidth+30+'px'});

		$zoomPic.css({'width':opts.picWidth*opts.scale+'px', 'height':opts.picHeight*opts.scale+'px'});

		$picBD.on('mouseenter',function(event){
			$cursor.show();
			$zoomWP.show();
			$zoomPic.attr('src',$pic.attr('src'))			
		}).on('mouseleave', function(event){
			$cursor.hide();
			$zoomWP.hide();
		}).on('mousemove', function(event){
			var x =event.pageX-picBDOffset.x,
			    y =event.pageY-picBDOffset.y;

			$cursor.css({'left':x-cursorSizeHalf.w+'px', 'top':y-cursorSizeHalf.h+'px'});

			$zoomPic.css({'left':-(x*opts.scale-zoomWPSizeHalf.w)+'px', 'top':-(y*opts.scale-zoomWPSizeHalf.h)+'px'});
		});

		return $this;
	};
	$.fn.picZoomer.defaults = {
		picWidth:320,
		picHeight:320,
		scale:3.5,
		zoomerPosition: {top:'0', left: '350px'}
	};
})(jQuery);

$(function(){
	$('.picZoomer').picZoomer();
	$('.psmall-image').on('click', function(event){
		$('.psmall-image').removeClass("active");
		$(this).addClass("active");
		$('.xzoom').attr('src',$(this).attr('src'));
	});
});