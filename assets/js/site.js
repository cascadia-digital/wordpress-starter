// This is all you.
import Alpine from 'alpinejs';
import collapse from '@alpinejs/collapse'
import focus from '@alpinejs/focus'

window.Alpine = Alpine;

Alpine.plugin(collapse);
Alpine.plugin(focus)

import App from './alpine/app';
import GoogleMap from './alpine/google-map';
import Carousel from './alpine/carousel';
// import FilterPosts from './alpine/filter-posts';
// import Testimonials from './alpine/testimonials';
// import HeroScroll from './alpine/hero-scroll';

Alpine.data('app', App);
Alpine.data('googleMap', GoogleMap);
Alpine.data('carousel', Carousel);
// Alpine.data('heroScroll', HeroScroll);
// Alpine.data('filterPosts', FilterPosts);
// Alpine.data('testimonials', Testimonials);

Alpine.start();
