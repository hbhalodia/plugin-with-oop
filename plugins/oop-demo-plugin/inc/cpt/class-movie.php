<?php
/**
 * This file is used to create the class for the Movie cpt.
 *
 * @package oop-demo-plugin
 */

/**
 * Class to generate the movie cpt.
 */
class Movie {

	/**
	 * Arguments to pass in the register post type.
	 *
	 * @var array
	 */
	public $arguments = array();

	/**
	 * Label arguements to pass to the arguments.
	 *
	 * @var array
	 */
	public $label_arguments = array();

	/**
	 * Contruct function of Movie cpt.
	 */
	public function __construct() {

	}

	/**
	 * Function to register the cpt of movie.
	 *
	 * @return void
	 */
	public function register() {
		add_action( 'init', array( $this, 'ml_movie_cpt_init' ) );

		add_filter( 'post_updated_messages', array( $this, 'ml_movie_updated_messages' ) );

		add_filter( 'bulk_post_updated_messages', array( $this, 'ml_movie_bulk_updated_messages' ), 10, 2 );
	}

	/**
	 * Function to register the post type movie.
	 *
	 * @return void
	 */
	public function ml_movie_cpt_init() {

		$this->create_arguments();

		register_post_type( 'movie', $this->arguments );
	}

	/**
	 * Fucntion to create the arguments.
	 *
	 * @return void
	 */
	public function create_arguments() {
		$this->create_labels_argument();

		$this->arguments = array(
			'labels'                => $this->label_arguments,
			'public'                => true,
			'hierarchical'          => false,
			'show_ui'               => true,
			'show_in_nav_menus'     => true,
			'supports'              => array( 'title', 'editor', 'excerpt', 'thumbnail', 'author', 'comments' ),
			'has_archive'           => true,
			'rewrite'               => true,
			'query_var'             => true,
			'menu_position'         => null,
			'menu_icon'             => 'dashicons-button',
			'show_in_rest'          => true,
			'rest_base'             => 'movie',
			'rest_controller_class' => 'WP_REST_Posts_Controller',
		);

	}

	/**
	 * Function to create the label arguments for the post type.
	 *
	 * @return void
	 */
	public function create_labels_argument() {

		$this->label_arguments = array(
			'name'                  => __( 'Movies', 'movie-library-plugin' ),
			'singular_name'         => __( 'Movie', 'movie-library-plugin' ),
			'all_items'             => __( 'All Movies', 'movie-library-plugin' ),
			'archives'              => __( 'Movie Archives', 'movie-library-plugin' ),
			'attributes'            => __( 'Movie Attributes', 'movie-library-plugin' ),
			'insert_into_item'      => __( 'Insert into Movie', 'movie-library-plugin' ),
			'uploaded_to_this_item' => __( 'Uploaded to this Movie', 'movie-library-plugin' ),
			'featured_image'        => _x( 'Featured Image', 'movie', 'movie-library-plugin' ),
			'set_featured_image'    => _x( 'Set featured image', 'movie', 'movie-library-plugin' ),
			'remove_featured_image' => _x( 'Remove featured image', 'movie', 'movie-library-plugin' ),
			'use_featured_image'    => _x( 'Use as featured image', 'movie', 'movie-library-plugin' ),
			'filter_items_list'     => __( 'Filter Movies list', 'movie-library-plugin' ),
			'items_list_navigation' => __( 'Movies list navigation', 'movie-library-plugin' ),
			'items_list'            => __( 'Movies list', 'movie-library-plugin' ),
			'new_item'              => __( 'New Movie', 'movie-library-plugin' ),
			'add_new'               => __( 'Add New Movie', 'movie-library-plugin' ),
			'add_new_item'          => __( 'Add New Movie', 'movie-library-plugin' ),
			'edit_item'             => __( 'Edit Movie', 'movie-library-plugin' ),
			'view_item'             => __( 'View Movie', 'movie-library-plugin' ),
			'view_items'            => __( 'View Movies', 'movie-library-plugin' ),
			'search_items'          => __( 'Search movies', 'movie-library-plugin' ),
			'not_found'             => __( 'No movies found', 'movie-library-plugin' ),
			'not_found_in_trash'    => __( 'No movies found in trash', 'movie-library-plugin' ),
			'parent_item_colon'     => __( 'Parent Movie:', 'movie-library-plugin' ),
			'menu_name'             => __( 'Movies', 'movie-library-plugin' ),
			'name_admin_bar'        => __( 'Movie', 'movie-library-plugin' ),
		);
	}

	/**
	 * Sets the post updated messages for the `movie` post type.
	 *
	 * @param  array $messages Post updated messages.
	 * @return array Messages for the `movie` post type.
	 */
	public function ml_movie_updated_messages( $messages ) {
		global $post;

		$permalink = get_permalink( $post );

		$messages['movie'] = array(
			0  => '', // Unused. Messages start at index 1.
			/* translators: %s: post permalink */
			1  => sprintf( __( 'Movie updated. <a target="_blank" href="%s">View Movie</a>', 'movie-library-plugin' ), esc_url( $permalink ) ),
			2  => __( 'Custom field updated.', 'movie-library-plugin' ),
			3  => __( 'Custom field deleted.', 'movie-library-plugin' ),
			4  => __( 'Movie updated.', 'movie-library-plugin' ),
			/* translators: %s: date and time of the revision */
			5  => isset( $_GET['revision'] ) ? sprintf( __( 'Movie restored to revision from %s', 'movie-library-plugin' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false, // phpcs:ignore WordPress.Security.NonceVerification.Recommended
			/* translators: %s: post permalink */
			6  => sprintf( __( 'Movie published. <a href="%s">View Movie</a>', 'movie-library-plugin' ), esc_url( $permalink ) ),
			7  => __( 'Movie saved.', 'movie-library-plugin' ),
			/* translators: %s: post permalink */
			8  => sprintf( __( 'Movie submitted. <a target="_blank" href="%s">Preview Movie</a>', 'movie-library-plugin' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
			/* translators: 1: Publish box date format, see https://secure.php.net/date 2: Post permalink */
			9  => sprintf( __( 'Movie scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview Movie</a>', 'movie-library-plugin' ), date_i18n( __( 'M j, Y @ G:i', 'movie-library-plugin' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
			/* translators: %s: post permalink */
			10 => sprintf( __( 'Movie draft updated. <a target="_blank" href="%s">Preview Movie</a>', 'movie-library-plugin' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
		);

		return $messages;
	}

	/**
	 * Sets the bulk post updated messages for the `movie` post type.
	 *
	 * @param  array $bulk_messages Arrays of messages, each keyed by the corresponding post type. Messages are
	 *                              keyed with 'updated', 'locked', 'deleted', 'trashed', and 'untrashed'.
	 * @param  int[] $bulk_counts   Array of item counts for each message, used to build internationalized strings.
	 * @return array Bulk messages for the `movie` post type.
	 */
	public function ml_movie_bulk_updated_messages( $bulk_messages, $bulk_counts ) {
		global $post;

		$bulk_messages['movie'] = array(
			/* translators: %s: Number of movies. */
			'updated'   => _n( '%s movie updated.', '%s movies updated.', $bulk_counts['updated'], 'movie-library-plugin' ),
			'locked'    => ( 1 === $bulk_counts['locked'] ) ? __( '1 Movie not updated, somebody is editing it.', 'movie-library-plugin' ) :
							/* translators: %s: Number of movies. */
							_n( '%s movie not updated, somebody is editing it.', '%s movies not updated, somebody is editing them.', $bulk_counts['locked'], 'movie-library-plugin' ),
			/* translators: %s: Number of movies. */
			'deleted'   => _n( '%s movie permanently deleted.', '%s movies permanently deleted.', $bulk_counts['deleted'], 'movie-library-plugin' ),
			/* translators: %s: Number of movies. */
			'trashed'   => _n( '%s movie moved to the Trash.', '%s movies moved to the Trash.', $bulk_counts['trashed'], 'movie-library-plugin' ),
			/* translators: %s: Number of movies. */
			'untrashed' => _n( '%s movie restored from the Trash.', '%s movies restored from the Trash.', $bulk_counts['untrashed'], 'movie-library-plugin' ),
		);

		return $bulk_messages;

	}

}
