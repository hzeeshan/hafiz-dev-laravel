<script>
(function() {
    // Get translatable strings from data attributes (for Italian/other locales)
    const stringsEl = document.getElementById('tool-strings');
    const S = {
        convertToYaml: stringsEl?.dataset.convertToYaml || 'Convert to YAML',
        copy: stringsEl?.dataset.copy || 'Copy',
        downloadYaml: stringsEl?.dataset.downloadYaml || 'Download .yaml',
        sample: stringsEl?.dataset.sample || 'Sample',
        clear: stringsEl?.dataset.clear || 'Clear',
        indentation: stringsEl?.dataset.indentation || 'Indentation',
        spaces2: stringsEl?.dataset.spaces2 || '2 Spaces (default)',
        spaces4: stringsEl?.dataset.spaces4 || '4 Spaces',
        inlineShortArrays: stringsEl?.dataset.inlineShortArrays || 'Inline Short Arrays',
        quoteAllStrings: stringsEl?.dataset.quoteAllStrings || 'Quote All Strings',
        jsonInput: stringsEl?.dataset.jsonInput || 'JSON Input',
        yamlOutput: stringsEl?.dataset.yamlOutput || 'YAML Output',
        inputPlaceholder: stringsEl?.dataset.inputPlaceholder || 'Paste your JSON here...',
        outputPlaceholder: stringsEl?.dataset.outputPlaceholder || 'Converted YAML will appear here...',
        topLevelKeys: stringsEl?.dataset.topLevelKeys || 'Top-level Keys',
        maxDepth: stringsEl?.dataset.maxDepth || 'Max Depth',
        jsonSize: stringsEl?.dataset.jsonSize || 'JSON Size',
        yamlSize: stringsEl?.dataset.yamlSize || 'YAML Size',
        successConvert: stringsEl?.dataset.successConvert || 'JSON converted to YAML successfully!',
        errorEmpty: stringsEl?.dataset.errorEmpty || 'Please enter some JSON to convert',
        errorInvalid: stringsEl?.dataset.errorInvalid || 'Invalid JSON: ',
        copyNothing: stringsEl?.dataset.copyNothing || 'Nothing to copy. Convert some JSON first.',
        copied: stringsEl?.dataset.copied || 'Copied!',
        copyFail: stringsEl?.dataset.copyFail || 'Failed to copy to clipboard',
        downloadNothing: stringsEl?.dataset.downloadNothing || 'Nothing to download. Convert some JSON first.',
        downloaded: stringsEl?.dataset.downloaded || 'Downloaded: ',
    };

    // DOM Elements
    const jsonInput = document.getElementById('json-input');
    const yamlOutput = document.getElementById('yaml-output');
    const indentSize = document.getElementById('indent-size');
    const inlineShortArrays = document.getElementById('inline-short-arrays');
    const quoteStrings = document.getElementById('quote-strings');
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

    // Sample Data
    const sampleJson = {
        "apiVersion": "apps/v1",
        "kind": "Deployment",
        "metadata": {
            "name": "my-app",
            "labels": {
                "app": "my-app",
                "version": "1.0.0"
            }
        },
        "spec": {
            "replicas": 3,
            "selector": {
                "matchLabels": {
                    "app": "my-app"
                }
            },
            "template": {
                "metadata": {
                    "labels": {
                        "app": "my-app"
                    }
                },
                "spec": {
                    "containers": [
                        {
                            "name": "my-app",
                            "image": "my-app:1.0.0",
                            "ports": [
                                { "containerPort": 8080 }
                            ],
                            "env": [
                                { "name": "NODE_ENV", "value": "production" },
                                { "name": "LOG_LEVEL", "value": "info" }
                            ],
                            "resources": {
                                "limits": {
                                    "cpu": "500m",
                                    "memory": "128Mi"
                                },
                                "requests": {
                                    "cpu": "250m",
                                    "memory": "64Mi"
                                }
                            }
                        }
                    ]
                }
            }
        }
    };

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

    // ===== JSON to YAML Conversion =====

    function jsonToYaml(value, indent, currentIndent, options) {
        const indentStr = ' '.repeat(indent);
        const prefix = ' '.repeat(currentIndent);

        if (value === null) return 'null';
        if (value === undefined) return 'null';

        if (typeof value === 'boolean') return value ? 'true' : 'false';

        if (typeof value === 'number') {
            if (Number.isNaN(value)) return '.nan';
            if (!Number.isFinite(value)) return value > 0 ? '.inf' : '-.inf';
            return String(value);
        }

        if (typeof value === 'string') {
            // Check if string needs quoting
            if (options.quoteAll) {
                return '"' + value.replace(/\\/g, '\\\\').replace(/"/g, '\\"').replace(/\n/g, '\\n') + '"';
            }

            // Auto-quote strings that could be misinterpreted
            const needsQuoting =
                value === '' ||
                value === 'true' || value === 'false' ||
                value === 'null' || value === 'yes' || value === 'no' ||
                value === 'on' || value === 'off' ||
                value === 'True' || value === 'False' ||
                value === 'Yes' || value === 'No' ||
                value === 'NULL' || value === 'Null' ||
                /^[0-9]/.test(value) ||
                /^[-?:,\[\]{}#&*!|>'"%@`]/.test(value) ||
                value.includes(': ') || value.includes(' #') ||
                value.includes('\n') ||
                /^\s|\s$/.test(value);

            if (needsQuoting) {
                if (value.includes('\n')) {
                    // Use block scalar for multi-line strings
                    const lines = value.split('\n');
                    return '|\n' + lines.map(line => prefix + indentStr + line).join('\n');
                }
                return '"' + value.replace(/\\/g, '\\\\').replace(/"/g, '\\"') + '"';
            }

            return value;
        }

        if (Array.isArray(value)) {
            if (value.length === 0) return '[]';

            // Inline short arrays option
            if (options.inlineShort && value.length <= 5 && value.every(v => typeof v !== 'object' || v === null)) {
                const items = value.map(v => {
                    if (v === null) return 'null';
                    if (typeof v === 'string') {
                        const needsQ = v === '' || /^[0-9]/.test(v) || ['true','false','null','yes','no'].includes(v.toLowerCase());
                        return needsQ ? '"' + v.replace(/"/g, '\\"') + '"' : v;
                    }
                    return String(v);
                });
                return '[' + items.join(', ') + ']';
            }

            const lines = value.map(item => {
                if (typeof item === 'object' && item !== null && !Array.isArray(item)) {
                    const keys = Object.keys(item);
                    if (keys.length === 0) return prefix + '- {}';

                    let result = prefix + '- ' + keys[0] + ': ' + jsonToYaml(item[keys[0]], indent, currentIndent + indent + 2, options);
                    for (let i = 1; i < keys.length; i++) {
                        result += '\n' + prefix + '  ' + keys[i] + ': ' + jsonToYaml(item[keys[i]], indent, currentIndent + indent + 2, options);
                    }
                    return result;
                }

                const converted = jsonToYaml(item, indent, currentIndent + indent, options);
                if (typeof item === 'object' && item !== null) {
                    return prefix + '-\n' + converted;
                }
                return prefix + '- ' + converted;
            });

            return '\n' + lines.join('\n');
        }

        if (typeof value === 'object') {
            const keys = Object.keys(value);
            if (keys.length === 0) return '{}';

            const lines = keys.map(key => {
                const val = value[key];
                const yamlKey = /^[a-zA-Z0-9_.-]+$/.test(key) ? key : '"' + key.replace(/"/g, '\\"') + '"';
                const converted = jsonToYaml(val, indent, currentIndent + indent, options);

                if (typeof val === 'object' && val !== null && converted.startsWith('\n')) {
                    return prefix + yamlKey + ':' + converted;
                }

                return prefix + yamlKey + ': ' + converted;
            });

            return '\n' + lines.join('\n');
        }

        return String(value);
    }

    function convert() {
        const input = jsonInput.value.trim();
        if (!input) {
            showError(S.errorEmpty);
            return;
        }

        try {
            const data = JSON.parse(input);
            const indent = parseInt(indentSize.value);
            const options = {
                inlineShort: inlineShortArrays.checked,
                quoteAll: quoteStrings.checked
            };

            let yaml = jsonToYaml(data, indent, 0, options);

            // Remove leading newline for top-level objects/arrays
            if (yaml.startsWith('\n')) {
                yaml = yaml.substring(1);
            }

            yamlOutput.value = yaml;

            // Update stats
            statKeys.textContent = getTopLevelKeys(data);
            statDepth.textContent = getMaxDepth(data);
            statInputSize.textContent = formatBytes(new Blob([input]).size);
            statOutputSize.textContent = formatBytes(new Blob([yaml]).size);
            statsBar.classList.remove('hidden');

            showSuccess(S.successConvert);
        } catch (e) {
            showError(S.errorInvalid + e.message);
            statsBar.classList.add('hidden');
        }
    }

    function copyOutput() {
        const output = yamlOutput.value;
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
        const output = yamlOutput.value;
        if (!output) {
            showError(S.downloadNothing);
            return;
        }

        const filename = 'converted-' + new Date().toISOString().split('T')[0] + '.yaml';
        const blob = new Blob([output], { type: 'text/yaml' });
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
        jsonInput.value = JSON.stringify(sampleJson, null, 2);
        yamlOutput.value = '';
        statsBar.classList.add('hidden');
    }

    function clearAll() {
        jsonInput.value = '';
        yamlOutput.value = '';
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
