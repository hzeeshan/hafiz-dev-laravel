<script>
(function() {
    const stringsEl = document.getElementById('tool-strings');
    const S = {
        characters: stringsEl?.dataset.characters || 'characters',
        characters_remaining: stringsEl?.dataset.charactersRemaining || 'characters remaining',
        placeholder: stringsEl?.dataset.placeholder || 'Type or paste your tweet here...',
        copied: stringsEl?.dataset.copied || 'Copied!',
        copy_text: stringsEl?.dataset.copyText || 'Copy Text',
    };

    // DOM Elements
    const tweetInput = document.getElementById('tweet-input');
    const charCount = document.getElementById('char-count');
    const charLimit = document.getElementById('char-limit');
    const progressBar = document.getElementById('progress-bar');
    const remainingCount = document.getElementById('remaining-count');
    const remainingText = document.getElementById('remaining-text');
    const statChars = document.getElementById('stat-chars');
    const statTwitterChars = document.getElementById('stat-twitter-chars');
    const statWords = document.getElementById('stat-words');
    const statUrls = document.getElementById('stat-urls');
    const statMentions = document.getElementById('stat-mentions');
    const statHashtags = document.getElementById('stat-hashtags');
    const btnCopy = document.getElementById('btn-copy');
    const btnClear = document.getElementById('btn-clear');
    const btnPost = document.getElementById('btn-post');
    const successNotification = document.getElementById('success-notification');
    const successMessage = document.getElementById('success-message');

    // Mode buttons
    const modeTweet = document.getElementById('mode-tweet');
    const modePremium = document.getElementById('mode-premium');
    const modeDm = document.getElementById('mode-dm');
    const modeBio = document.getElementById('mode-bio');
    const modeButtons = [modeTweet, modePremium, modeDm, modeBio];

    const T_CO_LENGTH = 23;
    let currentLimit = 280;

    // URL regex — matches http(s) and common domains
    const urlRegex = /https?:\/\/[^\s]+|(?:www\.)[^\s]+/gi;
    const mentionRegex = /@\w+/g;
    const hashtagRegex = /#\w+/g;

    // ===== Twitter Character Counting =====
    // Twitter uses a weighted system: most characters = 1, but CJK, emojis = 2

    function getTwitterCharCount(text) {
        // First, replace URLs with placeholder of 23 chars
        const urls = text.match(urlRegex) || [];
        let processedText = text;

        urls.forEach(url => {
            processedText = processedText.replace(url, ' '.repeat(T_CO_LENGTH));
        });

        // Count characters using Twitter's weighting
        let count = 0;
        const segments = Array.from(new Intl.Segmenter().segment(processedText));

        for (const segment of segments) {
            const codePoint = segment.segment.codePointAt(0);

            if (codePoint === undefined) continue;

            // Check if character is in ranges that count as 2
            if (isWeightedTwo(segment.segment, codePoint)) {
                count += 2;
            } else {
                count += 1;
            }
        }

        return { count, urls: urls.length };
    }

    function isWeightedTwo(char, codePoint) {
        // CJK Unified Ideographs
        if (codePoint >= 0x4E00 && codePoint <= 0x9FFF) return true;
        // CJK Extension A
        if (codePoint >= 0x3400 && codePoint <= 0x4DBF) return true;
        // CJK Extension B+
        if (codePoint >= 0x20000 && codePoint <= 0x2FA1F) return true;
        // CJK Compatibility Ideographs
        if (codePoint >= 0xF900 && codePoint <= 0xFAFF) return true;
        // Katakana
        if (codePoint >= 0x30A0 && codePoint <= 0x30FF) return true;
        // Hiragana
        if (codePoint >= 0x3040 && codePoint <= 0x309F) return true;
        // Hangul Syllables
        if (codePoint >= 0xAC00 && codePoint <= 0xD7AF) return true;
        // Hangul Jamo
        if (codePoint >= 0x1100 && codePoint <= 0x11FF) return true;
        // Fullwidth forms
        if (codePoint >= 0xFF01 && codePoint <= 0xFF60) return true;
        // Emojis — check for multi-byte (above basic multilingual plane or emoji presentation)
        if (codePoint > 0xFFFF) return true;
        // Common emoji ranges
        if (codePoint >= 0x2600 && codePoint <= 0x27BF) return true;
        if (codePoint >= 0xFE00 && codePoint <= 0xFE0F) return true;
        if (codePoint >= 0x1F000 && codePoint <= 0x1FAFF) return true;

        return false;
    }

    // ===== Update Function =====

    function updateCount() {
        const text = tweetInput.value;

        // Basic stats
        const plainLength = text.length;
        const words = text.trim() === '' ? 0 : text.trim().split(/\s+/).length;
        const mentions = (text.match(mentionRegex) || []).length;
        const hashtags = (text.match(hashtagRegex) || []).length;

        // Twitter-weighted count
        const { count: twitterCount, urls } = getTwitterCharCount(text);

        // Update display
        charCount.textContent = twitterCount;
        statChars.textContent = plainLength;
        statTwitterChars.textContent = twitterCount;
        statWords.textContent = words;
        statUrls.textContent = urls;
        statMentions.textContent = mentions;
        statHashtags.textContent = hashtags;

        // Progress bar
        const percentage = Math.min((twitterCount / currentLimit) * 100, 100);
        progressBar.style.width = percentage + '%';

        // Remaining
        const remaining = currentLimit - twitterCount;
        remainingCount.textContent = remaining;

        // Color coding
        if (remaining < 0) {
            progressBar.className = 'h-full rounded-full transition-all duration-300 bg-red-500';
            charCount.className = 'text-3xl font-bold text-red-400';
            remainingCount.className = '';
            remainingText.className = 'text-right mt-1 text-sm text-red-400';
        } else if (remaining <= 20) {
            progressBar.className = 'h-full rounded-full transition-all duration-300 bg-amber-500';
            charCount.className = 'text-3xl font-bold text-amber-400';
            remainingCount.className = '';
            remainingText.className = 'text-right mt-1 text-sm text-amber-400';
        } else {
            progressBar.className = 'h-full rounded-full transition-all duration-300 bg-gold';
            charCount.className = 'text-3xl font-bold text-gold';
            remainingCount.className = '';
            remainingText.className = 'text-right mt-1 text-sm text-light-muted';
        }

        // Update post button URL
        if (text.trim()) {
            btnPost.href = 'https://twitter.com/intent/tweet?text=' + encodeURIComponent(text);
        } else {
            btnPost.href = 'https://twitter.com/intent/tweet';
        }
    }

    // ===== Mode Switching =====

    function setMode(limit, activeButton) {
        currentLimit = limit;
        charLimit.textContent = limit;

        modeButtons.forEach(btn => {
            btn.className = 'px-5 py-2 rounded-lg font-semibold text-sm transition-all duration-300 border border-gold/50 text-light hover:bg-gold/10 cursor-pointer';
        });
        activeButton.className = 'px-5 py-2 rounded-lg font-semibold text-sm transition-all duration-300 bg-gold text-darkBg cursor-pointer';

        updateCount();
    }

    // ===== Actions =====

    function copyText() {
        const text = tweetInput.value;
        if (!text) return;
        navigator.clipboard.writeText(text).then(() => {
            const originalHTML = btnCopy.innerHTML;
            btnCopy.innerHTML = '<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> ' + S.copied;
            btnCopy.classList.add('text-green-400', 'border-green-400');
            setTimeout(() => {
                btnCopy.innerHTML = originalHTML;
                btnCopy.classList.remove('text-green-400', 'border-green-400');
            }, 2000);
        });
    }

    function clearAll() {
        tweetInput.value = '';
        updateCount();
        tweetInput.focus();
    }

    // ===== Event Listeners =====
    tweetInput.addEventListener('input', updateCount);
    btnCopy.addEventListener('click', copyText);
    btnClear.addEventListener('click', clearAll);

    modeTweet.addEventListener('click', () => setMode(280, modeTweet));
    modePremium.addEventListener('click', () => setMode(25000, modePremium));
    modeDm.addEventListener('click', () => setMode(10000, modeDm));
    modeBio.addEventListener('click', () => setMode(160, modeBio));

    // Initial count
    updateCount();
})();
</script>
