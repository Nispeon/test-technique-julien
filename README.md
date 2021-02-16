## Introduction
Ce site est un site de présentation en l'honneur de <a href="">Louis D'Esposito</a>. je l'ai réalisé en tant que test technique afin d'intégrer DevinciJunior.<br>
Pour être clair : <strong>!!! CE SITE N'EST PAS JOLI !!!</strong><br>
Je suis un dev plus orienté back que front et je ne m'en cache pas, mais je n'ai pas cherché à démontrer mes talents d'artistes avec ce site, plutôt mes capacités à intégrer un site et ses fonctionalités, ici par le biai d'un framework.<br><br>

Bon maintenant que c'est clair :

## Prérequis
Pour installer ce projet vous aurez besoin de :
- Composer
- Npm
- PHP
- Laragon/Wamp/Mamp/etc

## Installation

__Étape 1 :__ Allez dans votre `php.ini` et assurez vous d'avoir activer les extensions suivantes : 
- curl
- fileinfo
- gd2
- intl
- mbstring
- mysqli
- openssl
- pdo_mysql

__Étape 2 :__ Clonez ce repository et ouvrez votre terminal

__Étape 3 :__ Vérifier votre version de composer avec `composer --version`, si vous n'êtes pas en version 2 faîtes un `composer self-update --2`.

__Étape 4 :__ Faîtes un `composer install` et un `npm install` pour installer les dépendances

__Étape 5 :__ Ouvrez votre service de base de donnée et créez-y une bdd vide

__Étape 6 :__ Créez un fichier `.env` à la racine du projet et copiez-y le contenu de `.env.example` en modifiant les infos pour coller à votre bdd

__Étape 7 :__ Faîtes un `php artisan migrate`

## Utilisation

Pour lancer le serveur faîtes un `php artisan serv` en plus de lancer laragon, et rendez-vous à l'URL donnée. <br>
Si vous comptez changer le CSS ou le JS, faîtes un `npm run dev` pour sauvegarder les changements, ou alors faîtes tourner un `npm run watch pendant que vous développez`.

### Auteur

Nispeon aka Cousin-Alliot Julien
