/*----------------------------------
    //------ SLICK CAROUSEL ------//
-----------------------------------*/
	$('.slick-lancers').slick({
		infinite: false,
		slidesToShow: 5,
		slidesToScroll: 1,
		dots: true,
		arrows: false,
		adaptiveHeight: true,
		responsive: [
		    {
		      breakpoint: 1292,
		      settings: {
                slidesToShow: 3,
		        slidesToScroll: 3,
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