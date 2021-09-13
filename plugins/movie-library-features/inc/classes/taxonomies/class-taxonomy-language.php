<?php
/**
 * To register custom taxonomy.
 *
 * @package movie-library-features
 */

namespace Movie_Library\Features\Inc\Taxonomies;

use Movie_Library\Features\Inc\Post_Types\Post_Type_Movie;


/**
 * Class Taxonomy_Language
 */
class Taxonomy_Language extends Base {

	/**
	 * Slug of taxonomy.
	 *
	 * @var string
	 */
	const SLUG = 'language';

	/**
	 * Labels for taxonomy.
	 *
	 * @return array
	 */
	public function get_labels() {

		return [
			'name'                       => _x( 'Language', 'taxonomy general name', 'movie-library-features' ),
			'singular_name'              => _x( 'Language', 'taxonomy singular name', 'movie-library-features' ),
			'search_items'               => __( 'Search Language', 'movie-library-features' ),
			'popular_items'              => __( 'Popular Language', 'movie-library-features' ),
			'all_items'                  => __( 'All Language', 'movie-library-features' ),
			'parent_item'                => null,
			'parent_item_colon'          => null,
			'edit_item'                  => __( 'Edit Language', 'movie-library-features' ),
			'update_item'                => __( 'Update Language', 'movie-library-features' ),
			'add_new_item'               => __( 'Add New Language', 'movie-library-features' ),
			'new_item_name'              => __( 'New Language Name', 'movie-library-features' ),
			'separate_items_with_commas' => __( 'Separate Language with commas', 'movie-library-features' ),
			'add_or_remove_items'        => __( 'Add or remove Language', 'movie-library-features' ),
			'choose_from_most_used'      => __( 'Choose from the most used Language', 'movie-library-features' ),
			'not_found'                  => __( 'No Language found.', 'movie-library-features' ),
			'menu_name'                  => __( 'Language', 'movie-library-features' ),
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
