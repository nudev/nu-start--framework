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
		// var tr_nav = {
		// 	navlinks_el: $("header.header .navlinks"),
		// 	navicons_el: $("header.header .navicons"),
		//
		// 	// Constructor
		// 	_init: function () {
		// 		// ! disabled because it makes you click twice --- but i think i needed it for keyboard nav
		// 		$("header.header .navlinks").on(
		// 			"click",
		// 			"li.menu-item-has-children > a",
		// 			this._didClickParent
		// 		);
		//
		// 		//
		// 		$("header.header").on(
		// 			"click",
		// 			".navicons",
		// 			this._didClickNavIcons
		// 		);
		//
		// 		$(window).on("resize scroll", this._onResizeScroll);
		//
		// 		$("#nu__sitesearch").on(
		// 			"click",
		// 			"a, button",
		// 			this._siteSearchHandler
		// 		);
		// 	},
		//
		// 	// Methods
		// 	_didClickNavIcons: function (e) {
		// 		$(this).toggleClass("revealed");
		// 		$(this).next(".navlinks").toggleClass("revealed");
		// 	},
		//
		// 	_didClickParent: function (e) {
		// 		// ? stop the click from navigating (only toggles the menu open) --- for mobile
		// 		if ( window.innerWidth < 1025 && !$(e.target.offsetParent).hasClass("revealed")  ) {
		// 			e.preventDefault();
		// 		}
		//
		// 		$(e.target.offsetParent).siblings().removeClass("revealed");
		//
		// 		$(e.target.offsetParent).toggleClass("revealed"); // toggle this <li> reveal class (active state)
		// 	},
		//
		// 	_onResizeScroll: function (e) {
		// 		$(
		// 			"header.header .navicons.revealed, header.header .navlinks.revealed, li.menu-item-has-children.revealed"
		// 		).removeClass("revealed");
		// 	},
		//
		// 	//
		// 	_siteSearchHandler: function (e) {
		// 		if (e.currentTarget.type == "button") {
		// 			$(e.delegateTarget).removeClass("revealed");
		// 		} else {
		// 			$(e.delegateTarget).addClass("revealed");
		// 		}
		// 	},
		// };
		// tr_nav._init();

		/**
			* Handle the Desktop Nav Behaviors
			*/
			var Theme = {};

		Theme.Nav = {
			// all li
			toplevel: $('.navlinks > ul > li'),
			// li with dropdowns
			dropdowns: $('.navlinks > ul > li.menu-item-has-children'),
			mq: window.matchMedia('(min-width: 80em)'),

			/**
			* initialize nav scripts
			*/
			_init: function _init() {
				// add a menu toggle button for keyboard users
				Theme.Nav.dropdowns.each(function (i) {
					var link = $(this).find('> a');
					var linkText = link.text();
					var menu = $(this).find('.sub-menu');
					var buttonText = $('<span>', {
						'text': "Toggle ".concat(linkText, " submenu"),
						'class': 'screen-reader-text'
					});
					var button = $('<button>', {
						'class': 'menu-item-toggle',
						'aria-controls': "dropdown-".concat(i),
						'aria-expanded': false
					});
					console.log(link);
					button.append(buttonText);
					menu.attr('id', "dropdown-".concat(i));
					button.insertAfter(link);
					button.on('click', Theme.Nav._doDropdowns);
				}); // handle clicks on the dropdown parent items

				Theme.Nav.dropdowns.on('hover', Theme.Nav._doDropdowns);
			},

			/**
				* Handle Dropdowns Clicks
				* @param {event} e
				*/
			_doDropdowns: function _doDropdowns(e) {
				if (!Theme.Nav.mq.matches && ('mouseenter' === e.type || 'mouseleave' === e.type)) {
					return;
				}

				var $el = $(this);

				if ($(this).hasClass('menu-item-toggle')) {
					$el = $(this).parent();
				}

				$el.toggleClass('neu__dropdown--active'); // toggle aria expanded

				if ($el.hasClass('neu__dropdown--active')) {
					$el.find('.menu-item-toggle').attr('aria-expanded', 'true');
				} else {
					$el.find('.menu-item-toggle').attr('aria-expanded', 'false');
				} // always clear active class from other dropdowns


				Theme.Nav.dropdowns.not($el).removeClass('neu__dropdown--active'); // always set other dropdowns aria-expanded to false

				Theme.Nav.dropdowns.not($el).find('.menu-item-toggle').attr('aria-expanded', 'false');
			}
		};

		Theme.Nav._init();

	});
})(window.jQuery, window, document);
