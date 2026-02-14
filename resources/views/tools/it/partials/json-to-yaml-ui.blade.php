{{-- Options Panel --}}
<div class="mb-6 p-4 bg-darkBg rounded-lg border border-gold/10">
    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-4">
        <div>
            <label for="indent-size" class="text-light font-semibold mb-2 block text-sm">{{ __($t . '.indentation') }}</label>
            <select id="indent-size" class="w-full bg-darkCard border border-gold/20 rounded-lg px-3 py-2 text-light text-sm focus:border-gold/50 focus:outline-none cursor-pointer">
                <option value="2">{{ __($t . '.spaces_2') }}</option>
                <option value="4">{{ __($t . '.spaces_4') }}</option>
            </select>
        </div>
        <div class="flex items-end pb-2">
            <label class="flex items-center gap-2 cursor-pointer">
                <input type="checkbox" id="inline-short-arrays" class="w-4 h-4 rounded border-gray-600 bg-darkBg text-gold focus:ring-gold focus:ring-offset-0 cursor-pointer">
                <span class="text-sm text-light-muted">{{ __($t . '.inline_short_arrays') }}</span>
            </label>
        </div>
        <div class="flex items-end pb-2">
            <label class="flex items-center gap-2 cursor-pointer">
                <input type="checkbox" id="quote-strings" class="w-4 h-4 rounded border-gray-600 bg-darkBg text-gold focus:ring-gold focus:ring-offset-0 cursor-pointer">
                <span class="text-sm text-light-muted">{{ __($t . '.quote_all_strings') }}</span>
            </label>
        </div>
    </div>
</div>

{{-- Editor Area --}}
<div class="grid lg:grid-cols-2 gap-4 mb-6">
    {{-- Input --}}
    <div class="flex flex-col">
        <label for="json-input" class="text-light font-semibold mb-2 flex items-center gap-2">
            <svg class="w-4 h-4 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
            {{ __($t . '.json_input') }}
        </label>
        <textarea
            id="json-input"
            class="flex-1 min-h-[350px] bg-darkBg border border-gold/20 rounded-lg p-4 font-mono text-sm text-light placeholder-light-muted/50 focus:border-gold focus:outline-none focus:ring-1 focus:ring-gold/30 resize-none"
            placeholder="{{ __($t . '.input_placeholder') }}"
            spellcheck="false"
        ></textarea>
    </div>

    {{-- Output --}}
    <div class="flex flex-col">
        <label class="text-light font-semibold mb-2 flex items-center gap-2">
            <svg class="w-4 h-4 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path></svg>
            {{ __($t . '.yaml_output') }}
        </label>
        <textarea
            id="yaml-output"
            class="flex-1 min-h-[350px] bg-darkBg border border-gold/20 rounded-lg p-4 font-mono text-sm text-light placeholder-light-muted/50 focus:border-gold focus:outline-none focus:ring-1 focus:ring-gold/30 resize-none"
            placeholder="{{ __($t . '.output_placeholder') }}"
            readonly
            spellcheck="false"
        ></textarea>
    </div>
</div>

{{-- Action Buttons --}}
<div class="flex flex-wrap gap-3 mb-6">
    <button id="btn-convert" class="px-6 py-3 bg-gold text-darkBg font-semibold rounded-lg hover:bg-gold-light transition-all duration-300 flex items-center gap-2 cursor-pointer">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"></path></svg>
        {{ __($t . '.convert_to_yaml') }}
    </button>
    <button id="btn-copy" class="px-4 py-3 border border-gold/50 text-light rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
        {{ __($t . '.copy') }}
    </button>
    <button id="btn-download" class="px-4 py-3 border border-gold/50 text-light rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
        {{ __($t . '.download_yaml') }}
    </button>
    <button id="btn-sample" class="px-4 py-3 border border-gold/50 text-light rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
        {{ __($t . '.sample') }}
    </button>
    <button id="btn-clear" class="px-4 py-3 border border-gold/50 text-light rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
        {{ __($t . '.clear') }}
    </button>
</div>

{{-- Statistics Bar --}}
<div id="stats-bar" class="hidden bg-darkBg rounded-lg p-4 border border-gold/10 mb-6">
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
        <div class="text-center">
            <div id="stat-keys" class="text-2xl font-bold text-gold mb-1">0</div>
            <div class="text-light-muted text-sm">{{ __($t . '.top_level_keys') }}</div>
        </div>
        <div class="text-center">
            <div id="stat-depth" class="text-2xl font-bold text-gold mb-1">0</div>
            <div class="text-light-muted text-sm">{{ __($t . '.max_depth') }}</div>
        </div>
        <div class="text-center">
            <div id="stat-input-size" class="text-2xl font-bold text-light mb-1">0 B</div>
            <div class="text-light-muted text-sm">{{ __($t . '.json_size') }}</div>
        </div>
        <div class="text-center">
            <div id="stat-output-size" class="text-2xl font-bold text-light mb-1">0 B</div>
            <div class="text-light-muted text-sm">{{ __($t . '.yaml_size') }}</div>
        </div>
    </div>
</div>

{{-- Success/Error Notifications --}}
<div id="success-notification" class="hidden p-3 rounded-lg bg-green-500/10 border border-green-500/30">
    <div class="flex items-center gap-2">
        <svg class="w-4 h-4 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
        <span id="success-message" class="text-green-400 text-sm"></span>
    </div>
</div>

<div id="error-notification" class="hidden p-3 rounded-lg bg-red-500/10 border border-red-500/30">
    <div class="flex items-center gap-2">
        <svg class="w-4 h-4 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
        <span id="error-message" class="text-red-400 text-sm"></span>
    </div>
</div>
