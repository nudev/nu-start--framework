/**
 *
 * wordpress 5.8+ changed registration to recommending metadata and server side
 * @see https://make.wordpress.org/core/2021/06/23/block-api-enhancements-in-wordpress-5-8/
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-registration/
 */
import { registerBlockType } from "@wordpress/blocks";

/**
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-scripts/#working-with-build-scripts
 */
import "./styles/index.scss";
import "./styles/style.scss";

import * as accordion from "../src/block-library/accordion";
import * as accordion_item from "../src/block-library/accordion-item";
// import * as tabs from "../src/block-library/tabs";
// import * as tabs_item from "../src/block-library/tabs-item";

/**
 * Function to register an individual block.
 *
 * @param {Object} block The block to be registered.
 *
 */
const registerBlock = (block) => {
	
	if (!block) {
		return;
	}

	const { name, settings } = block;

	registerBlockType(name, {
		...settings,
	});
};

const registerBlocks = () => {
	// [tabs, tabs_item, accordion, accordion_item].forEach(registerBlock);
	[accordion, accordion_item].forEach(registerBlock);
};
registerBlocks();
