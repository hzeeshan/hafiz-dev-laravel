@push('scripts')
<script>
(function() {
    const SAMPLE_TEXT = 'The darkness whispers your name.';

    // Combining characters for "Creepy" style (above + below marks)
    const combiningUp = [
        '\u0300','\u0301','\u0302','\u0303','\u0304','\u0305','\u0306','\u0307',
        '\u0308','\u0309','\u030A','\u030B','\u030C','\u030D','\u030E','\u030F',
        '\u0310','\u0311','\u0312','\u0313','\u0314','\u0315','\u031A','\u033D',
        '\u033E','\u033F','\u0340','\u0341','\u0342','\u0343','\u0344','\u0346',
        '\u034A','\u034B','\u034C','\u0350','\u0351','\u0352','\u0357','\u0358',
        '\u035B','\u035D','\u035E','\u0360','\u0361'
    ];

    const combiningDown = [
        '\u0316','\u0317','\u0318','\u0319','\u031C','\u031D','\u031E','\u031F',
        '\u0320','\u0321','\u0322','\u0323','\u0324','\u0325','\u0326','\u0327',
        '\u0328','\u0329','\u032A','\u032B','\u032C','\u032D','\u032E','\u032F',
        '\u0330','\u0331','\u0332','\u0333','\u0345','\u0347','\u0348','\u0349',
        '\u034D','\u034E','\u0353','\u0354','\u0355','\u0356','\u0359','\u035A',
        '\u035C','\u035F','\u0362'
    ];

    const combiningMid = [
        '\u0334','\u0335','\u0336','\u0337','\u0338'
    ];

    // "Demonic" style character substitutions
    const demonicMap = {
        'a': '\u00e4', 'b': '\u0183', 'c': '\u00e7', 'd': '\u0111', 'e': '\u00eb',
        'f': '\u0192', 'g': '\u01e7', 'h': '\u0127', 'i': '\u00ef', 'j': '\u0135',
        'k': '\u0137', 'l': '\u0142', 'm': '\u1e43', 'n': '\u00f1', 'o': '\u00f6',
        'p': '\u1e57', 'q': '\u01eb', 'r': '\u0159', 's': '\u0161', 't': '\u0167',
        'u': '\u00fc', 'v': '\u1e7d', 'w': '\u1e85', 'x': '\u1e8d', 'y': '\u00ff',
        'z': '\u017e',
        'A': '\u00c4', 'B': '\u0182', 'C': '\u00c7', 'D': '\u0110', 'E': '\u00cb',
        'F': '\u0191', 'G': '\u01e6', 'H': '\u0126', 'I': '\u00cf', 'J': '\u0134',
        'K': '\u0136', 'L': '\u0141', 'M': '\u1e42', 'N': '\u00d1', 'O': '\u00d6',
        'P': '\u1e56', 'Q': '\u01ea', 'R': '\u0158', 'S': '\u0160', 'T': '\u0166',
        'U': '\u00dc', 'V': '\u1e7c', 'W': '\u1e84', 'X': '\u1e8c', 'Y': '\u0178',
        'Z': '\u017d'
    };

    // "Ancient" style character substitutions (medieval / runic look)
    const ancientMap = {
        'a': '\u0251', 'b': '\u0253', 'c': '\u0188', 'd': '\u0256', 'e': '\u0205',
        'f': '\u0192', 'g': '\u0260', 'h': '\u0266', 'i': '\u0268', 'j': '\u0249',
        'k': '\u0199', 'l': '\u026d', 'm': '\u0271', 'n': '\u0272', 'o': '\u0275',
        'p': '\u01a5', 'q': '\u024b', 'r': '\u027d', 's': '\u0282', 't': '\u0288',
        'u': '\u0289', 'v': '\u028b', 'w': '\u028d', 'x': '\u04b3', 'y': '\u01b4',
        'z': '\u0290',
        'A': '\u023a', 'B': '\u0181', 'C': '\u023b', 'D': '\u018a', 'E': '\u0204',
        'F': '\u0191', 'G': '\u0193', 'H': '\u0126', 'I': '\u0197', 'J': '\u0248',
        'K': '\u0198', 'L': '\u023d', 'M': '\u2c6e', 'N': '\u019d', 'O': '\u019f',
        'P': '\u01a4', 'Q': '\u024a', 'R': '\u024c', 'S': '\u0218', 'T': '\u023e',
        'U': '\u0244', 'V': '\u01b2', 'W': '\u2c72', 'X': '\u04b2', 'Y': '\u01b3',
        'Z': '\u0224'
    };

    // Void wrapper characters
    const voidChars = ['\u2591', '\u2592', '\u2593', '\u2588', '\u2580', '\u2584', '\u25A0', '\u25A1'];
    const darkSymbols = ['\u2620', '\u2623', '\u2625', '\u2639', '\u263B', '\u2694', '\u2698', '\u269B'];

    // Intensity ranges: [min, max] combining chars per character
    const intensityLevels = {
        1: [1, 2],   // Subtle
        2: [2, 4],   // Medium
        3: [5, 10]   // Extreme
    };
    // Translatable strings from #tool-strings data attributes (Italian) or English defaults
    const stringsEl = document.getElementById('tool-strings');
    const S = {
        enter_text: stringsEl?.dataset.enterText || 'Please enter some text to curse.',
        nothing_copy: stringsEl?.dataset.nothingCopy || 'Nothing to copy. Generate cursed text first.',
        copied: stringsEl?.dataset.copied || 'Copied to clipboard!',
        nothing_download: stringsEl?.dataset.nothingDownload || 'Nothing to download. Generate cursed text first.',
        downloaded: stringsEl?.dataset.downloaded || 'Downloaded cursed-text.txt',
        btn_copied: stringsEl?.dataset.btnCopied || 'Copied!',
        subtle: stringsEl?.dataset.subtle || 'Subtle',
        medium: stringsEl?.dataset.medium || 'Medium',
        extreme: stringsEl?.dataset.extreme || 'Extreme',
    };

    const intensityLabels = { 1: S.subtle, 2: S.medium, 3: S.extreme };

    // DOM Elements
    const textInput = document.getElementById('text-input');
    const textOutput = document.getElementById('text-output');
    const cursedStyle = document.getElementById('cursed-style');
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

    // Style: Creepy - combining marks above and below
    function curseCreepy(text, intensity) {
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

    // Style: Demonic - character substitutions + optional combining marks
    function curseDemonic(text, intensity) {
        const [min, max] = intensityLevels[intensity];
        return [...text].map(ch => {
            if (ch === ' ' || ch === '\n' || ch === '\t') return ch;
            let result = demonicMap[ch] || ch;
            // Add some combining marks based on intensity
            const markCount = rand(Math.max(0, min - 1), Math.max(1, Math.floor(max / 2)));
            for (let i = 0; i < markCount; i++) {
                result += randItem(Math.random() > 0.5 ? combiningUp : combiningDown);
            }
            return result;
        }).join('');
    }

    // Style: Glitch Matrix - scattered combining marks (mid + random directions)
    function curseGlitch(text, intensity) {
        const [min, max] = intensityLevels[intensity];
        return [...text].map(ch => {
            if (ch === ' ' || ch === '\n' || ch === '\t') return ch;
            let result = ch;
            const totalMarks = rand(min, max);
            for (let i = 0; i < totalMarks; i++) {
                const pool = Math.random() < 0.4 ? combiningMid : (Math.random() > 0.5 ? combiningUp : combiningDown);
                result += randItem(pool);
            }
            return result;
        }).join('');
    }

    // Style: Ancient - medieval character substitutions
    function curseAncient(text, intensity) {
        const [min, max] = intensityLevels[intensity];
        return [...text].map(ch => {
            if (ch === ' ' || ch === '\n' || ch === '\t') return ch;
            let result = ancientMap[ch] || ch;
            // At higher intensity, add subtle combining marks
            if (intensity >= 2) {
                const markCount = rand(0, Math.floor(max / 3));
                for (let i = 0; i < markCount; i++) {
                    result += randItem(combiningDown);
                }
            }
            return result;
        }).join('');
    }

    // Style: Void - text wrapped in darkness symbols
    function curseVoid(text, intensity) {
        const [min, max] = intensityLevels[intensity];
        return [...text].map(ch => {
            if (ch === ' ') {
                // Replace spaces with void-like characters at higher intensity
                if (intensity >= 2) return ' ' + randItem(voidChars) + ' ';
                return ' ';
            }
            if (ch === '\n' || ch === '\t') return ch;
            let result = ch;
            // Add combining marks
            const markCount = rand(Math.max(0, min - 1), Math.floor(max / 2));
            for (let i = 0; i < markCount; i++) {
                result += randItem(combiningMid);
            }
            return result;
        }).join('');
    }

    function addVoidWrapper(text, intensity) {
        const prefix = intensity >= 3
            ? darkSymbols.slice(0, 3).join(' ') + ' '
            : (intensity >= 2 ? randItem(darkSymbols) + ' ' : '');
        const suffix = intensity >= 3
            ? ' ' + darkSymbols.slice(3, 6).join(' ')
            : (intensity >= 2 ? ' ' + randItem(darkSymbols) : '');
        const lines = text.split('\n');
        return lines.map(line => prefix + line + suffix).join('\n');
    }

    const styleMap = {
        creepy: curseCreepy,
        demonic: curseDemonic,
        glitch: curseGlitch,
        ancient: curseAncient,
        void: curseVoid
    };

    const styleNames = {
        creepy: 'Creepy',
        demonic: 'Demonic',
        glitch: 'Glitch',
        ancient: 'Ancient',
        void: 'Void'
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
        const style = cursedStyle.value;
        const intensity = parseInt(intensitySlider.value);
        const curseFn = styleMap[style];

        let result = curseFn(text, intensity);
        if (style === 'void') {
            result = addVoidWrapper(result, intensity);
        }

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
        a.download = 'cursed-text.txt';
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
