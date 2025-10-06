<x-layout>
    <x-slot:title>{{ $post->seo_title ?? $post->title }}</x-slot:title>
    <x-slot:description>{{ $post->seo_description ?? $post->excerpt }}</x-slot:description>

    <article class="max-w-4xl mx-auto px-4 py-16">
        <!-- Breadcrumb -->
        <nav class="text-sm text-gray-500 mb-8">
            <a href="/" class="hover:text-blue-600">Home</a> /
            <a href="/blog" class="hover:text-blue-600">Blog</a> /
            <span class="text-gray-700">{{ $post->title }}</span>
        </nav>

        <!-- Post Header -->
        <header class="mb-12">
            <div class="flex items-center gap-4 text-sm text-gray-500 mb-4">
                <time>{{ $post->published_at->format('M d, Y') }}</time>
                <span>•</span>
                <span>{{ $post->reading_time }} min read</span>
                <span>•</span>
                <span>{{ number_format($post->views) }} views</span>
            </div>

            <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6 leading-tight">
                {{ $post->title }}
            </h1>

            @if($post->excerpt)
                <p class="text-xl text-gray-600 leading-relaxed">
                    {{ $post->excerpt }}
                </p>
            @endif

            <!-- Tags -->
            @if($post->tags)
                <div class="flex flex-wrap gap-2 mt-6">
                    @foreach($post->tags as $tag)
                        <span class="px-3 py-1 bg-blue-100 text-blue-800 rounded-full text-sm">
                            {{ $tag }}
                        </span>
                    @endforeach
                </div>
            @endif
        </header>

        <!-- Featured Image -->
        @if($post->featured_image)
            <img src="{{ url('storage/' . $post->featured_image) }}"
                 alt="{{ $post->title }}"
                 class="w-full rounded-lg mb-12 shadow-lg"
                 onerror="this.style.display='none'">
        @endif

        <!-- Post Content -->
        <div class="prose prose-lg prose-headings:font-bold prose-headings:tracking-tight prose-a:text-blue-600 prose-a:no-underline hover:prose-a:underline prose-code:text-pink-600 prose-code:bg-gray-100 prose-code:px-1.5 prose-code:py-0.5 prose-code:rounded prose-code:before:content-[''] prose-code:after:content-[''] prose-pre:bg-gray-900 prose-pre:text-gray-100 max-w-none mb-16">
            {!! Str::markdown($post->content) !!}
        </div>

        <!-- CTA Box: MOST IMPORTANT FOR FREELANCE LEADS! -->
        <div class="my-16 p-8 bg-blue-50 border-2 border-blue-200 rounded-lg">
            <h3 class="text-2xl font-bold text-gray-900 mb-4">
                Need Help With Your Laravel Project?
            </h3>
            <p class="text-gray-700 mb-6">
                I specialize in building custom Laravel applications, process automation,
                and SaaS development. Whether you need to eliminate repetitive tasks or
                build something from scratch, let's discuss your project.
            </p>
            <div class="flex flex-wrap gap-4">
                <a href="/#contact"
                   class="px-6 py-3 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition">
                    Schedule Free Consultation
                </a>
                <a href="/#portfolio"
                   class="px-6 py-3 border-2 border-blue-600 text-blue-600 font-semibold rounded-lg hover:bg-blue-50 transition">
                    View My Work
                </a>
            </div>
            <p class="text-sm text-gray-600 mt-4">
                ⚡ Currently available for 2-3 new projects
            </p>
        </div>

        <!-- Author Bio -->
        <div class="flex items-start gap-6 p-6 bg-gray-100 rounded-lg">
            <img src="/profile-photo.png"
                 alt="Hafiz Riaz"
                 class="w-20 h-20 rounded-full">
            <div>
                <h4 class="text-gray-900 font-bold text-lg mb-2">About Hafiz Riaz</h4>
                <p class="text-gray-700 mb-4">
                    Full Stack Developer from Turin, Italy. I build web applications with
                    Laravel and Vue.js, and automate business processes. Creator of ReplyGenius,
                    StudyLab, and other SaaS products.
                </p>
                <a href="/" class="text-blue-600 hover:underline">View Portfolio →</a>
            </div>
        </div>

        <!-- Related Posts -->
        @if($relatedPosts->count() > 0)
            <div class="mt-16">
                <h3 class="text-2xl font-bold text-gray-900 mb-8">Related Articles</h3>
                <div class="grid md:grid-cols-3 gap-6">
                    @foreach($relatedPosts as $related)
                        <a href="{{ route('blog.show', $related->slug) }}"
                           class="block p-6 bg-gray-100 rounded-lg hover:bg-gray-200 transition">
                            <h4 class="text-gray-900 font-semibold mb-2">{{ $related->title }}</h4>
                            <p class="text-gray-600 text-sm">{{ Str::limit($related->excerpt, 80) }}</p>
                        </a>
                    @endforeach
                </div>
            </div>
        @endif
    </article>
</x-layout>
