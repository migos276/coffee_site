@extends('frontend.layouts.app')

@section('title','Cabinet d\'avocats - Accueil')
@section('meta_description','Présentation du cabinet, domaines d\'expertise, équipe, témoignages, contact.')

@section('content')
  <section class="py-5 bg-light">
    <div class="container text-center">
      <h1 class="display-5 fw-bold">Votre partenaire juridique</h1>
      <p class="lead text-muted">Conseil, accompagnement et défense pour particuliers et entreprises.</p>
      <a class="btn btn-primary btn-lg" href="{{ route('contact') }}">Prendre rendez-vous</a>
    </div>
  </section>

  <section class="py-5">
    <div class="container">
      <h2 class="h3 mb-3">Présentation du cabinet</h2>
      <p>Texte d’accroche 1...</p>
      <p>Texte d’accroche 2...</p>
      <p>Texte d’accroche 3...</p>
    </div>
  </section>

  <section class="py-5 bg-light">
    <div class="container">
      <h2 class="h3 mb-4">Domaines d’expertise</h2>
      <div class="row g-4">
        @foreach($practices as $p)
          <div class="col-12 col-sm-6 col-lg-4">
            <div class="card h-100">
              <div class="card-body">
                <div class="mb-2"><span class="badge bg-warning text-dark">{{ $p->icon ?? '⚖️' }}</span></div>
                <h3 class="h5">{{ $p->name }}</h3>
                <p class="text-muted">{{ $p->short_description }}</p>
                <a href="{{ route('practices.show', $p->id) }}" class="stretched-link">En savoir plus</a>
              </div>
            </div>
          </div>
        @endforeach
      </div>
      <div class="mt-3"><a href="{{ route('practices.index') }}" class="btn btn-outline-primary">Tous les domaines</a></div>
    </div>
  </section>

  <section class="py-5">
    <div class="container">
      <h2 class="h3 mb-4">Notre équipe</h2>
      <div class="row g-4">
        @foreach($lawyers as $l)
          <div class="col-12 col-sm-6 col-lg-4">
            <div class="card h-100">
              <img src="{{ $l->photo ? asset('storage/'.$l->photo) : 'https://placehold.co/600x400?text=Avocat' }}" class="card-img-top" alt="Photo de {{ $l->full_name }}">
              <div class="card-body">
                <h3 class="h5 mb-1">{{ $l->full_name }}</h3>
                <div class="text-muted">{{ $l->title }}</div>
                <div class="small text-muted mt-2">
                  @foreach($l->practices as $p) <span class="badge bg-secondary me-1">{{ $p->name }}</span> @endforeach
                </div>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </section>

  <section class="py-5 bg-light">
    <div class="container">
      <h2 class="h3 mb-4">Contact rapide</h2>
      <form method="post" action="{{ route('contact.submit') }}" class="row g-3">
        @csrf
        <div class="col-md-6"><input class="form-control" name="name" placeholder="Nom" required></div>
        <div class="col-md-6"><input class="form-control" name="email" type="email" placeholder="Email" required></div>
        <div class="col-md-6"><input class="form-control" name="phone" placeholder="Téléphone"></div>
        <div class="col-md-6"><input class="form-control" name="subject" placeholder="Sujet"></div>
        <div class="col-12"><textarea class="form-control" name="message" rows="4" placeholder="Votre message" required></textarea></div>
        <div class="col-12"><button class="btn btn-primary">Envoyer</button></div>
      </form>
    </div>
  </section>
@endsection