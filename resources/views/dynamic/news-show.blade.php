@extends('layouts.site')
@section('content')
<main id="main"><section class="page-banner"><div class="container"><span class="eyebrow">HOSPITAL NEWS</span><h1>{{ $post->title }}</h1><p>{{ $post->published_at?->format('d M Y') }}</p></div></section>
<section class="section"><div class="container" style="max-width:850px">
@if($post->image)<img src="{{ asset('storage/'.$post->image) }}" alt="{{ $post->title }}" style="width:100%;border-radius:22px">@endif
<p>{{ $post->excerpt }}</p><div style="white-space:pre-line">{{ strip_tags($post->body) }}</div>
<a href="{{ route('news.index') }}">← Back to news</a></div></section></main>
@endsection
