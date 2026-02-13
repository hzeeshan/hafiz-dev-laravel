<script>
(function() {
    // Get translatable strings from data attributes (for Italian/other locales)
    const stringsEl = document.getElementById('tool-strings');
    const S = {
        timestampCopied: stringsEl?.dataset.timestampCopied || 'Timestamp copied!',
        enterTimestamp: stringsEl?.dataset.enterTimestamp || 'Please enter a timestamp',
        invalidTimestamp: stringsEl?.dataset.invalidTimestamp || 'Invalid timestamp. Please enter a valid number.',
        negativeTimestamp: stringsEl?.dataset.negativeTimestamp || 'Negative timestamps (before 1970) are not supported.',
        unableToConvert: stringsEl?.dataset.unableToConvert || 'Invalid timestamp. Unable to convert.',
        selectDate: stringsEl?.dataset.selectDate || 'Please select a date',
        invalidDate: stringsEl?.dataset.invalidDate || 'Invalid date. Please check your input.',
        copyFailed: stringsEl?.dataset.copyFailed || 'Failed to copy to clipboard',
        copied: stringsEl?.dataset.copied || 'Copied!',
        allFormatsCopied: stringsEl?.dataset.allFormatsCopied || 'All formats copied!',
        year: stringsEl?.dataset.year || 'year',
        years: stringsEl?.dataset.years || 'years',
        month: stringsEl?.dataset.month || 'month',
        months: stringsEl?.dataset.months || 'months',
        day: stringsEl?.dataset.day || 'day',
        days: stringsEl?.dataset.days || 'days',
        hour: stringsEl?.dataset.hour || 'hour',
        hours: stringsEl?.dataset.hours || 'hours',
        minute: stringsEl?.dataset.minute || 'minute',
        minutes: stringsEl?.dataset.minutes || 'minutes',
        second: stringsEl?.dataset.second || 'second',
        seconds: stringsEl?.dataset.seconds || 'seconds',
        ago: stringsEl?.dataset.ago || '{time} ago',
        inFuture: stringsEl?.dataset.inFuture || 'in {time}',
    };

    // DOM Elements - Current Time
    const currentTimestamp = document.getElementById('current-timestamp');
    const currentDate = document.getElementById('current-date');
    const btnCopyCurrent = document.getElementById('btn-copy-current');
    const quickCurrentTs = document.getElementById('quick-current-ts');
    const quickCurrentDate = document.getElementById('quick-current-date');

    // DOM Elements - Tabs
    const tabTimestampToDate = document.getElementById('tab-timestamp-to-date');
    const tabDateToTimestamp = document.getElementById('tab-date-to-timestamp');
    const modeTimestampToDate = document.getElementById('mode-timestamp-to-date');
    const modeDateToTimestamp = document.getElementById('mode-date-to-timestamp');

    // DOM Elements - Timestamp to Date
    const timestampInput = document.getElementById('timestamp-input');
    const timezoneSelect = document.getElementById('timezone-select');
    const btnConvertTimestamp = document.getElementById('btn-convert-timestamp');
    const btnUseCurrentTs = document.getElementById('btn-use-current-ts');
    const btnClearTs = document.getElementById('btn-clear-ts');
    const tsResults = document.getElementById('ts-results');
    const resultIso8601 = document.getElementById('result-iso8601');
    const resultRfc2822 = document.getElementById('result-rfc2822');
    const resultLocal = document.getElementById('result-local');
    const resultUtc = document.getElementById('result-utc');
    const resultRelative = document.getElementById('result-relative');
    const btnCopyAllTs = document.getElementById('btn-copy-all-ts');

    // DOM Elements - Date to Timestamp
    const dateInput = document.getElementById('date-input');
    const timeInput = document.getElementById('time-input');
    const timezoneSelectDate = document.getElementById('timezone-select-date');
    const btnConvertDate = document.getElementById('btn-convert-date');
    const btnUseCurrentDate = document.getElementById('btn-use-current-date');
    const btnClearDate = document.getElementById('btn-clear-date');
    const dateResults = document.getElementById('date-results');
    const resultSeconds = document.getElementById('result-seconds');
    const resultMilliseconds = document.getElementById('result-milliseconds');

    // DOM Elements - Notifications
    const copyNotification = document.getElementById('copy-notification');
    const copyMessage = document.getElementById('copy-message');
    const errorNotification = document.getElementById('error-notification');
    const errorMessage = document.getElementById('error-message');

    // Update current time every second
    function updateCurrentTime() {
        const now = new Date();
        const timestamp = Math.floor(now.getTime() / 1000);

        currentTimestamp.textContent = timestamp;
        currentDate.textContent = now.toLocaleString('en-US', {
            weekday: 'long',
            year: 'numeric',
            month: 'long',
            day: 'numeric',
            hour: '2-digit',
            minute: '2-digit',
            second: '2-digit',
            timeZoneName: 'short'
        });

        // Update quick reference
        quickCurrentTs.textContent = timestamp;
        quickCurrentDate.textContent = now.toUTCString().replace('GMT', 'UTC').replace(/^\w+, /, '');
    }

    setInterval(updateCurrentTime, 1000);
    updateCurrentTime();

    // Tab switching
    tabTimestampToDate.addEventListener('click', function() {
        tabTimestampToDate.classList.add('border-gold', 'text-gold');
        tabTimestampToDate.classList.remove('border-transparent', 'text-light-muted');
        tabDateToTimestamp.classList.remove('border-gold', 'text-gold');
        tabDateToTimestamp.classList.add('border-transparent', 'text-light-muted');
        modeTimestampToDate.classList.remove('hidden');
        modeDateToTimestamp.classList.add('hidden');
    });

    tabDateToTimestamp.addEventListener('click', function() {
        tabDateToTimestamp.classList.add('border-gold', 'text-gold');
        tabDateToTimestamp.classList.remove('border-transparent', 'text-light-muted');
        tabTimestampToDate.classList.remove('border-gold', 'text-gold');
        tabTimestampToDate.classList.add('border-transparent', 'text-light-muted');
        modeDateToTimestamp.classList.remove('hidden');
        modeTimestampToDate.classList.add('hidden');
    });

    // Get relative time string
    function getRelativeTime(date) {
        const now = new Date();
        const diff = date - now;
        const absDiff = Math.abs(diff);

        const seconds = Math.floor(absDiff / 1000);
        const minutes = Math.floor(seconds / 60);
        const hours = Math.floor(minutes / 60);
        const days = Math.floor(hours / 24);
        const months = Math.floor(days / 30);
        const years = Math.floor(days / 365);

        let result;
        if (years > 0) result = `${years} ${years > 1 ? S.years : S.year}`;
        else if (months > 0) result = `${months} ${months > 1 ? S.months : S.month}`;
        else if (days > 0) result = `${days} ${days > 1 ? S.days : S.day}`;
        else if (hours > 0) result = `${hours} ${hours > 1 ? S.hours : S.hour}`;
        else if (minutes > 0) result = `${minutes} ${minutes > 1 ? S.minutes : S.minute}`;
        else result = `${seconds} ${seconds !== 1 ? S.seconds : S.second}`;

        return diff < 0 ? S.ago.replace('{time}', result) : S.inFuture.replace('{time}', result);
    }

    // Convert timestamp to date
    function convertTimestampToDate() {
        const input = timestampInput.value.trim();

        if (!input) {
            showError(S.enterTimestamp);
            return;
        }

        const timestamp = parseInt(input, 10);

        if (isNaN(timestamp)) {
            showError(S.invalidTimestamp);
            return;
        }

        // Check for negative timestamps (before 1970)
        if (timestamp < 0) {
            showError(S.negativeTimestamp);
            return;
        }

        // Auto-detect seconds vs milliseconds
        let ms = timestamp;
        if (timestamp.toString().length <= 10) {
            // Seconds - convert to milliseconds
            ms = timestamp * 1000;
        }

        const date = new Date(ms);

        // Check for invalid date
        if (isNaN(date.getTime())) {
            showError(S.unableToConvert);
            return;
        }

        const timezone = timezoneSelect.value;
        const isLocal = timezone === 'local';
        const tz = isLocal ? undefined : timezone;

        // Format results
        resultIso8601.textContent = date.toISOString();
        resultRfc2822.textContent = date.toUTCString();

        if (isLocal) {
            resultLocal.textContent = date.toLocaleString('en-US', {
                dateStyle: 'full',
                timeStyle: 'long'
            });
        } else {
            resultLocal.textContent = date.toLocaleString('en-US', {
                timeZone: tz,
                dateStyle: 'full',
                timeStyle: 'long'
            });
        }

        resultUtc.textContent = date.toUTCString();
        resultRelative.textContent = getRelativeTime(date);

        tsResults.classList.remove('hidden');
        hideError();
    }

    // Convert date to timestamp
    function convertDateToTimestamp() {
        const dateValue = dateInput.value;
        const timeValue = timeInput.value || '00:00:00';

        if (!dateValue) {
            showError(S.selectDate);
            return;
        }

        const timezone = timezoneSelectDate.value;
        let date;

        if (timezone === 'local') {
            // Local timezone
            date = new Date(`${dateValue}T${timeValue}`);
        } else if (timezone === 'UTC') {
            // UTC
            date = new Date(`${dateValue}T${timeValue}Z`);
        } else {
            // Specific timezone - create date and adjust
            const localDate = new Date(`${dateValue}T${timeValue}`);
            const utcDate = new Date(`${dateValue}T${timeValue}Z`);

            // Get the offset for the target timezone
            const formatter = new Intl.DateTimeFormat('en-US', {
                timeZone: timezone,
                year: 'numeric',
                month: '2-digit',
                day: '2-digit',
                hour: '2-digit',
                minute: '2-digit',
                second: '2-digit',
                hour12: false
            });

            // Parse the formatted date back
            const parts = formatter.formatToParts(utcDate);
            const getPart = (type) => parts.find(p => p.type === type)?.value || '00';

            // Calculate the offset by comparing
            const tzDate = new Date(
                `${getPart('year')}-${getPart('month')}-${getPart('day')}T${getPart('hour')}:${getPart('minute')}:${getPart('second')}Z`
            );

            const offset = utcDate.getTime() - tzDate.getTime();
            date = new Date(utcDate.getTime() + offset);
        }

        if (isNaN(date.getTime())) {
            showError(S.invalidDate);
            return;
        }

        const seconds = Math.floor(date.getTime() / 1000);
        const milliseconds = date.getTime();

        resultSeconds.textContent = seconds;
        resultMilliseconds.textContent = milliseconds;

        dateResults.classList.remove('hidden');
        hideError();
    }

    // Copy to clipboard
    function copyToClipboard(text, message) {
        navigator.clipboard.writeText(text).then(() => {
            showNotification(message);
        }).catch(() => {
            showError(S.copyFailed);
        });
    }

    // Show success notification
    function showNotification(message) {
        copyMessage.textContent = message;
        copyNotification.classList.remove('hidden');
        errorNotification.classList.add('hidden');

        setTimeout(() => {
            copyNotification.classList.add('hidden');
        }, 2000);
    }

    // Show error notification
    function showError(message) {
        errorMessage.textContent = message;
        errorNotification.classList.remove('hidden');
        copyNotification.classList.add('hidden');

        setTimeout(() => {
            errorNotification.classList.add('hidden');
        }, 3000);
    }

    // Hide error notification
    function hideError() {
        errorNotification.classList.add('hidden');
    }

    // Event listeners - Current time
    btnCopyCurrent.addEventListener('click', function() {
        copyToClipboard(currentTimestamp.textContent, S.timestampCopied);
    });

    currentTimestamp.addEventListener('click', function() {
        copyToClipboard(currentTimestamp.textContent, S.timestampCopied);
    });

    // Event listeners - Timestamp to Date
    btnConvertTimestamp.addEventListener('click', convertTimestampToDate);

    timestampInput.addEventListener('keydown', function(e) {
        if (e.key === 'Enter') {
            convertTimestampToDate();
        }
    });

    btnUseCurrentTs.addEventListener('click', function() {
        timestampInput.value = Math.floor(Date.now() / 1000);
        convertTimestampToDate();
    });

    btnClearTs.addEventListener('click', function() {
        timestampInput.value = '';
        tsResults.classList.add('hidden');
        hideError();
    });

    btnCopyAllTs.addEventListener('click', function() {
        const all = [
            `ISO 8601: ${resultIso8601.textContent}`,
            `RFC 2822: ${resultRfc2822.textContent}`,
            `Local: ${resultLocal.textContent}`,
            `UTC: ${resultUtc.textContent}`,
            `Relative: ${resultRelative.textContent}`
        ].join('\n');
        copyToClipboard(all, S.allFormatsCopied);
    });

    // Event listeners - Date to Timestamp
    btnConvertDate.addEventListener('click', convertDateToTimestamp);

    btnUseCurrentDate.addEventListener('click', function() {
        const now = new Date();
        dateInput.value = now.toISOString().split('T')[0];
        timeInput.value = now.toTimeString().split(' ')[0];
        convertDateToTimestamp();
    });

    btnClearDate.addEventListener('click', function() {
        dateInput.value = '';
        timeInput.value = '00:00:00';
        dateResults.classList.add('hidden');
        hideError();
    });

    // Event listeners - Copy result buttons
    document.querySelectorAll('.copy-result-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            const targetId = this.getAttribute('data-target');
            const target = document.getElementById(targetId);
            if (target) {
                copyToClipboard(target.textContent, S.copied);
            }
        });
    });

    // Quick reference timestamps - click to use
    document.querySelectorAll('.quick-ref-ts').forEach(el => {
        el.addEventListener('click', function() {
            const ts = this.getAttribute('data-ts');
            if (ts) {
                timestampInput.value = ts;
                // Switch to timestamp tab if not already there
                tabTimestampToDate.click();
                convertTimestampToDate();
            }
        });
    });

    quickCurrentTs.addEventListener('click', function() {
        timestampInput.value = this.textContent;
        tabTimestampToDate.click();
        convertTimestampToDate();
    });

    // Initialize date input with today's date
    const today = new Date();
    dateInput.value = today.toISOString().split('T')[0];
})();
</script>
