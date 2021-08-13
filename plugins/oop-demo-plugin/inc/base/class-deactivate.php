<?php
/**
 * This file is used to do operations on plugin activate.
 *
 * @package oop-demo-plugin
 */

/**
 * This class is used for the activation.
 */
class Deactivate {

	/**
	 * Constructor of the deactivtate class.
	 */
	public function __construct() {

	}

	/**
	 * This function is used to do stuff on deactivation of plugin
	 *
	 * @return void
	 */
	public static function deactivate() {

		flush_rewrite_rules();
	}
}
