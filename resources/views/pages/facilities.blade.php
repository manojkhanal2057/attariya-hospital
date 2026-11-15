@extends('layouts.site')

@section('content')

    <main id="main">

        {{-- =====================================
         PAGE BANNER
    ===================================== --}}
        <section class="page-banner">
            <div class="container">

                <div class="breadcrumbs">
                    <a href="{{ url('/') }}">Home</a>

                    <i data-lucide="chevron-right" aria-hidden="true" style="width:15px;height:15px"></i>

                    <span>Facilities &amp; Technology</span>
                </div>

                <span class="eyebrow">ATTARIYA HOSPITAL</span>

                <h1>Facilities &amp; Technology</h1>

                <p>
                    Explore our hospital facilities and
                    medical technology.
                </p>

            </div>

            <div class="banner-ring"></div>
        </section>


        {{-- =====================================
         FEATURED FACILITY - DYNAMIC
    ===================================== --}}
        @if ($featuredFacility)
            <section class="section">

                <div class="container split">

                    {{-- Featured Image --}}
                    <div class="photo-frame hospital-facility-photo">

                        @if ($featuredFacility->image)
                            <img src="{{ \Illuminate\Support\Facades\Storage::disk('public')->url($featuredFacility->image) }}"
                                alt="{{ $featuredFacility->name }}" loading="eager" fetchpriority="high" decoding="async">
                        @else
                            <div class="hospital-facility-placeholder">
                                <i data-lucide="building-2" aria-hidden="true"></i>
                            </div>
                        @endif

                    </div>


                    {{-- Featured Content --}}
                    <div class="split-copy">

                        <span class="eyebrow">
                            FEATURED FACILITY
                        </span>

                        <h2>{{ $featuredFacility->name }}</h2>

                        @if ($featuredFacility->description)
                            <div class="facility-description">
                                {{ trim($featuredFacility->description) }}
                            </div>
                        @endif

                        <a href="{{ url('/contact') }}" class="btn btn-primary">
                            Contact Hospital

                            <i data-lucide="arrow-up-right" aria-hidden="true" style="width:17px;height:17px"></i>
                        </a>

                    </div>

                </div>

            </section>
        @endif


        {{-- =====================================
         OTHER FACILITIES - DYNAMIC
    ===================================== --}}
        @if ($otherFacilities->isNotEmpty())
            <section class="section">

                <div class="container">

                    <div class="section-heading">

                        <div>

                            <span class="eyebrow">
                                HOSPITAL INFRASTRUCTURE
                            </span>

                            <h2>
                                More Hospital Facilities
                            </h2>

                            <p>
                                Explore additional facilities
                                at Attariya Hospital.
                            </p>

                        </div>

                    </div>


                    <div class="three-grid hospital-facilities-grid">

                        @foreach ($otherFacilities as $facility)
                            <article class="simple-card hospital-facility-card">

                                {{-- Facility Image --}}
                                @if ($facility->image)
                                    <div class="hospital-facility-thumb">

                                        <img src="{{ \Illuminate\Support\Facades\Storage::disk('public')->url($facility->image) }}"
                                            alt="{{ $facility->name }}" loading="lazy" decoding="async">

                                    </div>
                                @else
                                    <span class="icon-tile">

                                        <i data-lucide="building-2" aria-hidden="true"></i>

                                    </span>
                                @endif


                                {{-- Facility Information --}}
                                <h3>{{ $facility->name }}</h3>

                                @if ($facility->description)
                                    <p>
                                        {{ \Illuminate\Support\Str::limit($facility->description, 140) }}
                                    </p>
                                @endif

                            </article>
                        @endforeach

                    </div>

                </div>

            </section>
        @endif


        {{-- =====================================
         HOSPITAL CARE - ORIGINAL DESIGN
    ===================================== --}}
        <section class="section section-tint">

            <div class="container">

                <div class="section-heading">

                    <div>

                        <span class="eyebrow">
                            SERVICES &amp; SUPPORT
                        </span>

                        <h2>A look at hospital care</h2>

                        <p>
                            Explore hospital care and support
                            services.
                        </p>

                    </div>

                </div>


                <div class="three-grid">

                    {{-- Emergency Care --}}
                    <a href="{{ url('/service-emergency') }}" class="simple-card">

                        <span class="icon-tile">

                            <i data-lucide="ambulance" aria-hidden="true" style="width:26px;height:26px"></i>

                        </span>

                        <h3>Emergency Care</h3>

                        <p>
                            Emergency-related hospital support.
                            Please contact the hospital directly
                            for urgent assistance.
                        </p>

                        <span class="text-link">

                            Learn more

                            <i data-lucide="arrow-up-right" aria-hidden="true" style="width:16px;height:16px"></i>

                        </span>

                    </a>


                    {{-- OPD Consultation --}}
                    <a href="{{ url('/service-opd') }}" class="simple-card">

                        <span class="icon-tile">

                            <i data-lucide="clipboard-list" aria-hidden="true" style="width:26px;height:26px"></i>

                        </span>

                        <h3>OPD Consultation</h3>

                        <p>
                            Outpatient consultation for a variety
                            of medical concerns.
                        </p>

                        <span class="text-link">

                            Learn more

                            <i data-lucide="arrow-up-right" aria-hidden="true" style="width:16px;height:16px"></i>

                        </span>

                    </a>


                    {{-- Laboratory --}}
                    <a href="{{ url('/service-laboratory') }}" class="simple-card">

                        <span class="icon-tile">

                            <i data-lucide="flask-conical" aria-hidden="true" style="width:26px;height:26px"></i>

                        </span>

                        <h3>Laboratory</h3>

                        <p>
                            Laboratory testing and clinical
                            diagnostic support.
                        </p>

                        <span class="text-link">

                            Learn more

                            <i data-lucide="arrow-up-right" aria-hidden="true" style="width:16px;height:16px"></i>

                        </span>

                    </a>

                </div>

            </div>

        </section>

    </main>

@endsection
