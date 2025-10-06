<!DOCTYPE html>
<html lang="en" class="scroll-smooth h-full">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Hafiz Riaz - Full Stack Developer' }}</title>

    @if (isset($description))
        <meta name="description" content="{{ $description }}">
    @endif

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-50 text-gray-900 antialiased h-full flex flex-col">
    <!-- Simple Navigation -->
    <nav class="bg-white border-b border-gray-100 sticky top-0 z-50 backdrop-blur-sm bg-white/90">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <a href="/" class="text-xl font-bold text-gray-900 hover:text-blue-600 transition-colors">
                    Hafiz Riaz
                </a>

                <div class="flex items-center gap-8">
                    <a href="/" class="text-gray-600 hover:text-gray-900 font-medium transition-colors">Home</a>
                    <a href="/blog" class="text-gray-600 hover:text-gray-900 font-medium transition-colors">Blog</a>
                    <a href="/#contact" class="px-5 py-2.5 bg-blue-600 text-white rounded-lg hover:bg-blue-700 font-medium transition-all hover:shadow-lg hover:shadow-blue-500/30">
                        Hire Me
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="flex-1">
        {{ $slot }}
    </main>

    <!-- Simple Footer -->
    <footer class="bg-gray-900 text-white mt-20">
        <div class="max-w-7xl mx-auto px-4 py-12 text-center">
            <p class="text-gray-400">
                © {{ date('Y') }} Hafiz Riaz. All rights reserved.
            </p>
        </div>
    </footer>
</body>

</html>
