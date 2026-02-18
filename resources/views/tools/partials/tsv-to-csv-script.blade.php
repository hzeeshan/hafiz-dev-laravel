<script>
(function() {
    const stringsEl = document.getElementById('tool-strings');
    const S = {
        enterTsv:        stringsEl?.dataset.enterTsv        || 'Please enter or paste TSV data',
        noData:          stringsEl?.dataset.noData          || 'No data found in input',
        nothingToCopy:   stringsEl?.dataset.nothingToCopy   || 'Nothing to copy',
        nothingToDownload:stringsEl?.dataset.nothingToDownload|| 'Nothing to download',
        copied:          stringsEl?.dataset.copied          || 'Copied!',
        csvDownloaded:   stringsEl?.dataset.csvDownloaded   || 'CSV file downloaded',
        fileLoaded:      stringsEl?.dataset.fileLoaded      || 'File loaded',
        convertedPrefix: stringsEl?.dataset.convertedPrefix || 'Converted',
        rowsSuffix:      stringsEl?.dataset.rowsSuffix      || 'rows with',
        quotedSuffix:    stringsEl?.dataset.quotedSuffix    || 'quoted fields',
    };

    const tsvInput = document.getElementById('tsv-input');
    const csvOutput = document.getElementById('csv-output');
    const quoteStyle = document.getElementById('quote-style');
    const trimWhitespace = document.getElementById('trim-whitespace');
    const fileUpload = document.getElementById('file-upload');
    const btnConvert = document.getElementById('btn-convert');
    const btnCopy = document.getElementById('btn-copy');
    const btnDownload = document.getElementById('btn-download');
    const btnSample = document.getElementById('btn-sample');
    const btnClear = document.getElementById('btn-clear');
    const statsBar = document.getElementById('stats-bar');
    const successNotification = document.getElementById('success-notification');
    const successMessage = document.getElementById('success-message');
    const errorNotification = document.getElementById('error-notification');
    const errorMessage = document.getElementById('error-message');

    const sampleTSV = `Name\tEmail\tAge\tCity\tSalary
John Smith\tjohn@example.com\t32\tSan Francisco\t95000
Jane Doe\tjane@example.com\t28\tLondon\t72000
Bob Johnson\tbob@example.com\t45\tToronto\t105000
Alice Brown\talice@example.com\t35\tBerlin\t88000`;

    // ===== TSV Parser =====
    function parseTSV(text) {
        const lines = text.split(/\r?\n/);
        const rows = [];
        for (const line of lines) {
            if (line.trim() === '') continue;
            const fields = line.split('\t');
            rows.push(fields);
        }
        return rows;
    }

    // ===== CSV Formatter =====
    function needsQuoting(field) {
        return field.includes(',') || field.includes('"') || field.includes('\n') || field.includes('\r');
    }

    function escapeField(field) {
        return field.replace(/"/g, '""');
    }

    function formatCSVField(field, style) {
        const shouldTrim = trimWhitespace.checked;
        const trimmed = shouldTrim ? field.trim() : field;

        if (style === 'never') {
            return trimmed;
        }

        if (style === 'all') {
            return '"' + escapeField(trimmed) + '"';
        }

        // Smart quoting (default)
        if (needsQuoting(trimmed)) {
            return '"' + escapeField(trimmed) + '"';
        }

        return trimmed;
    }

    function rowToCSV(row, style) {
        return row.map(field => formatCSVField(field, style)).join(',');
    }

    // ===== Convert Function =====
    function convert() {
        const input = tsvInput.value;
        if (!input.trim()) {
            showError(S.enterTsv);
            return;
        }

        try {
            const rows = parseTSV(input);
            if (rows.length === 0) {
                showError(S.noData);
                return;
            }

            const style = quoteStyle.value;
            const csvLines = rows.map(row => rowToCSV(row, style));
            const csvText = csvLines.join('\n');

            csvOutput.value = csvText;

            // Calculate stats
            const quotedFields = csvLines.join(',').match(/"/g);
            const quotedCount = quotedFields ? Math.floor(quotedFields.length / 2) : 0;
            const maxCols = Math.max(...rows.map(r => r.length));

            document.getElementById('stat-rows').textContent = rows.length;
            document.getElementById('stat-cols').textContent = maxCols;
            document.getElementById('stat-quoted').textContent = quotedCount;
            document.getElementById('stat-size').textContent = formatSize(csvText.length);
            statsBar.classList.remove('hidden');

            showSuccess(S.convertedPrefix + ' ' + rows.length + ' ' + S.rowsSuffix + ' ' + quotedCount + ' ' + S.quotedSuffix);
        } catch (e) {
            showError('Error: ' + e.message);
        }
    }

    function formatSize(bytes) {
        if (bytes < 1024) return bytes + ' B';
        if (bytes < 1024 * 1024) return (bytes / 1024).toFixed(1) + ' KB';
        return (bytes / (1024 * 1024)).toFixed(2) + ' MB';
    }

    function showSuccess(msg) {
        successMessage.textContent = msg;
        successNotification.classList.remove('hidden');
        errorNotification.classList.add('hidden');
        setTimeout(() => successNotification.classList.add('hidden'), 3000);
    }

    function showError(msg) {
        errorMessage.textContent = msg;
        errorNotification.classList.remove('hidden');
        successNotification.classList.add('hidden');
        setTimeout(() => errorNotification.classList.add('hidden'), 5000);
    }

    // ===== Events =====
    btnConvert.addEventListener('click', convert);

    btnCopy.addEventListener('click', function() {
        const output = csvOutput.value;
        if (!output) { showError(S.nothingToCopy); return; }
        navigator.clipboard.writeText(output).then(() => {
            const orig = this.innerHTML;
            this.innerHTML = '<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> ' + S.copied;
            this.classList.add('text-green-400', 'border-green-400');
            setTimeout(() => { this.innerHTML = orig; this.classList.remove('text-green-400', 'border-green-400'); }, 2000);
        });
    });

    btnDownload.addEventListener('click', function() {
        const output = csvOutput.value;
        if (!output) { showError(S.nothingToDownload); return; }
        const blob = new Blob([output], { type: 'text/csv;charset=utf-8' });
        const url = URL.createObjectURL(blob);
        const a = document.createElement('a');
        a.href = url; a.download = 'converted.csv';
        document.body.appendChild(a); a.click();
        document.body.removeChild(a); URL.revokeObjectURL(url);
        showSuccess(S.csvDownloaded);
    });

    btnSample.addEventListener('click', function() {
        tsvInput.value = sampleTSV;
        csvOutput.value = '';
        statsBar.classList.add('hidden');
    });

    btnClear.addEventListener('click', function() {
        tsvInput.value = ''; csvOutput.value = '';
        statsBar.classList.add('hidden');
        successNotification.classList.add('hidden');
        errorNotification.classList.add('hidden');
    });

    fileUpload.addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (!file) return;
        const reader = new FileReader();
        reader.onload = function(evt) {
            tsvInput.value = evt.target.result;
            csvOutput.value = '';
            statsBar.classList.add('hidden');
            showSuccess(S.fileLoaded + ': ' + file.name);
        };
        reader.readAsText(file);
        this.value = '';
    });

    // Real-time conversion with debounce
    let timer;
    tsvInput.addEventListener('input', function() {
        clearTimeout(timer);
        timer = setTimeout(() => { if (tsvInput.value.trim()) convert(); }, 300);
    });

    quoteStyle.addEventListener('change', () => { if (tsvInput.value.trim()) convert(); });
    trimWhitespace.addEventListener('change', () => { if (tsvInput.value.trim()) convert(); });

    // Keyboard shortcut: Ctrl/Cmd + Enter to convert
    document.addEventListener('keydown', function(e) {
        if ((e.ctrlKey || e.metaKey) && e.key === 'Enter') {
            e.preventDefault();
            convert();
        }
    });
})();
</script>
