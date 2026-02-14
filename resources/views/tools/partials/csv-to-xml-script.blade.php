<script>
(function() {
    const stringsEl = document.getElementById('tool-strings');
    const S = {
        enter_csv: stringsEl?.dataset.enterCsv || 'Please enter or paste CSV data',
        no_data: stringsEl?.dataset.noData || 'No data found in CSV input',
        converted: stringsEl?.dataset.converted || 'Converted {rows} rows × {cols} columns to XML',
        error_converting: stringsEl?.dataset.errorConverting || 'Error converting CSV: ',
        nothing_to_copy: stringsEl?.dataset.nothingToCopy || 'Nothing to copy. Convert CSV first.',
        nothing_to_download: stringsEl?.dataset.nothingToDownload || 'Nothing to download. Convert CSV first.',
        copied: stringsEl?.dataset.copied || 'Copied!',
        file_loaded: stringsEl?.dataset.fileLoaded || 'File loaded: ',
        xml_downloaded: stringsEl?.dataset.xmlDownloaded || 'XML file downloaded',
    };

    // DOM Elements
    const csvInput = document.getElementById('csv-input');
    const xmlOutput = document.getElementById('xml-output');
    const delimiter = document.getElementById('delimiter');
    const rootElement = document.getElementById('root-element');
    const rowElement = document.getElementById('row-element');
    const firstRowHeader = document.getElementById('first-row-header');
    const useAttributes = document.getElementById('use-attributes');
    const useCdata = document.getElementById('use-cdata');
    const includeDeclaration = document.getElementById('include-declaration');
    const minifyOutput = document.getElementById('minify-output');
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

    const sampleCSV = `name,email,city,role,salary
John Smith,john@example.com,New York,Developer,95000
Jane Doe,jane@example.com,London,Designer,82000
Bob Wilson,bob@example.com,Berlin,Manager,105000
Alice Chen,alice@example.com,Tokyo,"Senior Developer",112000
Carlos García,carlos@example.com,Madrid,DevOps,88000`;

    // ===== CSV Parser =====
    function parseCSV(text, delim) {
        const rows = [];
        let current = '';
        let inQuotes = false;
        let row = [];

        for (let i = 0; i < text.length; i++) {
            const ch = text[i];
            const next = text[i + 1];

            if (inQuotes) {
                if (ch === '"' && next === '"') {
                    current += '"';
                    i++;
                } else if (ch === '"') {
                    inQuotes = false;
                } else {
                    current += ch;
                }
            } else {
                if (ch === '"') {
                    inQuotes = true;
                } else if (ch === delim) {
                    row.push(current.trim());
                    current = '';
                } else if (ch === '\n' || (ch === '\r' && next === '\n')) {
                    row.push(current.trim());
                    if (row.some(cell => cell !== '')) rows.push(row);
                    row = [];
                    current = '';
                    if (ch === '\r') i++;
                } else {
                    current += ch;
                }
            }
        }
        // Last field
        row.push(current.trim());
        if (row.some(cell => cell !== '')) rows.push(row);

        return rows;
    }

    // ===== XML Generation =====
    function sanitizeElementName(name) {
        let clean = name.replace(/[^a-zA-Z0-9_.-]/g, '_').replace(/^[^a-zA-Z_]/, '_');
        if (!clean) clean = 'field';
        return clean;
    }

    function escapeXml(str) {
        return str
            .replace(/&/g, '&amp;')
            .replace(/</g, '&lt;')
            .replace(/>/g, '&gt;')
            .replace(/"/g, '&quot;')
            .replace(/'/g, '&apos;');
    }

    function wrapValue(value, cdata) {
        if (cdata && value.length > 0) {
            return '<![CDATA[' + value + ']]>';
        }
        return escapeXml(value);
    }

    function convert() {
        const input = csvInput.value.trim();
        if (!input) {
            showError(S.enter_csv);
            return;
        }

        try {
            const delim = delimiter.value === '\\t' ? '\t' : delimiter.value;
            const rows = parseCSV(input, delim);

            if (rows.length === 0) {
                showError(S.no_data);
                return;
            }

            const root = sanitizeElementName(rootElement.value || 'data');
            const row = sanitizeElementName(rowElement.value || 'record');
            const hasHeaders = firstRowHeader.checked;
            const asAttributes = useAttributes.checked;
            const cdata = useCdata.checked;
            const declaration = includeDeclaration.checked;
            const minify = minifyOutput.checked;

            // Headers
            let headers;
            let dataRows;
            if (hasHeaders && rows.length > 1) {
                headers = rows[0].map(h => sanitizeElementName(h));
                dataRows = rows.slice(1);
            } else {
                headers = rows[0].map((_, i) => 'field' + (i + 1));
                dataRows = hasHeaders ? rows.slice(1) : rows;
            }

            const nl = minify ? '' : '\n';
            const t1 = minify ? '' : '  ';
            const t2 = minify ? '' : '    ';

            let xml = '';
            if (declaration) {
                xml += '<?xml version="1.0" encoding="UTF-8"?>' + nl;
            }
            xml += '<' + root + '>' + nl;

            for (const dataRow of dataRows) {
                if (asAttributes) {
                    xml += t1 + '<' + row;
                    for (let i = 0; i < headers.length; i++) {
                        const val = i < dataRow.length ? dataRow[i] : '';
                        xml += ' ' + headers[i] + '="' + escapeXml(val) + '"';
                    }
                    xml += '/>' + nl;
                } else {
                    xml += t1 + '<' + row + '>' + nl;
                    for (let i = 0; i < headers.length; i++) {
                        const val = i < dataRow.length ? dataRow[i] : '';
                        xml += t2 + '<' + headers[i] + '>' + wrapValue(val, cdata) + '</' + headers[i] + '>' + nl;
                    }
                    xml += t1 + '</' + row + '>' + nl;
                }
            }

            xml += '</' + root + '>';

            xmlOutput.value = xml;

            // Stats
            document.getElementById('stat-rows').textContent = dataRows.length;
            document.getElementById('stat-cols').textContent = headers.length;
            document.getElementById('stat-input-size').textContent = formatSize(input.length);
            document.getElementById('stat-output-size').textContent = formatSize(xml.length);
            statsBar.classList.remove('hidden');

            showSuccess(S.converted.replace('{rows}', dataRows.length).replace('{cols}', headers.length));
        } catch (e) {
            showError(S.error_converting + e.message);
        }
    }

    function formatSize(bytes) {
        if (bytes < 1024) return bytes + ' B';
        return (bytes / 1024).toFixed(1) + ' KB';
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

    // ===== Event Listeners =====
    btnConvert.addEventListener('click', convert);

    btnCopy.addEventListener('click', function() {
        const output = xmlOutput.value;
        if (!output) { showError(S.nothing_to_copy); return; }
        navigator.clipboard.writeText(output).then(() => {
            const orig = this.innerHTML;
            this.innerHTML = '<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> ' + S.copied;
            this.classList.add('text-green-400', 'border-green-400');
            setTimeout(() => { this.innerHTML = orig; this.classList.remove('text-green-400', 'border-green-400'); }, 2000);
        });
    });

    btnDownload.addEventListener('click', function() {
        const output = xmlOutput.value;
        if (!output) { showError(S.nothing_to_download); return; }
        const blob = new Blob([output], { type: 'application/xml;charset=utf-8' });
        const url = URL.createObjectURL(blob);
        const a = document.createElement('a');
        a.href = url;
        a.download = 'data.xml';
        document.body.appendChild(a);
        a.click();
        document.body.removeChild(a);
        URL.revokeObjectURL(url);
        showSuccess(S.xml_downloaded);
    });

    btnSample.addEventListener('click', function() {
        csvInput.value = sampleCSV;
        xmlOutput.value = '';
        statsBar.classList.add('hidden');
    });

    btnClear.addEventListener('click', function() {
        csvInput.value = '';
        xmlOutput.value = '';
        statsBar.classList.add('hidden');
        successNotification.classList.add('hidden');
        errorNotification.classList.add('hidden');
    });

    fileUpload.addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (!file) return;
        const reader = new FileReader();
        reader.onload = function(evt) {
            csvInput.value = evt.target.result;
            xmlOutput.value = '';
            statsBar.classList.add('hidden');
            showSuccess(S.file_loaded + file.name);
        };
        reader.readAsText(file);
        this.value = '';
    });

    // Real-time conversion
    let debounceTimer;
    csvInput.addEventListener('input', function() {
        clearTimeout(debounceTimer);
        debounceTimer = setTimeout(() => {
            if (csvInput.value.trim()) convert();
        }, 500);
    });

    // Re-convert on option change
    [delimiter, firstRowHeader, useAttributes, useCdata, includeDeclaration, minifyOutput].forEach(el => {
        el.addEventListener('change', () => { if (csvInput.value.trim()) convert(); });
    });
    [rootElement, rowElement].forEach(el => {
        el.addEventListener('input', () => { if (csvInput.value.trim()) { clearTimeout(debounceTimer); debounceTimer = setTimeout(convert, 500); } });
    });

    // Keyboard shortcut
    document.addEventListener('keydown', function(e) {
        if ((e.ctrlKey || e.metaKey) && e.key === 'Enter') { e.preventDefault(); convert(); }
    });
})();
</script>
