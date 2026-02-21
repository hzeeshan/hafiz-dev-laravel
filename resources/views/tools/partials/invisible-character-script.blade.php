<script>
(function() {
    // Invisible character definitions
    const CHARS = [
        { key: 'zwsp',      code: 0x200B, name: 'Zero Width Space',       char: '\u200B', desc: 'Zero display width, widely supported' },
        { key: 'zwnj',      code: 0x200C, name: 'Zero Width Non-Joiner',  char: '\u200C', desc: 'Prevents ligature joining' },
        { key: 'zwj',       code: 0x200D, name: 'Zero Width Joiner',      char: '\u200D', desc: 'Joins characters (used in emoji)' },
        { key: 'wj',        code: 0x2060, name: 'Word Joiner',            char: '\u2060', desc: 'Prevents line break at position' },
        { key: 'hangul',    code: 0x3164, name: 'Hangul Filler',          char: '\u3164', desc: 'Visible space, great for blank names' },
        { key: 'braille',   code: 0x2800, name: 'Braille Pattern Blank',  char: '\u2800', desc: 'Most compatible for social media' },
        { key: 'mongolian', code: 0x180E, name: 'Mongolian Vowel Separator', char: '\u180E', desc: 'Separator character, limited support' },
        { key: 'nbsp',      code: 0x00A0, name: 'No-Break Space',         char: '\u00A0', desc: 'Non-breaking space, prevents wrapping' },
    ];

    // Known invisible/control code points for detection
    const INVISIBLE_CODEPOINTS = new Set([
        0x200B, 0x200C, 0x200D, 0x200E, 0x200F,
        0x2060, 0x2061, 0x2062, 0x2063, 0x2064,
        0xFEFF, 0x00A0, 0x00AD, 0x034F,
        0x180E, 0x3164, 0x2800,
        0x2028, 0x2029,
        0x202A, 0x202B, 0x202C, 0x202D, 0x202E,
        0x2066, 0x2067, 0x2068, 0x2069,
        0x115F, 0x1160, 0x3164, 0xFFA0,
    ]);

    // DOM elements
    const charType = document.getElementById('char-type');
    const repeatCount = document.getElementById('repeat-count');
    const optNewline = document.getElementById('opt-newline');
    const charTable = document.getElementById('char-table');
    const outputText = document.getElementById('output-text');
    const btnGenerate = document.getElementById('btn-generate');
    const btnCopy = document.getElementById('btn-copy');
    const btnDownload = document.getElementById('btn-download');
    const btnInspect = document.getElementById('btn-inspect');
    const btnSample = document.getElementById('btn-sample');
    const btnClear = document.getElementById('btn-clear');
    const statsBar = document.getElementById('stats-bar');
    const inspectResults = document.getElementById('inspect-results');
    const inspectOutput = document.getElementById('inspect-output');
    const successNotification = document.getElementById('success-notification');
    const successMessage = document.getElementById('success-message');
    const errorNotification = document.getElementById('error-notification');
    const errorMessage = document.getElementById('error-message');

    function showSuccess(msg) {
        successMessage.textContent = msg;
        successNotification.classList.remove('hidden');
        errorNotification.classList.add('hidden');
        setTimeout(() => successNotification.classList.add('hidden'), 2000);
    }

    function showError(msg) {
        errorMessage.textContent = msg;
        errorNotification.classList.remove('hidden');
        successNotification.classList.add('hidden');
        setTimeout(() => errorNotification.classList.add('hidden'), 4000);
    }

    function formatCodePoint(code) {
        return 'U+' + code.toString(16).toUpperCase().padStart(4, '0');
    }

    function getCharName(code) {
        const found = CHARS.find(c => c.code === code);
        if (found) return found.name;
        if (code <= 0x001F || (code >= 0x007F && code <= 0x009F)) return 'Control Character';
        return 'Unicode ' + formatCodePoint(code);
    }

    function isInvisible(code) {
        if (INVISIBLE_CODEPOINTS.has(code)) return true;
        if (code <= 0x001F) return true; // C0 controls
        if (code >= 0x007F && code <= 0x009F) return true; // C1 controls
        return false;
    }

    // Build character table
    function buildTable() {
        let html = '<div class="space-y-2">';
        CHARS.forEach(c => {
            html += `
                <div class="flex items-center justify-between p-3 rounded-lg border border-gold/10 hover:border-gold/30 transition-colors group">
                    <div class="flex-1 min-w-0">
                        <div class="flex items-center gap-2 mb-1">
                            <span class="text-light font-medium text-sm">${c.name}</span>
                            <code class="text-gold/70 text-xs bg-darkCard px-1.5 py-0.5 rounded">${formatCodePoint(c.code)}</code>
                        </div>
                        <p class="text-light-muted text-xs">${c.desc}</p>
                    </div>
                    <button
                        data-copy-char="${c.key}"
                        class="ml-3 px-3 py-1.5 border border-gold/50 text-light-muted rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 text-xs font-medium flex items-center gap-1 cursor-pointer flex-shrink-0"
                    >
                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                        Copy
                    </button>
                </div>`;
        });
        html += '</div>';
        charTable.innerHTML = html;

        // Attach copy handlers
        charTable.querySelectorAll('[data-copy-char]').forEach(btn => {
            btn.addEventListener('click', function() {
                const key = this.dataset.copyChar;
                const c = CHARS.find(ch => ch.key === key);
                if (!c) return;
                navigator.clipboard.writeText(c.char).then(() => {
                    const origHTML = this.innerHTML;
                    this.innerHTML = '<svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> Copied!';
                    this.classList.add('text-green-400', 'border-green-400');
                    showSuccess('Copied ' + c.name + ' to clipboard!');
                    setTimeout(() => {
                        this.innerHTML = origHTML;
                        this.classList.remove('text-green-400', 'border-green-400');
                    }, 2000);
                });
            });
        });
    }

    function generate() {
        const key = charType.value;
        const count = Math.max(1, Math.min(1000, parseInt(repeatCount.value) || 1));
        const c = CHARS.find(ch => ch.key === key);
        if (!c) {
            showError('Invalid character type selected.');
            return;
        }

        const separator = optNewline.checked ? '\n' : '';
        const result = Array(count).fill(c.char).join(separator);
        outputText.value = result;
        updateStats(result);
        showSuccess('Generated ' + count + ' ' + c.name + ' character' + (count > 1 ? 's' : '') + '!');
    }

    function updateStats(text) {
        if (!text) {
            statsBar.classList.add('hidden');
            return;
        }

        const chars = [...text];
        const total = chars.length;
        let invisible = 0;
        let visible = 0;

        chars.forEach(ch => {
            const code = ch.codePointAt(0);
            if (isInvisible(code) || ch === '\n' || ch === '\r' || ch === '\t') {
                invisible++;
            } else {
                visible++;
            }
        });

        const bytes = new Blob([text]).size;

        document.getElementById('stat-total').textContent = total;
        document.getElementById('stat-invisible').textContent = invisible;
        document.getElementById('stat-visible').textContent = visible;
        document.getElementById('stat-bytes').textContent = bytes < 1024 ? bytes + ' B' : (bytes / 1024).toFixed(1) + ' KB';
        statsBar.classList.remove('hidden');
    }

    function inspect() {
        const text = outputText.value;
        if (!text) {
            showError('Paste some text in the output area first, then click Inspect.');
            return;
        }

        const chars = [...text];
        let html = '<table class="w-full text-sm">';
        html += '<thead><tr class="border-b border-gold/20"><th class="text-left p-2 text-gold">Index</th><th class="text-left p-2 text-gold">Char</th><th class="text-left p-2 text-gold">Code Point</th><th class="text-left p-2 text-gold">Name</th><th class="text-left p-2 text-gold">Type</th></tr></thead>';
        html += '<tbody>';

        chars.forEach((ch, i) => {
            const code = ch.codePointAt(0);
            const inv = isInvisible(code);
            const display = inv ? '<span class="text-gold/50 italic">(invisible)</span>' : '<span class="text-light">' + escapeHTML(ch) + '</span>';
            const typeLabel = inv
                ? '<span class="text-red-400 text-xs bg-red-400/10 px-1.5 py-0.5 rounded">invisible</span>'
                : '<span class="text-green-400 text-xs bg-green-400/10 px-1.5 py-0.5 rounded">visible</span>';

            html += '<tr class="border-b border-gold/5 hover:bg-gold/5">';
            html += '<td class="p-2 text-light-muted">' + i + '</td>';
            html += '<td class="p-2">' + display + '</td>';
            html += '<td class="p-2"><code class="text-gold/70">' + formatCodePoint(code) + '</code></td>';
            html += '<td class="p-2 text-light-muted">' + getCharName(code) + '</td>';
            html += '<td class="p-2">' + typeLabel + '</td>';
            html += '</tr>';
        });

        html += '</tbody></table>';

        inspectOutput.innerHTML = html;
        inspectResults.classList.remove('hidden');
        updateStats(text);
    }

    function escapeHTML(str) {
        const div = document.createElement('div');
        div.textContent = str;
        return div.innerHTML;
    }

    // Event listeners
    btnGenerate.addEventListener('click', generate);

    btnCopy.addEventListener('click', function() {
        const text = outputText.value;
        if (!text) {
            showError('Nothing to copy. Generate invisible characters first.');
            return;
        }
        navigator.clipboard.writeText(text).then(() => {
            const origHTML = this.innerHTML;
            this.innerHTML = '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> Copied!';
            this.classList.add('text-green-400', 'border-green-400');
            showSuccess('Copied to clipboard!');
            setTimeout(() => {
                this.innerHTML = origHTML;
                this.classList.remove('text-green-400', 'border-green-400');
            }, 2000);
        });
    });

    btnDownload.addEventListener('click', function() {
        const text = outputText.value;
        if (!text) {
            showError('Nothing to download. Generate invisible characters first.');
            return;
        }
        const blob = new Blob([text], { type: 'text/plain' });
        const url = URL.createObjectURL(blob);
        const a = document.createElement('a');
        a.href = url;
        a.download = 'invisible-characters.txt';
        document.body.appendChild(a);
        a.click();
        document.body.removeChild(a);
        URL.revokeObjectURL(url);
        showSuccess('Downloaded invisible-characters.txt');
    });

    btnInspect.addEventListener('click', inspect);

    btnSample.addEventListener('click', function() {
        outputText.value = 'Hello\u200B\u200BWorld\u3164\u3164Test\u2800\u2800Here\u00A0\u00A0End';
        updateStats(outputText.value);
    });

    btnClear.addEventListener('click', function() {
        outputText.value = '';
        statsBar.classList.add('hidden');
        inspectResults.classList.add('hidden');
        successNotification.classList.add('hidden');
        errorNotification.classList.add('hidden');
    });

    // Keyboard shortcut: Ctrl/Cmd+Enter to generate
    document.addEventListener('keydown', function(e) {
        if ((e.ctrlKey || e.metaKey) && e.key === 'Enter') {
            e.preventDefault();
            generate();
        }
    });

    // Initialize table
    buildTable();
})();
</script>
