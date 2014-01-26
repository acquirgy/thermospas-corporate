(function($){
    $.fn.extend({
    tsCustomStyle : function(options) {
        if(!$.browser.msie || ($.browser.msie&&$.browser.version>6)) {
            return this.each(function() {
                var tsCurrentSelected = $(this).find(':selected');
                $(this).after('<span class="tsCustomStyleSelectBox" id="tsCustomStyleSelectBox"><span class="tsCustomStyleSelectBoxInner">'+tsCurrentSelected.text()+'</span></span>').css({position:'absolute', opacity:0,fontSize:$(this).next().css('font-size')});
                var tsSelectBoxSpan = $(this).next();
                var tsSelectBoxWidth = parseInt($(this).width()) - parseInt(tsSelectBoxSpan.css('padding-left')) -parseInt(tsSelectBoxSpan.css('padding-right'));            
                var tsSelectBoxSpanInner = tsSelectBoxSpan.find(':first-child');
                tsSelectBoxSpan.css({display:'inline-block'});
                tsSelectBoxSpanInner.css({width:tsSelectBoxWidth, display:'inline-block'});
                var tsSelectBoxHeight = parseInt(tsSelectBoxSpan.height()) + parseInt(tsSelectBoxSpan.css('padding-top')) + parseInt(tsSelectBoxSpan.css('padding-bottom'));
                $(this).height(tsSelectBoxHeight).change(function() {
                    tsSelectBoxSpanInner.text($(this).find(':selected').text()).parent().addClass('changed');
                });
         });
        }
    }
    });
})(jQuery);