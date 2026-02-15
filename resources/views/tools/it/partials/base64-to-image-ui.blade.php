{{-- Format selector --}}
<div class="mb-4 flex items-center gap-4">
    <label for="img-format" class="text-light text-sm font-semibold">{{ __($t . '.format_label') }}</label>
    <select id="img-format" class="bg-darkBg border border-gold/20 rounded-lg px-3 py-2 text-light text-sm focus:border-gold/50 focus:outline-none cursor-pointer">
        <option value="auto" selected>{{ __($t . '.auto_detect') }}</option>
        <option value="image/png">PNG</option>
        <option value="image/jpeg">JPEG</option>
        <option value="image/gif">GIF</option>
        <option value="image/webp">WebP</option>
        <option value="image/svg+xml">SVG</option>
        <option value="image/bmp">BMP</option>
        <option value="image/x-icon">ICO</option>
    </select>
</div>

{{-- Input --}}
<div class="mb-6">
    <div class="flex items-center justify-between mb-2">
        <label for="b64-input" class="text-light font-semibold flex items-center gap-2">
            <svg class="w-4 h-4 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
            {{ __($t . '.base64_input') }}
        </label>
        <span id="input-length" class="text-light-muted text-xs">0 {{ __($t . '.js_strings.characters') }}</span>
    </div>
    <textarea
        id="b64-input"
        class="w-full min-h-[180px] bg-darkBg border border-gold/20 rounded-lg p-4 font-mono text-sm text-light placeholder-light-muted/50 focus:border-gold focus:outline-none focus:ring-1 focus:ring-gold/30 resize-none"
        placeholder="{{ __($t . '.input_placeholder') }}"
        spellcheck="false"
    ></textarea>
</div>

{{-- Action Buttons --}}
<div class="flex flex-wrap gap-3 mb-6">
    <button id="btn-convert" class="px-6 py-3 bg-gold text-darkBg font-semibold rounded-lg hover:bg-gold-light transition-all duration-300 flex items-center gap-2 cursor-pointer">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
        {{ __($t . '.decode_image') }}
    </button>
    <button id="btn-download" class="px-4 py-3 border border-gold/50 text-light rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer" disabled>
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
        {{ __($t . '.download') }}
    </button>
    <button id="btn-sample" class="px-4 py-3 border border-gold/50 text-light rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
        {{ __($t . '.sample') }}
    </button>
    <button id="btn-clear" class="px-4 py-3 border border-gold/50 text-light rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
        {{ __('tools.clear') }}
    </button>
</div>

{{-- Image Preview --}}
<div id="preview-area" class="hidden mb-6">
    <h3 class="text-light font-semibold mb-3 flex items-center gap-2">
        <svg class="w-4 h-4 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
        {{ __($t . '.image_preview') }}
    </h3>
    <div class="bg-[#f0f0f0] rounded-lg p-4 flex items-center justify-center min-h-[200px] border border-gold/10" style="background-image: url('data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 width=%2220%22 height=%2220%22><rect width=%2210%22 height=%2210%22 fill=%22%23ddd%22/><rect x=%2210%22 y=%2210%22 width=%2210%22 height=%2210%22 fill=%22%23ddd%22/></svg>'); background-size: 20px 20px;">
        <img id="preview-img" class="max-w-full max-h-[500px] object-contain" alt="Decoded image">
    </div>
</div>

{{-- Stats --}}
<div id="stats-bar" class="hidden bg-darkBg rounded-lg p-4 border border-gold/10">
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
        <div class="text-center">
            <div id="stat-format" class="text-lg font-bold text-gold mb-1">—</div>
            <div class="text-light-muted text-sm">{{ __($t . '.format') }}</div>
        </div>
        <div class="text-center">
            <div id="stat-dimensions" class="text-lg font-bold text-light mb-1">—</div>
            <div class="text-light-muted text-sm">{{ __($t . '.dimensions') }}</div>
        </div>
        <div class="text-center">
            <div id="stat-b64size" class="text-lg font-bold text-light mb-1">—</div>
            <div class="text-light-muted text-sm">{{ __($t . '.base64_size') }}</div>
        </div>
        <div class="text-center">
            <div id="stat-filesize" class="text-lg font-bold text-light mb-1">—</div>
            <div class="text-light-muted text-sm">{{ __($t . '.file_size') }}</div>
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
<div id="error-notification" class="hidden mt-4 p-3 rounded-lg bg-red-500/10 border border-red-500/30">
    <div class="flex items-center gap-2">
        <svg class="w-4 h-4 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
        <span id="error-message" class="text-red-400 text-sm"></span>
    </div>
</div>
