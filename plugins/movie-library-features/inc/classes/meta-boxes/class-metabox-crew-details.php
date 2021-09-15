<?php
/**
 * Movie post - Crew Information meta box.
 *
 * @package movie-library-features
 */

namespace Movie_Library\Features\Inc\Meta_Boxes;

use Movie_Library\Features\Inc\Post_Types\Post_Type_Movie;

/**
 * Class Metabox_MovieInformation
 */
class Metabox_Crew_Details extends Base {

	/**
	 * Meta box slug.
	 *
	 * @var string Meta box slug.
	 */
	const SLUG = 'movie-crew-information';

	/**
	 * Meta box label.
	 *
	 * @var string Meta box label.
	 */
	const LABEL = 'Movie Crew Information';

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
			'director' => new \Fieldmanager_Select(
				array(
					'name'       => 'director',
					'label'      => esc_html__( 'Movie Directors : ', 'movie-library-features' ),
					'multiple'   => true,
					'attributes' => array(
						'size' => 5,
					),
					'datasource' => new \Fieldmanager_Datasource_Post(
						array(
							'query_args' => array(
								'post_type' => 'person',
								'tax_query' => array( // phpcs:ignore WordPress.DB.SlowDBQuery.slow_db_query_tax_query
									array(
										'taxonomy' => 'career',
										'field'    => 'slug',
										'terms'    => 'director',
									),
								),
							),
						)
					),
				)
			),
			'producer' => new \Fieldmanager_Select(
				array(
					'name'       => 'producer',
					'label'      => esc_html__( 'Movie Producers : ', 'movie-library-features' ),
					'multiple'   => true,
					'attributes' => array(
						'size' => 5,
					),
					'datasource' => new \Fieldmanager_Datasource_Post(
						array(
							'query_args' => array(
								'post_type' => 'person',
								'tax_query' => array( // phpcs:ignore WordPress.DB.SlowDBQuery.slow_db_query_tax_query
									array(
										'taxonomy' => 'career',
										'field'    => 'slug',
										'terms'    => 'producer',
									),
								),
							),
						)
					),
				)
			),
			'writer'   => new \Fieldmanager_Select(
				array(
					'name'       => 'writer',
					'label'      => esc_html__( 'Movie Writers : ', 'movie-library-features' ),
					'multiple'   => true,
					'attributes' => array(
						'size' => 5,
					),
					'datasource' => new \Fieldmanager_Datasource_Post(
						array(
							'query_args' => array(
								'post_type' => 'person',
								'tax_query' => array( // phpcs:ignore WordPress.DB.SlowDBQuery.slow_db_query_tax_query
									array(
										'taxonomy' => 'career',
										'field'    => 'slug',
										'terms'    => 'writer',
									),
								),
							),
						)
					),
				)
			),
			'Actor'    => new \Fieldmanager_Select(
				array(
					'name'       => 'Actor',
					'label'      => esc_html__( 'Movie Actors : ', 'movie-library-features' ),
					'multiple'   => true,
					'attributes' => array(
						'size' => 5,
					),
					'datasource' => new \Fieldmanager_Datasource_Post(
						array(
							'query_args' => array(
								'post_type' => 'person',
								'tax_query' => array( // phpcs:ignore WordPress.DB.SlowDBQuery.slow_db_query_tax_query
									array(
										'taxonomy' => 'career',
										'field'    => 'slug',
										'terms'    => 'actor-star',
									),
								),
							),
						)
					),
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
