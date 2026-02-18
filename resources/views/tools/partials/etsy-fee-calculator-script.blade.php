<script>
(function() {
    'use strict';

    // DOM elements
    const countrySelect = document.getElementById('opt-country');
    const offsiteAdsSelect = document.getElementById('opt-offsite-ads');
    const currencySelect = document.getElementById('opt-currency');
    const quantityInput = document.getElementById('opt-quantity');
    const inputItemPrice = document.getElementById('input-item-price');
    const inputShipping = document.getElementById('input-shipping');
    const inputItemCost = document.getElementById('input-item-cost');
    const currencyPrefixPrice = document.getElementById('currency-prefix-price');
    const currencyPrefixShipping = document.getElementById('currency-prefix-shipping');
    const currencyPrefixCost = document.getElementById('currency-prefix-cost');
    const btnCalculate = document.getElementById('btn-calculate');
    const btnSample = document.getElementById('btn-sample');
    const btnCopy = document.getElementById('btn-copy');
    const btnDownload = document.getElementById('btn-download');
    const btnClear = document.getElementById('btn-clear');
    const copyText = document.getElementById('copy-text');
    const copyIcon = document.getElementById('copy-icon');
    const resultsSection = document.getElementById('results-section');
    const statsBar = document.getElementById('stats-bar');
    const successNotification = document.getElementById('success-notification');
    const successMessage = document.getElementById('success-message');
    const errorNotification = document.getElementById('error-notification');
    const errorMessage = document.getElementById('error-message');

    // Etsy fee constants
    const LISTING_FEE = 0.20;
    const TRANSACTION_FEE_PERCENT = 6.5;

    // Payment processing rates by country: [percent, fixed]
    const PROCESSING_RATES = {
        us: { percent: 3.0, fixed: 0.25, currency: '$',   name: 'United States' },
        uk: { percent: 4.0, fixed: 0.20, currency: '£',   name: 'United Kingdom' },
        ca: { percent: 3.0, fixed: 0.25, currency: 'CA$', name: 'Canada' },
        au: { percent: 3.0, fixed: 0.25, currency: 'A$',  name: 'Australia' },
        eu: { percent: 4.0, fixed: 0.30, currency: '€',   name: 'Europe' },
        in: { percent: 4.0, fixed: 3.00, currency: '₹',   name: 'India' },
    };

    function getProcessingRate() {
        return PROCESSING_RATES[countrySelect.value] || PROCESSING_RATES.us;
    }

    function getCurrencySymbol() {
        return currencySelect.value;
    }

    function formatMoney(amount, symbol) {
        const decimals = (symbol === '¥') ? 0 : 2;
        return symbol + amount.toFixed(decimals);
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
        const itemPrice = parseFloat(inputItemPrice.value);
        if (!itemPrice || itemPrice <= 0) {
            showError('Please enter a valid item price greater than 0.');
            return;
        }

        const shippingPrice = parseFloat(inputShipping.value) || 0;
        const itemCost = parseFloat(inputItemCost.value) || 0;
        const quantity = parseInt(quantityInput.value) || 1;
        const rate = getProcessingRate();
        const sym = getCurrencySymbol();
        const offsiteAdsPercent = parseFloat(offsiteAdsSelect.value) || 0;

        // Calculate per-item fees
        const saleTotal = (itemPrice + shippingPrice) * quantity;

        // Listing fee: $0.20 per item
        const listingFee = LISTING_FEE * quantity;

        // Transaction fee: 6.5% of (item price + shipping) × quantity
        const transactionFee = saleTotal * (TRANSACTION_FEE_PERCENT / 100);

        // Payment processing: percent of total + fixed fee (once per order)
        const processingFee = saleTotal * (rate.percent / 100) + rate.fixed;

        // Offsite Ads fee: percent of sale total
        const offsiteFee = saleTotal * (offsiteAdsPercent / 100);

        // Total fees
        const totalFees = listingFee + transactionFee + processingFee + offsiteFee;

        // Total cost of goods
        const totalItemCost = itemCost * quantity;

        // Net profit
        const netProfit = saleTotal - totalFees - totalItemCost;

        // Effective fee rate
        const effectiveRate = (totalFees / saleTotal * 100);

        // Profit margin
        const profitMargin = (netProfit / saleTotal * 100);

        // Update primary results
        document.getElementById('result-revenue').textContent = formatMoney(saleTotal, sym);
        document.getElementById('result-total-fees').textContent = '-' + formatMoney(totalFees, sym);
        document.getElementById('result-profit').textContent = formatMoney(netProfit, sym);

        // Color the profit based on positive/negative
        const profitEl = document.getElementById('result-profit');
        if (netProfit < 0) {
            profitEl.classList.remove('text-green-400');
            profitEl.classList.add('text-red-400');
        } else {
            profitEl.classList.remove('text-red-400');
            profitEl.classList.add('text-green-400');
        }

        // Update breakdown
        document.getElementById('breakdown-qty').textContent = quantity;
        document.getElementById('breakdown-qty-plural').textContent = quantity > 1 ? 's' : '';
        document.getElementById('breakdown-listing').textContent = formatMoney(listingFee, sym);
        document.getElementById('breakdown-transaction').textContent = formatMoney(transactionFee, sym);
        document.getElementById('breakdown-processing-rate').textContent = rate.percent + '% + ' + formatMoney(rate.fixed, sym);
        document.getElementById('breakdown-processing').textContent = formatMoney(processingFee, sym);

        // Offsite Ads row
        const offsiteRow = document.getElementById('breakdown-offsite-row');
        if (offsiteAdsPercent > 0) {
            offsiteRow.classList.remove('hidden');
            offsiteRow.classList.add('flex');
            document.getElementById('breakdown-offsite-rate').textContent = offsiteAdsPercent + '%';
            document.getElementById('breakdown-offsite').textContent = formatMoney(offsiteFee, sym);
        } else {
            offsiteRow.classList.add('hidden');
            offsiteRow.classList.remove('flex');
        }

        document.getElementById('breakdown-total').textContent = formatMoney(totalFees, sym);

        // Item cost row
        const costRow = document.getElementById('breakdown-cost-row');
        if (totalItemCost > 0) {
            costRow.classList.remove('hidden');
            costRow.classList.add('flex');
            document.getElementById('breakdown-cost').textContent = formatMoney(totalItemCost, sym);
        } else {
            costRow.classList.add('hidden');
            costRow.classList.remove('flex');
        }

        document.getElementById('breakdown-effective-rate').textContent = effectiveRate.toFixed(2) + '%';

        const profitMarginEl = document.getElementById('breakdown-profit-margin');
        profitMarginEl.textContent = profitMargin.toFixed(2) + '%';
        if (profitMargin < 0) {
            profitMarginEl.classList.remove('text-green-400');
            profitMarginEl.classList.add('text-red-400');
        } else {
            profitMarginEl.classList.remove('text-red-400');
            profitMarginEl.classList.add('text-green-400');
        }

        // Comparison table
        var comparisonPrices = [5, 10, 15, 25, 50, 75, 100, 200];
        var tbody = document.getElementById('comparison-table-body');
        tbody.innerHTML = '';
        comparisonPrices.forEach(function(price) {
            var cTotal = price + shippingPrice;
            var cListing = LISTING_FEE;
            var cTransaction = cTotal * (TRANSACTION_FEE_PERCENT / 100);
            var cProcessing = cTotal * (rate.percent / 100) + rate.fixed;
            var cOffsite = cTotal * (offsiteAdsPercent / 100);
            var cFees = cListing + cTransaction + cProcessing + cOffsite;
            var cKeep = cTotal - cFees;
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
        document.getElementById('stat-region').textContent = rate.name;
        document.getElementById('stat-processing').textContent = rate.percent + '% + ' + formatMoney(rate.fixed, sym);
        document.getElementById('stat-offsite').textContent = offsiteAdsPercent > 0 ? offsiteAdsPercent + '%' : 'None';

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
        var region = document.getElementById('stat-region').textContent;
        var processing = document.getElementById('stat-processing').textContent;
        var offsite = document.getElementById('stat-offsite').textContent;

        return 'Etsy Fee Calculation\n' +
            '=====================\n' +
            'Total Revenue:   ' + revenue + '\n' +
            'Total Etsy Fees: ' + fees + '\n' +
            'Net Profit:      ' + profit + '\n' +
            'Effective Rate:  ' + effectiveRate + '\n\n' +
            'Fee Breakdown:\n' +
            '  Listing Fee:      ' + document.getElementById('breakdown-listing').textContent + '\n' +
            '  Transaction Fee:  ' + document.getElementById('breakdown-transaction').textContent + '\n' +
            '  Processing Fee:   ' + document.getElementById('breakdown-processing').textContent + '\n' +
            (offsiteAdsSelect.value !== 'none' ? '  Offsite Ads Fee:  ' + document.getElementById('breakdown-offsite').textContent + '\n' : '') +
            '\nSettings: ' + region + ' | Processing: ' + processing + ' | Offsite Ads: ' + offsite + '\n' +
            '\nCalculated at hafiz.dev/tools/etsy-fee-calculator';
    }

    // Event listeners
    btnCalculate.addEventListener('click', calculate);

    btnSample.addEventListener('click', function() {
        inputItemPrice.value = '25.00';
        inputShipping.value = '5.00';
        inputItemCost.value = '8.00';
        quantityInput.value = '1';
        countrySelect.value = 'us';
        offsiteAdsSelect.value = 'none';
        currencySelect.value = '$';
        currencyPrefixPrice.textContent = '$';
        currencyPrefixShipping.textContent = '$';
        currencyPrefixCost.textContent = '$';
        calculate();
    });

    btnCopy.addEventListener('click', function() {
        if (resultsSection.classList.contains('hidden')) {
            showError('Calculate fees first before copying.');
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
            showError('Calculate fees first before downloading.');
            return;
        }
        var blob = new Blob([getResultText()], { type: 'text/plain' });
        var url = URL.createObjectURL(blob);
        var a = document.createElement('a');
        a.href = url;
        a.download = 'etsy-fee-calculation.txt';
        a.click();
        URL.revokeObjectURL(url);
        showSuccess('Downloaded etsy-fee-calculation.txt');
    });

    btnClear.addEventListener('click', function() {
        inputItemPrice.value = '';
        inputShipping.value = '0';
        inputItemCost.value = '0';
        quantityInput.value = '1';
        resultsSection.classList.add('hidden');
        statsBar.classList.add('hidden');
        successNotification.classList.add('hidden');
        errorNotification.classList.add('hidden');
    });

    // Country change updates currency
    countrySelect.addEventListener('change', function() {
        var rate = PROCESSING_RATES[countrySelect.value];
        if (rate) {
            for (var i = 0; i < currencySelect.options.length; i++) {
                if (currencySelect.options[i].value === rate.currency) {
                    currencySelect.selectedIndex = i;
                    break;
                }
            }
            currencyPrefixPrice.textContent = rate.currency;
            currencyPrefixShipping.textContent = rate.currency;
            currencyPrefixCost.textContent = rate.currency;
        }
        if (!resultsSection.classList.contains('hidden')) calculate();
    });

    currencySelect.addEventListener('change', function() {
        var sym = currencySelect.value;
        currencyPrefixPrice.textContent = sym;
        currencyPrefixShipping.textContent = sym;
        currencyPrefixCost.textContent = sym;
        if (!resultsSection.classList.contains('hidden')) calculate();
    });

    offsiteAdsSelect.addEventListener('change', function() {
        if (!resultsSection.classList.contains('hidden')) calculate();
    });

    quantityInput.addEventListener('change', function() {
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
