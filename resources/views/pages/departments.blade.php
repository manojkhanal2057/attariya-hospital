@extends('layouts.site')
@section('content')
<main id="main"><section class="page-banner"><div class="container"><div class="breadcrumbs"><a href="{{ url('/') }}">Home</a><i aria-hidden="true" data-lucide="chevron-right" style="width:15px;height:15px"></i><span>Our Departments</span></div><span class="eyebrow">ATTARIYA HOSPITAL</span><h1>Our Departments</h1><p>Explore medical specialties listed by the hospital.</p></div><div class="banner-ring"></div></section><section class="section"><div class="container"><div class="directory-toolbar"><div><h2>Explore departments</h2><p>Find the area of care you are looking for.</p></div><label class="searchbox"><i aria-hidden="true" data-lucide="search" style="width:20px;height:20px"></i><input aria-label="Search departments" data-filter-input="department-list" placeholder="Search departments..." type="search"/></label></div><div class="departments-grid" id="department-list">
@foreach($departments as $department)
@include('partials.department-card', ['department'=>$department])
@endforeach
</div><p class="empty-state" data-empty-for="department-list" hidden="">No matching departments found.</p></div></section><div class="notice-strip"><div class="container"><i aria-hidden="true" data-lucide="info" style="width:17px;height:17px"></i> Doctor schedules and service availability should be confirmed by phone before visiting. <a href="tel:+97791590547">Call 091-590547</a></div></div></main>
@endsection
