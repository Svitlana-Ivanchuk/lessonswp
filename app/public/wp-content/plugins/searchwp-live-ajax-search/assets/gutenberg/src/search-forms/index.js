/**
 * Registers a new block provided a unique name and an object defining its behavior.
 *
 * @see https://developer.wordpress.org/block-editor/developers/block-api/#registering-a-block
 */
import { registerBlockType } from '@wordpress/blocks';

/**
 * Lets webpack process CSS, SASS or SCSS files referenced in JavaScript files.
 * All files containing `style` keyword are bundled together. The code used
 * gets applied both to the front of your site and to the editor. All other files
 * get applied to the editor only.
 *
 * @see https://www.npmjs.com/package/@wordpress/scripts#using-css
 */
import './style.scss';
import './editor.scss';

/**
 * Internal dependencies
 */
import Edit from './edit';
import save from './save';
import metadata from './block.json';

/**
 * Every block starts by registering a new block type definition.
 *
 * @see https://developer.wordpress.org/block-editor/developers/block-api/#registering-a-block
 */
registerBlockType(
	metadata.name,
	{
		/**
		 * Used to construct a preview for the block to be shown in the block inserter.
		 */
		example: {
			attributes: {
				message: 'SearchWP',
			},
		},
		/**
		 * The block edit function.
		 *
		 * @see ./edit.js
		 */
		edit: Edit,

		/**
		 * The block save function.
		 *
		 * @see ./save.js
		 */
		save,
	}
);
