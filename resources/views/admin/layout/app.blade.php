<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>@yield('title','Admin')</title>
  @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
      <li class="nav-item"><a class="nav-link" data-widget="pushmenu" href="#" role="button">☰</a></li>
    </ul>
    <ul class="navbar-nav ms-auto">
      <li class="nav-item">Bonjour, {{ Auth::user()->name }}</li>
      <li class="nav-item ms-3">
        <form method="POST" action="{{ route('logout') }}">@csrf
          <button class="btn btn-sm btn-outline-secondary">Déconnexion</button>
        </form>
      </li>
    </ul>
  </nav>

  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="{{ route('admin.dashboard') }}" class="brand-link text-center">Cabinet Admin</a>
    <div class="sidebar">
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" role="menu">
          <li class="nav-item"><a href="{{ route('admin.dashboard') }}" class="nav-link">Dashboard</a></li>
          <li class="nav-item"><a href="{{ route('admin.lawyers.index') }}" class="nav-link">Avocats</a></li>
          <li class="nav-item"><a href="{{ route('admin.practices.index') }}" class="nav-link">Domaines</a></li>
          <li class="nav-item"><a href="{{ route('admin.contacts.index') }}" class="nav-link">Messages</a></li>
          <li class="nav-item"><a href="{{ route('admin.appointments.index') }}" class="nav-link">Rendez-vous</a></li>
          @if(in_array(Auth::user()->role, ['admin','super_admin']))
            <li class="nav-item"><a href="{{ route('admin.users.index') }}" class="nav-link">Utilisateurs</a></li>
            <li class="nav-item"><a href="{{ route('admin.settings.index') }}" class="nav-link">Paramètres</a></li>
          @endif
        </ul>
      </nav>
    </div>
  </aside>

  <div class="content-wrapper p-3">
    <section class="content">
      @includeWhen(session('success'),'partials.flash')
      @yield('content')
    </section>
  </div>

  <footer class="main-footer small text-muted text-center">© {{ date('Y') }} Cabinet</footer>
</div>
</body>
</html>