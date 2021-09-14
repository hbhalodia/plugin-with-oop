<?php
/**
 * Template for recent-movie dashboard Widget.
 *
 * @package movie-library-features
 */

if ( is_array( $recent_movies ) && ! empty( $recent_movies ) ) {

	echo '<ol>';

	foreach ( $recent_movies as $movie_post_id ) {

		printf( '<h1><li><a href="%s">%s</a></li></h1>', esc_url( get_permalink( $movie_post_id ) ), esc_html( get_the_title( $movie_post_id ) ) );

	}

	echo '</ol>';

} else {

	printf( '<h1>%s</h1>', esc_html__( 'No Recent Movies.', 'movie-library-plugin' ) );

}
