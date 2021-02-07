require('./bootstrap');

import Splide from '@splidejs/splide';
new Splide( '#splide', {
    type    : 'loop',
	perPage : 1,
	autoplay: true,
    width : '100vw',
    height: '30vh',
} ).mount();