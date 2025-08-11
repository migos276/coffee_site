@extends('frontend.layout.app')

@section('title','Cabinet d\'avocats - Accueil')
@section('meta_description','Cabinet d\'avocats spécialisé en droit des affaires, droit de la famille et droit pénal. Expertise juridique de qualité pour particuliers et entreprises.')

@section('content')
  <!-- Section Hero avec dégradé moderne -->
  <section class="py-5 position-relative overflow-hidden" style="background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%); min-height: 60vh;">
    <div class="position-absolute w-100 h-100 opacity-10" style="background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><circle cx="20" cy="20" r="2" fill="white"/><circle cx="80" cy="80" r="2" fill="white"/><circle cx="40" cy="60" r="1.5" fill="white"/></svg>') repeat;"></div>
    <div class="container text-center text-white position-relative">
      <div class="row justify-content-center">
        <div class="col-lg-8">
          <h1 class="display-4 fw-bold mb-4 animate__animated animate__fadeInUp">Excellence juridique à votre service</h1>
          <p class="lead mb-4 opacity-90">Depuis plus de 20 ans, nous accompagnons nos clients avec expertise, intégrité et dévouement dans tous leurs défis juridiques.</p>
          <div class="d-flex gap-3 justify-content-center flex-wrap">
            <a class="btn btn-light btn-lg px-4 py-3 shadow-sm" href="{{ route('contact') }}">
              <i class="fas fa-calendar-alt me-2"></i>Consultation gratuite
            </a>
            <a class="btn btn-outline-light btn-lg px-4 py-3" href="#expertise">
              <i class="fas fa-arrow-down me-2"></i>Découvrir nos services
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Section Présentation avec design moderne -->
  <section class="py-5 bg-white">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6">
          <div class="pe-lg-4">
            <span class="badge bg-primary bg-opacity-10 text-primary px-3 py-2 mb-3">À propos de notre cabinet</span>
            <h2 class="display-6 fw-bold mb-4 text-dark">Votre réussite, notre mission</h2>
            <p class="text-muted fs-5 mb-4">Fort d'une expérience reconnue et d'une approche personnalisée, notre cabinet vous offre un accompagnement juridique d'excellence adapté à vos besoins spécifiques.</p>

            <div class="row g-3 mb-4">
              <div class="col-6">
                <div class="text-center p-3 bg-light rounded">
                  <div class="h4 text-primary fw-bold mb-1">500+</div>
                  <div class="small text-muted">Clients satisfaits</div>
                </div>
              </div>
              <div class="col-6">
                <div class="text-center p-3 bg-light rounded">
                  <div class="h4 text-primary fw-bold mb-1">20</div>
                  <div class="small text-muted">Années d'expérience</div>
                </div>
              </div>
            </div>

            <p class="text-muted mb-4">Que vous soyez un particulier ou une entreprise, nous mettons notre expertise à votre disposition pour défendre vos intérêts et vous accompagner dans vos projets les plus complexes.</p>
            <p class="text-muted">Notre cabinet privilégie une relation de confiance basée sur l'écoute, la transparence et l'efficacité. Chaque dossier bénéficie d'une attention particulière et d'une stratégie sur mesure.</p>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="position-relative">
            <img src="https://images.unsplash.com/photo-1589829545856-d10d557cf95f?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                 class="img-fluid rounded-3 shadow-lg"
                 alt="Cabinet d'avocats moderne">
            <div class="position-absolute top-0 start-0 w-100 h-100 bg-primary bg-opacity-10 rounded-3"></div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Section Domaines d'expertise avec design cards premium -->
  <section id="expertise" class="py-5 bg-light">
    <div class="container">
      <div class="text-center mb-5">
        <span class="badge bg-primary bg-opacity-10 text-primary px-3 py-2 mb-3">Nos spécialisations</span>
        <h2 class="display-6 fw-bold mb-3 text-dark">Domaines d'expertise</h2>
        <p class="text-muted fs-5 col-lg-8 mx-auto">Une expertise reconnue dans des domaines juridiques essentiels pour répondre à tous vos besoins</p>
      </div>

      <div class="row g-4">
        @foreach($practices as $p)
          <div class="col-12 col-sm-6 col-lg-4">
            <div class="card h-100 border-0 shadow-sm hover-lift transition-all">
              <div class="card-body p-4 text-center">
                <div class="mb-3">
                  <div class="bg-primary bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                    <span style="font-size: 24px;">{{ $p->icon ?? '⚖️' }}</span>
                  </div>
                </div>
                <h3 class="h5 fw-bold mb-3 text-dark">{{ $p->name }}</h3>
                <p class="text-muted mb-4">{{ $p->short_description }}</p>
                <a href="{{ route('practices.show', $p->id) }}" class="btn btn-outline-primary btn-sm stretched-link">
                  <i class="fas fa-arrow-right me-1"></i>En savoir plus
                </a>
              </div>
            </div>
          </div>
        @endforeach
      </div>

      <div class="text-center mt-5">
        <a href="{{ route('practices.index') }}" class="btn btn-primary btn-lg px-4">
          <i class="fas fa-th-large me-2"></i>Découvrir tous nos domaines
        </a>
      </div>
    </div>
  </section>

  <!-- Section Équipe avec design professionnel -->
  <section class="py-5 bg-white">
    <div class="container">
      <div class="text-center mb-5">
        <span class="badge bg-primary bg-opacity-10 text-primary px-3 py-2 mb-3">Notre force</span>
        <h2 class="display-6 fw-bold mb-3 text-dark">Une équipe d'experts à vos côtés</h2>
        <p class="text-muted fs-5 col-lg-8 mx-auto">Des avocats expérimentés et passionnés, reconnus pour leur expertise et leur engagement</p>
      </div>

      <div class="row g-4">
        @foreach($lawyers as $l)
          <div class="col-12 col-sm-6 col-lg-4">
            <div class="card border-0 shadow-sm h-100 hover-lift transition-all">
              <div class="position-relative overflow-hidden">
                <img src="{{ $l->photo ? asset('storage/'.$l->photo) : 'https://images.unsplash.com/photo-1560250097-0b93528c311a?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80' }}"
                     class="card-img-top"
                     style="height: 280px; object-fit: cover;"
                     alt="Photo de {{ $l->full_name }}">
                <div class="position-absolute top-0 start-0 w-100 h-100 bg-dark bg-opacity-20"></div>
              </div>
              <div class="card-body p-4 text-center">
                <h3 class="h5 fw-bold mb-2 text-dark">{{ $l->full_name }}</h3>
                <div class="text-primary fw-medium mb-3">{{ $l->title }}</div>
                <div class="d-flex flex-wrap gap-1 justify-content-center">
                  @foreach($l->practices as $p)
                    <span class="badge bg-light text-dark border">{{ $p->name }}</span>
                  @endforeach
                </div>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </section>

  <!-- Section Contact avec design moderne et CTA fort -->
  <section class="py-5 position-relative" style="background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8">
          <div class="text-center mb-5">
            <span class="badge bg-primary bg-opacity-10 text-primary px-3 py-2 mb-3">Nous contacter</span>
            <h2 class="display-6 fw-bold mb-3 text-dark">Parlons de votre situation</h2>
            <p class="text-muted fs-5">Bénéficiez d'un premier échange gratuit pour évaluer vos besoins juridiques</p>
          </div>

          <div class="card border-0 shadow-lg">
            <div class="card-body p-5">
              <form method="post" action="{{ route('contact.submit') }}" class="row g-4">
                @csrf
                <div class="col-md-6">
                  <label class="form-label fw-medium text-dark">Nom complet *</label>
                  <input class="form-control form-control-lg border-0 bg-light" name="name" placeholder="Votre nom complet" required>
                </div>
                <div class="col-md-6">
                  <label class="form-label fw-medium text-dark">Adresse email *</label>
                  <input class="form-control form-control-lg border-0 bg-light" name="email" type="email" placeholder="votre@email.com" required>
                </div>
                <div class="col-md-6">
                  <label class="form-label fw-medium text-dark">Téléphone</label>
                  <input class="form-control form-control-lg border-0 bg-light" name="phone" placeholder="+33 1 23 45 67 89">
                </div>
                <div class="col-md-6">
                  <label class="form-label fw-medium text-dark">Domaine juridique</label>
                  <input class="form-control form-control-lg border-0 bg-light" name="subject" placeholder="Ex: Droit de la famille">
                </div>
                <div class="col-12">
                  <label class="form-label fw-medium text-dark">Décrivez votre situation *</label>
                  <textarea class="form-control form-control-lg border-0 bg-light" name="message" rows="4" placeholder="Expliquez-nous brièvement votre situation juridique..." required></textarea>
                </div>
                <div class="col-12 text-center">
                  <button class="btn btn-primary btn-lg px-5 py-3">
                    <i class="fas fa-paper-plane me-2"></i>Demander une consultation
                  </button>
                  <div class="small text-muted mt-2">
                    <i class="fas fa-shield-alt me-1"></i>Vos données sont protégées et confidentielles
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Section informations pratiques -->
  <section class="py-4 bg-dark text-white">
    <div class="container">
      <div class="row text-center g-4">
        <div class="col-lg-3 col-md-6">
          <i class="fas fa-phone text-primary mb-2" style="font-size: 1.5rem;"></i>
          <div class="fw-bold">Urgences</div>
          <div class="small opacity-75">7j/7 - 24h/24</div>
        </div>
        <div class="col-lg-3 col-md-6">
          <i class="fas fa-clock text-primary mb-2" style="font-size: 1.5rem;"></i>
          <div class="fw-bold">Réponse rapide</div>
          <div class="small opacity-75">Sous 24h ouvrées</div>
        </div>
        <div class="col-lg-3 col-md-6">
          <i class="fas fa-handshake text-primary mb-2" style="font-size: 1.5rem;"></i>
          <div class="fw-bold">Premier rendez-vous</div>
          <div class="small opacity-75">Gratuit et sans engagement</div>
        </div>
        <div class="col-lg-3 col-md-6">
          <i class="fas fa-award text-primary mb-2" style="font-size: 1.5rem;"></i>
          <div class="fw-bold">Expertise reconnue</div>
          <div class="small opacity-75">Certifiée depuis 2003</div>
        </div>
      </div>
    </div>
  </section>

  <style>
    .hover-lift {
      transition: all 0.3s ease;
    }
    .hover-lift:hover {
      transform: translateY(-10px);
      box-shadow: 0 1rem 3rem rgba(0,0,0,0.175) !important;
    }
    .transition-all {
      transition: all 0.3s ease;
    }
  </style>
@endsection
