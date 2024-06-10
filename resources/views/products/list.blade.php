@extends('layout.base')

@section('content')
    <h1>Liste produits</h1>
    <a href="{{ route('product.create') }}" class=" btn btn-primary">Créer un produit</a>

    @if ($message = Session::get('success'))
        <div class="alert alert-success" role="alert">
            {{ $message }}
        </div>
    @endif

    <div class="row mt-5">

        @foreach ($products as $product)
            <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-xs-12">
                <div class="card" style="width: 18rem;">
                    <img src="{{ URL::asset($product->file == '' ? 'db/OIP.jfif' : $product->file) }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">{{ $product->price }} F CFA</p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Nom de la catégorie</li>
                    </ul>
                    <div class="card-body">
                        <a href="{{ route('product.edit', $product->id) }}" class="card-link">Modifier</a>
                        <a href="{{ route('product.destroy', $product->id) }}" class="card-link"
                            onclick="return confirm('Êtes vous sùre de vouloir supprimer ce produit?')">Suprimer</a>
                    </div>
                </div>
            </div>
        @endforeach
    @endsection
