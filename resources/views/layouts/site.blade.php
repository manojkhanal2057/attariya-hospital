<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width,initial-scale=1" name="viewport" />
    <title>{{ $title ?? 'Attariya Hospital Pvt. Ltd.' }}</title>
    <meta content="Attariya Hospital — Advanced Cardiac Care in Sudurpashchim" property="og:title" />
    <meta content="website" property="og:type" />
    <meta content="#0878b8" name="theme-color" />
    <link href="{{ asset('assets/images/hospital-logo.png') }}" rel="icon" />
    <link href="https://fonts.googleapis.com" rel="preconnect" />
    <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect" />
    <link
        href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&amp;family=Manrope:wght@400;500;600;700;800&amp;family=Noto+Sans+Devanagari:wght@400;500;600;700&amp;display=swap"
        rel="stylesheet" />
    <link href="{{ asset('assets/css/styles.css') }}" rel="stylesheet" />
    <script defer="" src="https://unpkg.com/lucide@0.468.0/dist/umd/lucide.min.js"></script>
    <script defer="" src="{{ asset('assets/js/site.js') }}"></script>
    <meta name="description" content="{{ $description ?? 'Attariya Hospital in Attariya, Kailali.' }}">@stack('head')
</head>

<body>

<header class="site-header ah-header" id="siteHeader">

    <div class="container header-inner ah-header-inner">

        {{-- HOSPITAL BRAND --}}
        <a
            class="brand ah-header-brand"
            href="{{ url('/') }}"
            aria-label="Attariya Hospital - Home"
        >

            <span class="ah-brand-logo">
                <img
                    src="{{ asset('assets/images/hospital-logo.png') }}"
                    alt="Attariya Hospital logo"
                    width="48"
                    height="48"
                    loading="eager"
                >
            </span>

            <span class="ah-brand-text">
                <strong>
                    ATTARIYA <em>HOSPITAL</em>
                </strong>

                <small>अत्तरिया हस्पिटल प्रा.लि.</small>
            </span>

        </a>


        {{-- DESKTOP NAVIGATION --}}
        <nav
            aria-label="Main navigation"
            class="desktop-nav ah-desktop-nav"
        >

            <a class="nav-link {{ request()->is('/') ? 'active' : '' }}"
               href="{{ url('/') }}"
               @if(request()->is('/')) aria-current="page" @endif>
                Home
            </a>

            <a class="nav-link {{ request()->is('about') ? 'active' : '' }}"
               href="{{ url('/about') }}"
               @if(request()->is('about')) aria-current="page" @endif>
                About
            </a>

            <a class="nav-link {{ request()->is('departments', 'department-*') ? 'active' : '' }}"
               href="{{ url('/departments') }}"
               @if(request()->is('departments', 'department-*')) aria-current="page" @endif>
                Departments
            </a>

            <a class="nav-link {{ request()->is('services', 'service-*') ? 'active' : '' }}"
               href="{{ url('/services') }}"
               @if(request()->is('services', 'service-*')) aria-current="page" @endif>
                Services
            </a>

            <a class="nav-link {{ request()->is('doctors', 'doctor-*') ? 'active' : '' }}"
               href="{{ url('/doctors') }}"
               @if(request()->is('doctors', 'doctor-*')) aria-current="page" @endif>
                Doctors
            </a>

            <a class="nav-link {{ request()->is('facilities') ? 'active' : '' }}"
               href="{{ url('/facilities') }}"
               @if(request()->is('facilities')) aria-current="page" @endif>
                Facilities
            </a>

            <a class="nav-link {{ request()->is('gallery') ? 'active' : '' }}"
               href="{{ url('/gallery') }}"
               @if(request()->is('gallery')) aria-current="page" @endif>
                Gallery
            </a>

            <a class="nav-link {{ request()->is('news', 'news/*') ? 'active' : '' }}"
               href="{{ url('/news') }}"
               @if(request()->is('news', 'news/*')) aria-current="page" @endif>
                News
            </a>

            <a class="nav-link {{ request()->is('contact') ? 'active' : '' }}"
               href="{{ url('/contact') }}"
               @if(request()->is('contact')) aria-current="page" @endif>
                Contact
            </a>

        </nav>


        {{-- HEADER ACTIONS --}}
        <div class="head-actions ah-header-actions">

            <a
                href="{{ url('/appointment') }}"
                class="btn btn-primary header-appointment ah-appointment-btn"
            >
                <i
                    data-lucide="calendar-days"
                    aria-hidden="true"
                ></i>

                <span
                    data-en="Book Appointment"
                    data-ne="अपोइन्टमेन्ट अनुरोध"
                >
                    Book Appointment
                </span>

                <i
                    class="ah-appointment-arrow"
                    data-lucide="arrow-up-right"
                    aria-hidden="true"
                ></i>
            </a>


            {{-- MOBILE MENU BUTTON --}}
            <button
                id="menuToggle"
                class="mobile-toggle ah-mobile-toggle"
                type="button"
                aria-label="Open navigation"
                aria-controls="mobileNav"
                aria-expanded="false"
            >
                <i
                    data-lucide="menu"
                    aria-hidden="true"
                ></i>
            </button>

        </div>

    </div>


    {{-- MOBILE NAVIGATION --}}
    <nav
        id="mobileNav"
        class="mobile-nav ah-mobile-nav"
        aria-label="Mobile navigation"
    >

        <a class="nav-link {{ request()->is('/') ? 'active' : '' }}"
           href="{{ url('/') }}">Home</a>

        <a class="nav-link {{ request()->is('about') ? 'active' : '' }}"
           href="{{ url('/about') }}">About</a>

        <a class="nav-link {{ request()->is('departments', 'department-*') ? 'active' : '' }}"
           href="{{ url('/departments') }}">Departments</a>

        <a class="nav-link {{ request()->is('services', 'service-*') ? 'active' : '' }}"
           href="{{ url('/services') }}">Services</a>

        <a class="nav-link {{ request()->is('doctors', 'doctor-*') ? 'active' : '' }}"
           href="{{ url('/doctors') }}">Doctors</a>

        <a class="nav-link {{ request()->is('facilities') ? 'active' : '' }}"
           href="{{ url('/facilities') }}">Facilities</a>

        <a class="nav-link {{ request()->is('gallery') ? 'active' : '' }}"
           href="{{ url('/gallery') }}">Gallery</a>

        <a class="nav-link {{ request()->is('news', 'news/*') ? 'active' : '' }}"
           href="{{ url('/news') }}">News</a>

        <a class="nav-link {{ request()->is('contact') ? 'active' : '' }}"
           href="{{ url('/contact') }}">Contact</a>

        <a
            class="btn btn-primary ah-mobile-appointment"
            href="{{ url('/appointment') }}"
        >
            <i data-lucide="calendar-days" aria-hidden="true"></i>
            Request Appointment
        </a>

    </nav>

</header>

    @if (session('success'))
        <div class="container" role="status"
            style="padding:16px;border:1px solid #b7d7e7;border-radius:12px;margin-top:12px;color:#075985">
            {{ session('success') }}</div>
    @endif
    @if ($errors->any())
        <div class="container" role="alert" style="padding:16px;margin-top:12px;background:#fff1f2;color:#9f1239">
            {{ $errors->first() }}</div>
    @endif
    @yield('content')

    @php
        // Website settings
        $hospitalAddress =
            \App\Models\SiteSetting::where('key', 'address')->value('value') ?: 'Mahendranagar Road, Attariya, Kailali';

        $facebookUrl =
            \App\Models\SiteSetting::where('key', 'facebook')->value('value') ?:
            'https://www.facebook.com/attariyahospital';

        $hospitalPhone = '091-590547';
        $hospitalEmail = 'attariyahospital@gmail.com';
    @endphp

    <footer class="footer ah-footer">

        {{-- TOP CALL TO ACTION --}}
        <div class="container ah-footer-top">

            <div class="ah-footer-cta">

                <div class="ah-cta-content">

                    <span class="ah-cta-eyebrow">
                        <i data-lucide="heart-pulse" aria-hidden="true"></i>
                        WE'RE HERE TO HELP
                    </span>

                    <h2>
                        Your health matters.
                        <span>We're here to help.</span>
                    </h2>

                    <p>
                        Have questions about our medical services
                        or need an appointment? Connect with
                        Attariya Hospital for assistance.
                    </p>

                </div>

                <div class="ah-cta-actions">

                    <a href="{{ url('/appointment') }}" class="ah-cta-button">

                        Request Appointment

                        <i data-lucide="arrow-up-right" aria-hidden="true"></i>
                    </a>

                    <a href="tel:+97791590547" class="ah-cta-phone">

                        <i data-lucide="phone-call" aria-hidden="true"></i>

                        {{ $hospitalPhone }}
                    </a>

                </div>

                <div class="ah-cta-decoration" aria-hidden="true">
                    <i data-lucide="heart-pulse"></i>
                </div>

            </div>

        </div>


        {{-- MAIN FOOTER --}}
        <div class="container ah-footer-main">

            {{-- ABOUT --}}
            <div class="ah-footer-about">

                <a href="{{ url('/') }}" class="ah-footer-brand" aria-label="Attariya Hospital Home">

                    <img src="{{ asset('assets/images/hospital-logo.png') }}" alt="Attariya Hospital logo"
                        width="52" height="52" loading="lazy">

                    <span>
                        <strong>ATTARIYA HOSPITAL</strong>
                        <small>अत्तरिया हस्पिटल प्रा.लि.</small>
                    </span>

                </a>

                <p class="ah-footer-description">
                    Attariya Hospital Pvt. Ltd. provides
                    information about hospital services,
                    medical professionals, facilities and
                    patient appointments in Attariya, Kailali.
                </p>

                <div class="ah-footer-socials">

                    <a href="{{ $facebookUrl }}" target="_blank" rel="noopener noreferrer"
                        aria-label="Attariya Hospital on Facebook" class="ah-social-link">
                        <i data-lucide="facebook" aria-hidden="true"></i>
                    </a>

                    <a href="mailto:{{ $hospitalEmail }}" aria-label="Email Attariya Hospital"
                        class="ah-social-link">
                        <i data-lucide="mail" aria-hidden="true"></i>
                    </a>

                    <a href="tel:+97791590547" aria-label="Call Attariya Hospital" class="ah-social-link">
                        <i data-lucide="phone" aria-hidden="true"></i>
                    </a>

                </div>

            </div>


            {{-- EXPLORE --}}
            <div class="ah-footer-column">

                <h3>Explore</h3>

                <nav aria-label="Footer explore links">

                    <a href="{{ url('/about') }}">
                        About Hospital
                    </a>

                    <a href="{{ url('/doctors') }}">
                        Our Doctors
                    </a>

                    <a href="{{ url('/departments') }}">
                        Departments
                    </a>

                    <a href="{{ url('/facilities') }}">
                        Facilities & Technology
                    </a>

                    <a href="{{ url('/gallery') }}">
                        Hospital Gallery
                    </a>

                </nav>

            </div>


            {{-- PATIENT LINKS --}}
            <div class="ah-footer-column">

                <h3>Patient Resources</h3>

                <nav aria-label="Patient resource links">

                    <a href="{{ url('/services') }}">
                        Medical Services
                    </a>

                    <a href="{{ url('/appointment') }}">
                        Book an Appointment
                    </a>

                    <a href="{{ url('/news') }}">
                        News & Updates
                    </a>

                    <a href="{{ url('/contact') }}">
                        Contact Us
                    </a>

                    <a href="{{ url('/privacy') }}">
                        Privacy Policy
                    </a>

                </nav>

            </div>


            {{-- CONTACT --}}
            <div class="ah-footer-contact">

                <h3>Get in Touch</h3>

                <div class="ah-contact-item">

                    <span class="ah-contact-icon">
                        <i data-lucide="map-pin" aria-hidden="true"></i>
                    </span>

                    <div>
                        <strong>Hospital Address</strong>

                        <span>{{ $hospitalAddress }}</span>
                    </div>

                </div>

                <a href="tel:+97791590547" class="ah-contact-item">

                    <span class="ah-contact-icon">
                        <i data-lucide="phone" aria-hidden="true"></i>
                    </span>

                    <div>
                        <strong>Phone</strong>
                        <span>{{ $hospitalPhone }}</span>
                    </div>

                </a>

                <a href="mailto:{{ $hospitalEmail }}" class="ah-contact-item">

                    <span class="ah-contact-icon">
                        <i data-lucide="mail" aria-hidden="true"></i>
                    </span>

                    <div>
                        <strong>Email Address</strong>
                        <span>{{ $hospitalEmail }}</span>
                    </div>

                </a>

                <a href="{{ url('/contact') }}" class="ah-footer-location">

                    View Contact & Location

                    <i data-lucide="arrow-up-right" aria-hidden="true"></i>

                </a>

            </div>

        </div>


        {{-- FOOTER BOTTOM --}}
        <div class="container">

            <div class="ah-footer-bottom">

                <p>
                    © {{ date('Y') }} Attariya Hospital Pvt. Ltd.
                    All rights reserved.
                </p>

                <div class="ah-footer-bottom-links">

                    <a href="{{ url('/privacy') }}">
                        Privacy Policy
                    </a>

                    <span class="ah-bottom-separator" aria-hidden="true"></span>

                    <a href="{{ url('/contact') }}">
                        Contact
                    </a>

                    <span class="ah-bottom-separator" aria-hidden="true"></span>

                    <span>
                        Made for clarity, care & accessibility.
                    </span>

                </div>

            </div>

        </div>

    </footer>

</body>

</html>
