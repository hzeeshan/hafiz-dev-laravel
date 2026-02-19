{{-- Highlight.js for syntax highlighting - MUST load first --}}
<script src="https://cdn.jsdelivr.net/npm/highlight.js@11.9.0/lib/highlight.min.js"></script>
{{-- Marked.js for Markdown parsing --}}
<script src="https://cdn.jsdelivr.net/npm/marked@12.0.0/marked.min.js"></script>

<script>
(function() {
    // Translatable strings (from #tool-strings data attributes, with English defaults)
    const toolStrings = document.getElementById('tool-strings');
    const ds = toolStrings ? toolStrings.dataset : {};

    const STRINGS = {
        previewPlaceholder: ds.previewPlaceholder || 'Preview will appear here as you type...',
        errorRendering: ds.errorRendering || 'Error rendering Markdown:',
        copiedMd: ds.copiedMd || 'Markdown copied to clipboard!',
        copiedHtml: ds.copiedHtml || 'HTML copied to clipboard!',
        copyFail: ds.copyFail || 'Failed to copy to clipboard.',
        nothingToCopy: ds.nothingToCopy || 'Nothing to copy. Write some Markdown first.',
        nothingToDownload: ds.nothingToDownload || 'Nothing to download. Write some Markdown first.',
        downloaded: ds.downloaded || 'Markdown file downloaded!',
        focus: ds.focus || 'Focus',
        exitFocus: ds.exitFocus || 'Exit',
        escToExit: ds.escToExit || 'Esc to exit',
    };

    // DOM Elements
    const markdownInput = document.getElementById('markdown-input');
    const markdownPreview = document.getElementById('markdown-preview');
    const wordCount = document.getElementById('word-count');
    const charCount = document.getElementById('char-count');
    const lineCount = document.getElementById('line-count');
    const btnCopyMd = document.getElementById('btn-copy-md');
    const btnCopyHtml = document.getElementById('btn-copy-html');
    const btnDownload = document.getElementById('btn-download');
    const btnClear = document.getElementById('btn-clear');
    const successNotification = document.getElementById('success-notification');
    const successMessage = document.getElementById('success-message');
    const errorNotification = document.getElementById('error-notification');
    const errorMessage = document.getElementById('error-message');

    // Toolbar buttons
    const btnBold = document.getElementById('btn-bold');
    const btnItalic = document.getElementById('btn-italic');
    const btnStrikethrough = document.getElementById('btn-strikethrough');
    const btnH1 = document.getElementById('btn-h1');
    const btnH2 = document.getElementById('btn-h2');
    const btnH3 = document.getElementById('btn-h3');
    const btnLink = document.getElementById('btn-link');
    const btnImage = document.getElementById('btn-image');
    const btnCode = document.getElementById('btn-code');
    const btnCodeblock = document.getElementById('btn-codeblock');
    const btnUl = document.getElementById('btn-ul');
    const btnOl = document.getElementById('btn-ol');
    const btnTasklist = document.getElementById('btn-tasklist');
    const btnQuote = document.getElementById('btn-quote');
    const btnHr = document.getElementById('btn-hr');
    const btnTable = document.getElementById('btn-table');

    // Focus Mode elements
    const btnFocus = document.getElementById('btn-focus');
    const focusIconExpand = document.getElementById('focus-icon-expand');
    const focusIconCollapse = document.getElementById('focus-icon-collapse');
    const focusLabel = document.getElementById('focus-label');
    // Find the tool card container: either explicit ID or walk up from editor
    const toolCard = document.getElementById('markdown-tool-card')
        || markdownInput.closest('.bg-gradient-card');

    // Local Storage Key
    const STORAGE_KEY = 'markdownPreviewContent';

    // Configure marked.js
    marked.setOptions({
        gfm: true,
        breaks: true
    });

    // ===== Utility Functions =====

    function showSuccess(message) {
        successMessage.textContent = message;
        successNotification.classList.remove('hidden');
        errorNotification.classList.add('hidden');
        setTimeout(() => successNotification.classList.add('hidden'), 2500);
    }

    function showError(message) {
        errorMessage.textContent = message;
        errorNotification.classList.remove('hidden');
        successNotification.classList.add('hidden');
        setTimeout(() => errorNotification.classList.add('hidden'), 3000);
    }

    function debounce(func, wait) {
        let timeout;
        return function executedFunction(...args) {
            const later = () => {
                clearTimeout(timeout);
                func(...args);
            };
            clearTimeout(timeout);
            timeout = setTimeout(later, wait);
        };
    }

    // ===== Stats =====

    function updateStats() {
        const text = markdownInput.value;
        const words = text.trim() === '' ? 0 : text.trim().split(/\s+/).filter(w => w.length > 0).length;
        const chars = text.length;
        const lines = text === '' ? 0 : text.split('\n').length;

        wordCount.textContent = words.toLocaleString();
        charCount.textContent = chars.toLocaleString();
        lineCount.textContent = lines.toLocaleString();
    }

    // ===== Preview Rendering =====

    function renderPreview() {
        const markdown = markdownInput.value;

        if (!markdown.trim()) {
            markdownPreview.innerHTML = '<p style="color:#8b949e;font-style:italic">' + STRINGS.previewPlaceholder + '</p>';
            return;
        }

        try {
            const html = marked.parse(markdown);
            markdownPreview.innerHTML = html;

            // Apply syntax highlighting to all code blocks
            if (typeof hljs !== 'undefined') {
                markdownPreview.querySelectorAll('pre code').forEach((block) => {
                    hljs.highlightElement(block);
                });
            }
        } catch (error) {
            console.error('Markdown parsing error:', error);
            markdownPreview.innerHTML = '<p class="text-red-400">' + STRINGS.errorRendering + ' ' + error.message + '</p>';
        }
    }

    const debouncedRender = debounce(renderPreview, 150);

    // ===== Local Storage =====

    function saveContent() {
        localStorage.setItem(STORAGE_KEY, markdownInput.value);
    }

    function loadContent() {
        const saved = localStorage.getItem(STORAGE_KEY);
        if (saved) {
            markdownInput.value = saved;
            updateStats();
            renderPreview();
        }
    }

    // ===== Text Manipulation =====

    function wrapSelection(before, after = before) {
        const start = markdownInput.selectionStart;
        const end = markdownInput.selectionEnd;
        const text = markdownInput.value;
        const selectedText = text.substring(start, end);

        const newText = text.substring(0, start) + before + selectedText + after + text.substring(end);
        markdownInput.value = newText;

        // Position cursor
        if (selectedText) {
            markdownInput.setSelectionRange(start + before.length, end + before.length);
        } else {
            markdownInput.setSelectionRange(start + before.length, start + before.length);
        }

        markdownInput.focus();
        markdownInput.dispatchEvent(new Event('input'));
    }

    function insertAtLineStart(prefix) {
        const start = markdownInput.selectionStart;
        const text = markdownInput.value;

        // Find the start of the current line
        let lineStart = start;
        while (lineStart > 0 && text[lineStart - 1] !== '\n') {
            lineStart--;
        }

        const newText = text.substring(0, lineStart) + prefix + text.substring(lineStart);
        markdownInput.value = newText;
        markdownInput.setSelectionRange(start + prefix.length, start + prefix.length);

        markdownInput.focus();
        markdownInput.dispatchEvent(new Event('input'));
    }

    function insertText(text) {
        const start = markdownInput.selectionStart;
        const currentText = markdownInput.value;

        const newText = currentText.substring(0, start) + text + currentText.substring(start);
        markdownInput.value = newText;

        const newCursorPos = start + text.length;
        markdownInput.setSelectionRange(newCursorPos, newCursorPos);

        markdownInput.focus();
        markdownInput.dispatchEvent(new Event('input'));
    }

    // ===== Toolbar Actions =====

    btnBold.addEventListener('click', () => wrapSelection('**'));
    btnItalic.addEventListener('click', () => wrapSelection('*'));
    btnStrikethrough.addEventListener('click', () => wrapSelection('~~'));
    btnH1.addEventListener('click', () => insertAtLineStart('# '));
    btnH2.addEventListener('click', () => insertAtLineStart('## '));
    btnH3.addEventListener('click', () => insertAtLineStart('### '));
    btnLink.addEventListener('click', () => {
        const start = markdownInput.selectionStart;
        const end = markdownInput.selectionEnd;
        const selectedText = markdownInput.value.substring(start, end);

        if (selectedText) {
            wrapSelection('[', '](url)');
        } else {
            insertText('[link text](url)');
        }
    });
    btnImage.addEventListener('click', () => insertText('![alt text](image-url)'));
    btnCode.addEventListener('click', () => wrapSelection('`'));
    btnCodeblock.addEventListener('click', () => {
        const start = markdownInput.selectionStart;
        const end = markdownInput.selectionEnd;
        const selectedText = markdownInput.value.substring(start, end);

        if (selectedText) {
            wrapSelection('\n```\n', '\n```\n');
        } else {
            insertText('\n```javascript\n// code here\n```\n');
        }
    });
    btnUl.addEventListener('click', () => insertAtLineStart('- '));
    btnOl.addEventListener('click', () => insertAtLineStart('1. '));
    btnTasklist.addEventListener('click', () => insertAtLineStart('- [ ] '));
    btnQuote.addEventListener('click', () => insertAtLineStart('> '));
    btnHr.addEventListener('click', () => insertText('\n---\n'));
    btnTable.addEventListener('click', () => {
        const table = `
| Header 1 | Header 2 | Header 3 |
|----------|----------|----------|
| Cell 1   | Cell 2   | Cell 3   |
| Cell 4   | Cell 5   | Cell 6   |
`;
        insertText(table);
    });

    // ===== Action Buttons =====

    btnCopyMd.addEventListener('click', async () => {
        const text = markdownInput.value;
        if (!text) {
            showError(STRINGS.nothingToCopy);
            return;
        }

        try {
            await navigator.clipboard.writeText(text);
            showSuccess(STRINGS.copiedMd);
        } catch (err) {
            showError(STRINGS.copyFail);
        }
    });

    btnCopyHtml.addEventListener('click', async () => {
        const text = markdownInput.value;
        if (!text) {
            showError(STRINGS.nothingToCopy);
            return;
        }

        try {
            const html = marked.parse(text);
            await navigator.clipboard.writeText(html);
            showSuccess(STRINGS.copiedHtml);
        } catch (err) {
            showError(STRINGS.copyFail);
        }
    });

    btnDownload.addEventListener('click', () => {
        const text = markdownInput.value;
        if (!text) {
            showError(STRINGS.nothingToDownload);
            return;
        }

        const blob = new Blob([text], { type: 'text/markdown' });
        const url = URL.createObjectURL(blob);
        const now = new Date();
        const timestamp = now.toISOString().slice(0, 10);
        const a = document.createElement('a');
        a.href = url;
        a.download = `markdown-${timestamp}.md`;
        document.body.appendChild(a);
        a.click();
        document.body.removeChild(a);
        URL.revokeObjectURL(url);
        showSuccess(STRINGS.downloaded);
    });

    btnClear.addEventListener('click', () => {
        markdownInput.value = '';
        localStorage.removeItem(STORAGE_KEY);
        updateStats();
        renderPreview();
    });

    // ===== Keyboard Shortcuts =====

    markdownInput.addEventListener('keydown', function(e) {
        // Ctrl/Cmd + B: Bold
        if ((e.ctrlKey || e.metaKey) && e.key === 'b') {
            e.preventDefault();
            wrapSelection('**');
        }
        // Ctrl/Cmd + I: Italic
        if ((e.ctrlKey || e.metaKey) && e.key === 'i') {
            e.preventDefault();
            wrapSelection('*');
        }
        // Ctrl/Cmd + K: Link
        if ((e.ctrlKey || e.metaKey) && e.key === 'k') {
            e.preventDefault();
            btnLink.click();
        }
        // Tab handling for indentation
        if (e.key === 'Tab') {
            e.preventDefault();
            const start = this.selectionStart;
            const end = this.selectionEnd;
            this.value = this.value.substring(0, start) + '    ' + this.value.substring(end);
            this.selectionStart = this.selectionEnd = start + 4;
            this.dispatchEvent(new Event('input'));
        }
    });

    // ===== Focus Mode =====

    let isFocusMode = false;

    // Find privacy banner inside the tool card (works for both EN and IT templates)
    const privacyBanner = toolCard
        ? (document.getElementById('focus-privacy-banner')
            || toolCard.querySelector('[class*="bg-green"]'))
        : null;

    // Elements to hide in focus mode (navbar, footer, feedback button)
    const siteNav = document.querySelector('nav.fixed');
    const siteFooter = document.querySelector('footer');
    const feedbackBtn = document.getElementById('feedback-btn');
    // The parent wrapper that creates a stacking context (z-10)
    const zParent = toolCard ? toolCard.closest('.relative.z-10') : null;

    function toggleFocusMode() {
        isFocusMode = !isFocusMode;

        if (isFocusMode) {
            // Hide site chrome so focus mode is truly fullscreen
            if (siteNav) siteNav.style.display = 'none';
            if (siteFooter) siteFooter.style.display = 'none';
            if (feedbackBtn) feedbackBtn.style.display = 'none';

            // Fix stacking context: bump parent z-index above everything
            if (zParent) zParent.style.zIndex = '9999';

            // Enter focus mode
            toolCard.classList.add('focus-mode');
            document.body.style.overflow = 'hidden';

            // Hide privacy banner in focus mode
            if (privacyBanner) privacyBanner.style.display = 'none';

            // Update button
            focusIconExpand.classList.add('hidden');
            focusIconCollapse.classList.remove('hidden');
            focusLabel.textContent = STRINGS.exitFocus;
        } else {
            // Exit focus mode
            toolCard.classList.remove('focus-mode');
            document.body.style.overflow = '';

            // Restore site chrome
            if (siteNav) siteNav.style.display = '';
            if (siteFooter) siteFooter.style.display = '';
            if (feedbackBtn) feedbackBtn.style.display = '';

            // Restore parent z-index
            if (zParent) zParent.style.zIndex = '';

            // Show privacy banner again
            if (privacyBanner) privacyBanner.style.display = '';

            // Update button
            focusIconExpand.classList.remove('hidden');
            focusIconCollapse.classList.add('hidden');
            focusLabel.textContent = STRINGS.focus;
        }

        // Re-focus the editor
        markdownInput.focus();
    }

    if (btnFocus) {
        btnFocus.addEventListener('click', toggleFocusMode);
    }

    // Escape key to exit focus mode
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && isFocusMode) {
            e.preventDefault();
            toggleFocusMode();
        }
        // F11 to toggle focus mode (prevent browser fullscreen)
        if (e.key === 'F11') {
            e.preventDefault();
            toggleFocusMode();
        }
    });

    // ===== Event Listeners =====

    markdownInput.addEventListener('input', function() {
        updateStats();
        debouncedRender();
        saveContent();
    });

    // Sync scroll between editor and preview
    markdownInput.addEventListener('scroll', function() {
        const scrollPercentage = this.scrollTop / (this.scrollHeight - this.clientHeight);
        markdownPreview.scrollTop = scrollPercentage * (markdownPreview.scrollHeight - markdownPreview.clientHeight);
    });

    // ===== Initialize =====

    // Load saved content from localStorage
    loadContent();

    // Update UI
    updateStats();
    renderPreview();
})();
</script>