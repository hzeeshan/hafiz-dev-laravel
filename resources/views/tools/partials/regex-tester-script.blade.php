<script>
(function() {
    // Get translatable strings from data attributes (for Italian/other locales)
    const stringsEl = document.getElementById('tool-strings');
    const S = {
        matchesPlaceholder: stringsEl?.dataset.matchesPlaceholder || 'Matches will be highlighted here...',
        enterTestString: stringsEl?.dataset.enterTestString || 'Enter a test string above...',
        zeroMatches: stringsEl?.dataset.zeroMatches || '0 matches',
        oneMatch: stringsEl?.dataset.oneMatch || '1 match',
        nMatches: stringsEl?.dataset.nMatches || '{n} matches',
        invalidRegex: stringsEl?.dataset.invalidRegex || 'Invalid Regular Expression',
        copied: stringsEl?.dataset.copied || 'Regex copied to clipboard!',
        copyFail: stringsEl?.dataset.copyFail || 'Failed to copy to clipboard',
        nothingToCopy: stringsEl?.dataset.nothingToCopy || 'Nothing to copy. Enter a regex pattern first.',
        exampleEmail: stringsEl?.dataset.exampleEmail || 'Email Address',
        exampleUrl: stringsEl?.dataset.exampleUrl || 'URL',
        examplePhone: stringsEl?.dataset.examplePhone || 'Phone Number',
        exampleIpv4: stringsEl?.dataset.exampleIpv4 || 'IPv4 Address',
        exampleDate: stringsEl?.dataset.exampleDate || 'Date (YYYY-MM-DD)',
        exampleHtml: stringsEl?.dataset.exampleHtml || 'HTML Tag',
        exampleHex: stringsEl?.dataset.exampleHex || 'Hex Color',
    };

    // DOM Elements
    const regexInput = document.getElementById('regex-input');
    const testString = document.getElementById('test-string');
    const flagsDisplay = document.getElementById('flags-display');
    const flagG = document.getElementById('flag-g');
    const flagI = document.getElementById('flag-i');
    const flagM = document.getElementById('flag-m');
    const flagS = document.getElementById('flag-s');
    const examplesSelect = document.getElementById('examples-select');
    const matchCount = document.getElementById('match-count');
    const highlightedPreview = document.getElementById('highlighted-preview');
    const matchDetails = document.getElementById('match-details');
    const matchTableBody = document.getElementById('match-table-body');
    const errorDisplay = document.getElementById('error-display');
    const errorMessage = document.getElementById('error-message');
    const btnCopyRegex = document.getElementById('btn-copy-regex');
    const btnClear = document.getElementById('btn-clear');
    const copyNotification = document.getElementById('copy-notification');
    const copyMessage = document.getElementById('copy-message');

    // Example patterns
    const examples = {
        email: {
            pattern: '[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\\.[a-zA-Z]{2,}',
            testString: 'Contact us at support@example.com or sales@company.org for more info.\nInvalid: test@, @domain.com, user@.com'
        },
        url: {
            pattern: 'https?:\\/\\/(www\\.)?[-a-zA-Z0-9@:%._\\+~#=]{1,256}\\.[a-zA-Z0-9()]{1,6}\\b([-a-zA-Z0-9()@:%_\\+.~#?&//=]*)',
            testString: 'Visit https://www.example.com or http://test.org/path?query=1\nAlso check https://subdomain.domain.co.uk/page'
        },
        phone: {
            pattern: '\\+?[\\d\\s\\-\\(\\)]{10,}',
            testString: 'Call us: +1 (555) 123-4567\nUK: +44 20 7946 0958\nSimple: 555-123-4567'
        },
        ipv4: {
            pattern: '\\b\\d{1,3}\\.\\d{1,3}\\.\\d{1,3}\\.\\d{1,3}\\b',
            testString: 'Server IPs: 192.168.1.1, 10.0.0.255\nPublic: 8.8.8.8, 1.1.1.1\nInvalid: 999.999.999.999'
        },
        date: {
            pattern: '\\d{4}-\\d{2}-\\d{2}',
            testString: 'Start date: 2024-01-15\nEnd date: 2024-12-31\nInvalid: 2024/01/15, 01-15-2024'
        },
        html: {
            pattern: '<([a-z]+)([^<]+)*(?:>(.*)<\\/\\1>|\\s+\\/>)',
            testString: '<div class="container">Content here</div>\n<img src="image.jpg" />\n<p>Paragraph</p>'
        },
        hex: {
            pattern: '#?([a-fA-F0-9]{6}|[a-fA-F0-9]{3})',
            testString: 'Colors: #FF5733, #fff, #123456\nWithout hash: FF5733, abc\nInvalid: #GGG, #12345'
        }
    };

    // Highlight colors (cycle through these for multiple matches)
    const highlightColors = [
        'bg-yellow-500/40',
        'bg-green-500/40',
        'bg-blue-500/40',
        'bg-purple-500/40',
        'bg-pink-500/40',
        'bg-orange-500/40'
    ];

    // Get selected flags
    function getFlags() {
        let flags = '';
        if (flagG.checked) flags += 'g';
        if (flagI.checked) flags += 'i';
        if (flagM.checked) flags += 'm';
        if (flagS.checked) flags += 's';
        return flags;
    }

    // Update flags display
    function updateFlagsDisplay() {
        const flags = getFlags();
        flagsDisplay.textContent = flags || '';
    }

    // Escape HTML to prevent XSS
    function escapeHtml(text) {
        const div = document.createElement('div');
        div.textContent = text;
        return div.innerHTML;
    }

    // Highlight matches in text
    function highlightMatches(text, matches) {
        if (matches.length === 0) {
            return escapeHtml(text);
        }

        // Sort matches by index (descending) to replace from end to start
        const sortedMatches = [...matches].sort((a, b) => b.index - a.index);

        let result = text;
        sortedMatches.forEach((match, i) => {
            const colorClass = highlightColors[i % highlightColors.length];
            const before = result.substring(0, match.index);
            const matchText = result.substring(match.index, match.endIndex);
            const after = result.substring(match.endIndex);
            result = before + `\u0000MARK_START_${i}\u0000` + matchText + `\u0000MARK_END_${i}\u0000` + after;
        });

        // Escape HTML first, then replace markers with actual HTML
        result = escapeHtml(result);

        // Replace markers with highlight spans
        sortedMatches.forEach((match, i) => {
            const colorClass = highlightColors[i % highlightColors.length];
            result = result.replace(
                `\u0000MARK_START_${i}\u0000`,
                `<mark class="${colorClass} text-light px-0.5 rounded">`
            );
            result = result.replace(`\u0000MARK_END_${i}\u0000`, '</mark>');
        });

        return result;
    }

    // Format match count text
    function formatMatchCount(count) {
        if (count === 0) return S.zeroMatches;
        if (count === 1) return S.oneMatch;
        return S.nMatches.replace('{n}', count);
    }

    // Test regex and update results
    function testRegex() {
        const pattern = regexInput.value;
        const text = testString.value;
        const flags = getFlags();

        // Clear previous error
        hideError();

        // If no pattern, show placeholder
        if (!pattern) {
            highlightedPreview.innerHTML = '<span class="text-light-muted">' + escapeHtml(S.matchesPlaceholder) + '</span>';
            matchCount.textContent = formatMatchCount(0);
            matchDetails.classList.add('hidden');
            return;
        }

        // If no test string, show message
        if (!text) {
            highlightedPreview.innerHTML = '<span class="text-light-muted">' + escapeHtml(S.enterTestString) + '</span>';
            matchCount.textContent = formatMatchCount(0);
            matchDetails.classList.add('hidden');
            return;
        }

        try {
            const regex = new RegExp(pattern, flags);
            const matches = [];
            let match;

            if (flags.includes('g')) {
                while ((match = regex.exec(text)) !== null) {
                    matches.push({
                        text: match[0],
                        index: match.index,
                        endIndex: match.index + match[0].length,
                        groups: match.slice(1)
                    });

                    // Prevent infinite loop for zero-length matches
                    if (match.index === regex.lastIndex) {
                        regex.lastIndex++;
                    }

                    // Safety limit
                    if (matches.length >= 1000) {
                        break;
                    }
                }
            } else {
                match = regex.exec(text);
                if (match) {
                    matches.push({
                        text: match[0],
                        index: match.index,
                        endIndex: match.index + match[0].length,
                        groups: match.slice(1)
                    });
                }
            }

            // Update match count
            matchCount.textContent = formatMatchCount(matches.length);

            // Update highlighted preview
            highlightedPreview.innerHTML = highlightMatches(text, matches);

            // Update match details table
            if (matches.length > 0) {
                matchDetails.classList.remove('hidden');
                matchTableBody.innerHTML = matches.map((m, i) => `
                    <tr class="border-b border-gold/10 hover:bg-gold/5">
                        <td class="p-3 text-light-muted">${i + 1}</td>
                        <td class="p-3 font-mono text-light break-all">${escapeHtml(m.text)}</td>
                        <td class="p-3 text-light-muted font-mono">${m.index}-${m.endIndex}</td>
                        <td class="p-3 font-mono text-light-muted">${m.groups.length > 0 ? m.groups.map((g, gi) => `<span class="text-sky-400">$${gi + 1}:</span> ${escapeHtml(g || '(empty)')}`).join(', ') : '-'}</td>
                    </tr>
                `).join('');
            } else {
                matchDetails.classList.add('hidden');
            }

        } catch (e) {
            showError(e.message);
            highlightedPreview.innerHTML = escapeHtml(text);
            matchCount.textContent = formatMatchCount(0);
            matchDetails.classList.add('hidden');
        }
    }

    // Show error message
    function showError(message) {
        errorDisplay.classList.remove('hidden');
        errorMessage.textContent = message;
    }

    // Hide error message
    function hideError() {
        errorDisplay.classList.add('hidden');
    }

    // Show notification
    function showNotification(message, isError = false) {
        copyMessage.textContent = message;
        copyNotification.classList.remove('hidden');

        if (isError) {
            copyNotification.classList.remove('bg-green-500/10', 'border-green-500/30');
            copyNotification.classList.add('bg-red-500/10', 'border-red-500/30');
            copyMessage.classList.remove('text-green-400');
            copyMessage.classList.add('text-red-400');
        } else {
            copyNotification.classList.remove('bg-red-500/10', 'border-red-500/30');
            copyNotification.classList.add('bg-green-500/10', 'border-green-500/30');
            copyMessage.classList.remove('text-red-400');
            copyMessage.classList.add('text-green-400');
        }

        setTimeout(() => {
            copyNotification.classList.add('hidden');
        }, 2000);
    }

    // Copy regex to clipboard
    function copyRegex() {
        const pattern = regexInput.value;
        if (!pattern) {
            showNotification(S.nothingToCopy, true);
            return;
        }

        const flags = getFlags();
        const fullRegex = `/${pattern}/${flags}`;

        navigator.clipboard.writeText(fullRegex).then(() => {
            showNotification(S.copied);
        }).catch(() => {
            showNotification(S.copyFail, true);
        });
    }

    // Clear all inputs
    function clearAll() {
        regexInput.value = '';
        testString.value = '';
        examplesSelect.value = '';
        flagG.checked = true;
        flagI.checked = false;
        flagM.checked = false;
        flagS.checked = false;
        updateFlagsDisplay();
        testRegex();
    }

    // Load example
    function loadExample() {
        const selected = examplesSelect.value;
        if (selected && examples[selected]) {
            regexInput.value = examples[selected].pattern;
            testString.value = examples[selected].testString;
            testRegex();
        }
    }

    // Debounce function
    let debounceTimer;
    function handleInput() {
        clearTimeout(debounceTimer);
        debounceTimer = setTimeout(testRegex, 150);
    }

    // Event listeners
    regexInput.addEventListener('input', handleInput);
    testString.addEventListener('input', handleInput);

    [flagG, flagI, flagM, flagS].forEach(flag => {
        flag.addEventListener('change', () => {
            updateFlagsDisplay();
            testRegex();
        });
    });

    examplesSelect.addEventListener('change', loadExample);
    btnCopyRegex.addEventListener('click', copyRegex);
    btnClear.addEventListener('click', clearAll);

    // Initialize
    updateFlagsDisplay();
})();
</script>
