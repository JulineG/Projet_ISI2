@extends('template')

@section('titrePage')
    Commande
@endsection

@section('titreItem')
    <h1>Votre commande</h1>
@endsection

@section('contenu')

        <table class="table table-bordered table-stripped">
            @foreach ($lesInfos['panier'] as $produit)

                <tr>
                    <td>
                        {{ Html::image('http://127.0.0.1/juline/Projet_ISI2/images/'.$produit[0]->getImage(), 'Image Produit', array('id' => 'produit')) }}
                    </td>
                    <td >
                        <p id="nomProduit"><b>{{$produit[0]->getNomProduit()}}</b></p>
                        <p>{{$produit[0]->getDescription()}}</p>
                        <p>Prix unitaire : {{$produit[0]->getPrix()}}€</p>
                        <p>Quantité : {{$produit[1]}}</p>
                    </td>
                    <td>
                        <p id='panier'>Total : {{$produit[0]->getPrix()*$produit[1]}}€</p>
                    </td>
                </tr>
            @endforeach
                <tr>
                    <td>
                        <p><b>Votre adresse de livraison</b></p>
                        <p>{{$lesInfos['prenom']}} {{$lesInfos['nom']}}</p>
                        <p>{{$lesInfos['adresse']}}</p>
                        <p>{{$lesInfos['codePostal']}} {{$lesInfos['ville']}}</p>
                    </td>
                    <td>
                        <p><b>Sélectionner un moyen de paiement</b></p>
                        {!! Form::open(['url' =>'ajoutCommande']) !!}
                        {!! Form::radio('paiement', 'espece' , true)!!}
                        {!! Form::label('paiement', 'Espèce') !!}
                        <br />
                        {!! Form::radio('paiement', 'carte' , false) !!}
                        {!! Form::label('paiement', 'Carte Bleue') !!}
                    </td>
                </tr>


        </table>

        {!! Form::submit('Valider ma commande', ['class' => 'btn btn-info pull-right']) !!}
        {!! Form::close() !!}



@endsection
