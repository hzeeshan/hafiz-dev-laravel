<script>
(function() {
    const stringsEl = document.getElementById('tool-strings');
    const S = {
        octal_to_decimal: stringsEl?.dataset.octalToDecimal || 'Octal → Decimal',
        decimal_to_octal: stringsEl?.dataset.decimalToOctal || 'Decimal → Octal',
        octal_input: stringsEl?.dataset.octalInput || 'Octal Input',
        decimal_output: stringsEl?.dataset.decimalOutput || 'Decimal Output',
        decimal_input: stringsEl?.dataset.decimalInput || 'Decimal Input',
        octal_output: stringsEl?.dataset.octalOutput || 'Octal Output',
        octal_placeholder: stringsEl?.dataset.octalPlaceholder || 'Enter octal numbers (e.g., 175, 777, 0o52)...',
        decimal_placeholder: stringsEl?.dataset.decimalPlaceholder || 'Decimal result will appear here...',
        decimal_input_placeholder: stringsEl?.dataset.decimalInputPlaceholder || 'Enter decimal numbers (e.g., 125, 511, 255)...',
        octal_result_placeholder: stringsEl?.dataset.octalResultPlaceholder || 'Octal result will appear here...',
        nothing_to_copy: stringsEl?.dataset.nothingToCopy || 'Nothing to copy',
        copied: stringsEl?.dataset.copied || 'Copied!',
        converted_oct_to_dec: stringsEl?.dataset.convertedOctToDec || 'Converted {count} octal value(s) to decimal',
        converted_dec_to_oct: stringsEl?.dataset.convertedDecToOct || 'Converted {count} decimal value(s) to octal',
        invalid_octal: stringsEl?.dataset.invalidOctal || 'Invalid octal value: "{value}" (digits must be 0-7)',
        invalid_decimal: stringsEl?.dataset.invalidDecimal || 'Invalid decimal value: "{value}" (must be a non-negative integer)',
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

    let isOctalToDecimal = true;

    function octalToDecimal(oct) {
        if (!/^[0-7]+$/.test(oct)) return null;
        return parseInt(oct, 8);
    }

    function decimalToOctal(dec) {
        const n = parseInt(dec, 10);
        if (isNaN(n) || n < 0 || dec !== String(n)) return null;
        return n.toString(8);
    }

    function buildBreakdown(oct, dec) {
        const digits = oct.split('');
        const len = digits.length;
        const parts = digits.map((d, i) => {
            const pos = len - 1 - i;
            const val = parseInt(d) * Math.pow(8, pos);
            return `<span class="text-light-muted">(</span><span class="text-gold">${d}</span> <span class="text-light-muted">×</span> 8<sup>${pos}</sup><span class="text-light-muted">)</span> = <span class="text-light">${val}</span>`;
        });
        return `<div class="space-y-1">${parts.map(p => `<div>${p}</div>`).join('')}</div>
                <div class="mt-2 pt-2 border-t border-gold/10 text-light">
                    ${parts.map((_, i) => { const d = digits[i]; const pos = len-1-i; return parseInt(d)*Math.pow(8,pos); }).join(' + ')} = <span class="text-gold font-bold">${dec}</span>
                </div>`;
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

        if (isOctalToDecimal) {
            let firstOct = null, firstDec = null;
            for (const val of values) {
                const cleaned = val.replace(/^0[oO]/, '');
                const dec = octalToDecimal(cleaned);
                if (dec === null) {
                    showError(S.invalid_octal.replace('{value}', val));
                    return;
                }
                if (!firstOct) { firstOct = cleaned; firstDec = dec; }
                results.push(dec);
            }
            outputEl.value = results.join('\n');
            if (firstOct && values.length === 1) {
                breakdownContent.innerHTML = buildBreakdown(firstOct, firstDec);
                breakdown.classList.remove('hidden');
            } else {
                breakdown.classList.add('hidden');
            }
            showSuccess(S.converted_oct_to_dec.replace('{count}', values.length));
        } else {
            for (const val of values) {
                const oct = decimalToOctal(val);
                if (oct === null) {
                    showError(S.invalid_decimal.replace('{value}', val));
                    return;
                }
                results.push(oct);
            }
            outputEl.value = results.join('\n');
            breakdown.classList.add('hidden');
            showSuccess(S.converted_dec_to_oct.replace('{count}', values.length));
        }
    }

    function swapDirection() {
        isOctalToDecimal = !isOctalToDecimal;
        if (isOctalToDecimal) {
            directionLabel.innerHTML = '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path></svg> ' + S.octal_to_decimal;
            inputLabel.textContent = S.octal_input;
            outputLabel.textContent = S.decimal_output;
            inputEl.placeholder = S.octal_placeholder;
            outputEl.placeholder = S.decimal_placeholder;
        } else {
            directionLabel.innerHTML = '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 17l-5-5m0 0l5-5m-5 5h12"></path></svg> ' + S.decimal_to_octal;
            inputLabel.textContent = S.decimal_input;
            outputLabel.textContent = S.octal_output;
            inputEl.placeholder = S.decimal_input_placeholder;
            outputEl.placeholder = S.octal_result_placeholder;
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
        inputEl.value = isOctalToDecimal ? '175, 777, 755, 644' : '125, 511, 493, 420';
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
