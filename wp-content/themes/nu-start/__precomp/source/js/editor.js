/* 

*/

// todo: update this stuff to above syntax; but fix linting first?
// ? this is all es5 native quick work
wp.domReady(function () {


	
	var i = 0;
	var disallowed_blocks = [
		"core/site-logo",
		"core/site-tagline",
		"core/site-title",
		"core/loginout",
		"core/home-link",
		"core/template-part",
		"core/term-description",
		// "core/posts-list",
		"core/post-author",
		"core/post-comment",
		"core/post-comment-content",
		"core/post-comment-date",
		"core/post-comments",
		"core/post-comments-count",
		"core/post-comments-form",
		"core/post-comments-link",
		"core/query",
		"core/post-template",
		"core/post-date",
		"core/post-content",
		"core/query-title",
		"core/query-pagination",
		"core/query-pagination-next",
		"core/query-pagination-numbers",
		"core/query-pagination-previous",
		"core/tag-cloud",
		"core/latest-posts",
		"core/latest-comments",
		"core/navigation-area",
		"core/comments-query-loop",
		"core/search",
		// 'core/missing',
		"core/audio",
		"core/file",
		"core/verse",
		"core/freeform",
		"core/page-list",
		"core/post-terms",
		"core/rss",
		"core/preformatted",
		"core/archives",
		"core/categories",
		"core/calendar",
		"core/missing",
		"core/more",
		"core/code",
		"core/nextpage",
		// VENDOR BLOCKS BELOW
		"ep/rating",
		"ep/counter",
		"ep/progress-bar",
		"ep/toggles",
		"ep/icon",
		"ep/lottie",
		"ep/countdown",

	];
	for (i = disallowed_blocks.length - 1; i >= 0; i--) {
		wp.blocks.unregisterBlockType(disallowed_blocks[i]);
	}

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
		"pinterest",
		"wolfram-cloud"
		//'vimeo'
		//'youtube'
	];

	for (i = embed_variations.length - 1; i >= 0; i--) {
		wp.blocks.unregisterBlockVariation("core/embed", embed_variations[i]);
	}
});
