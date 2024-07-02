@php
    $class ??= null;
@endphp

<div @class(['form-check form-switch', $class])>
    <input type="hidden" value="0" name="{{$name}}">
    <input @checked(old($name, $value ?? false)) value="1" type="checkbox" name="{{$name}}"  id="{{$name}}" class="form-check-input @error($name) is-invalid @enderror" role="switch">    
    <label for="{{ $name }}" class="form-check-label">{{ $label }}</label>
    @error($name)
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>