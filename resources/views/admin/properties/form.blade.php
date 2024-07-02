@extends('admin.admin')

@section('title', $property->exists ? "Editer un bien" : "Créer un bien")

@section('content')
    <form action="{{ $property->exists ? route('admin.property.update', $property) : route('admin.property.store')}}" id="propertyForm" class="col-5 m-auto card p-3" method="POST">
        @csrf
        @method($property->exists ? "PATCH" : "POST")
        <h2 class="text-center">@yield('title')</h2>
        <hr class="mt-0">
        <div class="form-group mb-3">
            <label for="title" class="form-label">Title (min. 8 characters)</label>
            <input type="text" class="form-control" id="title" name="title" required minlength="8">
        </div>
        <div class="form-group mb-3">
            <label for="description" class="form-label">Description (min. 8 characters)</label>
            <textarea class="form-control" id="description" name="description" rows="3" required minlength="8"></textarea>
        </div>
        <div class="form-group mb-3">
            <label for="surface" class="form-label">Surface Area (m² - min. 10)</label>
            <input type="number" class="form-control" id="surface" name="surface" required min="10">
        </div>
        <div class="form-group mb-3">
            <label for="rooms" class="form-label">Number of Rooms (min. 1)</label>
            <input type="number" class="form-control" id="rooms" name="rooms" required min="1">
        </div>
        <div class="form-group mb-3">
            <label for="bedrooms" class="form-label">Number of Bedrooms (min. 0)</label>
            <input type="number" class="form-control" id="bedrooms" name="bedrooms" required min="0">
        </div>
        <div class="form-group mb-3">
            <label for="floor" class="form-label">Floor Level (min. 0)</label>
            <input type="number" class="form-control" id="floor" name="floor" required min="0">
        </div>
        <div class="form-group mb-3">
            <label for="price" class="form-label">Price (min. 0)</label>
            <input type="number" class="form-control" id="price" name="price" required min="0">
        </div>
        <div class="form-group mb-3">
            <label for="city" class="form-label">City (min. 4 characters)</label>
            <input type="text" class="form-control" id="city" name="city" required minlength="4">
        </div>
        <div class="form-group mb-3">
            <label for="address" class="form-label">Address (min. 8 characters)</label>
            <input type="text" class="form-control" id="address" name="address" required minlength="8">
        </div>
        <div class="form-group mb-3">
            <label for="postal_code" class="form-label">Postal Code (min. 8 characters)</label>
            <input type="text" class="form-control" id="postal_code" name="postal_code" required minlength="8">
        </div>
        <div class="form-check form-switch mb-3">
            <input class="form-check-input" type="checkbox" id="sold" name="sold" required>
            <label class="form-check-label" for="sold">Sold</label>
        </div>
        <button type="submit" class="btn btn-primary">{{ $property->exists ? "Modifier" : ""}}</button>
    </form>
@endsection