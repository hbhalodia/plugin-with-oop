<?php
/**
 * To register custom taxonomy.
 *
 * @package movie-library-features
 */

namespace Movie_Library\Features\Inc\Taxonomies;

use Movie_Library\Features\Inc\Post_Types\Post_Type_Movie;

/**
 * Class Taxonomy_Person
 */
class Taxonomy_Person extends Base {

	/**
	 * Slug of taxonomy.
	 *
	 * @var string
	 */
	const SLUG = 'person-tax';

	/**
	 * Labels for taxonomy.
	 *
	 * @return array
	 */
	public function get_labels() {

		return array(
			'name'                       => _x( 'Person', 'taxonomy general name', 'movie-library-features' ),
			'singular_name'              => _x( 'Person', 'taxonomy singular name', 'movie-library-features' ),
			'search_items'               => __( 'Search Person', 'movie-library-features' ),
			'popular_items'              => __( 'Popular Person', 'movie-library-features' ),
			'all_items'                  => __( 'All Person', 'movie-library-features' ),
			'parent_item'                => null,
			'parent_item_colon'          => null,
			'edit_item'                  => __( 'Edit Person', 'movie-library-features' ),
			'update_item'                => __( 'Update Person', 'movie-library-features' ),
			'add_new_item'               => __( 'Add New Person', 'movie-library-features' ),
			'new_item_name'              => __( 'New Person Name', 'movie-library-features' ),
			'separate_items_with_commas' => __( 'Separate Person with commas', 'movie-library-features' ),
			'add_or_remove_items'        => __( 'Add or remove Person', 'movie-library-features' ),
			'choose_from_most_used'      => __( 'Choose from the most used Person', 'movie-library-features' ),
			'not_found'                  => __( 'No Person found.', 'movie-library-features' ),
			'menu_name'                  => __( 'Person', 'movie-library-features' ),
		);

	}

	/**
	 * To get argument to register taxonomy.
	 *
	 * @return array
	 */
	public function get_args() {

		return array(
			'hierarchical'      => true,
			'public'            => false,
			'show_ui'           => false,
			'show_admin_column' => true,
			'query_var'         => true,
			'show_in_rest'      => true,
			'capabilities'      => array(
				'manage_terms' => 'manage_movie_taxonomy',
				'edit_terms'   => 'edit_movie_taxonomy',
				'delete_terms' => 'delete_movie_taxonomy',
				'assign_terms' => 'assign_movie_taxonomy',
			),
		);

	}

	/**
	 * List of post types for taxonomy.
	 *
	 * @return array
	 */
	public function get_post_types() {

		return array(
			Post_Type_Movie::SLUG,
		);

	}

}
