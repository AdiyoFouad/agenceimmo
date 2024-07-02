@php
    $label ??= null;
    $type ??= 'text';
    $class ??= null;
    $name ??= '';
    $value ??= '';
@endphp


<div class="form-group mb-3">
    <label for="description" class="form-label">{{ $label }}</label>
    <input type="{{ $type }}" class="form-control" id="{{ $name }}" name="{{ $name }}" value="{{ old($name, $value) }}">
    @error($name)
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>