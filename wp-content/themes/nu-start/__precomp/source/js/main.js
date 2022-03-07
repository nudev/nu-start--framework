import "../../vendor/js/waapi-animate-details";
(function ($, window, document) {
	/**
	 *   ... code out here will run immediately on load
	 */

	const debounce = function (func, delay) {
		let timer;
		return function () {
			//anonymous function
			const context = this;
			const args = arguments;
			clearTimeout(timer);
			timer = setTimeout(() => {
				func.apply(context, args);
			}, delay);
		};
	};
	const throttle = (func, limit) => {
		let inThrottle;
		return function () {
			const args = arguments;
			const context = this;
			if (!inThrottle) {
				func.apply(context, args);
				inThrottle = true;
				setTimeout(() => (inThrottle = false), limit);
			}
		};
	};

	/**
	 *
	 *   ... code in here will run after jQuery says document is ready
	 */
	$(function () {
		let nav_block_customization = {
			_init: function () {
				$(".open-on-click.wp-block-navigation-submenu").on(
					"click",
					".wp-block-navigation-submenu__toggle",
					function (e) {
						$(e.delegateTarget).toggleClass("reveal-submenu");
					}
				);
			},
		};
		nav_block_customization._init();

		//
		//
		//
		// ? 		handle a delayed fade in for... something, i forgot.
		//
		//
		//
		setTimeout(function () {
			$(".is-special-fadein strong").animate(
				{
					opacity: 1,
					left: 0,
				},
				1000,
				function () {
					// animation callback
				}
			);
		}, 2000);

		//
		//
		//
		//
		$("#nu__cookiewarning").on(
			"click",
			"button.cookies-accept",
			function (e) {
				localStorage.setItem("acceptCookies", "true");
				$("#nu__cookiewarning").remove();
			}
		);

		//
		//
		//
		//
		$("#nu__cookiewarning").on("click", "span.closeicon", function (e) {
			$("#nu__cookiewarning").remove();
		});

		//
		//
		//
		if (localStorage.getItem("acceptCookies") !== "true") {
			$("#nu__cookiewarning").show();
		} else {
			$("#nu__cookiewarning").remove();
		}

		if (localStorage.getItem("alertsHidden") !== "true") {
			$(".nu__alerts--wrapper").show();
		}

		$(".nu__alerts--wrapper").on("click", ".closeicon", function (e) {
			$(".nu__alerts--wrapper").hide();
			localStorage.setItem("alertsHidden", "true");
		});

		//
		//
		//
		$(".wp-block-image.is-video-placeholder a").magnificPopup({
			type: "iframe",
		});

		//
		//
		//
		$(
			".wp-block-button.is-style-playhead .wp-block-button__link"
		).magnificPopup({
			type: "iframe",
		});

		//
		//
		//
		$(".wp-block-image.js__magnific img").magnificPopup({
			type: "image",
		});

		//
		//
		//
		$(".js__magnific.mfp-iframe .wp-block-button__link").magnificPopup({
			type: "ajax",
		});
	});
})(window.jQuery, window, document);

import "./_academic-plan";
