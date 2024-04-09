import 'slick-carousel';
import $ from 'jquery';

export const carousel = (() => {

	const $slickEl = $('.slider-container');
	const $testimonials = $('.testimonial-carousel');
	const $halfSlider = $('.half-slider-carousel');

	$slickEl.slick();

	$testimonials.slick({
		arrows: false,
		dots: false,
		fade: true,
		swipe: false,
	});

	$halfSlider.slick({
		arrows: false,
		dots: false,
		fade: true,
		swipe: false,
	})

	$slickEl.on('init reInit afterChange', function(event, slick, currentSlide){
		console.log(this.dataset.nav);
		//currentSlide is undefined on init -- set it to 0 in this case (currentSlide is 0 based)
		const i = (currentSlide ? currentSlide : 0) + 1;

		$slickEl.attr('data-slide-count', '0' + i + '/0' + slick.slideCount);

		if( this.dataset.nav ) {
			$(this.dataset.nav).slick('slickGoTo', currentSlide);
		}
	})

})();
