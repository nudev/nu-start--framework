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
		let htmlSVG_handler = {
			_init: function () {
				let $elems = $(".is-the-html-svg-color-toggle-feature");
				let $toggles = $elems.find(
					".is-html-svg-color-toggles .wp-block-button__link"
				);

				$toggles.each(function (index, element) {
					let $realColor = $(element).css("background-color");

					$(element).on("click", function (e) {
						$(element)
							.parent()
							.siblings()
							.removeClass("is-currently-active");
						$(element).parent().addClass("is-currently-active");

						// ? if button background is transparent (its an outline button and means white)
						if (
							$realColor == "rgba(0, 0, 0, 0)" ||
							$realColor == "rgb(255,255,255)"
						) {
							$realColor = "rgb(255,255,255)"; // change svg fill color to white instead of transparent
							$(
								".is-the-html-svg-color-toggle-feature .is-the-html-svg-wrapper"
							).css("background-color", "rgb(0,0,0)");
							// ? always fill the SVG with the real color
							$(
								".is-the-html-svg-color-toggle-feature .is-the-html-svg-wrapper svg"
							)
								.find("path")
								.css("fill", $realColor);
						} else {
							$(
								".is-the-html-svg-color-toggle-feature .is-the-html-svg-wrapper"
							).css("background-color", "rgb(255,255,255)");
							// ? always fill the SVG with the real color
							$(
								".is-the-html-svg-color-toggle-feature .is-the-html-svg-wrapper svg"
							)
								.find("path")
								.css("fill", $realColor);
						}
					});
				});
			},
		};
		htmlSVG_handler._init();

		let flipCards = {
			_init: function () {
				let $elems = $(
					".wp-block-group.nu__shim--avoid-instead-flip-cards"
				);

				$elems.on("click", function (e) {
					$(this).toggleClass("is-flipped");
				});
			},
		};
		flipCards._init();

		//
		let homepage_slider = {
			// variables

			// methods; starting with init
			_init: function () {
				if (
					!$(
						".wp-block-eedee-block-gutenslider.the-brand-homepage-slider"
					).length
				) {
					return;
				}
				let slider_instance = $(
					".wp-block-eedee-block-gutenslider.the-brand-homepage-slider"
				)[0].gutenslider.swiperInstance;
				slider_instance.allowTouchMove = false;

				homepage_slider._animate_css_handler(slider_instance);
			},
			//
			_animate_css_handler: function (slider_instance) {
				slider_instance.on("slideChange", function () {
					//
					let real_current_slide =
						slider_instance.slides[slider_instance.activeIndex];

					// DO STUFF NOW
					let general_anim_classes =
						"animate__slow animate__animated";

					var fadeUp = $(real_current_slide).find(
						".wp-block-column:first-child"
					);
					var fadeLeft = $(real_current_slide).find(
						".wp-block-column:last-child"
					);

					$(slider_instance.slides)
						.find(".wp-block-column:first-child")
						.removeClass(
							general_anim_classes +
								" animate__fadeInUp animate__delay-1s"
						);
					$(slider_instance.slides)
						.find(".wp-block-column:last-child")
						.removeClass(
							general_anim_classes +
								" animate__fadeInRight animate__delay-2s"
						);

					$(fadeUp).addClass(
						general_anim_classes +
							" animate__fadeInUp animate__delay-1s"
					);
					$(fadeLeft).addClass(
						general_anim_classes +
							" animate__fadeInRight animate__delay-2s"
					);
				});
			},
		};
		//
		homepage_slider._init();
		//
		//

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
		//
		// if ($("body").hasClass("prod--disabled")) {
		// 	if ($theme_info) {
		// 		$("main").append($theme_info["devpanel"]);

		// 		$("#nu_dev_utility .window-width span").html(
		// 			window.innerWidth + "px"
		// 		);

		// 		$(window).on("resize", function () {
		// 			$("#nu_dev_utility .window-width span").html(
		// 				window.innerWidth + "px"
		// 			);
		// 		});

		// 		$("#nu_dev_utility").on("click", function (e) {
		// 			$(this).toggleClass("revealed");
		// 		});
		// 	}
		// }

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
