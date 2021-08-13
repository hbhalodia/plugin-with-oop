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

	/**
	 * Sets the post updated messages for the `person` post type.
	 *
	 * @param  array $messages Post updated messages.
	 * @return array Messages for the `person` post type.
	 */
	public function ml_person_updated_messages( $messages ) {
		global $post;

		$permalink = get_permalink( $post );

		$messages['person'] = array(
			0  => '', // Unused. Messages start at index 1.
			/* translators: %s: post permalink */
			1  => sprintf( __( 'Person updated. <a target="_blank" href="%s">View Person</a>', 'movie-library-plugin' ), esc_url( $permalink ) ),
			2  => __( 'Custom field updated.', 'movie-library-plugin' ),
			3  => __( 'Custom field deleted.', 'movie-library-plugin' ),
			4  => __( 'Person updated.', 'movie-library-plugin' ),
			/* translators: %s: date and time of the revision */
			5  => isset( $_GET['revision'] ) ? sprintf( __( 'Person restored to revision from %s', 'movie-library-plugin' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false, // phpcs:ignore WordPress.Security.NonceVerification.Recommended
			/* translators: %s: post permalink */
			6  => sprintf( __( 'Person published. <a href="%s">View person</a>', 'movie-library-plugin' ), esc_url( $permalink ) ),
			7  => __( 'Person saved.', 'movie-library-plugin' ),
			/* translators: %s: post permalink */
			8  => sprintf( __( 'Person submitted. <a target="_blank" href="%s">Preview person</a>', 'movie-library-plugin' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
			/* translators: 1: Publish box date format, see https://secure.php.net/date 2: Post permalink */
			9  => sprintf( __( 'Person scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview person</a>', 'movie-library-plugin' ), date_i18n( __( 'M j, Y @ G:i', 'movie-library-plugin' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
			/* translators: %s: post permalink */
			10 => sprintf( __( 'Person draft updated. <a target="_blank" href="%s">Preview person</a>', 'movie-library-plugin' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
		);

		return $messages;
	}

	/**
	 * Sets the bulk post updated messages for the `person` post type.
	 *
	 * @param  array $bulk_messages Arrays of messages, each keyed by the corresponding post type. Messages are
	 *                              keyed with 'updated', 'locked', 'deleted', 'trashed', and 'untrashed'.
	 * @param  int[] $bulk_counts   Array of item counts for each message, used to build internationalized strings.
	 * @return array Bulk messages for the `person` post type.
	 */
	public function ml_person_bulk_updated_messages( $bulk_messages, $bulk_counts ) {
		global $post;

		$bulk_messages['person'] = array(
			/* translators: %s: Number of person. */
			'updated'   => _n( '%s person updated.', '%s person updated.', $bulk_counts['updated'], 'movie-library-plugin' ),
			'locked'    => ( 1 === $bulk_counts['locked'] ) ? __( '1 person not updated, somebody is editing it.', 'movie-library-plugin' ) :
							/* translators: %s: Number of person. */
							_n( '%s person not updated, somebody is editing it.', '%s person not updated, somebody is editing them.', $bulk_counts['locked'], 'movie-library-plugin' ),
			/* translators: %s: Number of person. */
			'deleted'   => _n( '%s person permanently deleted.', '%s person permanently deleted.', $bulk_counts['deleted'], 'movie-library-plugin' ),
			/* translators: %s: Number of person. */
			'trashed'   => _n( '%s person moved to the Trash.', '%s person moved to the Trash.', $bulk_counts['trashed'], 'movie-library-plugin' ),
			/* translators: %s: Number of person. */
			'untrashed' => _n( '%s person restored from the Trash.', '%s person restored from the Trash.', $bulk_counts['untrashed'], 'movie-library-plugin' ),
		);

		return $bulk_messages;
	}

}
