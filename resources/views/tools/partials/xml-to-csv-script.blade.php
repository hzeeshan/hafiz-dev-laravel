<script>
(function() {
    const stringsEl = document.getElementById('tool-strings');
    const S = {
        enter_xml: stringsEl?.dataset.enterXml || 'Please enter some XML to convert',
        nothing_copy: stringsEl?.dataset.nothingCopy || 'Nothing to copy. Convert some XML first.',
        nothing_download: stringsEl?.dataset.nothingDownload || 'Nothing to download. Convert some XML first.',
        converted: stringsEl?.dataset.converted || 'XML converted to CSV',
        row_generated: stringsEl?.dataset.rowGenerated || '1 row generated.',
        rows: stringsEl?.dataset.rows || 'rows',
        columns: stringsEl?.dataset.columns || 'columns',
        copied: stringsEl?.dataset.copied || 'Copied!',
        copy_fail: stringsEl?.dataset.copyFail || 'Failed to copy to clipboard',
        downloaded: stringsEl?.dataset.downloaded || 'Downloaded:',
        showing_first: stringsEl?.dataset.showingFirst || 'Showing first',
        of: stringsEl?.dataset.of || 'of',
        comma_default: stringsEl?.dataset.commaDefault || 'Comma (default)',
        semicolon: stringsEl?.dataset.semicolon || 'Semicolon',
        tab: stringsEl?.dataset.tab || 'Tab',
        pipe: stringsEl?.dataset.pipe || 'Pipe',
        at_default: stringsEl?.dataset.atDefault || '@ (default)',
        underscore: stringsEl?.dataset.underscore || '_ (underscore)',
        none: stringsEl?.dataset.none || 'None (no prefix)',
        placeholder_input: stringsEl?.dataset.placeholderInput || 'Paste your XML here...',
        placeholder_output: stringsEl?.dataset.placeholderOutput || 'Converted CSV will appear here...',
    };

    // DOM Elements
    const xmlInput = document.getElementById('xml-input');
    const csvOutput = document.getElementById('csv-output');
    const delimiterSelect = document.getElementById('delimiter');
    const attrPrefixSelect = document.getElementById('attr-prefix');
    const includeHeader = document.getElementById('include-header');
    const flattenNested = document.getElementById('flatten-nested');
    const btnConvert = document.getElementById('btn-convert');
    const btnCopy = document.getElementById('btn-copy');
    const btnDownload = document.getElementById('btn-download');
    const btnSample = document.getElementById('btn-sample');
    const btnClear = document.getElementById('btn-clear');
    const statsBar = document.getElementById('stats-bar');
    const statRows = document.getElementById('stat-rows');
    const statColumns = document.getElementById('stat-columns');
    const statInputSize = document.getElementById('stat-input-size');
    const statOutputSize = document.getElementById('stat-output-size');
    const previewSection = document.getElementById('preview-section');
    const previewThead = document.getElementById('preview-thead');
    const previewTbody = document.getElementById('preview-tbody');
    const previewNote = document.getElementById('preview-note');
    const successNotification = document.getElementById('success-notification');
    const successMessage = document.getElementById('success-message');
    const errorNotification = document.getElementById('error-notification');
    const errorMessage = document.getElementById('error-message');

    // Sample XML
    const sampleXml = `<?xml version="1.0" encoding="UTF-8"?>
<employees>
  <employee id="1" department="Engineering">
    <name>Alice Johnson</name>
    <email>alice@example.com</email>
    <salary>95000</salary>
    <location>
      <city>San Francisco</city>
      <state>CA</state>
    </location>
    <skills>
      <skill>JavaScript</skill>
      <skill>Python</skill>
    </skills>
  </employee>
  <employee id="2" department="Design">
    <name>Bob Smith</name>
    <email>bob@example.com</email>
    <salary>85000</salary>
    <location>
      <city>New York</city>
      <state>NY</state>
    </location>
    <skills>
      <skill>Figma</skill>
      <skill>CSS</skill>
    </skills>
  </employee>
  <employee id="3" department="Marketing">
    <name>Carol Davis</name>
    <email>carol@example.com</email>
    <salary>78000</salary>
    <location>
      <city>Chicago</city>
      <state>IL</state>
    </location>
    <skills>
      <skill>SEO</skill>
      <skill>Analytics</skill>
    </skills>
  </employee>
</employees>`;

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

    // ===== XML to CSV Conversion =====

    function parseXml(xmlString) {
        const parser = new DOMParser();
        const doc = parser.parseFromString(xmlString, 'text/xml');

        const parseError = doc.querySelector('parsererror');
        if (parseError) {
            const errorText = parseError.textContent || parseError.innerText;
            throw new Error('XML Parse Error: ' + errorText.split('\n')[0]);
        }

        return doc;
    }

    function findRepeatingElements(rootElement) {
        // Find the repeated child elements (the "rows")
        const children = rootElement.children;
        if (children.length === 0) return { parent: rootElement, tagName: null, elements: [] };

        // Count occurrences of each tag name
        const tagCounts = {};
        for (let i = 0; i < children.length; i++) {
            const tag = children[i].tagName;
            tagCounts[tag] = (tagCounts[tag] || 0) + 1;
        }

        // Find the most repeated tag (these are our "rows")
        let maxTag = null;
        let maxCount = 0;
        for (const [tag, count] of Object.entries(tagCounts)) {
            if (count > maxCount) {
                maxCount = count;
                maxTag = tag;
            }
        }

        if (maxCount <= 1 && children.length === 1) {
            // Single child — recurse into it
            return findRepeatingElements(children[0]);
        }

        const elements = [];
        for (let i = 0; i < children.length; i++) {
            if (children[i].tagName === maxTag) {
                elements.push(children[i]);
            }
        }

        return { parent: rootElement, tagName: maxTag, elements: elements };
    }

    function flattenElement(element, prefix, options) {
        const result = {};

        // Process attributes
        if (element.attributes) {
            for (let i = 0; i < element.attributes.length; i++) {
                const attr = element.attributes[i];
                const key = prefix ? prefix + '.' + options.attrPrefix + attr.name : options.attrPrefix + attr.name;
                result[key] = attr.value;
            }
        }

        // Process child elements
        let hasChildElements = false;
        const childTexts = [];

        for (let i = 0; i < element.childNodes.length; i++) {
            const child = element.childNodes[i];

            if (child.nodeType === Node.ELEMENT_NODE) {
                hasChildElements = true;
                const childTag = child.tagName;
                const childKey = prefix ? prefix + '.' + childTag : childTag;

                // Check if this child has only text content
                const childHasOnlyText = child.children.length === 0;

                if (childHasOnlyText) {
                    const text = (child.textContent || '').trim();
                    // Check if there are already entries with this key (repeated elements)
                    if (result[childKey] !== undefined) {
                        // Append with separator for repeated simple elements
                        result[childKey] += ', ' + text;
                    } else {
                        result[childKey] = text;
                    }
                } else if (options.flatten) {
                    // Recursively flatten nested elements
                    const nested = flattenElement(child, childKey, options);
                    Object.assign(result, nested);
                } else {
                    // Don't flatten — serialize as string
                    result[childKey] = child.textContent.trim();
                }
            } else if (child.nodeType === Node.TEXT_NODE || child.nodeType === Node.CDATA_SECTION_NODE) {
                const text = child.nodeValue.trim();
                if (text) childTexts.push(text);
            }
        }

        // If element has both text and child elements, store text separately
        if (childTexts.length > 0 && !hasChildElements) {
            const key = prefix || '#text';
            result[key] = childTexts.join(' ');
        } else if (childTexts.length > 0 && hasChildElements) {
            const key = prefix ? prefix + '.#text' : '#text';
            result[key] = childTexts.join(' ');
        }

        return result;
    }

    function escapeCSVField(value, delimiter) {
        if (value === null || value === undefined) return '';
        const str = String(value);
        if (str.includes(delimiter) || str.includes('"') || str.includes('\n') || str.includes('\r')) {
            return '"' + str.replace(/"/g, '""') + '"';
        }
        return str;
    }

    function convert() {
        const input = xmlInput.value.trim();
        if (!input) {
            showError(S.enter_xml);
            return;
        }

        try {
            const doc = parseXml(input);
            const options = {
                attrPrefix: attrPrefixSelect.value,
                flatten: flattenNested.checked
            };

            const delimiter = delimiterSelect.value;

            // Find the repeating elements (rows)
            const { elements } = findRepeatingElements(doc.documentElement);

            if (elements.length === 0) {
                // Single element — treat entire doc as one row
                const row = flattenElement(doc.documentElement, '', options);
                const headers = Object.keys(row);
                const lines = [];

                if (includeHeader.checked) {
                    lines.push(headers.map(h => escapeCSVField(h, delimiter)).join(delimiter));
                }
                lines.push(headers.map(h => escapeCSVField(row[h], delimiter)).join(delimiter));

                const csvString = lines.join('\n');
                csvOutput.value = csvString;
                renderPreview([headers], [[row]], headers);
                updateStats(1, headers.length, input, csvString);
                showSuccess(S.converted + ' — ' + S.row_generated);
                return;
            }

            // Flatten all repeating elements
            const rows = elements.map(el => flattenElement(el, '', options));

            // Collect all unique headers across all rows
            const headerSet = new Set();
            rows.forEach(row => Object.keys(row).forEach(k => headerSet.add(k)));
            const headers = Array.from(headerSet);

            // Build CSV
            const lines = [];
            if (includeHeader.checked) {
                lines.push(headers.map(h => escapeCSVField(h, delimiter)).join(delimiter));
            }

            rows.forEach(row => {
                const line = headers.map(h => escapeCSVField(row[h] || '', delimiter));
                lines.push(line.join(delimiter));
            });

            const csvString = lines.join('\n');
            csvOutput.value = csvString;

            // Render preview
            renderPreview(headers, rows, headers);
            updateStats(rows.length, headers.length, input, csvString);
            showSuccess(S.converted + ' — ' + rows.length + ' ' + S.rows + ', ' + headers.length + ' ' + S.columns + '.');

        } catch (e) {
            showError(e.message);
            statsBar.classList.add('hidden');
            previewSection.classList.add('hidden');
        }
    }

    function renderPreview(headers, rows, allHeaders) {
        const maxPreviewRows = 10;
        const maxPreviewCols = 8;

        const displayHeaders = allHeaders.slice(0, maxPreviewCols);
        const hasMoreCols = allHeaders.length > maxPreviewCols;

        // Build thead
        let theadHtml = '<tr>';
        displayHeaders.forEach(h => {
            theadHtml += '<th class="px-3 py-2 font-semibold text-xs whitespace-nowrap">' + escapeHtml(h) + '</th>';
        });
        if (hasMoreCols) {
            theadHtml += '<th class="px-3 py-2 font-semibold text-xs text-light-muted">...</th>';
        }
        theadHtml += '</tr>';
        previewThead.innerHTML = theadHtml;

        // Build tbody
        const displayRows = rows.slice(0, maxPreviewRows);
        let tbodyHtml = '';
        displayRows.forEach(row => {
            tbodyHtml += '<tr class="border-b border-gold/10 hover:bg-gold/5">';
            displayHeaders.forEach(h => {
                const val = row[h] || '';
                tbodyHtml += '<td class="px-3 py-2 text-xs whitespace-nowrap max-w-[200px] truncate">' + escapeHtml(String(val)) + '</td>';
            });
            if (hasMoreCols) {
                tbodyHtml += '<td class="px-3 py-2 text-xs text-light-muted">...</td>';
            }
            tbodyHtml += '</tr>';
        });
        previewTbody.innerHTML = tbodyHtml;

        // Show note if truncated
        const notes = [];
        if (rows.length > maxPreviewRows) notes.push(S.showing_first + ' ' + maxPreviewRows + ' ' + S.of + ' ' + rows.length + ' ' + S.rows);
        if (hasMoreCols) notes.push(S.showing_first + ' ' + maxPreviewCols + ' ' + S.of + ' ' + allHeaders.length + ' ' + S.columns);
        if (notes.length > 0) {
            previewNote.textContent = notes.join(' · ');
            previewNote.classList.remove('hidden');
        } else {
            previewNote.classList.add('hidden');
        }

        previewSection.classList.remove('hidden');
    }

    function escapeHtml(str) {
        const div = document.createElement('div');
        div.textContent = str;
        return div.innerHTML;
    }

    function updateStats(rows, cols, input, output) {
        statRows.textContent = rows;
        statColumns.textContent = cols;
        statInputSize.textContent = formatBytes(new Blob([input]).size);
        statOutputSize.textContent = formatBytes(new Blob([output]).size);
        statsBar.classList.remove('hidden');
    }

    function copyOutput() {
        const output = csvOutput.value;
        if (!output) {
            showError(S.nothing_copy);
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
        }).catch(() => showError(S.copy_fail));
    }

    function downloadOutput() {
        const output = csvOutput.value;
        if (!output) {
            showError(S.nothing_download);
            return;
        }
        const filename = 'converted-' + new Date().toISOString().split('T')[0] + '.csv';
        // Add BOM for Excel UTF-8 compatibility
        const bom = '\uFEFF';
        const blob = new Blob([bom + output], { type: 'text/csv;charset=utf-8;' });
        const url = URL.createObjectURL(blob);
        const a = document.createElement('a');
        a.href = url;
        a.download = filename;
        document.body.appendChild(a);
        a.click();
        document.body.removeChild(a);
        URL.revokeObjectURL(url);
        showSuccess(S.downloaded + ' ' + filename);
    }

    function loadSample() {
        xmlInput.value = sampleXml;
        csvOutput.value = '';
        statsBar.classList.add('hidden');
        previewSection.classList.add('hidden');
    }

    function clearAll() {
        xmlInput.value = '';
        csvOutput.value = '';
        statsBar.classList.add('hidden');
        previewSection.classList.add('hidden');
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
