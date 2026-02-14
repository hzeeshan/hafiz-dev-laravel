<script>
(function() {
    const stringsEl = document.getElementById('tool-strings');
    const S = {
        csv_input: stringsEl?.dataset.csvInput || 'CSV Input',
        sql_output: stringsEl?.dataset.sqlOutput || 'SQL Output',
        upload_csv: stringsEl?.dataset.uploadCsv || 'Upload .csv',
        generate_sql: stringsEl?.dataset.generateSql || 'Generate SQL',
        copy: stringsEl?.dataset.copy || 'Copy',
        download_sql: stringsEl?.dataset.downloadSql || 'Download .sql',
        sample: stringsEl?.dataset.sample || 'Sample',
        clear: stringsEl?.dataset.clear || 'Clear',
        copied: stringsEl?.dataset.copied || 'Copied!',
        nothing_to_copy: stringsEl?.dataset.nothingToCopy || 'Nothing to copy',
        nothing_to_download: stringsEl?.dataset.nothingToDownload || 'Nothing to download',
        sql_downloaded: stringsEl?.dataset.sqlDownloaded || 'SQL file downloaded',
        file_loaded: stringsEl?.dataset.fileLoaded || 'File loaded:',
        enter_csv: stringsEl?.dataset.enterCsv || 'Please enter or paste CSV data',
        min_rows: stringsEl?.dataset.minRows || 'CSV must have at least a header row and one data row',
        generated_msg: stringsEl?.dataset.generatedMsg || 'Generated {statements} SQL statements for {rows} rows',
        error_prefix: stringsEl?.dataset.errorPrefix || 'Error:',
        rows: stringsEl?.dataset.rows || 'Rows',
        columns: stringsEl?.dataset.columns || 'Columns',
        statements: stringsEl?.dataset.statements || 'Statements',
        dialect: stringsEl?.dataset.dialect || 'Dialect',
        output_size: stringsEl?.dataset.outputSize || 'Output Size',
        detected_types: stringsEl?.dataset.detectedTypes || 'Detected Column Types',
    };

    const csvInput = document.getElementById('csv-input');
    const sqlOutput = document.getElementById('sql-output');
    const tableName = document.getElementById('table-name');
    const sqlDialect = document.getElementById('sql-dialect');
    const delimiterSel = document.getElementById('delimiter');
    const insertMode = document.getElementById('insert-mode');
    const includeCreate = document.getElementById('include-create');
    const includeDrop = document.getElementById('include-drop');
    const wrapTransaction = document.getElementById('wrap-transaction');
    const nullEmpty = document.getElementById('null-empty');
    const fileUpload = document.getElementById('file-upload');
    const btnConvert = document.getElementById('btn-convert');
    const btnCopy = document.getElementById('btn-copy');
    const btnDownload = document.getElementById('btn-download');
    const btnSample = document.getElementById('btn-sample');
    const btnClear = document.getElementById('btn-clear');
    const statsBar = document.getElementById('stats-bar');
    const typesPanel = document.getElementById('types-panel');
    const typesList = document.getElementById('types-list');
    const successNotification = document.getElementById('success-notification');
    const successMessage = document.getElementById('success-message');
    const errorNotification = document.getElementById('error-notification');
    const errorMessage = document.getElementById('error-message');

    const sampleCSV = `id,name,email,age,salary,is_active,hire_date
1,John Smith,john@example.com,32,95000.50,true,2020-03-15
2,Jane Doe,jane@example.com,28,82000.00,true,2021-07-01
3,Bob Wilson,bob@example.com,45,105000.75,false,2018-11-20
4,Alice Chen,alice@example.com,35,112000.00,true,2019-06-10
5,Carlos García,carlos@example.com,29,88000.25,true,2022-01-05`;

    // ===== CSV Parser =====
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
                else if (ch === delim) { row.push(current.trim()); current = ''; }
                else if (ch === '\n' || (ch === '\r' && next === '\n')) {
                    row.push(current.trim());
                    if (row.some(c => c !== '')) rows.push(row);
                    row = []; current = '';
                    if (ch === '\r') i++;
                } else { current += ch; }
            }
        }
        row.push(current.trim());
        if (row.some(c => c !== '')) rows.push(row);
        return rows;
    }

    // ===== Type Detection =====
    function detectType(values) {
        const nonEmpty = values.filter(v => v !== '' && v !== null);
        if (nonEmpty.length === 0) return 'varchar';

        const isInt = nonEmpty.every(v => /^-?\d+$/.test(v));
        if (isInt) return 'integer';

        const isDec = nonEmpty.every(v => /^-?\d+\.\d+$/.test(v));
        if (isDec) return 'decimal';

        const isBool = nonEmpty.every(v => /^(true|false|0|1|yes|no)$/i.test(v));
        if (isBool) return 'boolean';

        const isDate = nonEmpty.every(v => /^\d{4}-\d{2}-\d{2}$/.test(v) || /^\d{2}\/\d{2}\/\d{4}$/.test(v));
        if (isDate) return 'date';

        return 'varchar';
    }

    // ===== Quoting =====
    function quoteIdentifier(name, dialect) {
        const clean = name.replace(/[^a-zA-Z0-9_]/g, '_');
        switch (dialect) {
            case 'mysql': return '`' + clean + '`';
            case 'sqlserver': return '[' + clean + ']';
            default: return '"' + clean + '"';
        }
    }

    function escapeString(val, dialect) {
        return val.replace(/'/g, "''");
    }

    function formatValue(val, type, dialect, emptyAsNull) {
        if (val === '' || val === null || val === undefined) {
            return emptyAsNull ? 'NULL' : "''";
        }
        switch (type) {
            case 'integer':
            case 'decimal':
                return val;
            case 'boolean':
                const boolVal = /^(true|1|yes)$/i.test(val);
                if (dialect === 'mysql') return boolVal ? '1' : '0';
                if (dialect === 'postgresql') return boolVal ? 'TRUE' : 'FALSE';
                return boolVal ? '1' : '0';
            case 'date':
                return "'" + escapeString(val, dialect) + "'";
            default:
                return "'" + escapeString(val, dialect) + "'";
        }
    }

    function sqlType(type, dialect, maxLen) {
        const len = Math.max(maxLen || 50, 50);
        switch (type) {
            case 'integer':
                if (dialect === 'sqlserver') return 'INT';
                return 'INTEGER';
            case 'decimal':
                if (dialect === 'sqlserver') return 'DECIMAL(12,2)';
                if (dialect === 'mysql') return 'DECIMAL(12,2)';
                return 'NUMERIC(12,2)';
            case 'boolean':
                if (dialect === 'mysql') return 'TINYINT(1)';
                if (dialect === 'postgresql') return 'BOOLEAN';
                if (dialect === 'sqlserver') return 'BIT';
                return 'INTEGER';
            case 'date':
                return 'DATE';
            default:
                if (dialect === 'sqlserver') return `NVARCHAR(${len})`;
                return `VARCHAR(${len})`;
        }
    }

    // ===== Generate SQL =====
    function convert() {
        const input = csvInput.value.trim();
        if (!input) { showError(S.enter_csv); return; }

        try {
            const delim = delimiterSel.value === '\\t' ? '\t' : delimiterSel.value;
            const rows = parseCSV(input, delim);
            if (rows.length < 2) { showError(S.min_rows); return; }

            const headers = rows[0];
            const dataRows = rows.slice(1);
            const dialect = sqlDialect.value;
            const table = quoteIdentifier(tableName.value || 'my_table', dialect);
            const quotedCols = headers.map(h => quoteIdentifier(h, dialect));
            const emptyNull = nullEmpty.checked;

            // Detect types per column
            const types = headers.map((_, ci) => {
                const colVals = dataRows.map(r => ci < r.length ? r[ci] : '');
                return detectType(colVals);
            });

            // Max lengths for VARCHAR
            const maxLens = headers.map((_, ci) => {
                return Math.max(...dataRows.map(r => (ci < r.length ? r[ci] : '').length), 1);
            });

            let sql = '';
            let stmtCount = 0;

            // Transaction start
            if (wrapTransaction.checked) {
                sql += 'BEGIN TRANSACTION;\n\n';
            }

            // DROP TABLE
            if (includeDrop.checked) {
                if (dialect === 'sqlserver') {
                    sql += `IF OBJECT_ID('${tableName.value || 'my_table'}', 'U') IS NOT NULL DROP TABLE ${table};\n\n`;
                } else {
                    sql += `DROP TABLE IF EXISTS ${table};\n\n`;
                }
                stmtCount++;
            }

            // CREATE TABLE
            if (includeCreate.checked) {
                sql += `CREATE TABLE ${table} (\n`;
                const colDefs = headers.map((h, i) => {
                    return `  ${quotedCols[i]} ${sqlType(types[i], dialect, maxLens[i])}`;
                });
                sql += colDefs.join(',\n');
                sql += '\n);\n\n';
                stmtCount++;
            }

            // INSERT statements
            if (insertMode.value === 'batch') {
                sql += `INSERT INTO ${table} (${quotedCols.join(', ')})\nVALUES\n`;
                const valueParts = dataRows.map(row => {
                    const vals = headers.map((_, ci) => {
                        const val = ci < row.length ? row[ci] : '';
                        return formatValue(val, types[ci], dialect, emptyNull);
                    });
                    return `  (${vals.join(', ')})`;
                });
                sql += valueParts.join(',\n');
                sql += ';\n';
                stmtCount++;
            } else {
                for (const row of dataRows) {
                    const vals = headers.map((_, ci) => {
                        const val = ci < row.length ? row[ci] : '';
                        return formatValue(val, types[ci], dialect, emptyNull);
                    });
                    sql += `INSERT INTO ${table} (${quotedCols.join(', ')}) VALUES (${vals.join(', ')});\n`;
                    stmtCount++;
                }
            }

            // Transaction end
            if (wrapTransaction.checked) {
                sql += '\nCOMMIT;\n';
            }

            sqlOutput.value = sql;

            // Stats
            document.getElementById('stat-rows').textContent = dataRows.length;
            document.getElementById('stat-cols').textContent = headers.length;
            document.getElementById('stat-statements').textContent = stmtCount;
            document.getElementById('stat-dialect').textContent = dialect === 'sqlserver' ? 'MSSQL' : dialect.charAt(0).toUpperCase() + dialect.slice(1);
            document.getElementById('stat-size').textContent = formatSize(sql.length);
            statsBar.classList.remove('hidden');

            // Show types
            const typeColors = { integer: 'text-blue-400 border-blue-400/30 bg-blue-400/10', decimal: 'text-cyan-400 border-cyan-400/30 bg-cyan-400/10', boolean: 'text-purple-400 border-purple-400/30 bg-purple-400/10', date: 'text-green-400 border-green-400/30 bg-green-400/10', varchar: 'text-yellow-400 border-yellow-400/30 bg-yellow-400/10' };
            typesList.innerHTML = headers.map((h, i) => {
                const cls = typeColors[types[i]] || typeColors.varchar;
                return `<span class="px-2.5 py-1 rounded-lg border text-xs font-mono ${cls}">${h}: ${types[i].toUpperCase()}</span>`;
            }).join('');
            typesPanel.classList.remove('hidden');

            showSuccess(S.generated_msg.replace('{statements}', stmtCount).replace('{rows}', dataRows.length));
        } catch (e) {
            showError(S.error_prefix + ' ' + e.message);
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

    // ===== Events =====
    btnConvert.addEventListener('click', convert);

    btnCopy.addEventListener('click', function() {
        const output = sqlOutput.value;
        if (!output) { showError(S.nothing_to_copy); return; }
        navigator.clipboard.writeText(output).then(() => {
            const orig = this.innerHTML;
            this.innerHTML = '<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> ' + S.copied;
            this.classList.add('text-green-400', 'border-green-400');
            setTimeout(() => { this.innerHTML = orig; this.classList.remove('text-green-400', 'border-green-400'); }, 2000);
        });
    });

    btnDownload.addEventListener('click', function() {
        const output = sqlOutput.value;
        if (!output) { showError(S.nothing_to_download); return; }
        const blob = new Blob([output], { type: 'text/sql;charset=utf-8' });
        const url = URL.createObjectURL(blob);
        const a = document.createElement('a');
        a.href = url; a.download = (tableName.value || 'data') + '.sql';
        document.body.appendChild(a); a.click();
        document.body.removeChild(a); URL.revokeObjectURL(url);
        showSuccess(S.sql_downloaded);
    });

    btnSample.addEventListener('click', function() {
        csvInput.value = sampleCSV;
        sqlOutput.value = '';
        statsBar.classList.add('hidden');
        typesPanel.classList.add('hidden');
    });

    btnClear.addEventListener('click', function() {
        csvInput.value = ''; sqlOutput.value = '';
        statsBar.classList.add('hidden');
        typesPanel.classList.add('hidden');
        successNotification.classList.add('hidden');
        errorNotification.classList.add('hidden');
    });

    fileUpload.addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (!file) return;
        const reader = new FileReader();
        reader.onload = function(evt) {
            csvInput.value = evt.target.result;
            sqlOutput.value = '';
            statsBar.classList.add('hidden');
            typesPanel.classList.add('hidden');
            showSuccess(S.file_loaded + ' ' + file.name);
        };
        reader.readAsText(file);
        this.value = '';
    });

    let timer;
    csvInput.addEventListener('input', function() {
        clearTimeout(timer);
        timer = setTimeout(() => { if (csvInput.value.trim()) convert(); }, 500);
    });

    [sqlDialect, delimiterSel, insertMode, includeCreate, includeDrop, wrapTransaction, nullEmpty].forEach(el => {
        el.addEventListener('change', () => { if (csvInput.value.trim()) convert(); });
    });
    tableName.addEventListener('input', () => { clearTimeout(timer); timer = setTimeout(() => { if (csvInput.value.trim()) convert(); }, 500); });

    document.addEventListener('keydown', function(e) {
        if ((e.ctrlKey || e.metaKey) && e.key === 'Enter') { e.preventDefault(); convert(); }
    });
})();
</script>
