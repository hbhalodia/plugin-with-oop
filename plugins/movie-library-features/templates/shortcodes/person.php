<?php
/**
 * Template for person short-code.
 *
 * @package movie-library-features
 */

?>

<table>
	<tr>
		<th><?php esc_html_e( 'Name', 'movie-library-features' ); ?> </th>
		<th><?php esc_html_e( 'Profile Picture', 'movie-library-features' ); ?></th>
		<th><?php esc_html_e( 'Career', 'movie-library-features' ); ?></th>
	</tr>
	<?php
	if ( is_array( $person_posts ) && ! empty( $person_posts ) ) {

		foreach ( $person_posts as $person_post ) {

			$person_name = get_the_title( $person_post );
			$career_name = wp_get_post_terms( $person_post, 'career', array( 'fields' => 'slugs' ) );
			?>
			<tr>
				<td><?php echo esc_html( $person_name ); ?></td>
				<td><?php echo get_the_post_thumbnail( $person_post, 'thumbnail' ); ?></td>
				<td><ul>
					<?php
					if ( is_array( $career_name ) ) {

						foreach ( $career_name as $career ) {
							printf( '<li>%s</li>', esc_html( $career ) );
						}
					}
					?>
					</ul>
				</td>
			</tr>
			<?php
		}
	}

	?>
</table>
