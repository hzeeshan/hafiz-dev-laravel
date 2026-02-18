<script>
(function() {
    const S = document.getElementById('tool-strings')?.dataset || {};

    const SAMPLE_TEXT = S.sample_text || 'The quick brown fox jumps over the lazy dog.\nPack my box with five dozen liquor jugs.\nHow vexingly quick daft zebras jump!';

    // DOM Elements
    const textInput = document.getElementById('text-input');
    const textOutput = document.getElementById('text-output');
    const optCharacters = document.getElementById('opt-characters');
    const optWords = document.getElementById('opt-words');
    const optPerWord = document.getElementById('opt-per-word');
    const optPerLine = document.getElementById('opt-per-line');
    const btnGenerate = document.getElementById('btn-generate');
    const btnCopy = document.getElementById('btn-copy');
    const btnDownload = document.getElementById('btn-download');
    const btnSample = document.getElementById('btn-sample');
    const btnClear = document.getElementById('btn-clear');
    const statsBar = document.getElementById('stats-bar');
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
        setTimeout(() => errorNotification.classList.add('hidden'), 3000);
    }

    function reverseString(str) {
        return [...str].reverse().join('');
    }

    function reverseText(text) {
        const reverseChars = optCharacters.checked;
        const perWord = optPerWord.checked;
        const perLine = optPerLine.checked;

        let result = text;

        if (perLine) {
            const lines = result.split('\n');
            result = lines.reverse().join('\n');
        }

        if (reverseChars && !perWord) {
            // Reverse entire text character by character
            result = reverseString(result);
        } else if (!reverseChars && !perWord) {
            // Reverse word order
            const lines = result.split('\n');
            result = lines.map(line => line.split(/(\s+)/).filter(s => s.trim().length > 0).reverse().join(' ')).join('\n');
        }

        if (perWord) {
            // Reverse each word individually
            const lines = result.split('\n');
            result = lines.map(line => {
                return line.split(/(\s+)/).map(part => {
                    if (part.trim().length === 0) return part;
                    return reverseString(part);
                }).join('');
            }).join('\n');
        }

        return result;
    }

    function getModeName() {
        const parts = [];
        if (optCharacters.checked) parts.push(S.mode_chars || 'Chars');
        if (optWords.checked) parts.push(S.mode_words || 'Words');
        if (optPerWord.checked) parts.push(S.mode_each || '+Each');
        if (optPerLine.checked) parts.push(S.mode_lines || '+Lines');
        return parts.join(' ') || (S.mode_chars || 'Chars');
    }

    function convert() {
        const text = textInput.value;
        if (!text.trim()) {
            showError(S.error_empty || 'Please enter some text to reverse.');
            return;
        }

        errorNotification.classList.add('hidden');
        const result = reverseText(text);
        textOutput.value = result;

        // Stats
        const chars = [...text].length;
        const words = text.trim().split(/\s+/).filter(w => w.length > 0).length;
        const lines = text.split('\n').length;

        document.getElementById('stat-chars').textContent = chars;
        document.getElementById('stat-words').textContent = words;
        document.getElementById('stat-lines').textContent = lines;
        document.getElementById('stat-mode').textContent = getModeName();
        statsBar.classList.remove('hidden');
    }

    // Event listeners
    btnGenerate.addEventListener('click', convert);

    // Keyboard shortcut: Ctrl/Cmd + Enter
    textInput.addEventListener('keydown', function(e) {
        if ((e.ctrlKey || e.metaKey) && e.key === 'Enter') {
            e.preventDefault();
            convert();
        }
    });

    // Option changes trigger re-conversion if output exists
    [optCharacters, optWords, optPerWord, optPerLine].forEach(el => {
        el.addEventListener('change', function() {
            if (textOutput.value) convert();
        });
    });

    btnCopy.addEventListener('click', function() {
        const output = textOutput.value;
        if (!output) return;
        navigator.clipboard.writeText(output).then(() => {
            const orig = this.innerHTML;
            this.innerHTML = '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> ' + (S.copied_label || 'Copied!');
            this.classList.add('text-green-400', 'border-green-400');
            showSuccess(S.copied || 'Copied to clipboard!');
            setTimeout(() => {
                this.innerHTML = orig;
                this.classList.remove('text-green-400', 'border-green-400');
            }, 2000);
        });
    });

    btnDownload.addEventListener('click', function() {
        const output = textOutput.value;
        if (!output) return;
        const blob = new Blob([output], { type: 'text/plain' });
        const url = URL.createObjectURL(blob);
        const a = document.createElement('a');
        a.href = url;
        a.download = 'backward-text.txt';
        a.click();
        URL.revokeObjectURL(url);
        showSuccess(S.downloaded || 'File downloaded!');
    });

    btnSample.addEventListener('click', function() {
        textInput.value = SAMPLE_TEXT;
        convert();
    });

    btnClear.addEventListener('click', function() {
        textInput.value = '';
        textOutput.value = '';
        statsBar.classList.add('hidden');
        successNotification.classList.add('hidden');
        errorNotification.classList.add('hidden');
    });
})();
</script>
