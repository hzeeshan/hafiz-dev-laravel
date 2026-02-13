{{-- Direction Toggle --}}
<div class="flex justify-center mb-6">
    <div class="inline-flex rounded-lg bg-darkBg p-1 border border-gold/20">
        <button id="json-to-csv-tab" class="px-6 py-2.5 rounded-md font-semibold transition-all duration-200 cursor-pointer bg-gold text-darkBg">
            {{ __($t . '.json_to_csv_tab') }}
        </button>
        <button id="csv-to-json-tab" class="px-6 py-2.5 rounded-md font-semibold transition-all duration-200 cursor-pointer text-light-muted hover:text-light">
            {{ __($t . '.csv_to_json_tab') }}
        </button>
    </div>
</div>

{{-- Options Panel --}}
<div class="mb-6 p-4 bg-darkBg rounded-lg border border-gold/10">
    {{-- JSON to CSV Options --}}
    <div id="json-to-csv-options" class="grid sm:grid-cols-2 lg:grid-cols-4 gap-4">
        <div>
            <label for="delimiter-json" class="text-light font-semibold mb-2 block text-sm">{{ __($t . '.delimiter') }}</label>
            <select id="delimiter-json" class="w-full bg-darkCard border border-gold/20 rounded-lg px-3 py-2 text-light text-sm focus:border-gold/50 focus:outline-none cursor-pointer">
                <option value=",">{{ __($t . '.comma') }}</option>
                <option value=";">{{ __($t . '.semicolon') }}</option>
                <option value="&#9;">{{ __($t . '.tab') }}</option>
                <option value="|">{{ __($t . '.pipe') }}</option>
            </select>
        </div>
        <div class="flex items-end pb-2">
            <label class="flex items-center gap-2 cursor-pointer">
                <input type="checkbox" id="include-headers" checked class="w-4 h-4 rounded border-gray-600 bg-darkBg text-gold focus:ring-gold focus:ring-offset-0 cursor-pointer">
                <span class="text-sm text-light-muted">{{ __($t . '.include_headers') }}</span>
            </label>
        </div>
        <div class="flex items-end pb-2">
            <label class="flex items-center gap-2 cursor-pointer">
                <input type="checkbox" id="flatten-nested" checked class="w-4 h-4 rounded border-gray-600 bg-darkBg text-gold focus:ring-gold focus:ring-offset-0 cursor-pointer">
                <span class="text-sm text-light-muted">{{ __($t . '.flatten_nested') }}</span>
            </label>
        </div>
        <div>
            <label for="array-handling" class="text-light font-semibold mb-2 block text-sm">{{ __($t . '.array_handling') }}</label>
            <select id="array-handling" class="w-full bg-darkCard border border-gold/20 rounded-lg px-3 py-2 text-light text-sm focus:border-gold/50 focus:outline-none cursor-pointer">
                <option value="stringify">{{ __($t . '.stringify') }}</option>
                <option value="join">{{ __($t . '.join_semicolon') }}</option>
            </select>
        </div>
    </div>

    {{-- CSV to JSON Options --}}
    <div id="csv-to-json-options" class="hidden grid sm:grid-cols-2 lg:grid-cols-4 gap-4">
        <div>
            <label for="delimiter-csv" class="text-light font-semibold mb-2 block text-sm">{{ __($t . '.delimiter') }}</label>
            <select id="delimiter-csv" class="w-full bg-darkCard border border-gold/20 rounded-lg px-3 py-2 text-light text-sm focus:border-gold/50 focus:outline-none cursor-pointer">
                <option value="auto">{{ __($t . '.auto_detect') }}</option>
                <option value=",">{{ __($t . '.comma') }}</option>
                <option value=";">{{ __($t . '.semicolon') }}</option>
                <option value="&#9;">{{ __($t . '.tab') }}</option>
                <option value="|">{{ __($t . '.pipe') }}</option>
            </select>
        </div>
        <div class="flex items-end pb-2">
            <label class="flex items-center gap-2 cursor-pointer">
                <input type="checkbox" id="first-row-header" checked class="w-4 h-4 rounded border-gray-600 bg-darkBg text-gold focus:ring-gold focus:ring-offset-0 cursor-pointer">
                <span class="text-sm text-light-muted">{{ __($t . '.first_row_header') }}</span>
            </label>
        </div>
        <div class="flex items-end pb-2">
            <label class="flex items-center gap-2 cursor-pointer">
                <input type="checkbox" id="parse-numbers" checked class="w-4 h-4 rounded border-gray-600 bg-darkBg text-gold focus:ring-gold focus:ring-offset-0 cursor-pointer">
                <span class="text-sm text-light-muted">{{ __($t . '.parse_numbers') }}</span>
            </label>
        </div>
        <div class="flex items-end pb-2">
            <label class="flex items-center gap-2 cursor-pointer">
                <input type="checkbox" id="parse-booleans" checked class="w-4 h-4 rounded border-gray-600 bg-darkBg text-gold focus:ring-gold focus:ring-offset-0 cursor-pointer">
                <span class="text-sm text-light-muted">{{ __($t . '.parse_booleans') }}</span>
            </label>
        </div>
    </div>
</div>

{{-- Editor Area --}}
<div class="grid lg:grid-cols-2 gap-4 mb-6">
    {{-- Input --}}
    <div class="flex flex-col">
        <label for="data-input" class="text-light font-semibold mb-2 flex items-center gap-2">
            <svg class="w-4 h-4 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
            <span id="input-label">{{ __($t . '.json_input') }}</span>
        </label>
        <textarea
            id="data-input"
            class="flex-1 min-h-[350px] bg-darkBg border border-gold/20 rounded-lg p-4 font-mono text-sm text-light placeholder-light-muted/50 focus:border-gold focus:outline-none focus:ring-1 focus:ring-gold/30 resize-none"
            placeholder="{{ __($t . '.paste_json') }}"
            spellcheck="false"
        ></textarea>
    </div>

    {{-- Output --}}
    <div class="flex flex-col">
        <label class="text-light font-semibold mb-2 flex items-center gap-2">
            <svg class="w-4 h-4 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path></svg>
            <span id="output-label">{{ __($t . '.csv_output') }}</span>
        </label>
        {{-- CSV Output (textarea) --}}
        <textarea
            id="data-output-csv"
            class="flex-1 min-h-[350px] bg-darkBg border border-gold/20 rounded-lg p-4 font-mono text-sm text-light placeholder-light-muted/50 focus:border-gold focus:outline-none focus:ring-1 focus:ring-gold/30 resize-none"
            placeholder="{{ __($t . '.output_placeholder') }}"
            readonly
            spellcheck="false"
        ></textarea>
        {{-- JSON Output (syntax highlighted) --}}
        <div id="data-output-json" class="hidden flex-1 min-h-[350px] bg-darkBg border border-gold/20 rounded-lg p-4 font-mono text-sm overflow-auto">
            <pre id="output-pre" class="whitespace-pre-wrap break-words"><code id="output-code" class="text-light-muted">{{ __($t . '.output_placeholder') }}</code></pre>
        </div>
    </div>
</div>

{{-- Action Buttons --}}
<div class="flex flex-wrap gap-3 mb-6">
    <button id="btn-convert" class="px-6 py-3 bg-gold text-darkBg font-semibold rounded-lg hover:bg-gold-light transition-all duration-300 flex items-center gap-2 cursor-pointer">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"></path></svg>
        <span id="convert-text">{{ __($t . '.convert_to_csv') }}</span>
    </button>
    <button id="btn-copy" class="px-4 py-3 border border-gold/50 text-light rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
        {{ __($t . '.copy') }}
    </button>
    <button id="btn-download" class="px-4 py-3 border border-gold/50 text-light rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
        {{ __($t . '.download') }}
    </button>
    <button id="btn-swap" class="px-4 py-3 border border-gold/50 text-light rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4"></path></svg>
        {{ __($t . '.swap') }}
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
            <div id="stat-rows" class="text-2xl font-bold text-gold mb-1">0</div>
            <div class="text-light-muted text-sm">{{ __($t . '.rows') }}</div>
        </div>
        <div class="text-center">
            <div id="stat-columns" class="text-2xl font-bold text-gold mb-1">0</div>
            <div class="text-light-muted text-sm">{{ __($t . '.columns') }}</div>
        </div>
        <div class="text-center">
            <div id="stat-input-size" class="text-2xl font-bold text-light mb-1">0 B</div>
            <div class="text-light-muted text-sm">{{ __($t . '.input_size') }}</div>
        </div>
        <div class="text-center">
            <div id="stat-output-size" class="text-2xl font-bold text-light mb-1">0 B</div>
            <div class="text-light-muted text-sm">{{ __($t . '.output_size') }}</div>
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
