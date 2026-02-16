    <script>
    (function() {
    const stringsEl = document.getElementById('tool-strings');
    const S = {
        enter_json: stringsEl?.dataset.enterJson || 'Please enter JSON data',
        invalid_json: stringsEl?.dataset.invalidJson || 'Invalid JSON:',
        processed_array: stringsEl?.dataset.processedArray || 'Processed array - consider wrapping in an object',
        generated_primitive: stringsEl?.dataset.generatedPrimitive || 'Generated type for primitive value',
        generated_msg: stringsEl?.dataset.generatedMsg || 'Generated {count} class{plural} with {props} properties',
        nothing_to_copy: stringsEl?.dataset.nothingToCopy || 'Nothing to copy',
        copied: stringsEl?.dataset.copied || 'Copied!',
        nothing_to_download: stringsEl?.dataset.nothingToDownload || 'Nothing to download',
        dart_downloaded: stringsEl?.dataset.dartDownloaded || 'Dart file downloaded',
        file_loaded: stringsEl?.dataset.fileLoaded || 'File loaded:',
    };
        const jsonInput = document.getElementById('json-input');
        const dartOutput = document.getElementById('dart-output');
        const rootName = document.getElementById('root-name');
        const nullSafety = document.getElementById('null-safety');
        const finalProps = document.getElementById('final-props');
        const fromJson = document.getElementById('from-json');
        const toJson = document.getElementById('to-json');
        const copyWith = document.getElementById('copy-with');
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
                .map(w => w.charAt(0).toUpperCase() + w.slice(1).toLowerCase())
                .join('');
        }

        function toCamelCase(str) {
            const pascal = toPascalCase(str);
            return pascal.charAt(0).toLowerCase() + pascal.slice(1);
        }

        function getUniqueClassName(base) {
            let name = toPascalCase(base);
            if (!name) name = 'Item';
            if (classes[name] === undefined) return name;
            let i = 2;
            while (classes[name + i] !== undefined) i++;
            return name + i;
        }

        function isISODate(str) {
            if (typeof str !== 'string') return false;
            const isoRegex = /^\d{4}-\d{2}-\d{2}T\d{2}:\d{2}:\d{2}(\.\d+)?(Z|[+-]\d{2}:\d{2})?$/;
            return isoRegex.test(str);
        }

        function inferType(value, propertyName, parentName) {
            if (value === null) return nullSafety.checked ? 'dynamic?' : 'dynamic';
            if (value === undefined) return nullSafety.checked ? 'dynamic?' : 'dynamic';

            const t = typeof value;
            if (t === 'string') {
                if (isISODate(value)) return 'DateTime';
                return 'String';
            }
            if (t === 'number') {
                return Number.isInteger(value) ? 'int' : 'double';
            }
            if (t === 'boolean') return 'bool';

            if (Array.isArray(value)) {
                if (value.length === 0) return 'List<dynamic>';

                const types = new Set();
                let objectClass = null;

                for (const item of value) {
                    if (item === null) {
                        types.add('dynamic');
                    } else if (typeof item === 'object' && !Array.isArray(item)) {
                        if (!objectClass) {
                            const clsName = getUniqueClassName(propertyName || 'Item');
                            objectClass = clsName;
                            classes[clsName] = {};
                        }
                        for (const key of Object.keys(item)) {
                            const childType = inferType(item[key], key, objectClass);
                            if (!classes[objectClass][key]) {
                                classes[objectClass][key] = childType;
                                propertyCount++;
                            }
                        }
                        types.add(objectClass);
                    } else if (Array.isArray(item)) {
                        types.add(inferType(item, propertyName, parentName));
                    } else {
                        types.add(inferType(item, propertyName, parentName));
                    }
                }

                const typeArr = [...types];
                if (typeArr.length === 1) return `List<${typeArr[0]}>`;
                return `List<dynamic>`;
            }

            if (t === 'object') {
                const clsName = getUniqueClassName(propertyName || 'Object');
                classes[clsName] = {};
                nestedCount++;

                for (const key of Object.keys(value)) {
                    classes[clsName][key] = inferType(value[key], key, clsName);
                    propertyCount++;
                }

                return clsName;
            }

            return 'dynamic';
        }

        function buildConstructor(className, props, includeFromJson) {
            const indent = '  ';
            let result = '';

            // Constructor
            result += `${indent}${className}({\n`;
            for (const [key, type] of Object.entries(props)) {
                const camelKey = toCamelCase(key);
                const req = type.endsWith('?') ? '' : 'required ';
                result += `${indent}  ${req}this.${camelKey},\n`;
            }
            result += `${indent}});\n\n`;

            // fromJson
            if (includeFromJson) {
                result += `${indent}factory ${className}.fromJson(Map<String, dynamic> json) {\n`;
                result += `${indent}  return ${className}(\n`;
                for (const [key, type] of Object.entries(props)) {
                    const camelKey = toCamelCase(key);
                    result += `${indent}    ${camelKey}: ${buildFromJsonValue('json', key, type)},\n`;
                }
                result += `${indent}  );\n`;
                result += `${indent}}\n`;
            }

            return result;
        }

        function buildFromJsonValue(jsonVar, key, type) {
            const access = `${jsonVar}['${key}']`;
            const baseType = type.replace('?', '');

            if (baseType === 'DateTime') {
                return `${access} != null ? DateTime.parse(${access}) : null`;
            }
            if (baseType.startsWith('List<')) {
                const innerType = baseType.slice(5, -1);
                if (classes[innerType]) {
                    return `(${access} as List<dynamic>?)?.map((e) => ${innerType}.fromJson(e as Map<String, dynamic>)).toList()`;
                }
                return `(${access} as List<dynamic>?)?.cast<${innerType}>()`;
            }
            if (classes[baseType]) {
                return `${access} != null ? ${baseType}.fromJson(${access} as Map<String, dynamic>) : null`;
            }
            if (type.endsWith('?')) {
                return `${access} as ${baseType}?`;
            }
            return `${access} as ${baseType}`;
        }

        function buildToJson(props) {
            const indent = '  ';
            let result = `${indent}Map<String, dynamic> toJson() {\n`;
            result += `${indent}  return {\n`;
            for (const [key, type] of Object.entries(props)) {
                const camelKey = toCamelCase(key);
                result += `${indent}    '${key}': ${buildToJsonValue(camelKey, type)},\n`;
            }
            result += `${indent}  };\n`;
            result += `${indent}}\n`;
            return result;
        }

        function buildToJsonValue(varName, type) {
            const baseType = type.replace('?', '');

            if (baseType === 'DateTime') {
                return `${varName}?.toIso8601String()`;
            }
            if (baseType.startsWith('List<')) {
                const innerType = baseType.slice(5, -1);
                if (classes[innerType]) {
                    return `${varName}?.map((e) => e.toJson()).toList()`;
                }
                return varName;
            }
            if (classes[baseType]) {
                return `${varName}?.toJson()`;
            }
            return varName;
        }

        function buildCopyWith(className, props) {
            const indent = '  ';
            let result = `${indent}${className} copyWith({\n`;
            for (const [key, type] of Object.entries(props)) {
                const camelKey = toCamelCase(key);
                result += `${indent}  ${type}? ${camelKey},\n`;
            }
            result += `${indent}}) {\n`;
            result += `${indent}  return ${className}(\n`;
            for (const [key] of Object.entries(props)) {
                const camelKey = toCamelCase(key);
                result += `${indent}    ${camelKey}: ${camelKey} ?? this.${camelKey},\n`;
            }
            result += `${indent}  );\n`;
            result += `${indent}}\n`;
            return result;
        }

        function buildClass(className, props) {
            const indent = '  ';
            const isFinal = finalProps.checked;
            const includeFromJson = fromJson.checked;
            const includeToJson = toJson.checked;
            const includeCopyWith = copyWith.checked;

            let result = `class ${className} {\n`;

            // Properties
            for (const [key, type] of Object.entries(props)) {
                const camelKey = toCamelCase(key);
                const finalKeyword = isFinal ? 'final ' : '';
                result += `${indent}${finalKeyword}${type} ${camelKey};\n`;
            }
            result += '\n';

            // Constructor
            result += buildConstructor(className, props, includeFromJson);

            // toJson
            if (includeToJson) {
                result += '\n';
                result += buildToJson(props);
            }

            // copyWith
            if (includeCopyWith) {
                result += '\n';
                result += buildCopyWith(className, props);
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

                if (Array.isArray(parsed)) {
                    const arrType = inferType(parsed, rn, '');
                    dartOutput.value = `// Root type: ${arrType}\n`;
                    showSuccess(S.processed_array);
                    return;
                } else if (typeof parsed === 'object' && parsed !== null) {
                    classes[rn] = {};
                    for (const key of Object.keys(parsed)) {
                        classes[rn][key] = inferType(parsed[key], key, rn);
                        propertyCount++;
                    }
                } else {
                    dartOutput.value = `// Primitive type: ${inferType(parsed, rn, '')}`;
                    showSuccess(S.generated_primitive);
                    return;
                }

                let output = '';
                const keys = Object.keys(classes);

                // Output nested classes first
                for (const name of keys) {
                    if (name === rn) continue;
                    output += buildClass(name, classes[name]);
                    output += '\n';
                    classCount++;
                }

                // Output root class
                if (classes[rn]) {
                    output += buildClass(rn, classes[rn]);
                    classCount++;
                }

                dartOutput.value = output.trimEnd();

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
            const output = dartOutput.value;
            if (!output) { showError(S.nothing_to_copy); return; }
            navigator.clipboard.writeText(output).then(() => {
                const orig = this.innerHTML;
                this.innerHTML = '<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> ' + S.copied;
                this.classList.add('text-green-400', 'border-green-400');
                setTimeout(() => { this.innerHTML = orig; this.classList.remove('text-green-400', 'border-green-400'); }, 2000);
            });
        });

        btnDownload.addEventListener('click', function() {
            const output = dartOutput.value;
            if (!output) { showError(S.nothing_to_download); return; }
            const blob = new Blob([output], { type: 'text/plain;charset=utf-8' });
            const url = URL.createObjectURL(blob);
            const a = document.createElement('a');
            a.href = url; a.download = 'models.dart';
            document.body.appendChild(a); a.click();
            document.body.removeChild(a); URL.revokeObjectURL(url);
            showSuccess(S.dart_downloaded);
        });

        btnSample.addEventListener('click', function() {
            jsonInput.value = sampleJSON;
            dartOutput.value = '';
            statsBar.classList.add('hidden');
        });

        btnClear.addEventListener('click', function() {
            jsonInput.value = ''; dartOutput.value = '';
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
                dartOutput.value = '';
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

        [nullSafety, finalProps, fromJson, toJson, copyWith].forEach(el => {
            el.addEventListener('change', () => { if (jsonInput.value.trim()) convert(); });
        });
        rootName.addEventListener('input', () => { clearTimeout(timer); timer = setTimeout(() => { if (jsonInput.value.trim()) convert(); }, 500); });

        document.addEventListener('keydown', function(e) {
            if ((e.ctrlKey || e.metaKey) && e.key === 'Enter') { e.preventDefault(); convert(); }
        });
    })();
    </script>
