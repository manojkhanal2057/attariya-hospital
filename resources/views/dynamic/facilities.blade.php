@extends('layouts.site')
@section('content')
<main id="main"><section class="page-banner"><div class="container"><span class="eyebrow">OUR FACILITIES</span><h1>Hospital Facilities</h1><p>Explore the hospital's facilities and medical technology.</p></div></section>
<section class="section"><div class="container"><div class="service-grid">
@forelse($facilities as $facility)
<article class="service-card">
@if($facility->image)<img src="{{ asset('storage/'.$facility->image) }}" alt="{{ $facility->name }}" loading="lazy" style="width:170px;height:130px;object-fit:cover;border-radius:12px">@endif
<div><h3>{{ $facility->name }}</h3><p>{{ $facility->description }}</p></div>
</article>
@empty <p>Verified facility details will be added here.</p> @endforelse
</div></div></section></main>
@endsection
