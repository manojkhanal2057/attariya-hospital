<article class="doctor-card">
 <div class="doctor-avatar">
 @if($doctor->image)<img src="{{ asset('storage/'.$doctor->image) }}" alt="{{ $doctor->name }}" loading="lazy" style="width:100%;height:100%;object-fit:cover">@else
 <i data-lucide="user-round" style="width:57px;height:57px" aria-hidden="true"></i><span class="avatar-label">Profile photo pending</span>@endif
 </div>
 <div class="doctor-content"><span class="doctor-kicker">MEDICAL PROFESSIONAL</span>
 <h3>{{ $doctor->name }}</h3><p>{{ $doctor->specialty }}</p>
 <a class="doc-link" href="{{ route('doctors.show',$doctor->slug) }}">View profile <i data-lucide="arrow-up-right" style="width:16px;height:16px"></i></a>
 </div>
</article>
