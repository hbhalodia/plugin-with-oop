<?php
/**
 * This file is used to create the class for the Person cpt.
 *
 * @package oop-demo-plugin
 */

/**
 * Class to generate the Person cpt.
 */
class Person {

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
	 * Contruct function of Person cpt.
	 */
	public function __construct() {

	}

	/**
	 * Function to register the cpt of person.
	 *
	 * @return void
	 */
	public function register() {
		add_action( 'init', array( $this, 'ml_person_cpt_init' ) );

		add_filter( 'post_updated_messages', array( $this, 'ml_person_updated_messages' ) );

		add_filter( 'bulk_post_updated_messages', array( $this, 'ml_person_bulk_updated_messages' ), 10, 2 );

	}

	/**
	 * Function to register the post type movie.
	 *
	 * @return void
	 */
	public function ml_person_cpt_init() {

		$this->create_arguments();

		register_post_type( 'person', $this->arguments );
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
			'supports'              => array( 'title', 'editor', 'excerpt', 'thumbnail', 'author' ),
			'has_archive'           => true,
			'rewrite'               => true,
			'query_var'             => true,
			'menu_position'         => null,
			'menu_icon'             => 'dashicons-admin-users',
			'show_in_rest'          => true,
			'rest_base'             => 'person',
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
			'name'                  => __( 'Person', 'movie-library-plugin' ),
			'singular_name'         => __( 'Person', 'movie-library-plugin' ),
			'all_items'             => __( 'All Persons', 'movie-library-plugin' ),
			'archives'              => __( 'Person Archives', 'movie-library-plugin' ),
			'attributes'            => __( 'Person Attributes', 'movie-library-plugin' ),
			'insert_into_item'      => __( 'Insert into person', 'movie-library-plugin' ),
			'uploaded_to_this_item' => __( 'Uploaded to this person', 'movie-library-plugin' ),
			'featured_image'        => _x( 'Featured Image', 'person', 'movie-library-plugin' ),
			'set_featured_image'    => _x( 'Set featured image', 'person', 'movie-library-plugin' ),
			'remove_featured_image' => _x( 'Remove featured image', 'person', 'movie-library-plugin' ),
			'use_featured_image'    => _x( 'Use as featured image', 'person', 'movie-library-plugin' ),
			'filter_items_list'     => __( 'Filter person list', 'movie-library-plugin' ),
			'items_list_navigation' => __( 'Person list navigation', 'movie-library-plugin' ),
			'items_list'            => __( 'Person list', 'movie-library-plugin' ),
			'new_item'              => __( 'New person', 'movie-library-plugin' ),
			'add_new'               => __( 'Add New Person', 'movie-library-plugin' ),
			'add_new_item'          => __( 'Add New person', 'movie-library-plugin' ),
			'edit_item'             => __( 'Edit person', 'movie-library-plugin' ),
			'view_item'             => __( 'View person', 'movie-library-plugin' ),
			'view_items'            => __( 'View person', 'movie-library-plugin' ),
			'search_items'          => __( 'Search person', 'movie-library-plugin' ),
			'not_found'             => __( 'No person found', 'movie-library-plugin' ),
			'not_found_in_trash'    => __( 'No person found in trash', 'movie-library-plugin' ),
			'parent_item_colon'     => __( 'Parent person:', 'movie-library-plugin' ),
			'menu_name'             => __( 'Persons', 'movie-library-plugin' ),
			'name_admin_bar'        => __( 'Person', 'movie-library-plugin' ),
		);
	}

	public function ml_person_updated_messages() {

	}

	public function ml_person_bulk_updated_messages() {

	}

}
