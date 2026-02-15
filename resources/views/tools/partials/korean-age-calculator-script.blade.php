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

    input[type="date"]::-webkit-calendar-picker-indicator {
        filter: invert(85%) sepia(20%) saturate(500%) hue-rotate(10deg) brightness(95%);
        cursor: pointer;
    }
</style>
<script>
(function() {
    const strings = document.getElementById('tool-strings')?.dataset || {};

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

    // Zodiac signs
    const zodiacSigns = [
        { name: strings.zodiacCapricorn || 'Capricorn', emoji: '♑', startMonth: 12, startDay: 22, endMonth: 1, endDay: 19 },
        { name: strings.zodiacAquarius || 'Aquarius', emoji: '♒', startMonth: 1, startDay: 20, endMonth: 2, endDay: 18 },
        { name: strings.zodiacPisces || 'Pisces', emoji: '♓', startMonth: 2, startDay: 19, endMonth: 3, endDay: 20 },
        { name: strings.zodiacAries || 'Aries', emoji: '♈', startMonth: 3, startDay: 21, endMonth: 4, endDay: 19 },
        { name: strings.zodiacTaurus || 'Taurus', emoji: '♉', startMonth: 4, startDay: 20, endMonth: 5, endDay: 20 },
        { name: strings.zodiacGemini || 'Gemini', emoji: '♊', startMonth: 5, startDay: 21, endMonth: 6, endDay: 20 },
        { name: strings.zodiacCancer || 'Cancer', emoji: '♋', startMonth: 6, startDay: 21, endMonth: 7, endDay: 22 },
        { name: strings.zodiacLeo || 'Leo', emoji: '♌', startMonth: 7, startDay: 23, endMonth: 8, endDay: 22 },
        { name: strings.zodiacVirgo || 'Virgo', emoji: '♍', startMonth: 8, startDay: 23, endMonth: 9, endDay: 22 },
        { name: strings.zodiacLibra || 'Libra', emoji: '♎', startMonth: 9, startDay: 23, endMonth: 10, endDay: 22 },
        { name: strings.zodiacScorpio || 'Scorpio', emoji: '♏', startMonth: 10, startDay: 23, endMonth: 11, endDay: 21 },
        { name: strings.zodiacSagittarius || 'Sagittarius', emoji: '♐', startMonth: 11, startDay: 22, endMonth: 12, endDay: 21 },
    ];

    function getZodiacSign(month, day) {
        for (const sign of zodiacSigns) {
            if (sign.startMonth > sign.endMonth) {
                if ((month === sign.startMonth && day >= sign.startDay) || (month === sign.endMonth && day <= sign.endDay)) return sign;
            } else {
                if ((month === sign.startMonth && day >= sign.startDay) || (month === sign.endMonth && day <= sign.endDay)) return sign;
            }
        }
        return zodiacSigns[0];
    }

    // Month names (translatable)
    const monthNames = [
        strings.monthJanuary || 'January',
        strings.monthFebruary || 'February',
        strings.monthMarch || 'March',
        strings.monthApril || 'April',
        strings.monthMay || 'May',
        strings.monthJune || 'June',
        strings.monthJuly || 'July',
        strings.monthAugust || 'August',
        strings.monthSeptember || 'September',
        strings.monthOctober || 'October',
        strings.monthNovember || 'November',
        strings.monthDecember || 'December',
    ];

    function calculateAge() {
        const birthInput = document.getElementById('birth-date').value;
        const targetInput = document.getElementById('target-date').value;

        if (!birthInput) {
            alert(strings.alertNoBirth || 'Please enter a date of birth.');
            return;
        }

        const birth = new Date(birthInput + 'T00:00:00');
        const target = new Date(targetInput + 'T00:00:00');

        if (birth > target) {
            alert(strings.alertFutureDate || 'Date of birth cannot be after the reference date.');
            return;
        }

        const birthYear = birth.getFullYear();
        const targetYear = target.getFullYear();
        const birthMonth = birth.getMonth();
        const birthDay = birth.getDate();
        const targetMonth = target.getMonth();
        const targetDay = target.getDate();

        // Korean age: Current Year - Birth Year + 1
        const koreanAge = targetYear - birthYear + 1;

        // International age
        let internationalAge = targetYear - birthYear;
        if (targetMonth < birthMonth || (targetMonth === birthMonth && targetDay < birthDay)) {
            internationalAge--;
        }

        // Difference
        const difference = koreanAge - internationalAge;

        // Has birthday passed?
        const birthdayPassed = targetMonth > birthMonth || (targetMonth === birthMonth && targetDay >= birthDay);

        // Zodiac
        const zodiac = getZodiacSign(birthMonth + 1, birthDay);

        // Update display
        document.getElementById('korean-age').textContent = koreanAge;
        document.getElementById('international-age').textContent = internationalAge;
        document.getElementById('age-difference').textContent = '+' + difference;

        document.getElementById('birth-year-display').textContent = birthYear;
        document.getElementById('current-year-display').textContent = targetYear;
        document.getElementById('formula-display').textContent = `${targetYear} - ${birthYear} + 1 = ${koreanAge}`;

        const yearsOldText = strings.yearsOld || 'years old';
        document.getElementById('intl-detail').textContent = `${internationalAge} ${yearsOldText}`;
        document.getElementById('birthday-status').textContent = birthdayPassed
            ? (strings.alreadyPassed || 'Already passed')
            : (strings.notYet || 'Not yet');
        document.getElementById('zodiac-display').textContent = `${zodiac.emoji} ${zodiac.name}`;

        // Explanation
        const yearWord = difference !== 1 ? (strings.years || 'years') : (strings.year || 'year');
        const explanation = birthdayPassed
            ? (strings.explanationPassed || 'Your Korean age is {diff} {yearWord} more than your international age. Since your birthday has already passed this year, the difference is {diff} {yearWord}.')
                .replace(/\{diff\}/g, difference).replace(/\{yearWord\}/g, yearWord)
            : (strings.explanationNotPassed || 'Your Korean age is {diff} {yearWord} more than your international age. Since your birthday has not yet passed this year, the difference is {diff} {yearWord} — you haven\'t turned {nextAge} internationally yet, but Korean age already counts this year.')
                .replace(/\{diff\}/g, difference).replace(/\{yearWord\}/g, yearWord).replace(/\{nextAge\}/g, internationalAge + 1);
        document.getElementById('explanation-text').textContent = explanation;

        // Summary
        const birthFormatted = `${monthNames[birthMonth]} ${birthDay}, ${birthYear}`;
        const bornLabel = strings.born || 'Born';
        const koreanAgeLabel = strings.koreanAgeLabel || 'Korean Age';
        const internationalAgeLabel = strings.internationalAgeLabel || 'International Age';
        const differenceLabel = strings.differenceLabel || 'Difference';
        const formulaLabel = strings.formulaLabel || 'Formula';
        const zodiacLabel = strings.zodiacLabel || 'Zodiac';

        const summary = `${bornLabel}: ${birthFormatted}\n${koreanAgeLabel}: ${koreanAge}\n${internationalAgeLabel}: ${internationalAge}\n${differenceLabel}: +${difference} ${yearWord}\n${formulaLabel}: ${targetYear} - ${birthYear} + 1 = ${koreanAge}\n${zodiacLabel}: ${zodiac.emoji} ${zodiac.name}`;
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
            this.innerHTML = '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> ' + (strings.copied || 'Copied!');
            this.classList.add('text-green-400', 'border-green-400');
            successNotification.classList.remove('hidden');
            successMessage.textContent = strings.copiedToClipboard || 'Copied to clipboard!';
            setTimeout(() => {
                this.innerHTML = orig;
                this.classList.remove('text-green-400', 'border-green-400');
                successNotification.classList.add('hidden');
            }, 2000);
        });
    });
})();
</script>
