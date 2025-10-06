<x-layout>
    <x-slot:title>Blog - Hafiz Riaz</x-slot:title>
    <x-slot:description>Laravel development, process automation, and SaaS building insights.</x-slot:description>

    <div class="max-w-7xl mx-auto px-4 py-16">
        <!-- Header -->
        <div class="text-center mb-16">
            <h1 class="text-5xl font-bold text-gray-900 mb-4">Blog</h1>
            <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                Insights on Laravel development, process automation, SaaS building,
                and lessons learned from building products.
            </p>
        </div>

        <!-- Posts Grid -->
        @if($posts->count() > 0)
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 mb-12">
                @foreach($posts as $post)
                    <article class="bg-white rounded-xl shadow-sm hover:shadow-xl transition-all duration-300 overflow-hidden border border-gray-100">
                        @if($post->featured_image)
                            <a href="{{ route('blog.show', $post->slug) }}">
                                <img src="{{ url('storage/' . $post->featured_image) }}"
                                     alt="{{ $post->title }}"
                                     class="w-full h-48 object-cover hover:scale-105 transition-transform duration-300"
                                     onerror="this.style.display='none'">
                            </a>
                        @endif

                        <div class="p-6">
                            <!-- Tags -->
                            @if($post->tags)
                                <div class="flex flex-wrap gap-2 mb-3">
                                    @foreach($post->tags as $tag)
                                        <span class="text-xs px-2.5 py-1 bg-blue-50 text-blue-700 rounded-md font-medium">
                                            {{ $tag }}
                                        </span>
                                    @endforeach
                                </div>
                            @endif

                            <!-- Title -->
                            <h2 class="text-xl font-bold text-gray-900 mb-3 leading-snug">
                                <a href="{{ route('blog.show', $post->slug) }}" class="hover:text-blue-600 transition-colors">
                                    {{ $post->title }}
                                </a>
                            </h2>

                            <!-- Excerpt -->
                            <p class="text-gray-600 text-sm mb-4 line-clamp-3">
                                {{ Str::limit($post->excerpt, 120) }}
                            </p>

                            <!-- Meta -->
                            <div class="flex items-center justify-between text-xs text-gray-500 pt-4 border-t border-gray-100">
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

            <!-- Pagination -->
            <div class="mt-12">
                {{ $posts->links() }}
            </div>
        @else
            <div class="text-center py-12">
                <p class="text-gray-500">No posts published yet. Check back soon!</p>
            </div>
        @endif
    </div>
</x-layout>
