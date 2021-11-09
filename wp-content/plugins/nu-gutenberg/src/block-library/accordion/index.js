import { InnerBlocks } from "@wordpress/block-editor";
import { globe } from "@wordpress/icons";

import metadata from "./block.json";
import './style.scss';
import edit from "./edit";
import transforms from './transforms';

const { name } = metadata;

const settings = {
	...metadata,
	icon: globe,
	edit,
	transforms,
	save() {
		return (
			<div>
				<InnerBlocks.Content />
			</div>
		);
	},
};

export { name, settings };
