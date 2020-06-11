//<!-- Navigation scroll-->
	$("document").ready(function($){
		// Create a clone of the nav_top, right next to original.
		//$('.nav_top').addClass('original').clone().insertAfter('.nav_top').addClass('cloned').css('position','fixed').css('top','0').css('margin-top','0').css('z-index','500').removeClass('original').hide();
		//scrollIntervalID = setInterval(stickIt, 10);

		//function stickIt() {
		//	var orgElementPos = $('.original').offset();
		//	orgElementTop = orgElementPos.top;
		//	if ($(window).scrollTop() >= (orgElementTop)) {
		//		// scrolled past the original position; now only show the cloned, sticky element.
		//		// Cloned element should always have same left position and width as original element.
		//		orgElement = $('.original');
		//		coordsOrgElement = orgElement.offset();
		//		leftOrgElement = coordsOrgElement.left;
		//		widthOrgElement = orgElement.css('width');
		//		$('.cloned').css('left',leftOrgElement+'px').css('top',0).css('width',widthOrgElement).show();
		//		$('.original').css('visibility','hidden');
		//	} else {
		//		// not scrolled past the nav_top; only show the original nav_top.
		//		$('.cloned').hide();
		//		$('.original').css('visibility','visible');
		//	}
		//}
	});
//<!-- go to top -->

$(function() {
	var showFlag = false;
	var topBtn = $('#top_gototop');
	topBtn.css('bottom', '-100px');
	var showFlag = false;
	$(window).scroll(function () {
		if ($(this).scrollTop() > 100) {
			if (showFlag == false) {
				showFlag = true;
				topBtn.stop().animate({'bottom' : '55px'}, 300);
			}
		} else {
			if (showFlag) {
				showFlag = false;
				topBtn.stop().animate({'bottom' : '-100px'}, 300);
			}
		}
	});
	topBtn.click(function () {
		$('body,html').animate({
			scrollTop: 0
		}, 500);
		return false;
	});
});

// Menu mobile
	$(function() {
		$('#menu').mmenu();
	});

// Slide chan trang
$(window).load(function() {
	$("#flexiselDemo3").flexisel({
		visibleItems: 5,
		animationSpeed: 1000,
		autoPlay: true,
		autoPlaySpeed: 3000,
		pauseOnHover: true,
		enableResponsiveBreakpoints: true,
		responsiveBreakpoints: {
			portrait: {
				changePoint:480,
				visibleItems: 2
			},
			landscape: {
				changePoint:640,
				visibleItems: 3
			},
			tablet: {
				changePoint:768,
				visibleItems: 4
			}
		}
	});
});
// Slide chan trang
$(window).load(function() {
	$("#flexiselDemo2").flexisel({
		visibleItems: 4,
		animationSpeed: 1000,
		autoPlay: true,
		autoPlaySpeed: 5000,
		pauseOnHover: true,
		enableResponsiveBreakpoints: true,
		responsiveBreakpoints: {
			portrait: {
				changePoint:480,
				visibleItems: 2
			},
			landscape: {
				changePoint:640,
				visibleItems: 3
			},
			tablet: {
				changePoint:768,
				visibleItems: 3
			}
		}
	});
});


$(".click").click(function(){
	$(".click").hide();
	$(".tool_phu .date").hide();
	$(".submit_m").fadeIn();
	$(".text_m").fadeIn("slow");
});

$(".block_mobile .click").bind('click', function(){
	$(".block_mobile .date").hide();
	$(".block_mobile .search_m").animate({width: "80%"});
});


// maxheight
$(function(){
		$('.maxheight').matchHeight();
		$('.maxheight02').matchHeight();
		$('.maxheight03').matchHeight();								
		$('.maxheight04').matchHeight();				
		$('.maxheight05').matchHeight();				
		$('.maxheight06').matchHeight();				
		$('.maxheight07').matchHeight();				
		$('.maxheight08').matchHeight();				
	});