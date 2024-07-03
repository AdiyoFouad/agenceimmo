<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/styles.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/tom-select.css')}}">
    <title>@yield('title') | Administration</title>
</head>
<body>
    
    <nav class="navbar navbar-expand-lg nav-bar-dark bg-primary mb-4">
        <div class="container-fluid">
            
            <a class="navbar-brand" href="#">Agence</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            @php
                $route = request()->route()->getName();
            @endphp
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a href="{{route('admin.property.index')}}" aria-current="page" @class(["nav-link", 'active' => str_contains($route,'property.')])>Gérer les biens</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('admin.option.index')}}" @class(["nav-link", 'active' => str_contains($route,'option.')])>Gérer les options</a>
                    </li>
                </ul>
            </div>
            <!--
            @auth
                {{Auth::user()->name}}  
                <form action="route('auth.logout')" method="post">
                    @csrf
                    @method("delete")
                    <button class="btn btn-warning" type="submit">Déconnexion</button>
                </form>
            @endauth
            @guest 
                <a href="route('auth.login')" class="nav-link">Login</a>
            @endguest-->
        </div>
    </nav>

    <div class="container mt-5">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @yield('content')
    </div>

    <script src="{{ asset('js/tom-select.js')}}"></script>
    <script src="{{ asset('js/bootstrap.js')}}"></script>
    <script> 
        new TomSelect('select[multiple]', {plugins:{remove_button : {title:'supprimer'}}});
    </script>
        
</body>
</html>