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
		//

		let editorBlocks = function ($block) {
			$imageSlider = $($block).find(".imageslider .js__carousel");
			$textSlider = $($block).find(".textslider .js__carousel");

			// initialize the image slider, save the instance to pass to asnavfor
			let $asNavFor = $imageSlider.slick($slickOptions);

			// set asnavfor property for options
			$slickOptions.asNavFor = $asNavFor;

			// append  arrows to the buttons, scoped to within this carousel
			$slickOptions.arrows = true;
			$slickOptions.appendArrows = $(".nu__carousel-buttons", $($block));

			// initialize the text slider with the updated slick options
			$textSlider.slick($slickOptions);

			$slickOptions.arrows = false;
			$slickOptions.appendArrows = undefined;
			$slickOptions.asNavFor = undefined;
		};

		const $slickOptions = {
			rows: 0, // ? sets the expecteed # of <div> wrappers to be added for each row (hard to explain)
			speed: 200,
			cssEase: "ease-in-out",
			centerMode: true,
			centerPadding: "0px",
			slidesToShow: 3,
			draggable: false,
			responsive: [
				{
					breakpoint: 960,
					settings: {
						slidesToShow: 1,
					},
				},
			],
			prevArrow:
				'<button type="button" class="prev outline" title="View previous slide"><span class="material-icons-outlined">chevron_left</span></button>',
			nextArrow:
				'<button type="button" class="next outline" title="View next slide"><span class="material-icons-outlined">chevron_right</span></button>',
			dots: false,
			arrows: false,
			asNavFor: undefined,
			appendArrows: undefined,
		};

		// Initialize each block on page load (front end).
		$(document).ready(function () {
			// for each carousel block
			$(".nu__carousel").each(function (i, el) {
				// find the two synced sliders
				$imageSlider = $(el).find(".imageslider .js__carousel");
				$textSlider = $(el).find(".textslider .js__carousel");

				// initialize the image slider, save the instance to pass to asnavfor
				let $asNavFor = $imageSlider.slick($slickOptions);

				// set asnavfor property for options
				$slickOptions.asNavFor = $asNavFor;

				// append  arrows to the buttons, scoped to within this carousel
				$slickOptions.arrows = true;
				$slickOptions.appendArrows = $(".nu__carousel-buttons", $(el));

				// initialize the text slider with the updated slick options
				$textSlider.slick($slickOptions);

				$slickOptions.arrows = false;
				$slickOptions.appendArrows = undefined;
				$slickOptions.asNavFor = undefined;
			});
			//
			//
		});

		// Initialize dynamic block preview (editor).
		if (window.acf) {
			window.acf.addAction("render_block_preview", editorBlocks);
		}

		//
	});
})(window.jQuery, window, document);
