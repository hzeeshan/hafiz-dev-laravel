<script>
(function() {
    'use strict';

    var stringsEl = document.getElementById('tool-strings');
    var S = {
        enter_valid_price: stringsEl?.dataset.enterValidPrice || 'Please enter a valid item price greater than 0.',
        calculate_first_copy: stringsEl?.dataset.calculateFirstCopy || 'Calculate fees first before copying.',
        calculate_first_download: stringsEl?.dataset.calculateFirstDownload || 'Calculate fees first before downloading.',
        copied: stringsEl?.dataset.copied || 'Results copied to clipboard!',
        downloaded: stringsEl?.dataset.downloaded || 'Downloaded ebay-paypal-fee-calculation.txt',
        copied_btn: stringsEl?.dataset.copiedBtn || 'Copied!',
        copy_btn: stringsEl?.dataset.copyBtn || 'Copy',
    };

    // DOM elements
    var categorySelect = document.getElementById('opt-category');
    var processorSelect = document.getElementById('opt-processor');
    var storeSelect = document.getElementById('opt-store');
    var currencySelect = document.getElementById('opt-currency');
    var customRatePanel = document.getElementById('custom-rate-panel');
    var customPercent = document.getElementById('custom-percent');
    var customFixed = document.getElementById('custom-fixed');
    var inputItemPrice = document.getElementById('input-item-price');
    var inputShipping = document.getElementById('input-shipping');
    var inputItemCost = document.getElementById('input-item-cost');
    var currencyPrefixPrice = document.getElementById('currency-prefix-price');
    var currencyPrefixShipping = document.getElementById('currency-prefix-shipping');
    var currencyPrefixCost = document.getElementById('currency-prefix-cost');
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

    // eBay final value fee rates by category: [percent, fixedPerOrder, categoryName]
    var EBAY_RATES = {
        most:          { percent: 13.25, fixed: 0.30, name: 'Most Categories' },
        books:         { percent: 14.95, fixed: 0.30, name: 'Books, Movies, Music' },
        clothing:      { percent: 13.25, fixed: 0.30, name: 'Clothing, Shoes' },
        electronics:   { percent: 14.95, fixed: 0.30, name: 'Electronics' },
        collectibles:  { percent: 13.25, fixed: 0.30, name: 'Collectibles' },
        home:          { percent: 13.25, fixed: 0.30, name: 'Home & Garden' },
        sporting:      { percent: 13.25, fixed: 0.30, name: 'Sporting Goods' },
        toys:          { percent: 13.25, fixed: 0.30, name: 'Toys & Hobbies' },
        business:      { percent: 13.25, fixed: 0.30, name: 'Business & Industrial' },
        guitars:       { percent: 6.35,  fixed: 0.30, name: 'Guitars & Basses' },
        watches:       { percent: 8.95,  fixed: 0.30, name: 'Watches over $1000' },
        sneakers:      { percent: 8.00,  fixed: 0.30, name: 'Sneakers' },
        jewelry_fine:  { percent: 6.35,  fixed: 0.30, name: 'Fine Jewelry over $500' }
    };

    // PayPal processing rates
    var PAYPAL_RATES = {
        managed:             { percent: 0,    fixed: 0,    name: 'eBay Managed Payments (included)' },
        paypal_standard:     { percent: 2.99, fixed: 0.49, name: 'PayPal Standard' },
        paypal_micropayment: { percent: 5.00, fixed: 0.10, name: 'PayPal Micropayment' },
        none:                { percent: 0,    fixed: 0,    name: 'No Additional Fee' }
    };

    // Store subscription discount (simplified: affects some categories)
    var STORE_NAMES = {
        none:       'No Store',
        starter:    'Starter Store',
        basic:      'Basic Store',
        premium:    'Premium Store',
        anchor:     'Anchor Store',
        enterprise: 'Enterprise Store'
    };

    function getEbayRate() {
        var cat = categorySelect.value;
        if (cat === 'custom') {
            return {
                percent: parseFloat(customPercent.value) || 0,
                fixed: parseFloat(customFixed.value) || 0,
                name: 'Custom Rate'
            };
        }
        return EBAY_RATES[cat];
    }

    function getPaypalRate() {
        return PAYPAL_RATES[processorSelect.value] || PAYPAL_RATES.managed;
    }

    function getCurrencySymbol() {
        return currencySelect.value;
    }

    function round2(n) {
        return Math.round((n + Number.EPSILON) * 100) / 100;
    }

    function formatMoney(amount, symbol) {
        return symbol + amount.toFixed(2);
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
        var itemPrice = parseFloat(inputItemPrice.value);
        if (!itemPrice || itemPrice <= 0) {
            showError(S.enter_valid_price);
            return;
        }

        var shippingPrice = parseFloat(inputShipping.value) || 0;
        var itemCost = parseFloat(inputItemCost.value) || 0;
        var ebayRate = getEbayRate();
        var paypalRate = getPaypalRate();
        var sym = getCurrencySymbol();

        // Total sale amount (item + shipping)
        var saleTotal = round2(itemPrice + shippingPrice);

        // eBay final value fee (round each component to cents)
        var ebayPercentFee = round2(saleTotal * (ebayRate.percent / 100));
        var ebayFixedFee = round2(ebayRate.fixed);
        var ebayTotalFee = round2(ebayPercentFee + ebayFixedFee);

        // PayPal fee (on total sale amount, round to cents)
        var paypalFee = 0;
        if (paypalRate.percent > 0 || paypalRate.fixed > 0) {
            paypalFee = round2(saleTotal * (paypalRate.percent / 100) + paypalRate.fixed);
        }

        // Total fees (sum of already-rounded components)
        var totalFees = round2(ebayTotalFee + paypalFee);

        // Net profit (from rounded values so displayed numbers add up)
        var netProfit = round2(saleTotal - totalFees - itemCost);

        // Effective fee rate
        var effectiveRate = (totalFees / saleTotal * 100);

        // Profit margin
        var profitMargin = (netProfit / saleTotal * 100);

        // Update primary results
        document.getElementById('result-revenue').textContent = formatMoney(saleTotal, sym);
        document.getElementById('result-total-fees').textContent = '-' + formatMoney(totalFees, sym);
        document.getElementById('result-profit').textContent = formatMoney(netProfit, sym);

        // Color profit based on positive/negative
        var profitEl = document.getElementById('result-profit');
        if (netProfit < 0) {
            profitEl.classList.remove('text-green-400');
            profitEl.classList.add('text-red-400');
        } else {
            profitEl.classList.remove('text-red-400');
            profitEl.classList.add('text-green-400');
        }

        // Update breakdown
        document.getElementById('breakdown-ebay-rate').textContent = ebayRate.percent + '%';
        document.getElementById('breakdown-ebay-fee').textContent = formatMoney(ebayPercentFee, sym);
        document.getElementById('breakdown-ebay-fixed').textContent = formatMoney(ebayFixedFee, sym);

        // PayPal row
        var paypalRow = document.getElementById('breakdown-paypal-row');
        if (paypalFee > 0) {
            paypalRow.classList.remove('hidden');
            paypalRow.classList.add('flex');
            document.getElementById('breakdown-paypal-rate').textContent = paypalRate.percent + '% + ' + formatMoney(paypalRate.fixed, sym);
            document.getElementById('breakdown-paypal-fee').textContent = formatMoney(paypalFee, sym);
        } else {
            paypalRow.classList.add('hidden');
            paypalRow.classList.remove('flex');
        }

        document.getElementById('breakdown-total').textContent = formatMoney(totalFees, sym);

        // Item cost row
        var costRow = document.getElementById('breakdown-cost-row');
        if (itemCost > 0) {
            costRow.classList.remove('hidden');
            costRow.classList.add('flex');
            document.getElementById('breakdown-cost').textContent = formatMoney(itemCost, sym);
        } else {
            costRow.classList.add('hidden');
            costRow.classList.remove('flex');
        }

        document.getElementById('breakdown-effective-rate').textContent = effectiveRate.toFixed(2) + '%';

        var profitMarginEl = document.getElementById('breakdown-profit-margin');
        profitMarginEl.textContent = profitMargin.toFixed(2) + '%';
        if (profitMargin < 0) {
            profitMarginEl.classList.remove('text-green-400');
            profitMarginEl.classList.add('text-red-400');
        } else {
            profitMarginEl.classList.remove('text-red-400');
            profitMarginEl.classList.add('text-green-400');
        }

        // Comparison table
        var comparisonPrices = [10, 25, 50, 75, 100, 200, 500, 1000];
        var tbody = document.getElementById('comparison-table-body');
        tbody.innerHTML = '';
        comparisonPrices.forEach(function(price) {
            var cTotal = round2(price + shippingPrice);
            var cEbayFee = round2(cTotal * (ebayRate.percent / 100) + ebayRate.fixed);
            var cPaypalFee = 0;
            if (paypalRate.percent > 0 || paypalRate.fixed > 0) {
                cPaypalFee = round2(cTotal * (paypalRate.percent / 100) + paypalRate.fixed);
            }
            var cFees = round2(cEbayFee + cPaypalFee);
            var cKeep = round2(cTotal - cFees);
            var cRate = (cFees / cTotal * 100);
            var row = document.createElement('tr');
            row.className = 'border-b border-gold/5';
            row.innerHTML =
                '<td class="py-2 pr-4">' + formatMoney(price, sym) + '</td>' +
                '<td class="py-2 pr-4 text-red-400">' + formatMoney(cFees, sym) + '</td>' +
                '<td class="py-2 pr-4 text-green-400">' + formatMoney(cKeep, sym) + '</td>' +
                '<td class="py-2 text-gold">' + cRate.toFixed(2) + '%</td>';
            tbody.appendChild(row);
        });

        // Stats bar
        document.getElementById('stat-category').textContent = ebayRate.name;
        document.getElementById('stat-ebay-rate').textContent = ebayRate.percent + '% + ' + formatMoney(ebayRate.fixed, sym);
        document.getElementById('stat-payment').textContent = paypalRate.name;

        // Show results
        resultsSection.classList.remove('hidden');
        statsBar.classList.remove('hidden');
        errorNotification.classList.add('hidden');
    }

    function getResultText() {
        var sym = getCurrencySymbol();
        var revenue = document.getElementById('result-revenue').textContent;
        var fees = document.getElementById('result-total-fees').textContent;
        var profit = document.getElementById('result-profit').textContent;
        var effectiveRate = document.getElementById('breakdown-effective-rate').textContent;
        var category = document.getElementById('stat-category').textContent;
        var ebayRate = document.getElementById('stat-ebay-rate').textContent;
        var payment = document.getElementById('stat-payment').textContent;

        var text = 'eBay + PayPal Fee Calculation\n' +
            '==============================\n' +
            'Total Revenue:  ' + revenue + '\n' +
            'Total Fees:     ' + fees + '\n' +
            'Net Profit:     ' + profit + '\n' +
            'Effective Rate: ' + effectiveRate + '\n\n' +
            'Fee Breakdown:\n' +
            '  eBay Final Value Fee: ' + document.getElementById('breakdown-ebay-fee').textContent + '\n' +
            '  eBay Per-Order Fee:   ' + document.getElementById('breakdown-ebay-fixed').textContent + '\n';

        var paypalRow = document.getElementById('breakdown-paypal-row');
        if (!paypalRow.classList.contains('hidden')) {
            text += '  PayPal Fee:           ' + document.getElementById('breakdown-paypal-fee').textContent + '\n';
        }

        text += '\nSettings: ' + category + ' | eBay: ' + ebayRate + ' | Payment: ' + payment + '\n' +
            '\nCalculated at hafiz.dev/tools/ebay-paypal-fee-calculator';

        return text;
    }

    // Event listeners
    btnCalculate.addEventListener('click', calculate);

    btnSample.addEventListener('click', function() {
        inputItemPrice.value = '50.00';
        inputShipping.value = '8.00';
        inputItemCost.value = '15.00';
        categorySelect.value = 'most';
        processorSelect.value = 'managed';
        storeSelect.value = 'none';
        currencySelect.value = '$';
        currencyPrefixPrice.textContent = '$';
        currencyPrefixShipping.textContent = '$';
        currencyPrefixCost.textContent = '$';
        customRatePanel.classList.add('hidden');
        calculate();
    });

    btnCopy.addEventListener('click', function() {
        if (resultsSection.classList.contains('hidden')) {
            showError(S.calculate_first_copy);
            return;
        }
        navigator.clipboard.writeText(getResultText()).then(function() {
            copyText.textContent = S.copied_btn;
            copyIcon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>';
            copyIcon.classList.add('text-green-400');
            showSuccess(S.copied);
            setTimeout(function() {
                copyText.textContent = S.copy_btn;
                copyIcon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path>';
                copyIcon.classList.remove('text-green-400');
            }, 2000);
        });
    });

    btnDownload.addEventListener('click', function() {
        if (resultsSection.classList.contains('hidden')) {
            showError(S.calculate_first_download);
            return;
        }
        var blob = new Blob([getResultText()], { type: 'text/plain' });
        var url = URL.createObjectURL(blob);
        var a = document.createElement('a');
        a.href = url;
        a.download = 'ebay-paypal-fee-calculation.txt';
        a.click();
        URL.revokeObjectURL(url);
        showSuccess(S.downloaded);
    });

    btnClear.addEventListener('click', function() {
        inputItemPrice.value = '';
        inputShipping.value = '';
        inputItemCost.value = '';
        resultsSection.classList.add('hidden');
        statsBar.classList.add('hidden');
        successNotification.classList.add('hidden');
        errorNotification.classList.add('hidden');
    });

    // Category change: toggle custom rate panel
    categorySelect.addEventListener('change', function() {
        if (categorySelect.value === 'custom') {
            customRatePanel.classList.remove('hidden');
        } else {
            customRatePanel.classList.add('hidden');
        }
        if (!resultsSection.classList.contains('hidden')) calculate();
    });

    // Processor change: recalculate if visible
    processorSelect.addEventListener('change', function() {
        if (!resultsSection.classList.contains('hidden')) calculate();
    });

    // Store change: recalculate if visible
    storeSelect.addEventListener('change', function() {
        if (!resultsSection.classList.contains('hidden')) calculate();
    });

    // Currency change: update prefixes and recalculate
    currencySelect.addEventListener('change', function() {
        var sym = currencySelect.value;
        currencyPrefixPrice.textContent = sym;
        currencyPrefixShipping.textContent = sym;
        currencyPrefixCost.textContent = sym;
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
    [inputItemPrice, inputShipping, inputItemCost].forEach(function(el) {
        el.addEventListener('keydown', function(e) {
            if (e.key === 'Enter') {
                e.preventDefault();
                calculate();
            }
        });
    });
})();
</script>
