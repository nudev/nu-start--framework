/**
 * External dependencies
 */
import times from "lodash/times";
import memoize from "memize";
import Inspector from "./inspector";

/**
 * WordPress dependencies
 */
import { __ } from "@wordpress/i18n";
import { Component, Fragment } from "@wordpress/element";
import { InnerBlocks } from "@wordpress/block-editor";
import { Button, Tooltip } from "@wordpress/components";
import { compose } from "@wordpress/compose";
import { withDispatch, withSelect } from "@wordpress/data";
import { createBlock } from "@wordpress/blocks";
import { Icon, plus } from "@wordpress/icons";
/**
 * Lets webpack process CSS, SASS or SCSS files referenced in JavaScript files.
 * Those files can contain any CSS code that gets applied to the editor.
 *
 * @see https://www.npmjs.com/package/@wordpress/scripts#using-css
 */
 import "./index.scss";

// only allow the accordion item block as a direct-child
const ALLOWED_BLOCKS = ["nu-blocks/accordion-item"];

// returns the current number of accordion items
const getCount = memoize((count) => {
	return times(count, () => ["nu-blocks/accordion-item"]);
});

/**
 * Block edit function
 */
class AccordionEdit extends Component {
	render() {
		const { clientId, attributes, className, isSelected } = this.props;

		const { count } = attributes;

		const items = this.props.getBlocksByClientId(clientId);

		const handleEvent = () => {
			if (items[0].innerBlocks) {
				const lastId =
					items[0].innerBlocks[items[0].innerBlocks.length - 1]
						.clientId;
				let copyAttributes = {};

				if (lastId) {
					const lastBlockClient = this.props.getBlockAttributes(
						lastId
					);
					if (lastBlockClient.backgroundColor) {
						copyAttributes = Object.assign(copyAttributes, {
							backgroundColor: lastBlockClient.backgroundColor,
						});
					}

					if (lastBlockClient.borderColor) {
						copyAttributes = Object.assign(copyAttributes, {
							borderColor: lastBlockClient.borderColor,
						});
					}

					if (lastBlockClient.textColor) {
						copyAttributes = Object.assign(copyAttributes, {
							textColor: lastBlockClient.textColor,
						});
					}

					if (lastBlockClient.customTextColor) {
						copyAttributes = Object.assign(copyAttributes, {
							customTextColor: lastBlockClient.customTextColor,
						});
					}
				}

				const created = createBlock(
					"nu-blocks/accordion-item",
					copyAttributes
				);
				this.props.insertBlock(created, undefined, clientId);
			}
		};

		return (
			<Fragment>
				{isSelected && <Inspector {...this.props} />}
				<div className={className}>
					<InnerBlocks
						template={getCount(count)}
						allowedBlocks={ALLOWED_BLOCKS}
						__experimentalCaptureToolbars={true}
					/>
					{isSelected && (
						<div className="nublocks-block-appender">
							<Tooltip
								text={__("Add accordion item", "nublocks")}
							>
								<Button
									label={__("Add accordion item", "nublocks")}
									className="block-editor-button-block-appender"
									onMouseDown={handleEvent}
								>
									<Icon icon={plus} />
								</Button>
							</Tooltip>
						</div>
					)}
				</div>
			</Fragment>
		);
	}
}

export default compose([
	withSelect((select, props) => {
		const {
			getBlockAttributes,
			getBlocksByClientId,
			getBlockHierarchyRootClientId,
			getSelectedBlockClientId,
		} = select("core/block-editor");

		// Get clientID of the parent block.
		const rootClientId = getBlockHierarchyRootClientId(props.clientId);
		const selectedRootClientId = getBlockHierarchyRootClientId(
			getSelectedBlockClientId()
		);

		return {
			getBlockAttributes,
			getBlocksByClientId,
			isSelected:
				props.isSelected || rootClientId === selectedRootClientId,
		};
	}),

	withDispatch((dispatch) => {
		const { insertBlock } = dispatch("core/block-editor");

		return {
			insertBlock,
		};
	}),
])(AccordionEdit);
