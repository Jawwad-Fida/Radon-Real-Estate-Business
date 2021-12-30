/*----------------------------------
    //------ SLICK CAROUSEL ------//
-----------------------------------*/
	$('.slick-lancers').slick({
		infinite: false,
		slidesToShow: 3,
		slidesToScroll: 1,
		dots: true,
		arrows: false,
		adaptiveHeight: true,
		responsive: [
		    {
		      breakpoint: 1024,
		      settings: {
                slidesToShow: 2,
		        slidesToScroll: 2,
		        dots: true,
		    	arrows: false
		      }
		    },
		    {
		      breakpoint: 993,
		      settings: {
		        slidesToShow: 2,
		        slidesToScroll: 2,
		        dots: true,
		    	arrows: false
		      }
		    },
		    {
		      breakpoint: 769,
		      settings: {
		        slidesToShow: 1,
		        slidesToScroll: 1,
		        dots: true,
		   		arrows: false
		      }
		    }
	  ]
	});