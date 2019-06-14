@extends('template')

@section('titrePage')
    {{{$laCategorie->getNomCat()}}}
@endsection

@section('titreItem')
    <h1>{{{$laCategorie->getNomCat()}}}</h1>
@endsection

@section('contenu')
    <div class="col-md-12">
        @foreach($lesProduits as $produit)
        <div class="row">
            {!! Form::open(['url' => 'AjoutPanier/'.$produit->getIdProduit()]) !!}
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3" >
                {{ Html::image('http://127.0.0.1/Projet_ISI2/images/'.$produit->getImage(), 'Image Produit', array('id' => 'produit')) }}
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 produits" >
                <p id="nomProduit"><b>{{{$produit->getNomProduit()}}}</b></p>
                <p>{{{$produit->getDescription()}}}</p>
                <p>Prix: {{{$produit->getPrix()}}}€</p>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3" >
                {!! Form::label('qty', 'Quantité : ') !!}
                {!! Form::number('qty', '1', ['min'=>'1','max'=>'10']) !!}
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3" >
                {!! Form::submit('Valider', ['class' => 'btn btn-info pull-right']) !!}
            </div>
            {!! Form::close() !!}
        </div>


        @endforeach
    </div>
@endsection
