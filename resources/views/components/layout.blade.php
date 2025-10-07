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
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gradient-dark text-light antialiased h-full flex flex-col relative overflow-x-hidden">
    <!-- Background Pattern -->
    <div class="fixed top-0 left-0 w-full h-full pointer-events-none z-0"
        style="background-image: radial-gradient(circle at 20% 50%, rgba(201, 170, 113, 0.03) 0%, transparent 50%), radial-gradient(circle at 80% 20%, rgba(201, 170, 113, 0.03) 0%, transparent 50%), radial-gradient(circle at 40% 80%, rgba(201, 170, 113, 0.02) 0%, transparent 50%);">
    </div>

    <!-- Dark Navigation -->
    <nav class="bg-darkCard/80 border-b border-gold/10 sticky top-0 z-50 backdrop-blur-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <a href="/"
                    class="text-xl font-bold text-light hover:text-gold transition-colors duration-300 flex items-center gap-2">
                    <span class="text-gold">&lt;/&gt;</span>
                    <span>hafiz.dev</span>
                </a>

                <div class="flex items-center gap-8">
                    <a href="/"
                        class="text-light-muted hover:text-light font-medium transition-colors duration-300">Home</a>
                    <a href="/#services"
                        class="text-light-muted hover:text-light font-medium transition-colors duration-300">Services</a>
                    <a href="/#portfolio"
                        class="text-light-muted hover:text-light font-medium transition-colors duration-300">Portfolio</a>
                    <a href="/blog"
                        class="text-light-muted hover:text-light font-medium transition-colors duration-300">Blog</a>
                    <a href="/#contact"
                        class="px-5 py-2.5 bg-gold text-darkBg rounded-lg hover:bg-gold-light font-semibold transition-all duration-300 hover:shadow-gold-glow hover:-translate-y-0.5">
                        Contact
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="flex-1">
        {{ $slot }}
    </main>

    <!-- Dark Footer -->
    <footer class="bg-darkCard/60 border-t border-gold/10 mt-20 relative z-10">
        <div class="max-w-7xl mx-auto px-4 py-5">
            <div class="text-center">
                <p class="text-light-muted mb-2">
                    © {{ date('Y') }} Hafiz Riaz. All rights reserved.
                </p>
                {{-- <p class="text-sm text-gold">
                    Available for Laravel projects worldwide
                </p> --}}
            </div>
        </div>
    </footer>
</body>

</html>
