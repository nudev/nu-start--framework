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

			let $filtering_navicon = $(this).find(".filtering-navicon");

			$filtering_navicon.on("click", function (e) {
				$(this).toggleClass('is-revealed');
				$filterForm.slideToggle();
			});

			$(".js__filteringform select").each(function (index, element) {
				let $placeholder = $(element).data("placeholder");

				// $(element).select2({
				// 	placeholder: $placeholder,
				// 	theme: "bootstrap4",
				// 	minimumResultsForSearch: -1, // disables search box - *only works for single-select element*
				// 	closeOnSelect: false,
				// 	templateSelection: function (data) {
				// 		console.log(data);
				// 		return data.text;
				// 	},
				// });

				// initialize the Selectize control
				var $select = $(element).selectize({
					
				});
				// fetch the instance
				var selectize = $select[0].selectize;

				selectize.on('change', function(e){
					
					let string_of_chosen_options = '<span>'+selectize.items.join(', ')+'</span>';

					$filterForm.find('.is-exposed-chosen-items').html(string_of_chosen_options);
					
				});

				window.selectize = selectize;

				// NOTE:
				// 		For multi-select boxes, there is no distinct search control.
				// 		So, to disable search for multi-select boxes, you will need to set the disabled property to true whenever the dropdown is opened or closed
				$(element).on(
					"select2:opening select2:closing",
					function (event) {
						var $searchfield = $(this)
							.parent()
							.find(".select2-search__field");
						$searchfield.prop("disabled", true);
					}
				);
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
