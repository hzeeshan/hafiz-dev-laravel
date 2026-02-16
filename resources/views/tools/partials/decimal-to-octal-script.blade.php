<script>
(function() {
    const stringsEl = document.getElementById('tool-strings');
    const S = {
        dec_to_oct: stringsEl?.dataset.decToOct || 'Decimal → Octal',
        oct_to_dec: stringsEl?.dataset.octToDec || 'Octal → Decimal',
        decimal_input: stringsEl?.dataset.decimalInput || 'Decimal Input',
        octal_output: stringsEl?.dataset.octalOutput || 'Octal Output',
        octal_input: stringsEl?.dataset.octalInput || 'Octal Input',
        decimal_output: stringsEl?.dataset.decimalOutput || 'Decimal Output',
        decimal_placeholder: stringsEl?.dataset.decimalPlaceholder || 'Enter decimal numbers (e.g., 125, 511, 255)...',
        octal_placeholder: stringsEl?.dataset.octalPlaceholder || 'Octal result will appear here...',
        octal_input_placeholder: stringsEl?.dataset.octalInputPlaceholder || 'Enter octal numbers (e.g., 175, 777, 0o52)...',
        decimal_result_placeholder: stringsEl?.dataset.decimalResultPlaceholder || 'Decimal result will appear here...',
        nothing_to_copy: stringsEl?.dataset.nothingToCopy || 'Nothing to copy',
        copied: stringsEl?.dataset.copied || 'Copied!',
        converted_dec_to_oct: stringsEl?.dataset.convertedDecToOct || 'Converted {count} decimal value(s) to octal',
        converted_oct_to_dec: stringsEl?.dataset.convertedOctToDec || 'Converted {count} octal value(s) to decimal',
        invalid_decimal: stringsEl?.dataset.invalidDecimal || 'Invalid decimal value: "{value}" (must be a non-negative integer)',
        invalid_octal: stringsEl?.dataset.invalidOctal || 'Invalid octal value: "{value}" (digits must be 0-7)',
        step_by_step: stringsEl?.dataset.stepByStep || 'Step-by-Step Division Breakdown',
        step: stringsEl?.dataset.step || 'Step',
        division: stringsEl?.dataset.division || 'Division',
        quotient: stringsEl?.dataset.quotient || 'Quotient',
        remainder: stringsEl?.dataset.remainder || 'Remainder',
        read_remainders: stringsEl?.dataset.readRemainders || 'Read remainders bottom → top:',
        result: stringsEl?.dataset.result || 'Result:',
        sample_dec: stringsEl?.dataset.sampleDec || '125, 255, 493, 511',
        sample_oct: stringsEl?.dataset.sampleOct || '175, 377, 755, 777',
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

    let isDecimalToOctal = true;

    function decimalToOctal(dec) {
        const n = parseInt(dec, 10);
        if (isNaN(n) || n < 0 || dec !== String(n)) return null;
        return n.toString(8);
    }

    function octalToDecimal(oct) {
        if (!/^[0-7]+$/.test(oct)) return null;
        return parseInt(oct, 8);
    }

    function buildBreakdown(dec, oct) {
        const n = parseInt(dec, 10);
        if (n === 0) {
            return `<div class="text-light-muted">0 &divide; 8 = 0 ${S.remainder} <span class="text-gold font-bold">0</span></div>
                     <div class="mt-2 pt-2 border-t border-gold/10 text-light">${S.result} <span class="text-gold font-bold">0</span></div>`;
        }

        const steps = [];
        let current = n;
        let step = 1;
        while (current > 0) {
            const quotient = Math.floor(current / 8);
            const remainder = current % 8;
            steps.push({ step, dividend: current, quotient, remainder });
            current = quotient;
            step++;
        }

        let html = `<div class="overflow-x-auto"><table class="w-full text-sm">
            <thead><tr class="text-light-muted border-b border-gold/10">
                <th class="text-left py-2 px-3">${S.step}</th>
                <th class="text-left py-2 px-3">${S.division}</th>
                <th class="text-left py-2 px-3">${S.quotient}</th>
                <th class="text-left py-2 px-3">${S.remainder}</th>
            </tr></thead><tbody>`;

        for (const s of steps) {
            html += `<tr class="border-b border-gold/5">
                <td class="py-2 px-3 text-light-muted">${s.step}</td>
                <td class="py-2 px-3 text-light">${s.dividend} &divide; 8</td>
                <td class="py-2 px-3 text-light">${s.quotient}</td>
                <td class="py-2 px-3 text-gold font-bold">${s.remainder}</td>
            </tr>`;
        }

        html += `</tbody></table></div>`;
        html += `<div class="mt-3 pt-2 border-t border-gold/10 text-light text-sm">
            ${S.read_remainders} <span class="text-gold font-bold">${oct}</span>
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

        if (isDecimalToOctal) {
            let firstDec = null, firstOct = null;
            for (const val of values) {
                const oct = decimalToOctal(val);
                if (oct === null) {
                    showError(S.invalid_decimal.replace('{value}', val));
                    return;
                }
                if (!firstDec) { firstDec = val; firstOct = oct; }
                results.push(oct);
            }
            outputEl.value = results.join('\n');
            if (firstDec && values.length === 1) {
                breakdownContent.innerHTML = buildBreakdown(firstDec, firstOct);
                breakdown.classList.remove('hidden');
            } else {
                breakdown.classList.add('hidden');
            }
            showSuccess(S.converted_dec_to_oct.replace('{count}', values.length));
        } else {
            for (const val of values) {
                const cleaned = val.replace(/^0[oO]/, '');
                const dec = octalToDecimal(cleaned);
                if (dec === null) {
                    showError(S.invalid_octal.replace('{value}', val));
                    return;
                }
                results.push(dec);
            }
            outputEl.value = results.join('\n');
            breakdown.classList.add('hidden');
            showSuccess(S.converted_oct_to_dec.replace('{count}', values.length));
        }
    }

    function swapDirection() {
        isDecimalToOctal = !isDecimalToOctal;
        if (isDecimalToOctal) {
            directionLabel.innerHTML = '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path></svg> ' + S.dec_to_oct;
            inputLabel.textContent = S.decimal_input;
            outputLabel.textContent = S.octal_output;
            inputEl.placeholder = S.decimal_placeholder;
            outputEl.placeholder = S.octal_placeholder;
        } else {
            directionLabel.innerHTML = '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 17l-5-5m0 0l5-5m-5 5h12"></path></svg> ' + S.oct_to_dec;
            inputLabel.textContent = S.octal_input;
            outputLabel.textContent = S.decimal_output;
            inputEl.placeholder = S.octal_input_placeholder;
            outputEl.placeholder = S.decimal_result_placeholder;
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
        inputEl.value = isDecimalToOctal ? S.sample_dec : S.sample_oct;
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
