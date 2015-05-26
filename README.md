# Trottilib - Back Office

Auteur: [Antoine Demailly]

## Arborescence
>/app/  
> ------/cache/  
> ------/config/  
>/src/  
> -----/WebSite/  
> ----------------/Controller/  
> ----------------/Model/  
> ----------------/View/  
>/vendor/  
>/web/  
> ------/index.php  
> ------/ajax/  
> ------/css/  
> ------/fonts/  
> ------/img/  
> ------/js/  
> ------/map/  

## Configuration
Index.php se trouve dans:
>/web/index.php

Configuration de la base de données:
>/app/config/config.yml

Sur la page d'accueil pour se connecter:
>Login: admin@admin.fr  
>Mot de passe: admin

## Technologies
- HTML5/CSS3
- Javascript/jQuery
- Plugins jQuery: tab.js
- PHP5.5/MySQL (innoDB) + DBAL
- Ajax
- YML

## A lire
La Base de données comporte actuellement peu de Clients, Utilisateurs, Bornes, etc...  
Vous pouvez cependant utiliser le moteur de recherche pour la plupart des utilisateurs, villes, et trottinettes.

Parmis les bornes possédant des trottinettes il y a : Jussieu

## Fonctionnalités
### Module de recherche:
Le moteur de recherche permet d'éditer rapidement les différents éléments du site.
>Tips: Utiliser flèche haut/bas et Entrée pour naviguer facilement dans les résultats

### Mode Edition
Le mode édition permet d'éditer à la volée les différents composants de l'interface administration:
- Edition des informations utilisateurs
- Edition de l'état des trottinettes et localisation
- Gestion des bornes et localisation

## A ajouter
Voici ce qu'il sera ajouté d'ici la soutenance finale:
- Coloration des inputs du formulaire utilisateurs en cas d'érreurs ou non
- Indexer les bornes, sessions, maintenances dans le moteur de recherche
- Pouvoir mettre une trottinette en maintenance
- Masquer localisation pour trottinette en maintenance ou hors service
- Voir l'abonnement en cours d'un client
- D'autres changements éventuels

## Bugs connus à corriger
- Placeholder de la barre de recherche défaillant sur Chrome

## Outils utilisés
- [Sublime Text 3] : Pour coder en HTML/CSS/JS/PHP avec le plug-in Codelinter PHP pour la POO
- [Adobe Photoshop] : Réalisation du design de la partie Back-Office
- [Geojson.io] : Création du GEOJSON pour l'API Google Maps
- [Dillinger] : Réalisation du README en Markdown
- [Dropbox] : Sauvegarde en temps réel + Copie régulière

[Antoine Demailly]:http://www.antoinedemailly.fr
[Dillinger]:http://dillinger.io/
[Geojson.io]:http://geojson.io/
[Dropbox]:https://www.dropbox.com/home
[Sublime Text 3]:http://www.sublimetext.com/3
[Adobe Photoshop]:http://www.adobe.com/fr/products/photoshop.html

