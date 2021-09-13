<?php
/**
 * To load all classes that register widget.
 *
 * @package movie-library-features
 */

namespace Movie_Library\Features\Inc;

use \Movie_Library\Features\Inc\Traits\Singleton;

/**
 * Class Widgets
 */
class Widgets {

	use Singleton;

	/**
	 * Construct method.
	 */
	protected function __construct() {
		// Load all widgets classes.
	}

}
