@push('scripts')
<script>
(function() {
    const stringsEl = document.getElementById('tool-strings');
    const S = {
        sample_text: stringsEl?.dataset.sampleText || 'Make your text stand out with bold and italic styles!\n\nPerfect for social media posts, bios, and comments.',
        preview_default: stringsEl?.dataset.previewDefault || 'Hello World',
        nothing_to_copy: stringsEl?.dataset.nothingToCopy || 'Nothing to copy. Type some text first.',
        copied_btn: stringsEl?.dataset.copiedBtn || 'Copied!',
        copied: stringsEl?.dataset.copied || 'Copied to clipboard!',
        nothing_to_download: stringsEl?.dataset.nothingToDownload || 'Nothing to download. Type some text first.',
        downloaded: stringsEl?.dataset.downloaded || 'Downloaded as bold-italic-text.txt',
    };

    // Unicode Mathematical Alphanumeric Symbols mappings
    function buildRange(upperStart, lowerStart, digitStart) {
        const map = {};
        if (upperStart) {
            for (let i = 0; i < 26; i++) {
                map[String.fromCharCode(65 + i)] = String.fromCodePoint(upperStart + i);
            }
        }
        if (lowerStart) {
            for (let i = 0; i < 26; i++) {
                map[String.fromCharCode(97 + i)] = String.fromCodePoint(lowerStart + i);
            }
        }
        if (digitStart) {
            for (let i = 0; i < 10; i++) {
                map[String(i)] = String.fromCodePoint(digitStart + i);
            }
        }
        return map;
    }

    const styles = {
        'bold': buildRange(0x1D400, 0x1D41A, 0x1D7CE),
        'italic': Object.assign(buildRange(0x1D434, 0x1D44E, null), { 'h': '\u210E' }),
        'bold-italic': buildRange(0x1D468, 0x1D482, null),
        'sans-bold': buildRange(0x1D5D4, 0x1D5EE, 0x1D7EC),
        'sans-italic': buildRange(0x1D608, 0x1D622, null),
    };

    // DOM elements
    const textInput = document.getElementById('text-input');
    const textOutput = document.getElementById('text-output');
    const styleRadios = document.querySelectorAll('input[name="text-style"]');
    const btnCopy = document.getElementById('btn-copy');
    const btnDownload = document.getElementById('btn-download');
    const btnSample = document.getElementById('btn-sample');
    const btnClear = document.getElementById('btn-clear');
    const statsBar = document.getElementById('stats-bar');
    const successNotification = document.getElementById('success-notification');
    const successMessage = document.getElementById('success-message');
    const errorNotification = document.getElementById('error-notification');
    const errorMessage = document.getElementById('error-message');
    const previewGrid = document.getElementById('style-preview-grid');

    function getSelectedStyle() {
        return document.querySelector('input[name="text-style"]:checked').value;
    }

    function convertText(text, styleName) {
        const map = styles[styleName];
        if (!map) return { result: text, converted: 0, unchanged: text.length };

        let converted = 0;
        let unchanged = 0;

        const result = [...text].map(ch => {
            if (map[ch]) {
                converted++;
                return map[ch];
            }
            unchanged++;
            return ch;
        }).join('');

        return { result, converted, unchanged };
    }

    function convert() {
        const text = textInput.value;
        errorNotification.classList.add('hidden');

        if (!text) {
            textOutput.value = '';
            statsBar.classList.add('hidden');
            updatePreviews(S.preview_default);
            return;
        }

        const styleName = getSelectedStyle();
        const { result, converted, unchanged } = convertText(text, styleName);
        textOutput.value = result;

        document.getElementById('stat-chars').textContent = [...text].length;
        document.getElementById('stat-converted').textContent = converted;
        document.getElementById('stat-unchanged').textContent = unchanged;
        statsBar.classList.remove('hidden');

        updatePreviews(text.length > 30 ? text.substring(0, 30) : text);
    }

    function updatePreviews(text) {
        Object.keys(styles).forEach(name => {
            const el = document.getElementById('preview-' + name);
            if (el) {
                el.textContent = convertText(text, name).result;
            }
        });
    }

    function showSuccess(msg) {
        successMessage.textContent = msg;
        successNotification.classList.remove('hidden');
        setTimeout(() => successNotification.classList.add('hidden'), 3000);
    }

    function showError(msg) {
        errorMessage.textContent = msg;
        errorNotification.classList.remove('hidden');
        setTimeout(() => errorNotification.classList.add('hidden'), 5000);
    }

    // Real-time conversion on input
    textInput.addEventListener('input', convert);
    styleRadios.forEach(r => r.addEventListener('change', convert));

    // Click preview card to switch style
    previewGrid.addEventListener('click', function(e) {
        const card = e.target.closest('[data-style]');
        if (!card) return;
        const style = card.dataset.style;
        const radio = document.querySelector('input[name="text-style"][value="' + style + '"]');
        if (radio) {
            radio.checked = true;
            convert();
        }
    });

    // Keyboard shortcut: Ctrl/Cmd+Enter to copy
    document.addEventListener('keydown', function(e) {
        if ((e.ctrlKey || e.metaKey) && e.key === 'Enter') {
            e.preventDefault();
            btnCopy.click();
        }
    });

    btnCopy.addEventListener('click', function() {
        const output = textOutput.value;
        if (!output) {
            showError(S.nothing_to_copy);
            return;
        }
        navigator.clipboard.writeText(output).then(() => {
            const orig = this.innerHTML;
            this.innerHTML = '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> ' + S.copied_btn;
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
            showError(S.nothing_to_download);
            return;
        }
        const blob = new Blob([output], { type: 'text/plain' });
        const url = URL.createObjectURL(blob);
        const a = document.createElement('a');
        a.href = url;
        a.download = 'bold-italic-text.txt';
        document.body.appendChild(a);
        a.click();
        document.body.removeChild(a);
        URL.revokeObjectURL(url);
        showSuccess(S.downloaded);
    });

    btnSample.addEventListener('click', function() {
        textInput.value = S.sample_text;
        convert();
    });

    btnClear.addEventListener('click', function() {
        textInput.value = '';
        textOutput.value = '';
        statsBar.classList.add('hidden');
        successNotification.classList.add('hidden');
        errorNotification.classList.add('hidden');
        updatePreviews(S.preview_default);
    });

    // Initialize previews
    updatePreviews(S.preview_default);
})();
</script>
@endpush
