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
        minified: stringsEl?.dataset.minified || 'Minified',
        attributePrefix: stringsEl?.dataset.attributePrefix || 'Attribute Prefix',
        trimWhitespace: stringsEl?.dataset.trimWhitespace || 'Trim Whitespace',
        parseNumbers: stringsEl?.dataset.parseNumbers || 'Parse Numbers',
        xmlInput: stringsEl?.dataset.xmlInput || 'XML Input',
        jsonOutput: stringsEl?.dataset.jsonOutput || 'JSON Output',
        inputPlaceholder: stringsEl?.dataset.inputPlaceholder || 'Paste your XML here...',
        outputPlaceholder: stringsEl?.dataset.outputPlaceholder || 'Converted JSON will appear here...',
        elements: stringsEl?.dataset.elements || 'Elements',
        maxDepth: stringsEl?.dataset.maxDepth || 'Max Depth',
        xmlSize: stringsEl?.dataset.xmlSize || 'XML Size',
        jsonSize: stringsEl?.dataset.jsonSize || 'JSON Size',
        successConvert: stringsEl?.dataset.successConvert || 'XML converted to JSON successfully!',
        elementsProcessed: stringsEl?.dataset.elementsProcessed || ' elements processed.',
        errorEmpty: stringsEl?.dataset.errorEmpty || 'Please enter some XML to convert',
        copyNothing: stringsEl?.dataset.copyNothing || 'Nothing to copy. Convert some XML first.',
        copied: stringsEl?.dataset.copied || 'Copied!',
        copyFail: stringsEl?.dataset.copyFail || 'Failed to copy to clipboard',
        downloadNothing: stringsEl?.dataset.downloadNothing || 'Nothing to download. Convert some XML first.',
        downloaded: stringsEl?.dataset.downloaded || 'Downloaded: ',
    };

    // DOM Elements
    const xmlInput = document.getElementById('xml-input');
    const outputCode = document.getElementById('output-code');
    const jsonOutputRaw = document.getElementById('json-output-raw');
    const jsonIndent = document.getElementById('json-indent');
    const attrPrefix = document.getElementById('attr-prefix');
    const trimText = document.getElementById('trim-text');
    const parseNumbers = document.getElementById('parse-numbers');
    const btnConvert = document.getElementById('btn-convert');
    const btnCopy = document.getElementById('btn-copy');
    const btnDownload = document.getElementById('btn-download');
    const btnSample = document.getElementById('btn-sample');
    const btnClear = document.getElementById('btn-clear');
    const statsBar = document.getElementById('stats-bar');
    const statElements = document.getElementById('stat-elements');
    const statDepth = document.getElementById('stat-depth');
    const statInputSize = document.getElementById('stat-input-size');
    const statOutputSize = document.getElementById('stat-output-size');
    const successNotification = document.getElementById('success-notification');
    const successMessage = document.getElementById('success-message');
    const errorNotification = document.getElementById('error-notification');
    const errorMessage = document.getElementById('error-message');

    // Sample XML
    const sampleXml = `<?xml version="1.0" encoding="UTF-8"?>
<bookstore>
  <book category="fiction" lang="en">
    <title>The Great Gatsby</title>
    <author>F. Scott Fitzgerald</author>
    <year>1925</year>
    <price>10.99</price>
    <tags>
      <tag>classic</tag>
      <tag>american</tag>
      <tag>novel</tag>
    </tags>
  </book>
  <book category="non-fiction" lang="en">
    <title>Sapiens</title>
    <author>Yuval Noah Harari</author>
    <year>2011</year>
    <price>14.99</price>
    <tags>
      <tag>history</tag>
      <tag>science</tag>
    </tags>
  </book>
  <book category="fiction" lang="es">
    <title>One Hundred Years of Solitude</title>
    <author>Gabriel García Márquez</author>
    <year>1967</year>
    <price>12.50</price>
    <description><![CDATA[A masterpiece of <em>magical realism</em> that tells the multi-generational story of the Buendía family.]]></description>
    <tags>
      <tag>classic</tag>
      <tag>latin-american</tag>
    </tags>
  </book>
</bookstore>`;

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

    function syntaxHighlight(json) {
        if (typeof json !== 'string') json = JSON.stringify(json, null, 2);
        json = json.replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;');
        return json.replace(
            /("(\\u[a-zA-Z0-9]{4}|\\[^u]|[^\\"])*"(\s*:)?|\b(true|false|null)\b|-?\d+(?:\.\d*)?(?:[eE][+\-]?\d+)?)/g,
            function(match) {
                let cls = 'text-emerald-400';
                if (/^"/.test(match)) {
                    if (/:$/.test(match)) {
                        cls = 'text-gold';
                        match = match.slice(0, -1) + '<span class="text-light">:</span>';
                    } else {
                        cls = 'text-sky-400';
                    }
                } else if (/true|false/.test(match)) {
                    cls = 'text-purple-400';
                } else if (/null/.test(match)) {
                    cls = 'text-light-muted';
                }
                return '<span class="' + cls + '">' + match + '</span>';
            }
        );
    }

    // ===== XML Parser =====

    let elementCount = 0;

    function xmlToJson(xml, options) {
        const parser = new DOMParser();
        const doc = parser.parseFromString(xml, 'text/xml');

        // Check for parse errors
        const parseError = doc.querySelector('parsererror');
        if (parseError) {
            const errorText = parseError.textContent || parseError.innerText;
            throw new Error('XML Parse Error: ' + errorText.split('\n')[0]);
        }

        elementCount = 0;
        const result = processNode(doc.documentElement, options);

        // Wrap in root element name
        const rootName = doc.documentElement.tagName;
        const wrapped = {};
        wrapped[rootName] = result;

        return wrapped;
    }

    function processNode(node, options) {
        elementCount++;
        const obj = {};
        let hasChildren = false;
        let textContent = '';

        // Process attributes
        if (node.attributes && node.attributes.length > 0) {
            hasChildren = true;
            for (let i = 0; i < node.attributes.length; i++) {
                const attr = node.attributes[i];
                const key = options.prefix + attr.name;
                obj[key] = maybeParseValue(attr.value, options);
            }
        }

        // Process child nodes
        if (node.childNodes && node.childNodes.length > 0) {
            const childElements = {};

            for (let i = 0; i < node.childNodes.length; i++) {
                const child = node.childNodes[i];

                if (child.nodeType === Node.ELEMENT_NODE) {
                    hasChildren = true;
                    const tagName = child.tagName;

                    const childValue = processNode(child, options);

                    if (childElements[tagName] !== undefined) {
                        // Already seen this tag — convert to array
                        if (!Array.isArray(obj[tagName])) {
                            obj[tagName] = [obj[tagName]];
                        }
                        obj[tagName].push(childValue);
                    } else {
                        obj[tagName] = childValue;
                        childElements[tagName] = true;
                    }
                } else if (child.nodeType === Node.TEXT_NODE || child.nodeType === Node.CDATA_SECTION_NODE) {
                    const text = options.trim ? child.nodeValue.trim() : child.nodeValue;
                    if (text) {
                        textContent += text;
                    }
                }
            }
        }

        // Determine return value
        if (hasChildren) {
            if (textContent) {
                obj['#text'] = maybeParseValue(textContent, options);
            }
            return obj;
        }

        // Leaf node — return text content directly
        return maybeParseValue(textContent, options);
    }

    function maybeParseValue(value, options) {
        if (!options.parseNums) return value;

        // Try to parse as number
        if (value !== '' && !isNaN(value) && !isNaN(parseFloat(value))) {
            const num = Number(value);
            // Avoid parsing things like "007" as numbers
            if (String(num) === value || (value.includes('.') && String(num) === value)) {
                return num;
            }
        }

        // Parse booleans
        if (value === 'true') return true;
        if (value === 'false') return false;

        return value;
    }

    function getMaxDepth(obj, depth) {
        if (obj === null || typeof obj !== 'object') return depth;
        let max = depth;
        const values = Array.isArray(obj) ? obj : Object.values(obj);
        for (const v of values) {
            const d = getMaxDepth(v, depth + 1);
            if (d > max) max = d;
        }
        return max;
    }

    // ===== Core Functions =====

    function convert() {
        const input = xmlInput.value.trim();
        if (!input) {
            showError(S.errorEmpty);
            return;
        }

        try {
            const options = {
                prefix: attrPrefix.value,
                trim: trimText.checked,
                parseNums: parseNumbers.checked
            };

            const data = xmlToJson(input, options);

            let indentValue = jsonIndent.value;
            let jsonString;
            if (indentValue === '0') {
                jsonString = JSON.stringify(data);
            } else if (indentValue === 'tab') {
                jsonString = JSON.stringify(data, null, '\t');
            } else {
                jsonString = JSON.stringify(data, null, parseInt(indentValue));
            }

            jsonOutputRaw.value = jsonString;
            outputCode.innerHTML = syntaxHighlight(jsonString);

            // Stats
            statElements.textContent = elementCount;
            statDepth.textContent = getMaxDepth(data, 0);
            statInputSize.textContent = formatBytes(new Blob([input]).size);
            statOutputSize.textContent = formatBytes(new Blob([jsonString]).size);
            statsBar.classList.remove('hidden');

            showSuccess(S.successConvert + ' ' + elementCount + S.elementsProcessed);
        } catch (e) {
            showError(e.message);
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
        xmlInput.value = sampleXml;
        jsonOutputRaw.value = '';
        outputCode.innerHTML = '<span class="text-light-muted">' + S.outputPlaceholder + '</span>';
        statsBar.classList.add('hidden');
    }

    function clearAll() {
        xmlInput.value = '';
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

    document.addEventListener('keydown', function(e) {
        if ((e.ctrlKey || e.metaKey) && e.key === 'Enter') {
            e.preventDefault();
            convert();
        }
    });
})();
</script>
