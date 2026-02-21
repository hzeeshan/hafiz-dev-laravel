@push('scripts')
<script>
(function() {
    const SAMPLE_TEXT = 'Hello World! Welcome to Wingdings.';

    // Gaster quotes from Undertale
    const gasterQuotes = [
        'ENTRY NUMBER SEVENTEEN',
        'DARK DARKER YET DARKER',
        'THE DARKNESS KEEPS GROWING',
        'THE SHADOWS CUTTING DEEPER',
        'PHOTON READINGS NEGATIVE',
        'THIS NEXT EXPERIMENT SEEMS',
        'VERY VERY INTERESTING',
        'WHAT DO YOU TWO THINK'
    ];

    // Wingdings 1: ASCII char (32-126) -> Unicode symbol
    // Maps printable ASCII characters to their Wingdings 1 Unicode equivalents
    const wingdings1Map = {
        ' ': ' ',
        '!': '\u270F', // pencil
        '"': '\u2702', // scissors
        '#': '\u2701', // upper blade scissors
        '$': '\u{1F453}', // eyeglasses (using emoji fallback)
        '%': '\u{1F514}', // bell
        '&': '\u{1F4E3}', // megaphone/cheering
        "'": '\u{1F4AA}', // flexed biceps
        '(': '\u{1F44C}', // OK hand
        ')': '\u{1F44D}', // thumbs up
        '*': '\u{1F44E}', // thumbs down
        '+': '\u261C', // pointing left
        ',': '\u261E', // pointing right
        '-': '\u261D', // pointing up
        '.': '\u261F', // pointing down
        '/': '\u270C', // victory hand
        '0': '\u{1F44A}', // fist
        '1': '\u2639', // frowning face (was 263A in some maps)
        '2': '\u263A', // smiling face
        '3': '\u{2600}', // sun
        '4': '\u{1F322}', // droplet
        '5': '\u2744', // snowflake
        '6': '\u271E', // shadowed cross
        '7': '\u2720', // maltese cross
        '8': '\u2721', // star of david
        '9': '\u2606', // white star
        ':': '\u2736', // six pointed star
        ';': '\u2734', // eight pointed star
        '<': '\u2739', // twelve pointed star
        '=': '\u2735', // eight pointed pinwheel star
        '>': '\u2738', // heavy eight pointed star
        '?': '\u2747', // sparkle
        '@': '\u{1F549}', // om symbol
        'A': '\u2701', // upper blade scissors
        'B': '\u2702', // scissors
        'C': '\u2703', // lower blade scissors
        'D': '\u2704', // white scissors
        'E': '\u260E', // telephone
        'F': '\u2706', // telephone location sign
        'G': '\u2707', // tape drive
        'H': '\u2708', // airplane
        'I': '\u2709', // envelope
        'J': '\u270D', // writing hand
        'K': '\u270E', // pencil right
        'L': '\u270F', // pencil
        'M': '\u2710', // upper right pencil
        'N': '\u2711', // white nib
        'O': '\u2712', // black nib
        'P': '\u2713', // check mark
        'Q': '\u2714', // heavy check mark
        'R': '\u2715', // multiplication x
        'S': '\u2716', // heavy multiplication x
        'T': '\u2717', // ballot x
        'U': '\u2718', // heavy ballot x
        'V': '\u2719', // outlined greek cross
        'W': '\u271A', // heavy greek cross
        'X': '\u271B', // open centre cross
        'Y': '\u271C', // heavy open centre cross
        'Z': '\u271D', // latin cross
        '[': '\u271E', // shadowed white latin cross
        '\\': '\u271F', // outlined latin cross
        ']': '\u2720', // maltese cross
        '^': '\u2721', // star of david
        '_': '\u2722', // four teardrop spoked asterisk
        '`': '\u2723', // four balloon spoked asterisk
        'a': '\u2724', // heavy four balloon spoked asterisk
        'b': '\u2725', // four club spoked asterisk
        'c': '\u2726', // black four pointed star
        'd': '\u2727', // white four pointed star
        'e': '\u2605', // black star
        'f': '\u2729', // stress outlined white star
        'g': '\u272A', // circled white star
        'h': '\u272B', // open centre black star
        'i': '\u272C', // black centre white star
        'j': '\u272D', // outlined black star
        'k': '\u272E', // heavy outlined black star
        'l': '\u272F', // pinwheel star
        'm': '\u2730', // shadowed white star
        'n': '\u2731', // heavy asterisk
        'o': '\u2732', // open centre asterisk
        'p': '\u2733', // eight spoked asterisk
        'q': '\u2734', // eight pointed black star
        'r': '\u2735', // eight pointed pinwheel star
        's': '\u2736', // six pointed black star
        't': '\u2737', // eight pointed rectilinear star
        'u': '\u2738', // heavy eight pointed rectilinear star
        'v': '\u2739', // twelve pointed black star
        'w': '\u273A', // sixteen pointed asterisk
        'x': '\u273B', // teardrop spoked asterisk
        'y': '\u273C', // open centre teardrop spoked asterisk
        'z': '\u273D', // heavy teardrop spoked asterisk
        '{': '\u273E', // six petalled black and white florette
        '|': '\u273F', // black florette
        '}': '\u2740', // white florette
        '~': '\u2741'  // eight petalled outlined black florette
    };

    // Wingdings 2: selected mappings (common characters)
    const wingdings2Map = {
        ' ': ' ',
        '!': '\u{1F589}', // lower left pencil
        '"': '\u2702', // scissors
        '#': '\u2708', // airplane
        '$': '\u2744', // snowflake
        '%': '\u271E', // shadowed cross
        '&': '\u2605', // black star
        "'": '\u2606', // white star
        '(': '\u25CB', // white circle
        ')': '\u25CF', // black circle
        '*': '\u25A0', // black square
        '+': '\u25A1', // white square
        ',': '\u25B2', // black up triangle
        '-': '\u25BC', // black down triangle
        '.': '\u25C6', // black diamond
        '/': '\u25C7', // white diamond
        '0': '\u2780', // dingbat circled 1
        '1': '\u2781', // dingbat circled 2
        '2': '\u2782', // dingbat circled 3
        '3': '\u2783', // dingbat circled 4
        '4': '\u2784', // dingbat circled 5
        '5': '\u2785', // dingbat circled 6
        '6': '\u2786', // dingbat circled 7
        '7': '\u2787', // dingbat circled 8
        '8': '\u2788', // dingbat circled 9
        '9': '\u2789', // dingbat circled 10
        ':': '\u278A', // dingbat negative circled 1
        ';': '\u278B', // dingbat negative circled 2
        '<': '\u278C', // dingbat negative circled 3
        '=': '\u278D', // dingbat negative circled 4
        '>': '\u278E', // dingbat negative circled 5
        '?': '\u278F', // dingbat negative circled 6
        '@': '\u2790', // dingbat negative circled 7
        'A': '\u2460', // circled 1
        'B': '\u2461', // circled 2
        'C': '\u2462', // circled 3
        'D': '\u2463', // circled 4
        'E': '\u2464', // circled 5
        'F': '\u2465', // circled 6
        'G': '\u2466', // circled 7
        'H': '\u2467', // circled 8
        'I': '\u2468', // circled 9
        'J': '\u2469', // circled 10
        'K': '\u24B6', // circled A
        'L': '\u24B7', // circled B
        'M': '\u24B8', // circled C
        'N': '\u24B9', // circled D
        'O': '\u24BA', // circled E
        'P': '\u24BB', // circled F
        'Q': '\u24BC', // circled G
        'R': '\u24BD', // circled H
        'S': '\u24BE', // circled I
        'T': '\u24BF', // circled J
        'U': '\u24C0', // circled K
        'V': '\u24C1', // circled L
        'W': '\u24C2', // circled M
        'X': '\u24C3', // circled N
        'Y': '\u24C4', // circled O
        'Z': '\u24C5', // circled P
        '[': '\u24C6', // circled Q
        '\\': '\u24C7', // circled R
        ']': '\u24C8', // circled S
        '^': '\u24C9', // circled T
        '_': '\u24CA', // circled U
        '`': '\u24CB', // circled V
        'a': '\u24CC', // circled W
        'b': '\u24CD', // circled X
        'c': '\u24CE', // circled Y
        'd': '\u24CF', // circled Z
        'e': '\u2776', // dingbat negative circled 1
        'f': '\u2777', // dingbat negative circled 2
        'g': '\u2778', // dingbat negative circled 3
        'h': '\u2779', // dingbat negative circled 4
        'i': '\u277A', // dingbat negative circled 5
        'j': '\u277B', // dingbat negative circled 6
        'k': '\u277C', // dingbat negative circled 7
        'l': '\u277D', // dingbat negative circled 8
        'm': '\u277E', // dingbat negative circled 9
        'n': '\u277F', // dingbat negative circled 10
        'o': '\u25CB', // white circle
        'p': '\u25CF', // black circle
        'q': '\u25D0', // circle left half black
        'r': '\u25D1', // circle right half black
        's': '\u25D2', // circle bottom half black
        't': '\u25D3', // circle top half black
        'u': '\u25A0', // black square
        'v': '\u25A1', // white square
        'w': '\u25B3', // white up triangle
        'x': '\u25B2', // black up triangle
        'y': '\u25BD', // white down triangle
        'z': '\u25BC', // black down triangle
        '{': '\u25C6', // black diamond
        '|': '\u25C7', // white diamond
        '}': '\u2756', // black diamond minus white X
        '~': '\u2318'  // place of interest sign
    };

    // Wingdings 3: arrow-focused mappings
    const wingdings3Map = {
        ' ': ' ',
        '!': '\u2190', // left arrow
        '"': '\u2191', // up arrow
        '#': '\u2192', // right arrow
        '$': '\u2193', // down arrow
        '%': '\u2194', // left right arrow
        '&': '\u2195', // up down arrow
        "'": '\u2196', // NW arrow
        '(': '\u2197', // NE arrow
        ')': '\u2198', // SE arrow
        '*': '\u2199', // SW arrow
        '+': '\u21D0', // left double arrow
        ',': '\u21D1', // up double arrow
        '-': '\u21D2', // right double arrow
        '.': '\u21D3', // down double arrow
        '/': '\u21D4', // left right double arrow
        '0': '\u21D5', // up down double arrow
        '1': '\u21E6', // leftwards white arrow
        '2': '\u21E7', // upwards white arrow
        '3': '\u21E8', // rightwards white arrow
        '4': '\u21E9', // downwards white arrow
        '5': '\u2B05', // leftwards black arrow
        '6': '\u2B06', // upwards black arrow
        '7': '\u27A1', // rightwards black arrow
        '8': '\u2B07', // downwards black arrow
        '9': '\u2B08', // NE black arrow
        ':': '\u2B09', // NW black arrow
        ';': '\u2B0A', // NE black arrow
        '<': '\u2B0B', // SE black arrow
        '=': '\u25B6', // black right-pointing triangle
        '>': '\u25C0', // black left-pointing triangle
        '?': '\u25B2', // black up-pointing triangle
        '@': '\u25BC', // black down-pointing triangle
        'A': '\u25B7', // white right-pointing triangle
        'B': '\u25C1', // white left-pointing triangle
        'C': '\u25B3', // white up-pointing triangle
        'D': '\u25BD', // white down-pointing triangle
        'E': '\u25E2', // black lower right triangle
        'F': '\u25E3', // black lower left triangle
        'G': '\u25E4', // black upper left triangle
        'H': '\u25E5', // black upper right triangle
        'I': '\u2B12', // square with top half black
        'J': '\u2B13', // square with bottom half black
        'K': '\u25E7', // square left half black
        'L': '\u25E8', // square right half black
        'M': '\u2B14', // square with upper right diagonal half black
        'N': '\u2B15', // square with lower left diagonal half black
        'O': '\u25F0', // white square upper left quadrant
        'P': '\u25F1', // white square lower left quadrant
        'Q': '\u25F2', // white square lower right quadrant
        'R': '\u25F3', // white square upper right quadrant
        'S': '\u2B1A', // dotted square
        'T': '\u29C8', // squared square
        'U': '\u25A3', // white square containing small black square
        'V': '\u2B1B', // black large square
        'W': '\u2B1C', // white large square
        'X': '\u25A0', // black small square
        'Y': '\u25A1', // white small square
        'Z': '\u25AA', // black very small square
        '[': '\u25AB', // white very small square
        '\\': '\u25C6', // black diamond
        ']': '\u25C7', // white diamond
        '^': '\u2B25', // black medium diamond
        '_': '\u2B26', // white medium diamond
        '`': '\u2B27', // black medium lozenge
        'a': '\u27A2', // three-d top-lighted rightwards arrowhead
        'b': '\u27B3', // white-feathered rightwards arrow
        'c': '\u27A5', // curved downwards and rightwards arrow
        'd': '\u27A6', // curved rightwards and downwards arrow
        'e': '\u27A8', // heavy concave-pointed black rightwards arrow
        'f': '\u27A9', // right-shaded white rightwards arrow
        'g': '\u27AA', // left-shaded white rightwards arrow
        'h': '\u27AB', // back-tilted shadowed white rightwards arrow
        'i': '\u27AC', // front-tilted shadowed white rightwards arrow
        'j': '\u27AD', // heavy lower right-shadowed white rightwards arrow
        'k': '\u27AE', // heavy upper right-shadowed white rightwards arrow
        'l': '\u27AF', // notched lower right-shadowed white rightwards arrow
        'm': '\u27B1', // notched upper right-shadowed white rightwards arrow
        'n': '\u27B2', // circled heavy white rightwards arrow
        'o': '\u2794', // heavy wide-headed rightwards arrow
        'p': '\u2799', // drafting point rightwards arrow
        'q': '\u279B', // heavy round-tipped rightwards arrow
        'r': '\u279C', // triangle-headed rightwards arrow
        's': '\u279D', // heavy triangle-headed rightwards arrow
        't': '\u279E', // dashed triangle-headed rightwards arrow
        'u': '\u279F', // heavy dashed triangle-headed rightwards arrow
        'v': '\u27A0', // heavy dashed triangle-headed rightwards arrow
        'w': '\u27A1', // black rightwards arrow
        'x': '\u27A4', // black rightwards arrowhead
        'y': '\u27A7', // squat black rightwards arrow
        'z': '\u27B5', // sans-serif downwards arrow
        '{': '\u27B6', // wide-headed rightwards barb arrow
        '|': '\u27B7', // wide-headed downwards barb arrow
        '}': '\u27B8', // wide-headed north east barb arrow
        '~': '\u27B9'  // wide-headed south east barb arrow
    };

    const fontMaps = {
        wingdings1: wingdings1Map,
        wingdings2: wingdings2Map,
        wingdings3: wingdings3Map
    };

    const fontNames = {
        wingdings1: 'WD1',
        wingdings2: 'WD2',
        wingdings3: 'WD3'
    };

    // Build reverse maps for decoding
    function buildReverseMap(forwardMap) {
        const reverse = {};
        for (const [key, val] of Object.entries(forwardMap)) {
            if (key !== ' ' && val !== ' ') {
                reverse[val] = key;
            }
        }
        return reverse;
    }

    const reverseMaps = {
        wingdings1: buildReverseMap(wingdings1Map),
        wingdings2: buildReverseMap(wingdings2Map),
        wingdings3: buildReverseMap(wingdings3Map)
    };

    // DOM Elements
    const textInput = document.getElementById('text-input');
    const textOutput = document.getElementById('text-output');
    const directionSelect = document.getElementById('translate-direction');
    const fontSelect = document.getElementById('wingdings-font');
    const inputLabel = document.getElementById('input-label');
    const outputLabel = document.getElementById('output-label');
    const btnConvert = document.getElementById('btn-convert');
    const btnCopy = document.getElementById('btn-copy');
    const btnDownload = document.getElementById('btn-download');
    const btnSample = document.getElementById('btn-sample');
    const btnGaster = document.getElementById('btn-gaster');
    const btnClear = document.getElementById('btn-clear');
    const statsBar = document.getElementById('stats-bar');
    const successNotification = document.getElementById('success-notification');
    const successMessage = document.getElementById('success-message');
    const errorNotification = document.getElementById('error-notification');
    const errorMessage = document.getElementById('error-message');
    const charRefTable = document.getElementById('char-ref-table');

    // Translatable strings from #tool-strings data attributes (Italian) or English defaults
    const stringsEl = document.getElementById('tool-strings');
    const S = {
        enter_text: stringsEl?.dataset.enterText || 'Please enter some text to translate.',
        nothing_copy: stringsEl?.dataset.nothingCopy || 'Nothing to copy. Translate text first.',
        copied: stringsEl?.dataset.copied || 'Copied to clipboard!',
        nothing_download: stringsEl?.dataset.nothingDownload || 'Nothing to download. Translate text first.',
        downloaded: stringsEl?.dataset.downloaded || 'Downloaded wingdings-translation.txt',
        btn_copied: stringsEl?.dataset.btnCopied || 'Copied!',
        gaster_loaded: stringsEl?.dataset.gasterLoaded || 'Gaster quote loaded: "{quote}"',
        your_text: stringsEl?.dataset.yourText || 'Your Text',
        wingdings_output: stringsEl?.dataset.wingdingsOutput || 'Wingdings Output',
        wingdings_input: stringsEl?.dataset.wingdingsInput || 'Wingdings Input',
        english_output: stringsEl?.dataset.englishOutput || 'English Output',
        placeholder_type: stringsEl?.dataset.placeholderType || 'Type or paste your text here...',
        placeholder_wingdings: stringsEl?.dataset.placeholderWingdings || 'Wingdings symbols will appear here...',
        placeholder_paste: stringsEl?.dataset.placeholderPaste || 'Paste Wingdings symbols here...',
        placeholder_translated: stringsEl?.dataset.placeholderTranslated || 'Translated English text will appear here...',
    };

    let gasterIndex = 0;

    function showSuccess(msg) {
        successMessage.textContent = msg;
        successNotification.classList.remove('hidden');
        errorNotification.classList.add('hidden');
        setTimeout(() => successNotification.classList.add('hidden'), 3000);
    }

    function showError(msg) {
        errorMessage.textContent = msg;
        errorNotification.classList.remove('hidden');
        successNotification.classList.add('hidden');
        setTimeout(() => errorNotification.classList.add('hidden'), 5000);
    }

    function translateToWingdings(text, fontMap) {
        return [...text].map(ch => fontMap[ch] || ch).join('');
    }

    function translateToEnglish(text, reverseMap) {
        let result = '';
        const chars = [...text]; // handle multi-byte Unicode properly
        for (let i = 0; i < chars.length; i++) {
            const ch = chars[i];
            if (ch === ' ' || ch === '\n' || ch === '\t') {
                result += ch;
            } else if (reverseMap[ch]) {
                result += reverseMap[ch];
            } else {
                // Try combining with next char for emoji sequences
                if (i + 1 < chars.length) {
                    const combined = ch + chars[i + 1];
                    if (reverseMap[combined]) {
                        result += reverseMap[combined];
                        i++;
                        continue;
                    }
                }
                result += ch;
            }
        }
        return result;
    }

    function translate() {
        const text = textInput.value;
        if (!text.trim()) {
            showError(S.enter_text);
            textOutput.value = '';
            statsBar.classList.add('hidden');
            return;
        }

        errorNotification.classList.add('hidden');
        const direction = directionSelect.value;
        const font = fontSelect.value;
        let result;

        if (direction === 'to-wingdings') {
            result = translateToWingdings(text, fontMaps[font]);
        } else {
            result = translateToEnglish(text, reverseMaps[font]);
        }

        textOutput.value = result;

        // Update stats
        document.getElementById('stat-input-chars').textContent = [...text].length;
        document.getElementById('stat-output-chars').textContent = [...result].length;
        document.getElementById('stat-font').textContent = fontNames[font];
        statsBar.classList.remove('hidden');
    }

    function updateLabels() {
        const direction = directionSelect.value;
        if (direction === 'to-wingdings') {
            inputLabel.textContent = S.your_text;
            outputLabel.textContent = S.wingdings_output;
            textInput.placeholder = S.placeholder_type;
            textOutput.placeholder = S.placeholder_wingdings;
        } else {
            inputLabel.textContent = S.wingdings_input;
            outputLabel.textContent = S.english_output;
            textInput.placeholder = S.placeholder_paste;
            textOutput.placeholder = S.placeholder_translated;
        }
    }

    function populateRefTable() {
        const font = fontSelect.value;
        const map = fontMaps[font];
        charRefTable.innerHTML = '';

        // Show printable ASCII chars and their Wingdings equivalents
        const chars = [];
        for (let i = 33; i <= 126; i++) {
            const ascii = String.fromCharCode(i);
            if (map[ascii] && map[ascii] !== ascii) {
                chars.push({ ascii, symbol: map[ascii] });
            }
        }

        chars.forEach(({ ascii, symbol }) => {
            const cell = document.createElement('div');
            cell.className = 'bg-darkBg rounded-lg p-2 border border-gold/10 hover:border-gold/30 transition-colors cursor-default';
            cell.innerHTML = '<div class="text-lg mb-1">' + symbol + '</div><div class="text-xs text-light-muted">' + ascii.replace('<', '&lt;').replace('>', '&gt;').replace('&', '&amp;') + '</div>';
            cell.title = 'ASCII: ' + ascii + ' = ' + symbol;
            charRefTable.appendChild(cell);
        });
    }

    // Event listeners
    btnConvert.addEventListener('click', translate);

    directionSelect.addEventListener('change', function() {
        updateLabels();
    });

    fontSelect.addEventListener('change', function() {
        populateRefTable();
    });

    // Keyboard shortcut: Ctrl/Cmd + Enter
    textInput.addEventListener('keydown', function(e) {
        if ((e.ctrlKey || e.metaKey) && e.key === 'Enter') {
            e.preventDefault();
            translate();
        }
    });

    btnCopy.addEventListener('click', function() {
        const output = textOutput.value;
        if (!output) {
            showError(S.nothing_copy);
            return;
        }
        navigator.clipboard.writeText(output).then(() => {
            const orig = this.innerHTML;
            this.innerHTML = '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> ' + S.btn_copied;
            this.classList.add('text-green-400', 'border-green-400');
            showSuccess(S.copied);
            setTimeout(() => {
                this.innerHTML = orig;
                this.classList.remove('text-green-400', 'border-green-400');
            }, 2000);
        });
    });

    btnDownload.addEventListener('click', function() {
        const output = textOutput.value;
        if (!output) {
            showError(S.nothing_download);
            return;
        }
        const blob = new Blob([output], { type: 'text/plain' });
        const url = URL.createObjectURL(blob);
        const a = document.createElement('a');
        a.href = url;
        a.download = 'wingdings-translation.txt';
        document.body.appendChild(a);
        a.click();
        document.body.removeChild(a);
        URL.revokeObjectURL(url);
        showSuccess(S.downloaded);
    });

    btnSample.addEventListener('click', function() {
        directionSelect.value = 'to-wingdings';
        updateLabels();
        textInput.value = SAMPLE_TEXT;
        translate();
    });

    btnGaster.addEventListener('click', function() {
        // Cycle through Gaster quotes
        const quote = gasterQuotes[gasterIndex % gasterQuotes.length];
        gasterIndex++;

        // Set to Wingdings 1 and English to Wingdings direction
        fontSelect.value = 'wingdings1';
        directionSelect.value = 'to-wingdings';
        updateLabels();
        populateRefTable();

        textInput.value = quote;
        translate();
        showSuccess(S.gaster_loaded.replace('{quote}', quote));
    });

    btnClear.addEventListener('click', function() {
        textInput.value = '';
        textOutput.value = '';
        statsBar.classList.add('hidden');
        successNotification.classList.add('hidden');
        errorNotification.classList.add('hidden');
    });

    // Initialize
    updateLabels();
    populateRefTable();
})();
</script>
@endpush
