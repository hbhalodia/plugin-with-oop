<?php
/**
 * To register custom taxonomy.
 *
 * @package movie-library-features
 */

namespace Movie_Library\Features\Inc\Taxonomies;

use Movie_Library\Features\Inc\Post_Types\Post_Type_Movie;

/**
 * Class Taxonomy_Genre
 */
class Taxonomy_Genre extends Base {

	/**
	 * Slug of taxonomy.
	 *
	 * @var string
	 */
	const SLUG = 'genre';

	/**
	 * Labels for taxonomy.
	 *
	 * @return array
	 */
	public function get_labels() {

		return [
			'name'                       => _x( 'Genre', 'taxonomy general name', 'movie-library-features' ),
			'singular_name'              => _x( 'Genre', 'taxonomy singular name', 'movie-library-features' ),
			'search_items'               => __( 'Search Genre', 'movie-library-features' ),
			'popular_items'              => __( 'Popular Genre', 'movie-library-features' ),
			'all_items'                  => __( 'All Genre', 'movie-library-features' ),
			'parent_item'                => null,
			'parent_item_colon'          => null,
			'edit_item'                  => __( 'Edit Genre', 'movie-library-features' ),
			'update_item'                => __( 'Update Genre', 'movie-library-features' ),
			'add_new_item'               => __( 'Add New Genre', 'movie-library-features' ),
			'new_item_name'              => __( 'New Genre Name', 'movie-library-features' ),
			'separate_items_with_commas' => __( 'Separate Genre with commas', 'movie-library-features' ),
			'add_or_remove_items'        => __( 'Add or remove Genre', 'movie-library-features' ),
			'choose_from_most_used'      => __( 'Choose from the most used Genre', 'movie-library-features' ),
			'not_found'                  => __( 'No Genre found.', 'movie-library-features' ),
			'menu_name'                  => __( 'Genre', 'movie-library-features' ),
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
