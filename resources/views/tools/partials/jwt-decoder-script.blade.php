<script>
(function() {
    // Get translatable strings from data attributes (for Italian/other locales)
    const stringsEl = document.getElementById('tool-strings');
    const S = {
        invalidFormat: stringsEl?.dataset.invalidFormat || 'Invalid JWT format. Token must have 3 parts separated by dots.',
        decodeFailed: stringsEl?.dataset.decodeFailed || 'Failed to decode JWT. Invalid base64 or JSON content.',
        clipboardError: stringsEl?.dataset.clipboardError || 'Unable to access clipboard. Please paste manually.',
        headerCopied: stringsEl?.dataset.headerCopied || 'Header copied to clipboard!',
        payloadCopied: stringsEl?.dataset.payloadCopied || 'Payload copied to clipboard!',
        copyFailed: stringsEl?.dataset.copyFailed || 'Failed to copy',
        expired: stringsEl?.dataset.expired || 'Expired',
        expiredAgo: stringsEl?.dataset.expiredAgo || 'expired {n} {unit} ago',
        expiresIn: stringsEl?.dataset.expiresIn || 'expires in {n} {unit}',
        day: stringsEl?.dataset.day || 'day',
        days: stringsEl?.dataset.days || 'days',
        hour: stringsEl?.dataset.hour || 'hour',
        hours: stringsEl?.dataset.hours || 'hours',
        minute: stringsEl?.dataset.minute || 'minute',
        minutes: stringsEl?.dataset.minutes || 'minutes',
        placeholder: stringsEl?.dataset.placeholder || 'Paste a JWT token above to decode it',
        signatureNote: stringsEl?.dataset.signatureNote || 'Signature verification requires the secret key. This tool only decodes tokens.',
        invalidJwt: stringsEl?.dataset.invalidJwt || 'Invalid JWT',
    };

    // DOM Elements
    const jwtInput = document.getElementById('jwt-input');
    const btnPaste = document.getElementById('btn-paste');
    const btnSample = document.getElementById('btn-sample');
    const btnClear = document.getElementById('btn-clear');
    const btnCopyHeader = document.getElementById('btn-copy-header');
    const btnCopyPayload = document.getElementById('btn-copy-payload');
    const errorDisplay = document.getElementById('error-display');
    const errorMessage = document.getElementById('error-message');
    const decodedOutput = document.getElementById('decoded-output');
    const placeholder = document.getElementById('placeholder');
    const headerOutput = document.getElementById('header-output');
    const payloadOutput = document.getElementById('payload-output');
    const signatureOutput = document.getElementById('signature-output');
    const algorithmBadge = document.getElementById('algorithm-badge');
    const expirationBadge = document.getElementById('expiration-badge');
    const copyNotification = document.getElementById('copy-notification');
    const copyMessage = document.getElementById('copy-message');

    // Sample JWT (expires in 2030)
    const sampleJwt = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiIxMjM0NTY3ODkwIiwibmFtZSI6IkpvaG4gRG9lIiwiZW1haWwiOiJqb2huQGV4YW1wbGUuY29tIiwicm9sZSI6ImFkbWluIiwiaWF0IjoxNzA1MzEyMDAwLCJleHAiOjE4OTM0NTYwMDAsImlzcyI6Imh0dHBzOi8vaGFmaXouZGV2IiwiYXVkIjoiaHR0cHM6Ly9hcGkuaGFmaXouZGV2In0.dBjftJeZ4CVP-mB92K27uhbUJU1p1r_wW1gFWFOEjXk';

    // State
    let decodedHeader = null;
    let decodedPayload = null;

    // Base64URL decode
    function base64UrlDecode(str) {
        let base64 = str.replace(/-/g, '+').replace(/_/g, '/');
        const padding = base64.length % 4;
        if (padding) {
            base64 += '='.repeat(4 - padding);
        }
        try {
            return decodeURIComponent(atob(base64).split('').map(function(c) {
                return '%' + ('00' + c.charCodeAt(0).toString(16)).slice(-2);
            }).join(''));
        } catch (e) {
            return atob(base64);
        }
    }

    // Decode JWT
    function decodeJWT(token) {
        const parts = token.trim().split('.');

        if (parts.length !== 3) {
            throw new Error(S.invalidFormat);
        }

        try {
            const header = JSON.parse(base64UrlDecode(parts[0]));
            const payload = JSON.parse(base64UrlDecode(parts[1]));
            const signature = parts[2];

            return { header, payload, signature };
        } catch (e) {
            throw new Error(S.decodeFailed);
        }
    }

    // Format timestamp to human readable
    function formatTimestamp(timestamp) {
        const date = new Date(timestamp * 1000);
        const options = {
            year: 'numeric',
            month: 'short',
            day: 'numeric',
            hour: '2-digit',
            minute: '2-digit',
            second: '2-digit',
            timeZoneName: 'short'
        };
        return date.toLocaleString(undefined, options);
    }

    // Get relative time
    function getRelativeTime(timestamp) {
        const now = new Date();
        const date = new Date(timestamp * 1000);
        const diff = date - now;

        if (diff < 0) {
            const absDiff = Math.abs(diff);
            const days = Math.floor(absDiff / (1000 * 60 * 60 * 24));
            const hours = Math.floor(absDiff / (1000 * 60 * 60));
            const minutes = Math.floor(absDiff / (1000 * 60));

            if (days > 0) return S.expiredAgo.replace('{n}', days).replace('{unit}', days > 1 ? S.days : S.day);
            if (hours > 0) return S.expiredAgo.replace('{n}', hours).replace('{unit}', hours > 1 ? S.hours : S.hour);
            return S.expiredAgo.replace('{n}', minutes).replace('{unit}', minutes > 1 ? S.minutes : S.minute);
        } else {
            const days = Math.floor(diff / (1000 * 60 * 60 * 24));
            const hours = Math.floor(diff / (1000 * 60 * 60));
            const minutes = Math.floor(diff / (1000 * 60));

            if (days > 0) return S.expiresIn.replace('{n}', days).replace('{unit}', days > 1 ? S.days : S.day);
            if (hours > 0) return S.expiresIn.replace('{n}', hours).replace('{unit}', hours > 1 ? S.hours : S.hour);
            return S.expiresIn.replace('{n}', minutes).replace('{unit}', minutes > 1 ? S.minutes : S.minute);
        }
    }

    // Check expiration
    function checkExpiration(payload) {
        if (!payload.exp) return null;

        const expDate = new Date(payload.exp * 1000);
        const now = new Date();

        return {
            isExpired: expDate < now,
            expDate: expDate,
            timeRemaining: expDate - now
        };
    }

    // Syntax highlighting for JSON
    function syntaxHighlight(json) {
        if (typeof json !== 'string') {
            json = JSON.stringify(json, null, 2);
        }

        json = json.replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;');

        return json.replace(
            /("(\\u[a-zA-Z0-9]{4}|\\[^u]|[^\\"])*"(\s*:)?|\b(true|false|null)\b|-?\d+(?:\.\d*)?(?:[eE][+\-]?\d+)?)/g,
            function(match) {
                let cls = 'text-emerald-400';
                if (/^"/.test(match)) {
                    if (/:$/.test(match)) {
                        cls = 'text-gold';
                        match = match.slice(0, -1) + '<span class="text-light">:</span>';
                    } else {
                        cls = 'text-sky-400';
                    }
                } else if (/true|false/.test(match)) {
                    cls = 'text-purple-400';
                } else if (/null/.test(match)) {
                    cls = 'text-light-muted';
                }
                return '<span class="' + cls + '">' + match + '</span>';
            }
        );
    }

    // Format payload with timestamp annotations
    function formatPayloadWithTimestamps(payload) {
        const timestampClaims = ['exp', 'iat', 'nbf', 'auth_time'];
        const formatted = {};

        for (const [key, value] of Object.entries(payload)) {
            if (timestampClaims.includes(key) && typeof value === 'number') {
                formatted[key] = value;
                formatted[`_${key}_readable`] = formatTimestamp(value) + ' (' + getRelativeTime(value) + ')';
            } else {
                formatted[key] = value;
            }
        }

        return formatted;
    }

    // Show error
    function showError(message) {
        errorDisplay.classList.remove('hidden');
        errorMessage.textContent = message;
        decodedOutput.classList.add('hidden');
        placeholder.classList.add('hidden');
    }

    // Hide error
    function hideError() {
        errorDisplay.classList.add('hidden');
    }

    // Show notification
    function showNotification(message) {
        copyMessage.textContent = message;
        copyNotification.classList.remove('hidden');
        setTimeout(() => {
            copyNotification.classList.add('hidden');
        }, 2000);
    }

    // Copy to clipboard
    function copyToClipboard(text, message) {
        navigator.clipboard.writeText(text).then(() => {
            showNotification(message);
        }).catch(() => {
            showNotification(S.copyFailed);
        });
    }

    // Process JWT input
    function processJwt() {
        const token = jwtInput.value.trim();

        if (!token) {
            hideError();
            decodedOutput.classList.add('hidden');
            placeholder.classList.remove('hidden');
            decodedHeader = null;
            decodedPayload = null;
            return;
        }

        try {
            const decoded = decodeJWT(token);
            decodedHeader = decoded.header;
            decodedPayload = decoded.payload;

            hideError();
            placeholder.classList.add('hidden');
            decodedOutput.classList.remove('hidden');

            algorithmBadge.textContent = decoded.header.alg || 'Unknown';
            headerOutput.innerHTML = syntaxHighlight(JSON.stringify(decoded.header, null, 2));

            const formattedPayload = formatPayloadWithTimestamps(decoded.payload);
            payloadOutput.innerHTML = syntaxHighlight(JSON.stringify(formattedPayload, null, 2));

            signatureOutput.textContent = decoded.signature;

            const expStatus = checkExpiration(decoded.payload);
            if (expStatus) {
                expirationBadge.classList.remove('hidden');
                if (expStatus.isExpired) {
                    expirationBadge.textContent = S.expired;
                    expirationBadge.className = 'text-xs px-2 py-1 rounded border font-medium bg-red-500/20 text-red-400 border-red-500/30';
                } else {
                    expirationBadge.textContent = getRelativeTime(decoded.payload.exp);
                    expirationBadge.className = 'text-xs px-2 py-1 rounded border font-medium bg-green-500/20 text-green-400 border-green-500/30';
                }
            } else {
                expirationBadge.classList.add('hidden');
            }

        } catch (e) {
            showError(e.message);
            decodedHeader = null;
            decodedPayload = null;
        }
    }

    // Event Listeners
    let debounceTimer;
    jwtInput.addEventListener('input', function() {
        clearTimeout(debounceTimer);
        debounceTimer = setTimeout(processJwt, 150);
    });

    btnPaste.addEventListener('click', async function() {
        try {
            const text = await navigator.clipboard.readText();
            jwtInput.value = text;
            processJwt();
        } catch (e) {
            showError(S.clipboardError);
        }
    });

    btnSample.addEventListener('click', function() {
        jwtInput.value = sampleJwt;
        processJwt();
    });

    btnClear.addEventListener('click', function() {
        jwtInput.value = '';
        hideError();
        decodedOutput.classList.add('hidden');
        placeholder.classList.remove('hidden');
        decodedHeader = null;
        decodedPayload = null;
    });

    btnCopyHeader.addEventListener('click', function() {
        if (decodedHeader) {
            copyToClipboard(JSON.stringify(decodedHeader, null, 2), S.headerCopied);
        }
    });

    btnCopyPayload.addEventListener('click', function() {
        if (decodedPayload) {
            copyToClipboard(JSON.stringify(decodedPayload, null, 2), S.payloadCopied);
        }
    });

    // Keyboard shortcut: Ctrl+V to paste and decode
    document.addEventListener('keydown', function(e) {
        if ((e.ctrlKey || e.metaKey) && e.key === 'v' && document.activeElement !== jwtInput) {
            e.preventDefault();
            btnPaste.click();
        }
    });
})();
</script>
