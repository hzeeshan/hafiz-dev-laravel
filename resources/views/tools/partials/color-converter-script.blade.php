<script>
(function() {
    // Translatable strings (from #tool-strings data attributes or English defaults)
    const stringsEl = document.getElementById('tool-strings');
    const ds = stringsEl ? stringsEl.dataset : {};
    const S = {
        noHistory: ds.noHistory || 'No colors yet. Start picking colors!',
        copied: ds.copied || 'Copied',
        copyFail: ds.copyFail || 'Failed to copy',
        pass: ds.pass || 'Pass',
        fail: ds.fail || 'Fail',
        sampleText: ds.sampleText || 'Sample Text',
        oppositeOnWheel: ds.oppositeOnWheel || 'Opposite on the color wheel',
    };

    // DOM Elements
    const colorPicker = document.getElementById('color-picker');
    const colorPreview = document.getElementById('color-preview');
    const btnRandom = document.getElementById('btn-random');
    const inputHex = document.getElementById('input-hex');
    const inputR = document.getElementById('input-r');
    const inputG = document.getElementById('input-g');
    const inputB = document.getElementById('input-b');
    const inputRa = document.getElementById('input-ra');
    const inputGa = document.getElementById('input-ga');
    const inputBa = document.getElementById('input-ba');
    const inputAlpha = document.getElementById('input-alpha');
    const inputH = document.getElementById('input-h');
    const inputS = document.getElementById('input-s');
    const inputL = document.getElementById('input-l');
    const inputHa = document.getElementById('input-ha');
    const inputSa = document.getElementById('input-sa');
    const inputLa = document.getElementById('input-la');
    const inputAlphaHsl = document.getElementById('input-alpha-hsl');
    const complementaryPreview = document.getElementById('complementary-preview');
    const complementaryHex = document.getElementById('complementary-hex');
    const contrastWhiteRatio = document.getElementById('contrast-white-ratio');
    const contrastBlackRatio = document.getElementById('contrast-black-ratio');
    const contrastWhitePreview = document.getElementById('contrast-white-preview');
    const contrastBlackPreview = document.getElementById('contrast-black-preview');
    const wcagWhiteAa = document.getElementById('wcag-white-aa');
    const wcagWhiteAaa = document.getElementById('wcag-white-aaa');
    const wcagBlackAa = document.getElementById('wcag-black-aa');
    const wcagBlackAaa = document.getElementById('wcag-black-aaa');
    const colorHistory = document.getElementById('color-history');
    const btnClearHistory = document.getElementById('btn-clear-history');
    const copyNotification = document.getElementById('copy-notification');
    const copyMessage = document.getElementById('copy-message');

    // State
    let currentColor = { r: 212, g: 175, b: 55 };
    let currentAlpha = 1;
    let isUpdating = false;

    // ===== Color Conversion Functions =====

    // HEX to RGB
    function hexToRgb(hex) {
        hex = hex.replace(/^#/, '');

        // Handle shorthand hex (e.g., #F00 -> #FF0000)
        if (hex.length === 3) {
            hex = hex.split('').map(c => c + c).join('');
        }

        const result = /^([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec(hex);
        return result ? {
            r: parseInt(result[1], 16),
            g: parseInt(result[2], 16),
            b: parseInt(result[3], 16)
        } : null;
    }

    // RGB to HEX
    function rgbToHex(r, g, b) {
        return [r, g, b].map(x => {
            const hex = Math.max(0, Math.min(255, Math.round(x))).toString(16);
            return hex.length === 1 ? '0' + hex : hex;
        }).join('').toUpperCase();
    }

    // RGB to HSL
    function rgbToHsl(r, g, b) {
        r /= 255; g /= 255; b /= 255;
        const max = Math.max(r, g, b), min = Math.min(r, g, b);
        let h, s, l = (max + min) / 2;

        if (max === min) {
            h = s = 0;
        } else {
            const d = max - min;
            s = l > 0.5 ? d / (2 - max - min) : d / (max + min);
            switch (max) {
                case r: h = ((g - b) / d + (g < b ? 6 : 0)) / 6; break;
                case g: h = ((b - r) / d + 2) / 6; break;
                case b: h = ((r - g) / d + 4) / 6; break;
            }
        }
        return {
            h: Math.round(h * 360),
            s: Math.round(s * 100),
            l: Math.round(l * 100)
        };
    }

    // HSL to RGB
    function hslToRgb(h, s, l) {
        s /= 100; l /= 100;
        const k = n => (n + h / 30) % 12;
        const a = s * Math.min(l, 1 - l);
        const f = n => l - a * Math.max(-1, Math.min(k(n) - 3, Math.min(9 - k(n), 1)));
        return {
            r: Math.round(255 * f(0)),
            g: Math.round(255 * f(8)),
            b: Math.round(255 * f(4))
        };
    }

    // Get complementary color (hue + 180°)
    function getComplementary(r, g, b) {
        const hsl = rgbToHsl(r, g, b);
        const complementaryHue = (hsl.h + 180) % 360;
        return hslToRgb(complementaryHue, hsl.s, hsl.l);
    }

    // Calculate relative luminance
    function getLuminance(r, g, b) {
        const [rs, gs, bs] = [r, g, b].map(v => {
            v /= 255;
            return v <= 0.03928 ? v / 12.92 : Math.pow((v + 0.055) / 1.055, 2.4);
        });
        return 0.2126 * rs + 0.7152 * gs + 0.0722 * bs;
    }

    // Calculate contrast ratio
    function getContrastRatio(rgb1, rgb2) {
        const l1 = getLuminance(rgb1.r, rgb1.g, rgb1.b);
        const l2 = getLuminance(rgb2.r, rgb2.g, rgb2.b);
        const lighter = Math.max(l1, l2);
        const darker = Math.min(l1, l2);
        return (lighter + 0.05) / (darker + 0.05);
    }

    // ===== UI Update Functions =====

    function updateAllFromRgb(r, g, b, source = null) {
        if (isUpdating) return;
        isUpdating = true;

        currentColor = { r, g, b };
        const hex = rgbToHex(r, g, b);
        const hsl = rgbToHsl(r, g, b);

        // Update color picker
        colorPicker.value = '#' + hex;

        // Update preview
        colorPreview.style.backgroundColor = `rgb(${r}, ${g}, ${b})`;

        // Update HEX input
        if (source !== 'hex') inputHex.value = hex;

        // Update RGB inputs
        if (source !== 'rgb') {
            inputR.value = r;
            inputG.value = g;
            inputB.value = b;
        }

        // Update RGBA inputs
        if (source !== 'rgba') {
            inputRa.value = r;
            inputGa.value = g;
            inputBa.value = b;
        }

        // Update HSL inputs
        if (source !== 'hsl') {
            inputH.value = hsl.h;
            inputS.value = hsl.s;
            inputL.value = hsl.l;
        }

        // Update HSLA inputs
        if (source !== 'hsla') {
            inputHa.value = hsl.h;
            inputSa.value = hsl.s;
            inputLa.value = hsl.l;
        }

        // Update complementary color
        const comp = getComplementary(r, g, b);
        const compHex = '#' + rgbToHex(comp.r, comp.g, comp.b);
        complementaryPreview.style.backgroundColor = compHex;
        complementaryHex.textContent = compHex;

        // Update contrast previews
        contrastWhitePreview.style.backgroundColor = `rgb(${r}, ${g}, ${b})`;
        contrastBlackPreview.style.backgroundColor = `rgb(${r}, ${g}, ${b})`;

        // Calculate contrast ratios
        const whiteContrast = getContrastRatio(currentColor, { r: 255, g: 255, b: 255 });
        const blackContrast = getContrastRatio(currentColor, { r: 0, g: 0, b: 0 });

        contrastWhiteRatio.textContent = whiteContrast.toFixed(2) + ':1';
        contrastBlackRatio.textContent = blackContrast.toFixed(2) + ':1';

        // Update WCAG badges
        updateWcagBadge(wcagWhiteAa, whiteContrast >= 4.5, 'AA');
        updateWcagBadge(wcagWhiteAaa, whiteContrast >= 7, 'AAA');
        updateWcagBadge(wcagBlackAa, blackContrast >= 4.5, 'AA');
        updateWcagBadge(wcagBlackAaa, blackContrast >= 7, 'AAA');

        isUpdating = false;
    }

    function updateWcagBadge(element, passes, level) {
        if (passes) {
            element.textContent = level + ': ' + S.pass;
            element.className = 'px-2 py-1 text-xs rounded font-semibold bg-green-500/20 text-green-400 border border-green-500/30';
        } else {
            element.textContent = level + ': ' + S.fail;
            element.className = 'px-2 py-1 text-xs rounded font-semibold bg-red-500/20 text-red-400 border border-red-500/30';
        }
    }

    // ===== Color History Functions =====

    function getHistory() {
        try {
            return JSON.parse(localStorage.getItem('colorHistory') || '[]');
        } catch {
            return [];
        }
    }

    function saveToHistory(hex) {
        let history = getHistory();
        hex = '#' + hex.replace(/^#/, '').toUpperCase();
        history = history.filter(c => c !== hex);
        history.unshift(hex);
        history = history.slice(0, 10);
        localStorage.setItem('colorHistory', JSON.stringify(history));
        renderHistory();
    }

    function renderHistory() {
        const history = getHistory();

        if (history.length === 0) {
            colorHistory.innerHTML = '<span class="text-light-muted text-sm">' + S.noHistory + '</span>';
            return;
        }

        colorHistory.innerHTML = history.map(hex => `
            <button class="history-color w-10 h-10 rounded-lg border-2 border-transparent hover:border-gold transition-all cursor-pointer hover:scale-110"
                    style="background-color: ${hex};"
                    data-color="${hex}"
                    title="${hex}"></button>
        `).join('');

        // Add click handlers
        document.querySelectorAll('.history-color').forEach(btn => {
            btn.addEventListener('click', function() {
                const hex = this.getAttribute('data-color').replace('#', '');
                const rgb = hexToRgb(hex);
                if (rgb) {
                    updateAllFromRgb(rgb.r, rgb.g, rgb.b, 'history');
                }
            });
        });
    }

    function clearHistory() {
        localStorage.removeItem('colorHistory');
        renderHistory();
    }

    // ===== Clipboard Functions =====

    function copyToClipboard(text, message) {
        navigator.clipboard.writeText(text).then(() => {
            showNotification(message);
        }).catch(() => {
            showNotification(S.copyFail);
        });
    }

    function showNotification(message) {
        copyMessage.textContent = message;
        copyNotification.classList.remove('hidden');
        setTimeout(() => {
            copyNotification.classList.add('hidden');
        }, 2000);
    }

    function getColorString(format) {
        const { r, g, b } = currentColor;
        const hsl = rgbToHsl(r, g, b);

        switch (format) {
            case 'hex':
                return '#' + rgbToHex(r, g, b);
            case 'rgb':
                return `rgb(${r}, ${g}, ${b})`;
            case 'rgba':
                return `rgba(${r}, ${g}, ${b}, ${currentAlpha})`;
            case 'hsl':
                return `hsl(${hsl.h}, ${hsl.s}%, ${hsl.l}%)`;
            case 'hsla':
                return `hsla(${hsl.h}, ${hsl.s}%, ${hsl.l}%, ${currentAlpha})`;
            default:
                return '';
        }
    }

    // ===== Random Color =====

    function generateRandomColor() {
        const r = Math.floor(Math.random() * 256);
        const g = Math.floor(Math.random() * 256);
        const b = Math.floor(Math.random() * 256);
        updateAllFromRgb(r, g, b, 'random');
        saveToHistory(rgbToHex(r, g, b));
    }

    // ===== Event Listeners =====

    // Color picker change
    colorPicker.addEventListener('input', function() {
        const rgb = hexToRgb(this.value);
        if (rgb) {
            updateAllFromRgb(rgb.r, rgb.g, rgb.b, 'picker');
        }
    });

    colorPicker.addEventListener('change', function() {
        saveToHistory(this.value);
    });

    // Random button
    btnRandom.addEventListener('click', generateRandomColor);

    // HEX input
    inputHex.addEventListener('input', function() {
        let hex = this.value.replace(/[^a-fA-F0-9]/g, '');
        if (hex.length >= 3) {
            const rgb = hexToRgb(hex);
            if (rgb) {
                updateAllFromRgb(rgb.r, rgb.g, rgb.b, 'hex');
            }
        }
    });

    inputHex.addEventListener('change', function() {
        saveToHistory(this.value);
    });

    // RGB inputs
    [inputR, inputG, inputB].forEach(input => {
        input.addEventListener('input', function() {
            const r = parseInt(inputR.value) || 0;
            const g = parseInt(inputG.value) || 0;
            const b = parseInt(inputB.value) || 0;
            updateAllFromRgb(
                Math.max(0, Math.min(255, r)),
                Math.max(0, Math.min(255, g)),
                Math.max(0, Math.min(255, b)),
                'rgb'
            );
        });

        input.addEventListener('change', function() {
            saveToHistory(rgbToHex(currentColor.r, currentColor.g, currentColor.b));
        });
    });

    // RGBA inputs
    [inputRa, inputGa, inputBa].forEach(input => {
        input.addEventListener('input', function() {
            const r = parseInt(inputRa.value) || 0;
            const g = parseInt(inputGa.value) || 0;
            const b = parseInt(inputBa.value) || 0;
            updateAllFromRgb(
                Math.max(0, Math.min(255, r)),
                Math.max(0, Math.min(255, g)),
                Math.max(0, Math.min(255, b)),
                'rgba'
            );
        });

        input.addEventListener('change', function() {
            saveToHistory(rgbToHex(currentColor.r, currentColor.g, currentColor.b));
        });
    });

    inputAlpha.addEventListener('input', function() {
        currentAlpha = Math.max(0, Math.min(1, parseFloat(this.value) || 1));
        inputAlphaHsl.value = currentAlpha;
    });

    // HSL inputs
    [inputH, inputS, inputL].forEach(input => {
        input.addEventListener('input', function() {
            const h = parseInt(inputH.value) || 0;
            const s = parseInt(inputS.value) || 0;
            const l = parseInt(inputL.value) || 0;
            const rgb = hslToRgb(
                Math.max(0, Math.min(360, h)),
                Math.max(0, Math.min(100, s)),
                Math.max(0, Math.min(100, l))
            );
            updateAllFromRgb(rgb.r, rgb.g, rgb.b, 'hsl');
        });

        input.addEventListener('change', function() {
            saveToHistory(rgbToHex(currentColor.r, currentColor.g, currentColor.b));
        });
    });

    // HSLA inputs
    [inputHa, inputSa, inputLa].forEach(input => {
        input.addEventListener('input', function() {
            const h = parseInt(inputHa.value) || 0;
            const s = parseInt(inputSa.value) || 0;
            const l = parseInt(inputLa.value) || 0;
            const rgb = hslToRgb(
                Math.max(0, Math.min(360, h)),
                Math.max(0, Math.min(100, s)),
                Math.max(0, Math.min(100, l))
            );
            updateAllFromRgb(rgb.r, rgb.g, rgb.b, 'hsla');
        });

        input.addEventListener('change', function() {
            saveToHistory(rgbToHex(currentColor.r, currentColor.g, currentColor.b));
        });
    });

    inputAlphaHsl.addEventListener('input', function() {
        currentAlpha = Math.max(0, Math.min(1, parseFloat(this.value) || 1));
        inputAlpha.value = currentAlpha;
    });

    // Complementary color click
    complementaryPreview.addEventListener('click', function() {
        const comp = getComplementary(currentColor.r, currentColor.g, currentColor.b);
        updateAllFromRgb(comp.r, comp.g, comp.b, 'complementary');
        saveToHistory(rgbToHex(comp.r, comp.g, comp.b));
    });

    // Copy buttons
    document.querySelectorAll('.copy-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            const format = this.getAttribute('data-target');
            const colorString = getColorString(format);
            copyToClipboard(colorString, S.copied + ': ' + colorString);
        });
    });

    // Clear history
    btnClearHistory.addEventListener('click', clearHistory);

    // Initialize
    renderHistory();
    updateAllFromRgb(212, 175, 55);
})();
</script>
