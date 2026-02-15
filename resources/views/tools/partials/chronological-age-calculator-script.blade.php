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
    const S = document.getElementById('tool-strings')?.dataset || {};

    // Set default target date to today
    const today = new Date();
    document.getElementById('target-date').value = today.toISOString().split('T')[0];

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
    const btnCalculate = document.getElementById('btn-calculate');
    const btnReset = document.getElementById('btn-reset');
    const btnCopy = document.getElementById('btn-copy');
    const successNotification = document.getElementById('success-notification');
    const successMessage = document.getElementById('success-message');

    // Zodiac signs data
    const zodiacSigns = [
        { name: S.zodiacCapricorn || 'Capricorn', emoji: '♑', dates: S.zodiacCapricornDates || 'Dec 22 – Jan 19', startMonth: 12, startDay: 22, endMonth: 1, endDay: 19 },
        { name: S.zodiacAquarius || 'Aquarius', emoji: '♒', dates: S.zodiacAquariusDates || 'Jan 20 – Feb 18', startMonth: 1, startDay: 20, endMonth: 2, endDay: 18 },
        { name: S.zodiacPisces || 'Pisces', emoji: '♓', dates: S.zodiacPiscesDates || 'Feb 19 – Mar 20', startMonth: 2, startDay: 19, endMonth: 3, endDay: 20 },
        { name: S.zodiacAries || 'Aries', emoji: '♈', dates: S.zodiacAriesDates || 'Mar 21 – Apr 19', startMonth: 3, startDay: 21, endMonth: 4, endDay: 19 },
        { name: S.zodiacTaurus || 'Taurus', emoji: '♉', dates: S.zodiacTaurusDates || 'Apr 20 – May 20', startMonth: 4, startDay: 20, endMonth: 5, endDay: 20 },
        { name: S.zodiacGemini || 'Gemini', emoji: '♊', dates: S.zodiacGeminiDates || 'May 21 – Jun 20', startMonth: 5, startDay: 21, endMonth: 6, endDay: 20 },
        { name: S.zodiacCancer || 'Cancer', emoji: '♋', dates: S.zodiacCancerDates || 'Jun 21 – Jul 22', startMonth: 6, startDay: 21, endMonth: 7, endDay: 22 },
        { name: S.zodiacLeo || 'Leo', emoji: '♌', dates: S.zodiacLeoDates || 'Jul 23 – Aug 22', startMonth: 7, startDay: 23, endMonth: 8, endDay: 22 },
        { name: S.zodiacVirgo || 'Virgo', emoji: '♍', dates: S.zodiacVirgoDates || 'Aug 23 – Sep 22', startMonth: 8, startDay: 23, endMonth: 9, endDay: 22 },
        { name: S.zodiacLibra || 'Libra', emoji: '♎', dates: S.zodiacLibraDates || 'Sep 23 – Oct 22', startMonth: 9, startDay: 23, endMonth: 10, endDay: 22 },
        { name: S.zodiacScorpio || 'Scorpio', emoji: '♏', dates: S.zodiacScorpioDates || 'Oct 23 – Nov 21', startMonth: 10, startDay: 23, endMonth: 11, endDay: 21 },
        { name: S.zodiacSagittarius || 'Sagittarius', emoji: '♐', dates: S.zodiacSagittariusDates || 'Nov 22 – Dec 21', startMonth: 11, startDay: 22, endMonth: 12, endDay: 21 },
    ];

    // Month names (translatable)
    const monthNames = S.monthNames ? S.monthNames.split(',') : ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
    const dayNames = S.dayNames ? S.dayNames.split(',') : ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];

    function getZodiacSign(month, day) {
        for (const sign of zodiacSigns) {
            if (sign.startMonth === sign.endMonth) {
                if (month === sign.startMonth && day >= sign.startDay && day <= sign.endDay) return sign;
            } else if (sign.startMonth > sign.endMonth) {
                if ((month === sign.startMonth && day >= sign.startDay) || (month === sign.endMonth && day <= sign.endDay)) return sign;
            } else {
                if ((month === sign.startMonth && day >= sign.startDay) || (month === sign.endMonth && day <= sign.endDay)) return sign;
            }
        }
        return zodiacSigns[0];
    }

    function getDaysInMonth(year, month) {
        return new Date(year, month, 0).getDate();
    }

    function calculateAge() {
        const birthInput = document.getElementById('birth-date').value;
        const targetInput = document.getElementById('target-date').value;

        if (!birthInput) {
            alert(S.alertNoBirth || 'Please enter a date of birth.');
            return;
        }

        const birth = new Date(birthInput + 'T00:00:00');
        const target = new Date(targetInput + 'T00:00:00');

        if (birth > target) {
            alert(S.alertFutureDate || 'Date of birth cannot be after the target date.');
            return;
        }

        // Calculate years, months, days
        let years = target.getFullYear() - birth.getFullYear();
        let months = target.getMonth() - birth.getMonth();
        let days = target.getDate() - birth.getDate();

        if (days < 0) {
            months--;
            const prevMonth = new Date(target.getFullYear(), target.getMonth(), 0);
            days += prevMonth.getDate();
        }

        if (months < 0) {
            years--;
            months += 12;
        }

        // Total calculations
        const diffMs = target - birth;
        const totalDays = Math.floor(diffMs / (1000 * 60 * 60 * 24));
        const totalWeeks = Math.floor(totalDays / 7);
        const totalMonthsCalc = years * 12 + months;
        const totalHours = totalDays * 24;
        const totalMinutes = totalHours * 60;
        const totalSeconds = totalMinutes * 60;

        // Update primary display
        document.getElementById('age-years').textContent = years;
        document.getElementById('age-months').textContent = months;
        document.getElementById('age-days').textContent = days;

        // Update detailed breakdown
        document.getElementById('total-months').textContent = totalMonthsCalc.toLocaleString();
        document.getElementById('total-weeks').textContent = totalWeeks.toLocaleString();
        document.getElementById('total-days').textContent = totalDays.toLocaleString();
        document.getElementById('total-hours').textContent = totalHours.toLocaleString();
        document.getElementById('total-minutes').textContent = totalMinutes.toLocaleString();
        document.getElementById('total-seconds').textContent = totalSeconds.toLocaleString();

        // Next birthday
        const birthMonth = birth.getMonth();
        const birthDay = birth.getDate();
        let nextBirthday = new Date(target.getFullYear(), birthMonth, birthDay);

        // Handle Feb 29 birthdays
        if (birthMonth === 1 && birthDay === 29) {
            const yearToCheck = target.getFullYear();
            if (getDaysInMonth(yearToCheck, 2) < 29) {
                nextBirthday = new Date(yearToCheck, 2, 1);
            }
        }

        if (nextBirthday <= target) {
            nextBirthday.setFullYear(nextBirthday.getFullYear() + 1);
            if (birthMonth === 1 && birthDay === 29 && getDaysInMonth(nextBirthday.getFullYear(), 2) < 29) {
                nextBirthday = new Date(nextBirthday.getFullYear(), 2, 1);
            }
        }

        const daysUntilBirthday = Math.ceil((nextBirthday - target) / (1000 * 60 * 60 * 24));

        document.getElementById('next-birthday-date').textContent = `${monthNames[nextBirthday.getMonth()]} ${nextBirthday.getDate()}, ${nextBirthday.getFullYear()}`;
        document.getElementById('next-birthday-day').textContent = dayNames[nextBirthday.getDay()];
        document.getElementById('next-birthday-countdown').textContent = daysUntilBirthday === 0
            ? (S.happyBirthday || "Happy Birthday!")
            : `${daysUntilBirthday} ${daysUntilBirthday !== 1 ? (S.daysAway || 'days away') : (S.dayAway || 'day away')}`;
        document.getElementById('countdown-icon').textContent = daysUntilBirthday === 0 ? '🎉' : '🎂';

        // Zodiac sign
        const zodiac = getZodiacSign(birth.getMonth() + 1, birth.getDate());
        document.getElementById('zodiac-emoji').textContent = zodiac.emoji;
        document.getElementById('zodiac-name').textContent = zodiac.name;
        document.getElementById('zodiac-dates').textContent = zodiac.dates;

        // Summary
        const bornLabel = S.summaryBorn || 'Born';
        const ageLabel = S.summaryAge || 'Age';
        const totalLabel = S.summaryTotal || 'Total';
        const nextBdayLabel = S.summaryNextBirthday || 'Next Birthday';
        const zodiacLabel = S.summaryZodiac || 'Zodiac';
        const yearsLabel = S.years || 'years';
        const monthsLabel = S.months || 'months';
        const daysLabel = S.days || 'days';
        const weeksLabel = S.weeks || 'weeks';

        const birthFormatted = `${monthNames[birth.getMonth()]} ${birth.getDate()}, ${birth.getFullYear()}`;
        const summary = `${bornLabel}: ${birthFormatted}\n${ageLabel}: ${years} ${yearsLabel}, ${months} ${monthsLabel}, ${days} ${daysLabel}\n${totalLabel}: ${totalDays.toLocaleString()} ${daysLabel} (${totalWeeks.toLocaleString()} ${weeksLabel})\n${nextBdayLabel}: ${daysUntilBirthday} ${daysUntilBirthday !== 1 ? (S.daysAway || 'days away') : (S.dayAway || 'day away')}\n${zodiacLabel}: ${zodiac.emoji} ${zodiac.name}`;
        document.getElementById('summary-text').textContent = summary;

        // Show results
        document.getElementById('results-section').classList.remove('hidden');
    }

    // Event listeners
    btnCalculate.addEventListener('click', calculateAge);

    btnReset.addEventListener('click', function() {
        document.getElementById('birth-date').value = '';
        document.getElementById('target-date').value = new Date().toISOString().split('T')[0];
        document.getElementById('results-section').classList.add('hidden');
        successNotification.classList.add('hidden');
        // Re-check placeholder wrappers
        document.querySelectorAll('.date-input-wrapper input[type="date"]').forEach(function(input) {
            input.closest('.date-input-wrapper').classList.toggle('has-value', !!input.value);
        });
    });

    btnCopy.addEventListener('click', function() {
        const text = document.getElementById('summary-text').textContent;
        if (!text || text === '—') return;
        navigator.clipboard.writeText(text).then(() => {
            const orig = this.innerHTML;
            this.innerHTML = '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> ' + (S.copied || 'Copied!');
            this.classList.add('text-green-400', 'border-green-400');
            successNotification.classList.remove('hidden');
            successMessage.textContent = S.copiedToClipboard || 'Copied to clipboard!';
            setTimeout(() => {
                this.innerHTML = orig;
                this.classList.remove('text-green-400', 'border-green-400');
                successNotification.classList.add('hidden');
            }, 2000);
        });
    });
})();
</script>
