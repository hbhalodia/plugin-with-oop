<?php
/**
 * To register custom taxonomy.
 *
 * @package movie-library-features
 */

namespace Movie_Library\Features\Inc\Taxonomies;

use Movie_Library\Features\Inc\Post_Types\Post_Type_Movie;

/**
 * Class Taxonomy_Label
 */
class Taxonomy_Label extends Base {

	/**
	 * Slug of taxonomy.
	 *
	 * @var string
	 */
	const SLUG = 'label';

	/**
	 * Labels for taxonomy.
	 *
	 * @return array
	 */
	public function get_labels() {

		return [
			'name'                       => _x( 'Label', 'taxonomy general name', 'movie-library-features' ),
			'singular_name'              => _x( 'Label', 'taxonomy singular name', 'movie-library-features' ),
			'search_items'               => __( 'Search Label', 'movie-library-features' ),
			'popular_items'              => __( 'Popular Label', 'movie-library-features' ),
			'all_items'                  => __( 'All Label', 'movie-library-features' ),
			'parent_item'                => null,
			'parent_item_colon'          => null,
			'edit_item'                  => __( 'Edit Label', 'movie-library-features' ),
			'update_item'                => __( 'Update Label', 'movie-library-features' ),
			'add_new_item'               => __( 'Add New Label', 'movie-library-features' ),
			'new_item_name'              => __( 'New Label Name', 'movie-library-features' ),
			'separate_items_with_commas' => __( 'Separate Label with commas', 'movie-library-features' ),
			'add_or_remove_items'        => __( 'Add or remove Label', 'movie-library-features' ),
			'choose_from_most_used'      => __( 'Choose from the most used Label', 'movie-library-features' ),
			'not_found'                  => __( 'No Label found.', 'movie-library-features' ),
			'menu_name'                  => __( 'Label', 'movie-library-features' ),
		];

	}

	/**
	 * List of post types for taxonomy.
	 *
	 * @return array
	 */
	public function get_post_types() {

		return [
			Post_Type_Movie::SLUG,
		];

	}

}
