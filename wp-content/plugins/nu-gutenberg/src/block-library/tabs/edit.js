/**
 *  ? include this blocks stylesheets
 */
import "./index.scss";

/**
 * External dependencies
 */
import classnames from "classnames";
import { dropRight, get, times } from "lodash";

/**
 * WordPress dependencies
 */
import { __ } from "@wordpress/i18n";
import {
  Notice,
  PanelBody,
  RangeControl,
  ToggleControl,
} from "@wordpress/components";

import {
  InnerBlocks,
  BlockControls,
  BlockVerticalAlignmentToolbar,
  __experimentalUseInnerBlocksProps as useInnerBlocksProps,
  useBlockProps,
  InspectorControls,
  __experimentalBlockVariationPicker,
  PanelColorSettings,
  withColors,
  store as blockEditorStore,
} from "@wordpress/block-editor";
//
import { withDispatch, useDispatch, useSelect } from "@wordpress/data";
//
import {
  createBlock,
  createBlocksFromInnerBlocksTemplate,
  store as blocksStore,
} from "@wordpress/blocks";

/**
 *
 */
const ALLOWED_BLOCKS = ["nu-blocks/tabs-item"];

/**
 *
 */

function TabsEditContainer({
  attributes,
  setAttributes,
  updateTabs,
  updateAlignment,
  clientId,
}) {
  const { verticalAlignment } = attributes;

  const { count } = useSelect(
    (select) => {
      return {
        count: select(blockEditorStore).getBlockCount(clientId),
      };
    },
    [clientId]
  );
  const blockProps = useBlockProps({});
  const innerBlocksProps = useInnerBlocksProps(blockProps, {
    allowedBlocks: ALLOWED_BLOCKS,
    orientation: "horizontal",
    // renderAppender: false,
    // __experimentalCaptureToolbars: true,
    // templateInsertUpdatesSelection: false,
  });

  return (
    <>
      <BlockControls>
        <BlockVerticalAlignmentToolbar
          onChange={updateAlignment}
          value={verticalAlignment}
        />
      </BlockControls>
      <InspectorControls>
        <PanelBody>
          <RangeControl
            label={__("Tabs")}
            value={count}
            onChange={(value) => updateTabs(count, value)}
            min={1}
            max={Math.max(6, count)}
          />
          {count > 6 && (
            <Notice status="warning" isDismissible={false}>
              {__(
                "This tab count exceeds the recommended amount and may cause visual breakage."
              )}
            </Notice>
          )}
        </PanelBody>
      </InspectorControls>
      <div {...innerBlocksProps} />
    </>
  );
}

const TabsEditContainerWrapper = withDispatch(
  (dispatch, ownProps, registry) => ({
    /**
     * Update all child Column blocks with a new vertical alignment setting
     * based on whatever alignment is passed in. This allows change to parent
     * to overide anything set on a individual column basis.
     *
     * @param {string} verticalAlignment the vertical alignment setting
     */
    updateAlignment(verticalAlignment) {
      const { clientId, setAttributes } = ownProps;
      const { updateBlockAttributes } = dispatch(blockEditorStore);
      const { getBlockOrder } = registry.select(blockEditorStore);

      // Update own alignment.
      setAttributes({ verticalAlignment });

      // Update all child Column Blocks to match
      const innerBlockClientIds = getBlockOrder(clientId);
      innerBlockClientIds.forEach((innerBlockClientId) => {
        updateBlockAttributes(innerBlockClientId, {
          verticalAlignment,
        });
      });
    },

    /**
     * Updates the column count, including necessary revisions to child Column
     * blocks to grant required or redistribute available space.
     *
     * @param {number} previousTabs Previous column count.
     * @param {number} newTabs      New column count.
     */
    updateTabs(previousTabs, newTabs) {
      const { clientId } = ownProps;
      const { replaceInnerBlocks } = dispatch(blockEditorStore);
      const { getBlocks } = registry.select(blockEditorStore);

      let innerBlocks = getBlocks(clientId);

      // Redistribute available width for existing inner blocks.
      const isAddingTab = newTabs > previousTabs;

      if (isAddingTab) {
        innerBlocks = [
          ...innerBlocks,
          ...times(newTabs - previousTabs, () => {
            return createBlock("nu-blocks/tabs-item");
          }),
        ];
      } else {
        // The removed column will be the last of the inner blocks.
        innerBlocks = dropRight(innerBlocks, previousTabs - newTabs);
      }
      replaceInnerBlocks(clientId, innerBlocks);
    },
  })
)(TabsEditContainer);

function Placeholder({ clientId, name, setAttributes }) {
  const { blockType, defaultVariation, variations } = useSelect(
    (select) => {
      const { getBlockVariations, getBlockType, getDefaultBlockVariation } =
        select(blocksStore);

      return {
        blockType: getBlockType(name),
        defaultVariation: getDefaultBlockVariation(name, "block"),
        variations: getBlockVariations(name, "block"),
      };
    },
    [name]
  );
  const { replaceInnerBlocks } = useDispatch(blockEditorStore);
  const blockProps = useBlockProps();

  return (
    <div {...blockProps}>
      <__experimentalBlockVariationPicker
        icon={get(blockType, ["icon", "src"])}
        label={get(blockType, ["title"])}
        variations={variations}
        onSelect={(nextVariation = defaultVariation) => {
          if (nextVariation.attributes) {
            setAttributes(nextVariation.attributes);
          }
          if (nextVariation.innerBlocks) {
            replaceInnerBlocks(
              clientId,
              createBlocksFromInnerBlocksTemplate(nextVariation.innerBlocks),
              true
            );
          }
        }}
        allowSkip
      />
    </div>
  );
}

const TabsEdit = (props) => {
  const { clientId } = props;

  const hasInnerBlocks = useSelect(
    (select) => select(blockEditorStore).getBlocks(clientId).length > 0,
    [clientId]
  );
//   const Component = hasInnerBlocks ? TabsEditContainerWrapper : Placeholder;
  const Component = TabsEditContainerWrapper;

  return <Component {...props} />;
};

export default TabsEdit;
