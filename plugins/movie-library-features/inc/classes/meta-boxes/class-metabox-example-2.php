<?php
/**
 * Example meta box.
 *
 * @package movie-library-features
 */

namespace Movie_Library\Features\Inc\Meta_Boxes;

use Movie_Library\Features\Inc\Post_Types\Post_Type_Movie;
use Movie_Library\Features\Inc\Post_Types\Post_Type_Person;
use Movie_Library\Features\Inc\Traits\Singleton;

/**
 * Class Metabox_Example_2
 */
class Metabox_Example_2 {

	use Singleton;

	/**
	 * Meta box slug.
	 *
	 * @var string Meta box slug.
	 */
	const SLUG = 'metabox-example-2';

	/**
	 * Meta box label.
	 *
	 * @var string Meta box label.
	 */
	const LABEL = 'Metabox Example 2';

	/**
	 * Context of meta box.
	 *
	 * @var string Context of meta box.
	 */
	protected $context = 'normal';

	/**
	 * Priority of meta box.
	 *
	 * @var string Priority of meta box.
	 */
	protected $priority = 'default';

	/**
	 * Construct method.
	 */
	protected function __construct() {
		$this->setup_hooks();
	}

	/**
	 * To setup actions/filters.
	 *
	 * @return void
	 */
	protected function setup_hooks() {

		/**
		 * Action
		 */
		add_action( 'add_meta_boxes', array( $this, 'add_meta_boxes' ) );
		add_action( 'save_post', array( $this, 'update_meta_box_value' ) );

	}

	/**
	 * To add meta box.
	 *
	 * @return void
	 */
	public function add_meta_boxes() {

		add_meta_box(
			static::SLUG,
			static::LABEL,
			array( $this, 'render_meta_box' ),
			$this->get_post_type(),
			$this->context,
			$this->priority
		);

	}

	/**
	 * List of post type in which meta box is allowed.
	 *
	 * @return array List of post type.
	 */
	public function get_post_type() {

		return array(
			// Post_Type_Example::SLUG,.
			'post',
		);

	}

	/**
	 * To render meta box.
	 *
	 * @return void
	 */
	public function render_meta_box() {

		$template = sprintf( '%s/templates/metabox/metabox-example.php', untrailingslashit( MOVIE_LIBRARY_FEATURES_PATH ) );
		require_once $template;
	}

	/**
	 * Handles saving value of metabox fields.
	 *
	 * @param int $post_id Current post's id.
	 *
	 * @return void
	 */
	public function update_meta_box_value( $post_id ) {

		if ( ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) ) {
			return;
		}

		$example_meta = sanitize_text_field( filter_input( INPUT_POST, 'example-meta', FILTER_SANITIZE_STRING ) );

		if ( empty( $example_meta ) ) {
			delete_post_meta( $post_id, 'metabox-example-2' );
		} else {
			update_post_meta( $post_id, 'metabox-example-2', $example_meta );
		}
	}

}
