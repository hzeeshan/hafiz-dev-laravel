<script>
(function() {
    // Translatable strings (read from data attributes, English defaults)
    const stringsEl = document.getElementById('tool-strings');
    const S = {
        placeholder: stringsEl?.dataset.placeholder || 'Click "Generate" to create UUIDs...',
        copied: stringsEl?.dataset.copied || 'Copied to clipboard!',
        copyFail: stringsEl?.dataset.copyFail || 'Failed to copy',
        nothingToCopy: stringsEl?.dataset.nothingToCopy || 'Nothing to copy. Generate some IDs first.',
        nothingToDownload: stringsEl?.dataset.nothingToDownload || 'Nothing to download. Generate some IDs first.',
        fileDownloaded: stringsEl?.dataset.fileDownloaded || 'File downloaded!',
        copiedCount: stringsEl?.dataset.copiedCount || 'Copied {count} IDs to clipboard!',
        copyTitle: stringsEl?.dataset.copyTitle || 'Copy',
    };

    // DOM Elements
    const typeButtons = document.querySelectorAll('.type-btn');
    const quantitySelect = document.getElementById('quantity-select');
    const hyphensToggle = document.getElementById('hyphens-toggle');
    const hyphensLabel = document.getElementById('hyphens-label');
    const uppercaseToggle = document.getElementById('uppercase-toggle');
    const btnGenerate = document.getElementById('btn-generate');
    const btnCopyAll = document.getElementById('btn-copy-all');
    const btnDownload = document.getElementById('btn-download');
    const btnClear = document.getElementById('btn-clear');
    const outputPlaceholder = document.getElementById('output-placeholder');
    const outputList = document.getElementById('output-list');
    const outputCount = document.getElementById('output-count');
    const copyNotification = document.getElementById('copy-notification');
    const copyMessage = document.getElementById('copy-message');

    // State
    let currentType = 'uuid-v4';
    let generatedIds = [];

    // UUID v4 Generation (Random) - Uses crypto API for better randomness
    function generateUUIDv4() {
        if (typeof crypto !== 'undefined' && crypto.getRandomValues) {
            const bytes = new Uint8Array(16);
            crypto.getRandomValues(bytes);
            bytes[6] = (bytes[6] & 0x0f) | 0x40; // Version 4
            bytes[8] = (bytes[8] & 0x3f) | 0x80; // Variant 10xx
            const hex = Array.from(bytes).map(b => b.toString(16).padStart(2, '0')).join('');
            return hex.slice(0, 8) + '-' + hex.slice(8, 12) + '-' + hex.slice(12, 16) + '-' + hex.slice(16, 20) + '-' + hex.slice(20);
        }
        // Fallback
        return 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, function(c) {
            const r = Math.random() * 16 | 0;
            const v = c === 'x' ? r : (r & 0x3 | 0x8);
            return v.toString(16);
        });
    }

    // UUID v1 Generation (Timestamp-based)
    function generateUUIDv1() {
        const now = Date.now();
        const uuidTime = (now + 12219292800000) * 10000;

        const timeLow = (uuidTime & 0xffffffff).toString(16).padStart(8, '0');
        const timeMid = ((uuidTime / 0x100000000) & 0xffff).toString(16).padStart(4, '0');
        const timeHiAndVersion = (((uuidTime / 0x1000000000000) & 0x0fff) | 0x1000).toString(16).padStart(4, '0');

        const clockSeq = ((Math.random() * 0x3fff) | 0x8000).toString(16).padStart(4, '0');

        const node = Array.from({length: 6}, () =>
            Math.floor(Math.random() * 256).toString(16).padStart(2, '0')
        ).join('');

        return `${timeLow}-${timeMid}-${timeHiAndVersion}-${clockSeq}-${node}`;
    }

    // UUID v7 Generation (Sortable, timestamp-based)
    function generateUUIDv7() {
        const now = Date.now();
        const timestamp = now.toString(16).padStart(12, '0');

        const bytes = new Uint8Array(10);
        if (typeof crypto !== 'undefined' && crypto.getRandomValues) {
            crypto.getRandomValues(bytes);
        } else {
            for (let i = 0; i < 10; i++) {
                bytes[i] = Math.floor(Math.random() * 256);
            }
        }

        const version = '7';
        const randA = bytes.slice(0, 2);
        randA[0] = (randA[0] & 0x0f);
        const randAHex = Array.from(randA).map(b => b.toString(16).padStart(2, '0')).join('');

        const randB = bytes.slice(2);
        randB[0] = (randB[0] & 0x3f) | 0x80;
        const randBHex = Array.from(randB).map(b => b.toString(16).padStart(2, '0')).join('');

        return `${timestamp.slice(0, 8)}-${timestamp.slice(8, 12)}-${version}${randAHex}-${randBHex.slice(0, 4)}-${randBHex.slice(4)}`;
    }

    // ULID Generation
    function generateULID() {
        const ENCODING = '0123456789ABCDEFGHJKMNPQRSTVWXYZ';
        const ENCODING_LEN = ENCODING.length;
        const TIME_LEN = 10;
        const RANDOM_LEN = 16;

        function randomChar() {
            if (typeof crypto !== 'undefined' && crypto.getRandomValues) {
                const arr = new Uint8Array(1);
                crypto.getRandomValues(arr);
                return ENCODING[arr[0] % ENCODING_LEN];
            }
            return ENCODING[Math.floor(Math.random() * ENCODING_LEN)];
        }

        function encodeTime(now, len) {
            let str = '';
            for (let i = len - 1; i >= 0; i--) {
                const mod = now % ENCODING_LEN;
                str = ENCODING[mod] + str;
                now = Math.floor(now / ENCODING_LEN);
            }
            return str;
        }

        const time = encodeTime(Date.now(), TIME_LEN);
        let random = '';
        for (let i = 0; i < RANDOM_LEN; i++) {
            random += randomChar();
        }

        return time + random;
    }

    // Generate ID based on current type
    function generateId() {
        switch (currentType) {
            case 'uuid-v1':
                return generateUUIDv1();
            case 'uuid-v7':
                return generateUUIDv7();
            case 'ulid':
                return generateULID();
            case 'uuid-v4':
            default:
                return generateUUIDv4();
        }
    }

    // Format ID based on options
    function formatId(id) {
        let formatted = id;

        if (currentType !== 'ulid' && !hyphensToggle.checked) {
            formatted = formatted.replace(/-/g, '');
        }

        if (uppercaseToggle.checked) {
            formatted = formatted.toUpperCase();
        } else {
            formatted = formatted.toLowerCase();
        }

        return formatted;
    }

    // Generate multiple IDs
    function generateIds() {
        const quantity = parseInt(quantitySelect.value, 10);
        generatedIds = [];

        for (let i = 0; i < quantity; i++) {
            generatedIds.push(formatId(generateId()));
        }

        renderOutput();
    }

    // Render output list
    function renderOutput() {
        if (generatedIds.length === 0) {
            outputPlaceholder.textContent = S.placeholder;
            outputPlaceholder.classList.remove('hidden');
            outputList.classList.add('hidden');
            outputCount.textContent = '(0)';
            return;
        }

        outputPlaceholder.classList.add('hidden');
        outputList.classList.remove('hidden');
        outputCount.textContent = `(${generatedIds.length})`;

        outputList.innerHTML = generatedIds.map((id, index) => `
            <div class="flex items-center justify-between p-2 bg-darkBg/50 rounded border border-gold/10 hover:border-gold/30 transition-colors group">
                <code class="text-light font-mono text-sm break-all">${id}</code>
                <button class="copy-single-btn ml-2 p-1.5 text-light-muted hover:text-gold transition-colors opacity-0 group-hover:opacity-100 cursor-pointer" data-id="${id}" title="${S.copyTitle}">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                </button>
            </div>
        `).join('');

        // Add click handlers for individual copy buttons
        document.querySelectorAll('.copy-single-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                const id = this.getAttribute('data-id');
                copyToClipboard(id, S.copied);
            });
        });
    }

    // Copy to clipboard
    function copyToClipboard(text, message) {
        navigator.clipboard.writeText(text).then(() => {
            showNotification(message);
        }).catch(() => {
            showNotification(S.copyFail, true);
        });
    }

    // Show notification
    function showNotification(message, isError = false) {
        copyMessage.textContent = message;
        copyNotification.classList.remove('hidden');

        if (isError) {
            copyNotification.classList.remove('bg-green-500/10', 'border-green-500/30');
            copyNotification.classList.add('bg-red-500/10', 'border-red-500/30');
            copyMessage.classList.remove('text-green-400');
            copyMessage.classList.add('text-red-400');
        } else {
            copyNotification.classList.remove('bg-red-500/10', 'border-red-500/30');
            copyNotification.classList.add('bg-green-500/10', 'border-green-500/30');
            copyMessage.classList.remove('text-red-400');
            copyMessage.classList.add('text-green-400');
        }

        setTimeout(() => {
            copyNotification.classList.add('hidden');
        }, 2000);
    }

    // Copy all IDs
    function copyAll() {
        if (generatedIds.length === 0) {
            showNotification(S.nothingToCopy, true);
            return;
        }
        copyToClipboard(generatedIds.join('\n'), S.copiedCount.replace('{count}', generatedIds.length));
    }

    // Download as TXT
    function downloadTxt() {
        if (generatedIds.length === 0) {
            showNotification(S.nothingToDownload, true);
            return;
        }

        const content = generatedIds.join('\n');
        const blob = new Blob([content], { type: 'text/plain' });
        const url = URL.createObjectURL(blob);
        const now = new Date();
        const timestamp = now.getFullYear() + '-' +
            String(now.getMonth() + 1).padStart(2, '0') + '-' +
            String(now.getDate()).padStart(2, '0') + '-' +
            String(now.getHours()).padStart(2, '0') +
            String(now.getMinutes()).padStart(2, '0') +
            String(now.getSeconds()).padStart(2, '0');

        const typeName = currentType.replace('-', '');
        const a = document.createElement('a');
        a.href = url;
        a.download = `${typeName}-${timestamp}.txt`;
        document.body.appendChild(a);
        a.click();
        document.body.removeChild(a);
        URL.revokeObjectURL(url);

        showNotification(S.fileDownloaded);
    }

    // Clear all
    function clearAll() {
        generatedIds = [];
        renderOutput();
    }

    // Update type button styles
    function updateTypeButtons() {
        typeButtons.forEach(btn => {
            if (btn.getAttribute('data-type') === currentType) {
                btn.classList.remove('border', 'border-gold', 'text-gold', 'hover:bg-gold/10');
                btn.classList.add('bg-gold', 'text-darkBg', 'hover:bg-gold-light');
            } else {
                btn.classList.remove('bg-gold', 'text-darkBg', 'hover:bg-gold-light');
                btn.classList.add('border', 'border-gold', 'text-gold', 'hover:bg-gold/10');
            }
        });

        // Hide hyphens option for ULID (ULIDs don't have hyphens)
        if (currentType === 'ulid') {
            hyphensLabel.classList.add('opacity-50');
            hyphensToggle.disabled = true;
        } else {
            hyphensLabel.classList.remove('opacity-50');
            hyphensToggle.disabled = false;
        }
    }

    // Event Listeners
    typeButtons.forEach(btn => {
        btn.addEventListener('click', function() {
            currentType = this.getAttribute('data-type');
            updateTypeButtons();
            if (generatedIds.length > 0) {
                generateIds();
            }
        });
    });

    btnGenerate.addEventListener('click', generateIds);
    btnCopyAll.addEventListener('click', copyAll);
    btnDownload.addEventListener('click', downloadTxt);
    btnClear.addEventListener('click', clearAll);

    // Regenerate when options change (if IDs exist)
    hyphensToggle.addEventListener('change', function() {
        if (generatedIds.length > 0) {
            generatedIds = generatedIds.map(id => {
                let normalized = id.toLowerCase();
                if (currentType !== 'ulid' && normalized.length === 32) {
                    normalized = normalized.slice(0, 8) + '-' + normalized.slice(8, 12) + '-' + normalized.slice(12, 16) + '-' + normalized.slice(16, 20) + '-' + normalized.slice(20);
                }
                return formatId(normalized);
            });
            renderOutput();
        }
    });

    uppercaseToggle.addEventListener('change', function() {
        if (generatedIds.length > 0) {
            generatedIds = generatedIds.map(id => {
                return uppercaseToggle.checked ? id.toUpperCase() : id.toLowerCase();
            });
            renderOutput();
        }
    });

    // Keyboard shortcut: Enter to generate
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Enter' && !e.ctrlKey && !e.metaKey && !e.shiftKey) {
            if (document.activeElement.tagName !== 'INPUT' && document.activeElement.tagName !== 'TEXTAREA' && document.activeElement.tagName !== 'SELECT') {
                e.preventDefault();
                generateIds();
            }
        }
    });

    // Initialize
    updateTypeButtons();
})();
</script>
