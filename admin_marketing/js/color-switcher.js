	jQuery(document).ready(function($) {
	
		  jQuery("#blue" ).click(function(){
			  jQuery("#color" ).attr("href", "css/colors/blue.css");
			  jQuery(".img-1 img" ).attr("src", "css/colors/icons/blue/1.png");
              jQuery(".img-2 img" ).attr("src", "css/colors/icons/blue/2.png");
			  jQuery(".img-3 img" ).attr("src", "css/colors/icons/blue/3.png");
			  jQuery(".img-4 img" ).attr("src", "css/colors/icons/blue/4.png");
			  return false;
		  });
		  
		  jQuery("#pink" ).click(function(){
			  jQuery("#color" ).attr("href", "css/colors/pink.css");
			  jQuery(".img-1 img" ).attr("src", "css/colors/icons/pink/1.png");
              jQuery(".img-2 img" ).attr("src", "css/colors/icons/pink/2.png");
			  jQuery(".img-3 img" ).attr("src", "css/colors/icons/pink/3.png");
			  jQuery(".img-4 img" ).attr("src", "css/colors/icons/pink/4.png");
			  return false;
		  });
		  
		  jQuery("#orange" ).click(function(){
			  jQuery("#color" ).attr("href", "css/colors/orange.css");
			  jQuery(".img-1 img" ).attr("src", "css/colors/icons/orange/1.png");
              jQuery(".img-2 img" ).attr("src", "css/colors/icons/orange/2.png");
			  jQuery(".img-3 img" ).attr("src", "css/colors/icons/orange/3.png");
			  jQuery(".img-4 img" ).attr("src", "css/colors/icons/orange/4.png");
			  return false;
		  });
        
            jQuery("#purple" ).click(function(){
			  jQuery("#color" ).attr("href", "css/colors/purple.css");
			  jQuery(".img-1 img" ).attr("src", "css/colors/icons/purple/1.png");
              jQuery(".img-2 img" ).attr("src", "css/colors/icons/purple/2.png");
			  jQuery(".img-3 img" ).attr("src", "css/colors/icons/purple/3.png");
			  jQuery(".img-4 img" ).attr("src", "css/colors/icons/purple/4.png");
			  return false;
		  });
		  
		  
		  jQuery("#green" ).click(function(){
			  jQuery("#color" ).attr("href", "css/colors/green.css");
			  jQuery(".img-1 img" ).attr("src", "css/colors/icons/green/1.png");
              jQuery(".img-2 img" ).attr("src", "css/colors/icons/green/2.png");
			  jQuery(".img-3 img" ).attr("src", "css/colors/icons/green/3.png");
			  jQuery(".img-4 img" ).attr("src", "css/colors/icons/green/4.png");
			  return false;
		  });
        
          jQuery("#red" ).click(function(){
			  jQuery("#color" ).attr("href", "css/colors/red.css");
			  jQuery(".img-1 img" ).attr("src", "css/colors/icons/red/1.png");
              jQuery(".img-2 img" ).attr("src", "css/colors/icons/red/2.png");
			  jQuery(".img-3 img" ).attr("src", "css/colors/icons/red/3.png");
			  jQuery(".img-4 img" ).attr("src", "css/colors/icons/red/4.png");
			  return false;
		  });
        
          jQuery("#cyan" ).click(function(){
			  jQuery("#color" ).attr("href", "css/colors/cyan.css");
			  jQuery(".img-1 img" ).attr("src", "css/colors/icons/cyan/1.png");
              jQuery(".img-2 img" ).attr("src", "css/colors/icons/cyan/2.png");
			  jQuery(".img-3 img" ).attr("src", "css/colors/icons/cyan/3.png");
			  jQuery(".img-4 img" ).attr("src", "css/colors/icons/cyan/4.png");
			  return false;
		  });
        
          jQuery("#sky-blue" ).click(function(){
			  jQuery("#color" ).attr("href", "css/colors/sky-blue.css");
			  jQuery(".img-1 img" ).attr("src", "css/colors/icons/sky-blue/1.png");
              jQuery(".img-2 img" ).attr("src", "css/colors/icons/sky-blue/2.png");
			  jQuery(".img-3 img" ).attr("src", "css/colors/icons/sky-blue/3.png");
			  jQuery(".img-4 img" ).attr("src", "css/colors/icons/sky-blue/4.png");
			  return false;
		  });
        
          jQuery("#gray" ).click(function(){
			  jQuery("#color" ).attr("href", "css/colors/gray.css");
			  jQuery(".img-1 img" ).attr("src", "css/colors/icons/gray/1.png");
              jQuery(".img-2 img" ).attr("src", "css/colors/icons/gray/2.png");
			  jQuery(".img-3 img" ).attr("src", "css/colors/icons/gray/3.png");
			  jQuery(".img-4 img" ).attr("src", "css/colors/icons/gray/4.png");
			  return false;
		  });
		  
		  jQuery("#brown" ).click(function(){
			  jQuery("#color" ).attr("href", "css/colors/brown.css");
			  jQuery(".img-1 img" ).attr("src", "css/colors/icons/brown/1.png");
              jQuery(".img-2 img" ).attr("src", "css/colors/icons/brown/2.png");
			  jQuery(".img-3 img" ).attr("src", "css/colors/icons/brown/3.png");
			  jQuery(".img-4 img" ).attr("src", "css/colors/icons/brown/4.png");
			  return false;
		  });		  
		  
		  //add backgrounds
		  jQuery("#bg-one" ).click(function(){
			  jQuery("body" ).addClass("bg1");
			  jQuery("body" ).removeClass("bg2");
			  jQuery("body" ).removeClass("bg3");
			  jQuery("body" ).removeClass("bg4");
			  jQuery("body" ).removeClass("bg5");
			  jQuery("body" ).removeClass("bg6");
			  jQuery("body" ).removeClass("bg7");
			  jQuery("body" ).removeClass("bg8");
			  jQuery("body" ).removeClass("bg9");
			  jQuery("body" ).removeClass("bg10");
		  });
		  
		  jQuery("#bg-two" ).click(function(){
			  jQuery("body" ).removeClass("bg1");
			  jQuery("body" ).addClass("bg2");
			  jQuery("body" ).removeClass("bg3");
			  jQuery("body" ).removeClass("bg4");
			  jQuery("body" ).removeClass("bg5");
			  jQuery("body" ).removeClass("bg6");
			  jQuery("body" ).removeClass("bg7");
			  jQuery("body" ).removeClass("bg8");
			  jQuery("body" ).removeClass("bg9");
			  jQuery("body" ).removeClass("bg10");
		  });
		  
		  jQuery("#bg-three" ).click(function(){
			  jQuery("body" ).removeClass("bg1");
			  jQuery("body" ).removeClass("bg2");
			  jQuery("body" ).addClass("bg3");
			  jQuery("body" ).removeClass("bg4");
			  jQuery("body" ).removeClass("bg5");
			  jQuery("body" ).removeClass("bg6");
			  jQuery("body" ).removeClass("bg7");
			  jQuery("body" ).removeClass("bg8");
			  jQuery("body" ).removeClass("bg9");
			  jQuery("body" ).removeClass("bg10");
		  });
		  
		  jQuery("#bg-four" ).click(function(){
			  jQuery("body" ).removeClass("bg1");
			  jQuery("body" ).removeClass("bg2");
			  jQuery("body" ).removeClass("bg3");
			  jQuery("body" ).addClass("bg4");
			  jQuery("body" ).removeClass("bg5");
			  jQuery("body" ).removeClass("bg6");
			  jQuery("body" ).removeClass("bg7");
			  jQuery("body" ).removeClass("bg8");
			  jQuery("body" ).removeClass("bg9");
			  jQuery("body" ).removeClass("bg10");
		  });
		  
		  jQuery("#bg-five" ).click(function(){
			  jQuery("body" ).removeClass("bg1");
			  jQuery("body" ).removeClass("bg2");
			  jQuery("body" ).removeClass("bg3");
			  jQuery("body" ).removeClass("bg4");
			  jQuery("body" ).addClass("bg5");
			  jQuery("body" ).removeClass("bg6");
			  jQuery("body" ).removeClass("bg7");
			  jQuery("body" ).removeClass("bg8");
			  jQuery("body" ).removeClass("bg9");
			  jQuery("body" ).removeClass("bg10");
		  });
		  
		  jQuery("#bg-six" ).click(function(){
			  jQuery("body" ).removeClass("bg1");
			  jQuery("body" ).removeClass("bg2");
			  jQuery("body" ).removeClass("bg3");
			  jQuery("body" ).removeClass("bg4");
			  jQuery("body" ).removeClass("bg5");
			  jQuery("body" ).addClass("bg6");
			  jQuery("body" ).removeClass("bg7");
			  jQuery("body" ).removeClass("bg8");
			  jQuery("body" ).removeClass("bg9");
			  jQuery("body" ).removeClass("bg10");
		  });
		  
		  jQuery("#bg-seven" ).click(function(){
			  jQuery("body" ).removeClass("bg1");
			  jQuery("body" ).removeClass("bg2");
			  jQuery("body" ).removeClass("bg3");
			  jQuery("body" ).removeClass("bg4");
			  jQuery("body" ).removeClass("bg5");
			  jQuery("body" ).removeClass("bg6");
			  jQuery("body" ).addClass("bg7");
			  jQuery("body" ).removeClass("bg8");
			  jQuery("body" ).removeClass("bg9");
			  jQuery("body" ).removeClass("bg10");
		  });
		  
		  jQuery("#bg-eight" ).click(function(){
			  jQuery("body" ).removeClass("bg1");
			  jQuery("body" ).removeClass("bg2");
			  jQuery("body" ).removeClass("bg3");
			  jQuery("body" ).removeClass("bg4");
			  jQuery("body" ).removeClass("bg5");
			  jQuery("body" ).removeClass("bg6");
			  jQuery("body" ).removeClass("bg7");
			  jQuery("body" ).addClass("bg8");
			  jQuery("body" ).removeClass("bg9");
			  jQuery("body" ).removeClass("bg10");
		  });
		  
		  jQuery("#bg-nine" ).click(function(){
			  jQuery("body" ).removeClass("bg1");
			  jQuery("body" ).removeClass("bg2");
			  jQuery("body" ).removeClass("bg3");
			  jQuery("body" ).removeClass("bg4");
			  jQuery("body" ).removeClass("bg5");
			  jQuery("body" ).removeClass("bg6");
			  jQuery("body" ).removeClass("bg7");
			  jQuery("body" ).removeClass("bg8");
			  jQuery("body" ).addClass("bg9");
			  jQuery("body" ).removeClass("bg10");
		  });
		  
		  jQuery("#bg-ten" ).click(function(){
			  jQuery("body" ).removeClass("bg1");
			  jQuery("body" ).removeClass("bg2");
			  jQuery("body" ).removeClass("bg3");
			  jQuery("body" ).removeClass("bg4");
			  jQuery("body" ).removeClass("bg5");
			  jQuery("body" ).removeClass("bg6");
			  jQuery("body" ).removeClass("bg7");
			  jQuery("body" ).removeClass("bg8");
			  jQuery("body" ).removeClass("bg9");
			  jQuery("body" ).addClass("bg10");
		  });
		  jQuery("#bg-one, #bg-two, #bg-three, #bg-four, #bg-five, #bg-six, #bg-seven, #bg-eight, #bg-nine, #bg-ten").click(function(){
			  jQuery("#wrapper").addClass("boxed-layout");
		  });
		  jQuery("#wide").click(function(){
			  jQuery("body").removeClass("bg1 bg2 bg3 bg4 bg5 bg6 bg7 bg8 bg9 bg10");
		  });
		  
		  
		  jQuery("#light").click(function(){
			  	jQuery("#footer").addClass("light");
				jQuery("#footer").removeClass("dark");
				jQuery("#footer img" ).attr("src", "images/footer-logo.jpg");
		   });
		   jQuery("#dark").click(function(){
			  	jQuery("#footer").addClass("dark");
				jQuery("#footer").removeClass("light");
				jQuery("#footer img" ).attr("src", "images/footer-logo-dark.jpg");
		   });
		   
		   jQuery("#header-n").click(function(){
			  	jQuery("body").removeClass("fixed-header");
		   });
		   jQuery("#header-f").click(function(){
				jQuery("body").addClass("fixed-header");
		   });
		  
		  
		  
		  // picker buttton
		  jQuery(".picker_close").click(function(){
			  
			  	jQuery("#choose_color").toggleClass("position");
			  
		   });
		   
		   //header
			
			//stickey header
			jQuery(window).scroll(function() {    
				var scroll = jQuery(window).scrollTop();	
				if (scroll >= 40) {
					jQuery(".fixed-header").addClass("small-header");
				}
				else {
					jQuery(".fixed-header").removeClass("small-header");
				}
			});
		   
		  
		  
	});