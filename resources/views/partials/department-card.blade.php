
@php
    $image = $department->image ?? null;
@endphp

<article class="ah-department-card">

    <a href="{{ route('departments.show', $department->slug) }}"
       class="ah-department-card__link">

        <div class="ah-department-card__image">

            @if ($image)
                <img
                    src="{{ asset('storage/' . $image) }}"
                    alt="{{ $department->name }}"
                    loading="lazy">
            @else
                <div class="ah-department-card__placeholder">
                    <i data-lucide="heart-pulse"
                       aria-hidden="true"></i>
                </div>
            @endif

        </div>

        <div class="ah-department-card__content">

            <span class="ah-department-card__label">
                MEDICAL DEPARTMENT
            </span>

            <h3>{{ $department->name }}</h3>

            @if ($department->description)
                <p>
                    {{ \Illuminate\Support\Str::limit(
                        strip_tags($department->description),
                        95
                    ) }}
                </p>
            @endif

            <span class="ah-department-card__more">
                Explore Department
                <i data-lucide="arrow-up-right"
                   aria-hidden="true"></i>
            </span>

        </div>

    </a>

</article>
