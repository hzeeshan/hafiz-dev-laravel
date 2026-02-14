<div class="grid lg:grid-cols-[1fr,400px] gap-8">
    {{-- Left Column: Input Section --}}
    <div>
        {{-- Type Selector --}}
        <div class="mb-6">
            <label class="text-light font-semibold mb-3 block">{{ __($t . '.qr_code_type') }}</label>
            <div class="flex flex-wrap gap-2">
                <button data-type="text" class="type-btn px-4 py-2 rounded-lg bg-gold/20 text-gold border border-gold/50 hover:bg-gold/30 transition-colors cursor-pointer">
                    {{ __($t . '.type_text_url') }}
                </button>
                <button data-type="wifi" class="type-btn px-4 py-2 rounded-lg bg-gray-800 hover:bg-gray-700 text-light transition-colors border border-transparent cursor-pointer">
                    {{ __($t . '.type_wifi') }}
                </button>
                <button data-type="vcard" class="type-btn px-4 py-2 rounded-lg bg-gray-800 hover:bg-gray-700 text-light transition-colors border border-transparent cursor-pointer">
                    {{ __($t . '.type_contact') }}
                </button>
                <button data-type="email" class="type-btn px-4 py-2 rounded-lg bg-gray-800 hover:bg-gray-700 text-light transition-colors border border-transparent cursor-pointer">
                    {{ __($t . '.type_email') }}
                </button>
                <button data-type="sms" class="type-btn px-4 py-2 rounded-lg bg-gray-800 hover:bg-gray-700 text-light transition-colors border border-transparent cursor-pointer">
                    {{ __($t . '.type_sms') }}
                </button>
                <button data-type="phone" class="type-btn px-4 py-2 rounded-lg bg-gray-800 hover:bg-gray-700 text-light transition-colors border border-transparent cursor-pointer">
                    {{ __($t . '.type_phone') }}
                </button>
            </div>
        </div>

        {{-- Text/URL Form --}}
        <div id="form-text" class="form-section">
            <label for="input-text" class="text-light font-semibold mb-2 block">{{ __($t . '.enter_text_or_url') }}</label>
            <textarea id="input-text" rows="4" placeholder="{{ __($t . '.text_placeholder') }}"
                      class="w-full bg-darkBg border border-gold/20 rounded-lg px-4 py-3 text-light placeholder:text-gray-500 focus:border-gold/50 focus:outline-none resize-none"></textarea>
            <p class="text-xs text-light-muted mt-1">{{ __($t . '.char_count') }}: <span id="text-count">0</span></p>
        </div>

        {{-- WiFi Form --}}
        <div id="form-wifi" class="form-section hidden">
            <div class="space-y-4">
                <div>
                    <label for="wifi-ssid" class="text-light font-semibold mb-2 block">{{ __($t . '.wifi_ssid') }}</label>
                    <input type="text" id="wifi-ssid" placeholder="{{ __($t . '.wifi_ssid_placeholder') }}"
                           class="w-full bg-darkBg border border-gold/20 rounded-lg px-4 py-2 text-light placeholder:text-gray-500 focus:border-gold/50 focus:outline-none">
                </div>
                <div>
                    <label for="wifi-password" class="text-light font-semibold mb-2 block">{{ __($t . '.wifi_password') }}</label>
                    <div class="relative">
                        <input type="password" id="wifi-password" placeholder="{{ __($t . '.wifi_password_placeholder') }}"
                               class="w-full bg-darkBg border border-gold/20 rounded-lg px-4 py-2 pr-10 text-light placeholder:text-gray-500 focus:border-gold/50 focus:outline-none">
                        <button type="button" id="wifi-toggle-password" class="absolute right-3 top-1/2 -translate-y-1/2 text-light-muted hover:text-gold transition-colors cursor-pointer">
                            <svg class="w-5 h-5 show-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                            <svg class="w-5 h-5 hide-icon hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"></path></svg>
                        </button>
                    </div>
                </div>
                <div>
                    <label for="wifi-encryption" class="text-light font-semibold mb-2 block">{{ __($t . '.wifi_encryption') }}</label>
                    <select id="wifi-encryption" class="w-full bg-darkBg border border-gold/20 rounded-lg px-4 py-2 text-light focus:border-gold/50 focus:outline-none cursor-pointer">
                        <option value="WPA">WPA/WPA2</option>
                        <option value="WEP">WEP</option>
                        <option value="">{{ __($t . '.wifi_encryption_none') }}</option>
                    </select>
                </div>
                <div>
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="checkbox" id="wifi-hidden" class="w-4 h-4 rounded border-gold/30 bg-darkBg text-gold focus:ring-gold focus:ring-offset-darkBg cursor-pointer">
                        <span class="text-light text-sm">{{ __($t . '.wifi_hidden') }}</span>
                    </label>
                </div>
            </div>
        </div>

        {{-- vCard Form --}}
        <div id="form-vcard" class="form-section hidden">
            <div class="grid md:grid-cols-2 gap-4">
                <div>
                    <label for="vcard-firstname" class="text-light font-semibold mb-2 block">{{ __($t . '.vcard_firstname') }}</label>
                    <input type="text" id="vcard-firstname" placeholder="{{ __($t . '.vcard_firstname_placeholder') }}"
                           class="w-full bg-darkBg border border-gold/20 rounded-lg px-4 py-2 text-light placeholder:text-gray-500 focus:border-gold/50 focus:outline-none">
                </div>
                <div>
                    <label for="vcard-lastname" class="text-light font-semibold mb-2 block">{{ __($t . '.vcard_lastname') }}</label>
                    <input type="text" id="vcard-lastname" placeholder="{{ __($t . '.vcard_lastname_placeholder') }}"
                           class="w-full bg-darkBg border border-gold/20 rounded-lg px-4 py-2 text-light placeholder:text-gray-500 focus:border-gold/50 focus:outline-none">
                </div>
                <div>
                    <label for="vcard-mobile" class="text-light font-semibold mb-2 block">{{ __($t . '.vcard_mobile') }}</label>
                    <input type="tel" id="vcard-mobile" placeholder="+1234567890"
                           class="w-full bg-darkBg border border-gold/20 rounded-lg px-4 py-2 text-light placeholder:text-gray-500 focus:border-gold/50 focus:outline-none">
                </div>
                <div>
                    <label for="vcard-email" class="text-light font-semibold mb-2 block">{{ __($t . '.vcard_email') }}</label>
                    <input type="email" id="vcard-email" placeholder="mario@esempio.com"
                           class="w-full bg-darkBg border border-gold/20 rounded-lg px-4 py-2 text-light placeholder:text-gray-500 focus:border-gold/50 focus:outline-none">
                </div>
                <div>
                    <label for="vcard-company" class="text-light font-semibold mb-2 block">{{ __($t . '.vcard_company') }}</label>
                    <input type="text" id="vcard-company" placeholder="{{ __($t . '.vcard_company_placeholder') }}"
                           class="w-full bg-darkBg border border-gold/20 rounded-lg px-4 py-2 text-light placeholder:text-gray-500 focus:border-gold/50 focus:outline-none">
                </div>
                <div>
                    <label for="vcard-title" class="text-light font-semibold mb-2 block">{{ __($t . '.vcard_title') }}</label>
                    <input type="text" id="vcard-title" placeholder="{{ __($t . '.vcard_title_placeholder') }}"
                           class="w-full bg-darkBg border border-gold/20 rounded-lg px-4 py-2 text-light placeholder:text-gray-500 focus:border-gold/50 focus:outline-none">
                </div>
                <div class="md:col-span-2">
                    <label for="vcard-website" class="text-light font-semibold mb-2 block">{{ __($t . '.vcard_website') }}</label>
                    <input type="url" id="vcard-website" placeholder="https://esempio.com"
                           class="w-full bg-darkBg border border-gold/20 rounded-lg px-4 py-2 text-light placeholder:text-gray-500 focus:border-gold/50 focus:outline-none">
                </div>
            </div>
        </div>

        {{-- Email Form --}}
        <div id="form-email" class="form-section hidden">
            <div class="space-y-4">
                <div>
                    <label for="email-to" class="text-light font-semibold mb-2 block">{{ __($t . '.email_to') }}</label>
                    <input type="email" id="email-to" placeholder="destinatario@esempio.com"
                           class="w-full bg-darkBg border border-gold/20 rounded-lg px-4 py-2 text-light placeholder:text-gray-500 focus:border-gold/50 focus:outline-none">
                </div>
                <div>
                    <label for="email-subject" class="text-light font-semibold mb-2 block">{{ __($t . '.email_subject') }}</label>
                    <input type="text" id="email-subject" placeholder="{{ __($t . '.email_subject_placeholder') }}"
                           class="w-full bg-darkBg border border-gold/20 rounded-lg px-4 py-2 text-light placeholder:text-gray-500 focus:border-gold/50 focus:outline-none">
                </div>
                <div>
                    <label for="email-body" class="text-light font-semibold mb-2 block">{{ __($t . '.email_body') }}</label>
                    <textarea id="email-body" rows="4" placeholder="{{ __($t . '.email_body_placeholder') }}"
                              class="w-full bg-darkBg border border-gold/20 rounded-lg px-4 py-3 text-light placeholder:text-gray-500 focus:border-gold/50 focus:outline-none resize-none"></textarea>
                </div>
            </div>
        </div>

        {{-- SMS Form --}}
        <div id="form-sms" class="form-section hidden">
            <div class="space-y-4">
                <div>
                    <label for="sms-phone" class="text-light font-semibold mb-2 block">{{ __($t . '.sms_phone') }}</label>
                    <input type="tel" id="sms-phone" placeholder="+1234567890"
                           class="w-full bg-darkBg border border-gold/20 rounded-lg px-4 py-2 text-light placeholder:text-gray-500 focus:border-gold/50 focus:outline-none">
                </div>
                <div>
                    <label for="sms-message" class="text-light font-semibold mb-2 block">{{ __($t . '.sms_message') }}</label>
                    <textarea id="sms-message" rows="4" placeholder="{{ __($t . '.sms_message_placeholder') }}"
                              class="w-full bg-darkBg border border-gold/20 rounded-lg px-4 py-3 text-light placeholder:text-gray-500 focus:border-gold/50 focus:outline-none resize-none"></textarea>
                </div>
            </div>
        </div>

        {{-- Phone Form --}}
        <div id="form-phone" class="form-section hidden">
            <div>
                <label for="phone-number" class="text-light font-semibold mb-2 block">{{ __($t . '.phone_number') }}</label>
                <input type="tel" id="phone-number" placeholder="+1234567890"
                       class="w-full bg-darkBg border border-gold/20 rounded-lg px-4 py-2 text-light placeholder:text-gray-500 focus:border-gold/50 focus:outline-none">
            </div>
        </div>
    </div>

    {{-- Right Column: QR Preview & Customization --}}
    <div>
        {{-- QR Code Preview --}}
        <div class="mb-6">
            <label class="text-light font-semibold mb-3 block">{{ __($t . '.qr_preview') }}</label>
            <div class="bg-white rounded-lg p-6 flex items-center justify-center min-h-[300px]">
                <div id="qr-container" class="hidden">
                    <canvas id="qr-canvas"></canvas>
                </div>
                <div id="qr-placeholder" class="text-center text-gray-400">
                    <svg class="w-16 h-16 mx-auto mb-2 opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 20h4M4 12h4m12 0h.01M5 8h2a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1zm12 0h2a1 1 0 001-1V5a1 1 0 00-1-1h-2a1 1 0 00-1 1v2a1 1 0 001 1zM5 20h2a1 1 0 001-1v-2a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1z"></path></svg>
                    <p class="text-sm">{{ __($t . '.fill_details') }}</p>
                </div>
            </div>
        </div>

        {{-- Customization Options --}}
        <div class="space-y-4 mb-6">
            <div>
                <label for="qr-size" class="text-light font-semibold mb-2 block">{{ __($t . '.size') }}: <span id="size-value">256px</span></label>
                <select id="qr-size" class="w-full bg-darkBg border border-gold/20 rounded-lg px-4 py-2 text-light focus:border-gold/50 focus:outline-none cursor-pointer">
                    <option value="128">128 × 128</option>
                    <option value="256" selected>256 × 256</option>
                    <option value="512">512 × 512</option>
                    <option value="1024">1024 × 1024</option>
                </select>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="text-light font-semibold mb-2 block">{{ __($t . '.foreground') }}</label>
                    <div class="flex items-center gap-2">
                        <input type="color" id="qr-fg-color" value="#000000"
                               class="w-12 h-10 rounded border border-gold/20 bg-darkBg cursor-pointer">
                        <input type="text" id="fg-color-input" value="#000000" maxlength="7" placeholder="#000000"
                               class="flex-1 bg-darkBg border border-gold/20 rounded-lg px-3 py-2 text-light text-sm font-mono placeholder:text-gray-500 focus:border-gold/50 focus:outline-none">
                    </div>
                </div>
                <div>
                    <label class="text-light font-semibold mb-2 block">{{ __($t . '.background') }}</label>
                    <div class="flex items-center gap-2">
                        <input type="color" id="qr-bg-color" value="#ffffff"
                               class="w-12 h-10 rounded border border-gold/20 bg-darkBg cursor-pointer">
                        <input type="text" id="bg-color-input" value="#FFFFFF" maxlength="7" placeholder="#FFFFFF"
                               class="flex-1 bg-darkBg border border-gold/20 rounded-lg px-3 py-2 text-light text-sm font-mono placeholder:text-gray-500 focus:border-gold/50 focus:outline-none">
                    </div>
                </div>
            </div>
        </div>

        {{-- Action Buttons --}}
        <div class="flex flex-wrap gap-3">
            <button id="btn-download-png" class="px-6 py-3 bg-gold text-darkBg font-semibold rounded-lg hover:bg-gold-light transition-all duration-300 flex items-center gap-2 cursor-pointer disabled:opacity-50 disabled:cursor-not-allowed" disabled>
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                {{ __($t . '.download_png') }}
            </button>
            <button id="btn-download-svg" class="px-6 py-3 border border-gold/50 text-light rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer disabled:opacity-50 disabled:cursor-not-allowed" disabled>
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                {{ __($t . '.download_svg') }}
            </button>
            <button id="btn-copy" class="px-6 py-3 border border-gold/50 text-light rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer disabled:opacity-50 disabled:cursor-not-allowed" disabled>
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                {{ __($t . '.copy') }}
            </button>
        </div>

        {{-- Success/Error Notifications --}}
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
    </div>
</div>
