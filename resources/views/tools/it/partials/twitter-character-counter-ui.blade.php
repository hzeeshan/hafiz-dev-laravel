{{-- Mode Selector --}}
<div class="mb-6 flex flex-wrap gap-3">
    <button id="mode-tweet" class="px-5 py-2 rounded-lg font-semibold text-sm transition-all duration-300 bg-gold text-darkBg cursor-pointer">
        {{ __($t . '.mode_tweet') }}
    </button>
    <button id="mode-premium" class="px-5 py-2 rounded-lg font-semibold text-sm transition-all duration-300 border border-gold/50 text-light hover:bg-gold/10 cursor-pointer">
        {{ __($t . '.mode_premium') }}
    </button>
    <button id="mode-dm" class="px-5 py-2 rounded-lg font-semibold text-sm transition-all duration-300 border border-gold/50 text-light hover:bg-gold/10 cursor-pointer">
        {{ __($t . '.mode_dm') }}
    </button>
    <button id="mode-bio" class="px-5 py-2 rounded-lg font-semibold text-sm transition-all duration-300 border border-gold/50 text-light hover:bg-gold/10 cursor-pointer">
        {{ __($t . '.mode_bio') }}
    </button>
</div>

{{-- Progress Bar --}}
<div class="mb-4">
    <div class="flex justify-between items-center mb-2">
        <span id="char-count" class="text-3xl font-bold text-gold">0</span>
        <span class="text-light-muted text-sm">/ <span id="char-limit">280</span> {{ __($t . '.characters') }}</span>
    </div>
    <div class="w-full bg-darkBg rounded-full h-3 border border-gold/10">
        <div id="progress-bar" class="h-full rounded-full transition-all duration-300 bg-gold" style="width: 0%"></div>
    </div>
    <div id="remaining-text" class="text-right mt-1 text-sm text-light-muted">
        <span id="remaining-count">280</span> {{ __($t . '.characters_remaining') }}
    </div>
</div>

{{-- Text Input --}}
<div class="mb-6">
    <textarea
        id="tweet-input"
        class="w-full min-h-[200px] bg-darkBg border border-gold/20 rounded-lg p-4 text-light text-base placeholder-light-muted/50 focus:border-gold focus:outline-none focus:ring-1 focus:ring-gold/30 resize-none leading-relaxed"
        placeholder="{{ __($t . '.placeholder') }}"
        autofocus
    ></textarea>
</div>

{{-- Stats Grid --}}
<div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-3 mb-6">
    <div class="bg-darkBg rounded-lg p-3 border border-gold/10 text-center">
        <div id="stat-chars" class="text-xl font-bold text-gold">0</div>
        <div class="text-light-muted text-xs">{{ __($t . '.stat_characters') }}</div>
    </div>
    <div class="bg-darkBg rounded-lg p-3 border border-gold/10 text-center">
        <div id="stat-twitter-chars" class="text-xl font-bold text-gold">0</div>
        <div class="text-light-muted text-xs">{{ __($t . '.stat_twitter_count') }}</div>
    </div>
    <div class="bg-darkBg rounded-lg p-3 border border-gold/10 text-center">
        <div id="stat-words" class="text-xl font-bold text-light">0</div>
        <div class="text-light-muted text-xs">{{ __($t . '.stat_words') }}</div>
    </div>
    <div class="bg-darkBg rounded-lg p-3 border border-gold/10 text-center">
        <div id="stat-urls" class="text-xl font-bold text-light">0</div>
        <div class="text-light-muted text-xs">{{ __($t . '.stat_urls') }}</div>
    </div>
    <div class="bg-darkBg rounded-lg p-3 border border-gold/10 text-center">
        <div id="stat-mentions" class="text-xl font-bold text-light">0</div>
        <div class="text-light-muted text-xs">{{ __($t . '.stat_mentions') }}</div>
    </div>
    <div class="bg-darkBg rounded-lg p-3 border border-gold/10 text-center">
        <div id="stat-hashtags" class="text-xl font-bold text-light">0</div>
        <div class="text-light-muted text-xs">{{ __($t . '.stat_hashtags') }}</div>
    </div>
</div>

{{-- Action Buttons --}}
<div class="flex flex-wrap gap-3 mb-6">
    <button id="btn-copy" class="px-4 py-3 border border-gold/50 text-light rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
        {{ __($t . '.copy_text') }}
    </button>
    <button id="btn-clear" class="px-4 py-3 border border-gold/50 text-light rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
        {{ __($t . '.clear') }}
    </button>
    <a href="https://twitter.com/intent/tweet" target="_blank" rel="noopener noreferrer" id="btn-post" class="px-4 py-3 bg-gold text-darkBg font-semibold rounded-lg hover:bg-gold-light transition-all duration-300 flex items-center gap-2 cursor-pointer">
        <svg class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"></path></svg>
        {{ __($t . '.post_on_x') }}
    </a>
</div>

{{-- Tips Box --}}
<div id="tips-box" class="bg-darkBg rounded-lg p-4 border border-gold/10">
    <h3 class="text-light font-semibold mb-3 flex items-center gap-2">
        <svg class="w-4 h-4 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
        {{ __($t . '.tips_title') }}
    </h3>
    <div class="grid sm:grid-cols-2 gap-2 text-sm text-light-muted">
        <div class="flex items-start gap-2">
            <span class="text-gold mt-0.5">•</span>
            <span>{!! __($t . '.tip_urls') !!}</span>
        </div>
        <div class="flex items-start gap-2">
            <span class="text-gold mt-0.5">•</span>
            <span>{!! __($t . '.tip_emojis') !!}</span>
        </div>
        <div class="flex items-start gap-2">
            <span class="text-gold mt-0.5">•</span>
            <span>{!! __($t . '.tip_cjk') !!}</span>
        </div>
        <div class="flex items-start gap-2">
            <span class="text-gold mt-0.5">•</span>
            <span>{!! __($t . '.tip_mentions') !!}</span>
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
