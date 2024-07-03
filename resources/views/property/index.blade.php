@extends('base')

@section('title', "Tous nos biens")

@section('content')
    <div class="container">
        <div class="row my-4">
            @foreach ($properties as $property)
                <div class="col-3">
                    @include('property.card')   
                </div>
            @endforeach
        </div>
    </div>

    <div class="container my-4">
        {{$properties->links()}}
    </div>
@endsection