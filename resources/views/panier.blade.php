@extends('template')

@section('titrePage')
    Panier
@endsection

@section('titreItem')
    <h1>Panier</h1>
@endsection

@section('contenu')

        @if(!empty($lePanier))
            <table class="table table-bordered table-stripped">
            @foreach ($lePanier as $produit)

                    {!! Form::open(['url' => 'SupprimerPanier/'.$produit[0]->getIdProduit()]) !!}
                    <tr>
                        <td>
                            {{ Html::image('/images/'.$produit[0]->getImage(), 'Image Produit', array('id' => 'produit')) }}
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
                        <td >
                            {!! Form::submit('Supprimer', ['class' => 'btn btn-info btnSup']) !!}
                        </td>
                        {!! Form::close() !!}
                    </tr>
            @endforeach
            </table>
            <p>Prix Total : {{$prixTotal}}€</p>
            {!! Form::open(['url' => 'Commande']) !!}
            {!! Form::submit('Valider mon panier', ['class' => 'btn btn-info pull-right']) !!}
            {!! Form::close() !!}
        @else
            <p>Votre panier est vide !</p>
        @endif
@endsection


