{{-- js-yaml library for YAML parsing --}}
<script src="https://cdn.jsdelivr.net/npm/js-yaml@4.1.0/dist/js-yaml.min.js"></script>

<script>
(function() {
    // Get translatable strings from data attributes (for Italian/other locales)
    const stringsEl = document.getElementById('tool-strings');
    const S = {
        convertToJson: stringsEl?.dataset.convertToJson || 'Convert to JSON',
        copy: stringsEl?.dataset.copy || 'Copy',
        downloadJson: stringsEl?.dataset.downloadJson || 'Download .json',
        sample: stringsEl?.dataset.sample || 'Sample',
        clear: stringsEl?.dataset.clear || 'Clear',
        jsonIndentation: stringsEl?.dataset.jsonIndentation || 'JSON Indentation',
        spaces2: stringsEl?.dataset.spaces2 || '2 Spaces (default)',
        spaces4: stringsEl?.dataset.spaces4 || '4 Spaces',
        tab: stringsEl?.dataset.tab || 'Tab',
        minified: stringsEl?.dataset.minified || 'Minified (no whitespace)',
        sortKeys: stringsEl?.dataset.sortKeys || 'Sort Keys Alphabetically',
        stripComments: stringsEl?.dataset.stripComments || 'Strip YAML Comments',
        yamlInput: stringsEl?.dataset.yamlInput || 'YAML Input',
        jsonOutput: stringsEl?.dataset.jsonOutput || 'JSON Output',
        inputPlaceholder: stringsEl?.dataset.inputPlaceholder || 'Paste your YAML here...',
        outputPlaceholder: stringsEl?.dataset.outputPlaceholder || 'Converted JSON will appear here...',
        topLevelKeys: stringsEl?.dataset.topLevelKeys || 'Top-level Keys',
        maxDepth: stringsEl?.dataset.maxDepth || 'Max Depth',
        yamlSize: stringsEl?.dataset.yamlSize || 'YAML Size',
        jsonSize: stringsEl?.dataset.jsonSize || 'JSON Size',
        successConvert: stringsEl?.dataset.successConvert || 'YAML converted to JSON successfully!',
        errorEmpty: stringsEl?.dataset.errorEmpty || 'Please enter some YAML to convert',
        errorInvalid: stringsEl?.dataset.errorInvalid || 'Invalid YAML: ',
        yamlErrorAt: stringsEl?.dataset.yamlErrorAt || 'YAML error at line {line}, column {col}: {reason}',
        copyNothing: stringsEl?.dataset.copyNothing || 'Nothing to copy. Convert some YAML first.',
        copied: stringsEl?.dataset.copied || 'Copied!',
        copyFail: stringsEl?.dataset.copyFail || 'Failed to copy to clipboard',
        downloadNothing: stringsEl?.dataset.downloadNothing || 'Nothing to download. Convert some YAML first.',
        downloaded: stringsEl?.dataset.downloaded || 'Downloaded: ',
    };

    // DOM Elements
    const yamlInput = document.getElementById('yaml-input');
    const outputCode = document.getElementById('output-code');
    const jsonOutputRaw = document.getElementById('json-output-raw');
    const jsonIndent = document.getElementById('json-indent');
    const sortKeys = document.getElementById('sort-keys');
    const stripComments = document.getElementById('strip-comments');
    const btnConvert = document.getElementById('btn-convert');
    const btnCopy = document.getElementById('btn-copy');
    const btnDownload = document.getElementById('btn-download');
    const btnSample = document.getElementById('btn-sample');
    const btnClear = document.getElementById('btn-clear');
    const statsBar = document.getElementById('stats-bar');
    const statKeys = document.getElementById('stat-keys');
    const statDepth = document.getElementById('stat-depth');
    const statInputSize = document.getElementById('stat-input-size');
    const statOutputSize = document.getElementById('stat-output-size');
    const successNotification = document.getElementById('success-notification');
    const successMessage = document.getElementById('success-message');
    const errorNotification = document.getElementById('error-notification');
    const errorMessage = document.getElementById('error-message');

    // Sample YAML
    const sampleYaml = `# Kubernetes Deployment Configuration
apiVersion: apps/v1
kind: Deployment
metadata:
  name: my-app
  labels:
    app: my-app
    version: "1.0.0"
spec:
  replicas: 3
  selector:
    matchLabels:
      app: my-app
  template:
    metadata:
      labels:
        app: my-app
    spec:
      containers:
        - name: my-app
          image: my-app:1.0.0
          ports:
            - containerPort: 8080
          env:
            - name: NODE_ENV
              value: production
            - name: LOG_LEVEL
              value: info
          resources:
            limits:
              cpu: "500m"
              memory: "128Mi"
            requests:
              cpu: "250m"
              memory: "64Mi"`;

    // ===== Utility Functions =====

    function formatBytes(bytes) {
        if (bytes === 0) return '0 B';
        const k = 1024;
        const sizes = ['B', 'KB', 'MB', 'GB'];
        const i = Math.floor(Math.log(bytes) / Math.log(k));
        return parseFloat((bytes / Math.pow(k, i)).toFixed(2)) + ' ' + sizes[i];
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

    function getMaxDepth(obj, currentDepth = 0) {
        if (obj === null || typeof obj !== 'object') return currentDepth;
        let maxDepth = currentDepth;
        const values = Array.isArray(obj) ? obj : Object.values(obj);
        for (const value of values) {
            const depth = getMaxDepth(value, currentDepth + 1);
            if (depth > maxDepth) maxDepth = depth;
        }
        return maxDepth;
    }

    function getTopLevelKeys(data) {
        if (Array.isArray(data)) return data.length;
        if (typeof data === 'object' && data !== null) return Object.keys(data).length;
        return 0;
    }

    function sortObjectKeys(obj) {
        if (Array.isArray(obj)) {
            return obj.map(item => sortObjectKeys(item));
        }
        if (obj !== null && typeof obj === 'object') {
            const sorted = {};
            Object.keys(obj).sort().forEach(key => {
                sorted[key] = sortObjectKeys(obj[key]);
            });
            return sorted;
        }
        return obj;
    }

    // ===== Syntax Highlighting =====

    function syntaxHighlight(json) {
        if (typeof json !== 'string') {
            json = JSON.stringify(json, null, 2);
        }

        json = json.replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;');

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

    // ===== Core Conversion =====

    function convert() {
        const input = yamlInput.value.trim();
        if (!input) {
            showError(S.errorEmpty);
            return;
        }

        try {
            let data = jsyaml.load(input);

            // Sort keys if enabled
            if (sortKeys.checked) {
                data = sortObjectKeys(data);
            }

            // Get indent setting
            let indentValue = jsonIndent.value;
            let jsonString;

            if (indentValue === '0') {
                jsonString = JSON.stringify(data);
            } else if (indentValue === 'tab') {
                jsonString = JSON.stringify(data, null, '\t');
            } else {
                jsonString = JSON.stringify(data, null, parseInt(indentValue));
            }

            // Store raw value
            jsonOutputRaw.value = jsonString;

            // Apply syntax highlighting
            outputCode.innerHTML = syntaxHighlight(jsonString);

            // Update stats
            statKeys.textContent = getTopLevelKeys(data);
            statDepth.textContent = getMaxDepth(data);
            statInputSize.textContent = formatBytes(new Blob([input]).size);
            statOutputSize.textContent = formatBytes(new Blob([jsonString]).size);
            statsBar.classList.remove('hidden');

            showSuccess(S.successConvert);
        } catch (e) {
            let errorMsg = S.errorInvalid + e.message;
            if (e.mark) {
                errorMsg = S.yamlErrorAt
                    .replace('{line}', e.mark.line + 1)
                    .replace('{col}', e.mark.column + 1)
                    .replace('{reason}', e.reason);
            }
            showError(errorMsg);
            statsBar.classList.add('hidden');
        }
    }

    function copyOutput() {
        const output = jsonOutputRaw.value;
        if (!output) {
            showError(S.copyNothing);
            return;
        }

        navigator.clipboard.writeText(output).then(() => {
            const originalHTML = btnCopy.innerHTML;
            btnCopy.innerHTML = '<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> ' + S.copied;
            btnCopy.classList.add('text-green-400', 'border-green-400');
            setTimeout(() => {
                btnCopy.innerHTML = originalHTML;
                btnCopy.classList.remove('text-green-400', 'border-green-400');
            }, 2000);
        }).catch(() => showError(S.copyFail));
    }

    function downloadOutput() {
        const output = jsonOutputRaw.value;
        if (!output) {
            showError(S.downloadNothing);
            return;
        }

        const filename = 'converted-' + new Date().toISOString().split('T')[0] + '.json';
        const blob = new Blob([output], { type: 'application/json' });
        const url = URL.createObjectURL(blob);
        const a = document.createElement('a');
        a.href = url;
        a.download = filename;
        document.body.appendChild(a);
        a.click();
        document.body.removeChild(a);
        URL.revokeObjectURL(url);
        showSuccess(S.downloaded + filename);
    }

    function loadSample() {
        yamlInput.value = sampleYaml;
        jsonOutputRaw.value = '';
        outputCode.innerHTML = '<span class="text-light-muted">' + S.outputPlaceholder + '</span>';
        statsBar.classList.add('hidden');
    }

    function clearAll() {
        yamlInput.value = '';
        jsonOutputRaw.value = '';
        outputCode.innerHTML = '<span class="text-light-muted">' + S.outputPlaceholder + '</span>';
        statsBar.classList.add('hidden');
        successNotification.classList.add('hidden');
        errorNotification.classList.add('hidden');
    }

    // ===== Event Listeners =====
    btnConvert.addEventListener('click', convert);
    btnCopy.addEventListener('click', copyOutput);
    btnDownload.addEventListener('click', downloadOutput);
    btnSample.addEventListener('click', loadSample);
    btnClear.addEventListener('click', clearAll);

    // Ctrl+Enter to convert
    document.addEventListener('keydown', function(e) {
        if ((e.ctrlKey || e.metaKey) && e.key === 'Enter') {
            e.preventDefault();
            convert();
        }
    });
})();
</script>
