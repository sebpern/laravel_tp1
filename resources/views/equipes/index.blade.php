@extends('layouts.app')

@section('title', 'Gestion des équipes')

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active" aria-current="page">Gestion des équipes</li>
@endsection

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h3 mb-0">Équipes engagées</h1>

        {{-- CONCEPT (Mission 4) : lien vers le formulaire de création d'équipe --}}
        <a href="{{ route('equipes.creer.form') }}" class="btn btn-primary btn-sm">
            + Créer une équipe
        </a>
    </div>

    <table class="table table-striped table-bordered align-middle">
        <thead class="table-light">
            <tr>
                <th>Nom</th>
                <th>Ville</th>
                <th>A payé ?</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            {{-- CONCEPT (Mission 2) : parcours d'un tableau et affichage dans Blade avec @foreach --}}
            @foreach ($equipes as $equipe)
                <tr>
                    <td>{{ $equipe['nom'] }}</td>
                    <td>{{ $equipe['ville'] }}</td>
                    <td>
                        {{-- CONCEPT (Mission 2) : condition dans une vue avec @if / @else --}}
                        @if ($equipe['a_paye'])
                            <span class="badge bg-success">Oui</span>
                        @else
                            <span class="badge bg-danger">Non</span>
                        @endif
                    </td>
                    <td>
                        {{--
                            CONCEPT (Mission 3) : construction d'une url vers une route
                            paramétrée grâce au helper route('nom.route', $parametre)
                        --}}
                        <a href="{{ route('equipes.voir', $equipe['id']) }}"
                           class="btn btn-outline-secondary btn-sm">
                            Voir
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
