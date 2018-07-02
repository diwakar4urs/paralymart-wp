(function($) {
	'use strict';

  	var value = $('.wpb-input-categories').data('value');
  	if(value != ''){
		$(".wpb-input-categories > option[value=" + value + "]").attr("selected",true);
	}

})(jQuery);
