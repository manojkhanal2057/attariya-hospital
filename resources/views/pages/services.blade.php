@extends('layouts.site')
@section('content')
    <main id="main">
        <section class="page-banner">
            <div class="container">
                <div class="breadcrumbs"><a href="{{ url('/') }}">Home</a><i aria-hidden="true" data-lucide="chevron-right"
                        style="width:15px;height:15px"></i><span>Our Services</span></div><span class="eyebrow">ATTARIYA
                    HOSPITAL</span>
                <h1>Our Services</h1>
                <p>A clearer way to explore the hospital’s medical services.</p>
            </div>
            <div class="banner-ring"></div>
        </section>
        <section class="section">
            <div class="container">
                <div class="cath-service-promo">
                    <div><span class="eyebrow">SIGNATURE CARDIAC SERVICE</span>
                        <h2>Sudurpashchim's first reported Cath Lab — introduced at Attariya Hospital</h2>
                        <p>Explore angiography, angioplasty and pacemaker procedures announced at the hospital's November
                            2025 Cath Lab launch.</p><a class="btn btn-primary"
                            href="{{ url('/service-cath-lab') }}">Discover the Cath Lab <i aria-hidden="true"
                                data-lucide="arrow-up-right"></i></a>
                    </div>
                    <div aria-hidden="true" class="cath-service-promo__icon"><i data-lucide="heart-pulse"></i></div>
                </div>
                <div class="section-heading">
                    <div><span class="eyebrow">MEDICAL SERVICES</span>
                        <h2>Support for your healthcare journey</h2>
                        <p>Service details and current availability should be reconfirmed with the hospital.</p>
                    </div>
                </div>
                <div class="service-grid">
                    @foreach ($services as $service)
                        @include('partials.service-card', ['service' => $service])
                    @endforeach
                </div>
            </div>
        </section>
        <div class="notice-strip">
            <div class="container"><i aria-hidden="true" data-lucide="info" style="width:17px;height:17px"></i> Doctor
                schedules and service availability should be confirmed by phone before visiting. <a
                    href="tel:+97791590547">Call 091-590547</a></div>
        </div>
    </main>
@endsection
