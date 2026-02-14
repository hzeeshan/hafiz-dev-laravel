<script>
(function() {
    // Translatable strings
    const stringsEl = document.getElementById('tool-strings');
    const S = {
        copy_output: stringsEl?.dataset.copyOutput || 'Copy Output',
        copied: stringsEl?.dataset.copied || 'Copied!',
        showing_of: stringsEl?.dataset.showingOf || 'Showing {count} of 128 characters',
        all: stringsEl?.dataset.all || 'All (128)',
        control: stringsEl?.dataset.control || 'Control (33)',
        digits: stringsEl?.dataset.digits || 'Digits (10)',
        uppercase: stringsEl?.dataset.uppercase || 'A–Z (26)',
        lowercase: stringsEl?.dataset.lowercase || 'a–z (26)',
        symbols: stringsEl?.dataset.symbols || 'Symbols (33)',
        decimal: stringsEl?.dataset.decimal || 'Decimal',
        hexadecimal: stringsEl?.dataset.hexadecimal || 'Hexadecimal',
        binary: stringsEl?.dataset.binary || 'Binary',
        octal: stringsEl?.dataset.octal || 'Octal',
        html_entity: stringsEl?.dataset.htmlEntity || 'HTML Entity',
        space: stringsEl?.dataset.space || 'Space',
        digit: stringsEl?.dataset.digit || 'Digit',
        uppercase_letter: stringsEl?.dataset.uppercaseLetter || 'Uppercase',
        lowercase_letter: stringsEl?.dataset.lowercaseLetter || 'Lowercase',
        character: stringsEl?.dataset.character || 'Character',
        exclamation_mark: stringsEl?.dataset.exclamationMark || 'Exclamation mark',
        double_quote: stringsEl?.dataset.doubleQuote || 'Double quote',
        hash_sign: stringsEl?.dataset.hashSign || 'Hash / Number sign',
        dollar_sign: stringsEl?.dataset.dollarSign || 'Dollar sign',
        percent: stringsEl?.dataset.percent || 'Percent',
        ampersand: stringsEl?.dataset.ampersand || 'Ampersand',
        single_quote: stringsEl?.dataset.singleQuote || 'Single quote',
        left_parenthesis: stringsEl?.dataset.leftParenthesis || 'Left parenthesis',
        right_parenthesis: stringsEl?.dataset.rightParenthesis || 'Right parenthesis',
        asterisk: stringsEl?.dataset.asterisk || 'Asterisk',
        plus: stringsEl?.dataset.plus || 'Plus',
        comma: stringsEl?.dataset.comma || 'Comma',
        hyphen_minus: stringsEl?.dataset.hyphenMinus || 'Hyphen / Minus',
        period_dot: stringsEl?.dataset.periodDot || 'Period / Dot',
        slash: stringsEl?.dataset.slash || 'Slash',
        zero: stringsEl?.dataset.zero || 'Zero',
        one: stringsEl?.dataset.one || 'One',
        two: stringsEl?.dataset.two || 'Two',
        three: stringsEl?.dataset.three || 'Three',
        four: stringsEl?.dataset.four || 'Four',
        five: stringsEl?.dataset.five || 'Five',
        six: stringsEl?.dataset.six || 'Six',
        seven: stringsEl?.dataset.seven || 'Seven',
        eight: stringsEl?.dataset.eight || 'Eight',
        nine: stringsEl?.dataset.nine || 'Nine',
        colon: stringsEl?.dataset.colon || 'Colon',
        semicolon: stringsEl?.dataset.semicolon || 'Semicolon',
        less_than: stringsEl?.dataset.lessThan || 'Less than',
        equals: stringsEl?.dataset.equals || 'Equals',
        greater_than: stringsEl?.dataset.greaterThan || 'Greater than',
        question_mark: stringsEl?.dataset.questionMark || 'Question mark',
        at_sign: stringsEl?.dataset.atSign || 'At sign',
        left_bracket: stringsEl?.dataset.leftBracket || 'Left bracket',
        backslash: stringsEl?.dataset.backslash || 'Backslash',
        right_bracket: stringsEl?.dataset.rightBracket || 'Right bracket',
        caret: stringsEl?.dataset.caret || 'Caret',
        underscore: stringsEl?.dataset.underscore || 'Underscore',
        backtick: stringsEl?.dataset.backtick || 'Backtick',
        left_brace: stringsEl?.dataset.leftBrace || 'Left brace',
        pipe: stringsEl?.dataset.pipe || 'Pipe / Vertical bar',
        right_brace: stringsEl?.dataset.rightBrace || 'Right brace',
        tilde: stringsEl?.dataset.tilde || 'Tilde',
    };

    // ===== ASCII Data =====
    const CONTROL_NAMES = {
        0:'NUL (Null)',1:'SOH (Start of Heading)',2:'STX (Start of Text)',3:'ETX (End of Text)',
        4:'EOT (End of Transmission)',5:'ENQ (Enquiry)',6:'ACK (Acknowledge)',7:'BEL (Bell)',
        8:'BS (Backspace)',9:'HT (Horizontal Tab)',10:'LF (Line Feed)',11:'VT (Vertical Tab)',
        12:'FF (Form Feed)',13:'CR (Carriage Return)',14:'SO (Shift Out)',15:'SI (Shift In)',
        16:'DLE (Data Link Escape)',17:'DC1 (Device Control 1)',18:'DC2 (Device Control 2)',
        19:'DC3 (Device Control 3)',20:'DC4 (Device Control 4)',21:'NAK (Negative Acknowledge)',
        22:'SYN (Synchronous Idle)',23:'ETB (End of Trans. Block)',24:'CAN (Cancel)',
        25:'EM (End of Medium)',26:'SUB (Substitute)',27:'ESC (Escape)',28:'FS (File Separator)',
        29:'GS (Group Separator)',30:'RS (Record Separator)',31:'US (Unit Separator)',
        32:S.space,127:'DEL (Delete)'
    };

    const PRINTABLE_NAMES = {
        33:S.exclamation_mark,34:S.double_quote,35:S.hash_sign,36:S.dollar_sign,
        37:S.percent,38:S.ampersand,39:S.single_quote,40:S.left_parenthesis,41:S.right_parenthesis,
        42:S.asterisk,43:S.plus,44:S.comma,45:S.hyphen_minus,46:S.period_dot,47:S.slash,
        48:S.zero,49:S.one,50:S.two,51:S.three,52:S.four,53:S.five,54:S.six,55:S.seven,
        56:S.eight,57:S.nine,58:S.colon,59:S.semicolon,60:S.less_than,61:S.equals,
        62:S.greater_than,63:S.question_mark,64:S.at_sign,
        91:S.left_bracket,92:S.backslash,93:S.right_bracket,94:S.caret,95:S.underscore,96:S.backtick,
        123:S.left_brace,124:S.pipe,125:S.right_brace,126:S.tilde
    };

    const HTML_ENTITIES = {
        34:'&quot;',38:'&amp;',39:'&apos;',60:'&lt;',62:'&gt;',160:'&nbsp;'
    };

    function getCharData(code) {
        const hex = code.toString(16).toUpperCase().padStart(2, '0');
        const oct = code.toString(8).padStart(3, '0');
        const bin = code.toString(2).padStart(8, '0');
        const htmlEntity = HTML_ENTITIES[code] || `&#${code};`;

        let char, description, category;

        if (code <= 31 || code === 127) {
            const abbr = CONTROL_NAMES[code].split(' ')[0];
            char = abbr;
            description = CONTROL_NAMES[code];
            category = 'control';
        } else if (code === 32) {
            char = '␣';
            description = S.space;
            category = 'symbols';
        } else if (code >= 48 && code <= 57) {
            char = String.fromCharCode(code);
            description = PRINTABLE_NAMES[code] || `${S.digit} ${char}`;
            category = 'digits';
        } else if (code >= 65 && code <= 90) {
            char = String.fromCharCode(code);
            description = `${S.uppercase_letter} ${char}`;
            category = 'uppercase';
        } else if (code >= 97 && code <= 122) {
            char = String.fromCharCode(code);
            description = `${S.lowercase_letter} ${char}`;
            category = 'lowercase';
        } else {
            char = String.fromCharCode(code);
            description = PRINTABLE_NAMES[code] || `${S.character} ${char}`;
            category = 'symbols';
        }

        return { code, hex, oct, bin, char, htmlEntity, description, category };
    }

    // Build all 128 characters
    const allChars = [];
    for (let i = 0; i < 128; i++) {
        allChars.push(getCharData(i));
    }

    // ===== Table Rendering =====
    const tableBody = document.getElementById('ascii-table-body');
    const tableSearch = document.getElementById('table-search');
    const tableCount = document.getElementById('table-count');
    const filterBtns = document.querySelectorAll('.filter-btn');

    let currentFilter = 'all';

    function renderTable(filter, search) {
        let filtered = allChars;

        // Category filter
        if (filter !== 'all') {
            filtered = filtered.filter(c => c.category === filter);
        }

        // Search filter
        if (search) {
            const q = search.toLowerCase();
            filtered = filtered.filter(c =>
                c.code.toString() === q ||
                c.hex.toLowerCase() === q ||
                c.char.toLowerCase().includes(q) ||
                c.description.toLowerCase().includes(q) ||
                c.htmlEntity.toLowerCase().includes(q)
            );
        }

        const categoryColors = {
            control: 'text-red-400/70',
            digits: 'text-blue-400',
            uppercase: 'text-green-400',
            lowercase: 'text-emerald-400',
            symbols: 'text-yellow-400'
        };

        tableBody.innerHTML = filtered.map(c => {
            const charClass = categoryColors[c.category] || 'text-light';
            const isControl = c.category === 'control';
            return `<tr class="hover:bg-gold/5 transition-colors">
                <td class="px-3 py-2.5 font-mono text-light font-semibold">${c.code}</td>
                <td class="px-3 py-2.5 font-mono text-light-muted">0x${c.hex}</td>
                <td class="px-3 py-2.5 font-mono text-light-muted">${c.oct}</td>
                <td class="px-3 py-2.5 font-mono text-light-muted text-xs">${c.bin}</td>
                <td class="px-3 py-2.5 font-mono text-lg ${charClass} ${isControl ? 'text-xs' : 'font-bold'}">${escapeHtml(c.char)}</td>
                <td class="px-3 py-2.5 font-mono text-light-muted text-xs">${escapeHtml(c.htmlEntity)}</td>
                <td class="px-3 py-2.5 text-light-muted text-xs">${c.description}</td>
            </tr>`;
        }).join('');

        tableCount.textContent = S.showing_of.replace('{count}', filtered.length);
    }

    function escapeHtml(str) {
        const div = document.createElement('div');
        div.textContent = str;
        return div.innerHTML;
    }

    // Filter buttons
    filterBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            filterBtns.forEach(b => {
                b.classList.remove('bg-gold/20', 'border-gold', 'text-gold');
                b.classList.add('border-gold/20', 'text-light-muted');
            });
            this.classList.add('bg-gold/20', 'border-gold', 'text-gold');
            this.classList.remove('border-gold/20', 'text-light-muted');
            currentFilter = this.dataset.filter;
            renderTable(currentFilter, tableSearch.value.trim());
        });
    });

    // Search
    let searchTimer;
    tableSearch.addEventListener('input', function() {
        clearTimeout(searchTimer);
        searchTimer = setTimeout(() => {
            renderTable(currentFilter, this.value.trim());
        }, 200);
    });

    // ===== Text ↔ ASCII Converter =====
    const textInput = document.getElementById('text-input');
    const asciiOutput = document.getElementById('ascii-output');
    const outputFormat = document.getElementById('output-format');
    const btnCopyAscii = document.getElementById('btn-copy-ascii');
    const btnSwap = document.getElementById('btn-swap');
    const btnClear = document.getElementById('btn-clear-converter');

    function textToAscii(text) {
        const format = outputFormat.value;
        return text.split('').map(ch => {
            const code = ch.charCodeAt(0);
            switch (format) {
                case 'decimal': return code;
                case 'hex': return '0x' + code.toString(16).toUpperCase().padStart(2, '0');
                case 'binary': return code.toString(2).padStart(8, '0');
                case 'octal': return code.toString(8).padStart(3, '0');
                case 'html': return `&#${code};`;
                default: return code;
            }
        }).join(' ');
    }

    function asciiToText(input) {
        const parts = input.trim().split(/[\s,]+/).filter(Boolean);
        return parts.map(p => {
            let code;
            if (p.startsWith('0x') || p.startsWith('0X')) {
                code = parseInt(p, 16);
            } else if (p.startsWith('&#') && p.endsWith(';')) {
                code = parseInt(p.slice(2, -1));
            } else if (/^[01]{7,8}$/.test(p)) {
                code = parseInt(p, 2);
            } else {
                code = parseInt(p);
            }
            return (isNaN(code) || code < 0 || code > 127) ? '?' : String.fromCharCode(code);
        }).join('');
    }

    function updateConverter() {
        const text = textInput.value;
        if (!text) { asciiOutput.value = ''; return; }
        asciiOutput.value = textToAscii(text);
    }

    textInput.addEventListener('input', updateConverter);
    outputFormat.addEventListener('change', updateConverter);

    btnSwap.addEventListener('click', function() {
        const codes = asciiOutput.value.trim();
        if (!codes) return;
        const text = asciiToText(codes);
        textInput.value = text;
        asciiOutput.value = textToAscii(text);
    });

    btnCopyAscii.addEventListener('click', function() {
        const output = asciiOutput.value;
        if (!output) return;
        navigator.clipboard.writeText(output).then(() => {
            const orig = this.innerHTML;
            this.innerHTML = '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> ' + S.copied;
            this.classList.add('text-green-400', 'border-green-400');
            setTimeout(() => { this.innerHTML = orig; this.classList.remove('text-green-400', 'border-green-400'); }, 2000);
        });
    });

    btnClear.addEventListener('click', function() {
        textInput.value = '';
        asciiOutput.value = '';
    });

    // Initialize table
    renderTable('all', '');
})();
</script>
