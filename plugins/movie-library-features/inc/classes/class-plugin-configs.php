<?php
/**
 * To load all classes of third party plugin configuration.
 *
 * @package movie-library-features
 */

namespace Movie_Library\Features\Inc;

use Movie_Library\Features\Inc\Traits\Singleton;
use Movie_Library\Features\Inc\Plugin_Configs\Fieldmanager;

/**
 * Class Plugin_Configs
 */
class Plugin_Configs {

	use Singleton;

	/**
	 * Construct method.
	 */
	protected function __construct() {

		// Load all plugin configs classes.
		Fieldmanager::get_instance();

	}

}
