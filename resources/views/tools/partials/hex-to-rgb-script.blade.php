<script>
(function() {
    const stringsEl = document.getElementById('tool-strings');
    const S = {
        copied: stringsEl?.dataset.copied || 'Copied!',
        copy: stringsEl?.dataset.copy || 'Copy',
        invalid_hex: stringsEl?.dataset.invalidHex || 'Invalid hex color code',
    };

    // DOM Elements
    const hexInput = document.getElementById('hex-input');
    const colorPicker = document.getElementById('color-picker');
    const colorPreview = document.getElementById('color-preview');
    const sliderR = document.getElementById('slider-r');
    const sliderG = document.getElementById('slider-g');
    const sliderB = document.getElementById('slider-b');
    const sliderA = document.getElementById('slider-a');
    const valR = document.getElementById('val-r');
    const valG = document.getElementById('val-g');
    const valB = document.getElementById('val-b');
    const valA = document.getElementById('val-a');
    const outRgb = document.getElementById('out-rgb');
    const outRgba = document.getElementById('out-rgba');
    const outHex = document.getElementById('out-hex');
    const outHsl = document.getElementById('out-hsl');
    const outHsla = document.getElementById('out-hsla');
    const outCmyk = document.getElementById('out-cmyk');
    const outCss = document.getElementById('out-css');
    const successNotification = document.getElementById('success-notification');
    const successMessage = document.getElementById('success-message');
    const errorNotification = document.getElementById('error-notification');
    const errorMessage = document.getElementById('error-message');

    // State
    let r = 255, g = 87, b = 51, a = 1;

    // ===== Conversion Functions =====

    function rgbToHex(r, g, b) {
        return ((1 << 24) + (r << 16) + (g << 8) + b).toString(16).slice(1).toUpperCase();
    }

    function hexToRgb(hex) {
        hex = hex.replace(/^#/, '');

        // Handle shorthand (3 chars)
        if (hex.length === 3) {
            hex = hex[0] + hex[0] + hex[1] + hex[1] + hex[2] + hex[2];
        }

        // Handle 8-digit hex (with alpha)
        if (hex.length === 8) {
            const alpha = parseInt(hex.slice(6, 8), 16) / 255;
            return {
                r: parseInt(hex.slice(0, 2), 16),
                g: parseInt(hex.slice(2, 4), 16),
                b: parseInt(hex.slice(4, 6), 16),
                a: Math.round(alpha * 100) / 100
            };
        }

        if (hex.length !== 6) return null;

        const num = parseInt(hex, 16);
        if (isNaN(num)) return null;

        return {
            r: (num >> 16) & 255,
            g: (num >> 8) & 255,
            b: num & 255,
            a: 1
        };
    }

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

    function rgbToCmyk(r, g, b) {
        if (r === 0 && g === 0 && b === 0) {
            return { c: 0, m: 0, y: 0, k: 100 };
        }

        const rr = r / 255, gg = g / 255, bb = b / 255;
        const k = 1 - Math.max(rr, gg, bb);
        const c = (1 - rr - k) / (1 - k);
        const m = (1 - gg - k) / (1 - k);
        const y = (1 - bb - k) / (1 - k);

        return {
            c: Math.round(c * 100),
            m: Math.round(m * 100),
            y: Math.round(y * 100),
            k: Math.round(k * 100)
        };
    }

    // ===== Update Display =====

    function updateAll(source) {
        // Clamp values
        r = Math.min(255, Math.max(0, Math.round(r)));
        g = Math.min(255, Math.max(0, Math.round(g)));
        b = Math.min(255, Math.max(0, Math.round(b)));
        a = Math.min(1, Math.max(0, a));

        const hex = rgbToHex(r, g, b);
        const hsl = rgbToHsl(r, g, b);
        const cmyk = rgbToCmyk(r, g, b);

        // Update preview
        colorPreview.style.backgroundColor = `rgba(${r}, ${g}, ${b}, ${a})`;

        // Update hex input (only if not the source)
        if (source !== 'hex') {
            hexInput.value = a < 1 ? hex + Math.round(a * 255).toString(16).padStart(2, '0').toUpperCase() : hex;
        }

        // Update color picker
        if (source !== 'picker') {
            colorPicker.value = '#' + hex;
        }

        // Update sliders
        if (source !== 'slider') {
            sliderR.value = r;
            sliderG.value = g;
            sliderB.value = b;
            sliderA.value = Math.round(a * 100);
        }

        // Update number inputs
        if (source !== 'number') {
            valR.value = r;
            valG.value = g;
            valB.value = b;
            valA.value = a;
        }

        // Update outputs
        outRgb.textContent = `rgb(${r}, ${g}, ${b})`;
        outRgba.textContent = `rgba(${r}, ${g}, ${b}, ${a})`;
        outHex.textContent = a < 1 ? `#${hex}${Math.round(a * 255).toString(16).padStart(2, '0').toUpperCase()}` : `#${hex}`;
        outHsl.textContent = `hsl(${hsl.h}, ${hsl.s}%, ${hsl.l}%)`;
        outHsla.textContent = `hsla(${hsl.h}, ${hsl.s}%, ${hsl.l}%, ${a})`;
        outCmyk.textContent = `cmyk(${cmyk.c}%, ${cmyk.m}%, ${cmyk.y}%, ${cmyk.k}%)`;
        outCss.textContent = `--color-primary: #${hex};`;

        // Hide errors
        errorNotification.classList.add('hidden');
    }

    // ===== Event Handlers =====

    // Hex input
    hexInput.addEventListener('input', function() {
        const val = this.value.replace(/[^0-9a-fA-F]/g, '');
        this.value = val;

        if (val.length === 3 || val.length === 6 || val.length === 8) {
            const result = hexToRgb(val);
            if (result) {
                r = result.r;
                g = result.g;
                b = result.b;
                a = result.a;
                updateAll('hex');
            }
        }
    });

    // Color picker
    colorPicker.addEventListener('input', function() {
        const result = hexToRgb(this.value);
        if (result) {
            r = result.r;
            g = result.g;
            b = result.b;
            updateAll('picker');
        }
    });

    // Sliders
    sliderR.addEventListener('input', function() { r = parseInt(this.value); valR.value = r; updateAll('slider'); });
    sliderG.addEventListener('input', function() { g = parseInt(this.value); valG.value = g; updateAll('slider'); });
    sliderB.addEventListener('input', function() { b = parseInt(this.value); valB.value = b; updateAll('slider'); });
    sliderA.addEventListener('input', function() { a = parseInt(this.value) / 100; valA.value = a; updateAll('slider'); });

    // Number inputs
    valR.addEventListener('change', function() { r = parseInt(this.value) || 0; updateAll('number'); });
    valG.addEventListener('change', function() { g = parseInt(this.value) || 0; updateAll('number'); });
    valB.addEventListener('change', function() { b = parseInt(this.value) || 0; updateAll('number'); });
    valA.addEventListener('change', function() { a = parseFloat(this.value) || 0; updateAll('number'); });

    // Preset buttons
    document.querySelectorAll('.preset-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            const result = hexToRgb(this.dataset.hex);
            if (result) {
                r = result.r;
                g = result.g;
                b = result.b;
                a = 1;
                updateAll('preset');
            }
        });
    });

    // Copy buttons
    document.querySelectorAll('.copy-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            const target = document.getElementById(this.dataset.target);
            if (target) {
                navigator.clipboard.writeText(target.textContent).then(() => {
                    const original = this.innerHTML;
                    this.innerHTML = '<svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> ' + S.copied;
                    this.classList.add('text-green-400');
                    setTimeout(() => {
                        this.innerHTML = original;
                        this.classList.remove('text-green-400');
                    }, 1500);
                });
            }
        });
    });

    // Initialize
    updateAll('init');
})();
</script>
