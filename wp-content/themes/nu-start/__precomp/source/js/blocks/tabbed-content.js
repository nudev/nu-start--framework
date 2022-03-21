/* 
	PostsGrid Block - Scripts
*/

//
(function ($, window, document) {
	/**
	 *   ... code out here will run immediately on load
	 */
	//

	/**
	 *   ... code in here will run after jQuery says document is ready
	 */
	//
	$(function () {
		// code is poetry...

		const tabbed_content = {
			_init: function (index, block_el) {

				console.log('loaded');
				
				let $tab_item_titles = [];
				let $tab_titles_container = $(block_el).find(
					".tabs-titles-container"
				);
				let $tab_items = $(block_el).find(".tabbed-content-item");

				$tab_items.each(function (index, element) {
					let $title = $(element).data("title");
					let $active = $(element).data("active");
					let $str =
						'<p class="tab-title" data-active="' +
						$active +
						'"><span>' + 
						$title +
						"</span></p>";
					$tab_titles_container.append($str);
				});

				this._handleTabbing(block_el);
			},
			_handleTabbing: function (block_el) {
				$(block_el).on("click", ".tab-title", function (e) {
					$(e.target).siblings().attr("data-active", "false");
					$(e.target).attr("data-active", "true");

					let $index = $(e.target).index();

					let $tab_items = $(block_el).find(".tabbed-content-item");

					$tab_items.attr("data-active", "false");
					$($tab_items[$index]).attr("data-active", "true");
				});
			},
		};

		$(".acf-block.tabbed-content").each(function (index, element) {
			// front end
			tabbed_content._init(index, element);
		});

		// code was poetry...
	});
})(window.jQuery, window, document);
