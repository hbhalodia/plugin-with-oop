<?php
/**
 * To load all classes that register short codes.
 *
 * @package movie-library-features
 */

namespace Movie_Library\Features\Inc;

use \Movie_Library\Features\Inc\Traits\Singleton;
use \Movie_Library\Features\Inc\Shortcodes\Shortcodes_Person;

/**
 * Class Shortcodes
 */
class Shortcodes {

	use Singleton;

	/**
	 * Construct method.
	 */
	protected function __construct() {

		// Load all shortcodes classes.
		Shortcodes_Person::get_instance();

	}

}
