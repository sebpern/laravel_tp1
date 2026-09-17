{{--
    CONCEPT (Mission 2) : héritage des vues.
    Ce fichier est le "gabarit" commun à toutes les pages : il définit le menu,
    le fil d'Ariane, et laisse un emplacement (@yield) que chaque vue viendra
    remplir grâce à @extends + @section.
    Voir "Pour aller plus loin" dans le sujet du TP.
--}}
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tournoi e-sport - @yield('title', 'Accueil')</title>

    {{-- Bootstrap ajouté de manière minimale, juste pour la mise en forme (CDN) --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container py-4">

    <nav class="navbar navbar-expand navbar-light bg-light rounded mb-3 px-3">
        <span class="navbar-brand mb-0 h1 fs-5">Tournoi e-sport</span>

        {{--
            CONCEPT (bonus) : identifier la route courante avec Route::is()
            et un if ternaire pour mettre en surbrillance le lien du menu
            correspondant à la page actuellement affichée.
        --}}
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link {{ Route::is('presentation') ? 'fw-bold text-primary' : '' }}"
                   href="{{ route('presentation') }}">
                    Présentation
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Route::is('equipes*') ? 'fw-bold text-primary' : '' }}"
                   href="{{ route('equipes') }}">
                    Gestion des équipes
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Route::is('contact') ? 'fw-bold text-primary' : '' }}"
                   href="{{ route('contact') }}">
                    Contact
                </a>
            </li>
        </ul>
    </nav>

    {{--
        CONCEPT (Mission 3) : fil d'Ariane qui s'adapte à chaque page.
        La partie commune ("Tournoi") est ici dans le layout ; chaque vue
        ajoute ensuite ses propres miettes de pain via @section('breadcrumb').
    --}}
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            @section('breadcrumb')
            <li class="breadcrumb-item"><a href="{{ route('presentation') }}">Tournoi</a></li>
            @show
        </ol>
    </nav>

    @yield('content')

</div>
</body>
</html>
