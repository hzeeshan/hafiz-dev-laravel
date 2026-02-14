<script>
(function() {
    const stringsEl = document.getElementById('tool-strings');
    const S = {
        json_input: stringsEl?.dataset.jsonInput || 'JSON Input',
        ts_output: stringsEl?.dataset.tsOutput || 'TypeScript Output',
        upload_json: stringsEl?.dataset.uploadJson || 'Upload .json',
        generate_types: stringsEl?.dataset.generateTypes || 'Generate Types',
        copy: stringsEl?.dataset.copy || 'Copy',
        download_ts: stringsEl?.dataset.downloadTs || 'Download .ts',
        sample: stringsEl?.dataset.sample || 'Sample',
        clear: stringsEl?.dataset.clear || 'Clear',
        copied: stringsEl?.dataset.copied || 'Copied!',
        nothing_to_copy: stringsEl?.dataset.nothingToCopy || 'Nothing to copy',
        nothing_to_download: stringsEl?.dataset.nothingToDownload || 'Nothing to download',
        ts_downloaded: stringsEl?.dataset.tsDownloaded || 'TypeScript file downloaded',
        file_loaded: stringsEl?.dataset.fileLoaded || 'File loaded:',
        enter_json: stringsEl?.dataset.enterJson || 'Please enter JSON data',
        invalid_json: stringsEl?.dataset.invalidJson || 'Invalid JSON:',
        generated_msg: stringsEl?.dataset.generatedMsg || 'Generated {count} {style}{plural} with {props} properties',
        generated_primitive: stringsEl?.dataset.generatedPrimitive || 'Generated type for primitive value',
    };

    const jsonInput = document.getElementById('json-input');
    const tsOutput = document.getElementById('ts-output');
    const rootName = document.getElementById('root-name');
    const outputStyle = document.getElementById('output-style');
    const indentSize = document.getElementById('indent-size');
    const exportKeyword = document.getElementById('export-keyword');
    const optionalProps = document.getElementById('optional-props');
    const readonlyProps = document.getElementById('readonly-props');
    const trailingSemicolons = document.getElementById('trailing-semicolons');
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
  "id": 1,
  "name": "John Smith",
  "email": "john@example.com",
  "age": 32,
  "is_active": true,
  "balance": 1250.75,
  "tags": ["developer", "laravel", "vue"],
  "address": {
    "street": "123 Main St",
    "city": "San Francisco",
    "state": "CA",
    "zip": "94105",
    "country": "US"
  },
  "projects": [
    {
      "id": 101,
      "title": "E-commerce Platform",
      "status": "completed",
      "budget": 15000
    },
    {
      "id": 102,
      "title": "Mobile App MVP",
      "status": "in_progress",
      "budget": 8500
    }
  ],
  "metadata": null,
  "scores": [98, 85, 92, 78],
  "created_at": "2024-01-15T10:30:00Z"
}`;

    let interfaces = {};
    let interfaceCount = 0;
    let propertyCount = 0;
    let nestedCount = 0;

    function getIndent(level) {
        const val = indentSize.value;
        if (val === 'tab') return '\t'.repeat(level);
        return ' '.repeat(parseInt(val) * level);
    }

    function toPascalCase(str) {
        return str
            .replace(/[^a-zA-Z0-9_]/g, '_')
            .split('_')
            .filter(Boolean)
            .map(w => w.charAt(0).toUpperCase() + w.slice(1))
            .join('');
    }

    function getUniqueInterfaceName(base) {
        let name = toPascalCase(base);
        if (!name) name = 'Item';
        if (interfaces[name] === undefined) return name;
        let i = 2;
        while (interfaces[name + i] !== undefined) i++;
        return name + i;
    }

    function inferType(value, propertyName, parentName) {
        if (value === null) return 'null';
        if (value === undefined) return 'undefined';

        const t = typeof value;
        if (t === 'string') return 'string';
        if (t === 'number') return 'number';
        if (t === 'boolean') return 'boolean';

        if (Array.isArray(value)) {
            if (value.length === 0) return 'any[]';

            const types = new Set();
            let objectInterface = null;

            for (const item of value) {
                if (item === null) {
                    types.add('null');
                } else if (typeof item === 'object' && !Array.isArray(item)) {
                    // Merge all object items into one interface
                    if (!objectInterface) {
                        const ifName = getUniqueInterfaceName(propertyName || 'Item');
                        objectInterface = ifName;
                        interfaces[ifName] = {};
                    }
                    // Merge keys
                    for (const key of Object.keys(item)) {
                        const childType = inferType(item[key], key, objectInterface);
                        if (interfaces[objectInterface][key]) {
                            // Union existing types
                            const existing = interfaces[objectInterface][key];
                            if (existing !== childType && !existing.includes(childType)) {
                                interfaces[objectInterface][key] = existing + ' | ' + childType;
                            }
                        } else {
                            interfaces[objectInterface][key] = childType;
                            propertyCount++;
                        }
                    }
                    types.add(objectInterface);
                } else if (Array.isArray(item)) {
                    types.add(inferType(item, propertyName, parentName));
                } else {
                    types.add(typeof item);
                }
            }

            const typeArr = [...types];
            if (typeArr.length === 1) return typeArr[0] + '[]';
            return '(' + typeArr.join(' | ') + ')[]';
        }

        if (t === 'object') {
            const ifName = getUniqueInterfaceName(propertyName || 'Object');
            interfaces[ifName] = {};
            nestedCount++;

            for (const key of Object.keys(value)) {
                interfaces[ifName][key] = inferType(value[key], key, ifName);
                propertyCount++;
            }

            return ifName;
        }

        return 'any';
    }

    function convert() {
        const input = jsonInput.value.trim();
        if (!input) { showError(S.enter_json); return; }

        try {
            const parsed = JSON.parse(input);

            interfaces = {};
            interfaceCount = 0;
            propertyCount = 0;
            nestedCount = 0;

            const rn = toPascalCase(rootName.value) || 'Root';
            const isExport = exportKeyword.checked;
            const isOptional = optionalProps.checked;
            const isReadonly = readonlyProps.checked;
            const semi = trailingSemicolons.checked ? ';' : '';
            const style = outputStyle.value;
            const prefix = isExport ? 'export ' : '';

            // Handle root
            if (Array.isArray(parsed)) {
                const arrType = inferType(parsed, rn, '');
                // Generate a type alias for the root array
                interfaces['__root_array__'] = arrType;
            } else if (typeof parsed === 'object' && parsed !== null) {
                interfaces[rn] = {};
                for (const key of Object.keys(parsed)) {
                    interfaces[rn][key] = inferType(parsed[key], key, rn);
                    propertyCount++;
                }
            } else {
                // Primitive at root
                const t = inferType(parsed, rn, '');
                tsOutput.value = `${prefix}type ${rn} = ${t}${semi}`;
                showSuccess(S.generated_primitive);
                return;
            }

            // Build output — collect all interfaces, output nested first, then root last
            let output = '';
            const keys = Object.keys(interfaces);
            const rootArrayType = interfaces['__root_array__'];

            // Output nested interfaces first (not root)
            for (const name of keys) {
                if (name === '__root_array__') continue;
                if (name === rn) continue;
                output += buildInterface(name, interfaces[name], prefix, isOptional, isReadonly, semi, style);
                output += '\n';
                interfaceCount++;
            }

            // Output root interface
            if (interfaces[rn]) {
                output += buildInterface(rn, interfaces[rn], prefix, isOptional, isReadonly, semi, style);
                interfaceCount++;
            }

            // Root array type alias
            if (rootArrayType) {
                output += `${prefix}type ${rn} = ${rootArrayType}${semi}\n`;
                interfaceCount++;
            }

            tsOutput.value = output.trimEnd();

            // Stats
            document.getElementById('stat-interfaces').textContent = interfaceCount;
            document.getElementById('stat-properties').textContent = propertyCount;
            document.getElementById('stat-nested').textContent = nestedCount;
            document.getElementById('stat-lines').textContent = output.trimEnd().split('\n').length;
            statsBar.classList.remove('hidden');

            const plural = interfaceCount !== 1 ? 's' : '';
            showSuccess(S.generated_msg.replace('{count}', interfaceCount).replace('{style}', style).replace('{plural}', plural).replace('{props}', propertyCount));
        } catch (e) {
            showError(S.invalid_json + ' ' + e.message);
        }
    }

    function buildInterface(name, props, prefix, isOptional, isReadonly, semi, style) {
        const indent = getIndent(1);
        let result = '';

        if (style === 'interface') {
            result += `${prefix}interface ${name} {\n`;
        } else {
            result += `${prefix}type ${name} = {\n`;
        }

        for (const [key, type] of Object.entries(props)) {
            const safeProp = /^[a-zA-Z_$][a-zA-Z0-9_$]*$/.test(key) ? key : `"${key}"`;
            const opt = isOptional ? '?' : '';
            const ro = isReadonly ? 'readonly ' : '';
            result += `${indent}${ro}${safeProp}${opt}: ${type}${semi}\n`;
        }

        if (style === 'interface') {
            result += `}\n`;
        } else {
            result += `}${semi}\n`;
        }

        return result;
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
        const output = tsOutput.value;
        if (!output) { showError(S.nothing_to_copy); return; }
        navigator.clipboard.writeText(output).then(() => {
            const orig = this.innerHTML;
            this.innerHTML = '<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> ' + S.copied;
            this.classList.add('text-green-400', 'border-green-400');
            setTimeout(() => { this.innerHTML = orig; this.classList.remove('text-green-400', 'border-green-400'); }, 2000);
        });
    });

    btnDownload.addEventListener('click', function() {
        const output = tsOutput.value;
        if (!output) { showError(S.nothing_to_download); return; }
        const blob = new Blob([output], { type: 'text/typescript;charset=utf-8' });
        const url = URL.createObjectURL(blob);
        const a = document.createElement('a');
        a.href = url; a.download = 'types.ts';
        document.body.appendChild(a); a.click();
        document.body.removeChild(a); URL.revokeObjectURL(url);
        showSuccess(S.ts_downloaded);
    });

    btnSample.addEventListener('click', function() {
        jsonInput.value = sampleJSON;
        tsOutput.value = '';
        statsBar.classList.add('hidden');
    });

    btnClear.addEventListener('click', function() {
        jsonInput.value = ''; tsOutput.value = '';
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
            tsOutput.value = '';
            statsBar.classList.add('hidden');
            showSuccess(S.file_loaded + ' ' + file.name);
        };
        reader.readAsText(file);
        this.value = '';
    });

    let timer;
    jsonInput.addEventListener('input', function() {
        clearTimeout(timer);
        timer = setTimeout(() => { if (jsonInput.value.trim()) convert(); }, 500);
    });

    [outputStyle, indentSize, exportKeyword, optionalProps, readonlyProps, trailingSemicolons].forEach(el => {
        el.addEventListener('change', () => { if (jsonInput.value.trim()) convert(); });
    });
    rootName.addEventListener('input', () => { clearTimeout(timer); timer = setTimeout(() => { if (jsonInput.value.trim()) convert(); }, 500); });

    document.addEventListener('keydown', function(e) {
        if ((e.ctrlKey || e.metaKey) && e.key === 'Enter') { e.preventDefault(); convert(); }
    });
})();
</script>
