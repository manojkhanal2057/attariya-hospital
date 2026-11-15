@extends('layouts.site')
@section('content')
    <main id="main">
        <section class="page-banner">
            <div class="container">
                <div class="breadcrumbs"><a href="{{ url('/') }}">Home</a><i aria-hidden="true" data-lucide="chevron-right"
                        style="width:15px;height:15px"></i><span>Photo Gallery</span></div><span class="eyebrow">ATTARIYA
                    HOSPITAL</span>
                <h1>Photo Gallery</h1>
                <p>A space for approved hospital photographs and moments.</p>
            </div>
            <div class="banner-ring"></div>
        </section>
        <section class="section">
            <div class="container">
                <div class="section-heading">
                    <div><span class="eyebrow">GALLERY</span>
                        <h2>A look inside healthcare</h2>
                        <p>Illustrative images are shown during the design phase. Replace them with hospital-approved photos
                            before publication.</p>
                    </div>
                </div>
                <div class="gallery-grid">
                    <div class="gallery-photo gallery-large">
                        <div class="photo-frame"><img alt="Illustrative hospital reception interior" loading="lazy"
                                src="https://images.unsplash.com/photo-1538108149393-fbbd81895907?auto=format&amp;fit=crop&amp;w=1100&amp;q=85" /><span
                                class="demo-tag">Illustrative photo</span></div>
                    </div>
                    <div class="gallery-photo">
                        <div class="photo-frame"><img alt="Illustrative healthcare setting" loading="lazy"
                                src="https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?auto=format&amp;fit=crop&amp;w=1100&amp;q=85" /><span
                                class="demo-tag">Illustrative photo</span></div>
                    </div>
                    <div class="gallery-photo">
                        <div class="photo-frame"><img alt="Illustrative medical equipment" loading="lazy"
                                src="https://images.unsplash.com/photo-1559757175-0eb30cd8c063?auto=format&amp;fit=crop&amp;w=1100&amp;q=85" /><span
                                class="demo-tag">Illustrative photo</span></div>
                    </div>
                    <div class="gallery-photo">
                        <div class="photo-frame"><img alt="Illustrative hospital environment" loading="lazy"
                                src="https://images.unsplash.com/photo-1519494026892-80bbd2d6fd0d?auto=format&amp;fit=crop&amp;w=1300&amp;q=85" /><span
                                class="demo-tag">Illustrative photo</span></div>
                    </div>
                </div>
                <div class="form-alert" style="margin-top:28px"><i aria-hidden="true" data-lucide="image"
                        style="width:19px;height:19px"></i> Official hospital photographs will be added after approval and
                    verification.</div>
            </div>
        </section>
    </main>
@endsection
