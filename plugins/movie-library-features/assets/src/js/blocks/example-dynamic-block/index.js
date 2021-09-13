/**
 * Example block.
 * Delete or update this block as needed.
 *
 * @package movie-library-features
 */

const { registerBlockType } = wp.blocks;
const { ServerSideRender } = wp.editor;
const { __ } = wp.i18n;

registerBlockType( 'movie-library-features/example-dynamic-block', {

	/**
	 * Block title.
	 *
	 * @member {string}
	 */
	title: __( 'Example Dynamic Block', 'movie-library-features' ),

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
	 * Block Attributes.
	 *
	 * @member {Object}
	 */
	attributes: {
		postId: {
			type: 'integer',
			default: 0
		}
	},

	/**
	 * Describes the structure of the block in the context of the editor.
	 *
	 * @param {Object} props block props.
	 * @return {Object} Block elements.
	 */
	edit( props ) {
		const { attributes } = props;

		return (
			<ServerSideRender
				block="movie-library-features/example-dynamic-block"
				attributes={ attributes }
			/>
		);
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
