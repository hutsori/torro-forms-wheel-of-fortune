<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Torro_Forms_Wheel_Of_Fortune extends Torro_Extension {
	private static $instance = null;

	public static function instance() {
		if ( null === self::$instance ) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	/**
	 * Initializing.
	 *
	 * @since 1.0.0
	 */
	protected function __construct() {
		parent::__construct();
	}

	protected function init() {
		$this->title = 'Wheel of fortune';

		$this->name = 'torro_forms_wheel_of_fortune';

		$this->item_name = 'Torro Forms - Wheel of fortune';

		$this->plugin_file = dirname( dirname( __FILE__ ) ) . '/torro-forms-wheel-of-fortune.php';

		$this->version = '1.0.0';	

		add_filter( 'torro_template_locations', array( $this, 'register_template_location' ) );
	}

	public function register_template_location( $locations ) {
		// remove this function and the above filter hook if your extension doesn't need templates

		$locations[70] = $this->get_path( 'templates/' );

		return $locations;
	}

	protected function includes() {
		require_once $this->get_path( 'core/element-types/wheel-of-fortune.php' );
	}

	public function frontend_scripts() {
		wp_enqueue_script( 'torro-forms-wheel-of-fortune-tween', $this->get_asset_url( 'TweenMax', 'js' ), array(), $this->version );
		wp_enqueue_script( 'torro-forms-wheel-of-fortune-win-wheel', $this->get_asset_url( 'Winwheel', 'js' ), array(), $this->version );
	}

	public function frontend_styles() {
		wp_enqueue_style( 'torro-forms-wheel-of-fortune-frontend', $this->get_asset_url( 'frontend', 'css' ), array(), $this->version );
	}

	public function admin_scripts() {
		wp_enqueue_script( 'torro-forms-wheel-of-fortune-admin', $this->get_asset_url( 'admin', 'js' ), array( 'torro-form-edit' ), $this->version );
	}

	public function admin_styles() {
		wp_enqueue_style( 'torro-forms-wheel-of-fortune-admin', $this->get_asset_url( 'admin', 'css' ), array( 'torro-form-edit' ), $this->version );
	}
}

torro()->extensions()->register( 'Torro_Forms_Wheel_Of_Fortune' );
