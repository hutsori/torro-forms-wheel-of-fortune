<?php
/*
Plugin Name: Torro Forms - Wheel of fortune
Plugin URI:  http://torro-forms.com
Description: Plugin Boilerplate for the Easy & Extendable WordPress Formbuilder
Version:     1.0.0
Author:      Awesome UG
Author URI:  http://www.awesome.ug
License:     GNU General Public License v3
License URI: http://www.gnu.org/licenses/gpl-3.0.html
Text Domain: torro-forms-wheel-of-fortune
Domain Path: /languages/
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Torro_Forms_Wheel_Of_Fortune_Init {
	public static function init() {
		self::load_textdomain();

		if ( ! function_exists( 'torro_load' ) ) {
			add_action( 'admin_notices', array( __CLASS__, 'torro_not_active' ) );
			return;
		}

		torro_load( array( __CLASS__, 'load_extension' ) );
	}

	public static function load_extension() {
		require_once plugin_dir_path( __FILE__ ) . 'core/extension.php';
	}

	public static function torro_not_active() {
		?>
		<div class="notice notice-warning">
			<p><?php printf( __( 'Torro Forms is not activated. Please activate it in order to use the extension %s.', 'torro-forms-wheel-of-fortune' ), 'Torro Forms - Wheel of fortune' ); ?></p>
		</div>
		<?php
	}

	private static function load_textdomain() {
		return load_plugin_textdomain( 'torro-forms-wheel-of-fortune', false, plugin_basename( dirname( __FILE__ ) ) . '/languages' );
	}
}

add_action( 'plugins_loaded', array( 'Torro_Forms_Wheel_Of_Fortune_Init', 'init' ) );
