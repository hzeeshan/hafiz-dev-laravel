<script>
(function() {
    // Get translatable strings from data attributes (for Italian/other locales)
    const stringsEl = document.getElementById('tool-strings');
    const S = {
        copy: stringsEl?.dataset.copy || 'Copy',
        copied: stringsEl?.dataset.copied || 'Copied!',
        everyMinute: stringsEl?.dataset.everyMinute || 'Every minute',
        everyNMinutes: stringsEl?.dataset.everyNMinutes || 'Every {n} minutes',
        atMinuteOf: stringsEl?.dataset.atMinuteOf || 'At minute {m} of every hour',
        at: stringsEl?.dataset.at || 'At',
        atMinutePast: stringsEl?.dataset.atMinutePast || 'At {m} past {h}',
        everyHour: stringsEl?.dataset.everyHour || 'every hour',
        everyNHours: stringsEl?.dataset.everyNHours || 'every {n} hours',
        to: stringsEl?.dataset.to || 'to',
        onDays: stringsEl?.dataset.onDays || 'on days {d} of the month',
        onDaysRange: stringsEl?.dataset.onDaysRange || 'on days {s}-{e} of the month',
        everyNDays: stringsEl?.dataset.everyNDays || 'every {n} days',
        onThe: stringsEl?.dataset.onThe || 'on the {d}',
        through: stringsEl?.dataset.through || 'through',
        inMonths: stringsEl?.dataset.inMonths || 'in {m}',
        everyNMonths: stringsEl?.dataset.everyNMonths || 'every {n} months',
        on: stringsEl?.dataset.on || 'on',
        invalidExpression: stringsEl?.dataset.invalidExpression || 'Invalid expression',
        invalidCron: stringsEl?.dataset.invalidCron || 'Invalid Cron Expression',
        mustHave5Fields: stringsEl?.dataset.mustHave5Fields || 'Cron expression must have exactly 5 fields',
        invalidStep: stringsEl?.dataset.invalidStep || 'Invalid step value in {f}: {v}',
        invalidRange: stringsEl?.dataset.invalidRange || 'Invalid range in {f}: {v}',
        invalidValue: stringsEl?.dataset.invalidValue || 'Invalid value in {f}: {v} (must be {min}-{max})',
        noUpcoming: stringsEl?.dataset.noUpcoming || 'No upcoming runs found',
        calculating: stringsEl?.dataset.calculating || 'Calculating...',
        timesInLocal: stringsEl?.dataset.timesInLocal || 'Times shown in your local timezone',
        orUsingHelpers: stringsEl?.dataset.orUsingHelpers || 'Or using Laravel helpers:',
        everyValue: stringsEl?.dataset.everyValue || 'Every value',
        list: stringsEl?.dataset.list || 'List (1,3,5)',
        range: stringsEl?.dataset.range || 'Range (1-5)',
        step: stringsEl?.dataset.step || 'Step (*/5)',
        minute: stringsEl?.dataset.minute || 'minute',
        minuteLabel: stringsEl?.dataset.minuteLabel || 'Minute',
        hourLabel: stringsEl?.dataset.hourLabel || 'Hour',
        dayOfMonthLabel: stringsEl?.dataset.dayOfMonthLabel || 'Day of Month',
        monthLabel: stringsEl?.dataset.monthLabel || 'Month',
        dayOfWeekLabel: stringsEl?.dataset.dayOfWeekLabel || 'Day of Week',
        // Day names
        sunday: stringsEl?.dataset.sunday || 'Sunday',
        monday: stringsEl?.dataset.monday || 'Monday',
        tuesday: stringsEl?.dataset.tuesday || 'Tuesday',
        wednesday: stringsEl?.dataset.wednesday || 'Wednesday',
        thursday: stringsEl?.dataset.thursday || 'Thursday',
        friday: stringsEl?.dataset.friday || 'Friday',
        saturday: stringsEl?.dataset.saturday || 'Saturday',
        // Month names
        january: stringsEl?.dataset.january || 'January',
        february: stringsEl?.dataset.february || 'February',
        march: stringsEl?.dataset.march || 'March',
        april: stringsEl?.dataset.april || 'April',
        may: stringsEl?.dataset.may || 'May',
        june: stringsEl?.dataset.june || 'June',
        july: stringsEl?.dataset.july || 'July',
        august: stringsEl?.dataset.august || 'August',
        september: stringsEl?.dataset.september || 'September',
        october: stringsEl?.dataset.october || 'October',
        november: stringsEl?.dataset.november || 'November',
        december: stringsEl?.dataset.december || 'December',
        // Ordinal suffixes (for English)
        ordinalSt: stringsEl?.dataset.ordinalSt || 'st',
        ordinalNd: stringsEl?.dataset.ordinalNd || 'nd',
        ordinalRd: stringsEl?.dataset.ordinalRd || 'rd',
        ordinalTh: stringsEl?.dataset.ordinalTh || 'th',
        // Date format locale
        dateLocale: stringsEl?.dataset.dateLocale || 'en-US',
    };

    // Build arrays from translated strings
    const dayNames = [S.sunday, S.monday, S.tuesday, S.wednesday, S.thursday, S.friday, S.saturday];
    const monthNames = [S.january, S.february, S.march, S.april, S.may, S.june, S.july, S.august, S.september, S.october, S.november, S.december];

    // DOM Elements
    const cronExpression = document.getElementById('cron-expression');
    const humanDescription = document.getElementById('human-description');
    const descriptionDisplay = document.getElementById('description-display');
    const errorDisplay = document.getElementById('error-display');
    const errorMessage = document.getElementById('error-message');
    const nextRunsList = document.getElementById('next-runs');
    const laravelCode = document.getElementById('laravel-code');
    const laravelHelper = document.getElementById('laravel-helper');
    const laravelAlternative = document.getElementById('laravel-alternative');
    const btnCopy = document.getElementById('btn-copy');

    // Visual builder elements
    const minuteType = document.getElementById('minute-type');
    const minuteValue = document.getElementById('minute-value');
    const hourType = document.getElementById('hour-type');
    const hourValue = document.getElementById('hour-value');
    const domType = document.getElementById('dom-type');
    const domValue = document.getElementById('dom-value');
    const monthType = document.getElementById('month-type');
    const monthValue = document.getElementById('month-value');
    const dowType = document.getElementById('dow-type');
    const dowValue = document.getElementById('dow-value');

    const presetButtons = document.querySelectorAll('.preset-btn');

    // Parse cron expression into parts
    function parseCron(expression) {
        const parts = expression.trim().split(/\s+/);
        if (parts.length !== 5) {
            throw new Error(S.mustHave5Fields);
        }
        return {
            minute: parts[0],
            hour: parts[1],
            dayOfMonth: parts[2],
            month: parts[3],
            dayOfWeek: parts[4]
        };
    }

    // Validate a single cron field
    function validateField(value, min, max, fieldName) {
        if (value === '*') return true;

        if (value.includes('/')) {
            const [base, step] = value.split('/');
            if (base !== '*' && !validateField(base, min, max, fieldName)) return false;
            const stepNum = parseInt(step, 10);
            if (isNaN(stepNum) || stepNum < 1) {
                throw new Error(S.invalidStep.replace('{f}', fieldName).replace('{v}', step));
            }
            return true;
        }

        if (value.includes('-')) {
            const [start, end] = value.split('-').map(v => parseInt(v, 10));
            if (isNaN(start) || isNaN(end) || start < min || end > max || start > end) {
                throw new Error(S.invalidRange.replace('{f}', fieldName).replace('{v}', value));
            }
            return true;
        }

        if (value.includes(',')) {
            const values = value.split(',');
            for (const v of values) {
                if (!validateField(v.trim(), min, max, fieldName)) return false;
            }
            return true;
        }

        const num = parseInt(value, 10);
        if (isNaN(num) || num < min || num > max) {
            throw new Error(S.invalidValue.replace('{f}', fieldName).replace('{v}', value).replace('{min}', min).replace('{max}', max));
        }
        return true;
    }

    // Validate entire cron expression
    function validateCron(expression) {
        const parts = parseCron(expression);
        validateField(parts.minute, 0, 59, S.minuteLabel.toLowerCase());
        validateField(parts.hour, 0, 23, S.hourLabel.toLowerCase());
        validateField(parts.dayOfMonth, 1, 31, S.dayOfMonthLabel.toLowerCase());
        validateField(parts.month, 1, 12, S.monthLabel.toLowerCase());
        validateField(parts.dayOfWeek, 0, 6, S.dayOfWeekLabel.toLowerCase());
        return parts;
    }

    // Generate human-readable description
    function describeCron(expression) {
        try {
            const parts = parseCron(expression);
            const { minute, hour, dayOfMonth, month, dayOfWeek } = parts;

            let description = '';

            // Time description
            if (minute === '*' && hour === '*') {
                description = S.everyMinute;
            } else if (minute.startsWith('*/')) {
                const step = minute.split('/')[1];
                description = S.everyNMinutes.replace('{n}', step);
            } else if (hour === '*') {
                description = S.atMinuteOf.replace('{m}', minute);
            } else if (minute === '0' && hour !== '*') {
                const hourDesc = describeHour(hour);
                description = S.at + ' ' + hourDesc;
            } else {
                const hourDesc = describeHour(hour);
                description = S.atMinutePast.replace('{m}', formatMinute(minute)).replace('{h}', hourDesc);
            }

            // Day of week
            if (dayOfWeek !== '*') {
                description += ', ' + describeDayOfWeek(dayOfWeek);
            }

            // Day of month
            if (dayOfMonth !== '*') {
                if (dayOfMonth.includes('-')) {
                    const [start, end] = dayOfMonth.split('-');
                    description += ', ' + S.onDaysRange.replace('{s}', start).replace('{e}', end);
                } else if (dayOfMonth.includes(',')) {
                    description += ', ' + S.onDays.replace('{d}', dayOfMonth);
                } else if (dayOfMonth.startsWith('*/')) {
                    const step = dayOfMonth.split('/')[1];
                    description += ', ' + S.everyNDays.replace('{n}', step);
                } else {
                    const suffix = getOrdinalSuffix(parseInt(dayOfMonth, 10));
                    description += ', ' + S.onThe.replace('{d}', dayOfMonth + suffix);
                }
            }

            // Month
            if (month !== '*') {
                if (month.includes('-')) {
                    const [start, end] = month.split('-');
                    description += ', ' + monthNames[parseInt(start, 10) - 1] + ' ' + S.through + ' ' + monthNames[parseInt(end, 10) - 1];
                } else if (month.includes(',')) {
                    const months = month.split(',').map(m => monthNames[parseInt(m, 10) - 1]).join(', ');
                    description += ', ' + S.inMonths.replace('{m}', months);
                } else if (month.startsWith('*/')) {
                    const step = month.split('/')[1];
                    description += ', ' + S.everyNMonths.replace('{n}', step);
                } else {
                    description += ', ' + S.inMonths.replace('{m}', monthNames[parseInt(month, 10) - 1]);
                }
            }

            return description;
        } catch (e) {
            return S.invalidExpression;
        }
    }

    function describeHour(hour) {
        if (hour === '*') return S.everyHour;
        if (hour.startsWith('*/')) {
            const step = hour.split('/')[1];
            return S.everyNHours.replace('{n}', step);
        }
        if (hour.includes('-')) {
            const [start, end] = hour.split('-');
            return formatHour(start) + ' ' + S.to + ' ' + formatHour(end);
        }
        if (hour.includes(',')) {
            const hours = hour.split(',').map(h => formatHour(h)).join(', ');
            return hours;
        }
        return formatHour(hour);
    }

    function formatHour(hour) {
        const h = parseInt(hour, 10);
        if (h === 0) return '12:00 AM';
        if (h === 12) return '12:00 PM';
        if (h < 12) return `${h.toString().padStart(2, '0')}:00 AM`;
        return `${(h - 12).toString().padStart(2, '0')}:00 PM`;
    }

    function formatMinute(minute) {
        if (minute.startsWith('*/')) {
            return S.everyNMinutes.replace('{n}', minute.split('/')[1]);
        }
        return S.minute + ' ' + minute;
    }

    function describeDayOfWeek(dow) {
        if (dow === '*') return '';
        if (dow.includes('-')) {
            const [start, end] = dow.split('-');
            return dayNames[parseInt(start, 10)] + ' ' + S.through + ' ' + dayNames[parseInt(end, 10)];
        }
        if (dow.includes(',')) {
            const days = dow.split(',').map(d => dayNames[parseInt(d, 10)]).join(', ');
            return S.on + ' ' + days;
        }
        return S.on + ' ' + dayNames[parseInt(dow, 10)];
    }

    function getOrdinalSuffix(n) {
        const suffixes = [S.ordinalTh, S.ordinalSt, S.ordinalNd, S.ordinalRd];
        const v = n % 100;
        return suffixes[(v - 20) % 10] || suffixes[v] || suffixes[0];
    }

    // Expand cron field to array of values
    function expandField(field, min, max) {
        if (field === '*') {
            return Array.from({ length: max - min + 1 }, (_, i) => min + i);
        }

        if (field.includes('/')) {
            const [base, stepStr] = field.split('/');
            const step = parseInt(stepStr, 10);
            const start = base === '*' ? min : parseInt(base, 10);
            const values = [];
            for (let i = start; i <= max; i += step) {
                values.push(i);
            }
            return values;
        }

        if (field.includes('-')) {
            const [startStr, endStr] = field.split('-');
            const start = parseInt(startStr, 10);
            const end = parseInt(endStr, 10);
            return Array.from({ length: end - start + 1 }, (_, i) => start + i);
        }

        if (field.includes(',')) {
            return field.split(',').map(v => parseInt(v.trim(), 10));
        }

        return [parseInt(field, 10)];
    }

    // Calculate next run times
    function getNextRunTimes(expression, count = 5) {
        try {
            const parts = parseCron(expression);
            const minutes = expandField(parts.minute, 0, 59);
            const hours = expandField(parts.hour, 0, 23);
            const daysOfMonth = expandField(parts.dayOfMonth, 1, 31);
            const months = expandField(parts.month, 1, 12);
            const daysOfWeek = expandField(parts.dayOfWeek, 0, 6);

            const results = [];
            const now = new Date();
            let current = new Date(now);
            current.setSeconds(0);
            current.setMilliseconds(0);

            current.setMinutes(current.getMinutes() + 1);

            const maxIterations = 525600;
            let iterations = 0;

            while (results.length < count && iterations < maxIterations) {
                iterations++;

                const month = current.getMonth() + 1;
                const dayOfMonth = current.getDate();
                const dayOfWeek = current.getDay();
                const hour = current.getHours();
                const minute = current.getMinutes();

                const monthMatch = months.includes(month);
                const domMatch = daysOfMonth.includes(dayOfMonth);
                const dowMatch = daysOfWeek.includes(dayOfWeek);
                const hourMatch = hours.includes(hour);
                const minuteMatch = minutes.includes(minute);

                const domIsWildcard = parts.dayOfMonth === '*';
                const dowIsWildcard = parts.dayOfWeek === '*';

                let dayMatch;
                if (domIsWildcard && dowIsWildcard) {
                    dayMatch = true;
                } else if (domIsWildcard) {
                    dayMatch = dowMatch;
                } else if (dowIsWildcard) {
                    dayMatch = domMatch;
                } else {
                    dayMatch = domMatch || dowMatch;
                }

                if (monthMatch && dayMatch && hourMatch && minuteMatch) {
                    results.push(new Date(current));
                }

                current.setMinutes(current.getMinutes() + 1);
            }

            return results;
        } catch (e) {
            return [];
        }
    }

    // Format date for display
    function formatDate(date) {
        const options = {
            weekday: 'short',
            year: 'numeric',
            month: 'short',
            day: 'numeric',
            hour: '2-digit',
            minute: '2-digit',
            hour12: true
        };
        return date.toLocaleDateString(S.dateLocale, options);
    }

    // Get Laravel helper equivalent
    function getLaravelHelper(expression) {
        const helpers = {
            '* * * * *': '->everyMinute()',
            '*/2 * * * *': '->everyTwoMinutes()',
            '*/3 * * * *': '->everyThreeMinutes()',
            '*/4 * * * *': '->everyFourMinutes()',
            '*/5 * * * *': '->everyFiveMinutes()',
            '*/10 * * * *': '->everyTenMinutes()',
            '*/15 * * * *': '->everyFifteenMinutes()',
            '*/30 * * * *': '->everyThirtyMinutes()',
            '0 * * * *': '->hourly()',
            '0 */2 * * *': '->everyTwoHours()',
            '0 */3 * * *': '->everyThreeHours()',
            '0 */4 * * *': '->everyFourHours()',
            '0 */6 * * *': '->everySixHours()',
            '0 0 * * *': '->daily()',
            '0 0 * * 0': '->weekly()',
            '0 0 1 * *': '->monthly()',
            '0 0 1 */3 *': '->quarterly()',
            '0 0 1 1 *': '->yearly()',
        };

        if (helpers[expression]) {
            return helpers[expression];
        }

        const dailyMatch = expression.match(/^(\d+)\s+(\d+)\s+\*\s+\*\s+\*$/);
        if (dailyMatch) {
            const minute = dailyMatch[1].padStart(2, '0');
            const hour = dailyMatch[2].padStart(2, '0');
            return `->dailyAt('${hour}:${minute}')`;
        }

        const weekdaysMatch = expression.match(/^(\d+)\s+(\d+)\s+\*\s+\*\s+1-5$/);
        if (weekdaysMatch) {
            const minute = weekdaysMatch[1].padStart(2, '0');
            const hour = weekdaysMatch[2].padStart(2, '0');
            return `->weekdays()->at('${hour}:${minute}')`;
        }

        const weeklyMatch = expression.match(/^(\d+)\s+(\d+)\s+\*\s+\*\s+(\d)$/);
        if (weeklyMatch) {
            const minute = weeklyMatch[1].padStart(2, '0');
            const hour = weeklyMatch[2].padStart(2, '0');
            const dow = parseInt(weeklyMatch[3], 10);
            const dayMethod = ['sundays', 'mondays', 'tuesdays', 'wednesdays', 'thursdays', 'fridays', 'saturdays'][dow];
            return `->${dayMethod}()->at('${hour}:${minute}')`;
        }

        return null;
    }

    // Update everything based on expression
    function updateFromExpression() {
        const expression = cronExpression.value.trim();

        try {
            validateCron(expression);

            errorDisplay.classList.add('hidden');
            descriptionDisplay.classList.remove('hidden');
            descriptionDisplay.classList.remove('bg-red-500/10', 'border-red-500/30');
            descriptionDisplay.classList.add('bg-gold/10', 'border-gold/30');

            humanDescription.textContent = describeCron(expression);
            humanDescription.classList.remove('text-red-400');
            humanDescription.classList.add('text-gold');

            const nextRuns = getNextRunTimes(expression, 5);
            if (nextRuns.length > 0) {
                nextRunsList.innerHTML = nextRuns.map(date =>
                    `<li class="text-light flex items-center gap-2">
                        <span class="text-gold">&#8226;</span>
                        ${formatDate(date)}
                    </li>`
                ).join('');
            } else {
                nextRunsList.innerHTML = '<li class="text-light-muted">' + S.noUpcoming + '</li>';
            }

            updateLaravelCode(expression);
            updateVisualBuilder(expression);
            updatePresetButtons(expression);

        } catch (e) {
            errorDisplay.classList.remove('hidden');
            errorMessage.textContent = e.message;
            descriptionDisplay.classList.add('hidden');

            nextRunsList.innerHTML = '<li class="text-red-400">' + S.invalidExpression + '</li>';
        }
    }

    // Update Laravel code display
    function updateLaravelCode(expression) {
        laravelCode.innerHTML = `<span class="text-purple-400">$schedule</span><span class="text-light">-></span><span class="text-gold">command</span><span class="text-light">(</span><span class="text-sky-400">'your:command'</span><span class="text-light">)</span>
    <span class="text-light">-></span><span class="text-gold">cron</span><span class="text-light">(</span><span class="text-sky-400">'${expression}'</span><span class="text-light">);</span>`;

        const helper = getLaravelHelper(expression);
        if (helper) {
            laravelAlternative.classList.remove('hidden');
            laravelHelper.innerHTML = `<span class="text-purple-400">$schedule</span><span class="text-light">-></span><span class="text-gold">command</span><span class="text-light">(</span><span class="text-sky-400">'your:command'</span><span class="text-light">)</span>
    <span class="text-light">${helper.replace(/->/g, '-></span><span class="text-gold">').replace(/\(\)/g, '</span><span class="text-light">()</span>').replace(/\('([^']+)'\)/g, '</span><span class="text-light">(</span><span class="text-sky-400">\'$1\'</span><span class="text-light">)</span>')};</span>`;
        } else {
            laravelAlternative.classList.add('hidden');
        }
    }

    // Update visual builder from expression
    function updateVisualBuilder(expression) {
        try {
            const parts = parseCron(expression);

            updateBuilderField(minuteType, minuteValue, parts.minute);
            updateBuilderField(hourType, hourValue, parts.hour);
            updateBuilderField(domType, domValue, parts.dayOfMonth);
            updateBuilderField(monthType, monthValue, parts.month);
            updateBuilderField(dowType, dowValue, parts.dayOfWeek);
        } catch (e) {
            // Invalid expression, don't update builder
        }
    }

    function updateBuilderField(typeSelect, valueInput, value) {
        if (value === '*') {
            typeSelect.value = '*';
            valueInput.classList.add('hidden');
        } else if (value.startsWith('*/')) {
            typeSelect.value = '*/n';
            valueInput.value = value.split('/')[1];
            valueInput.classList.remove('hidden');
            valueInput.placeholder = 'e.g., 5';
        } else if (value.includes('-')) {
            typeSelect.value = 'range';
            valueInput.value = value;
            valueInput.classList.remove('hidden');
            valueInput.placeholder = 'e.g., 1-5';
        } else if (value.includes(',')) {
            typeSelect.value = 'list';
            valueInput.value = value;
            valueInput.classList.remove('hidden');
            valueInput.placeholder = 'e.g., 1,3,5';
        } else {
            typeSelect.value = 'specific';
            valueInput.value = value;
            valueInput.classList.remove('hidden');
            valueInput.placeholder = 'e.g., 0';
        }
    }

    // Update preset button styles
    function updatePresetButtons(expression) {
        presetButtons.forEach(btn => {
            if (btn.dataset.cron === expression) {
                btn.classList.add('bg-gold/20', 'text-gold', 'border-gold');
                btn.classList.remove('text-light-muted', 'border-gold/30');
            } else {
                btn.classList.remove('bg-gold/20', 'text-gold', 'border-gold');
                btn.classList.add('text-light-muted', 'border-gold/30');
            }
        });
    }

    // Build expression from visual builder
    function buildExpressionFromBuilder() {
        const minute = getFieldValue(minuteType, minuteValue);
        const hour = getFieldValue(hourType, hourValue);
        const dom = getFieldValue(domType, domValue);
        const month = getFieldValue(monthType, monthValue);
        const dow = getFieldValue(dowType, dowValue);

        return `${minute} ${hour} ${dom} ${month} ${dow}`;
    }

    function getFieldValue(typeSelect, valueInput) {
        const type = typeSelect.value;
        const value = valueInput.value.trim();

        switch (type) {
            case '*':
                return '*';
            case '*/n':
                return value ? `*/${value}` : '*';
            case 'specific':
            case 'range':
            case 'list':
                return value || '*';
            default:
                return '*';
        }
    }

    // Handle type select change
    function handleTypeChange(typeSelect, valueInput, fieldName) {
        const type = typeSelect.value;

        if (type === '*') {
            valueInput.classList.add('hidden');
            valueInput.value = '';
        } else {
            valueInput.classList.remove('hidden');

            const defaults = getDefaultValues(fieldName);

            switch (type) {
                case '*/n':
                    valueInput.placeholder = `e.g., ${defaults.step}`;
                    if (!valueInput.value || valueInput.value.includes('-') || valueInput.value.includes(',')) {
                        valueInput.value = defaults.step;
                    }
                    break;
                case 'specific':
                    valueInput.placeholder = `e.g., ${defaults.specific}`;
                    if (!valueInput.value || valueInput.value.includes('-') || valueInput.value.includes(',')) {
                        valueInput.value = defaults.specific;
                    }
                    break;
                case 'range':
                    valueInput.placeholder = `e.g., ${defaults.range}`;
                    if (!valueInput.value || !valueInput.value.includes('-')) {
                        valueInput.value = defaults.range;
                    }
                    break;
                case 'list':
                    valueInput.placeholder = `e.g., ${defaults.list}`;
                    if (!valueInput.value || !valueInput.value.includes(',')) {
                        valueInput.value = defaults.list;
                    }
                    break;
            }
        }

        cronExpression.value = buildExpressionFromBuilder();
        updateFromExpressionNoBuilder();
    }

    function getDefaultValues(fieldName) {
        const defaults = {
            minute: { specific: '0', step: '5', range: '0-30', list: '0,15,30,45' },
            hour: { specific: '9', step: '2', range: '9-17', list: '9,12,17' },
            dom: { specific: '1', step: '5', range: '1-15', list: '1,15' },
            month: { specific: '1', step: '3', range: '1-6', list: '1,4,7,10' },
            dow: { specific: '1', step: '2', range: '1-5', list: '1,3,5' }
        };
        return defaults[fieldName] || defaults.minute;
    }

    // Update without triggering visual builder (to prevent feedback loop)
    function updateFromExpressionNoBuilder() {
        const expression = cronExpression.value.trim();

        try {
            validateCron(expression);

            errorDisplay.classList.add('hidden');
            descriptionDisplay.classList.remove('hidden');
            descriptionDisplay.classList.remove('bg-red-500/10', 'border-red-500/30');
            descriptionDisplay.classList.add('bg-gold/10', 'border-gold/30');

            humanDescription.textContent = describeCron(expression);
            humanDescription.classList.remove('text-red-400');
            humanDescription.classList.add('text-gold');

            const nextRuns = getNextRunTimes(expression, 5);
            if (nextRuns.length > 0) {
                nextRunsList.innerHTML = nextRuns.map(date =>
                    `<li class="text-light flex items-center gap-2">
                        <span class="text-gold">&#8226;</span>
                        ${formatDate(date)}
                    </li>`
                ).join('');
            } else {
                nextRunsList.innerHTML = '<li class="text-light-muted">' + S.noUpcoming + '</li>';
            }

            updateLaravelCode(expression);
            updatePresetButtons(expression);

        } catch (e) {
            errorDisplay.classList.remove('hidden');
            errorMessage.textContent = e.message;
            descriptionDisplay.classList.add('hidden');

            nextRunsList.innerHTML = '<li class="text-red-400">' + S.invalidExpression + '</li>';
        }
    }

    // Copy to clipboard
    function copyToClipboard() {
        const expression = cronExpression.value.trim();
        if (!expression) return;

        navigator.clipboard.writeText(expression).then(() => {
            const originalText = btnCopy.innerHTML;
            btnCopy.innerHTML = '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> ' + S.copied;
            btnCopy.classList.add('text-green-400', 'border-green-400');

            setTimeout(() => {
                btnCopy.innerHTML = originalText;
                btnCopy.classList.remove('text-green-400', 'border-green-400');
            }, 2000);
        });
    }

    // Event Listeners
    cronExpression.addEventListener('input', updateFromExpression);
    btnCopy.addEventListener('click', copyToClipboard);

    // Visual builder event listeners
    const fieldNames = ['minute', 'hour', 'dom', 'month', 'dow'];
    [minuteType, hourType, domType, monthType, dowType].forEach((select, index) => {
        const valueInputs = [minuteValue, hourValue, domValue, monthValue, dowValue];
        select.addEventListener('change', () => handleTypeChange(select, valueInputs[index], fieldNames[index]));
    });

    [minuteValue, hourValue, domValue, monthValue, dowValue].forEach(input => {
        input.addEventListener('input', () => {
            cronExpression.value = buildExpressionFromBuilder();
            updateFromExpressionNoBuilder();
        });
    });

    // Preset button listeners
    presetButtons.forEach(btn => {
        btn.addEventListener('click', () => {
            cronExpression.value = btn.dataset.cron;
            updateFromExpression();
        });
    });

    // Initialize
    updateFromExpression();
})();
</script>
