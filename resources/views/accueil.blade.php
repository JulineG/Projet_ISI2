@extends('template')

@section('titrePage')
    Accueil
@endsection

@section('titreItem')
    <h1>Accueil</h1>
@endsection

@section('contenu')
    <h3>Juline et Pauline vous souhaitent la bienvenue sur le site !</h3>
    <p>Peut-être connaissez vous déjà notre restaurant à Lyon situé rue Mercière ? Si oui, vous pouvez dès à présent profiter de nos produits aussi en livraison à domicile.<br>
    Si vous avez atterri ici par hasard, une présentation s'impose. Nous sommes Juline et Pauline, deux jeunes entrepreneurses passionnées de cuisine et de bons produits.<br>
    Nous avons ouvert notre établissement en mai 2018 dont le concept est de proposer des plats rustiques ou classiques de la gastronomie française de façon moderne.<br>
    Dans une démarche de développement durable nous sélectionnons des produits de saison et favorisons les productions locales !</p>
    <p>{{$id=\Illuminate\Support\Facades\Session::get('id')}}</p>
@endsection

