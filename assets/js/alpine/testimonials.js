import Flickity from 'flickity';
import 'flickity-fade';

export default () => ({
    init() {

		const flkty = new Flickity( this.$refs.carousel, {
			pageDots: true,
			draggable: false,
			contain: true,
            autoPlay: 5000,
            fade: true,
			wrapAround: false,
			prevNextButtons: false,
			initialIndex: 0,

		})
		this.carousel = flkty;
    },

	carousel: null,

	nextSlide() {
		this.carousel.next()
	},

	prevSlide() {
		this.carousel.previous()
	}
});
