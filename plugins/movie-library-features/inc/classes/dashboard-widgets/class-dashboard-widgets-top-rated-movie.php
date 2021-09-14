<?php
/**
 * Register person shortcode.
 *
 * @package movie-library-features
 */

namespace Movie_Library\Features\Inc\Dashboard_Widgets;

use \Movie_Library\Features\Inc\Traits\Singleton;

/**
 * Class Dashboard_Widgets_Top_Rated_Movie
 */
class Dashboard_Widgets_Top_Rated_Movie {

	use Singleton;

	/**
	 * Construct method.
	 */
	public function __construct() {

		/**
		 * Register Dashboard Widget.
		 */
		add_action( 'wp_dashboard_setup', array( $this, 'top_rated_movie_dashboard_widget' ) );
	}

	/**
	 * Add a widget to the dashboard.
	 *
	 * This function is hooked into the 'wp_dashboard_setup' action below.
	 */
	public function top_rated_movie_dashboard_widget() {

		wp_add_dashboard_widget(
			'ml_top_rated_movie_widget',
			__( 'Top Rated Movies', 'movie-library-plugin' ),
			array( $this, 'top_rated_movie_dashboard_widget_html' ),
			'',
			'',
			'side',
			'high'
		);

	}

	/**
	 * Create the function to output the content of our Dashboard Widget of `recent movie` for movie post.
	 */
	public function top_rated_movie_dashboard_widget_html() {

		$arguement_for_query = array(
			'post_type'              => 'movie',
			'post_status'            => 'publish',
			'posts_per_page'         => 5,
			'no_found_rows'          => true,
			'update_post_meta_cache' => false,
			'update_post_term_cache' => false,
			'fields'                 => 'ids',
			'tax_query'              => array( // phpcs:ignore WordPress.DB.SlowDBQuery.slow_db_query_tax_query
				array(
					'taxonomy' => 'label',
					'field'    => 'slug',
					'terms'    => 'top-rated',
				),
			),
		);

		$top_rated_movie = new \WP_Query( $arguement_for_query );

		$top_rated_movie = $top_rated_movie->posts;

		movie_library_features_template(
			'dashboard-widgets/top-rated-movies',
			array(
				'top_rated_movie' => $top_rated_movie,
			),
			true
		);

	}

}
