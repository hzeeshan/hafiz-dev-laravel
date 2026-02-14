<script>
(function() {
    // Translatable strings
    const stringsEl = document.getElementById('tool-strings');
    const S = {
        enter_text: stringsEl?.dataset.enterText || 'Please enter some text to generate slugs',
        nothing_to_copy: stringsEl?.dataset.nothingToCopy || 'Nothing to copy. Generate some slugs first.',
        copied: stringsEl?.dataset.copied || 'Copied!',
        slugs_generated: stringsEl?.dataset.slugsGenerated || '{count} slug(s) generated',
        and_more: stringsEl?.dataset.andMore || '... and {count} more',
        hyphen_recommended: stringsEl?.dataset.hyphenRecommended || 'Hyphen - (recommended)',
        underscore: stringsEl?.dataset.underscore || 'Underscore _',
        dot: stringsEl?.dataset.dot || 'Dot .',
        none_joined: stringsEl?.dataset.noneJoined || 'None (joined)',
        no_limit: stringsEl?.dataset.noLimit || 'No limit',
        characters: stringsEl?.dataset.characters || 'characters',
    };

    // DOM Elements
    const textInput = document.getElementById('text-input');
    const slugOutput = document.getElementById('slug-output');
    const separator = document.getElementById('separator');
    const maxLength = document.getElementById('max-length');
    const transliterate = document.getElementById('transliterate');
    const removeStopwords = document.getElementById('remove-stopwords');
    const btnGenerate = document.getElementById('btn-generate');
    const btnCopy = document.getElementById('btn-copy');
    const btnSample = document.getElementById('btn-sample');
    const btnClear = document.getElementById('btn-clear');
    const statsBar = document.getElementById('stats-bar');
    const statSlugs = document.getElementById('stat-slugs');
    const statCharsSaved = document.getElementById('stat-chars-saved');
    const statAvgLength = document.getElementById('stat-avg-length');
    const statLongest = document.getElementById('stat-longest');
    const urlPreview = document.getElementById('url-preview');
    const urlPreviewList = document.getElementById('url-preview-list');
    const successNotification = document.getElementById('success-notification');
    const successMessage = document.getElementById('success-message');
    const errorNotification = document.getElementById('error-notification');
    const errorMessage = document.getElementById('error-message');

    // Stop words (common English)
    const STOP_WORDS = new Set([
        'a', 'an', 'the', 'and', 'or', 'but', 'in', 'on', 'at', 'to', 'for',
        'of', 'with', 'by', 'from', 'is', 'are', 'was', 'were', 'be', 'been',
        'being', 'have', 'has', 'had', 'do', 'does', 'did', 'will', 'would',
        'could', 'should', 'may', 'might', 'shall', 'can', 'it', 'its',
        'this', 'that', 'these', 'those', 'i', 'you', 'he', 'she', 'we', 'they',
        'me', 'him', 'her', 'us', 'them', 'my', 'your', 'his', 'our', 'their',
        'what', 'which', 'who', 'whom', 'when', 'where', 'why', 'how',
        'not', 'no', 'nor', 'so', 'if', 'then', 'than', 'too', 'very',
        'just', 'about', 'above', 'after', 'again', 'all', 'also', 'any',
        'as', 'because', 'before', 'between', 'both', 'each', 'few',
        'into', 'more', 'most', 'other', 'out', 'over', 'same', 'some',
        'such', 'through', 'under', 'until', 'up', 'while'
    ]);

    // Transliteration map
    const TRANSLITERATION = {
        'À':'A','Á':'A','Â':'A','Ã':'A','Ä':'A','Å':'A','Æ':'AE',
        'Ç':'C','È':'E','É':'E','Ê':'E','Ë':'E','Ì':'I','Í':'I',
        'Î':'I','Ï':'I','Ð':'D','Ñ':'N','Ò':'O','Ó':'O','Ô':'O',
        'Õ':'O','Ö':'O','Ø':'O','Ù':'U','Ú':'U','Û':'U','Ü':'U',
        'Ý':'Y','Þ':'TH','ß':'ss','à':'a','á':'a','â':'a','ã':'a',
        'ä':'a','å':'a','æ':'ae','ç':'c','è':'e','é':'e','ê':'e',
        'ë':'e','ì':'i','í':'i','î':'i','ï':'i','ð':'d','ñ':'n',
        'ò':'o','ó':'o','ô':'o','õ':'o','ö':'o','ø':'o','ù':'u',
        'ú':'u','û':'u','ü':'u','ý':'y','þ':'th','ÿ':'y','Ł':'L',
        'ł':'l','Ń':'N','ń':'n','Ś':'S','ś':'s','Ź':'Z','ź':'z',
        'Ż':'Z','ż':'z','Ă':'A','ă':'a','Đ':'D','đ':'d','Ş':'S',
        'ş':'s','Ţ':'T','ţ':'t','ŉ':'n','Ő':'O','ő':'o','Ű':'U',
        'ű':'u','Č':'C','č':'c','Ď':'D','ď':'d','Ě':'E','ě':'e',
        'Ň':'N','ň':'n','Ř':'R','ř':'r','Š':'S','š':'s','Ť':'T',
        'ť':'t','Ů':'U','ů':'u','Ž':'Z','ž':'z','ƒ':'f','Ơ':'O',
        'ơ':'o','Ư':'U','ư':'u','ĩ':'i','ũ':'u'
    };

    const sampleText = `How to Build a REST API with Laravel in 2026
10 Tips für Better SEO — A Beginner's Guide
Café & Restaurant Reviews: Best Spots in München
Ação de Graças: Receitas Tradicionais do Brasil
What's New in TypeScript 5.7? (Features & Updates)`;

    // ===== Slug Generation =====

    function generateSlug(text) {
        let slug = text.trim();
        if (!slug) return '';

        // Transliterate accented characters
        if (transliterate.checked) {
            slug = slug.split('').map(c => TRANSLITERATION[c] || c).join('');
        }

        // Lowercase
        slug = slug.toLowerCase();

        // Remove stop words
        if (removeStopwords.checked) {
            const sep = separator.value || ' ';
            const words = slug.split(/\s+/).filter(w => !STOP_WORDS.has(w) && w.length > 0);
            slug = words.join(' ');
        }

        // Replace special chars and spaces with separator
        const sep = separator.value;
        slug = slug
            .replace(/[&]/g, sep ? sep + 'and' + sep : 'and')
            .replace(/[^\w\s-]/g, '')      // Remove non-word chars (except spaces and hyphens)
            .replace(/[\s_-]+/g, sep)        // Replace spaces/underscores/hyphens with separator
            .replace(new RegExp('\\' + (sep || '-') + '+', 'g'), sep) // Collapse multiple separators
            .replace(new RegExp('^\\' + (sep || '-') + '+'), '')       // Trim from start
            .replace(new RegExp('\\' + (sep || '-') + '+$'), '');      // Trim from end

        // Apply max length (cut at word boundary)
        const limit = parseInt(maxLength.value);
        if (limit > 0 && slug.length > limit) {
            slug = slug.substring(0, limit);
            // Don't cut mid-word — trim to last separator
            if (sep) {
                const lastSep = slug.lastIndexOf(sep);
                if (lastSep > 0) {
                    slug = slug.substring(0, lastSep);
                }
            }
        }

        return slug;
    }

    function generate() {
        const input = textInput.value.trim();
        if (!input) {
            showError(S.enter_text);
            return;
        }

        const lines = input.split('\n').filter(l => l.trim());
        const slugs = lines.map(line => generateSlug(line));
        const validSlugs = slugs.filter(s => s.length > 0);

        slugOutput.value = slugs.join('\n');

        // Stats
        const totalInputChars = lines.reduce((sum, l) => sum + l.length, 0);
        const totalSlugChars = validSlugs.reduce((sum, s) => sum + s.length, 0);
        const avgLength = validSlugs.length > 0 ? Math.round(totalSlugChars / validSlugs.length) : 0;
        const longest = validSlugs.length > 0 ? Math.max(...validSlugs.map(s => s.length)) : 0;

        statSlugs.textContent = validSlugs.length;
        statCharsSaved.textContent = totalInputChars - totalSlugChars;
        statAvgLength.textContent = avgLength;
        statLongest.textContent = longest;
        statsBar.classList.remove('hidden');

        // URL Preview (show first 5)
        const previewSlugs = validSlugs.slice(0, 5);
        urlPreviewList.innerHTML = previewSlugs.map(s =>
            `<div class="text-light-muted truncate">
                <span class="text-light-muted/50">https://example.com/</span><span class="text-gold">${escapeHtml(s)}</span>
            </div>`
        ).join('');
        if (validSlugs.length > 5) {
            urlPreviewList.innerHTML += `<div class="text-light-muted/50 text-xs">${S.and_more.replace('{count}', validSlugs.length - 5)}</div>`;
        }
        urlPreview.classList.remove('hidden');

        showSuccess(S.slugs_generated.replace('{count}', validSlugs.length));
    }

    function escapeHtml(str) {
        const div = document.createElement('div');
        div.textContent = str;
        return div.innerHTML;
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

    function copyOutput() {
        const output = slugOutput.value;
        if (!output) { showError(S.nothing_to_copy); return; }
        navigator.clipboard.writeText(output).then(() => {
            const originalHTML = btnCopy.innerHTML;
            btnCopy.innerHTML = '<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> ' + S.copied;
            btnCopy.classList.add('text-green-400', 'border-green-400');
            setTimeout(() => { btnCopy.innerHTML = originalHTML; btnCopy.classList.remove('text-green-400', 'border-green-400'); }, 2000);
        });
    }

    function loadSample() {
        textInput.value = sampleText;
        slugOutput.value = '';
        statsBar.classList.add('hidden');
        urlPreview.classList.add('hidden');
    }

    function clearAll() {
        textInput.value = '';
        slugOutput.value = '';
        statsBar.classList.add('hidden');
        urlPreview.classList.add('hidden');
        successNotification.classList.add('hidden');
        errorNotification.classList.add('hidden');
    }

    // Real-time generation on typing
    let debounceTimer;
    textInput.addEventListener('input', function() {
        clearTimeout(debounceTimer);
        debounceTimer = setTimeout(() => {
            if (textInput.value.trim()) generate();
        }, 300);
    });

    // Option changes trigger re-generation
    [separator, maxLength, transliterate, removeStopwords].forEach(el => {
        el.addEventListener('change', () => { if (textInput.value.trim()) generate(); });
    });

    // ===== Event Listeners =====
    btnGenerate.addEventListener('click', generate);
    btnCopy.addEventListener('click', copyOutput);
    btnSample.addEventListener('click', loadSample);
    btnClear.addEventListener('click', clearAll);

    document.addEventListener('keydown', function(e) {
        if ((e.ctrlKey || e.metaKey) && e.key === 'Enter') { e.preventDefault(); generate(); }
    });
})();
</script>
