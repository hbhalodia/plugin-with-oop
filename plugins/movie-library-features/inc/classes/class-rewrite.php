<?php
/**
 * Rewrite class.
 *
 * @package movie-library-features
 */

namespace Movie_Library\Features\Inc;

use Movie_Library\Features\Inc\Traits\Singleton;

/**
 * Class Rewrite
 */
class Rewrite {

	use Singleton;

	/**
	 * Construct method.
	 */
	protected function __construct() {

		$this->setup_hooks();

	}

	/**
	 * To setup action/filter.
	 *
	 * @return void
	 */
	protected function setup_hooks() {

		add_action( 'init', array( $this, 'add_rewrite_rule_cpt' ) );

		// Filter to update permastruct.

		add_filter( 'post_type_link', array( $this, 'ml_recreate_permalink_rules' ), 10, 4 );

	}

	/**
	 * Undocumented function
	 *
	 * @return void
	 */
	public function add_rewrite_rule_cpt() {

		// Rewrite rules for the post permalinks.
		add_rewrite_rule(
			'movie\/([^\/]+)\/([^\/]+)-([0-9]{1,})\/?$',
			'index.php?post_type=movie&genre=$matches[1]&postname=$matches[2]&p=$matches[3]',
			'top'
		);

		// Rewrite rules for the archive movie page.
		add_rewrite_rule(
			'movie/?$',
			'index.php?post_type=movie',
			'top'
		);

		// Rewrite rules for the post permalinks.
		add_rewrite_rule(
			'person\/([^\/]+)\/([^\/]+)-([0-9]{1,})\/?$',
			'index.php?post_type=person&career=$matches[1]&name=$matches[2]&p=$matches[3]',
			'top'
		);

		// Rewrite rules for the archive person page.
		add_rewrite_rule(
			'person/?$',
			'index.php?post_type=person',
			'top'
		);

	}

	/**
	 * This function is used to recreate the permalinks rule for the movie cpt.
	 *
	 * @param string  $post_link The Post's Permalink.
	 * @param WP_Post $post WP_Post object.
	 * @param bool    $leavename Whether to keep the post name.
	 * @param bool    $sample Sample Permalink.
	 * @return string
	 */
	public function ml_recreate_permalink_rules( $post_link, $post, $leavename, $sample ) {

		if ( 'person' === $post->post_type ) {

			$is_any_term = ! empty( wp_get_object_terms( $post->ID, 'career' ) ) ? wp_get_object_terms( $post->ID, 'career' )[0]->slug : 'career-taxonomy';

			$post_link = str_replace(
				array( '%career%', '%postname%', '%post_id%', $post->post_name . '/' ),
				array(
					$is_any_term,
					$post->post_name,
					$post->ID,
					'',
				),
				$post_link
			);

			return $post_link;

		} elseif ( 'movie' === $post->post_type ) {

			$is_any_term = ! empty( wp_get_object_terms( $post->ID, 'genre' ) ) ? wp_get_object_terms( $post->ID, 'genre' )[0]->slug : 'genre-taxonomy';

			$post_link = str_replace(
				array( '%genre%', '%postname%', '%post_id%', $post->post_name . '/' ),
				array(
					$is_any_term,
					$post->post_name,
					$post->ID,
					'',
				),
				$post_link
			);

			return $post_link;

		} else {

			return $post_link;
		
		}

	}

}
