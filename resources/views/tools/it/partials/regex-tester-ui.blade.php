{{-- Regex Input Row --}}
<div class="mb-6">
    <label for="regex-input" class="text-light font-semibold mb-3 block">{{ __($t . '.regular_expression') }}</label>
    <div class="flex flex-wrap gap-4 items-start">
        {{-- Regex Input with delimiters --}}
        <div class="flex-1 min-w-[300px]">
            <div class="flex items-center bg-darkBg border border-gold/20 rounded-lg focus-within:border-gold focus-within:ring-1 focus-within:ring-gold/30">
                <span class="text-gold font-mono text-lg pl-4 select-none">/</span>
                <input
                    type="text"
                    id="regex-input"
                    class="flex-1 bg-transparent border-none py-3 px-2 font-mono text-light placeholder-light-muted/50 focus:outline-none text-sm"
                    placeholder="{{ __($t . '.regex_placeholder') }}"
                    spellcheck="false"
                    autocomplete="off"
                >
                <span class="text-gold font-mono text-lg pr-2 select-none">/</span>
                <span id="flags-display" class="text-gold font-mono pr-4 select-none">g</span>
            </div>
        </div>

        {{-- Flags --}}
        <div class="flex items-center gap-4 py-2">
            <label class="flex items-center gap-2 cursor-pointer">
                <input type="checkbox" id="flag-g" checked class="w-4 h-4 rounded border-gold/30 bg-darkBg text-gold focus:ring-gold focus:ring-offset-darkBg cursor-pointer">
                <span class="text-light-muted text-sm font-mono">g</span>
                <span class="text-light-muted/60 text-xs">{{ __($t . '.flag_global') }}</span>
            </label>
            <label class="flex items-center gap-2 cursor-pointer">
                <input type="checkbox" id="flag-i" class="w-4 h-4 rounded border-gold/30 bg-darkBg text-gold focus:ring-gold focus:ring-offset-darkBg cursor-pointer">
                <span class="text-light-muted text-sm font-mono">i</span>
                <span class="text-light-muted/60 text-xs">{{ __($t . '.flag_case_insensitive') }}</span>
            </label>
            <label class="flex items-center gap-2 cursor-pointer">
                <input type="checkbox" id="flag-m" class="w-4 h-4 rounded border-gold/30 bg-darkBg text-gold focus:ring-gold focus:ring-offset-darkBg cursor-pointer">
                <span class="text-light-muted text-sm font-mono">m</span>
                <span class="text-light-muted/60 text-xs">{{ __($t . '.flag_multiline') }}</span>
            </label>
            <label class="flex items-center gap-2 cursor-pointer">
                <input type="checkbox" id="flag-s" class="w-4 h-4 rounded border-gold/30 bg-darkBg text-gold focus:ring-gold focus:ring-offset-darkBg cursor-pointer">
                <span class="text-light-muted text-sm font-mono">s</span>
                <span class="text-light-muted/60 text-xs">{{ __($t . '.flag_dotall') }}</span>
            </label>
        </div>
    </div>
</div>

{{-- Examples Dropdown --}}
<div class="mb-6">
    <label for="examples-select" class="text-light font-semibold mb-2 block">{{ __($t . '.load_example') }}</label>
    <select id="examples-select" class="bg-darkBg border border-gold/30 text-light rounded-lg px-4 py-2 text-sm focus:border-gold focus:outline-none cursor-pointer max-w-md">
        <option value="">{{ __($t . '.select_pattern') }}</option>
        <option value="email">{{ __($t . '.example_email') }}</option>
        <option value="url">{{ __($t . '.example_url') }}</option>
        <option value="phone">{{ __($t . '.example_phone') }}</option>
        <option value="ipv4">{{ __($t . '.example_ipv4') }}</option>
        <option value="date">{{ __($t . '.example_date') }}</option>
        <option value="html">{{ __($t . '.example_html') }}</option>
        <option value="hex">{{ __($t . '.example_hex') }}</option>
    </select>
</div>

{{-- Test String Input --}}
<div class="mb-6">
    <label for="test-string" class="text-light font-semibold mb-2 flex items-center gap-2">
        <svg class="w-4 h-4 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
        {{ __($t . '.test_string') }}
    </label>
    <textarea
        id="test-string"
        class="w-full min-h-[200px] bg-darkBg border border-gold/20 rounded-lg p-4 font-mono text-sm text-light placeholder-light-muted/50 focus:border-gold focus:outline-none focus:ring-1 focus:ring-gold/30 resize-y"
        placeholder="{{ __($t . '.test_string_placeholder') }}"
        spellcheck="false"
    ></textarea>
</div>

{{-- Results Section --}}
<div class="mb-6">
    <div class="flex items-center justify-between mb-3">
        <label class="text-light font-semibold flex items-center gap-2">
            <svg class="w-4 h-4 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path></svg>
            {{ __($t . '.results') }}
        </label>
        <span id="match-count" class="text-gold font-semibold">0 corrispondenze</span>
    </div>

    {{-- Highlighted Preview --}}
    <div class="bg-darkBg border border-gold/20 rounded-lg p-4 mb-4 min-h-[100px] max-h-[300px] overflow-auto">
        <div id="highlighted-preview" class="font-mono text-sm text-light whitespace-pre-wrap break-words">
            <span class="text-light-muted">{{ __($t . '.js_strings.matches_placeholder') }}</span>
        </div>
    </div>

    {{-- Match Details --}}
    <div id="match-details" class="hidden">
        <label class="text-light font-semibold mb-2 block">{{ __($t . '.match_details') }}</label>
        <div class="bg-darkBg border border-gold/20 rounded-lg overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead>
                        <tr class="border-b border-gold/20">
                            <th class="text-left p-3 text-light-muted font-medium">{{ __($t . '.col_number') }}</th>
                            <th class="text-left p-3 text-light-muted font-medium">{{ __($t . '.col_match') }}</th>
                            <th class="text-left p-3 text-light-muted font-medium">{{ __($t . '.col_position') }}</th>
                            <th class="text-left p-3 text-light-muted font-medium">{{ __($t . '.col_groups') }}</th>
                        </tr>
                    </thead>
                    <tbody id="match-table-body">
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

{{-- Error Display --}}
<div id="error-display" class="hidden mb-6 p-4 rounded-lg bg-red-500/10 border border-red-500/30">
    <div class="flex items-start gap-3">
        <svg class="w-5 h-5 text-red-400 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
        <div>
            <h4 class="text-red-400 font-semibold mb-1">{{ __($t . '.invalid_regex') }}</h4>
            <p id="error-message" class="text-red-300 text-sm font-mono"></p>
        </div>
    </div>
</div>

{{-- Action Buttons --}}
<div class="flex flex-wrap gap-3">
    <button id="btn-copy-regex" class="px-4 py-2 border border-gold/50 text-light-muted rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
        {{ __($t . '.copy_regex') }}
    </button>
    <button id="btn-clear" class="px-4 py-2 border border-gold/50 text-light-muted rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
        {{ __($t . '.clear_all') }}
    </button>
</div>

{{-- Success/Copy Notification --}}
<div id="copy-notification" class="hidden mt-4 p-3 rounded-lg bg-green-500/10 border border-green-500/30">
    <div class="flex items-center gap-2">
        <svg class="w-4 h-4 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
        <span id="copy-message" class="text-green-400 text-sm"></span>
    </div>
</div>
