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
    <header class="site-header">
        <div class="container header-inner"><a class="brand" href="{{ url('/') }}"><img
                    alt="Attariya Hospital logo"
                    src="{{ asset('assets/images/hospital-logo.png') }}" /><span><strong>ATTARIYA
                        <em>HOSPITAL</em></strong><small>अत्तरिया हस्पिटल प्रा.लि.</small></span></a>
       <nav aria-label="Main navigation" class="desktop-nav">
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

    <a class="nav-link {{ request()->is('news', 'news-*') ? 'active' : '' }}"
       href="{{ url('/news') }}">News</a>

    <a class="nav-link {{ request()->is('contact') ? 'active' : '' }}"
       href="{{ url('/contact') }}">Contact</a>
</nav>
            <div class="head-actions"><a class="btn btn-primary header-appointment" href="{{ url('/appointment') }}"><i
                        aria-hidden="true" data-lucide="calendar-days" style="width:17px;height:17px"></i> <span
                        data-en="Book Appointment" data-ne="अपोइन्टमेन्ट अनुरोध">Book Appointment</span></a><button
                    aria-expanded="false" aria-label="Open navigation" class="mobile-toggle" id="menuToggle"
                    type="button"><i aria-hidden="true" data-lucide="menu" style="width:24px;height:24px"></i></button>
            </div>
        </div>
     <nav aria-label="Mobile navigation" class="mobile-nav" id="mobileNav">
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

    <a class="nav-link {{ request()->is('news', 'news-*') ? 'active' : '' }}"
       href="{{ url('/news') }}">News</a>

    <a class="nav-link {{ request()->is('contact') ? 'active' : '' }}"
       href="{{ url('/contact') }}">Contact</a>

    <a class="btn btn-primary" href="{{ url('/appointment') }}">
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
    @yield('content')<footer class="footer">
        <div class="container footer-grid">
            <div class="footer-about"><a class="brand footer-brand" href="{{ url('/') }}"><img
                        alt="Attariya Hospital logo"
                        src="{{ asset('assets/images/hospital-logo.png') }}" /><span><strong>ATTARIYA
                            HOSPITAL</strong><small>अत्तरिया हस्पिटल प्रा.लि.</small></span></a>
                <p>Healthcare information, patient connections and hospital updates for the Attariya community.</p><a
                    aria-label="Visit Facebook" class="social-circle"
                    href="{{ \App\Models\SiteSetting::where('key', 'facebook')->value('value') ?: 'https://www.facebook.com/attariyahospital' }}"
                    rel="noopener" target="_blank"><i aria-hidden="true" data-lucide="facebook"
                        style="width:19px;height:19px"></i></a>
            </div>
            <div>
                <h3>Explore</h3>
                <a href="{{ url('/about') }}">About hospital</a><a href="{{ url('/doctors') }}">Our
                    doctors</a>
                    <a href="{{ url('/gallery') }}">Hospital Gallery</a>
                    <a href="{{ url('/departments') }}">Departments</a><a
                    href="{{ url('/facilities') }}">Facilities</a>
            </div>
            <div>
                <h3>Patient Links</h3><a href="{{ url('/services') }}">Medical services</a><a
                    href="{{ url('/appointment') }}">Appointment request</a><a href="{{ url('/news') }}">News &amp;
                    notices</a><a href="{{ url('/privacy') }}">Privacy policy</a>
            </div>
            <div>
                <h3>Contact</h3>
                <p><i aria-hidden="true" data-lucide="map-pin" style="width:17px;height:17px"></i>
                    {{ \App\Models\SiteSetting::where('key', 'address')->value('value') ?: 'Mahendranagar Road, Attariya, Kailali' }}
                </p><a href="tel:+97791590547"><i aria-hidden="true" data-lucide="phone"
                        style="width:17px;height:17px"></i> 091-590547</a><a
                    href="mailto:attariyahospital@gmail.com"><i aria-hidden="true" data-lucide="mail"
                        style="width:17px;height:17px"></i> attariyahospital@gmail.com</a><a
                    href="{{ url('/contact') }}">View location <i aria-hidden="true" data-lucide="arrow-up-right"
                        style="width:15px;height:15px"></i></a>
            </div>
        </div>
        <div class="container footer-bottom"><span>© 2026 Attariya Hospital Pvt. Ltd. All rights
                reserved.</span><span>Designed for clarity, care &amp; accessibility.</span></div>
    </footer>
</body>

</html>
