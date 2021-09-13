<?php
/**
 * Example dynamic block class.
 *
 * @package movie-library-features
 */

namespace Movie_Library\Features\Inc\Blocks;

use Movie_Library\Features\Inc\Traits\Singleton;

/**
 * Class Example_Dynamic_Block
 */
class Example_Dynamic_Block {

	use Singleton;

	/**
	 * Construct method.
	 */
	protected function __construct() {

		$this->setup_hooks();

	}

	/**
	 * Setup hooks.
	 */
	protected function setup_hooks() {

		/**
		 * Actions.
		 */
		add_action( 'init', [ $this, 'register_block_type' ] );

	}

	/**
	 * Register scripts.
	 */
	public function register_block_type() {

		register_block_type(
			'movie-library-features/example-dynamic-block',
			[
				'editor_script'   => 'movie-library-features-blocks',
				'render_callback' => [ $this, 'render_block' ],
				'attributes'      => [
					'postId' => [
						'type'    => 'integer',
						'default' => 0,
					],
				],
			]
		);

	}

	/**
	 * Render block.
	 *
	 * @param array $attributes List of attributes passed in block.
	 *
	 * @return string HTML elements.
	 */
	public function render_block( $attributes = [] ) {

		$attributes = wp_parse_args( $attributes, [] );

		// Theme is supposed to have template available inside template-parts/block-templates/example-dynamic-block-template.php.
		return movie_library_get_template_content(
			'template-parts/block-templates/example-dynamic-block',
			[
				'attributes' => $attributes,
			]
		);

	}
}
