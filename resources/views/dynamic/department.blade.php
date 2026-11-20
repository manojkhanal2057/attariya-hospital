
@extends('layouts.site')

@section('content')
    @php
        $departmentName = $department->name;
        $departmentImage = $department->image;
        $departmentDescription = $department->description;

        $imageUrl = $departmentImage
            ? asset('storage/' . $departmentImage)
            : null;
    @endphp

    <main id="main">

        {{-- =====================================
             DEPARTMENT PAGE BANNER
        ===================================== --}}
        <section class="page-banner ah-department-banner"
            aria-labelledby="department-title">

            <div class="container">

                <span class="eyebrow">
                    MEDICAL DEPARTMENT
                </span>

                <h1 id="department-title">
                    {{ $departmentName }}
                </h1>

                <p>
                    Explore our {{ $departmentName }} department,
                    available medical services and healthcare
                    professionals.
                </p>

                <nav class="ah-department-breadcrumb"
                    aria-label="Breadcrumb">

                    <a href="{{ route('home') }}">Home</a>

                    <i data-lucide="chevron-right"
                        aria-hidden="true"></i>

                    <a href="{{ route('departments.index') }}">
                        Departments
                    </a>

                    <i data-lucide="chevron-right"
                        aria-hidden="true"></i>

                    <span aria-current="page">
                        {{ $departmentName }}
                    </span>

                </nav>

            </div>
        </section>


        {{-- =====================================
             DEPARTMENT DETAILS
        ===================================== --}}
        <section class="section ah-department-details">

            <div class="container">

                <div class="ah-department-detail-grid">

                    {{-- MAIN CONTENT --}}
                    <div class="ah-department-main">

                        {{-- DEPARTMENT IMAGE --}}
                        <div class="ah-department-detail-image">

                            @if ($imageUrl)
                                <img
                                    src="{{ $imageUrl }}"
                                    alt="{{ $departmentName }} department"
                                    loading="lazy">
                            @else
                                <div class="ah-department-image-placeholder">
                                    <i data-lucide="heart-pulse"
                                        aria-hidden="true"></i>

                                    <span>
                                        {{ $departmentName }}
                                    </span>
                                </div>
                            @endif

                        </div>

                        {{-- ABOUT DEPARTMENT --}}
                        <div class="ah-department-about">

                            <span class="eyebrow">
                                ABOUT THE DEPARTMENT
                            </span>

                            <h2>
                                About {{ $departmentName }}
                            </h2>

                            @if ($departmentDescription)
                                <div class="ah-department-description">
                                    {!! nl2br(e(strip_tags($departmentDescription))) !!}
                                </div>
                            @else
                                <p>
                                    Please contact Attariya Hospital
                                    for more information about this
                                    department.
                                </p>
                            @endif

                        </div>

                    </div>


                    {{-- APPOINTMENT SIDEBAR --}}
                    <aside class="ah-department-sidebar">

                        <div class="ah-department-sidebar-card">

                            <div class="ah-department-sidebar-icon">
                                <i data-lucide="calendar-heart"
                                    aria-hidden="true"></i>
                            </div>

                            <h3>Need a Consultation?</h3>

                            <p>
                                Contact our hospital to confirm
                                doctor availability, consultation
                                schedules and appointments.
                            </p>

                            <a href="{{ url('/appointment') }}"
                                class="btn btn-primary ah-department-appointment">

                                <i data-lucide="calendar-check"
                                    aria-hidden="true"></i>

                                Request Appointment
                            </a>

                            <a href="{{ url('/contact') }}"
                                class="ah-department-contact">

                                Contact Hospital

                                <i data-lucide="arrow-up-right"
                                    aria-hidden="true"></i>
                            </a>

                        </div>

                        {{-- QUICK NAVIGATION --}}
                        <div class="ah-department-sidebar-card">

                            <h3>Explore More</h3>

                            <div class="ah-department-quick-links">

                                <a href="{{ route('departments.index') }}">
                                    <i data-lucide="building-2"
                                        aria-hidden="true"></i>
                                    All Departments
                                </a>

                                <a href="{{ route('doctors.index') }}">
                                    <i data-lucide="stethoscope"
                                        aria-hidden="true"></i>
                                    Our Doctors
                                </a>

                                <a href="{{ route('services.index') }}">
                                    <i data-lucide="heart-pulse"
                                        aria-hidden="true"></i>
                                    Medical Services
                                </a>

                            </div>

                        </div>

                    </aside>

                </div>

            </div>

        </section>


        {{-- =====================================
             RELATED MEDICAL PROFESSIONALS
        ===================================== --}}
        <section class="section section-tint ah-department-doctors">

            <div class="container">

                <div class="section-heading">

                    <div>
                        <span class="eyebrow">
                            OUR MEDICAL PROFESSIONALS
                        </span>

                        <h2>
                            Doctors in {{ $departmentName }}
                        </h2>

                        <p>
                            Explore the medical professionals
                            associated with this department.
                            Please confirm current schedules.
                        </p>
                    </div>

                    <a href="{{ route('doctors.index') }}"
                        class="section-link">

                        View All Doctors

                        <i data-lucide="arrow-right"
                            aria-hidden="true"></i>
                    </a>

                </div>

                @if ($doctors->isNotEmpty())

                    <div class="doctor-grid">

                        @foreach ($doctors as $doctor)
                            @include('partials.doctor-card', [
                                'doctor' => $doctor
                            ])
                        @endforeach

                    </div>

                @else

                    <div class="ah-department-no-doctors">

                        <i data-lucide="users-round"
                            aria-hidden="true"></i>

                        <h3>Doctor Schedule Information</h3>

                        <p>
                            Please contact the hospital
                            for current consultation schedules
                            in this department.
                        </p>

                    </div>

                @endif

            </div>

        </section>


        {{-- =====================================
             BOTTOM CALL TO ACTION
        ===================================== --}}
        <section class="ah-department-bottom-cta">

            <div class="container">

                <div>
                    <span>YOUR HEALTH MATTERS</span>

                    <h2>
                        Need help finding the right care?
                    </h2>

                    <p>
                        Reach out to our team for assistance
                        with departments and appointments.
                    </p>
                </div>

                <a href="{{ url('/appointment') }}"
                    class="btn btn-white">

                    Request Appointment

                    <i data-lucide="arrow-up-right"
                        aria-hidden="true"></i>
                </a>

            </div>

        </section>

    </main>
@endsection
