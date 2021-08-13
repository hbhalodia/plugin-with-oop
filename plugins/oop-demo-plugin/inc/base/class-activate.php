<?php
/**
 * This file is used to do operations on plugin activate.
 *
 * @package oop-demo-plugin
 */

/**
 * This class is used for the activation.
 */
class Activate {

	/**
	 * Constructor of the activate class.
	 */
	public function __construct() {

	}

	/**
	 * This function is used to do stuff on activation of plugin
	 *
	 * @return void
	 */
	public static function activate() {
		flush_rewrite_rules();
	}
}
