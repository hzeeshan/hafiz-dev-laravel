<script>
(function() {
    const stringsEl = document.getElementById('tool-strings');
    const S = {
        bin_to_oct: stringsEl?.dataset.binToOct || 'Binary → Octal',
        oct_to_bin: stringsEl?.dataset.octToBin || 'Octal → Binary',
        binary_input: stringsEl?.dataset.binaryInput || 'Binary Input',
        octal_output: stringsEl?.dataset.octalOutput || 'Octal Output',
        octal_input: stringsEl?.dataset.octalInput || 'Octal Input',
        binary_output: stringsEl?.dataset.binaryOutput || 'Binary Output',
        binary_placeholder: stringsEl?.dataset.binaryPlaceholder || 'Enter binary numbers (e.g., 11111101, 111111111, 0b1010)...',
        octal_placeholder: stringsEl?.dataset.octalPlaceholder || 'Octal result will appear here...',
        octal_input_placeholder: stringsEl?.dataset.octalInputPlaceholder || 'Enter octal numbers (e.g., 375, 777, 0o52)...',
        binary_result_placeholder: stringsEl?.dataset.binaryResultPlaceholder || 'Binary result will appear here...',
        nothing_to_copy: stringsEl?.dataset.nothingToCopy || 'Nothing to copy',
        copied: stringsEl?.dataset.copied || 'Copied!',
        converted_bin_to_oct: stringsEl?.dataset.convertedBinToOct || 'Converted {count} binary value(s) to octal',
        converted_oct_to_bin: stringsEl?.dataset.convertedOctToBin || 'Converted {count} octal value(s) to binary',
        invalid_binary: stringsEl?.dataset.invalidBinary || 'Invalid binary value: "{value}" (only 0 and 1 allowed)',
        invalid_octal: stringsEl?.dataset.invalidOctal || 'Invalid octal value: "{value}" (digits must be 0-7)',
        step_by_step: stringsEl?.dataset.stepByStep || 'Step-by-Step 3-Bit Grouping',
        padded_info: stringsEl?.dataset.paddedInfo || 'Binary padded to {bits} bits (multiple of 3)',
        group: stringsEl?.dataset.group || 'Group',
        three_bit_binary: stringsEl?.dataset.threeBitBinary || '3-Bit Binary',
        octal_digit: stringsEl?.dataset.octalDigit || 'Octal Digit',
        grouped: stringsEl?.dataset.grouped || 'Grouped:',
        sample_bin: stringsEl?.dataset.sampleBin || '11111101, 111111111, 1010, 11101101',
        sample_oct: stringsEl?.dataset.sampleOct || '375, 777, 12, 355',
    };

    const inputEl = document.getElementById('input-value');
    const outputEl = document.getElementById('output-value');
    const directionLabel = document.getElementById('direction-label');
    const inputLabel = document.getElementById('input-label');
    const outputLabel = document.getElementById('output-label');
    const btnSwap = document.getElementById('btn-swap');
    const btnCopy = document.getElementById('btn-copy');
    const btnSample = document.getElementById('btn-sample');
    const btnClear = document.getElementById('btn-clear');
    const breakdown = document.getElementById('breakdown');
    const breakdownContent = document.getElementById('breakdown-content');
    const successNotification = document.getElementById('success-notification');
    const successMessage = document.getElementById('success-message');
    const errorNotification = document.getElementById('error-notification');
    const errorMessage = document.getElementById('error-message');

    let isBinaryToOctal = true;

    const binToOct = { '000': '0', '001': '1', '010': '2', '011': '3', '100': '4', '101': '5', '110': '6', '111': '7' };
    const octToBin = { '0': '000', '1': '001', '2': '010', '3': '011', '4': '100', '5': '101', '6': '110', '7': '111' };

    function binaryToOctal(bin) {
        if (!/^[01]+$/.test(bin)) return null;
        while (bin.length % 3 !== 0) bin = '0' + bin;
        let result = '';
        for (let i = 0; i < bin.length; i += 3) {
            result += binToOct[bin.substring(i, i + 3)];
        }
        return result.replace(/^0+/, '') || '0';
    }

    function octalToBinary(oct) {
        if (!/^[0-7]+$/.test(oct)) return null;
        let result = '';
        for (const digit of oct) {
            result += octToBin[digit];
        }
        return result.replace(/^0+/, '') || '0';
    }

    function buildBreakdown(bin, oct) {
        let padded = bin;
        while (padded.length % 3 !== 0) padded = '0' + padded;

        const groups = [];
        for (let i = 0; i < padded.length; i += 3) {
            groups.push(padded.substring(i, i + 3));
        }

        let html = `<div class="mb-3 text-light-muted text-xs">${S.padded_info.replace('{bits}', padded.length)}</div>`;
        html += `<div class="overflow-x-auto"><table class="w-full text-sm">
            <thead><tr class="text-light-muted border-b border-gold/10">
                <th class="text-left py-2 px-3">${S.group}</th>
                <th class="text-left py-2 px-3">${S.three_bit_binary}</th>
                <th class="text-left py-2 px-3">${S.octal_digit}</th>
            </tr></thead><tbody>`;

        groups.forEach((group, i) => {
            html += `<tr class="border-b border-gold/5">
                <td class="py-2 px-3 text-light-muted">${i + 1}</td>
                <td class="py-2 px-3 text-light font-mono">${group}</td>
                <td class="py-2 px-3 text-gold font-bold font-mono">${binToOct[group]}</td>
            </tr>`;
        });

        html += `</tbody></table></div>`;
        html += `<div class="mt-3 pt-2 border-t border-gold/10">
            <div class="flex flex-wrap items-center gap-1 text-sm">
                <span class="text-light-muted">${S.grouped}</span>
                ${groups.map(g => `<span class="px-2 py-0.5 bg-gold/10 border border-gold/20 rounded text-gold font-mono">${g}</span>`).join(' ')}
                <span class="text-light-muted">&rarr;</span>
                <span class="text-gold font-bold font-mono">${oct}</span>
            </div>
        </div>`;

        return html;
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

        if (isBinaryToOctal) {
            let firstBin = null, firstOct = null;
            for (const val of values) {
                const cleaned = val.replace(/^0[bB]/, '');
                const oct = binaryToOctal(cleaned);
                if (oct === null) {
                    showError(S.invalid_binary.replace('{value}', val));
                    return;
                }
                if (!firstBin) { firstBin = cleaned; firstOct = oct; }
                results.push(oct);
            }
            outputEl.value = results.join('\n');
            if (firstBin && values.length === 1) {
                breakdownContent.innerHTML = buildBreakdown(firstBin, firstOct);
                breakdown.classList.remove('hidden');
            } else {
                breakdown.classList.add('hidden');
            }
            showSuccess(S.converted_bin_to_oct.replace('{count}', values.length));
        } else {
            for (const val of values) {
                const cleaned = val.replace(/^0[oO]/, '');
                const bin = octalToBinary(cleaned);
                if (bin === null) {
                    showError(S.invalid_octal.replace('{value}', val));
                    return;
                }
                results.push(bin);
            }
            outputEl.value = results.join('\n');
            breakdown.classList.add('hidden');
            showSuccess(S.converted_oct_to_bin.replace('{count}', values.length));
        }
    }

    function swapDirection() {
        isBinaryToOctal = !isBinaryToOctal;
        if (isBinaryToOctal) {
            directionLabel.innerHTML = '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path></svg> ' + S.bin_to_oct;
            inputLabel.textContent = S.binary_input;
            outputLabel.textContent = S.octal_output;
            inputEl.placeholder = S.binary_placeholder;
            outputEl.placeholder = S.octal_placeholder;
        } else {
            directionLabel.innerHTML = '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 17l-5-5m0 0l5-5m-5 5h12"></path></svg> ' + S.oct_to_bin;
            inputLabel.textContent = S.octal_input;
            outputLabel.textContent = S.binary_output;
            inputEl.placeholder = S.octal_input_placeholder;
            outputEl.placeholder = S.binary_result_placeholder;
        }
        const temp = inputEl.value;
        inputEl.value = outputEl.value;
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
        inputEl.value = isBinaryToOctal ? S.sample_bin : S.sample_oct;
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

    document.addEventListener('keydown', function(e) {
        if ((e.ctrlKey || e.metaKey) && e.key === 'Enter') { e.preventDefault(); convert(); }
    });
})();
</script>
