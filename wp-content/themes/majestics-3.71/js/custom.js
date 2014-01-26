// JavaScript Document

/*

Author - WPTitans
Description - Main file for Javascript stuff for the theme. Powered by jQuery.

Index :-

1. Global Preloader
2. Titan Gallery Plugin
3. Main Code

*/

/* ================================================================================== */
/* == Global Preloader =============================================================== */
/* ================================================================================== */

 var preload = function(container,time,callback){
	   
	  temp = container.find("img");
	
	  temp.each(function(){
		  
		  $(this).bind("load error",function(){
		 
		  $(this).css({ "visibility": "visible" }).animate({ opacity:"1" },time);
		  
		  }).each(function(){
                if(this.complete || ($.browser.msie && parseInt($.browser.version) == 6)) { $(this).trigger('load'); callback(); }
            });
		  
	  });
	   
	  }
	  


	
			
/* ================================================================================== */
/* == Main Code Begin =============================================================== */
/* ================================================================================== */



/* ---------------------------------------------------------------------------------- */
/* -- Things need to be ready at first ---------------------------------------------- */
/* ---------------------------------------------------------------------------------- */

jQuery(document).ready(function(){
	
	
	$("#menu").addClass("clearfix");
	
	// remove unecessart p tags generated from autop
	$(".content").find("p:not(.separator)").each(function(){
	    if(jQuery.trim($(this).html())=="")
		$(this).remove();
	});
	
	$(".title").each(function(){
		
		if($(this).parents('.sidebar-wrap').length>0)
		return;
		$(this).find("h4").css("left", $(this).width()/2 - $(this).find("h4").width()/2 );
		
		});
	
});	


/* ---------------------------------------------------------------------------------- */
/* -- When DOM is loaded  ----------------------------------------------------------- */
/* ---------------------------------------------------------------------------------- */


jQuery(function($){


/* ---------------------------------------------------------------------------------- */
/* -- Variables intializa  ----------------------------------------------------------- */
/* ---------------------------------------------------------------------------------- */
	
var obj,flickr_limit = 5,temp,temp_parent,taxonomy_parent = $(".portfolio-taxonomy li:first")
    ,portfolio = $(".portfolio li")
    , parent,arr,src,block,index=0
    , counter = 0
    , i =0,sidebar = $(".sidebar"),menu = $("#menu");


 
sidebar.find(".widget-posts li:last , .menu li:last").css("border-bottom","none");

/* ---------------------------------------------------------------------------------- */
/* -- Menu Stuff -------------------------------------------------------------------- */
/* ---------------------------------------------------------------------------------- */
  
$("#top-social-menu li").hover(function(){
	
	$(this).animate({width:$(this).children("a").width()},'normal');
	
	},function(){
	
	$(this).animate({width:50},'normal');	
		
		});


menu.find("li").hover(function(){
   $(this).children('.sub-menu').hide().slideDown('normal');
  },function(){
  $(this).children('.sub-menu').stop(true,true).hide(); 
  });	

menu.children("li").each(function(){
		
		if($(this).children().hasClass("sub-menu"))
		$(this).addClass("showdropdown");
		
		});
		

$(".home-tabbed-area").tabs();

$(".imageholder").hover(function(){
	$(this).find(".image-overlay,.video-overlay").fadeIn('normal');
	},function(){
	
	$(this).find(".image-overlay,.video-overlay").fadeOut('normal');	
		});

$(".imageholder").hover(function(){
	$(this).find(".image-overlay,.video-overlay").fadeIn('normal');
	},function(){
	
	$(this).find(".image-overlay,.video-overlay").fadeOut('normal');	
		});
		
$(".portfolio-taxonomy li a").click(function(e){
		taxonomy_parent.removeClass("active");
		taxonomy_parent = $(this).parent();
		taxonomy_parent.addClass("active");
		
		var query = $(this).html();
		var flag= false;
		
		if(jQuery.trim(query)=="All")
		{
			portfolio.fadeIn('normal');	
			e.preventDefault();
			return;
		}
		portfolio.hide();
		portfolio.each(function(){
			flag= false;
			$(this).removeClass('clearleft');
			$(this).find("small a").each(function(){
				if($(this).html()==query)
				{
					flag = true; 
				}
				});
				
			if(flag==false)
			$(this).fadeOut('fast');
			else
			$(this).fadeIn('normal');	
			
			});
		
		e.preventDefault();
		});

/* ==================================================================== */
/* ======================== Portfolio page Stuff ====================== */
/* ==================================================================== */

var portfolio_stage = $(".portfolio-stage") , portfolio_thumbs = $(".portfolio_array ul li");

if($(".portfolio").length>0) {
	
	portfolio_stage.find("img").attr("src",portfolio_thumbs.first().children("a").attr("href"));
	portfolio_stage.next().html(portfolio_thumbs.first().find(".text").html());
	portfolio_stage.find("a").attr("href",portfolio_thumbs.first().find("img").attr("alt"));

}
else
{
	
	portfolio_stage.find("img").css({ opacity:0 , "visibility" : "hidden" });
	
	preload(portfolio_stage,1000,function(){});
}

portfolio_stage.find(".portfolio-zoom").click(function(){ portfolio_stage.children("a.lightbox").trigger("click"); });
portfolio_stage.hover(function(){
	portfolio_stage.find(".portfolio-zoom").fadeIn("normal");
	},function(){
		portfolio_stage.find(".portfolio-zoom").fadeOut("normal");	
		
		});
portfolio_thumbs.children("a").bind("click",function(e){
	
	portfolio_stage.find("img").remove();
	portfolio_stage.children("a").html("<img src='"+$(this).attr("href")+"' alt=''/>");
	portfolio_stage.find("a").attr("href",$(this).children("img").attr("alt"));
	portfolio_stage.find("img").css({ opacity:0 , "visibility" : "hidden" });
	preload(portfolio_stage,1000,function(){});
	
	
	portfolio_stage.find("a").attr("href",$(this).find("img").attr("alt"));
    portfolio_stage.next().html($(this).parent().find(".text").html());
    e.preventDefault();
	});

$(".images a").live("click",function(e){
	
	
	$(".images").find("a").removeClass("active");
	$(this).addClass("active");
	
	portfolio_stage.find("img").remove();
	portfolio_stage.children("a").html("<img src='"+$(this).attr("href")+"' alt=''/>");
	portfolio_stage.find("a").attr("href",$(this).children("img").attr("alt"));
	portfolio_stage.find("img").css({ opacity:0 , "visibility" : "hidden" });
	preload(portfolio_stage,1000,function(){});
	e.preventDefault();
	});		
		
/* ==================================================================== */
/* ============================ Misc Stuff ============================ */
/* ==================================================================== */


// contact input settings
  
$("#qemail , #qmsg ,#qname").focusin(function(){ $(this).val('');});

// lightbox initialization 
  
$(".lightbox").prettyPhoto({animationSpeed:'slow'});

// Tabs call

$( ".tabs" ).tabs({ fx: { opacity: 'toggle' }});
$(".ui-tabs .ui-tabs-nav li:first").css("borderLeft","none");

if($("#flickr-images").length>0)
{
		var temp,i,flickr_limit = $("#flickr-nos").val();
var fid =  $("#flickr-id").val();
	i =0;
	$.getJSON("http://api.flickr.com/services/feeds/photos_public.gne?id="+fid+"&lang=en-us&format=json&jsoncallback=?", function(data){
		
$.each(data.items, function(i,item){
		
		if(i>=flickr_limit) 
		return;
		$("<img/>").css({  width:70,height:56 }).attr({
			"src": item.media.m,
			"alt" : item.media.m
			}).appendTo("#flickr-images").wrap("<a href='" + item.link + "'></a>");
			
		
		i++;
	});
	
  });
  
}
	

var api = $(".scrollable-section").scrollable({ api:true });	
$('.sprev').click(function(e){ api.prev(); e.preventDefault(); });
$('.snext').click(function(e){ api.next(); e.preventDefault();  });
	
if($(".single-scroller-posts").length>0)
{
var related = $(".single-scroller-posts").scrollable({ api:true });	
$('.single-showcase-prev').click(function(e){ related.prev(); e.preventDefault(); });
$('.single-showcase-next').click(function(e){ related.next(); e.preventDefault();  });	
}
/* ==================================================================== */
/* === Contact Form Settings ========================================== */
/* ==================================================================== */ 
	
	
	$("#qsubmit").click(function(e){
	 temp = $(this).parent().find(".loader");
	 //temp.fadeIn("slow");
	 var loader = $(this).parent().find(".ajax-loading-icon").fadeIn("slow");
	 
	 $.post( $(this).parent().find("#ajax_contact_path").val(),{ 
	 notify_email : $(this).parent().find("#notify_email").val(),
	 name : $(this).parent().find("#qname").val(),
	 email : $(this).parent().find("#qemail").val(),
	 message : $(this).parent().find("#qmsg").val()
	 
	 },function(data){
		
		
		if(data=="success") {
		loader.fadeOut("slow",function(){
			 temp.addClass('success-box').removeClass('error-box').fadeToggle("slow");
			 setTimeout(function(){ temp.fadeToggle("normal"); },4000);
			 });
			 
		 }
		else
		{
		  loader.fadeOut("slow");
			temp.removeClass('success-box').addClass('error-box').html("<p>Error</p>");
			 temp.fadeToggle("slow");
			 setTimeout(function(){ temp.fadeToggle("normal"); },4000);
			 
		}	 
		
		});
		
		
		e.preventDefault();
		
	});
    
	$(".d_submit").click(function(e){
		
		
		obj = $(this);
		var msg = obj.parents(".dynamic_forms").find(".loader");
		var array = obj.parent().serializeArray();
		var loader = $(this).parents(".dynamic_forms").find(".ajax-loading-icon").fadeIn("slow");
		
		$.post( obj.parent().attr("action"), { key:obj.parent().find(".form_key").val() , values : array , notify_email : obj.parent().find(".notify_email").val() , recaptcha_challenge_field:obj.parent().find("#recaptcha_challenge_field").val()   , recaptcha_response_field:obj.parent().find("#recaptcha_response_field").val()  } , function(data){
			
			if(data=="success")
			{
				loader.fadeOut("slow");
			    msg.addClass('success-box').removeClass('error-box').html("<p> Your Message been sent </p>");
			    msg.fadeIn("slow");
			}
			else
			{
				loader.fadeOut("slow");
				msg.removeClass('success-box').addClass('error-box').html("<p>"+data+"</p>");
				msg.fadeIn("slow");
			}
			
			}  );
		
		e.preventDefault();
		
		});
	
	if( $(".testimonials").length>0 )
	{
		$(".testimonials>ul").cycle({ timeout:6000 });
	}
	
/* ==================================================================== */
/* === Scrollbar less module ========================================== */
/* ==================================================================== */ 	



		$(".testimonials").css("height",$(".testimonials>ul>li:first").height());
		
			
	});
	
	


(function(a){a.tools=a.tools||{version:"v1.2.5"},a.tools.scrollable={conf:{activeClass:"active",circular:!1,clonedClass:"cloned",disabledClass:"disabled",easing:"swing",initialIndex:0,item:null,items:".items",keyboard:!0,mousewheel:!1,next:".next",prev:".prev",speed:400,vertical:!1,touch:!0,wheelSpeed:0}};function b(a,b){var c=parseInt(a.css(b),10);if(c)return c;var d=a[0].currentStyle;return d&&d.width&&parseInt(d.width,10)}function c(b,c){var d=a(c);return d.length<2?d:b.parent().find(c)}var d;function e(b,e){var f=this,g=b.add(f),h=b.children(),i=0,j=e.vertical;d||(d=f),h.length>1&&(h=a(e.items,b)),a.extend(f,{getConf:function(){return e},getIndex:function(){return i},getSize:function(){return f.getItems().size()},getNaviButtons:function(){return m.add(n)},getRoot:function(){return b},getItemWrap:function(){return h},getItems:function(){return h.children(e.item).not("."+e.clonedClass)},move:function(a,b){return f.seekTo(i+a,b)},next:function(a){return f.move(1,a)},prev:function(a){return f.move(-1,a)},begin:function(a){return f.seekTo(0,a)},end:function(a){return f.seekTo(f.getSize()-1,a)},focus:function(){d=f;return f},addItem:function(b){b=a(b),e.circular?(h.children("."+e.clonedClass+":last").before(b),h.children("."+e.clonedClass+":first").replaceWith(b.clone().addClass(e.clonedClass))):h.append(b),g.trigger("onAddItem",[b]);return f},seekTo:function(b,c,k){b.jquery||(b*=1);if(e.circular&&b===0&&i==-1&&c!==0)return f;if(!e.circular&&b<0||b>f.getSize()||b<-1)return f;var l=b;b.jquery?b=f.getItems().index(b):l=f.getItems().eq(b);var m=a.Event("onBeforeSeek");if(!k){g.trigger(m,[b,c]);if(m.isDefaultPrevented()||!l.length)return f}var n=j?{top:-l.position().top}:{left:-l.position().left};i=b,d=f,c===undefined&&(c=e.speed),h.animate(n,c,e.easing,k||function(){g.trigger("onSeek",[b])});return f}}),a.each(["onBeforeSeek","onSeek","onAddItem"],function(b,c){a.isFunction(e[c])&&a(f).bind(c,e[c]),f[c]=function(b){b&&a(f).bind(c,b);return f}});if(e.circular){var k=f.getItems().slice(-1).clone().prependTo(h),l=f.getItems().eq(1).clone().appendTo(h);k.add(l).addClass(e.clonedClass),f.onBeforeSeek(function(a,b,c){if(!a.isDefaultPrevented()){if(b==-1){f.seekTo(k,c,function(){f.end(0)});return a.preventDefault()}b==f.getSize()&&f.seekTo(l,c,function(){f.begin(0)})}}),f.seekTo(0,0,function(){})}var m=c(b,e.prev).click(function(){f.prev()}),n=c(b,e.next).click(function(){f.next()});!e.circular&&f.getSize()>1&&(f.onBeforeSeek(function(a,b){setTimeout(function(){a.isDefaultPrevented()||(m.toggleClass(e.disabledClass,b<=0),n.toggleClass(e.disabledClass,b>=f.getSize()-1))},1)}),e.initialIndex||m.addClass(e.disabledClass)),e.mousewheel&&a.fn.mousewheel&&b.mousewheel(function(a,b){if(e.mousewheel){f.move(b<0?1:-1,e.wheelSpeed||50);return!1}});if(e.touch){var o={};h[0].ontouchstart=function(a){var b=a.touches[0];o.x=b.clientX,o.y=b.clientY},h[0].ontouchmove=function(a){if(a.touches.length==1&&!h.is(":animated")){var b=a.touches[0],c=o.x-b.clientX,d=o.y-b.clientY;f[j&&d>0||!j&&c>0?"next":"prev"](),a.preventDefault()}}}e.keyboard&&a(document).bind("keydown.scrollable",function(b){if(e.keyboard&&!b.altKey&&!b.ctrlKey&&!a(b.target).is(":input")){if(e.keyboard!="static"&&d!=f)return;var c=b.keyCode;if(j&&(c==38||c==40)){f.move(c==38?-1:1);return b.preventDefault()}if(!j&&(c==37||c==39)){f.move(c==37?-1:1);return b.preventDefault()}}}),e.initialIndex&&f.seekTo(e.initialIndex,0,function(){})}a.fn.scrollable=function(b){var c=this.data("scrollable");if(c)return c;b=a.extend({},a.tools.scrollable.conf,b),this.each(function(){c=new e(a(this),b),a(this).data("scrollable",c)});return b.api?c:this}})(jQuery);
(function(a){var b=a.tools.scrollable;b.autoscroll={conf:{autoplay:!0,interval:3e3,autopause:!0}},a.fn.autoscroll=function(c){typeof c=="number"&&(c={interval:c});var d=a.extend({},b.autoscroll.conf,c),e;this.each(function(){var b=a(this).data("scrollable");b&&(e=b);var c,f=!0;b.play=function(){c||(f=!1,c=setInterval(function(){b.next()},d.interval))},b.pause=function(){c=clearInterval(c)},b.stop=function(){b.pause(),f=!0},d.autopause&&b.getRoot().add(b.getNaviButtons()).hover(b.pause,b.play),d.autoplay&&b.play()});return d.api?e:this}})(jQuery);
(function(a){var b=a.tools.scrollable;b.navigator={conf:{navi:".navi",naviItem:null,activeClass:"active",indexed:!1,idPrefix:null,history:!1}};function c(b,c){var d=a(c);return d.length<2?d:b.parent().find(c)}a.fn.navigator=function(d){typeof d=="string"&&(d={navi:d}),d=a.extend({},b.navigator.conf,d);var e;this.each(function(){var b=a(this).data("scrollable"),f=d.navi.jquery?d.navi:c(b.getRoot(),d.navi),g=b.getNaviButtons(),h=d.activeClass,i=d.history&&a.fn.history;b&&(e=b),b.getNaviButtons=function(){return g.add(f)};function j(a,c,d){b.seekTo(c);if(i)location.hash&&(location.hash=a.attr("href").replace("#",""));else return d.preventDefault()}function k(){return f.find(d.naviItem||"> *")}function l(b){var c=a("<"+(d.naviItem||"a")+"/>").click(function(c){j(a(this),b,c)}).attr("href","#"+b);b===0&&c.addClass(h),d.indexed&&c.text(b+1),d.idPrefix&&c.attr("id",d.idPrefix+b);return c.appendTo(f)}k().length?k().each(function(b){a(this).click(function(c){j(a(this),b,c)})}):a.each(b.getItems(),function(a){l(a)}),b.onBeforeSeek(function(a,b){setTimeout(function(){if(!a.isDefaultPrevented()){var c=k().eq(b);!a.isDefaultPrevented()&&c.length&&k().removeClass(h).eq(b).addClass(h)}},1)});function m(a,b){var c=k().eq(b.replace("#",""));c.length||(c=k().filter("[href="+b+"]")),c.click()}b.onAddItem(function(a,c){c=l(b.getItems().index(c)),i&&c.history(m)}),i&&k().history(m)});return d.api?e:this}})(jQuery);

(function($) {

var ver = 'Lite-1.3';

$.fn.cycle = function(options) {
    return this.each(function() {
        options = options || {};
        
        if (this.cycleTimeout) clearTimeout(this.cycleTimeout);
        this.cycleTimeout = 0;
        this.cyclePause = 0;
        
        var $cont = $(this);
        var $slides = options.slideExpr ? $(options.slideExpr, this) : $cont.children();
        var els = $slides.get();
        if (els.length < 2) {
            window.console && console.log('terminating; too few slides: ' + els.length);
            return; // don't bother
        }

        // support metadata plugin (v1.0 and v2.0)
        var opts = $.extend({}, $.fn.cycle.defaults, options || {}, $.metadata ? $cont.metadata() : $.meta ? $cont.data() : {});
		var meta = $.isFunction($cont.data) ? $cont.data(opts.metaAttr) : null;
		if (meta)
			opts = $.extend(opts, meta);
            
        opts.before = opts.before ? [opts.before] : [];
        opts.after = opts.after ? [opts.after] : [];
        opts.after.unshift(function(){ opts.busy=0; });
            
        // allow shorthand overrides of width, height and timeout
        var cls = this.className;
        opts.width = parseInt((cls.match(/w:(\d+)/)||[])[1]) || opts.width;
        opts.height = parseInt((cls.match(/h:(\d+)/)||[])[1]) || opts.height;
        opts.timeout = parseInt((cls.match(/t:(\d+)/)||[])[1]) || opts.timeout;

        if ($cont.css('position') == 'static') 
            $cont.css('position', 'relative');
        if (opts.width) 
            $cont.width(opts.width);
        if (opts.height && opts.height != 'auto') 
            $cont.height(opts.height);

        var first = 0;
        $slides.css({position: 'absolute', top:0, left:0}).each(function(i) { 
            $(this).css('z-index', els.length-i) 
        });
        
        $(els[first]).css('opacity',1).show(); // opacity bit needed to handle reinit case
        if ($.browser.msie) els[first].style.removeAttribute('filter');

        if (opts.fit && opts.width) 
            $slides.width(opts.width);
        if (opts.fit && opts.height && opts.height != 'auto') 
            $slides.height(opts.height);
        if (opts.pause) 
            $cont.hover(function(){this.cyclePause=1;}, function(){this.cyclePause=0;});

        var txFn = $.fn.cycle.transitions[opts.fx];
		txFn && txFn($cont, $slides, opts);
        
        $slides.each(function() {
            var $el = $(this);
            this.cycleH = (opts.fit && opts.height) ? opts.height : $el.height();
            this.cycleW = (opts.fit && opts.width) ? opts.width : $el.width();
        });

        if (opts.cssFirst)
            $($slides[first]).css(opts.cssFirst);

        if (opts.timeout) {
            // ensure that timeout and speed settings are sane
            if (opts.speed.constructor == String)
                opts.speed = {slow: 600, fast: 200}[opts.speed] || 400;
            if (!opts.sync)
                opts.speed = opts.speed / 2;
            while((opts.timeout - opts.speed) < 250)
                opts.timeout += opts.speed;
        }
        opts.speedIn = opts.speed;
        opts.speedOut = opts.speed;

 		opts.slideCount = els.length;
        opts.currSlide = first;
        opts.nextSlide = 1;

        // fire artificial events
        var e0 = $slides[first];
        if (opts.before.length)
            opts.before[0].apply(e0, [e0, e0, opts, true]);
        if (opts.after.length > 1)
            opts.after[1].apply(e0, [e0, e0, opts, true]);
        
        if (opts.click && !opts.next)
            opts.next = opts.click;
        if (opts.next)
            $(opts.next).bind('click', function(){return advance(els,opts,opts.rev?-1:1)});
        if (opts.prev)
            $(opts.prev).bind('click', function(){return advance(els,opts,opts.rev?1:-1)});

        if (opts.timeout)
            this.cycleTimeout = setTimeout(function() {
                go(els,opts,0,!opts.rev)
            }, opts.timeout + (opts.delay||0));
    });
};

function go(els, opts, manual, fwd) {
    if (opts.busy) return;
	
	$(".testimonials").animate({height:$(els[opts.nextSlide]).height()},'fast');
	
    var p = els[0].parentNode, curr = els[opts.currSlide], next = els[opts.nextSlide];
    if (p.cycleTimeout === 0 && !manual) 
        return;
    
	
   
    if (manual || !p.cyclePause) {
        if (opts.before.length)
            $.each(opts.before, function(i,o) { o.apply(next, [curr, next, opts, fwd]); });
        var after = function() {
            if ($.browser.msie)
                this.style.removeAttribute('filter');
            $.each(opts.after, function(i,o) { o.apply(next, [curr, next, opts, fwd]); });
        };

        if (opts.nextSlide != opts.currSlide) {
            opts.busy = 1;
            $.fn.cycle.custom(curr, next, opts, after);
        }
        var roll = (opts.nextSlide + 1) == els.length;
        opts.nextSlide = roll ? 0 : opts.nextSlide+1;
        opts.currSlide = roll ? els.length-1 : opts.nextSlide-1;
    }
    if (opts.timeout)
        p.cycleTimeout = setTimeout(function() { go(els,opts,0,!opts.rev) }, opts.timeout);
};

// advance slide forward or back
function advance(els, opts, val) {
    var p = els[0].parentNode, timeout = p.cycleTimeout;
    if (timeout) {
        clearTimeout(timeout);
        p.cycleTimeout = 0;
    }
    opts.nextSlide = opts.currSlide + val;
    if (opts.nextSlide < 0) {
        opts.nextSlide = els.length - 1;
    }
    else if (opts.nextSlide >= els.length) {
        opts.nextSlide = 0;
    }
    go(els, opts, 1, val>=0);
    return false;
};

$.fn.cycle.custom = function(curr, next, opts, cb) {
    var $l = $(curr), $n = $(next);
    $n.css(opts.cssBefore);
    var fn = function() {$n.animate(opts.animIn, opts.speedIn, opts.easeIn, cb)};
    $l.animate(opts.animOut, opts.speedOut, opts.easeOut, function() {
        $l.css(opts.cssAfter);
        if (!opts.sync) fn();
    });
    if (opts.sync) fn();
};

$.fn.cycle.transitions = {
    fade: function($cont, $slides, opts) {
		$slides.not(':eq(0)').hide();
		opts.cssBefore = { opacity: 0, display: 'block' };
		opts.cssAfter  = { display: 'none' };
		opts.animOut = { opacity: 0 };
		opts.animIn = { opacity: 1 };
    },
    fadeout: function($cont, $slides, opts) {
		opts.before.push(function(curr,next,opts,fwd) {
			$(curr).css('zIndex',opts.slideCount + (fwd === true ? 1 : 0));
			$(next).css('zIndex',opts.slideCount + (fwd === true ? 0 : 1));
		});
		$slides.not(':eq(0)').hide();
		opts.cssBefore = { opacity: 1, display: 'block', zIndex: 1 };
		opts.cssAfter  = { display: 'none', zIndex: 0 };
		opts.animOut = { opacity: 0 };
    }
};

$.fn.cycle.ver = function() { return ver; };

// @see: http://malsup.com/jquery/cycle/lite/
$.fn.cycle.defaults = {
	animIn:        {},
	animOut:       {},
	fx:           'fade',
    after:         null, 
    before:        null, 
	cssBefore:     {},
	cssAfter:      {},
    delay:         0,    
    fit:           0,    
    height:       'auto',
	metaAttr:     'cycle',
    next:          null, 
    pause:         0,    
    prev:          null, 
    speed:         1000, 
    slideExpr:     null,
    sync:          1,    
    timeout:       4000 
};

})(jQuery);