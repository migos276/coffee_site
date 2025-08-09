<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title','Cabinet d\'avocats')</title>
  <meta name="description" content="@yield('meta_description','Cabinet d\'avocats')">
  @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body>
<header class="border-bottom">
  <nav class="navbar navbar-expand-lg container py-3">
    <a class="navbar-brand fw-bold" href="{{ route('home') }}">Cabinet</a>
    <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#nav">Menu</button>
    <div class="collapse navbar-collapse" id="nav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link" href="{{ route('about') }}">À propos</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('practices.index') }}">Domaines</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('team') }}">Équipe</a></li>
        <li class="nav-item"><a class="btn btn-primary ms-lg-3" href="{{ route('contact') }}">Contact</a></li>
      </ul>
    </div>
  </nav>
</header>

<main>
  @yield('content')
</main>

<footer class="bg-light py-5 mt-5">
  <div class="container d-flex flex-wrap gap-4 justify-content-between">
    <div>
      <div class="fw-bold">Cabinet</div>
      <div class="text-muted">Adresse • Téléphone • Email</div>
    </div>
    <div class="text-muted small">
      <a href="/mentions-legales" class="text-muted">Mentions légales</a> ·
      <a href="/politique-confidentialite" class="text-muted">Politique de confidentialité</a>
    </div>
  </div>
</footer>
</body>
</html>