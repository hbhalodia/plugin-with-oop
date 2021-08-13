<?php
/**
 * This file is used to create the settings API.
 *
 * @package oop-demo-plugin
 */

/**
 * This class is used for the Settings API implementation.
 */
class SettingsApi {

	/**
	 * Admin page accept the array of all admin pages.
	 *
	 * @var array
	 */
	public $admin_pages = array();

	/**
	 * Function to register the admin_menu of pages are not empty.
	 *
	 * @return void
	 */
	public function register() {

		if ( ! empty( $this->admin_pages ) ) {
			add_action( 'admin_menu', array( $this, 'add_admin_menu' ) );
		}
	}

	/**
	 * This function is to add the pages to the settings section.
	 *
	 * @param array $pages - all the pages of the settings.
	 * @return array
	 */
	public function add_pages( array $pages ) {

		$this->admin_pages = $pages;

		return $this;
	}

	/**
	 * Function to add the menu page.
	 *
	 * @return void
	 */
	private function add_admin_menu() {

		foreach ( $this->admin_pages as $pages ) {
			add_menu_page(
				$page['page_title'],
				$page['menu_title'],
				$page['capability'],
				$page['menu_slug'],
				$page['callback'],
				$page['icon_url'],
				$page['position'],
			);
		}
	}
}
