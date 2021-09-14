<?php
/**
 * Template for top-rated-movie dashboard Widget.
 *
 * @package movie-library-features
 */

if ( is_array( $top_rated_movie ) && ! empty( $top_rated_movie ) ) {

	echo '<ol>';

	foreach ( $top_rated_movie as $movie_post_id ) {

		printf( '<h1><li><a href="%s">%s</a></li></h1>', esc_url( get_permalink( $movie_post_id ) ), esc_html( get_the_title( $movie_post_id ) ) );

	}

	echo '</ol>';

} else {

	printf( '<h1>%s</h1>', esc_html__( 'No Top Rated Movie Found.', 'movie-library-plugin' ) );

}
