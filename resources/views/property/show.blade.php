@extends('base')

@section('title', $property->title)

@section('content')

    <div class="container">
        

        <div class="row">
            <div class="mt-4 col-6">
                <h1>{{ $property->title }}</h1>
        <h2>{{ $property->rooms }} pièces - {{ $property->surface }}m²</h2>

        <div class="text-primary fw-bold" style="font-size: 4rem;">
            {{ number_format($property->price, thousands_separator : ' ') }} €
        </div>

        <hr>
                <h4>Interressé par ce bien ?</h4>
    
                <form action="{{ route('property.contact', ['property' => $property->id]) }}" method="POST" class="vstack gap-3" >
                    @csrf
                    <div class="row">
                        @include('shared.input', [
                            'label' => 'Nom',
                            'name' => 'lastname',
                            'class' => 'col',
                            'value' => 'DUARTE'
                        ])
                        @include('shared.input', [
                            'label' => 'Prénom',
                            'name' => 'firstname',
                            'class' => 'col',
                            'value' => 'Magengo'
                        ])
                    </div>
                    <div class="row">
                        @include('shared.input', [
                            'label' => 'Téléphone',
                            'name' => 'phone',
                            'class' => 'col',
                            'value' => '97938219'
                        ])
                        @include('shared.input', [
                            'label' => 'Email',
                            'name' => 'email',
                            'class' => 'col',
                            'type' => 'email',
                            'value' => 'odjfouad38@gmail.com'
                        ])
                    </div>
                    
                    @include('shared.input', [
                        'label' => 'Votre message',
                        'name' => 'message',
                        'class' => 'col',
                        'type' => 'textarea'
                    ])
    
                    <div>
                        <button class="btn btn-primary">Nous contacter</button>
                    </div>
                </form>
            </div>
            <div class="mt-4 col-6">
                <h2>Description</h2>
                <p>{!! nl2br($property->description) !!}</p>
                <div class="row">
                    <div class="col-8">
                        <h2>Caractéristique</h2>
                        <table class="table table-striped">
                            <tr>
                                <td>Surface habitable</td>
                                <td>{{ $property->surface }} m²</td>
                            </tr>
                            <tr>
                                <td>Nbre de Pièce(s)</td>
                                <td>{{ $property->rooms }} </td>
                            </tr>
                            <tr>
                                <td>Nbre de Chambre(s)</td>
                                <td>{{ $property->bedrooms }} </td>
                            </tr>
                            <tr>
                                <td>Etage</td>
                                <td>{{ $property->floor ?: 'Rez de chaussé' }} </td>
                            </tr>
                            <tr>
                                <td>Localisation</td>
                                <td>
                                    {{ $property->address }} <br>
                                    {{ $property->city }} ( {{ $property->postal_code }})
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-4">
                        <h2>Spécificités</h2>
                        <ul class="list-group">
                            @foreach ($property->options as $option)
                                <li class="list-group-item">{{$option->name}}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection