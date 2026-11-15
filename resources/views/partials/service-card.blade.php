<a class="service-card" href="{{ route('services.show',$service->slug) }}">
 <span class="icon-tile"><i data-lucide="{{ $service->icon ?: 'activity' }}" style="width:26px;height:26px"></i></span>
 <div><h3>{{ $service->name }}</h3><p>{{ $service->description }}</p>
 <span class="text-link">Explore service <i data-lucide="arrow-up-right" style="width:16px;height:16px"></i></span></div>
</a>
