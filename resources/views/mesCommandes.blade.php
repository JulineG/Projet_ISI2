@extends('template')

@section('titrePage')
    Mes commandes
@endsection

@section('titreItem')
    <h1>Mes Commandes</h1>
@endsection

@section('contenu')

    @if(!empty($mesCommandes))
        <div class="container">
            <div class="row">
                @foreach($mesCommandes as $uneCommande)
                <div class="row">
                    <div class="card">
                        <div class="card-header"><pre>{{ __('Commande n°'.$uneCommande[0]['commande']->getIdCommande()."\t".'Date : '.$uneCommande[0]['commande']->getDateCommande()."\t".' Prix total : '.$prixTotal[$uneCommande[0]['commande']->getIdCommande()].'€')  }}</pre></div>

                        <div class="card-body">

                            @foreach($uneCommande as $produit)
                                <div class="row">
                                        {{ Html::image('http://127.0.0.1/Projet_ISI2/images/'.$produit['infos']->getImage(), 'Image Produit', array('id' => 'imgPanier')) }}
                                    <div class="col">
                                        <p id="nomProduit"><b>{{$produit['infos']->getNomProduit()}}</b></p>
                                        <p>{{$produit['infos']->getDescription()}}</p>
                                        <p>Prix unitaire : {{$produit['infos']->getPrix()}}€</p>
                                        <p>Quantité : {{$produit['commande']->getQuantite()}}</p>
                                    </div>
                                        <p id='panier'>Total : {{$produit['infos']->getPrix()*$produit['commande']->getQuantite()}}€</p>

                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    @else
        <p>Vous n'avez pas de commandes !</p>
    @endif
@endsection


