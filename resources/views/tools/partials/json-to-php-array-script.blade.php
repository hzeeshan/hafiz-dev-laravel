<script>
(function() {
    const stringsEl = document.getElementById('tool-strings');
    const S = {
        paste_json: stringsEl?.dataset.pasteJson || 'Paste your JSON here...',
        php_placeholder: stringsEl?.dataset.phpPlaceholder || 'PHP array code will appear here...',
        please_enter_json: stringsEl?.dataset.pleaseEnterJson || 'Please enter JSON data',
        invalid_json: stringsEl?.dataset.invalidJson || 'Invalid JSON: ',
        converted_success: stringsEl?.dataset.convertedSuccess || 'Converted to PHP array',
        nothing_to_copy: stringsEl?.dataset.nothingToCopy || 'Nothing to copy',
        copied: stringsEl?.dataset.copied || 'Copied!',
        nothing_to_download: stringsEl?.dataset.nothingToDownload || 'Nothing to download',
        php_downloaded: stringsEl?.dataset.phpDownloaded || 'PHP file downloaded',
        file_loaded: stringsEl?.dataset.fileLoaded || 'File loaded: ',
        variable_name_label: stringsEl?.dataset.variableNameLabel || 'Variable Name',
        array_syntax_label: stringsEl?.dataset.arraySyntaxLabel || 'Array Syntax',
        short_syntax: stringsEl?.dataset.shortSyntax || 'Short syntax []',
        long_syntax: stringsEl?.dataset.longSyntax || 'Long syntax array()',
        indent_label: stringsEl?.dataset.indentLabel || 'Indent',
        two_spaces: stringsEl?.dataset.twoSpaces || '2 spaces',
        four_spaces: stringsEl?.dataset.fourSpaces || '4 spaces',
        tab: stringsEl?.dataset.tab || 'Tab',
        trailing_commas: stringsEl?.dataset.trailingCommas || 'Trailing commas',
        variable_assignment: stringsEl?.dataset.variableAssignment || 'Variable assignment',
        single_quotes: stringsEl?.dataset.singleQuotes || 'Single quotes',
        json_input: stringsEl?.dataset.jsonInput || 'JSON Input',
        php_output: stringsEl?.dataset.phpOutput || 'PHP Output',
        upload_json: stringsEl?.dataset.uploadJson || 'Upload .json',
        convert_btn: stringsEl?.dataset.convertBtn || 'Convert to PHP',
        copy_btn: stringsEl?.dataset.copyBtn || 'Copy',
        download_btn: stringsEl?.dataset.downloadBtn || 'Download .php',
        sample_btn: stringsEl?.dataset.sampleBtn || 'Sample',
        clear_btn: stringsEl?.dataset.clearBtn || 'Clear',
        stat_keys: stringsEl?.dataset.statKeys || 'Keys',
        stat_depth: stringsEl?.dataset.statDepth || 'Max Depth',
        stat_arrays: stringsEl?.dataset.statArrays || 'Arrays',
        stat_lines: stringsEl?.dataset.statLines || 'Lines',
    };

    const jsonInput = document.getElementById('json-input');
    const phpOutput = document.getElementById('php-output');
    const variableName = document.getElementById('variable-name');
    const arrayStyle = document.getElementById('array-style');
    const indentSize = document.getElementById('indent-size');
    const trailingCommas = document.getElementById('trailing-commas');
    const includeAssignment = document.getElementById('include-assignment');
    const singleQuotes = document.getElementById('single-quotes');
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

    const sampleJSON = `{
  "app_name": "My Laravel App",
  "debug": true,
  "version": 3.2,
  "database": {
    "driver": "mysql",
    "host": "127.0.0.1",
    "port": 3306,
    "name": "my_app",
    "credentials": {
      "username": "root",
      "password": null
    }
  },
  "cache": {
    "driver": "redis",
    "ttl": 3600,
    "prefix": "app_"
  },
  "allowed_origins": [
    "https://example.com",
    "https://api.example.com"
  ],
  "features": {
    "registration": true,
    "social_login": false,
    "two_factor": true
  },
  "mail": {
    "mailer": "smtp",
    "from": {
      "address": "noreply@example.com",
      "name": "My App"
    }
  },
  "pagination": {
    "per_page": 15,
    "max_per_page": 100
  },
  "tags": ["laravel", "php", "api"],
  "metadata": null
}`;

    let totalKeys = 0;
    let maxDepth = 0;
    let arrayCount = 0;

    function getIndent(level) {
        const val = indentSize.value;
        if (val === 'tab') return '\t'.repeat(level);
        return ' '.repeat(parseInt(val) * level);
    }

    function quoteString(str) {
        if (singleQuotes.checked) {
            return "'" + str.replace(/\\/g, '\\\\').replace(/'/g, "\\'") + "'";
        }
        return '"' + str.replace(/\\/g, '\\\\').replace(/"/g, '\\"') + '"';
    }

    function isSequentialArray(arr) {
        return Array.isArray(arr);
    }

    function isAssociativeObject(obj) {
        return typeof obj === 'object' && obj !== null && !Array.isArray(obj);
    }

    function convertValue(value, depth) {
        if (depth > maxDepth) maxDepth = depth;

        if (value === null) return 'null';
        if (value === true) return 'true';
        if (value === false) return 'false';
        if (typeof value === 'number') {
            return Number.isInteger(value) ? value.toString() : value.toString();
        }
        if (typeof value === 'string') return quoteString(value);

        const useShort = arrayStyle.value === 'short';
        const trail = trailingCommas.checked;
        const indent = getIndent(depth + 1);
        const closingIndent = getIndent(depth);

        if (Array.isArray(value)) {
            arrayCount++;
            if (value.length === 0) {
                return useShort ? '[]' : 'array()';
            }

            const open = useShort ? '[' : 'array(';
            const close = useShort ? ']' : ')';

            let lines = [];
            for (let i = 0; i < value.length; i++) {
                const converted = convertValue(value[i], depth + 1);
                const comma = (i < value.length - 1 || trail) ? ',' : '';
                lines.push(indent + converted + comma);
            }

            return open + '\n' + lines.join('\n') + '\n' + closingIndent + close;
        }

        if (isAssociativeObject(value)) {
            arrayCount++;
            const keys = Object.keys(value);
            if (keys.length === 0) {
                return useShort ? '[]' : 'array()';
            }

            const open = useShort ? '[' : 'array(';
            const close = useShort ? ']' : ')';

            let lines = [];
            for (let i = 0; i < keys.length; i++) {
                totalKeys++;
                const key = quoteString(keys[i]);
                const val = convertValue(value[keys[i]], depth + 1);
                const comma = (i < keys.length - 1 || trail) ? ',' : '';
                lines.push(indent + key + ' => ' + val + comma);
            }

            return open + '\n' + lines.join('\n') + '\n' + closingIndent + close;
        }

        return 'null';
    }

    function convert() {
        const input = jsonInput.value.trim();
        if (!input) { showError(S.please_enter_json); return; }

        try {
            const parsed = JSON.parse(input);

            totalKeys = 0;
            maxDepth = 0;
            arrayCount = 0;

            const phpArray = convertValue(parsed, 0);

            let output = '';
            if (includeAssignment.checked) {
                let varName = variableName.value.trim() || '$data';
                if (!varName.startsWith('$')) varName = '$' + varName;
                output = varName + ' = ' + phpArray + ';';
            } else {
                output = phpArray;
            }

            phpOutput.value = output;

            // Stats
            document.getElementById('stat-keys').textContent = totalKeys;
            document.getElementById('stat-depth').textContent = maxDepth;
            document.getElementById('stat-arrays').textContent = arrayCount;
            document.getElementById('stat-lines').textContent = output.split('\n').length;
            statsBar.classList.remove('hidden');

            showSuccess(S.converted_success + ' — ' + totalKeys + ' keys, ' + arrayCount + ' arrays');
        } catch (e) {
            showError(S.invalid_json + e.message);
        }
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
    btnConvert.addEventListener('click', convert);

    btnCopy.addEventListener('click', function() {
        const output = phpOutput.value;
        if (!output) { showError(S.nothing_to_copy); return; }
        navigator.clipboard.writeText(output).then(() => {
            const orig = this.innerHTML;
            this.innerHTML = '<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> ' + S.copied;
            this.classList.add('text-green-400', 'border-green-400');
            setTimeout(() => { this.innerHTML = orig; this.classList.remove('text-green-400', 'border-green-400'); }, 2000);
        });
    });

    btnDownload.addEventListener('click', function() {
        const output = phpOutput.value;
        if (!output) { showError(S.nothing_to_download); return; }

        let content = output;
        if (!content.startsWith('<?php')) {
            content = '<?php\n\n' + content + '\n';
        }

        const blob = new Blob([content], { type: 'text/php;charset=utf-8' });
        const url = URL.createObjectURL(blob);
        const a = document.createElement('a');
        a.href = url; a.download = 'array.php';
        document.body.appendChild(a); a.click();
        document.body.removeChild(a); URL.revokeObjectURL(url);
        showSuccess(S.php_downloaded);
    });

    btnSample.addEventListener('click', function() {
        jsonInput.value = sampleJSON;
        phpOutput.value = '';
        statsBar.classList.add('hidden');
    });

    btnClear.addEventListener('click', function() {
        jsonInput.value = ''; phpOutput.value = '';
        statsBar.classList.add('hidden');
        successNotification.classList.add('hidden');
        errorNotification.classList.add('hidden');
    });

    fileUpload.addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (!file) return;
        const reader = new FileReader();
        reader.onload = function(evt) {
            jsonInput.value = evt.target.result;
            phpOutput.value = '';
            statsBar.classList.add('hidden');
            showSuccess(S.file_loaded + file.name);
        };
        reader.readAsText(file);
        this.value = '';
    });

    let timer;
    jsonInput.addEventListener('input', function() {
        clearTimeout(timer);
        timer = setTimeout(() => { if (jsonInput.value.trim()) convert(); }, 500);
    });

    [arrayStyle, indentSize, trailingCommas, includeAssignment, singleQuotes].forEach(el => {
        el.addEventListener('change', () => { if (jsonInput.value.trim()) convert(); });
    });
    variableName.addEventListener('input', () => { clearTimeout(timer); timer = setTimeout(() => { if (jsonInput.value.trim()) convert(); }, 500); });

    document.addEventListener('keydown', function(e) {
        if ((e.ctrlKey || e.metaKey) && e.key === 'Enter') { e.preventDefault(); convert(); }
    });
})();
</script>
