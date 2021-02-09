require('./bootstrap');

import Splide from '@splidejs/splide';

// FUNCTIONS FOR THE NAVBAR
let nav = document.getElementById('resp');

window.addEventListener('resize', responav);

function responav(){ // change nav class depending on screen size

    let width = window.innerWidth;

    if(width < 700) {
        nav.className= "nav-2 w100 n-flex n-center n-between responsive";
        nav.style.display = 'none';
    } else if (width >= 700){
        nav.className= "nav-2 w100 n-flex n-center n-between";
        nav.style.display = 'flex'; // put nav in place if resizing upwards
    }

}

responav();

let navStyle = getComputedStyle(nav).getPropertyValue('display'); // get value of display style

let burger = document.querySelector('#burger');

function navshow(){ // hides or shows the nav links

    let width = window.innerWidth;
    if(navStyle != 'none' || nav.style.display == 'block') {
        nav.style.display = 'none';
    } else {
        nav.style.display = 'block';
    }

}



burger.addEventListener('click', navshow); // attributing even to burger menu icon


// SLIDERS

/* These sliders were made using Splide library, chck their website for more info */

// about page slider
var element =  document.getElementById('splide');
if (typeof(element) != 'undefined' && element != null) // checking if we are on about page
{
    new Splide( '#splide', {
    type    : 'loop',
    perPage : 1,
    autoplay: true,
    width : '100vw',
    height: '30vh',
    } ).mount();

}



// works page sliders

var element =  document.getElementById('image-slider');
if (typeof(element) != 'undefined' && element != null) // checking if we are on "works" page, if not, do not do anything
{

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

    primarySlider.sync( secondarySlider ).mount(); // syncinc the two sliders to make them work together
    } );


    // make cards clickable

    let cards = document.getElementsByClassName('work-card').length;

    for(let ey = 0; ey < cards; ey++ ) {

        let thiss = document.getElementsByClassName('work-card')[ey];

        thiss.addEventListener('click', function() {
            window.location = thiss.getAttribute("href");
        });
    }

}

