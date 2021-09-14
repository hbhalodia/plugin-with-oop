<?php
/**
 * To load roles and capabilitites.
 *
 * @package movie-library-features
 */

namespace Movie_Library\Features\Inc;

use \Movie_Library\Features\Inc\Traits\Singleton;

/**
 * Class Roles_And_Capabilities
 */
class Roles_And_Capabilities {

	use Singleton;

	/**
	 * Construct method.
	 */
	protected function __construct() {

		// Load all shortcodes classes.

		$this->setup_hooks();

	}

	/**
	 * To setup action/filter.
	 *
	 * @return void
	 */
	protected function setup_hooks() {

		register_activation_hook( MOVIE_LIBRARY_FEATURES_PATH . '/movie-library-features.php', array( $this, 'add_roles_and_capabilities' ) );
		register_deactivation_hook( MOVIE_LIBRARY_FEATURES_PATH . '/movie-library-features.php', array( $this, 'remove_roles_and_capabilities' ) );

	}

	/**
	 * Function is called when register_activation_hook is called.
	 *
	 * @return void
	 */
	public function add_roles_and_capabilities() {

		$ml_capabilities = array(

			'upload_files' => true,

		);

		add_role(
			'movie_manager',
			'Movie Manager',
			$ml_capabilities
		);

		$all_roles = array( 'administrator', 'editor', 'movie_manager' );
		foreach ( $all_roles as $role ) {

			$role_cap = get_role( $role );

			// Adding Capabilites for the custom posts.
			$role_cap->add_cap( 'read' );
			$role_cap->add_cap( 'edit_ml_custom_post' );
			$role_cap->add_cap( 'read_ml_custom_post' );
			$role_cap->add_cap( 'delete_ml_custom_post' );

			$role_cap->add_cap( 'edit_ml_custom_posts' );
			$role_cap->add_cap( 'edit_others_ml_custom_posts' );
			$role_cap->add_cap( 'publish_ml_custom_posts' );
			$role_cap->add_cap( 'read_private_ml_custom_posts' );
			$role_cap->add_cap( 'delete_ml_custom_posts' );
			$role_cap->add_cap( 'delete_private_ml_custom_posts' );
			$role_cap->add_cap( 'delete_published_ml_custom_posts' );
			$role_cap->add_cap( 'delete_others_ml_custom_posts' );
			$role_cap->add_cap( 'edit_private_ml_custom_posts' );
			$role_cap->add_cap( 'edit_published_ml_custom_posts' );

			// Adding Capability for the Custom Taxonomy.
			$role_cap->add_cap( 'manage_movie_taxonomy' );
			$role_cap->add_cap( 'edit_movie_taxonomy' );
			$role_cap->add_cap( 'delete_movie_taxonomy' );
			$role_cap->add_cap( 'assign_movie_taxonomy' );

		}

	}

	/**
	 * Function is called when register_deactivation_hook is called.
	 *
	 * @return void
	 */
	public function remove_roles_and_capabilities() {

		remove_role( 'movie_manager' );

	}

}
