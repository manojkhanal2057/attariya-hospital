@extends('layouts.site')
@section('content')
    <main id="main">
        <section class="hero">
            <div class="hero-glow"></div>
            <div class="container hero-grid">
                <div class="hero-copy">
                    <div class="micro-tag"><span class="pulse"></span> CARING FOR ATTARIYA &amp; BEYOND</div>
                    <h1>{{ \App\Models\SiteSetting::where('key', 'hero_line_1')->value('value') ?: 'Your health.' }}<br />{{ \App\Models\SiteSetting::where('key', 'hero_line_2')->value('value') ?: 'Your wellbeing.' }}<br /><span>{{ \App\Models\SiteSetting::where('key', 'hero_line_3')->value('value') ?: 'Our priority.' }}</span>
                    </h1>
                    <p class="hero-desc">
                        {{ \App\Models\SiteSetting::where('key', 'hero_description')->value('value') ?: 'Thoughtful care, medical expertise and helpful patient information — closer to home in Attariya, Kailali.' }}
                    </p>
                    <div class="hero-buttons"><a class="btn btn-primary btn-large" href="{{ url('/appointment') }}">Request
                            Appointment <i aria-hidden="true" data-lucide="arrow-up-right"
                                style="width:19px;height:19px"></i></a><a class="btn btn-secondary btn-large"
                            href="{{ url('/services') }}">Explore Services <i aria-hidden="true" data-lucide="arrow-right"
                                style="width:18px;height:18px"></i></a></div>
                    <div class="hero-contact"><span class="contact-icon"><i aria-hidden="true" data-lucide="phone-call"
                                style="width:22px;height:22px"></i></span>
                        <div><small>Need to speak with our team?</small><a href="tel:+97791590547">091-590547</a></div>
                    </div>
                </div>
                <div class="hero-visual">
                    <div class="hero-image"
                        style="background-image:url('https://images.unsplash.com/photo-1519494026892-80bbd2d6fd0d?auto=format&amp;fit=crop&amp;w=1300&amp;q=85')">
                        <span class="demo-tag">Illustrative photo</span></div>
                    <div class="hero-badge"><span class="hero-badge-icon"><i aria-hidden="true"
                                data-lucide="heart-handshake" style="width:26px;height:26px"></i></span>
                        <div><strong>Care that feels close</strong><small>Attariya, Kailali</small></div>
                    </div>
                    <div class="hero-dots"></div>
                </div>
            </div>
            <div class="hero-wave"></div>
        </section>
        <section class="quick-section">
            <div class="container quick-grid"><a class="quick-card" href="{{ url('/doctors') }}"><i aria-hidden="true"
                        data-lucide="users-round" style="width:28px;height:28px"></i><span><strong>Find a
                            Doctor</strong><small>Meet our medical team</small></span><i aria-hidden="true"
                        data-lucide="arrow-up-right" style="width:20px;height:20px"></i></a><a class="quick-card"
                    href="{{ url('/departments') }}"><i aria-hidden="true" data-lucide="heart-pulse"
                        style="width:28px;height:28px"></i><span><strong>Departments</strong><small>Explore specialist
                            care</small></span><i aria-hidden="true" data-lucide="arrow-up-right"
                        style="width:20px;height:20px"></i></a><a class="quick-card" href="{{ url('/appointment') }}"><i
                        aria-hidden="true" data-lucide="calendar-check"
                        style="width:28px;height:28px"></i><span><strong>Appointment</strong><small>Request a
                            consultation</small></span><i aria-hidden="true" data-lucide="arrow-up-right"
                        style="width:20px;height:20px"></i></a><a class="quick-card" href="{{ url('/contact') }}"><i
                        aria-hidden="true" data-lucide="map-pin" style="width:28px;height:28px"></i><span><strong>Visit the
                            Hospital</strong><small>Location and contacts</small></span><i aria-hidden="true"
                        data-lucide="arrow-up-right" style="width:20px;height:20px"></i></a></div>
        </section>
        <section aria-labelledby="cath-feature-title" class="cath-signature">
            <div class="container">
                <div class="cath-signature__shell">
                    <div class="cath-signature__copy">
                        <div class="cath-signature__eyebrow"><span aria-hidden="true" class="cath-signature__pulse"></span>
                            A HEALTHCARE MILESTONE FOR SUDURPASHCHIM</div>
                        <div class="cath-signature__pill">First Cath Lab introduced in Sudurpashchim Province · November
                            2025</div>
                        <h2 id="cath-feature-title">A new chapter in <span>heart care.</span></h2>
                        <p class="cath-signature__lead">Attariya Hospital introduced Sudurpashchim Province's first reported
                            Cardiac Catheterization Laboratory — expanding access to specialized heart procedures closer to
                            home.</p>
                        <div class="cath-signature__procedures"><span><i aria-hidden="true"
                                    data-lucide="check-circle-2"></i> Coronary &amp; Peripheral Angiography</span><span><i
                                    aria-hidden="true" data-lucide="check-circle-2"></i> Angioplasty (PCI)</span><span><i
                                    aria-hidden="true" data-lucide="check-circle-2"></i> Temporary &amp; Permanent
                                Pacemakers</span></div>
                        <div class="cath-signature__buttons"><a class="btn btn-white"
                                href="{{ url('/service-cath-lab') }}">Explore Cath Lab <i aria-hidden="true"
                                    data-lucide="arrow-up-right"></i></a><a class="cath-signature__phone"
                                href="tel:+97791590547"><i aria-hidden="true" data-lucide="phone"></i> Call 091-590547</a>
                        </div>
                        <p class="cath-signature__footnote">Reported launch: November 21, 2025. Confirm current procedure
                            availability, specialist schedules and charges directly with the hospital.</p>
                    </div>
                    <div aria-label="Illustration of cardiac services" class="cath-signature__visual">
                        <div class="cath-signature__orbit orbit-one"></div>
                        <div class="cath-signature__orbit orbit-two"></div>
                        <div class="cath-signature__heart"><i aria-hidden="true" data-lucide="heart-pulse"></i></div>
                        <div class="cath-signature__glass"><span class="cath-signature__glass-kicker">SPECIALIZED CARDIAC
                                CARE</span><strong>Cardiac Cath Lab</strong><small>Angiography · Angioplasty ·
                                Pacemaker</small></div>
                    </div>
                </div>
            </div>
        </section>
        <section class="section">
            <div class="container split about-split">
                <div class="image-stack">
                    <div class="photo-frame about-picture"><img alt="Illustrative modern hospital interior"
                            loading="lazy"
                            src="https://images.unsplash.com/photo-1538108149393-fbbd81895907?auto=format&amp;fit=crop&amp;w=1100&amp;q=85" /><span
                            class="demo-tag">Illustrative photo</span></div>
                    <div class="image-floating"><span class="small-cross"><i aria-hidden="true" data-lucide="plus"
                                style="width:22px;height:22px"></i></span><strong>Rooted in our
                            community</strong><small>Attariya • Kailali</small></div>
                </div>
                <div class="split-copy"><span class="eyebrow">WELCOME TO ATTARIYA HOSPITAL</span>
                    <h2>Care built around <span class="blue-text">people,</span> not just appointments.</h2>
                    <p>Located at Godawari Municipality–2, Mahendranagar Road, Attariya, Attariya Hospital Pvt. Ltd. serves
                        the community with outpatient consultation, specialist care and diagnostic services described in its
                        existing website.</p>
                    <div class="value-list">
                        <div><i aria-hidden="true" data-lucide="check-circle-2" style="width:21px;height:21px"></i>
                            Convenient healthcare information</div>
                        <div><i aria-hidden="true" data-lucide="check-circle-2" style="width:21px;height:21px"></i> A
                            range of medical specialties</div>
                        <div><i aria-hidden="true" data-lucide="check-circle-2" style="width:21px;height:21px"></i> An
                            easier way to reach the hospital</div>
                    </div><a class="btn btn-primary" href="{{ url('/about') }}">More About Us <i aria-hidden="true"
                            data-lucide="arrow-up-right" style="width:18px;height:18px"></i></a>
                </div>
            </div>
        </section>
        <section class="section section-tint">
            <div class="container">
                <div class="section-heading">
                    <div><span class="eyebrow">OUR DEPARTMENTS</span>
                        <h2>Care across medical specialties</h2>
                        <p>Explore the departments listed in the hospital’s existing website.</p>
                    </div><a class="section-link" href="{{ url('/departments') }}">View all departments <i
                            aria-hidden="true" data-lucide="arrow-right" style="width:18px;height:18px"></i></a>
                </div>
                <div class="departments-grid">
                    @foreach ($departments as $department)
                        @include('partials.department-card', ['department' => $department])
                    @endforeach
                </div>
            </div>
        </section>
        <section class="section">
            <div class="container split feature-split">
                <div class="split-copy"><span class="eyebrow">A BETTER PATIENT EXPERIENCE</span>
                    <h2>Focused on what matters <span class="blue-text">most to you.</span></h2>
                    <p>Healthcare should be easier to understand and access. Find clear information about doctors, services,
                        and how to reach the team before your visit.</p>
                    <div class="features">
                        <div><span class="mini-icon"><i aria-hidden="true" data-lucide="user-round-check"
                                    style="width:24px;height:24px"></i></span>
                            <div><strong>Find the right department</strong>
                                <p>Browse specialties and the doctors listed by the hospital.</p>
                            </div>
                        </div>
                        <div><span class="mini-icon"><i aria-hidden="true" data-lucide="calendar-days"
                                    style="width:24px;height:24px"></i></span>
                            <div><strong>Plan your visit</strong>
                                <p>Send a request draft or contact the hospital directly.</p>
                            </div>
                        </div>
                        <div><span class="mini-icon"><i aria-hidden="true" data-lucide="messages-square"
                                    style="width:24px;height:24px"></i></span>
                            <div><strong>Stay informed</strong>
                                <p>Access contact details, location and published updates.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="photo-frame feature-picture"><img alt="Illustrative healthcare team discussing patient care"
                        loading="lazy"
                        src="https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?auto=format&amp;fit=crop&amp;w=1100&amp;q=85" /><span
                        class="demo-tag">Illustrative photo</span></div>
            </div>
        </section>
        {{-- Doctors carousel: uses existing doctor-card partial --}}
        <section class="section section-tint ah-home-doctors-section" aria-labelledby="homeDoctorsTitle">
            <div class="container">
                <div class="section-heading">
                    <div><span class="eyebrow">OUR MEDICAL TEAM</span>
                        <h2 id="homeDoctorsTitle">Meet Our Medical Professionals</h2>
                        <p>Meet our team. Please confirm availability before visiting.</p>
                    </div>
                    <a class="section-link" href="{{ route('doctors.index') }}">All doctors <i data-lucide="arrow-right" aria-hidden="true"></i></a>
                </div>
                @if($doctors->isNotEmpty())
                    <div class="ah-doctors-slider">
                        <div class="ah-doctors-slider__controls">
                            <span>Explore our medical team</span>
                            <div class="ah-doctors-slider__arrows">
                                <button type="button" id="doctorsPrev" class="ah-doctors-slider__arrow" aria-label="Previous doctor" aria-controls="doctorsTrack"><i data-lucide="arrow-left" aria-hidden="true"></i></button>
                                <button type="button" id="doctorsNext" class="ah-doctors-slider__arrow" aria-label="Next doctor" aria-controls="doctorsTrack"><i data-lucide="arrow-right" aria-hidden="true"></i></button>
                            </div>
                        </div>
                        <div id="doctorsTrack" class="ah-doctors-slider__track" role="region" aria-label="Medical team, horizontally scrollable" tabindex="0">
                            @foreach($doctors as $doctor)
                                <div class="ah-doctors-slider__slide">
                                    @include('partials.doctor-card', ['doctor' => $doctor])
                                </div>
                            @endforeach
                        </div>
                    </div>
                @else
                    <p>Contact the hospital for current doctor information.</p>
                @endif
            </div>
        </section>
        {{-- Leadership cards appear only when approved records have been published. --}}
        @if(($leadershipMessages ?? collect())->isNotEmpty())
            <section class="section ah-leadership-section" aria-labelledby="leadershipTitle">
                <div class="container">
                    <div class="section-heading"><div><span class="eyebrow">A MESSAGE FROM OUR LEADERSHIP</span><h2 id="leadershipTitle">Our Commitment to Care</h2></div></div>
                    <div class="ah-leadership-grid">
                        @foreach($leadershipMessages as $leader)
                            <article class="ah-leadership-card">
                                @if($leader->photo)<img class="ah-leadership-photo" src="{{ asset('storage/' . $leader->photo) }}" alt="{{ $leader->name }}" loading="lazy">@endif
                                <div class="ah-leadership-copy"><span class="ah-leadership-role">{{ $leader->position }}</span>
                                    <h3>{{ $leader->name }}</h3>
                                    <p>{{ \Illuminate\Support\Str::limit(strip_tags($leader->message), 360) }}</p>
                                </div>
                            </article>
                        @endforeach
                    </div>
                </div>
            </section>
        @endif
        <section class="section">
            <div class="container">
                <div class="section-heading">
                    <div><span class="eyebrow">HEALTHCARE SERVICES</span>
                        <h2>Services that support your care</h2>
                        <p>From outpatient consultation to diagnostic support. Contact the hospital to confirm availability.
                        </p>
                    </div><a class="section-link" href="{{ url('/services') }}">All services <i aria-hidden="true"
                            data-lucide="arrow-right" style="width:18px;height:18px"></i></a>
                </div>
                <div class="service-grid">
                    @foreach ($services as $service)
                        @include('partials.service-card', ['service' => $service])
                    @endforeach
                </div>
            </div>
        </section>
        <section class="section facility-feature">
            <div class="container facility-feature-grid">
                <div class="photo-frame"><img alt="Illustrative view of a modern medical facility" loading="lazy"
                        src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSoWolgsFj1tqhPDh2tmmVksNaGCJs4dk5_HV-b6mc5eyf9msKkiS2YX3A&s=10" /><span
                        class="demo-tag">Illustrative photo</span></div>
                <div><span class="eyebrow">FACILITIES &amp; TECHNOLOGY</span>
                    <h2>Healthcare with a focus on progress.</h2>
                    <p>Public health reporting has described the hospital’s Cath Lab service. Explore key hospital services
                        and confirm up-to-date access directly with the team.</p><a class="btn btn-white"
                        href="{{ url('/facilities') }}">Explore facilities <i aria-hidden="true"
                            data-lucide="arrow-up-right" style="width:18px;height:18px"></i></a>
                </div>
            </div>
        </section>
        {{-- LATEST NEWS + NOTICES: one compact tabbed section --}}
        <section class="section ah-home-updates" id="latest-updates">
            <div class="container">
                <div class="section-heading">
                    <div>
                        <span class="eyebrow">LATEST UPDATES</span>
                        <h2>Hospital News &amp; Notices</h2>
                        <p>Recent hospital news, announcements and official notices.</p>
                    </div>
                </div>

                <div class="ah-updates-tabs" role="tablist" aria-label="Hospital updates">
                    <button class="ah-updates-tab active" type="button" role="tab" id="ahNewsTab"
                        aria-selected="true" aria-controls="ahNewsPanel" tabindex="0" data-updates-tab="news">
                        <i data-lucide="newspaper" aria-hidden="true"></i> Latest News
                    </button>
                    <button class="ah-updates-tab" type="button" role="tab" id="ahNoticesTab"
                        aria-selected="false" aria-controls="ahNoticesPanel" tabindex="-1" data-updates-tab="notices">
                        <i data-lucide="megaphone" aria-hidden="true"></i> Notices
                    </button>
                </div>

                {{-- NEWS: reuse existing card design --}}
                <div class="ah-updates-panel" id="ahNewsPanel" role="tabpanel"
                    aria-labelledby="ahNewsTab" tabindex="0">
                    <div class="home-news-grid">
                        @forelse ($news as $post)
                            <article class="home-news-card">
                                @if ($post->image)
                                    <a href="{{ route('news.show', $post->slug) }}" class="home-news-image"
                                        aria-label="Read {{ $post->title }}">
                                        <img src="{{ \Illuminate\Support\Facades\Storage::disk('public')->url($post->image) }}"
                                            alt="{{ $post->title }}" loading="lazy" decoding="async">
                                    </a>
                                @endif
                                <div class="home-news-content">
                                    <time datetime="{{ $post->published_at?->format('Y-m-d') }}">
                                        {{ $post->published_at?->format('d M Y') }}
                                    </time>
                                    <h3><a href="{{ route('news.show', $post->slug) }}">{{ $post->title }}</a></h3>
                                    @if ($post->excerpt)
                                        <p>{{ \Illuminate\Support\Str::limit(strip_tags($post->excerpt), 120) }}</p>
                                    @endif
                                    <a href="{{ route('news.show', $post->slug) }}" class="home-news-read">
                                        Read update <i data-lucide="arrow-up-right" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </article>
                        @empty
                            <div class="ah-updates-empty"><i data-lucide="newspaper" aria-hidden="true"></i>
                                <p>No hospital news available at the moment.</p></div>
                        @endforelse
                    </div>
                    <div class="ah-updates-footer"><a class="section-link" href="{{ route('news.index') }}">
                        View all news <i data-lucide="arrow-right" aria-hidden="true"></i>
                    </a></div>
                </div>

                {{-- NOTICES: recent published notices only --}}
                <div class="ah-updates-panel" id="ahNoticesPanel" role="tabpanel"
                    aria-labelledby="ahNoticesTab" tabindex="0" hidden>
                    <div class="ah-home-notices-list">
                        @forelse ($notices as $notice)
                            <article class="ah-home-notice-card">
                                <span class="ah-home-notice-icon"><i data-lucide="file-text" aria-hidden="true"></i></span>
                                <div class="ah-home-notice-body">
                                    <div class="ah-home-notice-meta">
                                        <span>{{ ucwords(str_replace('-', ' ', $notice->category ?? 'general')) }}</span>
                                        <time datetime="{{ $notice->published_at?->format('Y-m-d') }}">
                                            {{ $notice->published_at?->format('d M Y') }}
                                        </time>
                                    </div>
                                    <h3><a href="{{ route('notices.show', $notice->slug) }}">{{ $notice->title }}</a></h3>
                                    @if ($notice->description)
                                        <p>{{ \Illuminate\Support\Str::limit(strip_tags($notice->description), 110) }}</p>
                                    @endif
                                </div>
                                <a class="ah-home-notice-arrow" href="{{ route('notices.show', $notice->slug) }}"
                                    aria-label="Read notice: {{ $notice->title }}">
                                    <i data-lucide="arrow-up-right" aria-hidden="true"></i>
                                </a>
                            </article>
                        @empty
                            <div class="ah-updates-empty"><i data-lucide="clipboard-list" aria-hidden="true"></i>
                                <p>No official notices published yet.</p></div>
                        @endforelse
                    </div>
                    <div class="ah-updates-footer"><a class="section-link" href="{{ route('notices.index') }}">
                        View all notices <i data-lucide="arrow-right" aria-hidden="true"></i>
                    </a></div>
                </div>
            </div>
        </section>
        <section class="section section-tint">
            <div class="container contact-band">
                <div><span class="eyebrow">FIND US IN ATTARIYA</span>
                    <h2>Closer than you think.</h2>
                    <p>Mahendranagar Road, Godawari–2, Attariya, Kailali</p><a class="btn btn-primary"
                        href="{{ url('/contact') }}">Contact &amp; Directions <i aria-hidden="true"
                            data-lucide="arrow-up-right" style="width:17px;height:17px"></i></a>
                </div>
                <div class="map-visual"><span><i aria-hidden="true" data-lucide="map-pin"
                            style="width:38px;height:38px"></i></span><strong>ATTARIYA HOSPITAL</strong><small>Godawari–2 •
                        Kailali</small></div>
            </div>
        </section>
    </main>
@endsection


{{-- News / Notices tabs: loaded by @stack('scripts') in layouts.site --}}
@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', () => {
    const tabs = [...document.querySelectorAll('[data-updates-tab]')];
    const panels = {
        news: document.getElementById('ahNewsPanel'),
        notices: document.getElementById('ahNoticesPanel'),
    };
    if (tabs.length !== 2 || !panels.news || !panels.notices) return;

    function selectTab(name, focus = false) {
        tabs.forEach(tab => {
            const active = tab.dataset.updatesTab === name;
            tab.classList.toggle('active', active);
            tab.setAttribute('aria-selected', String(active));
            tab.tabIndex = active ? 0 : -1;
            if (active && focus) tab.focus();
        });
        Object.entries(panels).forEach(([key, panel]) => panel.hidden = key !== name);
    }

    tabs.forEach((tab, index) => {
        tab.addEventListener('click', () => selectTab(tab.dataset.updatesTab));
        tab.addEventListener('keydown', event => {
            const key = event.key;
            let target = null;
            if (key === 'ArrowRight') target = (index + 1) % tabs.length;
            if (key === 'ArrowLeft') target = (index - 1 + tabs.length) % tabs.length;
            if (key === 'Home') target = 0;
            if (key === 'End') target = tabs.length - 1;
            if (target === null) return;
            event.preventDefault();
            selectTab(tabs[target].dataset.updatesTab, true);
        });
    });
});
</script>
@endpush

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const track = document.getElementById('doctorsTrack');
    const prev = document.getElementById('doctorsPrev');
    const next = document.getElementById('doctorsNext');
    if (!track || !prev || !next) return;
    function step() {
        const slide = track.querySelector('.ah-doctors-slider__slide');
        return slide ? slide.getBoundingClientRect().width + (parseFloat(getComputedStyle(track).gap) || 0) : 0;
    }
    function update() {
        const max = Math.max(0, track.scrollWidth - track.clientWidth);
        prev.disabled = track.scrollLeft <= 2;
        next.disabled = track.scrollLeft >= max - 2;
    }
    function move(direction) {
        const reduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
        track.scrollBy({left: direction * step(), behavior: reduced ? 'auto' : 'smooth'});
    }
    prev.addEventListener('click', () => move(-1));
    next.addEventListener('click', () => move(1));
    track.addEventListener('scroll', update, {passive:true});
    window.addEventListener('resize', update);
    update();
});
</script>
@endpush
