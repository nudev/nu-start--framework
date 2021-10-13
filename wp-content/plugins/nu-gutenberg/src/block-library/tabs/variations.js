/**
 * WordPress dependencies
 */
import { __ } from "@wordpress/i18n";

const variations = [
	{
		name: "tabs-horizontal",
		isDefault: true,
		title: __("Horizontal"),
		description: __("Tabs shown in a row."),
		attributes: { orientation: "horizontal" },
		scope: ["transform"],
	},
	{
		name: "tabs-vertical",
		title: __("Vertical"),
		description: __("Tabs shown in a column."),
		attributes: { orientation: "vertical" },
		scope: ["transform"],
	},
];

export default variations;
