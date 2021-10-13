/**
 *
 */

import {
	useBlockProps,
	__experimentalUseInnerBlocksProps as useInnerBlocksProps,
} from "@wordpress/block-editor";

//
function TabEdit(props) {
	const { attributes, setAttributes } = props;

	const blockProps = useBlockProps();
	const innerBlocksProps = useInnerBlocksProps(blockProps, {
		
	});

	return (
		<>
			<div>
				<h4>Tab Placeholder</h4>
				<div {...innerBlocksProps} />
			</div>
		</>
	);
}

export default TabEdit;
