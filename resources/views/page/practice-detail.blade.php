@extends('frontend.layout.app')

@section('title', $practice->name . ' - Cabinet d\'avocats')
@section('meta_description', $practice->short_description)

@section('content')
  <section class="py-5 bg-light">
    <div class="container">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('home') }}">Accueil</a></li>
          <li class="breadcrumb-item"><a href="{{ route('practices.index') }}">Domaines d'expertise</a></li>
          <li class="breadcrumb-item active" aria-current="page">{{ $practice->name }}</li>
        </ol>
      </nav>
      <div class="text-center">
        <h1 class="display-5 fw-bold">{{ $practice->name }}</h1>
        <p class="lead text-muted">{{ $practice->short_description }}</p>
      </div>
    </div>
  </section>

  <section class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          <h2>Description détaillée</h2>
          <div class="content">
            {!! $practice->description ?? '<p>Description détaillée en cours de rédaction.</p>' !!}
          </div>

          @if($practice->lawyers->count() > 0)
            <h3 class="mt-5">Avocats spécialisés dans ce domaine</h3>
            <div class="row g-4 mt-2">
              @foreach($practice->lawyers as $lawyer)
                <div class="col-md-6">
                  <div class="card">
                    <div class="row g-0">
                      <div class="col-md-4">
                        <img src="{{ $lawyer->photo ? asset('storage/'.$lawyer->photo) : 'https://placehold.co/300x300?text=Avocat' }}"
                             class="img-fluid rounded-start h-100 object-fit-cover" alt="{{ $lawyer->full_name }}">
                      </div>
                      <div class="col-md-8">
                        <div class="card-body">
                          <h5 class="card-title">{{ $lawyer->full_name }}</h5>
                          <p class="card-text text-muted">{{ $lawyer->title }}</p>
                          <a href="#" class="btn btn-sm btn-outline-primary">Voir le profil</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              @endforeach
            </div>
          @endif
        </div>

        <div class="col-lg-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Besoin d'aide ?</h5>
              <p class="card-text">Contactez-nous pour discuter de votre situation et obtenir des conseils adaptés.</p>
              <a href="{{ route('contact') }}" class="btn btn-primary">Prendre rendez-vous</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
