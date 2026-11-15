@extends('layouts.site')
@section('content')
<main id="main"><section class="page-banner"><div class="container"><span class="eyebrow">NEWS & NOTICES</span><h1>Hospital Updates</h1></div></section>
<section class="section"><div class="container"><div class="news-grid">
@forelse($posts as $post)
<article class="news-card"><div class="news-content"><span class="eyebrow">{{ $post->published_at?->format('d M Y') }}</span><h3>{{ $post->title }}</h3><p>{{ $post->excerpt }}</p><a class="text-link" href="{{ route('news.show',$post->slug) }}">Read more</a></div></article>
@empty <p>New hospital notices will be posted here.</p> @endforelse
</div><div style="margin-top:24px">{{ $posts->links() }}</div></div></section></main>
@endsection
