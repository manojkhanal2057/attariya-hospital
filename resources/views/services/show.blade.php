
@extends('layouts.site')

@section('content')
    <main id="main">

        {{-- PAGE BANNER --}}
        <section class="page-banner">
            <div class="container">

                <div class="breadcrumbs">
                    <a href="{{ route('home') }}">Home</a>

                    <i data-lucide="chevron-right" aria-hidden="true"
                        style="width:15px;height:15px"></i>

                    <a href="{{ route('services.index') }}">Services</a>

                    <i data-lucide="chevron-right" aria-hidden="true"
                        style="width:15px;height:15px"></i>

                    <span>{{ $service->name }}</span>
                </div>

                <span class="eyebrow">ATTARIYA HOSPITAL</span>

                <h1>{{ $service->name }}</h1>

                <p>
                    {{ $service->description ?: 'Explore our hospital services and facilities.' }}
                </p>

            </div>

            <div class="banner-ring"></div>
        </section>

        {{-- MAIN SERVICE DETAILS --}}
        <section class="section">
            <div class="container service-detail-layout">

                {{-- LEFT: RELATED SERVICES SIDEBAR --}}
                <aside class="services-sidebar">

                    <h3>Our Services</h3>

                    <nav aria-label="Hospital services">

                        @forelse ($relatedServices as $item)
                            <a href="{{ route('services.show', $item->slug) }}"
                                class="{{ $service->id === $item->id ? 'active' : '' }}"
                                @if ($service->id === $item->id) aria-current="page" @endif>

                                <i data-lucide="{{ $item->icon ?: 'activity' }}"
                                    aria-hidden="true"></i>

                                <span>{{ $item->name }}</span>
                            </a>
                        @empty
                            <p class="services-sidebar-empty">
                                More services coming soon.
                            </p>
                        @endforelse

                    </nav>

                </aside>

                {{-- CENTER: SERVICE CONTENT --}}
                <article class="service-detail-content">

                    {{-- MAIN THUMBNAIL --}}
                    @if ($service->image)
                        <div class="service-detail-hero">
                            <img src="{{ asset('storage/' . $service->image) }}"
                                alt="{{ $service->name }}"
                                class="service-detail-image">
                        </div>
                    @endif

                    {{-- SERVICE OVERVIEW --}}
                    <div class="service-detail-overview">

                        <span class="eyebrow">MEDICAL SERVICES</span>

                        <h2>{{ $service->name }}</h2>

                        @if ($service->description)
                            <p>{{ $service->description }}</p>
                        @endif

                    </div>

                    {{-- FULL SERVICE DESCRIPTION --}}
                    @php
                        $plainBody = trim(
                            preg_replace(
                                '/\s+/u',
                                ' ',
                                strip_tags($service->body ?? '')
                            ) ?? ''
                        );
                    @endphp

                    @if ($plainBody !== '')
                        <div class="service-detail-description">
                            <h3>About This Service</h3>

                            <p>{{ html_entity_decode($plainBody, ENT_QUOTES | ENT_HTML5, 'UTF-8') }}</p>
                        </div>
                    @else
                        <div class="service-detail-description">
                            <h3>Service Information</h3>

                            <p>
                                For more information about {{ $service->name }},
                                including availability, consultation schedules
                                and other details, please contact Attariya Hospital.
                            </p>
                        </div>
                    @endif

                    {{-- RELATED SERVICE IMAGES GALLERY --}}
                    @if (!empty($service->related_images) && count($service->related_images) > 0)

                        <section class="service-gallery" aria-labelledby="service-gallery-title">

                            <div class="service-gallery__heading">

                                <span class="eyebrow">PHOTO GALLERY</span>

                                <h2 id="service-gallery-title">
                                    {{ $service->name }} Gallery
                                </h2>

                                <p>
                                    Explore photos related to this hospital service.
                                </p>

                            </div>

                            <div class="service-gallery__grid">

                                @foreach ($service->related_images as $image)
                                    <a href="{{ asset('storage/' . $image) }}"
                                        class="service-gallery__item"
                                        target="_blank"
                                        rel="noopener noreferrer"
                                        aria-label="View {{ $service->name }} image {{ $loop->iteration }}">

                                        <img src="{{ asset('storage/' . $image) }}"
                                            alt="{{ $service->name }} - Photo {{ $loop->iteration }}"
                                            loading="lazy">

                                        <span class="service-gallery__zoom">
                                            <i data-lucide="expand" aria-hidden="true"></i>
                                        </span>

                                    </a>
                                @endforeach

                            </div>

                        </section>

                    @endif

                    {{-- BOTTOM CTA --}}
                    <div class="service-detail-cta">

                        <div>
                            <span class="eyebrow">WE ARE HERE TO HELP</span>

                            <h3>Need More Information?</h3>

                            <p>
                                Contact our hospital team for service details
                                and appointment availability.
                            </p>
                        </div>

                        <a href="{{ url('/appointment') }}" class="btn btn-primary">
                            Request Appointment
                            <i data-lucide="arrow-up-right" aria-hidden="true"></i>
                        </a>

                    </div>

                </article>

                {{-- RIGHT: CONTACT CARD --}}
                <aside class="service-contact-sidebar">

                    <div class="side-card">

                        <span class="eyebrow">NEED HELP?</span>

                        <h3>Questions about this service?</h3>

                        <p>
                            Contact our hospital team for details
                            and availability.
                        </p>

                        <a href="tel:+97791590547"
                            class="btn btn-primary btn-block">
                            Call 091-590547
                        </a>

                        <a href="{{ url('/appointment') }}"
                            class="btn btn-secondary btn-block">
                            Request Appointment
                        </a>

                    </div>

                </aside>

            </div>
        </section>

        {{-- SERVICE AVAILABILITY NOTICE --}}
        <div class="notice-strip">
            <div class="container">

                <i data-lucide="info" aria-hidden="true"
                    style="width:17px;height:17px"></i>

                Service availability, doctor schedules and appointment
                timings should be confirmed before visiting.

                <a href="tel:+97791590547">Call 091-590547</a>

            </div>
        </div>

    </main>
@endsection
