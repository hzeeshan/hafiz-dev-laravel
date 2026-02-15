@push('scripts')
<script>
(function() {
    const stringsEl = document.getElementById('tool-strings');
    const S = {
        empty_error: stringsEl?.dataset.emptyError || 'Please paste a Base64 string',
        invalid_error: stringsEl?.dataset.invalidError || 'Invalid Base64 string. Please check your input.',
        decode_error: stringsEl?.dataset.decodeError || 'Could not decode image. The Base64 data may be corrupted or not a valid image.',
        decoded_prefix: stringsEl?.dataset.decodedPrefix || 'Image decoded — ',
        downloaded_prefix: stringsEl?.dataset.downloadedPrefix || 'Image downloaded as ',
        character: stringsEl?.dataset.character || 'character',
        characters: stringsEl?.dataset.characters || 'characters',
    };

    const b64Input = document.getElementById('b64-input');
    const imgFormat = document.getElementById('img-format');
    const inputLength = document.getElementById('input-length');
    const previewArea = document.getElementById('preview-area');
    const previewImg = document.getElementById('preview-img');
    const btnConvert = document.getElementById('btn-convert');
    const btnDownload = document.getElementById('btn-download');
    const btnSample = document.getElementById('btn-sample');
    const btnClear = document.getElementById('btn-clear');
    const statsBar = document.getElementById('stats-bar');
    const successNotification = document.getElementById('success-notification');
    const successMessage = document.getElementById('success-message');
    const errorNotification = document.getElementById('error-notification');
    const errorMessage = document.getElementById('error-message');

    let currentDataUri = '';
    let currentFormat = 'png';

    // Sample PNG: a 120x80 colorful 6-block grid (blue, green, purple, red, orange, cyan)
    const sampleBase64 = 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAHgAAABQCAIAAABd+SbeAAAA8klEQVR4nO3SoQ0CARREQY4y8JxFUAk1UAQORSlISkKcpwYSunhfMNPAJi+7HK+f3YTtfB/ZvT0fI7v7kdU/JHRE6IjQEaEjQkeEjggdEToidEToiNARoSNCR4SOCB0ROiJ0ROiI0BGhI0JHhI4IHRE6InRE6IjQEaEjQkeEjggdEToidEToiNARoSNCR4SOLO91HRn+XraR3dPhNbLr0RGhI0JHhI4IHRE6InRE6IjQEaEjQkeEjggdEToidEToiNARoSNCR4SOCB0ROiJ0ROiI0BGhI0JHhI4IHRE6InRE6IjQEaEjQkeEjggdEToidOQHpLUJjWwJkd4AAAAASUVORK5CYII=';

    function formatBytes(bytes) {
        if (bytes === 0) return '0 B';
        const k = 1024;
        const sizes = ['B', 'KB', 'MB'];
        const i = Math.floor(Math.log(bytes) / Math.log(k));
        return parseFloat((bytes / Math.pow(k, i)).toFixed(1)) + ' ' + sizes[i];
    }

    function getExtension(mime) {
        const map = {
            'image/png': 'png', 'image/jpeg': 'jpg', 'image/gif': 'gif',
            'image/webp': 'webp', 'image/svg+xml': 'svg', 'image/bmp': 'bmp', 'image/x-icon': 'ico'
        };
        return map[mime] || 'png';
    }

    function convert() {
        let input = b64Input.value.trim();
        if (!input) { showError(S.empty_error); return; }

        let dataUri;
        if (input.startsWith('data:image/')) {
            dataUri = input;
            // Extract format
            const match = input.match(/^data:(image\/[a-z+]+);base64,/);
            if (match) currentFormat = getExtension(match[1]);
        } else {
            // Raw base64 — add prefix
            let mime = imgFormat.value;
            if (mime === 'auto') mime = 'image/png';
            currentFormat = getExtension(mime);
            // Strip any whitespace/newlines
            input = input.replace(/\s/g, '');
            dataUri = 'data:' + mime + ';base64,' + input;
        }

        // Validate
        try {
            const b64Part = dataUri.split(',')[1];
            atob(b64Part); // throws if invalid
        } catch(e) {
            showError(S.invalid_error);
            return;
        }

        currentDataUri = dataUri;

        // Show preview
        previewImg.src = dataUri;
        previewImg.onload = function() {
            previewArea.classList.remove('hidden');
            btnDownload.disabled = false;

            // Stats
            document.getElementById('stat-format').textContent = currentFormat.toUpperCase();
            document.getElementById('stat-dimensions').textContent = this.naturalWidth + ' × ' + this.naturalHeight + ' px';
            document.getElementById('stat-b64size').textContent = formatBytes(b64Input.value.length);
            // Estimate file size: base64 is ~33% larger than binary
            const b64Part = dataUri.split(',')[1] || '';
            const estFileSize = Math.round(b64Part.length * 0.75);
            document.getElementById('stat-filesize').textContent = formatBytes(estFileSize);
            statsBar.classList.remove('hidden');

            showSuccess(S.decoded_prefix + this.naturalWidth + '×' + this.naturalHeight + ' ' + currentFormat.toUpperCase());
        };
        previewImg.onerror = function() {
            showError(S.decode_error);
            previewArea.classList.add('hidden');
        };
    }

    function showSuccess(msg) {
        successMessage.textContent = msg;
        successNotification.classList.remove('hidden');
        errorNotification.classList.add('hidden');
        setTimeout(() => successNotification.classList.add('hidden'), 4000);
    }

    function showError(msg) {
        errorMessage.textContent = msg;
        errorNotification.classList.remove('hidden');
        successNotification.classList.add('hidden');
        setTimeout(() => errorNotification.classList.add('hidden'), 5000);
    }

    // Character count
    b64Input.addEventListener('input', function() {
        const len = this.value.length;
        inputLength.textContent = len.toLocaleString() + ' ' + (len !== 1 ? S.characters : S.character);
    });

    btnConvert.addEventListener('click', convert);

    btnDownload.addEventListener('click', function() {
        if (!currentDataUri) return;
        const a = document.createElement('a');
        a.href = currentDataUri;
        a.download = 'image.' + currentFormat;
        document.body.appendChild(a); a.click();
        document.body.removeChild(a);
        showSuccess(S.downloaded_prefix + 'image.' + currentFormat);
    });

    btnSample.addEventListener('click', function() {
        b64Input.value = sampleBase64;
        inputLength.textContent = sampleBase64.length.toLocaleString() + ' ' + S.characters;
        convert();
    });

    btnClear.addEventListener('click', function() {
        b64Input.value = '';
        previewArea.classList.add('hidden');
        statsBar.classList.add('hidden');
        btnDownload.disabled = true;
        currentDataUri = '';
        inputLength.textContent = '0 ' + S.characters;
        successNotification.classList.add('hidden');
        errorNotification.classList.add('hidden');
    });

    document.addEventListener('keydown', function(e) {
        if ((e.ctrlKey || e.metaKey) && e.key === 'Enter') { e.preventDefault(); convert(); }
    });
})();
</script>
@endpush
