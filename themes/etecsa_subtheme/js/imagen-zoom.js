/**
 * @file
 * Javascript for the Image Zoom.
 */
 (function ($) {
    
    const SQUARE_SIZE = 100;
    const SQUARE_MIDLE = SQUARE_SIZE/2;
    let firstImage = $('.eq-content .image.active img:first');
    let allImages = $('.eq-content .images div');
    
    if(firstImage) {

        let eqZoom = $("#img-zoom");
        let imgZoom = $("#img-zoom img");
        let square = $("#square");
        let eqDescription = $("#description");
        var currentPosition = { x: -1, y: -1 };
        var imgPosition = firstImage.offset();
        var imgLeft = imgPosition.left;
        var imgTop = imgPosition.top;
        var imgWidth = firstImage.width();
        var imgHeight = firstImage.height();

        imgZoom.width(parseInt(imgWidth*2));
        imgZoom.height(parseInt(imgHeight*2));

        $(document).mousemove(function(event) {
            currentPosition.x = event.pageX;
            currentPosition.y = event.pageY + SQUARE_SIZE;
            
            if(imgLeft != -1){
                if(currentPosition.x > imgLeft && currentPosition.x < imgLeft + imgWidth && 
                   currentPosition.y > imgTop && currentPosition.y < imgTop + imgHeight){ 
                    square.css({"display":"block"});
                    eqZoom.css({"display":"block"});
                    eqDescription.css({"display":"none"});
                 }else {
                    square.css({"display":"none"});
                    eqZoom.css({"display":"none"});
                    eqDescription.css({"display":"block"});
                 }
            }  
        });

        firstImage.attr("src",firstImage.attr("src")).on("load",function(){
			zoom(firstImage);
		});

        (function( func ) {
            $.fn.addClass = function() { 
                func.apply( this, arguments );
                this.trigger('addClass'); 
                return this; 
            }
        })($.fn.addClass);

        allImages.on('addClass',function(){
            zoom($('.image.active img:first'));
        });

        function zoom(image){
            imgZoom.attr("src",image.attr('src'));
			
			image.on("mousemove",function(event){
				showZoom();
			});

			square.on("mousemove",function(event){
				showZoom();
			});     
        }

        function showZoom(){
            let x = currentPosition.x - imgLeft - SQUARE_SIZE;
            let y = currentPosition.y  -imgTop - SQUARE_SIZE;
            square.css({"left":x + SQUARE_MIDLE, "top":y + SQUARE_MIDLE, "display":"block"});
            imgZoom.css({"left":-(x*2), "top":-(y*2)});
        }
        
    }      

})(jQuery);