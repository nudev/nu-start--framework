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
		var tr_nav = {
			navlinks_el: $("header.header .navlinks"),
			navicons_el: $("header.header .navicons"),

			// Constructor
			_init: function () {
				// ! disabled because it makes you click twice --- but i think i needed it for keyboard nav
				$("header.header .navlinks").on(
					"click",
					"li.menu-item-has-children > a",
					this._didClickParent
				);

				//
				$("header.header").on(
					"click",
					".navicons",
					this._didClickNavIcons
				);

				$(window).on("resize scroll", this._onResizeScroll);

				$("#nu__sitesearch").on(
					"click",
					"a, button",
					this._siteSearchHandler
				);
			},

			// Methods
			_didClickNavIcons: function (e) {
				$(this).toggleClass("revealed");
				$(this).next(".navlinks").toggleClass("revealed");
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
					"header.header .navicons.revealed, header.header .navlinks.revealed, li.menu-item-has-children.revealed"
				).removeClass("revealed");
			},

			//
			_siteSearchHandler: function (e) {
				if (e.currentTarget.type == "button") {
					$(e.delegateTarget).removeClass("revealed");
				} else {
					$(e.delegateTarget).addClass("revealed");
				}
			},
		};
		tr_nav._init();
	});
})(window.jQuery, window, document);
