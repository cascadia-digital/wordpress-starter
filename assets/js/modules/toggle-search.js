import $ from 'jquery';

export const toggleSearch = (() => {

	const $toggle = $('#js-search-toggle');
	const $searchContainer = $('.search-container');

	$searchContainer.hide();

	$toggle.on('click', () => {
		$searchContainer.slideToggle();
	 });


})();
