@extends('template')

@section('titrePage')
    {{{$laCategorie->getNomCat()}}}
@endsection

@section('titreItem')
    <h1>{{{$laCategorie->getNomCat()}}}</h1>
@endsection

@section('contenu')
    <div class ="container container-fluid">

        @foreach($lesProduits as $produit)
            <div class="row">
                {!! Form::open(['url' => 'AjoutPanier/'.$produit->getIdProduit()]) !!}
                <div class="col" >
                    {{ Html::image('http://juline-et-pauline.fr/images/'.$produit->getImage(), 'Image Produit', array('id' => 'produit')) }}
                </div>
                <div class="col" >
                    <p id="nomProduit"><b>{{{$produit->getNomProduit()}}}</b></p>
                    <p>{{{$produit->getDescription()}}}</p>
                    <p>Prix: {{{$produit->getPrix()}}}€</p>
                </div>
                <div class="col" >
                    {!! Form::label('qty', 'Quantité : ') !!}
                    {!! Form::number('qty', '1', ['min'=>'1','max'=>'10']) !!}
                </div>
                <div class="col" >
                    {!! Form::submit('Valider', ['class' => 'btn btn-info pull-right']) !!}
                </div>
                {!! Form::close() !!}
            </div>
        @endforeach

    </div>
@endsection


