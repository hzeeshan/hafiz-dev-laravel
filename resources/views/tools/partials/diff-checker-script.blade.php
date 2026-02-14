{{-- jsdiff library --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jsdiff/5.2.0/diff.min.js"></script>

<script>
(function() {
    // Translatable strings (from #tool-strings data attributes, with English defaults)
    const stringsEl = document.getElementById('tool-strings');
    const S = {
        compare_by: stringsEl?.dataset.compareBy || 'Compare by:',
        lines: stringsEl?.dataset.lines || 'Lines',
        words: stringsEl?.dataset.words || 'Words',
        characters: stringsEl?.dataset.characters || 'Characters',
        ignore_whitespace: stringsEl?.dataset.ignoreWhitespace || 'Ignore whitespace',
        ignore_case: stringsEl?.dataset.ignoreCase || 'Ignore case',
        show_unchanged: stringsEl?.dataset.showUnchanged || 'Show unchanged',
        compare: stringsEl?.dataset.compare || 'Compare',
        swap: stringsEl?.dataset.swap || 'Swap',
        clear_all: stringsEl?.dataset.clearAll || 'Clear All',
        copy_diff: stringsEl?.dataset.copyDiff || 'Copy Diff',
        sample: stringsEl?.dataset.sample || 'Sample',
        view: stringsEl?.dataset.view || 'View:',
        side_by_side: stringsEl?.dataset.sideBySide || 'Side by Side',
        inline: stringsEl?.dataset.inline || 'Inline',
        added: stringsEl?.dataset.added || 'Added:',
        removed: stringsEl?.dataset.removed || 'Removed:',
        unchanged: stringsEl?.dataset.unchanged || 'Unchanged:',
        original: stringsEl?.dataset.original || 'Original',
        modified: stringsEl?.dataset.modified || 'Modified',
        unified_diff: stringsEl?.dataset.unifiedDiff || 'Unified Diff',
        no_content: stringsEl?.dataset.noContent || 'No content',
        no_diff: stringsEl?.dataset.noDiff || 'No differences found! Both texts are identical.',
        copied: stringsEl?.dataset.copied || 'Diff copied to clipboard!',
        original_placeholder: stringsEl?.dataset.originalPlaceholder || 'Paste original text here...',
        modified_placeholder: stringsEl?.dataset.modifiedPlaceholder || 'Paste modified text here...',
    };

    // DOM Elements
    const originalText = document.getElementById('original-text');
    const modifiedText = document.getElementById('modified-text');
    const diffMode = document.getElementById('diff-mode');
    const ignoreWhitespace = document.getElementById('ignore-whitespace');
    const ignoreCase = document.getElementById('ignore-case');
    const showUnchanged = document.getElementById('show-unchanged');
    const btnCompare = document.getElementById('btn-compare');
    const btnSwap = document.getElementById('btn-swap');
    const btnClear = document.getElementById('btn-clear');
    const btnCopyDiff = document.getElementById('btn-copy-diff');
    const btnSample = document.getElementById('btn-sample');
    const btnSideBySide = document.getElementById('btn-side-by-side');
    const btnInline = document.getElementById('btn-inline');
    const viewToggleSection = document.getElementById('view-toggle-section');
    const diffOutput = document.getElementById('diff-output');
    const diffSideBySide = document.getElementById('diff-side-by-side');
    const diffInlineEl = document.getElementById('diff-inline');
    const diffLeft = document.getElementById('diff-left');
    const diffRight = document.getElementById('diff-right');
    const diffUnified = document.getElementById('diff-unified');
    const statsBar = document.getElementById('stats-bar');
    const statAdded = document.getElementById('stat-added');
    const statRemoved = document.getElementById('stat-removed');
    const statUnchanged = document.getElementById('stat-unchanged');
    const noDiffMessage = document.getElementById('no-diff-message');
    const successNotification = document.getElementById('success-notification');
    const successMessage = document.getElementById('success-message');

    let viewMode = 'side-by-side';
    let lastDiff = null;

    // ===== Utility Functions =====

    function escapeHtml(text) {
        const div = document.createElement('div');
        div.textContent = text;
        return div.innerHTML;
    }

    function showSuccess(message) {
        successMessage.textContent = message;
        successNotification.classList.remove('hidden');
        setTimeout(() => successNotification.classList.add('hidden'), 2500);
    }

    // Always normalize trailing whitespace and line endings to prevent false diffs
    function normalizeText(text) {
        return text
            .replace(/\r\n/g, '\n')        // Normalize CRLF to LF
            .replace(/\r/g, '\n')           // Normalize CR to LF
            .split('\n')
            .map(line => line.trimEnd())     // Remove trailing spaces/tabs from each line
            .join('\n')
            .replace(/\n+$/, '')             // Remove trailing newlines
            + '\n';                          // Add exactly one trailing newline
    }

    function applyIgnoreWhitespace(text) {
        return text
            .split('\n')
            .map(line => line.trim().replace(/\s+/g, ' '))
            .join('\n');
    }

    // ===== Core Comparison =====

    function compare() {
        let original = originalText.value;
        let modified = modifiedText.value;

        if (!original && !modified) {
            diffOutput.classList.add('hidden');
            viewToggleSection.classList.add('hidden');
            statsBar.classList.add('hidden');
            noDiffMessage.classList.add('hidden');
            return;
        }

        // Always normalize trailing newlines/whitespace to prevent false positives
        let compareOriginal = normalizeText(original);
        let compareModified = normalizeText(modified);

        // Apply options
        if (ignoreWhitespace.checked) {
            compareOriginal = applyIgnoreWhitespace(compareOriginal);
            compareModified = applyIgnoreWhitespace(compareModified);
        }
        if (ignoreCase.checked) {
            compareOriginal = compareOriginal.toLowerCase();
            compareModified = compareModified.toLowerCase();
        }

        // Get diff based on mode
        let diff;
        const mode = diffMode.value;
        switch (mode) {
            case 'lines':
                diff = Diff.diffLines(compareOriginal, compareModified);
                break;
            case 'words':
                diff = Diff.diffWords(compareOriginal, compareModified);
                break;
            case 'characters':
                diff = Diff.diffChars(compareOriginal, compareModified);
                break;
        }

        lastDiff = diff;

        // Check if identical
        const hasChanges = diff.some(part => part.added || part.removed);
        if (!hasChanges) {
            diffOutput.classList.add('hidden');
            viewToggleSection.classList.add('hidden');
            noDiffMessage.classList.remove('hidden');
            statsBar.classList.remove('hidden');
            updateStats(diff);
            return;
        }

        noDiffMessage.classList.add('hidden');
        diffOutput.classList.remove('hidden');
        viewToggleSection.classList.remove('hidden');
        statsBar.classList.remove('hidden');

        // Render based on view mode
        if (viewMode === 'side-by-side') {
            renderSideBySide(diff);
        } else {
            renderInline(diff);
        }

        updateStats(diff);
    }

    // ===== Side by Side Rendering =====

    function renderSideBySide(diff) {
        const mode = diffMode.value;

        if (mode === 'lines') {
            renderSideBySideLines(diff);
        } else {
            renderSideBySideWordsOrChars(diff);
        }
    }

    function renderSideBySideLines(diff) {
        let leftHtml = '';
        let rightHtml = '';
        let leftLineNum = 1;
        let rightLineNum = 1;
        const showUnchangedLines = showUnchanged.checked;

        for (let i = 0; i < diff.length; i++) {
            const part = diff[i];
            const lines = part.value.replace(/\n$/, '').split('\n');

            if (part.added) {
                for (const line of lines) {
                    leftHtml += buildDiffLine('', '', 'diff-empty');
                    rightHtml += buildDiffLine(rightLineNum, '+ ' + escapeHtml(line), 'diff-added');
                    rightLineNum++;
                }
            } else if (part.removed) {
                for (const line of lines) {
                    leftHtml += buildDiffLine(leftLineNum, '- ' + escapeHtml(line), 'diff-removed');
                    rightHtml += buildDiffLine('', '', 'diff-empty');
                    leftLineNum++;
                }
            } else {
                for (const line of lines) {
                    if (showUnchangedLines) {
                        leftHtml += buildDiffLine(leftLineNum, '  ' + escapeHtml(line), 'diff-unchanged');
                        rightHtml += buildDiffLine(rightLineNum, '  ' + escapeHtml(line), 'diff-unchanged');
                    }
                    leftLineNum++;
                    rightLineNum++;
                }
            }
        }

        diffLeft.innerHTML = leftHtml || '<div class="p-4 text-light-muted text-sm">' + S.no_content + '</div>';
        diffRight.innerHTML = rightHtml || '<div class="p-4 text-light-muted text-sm">' + S.no_content + '</div>';
        syncScroll();
    }

    function renderSideBySideWordsOrChars(diff) {
        // For word/char diffs, build a single output that shows changes inline
        let leftParts = [];
        let rightParts = [];

        for (const part of diff) {
            if (part.added) {
                rightParts.push('<span class="diff-word-added">' + escapeHtml(part.value) + '</span>');
            } else if (part.removed) {
                leftParts.push('<span class="diff-word-removed">' + escapeHtml(part.value) + '</span>');
            } else {
                leftParts.push(escapeHtml(part.value));
                rightParts.push(escapeHtml(part.value));
            }
        }

        // Split into lines for display with line numbers
        const leftText = leftParts.join('');
        const rightText = rightParts.join('');

        diffLeft.innerHTML = buildWordDiffPanel(leftText);
        diffRight.innerHTML = buildWordDiffPanel(rightText);
        syncScroll();
    }

    function buildWordDiffPanel(html) {
        // Split by newlines while preserving HTML tags
        const lines = html.split('\n');
        let result = '';
        for (let i = 0; i < lines.length; i++) {
            const hasAdded = lines[i].includes('diff-word-added');
            const hasRemoved = lines[i].includes('diff-word-removed');
            let lineClass = 'diff-line';
            if (hasRemoved) lineClass += ' diff-removed';
            else if (hasAdded) lineClass += ' diff-added';

            result += '<div class="' + lineClass + '">';
            result += '<span class="diff-line-number">' + (i + 1) + '</span>';
            result += '<span class="diff-line-content">' + (lines[i] || ' ') + '</span>';
            result += '</div>';
        }
        return result;
    }

    // ===== Inline Rendering =====

    function renderInline(diff) {
        const mode = diffMode.value;
        let html = '';

        if (mode === 'lines') {
            html = renderInlineLines(diff);
        } else {
            html = renderInlineWordsOrChars(diff);
        }

        diffUnified.innerHTML = html || '<div class="p-4 text-light-muted text-sm">' + S.no_content + '</div>';
    }

    function renderInlineLines(diff) {
        let html = '';
        let lineNum = 1;
        const showUnchangedLines = showUnchanged.checked;

        for (const part of diff) {
            const lines = part.value.replace(/\n$/, '').split('\n');

            if (part.added) {
                for (const line of lines) {
                    html += buildDiffLine(lineNum, '+ ' + escapeHtml(line), 'diff-inline-added');
                    lineNum++;
                }
            } else if (part.removed) {
                for (const line of lines) {
                    html += buildDiffLine(lineNum, '- ' + escapeHtml(line), 'diff-inline-removed');
                    lineNum++;
                }
            } else {
                for (const line of lines) {
                    if (showUnchangedLines) {
                        html += buildDiffLine(lineNum, '  ' + escapeHtml(line), 'diff-unchanged');
                    }
                    lineNum++;
                }
            }
        }

        return html;
    }

    function renderInlineWordsOrChars(diff) {
        let parts = [];

        for (const part of diff) {
            if (part.added) {
                parts.push('<span class="diff-word-added">' + escapeHtml(part.value) + '</span>');
            } else if (part.removed) {
                parts.push('<span class="diff-word-removed">' + escapeHtml(part.value) + '</span>');
            } else {
                parts.push(escapeHtml(part.value));
            }
        }

        const combined = parts.join('');
        const lines = combined.split('\n');
        let html = '';

        for (let i = 0; i < lines.length; i++) {
            const hasAdded = lines[i].includes('diff-word-added');
            const hasRemoved = lines[i].includes('diff-word-removed');
            let lineClass = 'diff-line';
            if (hasRemoved && hasAdded) lineClass += '';
            else if (hasRemoved) lineClass += ' diff-inline-removed';
            else if (hasAdded) lineClass += ' diff-inline-added';

            html += '<div class="' + lineClass + '">';
            html += '<span class="diff-line-number">' + (i + 1) + '</span>';
            html += '<span class="diff-line-content">' + (lines[i] || ' ') + '</span>';
            html += '</div>';
        }

        return html;
    }

    // ===== Helper Functions =====

    function buildDiffLine(lineNum, content, className) {
        return '<div class="diff-line ' + className + '">' +
            '<span class="diff-line-number">' + lineNum + '</span>' +
            '<span class="diff-line-content">' + content + '</span>' +
            '</div>';
    }

    function syncScroll() {
        // Sync scrolling between left and right panels
        const leftPanel = diffLeft;
        const rightPanel = diffRight;

        // Remove old listeners
        leftPanel.onscroll = null;
        rightPanel.onscroll = null;

        let isSyncing = false;

        leftPanel.onscroll = function() {
            if (isSyncing) return;
            isSyncing = true;
            rightPanel.scrollTop = leftPanel.scrollTop;
            isSyncing = false;
        };

        rightPanel.onscroll = function() {
            if (isSyncing) return;
            isSyncing = true;
            leftPanel.scrollTop = rightPanel.scrollTop;
            isSyncing = false;
        };
    }

    function updateStats(diff) {
        let added = 0, removed = 0, unchanged = 0;
        const mode = diffMode.value;

        for (const part of diff) {
            let count;
            if (mode === 'lines') {
                count = part.value.replace(/\n$/, '').split('\n').length;
            } else if (mode === 'words') {
                count = part.value.split(/\s+/).filter(w => w.length > 0).length;
            } else {
                count = part.value.length;
            }

            if (part.added) added += count;
            else if (part.removed) removed += count;
            else unchanged += count;
        }

        statAdded.textContent = added;
        statRemoved.textContent = removed;
        statUnchanged.textContent = unchanged;
    }

    // ===== View Mode Switching =====

    function setViewMode(mode) {
        viewMode = mode;

        if (mode === 'side-by-side') {
            btnSideBySide.classList.add('bg-gold/20', 'text-gold', 'font-medium');
            btnSideBySide.classList.remove('text-light-muted');
            btnInline.classList.remove('bg-gold/20', 'text-gold', 'font-medium');
            btnInline.classList.add('text-light-muted');
            diffSideBySide.classList.remove('hidden');
            diffInlineEl.classList.add('hidden');
        } else {
            btnInline.classList.add('bg-gold/20', 'text-gold', 'font-medium');
            btnInline.classList.remove('text-light-muted');
            btnSideBySide.classList.remove('bg-gold/20', 'text-gold', 'font-medium');
            btnSideBySide.classList.add('text-light-muted');
            diffInlineEl.classList.remove('hidden');
            diffSideBySide.classList.add('hidden');
        }

        // Re-render if we have a diff
        if (lastDiff) {
            if (mode === 'side-by-side') {
                renderSideBySide(lastDiff);
            } else {
                renderInline(lastDiff);
            }
        }
    }

    // ===== Action Functions =====

    function swap() {
        const temp = originalText.value;
        originalText.value = modifiedText.value;
        modifiedText.value = temp;
        if (lastDiff) compare();
    }

    function clearAll() {
        originalText.value = '';
        modifiedText.value = '';
        diffOutput.classList.add('hidden');
        viewToggleSection.classList.add('hidden');
        statsBar.classList.add('hidden');
        noDiffMessage.classList.add('hidden');
        lastDiff = null;
        diffLeft.innerHTML = '';
        diffRight.innerHTML = '';
        diffUnified.innerHTML = '';
    }

    function copyDiff() {
        if (!lastDiff) {
            return;
        }

        let text = '';
        const mode = diffMode.value;

        if (mode === 'lines') {
            for (const part of lastDiff) {
                const lines = part.value.replace(/\n$/, '').split('\n');
                for (const line of lines) {
                    if (part.added) text += '+ ' + line + '\n';
                    else if (part.removed) text += '- ' + line + '\n';
                    else text += '  ' + line + '\n';
                }
            }
        } else {
            for (const part of lastDiff) {
                if (part.added) text += '[+' + part.value + ']';
                else if (part.removed) text += '[-' + part.value + ']';
                else text += part.value;
            }
        }

        navigator.clipboard.writeText(text).then(() => {
            const originalHtml = btnCopyDiff.innerHTML;
            btnCopyDiff.innerHTML = '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> ' + S.copied;
            btnCopyDiff.classList.add('text-green-400', 'border-green-400');
            setTimeout(() => {
                btnCopyDiff.innerHTML = originalHtml;
                btnCopyDiff.classList.remove('text-green-400', 'border-green-400');
            }, 2000);
        });
    }

    function loadSample() {
        originalText.value = 'function greet(name) {\n    console.log("Hello, " + name);\n    return true;\n}\n\nconst result = greet("World");';
        modifiedText.value = 'function greet(name, greeting = "Hello") {\n    console.log(greeting + ", " + name + "!");\n    return { success: true };\n}\n\nconst result = greet("World", "Hi");\nconsole.log(result);';
        compare();
    }

    // ===== Event Listeners =====

    btnCompare.addEventListener('click', compare);
    btnSwap.addEventListener('click', swap);
    btnClear.addEventListener('click', clearAll);
    btnCopyDiff.addEventListener('click', copyDiff);
    btnSample.addEventListener('click', loadSample);
    btnSideBySide.addEventListener('click', () => setViewMode('side-by-side'));
    btnInline.addEventListener('click', () => setViewMode('inline'));

    // Re-compare when options change
    diffMode.addEventListener('change', () => { if (lastDiff) compare(); });
    ignoreWhitespace.addEventListener('change', () => { if (lastDiff) compare(); });
    ignoreCase.addEventListener('change', () => { if (lastDiff) compare(); });
    showUnchanged.addEventListener('change', () => { if (lastDiff) compare(); });

    // Keyboard shortcut: Ctrl/Cmd + Enter to compare
    document.addEventListener('keydown', function(e) {
        if ((e.ctrlKey || e.metaKey) && e.key === 'Enter') {
            e.preventDefault();
            compare();
        }
    });
})();
</script>
