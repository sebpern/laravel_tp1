{{-- CONCEPT (Mission 2 / bonus) : @extends -> cette vue hérite du layout commun --}}
@extends('layouts.app')

@section('title', 'Présentation')

{{-- CONCEPT (Mission 3) : partie du fil d'Ariane propre à cette page et utilisant @parent pour récupérer le contenu de base--}}
@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active" aria-current="page">Présentation</li>
@endsection

{{-- CONCEPT (Mission 2) : @section/@yield -> le contenu vient remplir le layout --}}
@section('content')
    <h1>Présentation de notre tournoi</h1>
    <p>
        Bienvenue sur le site du tournoi e-sport ! Vous trouverez ici toutes les
        informations utiles : jeu concerné, format de la compétition, dates et
        modalités d'inscription.
    </p>
@endsection
