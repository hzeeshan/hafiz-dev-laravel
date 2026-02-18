<script>
(function() {
    // DOM Elements
    const inputText = document.getElementById('input-text');
    const outputText = document.getElementById('output-text');
    const repeatCount = document.getElementById('repeat-count');
    const separatorSelect = document.getElementById('separator-select');
    const customSeparatorWrapper = document.getElementById('custom-separator-wrapper');
    const customSeparator = document.getElementById('custom-separator');
    const optNumbering = document.getElementById('opt-numbering');
    const btnRepeat = document.getElementById('btn-repeat');
    const btnCopy = document.getElementById('btn-copy');
    const btnDownload = document.getElementById('btn-download');
    const btnSample = document.getElementById('btn-sample');
    const btnClear = document.getElementById('btn-clear');
    const statsBar = document.getElementById('stats-bar');
    const statRepetitions = document.getElementById('stat-repetitions');
    const statTotalChars = document.getElementById('stat-total-chars');
    const statTotalLines = document.getElementById('stat-total-lines');
    const statOutputSize = document.getElementById('stat-output-size');
    const successNotification = document.getElementById('success-notification');
    const successMessage = document.getElementById('success-message');
    const errorNotification = document.getElementById('error-notification');
    const errorMessage = document.getElementById('error-message');

    // Sample text
    const SAMPLE_TEXT = 'Hello, World!';

    // Get the separator string from the select value
    function getSeparator() {
        const val = separatorSelect.value;
        switch (val) {
            case 'newline': return '\n';
            case 'space': return ' ';
            case 'comma': return ', ';
            case 'semicolon': return '; ';
            case 'tab': return '\t';
            case 'custom': return customSeparator.value;
            default: return '\n';
        }
    }

    // Format file size
    function formatSize(bytes) {
        if (bytes < 1024) return bytes + ' B';
        if (bytes < 1024 * 1024) return (bytes / 1024).toFixed(1) + ' KB';
        return (bytes / (1024 * 1024)).toFixed(1) + ' MB';
    }

    // Show success notification
    function showSuccess(message) {
        successMessage.textContent = message;
        successNotification.classList.remove('hidden');
        errorNotification.classList.add('hidden');
        setTimeout(() => { successNotification.classList.add('hidden'); }, 2000);
    }

    // Show error notification
    function showError(message) {
        errorMessage.textContent = message;
        errorNotification.classList.remove('hidden');
        successNotification.classList.add('hidden');
        setTimeout(() => { errorNotification.classList.add('hidden'); }, 3000);
    }

    // Main repeat function
    function repeatText() {
        const text = inputText.value;
        if (!text) {
            showError('Please enter some text to repeat.');
            return;
        }

        let count = parseInt(repeatCount.value, 10);
        if (isNaN(count) || count < 1) {
            showError('Please enter a valid number of repetitions (1 or more).');
            return;
        }
        if (count > 10000) {
            showError('Maximum 10,000 repetitions allowed.');
            return;
        }

        const separator = getSeparator();
        const useNumbering = optNumbering.checked;

        const parts = [];
        for (let i = 1; i <= count; i++) {
            if (useNumbering) {
                parts.push(i + '. ' + text);
            } else {
                parts.push(text);
            }
        }

        const result = parts.join(separator);
        outputText.value = result;

        // Update stats
        const totalChars = result.length;
        const totalLines = result.split('\n').length;
        const outputSize = new Blob([result]).size;

        statRepetitions.textContent = count.toLocaleString();
        statTotalChars.textContent = totalChars.toLocaleString();
        statTotalLines.textContent = totalLines.toLocaleString();
        statOutputSize.textContent = formatSize(outputSize);

        statsBar.classList.remove('hidden');
        showSuccess('Text repeated ' + count + ' times!');
    }

    // Copy to clipboard
    async function copyOutput() {
        if (!outputText.value) {
            showError('Nothing to copy. Repeat some text first.');
            return;
        }

        try {
            await navigator.clipboard.writeText(outputText.value);

            const originalHtml = btnCopy.innerHTML;
            btnCopy.innerHTML = '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> Copied!';
            btnCopy.classList.add('text-green-400', 'border-green-400');

            setTimeout(() => {
                btnCopy.innerHTML = originalHtml;
                btnCopy.classList.remove('text-green-400', 'border-green-400');
            }, 2000);

            showSuccess('Copied to clipboard!');
        } catch (err) {
            showError('Failed to copy to clipboard.');
        }
    }

    // Download as .txt file
    function downloadOutput() {
        if (!outputText.value) {
            showError('Nothing to download. Repeat some text first.');
            return;
        }

        const blob = new Blob([outputText.value], { type: 'text/plain' });
        const url = URL.createObjectURL(blob);
        const a = document.createElement('a');
        a.href = url;
        a.download = 'repeated-text.txt';
        document.body.appendChild(a);
        a.click();
        document.body.removeChild(a);
        URL.revokeObjectURL(url);

        showSuccess('Downloaded as repeated-text.txt');
    }

    // Load sample text
    function loadSample() {
        inputText.value = SAMPLE_TEXT;
        repeatCount.value = '5';
        separatorSelect.value = 'newline';
        customSeparatorWrapper.classList.add('hidden');
        optNumbering.checked = false;
        repeatText();
    }

    // Clear all
    function clearAll() {
        inputText.value = '';
        outputText.value = '';
        statsBar.classList.add('hidden');
        successNotification.classList.add('hidden');
        errorNotification.classList.add('hidden');
    }

    // Toggle custom separator visibility
    separatorSelect.addEventListener('change', function() {
        if (this.value === 'custom') {
            customSeparatorWrapper.classList.remove('hidden');
            customSeparator.focus();
        } else {
            customSeparatorWrapper.classList.add('hidden');
        }
    });

    // Event Listeners
    btnRepeat.addEventListener('click', repeatText);
    btnCopy.addEventListener('click', copyOutput);
    btnDownload.addEventListener('click', downloadOutput);
    btnSample.addEventListener('click', loadSample);
    btnClear.addEventListener('click', clearAll);

    // Keyboard shortcut: Ctrl/Cmd + Enter to repeat
    document.addEventListener('keydown', function(e) {
        if ((e.ctrlKey || e.metaKey) && e.key === 'Enter') {
            e.preventDefault();
            repeatText();
        }
    });
})();
</script>
