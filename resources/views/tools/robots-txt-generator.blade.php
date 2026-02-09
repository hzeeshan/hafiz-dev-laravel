<x-layout>
    <x-slot:title>Robots.txt Generator - Create Robots.txt File Online Free | hafiz.dev</x-slot:title>
    <x-slot:description>Free online robots.txt generator. Create a robots.txt file for your website with an easy visual editor. Add crawl rules, sitemaps, and crawl delays for search engine bots.</x-slot:description>
    <x-slot:keywords>robots.txt generator, robots txt generator, create robots.txt, robots.txt creator, robots.txt maker, robots.txt file generator</x-slot:keywords>
    <x-slot:canonical>{{ url('/tools/robots-txt-generator') }}</x-slot:canonical>

    <x-slot:ogTitle>Robots.txt Generator - Create Robots.txt File Online Free | hafiz.dev</x-slot:ogTitle>
    <x-slot:ogDescription>Free online robots.txt generator. Build custom robots.txt files with a visual editor for managing search engine crawlers.</x-slot:ogDescription>
    <x-slot:ogType>website</x-slot:ogType>
    <x-slot:ogUrl>{{ url('/tools/robots-txt-generator') }}</x-slot:ogUrl>

    @push('schemas')
        <script type="application/ld+json">
        {
            "@@context": "https://schema.org",
            "@@type": "SoftwareApplication",
            "name": "Robots.txt Generator",
            "description": "Free online robots.txt generator with visual editor.",
            "url": "https://hafiz.dev/tools/robots-txt-generator",
            "applicationCategory": "DeveloperApplication",
            "operatingSystem": "Any",
            "offers": { "@@type": "Offer", "price": "0", "priceCurrency": "USD" },
            "author": { "@@type": "Person", "name": "Hafiz Riaz", "url": "https://hafiz.dev" }
        }
        </script>
        <script type="application/ld+json">
        {
            "@@context": "https://schema.org",
            "@@type": "BreadcrumbList",
            "itemListElement": [
                { "@@type": "ListItem", "position": 1, "name": "Home", "item": "https://hafiz.dev" },
                { "@@type": "ListItem", "position": 2, "name": "Tools", "item": "https://hafiz.dev/tools" },
                { "@@type": "ListItem", "position": 3, "name": "Robots.txt Generator", "item": "https://hafiz.dev/tools/robots-txt-generator" }
            ]
        }
        </script>
        <script type="application/ld+json">
        {
            "@@context": "https://schema.org",
            "@@type": "FAQPage",
            "mainEntity": [
                {
                    "@@type": "Question",
                    "name": "What is a robots.txt file?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "A robots.txt file tells search engine crawlers which pages or sections of your site they can or cannot access. It's placed at the root of your domain (e.g., example.com/robots.txt) and helps control crawling behavior."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "Where do I put my robots.txt file?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Place it at the root directory of your website so it's accessible at yoursite.com/robots.txt. It must be at the domain root — not in a subdirectory. Upload it via FTP, your hosting file manager, or your deployment process."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "Does robots.txt block pages from Google?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Robots.txt prevents crawling, not indexing. If other pages link to a disallowed URL, Google may still index it without crawling its content. To truly block a page from search results, use the noindex meta tag instead."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "What is crawl delay?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Crawl-delay tells bots to wait a specified number of seconds between requests. This prevents server overload from aggressive crawling. Note that Googlebot ignores crawl-delay — use Google Search Console instead."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "Should I add my sitemap to robots.txt?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Yes! Adding a Sitemap directive to robots.txt helps search engines discover your XML sitemap. This is especially useful if you haven't submitted it through Google Search Console or Bing Webmaster Tools."
                    }
                }
            ]
        }
        </script>
    @endpush

    <div class="relative z-10 py-12 px-4">
        <div class="max-w-7xl mx-auto">
            {{-- Breadcrumb --}}
            <nav class="mb-6 text-sm" aria-label="Breadcrumb">
                <ol class="flex items-center gap-2 text-light-muted">
                    <li><a href="/" class="hover:text-gold transition-colors">Home</a></li>
                    <li><span class="text-gold/50">/</span></li>
                    <li><a href="/tools" class="hover:text-gold transition-colors">Tools</a></li>
                    <li><span class="text-gold/50">/</span></li>
                    <li class="text-gold">Robots.txt Generator</li>
                </ol>
            </nav>

            {{-- Header --}}
            <div class="text-center mb-10">
                <h1 class="text-3xl md:text-4xl font-bold text-light mb-4">Robots.txt Generator</h1>
                <p class="text-light-muted max-w-2xl mx-auto">
                    Create a robots.txt file with a visual editor. Add rules for different bots, disallow paths, set crawl delays, and include your sitemap URL.
                </p>
            </div>

            {{-- Main Tool Card --}}
            <div class="bg-gradient-card rounded-xl border border-gold/20 shadow-dark-card p-6 mb-8">

                <x-tool-privacy-banner />

                <div class="grid lg:grid-cols-2 gap-8">
                    {{-- Left: Editor --}}
                    <div>
                        {{-- Presets --}}
                        <div class="mb-6">
                            <label class="text-light font-semibold text-sm mb-2 block">Quick Presets</label>
                            <div class="flex flex-wrap gap-2">
                                <button class="preset-btn px-3 py-1.5 bg-darkBg border border-gold/20 rounded-lg text-light-muted text-xs hover:border-gold/50 hover:text-gold transition-all cursor-pointer" data-preset="allow-all">Allow All</button>
                                <button class="preset-btn px-3 py-1.5 bg-darkBg border border-gold/20 rounded-lg text-light-muted text-xs hover:border-gold/50 hover:text-gold transition-all cursor-pointer" data-preset="block-all">Block All</button>
                                <button class="preset-btn px-3 py-1.5 bg-darkBg border border-gold/20 rounded-lg text-light-muted text-xs hover:border-gold/50 hover:text-gold transition-all cursor-pointer" data-preset="wordpress">WordPress</button>
                                <button class="preset-btn px-3 py-1.5 bg-darkBg border border-gold/20 rounded-lg text-light-muted text-xs hover:border-gold/50 hover:text-gold transition-all cursor-pointer" data-preset="laravel">Laravel</button>
                                <button class="preset-btn px-3 py-1.5 bg-darkBg border border-gold/20 rounded-lg text-light-muted text-xs hover:border-gold/50 hover:text-gold transition-all cursor-pointer" data-preset="block-ai">Block AI Bots</button>
                            </div>
                        </div>

                        {{-- Bot Rules --}}
                        <div id="rules-container">
                            <div class="rule-block bg-darkBg rounded-lg p-4 border border-gold/10 mb-4" data-index="0">
                                <div class="flex items-center justify-between mb-3">
                                    <h3 class="text-light font-semibold text-sm">Bot Rule #1</h3>
                                    <button class="remove-rule text-red-400 hover:text-red-300 text-xs cursor-pointer hidden">✕ Remove</button>
                                </div>
                                <div class="space-y-3">
                                    <div>
                                        <label class="text-light-muted text-xs mb-1 block">User-agent</label>
                                        <select class="rule-agent w-full bg-darkCard border border-gold/20 rounded-lg px-3 py-2 text-light text-sm focus:border-gold/50 focus:outline-none cursor-pointer">
                                            <option value="*">* (All bots)</option>
                                            <option value="Googlebot">Googlebot</option>
                                            <option value="Bingbot">Bingbot</option>
                                            <option value="Googlebot-Image">Googlebot-Image</option>
                                            <option value="Yandex">Yandex</option>
                                            <option value="Baiduspider">Baiduspider</option>
                                            <option value="DuckDuckBot">DuckDuckBot</option>
                                            <option value="Slurp">Slurp (Yahoo)</option>
                                            <option value="facebookexternalhit">Facebook</option>
                                            <option value="Twitterbot">Twitterbot</option>
                                            <option value="GPTBot">GPTBot (OpenAI)</option>
                                            <option value="ChatGPT-User">ChatGPT-User</option>
                                            <option value="CCBot">CCBot (Common Crawl)</option>
                                            <option value="anthropic-ai">Anthropic AI</option>
                                            <option value="ClaudeBot">ClaudeBot</option>
                                            <option value="Google-Extended">Google-Extended (Gemini)</option>
                                            <option value="custom">Custom...</option>
                                        </select>
                                        <input type="text" class="rule-agent-custom w-full bg-darkCard border border-gold/20 rounded-lg px-3 py-2 text-light text-sm mt-2 focus:border-gold/50 focus:outline-none hidden" placeholder="Custom user-agent name">
                                    </div>
                                    <div>
                                        <label class="text-light-muted text-xs mb-1 block">Disallow (paths to block, one per line)</label>
                                        <textarea class="rule-disallow w-full bg-darkCard border border-gold/20 rounded-lg px-3 py-2 text-light text-sm font-mono focus:border-gold/50 focus:outline-none resize-none" rows="3" placeholder="/admin/&#10;/private/&#10;/tmp/" spellcheck="false"></textarea>
                                    </div>
                                    <div>
                                        <label class="text-light-muted text-xs mb-1 block">Allow (paths to explicitly allow)</label>
                                        <textarea class="rule-allow w-full bg-darkCard border border-gold/20 rounded-lg px-3 py-2 text-light text-sm font-mono focus:border-gold/50 focus:outline-none resize-none" rows="2" placeholder="/public/&#10;/api/docs/" spellcheck="false"></textarea>
                                    </div>
                                    <div>
                                        <label class="text-light-muted text-xs mb-1 block">Crawl-delay (seconds)</label>
                                        <input type="number" class="rule-delay w-32 bg-darkCard border border-gold/20 rounded-lg px-3 py-2 text-light text-sm focus:border-gold/50 focus:outline-none" placeholder="0" min="0" max="60">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <button id="btn-add-rule" class="w-full py-2 border border-dashed border-gold/30 rounded-lg text-gold text-sm hover:bg-gold/5 transition-all cursor-pointer mb-6">+ Add Another Bot Rule</button>

                        {{-- Sitemap --}}
                        <div class="mb-4">
                            <label class="text-light font-semibold text-sm mb-2 block">Sitemap URLs (one per line)</label>
                            <textarea id="sitemap-urls" class="w-full bg-darkBg border border-gold/20 rounded-lg px-3 py-2 text-light text-sm font-mono focus:border-gold/50 focus:outline-none resize-none" rows="2" placeholder="https://example.com/sitemap.xml" spellcheck="false"></textarea>
                        </div>
                    </div>

                    {{-- Right: Output --}}
                    <div>
                        <div class="flex items-center justify-between mb-2">
                            <h2 class="text-light font-semibold">robots.txt Output</h2>
                        </div>
                        <textarea
                            id="robots-output"
                            class="w-full min-h-[400px] bg-darkBg border border-gold/20 rounded-lg p-4 font-mono text-sm text-light placeholder-light-muted/50 focus:border-gold/50 focus:outline-none resize-none"
                            readonly
                            placeholder="Your robots.txt content will appear here..."
                        ></textarea>

                        <div class="flex flex-wrap gap-3 mt-4">
                            <button id="btn-copy" class="px-6 py-3 bg-gold text-darkBg font-semibold rounded-lg hover:bg-gold-light transition-all duration-300 flex items-center gap-2 cursor-pointer">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                                Copy
                            </button>
                            <button id="btn-download" class="px-4 py-3 border border-gold/50 text-light rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                                Download robots.txt
                            </button>
                        </div>

                        {{-- Upload instructions --}}
                        <div class="mt-6 p-4 bg-darkBg rounded-lg border border-gold/10">
                            <h3 class="text-light font-semibold text-sm mb-2">How to install</h3>
                            <div class="text-light-muted text-sm space-y-1">
                                <p>1. Download or copy the robots.txt content</p>
                                <p>2. Upload to your website's root directory</p>
                                <p>3. Verify at <code class="bg-darkCard px-1 rounded text-gold">yoursite.com/robots.txt</code></p>
                                <p>4. Test with <a href="https://search.google.com/search-console/robots-testing-tool" target="_blank" class="text-gold hover:underline">Google's Robots Testing Tool</a></p>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Notifications --}}
                <div id="success-notification" class="hidden mt-4 p-3 rounded-lg bg-green-500/10 border border-green-500/30">
                    <div class="flex items-center gap-2">
                        <svg class="w-4 h-4 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        <span id="success-message" class="text-green-400 text-sm"></span>
                    </div>
                </div>
            </div>

            {{-- Related Tools --}}
            <x-related-tools :tool="$tool" />

            {{-- Features Section --}}
            <div class="grid md:grid-cols-3 gap-6 mb-12">
                <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card">
                    <div class="text-gold text-2xl mb-3">🤖</div>
                    <h3 class="text-lg font-semibold text-light mb-2">Multiple Bot Rules</h3>
                    <p class="text-light-muted text-sm">Create separate rules for different search engines and bots. Control Google, Bing, AI crawlers, and social media bots independently.</p>
                </div>
                <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card">
                    <div class="text-gold text-2xl mb-3">⚡</div>
                    <h3 class="text-lg font-semibold text-light mb-2">Quick Presets</h3>
                    <p class="text-light-muted text-sm">One-click presets for WordPress, Laravel, allow-all, block-all, and blocking AI training bots. Start with a preset, then customize as needed.</p>
                </div>
                <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card">
                    <div class="text-gold text-2xl mb-3">🗺️</div>
                    <h3 class="text-lg font-semibold text-light mb-2">Sitemap Support</h3>
                    <p class="text-light-muted text-sm">Include one or more sitemap URLs to help search engines discover all your pages. Supports multiple sitemaps for large sites.</p>
                </div>
            </div>

            {{-- Dynamic CTA --}}
            <x-tool-cta />

            {{-- FAQ Section --}}
            <div class="bg-gradient-card rounded-xl border border-gold/20 shadow-dark-card p-8">
                <h2 class="text-2xl font-bold text-light mb-6 text-center">Frequently Asked Questions</h2>
                <div class="space-y-4 max-w-3xl mx-auto">
                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">What is a robots.txt file?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">A robots.txt file tells search engine crawlers which pages they can or cannot access on your site. It lives at the root of your domain (e.g., example.com/robots.txt) and uses simple directives to control crawling.</div>
                    </details>
                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">Where do I put my robots.txt file?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">Place it at the root of your website so it's at yoursite.com/robots.txt. Upload via FTP, your hosting control panel, or include it in your deployment. For Laravel, place it in the <code class="bg-darkCard px-1 rounded">public/</code> directory.</div>
                    </details>
                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">Does robots.txt block pages from appearing in Google?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">Not completely. Robots.txt prevents crawling, but Google can still index the URL if other pages link to it. To fully prevent indexing, use the <code class="bg-darkCard px-1 rounded">noindex</code> meta tag or X-Robots-Tag header instead.</div>
                    </details>
                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">What is crawl delay?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">Crawl-delay tells bots to wait X seconds between requests to prevent overloading your server. Bing and Yandex respect it, but Googlebot ignores it — use Google Search Console's crawl rate settings instead.</div>
                    </details>
                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">Should I add my sitemap to robots.txt?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">Yes! Adding a Sitemap directive helps search engines discover your XML sitemap faster. This is especially useful if you haven't manually submitted it through Google Search Console or Bing Webmaster Tools.</div>
                    </details>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
    (function() {
        const rulesContainer = document.getElementById('rules-container');
        const robotsOutput = document.getElementById('robots-output');
        const sitemapUrls = document.getElementById('sitemap-urls');
        const btnAddRule = document.getElementById('btn-add-rule');
        const btnCopy = document.getElementById('btn-copy');
        const btnDownload = document.getElementById('btn-download');
        const successNotification = document.getElementById('success-notification');
        const successMessage = document.getElementById('success-message');

        let ruleIndex = 1;

        const presets = {
            'allow-all': {
                rules: [{ agent: '*', disallow: '', allow: '/', delay: '' }],
                sitemap: ''
            },
            'block-all': {
                rules: [{ agent: '*', disallow: '/', allow: '', delay: '' }],
                sitemap: ''
            },
            'wordpress': {
                rules: [{ agent: '*', disallow: '/wp-admin/\n/wp-includes/\n/wp-content/plugins/\n/trackback/\n/feed/\n/comments/\n/?s=\n/search/', allow: '/wp-admin/admin-ajax.php', delay: '' }],
                sitemap: 'https://example.com/sitemap.xml'
            },
            'laravel': {
                rules: [{ agent: '*', disallow: '/admin/\n/storage/\n/vendor/\n/_debugbar/\n/telescope/\n/horizon/', allow: '/', delay: '' }],
                sitemap: 'https://example.com/sitemap.xml'
            },
            'block-ai': {
                rules: [
                    { agent: '*', disallow: '', allow: '/', delay: '' },
                    { agent: 'GPTBot', disallow: '/', allow: '', delay: '' },
                    { agent: 'ChatGPT-User', disallow: '/', allow: '', delay: '' },
                    { agent: 'CCBot', disallow: '/', allow: '', delay: '' },
                    { agent: 'Google-Extended', disallow: '/', allow: '', delay: '' },
                    { agent: 'anthropic-ai', disallow: '/', allow: '', delay: '' },
                    { agent: 'ClaudeBot', disallow: '/', allow: '', delay: '' }
                ],
                sitemap: ''
            }
        };

        function createRuleBlock(data) {
            const idx = ruleIndex++;
            const block = document.createElement('div');
            block.className = 'rule-block bg-darkBg rounded-lg p-4 border border-gold/10 mb-4';
            block.dataset.index = idx;

            const isCustom = data && data.agent && !['*','Googlebot','Bingbot','Googlebot-Image','Yandex','Baiduspider','DuckDuckBot','Slurp','facebookexternalhit','Twitterbot','GPTBot','ChatGPT-User','CCBot','anthropic-ai','ClaudeBot','Google-Extended'].includes(data.agent);

            block.innerHTML = `
                <div class="flex items-center justify-between mb-3">
                    <h3 class="text-light font-semibold text-sm">Bot Rule #${idx + 1}</h3>
                    <button class="remove-rule text-red-400 hover:text-red-300 text-xs cursor-pointer">✕ Remove</button>
                </div>
                <div class="space-y-3">
                    <div>
                        <label class="text-light-muted text-xs mb-1 block">User-agent</label>
                        <select class="rule-agent w-full bg-darkCard border border-gold/20 rounded-lg px-3 py-2 text-light text-sm focus:border-gold/50 focus:outline-none cursor-pointer">
                            <option value="*" ${(!data || data.agent === '*') ? 'selected' : ''}>* (All bots)</option>
                            <option value="Googlebot" ${data && data.agent === 'Googlebot' ? 'selected' : ''}>Googlebot</option>
                            <option value="Bingbot" ${data && data.agent === 'Bingbot' ? 'selected' : ''}>Bingbot</option>
                            <option value="Googlebot-Image" ${data && data.agent === 'Googlebot-Image' ? 'selected' : ''}>Googlebot-Image</option>
                            <option value="Yandex" ${data && data.agent === 'Yandex' ? 'selected' : ''}>Yandex</option>
                            <option value="Baiduspider" ${data && data.agent === 'Baiduspider' ? 'selected' : ''}>Baiduspider</option>
                            <option value="DuckDuckBot" ${data && data.agent === 'DuckDuckBot' ? 'selected' : ''}>DuckDuckBot</option>
                            <option value="Slurp" ${data && data.agent === 'Slurp' ? 'selected' : ''}>Slurp (Yahoo)</option>
                            <option value="facebookexternalhit" ${data && data.agent === 'facebookexternalhit' ? 'selected' : ''}>Facebook</option>
                            <option value="Twitterbot" ${data && data.agent === 'Twitterbot' ? 'selected' : ''}>Twitterbot</option>
                            <option value="GPTBot" ${data && data.agent === 'GPTBot' ? 'selected' : ''}>GPTBot (OpenAI)</option>
                            <option value="ChatGPT-User" ${data && data.agent === 'ChatGPT-User' ? 'selected' : ''}>ChatGPT-User</option>
                            <option value="CCBot" ${data && data.agent === 'CCBot' ? 'selected' : ''}>CCBot (Common Crawl)</option>
                            <option value="anthropic-ai" ${data && data.agent === 'anthropic-ai' ? 'selected' : ''}>Anthropic AI</option>
                            <option value="ClaudeBot" ${data && data.agent === 'ClaudeBot' ? 'selected' : ''}>ClaudeBot</option>
                            <option value="Google-Extended" ${data && data.agent === 'Google-Extended' ? 'selected' : ''}>Google-Extended (Gemini)</option>
                            <option value="custom" ${isCustom ? 'selected' : ''}>Custom...</option>
                        </select>
                        <input type="text" class="rule-agent-custom w-full bg-darkCard border border-gold/20 rounded-lg px-3 py-2 text-light text-sm mt-2 focus:border-gold/50 focus:outline-none ${isCustom ? '' : 'hidden'}" placeholder="Custom user-agent name" value="${isCustom ? data.agent : ''}">
                    </div>
                    <div>
                        <label class="text-light-muted text-xs mb-1 block">Disallow (paths to block, one per line)</label>
                        <textarea class="rule-disallow w-full bg-darkCard border border-gold/20 rounded-lg px-3 py-2 text-light text-sm font-mono focus:border-gold/50 focus:outline-none resize-none" rows="3" placeholder="/admin/&#10;/private/" spellcheck="false">${data ? data.disallow : ''}</textarea>
                    </div>
                    <div>
                        <label class="text-light-muted text-xs mb-1 block">Allow (paths to explicitly allow)</label>
                        <textarea class="rule-allow w-full bg-darkCard border border-gold/20 rounded-lg px-3 py-2 text-light text-sm font-mono focus:border-gold/50 focus:outline-none resize-none" rows="2" placeholder="/public/" spellcheck="false">${data ? data.allow : ''}</textarea>
                    </div>
                    <div>
                        <label class="text-light-muted text-xs mb-1 block">Crawl-delay (seconds)</label>
                        <input type="number" class="rule-delay w-32 bg-darkCard border border-gold/20 rounded-lg px-3 py-2 text-light text-sm focus:border-gold/50 focus:outline-none" placeholder="0" min="0" max="60" value="${data ? data.delay : ''}">
                    </div>
                </div>
            `;

            return block;
        }

        function generate() {
            const blocks = rulesContainer.querySelectorAll('.rule-block');
            let output = '# robots.txt generated by hafiz.dev/tools/robots-txt-generator\n\n';

            blocks.forEach((block, i) => {
                const agentSelect = block.querySelector('.rule-agent');
                const agentCustom = block.querySelector('.rule-agent-custom');
                let agent = agentSelect.value;
                if (agent === 'custom') agent = agentCustom.value.trim() || '*';

                const disallowText = block.querySelector('.rule-disallow').value.trim();
                const allowText = block.querySelector('.rule-allow').value.trim();
                const delay = block.querySelector('.rule-delay').value.trim();

                output += 'User-agent: ' + agent + '\n';

                if (allowText) {
                    allowText.split('\n').forEach(p => {
                        p = p.trim();
                        if (p) output += 'Allow: ' + p + '\n';
                    });
                }

                if (disallowText) {
                    disallowText.split('\n').forEach(p => {
                        p = p.trim();
                        if (p) output += 'Disallow: ' + p + '\n';
                    });
                } else {
                    output += 'Disallow:\n';
                }

                if (delay && parseInt(delay) > 0) {
                    output += 'Crawl-delay: ' + delay + '\n';
                }

                if (i < blocks.length - 1) output += '\n';
            });

            // Sitemaps
            const sitemaps = sitemapUrls.value.trim();
            if (sitemaps) {
                output += '\n';
                sitemaps.split('\n').forEach(url => {
                    url = url.trim();
                    if (url) output += 'Sitemap: ' + url + '\n';
                });
            }

            robotsOutput.value = output;
        }

        function applyPreset(name) {
            const preset = presets[name];
            if (!preset) return;

            rulesContainer.innerHTML = '';
            ruleIndex = 0;

            // First rule uses the existing initial block pattern
            preset.rules.forEach((rule, i) => {
                if (i === 0) {
                    // Reuse first block
                    const block = createRuleBlock(rule);
                    block.querySelector('.remove-rule').classList.add('hidden');
                    rulesContainer.appendChild(block);
                } else {
                    rulesContainer.appendChild(createRuleBlock(rule));
                }
            });

            sitemapUrls.value = preset.sitemap || '';
            generate();
        }

        function showSuccess(msg) {
            successMessage.textContent = msg;
            successNotification.classList.remove('hidden');
            setTimeout(() => successNotification.classList.add('hidden'), 3000);
        }

        // Events
        btnAddRule.addEventListener('click', function() {
            rulesContainer.appendChild(createRuleBlock(null));
            generate();
        });

        rulesContainer.addEventListener('click', function(e) {
            if (e.target.closest('.remove-rule')) {
                const block = e.target.closest('.rule-block');
                if (rulesContainer.children.length > 1) {
                    block.remove();
                    generate();
                }
            }
        });

        rulesContainer.addEventListener('change', function(e) {
            if (e.target.classList.contains('rule-agent')) {
                const custom = e.target.closest('.rule-block').querySelector('.rule-agent-custom');
                if (e.target.value === 'custom') {
                    custom.classList.remove('hidden');
                    custom.focus();
                } else {
                    custom.classList.add('hidden');
                }
            }
            generate();
        });

        rulesContainer.addEventListener('input', function() { generate(); });
        sitemapUrls.addEventListener('input', function() { generate(); });

        document.querySelectorAll('.preset-btn').forEach(btn => {
            btn.addEventListener('click', function() { applyPreset(this.dataset.preset); });
        });

        btnCopy.addEventListener('click', function() {
            const output = robotsOutput.value;
            if (!output) return;
            navigator.clipboard.writeText(output).then(() => {
                const orig = this.innerHTML;
                this.innerHTML = '<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> Copied!';
                this.classList.add('bg-green-600');
                setTimeout(() => { this.innerHTML = orig; this.classList.remove('bg-green-600'); }, 2000);
            });
        });

        btnDownload.addEventListener('click', function() {
            const output = robotsOutput.value;
            if (!output) return;
            const blob = new Blob([output], { type: 'text/plain;charset=utf-8' });
            const url = URL.createObjectURL(blob);
            const a = document.createElement('a');
            a.href = url; a.download = 'robots.txt';
            document.body.appendChild(a); a.click();
            document.body.removeChild(a); URL.revokeObjectURL(url);
            showSuccess('robots.txt downloaded');
        });

        // Initial generate
        generate();
    })();
    </script>
    @endpush
</x-layout>
