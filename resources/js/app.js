require('./bootstrap');

import Splide from '@splidejs/splide';

var element =  document.getElementById('splide');
if (typeof(element) != 'undefined' && element != null)
{
    new Splide( '#splide', {
    type    : 'loop',
    perPage : 1,
    autoplay: true,
    width : '100vw',
    height: '30vh',
    } ).mount();

}




//works sliders

document.addEventListener( 'DOMContentLoaded', function () {
	var secondarySlider = new Splide( '#secondary-slider', {
		fixedWidth  : 100,
		height      : 60,
		gap         : 10,
		cover       : true,
		isNavigation: true,
		focus      : 'center',
        type       : 'loop',
        perPage    : 3,
		breakpoints : {
			'600': {
				// fixedWidth: 66,
				// height    : 40,
			}
		},
	} ).mount();



	var primarySlider = new Splide( '#image-slider', {
		pagination : false,
		arrows     : false,
		cover      : true,
        focus      : 'center',
        type       : 'loop',
        perPage    : 3,
        breakpoints : {
			'865': {
				perPage : 2,
			},
            '600': {
                perPage : 1,
            }
		},
	} );

	primarySlider.sync( secondarySlider ).mount();
} );
