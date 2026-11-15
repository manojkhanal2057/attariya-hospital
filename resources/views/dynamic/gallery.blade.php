@extends('layouts.site')

@section('content')
@php
    $categories = $photos->pluck('category')
        ->map(fn ($category) => trim((string) $category))
        ->filter()
        ->unique(fn ($category) => mb_strtolower($category))
        ->sort()
        ->values();
@endphp
<main id="main">
    <section class="page-banner">
        <div class="container">
            <span class="eyebrow">HOSPITAL GALLERY</span>
            <h1>Moments at Attariya Hospital</h1>
            <p>Explore our hospital facilities, healthcare team and community activities.</p>
        </div>
    </section>

    <section class="section hospital-gallery-section" aria-labelledby="gallery-heading">
        <div class="container">
            <div class="hospital-gallery-top">
                <div>
                    <span class="eyebrow">OUR GALLERY</span>
                    <h2 id="gallery-heading">Inside Our Hospital</h2>
                    <p>Photos shared by Attariya Hospital.</p>
                </div>
                <label class="hospital-gallery-search">
                    <span class="visually-hidden">Search gallery photos</span>
                    <svg aria-hidden="true" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="18" height="18"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.35-4.35"/></svg>
                    <input type="search" id="hospitalGallerySearch" placeholder="Search photos..." autocomplete="off" />
                </label>
            </div>

            @if ($photos->isNotEmpty())
                <div class="hospital-gallery-filters" role="group" aria-label="Filter gallery by category">
                    <button class="hospital-gallery-filter is-active" type="button" data-gallery-filter="all" aria-pressed="true">All Photos <span>{{ $photos->count() }}</span></button>
                    @foreach ($categories as $category)
                        <button class="hospital-gallery-filter" type="button" data-gallery-filter="{{ $category }}" aria-pressed="false">{{ $category }}</button>
                    @endforeach
                    @if($photos->contains(fn ($photo) => !trim((string) $photo->category)))
                        <button class="hospital-gallery-filter" type="button" data-gallery-filter="uncategorized" aria-pressed="false">Other</button>
                    @endif
                </div>

                <div id="hospitalGalleryGrid" class="hospital-gallery-grid">
                    @foreach ($photos as $photo)
                        @php
                            $category = trim((string) $photo->category);
                            $photoTitle = trim((string) $photo->title);
                            $alt = trim((string) $photo->alt_text) ?: $photoTitle ?: 'Attariya Hospital gallery photograph';
                        @endphp
                        <figure class="hospital-gallery-card"
                            data-gallery-category="{{ $category ?: 'uncategorized' }}"
                            data-gallery-search="{{ mb_strtolower($photoTitle . ' ' . $category . ' ' . ($photo->alt_text ?? '')) }}">
                            <button class="hospital-gallery-photo-button" type="button"
                                data-gallery-photo="{{ asset('storage/' . $photo->image) }}"
                                data-gallery-alt="{{ $alt }}"
                                data-gallery-title="{{ $photoTitle }}"
                                aria-label="View larger photo: {{ $alt }}">
                                <img src="{{ asset('storage/' . $photo->image) }}"
                                    alt="{{ $alt }}" loading="lazy" decoding="async" />
                                <span class="hospital-gallery-zoom" aria-hidden="true">View photo +</span>
                            </button>
                            @if ($photoTitle || $category)
                                <figcaption class="hospital-gallery-caption">
                                    @if ($category)<span>{{ $category }}</span>@endif
                                    @if ($photoTitle)<h3>{{ $photoTitle }}</h3>@endif
                                </figcaption>
                            @endif
                        </figure>
                    @endforeach
                </div>
                <p id="hospitalGalleryNoResults" class="hospital-gallery-empty" hidden>No photos match this filter. Try another category or search.</p>
                <p id="hospitalGalleryCount" class="hospital-gallery-count" aria-live="polite"></p>
            @else
                <div class="hospital-gallery-empty">Approved hospital photographs will appear here soon.</div>
            @endif
        </div>
    </section>
</main>

<dialog id="hospitalGalleryDialog" class="hospital-gallery-dialog" aria-label="Photo preview">
    <button type="button" class="hospital-gallery-dialog-close" aria-label="Close photo preview">&times;</button>
    <img id="hospitalGalleryDialogImage" alt="" />
    <p id="hospitalGalleryDialogCaption"></p>
</dialog>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const grid = document.getElementById('hospitalGalleryGrid');
    if (!grid) return;

    const cards = Array.from(grid.querySelectorAll('.hospital-gallery-card'));
    const filters = Array.from(document.querySelectorAll('.hospital-gallery-filter'));
    const search = document.getElementById('hospitalGallerySearch');
    const noResults = document.getElementById('hospitalGalleryNoResults');
    const count = document.getElementById('hospitalGalleryCount');
    const dialog = document.getElementById('hospitalGalleryDialog');
    const dialogImage = document.getElementById('hospitalGalleryDialogImage');
    const dialogCaption = document.getElementById('hospitalGalleryDialogCaption');
    let selected = 'all';

    function render() {
        const keyword = (search?.value || '').trim().toLocaleLowerCase();
        let visible = 0;
        cards.forEach(card => {
            const matchCategory = selected === 'all' || card.dataset.galleryCategory?.toLocaleLowerCase() === selected.toLocaleLowerCase();
            const matchSearch = !keyword || (card.dataset.gallerySearch || '').toLocaleLowerCase().includes(keyword);
            const show = matchCategory && matchSearch;
            card.hidden = !show;
            if (show) visible++;
        });
        noResults.hidden = visible !== 0;
        count.textContent = `${visible} photo${visible === 1 ? '' : 's'} shown`;
    }

    filters.forEach(button => button.addEventListener('click', () => {
        selected = button.dataset.galleryFilter;
        filters.forEach(item => {
            const active = item === button;
            item.classList.toggle('is-active', active);
            item.setAttribute('aria-pressed', String(active));
        });
        render();
    }));
    search?.addEventListener('input', render);

    if (dialog?.showModal) {
        grid.querySelectorAll('[data-gallery-photo]').forEach(button => {
            button.addEventListener('click', () => {
                dialogImage.src = button.dataset.galleryPhoto;
                dialogImage.alt = button.dataset.galleryAlt || '';
                dialogCaption.textContent = button.dataset.galleryTitle || button.dataset.galleryAlt || '';
                dialog.showModal();
            });
        });
        dialog.querySelector('.hospital-gallery-dialog-close')?.addEventListener('click', () => dialog.close());
        dialog.addEventListener('click', event => { if (event.target === dialog) dialog.close(); });
        dialog.addEventListener('close', () => { dialogImage.removeAttribute('src'); });
    }
    render();
});
</script>
@endsection
