
@extends('layouts.site')

@section('content')
    <main id="main">

        {{-- HEALTH PACKAGES HERO BANNER --}}
        <section class="ah-packages-banner"
            aria-labelledby="packages-heading">

            <div class="container">
                <div class="ah-packages-banner__content">

                    <span class="eyebrow">HEALTH PACKAGES</span>

                    <h1 id="packages-heading">
                        Health Checkup <span>Packages</span>
                    </h1>

                    <p>
                        Explore our available health checkup packages.
                        Confirm current test availability, pricing and
                        appointment details directly with the hospital.
                    </p>

                    <div class="ah-packages-banner__actions">
                        <a href="#health-packages"
                            class="btn btn-primary">
                            Explore Packages
                            <i data-lucide="arrow-down"
                                aria-hidden="true"></i>
                        </a>

                        <a href="{{ url('/contact') }}"
                            class="ah-packages-banner__contact">
                            Contact Hospital
                            <i data-lucide="arrow-up-right"
                                aria-hidden="true"></i>
                        </a>
                    </div>

                </div>
            </div>

        </section>

        {{-- DYNAMIC HEALTH PACKAGES --}}
        <section class="section section-tint ah-packages-section"
            id="health-packages"
            aria-labelledby="packages-list-heading">

            <div class="container">

                <div class="section-heading ah-packages-heading">
                    <div>
                        <span class="eyebrow">
                            HEALTH CHECKUP OPTIONS
                        </span>

                        <h2 id="packages-list-heading">
                            Find a Health Package
                        </h2>

                        <p>
                            Browse published packages and their
                            available details.
                        </p>
                    </div>
                </div>

                <div class="ah-packages-grid">

                    @forelse($packages as $package)

                        @php
                            // Works with both arrays and Eloquent models
                            $thumbnail = data_get($package, 'thumbnail')
                                ?? data_get($package, 'image');

                            $name = data_get(
                                $package,
                                'name',
                                'Health Package'
                            );

                            $slug = data_get($package, 'slug');

                            $description = data_get(
                                $package,
                                'short_description'
                            ) ?? data_get($package, 'description');

                            $price = data_get($package, 'price');

                            $offerPrice = data_get(
                                $package,
                                'offer_price'
                            );

                            $validOffer = $price !== null
                                && $offerPrice !== null
                                && (float) $offerPrice < (float) $price;

                            $displayPrice = $validOffer
                                ? $offerPrice
                                : $price;
                        @endphp

                        <article class="ah-package-card">

                            {{-- PACKAGE IMAGE --}}
                            <div class="ah-package-card__media">

                                @if ($thumbnail)
                                    <img
                                        src="{{ asset('storage/' . $thumbnail) }}"
                                        alt="{{ $name }}"
                                        loading="lazy">
                                @else
                                    <div class="ah-package-card__placeholder">
                                        <i data-lucide="heart-pulse"
                                            aria-hidden="true"></i>
                                        <span>Health Checkup</span>
                                    </div>
                                @endif

                            </div>

                            {{-- PACKAGE CONTENT --}}
                            <div class="ah-package-card__body">

                                <span class="ah-package-card__label">
                                    HEALTH PACKAGE
                                </span>

                                <h3>{{ $name }}</h3>

                                @if ($description)
                                    <p class="ah-package-card__description">
                                        {{ \Illuminate\Support\Str::limit(
                                            strip_tags($description),
                                            130
                                        ) }}
                                    </p>
                                @endif

                                {{-- PACKAGE PRICING --}}
                                @if ($price !== null)

                                    <div class="ah-package-card__pricing">

                                        <strong>
                                            NPR
                                            {{ number_format((float) $displayPrice, 2) }}
                                        </strong>

                                        @if ($validOffer)
                                            <del>
                                                NPR
                                                {{ number_format((float) $price, 2) }}
                                            </del>
                                        @endif

                                    </div>

                                @else

                                    <p class="ah-package-card__enquiry">
                                        Contact hospital for pricing
                                    </p>

                                @endif

                                {{-- PACKAGE DETAIL BUTTON --}}
                                @if ($slug)
                                    <a
                                        class="btn btn-primary ah-package-card__button"
                                        href="{{ route('packages.show', $slug) }}">

                                        View Package

                                        <i
                                            data-lucide="arrow-up-right"
                                            aria-hidden="true"></i>

                                    </a>
                                @endif

                            </div>

                        </article>

                    @empty

                        <div class="ah-packages-empty">
                            <i data-lucide="clipboard-list"
                                aria-hidden="true"></i>

                            <h3>No Packages Published Yet</h3>

                            <p>
                                Please contact the hospital for
                                current health checkup information.
                            </p>

                            <a href="{{ url('/contact') }}"
                                class="btn btn-primary">
                                Contact Hospital
                            </a>
                        </div>

                    @endforelse

                </div>

            </div>

        </section>

    </main>
@endsection
