<?php
/**
 * Movie post - Movie Information meta box.
 *
 * @package movie-library-features
 */

namespace Movie_Library\Features\Inc\Meta_Boxes;

use Movie_Library\Features\Inc\Post_Types\Post_Type_Movie;

/**
 * Class Metabox_Example
 */
class Metabox_MovieInformation extends Base {

	/**
	 * Meta box slug.
	 *
	 * @var string Meta box slug.
	 */
	const SLUG = 'movie-information';

	/**
	 * Meta box label.
	 *
	 * @var string Meta box label.
	 */
	const LABEL = 'Basic Movie Information';

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
			'movie_rating'       => new \Fieldmanager_Select(
				array(
					'name'    => 'movie_rating',
					'label'   => __( 'Enter Movie Rating', 'movie-library-features' ),
					'options' => array(
						''  => __( 'Choose Rating', 'movie-library-features' ),
						'1' => '1',
						'2' => '2',
						'3' => '3',
						'4' => '4',
						'5' => '5',
					),
				)
			),
			'movie_runtime'      => new \Fieldmanager_TextField(
				array(
					'name'  => 'movie_runtime',
					'label' => __( 'Enter Movie Runtime : ', 'movie-library-features' ),
				)
			),
			'movie_release_date' => new \Fieldmanager_Datepicker(
				array(
					'name'  => 'movie_release_date',
					'label' => __( 'Enter Release Date : ', 'movie-library-features' ),
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
		);

	}

}
