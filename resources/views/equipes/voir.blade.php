@extends('layouts.app')

@section('title', 'Équipe n°' . $id)

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item"><a href="{{ route('equipes') }}">Gestion des équipes</a></li>
    {{-- CONCEPT (Mission 3) : le fil d'Ariane utilise ici la donnée reçue de la route (l'id) --}}
    <li class="breadcrumb-item active" aria-current="page">Équipe n°{{ $id }}</li>
@endsection

@section('content')

        <h1>Équipe n° {{ $id }}</h1>



    <a href="{{ route('equipes') }}" class="btn btn-link mt-3 ps-0">&larr; Retour à la liste</a>
@endsection
