<div class="card">
    <div class="card-body">
        <h5 class="card-title">
            <a href="{{route('property.show', ['slug'=>Str::slug($property->title), 'property'=>$property->id])}}">{{ $property->title }}</a>
        </h5>
        <p class="card-text"> {{ $property->surface }}m² - {{ $property->city }} ({{ $property->postal_code }}) </p>
        <div class="text-primary fw-bolder" style="font-size: 1.4rem;">
            {{ number_format($property->price, thousands_separator: ' ') }} €
        </div>
    </div>
</div>