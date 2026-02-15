@push('scripts')
<script>
(function() {
    const stringsEl = document.getElementById('tool-strings');
    const S = {
        sample_text: stringsEl?.dataset.sampleText || 'Hello World! This text is upside down.',
        copied: stringsEl?.dataset.copied || 'Copied to clipboard!',
        default_original: stringsEl?.dataset.defaultOriginal || 'Hello World!',
        default_flipped: stringsEl?.dataset.defaultFlipped || '¡plɹoM ollǝH',
        reverse_text: stringsEl?.dataset.reverseText || 'Reverse text order',
        flip_numbers: stringsEl?.dataset.flipNumbers || 'Flip numbers',
        flip_punctuation: stringsEl?.dataset.flipPunctuation || 'Flip punctuation',
    };

    // Upside down character maps
    const flipMap = {
        'a': 'ɐ', 'b': 'q', 'c': 'ɔ', 'd': 'p', 'e': 'ǝ', 'f': 'ɟ', 'g': 'ƃ',
        'h': 'ɥ', 'i': 'ᴉ', 'j': 'ɾ', 'k': 'ʞ', 'l': 'l', 'm': 'ɯ', 'n': 'u',
        'o': 'o', 'p': 'd', 'q': 'b', 'r': 'ɹ', 's': 's', 't': 'ʇ', 'u': 'n',
        'v': 'ʌ', 'w': 'ʍ', 'x': 'x', 'y': 'ʎ', 'z': 'z',
        'A': '∀', 'B': 'ꓭ', 'C': 'Ɔ', 'D': 'ꓷ', 'E': 'Ǝ', 'F': 'Ⅎ', 'G': 'פ',
        'H': 'H', 'I': 'I', 'J': 'ſ', 'K': 'ꓘ', 'L': '˥', 'M': 'W', 'N': 'N',
        'O': 'O', 'P': 'Ԁ', 'Q': 'Ọ', 'R': 'ꓤ', 'S': 'S', 'T': '⊥', 'U': '∩',
        'V': 'Λ', 'W': 'M', 'X': 'X', 'Y': '⅄', 'Z': 'Z'
    };

    const flipNumbers = {
        '0': '0', '1': 'Ɩ', '2': 'ᄅ', '3': 'Ɛ', '4': 'ㄣ',
        '5': 'ϛ', '6': '9', '7': 'ㄥ', '8': '8', '9': '6'
    };

    const flipPunctuation = {
        '.': '˙', ',': '\'', '\'': ',', '"': '„', '`': ',',
        '!': '¡', '?': '¿', '(': ')', ')': '(', '[': ']', ']': '[',
        '{': '}', '}': '{', '<': '>', '>': '<', '&': '⅋',
        '_': '‾', ';': '؛', '∴': '∵'
    };

    // DOM Elements
    const textInput = document.getElementById('text-input');
    const textOutput = document.getElementById('text-output');
    const optReverse = document.getElementById('opt-reverse');
    const optFlipNumbers = document.getElementById('opt-flip-numbers');
    const optFlipPunctuation = document.getElementById('opt-flip-punctuation');
    const btnCopy = document.getElementById('btn-copy');
    const btnSample = document.getElementById('btn-sample');
    const btnClear = document.getElementById('btn-clear');
    const statsBar = document.getElementById('stats-bar');
    const previewOriginal = document.getElementById('preview-original');
    const previewFlipped = document.getElementById('preview-flipped');
    const successNotification = document.getElementById('success-notification');
    const successMessage = document.getElementById('success-message');

    function flipText(text) {
        let flippedCount = 0;
        let unchangedCount = 0;

        const chars = [...text].map(ch => {
            if (flipMap[ch]) { flippedCount++; return flipMap[ch]; }
            if (optFlipNumbers.checked && flipNumbers[ch]) { flippedCount++; return flipNumbers[ch]; }
            if (optFlipPunctuation.checked && flipPunctuation[ch]) { flippedCount++; return flipPunctuation[ch]; }
            unchangedCount++;
            return ch;
        });

        const result = optReverse.checked ? chars.reverse().join('') : chars.join('');

        return { result, flippedCount, unchangedCount };
    }

    function convert() {
        const text = textInput.value;
        if (!text) {
            textOutput.value = '';
            statsBar.classList.add('hidden');
            previewOriginal.textContent = S.default_original;
            previewFlipped.textContent = S.default_flipped;
            return;
        }

        const { result, flippedCount, unchangedCount } = flipText(text);
        textOutput.value = result;

        // Stats
        document.getElementById('stat-chars').textContent = [...text].length;
        document.getElementById('stat-flipped').textContent = flippedCount;
        document.getElementById('stat-unchanged').textContent = unchangedCount;
        statsBar.classList.remove('hidden');

        // Preview
        const previewText = text.length > 60 ? text.substring(0, 60) + '…' : text;
        const previewResult = result.length > 60 ? result.substring(0, 60) + '…' : result;
        previewOriginal.textContent = previewText;
        previewFlipped.textContent = previewResult;
    }

    function showSuccess(msg) {
        successMessage.textContent = msg;
        successNotification.classList.remove('hidden');
        setTimeout(() => successNotification.classList.add('hidden'), 3000);
    }

    // Event listeners
    textInput.addEventListener('input', convert);
    [optReverse, optFlipNumbers, optFlipPunctuation].forEach(el => {
        el.addEventListener('change', convert);
    });

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
        previewOriginal.textContent = S.default_original;
        previewFlipped.textContent = S.default_flipped;
        successNotification.classList.add('hidden');
    });
})();
</script>
@endpush
