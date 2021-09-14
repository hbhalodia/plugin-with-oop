<?php
/**
 * Register person shortcode.
 *
 * @package movie-library-features
 */

namespace Movie_Library\Features\Inc\Dashboard_Widgets;

use \Movie_Library\Features\Inc\Traits\Singleton;

/**
 * Class Dashboard_Widgets_Recent_Movie
 */
class Dashboard_Widgets_Recent_Movie {

	use Singleton;

	/**
	 * Construct method.
	 */
	public function __construct() {

		/**
		 * Register Dashboard Widget.
		 */
		add_action( 'wp_dashboard_setup', array( $this, 'recent_movie_dashboard_widget' ) );
	}

	/**
	 * Add a widget to the dashboard.
	 *
	 * This function is hooked into the 'wp_dashboard_setup' action below.
	 */
	public function recent_movie_dashboard_widget() {

		wp_add_dashboard_widget(
			'ml_recent_movie_widget',
			__( 'Recent Movies', 'movie-library-plugin' ),
			array( $this, 'recent_movie_dashboard_widget_html' ),
			'',
			'',
			'',
			'high'
		);

	}

	/**
	 * Create the function to output the content of our Dashboard Widget of `recent movie` for movie post.
	 */
	public function recent_movie_dashboard_widget_html() {

		$arguement_for_query = array(
			'post_type'              => 'movie',
			'post_status'            => 'publish',
			'posts_per_page'         => 5,
			'no_found_rows'          => true,
			'update_post_meta_cache' => false,
			'update_post_term_cache' => false,
			'fields'                 => 'ids',
		);

		$recent_movies = new \WP_Query( $arguement_for_query );

		$recent_movies = $recent_movies->posts;

		movie_library_features_template(
			'dashboard-widgets/recent-movies',
			array(
				'recent_movies' => $recent_movies,
			),
			true
		);

	}

}
