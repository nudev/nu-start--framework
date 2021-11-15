/**
 * internal stylesheet
 */
import "./index.scss";

/**
 *
 */
import { useSelect } from "@wordpress/data";
import {
  InspectorControls,
  BlockControls,
  InnerBlocks,
  useSetting,
  useBlockProps,
  __experimentalUseInnerBlocksProps as useInnerBlocksProps,
  RichText,
  store as blockEditorStore,
} from "@wordpress/block-editor";

//
function TabEdit({ attributes, setAttributes, clientId }) {
  //
  const { hasInnerBlocks, themeSupportsLayout } = useSelect(
    (select) => {
      const { getBlock, getSettings } = select(blockEditorStore);
      const block = getBlock(clientId);
      return {
        hasInnerBlocks: !!(block && block.innerBlocks.length),
        themeSupportsLayout: getSettings()?.supportsLayout,
      };
    },
    [clientId]
  );
  //
  const defaultLayout = useSetting("layout") || {};
  const { tagName: TagName = "div", templateLock, layout = {} } = attributes;
  const usedLayout = !!layout && layout.inherit ? defaultLayout : layout;
  const { type = "default" } = usedLayout;
  const layoutSupportEnabled = themeSupportsLayout || type !== "default";


  const { title } = attributes;
  //
  //

  //
  const blockProps = useBlockProps();
  //
  const innerBlocksProps = useInnerBlocksProps(
    layoutSupportEnabled
      ? blockProps
      : { className: "wp-block-tabs__inner-container" },
    {
      templateLock,
      renderAppender: hasInnerBlocks
        ? undefined
        : InnerBlocks.ButtonBlockAppender,
      __experimentalLayout: layoutSupportEnabled ? usedLayout : undefined,
    }
  );

  return (
    <>
      <RichText
        tagName="p"
        placeholder="Tab Title..."
        value={title}
        onChange={(nextTitle) => setAttributes({ title: nextTitle })}
        keepPlaceholderOnFocus
        onRemove={(forward) => {
          const hasEmptyTitle =
            typeof title === "undefined" ||
            (typeof title !== "undefined" && title.length === 0);

          if (!forward && hasEmptyTitle) {
            onReplace([]);
          }
        }}
      />
      {layoutSupportEnabled && <TagName {...innerBlocksProps} />}
    </>
  );
}

export default TabEdit;
