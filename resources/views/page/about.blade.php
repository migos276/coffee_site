@extends('frontend.layout.app')

@section('title', 'À propos - Cabinet d\'avocats')
@section('meta_description', 'Découvrez notre cabinet d\'avocats et notre engagement envers nos clients')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <h1 class="mb-4">À propos de notre cabinet</h1>

            <div class="mb-5">
                <h2>Notre mission</h2>
                <p class="lead">
                    Notre cabinet d'avocats s'engage à fournir des services juridiques de qualité supérieure
                    avec intégrité, professionnalisme et dévouement envers nos clients.
                </p>
            </div>

            <div class="mb-5">
                <h2>Notre histoire</h2>
                <p>
                    Fondé il y a plus de 15 ans, notre cabinet a bâti une solide réputation dans le domaine
                    juridique grâce à notre expertise approfondie et notre approche personnalisée de chaque dossier.
                </p>
            </div>

            <div class="mb-5">
                <h2>Nos valeurs</h2>
                <ul class="list-unstyled">
                    <li class="mb-2"><i class="bi bi-check-circle text-primary me-2"></i> Intégrité et éthique professionnelle</li>
                    <li class="mb-2"><i class="bi bi-check-circle text-primary me-2"></i> Excellence juridique</li>
                    <li class="mb-2"><i class="bi bi-check-circle text-primary me-2"></i> Service client personnalisé</li>
                    <li class="mb-2"><i class="bi bi-check-circle text-primary me-2"></i> Confidentialité absolue</li>
                </ul>
            </div>

            <div class="text-center">
                <a href="{{ route('contact') }}" class="btn btn-primary btn-lg">Contactez-nous</a>
            </div>
        </div>
    </div>
