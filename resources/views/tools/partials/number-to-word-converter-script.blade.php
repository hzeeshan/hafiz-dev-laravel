<script>
(function() {
    // DOM elements
    const numberInput = document.getElementById('number-input');
    const wordsOutput = document.getElementById('words-output');
    const btnConvert = document.getElementById('btn-convert');
    const btnCopy = document.getElementById('btn-copy');
    const btnDownload = document.getElementById('btn-download');
    const btnSample = document.getElementById('btn-sample');
    const btnClear = document.getElementById('btn-clear');
    const statsBar = document.getElementById('stats-bar');
    const successNotification = document.getElementById('success-notification');
    const successMessage = document.getElementById('success-message');
    const errorNotification = document.getElementById('error-notification');
    const errorMessage = document.getElementById('error-message');
    const currencyMode = document.getElementById('currency-mode');
    const capitalizeFirst = document.getElementById('capitalize-first');
    const useAnd = document.getElementById('use-and');
    const useHyphens = document.getElementById('use-hyphens');

    // Stats elements
    const statDigits = document.getElementById('stat-digits');
    const statWords = document.getElementById('stat-words');
    const statChars = document.getElementById('stat-chars');
    const statMagnitude = document.getElementById('stat-magnitude');

    // Sample data
    const SAMPLE_DATA = `42
1234567
3.14
-500
1000000.99
0
21
100
999999999`;

    // Number scale names
    const ones = ['', 'one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine',
                  'ten', 'eleven', 'twelve', 'thirteen', 'fourteen', 'fifteen', 'sixteen',
                  'seventeen', 'eighteen', 'nineteen'];
    const tens = ['', '', 'twenty', 'thirty', 'forty', 'fifty', 'sixty', 'seventy', 'eighty', 'ninety'];
    const scales = ['', 'thousand', 'million', 'billion', 'trillion', 'quadrillion',
                    'quintillion', 'sextillion', 'septillion', 'octillion', 'nonillion',
                    'decillion', 'undecillion', 'duodecillion', 'tredecillion',
                    'quattuordecillion', 'quindecillion', 'sexdecillion', 'septendecillion',
                    'octodecillion', 'novemdecillion', 'vigintillion'];

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
    }

    function hideNotifications() {
        successNotification.classList.add('hidden');
        errorNotification.classList.add('hidden');
    }

    function convertHundreds(num, addAnd) {
        let result = '';
        const h = Math.floor(num / 100);
        const remainder = num % 100;

        if (h > 0) {
            result += ones[h] + ' hundred';
            if (remainder > 0 && addAnd) {
                result += ' and ';
            } else if (remainder > 0) {
                result += ' ';
            }
        }

        if (remainder >= 20) {
            const t = Math.floor(remainder / 10);
            const o = remainder % 10;
            result += tens[t];
            if (o > 0) {
                result += useHyphens.checked ? '-' + ones[o] : ' ' + ones[o];
            }
        } else if (remainder > 0) {
            result += ones[remainder];
        }

        return result;
    }

    function numberToWords(numStr) {
        const addAnd = useAnd.checked;

        // Remove commas and spaces
        numStr = numStr.replace(/[,\s]/g, '');

        // Validate
        if (!/^-?\d+(\.\d+)?$/.test(numStr)) {
            return null;
        }

        let isNegative = false;
        if (numStr.startsWith('-')) {
            isNegative = true;
            numStr = numStr.substring(1);
        }

        // Split integer and decimal parts
        let [intPart, decPart] = numStr.split('.');

        // Remove leading zeros from integer part (keep at least one)
        intPart = intPart.replace(/^0+/, '') || '0';

        if (intPart === '0' && !decPart) {
            return 'zero';
        }

        let words = '';

        // Convert integer part
        if (intPart === '0') {
            words = 'zero';
        } else {
            // Process in groups of 3 from right to left
            const groups = [];
            let remaining = intPart;
            while (remaining.length > 0) {
                const start = Math.max(0, remaining.length - 3);
                groups.unshift(remaining.substring(start));
                remaining = remaining.substring(0, start);
            }

            if (groups.length > scales.length) {
                return null; // Number too large
            }

            const parts = [];
            for (let i = 0; i < groups.length; i++) {
                const groupNum = parseInt(groups[i], 10);
                if (groupNum === 0) continue;

                const scaleIndex = groups.length - 1 - i;
                const isLastGroup = i === groups.length - 1;
                const shouldAddAnd = addAnd && isLastGroup && parts.length > 0 && groupNum < 100;

                let groupWords = '';
                if (shouldAddAnd) {
                    groupWords = 'and ' + convertHundreds(groupNum, addAnd);
                } else {
                    groupWords = convertHundreds(groupNum, addAnd);
                }

                if (scales[scaleIndex]) {
                    groupWords += ' ' + scales[scaleIndex];
                }

                parts.push(groupWords);
            }

            words = parts.join(addAnd ? ', ' : ', ');
        }

        // Handle decimal part
        if (decPart) {
            words += ' point';
            for (let i = 0; i < decPart.length; i++) {
                const digit = parseInt(decPart[i], 10);
                words += ' ' + (digit === 0 ? 'zero' : ones[digit]);
            }
        }

        if (isNegative) {
            words = 'negative ' + words;
        }

        return words;
    }

    function numberToCurrency(numStr) {
        const addAnd = useAnd.checked;

        // Remove commas and spaces
        numStr = numStr.replace(/[,\s]/g, '');

        // Validate
        if (!/^-?\d+(\.\d{0,2})?$/.test(numStr)) {
            // Try to truncate to 2 decimal places
            if (/^-?\d+\.\d+$/.test(numStr)) {
                const parts = numStr.split('.');
                numStr = parts[0] + '.' + parts[1].substring(0, 2);
            } else {
                return null;
            }
        }

        let isNegative = false;
        if (numStr.startsWith('-')) {
            isNegative = true;
            numStr = numStr.substring(1);
        }

        let [intPart, decPart] = numStr.split('.');
        intPart = intPart.replace(/^0+/, '') || '0';
        decPart = (decPart || '00').padEnd(2, '0').substring(0, 2);

        const dollars = numberToWords(intPart);
        if (dollars === null) return null;

        const cents = parseInt(decPart, 10);
        let result = dollars + (intPart === '1' ? ' dollar' : ' dollars');

        if (cents > 0) {
            const centsWords = numberToWords(cents.toString());
            result += ' and ' + centsWords + (cents === 1 ? ' cent' : ' cents');
        }

        if (isNegative) {
            result = 'negative ' + result;
        }

        return result;
    }

    function getMagnitude(numStr) {
        numStr = numStr.replace(/[,\s-]/g, '');
        const intPart = numStr.split('.')[0].replace(/^0+/, '') || '0';
        const len = intPart.length;

        if (len <= 3) return 'Ones';
        if (len <= 6) return 'Thousands';
        if (len <= 9) return 'Millions';
        if (len <= 12) return 'Billions';
        if (len <= 15) return 'Trillions';
        if (len <= 18) return 'Quadrillions';
        if (len <= 21) return 'Quintillions';
        return 'Very Large';
    }

    function convert() {
        hideNotifications();
        const input = numberInput.value.trim();

        if (!input) {
            showError('Please enter a number to convert.');
            wordsOutput.value = '';
            statsBar.classList.add('hidden');
            return;
        }

        // Support multi-line input
        const lines = input.split('\n').filter(line => line.trim() !== '');
        const results = [];
        let hasError = false;

        for (const line of lines) {
            const trimmed = line.trim();
            let result;

            if (currencyMode.checked) {
                result = numberToCurrency(trimmed);
            } else {
                result = numberToWords(trimmed);
            }

            if (result === null) {
                results.push(`[Invalid: ${trimmed}]`);
                hasError = true;
            } else {
                if (capitalizeFirst.checked) {
                    result = result.charAt(0).toUpperCase() + result.slice(1);
                }
                results.push(result);
            }
        }

        wordsOutput.value = results.join('\n');

        if (hasError && lines.length === 1) {
            showError('Invalid number format. Please enter a valid number.');
            statsBar.classList.add('hidden');
            return;
        }

        // Update stats
        const firstNum = lines[0].trim().replace(/[,\s]/g, '');
        const digitsOnly = firstNum.replace(/[^0-9]/g, '');
        const wordsText = results[0] || '';
        const wordCount = wordsText.split(/\s+/).filter(w => w.length > 0).length;

        statDigits.textContent = digitsOnly.length;
        statWords.textContent = wordCount;
        statChars.textContent = wordsText.length;
        statMagnitude.textContent = getMagnitude(firstNum);

        statsBar.classList.remove('hidden');

        if (hasError) {
            showSuccess('Converted with some invalid entries.');
        } else {
            showSuccess(`Converted ${lines.length} number${lines.length > 1 ? 's' : ''} to words.`);
        }
    }

    // Event listeners
    btnConvert.addEventListener('click', convert);

    btnCopy.addEventListener('click', function() {
        const output = wordsOutput.value;
        if (!output) {
            showError('Nothing to copy. Convert a number first.');
            return;
        }

        navigator.clipboard.writeText(output).then(() => {
            const originalHTML = btnCopy.innerHTML;
            btnCopy.innerHTML = '<svg class="w-5 h-5 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> Copied!';
            btnCopy.classList.add('border-green-500/50', 'text-green-400');
            setTimeout(() => {
                btnCopy.innerHTML = originalHTML;
                btnCopy.classList.remove('border-green-500/50', 'text-green-400');
            }, 2000);
        });
    });

    btnDownload.addEventListener('click', function() {
        const output = wordsOutput.value;
        if (!output) {
            showError('Nothing to download. Convert a number first.');
            return;
        }

        const blob = new Blob([output], { type: 'text/plain' });
        const url = URL.createObjectURL(blob);
        const a = document.createElement('a');
        a.href = url;
        a.download = 'number-to-words.txt';
        document.body.appendChild(a);
        a.click();
        document.body.removeChild(a);
        URL.revokeObjectURL(url);
        showSuccess('File downloaded successfully.');
    });

    btnSample.addEventListener('click', function() {
        numberInput.value = SAMPLE_DATA;
        hideNotifications();
        wordsOutput.value = '';
        statsBar.classList.add('hidden');
    });

    btnClear.addEventListener('click', function() {
        numberInput.value = '';
        wordsOutput.value = '';
        statsBar.classList.add('hidden');
        hideNotifications();
    });

    // Re-convert on option change
    [currencyMode, capitalizeFirst, useAnd, useHyphens].forEach(el => {
        el.addEventListener('change', function() {
            if (numberInput.value.trim()) {
                convert();
            }
        });
    });

    // Keyboard shortcut: Ctrl/Cmd + Enter
    numberInput.addEventListener('keydown', function(e) {
        if ((e.ctrlKey || e.metaKey) && e.key === 'Enter') {
            e.preventDefault();
            convert();
        }
    });

    // File upload support
    numberInput.addEventListener('dragover', function(e) {
        e.preventDefault();
        numberInput.classList.add('border-gold');
    });

    numberInput.addEventListener('dragleave', function() {
        numberInput.classList.remove('border-gold');
    });

    numberInput.addEventListener('drop', function(e) {
        e.preventDefault();
        numberInput.classList.remove('border-gold');
        const file = e.dataTransfer.files[0];
        if (file && file.type === 'text/plain') {
            const reader = new FileReader();
            reader.onload = function(event) {
                numberInput.value = event.target.result;
            };
            reader.readAsText(file);
        }
    });
})();
</script>
