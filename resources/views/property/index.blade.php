@extends('base')

@section('title', "Tous nos biens")

@section('content')
    <div class="container">

        <div class="bg-light p-5 mb-5 text-center">
            <form action="" method="get" class="container d-flex gap-2">
                <input type="number" placeholder="Surperficie mini" class="form-control" name="surface" value="{{ $input['surface'] ?? '' }}">
                <input type="number" placeholder="Nbre de pièce(s) min" class="form-control" name="rooms" value="{{ $input['rooms'] ?? '' }}">
                <input type="number" placeholder="Budget max" class="form-control" name="price" value="{{ $input['price'] ?? '' }}">
                <input placeholder="Mot clé" class="form-control" name="title" value="{{ $input['title'] ?? '' }}">
                <button class="btn btn-primary btn-sm flex-grow-0">Rechercher </button>
            </form>
        </div>

        <div class="row my-4">
            @forelse ($properties as $property)
                <div class="col-3">
                    @include('property.card')   
                </div>
            @empty
                <p class="text-center">Aucun bien à afficher</p>
            @endforelse
        </div>
    </div>

    <div class="container my-4">
        {{$properties->links()}}
    </div>
@endsection