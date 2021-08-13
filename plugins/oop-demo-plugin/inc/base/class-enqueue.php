<?php
/**
 * This file is used to enqueue the scripts and styles.
 *
 * @package oop-demo-plugin
 */

/**
 * This class is used for the Enqueue the styles and scripts.
 */
class Enqueue {
	/**
	 * Constructor of the Enqueue class.
	 */
	public function __construct() {
	}

	/**
	 * Function to call the admin_enqueue_scripts hook.
	 *
	 * @return void
	 */
	public function register() {
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue' ) );
	}

	/**
	 * Function to enqueue the scripts and styles.
	 *
	 * @return void
	 */
	public function enqueue() {

		wp_enqueue_style( 'my_style', OOP_PLUGIN_URL . '/assets/my-style.css', array(), OOP_SCRIPT_STYLE_VERSION, true );
		wp_enqueue_script( 'my_script', OOP_PLUGIN_URL . '/assets/my-script.js', array( 'jquery' ), OOP_SCRIPT_STYLE_VERSION, true );

	}
}
