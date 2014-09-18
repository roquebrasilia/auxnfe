var Mushi = {};

$(document).ready(function(){
	Mushi.common.init();
	var pageName = $('body').attr('rel');

	if( (pageName !== 'undefined') && (pageName !== '') ) {
		Mushi[pageName].init();
	}
});