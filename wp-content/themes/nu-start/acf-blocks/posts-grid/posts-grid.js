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
		$(".js__filteringform select").each(function (index, element) {
			var $placeholder = $(element).data("placeholder");
			$(element).select2({
				placeholder: $placeholder,
				theme: "bootstrap4",
				minimumResultsForSearch: Infinity,
			});
		});
	});
})(window.jQuery, window, document);
