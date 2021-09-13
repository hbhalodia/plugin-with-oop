<?php
/**
 * Template for example meta.
 *
 * @package movie-library-features
 */

global $post;

$example_meta = get_post_meta( $post->ID, 'metabox-example-2', true );
?>
<div>
	<h3><?php esc_html_e( 'Example meta', 'movie-library-features' ); ?></h3>
	<input type="text" name="example-meta" value="<?php echo esc_attr( $example_meta ); ?>" />
</div>
