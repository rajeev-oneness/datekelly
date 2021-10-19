(function ($, window, Typist) {
    
	/*---------owl-carousel------------*/
	
	
  $('.premium-pic').owlCarousel({
		loop:true,
		margin:5,
		//autoplay:true,
		autoplayTimeout: 5000,
		//autoplayHoverPause: true,
		navText: ["<i class='fas fa-chevron-left'></i>", "<i class='fas fa-chevron-right'></i>"],
		responsiveClass: true,
		smartSpeed: 2500,
		responsive:{
			0:{
				items:2,
				nav:true,
				loop:true
			},
			600:{
				items:3,
				nav:true,
				loop:true
			},
			1000:{
				items:5,
				nav:true,
				loop:true
			}
		}
	});
	
  
	/*-------tooltip---------*/
	
	$(function () {
	  $('[data-toggle="tooltip"]').tooltip()
	});
	
	
	/*-------------headder_fixed-------------*/
	
	
		// $(window).scroll(function(){  
		//    if ($(this).scrollTop() > 190) {
		// 	  $('#navbar_top').addClass("fixed-top");
		// 	  // add padding top to show content behind navbar
		// 	  $('body').css('padding-top', $('.navbar').outerHeight() + 'px');
		// 	}else{
		// 	  $('#navbar_top').removeClass("fixed-top");
		// 	   // remove padding top from body
		// 	  $('body').css('padding-top', '0');
		// 	}   
		// });
	
/*--------------ASO.JS---------------*/
	
AOS.init();
		
//refresh animations
 
$(window).on('load', function() {
	AOS.refresh();
});



/*-----------thubble-slider--------*/

$('.banner-pic').owlCarousel({
	loop:true,
	margin:0,
	autoplay:true,
	autoplayTimeout: 5000,
	//autoplayHoverPause: true,
	//navText: ["<i class='fas fa-chevron-left'></i>", "<i class='fas fa-chevron-right'></i>"],
	responsiveClass: true,
	URLhashListener:true,
	startPosition: 'URLHash',
	smartSpeed: 2500,
	responsive:{
		0:{
			items:1,
			nav:false,
			loop:false
		},
		600:{
			items:2,
			nav:false,
			loop:false
		},
		1000:{
			items:4,
			nav:false,
			loop:false
		}
	}
});

/*----------custom-file----------*/

const realFileBtn = document.getElementById("real-file");
const customBtn = document.getElementById("custom-button");
const customTxt = document.getElementById("custom-text");

customBtn.addEventListener("click", function() {
  realFileBtn.click();
});

realFileBtn.addEventListener("change", function() {
  if (realFileBtn.value) {
    customTxt.innerHTML = realFileBtn.value.match(
      /[\/\\]([\w\d\s\.\-\(\)]+)$/
    )[1];
  } else {
    customTxt.innerHTML = "No file chosen, yet.";
  }
});
	
})(jQuery, window);