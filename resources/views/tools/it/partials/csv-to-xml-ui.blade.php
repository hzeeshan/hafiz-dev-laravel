{{-- Options --}}
<div class="mb-6 p-4 bg-darkBg rounded-lg border border-gold/10">
    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-4 mb-4">
        <div>
            <label for="delimiter" class="text-light font-semibold mb-2 block text-sm">{{ __($t . '.delimiter') }}</label>
            <select id="delimiter" class="w-full bg-darkCard border border-gold/20 rounded-lg px-3 py-2 text-light text-sm focus:border-gold/50 focus:outline-none cursor-pointer">
                <option value=",">{{ __($t . '.comma') }}</option>
                <option value=";">{{ __($t . '.semicolon') }}</option>
                <option value="\t">{{ __($t . '.tab') }}</option>
                <option value="|">{{ __($t . '.pipe') }}</option>
            </select>
        </div>
        <div>
            <label for="root-element" class="text-light font-semibold mb-2 block text-sm">{{ __($t . '.root_element') }}</label>
            <input type="text" id="root-element" class="w-full bg-darkCard border border-gold/20 rounded-lg px-3 py-2 text-light text-sm font-mono focus:border-gold/50 focus:outline-none" value="data" spellcheck="false">
        </div>
        <div>
            <label for="row-element" class="text-light font-semibold mb-2 block text-sm">{{ __($t . '.row_element') }}</label>
            <input type="text" id="row-element" class="w-full bg-darkCard border border-gold/20 rounded-lg px-3 py-2 text-light text-sm font-mono focus:border-gold/50 focus:outline-none" value="record" spellcheck="false">
        </div>
    </div>
    <div class="flex flex-wrap gap-6">
        <label class="flex items-center gap-2 cursor-pointer">
            <input type="checkbox" id="first-row-header" checked class="w-4 h-4 rounded border-gray-600 bg-darkBg text-gold focus:ring-gold focus:ring-offset-0 cursor-pointer">
            <span class="text-sm text-light-muted">{{ __($t . '.first_row_header') }}</span>
        </label>
        <label class="flex items-center gap-2 cursor-pointer">
            <input type="checkbox" id="use-attributes" class="w-4 h-4 rounded border-gray-600 bg-darkBg text-gold focus:ring-gold focus:ring-offset-0 cursor-pointer">
            <span class="text-sm text-light-muted">{{ __($t . '.values_as_attributes') }}</span>
        </label>
        <label class="flex items-center gap-2 cursor-pointer">
            <input type="checkbox" id="use-cdata" class="w-4 h-4 rounded border-gray-600 bg-darkBg text-gold focus:ring-gold focus:ring-offset-0 cursor-pointer">
            <span class="text-sm text-light-muted">{{ __($t . '.wrap_cdata') }}</span>
        </label>
        <label class="flex items-center gap-2 cursor-pointer">
            <input type="checkbox" id="include-declaration" checked class="w-4 h-4 rounded border-gray-600 bg-darkBg text-gold focus:ring-gold focus:ring-offset-0 cursor-pointer">
            <span class="text-sm text-light-muted">{{ __($t . '.xml_declaration') }}</span>
        </label>
        <label class="flex items-center gap-2 cursor-pointer">
            <input type="checkbox" id="minify-output" class="w-4 h-4 rounded border-gray-600 bg-darkBg text-gold focus:ring-gold focus:ring-offset-0 cursor-pointer">
            <span class="text-sm text-light-muted">{{ __($t . '.minify_output') }}</span>
        </label>
    </div>
</div>

{{-- Input / Output --}}
<div class="grid lg:grid-cols-2 gap-4 mb-6">
    {{-- Input --}}
    <div class="flex flex-col">
        <div class="flex items-center justify-between mb-2">
            <label for="csv-input" class="text-light font-semibold flex items-center gap-2">
                <svg class="w-4 h-4 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                {{ __($t . '.csv_input') }}
            </label>
            <label class="px-3 py-1 border border-gold/30 text-light-muted rounded-lg hover:bg-gold/10 hover:text-gold transition-all text-xs flex items-center gap-1 cursor-pointer">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path></svg>
                {{ __($t . '.upload_csv') }}
                <input type="file" id="file-upload" accept=".csv,.tsv,.txt" class="hidden">
            </label>
        </div>
        <textarea
            id="csv-input"
            class="flex-1 min-h-[320px] bg-darkBg border border-gold/20 rounded-lg p-4 font-mono text-sm text-light placeholder-light-muted/50 focus:border-gold focus:outline-none focus:ring-1 focus:ring-gold/30 resize-none"
            placeholder="{{ __($t . '.csv_placeholder') }}"
            spellcheck="false"
        ></textarea>
    </div>

    {{-- Output --}}
    <div class="flex flex-col">
        <label class="text-light font-semibold mb-2 flex items-center gap-2">
            <svg class="w-4 h-4 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path></svg>
            {{ __($t . '.xml_output') }}
        </label>
        <textarea
            id="xml-output"
            class="flex-1 min-h-[320px] bg-darkBg border border-gold/20 rounded-lg p-4 font-mono text-sm text-light placeholder-light-muted/50 focus:border-gold/50 focus:outline-none resize-none"
            placeholder="{{ __($t . '.xml_placeholder') }}"
            readonly
        ></textarea>
    </div>
</div>

{{-- Action Buttons --}}
<div class="flex flex-wrap gap-3 mb-6">
    <button id="btn-convert" class="px-6 py-3 bg-gold text-darkBg font-semibold rounded-lg hover:bg-gold-light transition-all duration-300 flex items-center gap-2 cursor-pointer">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
        {{ __($t . '.convert_to_xml') }}
    </button>
    <button id="btn-copy" class="px-4 py-3 border border-gold/50 text-light rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
        {{ __($t . '.copy') }}
    </button>
    <button id="btn-download" class="px-4 py-3 border border-gold/50 text-light rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
        {{ __($t . '.download_xml') }}
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

{{-- Stats --}}
<div id="stats-bar" class="hidden bg-darkBg rounded-lg p-4 border border-gold/10">
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
        <div class="text-center">
            <div id="stat-rows" class="text-2xl font-bold text-gold mb-1">0</div>
            <div class="text-light-muted text-sm">{{ __($t . '.rows') }}</div>
        </div>
        <div class="text-center">
            <div id="stat-cols" class="text-2xl font-bold text-light mb-1">0</div>
            <div class="text-light-muted text-sm">{{ __($t . '.columns') }}</div>
        </div>
        <div class="text-center">
            <div id="stat-input-size" class="text-2xl font-bold text-light mb-1">0</div>
            <div class="text-light-muted text-sm">{{ __($t . '.input_size') }}</div>
        </div>
        <div class="text-center">
            <div id="stat-output-size" class="text-2xl font-bold text-light mb-1">0</div>
            <div class="text-light-muted text-sm">{{ __($t . '.output_size') }}</div>
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
