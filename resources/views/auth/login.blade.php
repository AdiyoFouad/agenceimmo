@extends('base')

@section('title', "User Login")

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-4">
        <div class="card">
          <h5 class="card-header">Connexion</h5>
          <div class="card-body">
            <form action="{{route('auth.login')}}" method="POST">
              @csrf
              <div class="mb-3">
                <label for="email" class="form-label">Adresse email</label>
                <input type="email" name="email" value="{{old('email')}}" class="form-control @error('email') is-invalid @enderror" id="email" aria-describedby="emailHelp">
                @error('email')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                @enderror
              </div>
              <div class="mb-3">
                <label for="password" class="form-label">Mot de passe</label>
                <input type="password" name="password" class="form-control @error('email') is-invalid @enderror" id="password">
                @error('password')
                    {{ $message }}
                @enderror
              </div>
              <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="rememberMe">
                <label class="form-check-label" for="rememberMe">Se souvenir de moi</label>
              </div>
              <button type="submit" class="btn btn-primary">Se connecter</button>
            </form>
          </div>
          <div class="card-footer">
            <a href="#" class="card-link">Mot de passe oublié ?</a>
            <a href="#" class="card-link">Inscription</a>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection