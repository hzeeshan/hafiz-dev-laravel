<script>
(function() {
    // Translatable strings
    var stringsEl = document.getElementById('tool-strings');
    var S = {
        audiobook_length: stringsEl?.dataset.audiobookLength || 'Audiobook Length',
        custom_speed: stringsEl?.dataset.customSpeed || 'Custom Speed',
        hours: stringsEl?.dataset.hours || 'Hours',
        minutes: stringsEl?.dataset.minutes || 'Minutes',
        seconds: stringsEl?.dataset.seconds || 'Seconds',
        calculate: stringsEl?.dataset.calculate || 'Calculate',
        sample: stringsEl?.dataset.sample || 'Sample',
        copy: stringsEl?.dataset.copy || 'Copy',
        download: stringsEl?.dataset.download || 'Download',
        clear: stringsEl?.dataset.clear || 'Clear',
        speed_comparison: stringsEl?.dataset.speedComparison || 'Speed Comparison',
        speed: stringsEl?.dataset.speed || 'Speed',
        listening_time: stringsEl?.dataset.listeningTime || 'Listening Time',
        time_saved: stringsEl?.dataset.timeSaved || 'Time Saved',
        pct_saved: stringsEl?.dataset.pctSaved || '% Saved',
        custom_speed_result: stringsEl?.dataset.customSpeedResult || 'Custom Speed Result',
        at_speed: stringsEl?.dataset.atSpeed || 'at',
        speed_label: stringsEl?.dataset.speedLabel || 'speed',
        saving: stringsEl?.dataset.saving || 'saving',
        original_length: stringsEl?.dataset.originalLength || 'Original Length',
        total_minutes: stringsEl?.dataset.totalMinutes || 'Total Minutes',
        est_chapters: stringsEl?.dataset.estChapters || 'Est. Chapters',
        est_word_count: stringsEl?.dataset.estWordCount || 'Est. Word Count',
        original: stringsEl?.dataset.original || 'Original',
        custom_speed_stat: stringsEl?.dataset.customSpeedStat || 'Custom Speed',
        none: stringsEl?.dataset.none || 'None',
        original_tag: stringsEl?.dataset.originalTag || 'original',
        custom_tag: stringsEl?.dataset.customTag || 'custom',
        error_invalid: stringsEl?.dataset.errorInvalid || 'Please enter a valid audiobook length (at least 1 second).',
        error_calculate_first_copy: stringsEl?.dataset.errorCalculateFirstCopy || 'Calculate first before copying.',
        error_calculate_first_download: stringsEl?.dataset.errorCalculateFirstDownload || 'Calculate first before downloading.',
        copied: stringsEl?.dataset.copied || 'Copied!',
        copied_to_clipboard: stringsEl?.dataset.copiedToClipboard || 'Copied to clipboard!',
        downloaded: stringsEl?.dataset.downloaded || 'Downloaded audiobook-speed-calculation.txt',
        summary_title: stringsEl?.dataset.summaryTitle || 'Audiobook Speed Calculator Results',
        custom_speed_note: stringsEl?.dataset.customSpeedNote || '* Custom speed',
        est_word_count_label: stringsEl?.dataset.estWordCountLabel || 'Est. Word Count',
        est_chapters_label: stringsEl?.dataset.estChaptersLabel || 'Est. Chapters'
    };

    // DOM elements
    var inputHours = document.getElementById('input-hours');
    var inputMinutes = document.getElementById('input-minutes');
    var inputSeconds = document.getElementById('input-seconds');
    var customSpeedSlider = document.getElementById('custom-speed-slider');
    var customSpeedInput = document.getElementById('custom-speed-input');
    var btnCalculate = document.getElementById('btn-calculate');
    var btnSample = document.getElementById('btn-sample');
    var btnCopy = document.getElementById('btn-copy');
    var btnDownload = document.getElementById('btn-download');
    var btnClear = document.getElementById('btn-clear');
    var resultsSection = document.getElementById('results-section');
    var speedTableBody = document.getElementById('speed-table-body');
    var statsBar = document.getElementById('stats-bar');
    var successNotification = document.getElementById('success-notification');
    var successMessage = document.getElementById('success-message');
    var errorNotification = document.getElementById('error-notification');
    var errorMessage = document.getElementById('error-message');

    // Preset speeds
    var presetSpeeds = [1, 1.25, 1.5, 1.75, 2, 2.5, 3];

    // Sync slider and input
    customSpeedSlider.addEventListener('input', function() {
        customSpeedInput.value = parseFloat(this.value).toFixed(2);
        if (!resultsSection.classList.contains('hidden')) {
            calculate();
        }
    });

    customSpeedInput.addEventListener('change', function() {
        var val = parseFloat(this.value);
        if (isNaN(val) || val < 0.5) val = 0.5;
        if (val > 4) val = 4;
        this.value = val;
        customSpeedSlider.value = val;
        if (!resultsSection.classList.contains('hidden')) {
            calculate();
        }
    });

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

    function getTotalSeconds() {
        var h = parseInt(inputHours.value) || 0;
        var m = parseInt(inputMinutes.value) || 0;
        var s = parseInt(inputSeconds.value) || 0;
        return h * 3600 + m * 60 + s;
    }

    function formatTime(totalSeconds) {
        var h = Math.floor(totalSeconds / 3600);
        var m = Math.floor((totalSeconds % 3600) / 60);
        var s = Math.round(totalSeconds % 60);
        if (h > 0 && m > 0 && s > 0) return h + 'h ' + m + 'm ' + s + 's';
        if (h > 0 && m > 0) return h + 'h ' + m + 'm';
        if (h > 0 && s > 0) return h + 'h 0m ' + s + 's';
        if (h > 0) return h + 'h 0m';
        if (m > 0 && s > 0) return m + 'm ' + s + 's';
        if (m > 0) return m + 'm';
        return s + 's';
    }

    function formatTimeSaved(totalSeconds) {
        if (totalSeconds <= 0) return S.none;
        return formatTime(totalSeconds);
    }

    function calculate() {
        var total = getTotalSeconds();
        if (total <= 0) {
            showError(S.error_invalid);
            return;
        }

        errorNotification.classList.add('hidden');

        var customSpeed = parseFloat(customSpeedInput.value) || 1.5;

        // Build speed table
        var tableHtml = '';
        var allSpeeds = presetSpeeds.slice();
        var customInPresets = false;
        for (var i = 0; i < presetSpeeds.length; i++) {
            if (Math.abs(presetSpeeds[i] - customSpeed) < 0.01) {
                customInPresets = true;
                break;
            }
        }

        for (var i = 0; i < allSpeeds.length; i++) {
            var speed = allSpeeds[i];
            var adjusted = total / speed;
            var saved = total - adjusted;
            var pctSaved = ((saved / total) * 100).toFixed(1);
            var isOriginal = speed === 1;
            var isCustomMatch = Math.abs(speed - customSpeed) < 0.01;

            var rowClass = isOriginal ? 'text-light-muted' : '';
            if (isCustomMatch) rowClass = 'bg-gold/5';

            tableHtml += '<tr class="border-b border-gold/5 ' + rowClass + '">';
            tableHtml += '<td class="py-3 pr-4"><span class="font-mono font-semibold ' + (isOriginal ? 'text-light-muted' : 'text-gold') + '">' + speed + 'x</span>';
            if (isOriginal) tableHtml += ' <span class="text-xs text-light-muted">(' + S.original_tag + ')</span>';
            if (isCustomMatch && !isOriginal) tableHtml += ' <span class="text-xs text-gold/70">(' + S.custom_tag + ')</span>';
            tableHtml += '</td>';
            tableHtml += '<td class="py-3 pr-4 font-mono text-light">' + formatTime(adjusted) + '</td>';
            tableHtml += '<td class="py-3 pr-4 font-mono ' + (isOriginal ? 'text-light-muted' : 'text-green-400') + '">' + (isOriginal ? '-' : formatTimeSaved(saved)) + '</td>';
            tableHtml += '<td class="py-3 text-right font-mono ' + (isOriginal ? 'text-light-muted' : 'text-green-400') + '">' + (isOriginal ? '-' : pctSaved + '%') + '</td>';
            tableHtml += '</tr>';
        }

        // Add custom speed row if not in presets
        if (!customInPresets) {
            var adjusted = total / customSpeed;
            var saved = total - adjusted;
            var pctSaved = ((saved / total) * 100).toFixed(1);

            tableHtml += '<tr class="border-b border-gold/5 bg-gold/5">';
            tableHtml += '<td class="py-3 pr-4"><span class="font-mono font-semibold text-gold">' + customSpeed + 'x</span> <span class="text-xs text-gold/70">(' + S.custom_tag + ')</span></td>';
            tableHtml += '<td class="py-3 pr-4 font-mono text-light">' + formatTime(adjusted) + '</td>';
            tableHtml += '<td class="py-3 pr-4 font-mono text-green-400">' + formatTimeSaved(saved) + '</td>';
            tableHtml += '<td class="py-3 text-right font-mono text-green-400">' + pctSaved + '%</td>';
            tableHtml += '</tr>';
        }

        speedTableBody.innerHTML = tableHtml;

        // Custom speed result
        var customAdjusted = total / customSpeed;
        var customSaved = total - customAdjusted;
        document.getElementById('custom-result-time').textContent = formatTime(customAdjusted);
        document.getElementById('custom-result-speed').textContent = customSpeed + 'x';
        document.getElementById('custom-result-saved').textContent = formatTimeSaved(customSaved);

        // Quick stats
        document.getElementById('stat-original').textContent = formatTime(total);
        document.getElementById('stat-total-minutes').textContent = Math.round(total / 60).toLocaleString();
        // Average audiobook chapter is ~20-30 minutes, use 25 min
        document.getElementById('stat-chapters').textContent = '~' + Math.max(1, Math.round(total / 60 / 25));
        // Average narration speed is ~150 words per minute
        document.getElementById('stat-words').textContent = '~' + Math.round(total / 60 * 150).toLocaleString();

        // Stats bar
        document.getElementById('stats-original').textContent = formatTime(total);
        document.getElementById('stats-custom').textContent = customSpeed + 'x = ' + formatTime(customAdjusted);
        document.getElementById('stats-saved').textContent = formatTimeSaved(customSaved);
        statsBar.classList.remove('hidden');

        // Show results
        resultsSection.classList.remove('hidden');
    }

    // Build summary text for copy/download
    function buildSummary() {
        var total = getTotalSeconds();
        if (total <= 0) return '';

        var customSpeed = parseFloat(customSpeedInput.value) || 1.5;
        var lines = [];
        lines.push(S.summary_title);
        lines.push('==================================');
        lines.push(S.original_length + ': ' + formatTime(total));
        lines.push('');
        lines.push(S.speed + '   | ' + S.listening_time + ' | ' + S.time_saved + ' | ' + S.pct_saved);
        lines.push('--------|----------------|------------|--------');

        var allSpeeds = presetSpeeds.slice();
        var customInPresets = false;
        for (var i = 0; i < presetSpeeds.length; i++) {
            if (Math.abs(presetSpeeds[i] - customSpeed) < 0.01) {
                customInPresets = true;
                break;
            }
        }

        for (var i = 0; i < allSpeeds.length; i++) {
            var speed = allSpeeds[i];
            var adjusted = total / speed;
            var saved = total - adjusted;
            var pctSaved = speed === 1 ? '-' : ((saved / total) * 100).toFixed(1) + '%';
            var label = speed + 'x';
            while (label.length < 7) label += ' ';
            var timeStr = formatTime(adjusted);
            while (timeStr.length < 14) timeStr += ' ';
            var savedStr = speed === 1 ? '-' : formatTimeSaved(saved);
            while (savedStr.length < 10) savedStr += ' ';
            lines.push(label + ' | ' + timeStr + ' | ' + savedStr + ' | ' + pctSaved);
        }

        if (!customInPresets) {
            var adjusted = total / customSpeed;
            var saved = total - adjusted;
            var pctSaved = ((saved / total) * 100).toFixed(1) + '%';
            var label = customSpeed + 'x*';
            while (label.length < 7) label += ' ';
            var timeStr = formatTime(adjusted);
            while (timeStr.length < 14) timeStr += ' ';
            var savedStr = formatTimeSaved(saved);
            while (savedStr.length < 10) savedStr += ' ';
            lines.push(label + ' | ' + timeStr + ' | ' + savedStr + ' | ' + pctSaved);
            lines.push('');
            lines.push(S.custom_speed_note);
        }

        lines.push('');
        lines.push(S.est_word_count_label + ': ~' + Math.round(total / 60 * 150).toLocaleString());
        lines.push(S.est_chapters_label + ': ~' + Math.max(1, Math.round(total / 60 / 25)));

        return lines.join('\n');
    }

    // Event listeners
    btnCalculate.addEventListener('click', calculate);

    btnSample.addEventListener('click', function() {
        // Sample: "The Lord of the Rings" audiobook (~54h 11m)
        inputHours.value = 54;
        inputMinutes.value = 11;
        inputSeconds.value = 0;
        customSpeedSlider.value = 1.5;
        customSpeedInput.value = '1.50';
        calculate();
    });

    btnCopy.addEventListener('click', function() {
        var summary = buildSummary();
        if (!summary) {
            showError(S.error_calculate_first_copy);
            return;
        }
        navigator.clipboard.writeText(summary).then(function() {
            var orig = btnCopy.innerHTML;
            btnCopy.innerHTML = '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> ' + S.copied;
            btnCopy.classList.add('text-green-400', 'border-green-400');
            showSuccess(S.copied_to_clipboard);
            setTimeout(function() {
                btnCopy.innerHTML = orig;
                btnCopy.classList.remove('text-green-400', 'border-green-400');
            }, 2000);
        });
    });

    btnDownload.addEventListener('click', function() {
        var summary = buildSummary();
        if (!summary) {
            showError(S.error_calculate_first_download);
            return;
        }
        var blob = new Blob([summary], { type: 'text/plain' });
        var url = URL.createObjectURL(blob);
        var a = document.createElement('a');
        a.href = url;
        a.download = 'audiobook-speed-calculation.txt';
        document.body.appendChild(a);
        a.click();
        document.body.removeChild(a);
        URL.revokeObjectURL(url);
        showSuccess(S.downloaded);
    });

    btnClear.addEventListener('click', function() {
        inputHours.value = 0;
        inputMinutes.value = 0;
        inputSeconds.value = 0;
        customSpeedSlider.value = 1.5;
        customSpeedInput.value = '1.50';
        resultsSection.classList.add('hidden');
        statsBar.classList.add('hidden');
        successNotification.classList.add('hidden');
        errorNotification.classList.add('hidden');
    });

    // Keyboard shortcut: Ctrl/Cmd+Enter to calculate
    document.addEventListener('keydown', function(e) {
        if ((e.ctrlKey || e.metaKey) && e.key === 'Enter') {
            e.preventDefault();
            calculate();
        }
    });

    // Auto-recalculate on input change if results are already shown
    [inputHours, inputMinutes, inputSeconds].forEach(function(el) {
        el.addEventListener('input', function() {
            if (!resultsSection.classList.contains('hidden')) {
                calculate();
            }
        });
    });
})();
</script>
