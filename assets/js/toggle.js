jQuery(document).ready(function($) {
	// Toggles.
	$(".toggle").each(function() {
		var _el = $(this),
			_state = _el.data('state');
		if( 'closed' == _state ) {
			_el.accordion({
				header: '.toggle-title',
				collapsible: true,
				active: false
			});
		} else {
			_el.accordion({
				header: '.toggle-title',
				collapsible: true
			});
		};

		_el.on('accordionactivate', function(e, ui) {
			_el.accordion('refresh');
		});
		$(window).on('resize', function() {
			_el.accordion('refresh');
		});
	});

});