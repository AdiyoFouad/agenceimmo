@extends('base')

@section('title', "Accueil")

@section('content')

    <div class="bg-light p-5 mb-5 text-center">
        <div class="container">
            <h1>Agence IMMO</h1>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Impedit ad odit eius repellat, officia iste explicabo tempore asperiores quia itaque reprehenderit ex, omnis velit deserunt laudantium natus, excepturi perferendis soluta.</p>
        </div>

        

    </div>
    <div class="container">
        <h2 class="text-start">Nos derniers biens</h2>
        <div class="row">
            @foreach ($properties as $property)
                <div class="col">
                    @include('property.card')   
                </div>
            @endforeach
        </div>
    </div>
    
@endsection