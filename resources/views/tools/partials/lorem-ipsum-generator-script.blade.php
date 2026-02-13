<script>
(function() {
    // Get translatable strings from data attributes (for Italian/other locales)
    const stringsEl = document.getElementById('tool-strings');
    const S = {
        paragraphs: stringsEl?.dataset.paragraphs || 'Paragraphs',
        sentences: stringsEl?.dataset.sentences || 'Sentences',
        words: stringsEl?.dataset.words || 'Words',
        nothingToCopy: stringsEl?.dataset.nothingToCopy || 'Nothing to copy. Generate some text first.',
        copiedToClipboard: stringsEl?.dataset.copiedToClipboard || 'Copied to clipboard!',
        copyFailed: stringsEl?.dataset.copyFailed || 'Failed to copy to clipboard',
        nothingToDownload: stringsEl?.dataset.nothingToDownload || 'Nothing to download. Generate some text first.',
        downloadedTxt: stringsEl?.dataset.downloadedTxt || 'Downloaded lorem-ipsum.txt!',
        placeholder: stringsEl?.dataset.placeholder || 'Click Generate to create placeholder text...',
    };

    // Lorem Ipsum word bank
    const loremWords = [
        'lorem', 'ipsum', 'dolor', 'sit', 'amet', 'consectetur', 'adipiscing', 'elit',
        'sed', 'do', 'eiusmod', 'tempor', 'incididunt', 'ut', 'labore', 'et', 'dolore',
        'magna', 'aliqua', 'enim', 'ad', 'minim', 'veniam', 'quis', 'nostrud',
        'exercitation', 'ullamco', 'laboris', 'nisi', 'aliquip', 'ex', 'ea', 'commodo',
        'consequat', 'duis', 'aute', 'irure', 'in', 'reprehenderit', 'voluptate',
        'velit', 'esse', 'cillum', 'fugiat', 'nulla', 'pariatur', 'excepteur', 'sint',
        'occaecat', 'cupidatat', 'non', 'proident', 'sunt', 'culpa', 'qui', 'officia',
        'deserunt', 'mollit', 'anim', 'id', 'est', 'laborum', 'perspiciatis', 'unde',
        'omnis', 'iste', 'natus', 'error', 'voluptatem', 'accusantium', 'doloremque',
        'laudantium', 'totam', 'rem', 'aperiam', 'eaque', 'ipsa', 'quae', 'ab', 'illo',
        'inventore', 'veritatis', 'quasi', 'architecto', 'beatae', 'vitae', 'dicta',
        'explicabo', 'nemo', 'ipsam', 'quia', 'voluptas', 'aspernatur', 'aut', 'odit',
        'fugit', 'consequuntur', 'magni', 'dolores', 'eos', 'ratione', 'sequi',
        'nesciunt', 'neque', 'porro', 'quisquam', 'dolorem', 'adipisci', 'numquam',
        'eius', 'modi', 'tempora', 'magnam', 'quaerat', 'minima', 'nostrum',
        'exercitationem', 'ullam', 'corporis', 'suscipit', 'laboriosam', 'aliquid',
        'commodi', 'consequatur', 'autem', 'vel', 'eum', 'iure', 'quam', 'nihil',
        'molestiae', 'illum', 'quo', 'facere', 'possimus', 'assumenda'
    ];

    const loremStart = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.';

    // DOM Elements
    const typeTabs = document.querySelectorAll('.type-tab');
    const quantitySlider = document.getElementById('quantity-slider');
    const quantityDisplay = document.getElementById('quantity-display');
    const quantityLabel = document.getElementById('quantity-label');
    const minLabel = document.getElementById('min-label');
    const maxLabel = document.getElementById('max-label');
    const startWithLorem = document.getElementById('start-with-lorem');
    const includeHtmlTags = document.getElementById('include-html-tags');
    const htmlTagsOption = document.getElementById('html-tags-option');
    const btnGenerate = document.getElementById('btn-generate');
    const outputTextarea = document.getElementById('output-textarea');
    const btnCopy = document.getElementById('btn-copy');
    const btnDownload = document.getElementById('btn-download');
    const btnClear = document.getElementById('btn-clear');
    const paraCount = document.getElementById('para-count');
    const wordCount = document.getElementById('word-count');
    const charCount = document.getElementById('char-count');
    const countLabel = document.getElementById('count-label');
    const copyNotification = document.getElementById('copy-notification');
    const copyMessage = document.getElementById('copy-message');
    const errorNotification = document.getElementById('error-notification');
    const errorMessage = document.getElementById('error-message');

    // State
    let currentType = 'paragraphs';

    // Type settings
    const typeSettings = {
        paragraphs: { min: 1, max: 20, default: 3, label: S.paragraphs },
        sentences: { min: 1, max: 50, default: 5, label: S.sentences },
        words: { min: 1, max: 500, default: 50, label: S.words }
    };

    // Get random word
    function getRandomWord() {
        return loremWords[Math.floor(Math.random() * loremWords.length)];
    }

    // Generate a sentence
    function generateSentence(wordCount = null) {
        const count = wordCount || Math.floor(Math.random() * 10) + 5; // 5-15 words
        let words = [];

        for (let i = 0; i < count; i++) {
            words.push(getRandomWord());
        }

        // Capitalize first letter
        words[0] = words[0].charAt(0).toUpperCase() + words[0].slice(1);

        return words.join(' ') + '.';
    }

    // Generate a paragraph
    function generateParagraph(sentenceCount = null) {
        const count = sentenceCount || Math.floor(Math.random() * 4) + 3; // 3-7 sentences
        let sentences = [];

        for (let i = 0; i < count; i++) {
            sentences.push(generateSentence());
        }

        return sentences.join(' ');
    }

    // Generate words
    function generateWords(count, useLoremStart) {
        let words = [];

        if (useLoremStart) {
            const startWords = loremStart.replace(/[.,]/g, '').toLowerCase().split(' ');
            words = [...startWords];
            count = Math.max(0, count - startWords.length);
        }

        for (let i = 0; i < count; i++) {
            words.push(getRandomWord());
        }

        // Capitalize first word
        if (words.length > 0) {
            words[0] = words[0].charAt(0).toUpperCase() + words[0].slice(1);
        }

        return words.join(' ');
    }

    // Main generate function
    function generate() {
        const quantity = parseInt(quantitySlider.value, 10);
        const useLoremStart = startWithLorem.checked;
        const useHtmlTags = includeHtmlTags.checked;

        let result = '';

        if (currentType === 'words') {
            result = generateWords(quantity, useLoremStart);
        } else if (currentType === 'sentences') {
            let sentences = [];
            for (let i = 0; i < quantity; i++) {
                sentences.push(generateSentence());
            }
            if (useLoremStart && sentences.length > 0) {
                sentences[0] = loremStart;
            }
            result = sentences.join(' ');
        } else { // paragraphs
            let paragraphs = [];
            for (let i = 0; i < quantity; i++) {
                paragraphs.push(generateParagraph());
            }
            if (useLoremStart && paragraphs.length > 0) {
                // Replace the first sentence of the first paragraph
                const firstPara = paragraphs[0];
                const restOfPara = firstPara.substring(firstPara.indexOf('.') + 1).trim();
                paragraphs[0] = loremStart + (restOfPara ? ' ' + restOfPara : '');
            }

            if (useHtmlTags) {
                result = paragraphs.map(p => `<p>${p}</p>`).join('\n\n');
            } else {
                result = paragraphs.join('\n\n');
            }
        }

        outputTextarea.value = result;

        // Update font style based on HTML tags
        if (useHtmlTags && currentType === 'paragraphs') {
            outputTextarea.classList.add('font-mono');
            outputTextarea.classList.remove('font-normal');
        } else {
            outputTextarea.classList.remove('font-mono');
            outputTextarea.classList.add('font-normal');
        }

        updateStats(result);
    }

    // Update stats
    function updateStats(text) {
        const cleanText = text.replace(/<\/?p>/g, ''); // Remove HTML tags for counting
        const words = cleanText.trim().split(/\s+/).filter(w => w.length > 0).length;
        const characters = cleanText.length;

        let countValue = 0;
        if (currentType === 'paragraphs') {
            countValue = text.split(/\n\n+/).filter(p => p.trim().length > 0).length;
            countLabel.textContent = S.paragraphs + ':';
        } else if (currentType === 'sentences') {
            countValue = (cleanText.match(/[.!?]+/g) || []).length;
            countLabel.textContent = S.sentences + ':';
        } else {
            countValue = words;
            countLabel.textContent = S.words + ':';
        }

        paraCount.textContent = countValue;
        wordCount.textContent = words;
        charCount.textContent = characters;
    }

    // Update UI for type change
    function updateTypeUI() {
        const settings = typeSettings[currentType];

        // Update slider
        quantitySlider.min = settings.min;
        quantitySlider.max = settings.max;
        quantitySlider.value = settings.default;
        quantityDisplay.textContent = settings.default;

        // Update labels
        quantityLabel.textContent = settings.label;
        minLabel.textContent = settings.min;
        maxLabel.textContent = settings.max;

        // Show/hide HTML tags option (only for paragraphs)
        if (currentType === 'paragraphs') {
            htmlTagsOption.classList.remove('hidden');
        } else {
            htmlTagsOption.classList.add('hidden');
            includeHtmlTags.checked = false;
        }

        // Update tabs
        typeTabs.forEach(tab => {
            if (tab.dataset.type === currentType) {
                tab.classList.add('bg-gold', 'text-darkBg');
                tab.classList.remove('border', 'border-gold/50', 'text-light-muted', 'hover:bg-gold/10', 'hover:text-gold');
            } else {
                tab.classList.remove('bg-gold', 'text-darkBg');
                tab.classList.add('border', 'border-gold/50', 'text-light-muted', 'hover:bg-gold/10', 'hover:text-gold');
            }
        });
    }

    // Show success notification
    function showNotification(message) {
        copyMessage.textContent = message;
        copyNotification.classList.remove('hidden');
        errorNotification.classList.add('hidden');

        setTimeout(() => {
            copyNotification.classList.add('hidden');
        }, 2000);
    }

    // Show error notification
    function showError(message) {
        errorMessage.textContent = message;
        errorNotification.classList.remove('hidden');
        copyNotification.classList.add('hidden');

        setTimeout(() => {
            errorNotification.classList.add('hidden');
        }, 3000);
    }

    // Copy to clipboard
    function copyToClipboard() {
        const text = outputTextarea.value;
        if (!text) {
            showError(S.nothingToCopy);
            return;
        }

        navigator.clipboard.writeText(text).then(() => {
            showNotification(S.copiedToClipboard);
        }).catch(() => {
            showError(S.copyFailed);
        });
    }

    // Download as TXT
    function downloadTxt() {
        const text = outputTextarea.value;
        if (!text) {
            showError(S.nothingToDownload);
            return;
        }

        const blob = new Blob([text], { type: 'text/plain' });
        const url = URL.createObjectURL(blob);
        const now = new Date();
        const timestamp = now.getFullYear() + '-' +
            String(now.getMonth() + 1).padStart(2, '0') + '-' +
            String(now.getDate()).padStart(2, '0') + '-' +
            String(now.getHours()).padStart(2, '0') +
            String(now.getMinutes()).padStart(2, '0') +
            String(now.getSeconds()).padStart(2, '0');

        const a = document.createElement('a');
        a.href = url;
        a.download = `lorem-ipsum-${timestamp}.txt`;
        document.body.appendChild(a);
        a.click();
        document.body.removeChild(a);
        URL.revokeObjectURL(url);

        showNotification(S.downloadedTxt);
    }

    // Clear output
    function clearOutput() {
        outputTextarea.value = '';
        outputTextarea.placeholder = S.placeholder;
        paraCount.textContent = '0';
        wordCount.textContent = '0';
        charCount.textContent = '0';
        outputTextarea.classList.remove('font-mono');
        outputTextarea.classList.add('font-normal');
    }

    // Event Listeners
    typeTabs.forEach(tab => {
        tab.addEventListener('click', function() {
            currentType = this.dataset.type;
            updateTypeUI();
            generate();
        });
    });

    quantitySlider.addEventListener('input', function() {
        quantityDisplay.textContent = this.value;
        generate();
    });

    startWithLorem.addEventListener('change', generate);
    includeHtmlTags.addEventListener('change', generate);
    btnGenerate.addEventListener('click', generate);
    btnCopy.addEventListener('click', copyToClipboard);
    btnDownload.addEventListener('click', downloadTxt);
    btnClear.addEventListener('click', clearOutput);

    // Keyboard shortcut: Enter to generate
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Enter' && !e.ctrlKey && !e.metaKey && !e.shiftKey) {
            if (document.activeElement.tagName !== 'INPUT' && document.activeElement.tagName !== 'TEXTAREA' && document.activeElement.tagName !== 'SELECT') {
                e.preventDefault();
                generate();
            }
        }
    });

    // Initialize
    updateTypeUI();
    generate();
})();
</script>
