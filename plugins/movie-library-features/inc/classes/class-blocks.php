<?php
/**
 * Registers assets for all blocks, and additional global functionality for gutenberg blocks.
 *
 * @package movie-library-features
 */

namespace Movie_Library\Features\Inc;

use Movie_Library\Features\Inc\Traits\Singleton;
use Movie_Library\Features\Inc\Blocks\Example_Dynamic_Block;

/**
 * Class Blocks
 */
class Blocks {

	use Singleton;

	/**
	 * Construct method.
	 */
	protected function __construct() {

		$this->setup_hooks();

		Example_Dynamic_Block::get_instance();
	}

	/**
	 * Setup hooks.
	 *
	 * @return void
	 */
	public function setup_hooks() {
		add_action( 'enqueue_block_editor_assets', [ $this, 'enqueue_scripts' ] );
	}

	/**
	 * Enqueue scripts.
	 *
	 * @return void
	 */
	public function enqueue_scripts() {

		wp_register_script(
			'movie-library-features-blocks',
			MOVIE_LIBRARY_FEATURES_URL . '/assets/build/js/blocks.js',
			[ 'wp-blocks', 'wp-i18n', 'wp-element', 'wp-editor' ],
			filemtime( MOVIE_LIBRARY_FEATURES_PATH . '/assets/build/js/blocks.js' ),
			true
		);

		wp_enqueue_script( 'movie-library-features-blocks' );
	}
}
