<script>
(function() {
    // Translatable strings
    var stringsEl = document.getElementById('tool-strings');
    var S = {
        video: stringsEl?.dataset.video || 'Video',
        podcast: stringsEl?.dataset.podcast || 'Podcast',
        lecture: stringsEl?.dataset.lecture || 'Lecture',
        course: stringsEl?.dataset.course || 'Course',
        audiobook: stringsEl?.dataset.audiobook || 'Audiobook',
        original: stringsEl?.dataset.original || 'original',
        slower: stringsEl?.dataset.slower || 'slower',
        custom: stringsEl?.dataset.custom || 'custom',
        none: stringsEl?.dataset.none || 'None',
        total_for: stringsEl?.dataset.totalFor || 'Total for',
        items: stringsEl?.dataset.items || 'items',
        each: stringsEl?.dataset.each || 'each',
        error_invalid: stringsEl?.dataset.errorInvalid || 'Please enter a valid duration (at least 1 second).',
        error_calculate_first_copy: stringsEl?.dataset.errorCalculateFirstCopy || 'Calculate first before copying.',
        error_calculate_first_download: stringsEl?.dataset.errorCalculateFirstDownload || 'Calculate first before downloading.',
        copied: stringsEl?.dataset.copied || 'Copied!',
        copied_to_clipboard: stringsEl?.dataset.copiedToClipboard || 'Copied to clipboard!',
        downloaded: stringsEl?.dataset.downloaded || 'Downloaded playback-speed-calculation.txt',
        summary_title: stringsEl?.dataset.summaryTitle || 'Playback Speed Calculator Results',
        media_type_label: stringsEl?.dataset.mediaTypeLabel || 'Media Type',
        original_length: stringsEl?.dataset.originalLength || 'Original Length',
        items_label: stringsEl?.dataset.itemsLabel || 'Items',
        x_each: stringsEl?.dataset.xEach || 'each',
        speed_header: stringsEl?.dataset.speedHeader || 'Speed',
        watch_time: stringsEl?.dataset.watchTime || 'Watch Time',
        time_saved: stringsEl?.dataset.timeSaved || 'Time Saved',
        pct_saved: stringsEl?.dataset.pctSaved || '% Saved',
        custom_speed_note: stringsEl?.dataset.customSpeedNote || '* Custom speed',
        generated_at: stringsEl?.dataset.generatedAt || 'Generated at hafiz.dev/tools/playback-speed-calculator',
        sample_youtube: stringsEl?.dataset.sampleYoutube || 'YouTube video (22 min)',
        sample_podcast: stringsEl?.dataset.samplePodcast || 'Podcast series (10 episodes, 1h 15m each)',
        sample_lecture: stringsEl?.dataset.sampleLecture || 'University course (30 lectures, 50 min each)',
        sample_course: stringsEl?.dataset.sampleCourse || 'Online course (2h 15m total)',
        sample_audiobook: stringsEl?.dataset.sampleAudiobook || 'Audiobook (11h 40m)'
    };

    // DOM elements
    var inputHours = document.getElementById('input-hours');
    var inputMinutes = document.getElementById('input-minutes');
    var inputSeconds = document.getElementById('input-seconds');
    var inputItems = document.getElementById('input-items');
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
    var mediaTypeBtns = document.querySelectorAll('.media-type-btn');

    var selectedMedia = 'video';

    // Preset speeds
    var presetSpeeds = [0.75, 1, 1.25, 1.5, 1.75, 2, 2.5, 3];

    // Media type selection
    mediaTypeBtns.forEach(function(btn) {
        btn.addEventListener('click', function() {
            mediaTypeBtns.forEach(function(b) {
                b.classList.remove('bg-gold', 'text-darkBg');
                b.classList.add('border', 'border-gold/30', 'text-light-muted');
            });
            btn.classList.remove('border', 'border-gold/30', 'text-light-muted');
            btn.classList.add('bg-gold', 'text-darkBg');
            selectedMedia = btn.getAttribute('data-media');
            if (!resultsSection.classList.contains('hidden')) {
                calculate();
            }
        });
    });

    // Sync slider and input
    customSpeedSlider.addEventListener('input', function() {
        customSpeedInput.value = parseFloat(this.value).toFixed(2);
        if (!resultsSection.classList.contains('hidden')) {
            calculate();
        }
    });

    customSpeedInput.addEventListener('change', function() {
        var val = parseFloat(this.value);
        if (isNaN(val) || val < 0.25) val = 0.25;
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
        var items = parseInt(inputItems.value) || 1;
        if (items < 1) items = 1;
        return (h * 3600 + m * 60 + s) * items;
    }

    function getPerItemSeconds() {
        var h = parseInt(inputHours.value) || 0;
        var m = parseInt(inputMinutes.value) || 0;
        var s = parseInt(inputSeconds.value) || 0;
        return h * 3600 + m * 60 + s;
    }

    function formatTime(totalSeconds) {
        totalSeconds = Math.round(totalSeconds);
        var h = Math.floor(totalSeconds / 3600);
        var m = Math.floor((totalSeconds % 3600) / 60);
        var s = totalSeconds % 60;
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
        var items = parseInt(inputItems.value) || 1;

        // Build speed table
        var tableHtml = '';
        var customInPresets = false;
        for (var i = 0; i < presetSpeeds.length; i++) {
            if (Math.abs(presetSpeeds[i] - customSpeed) < 0.01) {
                customInPresets = true;
                break;
            }
        }

        for (var i = 0; i < presetSpeeds.length; i++) {
            var speed = presetSpeeds[i];
            var adjusted = total / speed;
            var saved = total - adjusted;
            var pctSaved = ((saved / total) * 100).toFixed(1);
            var isOriginal = speed === 1;
            var isCustomMatch = Math.abs(speed - customSpeed) < 0.01;
            var isSlow = speed < 1;

            var rowClass = isOriginal ? 'text-light-muted' : '';
            if (isCustomMatch) rowClass = 'bg-gold/5';

            tableHtml += '<tr class="border-b border-gold/5 ' + rowClass + '">';
            tableHtml += '<td class="py-3 pr-4"><span class="font-mono font-semibold ' + (isOriginal ? 'text-light-muted' : 'text-gold') + '">' + speed + 'x</span>';
            if (isOriginal) tableHtml += ' <span class="text-xs text-light-muted">(' + S.original + ')</span>';
            if (isSlow) tableHtml += ' <span class="text-xs text-light-muted">(' + S.slower + ')</span>';
            if (isCustomMatch && !isOriginal && !isSlow) tableHtml += ' <span class="text-xs text-gold/70">(' + S.custom + ')</span>';
            tableHtml += '</td>';
            tableHtml += '<td class="py-3 pr-4 font-mono text-light">' + formatTime(adjusted) + '</td>';

            if (isSlow) {
                var extra = adjusted - total;
                tableHtml += '<td class="py-3 pr-4 font-mono text-red-400">+' + formatTime(extra) + '</td>';
                tableHtml += '<td class="py-3 text-right font-mono text-red-400">+' + Math.abs(parseFloat(pctSaved)).toFixed(1) + '%</td>';
            } else if (isOriginal) {
                tableHtml += '<td class="py-3 pr-4 font-mono text-light-muted">-</td>';
                tableHtml += '<td class="py-3 text-right font-mono text-light-muted">-</td>';
            } else {
                tableHtml += '<td class="py-3 pr-4 font-mono text-green-400">' + formatTimeSaved(saved) + '</td>';
                tableHtml += '<td class="py-3 text-right font-mono text-green-400">' + pctSaved + '%</td>';
            }
            tableHtml += '</tr>';
        }

        // Add custom speed row if not in presets
        if (!customInPresets) {
            var adjusted = total / customSpeed;
            var saved = total - adjusted;
            var pctSaved = ((saved / total) * 100).toFixed(1);

            tableHtml += '<tr class="border-b border-gold/5 bg-gold/5">';
            tableHtml += '<td class="py-3 pr-4"><span class="font-mono font-semibold text-gold">' + customSpeed + 'x</span> <span class="text-xs text-gold/70">(' + S.custom + ')</span></td>';
            tableHtml += '<td class="py-3 pr-4 font-mono text-light">' + formatTime(adjusted) + '</td>';

            if (customSpeed < 1) {
                var extra = adjusted - total;
                tableHtml += '<td class="py-3 pr-4 font-mono text-red-400">+' + formatTime(extra) + '</td>';
                tableHtml += '<td class="py-3 text-right font-mono text-red-400">+' + Math.abs(parseFloat(pctSaved)).toFixed(1) + '%</td>';
            } else {
                tableHtml += '<td class="py-3 pr-4 font-mono text-green-400">' + formatTimeSaved(saved) + '</td>';
                tableHtml += '<td class="py-3 text-right font-mono text-green-400">' + pctSaved + '%</td>';
            }

            tableHtml += '</tr>';
        }

        speedTableBody.innerHTML = tableHtml;

        // Custom speed result
        var customAdjusted = total / customSpeed;
        var customSaved = total - customAdjusted;
        document.getElementById('custom-result-time').textContent = formatTime(customAdjusted);
        document.getElementById('custom-result-speed').textContent = customSpeed + 'x';
        document.getElementById('custom-result-saved').textContent = customSpeed >= 1 ? formatTimeSaved(customSaved) : '+' + formatTime(Math.abs(customSaved));

        // Items note
        var itemsNote = document.getElementById('items-note');
        if (items > 1) {
            itemsNote.classList.remove('hidden');
            document.getElementById('items-count').textContent = items;
            document.getElementById('per-item-time').textContent = formatTime(getPerItemSeconds() / customSpeed);
        } else {
            itemsNote.classList.add('hidden');
        }

        // Quick stats
        document.getElementById('stat-original').textContent = formatTime(total);
        document.getElementById('stat-total-minutes').textContent = Math.round(total / 60).toLocaleString();
        document.getElementById('stat-at-15x').textContent = formatTime(total / 1.5);
        document.getElementById('stat-at-2x').textContent = formatTime(total / 2);

        // Stats bar
        document.getElementById('stats-original').textContent = formatTime(total);
        document.getElementById('stats-custom').textContent = customSpeed + 'x = ' + formatTime(customAdjusted);
        document.getElementById('stats-saved').textContent = customSpeed >= 1 ? formatTimeSaved(customSaved) : '+' + formatTime(Math.abs(customSaved));
        statsBar.classList.remove('hidden');

        // Show results
        resultsSection.classList.remove('hidden');
    }

    // Build summary text for copy/download
    function buildSummary() {
        var total = getTotalSeconds();
        if (total <= 0) return '';

        var customSpeed = parseFloat(customSpeedInput.value) || 1.5;
        var items = parseInt(inputItems.value) || 1;
        var lines = [];
        lines.push(S.summary_title);
        lines.push('=================================');
        lines.push(S.media_type_label + ': ' + selectedMedia.charAt(0).toUpperCase() + selectedMedia.slice(1));
        lines.push(S.original_length + ': ' + formatTime(total));
        if (items > 1) {
            lines.push(S.items_label + ': ' + items + ' x ' + formatTime(getPerItemSeconds()) + ' ' + S.x_each);
        }
        lines.push('');
        lines.push(S.speed_header + '   | ' + S.watch_time + '     | ' + S.time_saved + ' | ' + S.pct_saved);
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
            if (speed < 1) pctSaved = '+' + Math.abs(parseFloat(((saved / total) * 100).toFixed(1))) + '%';
            var label = speed + 'x';
            while (label.length < 7) label += ' ';
            var timeStr = formatTime(adjusted);
            while (timeStr.length < 14) timeStr += ' ';
            var savedStr = speed === 1 ? '-' : (speed < 1 ? '+' + formatTime(adjusted - total) : formatTimeSaved(saved));
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
            var savedStr = customSpeed < 1 ? '+' + formatTime(adjusted - total) : formatTimeSaved(saved);
            while (savedStr.length < 10) savedStr += ' ';
            lines.push(label + ' | ' + timeStr + ' | ' + savedStr + ' | ' + pctSaved);
            lines.push('');
            lines.push(S.custom_speed_note);
        }

        lines.push('');
        lines.push(S.generated_at);

        return lines.join('\n');
    }

    // Event listeners
    btnCalculate.addEventListener('click', calculate);

    // Sample data per media type
    var sampleData = {
        video:     { hours: 0,  minutes: 22, seconds: 0, items: 1,  speed: 2.00 },
        podcast:   { hours: 1,  minutes: 15, seconds: 0, items: 10, speed: 1.50 },
        lecture:   { hours: 0,  minutes: 50, seconds: 0, items: 30, speed: 1.75 },
        course:    { hours: 2,  minutes: 15, seconds: 0, items: 1,  speed: 1.50 },
        audiobook: { hours: 11, minutes: 40, seconds: 0, items: 1,  speed: 1.50 }
    };

    btnSample.addEventListener('click', function() {
        var data = sampleData[selectedMedia] || sampleData.video;
        inputHours.value = data.hours;
        inputMinutes.value = data.minutes;
        inputSeconds.value = data.seconds;
        inputItems.value = data.items;
        customSpeedSlider.value = data.speed;
        customSpeedInput.value = data.speed.toFixed(2);
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
        a.download = 'playback-speed-calculation.txt';
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
        inputItems.value = 1;
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
    [inputHours, inputMinutes, inputSeconds, inputItems].forEach(function(el) {
        el.addEventListener('input', function() {
            if (!resultsSection.classList.contains('hidden')) {
                calculate();
            }
        });
    });
})();
</script>
