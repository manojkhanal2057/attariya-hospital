
<article class="doctor-card">

    <div class="doctor-avatar">

        @if ($doctor->image)
            <img
                src="{{ asset('storage/' . $doctor->image) }}"
                alt="{{ $doctor->name }}"
                class="doctor-profile-image"
                loading="lazy"
                decoding="async"
            >
        @else
            <div class="doctor-image-placeholder">
                <i
                    data-lucide="user-round"
                    aria-hidden="true"
                    style="width:57px;height:57px"
                ></i>

                <span class="avatar-label">
                    Profile photo pending
                </span>
            </div>
        @endif

    </div>

    <div class="doctor-content">

        <span class="doctor-kicker">
            MEDICAL PROFESSIONAL
        </span>

        <h3>{{ $doctor->name }}</h3>

        <p>{{ $doctor->specialty }}</p>

        <a
            class="doc-link"
            href="{{ route('doctors.show', $doctor->slug) }}"
        >
            View profile

            <i
                data-lucide="arrow-up-right"
                aria-hidden="true"
                style="width:16px;height:16px"
            ></i>
        </a>

    </div>

</article>
