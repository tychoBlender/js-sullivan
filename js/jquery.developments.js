jQuery(document).ready(function($) {
	// Returns a function, that, as long as it continues to be invoked, will not
	// be triggered. The function will be called after it stops being called for
	// N milliseconds. If `immediate` is passed, trigger the function on the
	// leading edge, instead of the trailing.
	function debounce(func, wait, immediate) {
	var timeout;
	return function() {
		var context = this, args = arguments;
		var later = function() {
			timeout = null;
			if (!immediate) func.apply(context, args);
		};
		var callNow = immediate && !timeout;
		clearTimeout(timeout);
		timeout = setTimeout(later, wait);
		if (callNow) func.apply(context, args);
	};
	};
		
	var jsNav = $('#js-map-nav ul li'),
        tt = $("#map-icon-tooltip"),
        ttl = $("#map-icon-tooltip-line");
        active = false;
    
    tt.fadeOut(0);
    ttl.fadeOut(0);
    
    $(".propertyMenu").css("display", "none");
    
    $('#js-map-nav ul li a').click(function(e) {
        e.preventDefault();
        
        var lbl = $(this).text(),
            link = $(".map-icon[data-project='" + lbl +"']").data("project-link"),
            ttpos = $(".map-icon[data-project='" + lbl +"']").position();
        
        jsNav.removeClass("current");
        $(this).parent().addClass("current");
        
        tt.fadeOut(200, function(){
            if(link){
	            tt.addClass('active');
				$(this).attr('href', link);            	            
                $(this).html('<a href="'+link+'">'+lbl+" »</a>").css(ttpos).css({marginLeft: -(tt.width()/2)}).fadeIn(500);
                //console.log("link = " + link);
            }else{
	            tt.removeClass('active');
                $(this).text(lbl).css(ttpos).css({marginLeft: -(tt.width()/2)}).fadeIn(500);
                //console.log("no link");
            }
        });
        ttl.fadeOut(200, function(){
            $(this).css(ttpos).fadeIn(500);
        });
        
    });    
    
    $('.map-icon').click(function(e) {	    
        e.preventDefault();        
		
		var lbl = $(this).data("project"),
            link = $(this).data("project-link"),
            ttpos = $(this).position();

		if ($(this).hasClass("clicked-once")) {
        	// already been clicked once, hide it
			window.location.href = link;
			return;
		}
		else {
        	// first time this is clicked, mark it
        	$('.map-icon').removeClass('clicked-once');
			$(this).addClass("clicked-once");
		}       		
												
		tt.fadeOut(200, function(){	        
			if(link){
			    tt.addClass('active');
			    $(tt).attr('href', link);
			    $(ttl).attr('href', link);
			    $(this).attr('href', link);				   				    
			    $(this).html('<a href="'+link+'">'+lbl+" »</a>").css(ttpos).css({marginLeft: -(tt.width()/2)}).fadeIn(500);                
			    //console.log("link = " + link);                
			}else{
			    $(tt).removeAttr('href');
			    tt.removeClass('active');
			    $(this).text(lbl).css(ttpos).css({marginLeft: -(tt.width()/2)}).fadeIn(500);
			    //console.log("no link");
			}
		});
		
		ttl.fadeOut(200, function(){
			$(this).css(ttpos).fadeIn(500);
		});
		
		jsNav.removeClass("current");
		$("#js-map-nav ul li:contains('" + lbl + "')").addClass("current");

    });                
       
	$( "#js-map-nav ul li a" ).hover(
		function() {			
			var lbl = $(this).text(),
			link = $(".map-icon[data-project='" + lbl +"']").data("project-link"),
			ttpos = $(".map-icon[data-project='" + lbl +"']").position();
			
			jsNav.removeClass("current");
			$(this).parent().addClass("current");
			
			
			if ($(".map-icon[data-project='" + lbl +"']").hasClass("clicked-once")) {						
				return;
			}else {
				// first time this is clicked, mark it
				$('.map-icon').removeClass('clicked-once');
				$(".map-icon[data-project='" + lbl +"']").addClass("clicked-once");
			
			}
			
			tt.fadeOut(200, function(){
				if(link){
					tt.addClass('active');
					active = true;
					$(this).attr('href', link);
					$(this).html('<a href="'+link+'">'+lbl+" »</a>").css(ttpos).css({marginLeft: -(tt.width()/2)}).fadeIn(500);										
					       	
					//console.log("link = " + link);
				}else{
					tt.removeClass('active');
					$(this).text(lbl).css(ttpos).css({marginLeft: -(tt.width()/2)}).fadeIn(500);
					//console.log("no link");
				}
			});
			ttl.fadeOut(200, function(){
			$(this).css(ttpos).fadeIn(500);
			});

		}, function() {
			//console.log('OUT!');
		}
	);
    
    $('#js-map-img').click(function(){
        tt.fadeOut(500);
        ttl.fadeOut(500);
    });
    
    $(window).resize(function() {
        tt.fadeOut(0);
        ttl.fadeOut(0);
    });
});

