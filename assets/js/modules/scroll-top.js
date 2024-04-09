export const scrollToTop = (() => {
	const scrollButton = document.getElementById('js-scroll-top');

	const doScroll = e => {
		window.scroll({
			top: 0,
			left: 0,
			behavior: 'smooth'
		});
	};

	if( scrollButton ) {
		scrollButton.addEventListener('click', doScroll);
	}

})();
