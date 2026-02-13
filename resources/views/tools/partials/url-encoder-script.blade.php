<script>
(function() {
    // Get translatable strings from data attributes (for Italian/other locales)
    const stringsEl = document.getElementById('tool-strings');
    const S = {
        encodeTab: stringsEl?.dataset.encodeTab || 'Encode',
        decodeTab: stringsEl?.dataset.decodeTab || 'Decode',
        encodingType: stringsEl?.dataset.encodingType || 'Encoding Type',
        componentLabel: stringsEl?.dataset.componentLabel || 'encodeURIComponent',
        componentDesc: stringsEl?.dataset.componentDesc || '(recommended for query params)',
        uriLabel: stringsEl?.dataset.uriLabel || 'encodeURI',
        uriDesc: stringsEl?.dataset.uriDesc || '(preserves URL structure)',
        encodeBtn: stringsEl?.dataset.encodeBtn || 'Encode',
        decodeBtn: stringsEl?.dataset.decodeBtn || 'Decode',
        swap: stringsEl?.dataset.swap || 'Swap',
        copy: stringsEl?.dataset.copy || 'Copy',
        sample: stringsEl?.dataset.sample || 'Sample',
        clear: stringsEl?.dataset.clear || 'Clear',
        inputLabelEncode: stringsEl?.dataset.inputLabelEncode || 'Text to Encode',
        inputLabelDecode: stringsEl?.dataset.inputLabelDecode || 'Text to Decode',
        outputLabelEncode: stringsEl?.dataset.outputLabelEncode || 'Encoded Result',
        outputLabelDecode: stringsEl?.dataset.outputLabelDecode || 'Decoded Result',
        inputPlaceholderEncode: stringsEl?.dataset.inputPlaceholderEncode || 'Enter text or URL to encode...',
        inputPlaceholderDecode: stringsEl?.dataset.inputPlaceholderDecode || 'Enter URL-encoded string to decode...',
        outputPlaceholder: stringsEl?.dataset.outputPlaceholder || 'Result will appear here...',
        statusReady: stringsEl?.dataset.statusReady || 'Ready',
        swapNothing: stringsEl?.dataset.swapNothing || 'Nothing to swap. Convert something first.',
        copyNothing: stringsEl?.dataset.copyNothing || 'Nothing to copy. Convert something first.',
        copyFail: stringsEl?.dataset.copyFail || 'Failed to copy to clipboard',
        copied: stringsEl?.dataset.copied || 'Copied!',
        encodeSuccess: stringsEl?.dataset.encodeSuccess || 'Encoded successfully using {type}! Output is {n} characters.',
        decodeSuccess: stringsEl?.dataset.decodeSuccess || 'Decoded successfully! Output is {n} characters.',
        decodeError: stringsEl?.dataset.decodeError || 'Invalid URL-encoded string. The input contains malformed percent-encoding sequences.',
        swappedStatus: stringsEl?.dataset.swappedStatus || 'Swapped and converted',
        inputLabel: stringsEl?.dataset.inputLabel || 'Input',
        outputLabel: stringsEl?.dataset.outputLabel || 'Output',
        changedLabel: stringsEl?.dataset.changedLabel || 'Changed',
        keyboardHint: stringsEl?.dataset.keyboardHint || 'convert',
    };

    // DOM Elements
    const urlInput = document.getElementById('url-input');
    const urlOutput = document.getElementById('url-output');
    const tabEncode = document.getElementById('tab-encode');
    const tabDecode = document.getElementById('tab-decode');
    const encodingOptions = document.getElementById('encoding-options');
    const btnConvert = document.getElementById('btn-convert');
    const btnConvertText = document.getElementById('btn-convert-text');
    const btnSwap = document.getElementById('btn-swap');
    const btnCopy = document.getElementById('btn-copy');
    const btnSample = document.getElementById('btn-sample');
    const btnClear = document.getElementById('btn-clear');
    const inputLabel = document.getElementById('input-label');
    const outputLabel = document.getElementById('output-label');
    const statusText = document.getElementById('status-text');
    const inputCount = document.getElementById('input-count');
    const outputCount = document.getElementById('output-count');
    const charsChanged = document.getElementById('chars-changed');
    const charsChangedCount = document.getElementById('chars-changed-count');
    const errorDisplay = document.getElementById('error-display');
    const errorMessage = document.getElementById('error-message');
    const successDisplay = document.getElementById('success-display');
    const successMessage = document.getElementById('success-message');

    // State
    let currentMode = 'encode'; // 'encode' or 'decode'
    let debounceTimer;

    // Sample data
    const encodeSample = 'https://example.com/search?q=hello world&category=books&price=<50';
    const decodeSample = 'https%3A%2F%2Fexample.com%2Fsearch%3Fq%3Dhello%20world%26category%3Dbooks%26price%3D%3C50';

    // Utility Functions
    function setStatus(text, type = 'default') {
        statusText.textContent = text;
        statusText.className = '';
        if (type === 'success') statusText.classList.add('text-green-400');
        else if (type === 'error') statusText.classList.add('text-red-400');
        else statusText.classList.add('text-gold');
    }

    function updateCounts() {
        const inputLen = urlInput.value.length;
        const outputLen = urlOutput.value.length;
        inputCount.textContent = inputLen;
        outputCount.textContent = outputLen;

        // Show characters changed
        if (outputLen > 0 && inputLen > 0) {
            const diff = Math.abs(outputLen - inputLen);
            charsChangedCount.textContent = diff;
            charsChanged.classList.remove('hidden');
        } else {
            charsChanged.classList.add('hidden');
        }
    }

    function showError(message) {
        errorDisplay.classList.remove('hidden');
        successDisplay.classList.add('hidden');
        errorMessage.textContent = message;
        setStatus('Error', 'error');
    }

    function showSuccess(message) {
        successDisplay.classList.remove('hidden');
        errorDisplay.classList.add('hidden');
        successMessage.textContent = message;
        setStatus('Success', 'success');
    }

    function hideMessages() {
        errorDisplay.classList.add('hidden');
        successDisplay.classList.add('hidden');
    }

    function getEncodingType() {
        const selected = document.querySelector('input[name="encoding-type"]:checked');
        return selected ? selected.value : 'component';
    }

    // Mode switching
    function setMode(mode, skipConvert = false) {
        currentMode = mode;

        if (mode === 'encode') {
            tabEncode.classList.add('tab-active');
            tabEncode.classList.remove('tab-inactive');
            tabDecode.classList.remove('tab-active');
            tabDecode.classList.add('tab-inactive');
            encodingOptions.classList.remove('hidden');
            inputLabel.textContent = S.inputLabelEncode;
            outputLabel.textContent = S.outputLabelEncode;
            btnConvertText.textContent = S.encodeBtn;
            urlInput.placeholder = S.inputPlaceholderEncode;
        } else {
            tabDecode.classList.add('tab-active');
            tabDecode.classList.remove('tab-inactive');
            tabEncode.classList.remove('tab-active');
            tabEncode.classList.add('tab-inactive');
            encodingOptions.classList.add('hidden');
            inputLabel.textContent = S.inputLabelDecode;
            outputLabel.textContent = S.outputLabelDecode;
            btnConvertText.textContent = S.decodeBtn;
            urlInput.placeholder = S.inputPlaceholderDecode;
        }

        // Clear and reconvert if there's input (unless skipped)
        if (!skipConvert && urlInput.value) {
            convert();
        }
    }

    // Encoding functions
    function encodeURL(text, mode) {
        if (mode === 'component') {
            return encodeURIComponent(text);
        } else if (mode === 'uri') {
            return encodeURI(text);
        }
        return text;
    }

    function decodeURL(text) {
        try {
            return decodeURIComponent(text);
        } catch (e) {
            throw new Error(S.decodeError);
        }
    }

    // Core conversion function
    function convert() {
        const input = urlInput.value;

        if (!input) {
            urlOutput.value = '';
            updateCounts();
            hideMessages();
            setStatus(S.statusReady);
            return;
        }

        try {
            let result;
            if (currentMode === 'encode') {
                const encodingType = getEncodingType();
                result = encodeURL(input, encodingType);
                const typeLabel = encodingType === 'component' ? 'encodeURIComponent' : 'encodeURI';
                showSuccess(S.encodeSuccess.replace('{type}', typeLabel).replace('{n}', result.length));
            } else {
                result = decodeURL(input);
                showSuccess(S.decodeSuccess.replace('{n}', result.length));
            }
            urlOutput.value = result;
            updateCounts();
        } catch (error) {
            urlOutput.value = '';
            updateCounts();
            showError(error.message);
        }
    }

    // Swap - moves output to input for encode→decode workflow
    function swapFields() {
        const outputValue = urlOutput.value;

        if (!outputValue) {
            showError(S.swapNothing);
            return;
        }

        // Move output to input, clear output
        urlInput.value = outputValue;
        urlOutput.value = '';
        updateCounts();
        hideMessages();

        // Switch mode (encode→decode or decode→encode) and convert
        if (currentMode === 'encode') {
            setMode('decode', true); // Skip auto-convert, we'll do it manually
        } else {
            setMode('encode', true);
        }

        // Now convert with new mode
        convert();
        setStatus(S.swappedStatus);
    }

    // Copy to clipboard
    function copyToClipboard() {
        const output = urlOutput.value;
        if (!output) {
            showError(S.copyNothing);
            return;
        }

        navigator.clipboard.writeText(output).then(() => {
            const originalText = btnCopy.innerHTML;
            btnCopy.innerHTML = '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> ' + S.copied;
            btnCopy.classList.add('text-green-400', 'border-green-400');

            setTimeout(() => {
                btnCopy.innerHTML = originalText;
                btnCopy.classList.remove('text-green-400', 'border-green-400');
            }, 2000);
        }).catch(() => {
            showError(S.copyFail);
        });
    }

    // Load sample data and auto-convert
    function loadSample() {
        if (currentMode === 'encode') {
            urlInput.value = encodeSample;
        } else {
            urlInput.value = decodeSample;
        }
        urlOutput.value = '';
        updateCounts();
        hideMessages();
        // Auto-convert after loading sample
        convert();
    }

    // Clear all
    function clearAll() {
        urlInput.value = '';
        urlOutput.value = '';
        hideMessages();
        setStatus(S.statusReady);
        updateCounts();
    }

    // Event Listeners
    tabEncode.addEventListener('click', () => setMode('encode'));
    tabDecode.addEventListener('click', () => setMode('decode'));
    btnConvert.addEventListener('click', convert);
    btnSwap.addEventListener('click', swapFields);
    btnCopy.addEventListener('click', copyToClipboard);
    btnSample.addEventListener('click', loadSample);
    btnClear.addEventListener('click', clearAll);

    // Auto-convert on input with debounce
    urlInput.addEventListener('input', () => {
        clearTimeout(debounceTimer);
        debounceTimer = setTimeout(() => {
            convert();
        }, 150);
    });

    // Re-convert when encoding type changes
    document.querySelectorAll('input[name="encoding-type"]').forEach(radio => {
        radio.addEventListener('change', () => {
            if (urlInput.value) {
                convert();
            }
        });
    });

    // Keyboard shortcuts
    document.addEventListener('keydown', function(e) {
        // Ctrl/Cmd + Enter for convert
        if ((e.ctrlKey || e.metaKey) && e.key === 'Enter') {
            e.preventDefault();
            convert();
        }
    });

    // Initialize
    updateCounts();
})();
</script>
