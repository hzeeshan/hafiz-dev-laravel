<script>
(function() {
    const S = document.getElementById('tool-strings')?.dataset || {};

    // International Morse Code
    const textToMorse = {
        'A': '.-', 'B': '-...', 'C': '-.-.', 'D': '-..', 'E': '.', 'F': '..-.',
        'G': '--.', 'H': '....', 'I': '..', 'J': '.---', 'K': '-.-', 'L': '.-..',
        'M': '--', 'N': '-.', 'O': '---', 'P': '.--.', 'Q': '--.-', 'R': '.-.',
        'S': '...', 'T': '-', 'U': '..-', 'V': '...-', 'W': '.--', 'X': '-..-',
        'Y': '-.--', 'Z': '--..',
        '0': '-----', '1': '.----', '2': '..---', '3': '...--', '4': '....-',
        '5': '.....', '6': '-....', '7': '--...', '8': '---..', '9': '----.',
        '.': '.-.-.-', ',': '--..--', '?': '..--..', "'": '.----.', '!': '-.-.--',
        '/': '-..-.', '(': '-.--.', ')': '-.--.-', '&': '.-...', ':': '---...',
        ';': '-.-.-.', '=': '-...-', '+': '.-.-.', '-': '-....-', '_': '..--.-',
        '"': '.-..-.', '$': '...-..-', '@': '.--.-.'
    };

    // Reverse map for morse-to-text
    const morseToText = {};
    for (const [key, value] of Object.entries(textToMorse)) {
        morseToText[value] = key;
    }

    const textInput = document.getElementById('text-input');
    const textOutput = document.getElementById('text-output');
    const directionRadios = document.querySelectorAll('input[name="direction"]');
    const inputLabel = document.getElementById('input-label');
    const outputLabel = document.getElementById('output-label');
    const btnCopy = document.getElementById('btn-copy');
    const btnPlay = document.getElementById('btn-play');
    const playIcon = document.getElementById('play-icon');
    const playText = document.getElementById('play-text');
    const btnSample = document.getElementById('btn-sample');
    const btnClear = document.getElementById('btn-clear');
    const speedSlider = document.getElementById('speed-slider');
    const speedLabel = document.getElementById('speed-label');
    const statsBar = document.getElementById('stats-bar');
    const successNotification = document.getElementById('success-notification');
    const successMessage = document.getElementById('success-message');

    let isPlaying = false;
    let audioCtx = null;

    function getDirection() {
        return document.querySelector('input[name="direction"]:checked').value;
    }

    function encodeToMorse(text) {
        return text.toUpperCase().split('').map(ch => {
            if (ch === ' ') return '/';
            return textToMorse[ch] || '';
        }).filter(Boolean).join(' ');
    }

    function decodeFromMorse(morse) {
        return morse.trim().split(' / ').map(word =>
            word.split(' ').map(code => morseToText[code] || '').join('')
        ).join(' ');
    }

    function convert() {
        const input = textInput.value;
        if (!input) {
            textOutput.value = '';
            statsBar.classList.add('hidden');
            return;
        }

        const direction = getDirection();
        let result, morseCode;

        if (direction === 'text-to-morse') {
            result = encodeToMorse(input);
            morseCode = result;
        } else {
            result = decodeFromMorse(input);
            morseCode = input;
        }

        textOutput.value = result;

        // Stats
        const inputLen = input.length;
        const dots = (morseCode.match(/\./g) || []).length;
        const dashes = (morseCode.match(/-/g) || []).length;
        const words = direction === 'text-to-morse'
            ? input.trim().split(/\s+/).filter(Boolean).length
            : result.trim().split(/\s+/).filter(Boolean).length;

        document.getElementById('stat-chars').textContent = inputLen;
        document.getElementById('stat-symbols').textContent = dots + dashes;
        document.getElementById('stat-words').textContent = words;
        statsBar.classList.remove('hidden');
    }

    function getMorseForPlayback() {
        const direction = getDirection();
        if (direction === 'text-to-morse') {
            return textOutput.value;
        } else {
            return textInput.value;
        }
    }

    async function playMorse() {
        const morse = getMorseForPlayback();
        if (!morse || isPlaying) return;

        isPlaying = true;
        playText.textContent = S.stop || 'Stop';
        playIcon.innerHTML = '<rect x="6" y="4" width="4" height="16" rx="1" fill="currentColor"></rect><rect x="14" y="4" width="4" height="16" rx="1" fill="currentColor"></rect>';

        if (!audioCtx) audioCtx = new (window.AudioContext || window.webkitAudioContext)();

        const wpm = parseInt(speedSlider.value);
        const dotDuration = 1.2 / wpm; // Standard PARIS timing

        const symbols = morse.split('');
        let time = audioCtx.currentTime;

        for (const symbol of symbols) {
            if (!isPlaying) break;

            if (symbol === '.') {
                playBeep(time, dotDuration);
                time += dotDuration * 2; // dot + inter-element gap
            } else if (symbol === '-') {
                playBeep(time, dotDuration * 3);
                time += dotDuration * 4; // dash + inter-element gap
            } else if (symbol === ' ') {
                time += dotDuration * 3; // inter-letter gap (total 3, already 1 from prev)
            } else if (symbol === '/') {
                time += dotDuration * 4; // word gap (total 7, already ~3 from spaces around /)
            }
        }

        // Wait for playback to finish
        const remaining = (time - audioCtx.currentTime) * 1000;
        if (remaining > 0) {
            await new Promise(resolve => {
                const timeout = setTimeout(resolve, remaining);
                const checkStop = setInterval(() => {
                    if (!isPlaying) {
                        clearTimeout(timeout);
                        clearInterval(checkStop);
                        resolve();
                    }
                }, 50);
            });
        }

        stopPlayback();
    }

    function playBeep(startTime, duration) {
        const osc = audioCtx.createOscillator();
        const gain = audioCtx.createGain();
        osc.connect(gain);
        gain.connect(audioCtx.destination);
        osc.frequency.value = 600;
        gain.gain.value = 0.5;
        osc.start(startTime);
        osc.stop(startTime + duration);
    }

    function stopPlayback() {
        isPlaying = false;
        playText.textContent = S.play || 'Play';
        playIcon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>';
    }

    // Event listeners
    textInput.addEventListener('input', convert);

    directionRadios.forEach(r => r.addEventListener('change', function() {
        const dir = getDirection();
        if (dir === 'text-to-morse') {
            inputLabel.textContent = S.yourText || 'Your Text';
            outputLabel.textContent = S.morseCode || 'Morse Code';
            textInput.placeholder = S.inputPlaceholderText || 'Type or paste your text here...';
            textOutput.placeholder = S.outputPlaceholderMorse || 'Morse code will appear here...';
        } else {
            inputLabel.textContent = S.morseCode || 'Morse Code';
            outputLabel.textContent = S.decodedText || 'Decoded Text';
            textInput.placeholder = S.inputPlaceholderMorse || 'Enter Morse code (use . and -, separate letters with spaces, words with /)...';
            textOutput.placeholder = S.outputPlaceholderText || 'Decoded text will appear here...';
        }
        textInput.value = '';
        textOutput.value = '';
        statsBar.classList.add('hidden');
    }));

    speedSlider.addEventListener('input', function() {
        speedLabel.textContent = this.value + ' WPM';
    });

    btnCopy.addEventListener('click', function() {
        const output = textOutput.value;
        if (!output) return;
        navigator.clipboard.writeText(output).then(() => {
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

    btnPlay.addEventListener('click', function() {
        if (isPlaying) {
            stopPlayback();
        } else {
            playMorse();
        }
    });

    btnSample.addEventListener('click', function() {
        const dir = getDirection();
        if (dir === 'text-to-morse') {
            textInput.value = S.sampleText || 'Hello World! SOS';
        } else {
            textInput.value = S.sampleMorse || '.... . .-.. .-.. --- / .-- --- .-. .-.. -.. -.-.-- / ... --- ...';
        }
        convert();
    });

    btnClear.addEventListener('click', function() {
        textInput.value = '';
        textOutput.value = '';
        statsBar.classList.add('hidden');
        stopPlayback();
    });
})();
</script>
