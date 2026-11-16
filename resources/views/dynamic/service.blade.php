SERVICE RELATED IMAGES GALLERY
@if (!empty($service->related_images))

    <div class="service-gallery">

        <div class="service-gallery__heading">
            <span class="eyebrow">PHOTO GALLERY</span>
            <h2>{{ $service->name }} Gallery</h2>
            <p>
                Explore images related to this hospital service.
            </p>
        </div>

        <div class="service-gallery__grid">

            @foreach ($service->related_images as $image)

                <a href="{{ asset('storage/' . $image) }}"
                   target="_blank"
                   rel="noopener noreferrer"
                   class="service-gallery__item">

                    <img
                        src="{{ asset('storage/' . $image) }}"
                        alt="{{ $service->name }} - Image {{ $loop->iteration }}"
                        loading="lazy"
                    >

                    <span class="service-gallery__zoom">
                        <i data-lucide="expand"></i>
                    </span>

                </a>

            @endforeach

        </div>

    </div>

@endif