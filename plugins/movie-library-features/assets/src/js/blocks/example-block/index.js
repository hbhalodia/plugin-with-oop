/**
 * Example block.
 * Delete or update this block as needed.
 *
 * @package movie-library-features
 */

const { registerBlockType } = wp.blocks;
const { __ } = wp.i18n;

registerBlockType( 'movie-library-features/example-block', {

	/**
	 * Block title.
	 *
	 * @member {string}
	 */
	title: __( 'Example Block', 'movie-library-features' ),

	/**
	 * Block icons shown in editor.
	 *
	 * @member {string}
	 */
	icon: 'book',

	/**
	 * Block Category
	 *
	 * @member {string}
	 */
	category: 'common',

	/**
	 * Describes the structure of the block in the context of the editor.
	 *
	 * @return {Object} Block elements.
	 */
	edit() {
		return null;
	},

	/**
	 * Defines the way in which the different attributes should be combined
	 * into the final markup for front-end but actual template will be returned using php.
	 *
	 * @return {null} Null.
	 */
	save() {
		return null;
	}
} );
