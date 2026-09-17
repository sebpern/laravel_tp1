@extends('layouts.app')

@section('title', 'Créer une équipe')

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item"><a href="{{ route('equipes') }}">Gestion des équipes</a></li>
    <li class="breadcrumb-item active" aria-current="page">Créer une équipe</li>
@endsection

@section('content')
    <h1>Créer une équipe</h1>

    {{-- CONCEPT (Mission 4) : construction d'un formulaire HTML directement en Blade --}}
    <form action="{{ route('equipes.creer') }}" method="POST" class="mt-3" style="max-width: 500px;">
        {{--
            CONCEPT (Mission 4) : faille de sécurité CSRF -> @csrf génère un champ
            caché contenant un jeton vérifié par Laravel à la soumission.
            Sans cette ligne : erreur 419 "Page Expired".
        --}}
        @csrf

        <div class="mb-3">
            <label for="nom" class="form-label">Nom de l'équipe</label>
            <input type="text" class="form-control" id="nom" name="nom" required>
        </div>

        <div class="mb-3">
            <label for="ville" class="form-label">Ville</label>
            <input type="text" class="form-control" id="ville" name="ville" required>
        </div>

        <div class="form-check mb-3">
            <input type="checkbox" class="form-check-input" id="a_paye" name="a_paye">
            <label class="form-check-label" for="a_paye">A payé son inscription</label>
        </div>

        {{-- CONCEPT (Mission 4) : route en POST -> traité par la route "equipes.creer" (dd()) --}}
        <button type="submit" class="btn btn-primary">Créer</button>
    </form>
@endsection
