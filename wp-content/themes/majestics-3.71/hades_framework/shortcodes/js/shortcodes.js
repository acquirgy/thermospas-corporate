// JavaScript Document




jQuery(function($){
	
	var temp;
	
	
	
			
	
	$("a").css("-moz-outline-style","none");
	
	

	
	
	$( ".shortcodes-tabs" ).tabs();
	
	
	$( ".shortcodes-accordion" ).accordion();
	$(".separator a").click(function(){ $(window).scrollTop(0); });
	
	$( ".toggletitle" ).click(function(){
		temp = $(this);
		$(this).next().slideToggle('fast', function() {
       
	   if(!$(this).is(":visible"))
	   temp.addClass("shortcodes-slideup").removeClass("shortcodes-slidedown");
	   else
	   temp.addClass("shortcodes-slidedown").removeClass("shortcodes-slideup");
	   
  });
		});
	
	$(window).load(function(){
	$(".image-wrapper").each(function(){
	   	
	$(this).find(".caption").width($(this).find("img").width());
		});
	});
	
	
	
	});