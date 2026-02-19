<script>
(function() {
    'use strict';

    // DOM elements
    var currencySelect = document.getElementById('opt-currency');
    var decimalsSelect = document.getElementById('opt-decimals');
    var taxInput = document.getElementById('opt-tax');
    var inputPrice = document.getElementById('input-price');
    var inputDiscount1 = document.getElementById('input-discount1');
    var inputDiscount2 = document.getElementById('input-discount2');
    var currencyPrefix = document.getElementById('currency-prefix');
    var btnCalculate = document.getElementById('btn-calculate');
    var btnSample = document.getElementById('btn-sample');
    var btnCopy = document.getElementById('btn-copy');
    var btnDownload = document.getElementById('btn-download');
    var btnClear = document.getElementById('btn-clear');
    var copyText = document.getElementById('copy-text');
    var copyIcon = document.getElementById('copy-icon');
    var resultsSection = document.getElementById('results-section');
    var statsBar = document.getElementById('stats-bar');
    var successNotification = document.getElementById('success-notification');
    var successMessage = document.getElementById('success-message');
    var errorNotification = document.getElementById('error-notification');
    var errorMessage = document.getElementById('error-message');

    function getCurrencySymbol() {
        return currencySelect.value;
    }

    function getDecimals() {
        return parseInt(decimalsSelect.value) || 2;
    }

    function formatMoney(amount, sym) {
        var decimals = getDecimals();
        if (sym === '¥' && decimals > 0) decimals = 0;
        return sym + amount.toFixed(decimals);
    }

    function showSuccess(msg) {
        successMessage.textContent = msg;
        successNotification.classList.remove('hidden');
        errorNotification.classList.add('hidden');
        setTimeout(function() { successNotification.classList.add('hidden'); }, 3000);
    }

    function showError(msg) {
        errorMessage.textContent = msg;
        errorNotification.classList.remove('hidden');
        successNotification.classList.add('hidden');
        setTimeout(function() { errorNotification.classList.add('hidden'); }, 5000);
    }

    function calculate() {
        var price = parseFloat(inputPrice.value);
        if (!price || price <= 0) {
            showError('Please enter a valid original price greater than 0.');
            return;
        }

        var d1 = parseFloat(inputDiscount1.value) || 0;
        var d2 = parseFloat(inputDiscount2.value) || 0;
        var taxRate = parseFloat(taxInput.value) || 0;
        var sym = getCurrencySymbol();

        if (d1 < 0 || d1 > 100 || d2 < 0 || d2 > 100) {
            showError('Discount percentages must be between 0 and 100.');
            return;
        }

        if (taxRate < 0 || taxRate > 100) {
            showError('Tax rate must be between 0 and 100.');
            return;
        }

        // Calculate step by step
        var d1Amount = price * (d1 / 100);
        var afterD1 = price - d1Amount;
        var d2Amount = afterD1 * (d2 / 100);
        var afterD2 = afterD1 - d2Amount;

        // Tax
        var taxAmount = afterD2 * (taxRate / 100);
        var finalPrice = afterD2 + taxAmount;

        // Combined discount percentage
        var combinedPct = (1 - (1 - d1 / 100) * (1 - d2 / 100)) * 100;
        var totalSaved = d1Amount + d2Amount;

        // Naive (simple addition)
        var naivePct = d1 + d2;
        var naivePrice = price * (1 - naivePct / 100);
        var stackingPenalty = afterD2 - naivePrice;

        // Primary results
        document.getElementById('result-original').textContent = formatMoney(price, sym);
        document.getElementById('result-savings').textContent = formatMoney(totalSaved, sym);

        if (taxRate > 0) {
            document.getElementById('result-final-label').textContent = 'Final Price (with tax)';
            document.getElementById('result-final').textContent = formatMoney(finalPrice, sym);
        } else {
            document.getElementById('result-final-label').textContent = 'Final Price';
            document.getElementById('result-final').textContent = formatMoney(afterD2, sym);
        }

        // Breakdown
        document.getElementById('breakdown-original').textContent = formatMoney(price, sym);
        document.getElementById('breakdown-d1-pct').textContent = d1 + '%';
        document.getElementById('breakdown-d1-amount').textContent = '-' + formatMoney(d1Amount, sym);
        document.getElementById('breakdown-after-d1').textContent = formatMoney(afterD1, sym);
        document.getElementById('breakdown-d2-pct').textContent = d2 + '%';
        document.getElementById('breakdown-d2-amount').textContent = '-' + formatMoney(d2Amount, sym);
        document.getElementById('breakdown-after-d2').textContent = formatMoney(afterD2, sym);

        // Tax row
        var taxRow = document.getElementById('breakdown-tax-row');
        var finalRow = document.getElementById('breakdown-final-row');
        if (taxRate > 0) {
            taxRow.classList.remove('hidden');
            taxRow.classList.add('flex');
            finalRow.classList.remove('hidden');
            finalRow.classList.add('flex');
            document.getElementById('breakdown-tax-pct').textContent = taxRate + '%';
            document.getElementById('breakdown-tax-amount').textContent = '+' + formatMoney(taxAmount, sym);
            document.getElementById('breakdown-final-with-tax').textContent = formatMoney(finalPrice, sym);
        } else {
            taxRow.classList.add('hidden');
            taxRow.classList.remove('flex');
            finalRow.classList.add('hidden');
            finalRow.classList.remove('flex');
        }

        // Summary stats
        var dec = getDecimals();
        document.getElementById('summary-combined-pct').textContent = combinedPct.toFixed(dec) + '%';
        document.getElementById('summary-total-saved').textContent = formatMoney(totalSaved, sym);
        document.getElementById('summary-naive-pct').textContent = naivePct.toFixed(dec) + '%';
        document.getElementById('summary-difference').textContent = formatMoney(Math.abs(stackingPenalty), sym);

        // Stats bar
        document.getElementById('stat-combined').textContent = combinedPct.toFixed(dec) + '%';
        document.getElementById('stat-currency').textContent = sym;
        document.getElementById('stat-tax').textContent = taxRate > 0 ? taxRate + '%' : 'None';

        // Show results
        resultsSection.classList.remove('hidden');
        statsBar.classList.remove('hidden');
        errorNotification.classList.add('hidden');
    }

    function getResultText() {
        var sym = getCurrencySymbol();
        var d1 = parseFloat(inputDiscount1.value) || 0;
        var d2 = parseFloat(inputDiscount2.value) || 0;
        var taxRate = parseFloat(taxInput.value) || 0;

        var text = 'Double Discount Calculation\n' +
            '============================\n' +
            'Original Price:        ' + document.getElementById('breakdown-original').textContent + '\n' +
            'First Discount (' + d1 + '%):  ' + document.getElementById('breakdown-d1-amount').textContent + '\n' +
            'After First Discount:  ' + document.getElementById('breakdown-after-d1').textContent + '\n' +
            'Second Discount (' + d2 + '%): ' + document.getElementById('breakdown-d2-amount').textContent + '\n' +
            'After Both Discounts:  ' + document.getElementById('breakdown-after-d2').textContent + '\n';

        if (taxRate > 0) {
            text += 'Sales Tax (' + taxRate + '%):      ' + document.getElementById('breakdown-tax-amount').textContent + '\n' +
                    'Final Price (with tax): ' + document.getElementById('breakdown-final-with-tax').textContent + '\n';
        }

        text += '\nSummary:\n' +
            '  Combined Discount: ' + document.getElementById('summary-combined-pct').textContent + '\n' +
            '  Total Saved:       ' + document.getElementById('summary-total-saved').textContent + '\n' +
            '  Naive Sum (' + d1 + '+' + d2 + '): ' + document.getElementById('summary-naive-pct').textContent + '\n' +
            '  Stacking Penalty:  ' + document.getElementById('summary-difference').textContent + '\n' +
            '\nCalculated at hafiz.dev/tools/double-discount-calculator';

        return text;
    }

    // Event listeners
    btnCalculate.addEventListener('click', calculate);

    btnSample.addEventListener('click', function() {
        inputPrice.value = '100.00';
        inputDiscount1.value = '20';
        inputDiscount2.value = '10';
        taxInput.value = '0';
        currencySelect.value = '$';
        currencyPrefix.textContent = '$';
        decimalsSelect.value = '2';
        calculate();
    });

    btnCopy.addEventListener('click', function() {
        if (resultsSection.classList.contains('hidden')) {
            showError('Calculate first before copying.');
            return;
        }
        navigator.clipboard.writeText(getResultText()).then(function() {
            copyText.textContent = 'Copied!';
            copyIcon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>';
            copyIcon.classList.add('text-green-400');
            showSuccess('Results copied to clipboard!');
            setTimeout(function() {
                copyText.textContent = 'Copy';
                copyIcon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path>';
                copyIcon.classList.remove('text-green-400');
            }, 2000);
        });
    });

    btnDownload.addEventListener('click', function() {
        if (resultsSection.classList.contains('hidden')) {
            showError('Calculate first before downloading.');
            return;
        }
        var blob = new Blob([getResultText()], { type: 'text/plain' });
        var url = URL.createObjectURL(blob);
        var a = document.createElement('a');
        a.href = url;
        a.download = 'double-discount-calculation.txt';
        a.click();
        URL.revokeObjectURL(url);
        showSuccess('Downloaded double-discount-calculation.txt');
    });

    btnClear.addEventListener('click', function() {
        inputPrice.value = '';
        inputDiscount1.value = '';
        inputDiscount2.value = '';
        taxInput.value = '0';
        resultsSection.classList.add('hidden');
        statsBar.classList.add('hidden');
        successNotification.classList.add('hidden');
        errorNotification.classList.add('hidden');
    });

    // Currency change updates prefix
    currencySelect.addEventListener('change', function() {
        currencyPrefix.textContent = currencySelect.value;
        if (!resultsSection.classList.contains('hidden')) calculate();
    });

    // Recalculate when options change
    decimalsSelect.addEventListener('change', function() {
        if (!resultsSection.classList.contains('hidden')) calculate();
    });

    taxInput.addEventListener('change', function() {
        if (!resultsSection.classList.contains('hidden')) calculate();
    });

    // Keyboard shortcut: Ctrl/Cmd+Enter
    document.addEventListener('keydown', function(e) {
        if ((e.ctrlKey || e.metaKey) && e.key === 'Enter') {
            e.preventDefault();
            calculate();
        }
    });

    // Auto-calculate on Enter in inputs
    [inputPrice, inputDiscount1, inputDiscount2, taxInput].forEach(function(el) {
        el.addEventListener('keydown', function(e) {
            if (e.key === 'Enter') {
                e.preventDefault();
                calculate();
            }
        });
    });
})();
</script>
