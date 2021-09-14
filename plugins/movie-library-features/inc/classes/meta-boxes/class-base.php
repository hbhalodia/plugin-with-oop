<?php
/**
 * Base class for register meta box.
 *
 * @package movie-library-features
 */

namespace Movie_Library\Features\Inc\Meta_Boxes;

use Movie_Library\Features\Inc\Traits\Singleton;

/**
 * Class Base
 */
abstract class Base {

	use Singleton;

	/**
	 * Construct method.
	 */
	protected function __construct() {

		$this->setup_hooks();

	}

	/**
	 * To register action/filter.
	 *
	 * @return void
	 */
	protected function setup_hooks() {

		/**
		 * Action
		 */
		add_action( 'fm_post', array( $this, 'register_meta_box' ) );

	}

	/**
	 * To register meta box.
	 *
	 * @param string $post_type Current post type.
	 *
	 * @throws \FM_Developer_Exception Field manager developer exception.
	 *
	 * @return void
	 */
	public function register_meta_box( $post_type ) {

		if ( empty( static::SLUG ) ) {
			return;
		}

		$post_types = $this->get_post_type();
		$post_types = ( ! empty( $post_types ) && is_array( $post_types ) ) ? $post_types : array();

		$meta_box_fields = $this->get_fields( $post_type );
		$meta_box_fields = ( ! empty( $meta_box_fields ) && is_array( $meta_box_fields ) ) ? $meta_box_fields : array();

		if ( empty( $post_types ) || ! is_array( $post_types ) || empty( $meta_box_fields ) || ! is_array( $meta_box_fields ) ) {
			return;
		}

		$context  = ( ! empty( $this->context ) ) ? $this->context : '';
		$priority = ( ! empty( $this->priority ) ) ? $this->priority : '';

		if ( 'ml-image-gallery' === static::SLUG ) {

			$field_manager = new \Fieldmanager_Group(
				array(
					'name'           => 'image-gallery',
					'limit'          => 0,
					'label'          => 'New Image',
					'label_macro'    => array( 'Image: %s', 'image' ),
					'add_more_label' => 'Add another Image',
					'sortable'       => true,
					'children'       => $meta_box_fields,
				)
			);

		} elseif ( 'ml-video-gallery' === static::SLUG ) {

			$field_manager = new \Fieldmanager_Group(
				array(
					'name'           => 'video-gallery',
					'limit'          => 0,
					'label'          => 'New Video',
					'label_macro'    => array( 'Video: %s', 'video' ),
					'add_more_label' => 'Add another Video',
					'sortable'       => true,
					'children'       => $meta_box_fields,
				)
			);

		} else {

			$field_manager = new \Fieldmanager_Group(
				array(
					'name'           => static::SLUG,
					'serialize_data' => false,
					'add_to_prefix'  => false,
					'children'       => $meta_box_fields,
				)
			);

		}

		$field_manager->add_meta_box( static::LABEL, $post_types, $context, $priority );

	}

	/**
	 * To get list of meta box fields.
	 *
	 * @param string $post_type Current post type.
	 *
	 * @return array List of field for meta box.
	 */
	public function get_fields( $post_type = '' ) {
		return array();
	}

	/**
	 * To get list of post types for that current meta box is allowed.
	 *
	 * @return array List of post types.
	 */
	public function get_post_type() {
		return array();
	}

}
