var propertyList,
	featTitles,
	featURL, 
    featThumbs    

jQuery(document).ready(function($) {

for(i = 0; i < featTitles.length; i++){
    //console.log(featTitles[i]);
    //console.log(featURL[i]);
    //console.log(featThumbs[i]);
}

$(".animsition").animsition({

inClass               :   'fade-in-up-sm',
outClass              :   'fade',
inDuration            :    1150,
outDuration           :    800,
linkElement           :   '.animsition-link',
// e.g. linkElement   :   'a:not([target="_blank"]):not([href^=#])'
loading               :    true,
loadingParentElement  :   'body', //animsition wrapper element
loadingClass          :   'animsition-loading',
unSupportCss          : [ 'animation-duration',
                          '-webkit-animation-duration',
                          '-o-animation-duration'
                        ],
//"unSupportCss" option allows you to disable the "animsition" in case the css property in the array is not supported by your browser.
//The default setting is to disable the "animsition" in a browser that does not support "animation-duration".

overlay               :   false,

overlayClass          :   'animsition-overlay-slide',
overlayParentElement  :   'body'
});

// Check for Mobile Device
window.isMobile = {Android: function() {return navigator.userAgent.match(/Android/i);},BlackBerry: function() {return navigator.userAgent.match(/BlackBerry/i);},iOS: function() { return navigator.userAgent.match(/iPhone|iPad|iPod/i);},Opera: function() {return navigator.userAgent.match(/Opera Mini/i);},Windows: function() { return navigator.userAgent.match(/IEMobile/i);},any: function() {return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());}};

    
$(window).load(function(){		
	var $win = $(window); //this = window
	if(window.isMobile.any() || $win.width() <= 961){ 		
		//console.log('windowLOAD: is MOBILE || <=961');
		
		if(window.innerWidth >= 1024){
			$('#contactPage').append($('.lowerBlack'));	
		}else{	
			$('body').append($('.lowerBlack'));	
		}
		
		$('body').addClass('mobile');
								
		var waypoint = new Waypoint({
			element: document.getElementById('headline'),
			handler: function(direction) {
				$('.scrollPrompt').fadeToggle();
			}
		})
	}else{		
		$('#contactPage').append($('.lowerBlack'));			
	}
});
    
$('#mobileInfo').on('click', function(){
	$('.right.drawer').fadeIn();
	$('body').toggleClass('infoBtn');
	$('body').toggleClass('menuBtn');
	$('#nav-icon4').toggleClass('active');
	
});

$('.right.centered').on('click', function(){
var openDrawer = $('.right.drawer').hasClass('open');	

if(!openDrawer){
	$('.right.drawer .centered').delay(300).queue(function(){
		$(this).fadeToggle('slow').dequeue();
	});
	$('.right.drawer').toggleClass('open');
}else{		
	$('.right.drawer').delay(300).queue(function(){
		$(this).toggleClass('open').dequeue();
	});
	$('.right.drawer .centered').fadeToggle('fast');	
}
});

$('#fullpage > div').on('click', function(){
	var openDrawer = $('.right.drawer').hasClass('open');	

	if(openDrawer && $('body').is('.single')){
		$('.right.drawer').delay(300).queue(function(){
			$(this).toggleClass('open').dequeue();
		});
		$('.right.drawer .centered').fadeToggle('fast');	
	}
});

$(document).on('click', '.section header', function(){
    $.fn.fullpage.moveSectionUp();
});
    
$(document).on('click', '.section footer', function(){
    $.fn.fullpage.moveSectionDown();
});

$(window).resize(function() {
	//console.log('resize');
	var $win = $(window); //this = window
	if($win.width() >= 960){
		$('body').removeClass('menuBtn');	
		$('body').removeClass('mobile');
		$('#mobileMenu').fadeOut();  			
		$('#mobileInfo').fadeOut();  			
	}
	
	if(window.isMobile.any() || $win.width() <= 961){ 	
		$('body').append($('.lowerBlack'));	
		$('body').addClass('mobile');	
	}else{
		$('#contactPage').append($('.lowerBlack'));	
	}
});



/* Crossfade */
$(function(){
    $('.fadein div:gt(0)').hide();
    setInterval(function(){
      $('.fadein :first-child').fadeOut(1500)
         .next('div').fadeIn(1500)
         .end().appendTo('.fadein');}, 
      6000);
});

/* BTN Hover Fade */
$(".svg-wrapper svg").mouseenter(function() {
	//$( ".fp-tableCell" ).toggleClass('active');	
	$(this).closest('.fp-tableCell').addClass('active');
});
$(".svg-wrapper svg").mouseleave(function() {
	//$( ".fp-tableCell" ).toggleClass('active');	
	$(this).closest('.fp-tableCell').removeClass('active');
});


$('#menu').on('click', function(){			
	if($('body').is('.developments')){
		//console.log('DEVELOPMENTS!');
	}
	
	$('#menu').toggleClass("active");
	$('#nav-icon4').toggleClass("active");
	$('#menu').removeClass("scrolled");
	$('body').toggleClass("menuBtn");	
	

	var $win = $(window);; //this = window	
	if(window.isMobile.any() || $win.width() <= 961){ 	
		//console.log('small!');
		var activeInfo = $('body').hasClass('infoBtn');	
		
		if(activeInfo){		
			$('body').removeClass('infoBtn');
			$('#menu').removeClass("active");
			$('.right.drawer').fadeOut();
		}else{	
 			//console.log('small screen ELSE');
			$('body').toggleClass('menuBtn');				
			$('#mobileMenu').fadeToggle();  				
		}
  		return false; 
	}	
		
	
	var activeMenu = $('body').hasClass('menuBtn');
	
	if(activeMenu){						
		if($('body').is('.about, .contact, .legal, .developments') != true){
		if($('#fullpage')){$.fn.fullpage.setAllowScrolling(false);}
		}
		$('.propertyMenu').fadeToggle();  
		$('.left.centered').fadeToggle();
		$('.right.centered').fadeToggle();		
		$('.section header').fadeToggle();
		$('.section footer').fadeToggle();		
	}else{ 		
		if($('body').is('.about, .contact, .legal, .developments') != true){
		if($('#fullpage')){$.fn.fullpage.setAllowScrolling(true);}
		}		
		// For Mobile?? 		
		// $('#innerWrap ').toggleClass("active");
		$('.propertyMenu').fadeToggle();
		$('.left.centered').fadeToggle();
		$('.right.centered').fadeToggle();
		$('.section header').fadeToggle();
		$('.section footer').fadeToggle();
	}
	
	var mySwiper = new Swiper ('.swiper-container', {
	// Optional parameters
	direction: 'horizontal',
	loop: true,
	grabCursor: false,
	centeredSlides	:true,
	
	spaceBetween: '5%',
	slidesPerView: 'auto',
	
	// If we need pagination
	pagination: '.swiper-pagination',
	paginationClickable: true,
	paginationBulletRender: function (index, className) {
	var properties = ["299 Valencia","Blanc", "870 Harrison","Fifteen Fifteen"];
	return '<div class="'+className+'"><span>' + (featTitles[index]) + '</span><footer><div class="v__linepropBG"><div class="v__propline"></div></div></footer></div>';
	}, 
	
	
	// Navigation arrows
	nextButton: '.swiper-button-next',
	prevButton: '.swiper-button-prev',
	keyboardControl: true,
	mousewheelControl: true,
	
	// And if we need scrollbar
	slideToClickedSlide	: true
	});
	
	$('.swiper-slide a').on('click', function(e){
	if(mySwiper.animating){
		return false;
	}else{
		return true;
	}
	});

				  
});


});