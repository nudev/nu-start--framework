/* 
	PostsGrid Block - Scripts
*/

//
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
		// code is poetry...

		$(".acf-block.posts-grid").each(function (index, element) {
			let $id = $(this).attr("id");

			let $filterForm = $(this).find("form");

			let $grid_items = $(this).find(".nu__grid > ul");

			let $formID = $filterForm.attr("name");

			let $filtering_navicon = $(this).find(".filtering-navicon");

			$filtering_navicon.on("click", function (e) {
				$(this).toggleClass("is-revealed");
				$filterForm.slideToggle();
			});

			$(".js__filteringform select").each(function (index, element) {
				let $placeholder = $(element).data("placeholder");
				// initialize the Selectize control
				var $select = $(element).selectize({
					plugins: ["remove_button", "restore_on_backspace"],
					placeholder: $placeholder,
				});
				// fetch the instance
				var selectize = $select[0].selectize;
			});

			$filterForm.find("input").on("input", function (e) {
				$selectedValue = $(this).val();
				$.ajax({
					type: "POST",
					url: postsgrid_ajax_object.ajaxurl,
					dataType: "html",
					data: {
						action: "handle_postsgrid_filtering",
						_ajax_nonce: postsgrid_ajax_object.ajax_nonce,
						chronological_value: $selectedValue,
					},
					success: function (res) {
						// console.log($grid_items);
						// console.log(res);
						$grid_items.html(res);
					},
					error: function () {
						console.log("nope try again");
					},
				});
			});
		});

		// code was poetry...
	});
})(window.jQuery, window, document);
