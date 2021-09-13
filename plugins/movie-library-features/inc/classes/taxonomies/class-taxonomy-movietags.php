<?php
/**
 * To register custom taxonomy.
 *
 * @package movie-library-features
 */

namespace Movie_Library\Features\Inc\Taxonomies;

use Movie_Library\Features\Inc\Post_Types\Post_Type_Movie;


/**
 * Class Taxonomy_MovieTags
 */
class Taxonomy_MovieTags extends Base {

	/**
	 * Slug of taxonomy.
	 *
	 * @var string
	 */
	const SLUG = 'movie-tags';

	/**
	 * Labels for taxonomy.
	 *
	 * @return array
	 */
	public function get_labels() {

		return [
			'name'                       => _x( 'Movie Tags', 'taxonomy general name', 'movie-library-features' ),
			'singular_name'              => _x( 'Movie Tags', 'taxonomy singular name', 'movie-library-features' ),
			'search_items'               => __( 'Search Movie Tags', 'movie-library-features' ),
			'popular_items'              => __( 'Popular Movie Tags', 'movie-library-features' ),
			'all_items'                  => __( 'All Movie Tags', 'movie-library-features' ),
			'parent_item'                => null,
			'parent_item_colon'          => null,
			'edit_item'                  => __( 'Edit Movie Tags', 'movie-library-features' ),
			'update_item'                => __( 'Update Movie Tags', 'movie-library-features' ),
			'add_new_item'               => __( 'Add New Movie Tags', 'movie-library-features' ),
			'new_item_name'              => __( 'New Movie Tags Name', 'movie-library-features' ),
			'separate_items_with_commas' => __( 'Separate Movie Tags with commas', 'movie-library-features' ),
			'add_or_remove_items'        => __( 'Add or remove Movie Tags', 'movie-library-features' ),
			'choose_from_most_used'      => __( 'Choose from the most used Movie Tags', 'movie-library-features' ),
			'not_found'                  => __( 'No Movie Tags found.', 'movie-library-features' ),
			'menu_name'                  => __( 'Movie Tags', 'movie-library-features' ),
		];

	}

	/**
	 * To get argument to register taxonomy.
	 *
	 * @return array
	 */
	public function get_args() {

		return [
			'hierarchical'      => false,
			'show_ui'           => true,
			'show_admin_column' => true,
			'query_var'         => true,
			'show_in_rest'      => true,
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
