@extends('layouts.site')
@section('content')
    <main id="main">
        <section class="page-banner">
            <div class="container"><span class="eyebrow">MEDICAL DEPARTMENT</span>
                <h1>{{ $department->name }}</h1>
                <p>{{ $department->description }}</p>
            </div>
        </section>
        <section class="section">
            <div class="container">
                <h2>About {{ $department->name }}</h2>
                <p>{{ $department->description }}</p>
                @if ($department->image)
                    <img loading="lazy" src="{{ asset('storage/' . $department->image) }}" alt="{{ $department->name }}"
                        style="">
                @endif
                <h2 style="margin-top:40px">Medical Professionals</h2>
                <div class="doctor-grid">
                    @forelse($doctors as $doctor)
                    @include('partials.doctor-card') @empty
                        <p>For consultation schedules, contact the hospital directly.</p>
                    @endforelse
                </div>
                <a class="btn btn-primary" href="{{ url('/appointment') }}">Request Appointment</a>
            </div>
        </section>
    </main>
@endsection
