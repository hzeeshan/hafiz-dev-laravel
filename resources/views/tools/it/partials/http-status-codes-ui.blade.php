{{-- Search & Filter --}}
<div class="mb-6 flex flex-col sm:flex-row gap-3">
    <div class="flex-1">
        <label for="search-input" class="text-light font-semibold mb-2 flex items-center gap-2">
            <svg class="w-4 h-4 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
            {{ __($t . '.search') }}
        </label>
        <input
            type="text"
            id="search-input"
            class="w-full bg-darkBg border border-gold/20 rounded-lg px-4 py-3 text-sm text-light placeholder-light-muted/50 focus:border-gold focus:outline-none focus:ring-1 focus:ring-gold/30"
            placeholder="{{ __($t . '.search_placeholder') }}"
            spellcheck="false"
            autocomplete="off"
        >
    </div>
</div>

{{-- Category Filters --}}
<div class="mb-6 flex flex-wrap gap-2">
    <button data-filter="all" class="filter-btn active px-4 py-2 rounded-lg text-sm font-medium border border-gold/50 text-gold bg-gold/10 transition-all duration-300 cursor-pointer">{{ __($t . '.filter_all') }}</button>
    <button data-filter="1xx" class="filter-btn px-4 py-2 rounded-lg text-sm font-medium border border-blue-500/30 text-blue-400 hover:bg-blue-500/10 transition-all duration-300 cursor-pointer">{{ __($t . '.filter_1xx') }}</button>
    <button data-filter="2xx" class="filter-btn px-4 py-2 rounded-lg text-sm font-medium border border-green-500/30 text-green-400 hover:bg-green-500/10 transition-all duration-300 cursor-pointer">{{ __($t . '.filter_2xx') }}</button>
    <button data-filter="3xx" class="filter-btn px-4 py-2 rounded-lg text-sm font-medium border border-yellow-500/30 text-yellow-400 hover:bg-yellow-500/10 transition-all duration-300 cursor-pointer">{{ __($t . '.filter_3xx') }}</button>
    <button data-filter="4xx" class="filter-btn px-4 py-2 rounded-lg text-sm font-medium border border-orange-500/30 text-orange-400 hover:bg-orange-500/10 transition-all duration-300 cursor-pointer">{{ __($t . '.filter_4xx') }}</button>
    <button data-filter="5xx" class="filter-btn px-4 py-2 rounded-lg text-sm font-medium border border-red-500/30 text-red-400 hover:bg-red-500/10 transition-all duration-300 cursor-pointer">{{ __($t . '.filter_5xx') }}</button>
</div>

{{-- Results Count --}}
<div class="mb-4 text-sm text-light-muted">
    {{ __($t . '.showing') }} <span id="result-count" class="text-gold font-semibold">63</span> {{ __($t . '.status_codes') }}
</div>

{{-- Status Codes Table --}}
<div id="codes-container" class="space-y-2">
</div>

{{-- No Results --}}
<div id="no-results" class="hidden text-center py-12">
    <div class="text-4xl mb-3">🔍</div>
    <p class="text-light-muted">{{ __($t . '.no_results') }}</p>
</div>
