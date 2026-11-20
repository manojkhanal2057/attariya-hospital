
@extends('layouts.site')

@section('content')
    @php
        $newsImage = $post->image
            ? asset('storage/' . $post->image)
            : null;

        $publishedDate = $post->published_at;

        // Convert editor HTML into safe readable plain text.
        $bodyText = preg_replace(
            '/<\s*br\s*\/?>|<\/\s*(p|div|h[1-6]|li)\s*>/i',
            "\n\n",
            $post->body ?? ''
        );

        $bodyText = trim(strip_tags($bodyText));

        $otherNews = $relatedNews ?? collect();
    @endphp

    <main id="main">

        {{-- =====================================
             NEWS DETAIL BANNER
        ===================================== --}}
        <section class="page-banner ah-news-banner"
            aria-labelledby="news-detail-title">

            <div class="container">

                <span class="eyebrow">
                    <i data-lucide="newspaper" aria-hidden="true"></i>
                    HOSPITAL NEWS & UPDATES
                </span>

                <h1 id="news-detail-title">
                    {{ $post->title }}
                </h1>

                <div class="ah-news-banner__meta">

                    @if ($publishedDate)
                        <span>
                            <i data-lucide="calendar-days"
                                aria-hidden="true"></i>
                            {{ $publishedDate->format('d M Y') }}
                        </span>
                    @endif

                    <span>
                        <i data-lucide="building-2"
                            aria-hidden="true"></i>
                        Attariya Hospital
                    </span>

                </div>

                <nav class="ah-news-breadcrumb"
                    aria-label="Breadcrumb">

                    <a href="{{ route('home') }}">Home</a>
                    <i data-lucide="chevron-right"
                        aria-hidden="true"></i>

                    <a href="{{ route('news.index') }}">
                        News
                    </a>
                    <i data-lucide="chevron-right"
                        aria-hidden="true"></i>

                    <span aria-current="page">
                        News Details
                    </span>

                </nav>

            </div>
        </section>


        {{-- =====================================
             MAIN NEWS DETAILS
        ===================================== --}}
        <section class="section ah-news-detail-section">

            <div class="container">

                <div class="ah-news-detail-layout">

                    {{-- =====================================
                         LEFT SIDEBAR: RELATED NEWS
                    ===================================== --}}
                    <aside class="ah-news-sidebar"
                        aria-label="Related hospital news">

                        <div class="ah-news-sidebar__header">

                            <span class="eyebrow">
                                EXPLORE MORE
                            </span>

                            <h2>Latest News</h2>

                            <p>
                                More updates and announcements
                                from our hospital.
                            </p>

                        </div>

                        <div class="ah-news-sidebar__list">

                            @forelse($otherNews as $related)

                                <a
                                    class="ah-related-news"
                                    href="{{ route('news.show', $related->slug) }}">

                                    <div class="ah-related-news__image">

                                        @if($related->image)
                                            <img
                                                src="{{ asset('storage/' . $related->image) }}"
                                                alt=""
                                                loading="lazy">
                                        @else
                                            <i data-lucide="newspaper"
                                                aria-hidden="true"></i>
                                        @endif

                                    </div>

                                    <div class="ah-related-news__content">

                                        @if($related->published_at)
                                            <time datetime="{{ $related->published_at->format('Y-m-d') }}">
                                                {{ $related->published_at->format('d M Y') }}
                                            </time>
                                        @endif

                                        <h3>
                                            {{ \Illuminate\Support\Str::limit(
                                                $related->title,
                                                65
                                            ) }}
                                        </h3>

                                        <span>
                                            Read News
                                            <i data-lucide="arrow-up-right"
                                                aria-hidden="true"></i>
                                        </span>

                                    </div>

                                </a>

                            @empty

                                <div class="ah-related-news__empty">
                                    <i data-lucide="newspaper"
                                        aria-hidden="true"></i>

                                    <p>
                                        No other published news
                                        available at the moment.
                                    </p>
                                </div>

                            @endforelse

                        </div>

                        <a href="{{ route('news.index') }}"
                            class="ah-news-sidebar__all">

                            View All News

                            <i data-lucide="arrow-right"
                                aria-hidden="true"></i>
                        </a>

                    </aside>


                    {{-- =====================================
                         RIGHT: NEWS ARTICLE
                    ===================================== --}}
                    <article class="ah-news-article">

                        {{-- MAIN NEWS IMAGE --}}
                        @if($newsImage)

                            <figure class="ah-news-article__figure">

                                <img
                                    src="{{ $newsImage }}"
                                    alt="{{ $post->title }}"
                                    loading="eager">

                                <figcaption>
                                    Attariya Hospital News & Updates
                                </figcaption>

                            </figure>

                        @endif


                        {{-- ARTICLE HEADING --}}
                        <div class="ah-news-article__header">

                            <span class="ah-news-article__category">
                                <i data-lucide="megaphone"
                                    aria-hidden="true"></i>
                                Hospital Update
                            </span>

                            <h2>{{ $post->title }}</h2>

                            <div class="ah-news-article__meta">

                                @if($publishedDate)
                                    <time datetime="{{ $publishedDate->format('Y-m-d') }}">
                                        <i data-lucide="calendar"
                                            aria-hidden="true"></i>

                                        {{ $publishedDate->format('F d, Y') }}
                                    </time>
                                @endif

                                <span>
                                    <i data-lucide="map-pin"
                                        aria-hidden="true"></i>
                                    Attariya, Kailali
                                </span>

                            </div>

                        </div>


                        {{-- NEWS EXCERPT --}}
                        @if($post->excerpt)

                            <div class="ah-news-article__excerpt">
                                {{ strip_tags($post->excerpt) }}
                            </div>

                        @endif


                        {{-- FULL NEWS CONTENT --}}
                        @if($bodyText !== '')

                            <div class="ah-news-article__body">
                                {!! nl2br(e($bodyText)) !!}
                            </div>

                        @endif


                        {{-- ARTICLE FOOTER --}}
                        <div class="ah-news-article__footer">

                            <div class="ah-news-article__footer-info">

                                <i data-lucide="info"
                                    aria-hidden="true"></i>

                                <span>
                                    For the latest official information,
                                    please contact Attariya Hospital.
                                </span>

                            </div>

                            <a
                                href="{{ route('news.index') }}"
                                class="ah-news-back">

                                <i data-lucide="arrow-left"
                                    aria-hidden="true"></i>

                                Back to All News
                            </a>

                        </div>

                    </article>

                </div>

            </div>

        </section>


        {{-- =====================================
             BOTTOM CONTACT CTA
        ===================================== --}}
        <section class="ah-news-bottom-cta">

            <div class="container">

                <div>

                    <span>WE'RE HERE TO HELP</span>

                    <h2>
                        Have Questions About Our Services?
                    </h2>

                    <p>
                        Contact our hospital team for healthcare
                        information and appointment assistance.
                    </p>

                </div>

                <a href="{{ url('/contact') }}"
                    class="btn btn-white">

                    Contact Hospital

                    <i data-lucide="arrow-up-right"
                        aria-hidden="true"></i>

                </a>

            </div>

        </section>

    </main>
@endsection
