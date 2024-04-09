import $ from 'jquery';

export const courseToggle = (() => {
	// console.log('toggle');
	const $items = $('.course-package-item');
	const $buttons = $('[data-course-target]');

	const activateCourses = (e) => {
		$buttons.removeClass('js-is-active');
		const $button = $(e.target);
		const target = $button.data('course-target');

		$button.addClass('js-is-active');

		$items.each( function(item) {
			const $this = $(this);
			if( ! $this.data('month').includes(target)){
				$this.hide();
			} else {
				$this.fadeIn();
			}
		})
	};

	$buttons.on('click', activateCourses);

	$buttons.first().trigger('click');
})()
