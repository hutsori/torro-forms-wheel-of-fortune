(function( exports, $ ) {
	function Torro_Forms_Wheel_Of_Fortune() {
		this.selectors = {
			iframe_container: '.iframe-container',
			iframe_wrap: '.iframe-wrap',
			url_input: '.formelement-iframe .torro-form-fieldset-input input[type="text"]'
		};
	}

	Torro_Forms_Wheel_Of_Fortune.prototype = {
		init: function() {
			// useless example :)
			$( document ).on( 'hover', this.selectors.iframe_container, function() {
				$( this ).css({ 'border-color': 'red' });
			});

			var self = this;

			$( document ).on( 'change', this.selectors.url_input, function() {
				var url = $( this ).val();
				$( this ).parents( '.formelement-iframe' ).find( self.selectors.iframe_wrap + ' > iframe' ).attr( 'src', url );
			});
		}
	};

	exports.add_extension( 'torro_forms_wheel_of_fortune', new Torro_Forms_Wheel_Of_Fortune() );
}( form_builder, jQuery ) );
