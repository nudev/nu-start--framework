(function ($, window, document) {
	/**
	 *   ... code out here will run immediately on load
	 */

	/**
	 *
	 *   ... code in here will run after jQuery says document is ready
	 */
	$(function () {
		let custom_scrollbars_handler = {
			_init: function () {
				if (window.innerWidth < 960) {
					return;
				}

				// ? get all the slides with scrolling areas except the clone/duplicates
				var slides_that_scroll = $(
					".fixed-height-scrolling-content-area"
				).parents(".swiper-slide:not(.swiper-slide-duplicate)");

				// ? iterate through the set of slides first; to also handle the color swap here
				$(slides_that_scroll).each(function (index, element) {
					//
					var mcs_theme, mcs_custom_callbacks;

					// ? light background slides by default
					mcs_theme = "light-thin";
					mcs_custom_callbacks = {};

					// ? only slide 2 has a dark scrollbar by default
					if ($(element).attr("aria-label") == "2 / 4") {
						mcs_theme = "dark-thin";
						mcs_custom_callbacks = {};
					}
					// ? only slide 3 has a color inversion on scroll
					if ($(element).attr("aria-label") == "3 / 4") {
						if (window.innerWidth < 960) {
							mcs_theme = "dark-thin";
						}
						mcs_custom_callbacks = {
							whileScrolling: function () {
								if (window.innerWidth > 960) {
									// ? this handles dispatching behavior once we have scrolled "some"
									let parentSlide =
										$(this).parents(".swiper-slide");

									//
									let scrollOffset = -200;
									//

									if (this.mcs.top < scrollOffset) {
										$(parentSlide).addClass(
											"color-swap-triggered"
										);
										$(this)
											.find(
												".mCSB_scrollTools_vertical.mCS-light-thin"
											)
											.removeClass("mCS-light-thin")
											.addClass("mCS-dark-thin");
									} else {
										$(parentSlide).removeClass(
											"color-swap-triggered"
										);
										$(this)
											.find(
												".mCSB_scrollTools_vertical.mCS-dark-thin"
											)
											.removeClass("mCS-dark-thin")
											.addClass("mCS-light-thin");
									}

									// ? this handles switching in the "pillars images" as we scroll
									let container_offset = this.offsetTop * 2;

									let pillars = $(this).find(
										".wp-block-group.pillar:not(:first-of-type)"
									);

									pillars.each(function (index) {
										if (
											$(window).scrollTop() >
											$(this).offset().top -
												container_offset
										) {
											$(
												$(
													".shim-crossfade-gallery > .wp-block-image"
												)[index]
											).addClass("image-is-revealed");
										} else {
											$(
												$(
													".shim-crossfade-gallery > .wp-block-image"
												)[index]
											).removeClass("image-is-revealed");
										}
									});
								}
							},
						};
					}

					custom_scrollbars_handler._build_new_instance(
						element,
						mcs_theme,
						mcs_custom_callbacks
					);
				});
			},
			_build_new_instance: function (
				element,
				mcs_theme,
				mcs_custom_callbacks
			) {
				let scrolling_area = $(element).find(
					".fixed-height-scrolling-content-area"
				);

				$(scrolling_area).each(function (index, element) {
					if ($(element).is(".academic-plan-timeline-table")) {
						mcs_theme = "dark-thin";
					}

					$(element).mCustomScrollbar({
						theme: mcs_theme,
						axis: "y",
						// scrollbarPosition: "inside",
						onTotalScrollOffset: 50,
						alwaysTriggerOffsets: false,
						callbacks: mcs_custom_callbacks,
					});
				});
			},
			//
		};
		custom_scrollbars_handler._init();

		/* 
			? handle the animation for the timeline table on the last slide
		*/

		let handle_timeline_table = {
			_init: function () {
				let $el = $(".academic-plan-timeline-table");

				let $paragraphs = $el.find(".wp-block-column p");

				let $left_paragraphs = $el.find(
					".wp-block-column:first-child p"
				);

				let $right_paragraphs = $el.find(
					".wp-block-column:last-child p"
				);

				for (let index = 0; index < $right_paragraphs.length; index++) {
					let timeout = index * 200;
					const element = $right_paragraphs[index];
					setTimeout(() => {
						$(element).addClass("timeline-row-is-revealed");
					}, timeout);
				}
				for (let index = 0; index < $left_paragraphs.length; index++) {
					let timeout = index * 200;
					const element = $left_paragraphs[index];
					setTimeout(() => {
						$(element).addClass("timeline-row-is-revealed");
					}, timeout);
				}
			},
		};
		// handle_timeline_table._init(); // ! hold back init until an event is triggered

		/* 
		
		*/

		// object literal container holds all the academic plan slider (swiper) customizations and extensions
		let academic_plan_slider = {
			$instance: undefined,
			// store an array of all the button labels (each slide has a name)
			$slideNames: ["Video", "Intro", "Pillars", "Planning Process"],
			//
			_init: function () {
				let slider_instance = $(".wp-block-eedee-block-gutenslider")[0]
					.gutenslider.swiperInstance;

				let video = $(".wp-block-video video");
				let video_copy_overlay = $(
					".page-title-is-hidden-while-playing"
				);

				video.on("play pause", function (e) {
					$(video_copy_overlay).fadeToggle();
				});

				slider_instance.allowTouchMove = false;

				slider_instance.on(
					"slideChange",
					academic_plan_slider._do_update_button_labels
				);
				slider_instance.on(
					"slideChange",
					academic_plan_slider._do_reset_any_videos
				);
				academic_plan_slider._do_update_button_labels();
			},
			_do_update_button_labels: function (swiper) {
				$(".fixed-height-scrolling-content-area").mCustomScrollbar(
					"update"
				);
				$(".fixed-height-scrolling-content-area").mCustomScrollbar(
					"scrollTo",
					"top",
					{
						timeout: 250,
					}
				);

				let slider_instance = $(".wp-block-eedee-block-gutenslider")[0]
					.gutenslider.swiperInstance;

				let $index = slider_instance.realIndex;

				let $prevButtonText = academic_plan_slider.$slideNames[
					$index - 1
				]
					? academic_plan_slider.$slideNames[$index - 1]
					: undefined;
				let $nextButtonText = academic_plan_slider.$slideNames[
					$index + 1
				]
					? academic_plan_slider.$slideNames[$index + 1]
					: undefined;

				if ($index == 0) {
					$(slider_instance.navigation.$prevEl[0]).hide();
				} else {
					$(slider_instance.navigation.$prevEl[0]).show();
				}
				if ($index == 3) {
					$nextButtonText = academic_plan_slider.$slideNames[0];

					// ? trigger the timeline table animation
					handle_timeline_table._init();
				}

				slider_instance.navigation.$prevEl[0].innerHTML =
					$prevButtonText; // insert prev button text
				slider_instance.navigation.$nextEl[0].innerHTML =
					$nextButtonText; // insert next button text
			},
			_do_reset_any_videos: function () {
				let video = $(".wp-block-eedee-block-gutenslider").find(
					"video"
				);
				video.each(function (index, element) {
					if (!element.paused) {
						element.pause();
						$(element).parent().removeClass("is-playing");
						element.load();
					}
				});
			},
		};
		academic_plan_slider._init();
	});
})(window.jQuery, window, document);
