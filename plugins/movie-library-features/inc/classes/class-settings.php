<?php
/**
 * To load the settings of the plugin.
 *
 * @package movie-library-features
 */

namespace Movie_Library\Features\Inc;

use \Movie_Library\Features\Inc\Traits\Singleton;

/**
 * Class Settings
 */
class Settings {

	use Singleton;

	/**
	 * Construct method.
	 */
	protected function __construct() {

		$this->setup_hooks();

	}

	/**
	 * To setup action filters.
	 *
	 * @return void
	 */
	protected function setup_hooks() {

		add_action( 'admin_menu', array( $this, 'add_settings_menu_page' ) );
		add_action( 'admin_init', array( $this, 'register_settings_field' ) );

	}

	/**
	 * This function is used to add the submenu page inside the settings menu page.
	 *
	 * @return void
	 */
	public function add_settings_menu_page() {

		add_options_page(
			__( 'Movie Library Settings', 'movie-library-features' ),
			__( 'Movie Library Settings', 'movie-library-features' ),
			'manage_options',
			__( 'movie_library_settings', 'movie-library-features' ),
			array( $this, 'movie_library_settings_html' )
		);

	}

	/**
	 * This function is used to create the UI part of the custom settings page of the movie-library-plugin.
	 *
	 * @return void
	 */
	public function movie_library_settings_html() {

		if ( ! current_user_can( 'manage_options' ) ) {
			return;
		}

		?>
		<div class="wrap">
			<h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
			<form action="options.php" method="post">
				<?php

					settings_fields( 'movie-options' );

					do_settings_sections( 'movie-options' );

					submit_button( __( 'Save Settings', 'movie-library-plugin' ) );

				?>
			</form>
		</div>

		<?php
	}


	/**
	 * This function is used to register the settigns page , settings section and settings field.
	 *
	 * @return void
	 */
	public function register_settings_field() {

		register_setting( 'movie-options', 'movie_option' );

		add_settings_section(
			'movie_settings_section',
			__( 'Movie Libray Setting', 'movie-library-plugin' ),
			'',
			'movie-options'
		);

		add_settings_field(
			'movie_settings_field',
			__( 'Movie Library Field', 'movie-library-plugin' ),
			array( $this, 'movie_field_html' ),
			'movie-options',
			'movie_settings_section'
		);

	}

	/**
	 * This function is used to create the UI part of the settings field of the settings section group.
	 *
	 * @param array $args - arguement of the settings section.
	 * @return void
	 */
	public function movie_field_html( $args ) {

		$options = get_option( 'movie_option' );
		?>
		<input type="checkbox" name="movie_option" 
		<?php
			checked( $options, 'checked', true );
		?>
		value="checked"
		/> 
		<?php esc_html_e( 'This would delete all the plugin content including metaboxes and custom post types.', 'movie-library-plugin' ); ?>
		<?php

	}
}
