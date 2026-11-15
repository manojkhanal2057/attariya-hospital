@extends('layouts.site')
@section('content')
    <main id="main">
        <section class="page-banner">
            <div class="container"><span class="eyebrow">HOSPITAL SERVICES</span>
                <h1>{{ $service->name }}</h1>
                <p>{{ $service->description }}</p>
            </div>
        </section>
        <section class="section">
            <div class="container" style="max-width:1050px">
                @if ($service->image)
                    <img loading="lazy" src="{{ asset('storage/' . $service->image) }}" alt="{{ $service->name }}"
                        style="width:100%;border-radius:24px;max-height:480px;object-fit:cover">
                @endif
                <h2 style="margin-top:32px">{{ $service->name }}</h2>
                <p>{{ $service->description }}</p>
                @if ($service->body)
                    <div class="prose">{!! nl2br(e(strip_tags($service->body))) !!}</div>
                @endif
                <p>Contact the hospital for service availability and scheduling.</p>
                <a class="btn btn-primary" href="{{ url('/appointment') }}">Request Appointment</a>
            </div>
        </section>
    </main>
@endsection
