@extends('template')

@section('titrePage')
    {{{$laCategorie->getNomCat()}}}
@endsection

@section('titreItem')
    <h1>{{{$laCategorie->getNomCat()}}}</h1>
@endsection

@section('contenu')
    <div class="col-md-8">
        @foreach($lesProduits as $produits)
        <div class="row">
            <div class="col-md-3" >
                {{ Html::image('http://127.0.0.1/juline/Projet_ISI2/images/'.$produits->getImage(), 'Image Produit', array('id' => 'produit')) }}
            </div>
            <div class="col-md-3 produits" >
                <p id="nomProduit"><b>{{{$produits->getNomProduit()}}}</b></p>
                <p>{{{$produits->getDescription()}}}</p>
                <p>Prix: {{{$produits->getPrix()}}}€</p>
            </div>
            <div class="col-md-3" >
                <label for="qty">Quantité : </label>
                <input id="qty" name="qty" class="form-group" type="number" min="0" value="1">
            </div>
            <div class="col-md-3" >
                <button class="btn btn-info btnBuy" id="produits" role="button" data-id="{{$produits->getIdProduit()}}">Acheter</button>
            </div>
        </div>

        <form id="formAdd" action="{{url('/ajoutPanier')}}" method="POST">
            <input id="inputId" type="hidden" name="idProduit">
            <input id="inputQty" type="hidden" name="qty">
        </form>
        @endforeach
    </div>
@endsection
