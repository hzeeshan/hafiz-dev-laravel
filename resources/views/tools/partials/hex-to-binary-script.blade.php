<script>
(function() {
    const stringsEl = document.getElementById('tool-strings');
    const S = {
        hex_to_binary: stringsEl?.dataset.hexToBinary || 'Hexadecimal → Binary',
        binary_to_hex: stringsEl?.dataset.binaryToHex || 'Binary → Hexadecimal',
        hex_input: stringsEl?.dataset.hexInput || 'Hexadecimal Input',
        binary_output: stringsEl?.dataset.binaryOutput || 'Binary Output',
        binary_input: stringsEl?.dataset.binaryInput || 'Binary Input',
        hex_output: stringsEl?.dataset.hexOutput || 'Hexadecimal Output',
        hex_placeholder: stringsEl?.dataset.hexPlaceholder || 'Enter hex values (e.g., FF, 2A, 0x1F4)...',
        binary_placeholder: stringsEl?.dataset.binaryPlaceholder || 'Binary result will appear here...',
        binary_input_placeholder: stringsEl?.dataset.binaryInputPlaceholder || 'Enter binary values (e.g., 11111111, 0b1010)...',
        hex_result_placeholder: stringsEl?.dataset.hexResultPlaceholder || 'Hex result will appear here...',
        nothing_to_copy: stringsEl?.dataset.nothingToCopy || 'Nothing to copy',
        copied: stringsEl?.dataset.copied || 'Copied!',
        converted_hex_to_bin: stringsEl?.dataset.convertedHexToBin || 'Converted {count} hex value(s) to binary',
        converted_bin_to_hex: stringsEl?.dataset.convertedBinToHex || 'Converted {count} binary value(s) to hex',
        invalid_hex: stringsEl?.dataset.invalidHex || 'Invalid hex value: "{value}"',
        invalid_binary: stringsEl?.dataset.invalidBinary || 'Invalid binary value: "{value}"',
        swap_direction: stringsEl?.dataset.swapDirection || 'Swap Direction',
        copy: stringsEl?.dataset.copy || 'Copy',
        sample: stringsEl?.dataset.sample || 'Sample',
        clear: stringsEl?.dataset.clear || 'Clear',
    };

    const hexInput = document.getElementById('hex-input');
    const binaryOutput = document.getElementById('binary-output');
    const directionLabel = document.getElementById('direction-label');
    const inputLabel = document.getElementById('input-label');
    const outputLabel = document.getElementById('output-label');
    const btnSwap = document.getElementById('btn-swap');
    const btnCopy = document.getElementById('btn-copy');
    const btnSample = document.getElementById('btn-sample');
    const btnClear = document.getElementById('btn-clear');
    const breakdown = document.getElementById('breakdown');
    const breakdownBody = document.getElementById('breakdown-body');
    const successNotification = document.getElementById('success-notification');
    const successMessage = document.getElementById('success-message');
    const errorNotification = document.getElementById('error-notification');
    const errorMessage = document.getElementById('error-message');

    let isHexToBinary = true;

    const hexToBinMap = {
        '0': '0000', '1': '0001', '2': '0010', '3': '0011',
        '4': '0100', '5': '0101', '6': '0110', '7': '0111',
        '8': '1000', '9': '1001', 'A': '1010', 'B': '1011',
        'C': '1100', 'D': '1101', 'E': '1110', 'F': '1111'
    };

    const binToHexMap = {};
    for (const [k, v] of Object.entries(hexToBinMap)) binToHexMap[v] = k;

    function convertHexToBinary() {
        const raw = hexInput.value.trim();
        if (!raw) {
            binaryOutput.value = '';
            breakdown.classList.add('hidden');
            return;
        }

        const values = raw.split(/[\s,\n]+/).filter(Boolean);
        const results = [];
        const allDigits = [];

        for (const val of values) {
            const cleaned = val.replace(/^0[xX]/, '').toUpperCase();
            if (!/^[0-9A-F]+$/.test(cleaned)) {
                showError(S.invalid_hex.replace('{value}', val));
                return;
            }

            let binary = '';
            for (const ch of cleaned) {
                binary += hexToBinMap[ch];
                allDigits.push({ hex: ch, decimal: parseInt(ch, 16), binary: hexToBinMap[ch] });
            }
            results.push(binary);
        }

        binaryOutput.value = results.join(' ');

        breakdownBody.innerHTML = allDigits.map(d =>
            `<tr class="hover:bg-gold/5 transition-colors">
                <td class="px-4 py-2 font-mono text-lg text-gold font-bold">${d.hex}</td>
                <td class="px-4 py-2 font-mono text-light-muted">${d.decimal}</td>
                <td class="px-4 py-2 font-mono text-light-muted">${d.binary}</td>
            </tr>`
        ).join('');
        breakdown.classList.remove('hidden');

        showSuccess(S.converted_hex_to_bin.replace('{count}', values.length));
    }

    function convertBinaryToHex() {
        const raw = hexInput.value.trim();
        if (!raw) {
            binaryOutput.value = '';
            breakdown.classList.add('hidden');
            return;
        }

        const values = raw.split(/[\s,\n]+/).filter(Boolean);
        const results = [];

        for (const val of values) {
            const cleaned = val.replace(/^0[bB]/, '');
            if (!/^[01]+$/.test(cleaned)) {
                showError(S.invalid_binary.replace('{value}', val));
                return;
            }

            const padded = cleaned.padStart(Math.ceil(cleaned.length / 4) * 4, '0');
            let hex = '';
            for (let i = 0; i < padded.length; i += 4) {
                const nibble = padded.substring(i, i + 4);
                hex += binToHexMap[nibble] || '?';
            }
            results.push(hex);
        }

        binaryOutput.value = results.join(' ');
        breakdown.classList.add('hidden');

        showSuccess(S.converted_bin_to_hex.replace('{count}', values.length));
    }

    function convert() {
        if (isHexToBinary) {
            convertHexToBinary();
        } else {
            convertBinaryToHex();
        }
    }

    function swapDirection() {
        isHexToBinary = !isHexToBinary;
        if (isHexToBinary) {
            directionLabel.innerHTML = '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path></svg> ' + S.hex_to_binary;
            inputLabel.textContent = S.hex_input;
            outputLabel.textContent = S.binary_output;
            hexInput.placeholder = S.hex_placeholder;
            binaryOutput.placeholder = S.binary_placeholder;
        } else {
            directionLabel.innerHTML = '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 17l-5-5m0 0l5-5m-5 5h12"></path></svg> ' + S.binary_to_hex;
            inputLabel.textContent = S.binary_input;
            outputLabel.textContent = S.hex_output;
            hexInput.placeholder = S.binary_input_placeholder;
            binaryOutput.placeholder = S.hex_result_placeholder;
        }
        const temp = hexInput.value;
        hexInput.value = binaryOutput.value;
        binaryOutput.value = '';
        breakdown.classList.add('hidden');
        if (hexInput.value) convert();
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

    // Event listeners
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
        if (isHexToBinary) {
            hexInput.value = 'FF 2A 0x1F4 DEADBEEF';
        } else {
            hexInput.value = '11111111 00101010 0001111101000';
        }
        binaryOutput.value = '';
        breakdown.classList.add('hidden');
        convert();
    });

    btnClear.addEventListener('click', function() {
        hexInput.value = '';
        binaryOutput.value = '';
        breakdown.classList.add('hidden');
        successNotification.classList.add('hidden');
        errorNotification.classList.add('hidden');
    });

    // Real-time conversion
    let debounceTimer;
    hexInput.addEventListener('input', function() {
        clearTimeout(debounceTimer);
        debounceTimer = setTimeout(convert, 300);
    });

    // Keyboard shortcut
    document.addEventListener('keydown', function(e) {
        if ((e.ctrlKey || e.metaKey) && e.key === 'Enter') { e.preventDefault(); convert(); }
    });
})();
</script>
