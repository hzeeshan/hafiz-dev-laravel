<script>
(function() {
    'use strict';

    // Translatable strings
    var stringsEl = document.getElementById('tool-strings');
    var S = {
        error_invalid: stringsEl?.dataset.errorInvalid || 'Please enter a valid amount greater than 0.',
        error_calculate_first_copy: stringsEl?.dataset.errorCalculateFirstCopy || 'Calculate fees first before copying.',
        error_calculate_first_download: stringsEl?.dataset.errorCalculateFirstDownload || 'Calculate fees first before downloading.',
        copied_to_clipboard: stringsEl?.dataset.copiedToClipboard || 'Results copied to clipboard!',
        downloaded: stringsEl?.dataset.downloaded || 'Downloaded venmo-fee-calculation.txt',
        payment_amount: stringsEl?.dataset.paymentAmount || 'Payment Amount',
        desired_receive_amount: stringsEl?.dataset.desiredReceiveAmount || 'Desired Receive Amount',
        fee_from_amount_mode: stringsEl?.dataset.feeFromAmountMode || 'Fee from amount',
        reverse_mode: stringsEl?.dataset.reverseMode || 'Reverse calculation',
        transfer_amount: stringsEl?.dataset.transferAmount || 'Transfer Amount',
        you_receive: stringsEl?.dataset.youReceive || 'You Receive',
        buyer_pays: stringsEl?.dataset.buyerPays || 'Buyer Pays',
        seller_receives: stringsEl?.dataset.sellerReceives || 'Seller Receives',
        charge_this: stringsEl?.dataset.chargeThis || 'Charge This',
        you_send: stringsEl?.dataset.youSend || 'You Send',
        recipient_gets: stringsEl?.dataset.recipientGets || 'Recipient Gets',
        send_this: stringsEl?.dataset.sendThis || 'Send This',
        free_label: stringsEl?.dataset.freeLabel || 'Free',
        copied: stringsEl?.dataset.copied || 'Copied!',
        copy: stringsEl?.dataset.copy || 'Copy'
    };

    // DOM elements
    const transactionType = document.getElementById('opt-transaction-type');
    const modeSelect = document.getElementById('opt-mode');
    const inputAmount = document.getElementById('input-amount');
    const inputLabel = document.getElementById('input-label');
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

    // Fee structures
    const FEES = {
        personal_free: { percent: 0, fixed: 0, label: 'Personal (Bank/Debit/Balance)', description: 'Free' },
        personal_credit: { percent: 3, fixed: 0, label: 'Personal (Credit Card)', description: '3%' },
        business: { percent: 1.9, fixed: 0.10, label: 'Business / Goods & Services', description: '1.9% + $0.10' },
        instant_transfer: { percent: 1.75, fixed: 0, minFee: 0.25, maxFee: 25.00, label: 'Instant Transfer', description: '1.75% (min $0.25, max $25)' }
    };

    function formatMoney(amount) {
        return '$' + amount.toFixed(2);
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

    function calculateFee(amount, feeConfig) {
        var fee = amount * (feeConfig.percent / 100) + feeConfig.fixed;

        // Apply min/max for instant transfer
        if (feeConfig.minFee !== undefined && fee < feeConfig.minFee) {
            fee = feeConfig.minFee;
        }
        if (feeConfig.maxFee !== undefined && fee > feeConfig.maxFee) {
            fee = feeConfig.maxFee;
        }

        return fee;
    }

    function calculate() {
        var amount = parseFloat(inputAmount.value);
        if (!amount || amount <= 0) {
            showError(S.error_invalid);
            return;
        }

        var type = transactionType.value;
        var feeConfig = FEES[type];
        var mode = modeSelect.value;

        var sendAmount, fee, receiveAmount, percentFeeAmount;

        if (mode === 'fee_from_amount') {
            sendAmount = amount;
            fee = calculateFee(sendAmount, feeConfig);
            percentFeeAmount = sendAmount * (feeConfig.percent / 100);
            receiveAmount = sendAmount - fee;
        } else {
            // Reverse calculation: want to receive X, how much to send/charge?
            receiveAmount = amount;

            if (feeConfig.percent === 0 && feeConfig.fixed === 0) {
                // Free transaction
                sendAmount = receiveAmount;
                fee = 0;
                percentFeeAmount = 0;
            } else if (type === 'instant_transfer') {
                // Instant transfer reverse: more complex due to min/max
                // fee = clamp(sendAmount * 0.0175, 0.25, 25)
                // receiveAmount = sendAmount - fee
                // Try: sendAmount = receiveAmount + fee, iterate
                var rawSend = (receiveAmount) / (1 - feeConfig.percent / 100);
                var rawFee = rawSend * (feeConfig.percent / 100);

                if (rawFee < feeConfig.minFee) {
                    // Fee will be the minimum
                    sendAmount = receiveAmount + feeConfig.minFee;
                    fee = feeConfig.minFee;
                } else if (rawFee > feeConfig.maxFee) {
                    // Fee will be the maximum
                    sendAmount = receiveAmount + feeConfig.maxFee;
                    fee = feeConfig.maxFee;
                } else {
                    sendAmount = rawSend;
                    fee = rawFee;
                }
                percentFeeAmount = fee;
            } else {
                // Standard reverse: sendAmount = (receiveAmount + fixed) / (1 - percent/100)
                sendAmount = (receiveAmount + feeConfig.fixed) / (1 - feeConfig.percent / 100);
                fee = sendAmount - receiveAmount;
                percentFeeAmount = sendAmount * (feeConfig.percent / 100);
            }
        }

        // Update results
        document.getElementById('result-send').textContent = formatMoney(sendAmount);
        document.getElementById('result-fee').textContent = fee === 0 ? '$0.00' : '-' + formatMoney(fee);
        document.getElementById('result-receive').textContent = formatMoney(receiveAmount);

        // Update labels
        if (type === 'instant_transfer') {
            document.getElementById('result-label-1').textContent = S.transfer_amount;
            document.getElementById('result-label-3').textContent = S.you_receive;
        } else if (type === 'business') {
            if (mode === 'fee_from_amount') {
                document.getElementById('result-label-1').textContent = S.buyer_pays;
                document.getElementById('result-label-3').textContent = S.seller_receives;
            } else {
                document.getElementById('result-label-1').textContent = S.charge_this;
                document.getElementById('result-label-3').textContent = S.seller_receives;
            }
        } else {
            if (mode === 'fee_from_amount') {
                document.getElementById('result-label-1').textContent = S.you_send;
                document.getElementById('result-label-3').textContent = S.recipient_gets;
            } else {
                document.getElementById('result-label-1').textContent = S.send_this;
                document.getElementById('result-label-3').textContent = S.recipient_gets;
            }
        }

        // Fee breakdown
        document.getElementById('breakdown-fee-type').textContent = feeConfig.description;
        document.getElementById('breakdown-percent').textContent = feeConfig.percent + '%';
        document.getElementById('breakdown-percent-amount').textContent = formatMoney(percentFeeAmount);

        var fixedRow = document.getElementById('breakdown-fixed-row');
        if (feeConfig.fixed > 0) {
            fixedRow.classList.remove('hidden');
            fixedRow.classList.add('flex');
            document.getElementById('breakdown-fixed-amount').textContent = formatMoney(feeConfig.fixed);
        } else {
            fixedRow.classList.add('hidden');
            fixedRow.classList.remove('flex');
        }

        document.getElementById('breakdown-total').textContent = fee === 0 ? '$0.00' : formatMoney(fee);
        var effectiveRate = sendAmount > 0 ? (fee / sendAmount * 100) : 0;
        document.getElementById('breakdown-effective-rate').textContent = effectiveRate.toFixed(2) + '%';

        // Comparison table
        var comparisonAmounts = [5, 10, 25, 50, 100, 250, 500, 1000];
        var tbody = document.getElementById('comparison-table-body');
        tbody.innerHTML = '';
        comparisonAmounts.forEach(function(amt) {
            var cFee = calculateFee(amt, feeConfig);
            var cReceive = amt - cFee;
            var cEffective = amt > 0 ? (cFee / amt * 100) : 0;
            var row = document.createElement('tr');
            row.className = 'border-b border-gold/5';
            row.innerHTML =
                '<td class="py-2 pr-4">' + formatMoney(amt) + '</td>' +
                '<td class="py-2 pr-4 text-red-400">' + (cFee === 0 ? S.free_label : formatMoney(cFee)) + '</td>' +
                '<td class="py-2 pr-4 text-green-400">' + formatMoney(cReceive) + '</td>' +
                '<td class="py-2 text-gold">' + cEffective.toFixed(2) + '%</td>';
            tbody.appendChild(row);
        });

        // Stats bar
        document.getElementById('stat-type').textContent = feeConfig.label;
        document.getElementById('stat-rate').textContent = feeConfig.description;
        document.getElementById('stat-mode').textContent = mode === 'fee_from_amount' ? S.fee_from_amount_mode : S.reverse_mode;

        // Show results
        resultsSection.classList.remove('hidden');
        statsBar.classList.remove('hidden');
        errorNotification.classList.add('hidden');
    }

    function getResultText() {
        var send = document.getElementById('result-send').textContent;
        var fee = document.getElementById('result-fee').textContent;
        var receive = document.getElementById('result-receive').textContent;
        var effective = document.getElementById('breakdown-effective-rate').textContent;
        var type = document.getElementById('stat-type').textContent;
        var rate = document.getElementById('stat-rate').textContent;

        return 'Venmo Fee Calculation\n' +
            '=====================\n' +
            'Amount:       ' + send + '\n' +
            'Venmo Fee:    ' + fee + '\n' +
            'Net Amount:   ' + receive + '\n' +
            'Effective Rate: ' + effective + '\n\n' +
            'Transaction Type: ' + type + ' | Rate: ' + rate + '\n' +
            '\nCalculated at hafiz.dev/tools/venmo-fee-calculator';
    }

    // Event listeners
    btnCalculate.addEventListener('click', calculate);

    btnSample.addEventListener('click', function() {
        inputAmount.value = '100.00';
        transactionType.value = 'business';
        modeSelect.value = 'fee_from_amount';
        inputLabel.textContent = S.payment_amount;
        calculate();
    });

    btnCopy.addEventListener('click', function() {
        if (resultsSection.classList.contains('hidden')) {
            showError(S.error_calculate_first_copy);
            return;
        }
        navigator.clipboard.writeText(getResultText()).then(function() {
            copyText.textContent = S.copied;
            copyIcon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>';
            copyIcon.classList.add('text-green-400');
            showSuccess(S.copied_to_clipboard);
            setTimeout(function() {
                copyText.textContent = S.copy;
                copyIcon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path>';
                copyIcon.classList.remove('text-green-400');
            }, 2000);
        });
    });

    btnDownload.addEventListener('click', function() {
        if (resultsSection.classList.contains('hidden')) {
            showError(S.error_calculate_first_download);
            return;
        }
        var blob = new Blob([getResultText()], { type: 'text/plain' });
        var url = URL.createObjectURL(blob);
        var a = document.createElement('a');
        a.href = url;
        a.download = 'venmo-fee-calculation.txt';
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

    // Auto-recalculate on option change when results are visible
    transactionType.addEventListener('change', function() {
        if (!resultsSection.classList.contains('hidden')) calculate();
    });

    modeSelect.addEventListener('change', function() {
        if (modeSelect.value === 'fee_from_amount') {
            inputLabel.textContent = S.payment_amount;
        } else {
            inputLabel.textContent = S.desired_receive_amount;
        }
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
