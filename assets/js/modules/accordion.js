import $ from 'jquery';

export const accordion = (() => {

	const $accordions = $('.accordion');

	const $accordionButtons = $('.js-accordion-button');
	const $accordionContent = $('.accordion-content');

	$accordionButtons.attr('aria-expanded', 'false');
	$accordionContent.hide().attr('aria-hidden', 'true');

	$accordions.on('click', '.js-accordion-button', function() {
		const $button = $(this);
		const $content = $button.next('.accordion-content');
		const ariaContentVal = $content.attr('aria-hidden');
		const ariaButtonVal = $button.attr('aria-expanded');

		$button.attr('aria-expanded', ariaButtonVal == 'true' ? 'false' : 'true');
		$content.attr('aria-hidden', ariaContentVal == 'true' ? 'false' : 'true');
		$content.slideToggle();
	})
})();
