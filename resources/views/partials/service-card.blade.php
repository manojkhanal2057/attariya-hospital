<a class="service-card service-card--visual"
   href="{{ route('services.show', $service->slug) }}">

    <div class="service-card__media">

        @if (!empty($service->image))
            <img
                src="{{ asset('storage/' . $service->image) }}"
                alt="{{ $service->name }}"
                loading="lazy"
            >
        @else
            <div class="service-card__placeholder">
                <i
                    data-lucide="{{ $service->icon ?: 'activity' }}"
                    aria-hidden="true"
                ></i>
            </div>
        @endif

        <span class="service-card__media-icon">
            <i
                data-lucide="{{ $service->icon ?: 'activity' }}"
                aria-hidden="true"
            ></i>
        </span>
    </div>

    <div class="service-card__body">

        <h3>{{ $service->name }}</h3>

        <p>
            {{ \Illuminate\Support\Str::limit(
                strip_tags($service->description ?? ''),
                120
            ) }}
        </p>

        <span class="text-link">
            Explore Service
            <i data-lucide="arrow-up-right" aria-hidden="true"></i>
        </span>

    </div>

</a>