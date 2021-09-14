<?php
/**
 * Register Movie post type.
 *
 * @package movie-library-features
 */

namespace Movie_Library\Features\Inc\Post_Types;

/**
 * Class Movie
 */
class Post_Type_Movie extends Base {

	/**
	 * Slug of post type.
	 *
	 * @var string
	 */
	const SLUG = 'movie';

	/**
	 * Post type label for internal uses.
	 *
	 * @var string
	 */
	const LABEL = 'Movie';

	/**
	 * To get list of labels for post type.
	 *
	 * @return array
	 */
	public function get_labels() {

		return array(
			'name'               => _x( 'Movie', 'post type general name', 'movie-library-features' ),
			'singular_name'      => _x( 'Movie', 'post type singular name', 'movie-library-features' ),
			'menu_name'          => _x( 'Movie', 'admin menu', 'movie-library-features' ),
			'name_admin_bar'     => _x( 'Movie', 'add new on admin bar', 'movie-library-features' ),
			'add_new'            => _x( 'Add New', 'post', 'movie-library-features' ),
			'add_new_item'       => __( 'Add New Movie', 'movie-library-features' ),
			'new_item'           => __( 'New Movie', 'movie-library-features' ),
			'edit_item'          => __( 'Edit Movie', 'movie-library-features' ),
			'view_item'          => __( 'View Movie', 'movie-library-features' ),
			'all_items'          => __( 'All Movie', 'movie-library-features' ),
			'search_items'       => __( 'Search Movie', 'movie-library-features' ),
			'parent_item_colon'  => __( 'Parent Movie:', 'movie-library-features' ),
			'not_found'          => __( 'No Movie found.', 'movie-library-features' ),
			'not_found_in_trash' => __( 'No Movie found in Trash.', 'movie-library-features' ),
		);

	}

	/**
	 * To get list of arguments for post type.
	 *
	 * @return array
	 */
	public function get_args() {

		return array(
			'show_in_rest'  => true,
			'hierarchical'  => false,
			'public'        => true,
			'has_archive'   => true,
			'menu_icon'     => 'dashicons-button',
			'menu_position' => 6,
			'rewrite'       => array(
				'slug'       => 'movie/%genre%/%postname%-%post_id%',
				'with_front' => true,
			),
			'supports'      => array( 'title', 'editor', 'excerpt', 'thumbnail', 'author', 'comments' ),
		);

	}
}
