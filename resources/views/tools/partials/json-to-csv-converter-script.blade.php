{{-- Papa Parse for robust CSV parsing --}}
<script src="https://cdn.jsdelivr.net/npm/papaparse@5.4.1/papaparse.min.js"></script>

<script>
(function() {
    // Translatable strings (from #tool-strings data attributes, with English defaults)
    const toolStrings = document.getElementById('tool-strings');
    const ds = toolStrings ? toolStrings.dataset : {};

    const STRINGS = {
        jsonInput: ds.jsonInput || 'JSON Input',
        csvInput: ds.csvInput || 'CSV Input',
        csvOutput: ds.csvOutput || 'CSV Output',
        jsonOutput: ds.jsonOutput || 'JSON Output',
        convertToCsv: ds.convertToCsv || 'Convert to CSV',
        convertToJson: ds.convertToJson || 'Convert to JSON',
        pasteJson: ds.pasteJson || 'Paste your JSON here...',
        pasteCsv: ds.pasteCsv || 'Paste your CSV here...',
        outputPlaceholder: ds.outputPlaceholder || 'Converted output will appear here...',
        enterData: ds.enterData || 'Please enter some data to convert',
        nothingToCopy: ds.nothingToCopy || 'Nothing to copy. Convert some data first.',
        nothingToDownload: ds.nothingToDownload || 'Nothing to download. Convert some data first.',
        nothingToSwap: ds.nothingToSwap || 'Nothing to swap. Convert some data first.',
        copyFail: ds.copyFail || 'Failed to copy to clipboard',
        copied: ds.copied || 'Copied!',
        downloaded: ds.downloaded || 'Downloaded:',
        conversionSuccess: ds.conversionSuccess || 'Conversion successful!',
        rows: ds.rows || 'rows',
        columns: ds.columns || 'columns',
    };

    // DOM Elements
    const jsonToCsvTab = document.getElementById('json-to-csv-tab');
    const csvToJsonTab = document.getElementById('csv-to-json-tab');
    const jsonToCsvOptions = document.getElementById('json-to-csv-options');
    const csvToJsonOptions = document.getElementById('csv-to-json-options');
    const inputLabel = document.getElementById('input-label');
    const outputLabel = document.getElementById('output-label');
    const dataInput = document.getElementById('data-input');
    const dataOutputCsv = document.getElementById('data-output-csv');
    const dataOutputJson = document.getElementById('data-output-json');
    const outputCode = document.getElementById('output-code');
    const convertText = document.getElementById('convert-text');
    const btnConvert = document.getElementById('btn-convert');
    const btnCopy = document.getElementById('btn-copy');
    const btnDownload = document.getElementById('btn-download');
    const btnSwap = document.getElementById('btn-swap');
    const btnSample = document.getElementById('btn-sample');
    const btnClear = document.getElementById('btn-clear');
    const statsBar = document.getElementById('stats-bar');
    const statRows = document.getElementById('stat-rows');
    const statColumns = document.getElementById('stat-columns');
    const statInputSize = document.getElementById('stat-input-size');
    const statOutputSize = document.getElementById('stat-output-size');
    const successNotification = document.getElementById('success-notification');
    const successMessage = document.getElementById('success-message');
    const errorNotification = document.getElementById('error-notification');
    const errorMessage = document.getElementById('error-message');

    // JSON to CSV Options
    const delimiterJson = document.getElementById('delimiter-json');
    const includeHeaders = document.getElementById('include-headers');
    const flattenNested = document.getElementById('flatten-nested');
    const arrayHandling = document.getElementById('array-handling');

    // CSV to JSON Options
    const delimiterCsv = document.getElementById('delimiter-csv');
    const firstRowHeader = document.getElementById('first-row-header');
    const parseNumbers = document.getElementById('parse-numbers');
    const parseBooleans = document.getElementById('parse-booleans');

    // State
    let currentDirection = 'json-to-csv';

    // Sample Data
    const sampleJson = [
        { "name": "John Doe", "email": "john@example.com", "age": 30, "city": "New York", "active": true },
        { "name": "Jane Smith", "email": "jane@example.com", "age": 25, "city": "London", "active": false },
        { "name": "Bob Johnson", "email": "bob@example.com", "age": 35, "city": "Paris", "active": true }
    ];

    const sampleCsv = `name,email,age,city,active
John Doe,john@example.com,30,New York,true
Jane Smith,jane@example.com,25,London,false
Bob Johnson,bob@example.com,35,Paris,true`;

    // ===== Utility Functions =====

    function formatBytes(bytes) {
        if (bytes === 0) return '0 B';
        const k = 1024;
        const sizes = ['B', 'KB', 'MB', 'GB'];
        const i = Math.floor(Math.log(bytes) / Math.log(k));
        return parseFloat((bytes / Math.pow(k, i)).toFixed(2)) + ' ' + sizes[i];
    }

    function showSuccess(message) {
        successMessage.textContent = message;
        successNotification.classList.remove('hidden');
        errorNotification.classList.add('hidden');
        setTimeout(() => successNotification.classList.add('hidden'), 3000);
    }

    function showError(message) {
        errorMessage.textContent = message;
        errorNotification.classList.remove('hidden');
        successNotification.classList.add('hidden');
        setTimeout(() => errorNotification.classList.add('hidden'), 5000);
    }

    function hideNotifications() {
        successNotification.classList.add('hidden');
        errorNotification.classList.add('hidden');
    }

    // ===== Syntax Highlighting =====

    function syntaxHighlight(json) {
        if (typeof json !== 'string') {
            json = JSON.stringify(json, null, 2);
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

    // Get the raw output value (for copy/download)
    function getOutputValue() {
        if (currentDirection === 'json-to-csv') {
            return dataOutputCsv.value;
        } else {
            // For JSON output, get the text content from the highlighted output
            return outputCode.textContent;
        }
    }

    // Set the output value
    function setOutput(value) {
        if (currentDirection === 'json-to-csv') {
            dataOutputCsv.value = value;
        } else {
            // Apply syntax highlighting for JSON
            outputCode.innerHTML = value ? syntaxHighlight(value) : '<span class="text-light-muted">' + STRINGS.outputPlaceholder + '</span>';
        }
    }

    // Clear output
    function clearOutput() {
        dataOutputCsv.value = '';
        outputCode.innerHTML = '<span class="text-light-muted">' + STRINGS.outputPlaceholder + '</span>';
    }

    // Switch output panels based on direction
    function switchOutputPanel(direction) {
        if (direction === 'json-to-csv') {
            dataOutputCsv.classList.remove('hidden');
            dataOutputJson.classList.add('hidden');
        } else {
            dataOutputCsv.classList.add('hidden');
            dataOutputJson.classList.remove('hidden');
        }
    }

    // ===== Flatten Object Function =====

    function flattenObject(obj, prefix = '') {
        const flattened = {};

        for (const key in obj) {
            if (!obj.hasOwnProperty(key)) continue;

            const newKey = prefix ? `${prefix}.${key}` : key;
            const value = obj[key];

            if (value !== null && typeof value === 'object' && !Array.isArray(value)) {
                Object.assign(flattened, flattenObject(value, newKey));
            } else {
                flattened[newKey] = value;
            }
        }

        return flattened;
    }

    // ===== CSV Escaping =====

    function escapeCSV(value, delimiter) {
        if (value === null || value === undefined) return '';

        const stringValue = String(value);
        // If contains delimiter, newline, or quotes, wrap in quotes
        if (stringValue.includes(delimiter) || stringValue.includes('\n') || stringValue.includes('\r') || stringValue.includes('"')) {
            return `"${stringValue.replace(/"/g, '""')}"`;
        }
        return stringValue;
    }

    // ===== JSON to CSV Conversion =====

    function jsonToCsv(jsonString) {
        const delimiter = delimiterJson.value;
        const shouldIncludeHeaders = includeHeaders.checked;
        const shouldFlatten = flattenNested.checked;
        const arrayHandlingMethod = arrayHandling.value;

        let data;
        try {
            data = JSON.parse(jsonString);
        } catch (e) {
            throw new Error(`Invalid JSON: ${e.message}`);
        }

        // Ensure it's an array
        if (!Array.isArray(data)) {
            // If single object, wrap in array
            data = [data];
        }

        if (data.length === 0) {
            throw new Error('JSON array is empty');
        }

        // Process each object
        const processedData = data.map(obj => {
            if (typeof obj !== 'object' || obj === null) {
                return { value: obj };
            }

            let processed = shouldFlatten ? flattenObject(obj) : { ...obj };

            // Handle arrays in values
            for (const key in processed) {
                if (Array.isArray(processed[key])) {
                    if (arrayHandlingMethod === 'join') {
                        processed[key] = processed[key].join(';');
                    } else {
                        processed[key] = JSON.stringify(processed[key]);
                    }
                } else if (typeof processed[key] === 'object' && processed[key] !== null) {
                    processed[key] = JSON.stringify(processed[key]);
                }
            }

            return processed;
        });

        // Get all unique keys (headers)
        const headers = [...new Set(processedData.flatMap(obj => Object.keys(obj)))];

        // Build CSV rows
        const rows = [];

        if (shouldIncludeHeaders) {
            rows.push(headers.map(h => escapeCSV(h, delimiter)).join(delimiter));
        }

        processedData.forEach(obj => {
            const row = headers.map(header => {
                const value = obj[header];
                return escapeCSV(value, delimiter);
            });
            rows.push(row.join(delimiter));
        });

        return {
            csv: rows.join('\n'),
            rowCount: processedData.length,
            columnCount: headers.length
        };
    }

    // ===== CSV to JSON Conversion =====

    function csvToJson(csvString) {
        const delimiter = delimiterCsv.value;
        const hasHeader = firstRowHeader.checked;
        const shouldParseNumbers = parseNumbers.checked;
        const shouldParseBooleans = parseBooleans.checked;

        const parseConfig = {
            delimiter: delimiter === 'auto' ? '' : delimiter,
            header: hasHeader,
            dynamicTyping: shouldParseNumbers,
            skipEmptyLines: true
        };

        const result = Papa.parse(csvString.trim(), parseConfig);

        if (result.errors.length > 0) {
            const firstError = result.errors[0];
            throw new Error(`CSV parsing error: ${firstError.message} (Row ${firstError.row || 'unknown'})`);
        }

        let data = result.data;

        if (data.length === 0) {
            throw new Error('CSV data is empty');
        }

        // Parse booleans if enabled
        if (shouldParseBooleans && hasHeader) {
            data = data.map(row => {
                const newRow = {};
                for (const key in row) {
                    const value = row[key];
                    if (typeof value === 'string') {
                        const lower = value.toLowerCase().trim();
                        if (lower === 'true') {
                            newRow[key] = true;
                        } else if (lower === 'false') {
                            newRow[key] = false;
                        } else {
                            newRow[key] = value;
                        }
                    } else {
                        newRow[key] = value;
                    }
                }
                return newRow;
            });
        }

        // Determine column count
        let columnCount = 0;
        if (hasHeader && data.length > 0) {
            columnCount = Object.keys(data[0]).length;
        } else if (!hasHeader && data.length > 0) {
            columnCount = Array.isArray(data[0]) ? data[0].length : Object.keys(data[0]).length;
        }

        return {
            json: JSON.stringify(data, null, 2),
            rowCount: data.length,
            columnCount: columnCount
        };
    }

    // ===== Direction Switching =====

    function switchDirection(direction) {
        currentDirection = direction;

        if (direction === 'json-to-csv') {
            jsonToCsvTab.classList.add('bg-gold', 'text-darkBg');
            jsonToCsvTab.classList.remove('text-light-muted', 'hover:text-light');
            csvToJsonTab.classList.remove('bg-gold', 'text-darkBg');
            csvToJsonTab.classList.add('text-light-muted', 'hover:text-light');

            jsonToCsvOptions.classList.remove('hidden');
            csvToJsonOptions.classList.add('hidden');

            inputLabel.textContent = STRINGS.jsonInput;
            outputLabel.textContent = STRINGS.csvOutput;
            dataInput.placeholder = STRINGS.pasteJson;
            convertText.textContent = STRINGS.convertToCsv;
        } else {
            csvToJsonTab.classList.add('bg-gold', 'text-darkBg');
            csvToJsonTab.classList.remove('text-light-muted', 'hover:text-light');
            jsonToCsvTab.classList.remove('bg-gold', 'text-darkBg');
            jsonToCsvTab.classList.add('text-light-muted', 'hover:text-light');

            csvToJsonOptions.classList.remove('hidden');
            jsonToCsvOptions.classList.add('hidden');

            inputLabel.textContent = STRINGS.csvInput;
            outputLabel.textContent = STRINGS.jsonOutput;
            dataInput.placeholder = STRINGS.pasteCsv;
            convertText.textContent = STRINGS.convertToJson;
        }

        // Switch output panels
        switchOutputPanel(direction);

        // Clear fields when switching
        clearAll();
    }

    // ===== Core Functions =====

    function convert() {
        const input = dataInput.value.trim();

        if (!input) {
            showError(STRINGS.enterData);
            return;
        }

        try {
            let result;
            let outputValue;

            if (currentDirection === 'json-to-csv') {
                result = jsonToCsv(input);
                outputValue = result.csv;
                dataOutputCsv.value = outputValue;
            } else {
                result = csvToJson(input);
                outputValue = result.json;
                // Apply syntax highlighting for JSON output
                outputCode.innerHTML = syntaxHighlight(outputValue);
            }

            // Update statistics
            statRows.textContent = result.rowCount;
            statColumns.textContent = result.columnCount;
            statInputSize.textContent = formatBytes(new Blob([input]).size);
            statOutputSize.textContent = formatBytes(new Blob([outputValue]).size);
            statsBar.classList.remove('hidden');

            showSuccess(`${STRINGS.conversionSuccess} ${result.rowCount} ${STRINGS.rows}, ${result.columnCount} ${STRINGS.columns}`);
        } catch (error) {
            showError(error.message);
            statsBar.classList.add('hidden');
        }
    }

    function copyOutput() {
        const output = getOutputValue();
        if (!output || output === STRINGS.outputPlaceholder) {
            showError(STRINGS.nothingToCopy);
            return;
        }

        navigator.clipboard.writeText(output).then(() => {
            const originalHTML = btnCopy.innerHTML;
            btnCopy.innerHTML = '<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> ' + STRINGS.copied;
            btnCopy.classList.add('text-green-400', 'border-green-400');

            setTimeout(() => {
                btnCopy.innerHTML = originalHTML;
                btnCopy.classList.remove('text-green-400', 'border-green-400');
            }, 2000);
        }).catch(() => {
            showError(STRINGS.copyFail);
        });
    }

    function downloadOutput() {
        const output = getOutputValue();
        if (!output || output === STRINGS.outputPlaceholder) {
            showError(STRINGS.nothingToDownload);
            return;
        }

        const extension = currentDirection === 'json-to-csv' ? 'csv' : 'json';
        const mimeType = currentDirection === 'json-to-csv' ? 'text/csv' : 'application/json';
        const filename = `converted-${new Date().toISOString().split('T')[0]}.${extension}`;

        const blob = new Blob([output], { type: mimeType });
        const url = URL.createObjectURL(blob);
        const a = document.createElement('a');
        a.href = url;
        a.download = filename;
        document.body.appendChild(a);
        a.click();
        document.body.removeChild(a);
        URL.revokeObjectURL(url);

        showSuccess(`${STRINGS.downloaded} ${filename}`);
    }

    function swapInputOutput() {
        const output = getOutputValue();
        if (!output || output === STRINGS.outputPlaceholder) {
            showError(STRINGS.nothingToSwap);
            return;
        }

        // Switch direction
        const newDirection = currentDirection === 'json-to-csv' ? 'csv-to-json' : 'json-to-csv';
        switchDirection(newDirection);

        // Set output as new input (don't clear since switchDirection does it)
        dataInput.value = output;
        clearOutput();
        statsBar.classList.add('hidden');
    }

    function loadSampleData() {
        if (currentDirection === 'json-to-csv') {
            dataInput.value = JSON.stringify(sampleJson, null, 2);
        } else {
            dataInput.value = sampleCsv;
        }
        clearOutput();
        statsBar.classList.add('hidden');
        hideNotifications();
    }

    function clearAll() {
        dataInput.value = '';
        clearOutput();
        statsBar.classList.add('hidden');
        hideNotifications();
    }

    // ===== Event Listeners =====

    jsonToCsvTab.addEventListener('click', () => switchDirection('json-to-csv'));
    csvToJsonTab.addEventListener('click', () => switchDirection('csv-to-json'));

    btnConvert.addEventListener('click', convert);
    btnCopy.addEventListener('click', copyOutput);
    btnDownload.addEventListener('click', downloadOutput);
    btnSwap.addEventListener('click', swapInputOutput);
    btnSample.addEventListener('click', loadSampleData);
    btnClear.addEventListener('click', clearAll);

    // Keyboard shortcut: Ctrl+Enter to convert
    document.addEventListener('keydown', function(e) {
        if ((e.ctrlKey || e.metaKey) && e.key === 'Enter') {
            e.preventDefault();
            convert();
        }
    });
})();
</script>