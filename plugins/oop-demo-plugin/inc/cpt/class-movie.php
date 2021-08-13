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

	public function ml_movie_updated_messages() {

	}

	public function ml_movie_bulk_updated_messages() {

	}

}
