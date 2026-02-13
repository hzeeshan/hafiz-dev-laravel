<script>
(function() {
    // Get translatable strings from data attributes (for Italian/other locales)
    const stringsEl = document.getElementById('tool-strings');
    const S = {
        encode: stringsEl?.dataset.encode || 'Encode',
        decode: stringsEl?.dataset.decode || 'Decode',
        swap: stringsEl?.dataset.swap || 'Swap',
        copy: stringsEl?.dataset.copy || 'Copy',
        download: stringsEl?.dataset.download || 'Download',
        sample: stringsEl?.dataset.sample || 'Sample',
        clear: stringsEl?.dataset.clear || 'Clear',
        urlSafe: stringsEl?.dataset.urlSafe || 'URL-safe encoding',
        statusReady: stringsEl?.dataset.statusReady || 'Ready',
        statusLabel: stringsEl?.dataset.statusLabel || 'Status',
        inputLabel: stringsEl?.dataset.inputLabel || 'Input',
        outputLabel: stringsEl?.dataset.outputLabel || 'Output',
        inputChars: stringsEl?.dataset.inputChars || 'chars',
        outputChars: stringsEl?.dataset.outputChars || 'chars',
        inputPlaceholder: stringsEl?.dataset.inputPlaceholder || 'Enter text to encode or Base64 string to decode...',
        outputPlaceholder: stringsEl?.dataset.outputPlaceholder || 'Result will appear here...',
        errorTitle: stringsEl?.dataset.errorTitle || 'Error',
        encodeEmpty: stringsEl?.dataset.encodeEmpty || 'Please enter text to encode.',
        decodeEmpty: stringsEl?.dataset.decodeEmpty || 'Please enter a Base64 string to decode.',
        encodeFail: stringsEl?.dataset.encodeFail || 'Failed to encode: ',
        decodeFail: stringsEl?.dataset.decodeFail || 'Invalid Base64 string. Make sure the input is a valid Base64 encoded string.',
        encodeSuccess: stringsEl?.dataset.encodeSuccess || 'Encoded successfully!',
        encodeSuccessUrlSafe: stringsEl?.dataset.encodeSuccessUrlSafe || ' (URL-safe)',
        outputIs: stringsEl?.dataset.outputIs || ' Output is ',
        characters: stringsEl?.dataset.characters || ' characters.',
        decodeSuccess: stringsEl?.dataset.decodeSuccess || 'Decoded successfully!',
        swapped: stringsEl?.dataset.swapped || 'Swapped input and output',
        copyNothing: stringsEl?.dataset.copyNothing || 'Nothing to copy. Encode or decode something first.',
        copied: stringsEl?.dataset.copied || 'Copied!',
        copyFail: stringsEl?.dataset.copyFail || 'Failed to copy to clipboard',
        downloadNothing: stringsEl?.dataset.downloadNothing || 'Nothing to download. Encode or decode something first.',
        downloaded: stringsEl?.dataset.downloaded || 'File downloaded!',
        sampleLoaded: stringsEl?.dataset.sampleLoaded || 'Sample loaded - click Encode to convert',
        successLabel: stringsEl?.dataset.successLabel || 'Success',
        errorLabel: stringsEl?.dataset.errorLabel || 'Error',
    };

    // DOM Elements
    const base64Input = document.getElementById('base64-input');
    const base64Output = document.getElementById('base64-output');
    const btnEncode = document.getElementById('btn-encode');
    const btnDecode = document.getElementById('btn-decode');
    const btnSwap = document.getElementById('btn-swap');
    const btnCopy = document.getElementById('btn-copy');
    const btnDownload = document.getElementById('btn-download');
    const btnSample = document.getElementById('btn-sample');
    const btnClear = document.getElementById('btn-clear');
    const urlSafeToggle = document.getElementById('url-safe-toggle');
    const statusText = document.getElementById('status-text');
    const inputCount = document.getElementById('input-count');
    const outputCount = document.getElementById('output-count');
    const errorDisplay = document.getElementById('error-display');
    const errorMessage = document.getElementById('error-message');
    const successDisplay = document.getElementById('success-display');
    const successMessage = document.getElementById('success-message');

    // Sample text
    const sampleText = "Hello, World! This is a Base64 encoding test from hafiz.dev 🚀";

    // Utility Functions
    function setStatus(text, type = 'default') {
        statusText.textContent = text;
        statusText.className = '';
        if (type === 'success') statusText.classList.add('text-green-400');
        else if (type === 'error') statusText.classList.add('text-red-400');
        else statusText.classList.add('text-gold');
    }

    function updateCounts() {
        inputCount.textContent = base64Input.value.length;
        outputCount.textContent = base64Output.value.length;
    }

    function showError(message) {
        errorDisplay.classList.remove('hidden');
        successDisplay.classList.add('hidden');
        errorMessage.textContent = message;
        setStatus(S.errorLabel, 'error');
    }

    function showSuccess(message) {
        successDisplay.classList.remove('hidden');
        errorDisplay.classList.add('hidden');
        successMessage.textContent = message;
        setStatus(S.successLabel, 'success');
    }

    function hideMessages() {
        errorDisplay.classList.add('hidden');
        successDisplay.classList.add('hidden');
    }

    // Base64 Encode Function
    function encodeBase64(text, urlSafe = false) {
        try {
            let encoded = btoa(unescape(encodeURIComponent(text)));
            if (urlSafe) {
                encoded = encoded.replace(/\+/g, '-').replace(/\//g, '_').replace(/=+$/, '');
            }
            return encoded;
        } catch (error) {
            throw new Error(S.encodeFail + error.message);
        }
    }

    // Base64 Decode Function
    function decodeBase64(base64, urlSafe = false) {
        try {
            let input = base64;
            if (urlSafe) {
                input = input.replace(/-/g, '+').replace(/_/g, '/');
                while (input.length % 4) {
                    input += '=';
                }
            }
            return decodeURIComponent(escape(atob(input)));
        } catch (error) {
            throw new Error(S.decodeFail);
        }
    }

    // Core Functions
    function encode() {
        const input = base64Input.value;
        if (!input) {
            showError(S.encodeEmpty);
            return;
        }

        try {
            const urlSafe = urlSafeToggle.checked;
            const encoded = encodeBase64(input, urlSafe);
            base64Output.value = encoded;
            updateCounts();
            const mode = urlSafe ? S.encodeSuccessUrlSafe : '';
            showSuccess(S.encodeSuccess + mode + S.outputIs + encoded.length + S.characters);
        } catch (error) {
            base64Output.value = '';
            updateCounts();
            showError(error.message);
        }
    }

    function decode() {
        const input = base64Input.value.trim();
        if (!input) {
            showError(S.decodeEmpty);
            return;
        }

        try {
            const urlSafe = urlSafeToggle.checked;
            const decoded = decodeBase64(input, urlSafe);
            base64Output.value = decoded;
            updateCounts();
            showSuccess(S.decodeSuccess + S.outputIs + decoded.length + S.characters);
        } catch (error) {
            base64Output.value = '';
            updateCounts();
            showError(error.message);
        }
    }

    function swapFields() {
        const temp = base64Input.value;
        base64Input.value = base64Output.value;
        base64Output.value = temp;
        updateCounts();
        hideMessages();
        setStatus(S.swapped);
    }

    function copyToClipboard() {
        const output = base64Output.value;
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

    function downloadResult() {
        const output = base64Output.value;
        if (!output) {
            showError(S.downloadNothing);
            return;
        }

        const blob = new Blob([output], { type: 'text/plain' });
        const url = URL.createObjectURL(blob);
        const now = new Date();
        const timestamp = now.getFullYear() + '-' +
            String(now.getMonth() + 1).padStart(2, '0') + '-' +
            String(now.getDate()).padStart(2, '0') + '-' +
            String(now.getHours()).padStart(2, '0') +
            String(now.getMinutes()).padStart(2, '0') +
            String(now.getSeconds()).padStart(2, '0');
        const a = document.createElement('a');
        a.href = url;
        a.download = `base64-result-${timestamp}.txt`;
        document.body.appendChild(a);
        a.click();
        document.body.removeChild(a);
        URL.revokeObjectURL(url);

        showSuccess(S.downloaded);
    }

    function loadSample() {
        base64Input.value = sampleText;
        base64Output.value = '';
        updateCounts();
        hideMessages();
        setStatus(S.sampleLoaded);
    }

    function clearAll() {
        base64Input.value = '';
        base64Output.value = '';
        hideMessages();
        setStatus(S.statusReady);
        updateCounts();
    }

    // Event Listeners
    btnEncode.addEventListener('click', encode);
    btnDecode.addEventListener('click', decode);
    btnSwap.addEventListener('click', swapFields);
    btnCopy.addEventListener('click', copyToClipboard);
    btnDownload.addEventListener('click', downloadResult);
    btnSample.addEventListener('click', loadSample);
    btnClear.addEventListener('click', clearAll);

    // Update counts on input
    base64Input.addEventListener('input', updateCounts);

    // Keyboard shortcuts
    document.addEventListener('keydown', function(e) {
        if ((e.ctrlKey || e.metaKey) && e.key === 'e') {
            e.preventDefault();
            encode();
        }
        if ((e.ctrlKey || e.metaKey) && e.key === 'd') {
            e.preventDefault();
            decode();
        }
    });

    // Initialize counts
    updateCounts();
})();
</script>
