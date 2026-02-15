@push('scripts')
<script>
(function() {
    const stringsEl = document.getElementById('tool-strings');
    const S = {
        sample_text: stringsEl?.dataset.sampleText || 'This text has been crossed out.',
        copied: stringsEl?.dataset.copied || 'Copied to clipboard!',
        default_preview: stringsEl?.dataset.defaultPreview || 'Hello World',
        style_single: stringsEl?.dataset.styleSingle || 'Single',
        style_double: stringsEl?.dataset.styleDouble || 'Double',
        style_tilde: stringsEl?.dataset.styleTilde || 'Tilde',
        style_slash: stringsEl?.dataset.styleSlash || 'Slash',
    };

    // Strikethrough combining characters
    const strikeChars = {
        single: '\u0336',  // Combining long stroke overlay
        double: '\u0333',  // Combining double low line
        tilde:  '\u0334',  // Combining tilde overlay
        slash:  '\u0338'   // Combining long solidus overlay
    };

    // DOM Elements
    const textInput = document.getElementById('text-input');
    const textOutput = document.getElementById('text-output');
    const styleRadios = document.querySelectorAll('input[name="style"]');
    const btnCopy = document.getElementById('btn-copy');
    const btnSample = document.getElementById('btn-sample');
    const btnClear = document.getElementById('btn-clear');
    const statsBar = document.getElementById('stats-bar');
    const successNotification = document.getElementById('success-notification');
    const successMessage = document.getElementById('success-message');

    const styleNames = {
        single: S.style_single,
        double: S.style_double,
        tilde: S.style_tilde,
        slash: S.style_slash
    };

    function getSelectedStyle() {
        return document.querySelector('input[name="style"]:checked').value;
    }

    function applyStrike(text, style) {
        const combChar = strikeChars[style];
        return [...text].map(ch => ch + combChar).join('');
    }

    function convert() {
        const text = textInput.value;
        if (!text) {
            textOutput.value = '';
            statsBar.classList.add('hidden');
            updatePreviews(S.default_preview);
            return;
        }

        const style = getSelectedStyle();
        textOutput.value = applyStrike(text, style);

        // Stats
        document.getElementById('stat-chars').textContent = [...text].length;
        document.getElementById('stat-style').textContent = styleNames[style];
        statsBar.classList.remove('hidden');

        // Previews
        updatePreviews(text.length > 40 ? text.substring(0, 40) + '…' : text);
    }

    function updatePreviews(text) {
        document.getElementById('preview-single').textContent = applyStrike(text, 'single');
        document.getElementById('preview-double').textContent = applyStrike(text, 'double');
        document.getElementById('preview-tilde').textContent = applyStrike(text, 'tilde');
        document.getElementById('preview-slash').textContent = applyStrike(text, 'slash');
    }

    // Event listeners
    textInput.addEventListener('input', convert);
    styleRadios.forEach(r => r.addEventListener('change', convert));

    btnCopy.addEventListener('click', function() {
        const output = textOutput.value;
        if (!output) return;
        navigator.clipboard.writeText(output).then(() => {
            const orig = this.innerHTML;
            this.innerHTML = '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> ' + S.copied;
            this.classList.add('text-green-400', 'border-green-400');
            successNotification.classList.remove('hidden');
            successMessage.textContent = S.copied;
            setTimeout(() => {
                this.innerHTML = orig;
                this.classList.remove('text-green-400', 'border-green-400');
                successNotification.classList.add('hidden');
            }, 2000);
        });
    });

    btnSample.addEventListener('click', function() {
        textInput.value = S.sample_text;
        convert();
    });

    btnClear.addEventListener('click', function() {
        textInput.value = '';
        textOutput.value = '';
        statsBar.classList.add('hidden');
        updatePreviews(S.default_preview);
        successNotification.classList.add('hidden');
    });

    // Initialize previews
    updatePreviews(S.default_preview);
})();
</script>
@endpush
