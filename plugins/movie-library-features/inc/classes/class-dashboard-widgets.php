<?php
/**
 * To load all the register dashboard widgets.
 *
 * @package movie-library-features
 */

namespace Movie_Library\Features\Inc;

use \Movie_Library\Features\Inc\Traits\Singleton;
use \Movie_Library\Features\Inc\Dashboard_Widgets\Dashboard_Widgets_Recent_Movie;
use \Movie_Library\Features\Inc\Dashboard_Widgets\Dashboard_Widgets_Top_Rated_Movie;

/**
 * Class Shortcodes
 */
class Dashboard_Widgets {

	use Singleton;

	/**
	 * Construct method.
	 */
	protected function __construct() {

		// Load all shortcodes classes.
		Dashboard_Widgets_Recent_Movie::get_instance();
		Dashboard_Widgets_Top_Rated_Movie::get_instance();

	}

}
