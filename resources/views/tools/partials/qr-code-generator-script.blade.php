{{-- QR Code Generation Library (qrious) --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/qrious/4.0.2/qrious.min.js"></script>

<script>
(function() {
    // Get translatable strings from data attributes (for Italian/other locales)
    const stringsEl = document.getElementById('tool-strings');
    const S = {
        charCount: stringsEl?.dataset.charCount || 'Character count',
        fillDetails: stringsEl?.dataset.fillDetails || 'Fill in details to generate QR code',
        downloadedPng: stringsEl?.dataset.downloadedPng || 'QR code downloaded as PNG!',
        downloadedSvg: stringsEl?.dataset.downloadedSvg || 'QR code downloaded as SVG!',
        copiedClipboard: stringsEl?.dataset.copiedClipboard || 'QR code copied to clipboard!',
        copyFailed: stringsEl?.dataset.copyFailed || 'Failed to copy to clipboard',
    };

    // DOM Elements
    const typeButtons = document.querySelectorAll('.type-btn');
    const formSections = document.querySelectorAll('.form-section');
    const qrContainer = document.getElementById('qr-container');
    const qrCanvas = document.getElementById('qr-canvas');
    const qrPlaceholder = document.getElementById('qr-placeholder');
    const qrSize = document.getElementById('qr-size');
    const sizeValue = document.getElementById('size-value');
    const qrFgColor = document.getElementById('qr-fg-color');
    const qrBgColor = document.getElementById('qr-bg-color');
    const fgColorInput = document.getElementById('fg-color-input');
    const bgColorInput = document.getElementById('bg-color-input');
    const btnDownloadPng = document.getElementById('btn-download-png');
    const btnDownloadSvg = document.getElementById('btn-download-svg');
    const btnCopy = document.getElementById('btn-copy');
    const successNotification = document.getElementById('success-notification');
    const successMessage = document.getElementById('success-message');
    const errorNotification = document.getElementById('error-notification');
    const errorMessage = document.getElementById('error-message');

    // Input elements
    const inputText = document.getElementById('input-text');
    const textCount = document.getElementById('text-count');
    const wifiSsid = document.getElementById('wifi-ssid');
    const wifiPassword = document.getElementById('wifi-password');
    const wifiEncryption = document.getElementById('wifi-encryption');
    const wifiHidden = document.getElementById('wifi-hidden');
    const wifiTogglePassword = document.getElementById('wifi-toggle-password');
    const vcardFirstname = document.getElementById('vcard-firstname');
    const vcardLastname = document.getElementById('vcard-lastname');
    const vcardMobile = document.getElementById('vcard-mobile');
    const vcardEmail = document.getElementById('vcard-email');
    const vcardCompany = document.getElementById('vcard-company');
    const vcardTitle = document.getElementById('vcard-title');
    const vcardWebsite = document.getElementById('vcard-website');
    const emailTo = document.getElementById('email-to');
    const emailSubject = document.getElementById('email-subject');
    const emailBody = document.getElementById('email-body');
    const smsPhone = document.getElementById('sms-phone');
    const smsMessage = document.getElementById('sms-message');
    const phoneNumber = document.getElementById('phone-number');

    // State
    let currentType = 'text';
    let qr = null;
    let currentData = '';

    // Initialize QR instance
    function initQR() {
        qr = new QRious({
            element: qrCanvas,
            size: parseInt(qrSize.value),
            value: '',
            foreground: qrFgColor.value,
            background: qrBgColor.value,
            level: 'M'
        });
    }

    // Switch QR type
    function switchType(type) {
        currentType = type;

        // Update button styles
        typeButtons.forEach(btn => {
            if (btn.dataset.type === type) {
                btn.classList.remove('bg-gray-800', 'border-transparent');
                btn.classList.add('bg-gold/20', 'text-gold', 'border-gold/50');
            } else {
                btn.classList.remove('bg-gold/20', 'text-gold', 'border-gold/50');
                btn.classList.add('bg-gray-800', 'border-transparent');
            }
        });

        // Hide all forms
        formSections.forEach(section => section.classList.add('hidden'));

        // Show selected form
        document.getElementById(`form-${type}`).classList.remove('hidden');

        // Regenerate QR
        generateQR();
    }

    // Get data for current type
    function getDataForCurrentType() {
        switch(currentType) {
            case 'text':
                return inputText.value.trim();
            case 'wifi':
                return formatWiFi();
            case 'vcard':
                return formatVCard();
            case 'email':
                return formatEmail();
            case 'sms':
                return formatSMS();
            case 'phone':
                return formatPhone();
            default:
                return '';
        }
    }

    // Format WiFi QR data
    function formatWiFi() {
        const ssid = wifiSsid.value.trim();
        if (!ssid) return '';

        const password = wifiPassword.value;
        const encryption = wifiEncryption.value;
        const hidden = wifiHidden.checked;

        let wifi = `WIFI:T:${encryption};S:${ssid};`;
        if (password) wifi += `P:${password};`;
        if (hidden) wifi += 'H:true;';
        wifi += ';';
        return wifi;
    }

    // Format vCard QR data
    function formatVCard() {
        const firstName = vcardFirstname.value.trim();
        const lastName = vcardLastname.value.trim();

        if (!firstName && !lastName) return '';

        let vcard = 'BEGIN:VCARD\nVERSION:3.0\n';
        vcard += `N:${lastName};${firstName};;;\n`;
        vcard += `FN:${firstName} ${lastName}\n`.trim() + '\n';

        if (vcardMobile.value) vcard += `TEL;TYPE=CELL:${vcardMobile.value}\n`;
        if (vcardEmail.value) vcard += `EMAIL:${vcardEmail.value}\n`;
        if (vcardCompany.value) vcard += `ORG:${vcardCompany.value}\n`;
        if (vcardTitle.value) vcard += `TITLE:${vcardTitle.value}\n`;
        if (vcardWebsite.value) vcard += `URL:${vcardWebsite.value}\n`;

        vcard += 'END:VCARD';
        return vcard;
    }

    // Format Email QR data
    function formatEmail() {
        const to = emailTo.value.trim();
        if (!to) return '';

        let mailto = `mailto:${to}`;
        const params = [];

        if (emailSubject.value) params.push(`subject=${encodeURIComponent(emailSubject.value)}`);
        if (emailBody.value) params.push(`body=${encodeURIComponent(emailBody.value)}`);

        if (params.length) mailto += '?' + params.join('&');
        return mailto;
    }

    // Format SMS QR data
    function formatSMS() {
        const phone = smsPhone.value.trim();
        if (!phone) return '';

        let sms = `sms:${phone}`;
        if (smsMessage.value) sms += `?body=${encodeURIComponent(smsMessage.value)}`;
        return sms;
    }

    // Format Phone QR data
    function formatPhone() {
        const phone = phoneNumber.value.trim();
        return phone ? `tel:${phone}` : '';
    }

    // Debounce function
    function debounce(func, wait) {
        let timeout;
        return function executedFunction(...args) {
            const later = () => {
                clearTimeout(timeout);
                func(...args);
            };
            clearTimeout(timeout);
            timeout = setTimeout(later, wait);
        };
    }

    // Generate QR code
    const generateQR = debounce(function() {
        const data = getDataForCurrentType();

        if (!data) {
            qrContainer.classList.add('hidden');
            qrPlaceholder.classList.remove('hidden');
            btnDownloadPng.disabled = true;
            btnDownloadSvg.disabled = true;
            btnCopy.disabled = true;
            currentData = '';
            return;
        }

        currentData = data;
        qr.set({
            size: parseInt(qrSize.value),
            value: data,
            foreground: qrFgColor.value,
            background: qrBgColor.value
        });

        qrContainer.classList.remove('hidden');
        qrPlaceholder.classList.add('hidden');
        btnDownloadPng.disabled = false;
        btnDownloadSvg.disabled = false;
        btnCopy.disabled = false;
    }, 300);

    // Download PNG
    function downloadPNG() {
        if (!currentData) return;

        const canvas = qrCanvas;
        canvas.toBlob(blob => {
            const url = URL.createObjectURL(blob);
            const a = document.createElement('a');
            a.href = url;
            a.download = `qrcode-${currentType}.png`;
            document.body.appendChild(a);
            a.click();
            document.body.removeChild(a);
            URL.revokeObjectURL(url);
            showSuccess(S.downloadedPng);
        });
    }

    // Download SVG
    function downloadSVG() {
        if (!currentData) return;

        const size = parseInt(qrSize.value);
        const fg = qrFgColor.value;
        const bg = qrBgColor.value;

        // Create temporary QR with SVG output
        const tempQr = new QRious({
            size: size,
            value: currentData,
            foreground: fg,
            background: bg,
            level: 'M'
        });

        // Convert canvas to SVG
        const canvas = tempQr.canvas;
        const ctx = canvas.getContext('2d');
        const imageData = ctx.getImageData(0, 0, size, size);

        let svg = `<svg xmlns="http://www.w3.org/2000/svg" width="${size}" height="${size}" viewBox="0 0 ${size} ${size}">`;
        svg += `<rect width="${size}" height="${size}" fill="${bg}"/>`;

        // Draw pixels as rectangles
        const data = imageData.data;
        for (let y = 0; y < size; y++) {
            for (let x = 0; x < size; x++) {
                const i = (y * size + x) * 4;
                const r = data[i];
                const g = data[i + 1];
                const b = data[i + 2];

                // If pixel is not background color, draw it
                if (r === 0 && g === 0 && b === 0) {
                    svg += `<rect x="${x}" y="${y}" width="1" height="1" fill="${fg}"/>`;
                }
            }
        }

        svg += '</svg>';

        const blob = new Blob([svg], { type: 'image/svg+xml' });
        const url = URL.createObjectURL(blob);
        const a = document.createElement('a');
        a.href = url;
        a.download = `qrcode-${currentType}.svg`;
        document.body.appendChild(a);
        a.click();
        document.body.removeChild(a);
        URL.revokeObjectURL(url);
        showSuccess(S.downloadedSvg);
    }

    // Copy to clipboard
    async function copyToClipboard() {
        if (!currentData) return;

        try {
            const canvas = qrCanvas;
            canvas.toBlob(async blob => {
                await navigator.clipboard.write([
                    new ClipboardItem({ 'image/png': blob })
                ]);
                showSuccess(S.copiedClipboard);
            });
        } catch (err) {
            showError(S.copyFailed);
        }
    }

    // Show success notification
    function showSuccess(message) {
        successMessage.textContent = message;
        successNotification.classList.remove('hidden');
        errorNotification.classList.add('hidden');
        setTimeout(() => successNotification.classList.add('hidden'), 3000);
    }

    // Show error notification
    function showError(message) {
        errorMessage.textContent = message;
        errorNotification.classList.remove('hidden');
        successNotification.classList.add('hidden');
        setTimeout(() => errorNotification.classList.add('hidden'), 5000);
    }

    // Validate hex color format
    function isValidHex(hex) {
        return /^#[0-9A-Fa-f]{6}$/.test(hex);
    }

    // Update color picker from hex input
    function updateColorFromHex(hexInput, colorPicker) {
        const hex = hexInput.value.trim().toUpperCase();

        // Auto-add # if missing
        const formattedHex = hex.startsWith('#') ? hex : '#' + hex;

        if (isValidHex(formattedHex)) {
            hexInput.value = formattedHex;
            colorPicker.value = formattedHex;
            generateQR();
        }
    }

    // Event Listeners
    typeButtons.forEach(btn => {
        btn.addEventListener('click', () => switchType(btn.dataset.type));
    });

    // Text input listeners
    inputText.addEventListener('input', () => {
        textCount.textContent = inputText.value.length;
        generateQR();
    });

    // WiFi input listeners
    [wifiSsid, wifiPassword, wifiEncryption, wifiHidden].forEach(el => {
        el.addEventListener('input', generateQR);
        if (el.tagName === 'SELECT' || el.type === 'checkbox') {
            el.addEventListener('change', generateQR);
        }
    });

    // WiFi password toggle
    wifiTogglePassword.addEventListener('click', function() {
        const type = wifiPassword.type === 'password' ? 'text' : 'password';
        wifiPassword.type = type;
        this.querySelector('.show-icon').classList.toggle('hidden', type === 'text');
        this.querySelector('.hide-icon').classList.toggle('hidden', type === 'password');
    });

    // vCard input listeners
    [vcardFirstname, vcardLastname, vcardMobile, vcardEmail, vcardCompany, vcardTitle, vcardWebsite].forEach(el => {
        el.addEventListener('input', generateQR);
    });

    // Email input listeners
    [emailTo, emailSubject, emailBody].forEach(el => {
        el.addEventListener('input', generateQR);
    });

    // SMS input listeners
    [smsPhone, smsMessage].forEach(el => {
        el.addEventListener('input', generateQR);
    });

    // Phone input listener
    phoneNumber.addEventListener('input', generateQR);

    // Customization listeners
    qrSize.addEventListener('change', () => {
        sizeValue.textContent = qrSize.value + 'px';
        generateQR();
    });

    // Foreground color picker → update hex input
    qrFgColor.addEventListener('input', () => {
        fgColorInput.value = qrFgColor.value.toUpperCase();
        generateQR();
    });

    // Foreground hex input → update color picker
    fgColorInput.addEventListener('input', () => {
        updateColorFromHex(fgColorInput, qrFgColor);
    });

    // Background color picker → update hex input
    qrBgColor.addEventListener('input', () => {
        bgColorInput.value = qrBgColor.value.toUpperCase();
        generateQR();
    });

    // Background hex input → update color picker
    bgColorInput.addEventListener('input', () => {
        updateColorFromHex(bgColorInput, qrBgColor);
    });

    // Download and copy buttons
    btnDownloadPng.addEventListener('click', downloadPNG);
    btnDownloadSvg.addEventListener('click', downloadSVG);
    btnCopy.addEventListener('click', copyToClipboard);

    // Initialize
    initQR();
})();
</script>
