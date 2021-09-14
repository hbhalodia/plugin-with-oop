<?php
/**
 * Custom post Type - Video Gallery Meta box.
 *
 * @package movie-library-features
 */

namespace Movie_Library\Features\Inc\Meta_Boxes;

use Movie_Library\Features\Inc\Post_Types\Post_Type_Movie;
use Movie_Library\Features\Inc\Post_Types\Post_Type_Person;

/**
 * Class Metabox_Video_Gallery
 */
class Metabox_Video_Gallery extends Base {

	/**
	 * Meta box slug.
	 *
	 * @var string Meta box slug.
	 */
	const SLUG = 'ml-video-gallery';

	/**
	 * Meta box label.
	 *
	 * @var string Meta box label.
	 */
	const LABEL = 'Video Gallery';

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
	protected $priority = 'high';

	/**
	 * To get field for meta box.
	 *
	 * @param string $post_type Current post type.
	 *
	 * @throws \FM_Developer_Exception Field manager developer exception.
	 *
	 * @return array
	 */
	public function get_fields( $post_type = '' ) {

		return array(
			'video' => new \Fieldmanager_Media(
				array(
					'label'     => 'Select Video',
					'mime_type' => 'video',
				)
			),
		);
	}

	/**
	 * List of post type in which meta box is allowed.
	 *
	 * @return array List of post type.
	 */
	public function get_post_type() {

		return array(
			Post_Type_Movie::SLUG,
			Post_Type_Person::SLUG,
		);

	}

}
