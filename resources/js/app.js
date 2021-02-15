require('./bootstrap');

// Appelle de librairie pour les sliders
import Splide from '@splidejs/splide';

// Fonctions pour la nav
let nav = document.getElementById('resp');

window.addEventListener('resize', responav);

function responav() { // Changer la class de la nav en fonction de la taille de l'écran

    let width = window.innerWidth;

    if (width < 700) {
        nav.className = "nav-2 w100 n-flex n-center n-between responsive";
        nav.style.display = 'none';
    } else if (width >= 700) {
        nav.className = "nav-2 w100 n-flex n-center n-between";
        nav.style.display = 'flex'; // Remettre la nav en place en cas d'agrandissement de la fenêtre
    }

}

responav();

let navStyle = getComputedStyle(nav).getPropertyValue('display'); // récupération de la taille de l'écran

let burger = document.querySelector('#burger');

function navshow() { // Cache/Montre les liens de la nav

    let width = window.innerWidth;
    if (navStyle != 'none' || nav.style.display == 'block') {
        nav.style.display = 'none';
    } else {
        nav.style.display = 'block';
    }
}

burger.addEventListener('click', navshow); // Ajout de l'événement à l'icone du menu burger


// Rendre les sections de la page d'accueil cliquables
let cards = document.getElementsByClassName('main-section').length;

for (let ey = 0; ey < cards; ey++) {

    let thiss = document.getElementsByClassName('main-section')[ey];
    thiss.addEventListener('click', function () {
        window.location = thiss.getAttribute("href");
    });
}


// SLIDERS

/* Sliders réalisés à partir de la librairie "Splide" */

// Slider de la biographie
var element = document.getElementById('splide');
if (typeof (element) != 'undefined' && element != null) // Vérifier que l'on soit sur la bonne page
{
    new Splide('#splide', {
        type: 'loop',
        perPage: 1,
        autoplay: true,
        width: '100vw',
        height: '30vh',
    }).mount();

}



// Sliders de la page d'oeuvres

var element = document.getElementById('image-slider');
if (typeof (element) != 'undefined' && element != null) // Vérifier que l'on soit sur la bonne page
{

    document.addEventListener('DOMContentLoaded', function () {
        var secondarySlider = new Splide('#secondary-slider', {
            fixedWidth: 100,
            height: 60,
            gap: 10,
            cover: true,
            isNavigation: true,
            focus: 'center',
            type: 'loop',
            perPage: 3,
        }).mount();



        var primarySlider = new Splide('#image-slider', {
            pagination: false,
            arrows: false,
            cover: true,
            focus: 'center',
            type: 'loop',
            perPage: 3,
            breakpoints: {
                '1040': {
                    perPage: 2,
                },
                '660': {
                    perPage: 1,
                }
            },
        });

        primarySlider.sync(secondarySlider).mount(); // Synchronisation des sliders pour qu'ils fonctionnent ensembles
    });


    // Rendre les oeuvres cliquables
    let cards = document.getElementsByClassName('work-card').length;
    for (let ey = 0; ey < cards; ey++) {

        let thiss = document.getElementsByClassName('work-card')[ey];

        thiss.addEventListener('click', function () {
            window.location = thiss.getAttribute("href");
        });
    }

}

//Affichage des forms sur la page admin
var element = document.getElementById('workid');
if (typeof (element) != 'undefined' && element != null) // Vérifier que l'on soit sur la bonne page
{
    let options = document.querySelectorAll('option');

    let select = document.querySelector('select');

    let forms = document.getElementsByClassName('upwork');

    select.onchange = function () {
        var index = this.selectedIndex;
        var nb = this.children[index].getAttribute('nb');

        for (let i = 0; i < forms.length; i++) {
            forms[i].style.display = 'none';
        }

        forms[nb--].style.display = 'flex';
    }

}
