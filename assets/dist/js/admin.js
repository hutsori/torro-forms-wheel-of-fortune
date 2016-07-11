/*!
 * Torro Forms - Wheel of fortune Version 1.0.0 (http://torro-forms.com)
 * Licensed under GNU General Public License v3 (http://www.gnu.org/licenses/gpl-3.0.html)
 */
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
