<script>
(function() {
    const stringsEl = document.getElementById('tool-strings');
    const S = {
        text_to_binary: stringsEl?.dataset.textToBinary || 'Text → Binary',
        binary_to_text: stringsEl?.dataset.binaryToText || 'Binary → Text',
        text_input: stringsEl?.dataset.textInput || 'Text Input',
        binary_output: stringsEl?.dataset.binaryOutput || 'Binary Output',
        binary_input: stringsEl?.dataset.binaryInput || 'Binary Input',
        text_output: stringsEl?.dataset.textOutput || 'Text Output',
        text_placeholder: stringsEl?.dataset.textPlaceholder || 'Type or paste your text here...',
        binary_placeholder: stringsEl?.dataset.binaryPlaceholder || 'Binary code will appear here...',
        binary_input_placeholder: stringsEl?.dataset.binaryInputPlaceholder || 'Paste binary code here (e.g., 01001000 01101001)...',
        decoded_placeholder: stringsEl?.dataset.decodedPlaceholder || 'Decoded text will appear here...',
        nothing_to_copy: stringsEl?.dataset.nothingToCopy || 'Nothing to copy',
        copied: stringsEl?.dataset.copied || 'Copied!',
        converted_chars: stringsEl?.dataset.convertedChars || 'Converted {count} characters to {format}',
        converted_bytes: stringsEl?.dataset.convertedBytes || 'Converted {count} bytes to text',
        invalid_input: stringsEl?.dataset.invalidInput || 'Invalid input: ',
    };

    // DOM Elements
    const textInput = document.getElementById('text-input');
    const binaryOutput = document.getElementById('binary-output');
    const encoding = document.getElementById('encoding');
    const separatorSelect = document.getElementById('separator');
    const outputFormat = document.getElementById('output-format');
    const addPrefix = document.getElementById('add-prefix');
    const directionLabel = document.getElementById('direction-label');
    const inputLabel = document.getElementById('input-label');
    const outputLabel = document.getElementById('output-label');
    const btnConvert = document.getElementById('btn-convert');
    const btnSwap = document.getElementById('btn-swap');
    const btnCopy = document.getElementById('btn-copy');
    const btnSample = document.getElementById('btn-sample');
    const btnClear = document.getElementById('btn-clear');
    const statsBar = document.getElementById('stats-bar');
    const breakdown = document.getElementById('breakdown');
    const breakdownBody = document.getElementById('breakdown-body');
    const successNotification = document.getElementById('success-notification');
    const successMessage = document.getElementById('success-message');
    const errorNotification = document.getElementById('error-notification');
    const errorMessage = document.getElementById('error-message');

    let isTextToBinary = true;

    // ===== Conversion Functions =====

    function textToBytes(text, enc) {
        if (enc === 'utf8') {
            return new TextEncoder().encode(text);
        }
        // ASCII
        return Uint8Array.from(text.split('').map(c => {
            const code = c.charCodeAt(0);
            return code > 127 ? 63 : code; // Replace non-ASCII with '?'
        }));
    }

    function formatByte(byte, format, prefix) {
        switch (format) {
            case 'binary':
                return (prefix ? '0b' : '') + byte.toString(2).padStart(8, '0');
            case 'decimal':
                return byte.toString(10);
            case 'hex':
                return (prefix ? '0x' : '') + byte.toString(16).toUpperCase().padStart(2, '0');
            case 'octal':
                return (prefix ? '0o' : '') + byte.toString(8).padStart(3, '0');
            default:
                return byte.toString(2).padStart(8, '0');
        }
    }

    function getSeparator() {
        const val = separatorSelect.value;
        if (val === '\\n') return '\n';
        return val;
    }

    function convertTextToBinary() {
        const text = textInput.value;
        if (!text) {
            binaryOutput.value = '';
            statsBar.classList.add('hidden');
            breakdown.classList.add('hidden');
            return;
        }

        const bytes = textToBytes(text, encoding.value);
        const format = outputFormat.value;
        const prefix = addPrefix.checked;
        const sep = getSeparator();

        const formatted = Array.from(bytes).map(b => formatByte(b, format, prefix));
        binaryOutput.value = formatted.join(sep);

        // Stats
        document.getElementById('stat-chars').textContent = [...text].length;
        document.getElementById('stat-bytes').textContent = bytes.length;
        document.getElementById('stat-bits').textContent = bytes.length * 8;
        document.getElementById('stat-encoding').textContent = encoding.value === 'utf8' ? 'UTF-8' : 'ASCII';
        statsBar.classList.remove('hidden');

        // Breakdown table (first 50 chars)
        const chars = [...text].slice(0, 50);
        breakdownBody.innerHTML = chars.map(ch => {
            const charBytes = textToBytes(ch, encoding.value);
            const dec = Array.from(charBytes).map(b => b).join(' ');
            const hex = Array.from(charBytes).map(b => b.toString(16).toUpperCase().padStart(2, '0')).join(' ');
            const oct = Array.from(charBytes).map(b => b.toString(8).padStart(3, '0')).join(' ');
            const bin = Array.from(charBytes).map(b => b.toString(2).padStart(8, '0')).join(' ');
            const display = ch === ' ' ? '␣' : ch === '\n' ? '↵' : ch === '\t' ? '⇥' : ch;
            return `<tr class="hover:bg-gold/5 transition-colors">
                <td class="px-3 py-2 font-mono text-lg text-gold font-bold">${escapeHtml(display)}</td>
                <td class="px-3 py-2 font-mono text-light-muted">${dec}</td>
                <td class="px-3 py-2 font-mono text-light-muted">${hex}</td>
                <td class="px-3 py-2 font-mono text-light-muted">${oct}</td>
                <td class="px-3 py-2 font-mono text-light-muted text-xs">${bin}</td>
            </tr>`;
        }).join('');
        breakdown.classList.remove('hidden');

        showSuccess(S.converted_chars.replace('{count}', [...text].length).replace('{format}', format));
    }

    function convertBinaryToText() {
        const input = textInput.value.trim();
        if (!input) {
            binaryOutput.value = '';
            statsBar.classList.add('hidden');
            breakdown.classList.add('hidden');
            return;
        }

        try {
            // Parse input — detect format from current output format setting
            const parts = input.split(/[\s,]+/).filter(Boolean);
            const bytes = parts.map(p => {
                // Strip known prefixes
                let cleaned = p.replace(/^0[bBxXoO]/, '');

                // Detect format
                if (/^[01]{1,8}$/.test(cleaned)) {
                    return parseInt(cleaned, 2);
                } else if (/^[0-9a-fA-F]{1,2}$/.test(cleaned) && (p.startsWith('0x') || p.startsWith('0X'))) {
                    return parseInt(cleaned, 16);
                } else if (/^[0-7]{1,3}$/.test(cleaned) && (p.startsWith('0o') || p.startsWith('0O'))) {
                    return parseInt(cleaned, 8);
                } else if (/^[0-9]{1,3}$/.test(cleaned)) {
                    return parseInt(cleaned, 10);
                } else if (/^[0-9a-fA-F]{2}$/.test(cleaned)) {
                    return parseInt(cleaned, 16);
                } else if (/^[01]{8}$/.test(p)) {
                    return parseInt(p, 2);
                }
                throw new Error(`Invalid value: "${p}"`);
            });

            // Validate bytes
            for (const b of bytes) {
                if (isNaN(b) || b < 0 || b > 255) {
                    throw new Error('Values must be between 0 and 255');
                }
            }

            let text;
            if (encoding.value === 'utf8') {
                text = new TextDecoder('utf-8').decode(new Uint8Array(bytes));
            } else {
                text = bytes.map(b => String.fromCharCode(b)).join('');
            }

            binaryOutput.value = text;

            // Stats
            document.getElementById('stat-chars').textContent = [...text].length;
            document.getElementById('stat-bytes').textContent = bytes.length;
            document.getElementById('stat-bits').textContent = bytes.length * 8;
            document.getElementById('stat-encoding').textContent = encoding.value === 'utf8' ? 'UTF-8' : 'ASCII';
            statsBar.classList.remove('hidden');
            breakdown.classList.add('hidden');

            showSuccess(S.converted_bytes.replace('{count}', bytes.length));
        } catch (e) {
            showError(S.invalid_input + e.message);
        }
    }

    function convert() {
        if (isTextToBinary) {
            convertTextToBinary();
        } else {
            convertBinaryToText();
        }
    }

    function swapDirection() {
        isTextToBinary = !isTextToBinary;
        if (isTextToBinary) {
            directionLabel.innerHTML = '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path></svg> ' + S.text_to_binary;
            inputLabel.textContent = S.text_input;
            outputLabel.textContent = S.binary_output;
            textInput.placeholder = S.text_placeholder;
            binaryOutput.placeholder = S.binary_placeholder;
        } else {
            directionLabel.innerHTML = '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 17l-5-5m0 0l5-5m-5 5h12"></path></svg> ' + S.binary_to_text;
            inputLabel.textContent = S.binary_input;
            outputLabel.textContent = S.text_output;
            textInput.placeholder = S.binary_input_placeholder;
            binaryOutput.placeholder = S.decoded_placeholder;
        }
        // Swap contents
        const temp = textInput.value;
        textInput.value = binaryOutput.value;
        binaryOutput.value = '';
        statsBar.classList.add('hidden');
        breakdown.classList.add('hidden');
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

    // ===== Event Listeners =====
    btnConvert.addEventListener('click', convert);
    btnSwap.addEventListener('click', swapDirection);

    btnCopy.addEventListener('click', function() {
        const output = binaryOutput.value;
        if (!output) { showError(S.nothing_to_copy); return; }
        navigator.clipboard.writeText(output).then(() => {
            const orig = this.innerHTML;
            this.innerHTML = '<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> ' + S.copied;
            this.classList.add('text-green-400', 'border-green-400');
            setTimeout(() => { this.innerHTML = orig; this.classList.remove('text-green-400', 'border-green-400'); }, 2000);
        });
    });

    btnSample.addEventListener('click', function() {
        if (isTextToBinary) {
            textInput.value = 'Hello, World! 🌍';
        } else {
            textInput.value = '01001000 01100101 01101100 01101100 01101111';
        }
        binaryOutput.value = '';
        statsBar.classList.add('hidden');
        breakdown.classList.add('hidden');
    });

    btnClear.addEventListener('click', function() {
        textInput.value = '';
        binaryOutput.value = '';
        statsBar.classList.add('hidden');
        breakdown.classList.add('hidden');
        successNotification.classList.add('hidden');
        errorNotification.classList.add('hidden');
    });

    // Real-time conversion
    let debounceTimer;
    textInput.addEventListener('input', function() {
        clearTimeout(debounceTimer);
        debounceTimer = setTimeout(convert, 300);
    });

    // Re-convert on option change
    [encoding, separatorSelect, outputFormat, addPrefix].forEach(el => {
        el.addEventListener('change', () => { if (textInput.value) convert(); });
    });

    // Keyboard shortcut
    document.addEventListener('keydown', function(e) {
        if ((e.ctrlKey || e.metaKey) && e.key === 'Enter') { e.preventDefault(); convert(); }
    });
})();
</script>
