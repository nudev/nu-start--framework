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
		//
		console.log("this is an experimental template and script file");
		// init controller
		var controller = new ScrollMagic.Controller();

		console.log(controller);
		
		// create a scene
		new ScrollMagic.Scene({
			duration: 100, // the scene should last for a scroll distance of 100px
			offset: 50, // start this scene after scrolling for 50px
		})
			.setPin("#my-sticky-element") // pins the element for the the scene's duration
			.addTo(controller); // assign the scene to the controller
		//
		//
	});
})(window.jQuery, window, document);
