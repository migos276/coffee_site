@extends('frontend.layout.app')

@section('title', 'Domaines d\'expertise - Cabinet d\'avocats')
@section('meta_description', 'Découvrez tous les domaines d\'expertise de notre cabinet d\'avocats.')

@section('content')
  <section class="py-5 bg-light">
    <div class="container text-center">
      <h1 class="display-5 fw-bold">Domaines d'expertise</h1>
      <p class="lead text-muted">Tous les domaines juridiques dans lesquels nous intervenons</p>
    </div>
  </section>

  <section class="py-5">
    <div class="container">
      <div class="row g-4">
        @foreach($practices as $practice)
          <div class="col-12 col-sm-6 col-lg-4">
            <div class="card h-100">
              <div class="card-body">
                <div class="mb-2"><span class="badge bg-warning text-dark">{{ $practice->icon ?? '⚖️' }}</span></div>
                <h3 class="h5">{{ $practice->name }}</h3>
                <p class="text-muted">{{ $practice->short_description }}</p>
                <a href="{{ route('practices.show', $practice) }}" class="stretched-link">En savoir plus</a>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </section>
@endsection
