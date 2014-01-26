// JavaScript Document
jQuery(function($){
	
$.fn.featureslider = function(options){
	
/* ================================================================================================ */
/* ======================================== Plugin Options ======================================== */
/* ================================================================================================ */	
	var defaults = {
		              time:4000,
					  width:600,
					  height:400,
					  effect:'none',
					  autoplay:false,
					  listControls:true,
					  callback:function(){   } 
					  
					  
					};
	
	
	var options = $.extend(defaults, options);
/* ================================================================================================ */
/* ==================================== Variables & Precaching ==================================== */
/* ================================================================================================ */	
	
	return this.each(function()
		{	
			var root = $(this).addClass('mainslider');
		root.wrap('<div class="stagableSlider" />');	
		var parent = root.parent();
		var li = root.find("li").hide();
	    var images = li.find("img");
		var timer,image_timer,wait,index,src,parent,im,override=false,in_animation = false,controls,root_parent;
	    var current = li.eq(1).toggleClass('active'),prev = li.first().addClass("reset").show();
		var bool = true,first_bool = true;
	li.find('div.description').show();
		root.css({
			width: root.width(),
			height: root.height()
			});	
			
		parent.css({
			width: root.width(),
			height: root.height()
			});	
		
		if(root.find('.controls').length>0)
		{
			if(root.find('.controls').val()=="true")
			{
				options.listControls=true;
				options.arrowControls=true;
			}
			else
			{
				options.listControls=false;
				options.arrowControls=false;
			}
		}
		
		if(root.find('.autoplay').length>0)
		{
			if(root.find('.autoplay').val()=="true")
				options.autoplay=true;
			else
				options.autoplay=false;
			
		}
		
		if(root.find('.interval').length>0)
		{
			
				options.time=root.find('.interval').val();
		}
		
		root.find('input').remove();
			
		li.first().css("display","block");
		type= "img";
		current.hide();	
	
		if(options.listControls==true)
	    appendControls();
	    if(options.arrowControls==true)
		appendarrowControls()		
/* ================================================================================================ */
/* ======================================== Switcher Module ======================================= */
/* ================================================================================================ */			
		function switcher()
			{
				li.hide();
				prev = (current.prev().length>0) ? current.prev() : li.last();
				prev.removeClass("reset");
				current.toggleClass("active reset");
				current = (current.next().length>0) ? current.next() : li.first();
								 
				current.hide();
				current.addClass("active");
			}



/* ================================================================================================ */
/* ================================= Effects Switching & Ending =================================== */
/* ================================================================================================ */		
	
function endeffect(image)
	{
     
		clearInterval(timer);
		in_animation = false;
		if(override==false) // Return if manually triggered
		image_timer = setTimeout(function() { ;    switcher(); effects();  },(options.time)); 
						
	};
	function effects()
	{
		 if(li.is(":animated"))
		 return;
		 
		   if(options.listControls==true)
			   {
			   controls.removeClass("control_active");
			   controls.eq(current.index()).addClass("control_active");
			   }
		  
		if(bool==true)
		 {
			li.first().hide();
			bool=false;
		     first_bool = false;
		 } 
		
		 switch(0)
		 {
		 case 0:
		 
		 $(current).fadeIn("slow",function(){
			
			 endeffect($(this));
			  
			 });break;
		
		 }
	}

/* ================================================================================================ */
/* ======================================== Control Options ======================================= */
/* ================================================================================================ */	

	
		 function appendControls()
	 {
		var str = "<ul class='controls'>";
		for(var i=0;i<li.length;i++)
		str = str + "<li>"+(i+1)+"</li>";
		str = str+"</ul>";
		
		 root.after(str);
		 
		 controls = parent.find(".controls li");
		controls.first().addClass("control_active");
		controls.parent().css("left",  980/2 + 20 +  controls.parent().width()/2  )
		
		controls.bind({
		click:function(){ setImage($(this).index()); 	},
		mouseover:function(){ $(this).toggleClass("control_hover"); },
		mouseout:function(){ $(this).toggleClass("control_hover"); }
		  });
		 
		
	 }

/* ================================================================================================ */
/* ======================================== Image Settings ======================================== */
/* ================================================================================================ */	
	 
    function setImage(index)
	{  
	
     	if(first_bool==true)
	    {
			 if(in_animation==true||current.index()-1==index)
		return;
		}
		else
	  if(in_animation==true||current.index()==index)
		return;
		
		li.removeClass("reset active");
		current.hide();	
		clearTimeout(image_timer); // Manual Override...
		
		if(first_bool==true)
		li.first().addClass("reset");
		
		current.addClass("reset");
		prev = current;
		current = li.eq(index).addClass("active");
		current.hide();
		override = true;
		effects();
	
	}
		
			
			if(options.autoplay==true)
			 image_timer = setTimeout(function() {   effects();  },options.time);  // Starting the Slideshow
			
		});
	
	


};


 
});
	
