@extends('template')

@section('titrePage')
    Accueil
@endsection

@section('titreItem')
    <h1>Accueil</h1>
@endsection

@section('contenu')
    <p>{{$id=\Illuminate\Support\Facades\Session::get('id')}}</p>
    <p>Bienvenue !</p>
@endsection