<?php
/**
 * This file is used to register all the services.
 *
 * @package oop-demo-plugin
 */

/**
 * This class is used to initialize all the services.
 */
final class Init {

	/**
	 * This is the constructor of Init class.
	 */
	public function __construct() {
	}

	/**
	 * File is used to get_the_services of the particular class.
	 *
	 * @return array
	 */
	public static function get_services_class() {
		require_once OOP_PLUGIN_PATH . 'inc/pages/class-admin.php';
		require_once OOP_PLUGIN_PATH . 'inc/base/class-enqueue.php';
		require_once OOP_PLUGIN_PATH . 'inc/base/class-settingslink.php';
		require_once OOP_PLUGIN_PATH . 'inc/cpt/class-movie.php';
		require_once OOP_PLUGIN_PATH . 'inc/cpt/class-person.php';

		return array(
			Admin::class,
			Enqueue::class,
			SettingsLink::class,
			Movie::class,
			Person::class,
		);
	}

	/**
	 * This function is used to register all the services.
	 *
	 * @return void
	 */
	public static function register_services() {
		foreach ( self::get_services_class() as $class ) {
			$service = self::instantiate( $class );
			if ( method_exists( $service, 'register' ) ) {
				$service->register();
			}
		}
	}

	/**
	 * Function to create the object of the class called.
	 *
	 * @param class $class - class of the service.
	 * @return object
	 */
	public function instantiate( $class ) {
		$service = new $class();

		return $service;
	}
}
