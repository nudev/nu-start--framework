import memoize from "memize";
import times from "lodash/times";
import classnames from "classnames";
import { useSelect } from "@wordpress/data";

import {
	InnerBlocks,
	useBlockProps,
	__experimentalUseInnerBlocksProps as useInnerBlocksProps,
	BlockControls,
	JustifyContentControl,
	InspectorControls,
	RichText,
} from "@wordpress/block-editor";

// only allow tab items
// const ALLOWED_BLOCKS = ["nu-blocks/tabs-item"];
const ALLOWED_BLOCKS = []; // ? blocks with this as parent still allowed; disables all others

// by default, add one tab
const TABS_TEMPLATE = [["nu-blocks/tabs-item"]];

function TabsEdit({
	attributes: { orientation, contentJustification },
	setAttributes,
}) {

	console.log(props);

	// separate classnames for parent into a constant
	const parentClasses = classnames({
		"is-vertical": orientation === "vertical",
	});

	// parent block props
	const blockProps = useBlockProps({
		className: parentClasses,
	});


	// ? seems like referencing block.json is the only way to know this
	// innerblock props (defaults)
	const innerBlocksProps = useInnerBlocksProps(blockProps, {
		orientation,
		allowedBlocks: ALLOWED_BLOCKS,
		template: TABS_TEMPLATE,
		templateLock: false,
		templateInsertUpdatesSelection: false,
	});

	
	return (
		<>
			<div {...blockProps}>
				<div {...innerBlocksProps} />
			</div>
		</>
	);
}
export default TabsEdit;
