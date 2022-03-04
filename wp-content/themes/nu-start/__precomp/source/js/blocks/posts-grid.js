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

			let $grid_items = $(this).find(".nu__grid");

			let $formID = $filterForm.attr("name");



			$(".js__filteringform select").each(function (index, element) {
				var $placeholder = $(element).data("placeholder");
				$(element).select2({
					placeholder: $placeholder,
					theme: "bootstrap4",
					minimumResultsForSearch: Infinity,
				});
			});
			

			// $filterForm.find("input").on("input", function (e) {
			// 	$selectedValue = $(this).val();
			// 	$.ajax({
			// 		type: "POST",
			// 		url: "/wp-admin/admin-ajax.php",
			// 		dataType: "html",
			// 		data: {
			// 			action: "handle_postsgrid_filtering",
			// 			chronological_value: $selectedValue,
			// 		},
			// 		success: function (res) {
			// 			console.log($selectedValue);
			// 			console.log($grid_items);
			// 			$grid_items.html(res);
			// 		},
			// 		error: function () {
			// 			console.log("nope try again");
			// 		},
			// 	});
			// });




		});

		// code was poetry...
	});
})(window.jQuery, window, document);
