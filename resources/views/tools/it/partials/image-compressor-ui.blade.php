{{-- Settings Panel --}}
<div class="grid md:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
    {{-- Quality Slider with Presets --}}
    <div class="lg:col-span-2">
        <label class="text-light font-semibold mb-2 block text-sm">{{ __($t . '.quality') }}: <span id="quality-value" class="text-gold">80%</span></label>

        {{-- Quality Preset Buttons --}}
        <div class="flex gap-2 mb-3">
            <button type="button" data-quality="40" class="preset-btn flex-1 px-3 py-2 bg-gray-700 hover:bg-gray-600 border border-gray-600 rounded-lg text-center transition-all duration-200 cursor-pointer">
                <span class="text-light text-sm block">{{ __($t . '.preset_blog') }}</span>
                <span class="text-xs text-light-muted">40%</span>
            </button>
            <button type="button" data-quality="60" class="preset-btn flex-1 px-3 py-2 bg-gray-700 hover:bg-gray-600 border border-gray-600 rounded-lg text-center transition-all duration-200 cursor-pointer">
                <span class="text-light text-sm block">{{ __($t . '.preset_social') }}</span>
                <span class="text-xs text-light-muted">60%</span>
            </button>
            <button type="button" data-quality="85" class="preset-btn flex-1 px-3 py-2 bg-gray-700 hover:bg-gray-600 border border-gray-600 rounded-lg text-center transition-all duration-200 cursor-pointer">
                <span class="text-light text-sm block">{{ __($t . '.preset_high') }}</span>
                <span class="text-xs text-light-muted">85%</span>
            </button>
        </div>

        <input type="range" id="quality-slider" min="1" max="100" value="80" class="w-full h-2 bg-darkBg rounded-lg appearance-none cursor-pointer accent-gold">
        <div class="flex justify-between text-xs text-light-muted mt-1">
            <span>{{ __($t . '.slider_smaller') }}</span>
            <span>{{ __($t . '.slider_higher_quality') }}</span>
        </div>
    </div>

    {{-- Max Width --}}
    <div>
        <label for="max-width" class="text-light font-semibold mb-2 block text-sm">{{ __($t . '.max_width') }}</label>
        <input type="number" id="max-width" placeholder="{{ __($t . '.max_width_placeholder') }}"
               class="w-full bg-darkBg border border-gold/20 rounded-lg px-3 py-2 text-light text-sm focus:border-gold/50 focus:outline-none">
        <p class="text-xs text-light-muted mt-1">{{ __($t . '.max_dimension_hint') }}</p>
    </div>

    {{-- Max Height --}}
    <div>
        <label for="max-height" class="text-light font-semibold mb-2 block text-sm">{{ __($t . '.max_height') }}</label>
        <input type="number" id="max-height" placeholder="{{ __($t . '.max_height_placeholder') }}"
               class="w-full bg-darkBg border border-gold/20 rounded-lg px-3 py-2 text-light text-sm focus:border-gold/50 focus:outline-none">
        <p class="text-xs text-light-muted mt-1">{{ __($t . '.max_dimension_hint') }}</p>
    </div>
</div>

{{-- Second Row: Output Format and Auto-Compress --}}
<div class="flex flex-wrap items-end gap-4 mb-6">
    {{-- Output Format --}}
    <div class="flex-1 min-w-[200px]">
        <label for="output-format" class="text-light font-semibold mb-2 block text-sm">{{ __($t . '.output_format') }}</label>
        <select id="output-format" class="w-full bg-darkBg border border-gold/20 rounded-lg px-3 py-2 text-light text-sm focus:border-gold/50 focus:outline-none cursor-pointer">
            <option value="original">{{ __($t . '.original_format') }}</option>
            <option value="image/jpeg">JPEG</option>
            <option value="image/png">PNG</option>
            <option value="image/webp">WebP</option>
        </select>
    </div>

    {{-- Auto-Compress Toggle --}}
    <div class="flex items-center gap-2 pb-2">
        <input type="checkbox" id="auto-compress"
               class="w-4 h-4 rounded border-gray-600 bg-darkBg text-gold focus:ring-gold focus:ring-offset-0 cursor-pointer">
        <label for="auto-compress" class="text-sm text-light-muted cursor-pointer">
            {{ __($t . '.auto_compress') }}
        </label>
    </div>
</div>

{{-- Drop Zone --}}
<div id="drop-zone" class="border-2 border-dashed border-gold/30 rounded-xl p-8 text-center cursor-pointer hover:border-gold/60 hover:bg-gold/5 transition-all duration-300 mb-4">
    <input type="file" id="file-input" multiple accept="image/jpeg,image/png,image/webp,image/gif" class="hidden">
    <div id="drop-zone-content" class="flex flex-col items-center gap-3">
        <svg class="w-16 h-16 text-gold/50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
        </svg>
        <div>
            <p id="drop-zone-text" class="text-light font-semibold mb-1">{{ __($t . '.drop_text') }}</p>
            <p class="text-light-muted text-sm">{{ __($t . '.supports') }}</p>
        </div>
    </div>
</div>
<p class="text-xs text-light-muted/70 text-center mb-6">
    {{ __($t . '.paste_hint') }}
</p>

{{-- Image Queue --}}
<div id="image-queue" class="hidden mb-6">
    <div class="flex items-center justify-between mb-4">
        <h3 class="text-light font-semibold">{{ __($t . '.images_queue') }}</h3>
        <button id="btn-clear-all" class="text-light-muted hover:text-red-400 text-sm transition-colors flex items-center gap-1 cursor-pointer">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
            {{ __($t . '.clear_all') }}
        </button>
    </div>
    <div id="image-list" class="space-y-3">
        {{-- Images will be added here dynamically --}}
    </div>
</div>

{{-- Action Buttons --}}
<div id="action-buttons" class="hidden flex flex-wrap gap-3 mb-6">
    <button id="btn-compress-all" class="px-6 py-3 bg-gold text-darkBg font-semibold rounded-lg hover:bg-gold-light transition-all duration-300 flex items-center gap-2 cursor-pointer">
        <svg id="compress-icon" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
        <span id="compress-text">{{ __($t . '.compress_all') }}</span>
    </button>
    <button id="btn-download-all" class="px-6 py-3 border border-gold/50 text-light rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer disabled:opacity-50 disabled:cursor-not-allowed" disabled>
        <svg id="download-icon" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3M3 17V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z"></path></svg>
        <span id="download-text">{{ __($t . '.download_all_zip') }}</span>
    </button>
</div>

{{-- Summary Statistics --}}
<div id="summary-stats" class="hidden bg-darkBg rounded-lg p-4 border border-gold/10">
    <h3 class="text-light font-semibold mb-3">{{ __($t . '.compression_summary') }}</h3>
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
        <div class="text-center">
            <div id="stat-total-images" class="text-2xl font-bold text-gold mb-1">0</div>
            <div class="text-light-muted text-sm">{{ __($t . '.stat_images') }}</div>
        </div>
        <div class="text-center">
            <div id="stat-original-size" class="text-2xl font-bold text-light mb-1">0 KB</div>
            <div class="text-light-muted text-sm">{{ __($t . '.stat_original_size') }}</div>
        </div>
        <div class="text-center">
            <div id="stat-compressed-size" class="text-2xl font-bold text-light mb-1">0 KB</div>
            <div class="text-light-muted text-sm">{{ __($t . '.stat_compressed_size') }}</div>
        </div>
        <div class="text-center">
            <div id="stat-total-savings" class="text-2xl font-bold text-green-400 mb-1">0%</div>
            <div class="text-light-muted text-sm">{{ __($t . '.stat_total_savings') }}</div>
        </div>
    </div>
</div>

{{-- Success/Error Notifications --}}
<div id="success-notification" class="hidden mt-4 p-3 rounded-lg bg-green-500/10 border border-green-500/30">
    <div class="flex items-center gap-2">
        <svg class="w-4 h-4 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
        <span id="success-message" class="text-green-400 text-sm"></span>
    </div>
</div>

<div id="error-notification" class="hidden mt-4 p-3 rounded-lg bg-red-500/10 border border-red-500/30">
    <div class="flex items-center gap-2">
        <svg class="w-4 h-4 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
        <span id="error-message" class="text-red-400 text-sm"></span>
    </div>
</div>
