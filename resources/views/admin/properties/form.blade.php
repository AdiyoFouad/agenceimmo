@extends('admin.admin')

@section('title', $property->exists ? "Editer un bien" : "Créer un bien")

@section('content')
    <form action="{{ $property->exists ? route('admin.property.update', $property) : route('admin.property.store')}}" id="propertyForm" class="col-10 m-auto card p-3 vstack gap-2" method="POST">
        @csrf
        @method($property->exists ? "PATCH" : "POST")
        <h2 class="text-center">@yield('title')</h2>
        <hr class="mt-0">

        <div class="row">
            @include('shared.input', [
                'label' => 'Titre',
                'value' => $property->title,
                'name' => 'title',
                'class' => 'col'
            ])
            <div class="col row">
                @include('shared.input', [
                    'value' => $property->surface,
                    'name' => 'surface',
                    'class' => 'col',
                    'type' => 'number'
                ])
                @include('shared.input', [
                    'label' => 'Prix',
                    'value' => $property->price,
                    'name' => 'price',
                    'class' => 'col',
                    'type' => 'number'
                ])
            </div>
        </div>
             
        @include('shared.input', [
            'value' => $property->description,
            'name' => 'description',
            'type' => 'textarea'
        ])

        <div class="row">
            @include('shared.input', [
                'label' => 'Pieces',
                'value' => $property->rooms,
                'name' => 'rooms',
                'class' => 'col',
                'type' => 'number'
            ])
            @include('shared.input', [
                'label' => 'Chambres',
                'value' => $property->bedrooms,
                'name' => 'bedrooms',
                'class' => 'col',
                'type' => 'number'
            ])
            @include('shared.input', [
                'label' => 'Etage',
                'value' => $property->floor,
                'name' => 'floor',
                'class' => 'col',
                'type' => 'number'
            ])
        </div>
        <div class="row">
            @include('shared.input', [
                'label' => 'Ville',
                'value' => $property->city,
                'name' => 'city',
                'class' => 'col'
            ])
            @include('shared.input', [
                'label' => 'Adresse',
                'value' => $property->address,
                'name' => 'address',
                'class' => 'col'
            ])
            @include('shared.input', [
                'label' => 'Code Postal',
                'value' => $property->postal_code,
                'name' => 'postal_code',
                'class' => 'col'
            ])
        </div>
        @include('shared.checkbox', [
            'label' => 'Vendu',
            'value' => $property->sold,
            'name' => 'sold',
        ])
        
        <button type="submit" class="btn btn-primary">{{ $property->exists ? "Modifier" : "Créer"}}</button>
    </form>
@endsection