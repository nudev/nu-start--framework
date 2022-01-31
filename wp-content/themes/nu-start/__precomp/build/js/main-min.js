(function (factory) {
  typeof define === 'function' && define.amd ? define(factory) :
  factory();
}((function () { 'use strict';

  class Accordion {
    constructor(el) {
      // Store the <details> element
      this.el = el;
      // Store the <summary> element
      this.summary = el.querySelector('summary');
      // Store the <div class="content"> element
      this.content = el.querySelector('.content');

      // Store the animation object (so we can cancel it if needed)
      this.animation = null;
      // Store if the element is closing
      this.isClosing = false;
      // Store if the element is expanding
      this.isExpanding = false;
      // Detect user clicks on the summary element
      this.summary.addEventListener('click', (e) => this.onClick(e));
    }

    onClick(e) {
      // Stop default behaviour from the browser
      e.preventDefault();
      // Add an overflow on the <details> to avoid content overflowing
      this.el.style.overflow = 'hidden';
      // Check if the element is being closed or is already closed
      if (this.isClosing || !this.el.open) {
        this.open();
      // Check if the element is being openned or is already open
      } else if (this.isExpanding || this.el.open) {
        this.shrink();
      }
    }

    shrink() {
      // Set the element as "being closed"
      this.isClosing = true;
      
      // Store the current height of the element
      const startHeight = `${this.el.offsetHeight}px`;
      // Calculate the height of the summary
      const endHeight = `${this.summary.offsetHeight}px`;
      
      // If there is already an animation running
      if (this.animation) {
        // Cancel the current animation
        this.animation.cancel();
      }
      
      // Start a WAAPI animation
      this.animation = this.el.animate({
        // Set the keyframes from the startHeight to endHeight
        height: [startHeight, endHeight]
      }, {
        duration: 300,
        easing: 'ease-in-out'
      });
      
      // When the animation is complete, call onAnimationFinish()
      this.animation.onfinish = () => this.onAnimationFinish(false);
      // If the animation is cancelled, isClosing variable is set to false
      this.animation.oncancel = () => this.isClosing = false;
    }

    open() {
      // Apply a fixed height on the element
      this.el.style.height = `${this.el.offsetHeight}px`;
      // Force the [open] attribute on the details element
      this.el.open = true;
      // Wait for the next frame to call the expand function
      window.requestAnimationFrame(() => this.expand());
    }

    expand() {
      // Set the element as "being expanding"
      this.isExpanding = true;
      // Get the current fixed height of the element
      const startHeight = `${this.el.offsetHeight}px`;
      // Calculate the open height of the element (summary height + content height)
      const endHeight = `${this.summary.offsetHeight + this.content.offsetHeight}px`;
      
      // If there is already an animation running
      if (this.animation) {
        // Cancel the current animation
        this.animation.cancel();
      }
      
      // Start a WAAPI animation
      this.animation = this.el.animate({
        // Set the keyframes from the startHeight to endHeight
        height: [startHeight, endHeight]
      }, {
        duration: 300,
        easing: 'ease-in-out'
      });
      // When the animation is complete, call onAnimationFinish()
      this.animation.onfinish = () => this.onAnimationFinish(true);
      // If the animation is cancelled, isExpanding variable is set to false
      this.animation.oncancel = () => this.isExpanding = false;
    }

    onAnimationFinish(open) {
      // Set the open attribute based on the parameter
      this.el.open = open;
      // Clear the stored animation
      this.animation = null;
      // Reset isClosing & isExpanding
      this.isClosing = false;
      this.isExpanding = false;
      // Remove the overflow hidden and the fixed height
      this.el.style.height = this.el.style.overflow = '';
    }
  }

  document.querySelectorAll('.wp-block-nu-blocks-accordion-item details').forEach((el) => {
    new Accordion(el);
  });

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

  				$(scrolling_area).each(function(index, element){

  					if( $(element).is('.academic-plan-timeline-table') ){
  						mcs_theme = 'dark-thin';
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

  				$el.find(".wp-block-column p");

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
  })(window.jQuery, window);

})));
//# sourceMappingURL=main-min.js.map
