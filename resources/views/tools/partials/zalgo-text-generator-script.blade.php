@push('scripts')
<script>
(function() {
    const stringsEl = document.getElementById('tool-strings');
    const S = {
        sample_text: stringsEl?.dataset.sampleText || 'He comes. Zalgo awaits.',
        copied: stringsEl?.dataset.copied || 'Copied to clipboard!',
        chaos_mini: stringsEl?.dataset.chaosMini || 'Mini',
        chaos_normal: stringsEl?.dataset.chaosNormal || 'Normal',
        chaos_maximum: stringsEl?.dataset.chaosMaximum || 'Maximum',
    };

    // Unicode combining characters for Zalgo effect
    const combiningUp = [
        '\u0300','\u0301','\u0302','\u0303','\u0304','\u0305','\u0306','\u0307',
        '\u0308','\u0309','\u030A','\u030B','\u030C','\u030D','\u030E','\u030F',
        '\u0310','\u0311','\u0312','\u0313','\u0314','\u0315','\u031A','\u033D',
        '\u033E','\u033F','\u0340','\u0341','\u0342','\u0343','\u0344','\u0346',
        '\u034A','\u034B','\u034C','\u0350','\u0351','\u0352','\u0357','\u0358',
        '\u035B','\u035D','\u035E','\u0360','\u0361'
    ];

    const combiningMid = [
        '\u0334','\u0335','\u0336','\u0337','\u0338','\u0339','\u033A','\u033B','\u033C'
    ];

    const combiningDown = [
        '\u0316','\u0317','\u0318','\u0319','\u031C','\u031D','\u031E','\u031F',
        '\u0320','\u0321','\u0322','\u0323','\u0324','\u0325','\u0326','\u0327',
        '\u0328','\u0329','\u032A','\u032B','\u032C','\u032D','\u032E','\u032F',
        '\u0330','\u0331','\u0332','\u0333','\u0339','\u033A','\u033B','\u033C',
        '\u0345','\u0347','\u0348','\u0349','\u034D','\u034E','\u0353','\u0354',
        '\u0355','\u0356','\u0359','\u035A','\u035C','\u035F','\u0362'
    ];

    // Chaos level ranges: [min, max] combining chars per direction
    const chaosLevels = {
        1: [1, 2],   // Mini
        2: [3, 5],   // Normal
        3: [8, 15]   // Maximum
    };

    const chaosLabels = { 1: S.chaos_mini, 2: S.chaos_normal, 3: S.chaos_maximum };

    const textInput = document.getElementById('text-input');
    const textOutput = document.getElementById('text-output');
    const chaosSlider = document.getElementById('chaos-level');
    const chaosLabel = document.getElementById('chaos-label');
    const optUp = document.getElementById('opt-up');
    const optMid = document.getElementById('opt-mid');
    const optDown = document.getElementById('opt-down');
    const btnCopy = document.getElementById('btn-copy');
    const btnRegenerate = document.getElementById('btn-regenerate');
    const btnSample = document.getElementById('btn-sample');
    const btnClear = document.getElementById('btn-clear');
    const successNotification = document.getElementById('success-notification');
    const successMessage = document.getElementById('success-message');

    function rand(min, max) {
        return Math.floor(Math.random() * (max - min + 1)) + min;
    }

    function randItem(arr) {
        return arr[Math.floor(Math.random() * arr.length)];
    }

    function zalgoify(text) {
        const level = parseInt(chaosSlider.value);
        const [min, max] = chaosLevels[level];
        const useUp = optUp.checked;
        const useMid = optMid.checked;
        const useDown = optDown.checked;

        if (!useUp && !useMid && !useDown) return text;

        return [...text].map(ch => {
            if (ch === ' ' || ch === '\n' || ch === '\t') return ch;

            let result = ch;
            if (useUp) {
                const count = rand(min, max);
                for (let i = 0; i < count; i++) result += randItem(combiningUp);
            }
            if (useMid) {
                const count = rand(Math.max(1, Math.floor(min / 2)), Math.max(1, Math.floor(max / 2)));
                for (let i = 0; i < count; i++) result += randItem(combiningMid);
            }
            if (useDown) {
                const count = rand(min, max);
                for (let i = 0; i < count; i++) result += randItem(combiningDown);
            }
            return result;
        }).join('');
    }

    function convert() {
        const text = textInput.value;
        if (!text) { textOutput.value = ''; return; }
        textOutput.value = zalgoify(text);
    }

    chaosSlider.addEventListener('input', function() {
        chaosLabel.textContent = chaosLabels[this.value];
        convert();
    });

    textInput.addEventListener('input', convert);
    [optUp, optMid, optDown].forEach(el => el.addEventListener('change', convert));
    btnRegenerate.addEventListener('click', convert);

    btnCopy.addEventListener('click', function() {
        const output = textOutput.value;
        if (!output) return;
        navigator.clipboard.writeText(output).then(() => {
            const orig = this.innerHTML;
            this.innerHTML = '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> ' + S.copied;
            this.classList.add('text-green-400', 'border-green-400');
            successNotification.classList.remove('hidden');
            successMessage.textContent = S.copied;
            setTimeout(() => {
                this.innerHTML = orig;
                this.classList.remove('text-green-400', 'border-green-400');
                successNotification.classList.add('hidden');
            }, 2000);
        });
    });

    btnSample.addEventListener('click', function() {
        textInput.value = S.sample_text;
        convert();
    });

    btnClear.addEventListener('click', function() {
        textInput.value = '';
        textOutput.value = '';
    });
})();
</script>
@endpush
