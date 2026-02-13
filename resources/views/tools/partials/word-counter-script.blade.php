<script>
(function() {
    // Get translatable strings from data attributes (for Italian/other locales)
    const stringsEl = document.getElementById('tool-strings');
    const S = {
        placeholder: stringsEl?.dataset.placeholder || 'Type or paste your text here...',
        pasted: stringsEl?.dataset.pasted || 'Text pasted from clipboard!',
        pasteFail: stringsEl?.dataset.pasteFail || 'Unable to paste. Please check clipboard permissions.',
        copied: stringsEl?.dataset.copied || 'Copied to clipboard!',
        copyFail: stringsEl?.dataset.copyFail || 'Failed to copy to clipboard.',
        nothingToCopy: stringsEl?.dataset.nothingToCopy || 'Nothing to copy. Enter some text first.',
        characters: stringsEl?.dataset.characters || 'characters',
        remaining: stringsEl?.dataset.remaining || 'remaining',
        overLimit: stringsEl?.dataset.overLimit || 'over limit',
        min: stringsEl?.dataset.min || 'min',
        lessThanMin: stringsEl?.dataset.lessThanMin || '< 1 min',
    };

    // DOM Elements
    const textInput = document.getElementById('text-input');
    const btnPaste = document.getElementById('btn-paste');
    const btnCopy = document.getElementById('btn-copy');
    const btnClear = document.getElementById('btn-clear');
    const charLimitInput = document.getElementById('char-limit');
    const limitProgressContainer = document.getElementById('limit-progress-container');
    const limitUsage = document.getElementById('limit-usage');
    const limitRemaining = document.getElementById('limit-remaining');
    const limitProgressBar = document.getElementById('limit-progress-bar');
    const copyNotification = document.getElementById('copy-notification');
    const copyMessage = document.getElementById('copy-message');
    const errorNotification = document.getElementById('error-notification');
    const errorMessage = document.getElementById('error-message');

    // Stat elements
    const statChars = document.getElementById('stat-chars');
    const statCharsNoSpaces = document.getElementById('stat-chars-no-spaces');
    const statWords = document.getElementById('stat-words');
    const statSentences = document.getElementById('stat-sentences');
    const statParagraphs = document.getElementById('stat-paragraphs');
    const statLines = document.getElementById('stat-lines');
    const statReadingTime = document.getElementById('stat-reading-time');
    const statSpeakingTime = document.getElementById('stat-speaking-time');

    // Set placeholder from translations
    if (stringsEl?.dataset.placeholder) {
        textInput.placeholder = S.placeholder;
    }

    // Analyze text and return all stats
    function analyzeText(text) {
        // Characters (total)
        const charCount = text.length;

        // Characters (no spaces)
        const charNoSpaces = text.replace(/\s/g, '').length;

        // Words (split by whitespace, filter empty)
        const words = text.trim().split(/\s+/).filter(word => word.length > 0);
        const wordCount = text.trim() === '' ? 0 : words.length;

        // Sentences (split by . ! ? followed by space or end)
        const sentences = text.split(/[.!?]+/).filter(s => s.trim().length > 0);
        const sentenceCount = text.trim() === '' ? 0 : sentences.length;

        // Paragraphs (split by double newline or multiple newlines)
        const paragraphs = text.split(/\n\s*\n/).filter(p => p.trim().length > 0);
        const paragraphCount = text.trim() === '' ? 0 : paragraphs.length;

        // Lines (split by single newline)
        const lines = text.split(/\n/);
        const lineCount = text === '' ? 0 : lines.length;

        // Reading time (200 words per minute average)
        const readingMinutes = Math.ceil(wordCount / 200);
        const readingTime = wordCount === 0 ? `0 ${S.min}` : (readingMinutes < 1 ? S.lessThanMin : `${readingMinutes} ${S.min}`);

        // Speaking time (150 words per minute average)
        const speakingMinutes = Math.ceil(wordCount / 150);
        const speakingTime = wordCount === 0 ? `0 ${S.min}` : (speakingMinutes < 1 ? S.lessThanMin : `${speakingMinutes} ${S.min}`);

        return {
            charCount,
            charNoSpaces,
            wordCount,
            sentenceCount,
            paragraphCount,
            lineCount,
            readingTime,
            speakingTime
        };
    }

    // Update display with stats
    function updateDisplay(stats) {
        statChars.textContent = stats.charCount.toLocaleString();
        statCharsNoSpaces.textContent = stats.charNoSpaces.toLocaleString();
        statWords.textContent = stats.wordCount.toLocaleString();
        statSentences.textContent = stats.sentenceCount.toLocaleString();
        statParagraphs.textContent = stats.paragraphCount.toLocaleString();
        statLines.textContent = stats.lineCount.toLocaleString();
        statReadingTime.textContent = stats.readingTime;
        statSpeakingTime.textContent = stats.speakingTime;

        // Update character limit if set
        updateCharacterLimit(stats.charCount);
    }

    // Update character limit progress
    function updateCharacterLimit(currentChars) {
        const limit = parseInt(charLimitInput.value, 10);

        if (limit && limit > 0) {
            limitProgressContainer.classList.remove('hidden');

            const percentage = Math.min((currentChars / limit) * 100, 100);
            const remaining = limit - currentChars;

            limitUsage.textContent = `${currentChars.toLocaleString()} / ${limit.toLocaleString()} ${S.characters}`;
            limitRemaining.textContent = remaining >= 0 ? `${remaining.toLocaleString()} ${S.remaining}` : `${Math.abs(remaining).toLocaleString()} ${S.overLimit}`;

            limitProgressBar.style.width = `${percentage}%`;

            // Change color based on usage
            if (percentage >= 100) {
                limitProgressBar.classList.remove('bg-gold', 'bg-yellow-500');
                limitProgressBar.classList.add('bg-red-500');
                limitRemaining.classList.add('text-red-400');
                limitRemaining.classList.remove('text-light-muted');
            } else if (percentage >= 90) {
                limitProgressBar.classList.remove('bg-gold', 'bg-red-500');
                limitProgressBar.classList.add('bg-yellow-500');
                limitRemaining.classList.remove('text-red-400');
                limitRemaining.classList.add('text-light-muted');
            } else {
                limitProgressBar.classList.remove('bg-yellow-500', 'bg-red-500');
                limitProgressBar.classList.add('bg-gold');
                limitRemaining.classList.remove('text-red-400');
                limitRemaining.classList.add('text-light-muted');
            }
        } else {
            limitProgressContainer.classList.add('hidden');
        }
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

    // Paste from clipboard
    async function pasteText() {
        try {
            const text = await navigator.clipboard.readText();
            textInput.value = text;
            textInput.dispatchEvent(new Event('input'));
            showNotification(S.pasted);
        } catch (err) {
            showError(S.pasteFail);
        }
    }

    // Copy to clipboard
    async function copyText() {
        const text = textInput.value;
        if (!text) {
            showError(S.nothingToCopy);
            return;
        }

        try {
            await navigator.clipboard.writeText(text);
            showNotification(S.copied);
        } catch (err) {
            showError(S.copyFail);
        }
    }

    // Clear text
    function clearText() {
        textInput.value = '';
        textInput.dispatchEvent(new Event('input'));
    }

    // Event Listeners
    textInput.addEventListener('input', function() {
        const stats = analyzeText(this.value);
        updateDisplay(stats);
    });

    charLimitInput.addEventListener('input', function() {
        const stats = analyzeText(textInput.value);
        updateCharacterLimit(stats.charCount);
    });

    btnPaste.addEventListener('click', pasteText);
    btnCopy.addEventListener('click', copyText);
    btnClear.addEventListener('click', clearText);

    // Initialize with empty stats
    updateDisplay(analyzeText(''));
})();
</script>
