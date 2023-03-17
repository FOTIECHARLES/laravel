# Laravel 9

projet de site d'un restaurant construit avec laravel 9.

## Prérequis

- PHP 8.1
- MariaDB 10 ou MySQL 5
-composer 2.4.4
- nodejs 18.12.1 et npm 8.19.2

## Installation

```bash
composer install
npm install
```

## Utilisation

Dans un premier terminal,lancez :

```bash
php artisan serve
```

Dans un autre terminal,lancez :

```bash
npm run dev
```

Pour voir la page d'accueil,ouvrez : [Accueil](http://127.0.0.1:8000)

## Mentions légales

Les images suivantes ont été utilisées :

[uomo che taglia i guanti d'aglio photo – Photo Restaurant Gratuite sur Unsplash](https://unsplash.com/fr/photos/5JeTin55H9U)

[Personne Tenant Un Bol En Verre Transparent Avec De La Nourriture · Photo gratuite](https://www.pexels.com/fr-fr/photo/personne-tenant-un-bol-en-verre-transparent-avec-de-la-nourriture-6210433/)



# Faire fonctionner ce projet laravel en utilisant git clone

## Prérequis

- PHP
- MariaDB 10 ou MySQL 5
- composer 2.4.4
- nodejs 18.12.1 et npm 8.19.2
- wamp
- vs code (un editeur de code...)
- cmd
## Installation


Pour commencer veuiller cloner ce projet avec git clone, en spécifiant le nom ssh pour cela vous pouvez saisir la commande suivante:

`git clone git@github.com:FOTIECHARLES/laravel.git`

Veuillez ouvrir le dossier du projet qui vient d'être cloné avec votre éditeur code (Vs code pour être à l'intérieur du projet cloné)

Puis une fois que c'est fait, téléchargez les dépendances en tapant les commandes suivantes dans votre terminal d'abord `composer install` une fois le téléchargement terminé saisissez la commande suivante dans votre terminal `npm install` et veuillez appuyé sur entrer, lorsque le téléchargement sera terminé.

Maintenant à l'intérieur de votre cmd !, et non votre éditeur de code(vs code...); tapez la commande suivante `copy .env.example .env` dans le dossier laravel qui a été téléchargé lors du git clone !

 De plus vous pouvez revenir dans votre éditeur de code maintenant (vs code...)et saisir la commande dans le terminal`php artisan key:generate` une fois que c'est fait veuillez ouvrir phpMyadmin et vous connecter avec votre compte. Puis appuyez sur [Nouvelle base de données] , nommée la: laravel; et juste à droite choississez [utf8mb4_general_ci] et appuyer sur [créer].

Maintenant dans votre terminal tapez la commande `bin/db-build.sh`pour reconstruire la base de donnée automatiquement et l'injecter dans les tables dans votre base donnée dans MysQL, cela se fait tout seul vous n'avez rien à faire d'autre.

Maintenant vous pouvez rafraîchir votre page localhost et voir des données apparaître dans la base de données nommée laravel.

## Utilisation


Dans votre éditeur de code (Vs code...) ouvrez deux terminaux, dans le premier tapez la commande`php artisan serve` et dans le second terminal tapez la commande `npm run build` ou `npm run dev`.
Pour voir la page d'accueil,ouvrez : [Accueil](http://127.0.0.1:8000)


Pour se connecter dans le site partie administrateur vous pouvez allez dans l'emplacement suivant dans le dossier laravel: database>seeders>UsersSeeder: et choisir un mail et un mot de passe.