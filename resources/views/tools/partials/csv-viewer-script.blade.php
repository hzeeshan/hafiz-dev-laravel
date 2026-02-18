<script>
(function() {
    const stringsEl = document.getElementById('tool-strings');
    const S = {
        enterCsv:         stringsEl?.dataset.enterCsv         || 'Please enter or paste CSV data',
        noData:           stringsEl?.dataset.noData           || 'No valid data found',
        columnPrefix:     stringsEl?.dataset.columnPrefix     || 'Column',
        nothingToCopy:    stringsEl?.dataset.nothingToCopy    || 'Nothing to copy',
        nothingToDownload:stringsEl?.dataset.nothingToDownload|| 'Nothing to download',
        copied:           stringsEl?.dataset.copied           || 'Copied!',
        csvDownloaded:    stringsEl?.dataset.csvDownloaded    || 'CSV file downloaded',
        fileLoaded:       stringsEl?.dataset.fileLoaded       || 'File loaded',
        loadedPrefix:     stringsEl?.dataset.loadedPrefix     || 'Loaded',
        rowsX:            stringsEl?.dataset.rowsX            || 'rows ×',
        columnsSuffix:    stringsEl?.dataset.columnsSuffix    || 'columns',
        of:               stringsEl?.dataset.of               || 'of',
        rows:             stringsEl?.dataset.rows             || 'rows',
    };

    const csvInput = document.getElementById('csv-input');
    const delimiterSel = document.getElementById('delimiter');
    const optHeader = document.getElementById('opt-header');
    const fileUpload = document.getElementById('file-upload');
    const btnView = document.getElementById('btn-view');
    const btnCopy = document.getElementById('btn-copy');
    const btnDownload = document.getElementById('btn-download');
    const btnSample = document.getElementById('btn-sample');
    const btnClear = document.getElementById('btn-clear');
    const statsBar = document.getElementById('stats-bar');
    const tableArea = document.getElementById('table-area');
    const tableSearch = document.getElementById('table-search');
    const rowCount = document.getElementById('row-count');
    const tableHead = document.getElementById('table-head');
    const tableBody = document.getElementById('table-body');
    const successNotification = document.getElementById('success-notification');
    const successMessage = document.getElementById('success-message');
    const errorNotification = document.getElementById('error-notification');
    const errorMessage = document.getElementById('error-message');

    const sampleCSV = `Name,Email,Age,City,Country,Salary
John Smith,john@example.com,32,San Francisco,US,95000
Jane Doe,jane@example.com,28,London,UK,72000
Bob Johnson,bob@example.com,45,Toronto,CA,105000
Alice Brown,alice@example.com,35,Berlin,DE,88000
Charlie Wilson,charlie@example.com,29,Tokyo,JP,78000
Diana Prince,diana@example.com,31,Paris,FR,92000
Eve Martinez,eve@example.com,38,Madrid,ES,83000
Frank Lee,frank@example.com,42,Sydney,AU,110000
Grace Kim,grace@example.com,26,Seoul,KR,68000
Henry Zhang,henry@example.com,33,Shanghai,CN,91000`;

    let parsedHeaders = [];
    let parsedRows = [];
    let sortCol = -1;
    let sortDir = 0; // 0=none, 1=asc, 2=desc

    function autoDetectDelimiter(text) {
        const firstLine = text.split('\n')[0];
        const delimiters = [',', ';', '\t', '|'];
        let best = ',';
        let bestCount = 0;
        for (const d of delimiters) {
            const count = (firstLine.match(new RegExp(d === '|' ? '\\|' : (d === '\t' ? '\t' : d), 'g')) || []).length;
            if (count > bestCount) {
                bestCount = count;
                best = d;
            }
        }
        return best;
    }

    function parseCSV(text, delim) {
        const rows = [];
        let current = '', inQuotes = false, row = [];
        for (let i = 0; i < text.length; i++) {
            const ch = text[i], next = text[i + 1];
            if (inQuotes) {
                if (ch === '"' && next === '"') { current += '"'; i++; }
                else if (ch === '"') { inQuotes = false; }
                else { current += ch; }
            } else {
                if (ch === '"') { inQuotes = true; }
                else if (ch === delim) { row.push(current); current = ''; }
                else if (ch === '\n' || (ch === '\r' && next === '\n')) {
                    row.push(current);
                    if (row.some(c => c.trim() !== '')) rows.push(row);
                    row = []; current = '';
                    if (ch === '\r') i++;
                } else { current += ch; }
            }
        }
        row.push(current);
        if (row.some(c => c.trim() !== '')) rows.push(row);
        return rows;
    }

    function getDelimiter() {
        const val = delimiterSel.value;
        if (val === 'auto') return autoDetectDelimiter(csvInput.value);
        if (val === 'tab') return '\t';
        return val;
    }

    function formatSize(bytes) {
        if (bytes < 1024) return bytes + ' B';
        if (bytes < 1024 * 1024) return (bytes / 1024).toFixed(1) + ' KB';
        return (bytes / (1024 * 1024)).toFixed(1) + ' MB';
    }

    function renderTable() {
        const input = csvInput.value.trim();
        if (!input) { showError(S.enterCsv); return; }

        const delim = getDelimiter();
        const allRows = parseCSV(input, delim);
        if (allRows.length === 0) { showError(S.noData); return; }

        if (optHeader.checked && allRows.length > 0) {
            parsedHeaders = allRows[0].map(h => h.trim());
            parsedRows = allRows.slice(1);
        } else {
            parsedHeaders = allRows[0].map((_, i) => S.columnPrefix + ' ' + (i + 1));
            parsedRows = allRows;
        }

        // Normalize column count
        const colCount = parsedHeaders.length;
        parsedRows = parsedRows.map(row => {
            while (row.length < colCount) row.push('');
            return row.slice(0, colCount);
        });

        sortCol = -1;
        sortDir = 0;

        buildTableHead();
        filterAndRender();

        // Stats
        document.getElementById('stat-rows').textContent = parsedRows.length;
        document.getElementById('stat-cols').textContent = colCount;
        document.getElementById('stat-cells').textContent = parsedRows.length * colCount;
        document.getElementById('stat-size').textContent = formatSize(new Blob([input]).size);
        statsBar.classList.remove('hidden');
        tableArea.classList.remove('hidden');

        showSuccess(S.loadedPrefix + ' ' + parsedRows.length + ' ' + S.rowsX + ' ' + colCount + ' ' + S.columnsSuffix);
    }

    function buildTableHead() {
        let html = '<tr>';
        for (let i = 0; i < parsedHeaders.length; i++) {
            const arrow = sortCol === i
                ? (sortDir === 1 ? ' ▲' : sortDir === 2 ? ' ▼' : '')
                : '';
            html += '<th class="px-4 py-3 border-b border-gold/20 cursor-pointer hover:text-gold-light select-none whitespace-nowrap" data-col="' + i + '">';
            html += escapeHtml(parsedHeaders[i]) + '<span class="ml-1 text-gold/60">' + arrow + '</span>';
            html += '</th>';
        }
        html += '</tr>';
        tableHead.innerHTML = html;

        // Sort click handlers
        tableHead.querySelectorAll('th').forEach(th => {
            th.addEventListener('click', function() {
                const col = parseInt(this.dataset.col);
                if (sortCol === col) {
                    sortDir = (sortDir + 1) % 3;
                } else {
                    sortCol = col;
                    sortDir = 1;
                }
                if (sortDir === 0) sortCol = -1;
                buildTableHead();
                filterAndRender();
            });
        });
    }

    function filterAndRender() {
        const query = tableSearch.value.toLowerCase().trim();
        let filtered = parsedRows;

        if (query) {
            filtered = parsedRows.filter(row =>
                row.some(cell => cell.toLowerCase().includes(query))
            );
        }

        // Sort
        if (sortCol >= 0 && sortDir > 0) {
            filtered = [...filtered].sort((a, b) => {
                let va = a[sortCol] || '';
                let vb = b[sortCol] || '';

                // Try numeric sort
                const na = parseFloat(va);
                const nb = parseFloat(vb);
                if (!isNaN(na) && !isNaN(nb)) {
                    return sortDir === 1 ? na - nb : nb - na;
                }

                // String sort
                va = va.toLowerCase();
                vb = vb.toLowerCase();
                if (va < vb) return sortDir === 1 ? -1 : 1;
                if (va > vb) return sortDir === 1 ? 1 : -1;
                return 0;
            });
        }

        // Build rows
        let html = '';
        for (let r = 0; r < filtered.length; r++) {
            const bgClass = r % 2 === 0 ? '' : 'bg-darkCard/30';
            html += '<tr class="border-b border-gold/10 hover:bg-gold/5 ' + bgClass + '">';
            for (const cell of filtered[r]) {
                html += '<td class="px-4 py-2 whitespace-nowrap">' + escapeHtml(cell) + '</td>';
            }
            html += '</tr>';
        }
        tableBody.innerHTML = html;

        rowCount.textContent = filtered.length + ' ' + S.of + ' ' + parsedRows.length + ' ' + S.rows;
    }

    function escapeHtml(s) {
        const div = document.createElement('div');
        div.textContent = s;
        return div.innerHTML;
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

    // Events
    btnView.addEventListener('click', renderTable);

    btnCopy.addEventListener('click', function() {
        const text = csvInput.value;
        if (!text) { showError(S.nothingToCopy); return; }
        navigator.clipboard.writeText(text).then(() => {
            const orig = this.innerHTML;
            this.innerHTML = '<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> ' + S.copied;
            this.classList.add('text-green-400', 'border-green-400');
            setTimeout(() => { this.innerHTML = orig; this.classList.remove('text-green-400', 'border-green-400'); }, 2000);
        });
    });

    btnDownload.addEventListener('click', function() {
        const text = csvInput.value;
        if (!text) { showError(S.nothingToDownload); return; }
        const blob = new Blob([text], { type: 'text/csv;charset=utf-8' });
        const url = URL.createObjectURL(blob);
        const a = document.createElement('a');
        a.href = url; a.download = 'data.csv';
        document.body.appendChild(a); a.click();
        document.body.removeChild(a); URL.revokeObjectURL(url);
        showSuccess(S.csvDownloaded);
    });

    btnSample.addEventListener('click', function() {
        csvInput.value = sampleCSV;
        tableArea.classList.add('hidden');
        statsBar.classList.add('hidden');
    });

    btnClear.addEventListener('click', function() {
        csvInput.value = '';
        tableArea.classList.add('hidden');
        statsBar.classList.add('hidden');
        tableSearch.value = '';
        successNotification.classList.add('hidden');
        errorNotification.classList.add('hidden');
    });

    fileUpload.addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (!file) return;
        const reader = new FileReader();
        reader.onload = function(evt) {
            csvInput.value = evt.target.result;
            tableArea.classList.add('hidden');
            statsBar.classList.add('hidden');
            showSuccess(S.fileLoaded + ': ' + file.name);
        };
        reader.readAsText(file);
        this.value = '';
    });

    tableSearch.addEventListener('input', filterAndRender);

    [delimiterSel, optHeader].forEach(el => {
        el.addEventListener('change', () => {
            if (csvInput.value.trim() && tableArea.classList.contains('hidden') === false) renderTable();
        });
    });

    document.addEventListener('keydown', function(e) {
        if ((e.ctrlKey || e.metaKey) && e.key === 'Enter') { e.preventDefault(); renderTable(); }
    });
})();
</script>
