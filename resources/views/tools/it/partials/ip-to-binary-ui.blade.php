{{-- IP Input --}}
<div class="mb-6">
    <label for="ip-input" class="text-light font-semibold mb-2 flex items-center gap-2">
        <svg class="w-4 h-4 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"></path></svg>
        {{ __($t . '.ipv4_address') }}
    </label>
    <div class="flex flex-col sm:flex-row gap-3">
        <div class="flex-1">
            <input
                type="text"
                id="ip-input"
                class="w-full bg-darkBg border border-gold/20 rounded-lg px-4 py-3 font-mono text-sm text-light placeholder-light-muted/50 focus:border-gold focus:outline-none focus:ring-1 focus:ring-gold/30"
                placeholder="{{ __($t . '.ip_placeholder') }}"
                spellcheck="false"
                autocomplete="off"
            >
        </div>
        <div class="sm:w-40">
            <select id="cidr-input" class="w-full bg-darkBg border border-gold/20 rounded-lg px-4 py-3 text-sm text-light focus:border-gold focus:outline-none cursor-pointer">
                <option value="">{{ __($t . '.no_subnet') }}</option>
                <option value="8">/8 (255.0.0.0)</option>
                <option value="16">/16 (255.255.0.0)</option>
                <option value="24" selected>/24 (255.255.255.0)</option>
                <option value="25">/25 (255.255.255.128)</option>
                <option value="26">/26 (255.255.255.192)</option>
                <option value="27">/27 (255.255.255.224)</option>
                <option value="28">/28 (255.255.255.240)</option>
                <option value="30">/30 (255.255.255.252)</option>
                <option value="32">/32 (255.255.255.255)</option>
            </select>
        </div>
    </div>
</div>

{{-- Action Buttons --}}
<div class="flex flex-wrap gap-3 mb-6">
    <button id="btn-copy" class="px-4 py-3 border border-gold/50 text-light rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
        {{ __($t . '.copy_binary') }}
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

{{-- Binary Output --}}
<div id="output-section" class="hidden space-y-4 mb-6">
    {{-- Full Binary --}}
    <div class="bg-darkBg rounded-lg p-4 border border-gold/10">
        <h3 class="text-light font-semibold mb-2 text-sm">{{ __($t . '.full_binary') }}</h3>
        <div id="full-binary" class="font-mono text-lg text-gold break-all"></div>
    </div>

    {{-- Dotted Binary --}}
    <div class="bg-darkBg rounded-lg p-4 border border-gold/10">
        <h3 class="text-light font-semibold mb-2 text-sm">{{ __($t . '.dotted_binary') }}</h3>
        <div id="dotted-binary" class="font-mono text-lg text-light break-all"></div>
    </div>

    {{-- Octet Breakdown --}}
    <div class="bg-darkBg rounded-lg p-4 border border-gold/10">
        <h3 class="text-light font-semibold mb-3 flex items-center gap-2 text-sm">
            <svg class="w-4 h-4 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"></path></svg>
            {{ __($t . '.octet_breakdown') }}
        </h3>
        <div class="overflow-x-auto border border-gold/10 rounded-lg">
            <table class="w-full text-sm">
                <thead>
                    <tr class="bg-darkCard border-b border-gold/10">
                        <th class="px-4 py-2 text-left text-xs font-semibold text-gold uppercase">{{ __($t . '.octet') }}</th>
                        <th class="px-4 py-2 text-left text-xs font-semibold text-gold uppercase">{{ __($t . '.decimal') }}</th>
                        <th class="px-4 py-2 text-left text-xs font-semibold text-gold uppercase">{{ __($t . '.binary') }}</th>
                        <th class="px-4 py-2 text-left text-xs font-semibold text-gold uppercase">{{ __($t . '.hex') }}</th>
                    </tr>
                </thead>
                <tbody id="octet-body" class="divide-y divide-gold/5"></tbody>
            </table>
        </div>
    </div>

    {{-- Subnet Info --}}
    <div id="subnet-section" class="hidden bg-darkBg rounded-lg p-4 border border-gold/10">
        <h3 class="text-light font-semibold mb-3 flex items-center gap-2 text-sm">
            <svg class="w-4 h-4 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
            {{ __($t . '.subnet_information') }}
        </h3>
        <div class="grid sm:grid-cols-2 gap-3">
            <div class="p-3 bg-darkCard rounded-lg border border-gold/10">
                <div class="text-light-muted text-xs mb-1">{{ __($t . '.subnet_mask') }}</div>
                <div id="subnet-mask" class="font-mono text-light text-sm"></div>
            </div>
            <div class="p-3 bg-darkCard rounded-lg border border-gold/10">
                <div class="text-light-muted text-xs mb-1">{{ __($t . '.cidr_notation') }}</div>
                <div id="cidr-display" class="font-mono text-light text-sm"></div>
            </div>
            <div class="p-3 bg-darkCard rounded-lg border border-gold/10">
                <div class="text-light-muted text-xs mb-1">{{ __($t . '.network_address') }}</div>
                <div id="network-addr" class="font-mono text-light text-sm"></div>
            </div>
            <div class="p-3 bg-darkCard rounded-lg border border-gold/10">
                <div class="text-light-muted text-xs mb-1">{{ __($t . '.broadcast_address') }}</div>
                <div id="broadcast-addr" class="font-mono text-light text-sm"></div>
            </div>
            <div class="p-3 bg-darkCard rounded-lg border border-gold/10">
                <div class="text-light-muted text-xs mb-1">{{ __($t . '.network_bits') }}</div>
                <div id="network-bits" class="font-mono text-gold text-sm"></div>
            </div>
            <div class="p-3 bg-darkCard rounded-lg border border-gold/10">
                <div class="text-light-muted text-xs mb-1">{{ __($t . '.host_bits') }}</div>
                <div id="host-bits" class="font-mono text-light text-sm"></div>
            </div>
        </div>

        {{-- Visual bit breakdown --}}
        <div class="mt-4">
            <div class="text-light-muted text-xs mb-2">{{ __($t . '.bit_visualization') }}</div>
            <div id="bit-visual" class="font-mono text-xs leading-relaxed break-all"></div>
        </div>
    </div>
</div>

{{-- Common IP Addresses --}}
<div class="bg-darkBg rounded-lg p-4 border border-gold/10">
    <h3 class="text-light font-semibold mb-3 flex items-center gap-2 text-sm">
        <svg class="w-4 h-4 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
        {{ __($t . '.common_ips') }}
    </h3>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-2">
        <button class="quick-ip text-left p-3 bg-darkCard rounded-lg border border-gold/10 hover:border-gold/30 transition-colors cursor-pointer" data-ip="192.168.1.1">
            <span class="text-gold font-mono text-sm">192.168.1.1</span>
            <span class="text-light-muted text-xs block">{{ __($t . '.private_home') }}</span>
        </button>
        <button class="quick-ip text-left p-3 bg-darkCard rounded-lg border border-gold/10 hover:border-gold/30 transition-colors cursor-pointer" data-ip="10.0.0.1">
            <span class="text-gold font-mono text-sm">10.0.0.1</span>
            <span class="text-light-muted text-xs block">{{ __($t . '.private_corporate') }}</span>
        </button>
        <button class="quick-ip text-left p-3 bg-darkCard rounded-lg border border-gold/10 hover:border-gold/30 transition-colors cursor-pointer" data-ip="127.0.0.1">
            <span class="text-gold font-mono text-sm">127.0.0.1</span>
            <span class="text-light-muted text-xs block">{{ __($t . '.localhost') }}</span>
        </button>
        <button class="quick-ip text-left p-3 bg-darkCard rounded-lg border border-gold/10 hover:border-gold/30 transition-colors cursor-pointer" data-ip="255.255.255.0">
            <span class="text-gold font-mono text-sm">255.255.255.0</span>
            <span class="text-light-muted text-xs block">{{ __($t . '.subnet_mask_24') }}</span>
        </button>
        <button class="quick-ip text-left p-3 bg-darkCard rounded-lg border border-gold/10 hover:border-gold/30 transition-colors cursor-pointer" data-ip="8.8.8.8">
            <span class="text-gold font-mono text-sm">8.8.8.8</span>
            <span class="text-light-muted text-xs block">{{ __($t . '.google_dns') }}</span>
        </button>
        <button class="quick-ip text-left p-3 bg-darkCard rounded-lg border border-gold/10 hover:border-gold/30 transition-colors cursor-pointer" data-ip="0.0.0.0">
            <span class="text-gold font-mono text-sm">0.0.0.0</span>
            <span class="text-light-muted text-xs block">{{ __($t . '.default_route') }}</span>
        </button>
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
