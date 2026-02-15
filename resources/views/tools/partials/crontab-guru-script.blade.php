<script>
(function() {
    const strings = document.getElementById('tool-strings')?.dataset || {};

    const cronInput = document.getElementById('cron-input');
    const fieldMinute = document.getElementById('field-minute');
    const fieldHour = document.getElementById('field-hour');
    const fieldDom = document.getElementById('field-dom');
    const fieldMonth = document.getElementById('field-month');
    const fieldDow = document.getElementById('field-dow');
    const explanationBox = document.getElementById('explanation-box');
    const explanationEl = document.getElementById('explanation');
    const errorBox = document.getElementById('error-box');
    const errorText = document.getElementById('error-text');
    const nextRunsBox = document.getElementById('next-runs-box');
    const nextRunsEl = document.getElementById('next-runs');
    const btnCopy = document.getElementById('btn-copy');
    const btnReset = document.getElementById('btn-reset');
    const successNotification = document.getElementById('success-notification');
    const successMessage = document.getElementById('success-message');

    const MONTHS = ['', strings.monthJanuary || 'January', strings.monthFebruary || 'February', strings.monthMarch || 'March', strings.monthApril || 'April', strings.monthMay || 'May', strings.monthJune || 'June', strings.monthJuly || 'July', strings.monthAugust || 'August', strings.monthSeptember || 'September', strings.monthOctober || 'October', strings.monthNovember || 'November', strings.monthDecember || 'December'];
    const DAYS = [strings.daySunday || 'Sunday', strings.dayMonday || 'Monday', strings.dayTuesday || 'Tuesday', strings.dayWednesday || 'Wednesday', strings.dayThursday || 'Thursday', strings.dayFriday || 'Friday', strings.daySaturday || 'Saturday'];
    const MONTH_NAMES = { JAN:1, FEB:2, MAR:3, APR:4, MAY:5, JUN:6, JUL:7, AUG:8, SEP:9, OCT:10, NOV:11, DEC:12 };
    const DAY_NAMES = { SUN:0, MON:1, TUE:2, WED:3, THU:4, FRI:5, SAT:6 };

    // Translatable description fragments
    const desc = {
        everyMinute: strings.descEveryMinute || 'Every minute',
        everyNMinutes: strings.descEveryNMinutes || 'Every {n} minutes',
        atMinutes: strings.descAtMinutes || 'At minutes {v}',
        everyMinuteFromTo: strings.descEveryMinuteFromTo || 'Every minute from {s} through {e}',
        atMinute: strings.descAtMinute || 'At minute {v}',
        pastEveryNHours: strings.descPastEveryNHours || 'past every {n} hours',
        duringHours: strings.descDuringHours || 'during hours {s}–{e}',
        atHours: strings.descAtHours || 'at {v}',
        atTime: strings.descAtTime || 'At {v}',
        pastHour: strings.descPastHour || 'past hour {v}',
        everyNDays: strings.descEveryNDays || 'every {n} days',
        onDays: strings.descOnDays || 'on days {v} of the month',
        onDaysRange: strings.descOnDaysRange || 'on days {s}–{e} of the month',
        onDay: strings.descOnDay || 'on day {v} of the month',
        everyNMonths: strings.descEveryNMonths || 'every {n} months',
        inMonths: strings.descInMonths || 'in {v}',
        inMonthRange: strings.descInMonthRange || 'in {s}–{e}',
        onWeekdays: strings.descOnWeekdays || 'on {v}',
        onWeekdayRange: strings.descOnWeekdayRange || 'on {s}–{e}',
        expectedFields: strings.descExpectedFields || 'Expected 5 fields, got {n}. Format: minute hour day month weekday',
    };

    function replaceNames(expr) {
        let result = expr.toUpperCase();
        for (const [name, num] of Object.entries(MONTH_NAMES)) {
            result = result.replace(new RegExp('\\b' + name + '\\b', 'g'), num);
        }
        for (const [name, num] of Object.entries(DAY_NAMES)) {
            result = result.replace(new RegExp('\\b' + name + '\\b', 'g'), num);
        }
        return result;
    }

    function parseField(field, min, max) {
        field = replaceNames(field);
        const values = new Set();
        const parts = field.split(',');
        for (const part of parts) {
            if (part === '*') {
                for (let i = min; i <= max; i++) values.add(i);
            } else if (part.includes('/')) {
                const [range, stepStr] = part.split('/');
                const step = parseInt(stepStr);
                if (isNaN(step) || step <= 0) throw new Error(`Invalid step: ${stepStr}`);
                let start = min, end = max;
                if (range !== '*') {
                    if (range.includes('-')) {
                        [start, end] = range.split('-').map(Number);
                    } else {
                        start = parseInt(range);
                        end = max;
                    }
                }
                if (isNaN(start) || isNaN(end)) throw new Error(`Invalid range: ${range}`);
                for (let i = start; i <= end; i += step) values.add(i);
            } else if (part.includes('-')) {
                const [startStr, endStr] = part.split('-');
                const start = parseInt(startStr), end = parseInt(endStr);
                if (isNaN(start) || isNaN(end)) throw new Error(`Invalid range: ${part}`);
                if (start < min || end > max) throw new Error(`Value out of range: ${part}`);
                for (let i = start; i <= end; i++) values.add(i);
            } else {
                const val = parseInt(part);
                if (isNaN(val)) throw new Error(`Invalid value: ${part}`);
                if (val < min || val > max) throw new Error(`Value out of range: ${val} (${min}-${max})`);
                values.add(val);
            }
        }
        return Array.from(values).sort((a, b) => a - b);
    }

    function describeCron(parts) {
        const [minF, hourF, domF, monthF, dowF] = parts;
        const pieces = [];

        // Minute description
        if (minF === '*') {
            pieces.push(desc.everyMinute);
        } else if (minF.startsWith('*/')) {
            pieces.push(desc.everyNMinutes.replace('{n}', minF.slice(2)));
        } else if (minF.includes(',')) {
            pieces.push(desc.atMinutes.replace('{v}', minF));
        } else if (minF.includes('-') && !minF.includes('/')) {
            pieces.push(desc.everyMinuteFromTo.replace('{s}', minF.split('-')[0]).replace('{e}', minF.split('-')[1]));
        } else if (minF.includes('/')) {
            pieces.push(desc.everyNMinutes.replace('{n}', minF.split('/')[1]));
        } else {
            pieces.push(desc.atMinute.replace('{v}', minF));
        }

        // Hour
        if (hourF !== '*') {
            if (hourF.startsWith('*/')) {
                pieces.push(desc.pastEveryNHours.replace('{n}', hourF.slice(2)));
            } else if (hourF.includes('-') && !hourF.includes('/')) {
                const [s, e] = hourF.split('-');
                pieces.push(desc.duringHours.replace('{s}', formatHour(parseInt(s))).replace('{e}', formatHour(parseInt(e))));
            } else if (hourF.includes(',')) {
                const hrs = hourF.split(',').map(h => formatHour(parseInt(h))).join(', ');
                pieces.push(desc.atHours.replace('{v}', hrs));
            } else {
                const h = parseInt(hourF);
                if (minF !== '*' && !minF.includes('/') && !minF.includes(',') && !minF.includes('-')) {
                    pieces[0] = desc.atTime.replace('{v}', formatTime(h, parseInt(minF)));
                } else {
                    pieces.push(desc.pastHour.replace('{v}', formatHour(h)));
                }
            }
        }

        // Day of month
        if (domF !== '*') {
            if (domF.startsWith('*/')) {
                pieces.push(desc.everyNDays.replace('{n}', domF.slice(2)));
            } else if (domF.includes(',')) {
                pieces.push(desc.onDays.replace('{v}', domF));
            } else if (domF.includes('-')) {
                const [s, e] = domF.split('-');
                pieces.push(desc.onDaysRange.replace('{s}', s).replace('{e}', e));
            } else {
                pieces.push(desc.onDay.replace('{v}', domF));
            }
        }

        // Month
        if (monthF !== '*') {
            const monthStr = replaceNames(monthF);
            if (monthStr.startsWith('*/')) {
                pieces.push(desc.everyNMonths.replace('{n}', monthStr.slice(2)));
            } else if (monthStr.includes(',')) {
                const ms = monthStr.split(',').map(m => MONTHS[parseInt(m)] || m).join(', ');
                pieces.push(desc.inMonths.replace('{v}', ms));
            } else if (monthStr.includes('-')) {
                const [s, e] = monthStr.split('-');
                pieces.push(desc.inMonthRange.replace('{s}', MONTHS[parseInt(s)] || s).replace('{e}', MONTHS[parseInt(e)] || e));
            } else {
                pieces.push(desc.inMonths.replace('{v}', MONTHS[parseInt(monthStr)] || monthStr));
            }
        }

        // Day of week
        if (dowF !== '*') {
            const dowStr = replaceNames(dowF);
            if (dowStr.includes(',')) {
                const ds = dowStr.split(',').map(d => DAYS[parseInt(d)] || d).join(', ');
                pieces.push(desc.onWeekdays.replace('{v}', ds));
            } else if (dowStr.includes('-')) {
                const [s, e] = dowStr.split('-');
                pieces.push(desc.onWeekdayRange.replace('{s}', DAYS[parseInt(s)] || s).replace('{e}', DAYS[parseInt(e)] || e));
            } else {
                pieces.push(desc.onWeekdays.replace('{v}', DAYS[parseInt(dowStr)] || dowStr));
            }
        }

        return pieces.join(', ');
    }

    function formatHour(h) {
        if (h === 0) return '12:00 AM';
        if (h === 12) return '12:00 PM';
        return h > 12 ? `${h - 12}:00 PM` : `${h}:00 AM`;
    }

    function formatTime(h, m) {
        const period = h >= 12 ? 'PM' : 'AM';
        const hour12 = h === 0 ? 12 : h > 12 ? h - 12 : h;
        return `${hour12}:${String(m).padStart(2, '0')} ${period}`;
    }

    function getNextRuns(minutes, hours, doms, months, dows, count) {
        const runs = [];
        const now = new Date();
        const candidate = new Date(now);
        candidate.setSeconds(0);
        candidate.setMilliseconds(0);
        candidate.setMinutes(candidate.getMinutes() + 1);

        let maxIter = 525960; // ~1 year of minutes
        while (runs.length < count && maxIter-- > 0) {
            const m = candidate.getMinutes();
            const h = candidate.getHours();
            const dom = candidate.getDate();
            const mon = candidate.getMonth() + 1;
            const dow = candidate.getDay();

            if (months.includes(mon) && doms.includes(dom) && dows.includes(dow) && hours.includes(h) && minutes.includes(m)) {
                runs.push(new Date(candidate));
            }
            candidate.setMinutes(candidate.getMinutes() + 1);
        }
        return runs;
    }

    function formatRunDate(date) {
        const shortDays = [
            strings.shortSun || 'Sun', strings.shortMon || 'Mon', strings.shortTue || 'Tue',
            strings.shortWed || 'Wed', strings.shortThu || 'Thu', strings.shortFri || 'Fri',
            strings.shortSat || 'Sat'
        ];
        const shortMonths = [
            strings.shortJan || 'Jan', strings.shortFeb || 'Feb', strings.shortMar || 'Mar',
            strings.shortApr || 'Apr', strings.shortMayShort || 'May', strings.shortJun || 'Jun',
            strings.shortJul || 'Jul', strings.shortAug || 'Aug', strings.shortSep || 'Sep',
            strings.shortOct || 'Oct', strings.shortNov || 'Nov', strings.shortDec || 'Dec'
        ];
        const day = shortDays[date.getDay()];
        const mon = shortMonths[date.getMonth()];
        const d = date.getDate();
        const y = date.getFullYear();
        const h = date.getHours();
        const m = date.getMinutes();
        const period = h >= 12 ? 'PM' : 'AM';
        const h12 = h === 0 ? 12 : h > 12 ? h - 12 : h;
        return `${day}, ${mon} ${d}, ${y} ${strings.atWord || 'at'} ${h12}:${String(m).padStart(2, '0')} ${period}`;
    }

    function update() {
        const raw = cronInput.value.trim();
        const parts = raw.split(/\s+/);

        // Reset field highlights
        [fieldMinute, fieldHour, fieldDom, fieldMonth, fieldDow].forEach(f => {
            f.classList.remove('text-red-400');
        });

        if (parts.length !== 5) {
            showError(desc.expectedFields.replace('{n}', parts.length));
            fieldMinute.textContent = parts[0] || '?';
            fieldHour.textContent = parts[1] || '?';
            fieldDom.textContent = parts[2] || '?';
            fieldMonth.textContent = parts[3] || '?';
            fieldDow.textContent = parts[4] || '?';
            return;
        }

        fieldMinute.textContent = parts[0];
        fieldHour.textContent = parts[1];
        fieldDom.textContent = parts[2];
        fieldMonth.textContent = parts[3];
        fieldDow.textContent = parts[4];

        try {
            const minutes = parseField(parts[0], 0, 59);
            const hours = parseField(parts[1], 0, 23);
            const doms = parseField(parts[2], 1, 31);
            const months = parseField(parts[3], 1, 12);
            const dows = parseField(parts[4], 0, 6);

            // Show explanation
            const descText = describeCron(parts);
            explanationEl.textContent = descText;
            explanationBox.classList.remove('hidden');
            errorBox.classList.add('hidden');

            // Show next runs
            const runs = getNextRuns(minutes, hours, doms, months, dows, 5);
            nextRunsEl.innerHTML = '';
            if (runs.length > 0) {
                runs.forEach((run, i) => {
                    const div = document.createElement('div');
                    div.className = 'flex items-center gap-3 text-sm';
                    div.innerHTML = `<span class="text-gold font-mono w-6">${i + 1}.</span><span class="text-light">${formatRunDate(run)}</span>`;
                    nextRunsEl.appendChild(div);
                });
                nextRunsBox.classList.remove('hidden');
            } else {
                nextRunsBox.classList.add('hidden');
            }
        } catch (e) {
            showError(e.message);
        }
    }

    function showError(msg) {
        explanationBox.classList.add('hidden');
        nextRunsBox.classList.add('hidden');
        errorBox.classList.remove('hidden');
        errorText.textContent = msg;
    }

    cronInput.addEventListener('input', update);

    // Preset buttons
    document.querySelectorAll('.preset-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            cronInput.value = this.dataset.cron;
            update();
        });
    });

    // Copy
    btnCopy.addEventListener('click', function() {
        const expr = cronInput.value.trim();
        if (!expr) return;
        navigator.clipboard.writeText(expr).then(() => {
            const orig = this.innerHTML;
            this.innerHTML = '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> ' + (strings.copied || 'Copied!');
            this.classList.add('text-green-400', 'border-green-400');
            successNotification.classList.remove('hidden');
            successMessage.textContent = strings.copiedToClipboard || 'Expression copied to clipboard!';
            setTimeout(() => {
                this.innerHTML = orig;
                this.classList.remove('text-green-400', 'border-green-400');
                successNotification.classList.add('hidden');
            }, 2000);
        });
    });

    // Reset
    btnReset.addEventListener('click', function() {
        cronInput.value = '* * * * *';
        update();
    });

    // Initial parse
    update();
})();
</script>
