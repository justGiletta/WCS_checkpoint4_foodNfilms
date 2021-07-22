/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import './styles/app.css';
// start the Stimulus application
// import './bootstrap';
import 'bootstrap-icons/font/bootstrap-icons.css';

// Favoris
document.querySelector('#favlist_recipe').addEventListener('click', addToFavlistRecipe)

function addToFavlistRecipe(event) {
    event.preventDefault();
    let favlistLink = event.currentTarget;
    let link = favlistLink.href;

    fetch(link)
        .then(res => res.json())
        .then(function(res) {
            let favlistIcon = favlistLink.firstElementChild ;
            if (res.isInFavlistRecipe) {
                favlistIcon.classList.remove('bi-heart');
                favlistIcon.classList.add('bi-heart-fill');
            } else {
                favlistIcon.classList.remove('bi-heart-fill');
                favlistIcon.classList.add('bi-heart');
            }
        });

}
