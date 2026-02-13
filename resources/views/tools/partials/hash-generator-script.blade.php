<script>
(function() {
    // Get translatable strings from data attributes (for Italian/other locales)
    const stringsEl = document.getElementById('tool-strings');
    const S = {
        copied: stringsEl?.dataset.copied || '{algo} hash copied!',
        noHashToCopy: stringsEl?.dataset.noHashToCopy || 'No hash to copy. Enter text or select a file first.',
        allCopied: stringsEl?.dataset.allCopied || 'All hashes copied!',
        noHashesToCopy: stringsEl?.dataset.noHashesToCopy || 'No hashes to copy. Enter text or select a file first.',
        copyFailed: stringsEl?.dataset.copyFailed || 'Failed to copy to clipboard',
        errorHashing: stringsEl?.dataset.errorHashing || 'Error generating hashes: ',
        errorFile: stringsEl?.dataset.errorFile || 'Error hashing file: ',
        characters: stringsEl?.dataset.characters || 'characters',
        processing: stringsEl?.dataset.processing || 'Processing...',
        dragDrop: stringsEl?.dataset.dragDrop || 'Drag and drop a file here, or',
        browseFiles: stringsEl?.dataset.browseFiles || 'Browse Files',
        remove: stringsEl?.dataset.remove || 'Remove',
    };

    // MD5 Implementation (since Web Crypto API doesn't support MD5)
    // Based on Joseph Myers' implementation
    function md5(string) {
        function md5cycle(x, k) {
            var a = x[0], b = x[1], c = x[2], d = x[3];
            a = ff(a, b, c, d, k[0], 7, -680876936);
            d = ff(d, a, b, c, k[1], 12, -389564586);
            c = ff(c, d, a, b, k[2], 17, 606105819);
            b = ff(b, c, d, a, k[3], 22, -1044525330);
            a = ff(a, b, c, d, k[4], 7, -176418897);
            d = ff(d, a, b, c, k[5], 12, 1200080426);
            c = ff(c, d, a, b, k[6], 17, -1473231341);
            b = ff(b, c, d, a, k[7], 22, -45705983);
            a = ff(a, b, c, d, k[8], 7, 1770035416);
            d = ff(d, a, b, c, k[9], 12, -1958414417);
            c = ff(c, d, a, b, k[10], 17, -42063);
            b = ff(b, c, d, a, k[11], 22, -1990404162);
            a = ff(a, b, c, d, k[12], 7, 1804603682);
            d = ff(d, a, b, c, k[13], 12, -40341101);
            c = ff(c, d, a, b, k[14], 17, -1502002290);
            b = ff(b, c, d, a, k[15], 22, 1236535329);
            a = gg(a, b, c, d, k[1], 5, -165796510);
            d = gg(d, a, b, c, k[6], 9, -1069501632);
            c = gg(c, d, a, b, k[11], 14, 643717713);
            b = gg(b, c, d, a, k[0], 20, -373897302);
            a = gg(a, b, c, d, k[5], 5, -701558691);
            d = gg(d, a, b, c, k[10], 9, 38016083);
            c = gg(c, d, a, b, k[15], 14, -660478335);
            b = gg(b, c, d, a, k[4], 20, -405537848);
            a = gg(a, b, c, d, k[9], 5, 568446438);
            d = gg(d, a, b, c, k[14], 9, -1019803690);
            c = gg(c, d, a, b, k[3], 14, -187363961);
            b = gg(b, c, d, a, k[8], 20, 1163531501);
            a = gg(a, b, c, d, k[13], 5, -1444681467);
            d = gg(d, a, b, c, k[2], 9, -51403784);
            c = gg(c, d, a, b, k[7], 14, 1735328473);
            b = gg(b, c, d, a, k[12], 20, -1926607734);
            a = hh(a, b, c, d, k[5], 4, -378558);
            d = hh(d, a, b, c, k[8], 11, -2022574463);
            c = hh(c, d, a, b, k[11], 16, 1839030562);
            b = hh(b, c, d, a, k[14], 23, -35309556);
            a = hh(a, b, c, d, k[1], 4, -1530992060);
            d = hh(d, a, b, c, k[4], 11, 1272893353);
            c = hh(c, d, a, b, k[7], 16, -155497632);
            b = hh(b, c, d, a, k[10], 23, -1094730640);
            a = hh(a, b, c, d, k[13], 4, 681279174);
            d = hh(d, a, b, c, k[0], 11, -358537222);
            c = hh(c, d, a, b, k[3], 16, -722521979);
            b = hh(b, c, d, a, k[6], 23, 76029189);
            a = hh(a, b, c, d, k[9], 4, -640364487);
            d = hh(d, a, b, c, k[12], 11, -421815835);
            c = hh(c, d, a, b, k[15], 16, 530742520);
            b = hh(b, c, d, a, k[2], 23, -995338651);
            a = ii(a, b, c, d, k[0], 6, -198630844);
            d = ii(d, a, b, c, k[7], 10, 1126891415);
            c = ii(c, d, a, b, k[14], 15, -1416354905);
            b = ii(b, c, d, a, k[5], 21, -57434055);
            a = ii(a, b, c, d, k[12], 6, 1700485571);
            d = ii(d, a, b, c, k[3], 10, -1894986606);
            c = ii(c, d, a, b, k[10], 15, -1051523);
            b = ii(b, c, d, a, k[1], 21, -2054922799);
            a = ii(a, b, c, d, k[8], 6, 1873313359);
            d = ii(d, a, b, c, k[15], 10, -30611744);
            c = ii(c, d, a, b, k[6], 15, -1560198380);
            b = ii(b, c, d, a, k[13], 21, 1309151649);
            a = ii(a, b, c, d, k[4], 6, -145523070);
            d = ii(d, a, b, c, k[11], 10, -1120210379);
            c = ii(c, d, a, b, k[2], 15, 718787259);
            b = ii(b, c, d, a, k[9], 21, -343485551);
            x[0] = add32(a, x[0]);
            x[1] = add32(b, x[1]);
            x[2] = add32(c, x[2]);
            x[3] = add32(d, x[3]);
        }

        function cmn(q, a, b, x, s, t) {
            a = add32(add32(a, q), add32(x, t));
            return add32((a << s) | (a >>> (32 - s)), b);
        }

        function ff(a, b, c, d, x, s, t) {
            return cmn((b & c) | ((~b) & d), a, b, x, s, t);
        }

        function gg(a, b, c, d, x, s, t) {
            return cmn((b & d) | (c & (~d)), a, b, x, s, t);
        }

        function hh(a, b, c, d, x, s, t) {
            return cmn(b ^ c ^ d, a, b, x, s, t);
        }

        function ii(a, b, c, d, x, s, t) {
            return cmn(c ^ (b | (~d)), a, b, x, s, t);
        }

        function md5blk(s) {
            var md5blks = [], i;
            for (i = 0; i < 64; i += 4) {
                md5blks[i >> 2] = s.charCodeAt(i) + (s.charCodeAt(i + 1) << 8) + (s.charCodeAt(i + 2) << 16) + (s.charCodeAt(i + 3) << 24);
            }
            return md5blks;
        }

        function md5blk_array(a) {
            var md5blks = [], i;
            for (i = 0; i < 64; i += 4) {
                md5blks[i >> 2] = a[i] + (a[i + 1] << 8) + (a[i + 2] << 16) + (a[i + 3] << 24);
            }
            return md5blks;
        }

        var hex_chr = '0123456789abcdef'.split('');

        function rhex(n) {
            var s = '', j = 0;
            for (; j < 4; j++)
                s += hex_chr[(n >> (j * 8 + 4)) & 0x0F] + hex_chr[(n >> (j * 8)) & 0x0F];
            return s;
        }

        function hex(x) {
            for (var i = 0; i < x.length; i++)
                x[i] = rhex(x[i]);
            return x.join('');
        }

        function add32(a, b) {
            return (a + b) & 0xFFFFFFFF;
        }

        function md5_str(s) {
            var n = s.length,
                state = [1732584193, -271733879, -1732584194, 271733878], i;
            for (i = 64; i <= s.length; i += 64) {
                md5cycle(state, md5blk(s.substring(i - 64, i)));
            }
            s = s.substring(i - 64);
            var tail = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
            for (i = 0; i < s.length; i++)
                tail[i >> 2] |= s.charCodeAt(i) << ((i % 4) << 3);
            tail[i >> 2] |= 0x80 << ((i % 4) << 3);
            if (i > 55) {
                md5cycle(state, tail);
                for (i = 0; i < 16; i++) tail[i] = 0;
            }
            tail[14] = n * 8;
            md5cycle(state, tail);
            return hex(state);
        }

        function md5_array(a) {
            var n = a.length,
                state = [1732584193, -271733879, -1732584194, 271733878], i;
            for (i = 64; i <= a.length; i += 64) {
                md5cycle(state, md5blk_array(a.subarray(i - 64, i)));
            }
            var tail = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
            var leftover = a.subarray(i - 64);
            for (i = 0; i < leftover.length; i++)
                tail[i >> 2] |= leftover[i] << ((i % 4) << 3);
            tail[i >> 2] |= 0x80 << ((i % 4) << 3);
            if (i > 55) {
                md5cycle(state, tail);
                for (i = 0; i < 16; i++) tail[i] = 0;
            }
            tail[14] = n * 8;
            md5cycle(state, tail);
            return hex(state);
        }

        if (typeof string === 'string') {
            return md5_str(string);
        } else if (string instanceof Uint8Array) {
            return md5_array(string);
        }
        return '';
    }

    // DOM Elements
    const tabText = document.getElementById('tab-text');
    const tabFile = document.getElementById('tab-file');
    const textMode = document.getElementById('text-mode');
    const fileMode = document.getElementById('file-mode');
    const textInput = document.getElementById('text-input');
    const charCount = document.getElementById('char-count');
    const dropZone = document.getElementById('drop-zone');
    const fileInput = document.getElementById('file-input');
    const browseBtn = document.getElementById('browse-btn');
    const dropZoneContent = document.getElementById('drop-zone-content');
    const fileInfo = document.getElementById('file-info');
    const fileName = document.getElementById('file-name');
    const fileSize = document.getElementById('file-size');
    const removeFileBtn = document.getElementById('remove-file-btn');
    const processingIndicator = document.getElementById('processing-indicator');
    const btnCopyAll = document.getElementById('btn-copy-all');
    const btnClear = document.getElementById('btn-clear');
    const copyNotification = document.getElementById('copy-notification');
    const copyMessage = document.getElementById('copy-message');
    const errorNotification = document.getElementById('error-notification');
    const errorMessage = document.getElementById('error-message');

    const hashElements = {
        md5: document.getElementById('hash-md5'),
        sha1: document.getElementById('hash-sha1'),
        sha256: document.getElementById('hash-sha256'),
        sha384: document.getElementById('hash-sha384'),
        sha512: document.getElementById('hash-sha512')
    };

    // State
    let currentHashes = {
        md5: '',
        sha1: '',
        sha256: '',
        sha384: '',
        sha512: ''
    };
    let currentMode = 'text';
    let selectedFile = null;
    let debounceTimer = null;

    // Get output format
    function getOutputFormat() {
        return document.querySelector('input[name="output-format"]:checked').value;
    }

    // Format hash based on output format
    function formatHash(hash) {
        if (!hash) return '-';
        return getOutputFormat() === 'uppercase' ? hash.toUpperCase() : hash.toLowerCase();
    }

    // Compute SHA hash using Web Crypto API
    async function computeSHA(algorithm, data) {
        const hashBuffer = await crypto.subtle.digest(algorithm, data);
        const hashArray = Array.from(new Uint8Array(hashBuffer));
        return hashArray.map(b => b.toString(16).padStart(2, '0')).join('');
    }

    // Generate all hashes from text
    async function generateHashesFromText(text) {
        if (!text) {
            clearHashes();
            return;
        }

        processingIndicator.classList.remove('hidden');

        try {
            const encoder = new TextEncoder();
            const data = encoder.encode(text);

            const [sha1, sha256, sha384, sha512] = await Promise.all([
                computeSHA('SHA-1', data),
                computeSHA('SHA-256', data),
                computeSHA('SHA-384', data),
                computeSHA('SHA-512', data)
            ]);

            currentHashes = {
                md5: md5(text),
                sha1,
                sha256,
                sha384,
                sha512
            };

            updateHashDisplay();
        } catch (error) {
            showError(S.errorHashing + error.message);
        } finally {
            processingIndicator.classList.add('hidden');
        }
    }

    // Generate all hashes from file
    async function generateHashesFromFile(file) {
        if (!file) {
            clearHashes();
            return;
        }

        processingIndicator.classList.remove('hidden');

        try {
            const arrayBuffer = await file.arrayBuffer();
            const data = new Uint8Array(arrayBuffer);

            const [sha1, sha256, sha384, sha512] = await Promise.all([
                computeSHA('SHA-1', data),
                computeSHA('SHA-256', data),
                computeSHA('SHA-384', data),
                computeSHA('SHA-512', data)
            ]);

            currentHashes = {
                md5: md5(data),
                sha1,
                sha256,
                sha384,
                sha512
            };

            updateHashDisplay();
        } catch (error) {
            showError(S.errorFile + error.message);
        } finally {
            processingIndicator.classList.add('hidden');
        }
    }

    // Update hash display
    function updateHashDisplay() {
        for (const [algo, element] of Object.entries(hashElements)) {
            const hash = currentHashes[algo];
            if (hash) {
                element.textContent = formatHash(hash);
                element.classList.remove('text-light-muted/50');
                element.classList.add('text-light');
            } else {
                element.textContent = '-';
                element.classList.remove('text-light');
                element.classList.add('text-light-muted/50');
            }
        }
    }

    // Clear hashes
    function clearHashes() {
        currentHashes = {
            md5: '',
            sha1: '',
            sha256: '',
            sha384: '',
            sha512: ''
        };
        updateHashDisplay();
    }

    // Format file size
    function formatFileSize(bytes) {
        if (bytes === 0) return '0 Bytes';
        const k = 1024;
        const sizes = ['Bytes', 'KB', 'MB', 'GB'];
        const i = Math.floor(Math.log(bytes) / Math.log(k));
        return parseFloat((bytes / Math.pow(k, i)).toFixed(2)) + ' ' + sizes[i];
    }

    // Handle file selection
    function handleFileSelect(file) {
        selectedFile = file;
        fileName.textContent = file.name;
        fileSize.textContent = formatFileSize(file.size);
        dropZoneContent.classList.add('hidden');
        fileInfo.classList.remove('hidden');
        generateHashesFromFile(file);
    }

    // Remove selected file
    function removeFile() {
        selectedFile = null;
        fileInput.value = '';
        dropZoneContent.classList.remove('hidden');
        fileInfo.classList.add('hidden');
        clearHashes();
    }

    // Copy to clipboard
    function copyToClipboard(text, message) {
        navigator.clipboard.writeText(text).then(() => {
            showNotification(message);
        }).catch(() => {
            showError(S.copyFailed);
        });
    }

    // Show success notification
    function showNotification(message) {
        copyMessage.textContent = message;
        copyNotification.classList.remove('hidden');
        errorNotification.classList.add('hidden');

        setTimeout(() => {
            copyNotification.classList.add('hidden');
        }, 2000);
    }

    // Show error notification
    function showError(message) {
        errorMessage.textContent = message;
        errorNotification.classList.remove('hidden');
        copyNotification.classList.add('hidden');

        setTimeout(() => {
            errorNotification.classList.add('hidden');
        }, 3000);
    }

    // Switch tabs
    function switchTab(mode) {
        currentMode = mode;

        if (mode === 'text') {
            tabText.classList.add('bg-gold', 'text-darkBg');
            tabText.classList.remove('border', 'border-gold/30', 'text-light-muted');
            tabFile.classList.remove('bg-gold', 'text-darkBg');
            tabFile.classList.add('border', 'border-gold/30', 'text-light-muted');
            textMode.classList.remove('hidden');
            fileMode.classList.add('hidden');

            if (textInput.value) {
                generateHashesFromText(textInput.value);
            } else {
                clearHashes();
            }
        } else {
            tabFile.classList.add('bg-gold', 'text-darkBg');
            tabFile.classList.remove('border', 'border-gold/30', 'text-light-muted');
            tabText.classList.remove('bg-gold', 'text-darkBg');
            tabText.classList.add('border', 'border-gold/30', 'text-light-muted');
            fileMode.classList.remove('hidden');
            textMode.classList.add('hidden');

            if (selectedFile) {
                generateHashesFromFile(selectedFile);
            } else {
                clearHashes();
            }
        }
    }

    // Event Listeners

    // Tab switching
    tabText.addEventListener('click', () => switchTab('text'));
    tabFile.addEventListener('click', () => switchTab('file'));

    // Text input with debounce
    textInput.addEventListener('input', function() {
        charCount.textContent = this.value.length + ' ' + S.characters;

        clearTimeout(debounceTimer);
        debounceTimer = setTimeout(() => {
            generateHashesFromText(this.value);
        }, 300);
    });

    // Output format change
    document.querySelectorAll('input[name="output-format"]').forEach(radio => {
        radio.addEventListener('change', updateHashDisplay);
    });

    // File drag and drop
    dropZone.addEventListener('dragover', function(e) {
        e.preventDefault();
        this.classList.add('border-gold', 'bg-gold/5');
    });

    dropZone.addEventListener('dragleave', function(e) {
        e.preventDefault();
        this.classList.remove('border-gold', 'bg-gold/5');
    });

    dropZone.addEventListener('drop', function(e) {
        e.preventDefault();
        this.classList.remove('border-gold', 'bg-gold/5');

        const files = e.dataTransfer.files;
        if (files.length > 0) {
            handleFileSelect(files[0]);
        }
    });

    // Browse button
    browseBtn.addEventListener('click', function(e) {
        e.stopPropagation();
        fileInput.click();
    });

    dropZone.addEventListener('click', function() {
        if (!selectedFile) {
            fileInput.click();
        }
    });

    // File input change
    fileInput.addEventListener('change', function() {
        if (this.files.length > 0) {
            handleFileSelect(this.files[0]);
        }
    });

    // Remove file button
    removeFileBtn.addEventListener('click', function(e) {
        e.stopPropagation();
        removeFile();
    });

    // Copy individual hash buttons
    document.querySelectorAll('.copy-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            const algo = this.getAttribute('data-algorithm');
            const hash = currentHashes[algo];
            if (hash) {
                copyToClipboard(formatHash(hash), S.copied.replace('{algo}', algo.toUpperCase()));
            } else {
                showError(S.noHashToCopy);
            }
        });
    });

    // Copy all hashes
    btnCopyAll.addEventListener('click', function() {
        const hasAnyHash = Object.values(currentHashes).some(h => h);
        if (!hasAnyHash) {
            showError(S.noHashesToCopy);
            return;
        }

        const allHashes = [
            'MD5: ' + formatHash(currentHashes.md5),
            'SHA-1: ' + formatHash(currentHashes.sha1),
            'SHA-256: ' + formatHash(currentHashes.sha256),
            'SHA-384: ' + formatHash(currentHashes.sha384),
            'SHA-512: ' + formatHash(currentHashes.sha512)
        ].join('\n');

        copyToClipboard(allHashes, S.allCopied);
    });

    // Clear button
    btnClear.addEventListener('click', function() {
        textInput.value = '';
        charCount.textContent = '0 ' + S.characters;
        removeFile();
        clearHashes();
    });
})();
</script>
