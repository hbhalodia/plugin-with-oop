<?php
/**
 * To register custom taxonomy.
 *
 * @package movie-library-features
 */

namespace Movie_Library\Features\Inc\Taxonomies;

use Movie_Library\Features\Inc\Post_Types\Post_Type_Person;

/**
 * Class Taxonomy_Career
 */
class Taxonomy_Career extends Base {

	/**
	 * Slug of taxonomy.
	 *
	 * @var string
	 */
	const SLUG = 'career';

	/**
	 * Labels for taxonomy.
	 *
	 * @return array
	 */
	public function get_labels() {

		return [
			'name'                       => _x( 'Career', 'taxonomy general name', 'movie-library-features' ),
			'singular_name'              => _x( 'Career', 'taxonomy singular name', 'movie-library-features' ),
			'search_items'               => __( 'Search Career', 'movie-library-features' ),
			'popular_items'              => __( 'Popular Career', 'movie-library-features' ),
			'all_items'                  => __( 'All Career', 'movie-library-features' ),
			'parent_item'                => null,
			'parent_item_colon'          => null,
			'edit_item'                  => __( 'Edit Career', 'movie-library-features' ),
			'update_item'                => __( 'Update Career', 'movie-library-features' ),
			'add_new_item'               => __( 'Add New Career', 'movie-library-features' ),
			'new_item_name'              => __( 'New Career Name', 'movie-library-features' ),
			'separate_items_with_commas' => __( 'Separate Career with commas', 'movie-library-features' ),
			'add_or_remove_items'        => __( 'Add or remove Career', 'movie-library-features' ),
			'choose_from_most_used'      => __( 'Choose from the most used Career', 'movie-library-features' ),
			'not_found'                  => __( 'No Career found.', 'movie-library-features' ),
			'menu_name'                  => __( 'Career', 'movie-library-features' ),
		];

	}

	/**
	 * List of post types for taxonomy.
	 *
	 * @return array
	 */
	public function get_post_types() {

		return [
			Post_Type_Person::SLUG,
		];

	}

}
