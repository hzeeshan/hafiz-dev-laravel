{{-- Octal Input --}}
<div class="mb-8 text-center">
    <label class="text-light font-semibold mb-3 block text-sm">{{ __($t . '.octal_code') }}</label>
    <div class="flex items-center justify-center gap-2">
        <span class="text-light-muted text-lg font-mono">chmod</span>
        <input type="text" id="octal-input" class="w-28 bg-darkBg border-2 border-gold/40 rounded-lg px-4 py-3 text-center text-light text-2xl font-mono font-bold focus:border-gold focus:outline-none tracking-widest" value="755" maxlength="4" spellcheck="false">
        <span class="text-light-muted text-lg font-mono">filename</span>
    </div>
</div>

{{-- Permission Grid --}}
<div class="overflow-x-auto mb-8">
    <table class="w-full max-w-2xl mx-auto">
        <thead>
            <tr>
                <th class="text-left text-light-muted text-sm font-medium py-2 px-3 w-28"></th>
                <th class="text-center text-light text-sm font-semibold py-2 px-3">{{ __($t . '.read') }}</th>
                <th class="text-center text-light text-sm font-semibold py-2 px-3">{{ __($t . '.write') }}</th>
                <th class="text-center text-light text-sm font-semibold py-2 px-3">{{ __($t . '.execute') }}</th>
                <th class="text-center text-light-muted text-sm font-medium py-2 px-3 w-20">{{ __($t . '.octal') }}</th>
            </tr>
        </thead>
        <tbody>
            <tr class="border-t border-gold/10">
                <td class="py-4 px-3">
                    <span class="text-gold font-semibold text-sm">{{ __($t . '.owner') }}</span>
                    <span class="text-light-muted text-xs block">{{ __($t . '.owner_user') }}</span>
                </td>
                <td class="text-center py-4 px-3"><input type="checkbox" id="owner-r" data-who="owner" data-perm="r" class="perm-cb w-6 h-6 rounded border-gray-600 bg-darkBg text-gold focus:ring-gold focus:ring-offset-0 cursor-pointer" checked></td>
                <td class="text-center py-4 px-3"><input type="checkbox" id="owner-w" data-who="owner" data-perm="w" class="perm-cb w-6 h-6 rounded border-gray-600 bg-darkBg text-gold focus:ring-gold focus:ring-offset-0 cursor-pointer" checked></td>
                <td class="text-center py-4 px-3"><input type="checkbox" id="owner-x" data-who="owner" data-perm="x" class="perm-cb w-6 h-6 rounded border-gray-600 bg-darkBg text-gold focus:ring-gold focus:ring-offset-0 cursor-pointer" checked></td>
                <td class="text-center py-4 px-3"><span id="owner-octal" class="text-2xl font-bold text-gold font-mono">7</span></td>
            </tr>
            <tr class="border-t border-gold/10">
                <td class="py-4 px-3">
                    <span class="text-blue-400 font-semibold text-sm">{{ __($t . '.group') }}</span>
                </td>
                <td class="text-center py-4 px-3"><input type="checkbox" id="group-r" data-who="group" data-perm="r" class="perm-cb w-6 h-6 rounded border-gray-600 bg-darkBg text-blue-500 focus:ring-blue-500 focus:ring-offset-0 cursor-pointer" checked></td>
                <td class="text-center py-4 px-3"><input type="checkbox" id="group-w" data-who="group" data-perm="w" class="perm-cb w-6 h-6 rounded border-gray-600 bg-darkBg text-blue-500 focus:ring-blue-500 focus:ring-offset-0 cursor-pointer"></td>
                <td class="text-center py-4 px-3"><input type="checkbox" id="group-x" data-who="group" data-perm="x" class="perm-cb w-6 h-6 rounded border-gray-600 bg-darkBg text-blue-500 focus:ring-blue-500 focus:ring-offset-0 cursor-pointer" checked></td>
                <td class="text-center py-4 px-3"><span id="group-octal" class="text-2xl font-bold text-blue-400 font-mono">5</span></td>
            </tr>
            <tr class="border-t border-gold/10">
                <td class="py-4 px-3">
                    <span class="text-green-400 font-semibold text-sm">{{ __($t . '.others') }}</span>
                    <span class="text-light-muted text-xs block">{{ __($t . '.others_public') }}</span>
                </td>
                <td class="text-center py-4 px-3"><input type="checkbox" id="others-r" data-who="others" data-perm="r" class="perm-cb w-6 h-6 rounded border-gray-600 bg-darkBg text-green-500 focus:ring-green-500 focus:ring-offset-0 cursor-pointer" checked></td>
                <td class="text-center py-4 px-3"><input type="checkbox" id="others-w" data-who="others" data-perm="w" class="perm-cb w-6 h-6 rounded border-gray-600 bg-darkBg text-green-500 focus:ring-green-500 focus:ring-offset-0 cursor-pointer"></td>
                <td class="text-center py-4 px-3"><input type="checkbox" id="others-x" data-who="others" data-perm="x" class="perm-cb w-6 h-6 rounded border-gray-600 bg-darkBg text-green-500 focus:ring-green-500 focus:ring-offset-0 cursor-pointer" checked></td>
                <td class="text-center py-4 px-3"><span id="others-octal" class="text-2xl font-bold text-green-400 font-mono">5</span></td>
            </tr>
        </tbody>
    </table>
</div>

{{-- Results --}}
<div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
    <div class="bg-darkBg rounded-lg p-4 border border-gold/10 text-center">
        <div class="text-light-muted text-xs mb-1">{{ __($t . '.result_octal') }}</div>
        <div id="result-octal" class="text-3xl font-bold text-gold font-mono cursor-pointer hover:text-gold-light transition-colors" title="{{ __('tools.click_to_copy') }}">755</div>
    </div>
    <div class="bg-darkBg rounded-lg p-4 border border-gold/10 text-center">
        <div class="text-light-muted text-xs mb-1">{{ __($t . '.result_symbolic') }}</div>
        <div id="result-symbolic" class="text-xl font-bold text-light font-mono cursor-pointer hover:text-gold transition-colors" title="{{ __('tools.click_to_copy') }}">rwxr-xr-x</div>
    </div>
    <div class="bg-darkBg rounded-lg p-4 border border-gold/10 text-center">
        <div class="text-light-muted text-xs mb-1">{{ __($t . '.result_command') }}</div>
        <div id="result-command" class="text-sm font-bold text-light font-mono cursor-pointer hover:text-gold transition-colors" title="{{ __('tools.click_to_copy') }}">chmod 755 file</div>
    </div>
    <div class="bg-darkBg rounded-lg p-4 border border-gold/10 text-center">
        <div class="text-light-muted text-xs mb-1">{{ __($t . '.result_filetype') }}</div>
        <div id="result-filetype" class="text-sm font-bold text-light">-rwxr-xr-x</div>
    </div>
</div>

{{-- Quick Presets --}}
<div class="mb-6">
    <h3 class="text-light font-semibold text-sm mb-3">{{ __($t . '.common_presets') }}</h3>
    <div class="flex flex-wrap gap-2">
        <button class="preset-btn px-3 py-2 bg-darkBg border border-gold/20 rounded-lg text-light text-sm font-mono hover:border-gold/50 hover:text-gold transition-all cursor-pointer" data-octal="755">755 <span class="text-light-muted text-xs">{{ __($t . '.dirs') }}</span></button>
        <button class="preset-btn px-3 py-2 bg-darkBg border border-gold/20 rounded-lg text-light text-sm font-mono hover:border-gold/50 hover:text-gold transition-all cursor-pointer" data-octal="644">644 <span class="text-light-muted text-xs">{{ __($t . '.files') }}</span></button>
        <button class="preset-btn px-3 py-2 bg-darkBg border border-gold/20 rounded-lg text-light text-sm font-mono hover:border-gold/50 hover:text-gold transition-all cursor-pointer" data-octal="700">700 <span class="text-light-muted text-xs">{{ __($t . '.private') }}</span></button>
        <button class="preset-btn px-3 py-2 bg-darkBg border border-gold/20 rounded-lg text-light text-sm font-mono hover:border-gold/50 hover:text-gold transition-all cursor-pointer" data-octal="600">600 <span class="text-light-muted text-xs">{{ __($t . '.ssh_keys') }}</span></button>
        <button class="preset-btn px-3 py-2 bg-darkBg border border-gold/20 rounded-lg text-light text-sm font-mono hover:border-gold/50 hover:text-gold transition-all cursor-pointer" data-octal="775">775 <span class="text-light-muted text-xs">{{ __($t . '.shared') }}</span></button>
        <button class="preset-btn px-3 py-2 bg-darkBg border border-gold/20 rounded-lg text-light text-sm font-mono hover:border-gold/50 hover:text-gold transition-all cursor-pointer" data-octal="444">444 <span class="text-light-muted text-xs">{{ __($t . '.read_only') }}</span></button>
        <button class="preset-btn px-3 py-2 bg-darkBg border border-red-500/30 rounded-lg text-red-400 text-sm font-mono hover:border-red-500/50 transition-all cursor-pointer" data-octal="777">777 <span class="text-red-400/60 text-xs">{{ __($t . '.dangerous') }}</span></button>
        <button class="preset-btn px-3 py-2 bg-darkBg border border-gold/20 rounded-lg text-light text-sm font-mono hover:border-gold/50 hover:text-gold transition-all cursor-pointer" data-octal="000">000 <span class="text-light-muted text-xs">{{ __($t . '.none') }}</span></button>
    </div>
</div>

{{-- Security Warning --}}
<div id="security-warning" class="hidden p-3 rounded-lg bg-red-500/10 border border-red-500/30">
    <div class="flex items-center gap-2">
        <svg class="w-4 h-4 text-red-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L4.082 16.5c-.77.833.192 2.5 1.732 2.5z"></path></svg>
        <span id="security-message" class="text-red-400 text-sm"></span>
    </div>
</div>

{{-- Copy notification --}}
<div id="success-notification" class="hidden mt-4 p-3 rounded-lg bg-green-500/10 border border-green-500/30">
    <div class="flex items-center gap-2">
        <svg class="w-4 h-4 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
        <span id="success-message" class="text-green-400 text-sm"></span>
    </div>
</div>
