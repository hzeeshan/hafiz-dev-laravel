@push('scripts')
<script>
(function() {
    const stringsEl = document.getElementById('tool-strings');
    const S = {
        sample_text: stringsEl?.dataset.sampleText || 'Hello World! Bubble text is fun.',
        copied: stringsEl?.dataset.copied || 'Copied to clipboard!',
        default_preview: stringsEl?.dataset.defaultPreview || 'Hello World',
    };

    // Outlined bubble: Ⓐ-Ⓩ (U+24B6-U+24CF), ⓐ-ⓩ (U+24D0-U+24E9), ⓪-⑨
    // Filled bubble: 🅐-🅩 (U+1F150-U+1F169), no lowercase (use uppercase)
    const outlinedUpper = {};
    const outlinedLower = {};
    const outlinedNumbers = {};
    const filledUpper = {};

    // Build maps
    for (let i = 0; i < 26; i++) {
        outlinedUpper[String.fromCharCode(65 + i)] = String.fromCodePoint(0x24B6 + i);
        outlinedLower[String.fromCharCode(97 + i)] = String.fromCodePoint(0x24D0 + i);
        filledUpper[String.fromCharCode(65 + i)] = String.fromCodePoint(0x1F150 + i);
    }
    // Numbers: ⓪①②③④⑤⑥⑦⑧⑨
    const circledDigits = ['⓪', '①', '②', '③', '④', '⑤', '⑥', '⑦', '⑧', '⑨'];
    for (let i = 0; i <= 9; i++) {
        outlinedNumbers[String(i)] = circledDigits[i];
    }
    // Filled numbers: ⓿❶❷❸❹❺❻❼❽❾
    const filledDigits = ['⓿', '❶', '❷', '❸', '❹', '❺', '❻', '❼', '❽', '❾'];

    const textInput = document.getElementById('text-input');
    const textOutput = document.getElementById('text-output');
    const styleRadios = document.querySelectorAll('input[name="style"]');
    const btnCopy = document.getElementById('btn-copy');
    const btnSample = document.getElementById('btn-sample');
    const btnClear = document.getElementById('btn-clear');
    const statsBar = document.getElementById('stats-bar');
    const successNotification = document.getElementById('success-notification');
    const successMessage = document.getElementById('success-message');

    function getStyle() {
        return document.querySelector('input[name="style"]:checked').value;
    }

    function toBubble(text, style) {
        let converted = 0, unchanged = 0;

        const result = [...text].map(ch => {
            if (style === 'outlined') {
                if (outlinedUpper[ch]) { converted++; return outlinedUpper[ch]; }
                if (outlinedLower[ch]) { converted++; return outlinedLower[ch]; }
                if (outlinedNumbers[ch] !== undefined) { converted++; return outlinedNumbers[ch]; }
            } else {
                // Filled — uppercase only, convert lowercase to uppercase
                const upper = ch.toUpperCase();
                if (filledUpper[upper]) { converted++; return filledUpper[upper]; }
                const digit = parseInt(ch);
                if (!isNaN(digit) && ch.trim()) { converted++; return filledDigits[digit]; }
            }
            unchanged++;
            return ch;
        }).join('');

        return { result, converted, unchanged };
    }

    function convert() {
        const text = textInput.value;
        if (!text) {
            textOutput.value = '';
            statsBar.classList.add('hidden');
            updatePreviews(S.default_preview);
            return;
        }

        const style = getStyle();
        const { result, converted, unchanged } = toBubble(text, style);
        textOutput.value = result;

        document.getElementById('stat-chars').textContent = [...text].length;
        document.getElementById('stat-converted').textContent = converted;
        document.getElementById('stat-unchanged').textContent = unchanged;
        statsBar.classList.remove('hidden');

        updatePreviews(text.length > 40 ? text.substring(0, 40) : text);
    }

    function updatePreviews(text) {
        document.getElementById('preview-outlined').textContent = toBubble(text, 'outlined').result;
        document.getElementById('preview-filled').textContent = toBubble(text, 'filled').result;
    }

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
    });

    updatePreviews(S.default_preview);
})();
</script>
@endpush
