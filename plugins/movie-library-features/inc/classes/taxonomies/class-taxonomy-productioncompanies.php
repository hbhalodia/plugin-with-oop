<?php
/**
 * To register custom taxonomy.
 *
 * @package movie-library-features
 */

namespace Movie_Library\Features\Inc\Taxonomies;

use Movie_Library\Features\Inc\Post_Types\Post_Type_Movie;

/**
 * Class Taxonomy_ProductionCompanies
 */
class Taxonomy_ProductionCompanies extends Base {

	/**
	 * Slug of taxonomy.
	 *
	 * @var string
	 */
	const SLUG = 'production-companies';

	/**
	 * Labels for taxonomy.
	 *
	 * @return array
	 */
	public function get_labels() {

		return [
			'name'                       => _x( 'Production Companies', 'taxonomy general name', 'movie-library-features' ),
			'singular_name'              => _x( 'Production Companies', 'taxonomy singular name', 'movie-library-features' ),
			'search_items'               => __( 'Search Production Companies', 'movie-library-features' ),
			'popular_items'              => __( 'Popular Production Companies', 'movie-library-features' ),
			'all_items'                  => __( 'All Production Companies', 'movie-library-features' ),
			'parent_item'                => null,
			'parent_item_colon'          => null,
			'edit_item'                  => __( 'Edit Production Companies', 'movie-library-features' ),
			'update_item'                => __( 'Update Production Companies', 'movie-library-features' ),
			'add_new_item'               => __( 'Add New Production Companies', 'movie-library-features' ),
			'new_item_name'              => __( 'New Production Companies Name', 'movie-library-features' ),
			'separate_items_with_commas' => __( 'Separate Production Companies with commas', 'movie-library-features' ),
			'add_or_remove_items'        => __( 'Add or remove Production Companies', 'movie-library-features' ),
			'choose_from_most_used'      => __( 'Choose from the most used Production Companies', 'movie-library-features' ),
			'not_found'                  => __( 'No Production Companies found.', 'movie-library-features' ),
			'menu_name'                  => __( 'Production Companies', 'movie-library-features' ),
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
