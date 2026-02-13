<script>
(function() {
    // Get translatable strings from data attributes (for Italian/other locales)
    const stringsEl = document.getElementById('tool-strings');
    const S = {
        format: stringsEl?.dataset.format || 'Format',
        minify: stringsEl?.dataset.minify || 'Minify',
        validate: stringsEl?.dataset.validate || 'Validate',
        copy: stringsEl?.dataset.copy || 'Copy',
        download: stringsEl?.dataset.download || 'Download',
        sample: stringsEl?.dataset.sample || 'Sample',
        clear: stringsEl?.dataset.clear || 'Clear',
        ready: stringsEl?.dataset.ready || 'Ready',
        validJson: stringsEl?.dataset.validJson || 'Valid JSON',
        invalidJson: stringsEl?.dataset.invalidJson || 'Invalid JSON',
        jsonError: stringsEl?.dataset.jsonError || 'JSON Error',
        outputPlaceholder: stringsEl?.dataset.outputPlaceholder || 'Formatted JSON will appear here...',
        inputPlaceholder: stringsEl?.dataset.inputPlaceholder || 'Paste your JSON here...',
        formatSuccess: stringsEl?.dataset.formatSuccess || 'JSON formatted successfully!',
        minifySuccess: stringsEl?.dataset.minifySuccess || 'JSON minified successfully!',
        validateSuccess: stringsEl?.dataset.validateSuccess || 'Valid JSON! The syntax is correct.',
        validateEmpty: stringsEl?.dataset.validateEmpty || 'Please enter JSON to validate',
        copyNothing: stringsEl?.dataset.copyNothing || 'Nothing to copy. Format some JSON first.',
        copied: stringsEl?.dataset.copied || 'Copied!',
        copyFail: stringsEl?.dataset.copyFail || 'Failed to copy to clipboard',
        downloadNothing: stringsEl?.dataset.downloadNothing || 'Nothing to download. Format some JSON first.',
        downloaded: stringsEl?.dataset.downloaded || 'JSON file downloaded!',
        errorParsing: stringsEl?.dataset.errorParsing || 'Error parsing JSON. Check your input.',
        realtimeValidation: stringsEl?.dataset.realtimeValidation || 'Real-time validation',
        spaces2: stringsEl?.dataset.spaces2 || '2 spaces',
        spaces4: stringsEl?.dataset.spaces4 || '4 spaces',
    };

    // DOM Elements
    const jsonInput = document.getElementById('json-input');
    const outputCode = document.getElementById('output-code');
    const btnFormat = document.getElementById('btn-format');
    const btnMinify = document.getElementById('btn-minify');
    const btnValidate = document.getElementById('btn-validate');
    const btnCopy = document.getElementById('btn-copy');
    const btnDownload = document.getElementById('btn-download');
    const btnSample = document.getElementById('btn-sample');
    const btnClear = document.getElementById('btn-clear');
    const indentSelect = document.getElementById('indent-select');
    const realtimeToggle = document.getElementById('realtime-toggle');
    const statusText = document.getElementById('status-text');
    const lineCount = document.getElementById('line-count');
    const fileSize = document.getElementById('file-size');
    const errorDisplay = document.getElementById('error-display');
    const errorMessage = document.getElementById('error-message');
    const successDisplay = document.getElementById('success-display');
    const successMessage = document.getElementById('success-message');

    // Sample JSON
    const sampleJson = {
        "name": "John Doe",
        "email": "john@example.com",
        "age": 30,
        "isActive": true,
        "address": {
            "street": "123 Main St",
            "city": "New York",
            "country": "USA",
            "zipCode": "10001"
        },
        "skills": ["JavaScript", "PHP", "Laravel", "Vue.js"],
        "projects": [
            {
                "name": "Project Alpha",
                "status": "completed",
                "year": 2024
            },
            {
                "name": "Project Beta",
                "status": "in-progress",
                "year": 2025
            }
        ],
        "metadata": null
    };

    // Utility Functions
    function getIndent() {
        const value = indentSelect.value;
        if (value === 'tab') return '\t';
        return parseInt(value, 10);
    }

    function formatBytes(bytes) {
        if (bytes === 0) return '0 B';
        const k = 1024;
        const sizes = ['B', 'KB', 'MB', 'GB'];
        const i = Math.floor(Math.log(bytes) / Math.log(k));
        return parseFloat((bytes / Math.pow(k, i)).toFixed(2)) + ' ' + sizes[i];
    }

    function countLines(str) {
        if (!str) return 0;
        return str.split('\n').length;
    }

    function updateStats(text) {
        lineCount.textContent = countLines(text);
        fileSize.textContent = formatBytes(new Blob([text]).size);
    }

    function setStatus(text, type = 'default') {
        statusText.textContent = text;
        statusText.className = '';
        if (type === 'success') statusText.classList.add('text-green-400');
        else if (type === 'error') statusText.classList.add('text-red-400');
        else statusText.classList.add('text-gold');
    }

    function showError(message) {
        errorDisplay.classList.remove('hidden');
        successDisplay.classList.add('hidden');
        errorMessage.textContent = message;
        setStatus(S.invalidJson, 'error');
    }

    function showSuccess(message) {
        successDisplay.classList.remove('hidden');
        errorDisplay.classList.add('hidden');
        successMessage.textContent = message;
        setStatus(S.validJson, 'success');
    }

    function hideMessages() {
        errorDisplay.classList.add('hidden');
        successDisplay.classList.add('hidden');
    }

    function parseJsonError(error, input) {
        const message = error.message;

        // Try to extract position from error message
        const posMatch = message.match(/position\s*(\d+)/i);
        if (posMatch) {
            const position = parseInt(posMatch[1], 10);
            const beforeError = input.substring(0, position);
            const lineNumber = (beforeError.match(/\n/g) || []).length + 1;
            const lastNewline = beforeError.lastIndexOf('\n');
            const column = position - lastNewline;
            return `${message} (Line ${lineNumber}, Column ${column})`;
        }

        return message;
    }

    // Syntax Highlighting
    function syntaxHighlight(json) {
        if (typeof json !== 'string') {
            json = JSON.stringify(json, null, getIndent());
        }

        // Escape HTML
        json = json.replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;');

        // Apply syntax highlighting with Tailwind classes
        return json.replace(
            /("(\\u[a-zA-Z0-9]{4}|\\[^u]|[^\\"])*"(\s*:)?|\b(true|false|null)\b|-?\d+(?:\.\d*)?(?:[eE][+\-]?\d+)?)/g,
            function(match) {
                let cls = 'text-emerald-400'; // number
                if (/^"/.test(match)) {
                    if (/:$/.test(match)) {
                        cls = 'text-gold'; // key
                        match = match.slice(0, -1) + '<span class="text-light">:</span>';
                    } else {
                        cls = 'text-sky-400'; // string
                    }
                } else if (/true|false/.test(match)) {
                    cls = 'text-purple-400'; // boolean
                } else if (/null/.test(match)) {
                    cls = 'text-light-muted'; // null
                }
                return '<span class="' + cls + '">' + match + '</span>';
            }
        );
    }

    // Core Functions
    function formatJson() {
        const input = jsonInput.value.trim();
        if (!input) {
            hideMessages();
            outputCode.innerHTML = '<span class="text-light-muted">' + S.outputPlaceholder + '</span>';
            setStatus(S.ready);
            return;
        }

        try {
            const parsed = JSON.parse(input);
            const formatted = JSON.stringify(parsed, null, getIndent());
            outputCode.innerHTML = syntaxHighlight(formatted);
            updateStats(formatted);
            showSuccess(S.formatSuccess);
        } catch (error) {
            showError(parseJsonError(error, input));
            outputCode.innerHTML = '<span class="text-red-400">' + S.errorParsing + '</span>';
        }
    }

    function minifyJson() {
        const input = jsonInput.value.trim();
        if (!input) {
            hideMessages();
            return;
        }

        try {
            const parsed = JSON.parse(input);
            const minified = JSON.stringify(parsed);
            outputCode.innerHTML = syntaxHighlight(minified);
            updateStats(minified);
            showSuccess(S.minifySuccess);
        } catch (error) {
            showError(parseJsonError(error, input));
        }
    }

    function validateJson() {
        const input = jsonInput.value.trim();
        if (!input) {
            showError(S.validateEmpty);
            return;
        }

        try {
            JSON.parse(input);
            showSuccess(S.validateSuccess);
        } catch (error) {
            showError(parseJsonError(error, input));
        }
    }

    function copyToClipboard() {
        const output = outputCode.textContent;
        if (!output || output === S.outputPlaceholder) {
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

    function downloadJson() {
        const output = outputCode.textContent;
        if (!output || output === S.outputPlaceholder) {
            showError(S.downloadNothing);
            return;
        }

        const blob = new Blob([output], { type: 'application/json' });
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
        a.download = `json-formatted-${timestamp}.json`;
        document.body.appendChild(a);
        a.click();
        document.body.removeChild(a);
        URL.revokeObjectURL(url);

        showSuccess(S.downloaded);
    }

    function loadSample() {
        jsonInput.value = JSON.stringify(sampleJson);
        formatJson();
    }

    function clearAll() {
        jsonInput.value = '';
        outputCode.innerHTML = '<span class="text-light-muted">' + S.outputPlaceholder + '</span>';
        hideMessages();
        setStatus(S.ready);
        updateStats('');
    }

    // Event Listeners
    btnFormat.addEventListener('click', formatJson);
    btnMinify.addEventListener('click', minifyJson);
    btnValidate.addEventListener('click', validateJson);
    btnCopy.addEventListener('click', copyToClipboard);
    btnDownload.addEventListener('click', downloadJson);
    btnSample.addEventListener('click', loadSample);
    btnClear.addEventListener('click', clearAll);

    // Real-time validation
    let debounceTimer;
    jsonInput.addEventListener('input', function() {
        updateStats(jsonInput.value);

        if (realtimeToggle.checked) {
            clearTimeout(debounceTimer);
            debounceTimer = setTimeout(() => {
                const input = jsonInput.value.trim();
                if (!input) {
                    hideMessages();
                    setStatus(S.ready);
                    return;
                }

                try {
                    JSON.parse(input);
                    setStatus(S.validJson, 'success');
                    hideMessages();
                } catch (error) {
                    setStatus(S.invalidJson, 'error');
                }
            }, 300);
        }
    });

    // Keyboard shortcuts
    document.addEventListener('keydown', function(e) {
        if ((e.ctrlKey || e.metaKey) && e.key === 'Enter') {
            e.preventDefault();
            formatJson();
        }
    });

    // Initialize stats
    updateStats('');
})();
</script>
