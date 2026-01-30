<x-layout>
    {{-- SEO Meta Tags --}}
    <x-slot:title>{{ $post->seo_title ?? $post->title . ' | Hafiz Riaz - Laravel Developer' }}</x-slot:title>
    <x-slot:description>{{ $post->seo_description ?? $post->excerpt }}</x-slot:description>
    <x-slot:keywords>{{ implode(', ', $post->tags ?? []) }}, Laravel, PHP, Web Development</x-slot:keywords>
    <x-slot:canonical>{{ route('blog.show', $post->slug) }}</x-slot:canonical>

    {{-- Open Graph --}}
    <x-slot:ogType>article</x-slot:ogType>
    <x-slot:ogTitle>{{ $post->title }}</x-slot:ogTitle>
    <x-slot:ogDescription>{{ $post->excerpt }}</x-slot:ogDescription>
    <x-slot:ogImage>{{ $post->featured_image ? asset('storage/' . $post->featured_image) . '?v=' . $post->updated_at->timestamp : asset('profile-photo.png') }}</x-slot:ogImage>
    <x-slot:ogUrl>{{ route('blog.show', $post->slug) }}</x-slot:ogUrl>

    {{-- Article-Specific Structured Data --}}
    @push('schemas')
        {{-- Article/BlogPosting Schema --}}
        <script type="application/ld+json">
        {
          "@@context": "https://schema.org",
          "@@type": "BlogPosting",
          "headline": {{ Js::from($post->title) }},
          "description": {{ Js::from($post->excerpt) }},
          "image": {{ Js::from($post->featured_image ? asset('storage/' . $post->featured_image) . '?v=' . $post->updated_at->timestamp : asset('profile-photo.png')) }},
          "datePublished": {{ Js::from($post->published_at->toIso8601String()) }},
          "dateModified": {{ Js::from($post->updated_at->toIso8601String()) }},
          "author": {
            "@@type": "Person",
            "@@id": "https://hafiz.dev/#person",
            "name": "Hafiz Riaz",
            "url": "https://hafiz.dev"
          },
          "publisher": {
            "@@type": "Person",
            "@@id": "https://hafiz.dev/#person",
            "name": "Hafiz Riaz",
            "logo": {
              "@@type": "ImageObject",
              "url": "https://hafiz.dev/profile-photo.png",
              "width": "600",
              "height": "600"
            }
          },
          "mainEntityOfPage": {
            "@@type": "WebPage",
            "@@id": {{ Js::from(route('blog.show', $post->slug)) }}
          },
          "keywords": {{ Js::from($post->tags ? implode(', ', $post->tags) : '') }},
          "wordCount": "{{ str_word_count(strip_tags($post->content)) }}",
          "timeRequired": "PT{{ $post->reading_time }}M",
          "articleBody": {{ Js::from(strip_tags($post->content)) }},
          "url": {{ Js::from(route('blog.show', $post->slug)) }},
          "isPartOf": {
            "@@type": "Blog",
            "@@id": "https://hafiz.dev/blog/#blog"
          },
          "inLanguage": "en-US"
        }
        </script>

        {{-- Breadcrumb Schema --}}
        <script type="application/ld+json">
        {
          "@@context": "https://schema.org",
          "@@type": "BreadcrumbList",
          "itemListElement": [
            {
              "@@type": "ListItem",
              "position": 1,
              "name": "Home",
              "item": "https://hafiz.dev"
            },
            {
              "@@type": "ListItem",
              "position": 2,
              "name": "Blog",
              "item": "https://hafiz.dev/blog"
            },
            {
              "@@type": "ListItem",
              "position": 3,
              "name": {{ Js::from($post->title) }},
              "item": {{ Js::from(route('blog.show', $post->slug)) }}
            }
          ]
        }
        </script>
    @endpush

    {{-- Article-specific Open Graph tags --}}
    @push('head')
        <meta property="article:published_time" content="{{ $post->published_at->toIso8601String() }}">
        <meta property="article:modified_time" content="{{ $post->updated_at->toIso8601String() }}">
        <meta property="article:author" content="Hafiz Riaz">
        <meta property="article:section" content="Technology">
        @if ($post->tags)
            @foreach ($post->tags as $tag)
                <meta property="article:tag" content="{{ $tag }}">
            @endforeach
        @endif

        {{-- Blog-specific JS (highlight.js, reading progress, copy buttons) --}}
        @vite('resources/js/blog.js')
    @endpush

    <!-- Override background pattern for blog posts -->
    <style>
        /* Ensure consistent dark background throughout */
        body {
            background: #1e1e28 !important;
        }
    </style>

    <article class="max-w-4xl mx-auto px-4 py-8 relative z-10 blog-post-content">
        <!-- Breadcrumb -->
        <nav class="text-sm text-light-muted mb-6">
            <a href="/" class="hover:text-gold transition-colors">Home</a>
            <span class="mx-2">/</span>
            <a href="/blog" class="hover:text-gold transition-colors">Blog</a>
            <span class="mx-2">/</span>
            <span class="text-light">{{ Str::limit($post->title, 50) }}</span>
        </nav>

        <!-- Post Header -->
        <header class="mb-12">
            <div class="flex flex-wrap items-center gap-x-4 gap-y-2 text-sm text-light-muted mb-6">
                <time datetime="{{ $post->published_at->toIso8601String() }}">
                    {{ $post->published_at->format('M d, Y') }}
                </time>
                <span class="hidden sm:inline">•</span>
                <span>{{ $post->reading_time }} min read</span>
                {{-- TODO: Enable views count display in future --}}
                {{-- @if ($post->views >= 100)
                    <span class="hidden sm:inline">•</span>
                    <span>{{ number_format($post->views) }} views</span>
                @endif --}}
            </div>

            <h1 class="text-4xl md:text-5xl font-bold text-light mb-6 leading-tight">
                {{ $post->title }}
            </h1>

            @if ($post->excerpt)
                <p class="text-xl text-light-muted leading-relaxed">
                    {{ $post->excerpt }}
                </p>
            @endif

            <!-- Tags -->
            @if ($post->tags)
                <div class="flex flex-wrap gap-2 mt-6">
                    @foreach ($post->tags as $tag)
                        <a href="{{ route('blog.index', ['tag' => $tag]) }}"
                           class="px-3 py-1 bg-gold/20 text-gold rounded-full text-sm border border-gold/30 hover:bg-gold/30 hover:scale-105 transition-all duration-200">
                            {{ $tag }}
                        </a>
                    @endforeach
                </div>
            @endif
        </header>

        <!-- Featured Image -->
        @if ($post->featured_image)
            <img src="{{ asset('storage/' . $post->featured_image) }}" alt="{{ $post->title }}"
                class="w-full rounded-lg mb-12 shadow-gold border border-gold/20"
                width="1200"
                height="630"
                fetchpriority="high"
                onerror="this.src='{{ asset('blog-placeholder.svg') }}'">
        @endif

        <!-- Post Content -->
        <div class="blog-content mb-16">
            {!! Str::markdown($post->content) !!}
        </div>

        <!-- Visual Separator -->
        <hr class="my-16 border-t border-gold/10">

        <!-- CTA Box: MOST IMPORTANT FOR FREELANCE LEADS! -->
        <div class="my-16 p-8 bg-darkCard/50 border-2 border-gold/30 rounded-xl shadow-dark-card">
            <h3 class="text-2xl font-bold text-light mb-4">
                Need Help With Your Laravel Project?
            </h3>
            <p class="text-light-muted mb-6 leading-relaxed">
                I specialize in building custom Laravel applications, process automation,
                and SaaS development. Whether you need to eliminate repetitive tasks or
                build something from scratch, let's discuss your project.
            </p>
            <div class="flex flex-wrap gap-4">
                <a href="/#contact"
                    class="px-6 py-3 bg-gold text-darkBg font-semibold rounded-lg hover:bg-gold-light transition-all duration-300 hover:shadow-gold-glow hover:-translate-y-0.5">
                    Schedule Free Consultation
                </a>
                <a href="/#portfolio"
                    class="px-6 py-3 border-2 border-gold text-gold font-semibold rounded-lg hover:bg-gold/10 transition-all duration-300">
                    View My Work
                </a>
            </div>
            <p class="text-sm text-light-muted mt-4">
                ⚡ Currently available for 2-3 new projects
            </p>
        </div>

        <!-- Author Bio -->
        <div class="flex items-start gap-6 p-6 bg-darkCard/50 rounded-xl border border-gold/20 shadow-dark-card">
            <picture>
                <source srcset="/profile-photo.webp" type="image/webp">
                <img src="/profile-photo.png" alt="Hafiz Riaz"
                    class="w-20 h-20 rounded-2xl border-4 border-gold/30 shadow-gold"
                    loading="lazy"
                    width="80"
                    height="80">
            </picture>
            <div>
                <h4 class="text-light font-bold text-lg mb-2">About Hafiz Riaz</h4>
                <p class="text-light-muted mb-4 leading-relaxed">
                    Full Stack Developer from Turin, Italy. I build web applications with
                    Laravel and Vue.js, and automate business processes. Creator of ReplyGenius,
                    StudyLab, and other SaaS products.
                </p>
                <a href="/" class="text-gold hover:text-gold-light transition-colors">View Portfolio →</a>
            </div>
        </div>

        <!-- Newsletter Signup -->
        <x-newsletter-signup />

        <!-- Related Posts -->
        @if ($relatedPosts->count() > 0)
            <!-- Visual Separator -->
            <hr class="my-16 border-t border-gold/10">

            <div class="mt-0">
                <h3 class="text-2xl font-bold text-light mb-8">Related Articles</h3>
                <div class="grid md:grid-cols-3 gap-6">
                    @foreach ($relatedPosts as $related)
                        <a href="{{ route('blog.show', $related->slug) }}"
                            class="block bg-gradient-card rounded-xl border border-gold/20 shadow-dark-card hover:shadow-dark-card-hover transition-all duration-300 hover:-translate-y-1 group overflow-hidden">
                            @if ($related->featured_image)
                                <img src="{{ asset('storage/' . $related->featured_image) }}"
                                    alt="{{ $related->title }}" class="w-full h-48 object-cover"
                                    loading="lazy"
                                    width="400"
                                    height="192"
                                    onerror="this.src='{{ asset('blog-placeholder.svg') }}'">
                            @endif
                            <div class="p-6">
                                <h4 class="text-light font-semibold mb-2 group-hover:text-gold transition-colors">
                                    {{ $related->title }}</h4>
                                <p class="text-light-muted text-sm">{{ Str::limit($related->excerpt, 80) }}</p>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        @endif
    </article>
</x-layout>
