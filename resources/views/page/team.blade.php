@extends('frontend.layout.app')

@section('title', 'Notre équipe - Cabinet d\'avocats')
@section('meta_description', 'Découvrez notre équipe d\'avocats spécialisés dans différents domaines du droit')

@section('content')
<div class="container py-5">
    <div class="text-center mb-5">
        <h1>Notre équipe d\'avocats</h1>
        <p class="lead">Des professionnels qualifiés à votre service</p>
    </div>

    <div class="row">
        @foreach($lawyers as $lawyer)
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card h-100">
                <div class="card-body text-center">
                    <div class="mb-3">
                        <img src="{{ $lawyer->photo ? asset('storage/' . $lawyer->photo) : 'https://via.placeholder.com/150' }}"
                             alt="{{ $lawyer->name }}"
                             class="rounded-circle"
                             style="width: 120px; height: 120px; object-fit: cover;">
                    </div>
                    <h5 class="card-title">{{ $lawyer->name }}</h5>
                    <p class="text-muted mb-2">{{ $lawyer->specialty }}</p>
                    <p class="card-text small">{{ Str::limit($lawyer->bio, 100) }}</p>
                    <a href="{{ route('practices.show', $lawyer->practice) }}" class="btn btn-outline-primary btn-sm">
                        Voir le profil
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <div class="text-center mt-5">
        <p class="mb-4">Vous avez besoin d\'un avocat spécialisé ?</p>
        <a href="{{ route('contact') }}" class="btn btn-primary btn-lg">Prendre rendez-vous</a>
    </div>
</div>
@endsection
