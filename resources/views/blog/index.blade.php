<x-layout>
    <x-slot:title>Laravel & SaaS Development Blog | Hafiz Riaz</x-slot:title>
    <x-slot:description>Expert insights on Laravel development, process automation, SaaS building, Vue.js, Chrome extensions, and AI integration. Practical tutorials and lessons from building real products.</x-slot:description>
    <x-slot:keywords>Laravel blog, SaaS development tutorials, Process automation guides, Vue.js tutorials, PHP development, Web development blog, Laravel tips, Chrome extension development</x-slot:keywords>
    <x-slot:canonical>{{ route('blog.index') }}</x-slot:canonical>

    {{-- Blog Open Graph --}}
    <x-slot:ogTitle>Laravel & SaaS Development Blog | Hafiz Riaz</x-slot:ogTitle>
    <x-slot:ogDescription>Expert insights on Laravel development, process automation, and SaaS building. Practical tutorials from real-world experience.</x-slot:ogDescription>
    <x-slot:ogType>website</x-slot:ogType>
    <x-slot:ogUrl>{{ route('blog.index') }}</x-slot:ogUrl>

    @push('schemas')
        {{-- Blog Schema --}}
        <script type="application/ld+json">
        {
          "@@context": "https://schema.org",
          "@@type": "Blog",
          "@@id": "https://hafiz.dev/blog/#blog",
          "url": "https://hafiz.dev/blog",
          "name": "Hafiz Riaz Blog",
          "description": "Laravel development, process automation, and SaaS building insights",
          "author": {
            "@@type": "Person",
            "@@id": "https://hafiz.dev/#person",
            "name": "Hafiz Riaz"
          },
          "publisher": {
            "@@type": "Person",
            "@@id": "https://hafiz.dev/#person"
          },
          "inLanguage": "en-US",
          "blogPost": {!! json_encode($posts->take(10)->map(function($post) {
              return [
                  '@type' => 'BlogPosting',
                  'headline' => $post->title,
                  'url' => route('blog.show', $post->slug),
                  'datePublished' => $post->published_at->toIso8601String(),
                  'author' => [
                      '@type' => 'Person',
                      'name' => 'Hafiz Riaz'
                  ]
              ];
          })->values()->all(), JSON_UNESCAPED_SLASHES) !!}
        }
        </script>
    @endpush

    <!-- Override background pattern for blog pages -->
    <style>
        body > div:first-of-type {
            background-image: none !important;
            background: #1e1e28;
        }
    </style>

    <div class="max-w-7xl mx-auto px-4 py-16 relative z-10">
        <!-- Header -->
        <div class="text-center mb-16">
            <h1 class="text-5xl font-bold text-light mb-4">Blog</h1>
            <p class="text-xl text-light-muted max-w-2xl mx-auto">
                Insights on Laravel development, process automation, SaaS building,
                and lessons learned from building products.
            </p>
        </div>

        <!-- Posts Grid -->
        @if($posts->count() > 0)
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 mb-12">
                @foreach($posts as $post)
                    <article class="bg-gradient-card rounded-xl shadow-dark-card hover:shadow-dark-card-hover transition-all duration-300 overflow-hidden border border-gold/10 group hover:-translate-y-1">
                        @if($post->featured_image)
                            <a href="{{ route('blog.show', $post->slug) }}" class="block overflow-hidden">
                                <img src="{{ asset('storage/' . $post->featured_image) }}"
                                     alt="{{ $post->title }}"
                                     class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-500"
                                     onerror="this.style.display='none'">
                            </a>
                        @endif

                        <div class="p-6">
                            <!-- Tags -->
                            @if($post->tags)
                                <div class="flex flex-wrap gap-2 mb-3">
                                    @foreach($post->tags as $tag)
                                        <span class="text-xs px-2.5 py-1 bg-gold/20 text-gold rounded-md font-medium border border-gold/30">
                                            {{ $tag }}
                                        </span>
                                    @endforeach
                                </div>
                            @endif

                            <!-- Title -->
                            <h2 class="text-xl font-bold text-light mb-3 leading-snug">
                                <a href="{{ route('blog.show', $post->slug) }}" class="hover:text-gold transition-colors duration-300">
                                    {{ $post->title }}
                                </a>
                            </h2>

                            <!-- Excerpt -->
                            <p class="text-light-muted text-sm mb-4 line-clamp-3">
                                {{ Str::limit($post->excerpt, 120) }}
                            </p>

                            <!-- Meta -->
                            <div class="flex items-center justify-between text-xs text-light-muted/70 pt-4 border-t border-gold/10">
                                <span>{{ $post->published_at->format('M d, Y') }}</span>
                                <span class="flex items-center gap-1">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    {{ $post->reading_time }} min read
                                </span>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>

            <!-- Pagination Info -->
            <div class="flex flex-col items-center gap-6 mt-16">
                <p class="text-base text-light-muted font-medium">
                    Showing <span class="font-bold text-gold">{{ $posts->firstItem() }}</span>
                    to <span class="font-bold text-gold">{{ $posts->lastItem() }}</span>
                    of <span class="font-bold text-gold">{{ $posts->total() }}</span> posts
                </p>

                <!-- Pagination -->
                {{ $posts->links('vendor.pagination.dark-theme') }}
            </div>
        @else
            <div class="text-center py-12">
                <p class="text-light-muted">No posts published yet. Check back soon!</p>
            </div>
        @endif
    </div>
</x-layout>
