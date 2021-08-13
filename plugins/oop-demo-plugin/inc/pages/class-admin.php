<?php
/**
 * This file is used to register the admin menu page.
 *
 * @package oop-plugin-demo.
 */

/**
 * This class is uesd to generate admin menu page.
 */
class Admin {

	/**
	 * This is the constructor of admin class.
	 */
	public function __construct() {
	}

	/**
	 * Function to call the admin_menu hook.
	 *
	 * @return void
	 */
	public function register() {
		add_action( 'admin_menu', array( $this, 'add_admin_pages' ) );
	}

	/**
	 * Function to add the admin menu page.
	 *
	 * @return void
	 */
	public function add_admin_pages() {
		add_menu_page(
			'OOP Demo Plugin',
			'OOP Demo',
			'manage_options',
			'oop_demo',
			array( $this, 'oop_index' ),
			'dashicons-store',
		);
	}

	/**
	 * Function to include the template part of the admin menu page.
	 *
	 * @return void
	 */
	public function oop_index() {
		require_once OOP_PLUGIN_PATH . 'templates/admin-menu-page.php';
	}

}
