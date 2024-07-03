@extends('admin.admin')

@section('title', $option->exists ? "Editer une option" : "Créer une option")

@section('content')
    <form action="{{ $option->exists ? route('admin.option.update', $option) : route('admin.option.store')}}" id="propertyForm" class="col-10 m-auto card p-3 vstack gap-2" method="POST">
        @csrf
        @method($option->exists ? "PATCH" : "POST")
        <h2 class="text-center">@yield('title')</h2>
        <hr class="mt-0">
        @include('shared.input', [
                'label' => 'Nom de l\'option',
                'value' => $option->name,
                'name' => 'name',
                'class' => 'col'
            ])
        <button type="submit" class="btn btn-primary">{{ $option->exists ? "Modifier" : "Créer"}}</button>
    </form>
@endsection