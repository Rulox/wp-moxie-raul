# wp-moxie-raul
---------------
Basic WordPress plugin for testing. Moxie Test plugin for Movies.

## Instalation
1. Clone the repository in your wordpress/wp-content/plugins folder 
 ``git clone https://github.com/Rulox/wp-moxie-raul.git``
1. Activate the plugin in your Admin dashboard (No dependencies)

## Usage
Once you have activated the plugin, navigate to your admin dashboard, you well see a new menú there 'Movies' where you can add/edit/delete movies.

Add as many movies as you want. If you want to use the api, simply go to `/movies/?json=true` in your browser.

## Features
* Custom CPT (**Movie**) for WordPres with the following data:
    * Title
    * Poster image
    * Year
    * Rating (1..5)
    * Short description
* Custom JSON API for the CPT
* Endpoint for the JSON API at `/movies/?json=true`
* Custom main page for the Movie list
* Main Page using ReactJS framework
* Effects, CSS, JS and OOP.

## Missing Features
* Testing and CI with Travis
* Fancier general layout

Raúl Marrero Rodríguez 2015

