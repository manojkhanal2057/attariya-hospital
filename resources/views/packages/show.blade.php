@extends('layouts.site')
@section('content')
<main id="main"><section class="section"><div class="container">
  <a class="section-link" href="{{ route('packages.index') }}">← All Packages</a>
  <div class="ah-package-detail-grid">
   <div><span class="eyebrow">HEALTH PACKAGE</span><h1>{{ $package->name }}</h1>
    @if($package->thumbnail)<img class="ah-package-detail-photo" src="{{ asset('storage/'.$package->thumbnail) }}" alt="{{ $package->name }}">@endif
    @if($package->short_description)<p>{{ $package->short_description }}</p>@endif
    @if($package->description)<div class="ah-package-description">{{ strip_tags($package->description) }}</div>@endif
    <h2>Included Tests</h2>
    @if(!empty($package->tests))<ul>@foreach($package->tests as $test)<li>{{ $test['name'] ?? '' }}</li>@endforeach</ul>
    @else<p>Contact the hospital for included tests.</p>@endif
   </div>
   <aside class="ah-package-booking"><h2>Enquire About This Package</h2>
    @if($package->price !== null)<p class="ah-package-price">NPR {{ number_format((float)($package->offer_price ?? $package->price), 2) }}</p>@else<p>Contact for price</p>@endif
    <p>Confirm package details, charges and appointment availability with the hospital.</p>
    <a class="btn btn-primary" href="{{ url('/appointment') }}">Request Appointment</a>
    <a class="section-link" href="{{ url('/contact') }}">Contact Hospital</a>
   </aside>
  </div>
</div></section></main>
@endsection
