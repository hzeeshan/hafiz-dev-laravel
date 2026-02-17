<script>
(function() {
    // JS strings (with Italian fallbacks via data attributes)
    const strings = document.getElementById('tool-strings') ? document.getElementById('tool-strings').dataset : {};
    const str = (key, fallback) => strings[key] || fallback;

    // DOM Elements
    const textInput = document.getElementById('text-input');
    const textOutput = document.getElementById('text-output');
    const replacementSelect = document.getElementById('replacement-select');
    const customSeparatorContainer = document.getElementById('custom-separator-container');
    const customSeparatorInput = document.getElementById('custom-separator');
    const removeEmptyOnlyCheckbox = document.getElementById('remove-empty-only');
    const trimLinesCheckbox = document.getElementById('trim-lines');
    const preserveParagraphsCheckbox = document.getElementById('preserve-paragraphs');
    const btnRemove = document.getElementById('btn-remove');
    const btnCopy = document.getElementById('btn-copy');
    const btnDownload = document.getElementById('btn-download');
    const btnSample = document.getElementById('btn-sample');
    const btnClear = document.getElementById('btn-clear');
    const copyNotification = document.getElementById('copy-notification');
    const copyMessage = document.getElementById('copy-message');
    const errorNotification = document.getElementById('error-notification');
    const errorMessage = document.getElementById('error-message');

    // Stats
    const statLinesBefore = document.getElementById('stat-lines-before');
    const statLinesAfter = document.getElementById('stat-lines-after');
    const statCharsBefore = document.getElementById('stat-chars-before');
    const statCharsAfter = document.getElementById('stat-chars-after');

    let debounceTimer;

    // Sample text
    const sampleText = `This is line one.
This is line two.
This is line three.

This is a new paragraph.
With multiple lines.

And another paragraph here.`;

    // Get selected separator
    function getSeparator() {
        const type = replacementSelect.value;
        switch(type) {
            case 'space': return ' ';
            case 'nothing': return '';
            case 'comma': return ',';
            case 'comma-space': return ', ';
            case 'semicolon': return ';';
            case 'pipe': return '|';
            case 'custom': return customSeparatorInput.value;
            default: return ' ';
        }
    }

    // Remove line breaks
    function removeLineBreaks(text) {
        if (!text) {
            updateStats(0, 0, 0, 0);
            return '';
        }

        const separator = getSeparator();
        const removeEmptyOnly = removeEmptyOnlyCheckbox.checked;
        const trimLines = trimLinesCheckbox.checked;
        const preserveParagraphs = preserveParagraphsCheckbox.checked;

        // Count lines before
        const linesBefore = text.split(/\r?\n/).length;
        const charsBefore = text.length;

        let result;

        if (preserveParagraphs) {
            // Split by paragraph breaks (double newlines)
            const paragraphs = text.split(/\r?\n\s*\r?\n/);

            // Process each paragraph
            result = paragraphs.map(paragraph => {
                let lines = paragraph.split(/\r?\n/);

                if (trimLines) {
                    lines = lines.map(line => line.trim());
                }

                if (removeEmptyOnly) {
                    lines = lines.filter(line => line.length > 0);
                    return lines.join('\n');
                } else {
                    lines = lines.filter(line => line.length > 0);
                    return lines.join(separator);
                }
            }).filter(p => p.length > 0).join('\n\n');
        } else {
            // Split into lines
            let lines = text.split(/\r?\n/);

            if (trimLines) {
                lines = lines.map(line => line.trim());
            }

            if (removeEmptyOnly) {
                // Only remove empty lines, keep the rest as-is with newlines
                lines = lines.filter(line => line.length > 0);
                result = lines.join('\n');
            } else {
                // Remove all line breaks
                lines = lines.filter(line => line.length > 0);
                result = lines.join(separator);
            }
        }

        // Count lines after
        const linesAfter = result.split(/\r?\n/).length;
        const charsAfter = result.length;

        updateStats(linesBefore, linesAfter, charsBefore, charsAfter);

        return result;
    }

    // Update stats
    function updateStats(linesBefore, linesAfter, charsBefore, charsAfter) {
        statLinesBefore.textContent = linesBefore.toLocaleString();
        statLinesAfter.textContent = linesAfter.toLocaleString();
        statCharsBefore.textContent = charsBefore.toLocaleString();
        statCharsAfter.textContent = charsAfter.toLocaleString();
    }

    // Process input
    function processInput() {
        const text = textInput.value;
        const result = removeLineBreaks(text);
        textOutput.value = result;
    }

    // Debounced processing
    function debouncedProcess() {
        clearTimeout(debounceTimer);
        debounceTimer = setTimeout(processInput, 300);
    }

    // Show success notification
    function showNotification(message) {
        copyMessage.textContent = message;
        copyNotification.classList.remove('hidden');
        errorNotification.classList.add('hidden');

        setTimeout(() => {
            copyNotification.classList.add('hidden');
        }, 2000);
    }

    // Show error notification
    function showError(message) {
        errorMessage.textContent = message;
        errorNotification.classList.remove('hidden');
        copyNotification.classList.add('hidden');

        setTimeout(() => {
            errorNotification.classList.add('hidden');
        }, 3000);
    }

    // Copy to clipboard
    async function copyToClipboard() {
        const text = textOutput.value;
        if (!text) {
            showError(str('error-nothing-to-copy', 'Nothing to copy. Process some text first.'));
            return;
        }

        try {
            await navigator.clipboard.writeText(text);
            showNotification(str('success-copied', 'Copied to clipboard!'));
        } catch (err) {
            showError(str('error-copy-failed', 'Failed to copy to clipboard.'));
        }
    }

    // Download as file
    function downloadFile() {
        const text = textOutput.value;
        if (!text) {
            showError(str('error-nothing-to-download', 'Nothing to download. Process some text first.'));
            return;
        }

        const blob = new Blob([text], { type: 'text/plain' });
        const url = URL.createObjectURL(blob);
        const a = document.createElement('a');
        a.href = url;
        a.download = 'text-no-line-breaks.txt';
        document.body.appendChild(a);
        a.click();
        document.body.removeChild(a);
        URL.revokeObjectURL(url);

        showNotification(str('success-downloaded', 'File downloaded!'));
    }

    // Load sample
    function loadSample() {
        textInput.value = sampleText;
        processInput();
    }

    // Clear all
    function clearAll() {
        textInput.value = '';
        textOutput.value = '';
        updateStats(0, 0, 0, 0);
    }

    // Toggle custom separator visibility
    function toggleCustomSeparator() {
        if (replacementSelect.value === 'custom') {
            customSeparatorContainer.classList.remove('hidden');
        } else {
            customSeparatorContainer.classList.add('hidden');
        }
    }

    // Event Listeners
    textInput.addEventListener('input', debouncedProcess);
    replacementSelect.addEventListener('change', () => {
        toggleCustomSeparator();
        processInput();
    });
    customSeparatorInput.addEventListener('input', processInput);
    removeEmptyOnlyCheckbox.addEventListener('change', processInput);
    trimLinesCheckbox.addEventListener('change', processInput);
    preserveParagraphsCheckbox.addEventListener('change', processInput);
    btnRemove.addEventListener('click', processInput);
    btnCopy.addEventListener('click', copyToClipboard);
    btnDownload.addEventListener('click', downloadFile);
    btnSample.addEventListener('click', loadSample);
    btnClear.addEventListener('click', clearAll);

    // Keyboard shortcut: Ctrl+Enter to process
    textInput.addEventListener('keydown', function(e) {
        if (e.ctrlKey && e.key === 'Enter') {
            e.preventDefault();
            processInput();
        }
    });

    // Initialize
    toggleCustomSeparator();
    updateStats(0, 0, 0, 0);
})();
</script>
