<?php
/**
 * Register Person post type.
 *
 * @package movie-library-features
 */

namespace Movie_Library\Features\Inc\Post_Types;

/**
 * Class Post_Type_Example
 */
class Post_Type_Person extends Base {

	/**
	 * Slug of post type.
	 *
	 * @var string
	 */
	const SLUG = 'person';

	/**
	 * Post type label for internal uses.
	 *
	 * @var string
	 */
	const LABEL = 'Person';

	/**
	 * To get list of labels for post type.
	 *
	 * @return array
	 */
	public function get_labels() {

		return array(
			'name'               => _x( 'Person', 'post type general name', 'movie-library-features' ),
			'singular_name'      => _x( 'Person', 'post type singular name', 'movie-library-features' ),
			'menu_name'          => _x( 'Person', 'admin menu', 'movie-library-features' ),
			'name_admin_bar'     => _x( 'Person', 'add new on admin bar', 'movie-library-features' ),
			'add_new'            => _x( 'Add New', 'post', 'movie-library-features' ),
			'add_new_item'       => __( 'Add New Person', 'movie-library-features' ),
			'new_item'           => __( 'New Person', 'movie-library-features' ),
			'edit_item'          => __( 'Edit Person', 'movie-library-features' ),
			'view_item'          => __( 'View Person', 'movie-library-features' ),
			'all_items'          => __( 'All Person', 'movie-library-features' ),
			'search_items'       => __( 'Search Person', 'movie-library-features' ),
			'parent_item_colon'  => __( 'Parent Person:', 'movie-library-features' ),
			'not_found'          => __( 'No Person found.', 'movie-library-features' ),
			'not_found_in_trash' => __( 'No Person found in Trash.', 'movie-library-features' ),
		);

	}

	/**
	 * To get list of arguments for post type.
	 *
	 * @return array
	 */
	public function get_args() {

		return array(
			'show_in_rest'    => true,
			'hierarchical'    => false,
			'public'          => true,
			'has_archive'     => true,
			'menu_icon'       => 'dashicons-admin-users',
			'menu_position'   => 6,
			'capability_type' => array( 'ml_custom_post', 'ml_custom_posts' ),
			'map_meta_cap'    => true,
			'rewrite'         => array(
				'slug'       => 'person/%career%/%postname%-%post_id%',
				'with_front' => true,
			),
			'supports'        => array( 'title', 'editor', 'excerpt', 'thumbnail', 'author' ),
		);

	}
}
