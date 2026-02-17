<script>
(function() {
    // JS strings (with Italian fallbacks via data attributes)
    const strings = document.getElementById('tool-strings') ? document.getElementById('tool-strings').dataset : {};
    const str = (key, fallback) => strings[key] || fallback;

    // DOM Elements
    const inputText = document.getElementById('input-text');
    const outputText = document.getElementById('output-text');
    const optTrimLeadingTrailing = document.getElementById('opt-trim-leading-trailing');
    const optExtraSpaces = document.getElementById('opt-extra-spaces');
    const optBlankLines = document.getElementById('opt-blank-lines');
    const optAllWhitespace = document.getElementById('opt-all-whitespace');
    const optTrimEachLine = document.getElementById('opt-trim-each-line');
    const btnClean = document.getElementById('btn-clean');
    const btnCopy = document.getElementById('btn-copy');
    const btnDownload = document.getElementById('btn-download');
    const btnSample = document.getElementById('btn-sample');
    const btnClear = document.getElementById('btn-clear');
    const statCharsRemoved = document.getElementById('stat-chars-removed');
    const statSpacesRemoved = document.getElementById('stat-spaces-removed');
    const statLinesRemoved = document.getElementById('stat-lines-removed');
    const statSizeReduction = document.getElementById('stat-size-reduction');
    const successNotification = document.getElementById('success-notification');
    const successMessage = document.getElementById('success-message');
    const errorNotification = document.getElementById('error-notification');
    const errorMessage = document.getElementById('error-message');

    let debounceTimer = null;

    // Clean text based on selected options
    function cleanText(text) {
        if (!text) {
            return { cleaned: '', stats: { charsRemoved: 0, spacesRemoved: 0, linesRemoved: 0, sizeReduction: 0 } };
        }

        const originalLength = text.length;
        const originalLines = text.split('\n').length;
        let originalSpaces = (text.match(/\s/g) || []).length;
        let cleaned = text;

        // If "Remove all whitespace" is checked, do that and return
        if (optAllWhitespace.checked) {
            cleaned = cleaned.replace(/\s+/g, '');
            const charsRemoved = originalLength - cleaned.length;
            const sizeReduction = originalLength > 0 ? Math.round((charsRemoved / originalLength) * 100) : 0;

            return {
                cleaned,
                stats: {
                    charsRemoved,
                    spacesRemoved: originalSpaces,
                    linesRemoved: originalLines - 1, // All line breaks removed
                    sizeReduction
                }
            };
        }

        // Apply options in order
        if (optTrimEachLine.checked) {
            cleaned = cleaned.split('\n').map(line => line.trim()).join('\n');
        }

        if (optTrimLeadingTrailing.checked) {
            cleaned = cleaned.trim();
        }

        if (optExtraSpaces.checked) {
            // Replace multiple spaces with single space, but preserve newlines
            cleaned = cleaned.replace(/[^\S\n]+/g, ' ');
        }

        if (optBlankLines.checked) {
            // Remove lines that are empty or contain only whitespace
            cleaned = cleaned.split('\n').filter(line => line.trim().length > 0).join('\n');
        }

        // Calculate stats
        const cleanedLength = cleaned.length;
        const cleanedLines = cleaned.split('\n').length;
        const cleanedSpaces = (cleaned.match(/\s/g) || []).length;

        const charsRemoved = originalLength - cleanedLength;
        const spacesRemoved = originalSpaces - cleanedSpaces;
        const linesRemoved = originalLines - cleanedLines;
        const sizeReduction = originalLength > 0 ? Math.round((charsRemoved / originalLength) * 100) : 0;

        return {
            cleaned,
            stats: {
                charsRemoved,
                spacesRemoved,
                linesRemoved,
                sizeReduction
            }
        };
    }

    // Update output and stats
    function processText() {
        const result = cleanText(inputText.value);
        outputText.value = result.cleaned;

        // Update stats
        statCharsRemoved.textContent = result.stats.charsRemoved.toLocaleString();
        statSpacesRemoved.textContent = result.stats.spacesRemoved.toLocaleString();
        statLinesRemoved.textContent = result.stats.linesRemoved.toLocaleString();
        statSizeReduction.textContent = result.stats.sizeReduction + '%';
    }

    // Show success notification
    function showSuccess(message) {
        successMessage.textContent = message;
        successNotification.classList.remove('hidden');
        errorNotification.classList.add('hidden');

        setTimeout(() => {
            successNotification.classList.add('hidden');
        }, 2000);
    }

    // Show error notification
    function showError(message) {
        errorMessage.textContent = message;
        errorNotification.classList.remove('hidden');
        successNotification.classList.add('hidden');

        setTimeout(() => {
            errorNotification.classList.add('hidden');
        }, 3000);
    }

    // Copy to clipboard
    async function copyOutput() {
        if (!outputText.value) {
            showError(str('error-nothing-to-copy', 'Nothing to copy. Clean some text first.'));
            return;
        }

        try {
            await navigator.clipboard.writeText(outputText.value);

            // Visual feedback
            const originalHtml = btnCopy.innerHTML;
            btnCopy.innerHTML = '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> ' + str('copied', 'Copied!');
            btnCopy.classList.add('text-green-400', 'border-green-400');

            setTimeout(() => {
                btnCopy.innerHTML = originalHtml;
                btnCopy.classList.remove('text-green-400', 'border-green-400');
            }, 2000);

            showSuccess(str('success-copied', 'Copied to clipboard!'));
        } catch (err) {
            showError(str('error-copy-failed', 'Failed to copy to clipboard.'));
        }
    }

    // Download as .txt file
    function downloadOutput() {
        if (!outputText.value) {
            showError(str('error-nothing-to-download', 'Nothing to download. Clean some text first.'));
            return;
        }

        const blob = new Blob([outputText.value], { type: 'text/plain' });
        const url = URL.createObjectURL(blob);
        const a = document.createElement('a');
        a.href = url;
        a.download = 'cleaned-text.txt';
        document.body.appendChild(a);
        a.click();
        document.body.removeChild(a);
        URL.revokeObjectURL(url);

        showSuccess(str('success-downloaded', 'Downloaded as cleaned-text.txt'));
    }

    // Load sample text
    function loadSample() {
        inputText.value = `   This is   a sample    text   with   lots    of    extra     spaces.

    It has    leading   and    trailing   whitespace.


    There are    also   multiple   blank   lines.


    Each     line      has      inconsistent      spacing.

  Some lines have     tabs	and	mixed		whitespace.

    The    purpose    is    to    demonstrate    the    whitespace    remover    tool.   `;
        processText();
        showSuccess(str('success-sample-loaded', 'Sample text loaded!'));
    }

    // Clear all
    function clearAll() {
        inputText.value = '';
        outputText.value = '';
        statCharsRemoved.textContent = '0';
        statSpacesRemoved.textContent = '0';
        statLinesRemoved.textContent = '0';
        statSizeReduction.textContent = '0%';
    }

    // Real-time conversion with debounce
    function handleInput() {
        clearTimeout(debounceTimer);
        debounceTimer = setTimeout(() => {
            processText();
        }, 300);
    }

    // Event Listeners
    inputText.addEventListener('input', handleInput);

    // Re-process when options change
    optTrimLeadingTrailing.addEventListener('change', processText);
    optExtraSpaces.addEventListener('change', processText);
    optBlankLines.addEventListener('change', processText);
    optAllWhitespace.addEventListener('change', processText);
    optTrimEachLine.addEventListener('change', processText);

    btnClean.addEventListener('click', processText);
    btnCopy.addEventListener('click', copyOutput);
    btnDownload.addEventListener('click', downloadOutput);
    btnSample.addEventListener('click', loadSample);
    btnClear.addEventListener('click', clearAll);

    // Keyboard shortcut: Ctrl/Cmd + Enter to clean
    document.addEventListener('keydown', function(e) {
        if ((e.ctrlKey || e.metaKey) && e.key === 'Enter') {
            e.preventDefault();
            processText();
        }
    });

    // Initialize stats to 0
    statCharsRemoved.textContent = '0';
    statSpacesRemoved.textContent = '0';
    statLinesRemoved.textContent = '0';
    statSizeReduction.textContent = '0%';
})();
</script>
