<script>
(function() {
    const stringsEl = document.getElementById('tool-strings');
    const S = {
        enter_json: stringsEl?.dataset.enterJson || 'Please enter JSON data',
        invalid_json: stringsEl?.dataset.invalidJson || 'Invalid JSON: ',
        converted: stringsEl?.dataset.converted || 'Converted to XML — {elements} elements, depth {depth}',
        nothing_to_copy: stringsEl?.dataset.nothingToCopy || 'Nothing to copy. Convert JSON first.',
        nothing_to_download: stringsEl?.dataset.nothingToDownload || 'Nothing to download. Convert JSON first.',
        copied: stringsEl?.dataset.copied || 'Copied!',
        file_loaded: stringsEl?.dataset.fileLoaded || 'File loaded: ',
        xml_downloaded: stringsEl?.dataset.xmlDownloaded || 'XML file downloaded',
    };

    const jsonInput = document.getElementById('json-input');
    const xmlOutput = document.getElementById('xml-output');
    const rootElementInput = document.getElementById('root-element');
    const arrayItemName = document.getElementById('array-item-name');
    const indentSize = document.getElementById('indent-size');
    const includeDeclaration = document.getElementById('include-declaration');
    const useCdata = document.getElementById('use-cdata');
    const includeTypes = document.getElementById('include-types');
    const emptySelfClose = document.getElementById('empty-self-close');
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
  "company": "Acme Corp",
  "founded": 2015,
  "active": true,
  "address": {
    "street": "123 Main St",
    "city": "San Francisco",
    "state": "CA",
    "zip": "94105"
  },
  "employees": [
    {
      "name": "John Smith",
      "role": "Developer",
      "skills": ["PHP", "Laravel", "Vue.js"]
    },
    {
      "name": "Jane Doe",
      "role": "Designer",
      "skills": ["Figma", "CSS", "Tailwind"]
    }
  ],
  "tags": ["tech", "startup", "saas"],
  "metadata": null
}`;

    let elementCount = 0;
    let maxDepth = 0;

    // ===== Singularize =====
    function singularize(word) {
        if (word.endsWith('ies')) return word.slice(0, -3) + 'y';
        if (word.endsWith('ses') || word.endsWith('xes') || word.endsWith('zes')) return word.slice(0, -2);
        if (word.endsWith('s') && !word.endsWith('ss') && !word.endsWith('us')) return word.slice(0, -1);
        return word;
    }

    // ===== XML Helpers =====
    function sanitizeName(name) {
        let clean = name.replace(/[^a-zA-Z0-9_.-]/g, '_').replace(/^[^a-zA-Z_]/, '_');
        return clean || 'element';
    }

    function escapeXml(str) {
        return String(str).replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;').replace(/"/g, '&quot;').replace(/'/g, '&apos;');
    }

    function getIndent(level) {
        const val = indentSize.value;
        if (val === '0') return '';
        if (val === 'tab') return '\t'.repeat(level);
        return ' '.repeat(parseInt(val) * level);
    }

    function getNl() {
        return indentSize.value === '0' ? '' : '\n';
    }

    // ===== JSON to XML =====
    function jsonToXml(value, tagName, depth) {
        const nl = getNl();
        const indent = getIndent(depth);
        const tag = sanitizeName(tagName);
        let xml = '';

        elementCount++;
        if (depth > maxDepth) maxDepth = depth;

        const typeAttr = includeTypes.checked;

        if (value === null || value === undefined) {
            if (typeAttr) {
                xml += indent + '<' + tag + ' type="null"';
            } else {
                xml += indent + '<' + tag;
            }
            xml += emptySelfClose.checked ? '/>' + nl : '></' + tag + '>' + nl;
        } else if (typeof value === 'boolean') {
            xml += indent + '<' + tag + (typeAttr ? ' type="boolean"' : '') + '>' + value + '</' + tag + '>' + nl;
        } else if (typeof value === 'number') {
            xml += indent + '<' + tag + (typeAttr ? ' type="number"' : '') + '>' + value + '</' + tag + '>' + nl;
        } else if (typeof value === 'string') {
            if (value === '') {
                xml += indent + '<' + tag + (typeAttr ? ' type="string"' : '');
                xml += emptySelfClose.checked ? '/>' + nl : '></' + tag + '>' + nl;
            } else {
                const content = useCdata.checked ? '<![CDATA[' + value + ']]>' : escapeXml(value);
                xml += indent + '<' + tag + (typeAttr ? ' type="string"' : '') + '>' + content + '</' + tag + '>' + nl;
            }
        } else if (Array.isArray(value)) {
            xml += indent + '<' + tag + (typeAttr ? ' type="array"' : '') + '>' + nl;
            const itemName = arrayItemName.value === 'auto' ? singularize(tag) : 'item';
            for (const item of value) {
                xml += jsonToXml(item, itemName, depth + 1);
            }
            xml += indent + '</' + tag + '>' + nl;
        } else if (typeof value === 'object') {
            xml += indent + '<' + tag + (typeAttr ? ' type="object"' : '') + '>' + nl;
            for (const key of Object.keys(value)) {
                xml += jsonToXml(value[key], key, depth + 1);
            }
            xml += indent + '</' + tag + '>' + nl;
        }

        return xml;
    }

    function convert() {
        const input = jsonInput.value.trim();
        if (!input) { showError(S.enter_json); return; }

        try {
            const parsed = JSON.parse(input);

            elementCount = 0;
            maxDepth = 0;

            const rootName = sanitizeName(rootElementInput.value || 'root');
            const nl = getNl();
            let xml = '';

            if (includeDeclaration.checked) {
                xml += '<?xml version="1.0" encoding="UTF-8"?>' + nl;
            }

            // If top-level is array, wrap in root
            if (Array.isArray(parsed)) {
                xml += '<' + rootName + '>' + nl;
                const itemName = arrayItemName.value === 'auto' ? singularize(rootName) : 'item';
                for (const item of parsed) {
                    xml += jsonToXml(item, itemName, 1);
                }
                xml += '</' + rootName + '>';
                elementCount++;
            } else if (typeof parsed === 'object' && parsed !== null) {
                xml += '<' + rootName + '>' + nl;
                for (const key of Object.keys(parsed)) {
                    xml += jsonToXml(parsed[key], key, 1);
                }
                xml += '</' + rootName + '>';
                elementCount++;
            } else {
                // Primitive at root
                xml += jsonToXml(parsed, rootName, 0);
            }

            xmlOutput.value = xml;

            document.getElementById('stat-elements').textContent = elementCount;
            document.getElementById('stat-depth').textContent = maxDepth;
            document.getElementById('stat-input-size').textContent = formatSize(input.length);
            document.getElementById('stat-output-size').textContent = formatSize(xml.length);
            statsBar.classList.remove('hidden');

            showSuccess(S.converted.replace('{elements}', elementCount).replace('{depth}', maxDepth));
        } catch (e) {
            showError(S.invalid_json + e.message);
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
        a.href = url; a.download = 'data.xml';
        document.body.appendChild(a); a.click();
        document.body.removeChild(a); URL.revokeObjectURL(url);
        showSuccess(S.xml_downloaded);
    });

    btnSample.addEventListener('click', function() {
        jsonInput.value = sampleJSON;
        xmlOutput.value = '';
        statsBar.classList.add('hidden');
    });

    btnClear.addEventListener('click', function() {
        jsonInput.value = '';
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
            jsonInput.value = evt.target.result;
            xmlOutput.value = '';
            statsBar.classList.add('hidden');
            showSuccess(S.file_loaded + file.name);
        };
        reader.readAsText(file);
        this.value = '';
    });

    // Real-time
    let timer;
    jsonInput.addEventListener('input', function() {
        clearTimeout(timer);
        timer = setTimeout(() => { if (jsonInput.value.trim()) convert(); }, 500);
    });

    // Re-convert on option change
    [arrayItemName, indentSize, includeDeclaration, useCdata, includeTypes, emptySelfClose].forEach(el => {
        el.addEventListener('change', () => { if (jsonInput.value.trim()) convert(); });
    });
    rootElementInput.addEventListener('input', () => { clearTimeout(timer); timer = setTimeout(() => { if (jsonInput.value.trim()) convert(); }, 500); });

    document.addEventListener('keydown', function(e) {
        if ((e.ctrlKey || e.metaKey) && e.key === 'Enter') { e.preventDefault(); convert(); }
    });
})();
</script>
