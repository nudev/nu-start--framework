(function ($, window, document) {
	//
	// ... code out here will run immediately on load
	//

	$(function () {
		//
		// ... code in here will run after jQuery says document is ready
		//
		const main_nav = {
			searchToggle: undefined,
			navicons: undefined,
			navlinks: undefined,
			submenuToggles: undefined,
			parentMenuItems: undefined,

			//
			_init: function () {
				//
				// hoist variables
				//
				main_nav.searchToggle = $("header.header #nu__sitesearch");
				main_nav.navicons = $("header.header > .container > .navicons");
				main_nav.navlinks = $(
					"header.header > .container > .navlinks--container > .navlinks"
				);
				main_nav.submenuToggles = $(main_nav.navlinks).find(
					".menu-item-has-children > button.navlinks-showsubmenu"
				);
				main_nav.parentMenuItems = $(main_nav.navlinks).find(
					".menu-item-has-children"
				);
				//
				// attach event handlers
				//
				$(document).on("click", function (event) {
					if ($(event.target).closest("header.header").length === 0) {
						main_nav._reset_all_revealed_elems();
					}
				});

				$(window).on(
					"resize scroll",
					main_nav._reset_all_revealed_elems
				);

				main_nav.searchToggle.on(
					"click",
					".site-search-icon",
					main_nav._did_click_searchform_toggle
				);

				main_nav.submenuToggles.on(
					"click",
					main_nav._did_click_submenu_toggle
				);

				main_nav.navicons.on("click", main_nav._did_click_navicons);

				// ? hoist this to window for debugging and such
				window.main_nav = main_nav;
			},
			//
			//
			//
			_reset_open_navmenu_items: function () {
				main_nav.parentMenuItems.removeClass("revealed");
			},
			//
			//
			//
			_reset_all_revealed_elems: function () {
				main_nav.parentMenuItems.removeClass("revealed");

				// ? this is a bit hacky...
				// ? - the real problem is that on mobile; when you click the search input it "scrolls" the page and closes everything!
				if (window.innerWidth >= 1024) {
					main_nav.navlinks
						.parent(".navlinks--container")
						.removeClass("revealed");

					main_nav.searchToggle.removeClass("revealed");
					main_nav.navicons.removeClass("revealed");
					$("body").removeClass("has-revealed-mobile-navmenu");
				}
			},
			//
			//
			//
			_did_click_searchform_toggle: function (e) {
				$(e.delegateTarget).toggleClass("revealed");
			},
			//
			//
			//
			_did_click_submenu_toggle: function (e) {
				// traverse up to the <li.menu-item-has-children>
				let the_toggled_menu_item = $(e.target.offsetParent);

				// traverse up to the top level of this stack in the menu
				let the_top_level_parent_item = $(e.target).closest(
					".navlinks > .menu > .menu-item"
				);

				// hide any open menus that are not in this items lineage
				$(the_top_level_parent_item).siblings().removeClass("revealed");
				$(the_top_level_parent_item)
					.siblings()
					.find(".revealed")
					.removeClass("revealed");
				// hide any open menus that are in this items lineage, except the furthest ancestor
				$(the_toggled_menu_item).siblings().removeClass("revealed");

				// reveal this item's submenu
				the_toggled_menu_item.toggleClass("revealed"); // toggle this <li> reveal class (active state)
			},
			//
			//
			//
			_did_click_navicons: function (e) {
				$("body").toggleClass("has-revealed-mobile-navmenu");
				$(this).toggleClass("revealed");
				$(this).next(".navlinks--container").toggleClass("revealed");
			},
			//
			//
			//
		};
		//
		//
		//
		main_nav._init();

		//
		// ? end of $.ready
		//
	});
})(window.jQuery, window, document);
