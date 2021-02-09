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
	} ).mount();



	var primarySlider = new Splide( '#image-slider', {
		pagination : false,
		arrows     : false,
		cover      : true,
        focus      : 'center',
        type       : 'loop',
        perPage    : 3,
        breakpoints : {
			'1040': {
				perPage : 2,
			},
            '660': {
                perPage : 1,
            }
		},
	} );

	primarySlider.sync( secondarySlider ).mount();
} );


// make cards clickable

let cards = document.getElementsByClassName('work-card').length;

for(let ey = 0; ey < cards; ey++ ) {

    let thiss = document.getElementsByClassName('work-card')[ey];

    thiss.addEventListener('click', function() {
        window.location = thiss.getAttribute("href");
    });
}
