<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title','Cabinet d\'avocats')</title>
  <meta name="description" content="@yield('meta_description','Cabinet d\'avocats')">
  @vite(['resources/css/app.css','resources/js/app.js'])
  <style>
    :root {
      --primary-color: #2c3e50;
      --primary-light: #34495e;
      --gold-accent: #d4af37;
      --text-dark: #2c3e50;
      --text-muted: #6c757d;
      --light-bg: #f8f9fa;
      --white: #ffffff;
      --shadow: 0 2px 15px rgba(44, 62, 80, 0.1);
      --border-color: #e9ecef;
    }

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      line-height: 1.6;
      color: var(--text-dark);
      background-color: var(--white);
    }

    /* Header Styles */
    header {
      background: linear-gradient(135deg, var(--white) 0%, #f8f9fa 100%);
      border-bottom: 1px solid var(--border-color);
      box-shadow: var(--shadow);
      position: sticky;
      top: 0;
      z-index: 1000;
      transition: all 0.3s ease;
    }

    .navbar {
      padding: 1rem 0;
      position: relative;
    }

    .container {
      max-width: 1200px;
      margin: 0 auto;
      padding: 0 1rem;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .navbar-brand {
      font-size: 1.75rem;
      font-weight: 700;
      color: var(--primary-color);
      text-decoration: none;
      position: relative;
      transition: all 0.3s ease;
    }

    .navbar-brand::after {
      content: '';
      position: absolute;
      bottom: -5px;
      left: 0;
      width: 0;
      height: 3px;
      background: linear-gradient(90deg, var(--gold-accent), var(--primary-color));
      transition: width 0.3s ease;
    }

    .navbar-brand:hover::after {
      width: 100%;
    }

    .navbar-toggler {
      background: none;
      border: 2px solid var(--primary-color);
      color: var(--primary-color);
      padding: 0.5rem 1rem;
      font-size: 0.9rem;
      cursor: pointer;
      transition: all 0.3s ease;
      display: none;
    }

    .navbar-toggler:hover {
      background: var(--primary-color);
      color: var(--white);
    }

    .navbar-nav {
      display: flex;
      list-style: none;
      align-items: center;
      gap: 0.5rem;
    }

    .nav-item {
      position: relative;
    }

    .nav-link {
      color: var(--text-dark);
      text-decoration: none;
      padding: 0.75rem 1.25rem;
      font-weight: 500;
      transition: all 0.3s ease;
      position: relative;
      overflow: hidden;
    }

    .nav-link::before {
      content: '';
      position: absolute;
      bottom: 0;
      left: 50%;
      width: 0;
      height: 2px;
      background: var(--gold-accent);
      transition: all 0.3s ease;
      transform: translateX(-50%);
    }

    .nav-link:hover {
      color: var(--primary-color);
      transform: translateY(-2px);
    }

    .nav-link:hover::before {
      width: 80%;
    }

    .btn {
      padding: 0.75rem 1.5rem;
      border-radius: 30px;
      font-weight: 600;
      text-decoration: none;
      transition: all 0.3s ease;
      border: none;
      cursor: pointer;
      position: relative;
      overflow: hidden;
    }

    .btn-primary {
      background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-light) 100%);
      color: var(--white);
      box-shadow: 0 4px 15px rgba(44, 62, 80, 0.3);
      margin-left: 1rem;
    }

    .btn-primary::before {
      content: '';
      position: absolute;
      top: 0;
      left: -100%;
      width: 100%;
      height: 100%;
      background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
      transition: left 0.5s;
    }

    .btn-primary:hover {
      transform: translateY(-2px);
      box-shadow: 0 6px 20px rgba(44, 62, 80, 0.4);
    }

    .btn-primary:hover::before {
      left: 100%;
    }

    /* Collapse styles for mobile */
    .navbar-collapse {
      display: flex;
      flex-grow: 1;
      align-items: center;
      justify-content: flex-end;
    }

    .collapse {
      display: block;
    }

    /* Main Content */
    main {
      min-height: 60vh;
      padding: 2rem 0;
    }

    /* Footer Styles */
    footer {
      background: linear-gradient(135deg, var(--light-bg) 0%, #e9ecef 100%);
      padding: 3rem 0;
      margin-top: 3rem;
      border-top: 1px solid var(--border-color);
    }

    footer .container {
      display: flex;
      flex-wrap: wrap;
      gap: 2rem;
      justify-content: space-between;
      align-items: center;
    }

    footer .fw-bold {
      font-size: 1.25rem;
      font-weight: 700;
      color: var(--primary-color);
      margin-bottom: 0.5rem;
    }

    footer .text-muted {
      color: var(--text-muted);
      font-size: 0.95rem;
    }

    footer a {
      color: var(--text-muted);
      text-decoration: none;
      transition: all 0.3s ease;
      position: relative;
    }

    footer a:hover {
      color: var(--primary-color);
    }

    footer .small {
      font-size: 0.875rem;
    }

    /* Responsive Design */
    @media (max-width: 992px) {
      .navbar-toggler {
        display: block;
      }

      .navbar-collapse {
        display: none;
        position: absolute;
        top: 100%;
        left: 0;
        right: 0;
        background: var(--white);
        box-shadow: var(--shadow);
        padding: 1rem;
        border-radius: 0 0 10px 10px;
      }

      .navbar-collapse.show {
        display: block;
      }

      .navbar-nav {
        flex-direction: column;
        width: 100%;
        gap: 0;
      }

      .nav-link {
        width: 100%;
        text-align: center;
        padding: 1rem;
        border-bottom: 1px solid var(--border-color);
      }

      .btn-primary {
        margin-left: 0;
        margin-top: 1rem;
        display: inline-block;
        text-align: center;
      }

      footer .container {
        flex-direction: column;
        text-align: center;
        gap: 1.5rem;
      }
    }

    @media (max-width: 768px) {
      .container {
        padding: 0 0.5rem;
      }

      .navbar-brand {
        font-size: 1.5rem;
      }

      footer {
        padding: 2rem 0;
        margin-top: 2rem;
      }
    }

    /* Animations */
    @keyframes fadeInUp {
      from {
        opacity: 0;
        transform: translateY(30px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .navbar {
      animation: fadeInUp 0.6s ease-out;
    }

    /* Additional hover effects */
    .navbar-brand:hover {
      color: var(--gold-accent);
      transform: scale(1.05);
    }

    /* Focus states for accessibility */
    .nav-link:focus,
    .btn:focus {
      outline: 2px solid var(--gold-accent);
      outline-offset: 2px;
    }
  </style>
  <script>
    // Simple mobile menu toggle
    document.addEventListener('DOMContentLoaded', function() {
      const toggler = document.querySelector('.navbar-toggler');
      const collapse = document.querySelector('.navbar-collapse');

      if (toggler && collapse) {
        toggler.addEventListener('click', function() {
          collapse.classList.toggle('show');
        });
      }
    });
  </script>
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
