
@extends('layouts.site')

@section('content')
    @php
        // Supports both arrays and Eloquent models
        $name = data_get($package, 'name', 'Health Package');
        $thumbnail = data_get($package, 'thumbnail')
            ?? data_get($package, 'image');

        $shortDescription = data_get($package, 'short_description');
        $description = data_get($package, 'description');

        $tests = data_get($package, 'tests', []);

        if (is_string($tests)) {
            $tests = json_decode($tests, true) ?: [];
        }

        $tests = is_array($tests) ? $tests : [];

        $price = data_get($package, 'price');
        $offerPrice = data_get($package, 'offer_price');

        $hasDiscount = $price !== null
            && $offerPrice !== null
            && (float) $offerPrice < (float) $price;

        $displayPrice = $hasDiscount ? $offerPrice : $price;
    @endphp

    <main id="main">

        {{-- PACKAGE DETAIL BANNER --}}
        <section class="ah-package-detail-banner">
            <div class="container">

                <span class="eyebrow">HEALTH CHECKUP PACKAGE</span>

                <h1>{{ $name }}</h1>

                <p>
                    Explore package details, included tests and
                    available health checkup information.
                </p>

                <a class="ah-package-detail-back"
                   href="{{ route('packages.index') }}">
                    <i data-lucide="arrow-left" aria-hidden="true"></i>
                    All Health Packages
                </a>

            </div>
        </section>

        {{-- PACKAGE DETAIL CONTENT --}}
        <section class="section ah-package-detail-section">
            <div class="container">

                <div class="ah-package-detail-grid">

                    {{-- LEFT: PACKAGE DETAILS --}}
                    <div class="ah-package-detail-main">

                        @if ($thumbnail)
                            <img
                                class="ah-package-detail-photo"
                                src="{{ asset('storage/' . $thumbnail) }}"
                                alt="{{ $name }}"
                                loading="lazy">
                        @endif

                        <span class="eyebrow">PACKAGE OVERVIEW</span>

                        <h2>{{ $name }}</h2>

                        @if ($shortDescription)
                            <p class="ah-package-detail-intro">
                                {{ $shortDescription }}
                            </p>
                        @endif

                        @if ($description)
                            <div class="ah-package-description">
                                {{ strip_tags($description) }}
                            </div>
                        @endif

                        {{-- INCLUDED TESTS --}}
                        <div class="ah-package-tests">

                            <h2>
                                <i data-lucide="clipboard-check"
                                   aria-hidden="true"></i>
                                Included Tests
                            </h2>

                            @if (count($tests) > 0)

                                <ul class="ah-package-tests-list">

                                    @foreach ($tests as $test)
                                        @php
                                            $testName = is_string($test)
                                                ? $test
                                                : data_get($test, 'name');
                                        @endphp

                                        @if ($testName)
                                            <li>
                                                <i data-lucide="check-circle-2"
                                                   aria-hidden="true"></i>

                                                <span>{{ $testName }}</span>
                                            </li>
                                        @endif
                                    @endforeach

                                </ul>

                            @else
                                <p>
                                    Please contact the hospital to confirm
                                    which tests are included in this package.
                                </p>
                            @endif

                        </div>

                    </div>

                    {{-- RIGHT: BOOKING SIDEBAR --}}
                    <aside class="ah-package-booking">

                        <div class="ah-package-booking__icon">
                            <i data-lucide="calendar-heart"
                               aria-hidden="true"></i>
                        </div>

                        <h2>Enquire About This Package</h2>

                        {{-- PACKAGE PRICE --}}
                        @if ($displayPrice !== null)

                            <div class="ah-package-booking__price">

                                <span>Package Price</span>

                                <strong>
                                    NPR {{ number_format((float) $displayPrice, 2) }}
                                </strong>

                                @if ($hasDiscount)
                                    <del>
                                        NPR {{ number_format((float) $price, 2) }}
                                    </del>
                                @endif

                            </div>

                        @else

                            <p class="ah-package-booking__contact-price">
                                Contact hospital for pricing
                            </p>

                        @endif

                        <p>
                            Confirm package tests, pricing, availability
                            and appointment details directly with
                            Attariya Hospital.
                        </p>

                        <a
                            class="btn btn-primary ah-package-booking__button"
                            href="{{ url('/appointment') }}">

                            <i data-lucide="calendar-check"
                               aria-hidden="true"></i>

                            Request Appointment
                        </a>

                        <a
                            class="ah-package-booking__contact"
                            href="{{ url('/contact') }}">

                            Contact Hospital
                            <i data-lucide="arrow-up-right"
                               aria-hidden="true"></i>
                        </a>

                    </aside>

                </div>

            </div>
        </section>

    </main>
@endsection
