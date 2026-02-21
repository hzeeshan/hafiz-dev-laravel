<script>
(function() {
    // Superscript Unicode mappings - letters
    const letterMap = {
        'a': 'ᵃ', 'b': 'ᵇ', 'c': 'ᶜ', 'd': 'ᵈ', 'e': 'ᵉ', 'f': 'ᶠ', 'g': 'ᵍ',
        'h': 'ʰ', 'i': 'ⁱ', 'j': 'ʲ', 'k': 'ᵏ', 'l': 'ˡ', 'm': 'ᵐ', 'n': 'ⁿ',
        'o': 'ᵒ', 'p': 'ᵖ', 'q': 'ᵠ', 'r': 'ʳ', 's': 'ˢ', 't': 'ᵗ', 'u': 'ᵘ',
        'v': 'ᵛ', 'w': 'ʷ', 'x': 'ˣ', 'y': 'ʸ', 'z': 'ᶻ',
        'A': 'ᴬ', 'B': 'ᴮ', 'C': 'ᶜ', 'D': 'ᴰ', 'E': 'ᴱ', 'F': 'ᶠ', 'G': 'ᴳ',
        'H': 'ᴴ', 'I': 'ᴵ', 'J': 'ᴶ', 'K': 'ᴷ', 'L': 'ᴸ', 'M': 'ᴹ', 'N': 'ᴺ',
        'O': 'ᴼ', 'P': 'ᴾ', 'Q': 'ᵠ', 'R': 'ᴿ', 'S': 'ˢ', 'T': 'ᵀ', 'U': 'ᵁ',
        'V': 'ⱽ', 'W': 'ᵂ', 'X': 'ˣ', 'Y': 'ʸ', 'Z': 'ᶻ'
    };

    // Superscript Unicode mappings - numbers
    const numberMap = {
        '0': '⁰', '1': '¹', '2': '²', '3': '³', '4': '⁴',
        '5': '⁵', '6': '⁶', '7': '⁷', '8': '⁸', '9': '⁹'
    };

    // Superscript Unicode mappings - symbols
    const symbolMap = {
        '+': '⁺', '-': '⁻', '=': '⁼', '(': '⁽', ')': '⁾'
    };

    const SAMPLE_TEXT = 'Hello World! Superscript text is great for math like x2 + y3 = z5 and footnotes.';

    // Cache DOM elements
    const textInput = document.getElementById('text-input');
    const textOutput = document.getElementById('text-output');
    const optNumbers = document.getElementById('opt-numbers');
    const optSymbols = document.getElementById('opt-symbols');
    const btnCopy = document.getElementById('btn-copy');
    const btnDownload = document.getElementById('btn-download');
    const btnSample = document.getElementById('btn-sample');
    const btnClear = document.getElementById('btn-clear');
    const statsBar = document.getElementById('stats-bar');
    const statChars = document.getElementById('stat-chars');
    const statConverted = document.getElementById('stat-converted');
    const statUnchanged = document.getElementById('stat-unchanged');
    const successNotification = document.getElementById('success-notification');
    const successMessage = document.getElementById('success-message');
    const errorNotification = document.getElementById('error-notification');
    const errorMessage = document.getElementById('error-message');

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

    function buildMap() {
        const map = { ...letterMap };
        if (optNumbers.checked) Object.assign(map, numberMap);
        if (optSymbols.checked) Object.assign(map, symbolMap);
        return map;
    }

    function toSuperscript(text) {
        const map = buildMap();
        let converted = 0;
        let unchanged = 0;

        const result = [...text].map(ch => {
            if (map[ch]) {
                converted++;
                return map[ch];
            }
            // Spaces and newlines count as unchanged but are expected
            unchanged++;
            return ch;
        }).join('');

        return { result, converted, unchanged };
    }

    // Real-time conversion on input
    textInput.addEventListener('input', function() {
        const text = textInput.value;
        if (!text) {
            textOutput.value = '';
            statsBar.classList.add('hidden');
            errorNotification.classList.add('hidden');
            return;
        }
        errorNotification.classList.add('hidden');
        const { result, converted, unchanged } = toSuperscript(text);
        textOutput.value = result;
        statChars.textContent = [...text].length;
        statConverted.textContent = converted;
        statUnchanged.textContent = unchanged;
        statsBar.classList.remove('hidden');
    });

    // Option changes trigger re-conversion
    optNumbers.addEventListener('change', function() {
        if (textInput.value) {
            const { result, converted, unchanged } = toSuperscript(textInput.value);
            textOutput.value = result;
            statConverted.textContent = converted;
            statUnchanged.textContent = unchanged;
        }
    });

    optSymbols.addEventListener('change', function() {
        if (textInput.value) {
            const { result, converted, unchanged } = toSuperscript(textInput.value);
            textOutput.value = result;
            statConverted.textContent = converted;
            statUnchanged.textContent = unchanged;
        }
    });

    // Copy to clipboard
    btnCopy.addEventListener('click', function() {
        const output = textOutput.value;
        if (!output) {
            showError('Nothing to copy. Convert some text first.');
            return;
        }
        navigator.clipboard.writeText(output).then(() => {
            const orig = btnCopy.innerHTML;
            btnCopy.innerHTML = '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> Copied!';
            btnCopy.classList.add('text-green-400', 'border-green-400');
            showSuccess('Copied to clipboard!');
            setTimeout(() => {
                btnCopy.innerHTML = orig;
                btnCopy.classList.remove('text-green-400', 'border-green-400');
            }, 2000);
        });
    });

    // Download as text file
    btnDownload.addEventListener('click', function() {
        const output = textOutput.value;
        if (!output) {
            showError('Nothing to download. Convert some text first.');
            return;
        }
        const blob = new Blob([output], { type: 'text/plain;charset=utf-8' });
        const url = URL.createObjectURL(blob);
        const a = document.createElement('a');
        a.href = url;
        a.download = 'superscript-text.txt';
        document.body.appendChild(a);
        a.click();
        document.body.removeChild(a);
        URL.revokeObjectURL(url);
        showSuccess('File downloaded!');
    });

    // Sample text
    btnSample.addEventListener('click', function() {
        textInput.value = SAMPLE_TEXT;
        const { result, converted, unchanged } = toSuperscript(SAMPLE_TEXT);
        textOutput.value = result;
        statChars.textContent = [...SAMPLE_TEXT].length;
        statConverted.textContent = converted;
        statUnchanged.textContent = unchanged;
        statsBar.classList.remove('hidden');
        errorNotification.classList.add('hidden');
    });

    // Clear
    btnClear.addEventListener('click', function() {
        textInput.value = '';
        textOutput.value = '';
        statsBar.classList.add('hidden');
        successNotification.classList.add('hidden');
        errorNotification.classList.add('hidden');
    });

    // Keyboard shortcut: Ctrl/Cmd + Enter to copy
    document.addEventListener('keydown', function(e) {
        if ((e.ctrlKey || e.metaKey) && e.key === 'Enter') {
            e.preventDefault();
            btnCopy.click();
        }
    });
})();
</script>
