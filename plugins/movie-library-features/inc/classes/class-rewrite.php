<?php
/**
 * Rewrite class.
 *
 * @package movie-library-features
 */

namespace Movie_Library\Features\Inc;

use Movie_Library\Features\Inc\Traits\Singleton;

/**
 * Class Rewrite
 */
class Rewrite {

	use Singleton;

	/**
	 * Construct method.
	 */
	protected function __construct() {

		$this->setup_hooks();

	}

	/**
	 * To setup action/filter.
	 *
	 * @return void
	 */
	protected function setup_hooks() {}

}
