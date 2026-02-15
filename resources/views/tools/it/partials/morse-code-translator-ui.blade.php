{{-- Direction Toggle --}}
<div class="mb-6 p-4 bg-darkBg rounded-lg border border-gold/10">
    <label class="text-light font-semibold mb-3 block text-sm">{{ __($t . '.translation_direction') }}</label>
    <div class="flex flex-wrap gap-3">
        <label class="flex items-center gap-2 cursor-pointer px-4 py-2 bg-darkCard border border-gold/30 rounded-lg hover:border-gold/50 transition-colors">
            <input type="radio" name="direction" value="text-to-morse" checked class="text-gold focus:ring-gold cursor-pointer">
            <span class="text-sm text-light">{{ __($t . '.text_to_morse') }}</span>
        </label>
        <label class="flex items-center gap-2 cursor-pointer px-4 py-2 bg-darkCard border border-gold/20 rounded-lg hover:border-gold/50 transition-colors">
            <input type="radio" name="direction" value="morse-to-text" class="text-gold focus:ring-gold cursor-pointer">
            <span class="text-sm text-light">{{ __($t . '.morse_to_text') }}</span>
        </label>
    </div>
</div>

{{-- Input --}}
<div class="mb-4">
    <label for="text-input" class="text-light font-semibold mb-2 flex items-center gap-2">
        <svg class="w-4 h-4 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
        <span id="input-label">{{ __($t . '.your_text') }}</span>
    </label>
    <textarea
        id="text-input"
        class="w-full min-h-[140px] bg-darkBg border border-gold/20 rounded-lg p-4 font-mono text-sm text-light placeholder-light-muted/50 focus:border-gold focus:outline-none focus:ring-1 focus:ring-gold/30 resize-none"
        placeholder="{{ __($t . '.input_placeholder_text') }}"
        spellcheck="false"
    ></textarea>
</div>

{{-- Output --}}
<div class="mb-6">
    <label class="text-light font-semibold mb-2 flex items-center gap-2">
        <svg class="w-4 h-4 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
        <span id="output-label">{{ __($t . '.morse_code') }}</span>
    </label>
    <textarea
        id="text-output"
        class="w-full min-h-[140px] bg-darkBg border border-gold/20 rounded-lg p-4 font-mono text-sm text-light placeholder-light-muted/50 focus:border-gold/50 focus:outline-none resize-none"
        placeholder="{{ __($t . '.output_placeholder_morse') }}"
        readonly
    ></textarea>
</div>

{{-- Action Buttons --}}
<div class="flex flex-wrap gap-3 mb-6">
    <button id="btn-copy" class="px-4 py-3 border border-gold/50 text-light rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
        {{ __($t . '.copy') }}
    </button>
    <button id="btn-play" class="px-4 py-3 border border-gold/50 text-light rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer">
        <svg id="play-icon" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
        <span id="play-text">{{ __($t . '.play') }}</span>
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

{{-- Speed Control --}}
<div class="mb-6 p-4 bg-darkBg rounded-lg border border-gold/10">
    <div class="flex items-center justify-between mb-2">
        <label class="text-light font-semibold text-sm">{{ __($t . '.playback_speed') }}</label>
        <span id="speed-label" class="text-gold text-sm font-mono">20 WPM</span>
    </div>
    <input
        type="range"
        id="speed-slider"
        min="5"
        max="40"
        value="20"
        class="w-full accent-gold cursor-pointer"
    >
    <div class="flex justify-between text-xs text-light-muted mt-1">
        <span>{{ __($t . '.slow') }}</span>
        <span>{{ __($t . '.fast') }}</span>
    </div>
</div>

{{-- Stats --}}
<div id="stats-bar" class="hidden bg-darkBg rounded-lg p-4 border border-gold/10">
    <div class="grid grid-cols-3 gap-4">
        <div class="text-center">
            <div id="stat-chars" class="text-2xl font-bold text-gold mb-1">0</div>
            <div class="text-light-muted text-sm">{{ __($t . '.characters') }}</div>
        </div>
        <div class="text-center">
            <div id="stat-symbols" class="text-2xl font-bold text-light mb-1">0</div>
            <div class="text-light-muted text-sm">{{ __($t . '.morse_symbols') }}</div>
        </div>
        <div class="text-center">
            <div id="stat-words" class="text-2xl font-bold text-light mb-1">0</div>
            <div class="text-light-muted text-sm">{{ __($t . '.words') }}</div>
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

{{-- Morse Code Reference --}}
<div class="mt-6 border-t border-gold/10 pt-6">
    <h2 class="text-lg font-semibold text-light mb-4 flex items-center gap-2">
        <svg class="w-5 h-5 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path></svg>
        {{ __($t . '.morse_reference') }}
    </h2>
    <div class="grid grid-cols-2 sm:grid-cols-4 md:grid-cols-6 lg:grid-cols-9 gap-2">
        @foreach(['A' => '.-', 'B' => '-...', 'C' => '-.-.', 'D' => '-..', 'E' => '.', 'F' => '..-.', 'G' => '--.', 'H' => '....', 'I' => '..', 'J' => '.---', 'K' => '-.-', 'L' => '.-..', 'M' => '--', 'N' => '-.', 'O' => '---', 'P' => '.--.', 'Q' => '--.-', 'R' => '.-.', 'S' => '...', 'T' => '-', 'U' => '..-', 'V' => '...-', 'W' => '.--', 'X' => '-..-', 'Y' => '-.--', 'Z' => '--..', '0' => '-----', '1' => '.----', '2' => '..---', '3' => '...--', '4' => '....-', '5' => '.....', '6' => '-....', '7' => '--...', '8' => '---..', '9' => '----.'] as $char => $code)
        <div class="bg-darkBg rounded-lg p-2 border border-gold/10 text-center">
            <div class="text-light font-bold text-lg">{{ $char }}</div>
            <div class="text-gold font-mono text-sm">{{ $code }}</div>
        </div>
        @endforeach
    </div>
</div>
