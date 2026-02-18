<script>
(function() {
    'use strict';

    // Get translatable strings from data attributes (for Italian/other locales)
    const stringsEl = document.getElementById('tool-strings');
    const S = {
        // Country options
        countryUs: stringsEl?.dataset.countryUs || 'United States (2.9% + $0.30)',
        countryEu: stringsEl?.dataset.countryEu || 'Europe / UK (1.5% + €0.25)',
        countryAu: stringsEl?.dataset.countryAu || 'Australia (1.75% + A$0.30)',
        countryCa: stringsEl?.dataset.countryCa || 'Canada (2.9% + CA$0.30)',
        countrySg: stringsEl?.dataset.countrySg || 'Singapore (3.4% + S$0.50)',
        countryJp: stringsEl?.dataset.countryJp || 'Japan (3.6% + ¥40)',
        countryBr: stringsEl?.dataset.countryBr || 'Brazil (3.99% + R$0.39)',
        countryMy: stringsEl?.dataset.countryMy || 'Malaysia (3.0% + RM1.00)',
        countryIn: stringsEl?.dataset.countryIn || 'India (2.0% + ₹2.00)',
        countryCustom: stringsEl?.dataset.countryCustom || 'Custom Rate',
        // Card types
        cardDomestic: stringsEl?.dataset.cardDomestic || 'Domestic Card',
        cardInternational: stringsEl?.dataset.cardInternational || 'International Card (+1.5%)',
        cardInternationalConversion: stringsEl?.dataset.cardInternationalConversion || 'International + Currency Conversion (+2.5%)',
        // Modes
        modeFeeFromAmount: stringsEl?.dataset.modeFeeFromAmount || 'Calculate fee from charge amount',
        modeAmountToReceive: stringsEl?.dataset.modeAmountToReceive || 'Amount needed to receive $X',
        // Buttons
        calculateFees: stringsEl?.dataset.calculateFees || 'Calculate Fees',
        sample: stringsEl?.dataset.sample || 'Sample',
        copy: stringsEl?.dataset.copy || 'Copy',
        download: stringsEl?.dataset.download || 'Download',
        clear: stringsEl?.dataset.clear || 'Clear',
        // Labels
        chargeAmount: stringsEl?.dataset.chargeAmount || 'Charge Amount',
        desiredReceiveAmount: stringsEl?.dataset.desiredReceiveAmount || 'Desired Receive Amount',
        youCharge: stringsEl?.dataset.youCharge || 'You Charge',
        chargeThis: stringsEl?.dataset.chargeThis || 'Charge This',
        stripeFee: stringsEl?.dataset.stripeFee || 'Stripe Fee',
        youReceive: stringsEl?.dataset.youReceive || 'You Receive',
        feeBreakdown: stringsEl?.dataset.feeBreakdown || 'Fee Breakdown',
        basePercentageFee: stringsEl?.dataset.basePercentageFee || 'Base percentage fee',
        fixedFeePerTransaction: stringsEl?.dataset.fixedFeePerTransaction || 'Fixed fee per transaction',
        internationalSurcharge: stringsEl?.dataset.internationalSurcharge || 'International card surcharge',
        totalStripeFee: stringsEl?.dataset.totalStripeFee || 'Total Stripe Fee',
        effectiveRate: stringsEl?.dataset.effectiveRate || 'Effective rate',
        quickComparison: stringsEl?.dataset.quickComparison || 'Quick Comparison — Common Amounts',
        thAmount: stringsEl?.dataset.thAmount || 'Amount',
        thStripeFee: stringsEl?.dataset.thStripeFee || 'Stripe Fee',
        thYouReceive: stringsEl?.dataset.thYouReceive || 'You Receive',
        thEffectiveRate: stringsEl?.dataset.thEffectiveRate || 'Effective Rate',
        // Messages
        enterValidAmount: stringsEl?.dataset.enterValidAmount || 'Please enter a valid amount greater than 0.',
        copiedToClipboard: stringsEl?.dataset.copiedToClipboard || 'Results copied to clipboard!',
        calculateFirst: stringsEl?.dataset.calculateFirst || 'Calculate fees first before copying.',
        calculateFirstDownload: stringsEl?.dataset.calculateFirstDownload || 'Calculate fees first before downloading.',
        downloaded: stringsEl?.dataset.downloaded || 'Downloaded stripe-fee-calculation.txt',
        copied: stringsEl?.dataset.copied || 'Copied!',
        // Download/copy content
        resultHeader: stringsEl?.dataset.resultHeader || 'Stripe Fee Calculation',
        resultChargeAmount: stringsEl?.dataset.resultChargeAmount || 'Charge Amount',
        resultStripeFee: stringsEl?.dataset.resultStripeFee || 'Stripe Fee',
        resultYouReceive: stringsEl?.dataset.resultYouReceive || 'You Receive',
        resultEffectiveRate: stringsEl?.dataset.resultEffectiveRate || 'Effective Rate',
        resultSettings: stringsEl?.dataset.resultSettings || 'Settings',
        resultRate: stringsEl?.dataset.resultRate || 'Rate',
        // Stats
        statRate: stringsEl?.dataset.statRate || 'Rate',
        statCard: stringsEl?.dataset.statCard || 'Card',
        statRegion: stringsEl?.dataset.statRegion || 'Region',
    };

    // Country names for result text
    const COUNTRY_NAMES = {
        us: stringsEl?.dataset.nameUs || 'United States',
        eu: stringsEl?.dataset.nameEu || 'Europe / UK',
        au: stringsEl?.dataset.nameAu || 'Australia',
        ca: stringsEl?.dataset.nameCa || 'Canada',
        sg: stringsEl?.dataset.nameSg || 'Singapore',
        jp: stringsEl?.dataset.nameJp || 'Japan',
        br: stringsEl?.dataset.nameBr || 'Brazil',
        my: stringsEl?.dataset.nameMy || 'Malaysia',
        in: stringsEl?.dataset.nameIn || 'India',
    };

    // DOM elements
    const countrySelect = document.getElementById('opt-country');
    const cardTypeSelect = document.getElementById('opt-card-type');
    const modeSelect = document.getElementById('opt-mode');
    const currencySelect = document.getElementById('opt-currency');
    const customRatePanel = document.getElementById('custom-rate-panel');
    const customPercent = document.getElementById('custom-percent');
    const customFixed = document.getElementById('custom-fixed');
    const inputAmount = document.getElementById('input-amount');
    const inputLabel = document.getElementById('input-label');
    const currencyPrefix = document.getElementById('currency-prefix');
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

    // Fee rates by country: [percentFee, fixedFee, currencySymbol]
    const RATES = {
        us:  { percent: 2.9, fixed: 0.30, currency: '$',   name: COUNTRY_NAMES.us },
        eu:  { percent: 1.5, fixed: 0.25, currency: '€',   name: COUNTRY_NAMES.eu },
        au:  { percent: 1.75, fixed: 0.30, currency: 'A$',  name: COUNTRY_NAMES.au },
        ca:  { percent: 2.9, fixed: 0.30, currency: 'CA$', name: COUNTRY_NAMES.ca },
        sg:  { percent: 3.4, fixed: 0.50, currency: 'S$',  name: COUNTRY_NAMES.sg },
        jp:  { percent: 3.6, fixed: 40,   currency: '¥',   name: COUNTRY_NAMES.jp },
        br:  { percent: 3.99, fixed: 0.39, currency: 'R$',  name: COUNTRY_NAMES.br },
        my:  { percent: 3.0, fixed: 1.00, currency: 'RM',  name: COUNTRY_NAMES.my },
        in:  { percent: 2.0, fixed: 2.00, currency: '₹',   name: COUNTRY_NAMES.in },
    };

    const INTL_SURCHARGE = 1.5;
    const CONVERSION_SURCHARGE = 1.0;

    function getRate() {
        const country = countrySelect.value;
        if (country === 'custom') {
            return {
                percent: parseFloat(customPercent.value) || 0,
                fixed: parseFloat(customFixed.value) || 0,
                currency: currencySelect.value,
                name: S.countryCustom
            };
        }
        return RATES[country];
    }

    function getIntlSurcharge() {
        const cardType = cardTypeSelect.value;
        if (cardType === 'international') return INTL_SURCHARGE;
        if (cardType === 'international_conversion') return INTL_SURCHARGE + CONVERSION_SURCHARGE;
        return 0;
    }

    function getCurrencySymbol() {
        return currencySelect.value;
    }

    function formatMoney(amount, symbol) {
        const decimals = symbol === '¥' ? 0 : 2;
        return symbol + amount.toFixed(decimals);
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

    function calculate() {
        const amount = parseFloat(inputAmount.value);
        if (!amount || amount <= 0) {
            showError(S.enterValidAmount);
            return;
        }

        const rate = getRate();
        const intlSurcharge = getIntlSurcharge();
        const totalPercent = rate.percent + intlSurcharge;
        const fixedFee = rate.fixed;
        const sym = getCurrencySymbol();
        const mode = modeSelect.value;

        let chargeAmount, fee, receiveAmount, percentFeeAmount, intlFeeAmount;

        if (mode === 'fee_from_amount') {
            // Given charge amount, calculate fee
            chargeAmount = amount;
            percentFeeAmount = chargeAmount * (rate.percent / 100);
            intlFeeAmount = chargeAmount * (intlSurcharge / 100);
            fee = percentFeeAmount + intlFeeAmount + fixedFee;
            receiveAmount = chargeAmount - fee;
        } else {
            // Given desired receive amount, calculate charge amount
            receiveAmount = amount;
            chargeAmount = (receiveAmount + fixedFee) / (1 - totalPercent / 100);
            percentFeeAmount = chargeAmount * (rate.percent / 100);
            intlFeeAmount = chargeAmount * (intlSurcharge / 100);
            fee = chargeAmount - receiveAmount;
        }

        // Update results
        document.getElementById('result-charge').textContent = formatMoney(chargeAmount, sym);
        document.getElementById('result-fee').textContent = '-' + formatMoney(fee, sym);
        document.getElementById('result-receive').textContent = formatMoney(receiveAmount, sym);

        // Update labels based on mode
        if (mode === 'fee_from_amount') {
            document.getElementById('result-label-1').textContent = S.youCharge;
            document.getElementById('result-label-3').textContent = S.youReceive;
        } else {
            document.getElementById('result-label-1').textContent = S.chargeThis;
            document.getElementById('result-label-3').textContent = S.youReceive;
        }

        // Fee breakdown
        document.getElementById('breakdown-percent').textContent = rate.percent + '%';
        document.getElementById('breakdown-percent-amount').textContent = formatMoney(percentFeeAmount, sym);
        document.getElementById('breakdown-fixed-amount').textContent = formatMoney(fixedFee, sym);

        const intlRow = document.getElementById('breakdown-intl-row');
        if (intlSurcharge > 0) {
            intlRow.classList.remove('hidden');
            intlRow.classList.add('flex');
            document.getElementById('breakdown-intl-percent').textContent = intlSurcharge + '%';
            document.getElementById('breakdown-intl-amount').textContent = formatMoney(intlFeeAmount, sym);
        } else {
            intlRow.classList.add('hidden');
            intlRow.classList.remove('flex');
        }

        document.getElementById('breakdown-total').textContent = formatMoney(fee, sym);
        const effectiveRateVal = (fee / chargeAmount * 100);
        document.getElementById('breakdown-effective-rate').textContent = effectiveRateVal.toFixed(2) + '%';

        // Comparison table
        const comparisonAmounts = [5, 10, 25, 50, 100, 250, 500, 1000];
        const tbody = document.getElementById('comparison-table-body');
        tbody.innerHTML = '';
        comparisonAmounts.forEach(amt => {
            const cFee = amt * (totalPercent / 100) + fixedFee;
            const cReceive = amt - cFee;
            const cEffective = (cFee / amt * 100);
            const row = document.createElement('tr');
            row.className = 'border-b border-gold/5';
            row.innerHTML =
                '<td class="py-2 pr-4">' + formatMoney(amt, sym) + '</td>' +
                '<td class="py-2 pr-4 text-red-400">' + formatMoney(cFee, sym) + '</td>' +
                '<td class="py-2 pr-4 text-green-400">' + formatMoney(cReceive, sym) + '</td>' +
                '<td class="py-2 text-gold">' + cEffective.toFixed(2) + '%</td>';
            tbody.appendChild(row);
        });

        // Stats bar
        document.getElementById('stat-rate').textContent = totalPercent.toFixed(2) + '% + ' + formatMoney(fixedFee, sym);
        document.getElementById('stat-card').textContent = cardTypeSelect.options[cardTypeSelect.selectedIndex].text;
        document.getElementById('stat-region').textContent = rate.name;

        // Show results
        resultsSection.classList.remove('hidden');
        statsBar.classList.remove('hidden');
        errorNotification.classList.add('hidden');
    }

    function getResultText() {
        const sym = getCurrencySymbol();
        const charge = document.getElementById('result-charge').textContent;
        const fee = document.getElementById('result-fee').textContent;
        const receive = document.getElementById('result-receive').textContent;
        const effective = document.getElementById('breakdown-effective-rate').textContent;
        const rate = document.getElementById('stat-rate').textContent;
        const region = document.getElementById('stat-region').textContent;
        const card = document.getElementById('stat-card').textContent;

        return S.resultHeader + '\n' +
            '=====================\n' +
            S.resultChargeAmount + ': ' + charge + '\n' +
            S.resultStripeFee + ':    ' + fee + '\n' +
            S.resultYouReceive + ':   ' + receive + '\n' +
            S.resultEffectiveRate + ': ' + effective + '\n\n' +
            S.resultSettings + ': ' + region + ' | ' + card + ' | ' + S.resultRate + ': ' + rate + '\n' +
            '\nCalculated at hafiz.dev/tools/stripe-fee-calculator';
    }

    // Event listeners
    btnCalculate.addEventListener('click', calculate);

    btnSample.addEventListener('click', function() {
        inputAmount.value = '100.00';
        countrySelect.value = 'us';
        cardTypeSelect.value = 'domestic';
        modeSelect.value = 'fee_from_amount';
        currencySelect.value = '$';
        currencyPrefix.textContent = '$';
        inputLabel.textContent = S.chargeAmount;
        customRatePanel.classList.add('hidden');
        calculate();
    });

    btnCopy.addEventListener('click', function() {
        if (resultsSection.classList.contains('hidden')) {
            showError(S.calculateFirst);
            return;
        }
        navigator.clipboard.writeText(getResultText()).then(function() {
            copyText.textContent = S.copied;
            copyIcon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>';
            copyIcon.classList.add('text-green-400');
            showSuccess(S.copiedToClipboard);
            setTimeout(function() {
                copyText.textContent = S.copy;
                copyIcon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path>';
                copyIcon.classList.remove('text-green-400');
            }, 2000);
        });
    });

    btnDownload.addEventListener('click', function() {
        if (resultsSection.classList.contains('hidden')) {
            showError(S.calculateFirstDownload);
            return;
        }
        const blob = new Blob([getResultText()], { type: 'text/plain' });
        const url = URL.createObjectURL(blob);
        const a = document.createElement('a');
        a.href = url;
        a.download = 'stripe-fee-calculation.txt';
        a.click();
        URL.revokeObjectURL(url);
        showSuccess(S.downloaded);
    });

    btnClear.addEventListener('click', function() {
        inputAmount.value = '';
        resultsSection.classList.add('hidden');
        statsBar.classList.add('hidden');
        successNotification.classList.add('hidden');
        errorNotification.classList.add('hidden');
    });

    // Country change updates currency
    countrySelect.addEventListener('change', function() {
        const val = countrySelect.value;
        if (val === 'custom') {
            customRatePanel.classList.remove('hidden');
        } else {
            customRatePanel.classList.add('hidden');
            // Auto-set currency symbol
            const rate = RATES[val];
            if (rate) {
                // Find matching currency in select
                for (let i = 0; i < currencySelect.options.length; i++) {
                    if (currencySelect.options[i].value === rate.currency) {
                        currencySelect.selectedIndex = i;
                        break;
                    }
                }
                currencyPrefix.textContent = rate.currency;
            }
        }
        if (!resultsSection.classList.contains('hidden')) calculate();
    });

    cardTypeSelect.addEventListener('change', function() {
        if (!resultsSection.classList.contains('hidden')) calculate();
    });

    modeSelect.addEventListener('change', function() {
        if (modeSelect.value === 'fee_from_amount') {
            inputLabel.textContent = S.chargeAmount;
        } else {
            inputLabel.textContent = S.desiredReceiveAmount;
        }
        if (!resultsSection.classList.contains('hidden')) calculate();
    });

    currencySelect.addEventListener('change', function() {
        currencyPrefix.textContent = currencySelect.value;
        if (!resultsSection.classList.contains('hidden')) calculate();
    });

    // Keyboard shortcut: Ctrl/Cmd+Enter
    document.addEventListener('keydown', function(e) {
        if ((e.ctrlKey || e.metaKey) && e.key === 'Enter') {
            e.preventDefault();
            calculate();
        }
    });

    // Auto-calculate on Enter in input
    inputAmount.addEventListener('keydown', function(e) {
        if (e.key === 'Enter') {
            e.preventDefault();
            calculate();
        }
    });
})();
</script>
