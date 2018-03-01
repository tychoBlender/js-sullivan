jQuery(document).ready(function($) {
window.isMobile = {Android: function() {return navigator.userAgent.match(/Android/i);},BlackBerry: function() {return navigator.userAgent.match(/BlackBerry/i);},iOS: function() { return navigator.userAgent.match(/iPhone|iPad|iPod/i);},Opera: function() {return navigator.userAgent.match(/Opera Mini/i);},Windows: function() { return navigator.userAgent.match(/IEMobile/i);},any: function() {return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());}};

if(!window.isMobile.any()){
	$('#fullpage').fullpage({
		navigation: true,
		navigationPosition: 'right',	
		continuousVertical: true,
		anchors:['','','','','']
	});
    	
}else{
	if(window.innerWidth >= 1024){
		//console.log('MOBILE 1024+');
		$('#fullpage').fullpage({
		navigation: true,
		navigationPosition: 'right',	
		continuousVertical: true,
		anchors:['','','','','']
		});
	}else{
		//console.log('MOBILE ELSE');
		$('#fullpage').fullpage({
			anchors:['','','','',''],
			autoScrolling:false,
			continuousVertical:false,
			fitToSection:false		
		});
	}
}
});


