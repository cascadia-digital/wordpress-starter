// import { slideToggle } from '../utils/slideToggle';
import { debounce } from 'lodash';
import $ from 'jquery';

export const mainNav = (() => {

	const $toggle = $('#js-menu-toggle');
	const $searchContainer = $('#main-nav-container');
	const $subToggle = $('.js-sub-toggle');
	const $subMenu = $('.sub-menu');
	// let windowWidth = window.clientWidth;

	$toggle.on('click', () => {
		if ($searchContainer.attr('aria-expanded') == 'false') {
			openNav(true);
		} else {
			closeNav(true);
		}
	 });

	 $subToggle.on('click', function() {
		 const $next = $(this).next('.sub-menu');
		 $next.slideToggle();
	 })

	 const openNav = (slide = false) => {
		$searchContainer.removeClass('js-is-hidden');
		$searchContainer.attr('aria-expanded', 'true');
		if( slide ){
			$searchContainer.slideDown();
		} else {
			$searchContainer.show();
		}
	 }

	 const closeNav = (slide = false) => {
		$searchContainer.addClass('js-is-hidden');
		$searchContainer.attr('aria-expanded', 'false');
		if( slide ){
			$searchContainer.slideUp();
		} else {
			$searchContainer.hide();
		}
	 }

	const setMenuClosedOnResize = () => {
		if( window.matchMedia('(max-width: 768px)').matches ) {
			// console.log('mobile');
			closeNav();
		} else {
			// console.log('desktop');
			openNav();
			$subMenu.removeAttr('style');
		}
	}

	const debouncedResizeListener = debounce(setMenuClosedOnResize, 250);

	setMenuClosedOnResize();

	window.addEventListener('resize', debouncedResizeListener);

})();
