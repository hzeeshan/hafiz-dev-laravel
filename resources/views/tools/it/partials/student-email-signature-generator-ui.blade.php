<div class="grid lg:grid-cols-2 gap-8">
    {{-- Left: Form --}}
    <div>
        <h2 class="text-light font-semibold mb-4 text-lg">{{ __($t . '.your_details') }}</h2>

        {{-- Personal --}}
        <div class="space-y-4 mb-6">
            <div>
                <label for="sig-name" class="text-light text-sm font-medium mb-1 block">{{ __($t . '.full_name') }}</label>
                <input type="text" id="sig-name" class="w-full bg-darkBg border border-gold/20 rounded-lg px-3 py-2 text-light text-sm focus:border-gold/50 focus:outline-none" placeholder="{{ __($t . '.full_name_placeholder') }}" value="Maria Rossi">
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label for="sig-university" class="text-light text-sm font-medium mb-1 block">{{ __($t . '.university') }}</label>
                    <input type="text" id="sig-university" class="w-full bg-darkBg border border-gold/20 rounded-lg px-3 py-2 text-light text-sm focus:border-gold/50 focus:outline-none" placeholder="{{ __($t . '.university_placeholder') }}" value="Università di Bologna">
                </div>
                <div>
                    <label for="sig-major" class="text-light text-sm font-medium mb-1 block">{{ __($t . '.major') }}</label>
                    <input type="text" id="sig-major" class="w-full bg-darkBg border border-gold/20 rounded-lg px-3 py-2 text-light text-sm focus:border-gold/50 focus:outline-none" placeholder="{{ __($t . '.major_placeholder') }}" value="Informatica, Laurea Triennale">
                </div>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label for="sig-grad-year" class="text-light text-sm font-medium mb-1 block">{{ __($t . '.grad_year') }}</label>
                    <input type="text" id="sig-grad-year" class="w-full bg-darkBg border border-gold/20 rounded-lg px-3 py-2 text-light text-sm focus:border-gold/50 focus:outline-none" placeholder="{{ __($t . '.grad_year_placeholder') }}" value="Classe 2026">
                </div>
                <div>
                    <label for="sig-pronouns" class="text-light text-sm font-medium mb-1 block">{{ __($t . '.pronouns') }}</label>
                    <input type="text" id="sig-pronouns" class="w-full bg-darkBg border border-gold/20 rounded-lg px-3 py-2 text-light text-sm focus:border-gold/50 focus:outline-none" placeholder="lei/lei">
                </div>
            </div>
        </div>

        {{-- Contact --}}
        <h3 class="text-light font-semibold mb-3 text-sm">{{ __($t . '.contact_info') }}</h3>
        <div class="space-y-4 mb-6">
            <div>
                <label for="sig-email" class="text-light text-sm font-medium mb-1 block">{{ __($t . '.email') }}</label>
                <input type="email" id="sig-email" class="w-full bg-darkBg border border-gold/20 rounded-lg px-3 py-2 text-light text-sm focus:border-gold/50 focus:outline-none" placeholder="{{ __($t . '.email_placeholder') }}" value="maria.rossi@unibo.it">
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label for="sig-phone" class="text-light text-sm font-medium mb-1 block">{{ __($t . '.phone') }}</label>
                    <input type="text" id="sig-phone" class="w-full bg-darkBg border border-gold/20 rounded-lg px-3 py-2 text-light text-sm focus:border-gold/50 focus:outline-none" placeholder="+39 333 123 4567">
                </div>
                <div>
                    <label for="sig-website" class="text-light text-sm font-medium mb-1 block">{{ __($t . '.website') }}</label>
                    <input type="url" id="sig-website" class="w-full bg-darkBg border border-gold/20 rounded-lg px-3 py-2 text-light text-sm focus:border-gold/50 focus:outline-none" placeholder="https://mariarossi.dev">
                </div>
            </div>
        </div>

        {{-- Social --}}
        <h3 class="text-light font-semibold mb-3 text-sm">{{ __($t . '.social_links') }}</h3>
        <div class="space-y-4 mb-6">
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label for="sig-linkedin" class="text-light text-sm font-medium mb-1 block">LinkedIn</label>
                    <input type="url" id="sig-linkedin" class="w-full bg-darkBg border border-gold/20 rounded-lg px-3 py-2 text-light text-sm focus:border-gold/50 focus:outline-none" placeholder="https://linkedin.com/in/..." value="https://linkedin.com/in/mariarossi">
                </div>
                <div>
                    <label for="sig-github" class="text-light text-sm font-medium mb-1 block">GitHub</label>
                    <input type="url" id="sig-github" class="w-full bg-darkBg border border-gold/20 rounded-lg px-3 py-2 text-light text-sm focus:border-gold/50 focus:outline-none" placeholder="https://github.com/...">
                </div>
            </div>
            <div>
                <label for="sig-twitter" class="text-light text-sm font-medium mb-1 block">Twitter / X</label>
                <input type="url" id="sig-twitter" class="w-full bg-darkBg border border-gold/20 rounded-lg px-3 py-2 text-light text-sm focus:border-gold/50 focus:outline-none" placeholder="https://x.com/...">
            </div>
        </div>

        {{-- Style --}}
        <h3 class="text-light font-semibold mb-3 text-sm">{{ __($t . '.style') }}</h3>
        <div class="mb-4">
            <label class="text-light text-sm font-medium mb-2 block">{{ __($t . '.accent_color') }}</label>
            <div class="flex gap-2 flex-wrap" id="color-picker">
                <button class="color-swatch active" data-color="#2563EB" style="background:#2563EB"></button>
                <button class="color-swatch" data-color="#059669" style="background:#059669"></button>
                <button class="color-swatch" data-color="#7C3AED" style="background:#7C3AED"></button>
                <button class="color-swatch" data-color="#DC2626" style="background:#DC2626"></button>
                <button class="color-swatch" data-color="#D97706" style="background:#D97706"></button>
                <button class="color-swatch" data-color="#0891B2" style="background:#0891B2"></button>
                <button class="color-swatch" data-color="#4F46E5" style="background:#4F46E5"></button>
                <button class="color-swatch" data-color="#334155" style="background:#334155"></button>
            </div>
        </div>
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label for="sig-template" class="text-light text-sm font-medium mb-1 block">{{ __($t . '.template') }}</label>
                <select id="sig-template" class="w-full bg-darkBg border border-gold/20 rounded-lg px-3 py-2 text-light text-sm focus:border-gold/50 focus:outline-none cursor-pointer">
                    <option value="classic">{{ __($t . '.template_classic') }}</option>
                    <option value="modern">{{ __($t . '.template_modern') }}</option>
                    <option value="minimal">{{ __($t . '.template_minimal') }}</option>
                </select>
            </div>
            <div>
                <label for="sig-font" class="text-light text-sm font-medium mb-1 block">{{ __($t . '.font') }}</label>
                <select id="sig-font" class="w-full bg-darkBg border border-gold/20 rounded-lg px-3 py-2 text-light text-sm focus:border-gold/50 focus:outline-none cursor-pointer">
                    <option value="Arial, Helvetica, sans-serif">Arial</option>
                    <option value="Georgia, serif">Georgia</option>
                    <option value="'Trebuchet MS', sans-serif">Trebuchet MS</option>
                    <option value="Verdana, sans-serif">Verdana</option>
                    <option value="Tahoma, sans-serif">Tahoma</option>
                </select>
            </div>
        </div>
    </div>

    {{-- Right: Preview --}}
    <div>
        <h2 class="text-light font-semibold mb-4 text-lg">{{ __($t . '.live_preview') }}</h2>
        <div class="bg-white rounded-lg p-6 min-h-[200px] sig-preview" id="sig-preview"></div>

        <div class="flex flex-wrap gap-3 mt-4">
            <button id="btn-copy-html" class="px-5 py-3 bg-gold text-darkBg font-semibold rounded-lg hover:bg-gold-light transition-all duration-300 flex items-center gap-2 cursor-pointer">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                {{ __($t . '.copy_html') }}
            </button>
            <button id="btn-copy-text" class="px-4 py-3 border border-gold/50 text-light rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                {{ __($t . '.copy_plain_text') }}
            </button>
            <button id="btn-copy-source" class="px-4 py-3 border border-gold/50 text-light rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path></svg>
                {{ __($t . '.copy_source') }}
            </button>
        </div>

        {{-- Instructions --}}
        <div class="mt-6 p-4 bg-darkBg rounded-lg border border-gold/10">
            <h3 class="text-light font-semibold text-sm mb-2">{{ __($t . '.instructions_title') }}</h3>
            <div class="text-light-muted text-sm space-y-2">
                <p><strong class="text-light">Gmail:</strong> {{ __($t . '.instructions_gmail') }}</p>
                <p><strong class="text-light">Outlook:</strong> {{ __($t . '.instructions_outlook') }}</p>
                <p><strong class="text-light">Apple Mail:</strong> {{ __($t . '.instructions_apple') }}</p>
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
