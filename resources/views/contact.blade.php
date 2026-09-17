@extends('layouts.app')

@section('title', 'Contact')

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active" aria-current="page">Contact</li>
@endsection

@section('content')
    <h1>Contact</h1>
    <p>Pour toute question sur le tournoi, contactez-nous à
        <a href="mailto:contact@tournoi-esport.fr">contact@tournoi-esport.fr</a>.
    </p>
@endsection
