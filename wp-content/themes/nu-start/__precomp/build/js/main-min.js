(function ($, window, document) {
	/**
	 *   ... code out here will run immediately on load
	 */

	/**
	 *
	 *   ... code in here will run after jQuery says document is ready
	 */
	$(function () {
		let accordion_block_handler = {
			details_el: $(".wp-block-nu-blocks-accordion-item details"),
			content_el: $(".wp-block-nublocks-accordion-item__content"),

			_init: function () {
				this.details_el.on("click", function (e) {
					let content_el = $(this).find(
						".wp-block-nublocks-accordion-item__content"
					);
					content_el.toggleClass("revealed");
					content_el.slideDown(400, function () {
						console.log("slide done");
					});
				});
			},
		};

		accordion_block_handler._init();

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
		$(".wp-block-nu-blocks-accordion").on(
			"click",
			".wp-block-nu-blocks-accordion-item",
			function (e) {
				$(e.currentTarget)
					.siblings()
					.find("details[open]")
					.removeAttr("open");
			}
		);

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

		$("#nu__cookiewarning").on(
			"click",
			"button.cookies-accept",
			function (e) {
				localStorage.setItem("acceptCookies", "true");
				$("#nu__cookiewarning").remove();
			}
		);

		$("#nu__cookiewarning").on("click", "span.closeicon", function (e) {
			$("#nu__cookiewarning").remove();
		});

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

		if ($("body").hasClass("prod--disabled")) {
			if ($theme_info) {
				$("main").append($theme_info["devpanel"]);

				$("#nu_dev_utility .window-width span").html(
					window.innerWidth + "px"
				);

				$(window).on("resize", function () {
					$("#nu_dev_utility .window-width span").html(
						window.innerWidth + "px"
					);
				});

				$("#nu_dev_utility").on("click", function (e) {
					$(this).toggleClass("revealed");
				});
			}
		}

		$(".wp-block-image.is-video-placeholder a").magnificPopup({
			type: "iframe",
		});

		$(
			".wp-block-button.is-style-playhead .wp-block-button__link"
		).magnificPopup({
			type: "iframe",
		});

		$(".wp-block-image.js__magnific img").magnificPopup({
			type: "image",
		});

		$(".js__magnific.mfp-iframe .wp-block-button__link").magnificPopup({
			type: "ajax",
		});
	});
})(window.jQuery, window, document);
