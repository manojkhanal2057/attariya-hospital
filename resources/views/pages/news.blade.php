
@extends('layouts.site')

@section('content')
<main id="main">

    {{-- PAGE BANNER --}}
    <section class="page-banner">
        <div class="container">

            <div class="breadcrumbs">
                <a href="{{ url('/') }}">Home</a>
                <i data-lucide="chevron-right"
                   aria-hidden="true"></i>
                <span>News & Updates</span>
            </div>

            <span class="eyebrow">ATTARIYA HOSPITAL</span>

            <h1>News & Updates</h1>

            <p>
                Discover the latest announcements,
                hospital updates and health-related news.
            </p>

        </div>

        <div class="banner-ring"></div>
    </section>


    {{-- DYNAMIC NEWS LISTING --}}
    <section class="section hospital-news-section">
        <div class="container">

            @if ($posts->isNotEmpty())

                <div class="hospital-news-grid">

                    @foreach ($posts as $post)

                        <article class="hospital-news-card">

                            {{-- IMAGE / PLACEHOLDER --}}
                            <a
                                href="{{ url('/news/' . $post->slug) }}"
                                class="hospital-news-media"
                                aria-label="Read {{ $post->title }}"
                            >

                                @if ($post->image)

                                    <img
                                        src="{{ \Illuminate\Support\Facades\Storage::disk('public')->url($post->image) }}"
                                        alt="{{ $post->title }}"
                                        loading="lazy"
                                        decoding="async"
                                    >

                                @else

                                    <div class="hospital-news-placeholder">
                                        <i data-lucide="newspaper"
                                           aria-hidden="true"></i>
                                    </div>

                                @endif

                                <span class="hospital-news-category">
                                    HOSPITAL UPDATE
                                </span>

                            </a>


                            {{-- NEWS DETAILS --}}
                            <div class="hospital-news-content">

                                <time
                                    datetime="{{ $post->published_at?->format('Y-m-d') }}"
                                    class="hospital-news-date"
                                >
                                    {{ $post->published_at?->format('d M Y') }}
                                </time>

                                <h2>
                                    <a href="{{ url('/news/' . $post->slug) }}">
                                        {{ $post->title }}
                                    </a>
                                </h2>

                                @if ($post->excerpt)
                                    <p>
                                        {{ \Illuminate\Support\Str::limit(
                                            strip_tags($post->excerpt),
                                            170
                                        ) }}
                                    </p>
                                @endif

                                <a
                                    href="{{ url('/news/' . $post->slug) }}"
                                    class="hospital-news-read"
                                >
                                    Read update
                                    <i data-lucide="arrow-up-right"
                                       aria-hidden="true"></i>
                                </a>

                            </div>

                        </article>

                    @endforeach

                </div>


                {{-- PAGINATION --}}
                @if ($posts->hasPages())
                    <div class="hospital-news-pagination">
                        {{ $posts->links() }}
                    </div>
                @endif

            @else

                <div class="hospital-news-empty">
                    <i data-lucide="newspaper"
                       aria-hidden="true"></i>
                    <h2>No news available</h2>
                    <p>Hospital updates will appear here.</p>
                </div>

            @endif

        </div>
    </section>

</main>
@endsection
