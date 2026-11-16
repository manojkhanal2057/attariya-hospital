
@extends('layouts.site')

@section('content')
<main id="main">

    {{-- PAGE BANNER --}}
    <section class="page-banner">
        <div class="container">

            <div class="breadcrumbs">
                <a href="{{ route('home') }}">Home</a>

                <i data-lucide="chevron-right"
                   aria-hidden="true"
                   style="width:15px;height:15px"></i>

                <a href="{{ route('notices.index') }}">
                    Notices
                </a>

                <i data-lucide="chevron-right"
                   aria-hidden="true"
                   style="width:15px;height:15px"></i>

                <span>Notice Details</span>
            </div>

            <span class="eyebrow">ATTARIYA HOSPITAL</span>

            <h1>Notice Details</h1>

            <p>Official notices and hospital announcements.</p>

        </div>

        <div class="banner-ring"></div>
    </section>

    {{-- NOTICE DETAIL --}}
    <section class="section ah-notice-detail-section">
        <div class="container">

            <a href="{{ route('notices.index') }}"
               class="ah-notice-back">
                <i data-lucide="arrow-left"
                   aria-hidden="true"></i>
                Back to All Notices
            </a>

            <div class="ah-notice-detail-layout">

                {{-- MAIN NOTICE CONTENT --}}
                <article class="ah-notice-detail-main">

                    @if($isPreview ?? false)
                        <div class="ah-notice-preview-alert">
                            <i data-lucide="info"
                               aria-hidden="true"></i>
                            This is a design preview, not an
                            official hospital announcement.
                        </div>
                    @endif

                    <div class="ah-notice-detail-heading">

                        <span class="eyebrow">
                            HOSPITAL ANNOUNCEMENT
                        </span>

                        <h2>{{ $notice->title }}</h2>

                        <div class="ah-notice-detail-meta">

                            <span>
                                <i data-lucide="calendar-days"
                                   aria-hidden="true"></i>

                                {{ $notice->published_at?->format('d M Y') ?? 'Date not specified' }}
                            </span>

                            <span class="ah-notice-detail-category">
                                {{ ucwords(str_replace('-', ' ', $notice->category ?? 'general')) }}
                            </span>

                        </div>
                    </div>

                    {{-- NOTICE DESCRIPTION --}}
                    <div class="ah-notice-detail-body">

                        @if(!empty($notice->description))
                            <p>{{ $notice->description }}</p>
                        @endif

                        @if(filled(strip_tags($notice->body ?? '')))
                            <div class="ah-notice-detail-extra">
                                {!! nl2br(e(
                                    html_entity_decode(
                                        trim(strip_tags($notice->body)),
                                        ENT_QUOTES | ENT_HTML5,
                                        'UTF-8'
                                    )
                                )) !!}
                            </div>
                        @endif

                    </div>

                    {{-- PDF ATTACHMENT --}}
                    @if(!empty($notice->pdf))
                        @php
                            $pdfUrl = asset('storage/' . $notice->pdf);
                        @endphp

                        <section class="ah-notice-attachment"
                                 aria-labelledby="notice-attachment-title">

                            <div class="ah-notice-attachment-heading">

                                <div class="ah-notice-attachment-icon">
                                    <i data-lucide="file-text"
                                       aria-hidden="true"></i>
                                </div>

                                <div>
                                    <h3 id="notice-attachment-title">
                                        Notice Attachment
                                    </h3>

                                    <p>View or download the attached PDF.</p>
                                </div>

                            </div>

                            <div class="ah-notice-attachment-actions">

                                <a href="{{ $pdfUrl }}"
                                   target="_blank"
                                   rel="noopener noreferrer"
                                   class="btn btn-primary">
                                    <i data-lucide="eye"
                                       aria-hidden="true"></i>
                                    View PDF
                                </a>

                                <a href="{{ $pdfUrl }}"
                                   download
                                   class="btn btn-secondary">
                                    <i data-lucide="download"
                                       aria-hidden="true"></i>
                                    Download PDF
                                </a>

                            </div>

                            <div class="ah-notice-pdf-preview">
                                <iframe
                                    src="{{ $pdfUrl }}"
                                    title="PDF attachment for {{ $notice->title }}"
                                    loading="lazy">
                                </iframe>
                            </div>

                        </section>
                    @endif

                    {{-- RELATED NOTICES --}}
                    @if(($relatedNotices ?? collect())->isNotEmpty())

                        <section class="ah-related-notices">

                            <span class="eyebrow">
                                MORE UPDATES
                            </span>

                            <h2>Related Notices</h2>

                            <div class="ah-related-notices-list">

                                @foreach($relatedNotices as $item)

                                    <a href="{{ route('notices.show', $item->slug) }}"
                                       class="ah-related-notice">

                                        <i data-lucide="file-text"
                                           aria-hidden="true"></i>

                                        <span>{{ $item->title }}</span>

                                        <i data-lucide="arrow-up-right"
                                           aria-hidden="true"></i>

                                    </a>

                                @endforeach

                            </div>

                        </section>

                    @endif

                </article>

                {{-- RIGHT CONTACT SIDEBAR --}}
                <aside class="ah-notice-detail-aside">

                    <div class="ah-notice-help-card">

                        <span class="eyebrow">
                            NEED ASSISTANCE?
                        </span>

                        <h3>Questions About This Notice?</h3>

                        <p>
                            Contact Attariya Hospital for clarification
                            regarding official announcements.
                        </p>

                        <a href="tel:+97791590547"
                           class="btn btn-primary btn-block">
                            <i data-lucide="phone"
                               aria-hidden="true"></i>
                            Call 091-590547
                        </a>

                        <a href="{{ url('/contact') }}"
                           class="btn btn-secondary btn-block">
                            Contact Hospital
                        </a>

                    </div>

                </aside>

            </div>
        </div>
    </section>

</main>
@endsection
