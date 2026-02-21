<style>
    /* Normalize date inputs on iOS Safari */
    input[type="date"] {
        -webkit-appearance: none;
        appearance: none;
        min-height: 50px;
        position: relative;
    }

    /* Placeholder for empty date inputs on iOS Safari */
    .date-input-wrapper {
        position: relative;
    }
    .date-input-wrapper:not(.has-value):not(.is-focused) input[type="date"] {
        color: transparent;
    }
    .date-input-wrapper::after {
        content: attr(data-placeholder);
        position: absolute;
        left: 1rem;
        top: 50%;
        transform: translateY(-50%);
        color: var(--color-light-muted);
        pointer-events: none;
        font-size: 1rem;
    }
    .date-input-wrapper.has-value::after,
    .date-input-wrapper.is-focused::after {
        display: none;
    }

    /* Style the native date picker calendar icon for dark theme */
    input[type="date"]::-webkit-calendar-picker-indicator {
        filter: invert(85%) sepia(20%) saturate(500%) hue-rotate(10deg) brightness(95%);
        cursor: pointer;
    }
</style>
<script>
(function() {
    // Toggle placeholder visibility for date input wrappers
    document.querySelectorAll('.date-input-wrapper input[type="date"]').forEach(function(input) {
        var wrapper = input.closest('.date-input-wrapper');
        function updateWrapper() {
            wrapper.classList.toggle('has-value', !!input.value);
        }
        input.addEventListener('change', updateWrapper);
        input.addEventListener('input', updateWrapper);
        input.addEventListener('focus', function() {
            wrapper.classList.add('is-focused');
        });
        input.addEventListener('blur', function() {
            wrapper.classList.remove('is-focused');
        });
        updateWrapper();
    });

    // DOM Elements
    const startDateInput = document.getElementById('start-date');
    const endDateInput = document.getElementById('end-date');
    const optIncludeEnd = document.getElementById('opt-include-end');
    const btnCalculate = document.getElementById('btn-calculate');
    const btnSample = document.getElementById('btn-sample');
    const btnClear = document.getElementById('btn-clear');
    const btnCopy = document.getElementById('btn-copy');
    const resultsSection = document.getElementById('results-section');
    const statsBar = document.getElementById('stats-bar');
    const successNotification = document.getElementById('success-notification');
    const successMessage = document.getElementById('success-message');
    const errorNotification = document.getElementById('error-notification');
    const errorMessage = document.getElementById('error-message');

    const monthNames = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
    const dayNames = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];

    function showSuccess(msg) {
        successMessage.textContent = msg;
        successNotification.classList.remove('hidden');
        errorNotification.classList.add('hidden');
        setTimeout(function() { successNotification.classList.add('hidden'); }, 2000);
    }

    function showError(msg) {
        errorMessage.textContent = msg;
        errorNotification.classList.remove('hidden');
        successNotification.classList.add('hidden');
        setTimeout(function() { errorNotification.classList.add('hidden'); }, 4000);
    }

    function formatDate(date) {
        return monthNames[date.getMonth()] + ' ' + date.getDate() + ', ' + date.getFullYear();
    }

    function countBusinessAndWeekendDays(start, end) {
        var businessDays = 0;
        var weekendDays = 0;
        var current = new Date(start);

        while (current < end) {
            var dow = current.getDay();
            if (dow === 0 || dow === 6) {
                weekendDays++;
            } else {
                businessDays++;
            }
            current.setDate(current.getDate() + 1);
        }

        return { businessDays: businessDays, weekendDays: weekendDays };
    }

    function calculateDays() {
        var startVal = startDateInput.value;
        var endVal = endDateInput.value;

        if (!startVal || !endVal) {
            showError('Please enter both a start date and an end date.');
            return;
        }

        var startDate = new Date(startVal + 'T00:00:00');
        var endDate = new Date(endVal + 'T00:00:00');

        // Auto-swap if start is after end
        if (startDate > endDate) {
            var temp = startDate;
            startDate = endDate;
            endDate = temp;
        }

        var includeEnd = optIncludeEnd.checked;

        // Calculate total calendar days
        var diffMs = endDate - startDate;
        var totalDays = Math.floor(diffMs / (1000 * 60 * 60 * 24));
        if (includeEnd) totalDays += 1;

        // Calculate years and months difference
        var years = endDate.getFullYear() - startDate.getFullYear();
        var months = endDate.getMonth() - startDate.getMonth();
        var days = endDate.getDate() - startDate.getDate();

        if (days < 0) {
            months--;
            var prevMonth = new Date(endDate.getFullYear(), endDate.getMonth(), 0);
            days += prevMonth.getDate();
        }
        if (months < 0) {
            years--;
            months += 12;
        }

        var totalWeeks = Math.floor(totalDays / 7);
        var remainderDays = totalDays % 7;
        var totalHours = totalDays * 24;

        // Calculate business days and weekend days
        var effectiveEnd = new Date(endDate);
        if (includeEnd) effectiveEnd.setDate(effectiveEnd.getDate() + 1);
        var bwd = countBusinessAndWeekendDays(startDate, effectiveEnd);

        // Total months count
        var totalMonths = years * 12 + months;

        // Update primary display
        document.getElementById('result-days').textContent = totalDays.toLocaleString();
        document.getElementById('result-range-label').textContent =
            'From ' + formatDate(startDate) + ' to ' + formatDate(endDate) +
            (includeEnd ? ' (inclusive)' : '');

        // Update detailed breakdown
        document.getElementById('result-years').textContent = years;
        document.getElementById('result-months').textContent = totalMonths.toLocaleString();
        document.getElementById('result-weeks').textContent = totalWeeks.toLocaleString();
        document.getElementById('result-business-days').textContent = bwd.businessDays.toLocaleString();
        document.getElementById('result-weekend-days').textContent = bwd.weekendDays.toLocaleString();
        document.getElementById('result-hours').textContent = totalHours.toLocaleString();

        // Update date info cards
        document.getElementById('start-date-display').textContent = formatDate(startDate);
        document.getElementById('start-day-of-week').textContent = dayNames[startDate.getDay()];
        document.getElementById('end-date-display').textContent = formatDate(endDate);
        document.getElementById('end-day-of-week').textContent = dayNames[endDate.getDay()];

        // Build summary text
        var summary = 'Date Range: ' + formatDate(startDate) + ' to ' + formatDate(endDate) + '\n';
        summary += 'Calendar Days: ' + totalDays.toLocaleString() + (includeEnd ? ' (inclusive)' : '') + '\n';
        summary += 'Breakdown: ' + years + ' year' + (years !== 1 ? 's' : '') + ', ' + months + ' month' + (months !== 1 ? 's' : '') + ', ' + days + ' day' + (days !== 1 ? 's' : '') + '\n';
        summary += 'Business Days: ' + bwd.businessDays.toLocaleString() + '\n';
        summary += 'Weekend Days: ' + bwd.weekendDays.toLocaleString() + '\n';
        summary += 'Total Weeks: ' + totalWeeks.toLocaleString() + ' weeks, ' + remainderDays + ' day' + (remainderDays !== 1 ? 's' : '') + '\n';
        summary += 'Total Hours: ' + totalHours.toLocaleString();
        document.getElementById('summary-text').textContent = summary;

        // Show results
        resultsSection.classList.remove('hidden');
        statsBar.classList.remove('hidden');
    }

    // Event listeners
    btnCalculate.addEventListener('click', calculateDays);

    // Keyboard shortcut: Ctrl/Cmd + Enter
    document.addEventListener('keydown', function(e) {
        if ((e.ctrlKey || e.metaKey) && e.key === 'Enter') {
            e.preventDefault();
            calculateDays();
        }
    });

    btnSample.addEventListener('click', function() {
        // Sample: from Jan 1, 2024 to today
        startDateInput.value = '2024-01-01';
        endDateInput.value = new Date().toISOString().split('T')[0];
        // Update wrappers
        document.querySelectorAll('.date-input-wrapper input[type="date"]').forEach(function(input) {
            input.closest('.date-input-wrapper').classList.toggle('has-value', !!input.value);
        });
        calculateDays();
    });

    btnClear.addEventListener('click', function() {
        startDateInput.value = '';
        endDateInput.value = '';
        optIncludeEnd.checked = false;
        resultsSection.classList.add('hidden');
        statsBar.classList.add('hidden');
        successNotification.classList.add('hidden');
        errorNotification.classList.add('hidden');
        // Re-check placeholder wrappers
        document.querySelectorAll('.date-input-wrapper input[type="date"]').forEach(function(input) {
            input.closest('.date-input-wrapper').classList.toggle('has-value', !!input.value);
        });
    });

    btnCopy.addEventListener('click', function() {
        var text = document.getElementById('summary-text').textContent;
        if (!text) return;
        var btn = this;
        navigator.clipboard.writeText(text).then(function() {
            var orig = btn.innerHTML;
            btn.innerHTML = '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> Copied!';
            btn.classList.add('text-green-400', 'border-green-400');
            showSuccess('Copied to clipboard!');
            setTimeout(function() {
                btn.innerHTML = orig;
                btn.classList.remove('text-green-400', 'border-green-400');
            }, 2000);
        });
    });

    // Recalculate when include-end option changes (if results are visible)
    optIncludeEnd.addEventListener('change', function() {
        if (!resultsSection.classList.contains('hidden')) {
            calculateDays();
        }
    });
})();
</script>
