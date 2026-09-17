<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| CONCEPT (Mission 1) : Création de routes dans le fichier routes/web.php
| CONCEPT (Mission 1) : Nommage des routes avec ->name() pour pouvoir
| utiliser le helper route('nom.de.la.route') dans les vues (menu, liens,
| formulaires...) plutôt que d'écrire les URL "en dur"
|--------------------------------------------------------------------------
*/


// Page par défaut du site
Route::get('/', function () {
    // CONCEPT (Mission 1) : une route retourne une vue avec view('nom.de.la.vue')
    return view('presentation');
})->name('home');

// Page de présentation du tournoi
Route::get('/presentation', function () {
    // CONCEPT (Mission 1) : une route retourne une vue avec view('nom.de.la.vue')
    return view('presentation');
})->name('presentation');

// Liste des équipes engagées
Route::get('/equipes', function ()  {
    // CONCEPT (Mission 2) : envoi des données de la route vers la vue avec compact()
    // (équivalent à view('equipes.index', ['equipes' => $equipes]))
    // Jeu de données "en dur" pour ce TP (dans un vrai projet : base de données + Eloquent)
    $equipes = [
        1 => ['id' => 1, 'nom' => 'Team Phoenix', 'ville' => 'Dijon', 'a_paye' => true],
        2 => ['id' => 2, 'nom' => 'Wild Wolves', 'ville' => 'Lyon', 'a_paye' => false],
        3 => ['id' => 3, 'nom' => 'Cyber Falcons', 'ville' => 'Nancy', 'a_paye' => true],
        4 => ['id' => 4, 'nom' => 'Ghost Squad', 'ville' => 'Besançon', 'a_paye' => false],
    ];
    return view('equipes.index', compact('equipes'));
})->name('equipes');

// Détail d'une équipe
// CONCEPT (Mission 3) : route paramétrée -> {id} dans l'URL /equipes/{id}
Route::get('/equipes/{id}', function ($id)  {
    // CONCEPT (Mission 3) : récupération du paramètre {id} de la route
    // (Laravel l'injecte automatiquement en argument de la fonction, dans l'ordre)


    return view('equipes.voir', compact('id'));
})->name('equipes.voir');

// Formulaire de création d'une équipe (GET : on affiche seulement le formulaire,
// on ne modifie aucune donnée -> respecte le protocole HTTP)
Route::get('/creer-equipe', function () {
    return view('equipes.creer');
})->name('equipes.creer.form');

// Traitement du formulaire
// CONCEPT (Mission 4) : route en POST pour respecter le protocole HTTP
// (une requête qui crée/modifie des données ne doit jamais être en GET)
Route::post('/sauver-equipe', function (Request $request) {
    // CONCEPT (Mission 4) : injection de dépendance -> Laravel injecte automatiquement
    // l'objet Request car il est typé (Request $request) dans les paramètres de la fonction
    // CONCEPT (Mission 4) : dd() pour déboguer / afficher le contenu envoyé par le formulaire
    dd($request->all());

    // Le jeton CSRF envoyé par la vue (@csrf) est vérifié automatiquement par Laravel
    // avant même d'arriver ici : sans lui, on obtient une erreur 419
    // (CONCEPT Mission 4 : faille de sécurité CSRF)
})->name('equipes.creer');

// Page de contact
Route::get('/contact', function () {
    return view('contact');
})->name('contact');
