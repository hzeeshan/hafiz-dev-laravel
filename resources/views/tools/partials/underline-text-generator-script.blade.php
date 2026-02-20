@push('scripts')
<script>
(function() {
    const SAMPLE_TEXT = 'Hello World! This text is underlined.';
    const SINGLE_UNDERLINE = '\u0332'; // U+0332 Combining Low Line
    const DOUBLE_UNDERLINE = '\u0333'; // U+0333 Combining Double Low Line

    // DOM Elements
    const textInput = document.getElementById('text-input');
    const textOutput = document.getElementById('text-output');
    const btnCopy = document.getElementById('btn-copy');
    const btnDownload = document.getElementById('btn-download');
    const btnSample = document.getElementById('btn-sample');
    const btnClear = document.getElementById('btn-clear');
    const statsBar = document.getElementById('stats-bar');
    const previewSingle = document.getElementById('preview-single');
    const previewDouble = document.getElementById('preview-double');
    const successNotification = document.getElementById('success-notification');
    const successMessage = document.getElementById('success-message');
    const errorNotification = document.getElementById('error-notification');
    const errorMessage = document.getElementById('error-message');
    const styleRadios = document.querySelectorAll('input[name="style"]');

    function getStyle() {
        const checked = document.querySelector('input[name="style"]:checked');
        return checked ? checked.value : 'single';
    }

    function underlineText(text, combiningChar) {
        let underlinedCount = 0;
        let unchangedCount = 0;

        const result = [...text].map(ch => {
            // Don't add combining character to newlines, carriage returns, or existing combining chars
            if (ch === '\n' || ch === '\r' || ch === '\t') {
                unchangedCount++;
                return ch;
            }
            underlinedCount++;
            return ch + combiningChar;
        }).join('');

        return { result, underlinedCount, unchangedCount };
    }

    function convert() {
        const text = textInput.value;
        errorNotification.classList.add('hidden');

        if (!text) {
            textOutput.value = '';
            statsBar.classList.add('hidden');
            updatePreviews('Hello World');
            return;
        }

        const style = getStyle();
        const combiningChar = style === 'double' ? DOUBLE_UNDERLINE : SINGLE_UNDERLINE;
        const { result, underlinedCount, unchangedCount } = underlineText(text, combiningChar);

        textOutput.value = result;

        // Stats
        document.getElementById('stat-chars').textContent = [...text].length;
        document.getElementById('stat-underlined').textContent = underlinedCount;
        document.getElementById('stat-unchanged').textContent = unchangedCount;
        statsBar.classList.remove('hidden');

        // Update previews
        updatePreviews(text);
    }

    function updatePreviews(text) {
        const previewText = text.length > 40 ? text.substring(0, 40) + '...' : text;
        const singleResult = underlineText(previewText, SINGLE_UNDERLINE).result;
        const doubleResult = underlineText(previewText, DOUBLE_UNDERLINE).result;
        previewSingle.textContent = singleResult;
        previewDouble.textContent = doubleResult;
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

    // Style change triggers re-conversion
    styleRadios.forEach(radio => {
        radio.addEventListener('change', convert);
    });

    // Keyboard shortcut: Ctrl/Cmd+Enter
    textInput.addEventListener('keydown', function(e) {
        if ((e.ctrlKey || e.metaKey) && e.key === 'Enter') {
            e.preventDefault();
            convert();
        }
    });

    // Copy
    btnCopy.addEventListener('click', function() {
        const output = textOutput.value;
        if (!output) {
            showError('Nothing to copy. Enter some text first.');
            return;
        }
        navigator.clipboard.writeText(output).then(() => {
            const orig = this.innerHTML;
            this.innerHTML = '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> Copied!';
            this.classList.add('text-green-400', 'border-green-400');
            showSuccess('Copied to clipboard!');
            setTimeout(() => {
                this.innerHTML = orig;
                this.classList.remove('text-green-400', 'border-green-400');
            }, 2000);
        });
    });

    // Download
    btnDownload.addEventListener('click', function() {
        const output = textOutput.value;
        if (!output) {
            showError('Nothing to download. Enter some text first.');
            return;
        }
        const blob = new Blob([output], { type: 'text/plain;charset=utf-8' });
        const url = URL.createObjectURL(blob);
        const a = document.createElement('a');
        a.href = url;
        a.download = 'underlined-text.txt';
        document.body.appendChild(a);
        a.click();
        document.body.removeChild(a);
        URL.revokeObjectURL(url);
        showSuccess('File downloaded!');
    });

    // Sample
    btnSample.addEventListener('click', function() {
        textInput.value = SAMPLE_TEXT;
        convert();
    });

    // Clear
    btnClear.addEventListener('click', function() {
        textInput.value = '';
        textOutput.value = '';
        statsBar.classList.add('hidden');
        successNotification.classList.add('hidden');
        errorNotification.classList.add('hidden');
        updatePreviews('Hello World');
    });

    // Initialize previews
    updatePreviews('Hello World');
})();
</script>
@endpush
