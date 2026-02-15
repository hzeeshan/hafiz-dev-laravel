<div class="grid lg:grid-cols-2 gap-8">
    {{-- Left: Editor --}}
    <div>
        {{-- Presets --}}
        <div class="mb-6">
            <label class="text-light font-semibold text-sm mb-2 block">{{ __($t . '.quick_presets') }}</label>
            <div class="flex flex-wrap gap-2">
                <button class="preset-btn px-3 py-1.5 bg-darkBg border border-gold/20 rounded-lg text-light-muted text-xs hover:border-gold/50 hover:text-gold transition-all cursor-pointer" data-preset="allow-all">{{ __($t . '.allow_all') }}</button>
                <button class="preset-btn px-3 py-1.5 bg-darkBg border border-gold/20 rounded-lg text-light-muted text-xs hover:border-gold/50 hover:text-gold transition-all cursor-pointer" data-preset="block-all">{{ __($t . '.block_all') }}</button>
                <button class="preset-btn px-3 py-1.5 bg-darkBg border border-gold/20 rounded-lg text-light-muted text-xs hover:border-gold/50 hover:text-gold transition-all cursor-pointer" data-preset="wordpress">WordPress</button>
                <button class="preset-btn px-3 py-1.5 bg-darkBg border border-gold/20 rounded-lg text-light-muted text-xs hover:border-gold/50 hover:text-gold transition-all cursor-pointer" data-preset="laravel">Laravel</button>
                <button class="preset-btn px-3 py-1.5 bg-darkBg border border-gold/20 rounded-lg text-light-muted text-xs hover:border-gold/50 hover:text-gold transition-all cursor-pointer" data-preset="block-ai">{{ __($t . '.block_ai') }}</button>
            </div>
        </div>

        {{-- Bot Rules --}}
        <div id="rules-container">
            <div class="rule-block bg-darkBg rounded-lg p-4 border border-gold/10 mb-4" data-index="0">
                <div class="flex items-center justify-between mb-3">
                    <h3 class="text-light font-semibold text-sm">{{ __($t . '.bot_rule') }} #1</h3>
                    <button class="remove-rule text-red-400 hover:text-red-300 text-xs cursor-pointer hidden">✕ {{ __($t . '.remove') }}</button>
                </div>
                <div class="space-y-3">
                    <div>
                        <label class="text-light-muted text-xs mb-1 block">{{ __($t . '.user_agent') }}</label>
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
                        <label class="text-light-muted text-xs mb-1 block">{{ __($t . '.disallow_label') }}</label>
                        <textarea class="rule-disallow w-full bg-darkCard border border-gold/20 rounded-lg px-3 py-2 text-light text-sm font-mono focus:border-gold/50 focus:outline-none resize-none" rows="3" placeholder="/admin/&#10;/private/&#10;/tmp/" spellcheck="false"></textarea>
                    </div>
                    <div>
                        <label class="text-light-muted text-xs mb-1 block">{{ __($t . '.allow_label') }}</label>
                        <textarea class="rule-allow w-full bg-darkCard border border-gold/20 rounded-lg px-3 py-2 text-light text-sm font-mono focus:border-gold/50 focus:outline-none resize-none" rows="2" placeholder="/public/&#10;/api/docs/" spellcheck="false"></textarea>
                    </div>
                    <div>
                        <label class="text-light-muted text-xs mb-1 block">{{ __($t . '.crawl_delay_label') }}</label>
                        <input type="number" class="rule-delay w-32 bg-darkCard border border-gold/20 rounded-lg px-3 py-2 text-light text-sm focus:border-gold/50 focus:outline-none" placeholder="0" min="0" max="60">
                    </div>
                </div>
            </div>
        </div>

        <button id="btn-add-rule" class="w-full py-2 border border-dashed border-gold/30 rounded-lg text-gold text-sm hover:bg-gold/5 transition-all cursor-pointer mb-6">{{ __($t . '.add_rule') }}</button>

        {{-- Sitemap --}}
        <div class="mb-4">
            <label class="text-light font-semibold text-sm mb-2 block">{{ __($t . '.sitemap_urls') }}</label>
            <textarea id="sitemap-urls" class="w-full bg-darkBg border border-gold/20 rounded-lg px-3 py-2 text-light text-sm font-mono focus:border-gold/50 focus:outline-none resize-none" rows="2" placeholder="https://example.com/sitemap.xml" spellcheck="false"></textarea>
        </div>
    </div>

    {{-- Right: Output --}}
    <div>
        <div class="flex items-center justify-between mb-2">
            <h2 class="text-light font-semibold">{{ __($t . '.robots_output') }}</h2>
        </div>
        <textarea
            id="robots-output"
            class="w-full min-h-[400px] bg-darkBg border border-gold/20 rounded-lg p-4 font-mono text-sm text-light placeholder-light-muted/50 focus:border-gold/50 focus:outline-none resize-none"
            readonly
            placeholder="{{ __($t . '.robots_output') }}..."
        ></textarea>

        <div class="flex flex-wrap gap-3 mt-4">
            <button id="btn-copy" class="px-6 py-3 bg-gold text-darkBg font-semibold rounded-lg hover:bg-gold-light transition-all duration-300 flex items-center gap-2 cursor-pointer">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                {{ __($t . '.copy') }}
            </button>
            <button id="btn-download" class="px-4 py-3 border border-gold/50 text-light rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                {{ __($t . '.download_robots') }}
            </button>
        </div>

        {{-- Upload instructions --}}
        <div class="mt-6 p-4 bg-darkBg rounded-lg border border-gold/10">
            <h3 class="text-light font-semibold text-sm mb-2">{{ __($t . '.how_to_install') }}</h3>
            <div class="text-light-muted text-sm space-y-1">
                <p>{{ __($t . '.install_step_1') }}</p>
                <p>{{ __($t . '.install_step_2') }}</p>
                <p>{{ __($t . '.install_step_3') }} <code class="bg-darkCard px-1 rounded text-gold">tuosito.com/robots.txt</code></p>
                <p>{{ __($t . '.install_step_4') }} <a href="https://search.google.com/search-console/robots-testing-tool" target="_blank" class="text-gold hover:underline">{{ __($t . '.google_robots_tool') }}</a></p>
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
