(function (factory) {
  typeof define === 'function' && define.amd ? define(factory) :
  factory();
})((function () { 'use strict';

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
  	 *
  	 *   ... code in here will run after jQuery says document is ready
  	 */
  	$(function () {
  		let timeline_slider = {
  			$years: undefined,
  			_init: function () {

  				if( !$(".wp-block-eedee-block-gutenslider.the-timeline-slider").length ){
  					return;
  				}
  				
  				// grab the real instance of this slider
  				let $instance = $(
  					".wp-block-eedee-block-gutenslider.the-timeline-slider"
  				)[0].gutenslider.swiperInstance;
  				// adjust settings not exposed in the CMS
  				$instance.allowTouchMove = false;
  				// get the actual bullets from the actual instance (do not look thru the DOM)
  				let $bullets = $instance.pagination.$el[0];
  				//
  				self.$years = $(
  					".wp-block-eedee-block-gutenslider.the-timeline-slider"
  				).find(
  					".swiper-slide:not(.swiper-slide-duplicate) .has-the-timeline-slide-year"
  				);
  				$($bullets)
  					.children()
  					.each(function (index, element) {
  						$(element).html(self.$years[index].innerHTML);
  					});
  			},
  		};
  		timeline_slider._init();

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
  })(window.jQuery);

}));
//# sourceMappingURL=main-min.js.map
