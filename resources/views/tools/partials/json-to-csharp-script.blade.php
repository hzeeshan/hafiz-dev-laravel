    <script>
    (function() {
    const stringsEl = document.getElementById('tool-strings');
    const S = {
        enter_json: stringsEl?.dataset.enterJson || 'Please enter JSON data',
        invalid_json: stringsEl?.dataset.invalidJson || 'Invalid JSON:',
        json_must_be: stringsEl?.dataset.jsonMustBe || 'JSON must be an object or array',
        generated_msg: stringsEl?.dataset.generatedMsg || 'Generated {count} class{plural} with {props} properties',
        nothing_to_copy: stringsEl?.dataset.nothingToCopy || 'Nothing to copy',
        copied: stringsEl?.dataset.copied || 'Copied!',
        nothing_to_download: stringsEl?.dataset.nothingToDownload || 'Nothing to download',
        cs_downloaded: stringsEl?.dataset.csDownloaded || 'C# file downloaded',
        file_loaded: stringsEl?.dataset.fileLoaded || 'File loaded:',
    };
        const jsonInput = document.getElementById('json-input');
        const csharpOutput = document.getElementById('csharp-output');
        const rootName = document.getElementById('root-name');
        const collectionType = document.getElementById('collection-type');
        const jsonLib = document.getElementById('json-lib');
        const optNullable = document.getElementById('opt-nullable');
        const optPublic = document.getElementById('opt-public');
        const optGetSet = document.getElementById('opt-getset');
        const optNamespace = document.getElementById('opt-namespace');
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

        let classes = {};
        let classCount = 0;
        let propertyCount = 0;
        let nestedCount = 0;

        function toPascalCase(str) {
            return str
                .replace(/[^a-zA-Z0-9_]/g, '_')
                .split('_')
                .filter(Boolean)
                .map(w => w.charAt(0).toUpperCase() + w.slice(1))
                .join('');
        }

        function getUniqueClassName(base) {
            let name = toPascalCase(base);
            if (!name) name = 'Item';
            if (classes[name] === undefined) return name;
            let i = 2;
            while (classes[name + i] !== undefined) i++;
            return name + i;
        }

        function isDateString(val) {
            if (typeof val !== 'string') return false;
            return /^\d{4}-\d{2}-\d{2}(T\d{2}:\d{2}:\d{2})?/.test(val);
        }

        function isInteger(val) {
            return typeof val === 'number' && Number.isInteger(val);
        }

        function isLong(val) {
            return typeof val === 'number' && Number.isInteger(val) && (val > 2147483647 || val < -2147483648);
        }

        function wrapCollection(innerType) {
            const ct = collectionType.value;
            if (ct === 'array') return innerType + '[]';
            return ct + '<' + innerType + '>';
        }

        function inferType(value, propertyName) {
            if (value === null) return { type: 'object', nullable: true };
            if (value === undefined) return { type: 'object', nullable: true };

            if (typeof value === 'string') {
                if (isDateString(value)) return { type: 'DateTime', nullable: false };
                return { type: 'string', nullable: false };
            }
            if (typeof value === 'boolean') return { type: 'bool', nullable: false };
            if (typeof value === 'number') {
                if (isLong(value)) return { type: 'long', nullable: false };
                if (isInteger(value)) return { type: 'int', nullable: false };
                return { type: 'double', nullable: false };
            }

            if (Array.isArray(value)) {
                if (value.length === 0) return { type: wrapCollection('object'), nullable: false };

                let elementType = null;
                let hasNull = false;

                for (const item of value) {
                    if (item === null) { hasNull = true; continue; }

                    if (typeof item === 'object' && !Array.isArray(item)) {
                        if (!elementType || elementType === 'object') {
                            const className = getUniqueClassName(propertyName || 'Item');
                            elementType = className;
                            classes[className] = {};
                            for (const key of Object.keys(item)) {
                                const childResult = inferType(item[key], key);
                                if (classes[className][key]) {
                                    // Merge: keep broader type
                                    const existing = classes[className][key];
                                    if (childResult.nullable) existing.nullable = true;
                                } else {
                                    classes[className][key] = childResult;
                                    propertyCount++;
                                }
                            }
                        } else {
                            // Merge additional object items into existing class
                            if (classes[elementType]) {
                                for (const key of Object.keys(item)) {
                                    if (!classes[elementType][key]) {
                                        classes[elementType][key] = inferType(item[key], key);
                                        propertyCount++;
                                    }
                                }
                            }
                        }
                    } else {
                        const childResult = inferType(item, propertyName);
                        elementType = childResult.type;
                    }
                }

                return { type: wrapCollection(elementType || 'object'), nullable: false };
            }

            if (typeof value === 'object') {
                const className = getUniqueClassName(propertyName || 'Object');
                classes[className] = {};
                nestedCount++;

                for (const key of Object.keys(value)) {
                    classes[className][key] = inferType(value[key], key);
                    propertyCount++;
                }

                return { type: className, nullable: false };
            }

            return { type: 'object', nullable: true };
        }

        function buildClass(name, props) {
            const access = optPublic.checked ? 'public' : 'internal';
            const getset = optGetSet.checked ? ' { get; set; }' : ';';
            const lib = jsonLib.value;
            const nullable = optNullable.checked;
            let result = '';

            result += access + ' class ' + name + '\n{\n';

            for (const [key, info] of Object.entries(props)) {
                const propName = toPascalCase(key);
                let typeName = info.type;

                // Add nullable marker
                if (info.nullable && nullable) {
                    if (['int', 'long', 'double', 'bool', 'DateTime'].includes(typeName)) {
                        typeName += '?';
                    } else if (typeName === 'string' || typeName === 'object') {
                        typeName += '?';
                    }
                }

                // JSON attribute
                if (lib === 'newtonsoft' && key !== propName) {
                    result += '    [JsonProperty("' + key + '")]\n';
                } else if (lib === 'system' && key !== propName) {
                    result += '    [JsonPropertyName("' + key + '")]\n';
                }

                result += '    public ' + typeName + ' ' + propName + getset + '\n\n';
            }

            // Remove trailing empty line
            if (result.endsWith('\n\n')) {
                result = result.slice(0, -1);
            }

            result += '}\n';
            return result;
        }

        function convert() {
            const input = jsonInput.value.trim();
            if (!input) { showError(S.enter_json); return; }

            try {
                const parsed = JSON.parse(input);

                classes = {};
                classCount = 0;
                propertyCount = 0;
                nestedCount = 0;

                const rn = toPascalCase(rootName.value) || 'Root';

                // Handle root
                if (Array.isArray(parsed)) {
                    const arrType = inferType(parsed, rn);
                    // Create a wrapper
                    classes['__root_array__'] = arrType;
                } else if (typeof parsed === 'object' && parsed !== null) {
                    classes[rn] = {};
                    for (const key of Object.keys(parsed)) {
                        classes[rn][key] = inferType(parsed[key], key);
                        propertyCount++;
                    }
                } else {
                    showError(S.json_must_be);
                    return;
                }

                // Build output
                const lib = jsonLib.value;
                let output = '';

                // Using statements
                if (lib === 'newtonsoft') {
                    output += 'using Newtonsoft.Json;\n\n';
                } else if (lib === 'system') {
                    output += 'using System.Text.Json.Serialization;\n\n';
                }

                // Namespace
                const useNamespace = optNamespace.checked;
                if (useNamespace) {
                    output += 'namespace MyApp.Models;\n\n';
                }

                // Output nested classes first
                const keys = Object.keys(classes);
                for (const name of keys) {
                    if (name === '__root_array__') continue;
                    if (name === rn) continue;
                    output += buildClass(name, classes[name]);
                    output += '\n';
                    classCount++;
                }

                // Root class
                if (classes[rn]) {
                    output += buildClass(rn, classes[rn]);
                    classCount++;
                }

                // Root array alias note
                if (classes['__root_array__']) {
                    output += '// Root is an array: ' + classes['__root_array__'].type + '\n';
                    classCount++;
                }

                csharpOutput.value = output.trimEnd();

                // Stats
                document.getElementById('stat-classes').textContent = classCount;
                document.getElementById('stat-properties').textContent = propertyCount;
                document.getElementById('stat-nested').textContent = nestedCount;
                document.getElementById('stat-lines').textContent = output.trimEnd().split('\n').length;
                statsBar.classList.remove('hidden');

                showSuccess(S.generated_msg.replace('{count}', classCount).replace('{plural}', classCount !== 1 ? 'es' : '').replace('{props}', propertyCount));
            } catch (e) {
                showError(S.invalid_json + ' ' + e.message);
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
            const output = csharpOutput.value;
            if (!output) { showError(S.nothing_to_copy); return; }
            navigator.clipboard.writeText(output).then(() => {
                const orig = this.innerHTML;
                this.innerHTML = '<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> ' + S.copied;
                this.classList.add('text-green-400', 'border-green-400');
                setTimeout(() => { this.innerHTML = orig; this.classList.remove('text-green-400', 'border-green-400'); }, 2000);
            });
        });

        btnDownload.addEventListener('click', function() {
            const output = csharpOutput.value;
            if (!output) { showError(S.nothing_to_download); return; }
            const blob = new Blob([output], { type: 'text/plain;charset=utf-8' });
            const url = URL.createObjectURL(blob);
            const a = document.createElement('a');
            a.href = url; a.download = (toPascalCase(rootName.value) || 'Root') + '.cs';
            document.body.appendChild(a); a.click();
            document.body.removeChild(a); URL.revokeObjectURL(url);
            showSuccess(S.cs_downloaded);
        });

        btnSample.addEventListener('click', function() {
            jsonInput.value = sampleJSON;
            csharpOutput.value = '';
            statsBar.classList.add('hidden');
        });

        btnClear.addEventListener('click', function() {
            jsonInput.value = ''; csharpOutput.value = '';
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
                csharpOutput.value = '';
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

        [collectionType, jsonLib, optNullable, optPublic, optGetSet, optNamespace].forEach(el => {
            el.addEventListener('change', () => { if (jsonInput.value.trim()) convert(); });
        });
        rootName.addEventListener('input', () => { clearTimeout(timer); timer = setTimeout(() => { if (jsonInput.value.trim()) convert(); }, 500); });

        document.addEventListener('keydown', function(e) {
            if ((e.ctrlKey || e.metaKey) && e.key === 'Enter') { e.preventDefault(); convert(); }
        });
    })();
    </script>
