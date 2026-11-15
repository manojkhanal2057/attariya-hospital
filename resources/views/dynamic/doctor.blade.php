@extends('layouts.site')
@section('content')
<main id="main">
<section class="page-banner"><div class="container"><span class="eyebrow">OUR MEDICAL TEAM</span><h1>{{ $doctor->name }}</h1><p>{{ $doctor->specialty }}</p></div></section>
<section class="section"><div class="container">
 <div style="display:grid;grid-template-columns:minmax(200px,300px) 1fr;gap:36px;align-items:start">
 <div class="doctor-avatar" style="width:100%;height:280px">
 @if($doctor->image)<img src="{{ asset('storage/'.$doctor->image) }}" style="width:100%;height:100%;object-fit:cover" alt="{{ $doctor->name }}">
 @else <i data-lucide="user-round" style="width:78px;height:78px"></i>@endif
 </div><div><span class="eyebrow">SPECIALIST PROFILE</span><h2>{{ $doctor->name }}</h2><p>{{ $doctor->specialty }}</p>
 @if($doctor->qualification)<p><strong>Qualifications:</strong> {{ $doctor->qualification }}</p>@endif
 @if($doctor->bio)<p>{{ $doctor->bio }}</p>@endif
 <p>Consultation schedule and availability must be confirmed by the hospital.</p>
 <a href="{{ url('/appointment') }}?doctor={{ urlencode(\Illuminate\Support\Str::slug($doctor->name)) }}" class="btn btn-primary">Request Appointment</a></div></div>
</div></section></main>
@endsection
