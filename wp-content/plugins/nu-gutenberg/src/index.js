
import { registerBlockType } from "@wordpress/blocks";


import * as accordion from "../src/block-library/accordion";
import * as accordion_item from "../src/block-library/accordion-item";
import * as tabbed_content from "../src/block-library/tabs";
import * as tabbed_content_item from "../src/block-library/tabs-item";


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
	[accordion, accordion_item].forEach(registerBlock);
	// [accordion, accordion_item, tabbed_content, tabbed_content_item].forEach(registerBlock);
};
registerBlocks();
