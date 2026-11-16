@extends('layouts.site')

@section('content')
    <main id="main">

        {{-- PAGE BANNER --}}
        <section class="page-banner">
            <div class="container">
                <div class="breadcrumbs">
                    <a href="{{ route('home') }}">Home</a>
                    <i data-lucide="chevron-right" aria-hidden="true" style="width:15px;height:15px"></i>
                    <span>Notices</span>
                </div>

                <span class="eyebrow">ATTARIYA HOSPITAL</span>

                <h1>Notices & Announcements</h1>

                <p>
                    Stay informed about hospital announcements,
                    official notices and important updates.
                </p>
            </div>

            <div class="banner-ring"></div>
        </section>

        {{-- NOTICES LISTING --}}
        <section class="section ah-notices-section">
            <div class="container">

                <div class="section-heading">
                    <div>
                        <span class="eyebrow">HOSPITAL UPDATES</span>
                        <h2>Latest Notices</h2>
                        <p>
                            Official announcements and public
                            information from Attariya Hospital.
                        </p>
                    </div>
                </div>

                {{-- SEARCH AND FILTER --}}
                <div class="ah-notice-toolbar">

                    <label class="ah-notice-search">
                        <i data-lucide="search" aria-hidden="true"></i>

                        <input type="search" id="noticeSearch" placeholder="Search notices..."
                            aria-label="Search hospital notices">
                    </label>

                    <select id="noticeCategory" class="ah-notice-category" aria-label="Filter notices by category">

                        <option value="all">All Categories</option>
                        <option value="general">General</option>
                        <option value="announcement">Announcement</option>
                        <option value="vacancy">Vacancy</option>
                        <option value="service-update">Service Update</option>

                    </select>

                </div>

                {{-- NOTICE CARDS --}}
                <div class="ah-notices-list" id="noticesList">

                    @forelse (($notices ?? collect()) as $notice)
                        <article class="ah-notice-card" data-notice-item
                            data-category="{{ $notice->category ?? 'general' }}">

                            <div class="ah-notice-card__icon">
                                <i data-lucide="file-text" aria-hidden="true"></i>
                            </div>

                            <div class="ah-notice-card__body">

                                <div class="ah-notice-card__meta">
                                    <span class="ah-notice-category-badge">
                                        {{ ucwords(str_replace('-', ' ', $notice->category ?? 'general')) }}
                                    </span>

                                    <span class="ah-notice-date">
                                        <i data-lucide="calendar-days" aria-hidden="true"></i>

                                        {{ $notice->published_at?->format('d M Y') ?? 'Date not specified' }}
                                    </span>
                                </div>

                                <h3>{{ $notice->title }}</h3>

                                @if (!empty($notice->description))
                                    <p>
                                        {{ \Illuminate\Support\Str::limit(strip_tags($notice->description), 160) }}
                                    </p>
                                @endif

                                <div class="ah-notice-card__actions">

                                    <a href="{{ route('notices.show', $notice->slug) }}" class="ah-notice-view">
                                        View Details
                                        <i data-lucide="arrow-up-right" aria-hidden="true"></i>
                                    </a>

                                    @if (!empty($notice->pdf))
                                        <a href="{{ asset('storage/' . $notice->pdf) }}" class="ah-notice-download"
                                            target="_blank" rel="noopener noreferrer">
                                            <i data-lucide="file-down" aria-hidden="true"></i>
                                            View PDF
                                        </a>
                                    @endif

                                </div>
                            </div>

                            <span class="ah-notice-card__arrow">
                                <i data-lucide="arrow-up-right" aria-hidden="true"></i>
                            </span>

                        </article>

                    @empty

                        <div class="ah-notices-empty" id="noticesEmpty">
                            <div class="ah-notices-empty__icon">
                                <i data-lucide="clipboard-list" aria-hidden="true"></i>
                            </div>

                            <h3>No Notices Published Yet</h3>
                            <a href="{{ route('notices.preview') }}" class="btn btn-secondary">
                                Preview Notice Detail Design
                            </a>

                            <p>
                                Official hospital notices will appear
                                here once they are published.
                            </p>

                            <a href="{{ route('home') }}" class="btn btn-primary">
                                Back to Homepage
                            </a>
                        </div>
                    @endforelse

                </div>

                <div class="ah-notices-no-results" id="noticeNoResults" role="status" hidden>
                    <i data-lucide="search-x" aria-hidden="true"></i>
                    <h3>No Matching Notices</h3>
                    <p>Try another keyword or category.</p>
                </div>

            </div>
        </section>

        {{-- CONTACT CTA --}}
        <section class="ah-notices-contact">
            <div class="container">
                <div class="ah-notices-contact__inner">

                    <div>
                        <span class="eyebrow">NEED ASSISTANCE?</span>
                        <h2>Have Questions About a Notice?</h2>
                        <p>
                            Contact Attariya Hospital for clarification
                            about official announcements.
                        </p>
                    </div>

                    <a href="tel:+97791590547" class="btn btn-primary">
                        <i data-lucide="phone" aria-hidden="true"></i>
                        Call 091-590547
                    </a>

                </div>
            </div>
        </section>

    </main>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const search = document.getElementById('noticeSearch');
            const category = document.getElementById('noticeCategory');
            const cards = Array.from(
                document.querySelectorAll('[data-notice-item]')
            );
            const noResults = document.getElementById('noticeNoResults');

            if (!search || !category || !noResults) return;

            function filterNotices() {
                const keyword = search.value.trim().toLowerCase();
                const selectedCategory = category.value;
                let visibleCount = 0;

                cards.forEach(function(card) {
                    const matchesText =
                        card.textContent.toLowerCase().includes(keyword);

                    const matchesCategory =
                        selectedCategory === 'all' ||
                        card.dataset.category === selectedCategory;

                    const visible = matchesText && matchesCategory;

                    card.hidden = !visible;

                    if (visible) visibleCount++;
                });

                noResults.hidden =
                    cards.length === 0 || visibleCount > 0;
            }

            search.addEventListener('input', filterNotices);
            category.addEventListener('change', filterNotices);
        });
    </script>
@endpush
