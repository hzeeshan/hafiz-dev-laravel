<script>
(function() {
    const stringsEl = document.getElementById('tool-strings');
    const S = {
        dec_to_bin: stringsEl?.dataset.decToBin || 'Decimal → Binary',
        bin_to_dec: stringsEl?.dataset.binToDec || 'Binary → Decimal',
        decimal_input: stringsEl?.dataset.decimalInput || 'Decimal Input',
        binary_output: stringsEl?.dataset.binaryOutput || 'Binary Output',
        binary_input: stringsEl?.dataset.binaryInput || 'Binary Input',
        decimal_output: stringsEl?.dataset.decimalOutput || 'Decimal Output',
        decimal_placeholder: stringsEl?.dataset.decimalPlaceholder || 'Enter decimal numbers (e.g., 42, 255, 1024)...',
        binary_placeholder: stringsEl?.dataset.binaryPlaceholder || 'Binary result will appear here...',
        binary_input_placeholder: stringsEl?.dataset.binaryInputPlaceholder || 'Enter binary numbers (e.g., 101010, 11111111)...',
        decimal_result_placeholder: stringsEl?.dataset.decimalResultPlaceholder || 'Decimal result will appear here...',
        nothing_to_copy: stringsEl?.dataset.nothingToCopy || 'Nothing to copy',
        copied: stringsEl?.dataset.copied || 'Copied!',
        converted_dec_to_bin: stringsEl?.dataset.convertedDecToBin || 'Converted {count} decimal value(s) to binary',
        converted_bin_to_dec: stringsEl?.dataset.convertedBinToDec || 'Converted {count} binary value(s) to decimal',
        invalid_decimal: stringsEl?.dataset.invalidDecimal || 'Invalid decimal value: "{value}" (must be a non-negative integer)',
        invalid_binary: stringsEl?.dataset.invalidBinary || 'Invalid binary value: "{value}" (digits must be 0 or 1)',
        no_padding: stringsEl?.dataset.noPadding || 'No padding',
        group_nibbles: stringsEl?.dataset.groupNibbles || 'Group in 4-bit nibbles',
        pad_to: stringsEl?.dataset.padTo || 'Pad to:',
        step_by_step: stringsEl?.dataset.stepByStep || 'Step-by-Step Division Method',
        step: stringsEl?.dataset.step || 'Step',
        division: stringsEl?.dataset.division || 'Division',
        quotient: stringsEl?.dataset.quotient || 'Quotient',
        remainder: stringsEl?.dataset.remainder || 'Remainder',
        read_remainders: stringsEl?.dataset.readRemainders || 'Read remainders bottom → top:',
        sample_dec: stringsEl?.dataset.sampleDec || '42, 255, 1024, 65535',
        sample_bin: stringsEl?.dataset.sampleBin || '101010, 11111111, 10000000000',
    };

    const inputEl = document.getElementById('input-value');
    const outputEl = document.getElementById('output-value');
    const directionLabel = document.getElementById('direction-label');
    const inputLabel = document.getElementById('input-label');
    const outputLabel = document.getElementById('output-label');
    const bitLength = document.getElementById('bit-length');
    const groupBits = document.getElementById('group-bits');
    const btnSwap = document.getElementById('btn-swap');
    const btnCopy = document.getElementById('btn-copy');
    const btnSample = document.getElementById('btn-sample');
    const btnClear = document.getElementById('btn-clear');
    const breakdown = document.getElementById('breakdown');
    const breakdownBody = document.getElementById('breakdown-body');
    const breakdownResult = document.getElementById('breakdown-result');
    const successNotification = document.getElementById('success-notification');
    const successMessage = document.getElementById('success-message');
    const errorNotification = document.getElementById('error-notification');
    const errorMessage = document.getElementById('error-message');

    let isDecToBin = true;

    function formatBinary(bin) {
        const pad = parseInt(bitLength.value);
        if (pad > 0 && bin.length < pad) {
            bin = bin.padStart(pad, '0');
        } else if (pad > 0) {
            bin = bin.padStart(Math.ceil(bin.length / pad) * pad, '0');
        }
        if (groupBits.checked && bin.length > 4) {
            const padded = bin.padStart(Math.ceil(bin.length / 4) * 4, '0');
            return padded.match(/.{4}/g).join(' ');
        }
        return bin;
    }

    function decToBin(dec) {
        const n = parseInt(dec, 10);
        if (isNaN(n) || n < 0 || dec !== String(n)) return null;
        return n.toString(2);
    }

    function binToDec(bin) {
        const cleaned = bin.replace(/\s+/g, '').replace(/^0[bB]/, '');
        if (!/^[01]+$/.test(cleaned)) return null;
        return parseInt(cleaned, 2);
    }

    function buildDivisionBreakdown(dec) {
        let n = parseInt(dec, 10);
        if (n === 0) {
            breakdownBody.innerHTML = '<tr class="hover:bg-gold/5"><td class="px-4 py-2 font-mono text-gold">1</td><td class="px-4 py-2 font-mono text-light-muted">0 ÷ 2</td><td class="px-4 py-2 font-mono text-light">0</td><td class="px-4 py-2 font-mono text-gold font-bold">0</td></tr>';
            breakdownResult.innerHTML = S.read_remainders + ' <span class="text-gold font-mono font-bold">0</span>';
            return;
        }
        const steps = [];
        let step = 1;
        while (n > 0) {
            const q = Math.floor(n / 2);
            const r = n % 2;
            steps.push({ step, n, q, r });
            n = q;
            step++;
        }
        breakdownBody.innerHTML = steps.map(s =>
            `<tr class="hover:bg-gold/5 transition-colors">
                <td class="px-4 py-2 font-mono text-gold">${s.step}</td>
                <td class="px-4 py-2 font-mono text-light-muted">${s.n} ÷ 2</td>
                <td class="px-4 py-2 font-mono text-light">${s.q}</td>
                <td class="px-4 py-2 font-mono text-gold font-bold">${s.r}</td>
            </tr>`
        ).join('');
        const binary = steps.map(s => s.r).reverse().join('');
        breakdownResult.innerHTML = S.read_remainders + ` <span class="text-gold font-mono font-bold">${binary}</span>`;
    }

    function convert() {
        const raw = inputEl.value.trim();
        if (!raw) {
            outputEl.value = '';
            breakdown.classList.add('hidden');
            return;
        }

        const values = raw.split(/[\s,\n]+/).filter(Boolean);
        const results = [];

        if (isDecToBin) {
            for (const val of values) {
                const bin = decToBin(val);
                if (bin === null) {
                    showError(S.invalid_decimal.replace('{value}', val));
                    return;
                }
                results.push(formatBinary(bin));
            }
            outputEl.value = results.join('\n');
            if (values.length === 1) {
                buildDivisionBreakdown(values[0]);
                breakdown.classList.remove('hidden');
            } else {
                breakdown.classList.add('hidden');
            }
            showSuccess(S.converted_dec_to_bin.replace('{count}', values.length));
        } else {
            for (const val of values) {
                const dec = binToDec(val);
                if (dec === null) {
                    showError(S.invalid_binary.replace('{value}', val));
                    return;
                }
                results.push(dec);
            }
            outputEl.value = results.join('\n');
            breakdown.classList.add('hidden');
            showSuccess(S.converted_bin_to_dec.replace('{count}', values.length));
        }
    }

    function swapDirection() {
        isDecToBin = !isDecToBin;
        if (isDecToBin) {
            directionLabel.innerHTML = '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path></svg> ' + S.dec_to_bin;
            inputLabel.textContent = S.decimal_input;
            outputLabel.textContent = S.binary_output;
            inputEl.placeholder = S.decimal_placeholder;
            outputEl.placeholder = S.binary_placeholder;
        } else {
            directionLabel.innerHTML = '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 17l-5-5m0 0l5-5m-5 5h12"></path></svg> ' + S.bin_to_dec;
            inputLabel.textContent = S.binary_input;
            outputLabel.textContent = S.decimal_output;
            inputEl.placeholder = S.binary_input_placeholder;
            outputEl.placeholder = S.decimal_result_placeholder;
        }
        const temp = inputEl.value;
        inputEl.value = outputEl.value ? outputEl.value.replace(/ /g, '') : '';
        outputEl.value = '';
        breakdown.classList.add('hidden');
        if (inputEl.value) convert();
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

    btnSwap.addEventListener('click', swapDirection);

    btnCopy.addEventListener('click', function() {
        const output = outputEl.value;
        if (!output) { showError(S.nothing_to_copy); return; }
        navigator.clipboard.writeText(output).then(() => {
            const orig = this.innerHTML;
            this.innerHTML = '<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> ' + S.copied;
            this.classList.add('text-green-400', 'border-green-400');
            setTimeout(() => { this.innerHTML = orig; this.classList.remove('text-green-400', 'border-green-400'); }, 2000);
        });
    });

    btnSample.addEventListener('click', function() {
        inputEl.value = isDecToBin ? S.sample_dec : S.sample_bin;
        outputEl.value = '';
        breakdown.classList.add('hidden');
        convert();
    });

    btnClear.addEventListener('click', function() {
        inputEl.value = '';
        outputEl.value = '';
        breakdown.classList.add('hidden');
        successNotification.classList.add('hidden');
        errorNotification.classList.add('hidden');
    });

    let debounceTimer;
    inputEl.addEventListener('input', function() {
        clearTimeout(debounceTimer);
        debounceTimer = setTimeout(convert, 300);
    });

    [bitLength, groupBits].forEach(el => {
        el.addEventListener('change', () => { if (inputEl.value && isDecToBin) convert(); });
    });

    document.addEventListener('keydown', function(e) {
        if ((e.ctrlKey || e.metaKey) && e.key === 'Enter') { e.preventDefault(); convert(); }
    });
})();
</script>
