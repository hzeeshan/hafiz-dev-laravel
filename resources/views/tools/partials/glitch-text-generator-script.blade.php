@push('scripts')
<script>
(function() {
    const SAMPLE_TEXT = 'The system is corrupted beyond repair.';

    // Combining characters for Zalgo style (above marks)
    const combiningUp = [
        '\u0300','\u0301','\u0302','\u0303','\u0304','\u0305','\u0306','\u0307',
        '\u0308','\u0309','\u030A','\u030B','\u030C','\u030D','\u030E','\u030F',
        '\u0310','\u0311','\u0312','\u0313','\u0314','\u0315','\u031A','\u033D',
        '\u033E','\u033F','\u0340','\u0341','\u0342','\u0343','\u0344','\u0346',
        '\u034A','\u034B','\u034C','\u0350','\u0351','\u0352','\u0357','\u0358',
        '\u035B','\u035D','\u035E','\u0360','\u0361'
    ];

    // Combining characters (below marks)
    const combiningDown = [
        '\u0316','\u0317','\u0318','\u0319','\u031C','\u031D','\u031E','\u031F',
        '\u0320','\u0321','\u0322','\u0323','\u0324','\u0325','\u0326','\u0327',
        '\u0328','\u0329','\u032A','\u032B','\u032C','\u032D','\u032E','\u032F',
        '\u0330','\u0331','\u0332','\u0333','\u0345','\u0347','\u0348','\u0349',
        '\u034D','\u034E','\u0353','\u0354','\u0355','\u0356','\u0359','\u035A',
        '\u035C','\u035F','\u0362'
    ];

    // Combining characters (middle / strikethrough marks)
    const combiningMid = [
        '\u0334','\u0335','\u0336','\u0337','\u0338'
    ];

    // Binary-like characters
    const binaryChars = ['0', '1'];

    // Intensity ranges: [min, max] combining chars per character
    const intensityLevels = {
        1: [1, 2],   // Subtle
        2: [2, 5],   // Medium
        3: [5, 12]   // Extreme
    };
    // Translatable strings from #tool-strings data attributes (Italian) or English defaults
    const stringsEl = document.getElementById('tool-strings');
    const S = {
        enter_text: stringsEl?.dataset.enterText || 'Please enter some text to glitch.',
        nothing_copy: stringsEl?.dataset.nothingCopy || 'Nothing to copy. Generate glitch text first.',
        copied: stringsEl?.dataset.copied || 'Copied to clipboard!',
        nothing_download: stringsEl?.dataset.nothingDownload || 'Nothing to download. Generate glitch text first.',
        downloaded: stringsEl?.dataset.downloaded || 'Downloaded glitch-text.txt',
        btn_copied: stringsEl?.dataset.btnCopied || 'Copied!',
        subtle: stringsEl?.dataset.subtle || 'Subtle',
        medium: stringsEl?.dataset.medium || 'Medium',
        extreme: stringsEl?.dataset.extreme || 'Extreme',
    };

    const intensityLabels = { 1: S.subtle, 2: S.medium, 3: S.extreme };

    // DOM Elements
    const textInput = document.getElementById('text-input');
    const textOutput = document.getElementById('text-output');
    const glitchStyle = document.getElementById('glitch-style');
    const intensitySlider = document.getElementById('intensity-level');
    const intensityLabel = document.getElementById('intensity-label');
    const btnGenerate = document.getElementById('btn-generate');
    const btnCopy = document.getElementById('btn-copy');
    const btnDownload = document.getElementById('btn-download');
    const btnSample = document.getElementById('btn-sample');
    const btnClear = document.getElementById('btn-clear');
    const statsBar = document.getElementById('stats-bar');
    const successNotification = document.getElementById('success-notification');
    const successMessage = document.getElementById('success-message');
    const errorNotification = document.getElementById('error-notification');
    const errorMessage = document.getElementById('error-message');

    function rand(min, max) {
        return Math.floor(Math.random() * (max - min + 1)) + min;
    }

    function randItem(arr) {
        return arr[Math.floor(Math.random() * arr.length)];
    }

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
        setTimeout(() => errorNotification.classList.add('hidden'), 5000);
    }

    // Style: Zalgo - stacking combining marks above and below
    function glitchZalgo(text, intensity) {
        const [min, max] = intensityLevels[intensity];
        return [...text].map(ch => {
            if (ch === ' ' || ch === '\n' || ch === '\t') return ch;
            let result = ch;
            const upCount = rand(min, max);
            const downCount = rand(min, max);
            for (let i = 0; i < upCount; i++) result += randItem(combiningUp);
            for (let i = 0; i < downCount; i++) result += randItem(combiningDown);
            return result;
        }).join('');
    }

    // Style: Strikethrough Glitch - mid-line corruption with scattered marks
    function glitchStrike(text, intensity) {
        const [min, max] = intensityLevels[intensity];
        return [...text].map(ch => {
            if (ch === ' ' || ch === '\n' || ch === '\t') return ch;
            let result = ch;
            // Always add at least one strikethrough mark
            result += randItem(combiningMid);
            // Add extra mid marks based on intensity
            const extraMid = rand(Math.max(0, min - 1), Math.floor(max / 2));
            for (let i = 0; i < extraMid; i++) result += randItem(combiningMid);
            // At higher intensity, add some above/below marks too
            if (intensity >= 2) {
                const extraMarks = rand(0, Math.floor(max / 3));
                for (let i = 0; i < extraMarks; i++) {
                    result += randItem(Math.random() > 0.5 ? combiningUp : combiningDown);
                }
            }
            return result;
        }).join('');
    }

    // Style: Matrix Rain - scattered directional combining marks
    function glitchMatrix(text, intensity) {
        const [min, max] = intensityLevels[intensity];
        return [...text].map(ch => {
            if (ch === ' ' || ch === '\n' || ch === '\t') return ch;
            let result = ch;
            const totalMarks = rand(min, max);
            for (let i = 0; i < totalMarks; i++) {
                const roll = Math.random();
                if (roll < 0.3) {
                    result += randItem(combiningMid);
                } else if (roll < 0.6) {
                    result += randItem(combiningUp);
                } else {
                    result += randItem(combiningDown);
                }
            }
            return result;
        }).join('');
    }

    // Style: Vaporwave Glitch - full-width characters with distortion
    function glitchVaporwave(text, intensity) {
        const [min, max] = intensityLevels[intensity];
        return [...text].map(ch => {
            if (ch === '\n' || ch === '\t') return ch;
            // Convert ASCII to full-width Unicode
            const code = ch.charCodeAt(0);
            let result;
            if (code === 32) {
                // Full-width space
                result = '\u3000';
            } else if (code >= 33 && code <= 126) {
                // Convert to full-width (offset 0xFEE0)
                result = String.fromCharCode(code + 0xFEE0);
            } else {
                result = ch;
            }
            // Add combining marks for glitch effect
            if (ch !== ' ' && ch !== '\n' && ch !== '\t') {
                const markCount = rand(Math.max(0, min - 1), Math.floor(max / 2));
                for (let i = 0; i < markCount; i++) {
                    result += randItem(Math.random() > 0.5 ? combiningUp : combiningDown);
                }
            }
            return result;
        }).join('');
    }

    // Style: Binary Noise - text mixed with binary fragments
    function glitchBinary(text, intensity) {
        const [min, max] = intensityLevels[intensity];
        return [...text].map(ch => {
            if (ch === ' ' || ch === '\n' || ch === '\t') return ch;
            let result = ch;
            // Add combining marks
            const markCount = rand(Math.max(0, min - 1), Math.floor(max / 3));
            for (let i = 0; i < markCount; i++) {
                result += randItem(combiningMid);
            }
            // Insert binary noise after characters randomly based on intensity
            if (Math.random() < (intensity * 0.15)) {
                const bitsCount = rand(1, intensity + 1);
                let bits = '';
                for (let i = 0; i < bitsCount; i++) bits += randItem(binaryChars);
                result += bits;
            }
            return result;
        }).join('');
    }

    const styleMap = {
        zalgo: glitchZalgo,
        strike: glitchStrike,
        matrix: glitchMatrix,
        vaporwave: glitchVaporwave,
        binary: glitchBinary
    };

    const styleNames = {
        zalgo: 'Zalgo',
        strike: 'Strike',
        matrix: 'Matrix',
        vaporwave: 'Vaporwave',
        binary: 'Binary'
    };

    function generate() {
        const text = textInput.value;
        if (!text.trim()) {
            showError(S.enter_text);
            textOutput.value = '';
            statsBar.classList.add('hidden');
            return;
        }

        errorNotification.classList.add('hidden');
        const style = glitchStyle.value;
        const intensity = parseInt(intensitySlider.value);
        const glitchFn = styleMap[style];

        const result = glitchFn(text, intensity);
        textOutput.value = result;

        // Update stats
        document.getElementById('stat-input-chars').textContent = [...text].length;
        document.getElementById('stat-output-chars').textContent = [...result].length;
        document.getElementById('stat-style').textContent = styleNames[style];
        statsBar.classList.remove('hidden');
    }

    // Event listeners
    btnGenerate.addEventListener('click', generate);

    intensitySlider.addEventListener('input', function() {
        intensityLabel.textContent = intensityLabels[this.value];
    });

    // Keyboard shortcut: Ctrl/Cmd + Enter
    textInput.addEventListener('keydown', function(e) {
        if ((e.ctrlKey || e.metaKey) && e.key === 'Enter') {
            e.preventDefault();
            generate();
        }
    });

    btnCopy.addEventListener('click', function() {
        const output = textOutput.value;
        if (!output) {
            showError(S.nothing_copy);
            return;
        }
        navigator.clipboard.writeText(output).then(() => {
            const orig = this.innerHTML;
            this.innerHTML = '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> ' + S.btn_copied;
            this.classList.add('text-green-400', 'border-green-400');
            showSuccess(S.copied);
            setTimeout(() => {
                this.innerHTML = orig;
                this.classList.remove('text-green-400', 'border-green-400');
            }, 2000);
        });
    });

    btnDownload.addEventListener('click', function() {
        const output = textOutput.value;
        if (!output) {
            showError(S.nothing_download);
            return;
        }
        const blob = new Blob([output], { type: 'text/plain' });
        const url = URL.createObjectURL(blob);
        const a = document.createElement('a');
        a.href = url;
        a.download = 'glitch-text.txt';
        document.body.appendChild(a);
        a.click();
        document.body.removeChild(a);
        URL.revokeObjectURL(url);
        showSuccess(S.downloaded);
    });

    btnSample.addEventListener('click', function() {
        textInput.value = SAMPLE_TEXT;
        generate();
    });

    btnClear.addEventListener('click', function() {
        textInput.value = '';
        textOutput.value = '';
        statsBar.classList.add('hidden');
        successNotification.classList.add('hidden');
        errorNotification.classList.add('hidden');
    });
})();
</script>
@endpush
