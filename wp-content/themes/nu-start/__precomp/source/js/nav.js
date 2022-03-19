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
		let main_nav = {
			_init: function () {
				//
				// attach event handlers here
				//
			},
			//
			//
			//
		};

		main_nav._init();

		//
		// ? 	nav menu handler below
		//

		var tr_nav = {
			navlinks_el: $("header.header .navlinks"),
			navicons_el: $("header.header .navicons"),

			// Constructor
			_init: function () {
				// ? attach handler for sub-menus
				$("header.header .navlinks").on(
					"click",
					".navlinks-showsubmenu",
					this._submenuHandler
				);

				// ? attach handler for navicon / close (mobile)
				$("header.header").on(
					"click",
					".navicons",
					this._didClickNavIcons
				);

				// ? handle behavior when window resizes or scrolls
				$(window).on("resize scroll", this._onResizeScroll);

				// ? attach handler for revealing site-search
				$("#nu__sitesearch").on(
					"click",
					".nu__sitesearch_toggle, .nu__sitesearch-close",
					this._siteSearchHandler
				);

				//
				$(document).on("click", function (event) {
					if ($(event.target).closest("header.header").length === 0) {
						$(
							"header.header .navicons.revealed, header.header .navlinks--container.revealed, li.menu-item-has-children.revealed"
						).removeClass("revealed");
					}
				});
			},

			_submenuHandler: function (e) {
				let $parent_el = $(e.target.offsetParent);
				$parent_el.siblings().removeClass("revealed");
				$parent_el
					.siblings()
					.find(".menu-item.revealed")
					.removeClass("revealed");
				$parent_el.toggleClass("revealed"); // toggle this <li> reveal class (active state)
			},

			// Methods
			_didClickNavIcons: function (e) {
				$(this).toggleClass("revealed");
				$(this).next(".navlinks--container").toggleClass("revealed");
			},

			_didClickParent: function (e) {
				// ? stop the click from navigating (only toggles the menu open) --- for mobile
				if (
					window.innerWidth < 1025 &&
					!$(e.target.offsetParent).hasClass("revealed")
				) {
					e.preventDefault();
				}

				$(e.target.offsetParent).siblings().removeClass("revealed");

				$(e.target.offsetParent).toggleClass("revealed"); // toggle this <li> reveal class (active state)
			},

			_onResizeScroll: function (e) {
				$(
					"header.header .navicons.revealed, header.header .navlinks--container.revealed, li.menu-item-has-children.revealed"
				).removeClass("revealed");
			},

			//
			_siteSearchHandler: function (e) {
				$(e.delegateTarget).toggleClass("revealed");
			},
		};
		tr_nav._init();

		//
		// ? end of $.ready
		//
	});
})(window.jQuery, window, document);
