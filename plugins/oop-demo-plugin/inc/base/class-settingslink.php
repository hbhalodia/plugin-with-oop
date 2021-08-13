<?php
/**
 * This file is used to create the settings link refer to the admin menu page
 *
 * @package oop-demo-plugin
 */

/**
 * This class is used for the Settings link refer to admin menu page.
 */
class SettingsLink {

	/**
	 * Constructor of the SettingsLink class.
	 */
	public function __construct() {
	}

	/**
	 * Function to call the  hook.
	 *
	 * @return void
	 */
	public function register() {
		add_filter( 'plugin_action_links_' . PLUGIN_NAME, array( $this, 'settings_link' ) );
	}

	/**
	 * Function to create the settings link on the filter hook.
	 *
	 * @param array $links - links like activate | delete.
	 * @return array
	 */
	public function settings_link( $links ) {
		$setting_link = '<a href="admin.php?page=oop_demo">Settings</a>';
		array_push(
			$links,
			$setting_link,
		);

		return $links;
	}
}
