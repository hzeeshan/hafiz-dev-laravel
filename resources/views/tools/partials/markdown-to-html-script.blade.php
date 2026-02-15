@push('styles')
<style>
    .prose h1 { font-size: 1.75em; font-weight: bold; margin: 0.5em 0; color: #1a1a1a; border-bottom: 1px solid #e5e7eb; padding-bottom: 0.3em; }
    .prose h2 { font-size: 1.4em; font-weight: bold; margin: 0.5em 0; color: #1a1a1a; border-bottom: 1px solid #e5e7eb; padding-bottom: 0.3em; }
    .prose h3 { font-size: 1.2em; font-weight: bold; margin: 0.5em 0; color: #1a1a1a; }
    .prose h4, .prose h5, .prose h6 { font-size: 1em; font-weight: bold; margin: 0.5em 0; color: #1a1a1a; }
    .prose p { margin: 0.5em 0; line-height: 1.7; }
    .prose a { color: #2563eb; text-decoration: underline; }
    .prose strong { font-weight: bold; }
    .prose em { font-style: italic; }
    .prose del { text-decoration: line-through; color: #888; }
    .prose ul { list-style: disc; padding-left: 1.5em; margin: 0.5em 0; }
    .prose ol { list-style: decimal; padding-left: 1.5em; margin: 0.5em 0; }
    .prose li { margin: 0.25em 0; }
    .prose blockquote { border-left: 4px solid #d1d5db; padding-left: 1em; margin: 0.5em 0; color: #555; font-style: italic; }
    .prose code { background: #f3f4f6; padding: 0.15em 0.4em; border-radius: 3px; font-size: 0.9em; font-family: monospace; }
    .prose pre { background: #1e293b; color: #e2e8f0; padding: 1em; border-radius: 6px; overflow-x: auto; margin: 0.5em 0; }
    .prose pre code { background: none; padding: 0; color: inherit; }
    .prose table { border-collapse: collapse; width: 100%; margin: 0.5em 0; }
    .prose th, .prose td { border: 1px solid #d1d5db; padding: 0.5em 0.75em; text-align: left; }
    .prose th { background: #f3f4f6; font-weight: bold; }
    .prose hr { border: none; border-top: 2px solid #e5e7eb; margin: 1em 0; }
    .prose img { max-width: 100%; border-radius: 4px; }
    .prose input[type="checkbox"] { margin-right: 0.4em; }
</style>
@endpush

@push('scripts')
<script>
(function() {
    const stringsEl = document.getElementById('tool-strings');
    const S = {
        input_placeholder: stringsEl?.dataset.inputPlaceholder || 'Type or paste Markdown here...',
        preview_placeholder: stringsEl?.dataset.previewPlaceholder || 'Start typing Markdown to see the preview...',
        copied: stringsEl?.dataset.copied || 'Copied!',
        downloaded: stringsEl?.dataset.downloaded || 'HTML file downloaded',
        file_loaded: stringsEl?.dataset.fileLoaded || 'File loaded: ',
    };

    const mdInput = document.getElementById('md-input');
    const htmlPreview = document.getElementById('html-preview');
    const htmlSource = document.getElementById('html-source');
    const fileUpload = document.getElementById('file-upload');
    const btnViewPreview = document.getElementById('btn-view-preview');
    const btnViewSource = document.getElementById('btn-view-source');
    const btnCopy = document.getElementById('btn-copy');
    const btnDownload = document.getElementById('btn-download');
    const btnSample = document.getElementById('btn-sample');
    const btnClear = document.getElementById('btn-clear');
    const statsBar = document.getElementById('stats-bar');
    const successNotification = document.getElementById('success-notification');
    const successMessage = document.getElementById('success-message');

    const sampleMD = `# Markdown to HTML Demo

## Text Formatting

This is a paragraph with **bold text**, *italic text*, and ~~strikethrough~~. You can also use \`inline code\` for technical terms.

## Lists

### Unordered List
- First item
- Second item
  - Nested item
  - Another nested
- Third item

### Ordered List
1. Step one
2. Step two
3. Step three

### Task List
- [x] Write documentation
- [x] Push to GitHub
- [ ] Deploy to production

## Links & Images

Visit [hafiz.dev](https://hafiz.dev) for more tools.

![Alt text](https://via.placeholder.com/300x100?text=Sample+Image)

## Code Block

\`\`\`javascript
function greet(name) {
    return \`Hello, \${name}!\`;
}

console.log(greet("World"));
\`\`\`

## Blockquote

> "Any fool can write code that a computer can understand.
> Good programmers write code that humans can understand."
> — Martin Fowler

## Table

| Feature | Status | Priority |
|---------|--------|----------|
| Auth    | Done   | High     |
| API     | WIP    | High     |
| Tests   | Todo   | Medium   |

---

*Generated with [hafiz.dev/tools/markdown-to-html](https://hafiz.dev/tools/markdown-to-html)*`;

    // Lightweight Markdown parser
    function parseMarkdown(md) {
        let html = md;

        // Fenced code blocks (must come first)
        html = html.replace(/```(\w*)\n([\s\S]*?)```/g, function(m, lang, code) {
            const escaped = code.replace(/&/g,'&amp;').replace(/</g,'&lt;').replace(/>/g,'&gt;').trimEnd();
            return '<pre><code' + (lang ? ' class="language-' + lang + '"' : '') + '>' + escaped + '</code></pre>';
        });

        // Split by pre blocks to avoid processing code contents
        const parts = html.split(/(<pre>[\s\S]*?<\/pre>)/);
        html = parts.map((part, i) => {
            if (i % 2 === 1) return part; // pre block, skip

            let t = part;

            // Headings
            t = t.replace(/^######\s+(.+)$/gm, '<h6>$1</h6>');
            t = t.replace(/^#####\s+(.+)$/gm, '<h5>$1</h5>');
            t = t.replace(/^####\s+(.+)$/gm, '<h4>$1</h4>');
            t = t.replace(/^###\s+(.+)$/gm, '<h3>$1</h3>');
            t = t.replace(/^##\s+(.+)$/gm, '<h2>$1</h2>');
            t = t.replace(/^#\s+(.+)$/gm, '<h1>$1</h1>');

            // Horizontal rules
            t = t.replace(/^(?:---|\*\*\*|___)\s*$/gm, '<hr>');

            // Blockquotes
            t = t.replace(/^(?:>\s?(.*)(?:\n|$))+/gm, function(match) {
                const content = match.replace(/^>\s?/gm, '').trim();
                return '<blockquote><p>' + content.replace(/\n/g, '<br>') + '</p></blockquote>';
            });

            // Tables
            t = t.replace(/^\|(.+)\|\s*\n\|[\s\-:|]+\|\s*\n((?:\|.+\|\s*\n?)*)/gm, function(m, header, body) {
                const ths = header.split('|').map(c => c.trim()).filter(Boolean);
                let table = '<table><thead><tr>' + ths.map(h => '<th>' + h + '</th>').join('') + '</tr></thead><tbody>';
                const rows = body.trim().split('\n');
                rows.forEach(row => {
                    const cells = row.split('|').map(c => c.trim()).filter(Boolean);
                    table += '<tr>' + cells.map(c => '<td>' + c + '</td>').join('') + '</tr>';
                });
                table += '</tbody></table>';
                return table;
            });

            // Task lists
            t = t.replace(/^- \[x\]\s+(.+)$/gm, '<li class="task"><input type="checkbox" checked disabled> $1</li>');
            t = t.replace(/^- \[ \]\s+(.+)$/gm, '<li class="task"><input type="checkbox" disabled> $1</li>');

            // Unordered lists
            t = t.replace(/^(?:[-*+]\s+.+\n?)+/gm, function(match) {
                if (match.includes('class="task"')) {
                    return '<ul style="list-style:none;padding-left:0.5em;">' + match.trim() + '</ul>';
                }
                const items = match.trim().split('\n').map(line => {
                    const m = line.match(/^\s*([-*+])\s+(.+)/);
                    return m ? '<li>' + m[2] + '</li>' : '';
                }).join('');
                return '<ul>' + items + '</ul>';
            });

            // Ordered lists
            t = t.replace(/^(?:\d+\.\s+.+\n?)+/gm, function(match) {
                const items = match.trim().split('\n').map(line => {
                    const m = line.match(/^\d+\.\s+(.+)/);
                    return m ? '<li>' + m[1] + '</li>' : '';
                }).join('');
                return '<ol>' + items + '</ol>';
            });

            // Images
            t = t.replace(/!\[([^\]]*)\]\(([^)]+)\)/g, '<img src="$2" alt="$1">');

            // Links
            t = t.replace(/\[([^\]]+)\]\(([^)]+)\)/g, '<a href="$2">$1</a>');

            // Bold + italic
            t = t.replace(/\*\*\*(.+?)\*\*\*/g, '<strong><em>$1</em></strong>');
            t = t.replace(/\*\*(.+?)\*\*/g, '<strong>$1</strong>');
            t = t.replace(/\*(.+?)\*/g, '<em>$1</em>');
            t = t.replace(/~~(.+?)~~/g, '<del>$1</del>');

            // Inline code
            t = t.replace(/`([^`]+)`/g, '<code>$1</code>');

            // Paragraphs — wrap loose text lines
            t = t.replace(/^(?!<[a-z/])((?!<).+)$/gm, '<p>$1</p>');

            // Clean up empty paragraphs
            t = t.replace(/<p>\s*<\/p>/g, '');

            return t;
        }).join('');

        return html.trim();
    }

    function convert() {
        const input = mdInput.value;
        if (!input.trim()) {
            htmlPreview.innerHTML = '<p style="color:#999;font-style:italic;">' + S.preview_placeholder + '</p>';
            htmlSource.value = '';
            statsBar.classList.add('hidden');
            return;
        }

        const html = parseMarkdown(input);
        htmlPreview.innerHTML = html;
        htmlSource.value = html;

        // Stats
        const tempDiv = document.createElement('div');
        tempDiv.innerHTML = html;
        const elements = tempDiv.querySelectorAll('*').length;
        const headings = tempDiv.querySelectorAll('h1,h2,h3,h4,h5,h6').length;
        const links = tempDiv.querySelectorAll('a').length;
        const size = new Blob([html]).size;

        document.getElementById('stat-elements').textContent = elements;
        document.getElementById('stat-headings').textContent = headings;
        document.getElementById('stat-links').textContent = links;
        document.getElementById('stat-size').textContent = size > 1024 ? (size / 1024).toFixed(1) + ' KB' : size + ' B';
        statsBar.classList.remove('hidden');
    }

    function showSuccess(msg) {
        successMessage.textContent = msg;
        successNotification.classList.remove('hidden');
        setTimeout(() => successNotification.classList.add('hidden'), 3000);
    }

    // Toggle preview/source
    btnViewPreview.addEventListener('click', function() {
        htmlPreview.style.display = 'block';
        htmlSource.style.display = 'none';
        this.classList.add('bg-gold/20', 'text-gold');
        this.classList.remove('text-light-muted');
        btnViewSource.classList.remove('bg-gold/20', 'text-gold');
        btnViewSource.classList.add('text-light-muted');
    });
    btnViewSource.addEventListener('click', function() {
        htmlPreview.style.display = 'none';
        htmlSource.style.display = 'block';
        this.classList.add('bg-gold/20', 'text-gold');
        this.classList.remove('text-light-muted');
        btnViewPreview.classList.remove('bg-gold/20', 'text-gold');
        btnViewPreview.classList.add('text-light-muted');
    });

    // Buttons
    btnCopy.addEventListener('click', function() {
        const output = htmlSource.value || parseMarkdown(mdInput.value);
        if (!output) return;
        navigator.clipboard.writeText(output).then(() => {
            const orig = this.innerHTML;
            this.innerHTML = '<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> ' + S.copied;
            this.classList.add('bg-green-600');
            setTimeout(() => { this.innerHTML = orig; this.classList.remove('bg-green-600'); }, 2000);
        });
    });

    btnDownload.addEventListener('click', function() {
        const output = htmlSource.value;
        if (!output) return;
        const blob = new Blob([output], { type: 'text/html;charset=utf-8' });
        const url = URL.createObjectURL(blob);
        const a = document.createElement('a');
        a.href = url; a.download = 'converted.html';
        document.body.appendChild(a); a.click();
        document.body.removeChild(a); URL.revokeObjectURL(url);
        showSuccess(S.downloaded);
    });

    btnSample.addEventListener('click', function() {
        mdInput.value = sampleMD;
        convert();
    });

    btnClear.addEventListener('click', function() {
        mdInput.value = '';
        htmlPreview.innerHTML = '<p style="color:#999;font-style:italic;">' + S.preview_placeholder + '</p>';
        htmlSource.value = '';
        statsBar.classList.add('hidden');
    });

    fileUpload.addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (!file) return;
        const reader = new FileReader();
        reader.onload = function(evt) { mdInput.value = evt.target.result; convert(); showSuccess(S.file_loaded + file.name); };
        reader.readAsText(file);
        this.value = '';
    });

    // Real-time
    let timer;
    mdInput.addEventListener('input', function() {
        clearTimeout(timer);
        timer = setTimeout(convert, 300);
    });

    document.addEventListener('keydown', function(e) {
        if ((e.ctrlKey || e.metaKey) && e.key === 'Enter') { e.preventDefault(); convert(); }
    });
})();
</script>
@endpush
