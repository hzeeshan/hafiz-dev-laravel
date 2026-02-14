{{-- Text to ASCII Converter --}}
<h2 class="text-lg font-semibold text-light mb-4 flex items-center gap-2">
    <svg class="w-5 h-5 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"></path></svg>
    {{ __($t . '.text_ascii_converter') }}
</h2>

<div class="grid lg:grid-cols-2 gap-4 mb-4">
    <div>
        <label for="text-input" class="text-light font-semibold mb-2 block text-sm">{{ __($t . '.text_input') }}</label>
        <textarea
            id="text-input"
            class="w-full h-28 bg-darkBg border border-gold/20 rounded-lg p-3 font-mono text-sm text-light placeholder-light-muted/50 focus:border-gold focus:outline-none focus:ring-1 focus:ring-gold/30 resize-none"
            placeholder="{{ __($t . '.text_input_placeholder') }}"
            spellcheck="false"
        ></textarea>
    </div>
    <div>
        <div class="flex items-center justify-between mb-2">
            <label class="text-light font-semibold text-sm">{{ __($t . '.ascii_output') }}</label>
            <select id="output-format" class="bg-darkBg border border-gold/20 rounded px-2 py-1 text-xs text-light focus:border-gold/50 focus:outline-none cursor-pointer">
                <option value="decimal">{{ __($t . '.decimal') }}</option>
                <option value="hex">{{ __($t . '.hexadecimal') }}</option>
                <option value="binary">{{ __($t . '.binary') }}</option>
                <option value="octal">{{ __($t . '.octal') }}</option>
                <option value="html">{{ __($t . '.html_entity') }}</option>
            </select>
        </div>
        <textarea
            id="ascii-output"
            class="w-full h-28 bg-darkBg border border-gold/20 rounded-lg p-3 font-mono text-sm text-light placeholder-light-muted/50 focus:border-gold/50 focus:outline-none resize-none"
            placeholder="{{ __($t . '.ascii_output_placeholder') }}"
            readonly
        ></textarea>
    </div>
</div>

<div class="flex flex-wrap gap-3 mb-6">
    <button id="btn-copy-ascii" class="px-4 py-2 border border-gold/50 text-light rounded-lg hover:bg-gold/10 hover:text-gold transition-all text-sm flex items-center gap-2 cursor-pointer">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
        {{ __($t . '.copy_output') }}
    </button>
    <button id="btn-swap" class="px-4 py-2 border border-gold/50 text-light rounded-lg hover:bg-gold/10 hover:text-gold transition-all text-sm flex items-center gap-2 cursor-pointer">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4"></path></svg>
        {{ __($t . '.swap') }}
    </button>
    <button id="btn-clear-converter" class="px-4 py-2 border border-gold/50 text-light rounded-lg hover:bg-gold/10 hover:text-gold transition-all text-sm flex items-center gap-2 cursor-pointer">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
        {{ __($t . '.clear') }}
    </button>
</div>

{{-- ASCII Table --}}
<h2 class="text-lg font-semibold text-light mb-4 flex items-center gap-2">
    <svg class="w-5 h-5 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M3 14h18m-9-4v8m-7 0h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
    {{ __($t . '.complete_ascii_table') }}
</h2>

{{-- Filters --}}
<div class="mb-4 flex flex-wrap gap-3 items-center">
    <div class="relative flex-1 min-w-[200px] max-w-sm">
        <svg class="w-4 h-4 absolute left-3 top-1/2 -translate-y-1/2 text-light-muted" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
        <input
            type="text"
            id="table-search"
            class="w-full bg-darkBg border border-gold/20 rounded-lg pl-10 pr-4 py-2 text-sm text-light placeholder-light-muted/50 focus:border-gold focus:outline-none"
            placeholder="{{ __($t . '.search_placeholder') }}"
        >
    </div>
    <div class="flex flex-wrap gap-2">
        <button class="filter-btn px-3 py-1.5 rounded-lg text-xs font-medium border cursor-pointer transition-all bg-gold/20 border-gold text-gold" data-filter="all">{{ __($t . '.filter_all') }}</button>
        <button class="filter-btn px-3 py-1.5 rounded-lg text-xs font-medium border cursor-pointer transition-all border-gold/20 text-light-muted hover:border-gold/50" data-filter="control">{{ __($t . '.filter_control') }}</button>
        <button class="filter-btn px-3 py-1.5 rounded-lg text-xs font-medium border cursor-pointer transition-all border-gold/20 text-light-muted hover:border-gold/50" data-filter="digits">{{ __($t . '.filter_digits') }}</button>
        <button class="filter-btn px-3 py-1.5 rounded-lg text-xs font-medium border cursor-pointer transition-all border-gold/20 text-light-muted hover:border-gold/50" data-filter="uppercase">{{ __($t . '.filter_uppercase') }}</button>
        <button class="filter-btn px-3 py-1.5 rounded-lg text-xs font-medium border cursor-pointer transition-all border-gold/20 text-light-muted hover:border-gold/50" data-filter="lowercase">{{ __($t . '.filter_lowercase') }}</button>
        <button class="filter-btn px-3 py-1.5 rounded-lg text-xs font-medium border cursor-pointer transition-all border-gold/20 text-light-muted hover:border-gold/50" data-filter="symbols">{{ __($t . '.filter_symbols') }}</button>
    </div>
</div>

{{-- Table --}}
<div class="overflow-x-auto border border-gold/10 rounded-lg">
    <table class="w-full text-sm">
        <thead>
            <tr class="bg-darkBg border-b border-gold/10">
                <th class="px-3 py-3 text-left text-xs font-semibold text-gold uppercase tracking-wider cursor-pointer hover:text-gold-light" data-sort="dec">{{ __($t . '.col_dec') }} ↕</th>
                <th class="px-3 py-3 text-left text-xs font-semibold text-gold uppercase tracking-wider">{{ __($t . '.col_hex') }}</th>
                <th class="px-3 py-3 text-left text-xs font-semibold text-gold uppercase tracking-wider">{{ __($t . '.col_oct') }}</th>
                <th class="px-3 py-3 text-left text-xs font-semibold text-gold uppercase tracking-wider">{{ __($t . '.col_binary') }}</th>
                <th class="px-3 py-3 text-left text-xs font-semibold text-gold uppercase tracking-wider">{{ __($t . '.col_char') }}</th>
                <th class="px-3 py-3 text-left text-xs font-semibold text-gold uppercase tracking-wider">{{ __($t . '.col_html') }}</th>
                <th class="px-3 py-3 text-left text-xs font-semibold text-gold uppercase tracking-wider">{{ __($t . '.col_description') }}</th>
            </tr>
        </thead>
        <tbody id="ascii-table-body" class="divide-y divide-gold/5">
            {{-- Generated via JS --}}
        </tbody>
    </table>
</div>

<div id="table-count" class="mt-3 text-light-muted text-sm text-center"></div>
