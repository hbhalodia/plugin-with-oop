<?php
/**
 * WP CLI command to generate Person posts.
 *
 * @package movie-library-features
 */

namespace Movie_Library\Features\Inc\WP_CLI;

/**
 * Implements person command.
 */
class Dummy_Person {

	/**
	 * Creates the person posts.
	 *
	 * ## OPTIONS
	 *
	 * <count>
	 * : Number of posts to generate.
	 *
	 * [--post_status=<post_status>]
	 * : Whether to publish the post or to keep in draft. Deafult draft.
	 * ---
	 * default: draft
	 * options:
	 *   - publish
	 *   - draft
	 * ---
	 *
	 * ## EXAMPLES
	 *
	 *     wp person generate 5
	 *     wp person generate 2 --post_status=publish
	 *
	 * @when after_wp_load
	 */

	/**
	 * This function is used to generate the person posts based on users arguement.
	 *
	 * @param arguement $args - arguement to pass to the command.
	 * @param arguments $assoc_args - associative arguements to pass through command.
	 *
	 * @return void
	 */
	public function generate( $args, $assoc_args ) {

		$post_status = 'draft';

		$flag = 0;

		if ( isset( $assoc_args['post_status'] ) ) {

			$post_status = $assoc_args['post_status'];

		}

		if ( is_numeric( $post_status ) ) {

			$flag = 1;

		}

		if ( 'draft' !== $post_status && 'publish' !== $post_status ) {

			$flag = 1;

		}

		$post_count = $args[0];

		if ( ! is_numeric( $post_count ) || is_float( $post_count ) ) {

			$flag = 1;

		}

		if ( 1 === $flag ) {

			$message = __( 'Detected Type mismatch. Generating 5 posts with post status draft. ', 'movie-library-plugin' );

			\WP_CLI::warning( $message );

			$post_count  = 5;
			$post_status = 'draft';

		}

		for ( $post_counter = 1; $post_counter <= $post_count; $post_counter++ ) {

			$new_person_post = array(
				'post_title'  => __( 'Person : ', 'movie-library-plugin' ) . $post_counter,
				'post_type'   => 'person',
				'post_status' => $post_status,
			);

			$person_id = wp_insert_post( $new_person_post );

			$message = sprintf( '%s%s', __( 'Person Post Inserted : ', 'movie-library-plugin' ), esc_html( $person_id ) );

			\WP_CLI::success( $message );

		}

		$message = __( 'All Posts Inserted', 'movie-library-plugin' );

		\WP_CLI::success( $message );

	}

}
