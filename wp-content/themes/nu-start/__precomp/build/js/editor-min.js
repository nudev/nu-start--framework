/* 

*/



wp.hooks.addFilter(
    "blocks.getSaveContent.extraProps",
    "acfBlocks/addACFExtraProps",
    addACFExtraProps
);
function addACFExtraProps(props, blockType, attributes) {
    if (blockType.name !== 'acf/posts-grid') {
        return props;
    }
    props = Object.assign( props,
        {
            className: 'acf-posts-grid'
        } );
    return props;
}






// todo: update this stuff to above syntax; but fix linting first?
// ? this is all es5 native quick work
wp.domReady(function () {

	// ? remove many of the embeds to clean up the UI
	var embed_variations = [
		"amazon-kindle",
		"animoto",
		"cloudup",
		"collegehumor",
		"crowdsignal",
		"dailymotion",
		"facebook",
		"flickr",
		"imgur",
		"instagram",
		"issuu",
		"kickstarter",
		"meetup-com",
		"mixcloud",
		"reddit",
		"reverbnation",
		"screencast",
		"scribd",
		"slideshare",
		"smugmug",
		"soundcloud",
		"speaker-deck",
		"spotify",
		"ted",
		"tiktok",
		"tumblr",
		"twitter",
		"videopress",
		"wordpress",
		"wordpress-tv",
		//'vimeo'
		//'youtube'
	];

	for (var i = embed_variations.length - 1; i >= 0; i--) {
		wp.blocks.unregisterBlockVariation("core/embed", embed_variations[i]);
	}
});
