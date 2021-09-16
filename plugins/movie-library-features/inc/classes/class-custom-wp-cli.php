<?php
/**
 * To load all wp-cli custom commands.
 *
 * @package movie-library-features
 */

namespace Movie_Library\Features\Inc;

use \Movie_Library\Features\Inc\Traits\Singleton;

/**
 * Class Custom_WP_CLI
 */
class Custom_WP_CLI {

	use Singleton;

	/**
	 * Contruct Method.
	 */
	protected function __construct() {

		if ( ! defined( 'WP_CLI' ) || ! WP_CLI ) {

			return;
		}

		/**
		 * Add all command here for custom WP_CLI.
		 */
		\WP_CLI::add_command( 'movie', '\Movie_Library\Features\Inc\WP_CLI\Dummy_Movie' );
		\WP_CLI::add_command( 'person', '\Movie_Library\Features\Inc\WP_CLI\Dummy_Person' );

	}
}
