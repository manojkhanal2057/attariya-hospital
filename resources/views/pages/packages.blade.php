@extends('layouts.site')
@section('content')
<main id="main"><section class="section section-tint"><div class="container">
  <div class="section-heading"><div><span class="eyebrow">HEALTH PACKAGES</span><h1>Health Checkup Packages</h1><p>Explore published checkup options; confirm test availability and charges with the hospital.</p></div></div>
  <div class="ah-packages-grid">
    @forelse($packages as $package)
      <article class="ah-package-card">
        @if($package->thumbnail)<img loading="lazy" src="{{ asset('storage/'.$package->thumbnail) }}" alt="{{ $package->name }}">@endif
        <div class="ah-package-card__body"><h2>{{ $package->name }}</h2>
          @if($package->short_description)<p>{{ $package->short_description }}</p>@endif
          @if($package->price !== null)<p><strong>NPR {{ number_format((float) ($package->offer_price ?? $package->price),2) }}</strong>
            @if($package->offer_price !== null && (float)$package->offer_price < (float)$package->price)<del>NPR {{ number_format((float)$package->price,2) }}</del>@endif</p>@endif
          <a class="btn btn-primary" href="{{ route('packages.show', $package->slug) }}">View Package <i data-lucide="arrow-up-right" aria-hidden="true"></i></a>
        </div>
      </article>
    @empty
      <p>No health checkup packages have been published yet.</p>
    @endforelse
  </div>
</div></section></main>
@endsection
