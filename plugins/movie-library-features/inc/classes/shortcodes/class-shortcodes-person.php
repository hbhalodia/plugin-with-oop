<?php
/**
 * Register person shortcode.
 *
 * @package movie-library-features
 */

namespace Movie_Library\Features\Inc\Shortcodes;

use \Movie_Library\Features\Inc\Traits\Singleton;

/**
 * Class Shortcodes_Person
 */
class Shortcodes_Person {

	use Singleton;

	/**
	 * Construct method.
	 */
	public function __construct() {

		/**
		 * Register shortcode.
		 */
		add_shortcode( 'person', array( $this, 'shortcode_callback' ) );
	}

	/**
	 * Shortcode callback.
	 *
	 * @param array $atts attributes.
	 *
	 * @return string
	 */
	public function shortcode_callback( $atts ) {

		if ( ! empty( $atts ) ) {

			$atts = array_change_key_case( $atts, CASE_LOWER );

		}

		$shortcode_attributes = shortcode_atts(
			array(
				'career' => null,
			),
			$atts
		);

		$term_name = $shortcode_attributes['career'];

		if ( is_numeric( $term_name ) ) {

			$term_name = (int) $term_name;

		}

		$term_id = ( null === term_exists( $term_name, 'career' ) ) ? 0 : term_exists( $term_name, 'career' )['term_id']; // phpcs:ignore

		$args = array(
			'post_type'      => 'person',
			'posts_per_page' => -1,
			'fields'         => 'ids',
			'tax_query'      => array(  // phpcs:ignore WordPress.DB.SlowDBQuery.slow_db_query_tax_query 
				'taxonomy' => 'career',
				'field'    => 'term_id',
				'terms'    => $term_id,
			),
		);

		$person_posts = new \WP_Query( $args );
		$person_posts = $person_posts->posts;

		return movie_library_features_template(
			'shortcodes/person',
			array(
				'person_posts' => $person_posts,
			)
		);
	}

}
