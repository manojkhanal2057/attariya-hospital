@extends('layouts.site')
@section('content')
    <main id="main">
        <section class="page-banner">
            <div class="container">
                <div class="breadcrumbs"><a href="{{ url('/') }}">Home</a><i aria-hidden="true" data-lucide="chevron-right"
                        style="width:15px;height:15px"></i><span>Our Doctors</span></div><span class="eyebrow">ATTARIYA
                    HOSPITAL</span>
                <h1>Our Doctors</h1>
                <p>Meet the medical professionals listed on the hospital’s reference website.</p>
            </div>
            <div class="banner-ring"></div>
        </section>
        <section class="section">
            <div class="container">
                <div class="directory-toolbar">
                    <div>
                        <h2>Find a medical professional</h2>
                        <p>Names and specialties are from the hospital’s reference website. Confirm current affiliation and
                            schedules by phone.</p>
                    </div><label class="searchbox"><i aria-hidden="true" data-lucide="search"
                            style="width:20px;height:20px"></i><input aria-label="Search doctors"
                            data-filter-input="doctor-list" placeholder="Search doctor or specialty..."
                            type="search" /></label>
                </div>
                <div class="doctor-grid" id="doctor-list">
                    @foreach ($doctors as $doctor)
                        @include('partials.doctor-card', ['doctor' => $doctor])
                    @endforeach
                </div>
                <p class="empty-state" data-empty-for="doctor-list" hidden="">No matching doctors found.</p>
            </div>
        </section>
        <div class="notice-strip">
            <div class="container"><i aria-hidden="true" data-lucide="info" style="width:17px;height:17px"></i> Doctor
                schedules and service availability should be confirmed by phone before visiting. <a
                    href="tel:+97791590547">Call 091-590547</a></div>
        </div>
    </main>
@endsection
