const path = require("path");
const defaultConfig = require("@wordpress/scripts/config/webpack.config");

module.exports = {
	...defaultConfig,
	module: {
		...defaultConfig.module,
		rules: [...defaultConfig.module.rules],
	},
	entry: {
		...defaultConfig.entry,
	},
	output: {
		...defaultConfig.output,
	},
};
