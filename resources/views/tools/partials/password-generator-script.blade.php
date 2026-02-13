<script>
(function() {
    // Get translatable strings from data attributes (for Italian/other locales)
    const stringsEl = document.getElementById('tool-strings');
    const S = {
        placeholder: stringsEl?.dataset.placeholder || 'Click Generate to create a password',
        noCharType: stringsEl?.dataset.noCharType || 'Please select at least one character type',
        copied: stringsEl?.dataset.copied || 'Password copied!',
        copyFail: stringsEl?.dataset.copyFail || 'Failed to copy to clipboard',
        generateFirst: stringsEl?.dataset.generateFirst || 'Generate a password first',
        noDownload: stringsEl?.dataset.noDownload || 'No passwords to download. Generate some first.',
        noCopy: stringsEl?.dataset.noCopy || 'No passwords to copy. Generate some first.',
        downloaded: stringsEl?.dataset.downloaded || 'Passwords downloaded!',
        copiedCount: stringsEl?.dataset.copiedCount || 'Copied {count} passwords!',
        veryWeak: stringsEl?.dataset.veryWeak || 'Very Weak',
        weak: stringsEl?.dataset.weak || 'Weak',
        fair: stringsEl?.dataset.fair || 'Fair',
        strong: stringsEl?.dataset.strong || 'Strong',
        veryStrong: stringsEl?.dataset.veryStrong || 'Very Strong',
    };

    // DOM Elements
    const passwordDisplay = document.getElementById('password-display');
    const strengthBar = document.getElementById('strength-bar');
    const strengthLabel = document.getElementById('strength-label');
    const lengthSlider = document.getElementById('password-length');
    const lengthDisplay = document.getElementById('length-display');
    const btnGenerate = document.getElementById('btn-generate');
    const btnCopyPassword = document.getElementById('btn-copy-password');
    const btnToggleVisibility = document.getElementById('btn-toggle-visibility');
    const iconShow = document.getElementById('icon-show');
    const iconHide = document.getElementById('icon-hide');
    const optUppercase = document.getElementById('opt-uppercase');
    const optLowercase = document.getElementById('opt-lowercase');
    const optNumbers = document.getElementById('opt-numbers');
    const optSymbols = document.getElementById('opt-symbols');
    const optExcludeSimilar = document.getElementById('opt-exclude-similar');
    const bulkQuantity = document.getElementById('bulk-quantity');
    const btnBulkGenerate = document.getElementById('btn-bulk-generate');
    const bulkContainer = document.getElementById('bulk-container');
    const bulkList = document.getElementById('bulk-list');
    const btnCopyAll = document.getElementById('btn-copy-all');
    const btnDownload = document.getElementById('btn-download');
    const btnClearBulk = document.getElementById('btn-clear-bulk');
    const copyNotification = document.getElementById('copy-notification');
    const copyMessage = document.getElementById('copy-message');
    const errorNotification = document.getElementById('error-notification');
    const errorMessage = document.getElementById('error-message');

    // State
    let currentPassword = '';
    let bulkPasswords = [];
    let isPasswordVisible = true;

    // Character sets
    const CHARS = {
        uppercase: 'ABCDEFGHIJKLMNOPQRSTUVWXYZ',
        lowercase: 'abcdefghijklmnopqrstuvwxyz',
        numbers: '0123456789',
        symbols: '!@#$%^&*()_+-=[]{}|;:,.<>?'
    };

    const SIMILAR_CHARS = /[0O1lI]/g;

    // Generate password
    function generatePassword(length) {
        let charset = '';

        if (optUppercase.checked) charset += CHARS.uppercase;
        if (optLowercase.checked) charset += CHARS.lowercase;
        if (optNumbers.checked) charset += CHARS.numbers;
        if (optSymbols.checked) charset += CHARS.symbols;

        if (optExcludeSimilar.checked) {
            charset = charset.replace(SIMILAR_CHARS, '');
        }

        if (charset === '') {
            showError(S.noCharType);
            return null;
        }

        let password = '';
        const array = new Uint32Array(length);
        crypto.getRandomValues(array);

        for (let i = 0; i < length; i++) {
            password += charset[array[i] % charset.length];
        }

        return password;
    }

    // Calculate password strength
    function calculateStrength(password) {
        if (!password) return { level: '-', color: 'gray', percent: 0 };

        let score = 0;

        // Length score
        if (password.length >= 8) score += 1;
        if (password.length >= 12) score += 1;
        if (password.length >= 16) score += 1;
        if (password.length >= 24) score += 1;

        // Character variety
        if (/[a-z]/.test(password)) score += 1;
        if (/[A-Z]/.test(password)) score += 1;
        if (/[0-9]/.test(password)) score += 1;
        if (/[^a-zA-Z0-9]/.test(password)) score += 1;

        // Return strength level
        if (score <= 2) return { level: S.veryWeak, color: 'red', percent: 20 };
        if (score <= 4) return { level: S.weak, color: 'orange', percent: 40 };
        if (score <= 5) return { level: S.fair, color: 'yellow', percent: 60 };
        if (score <= 7) return { level: S.strong, color: 'green', percent: 80 };
        return { level: S.veryStrong, color: 'emerald', percent: 100 };
    }

    // Update strength meter
    function updateStrengthMeter(password) {
        const strength = calculateStrength(password);

        strengthLabel.textContent = strength.level;
        strengthBar.style.width = strength.percent + '%';

        // Remove all color classes
        strengthBar.classList.remove('bg-gray-500', 'bg-red-500', 'bg-orange-500', 'bg-yellow-500', 'bg-green-500', 'bg-emerald-500');
        strengthLabel.classList.remove('text-gray-400', 'text-red-400', 'text-orange-400', 'text-yellow-400', 'text-green-400', 'text-emerald-400');

        // Add appropriate color class
        const colorMap = {
            'gray': ['bg-gray-500', 'text-gray-400'],
            'red': ['bg-red-500', 'text-red-400'],
            'orange': ['bg-orange-500', 'text-orange-400'],
            'yellow': ['bg-yellow-500', 'text-yellow-400'],
            'green': ['bg-green-500', 'text-green-400'],
            'emerald': ['bg-emerald-500', 'text-emerald-400']
        };

        const [barColor, labelColor] = colorMap[strength.color];
        strengthBar.classList.add(barColor);
        strengthLabel.classList.add(labelColor);
    }

    // Update password display
    function updatePasswordDisplay() {
        if (!currentPassword) {
            passwordDisplay.textContent = S.placeholder;
            return;
        }

        if (isPasswordVisible) {
            passwordDisplay.textContent = currentPassword;
        } else {
            passwordDisplay.textContent = '•'.repeat(currentPassword.length);
        }
    }

    // Generate and display new password
    function generateAndDisplay() {
        const length = parseInt(lengthSlider.value, 10);
        const password = generatePassword(length);

        if (password) {
            currentPassword = password;
            updatePasswordDisplay();
            updateStrengthMeter(password);
            hideError();
        }
    }

    // Generate bulk passwords
    function generateBulk() {
        const quantity = parseInt(bulkQuantity.value, 10);
        const length = parseInt(lengthSlider.value, 10);

        bulkPasswords = [];

        for (let i = 0; i < quantity; i++) {
            const password = generatePassword(length);
            if (password) {
                bulkPasswords.push(password);
            } else {
                return; // Error already shown
            }
        }

        renderBulkList();
        bulkContainer.classList.remove('hidden');
    }

    // Render bulk password list
    function renderBulkList() {
        bulkList.innerHTML = bulkPasswords.map((password, index) => `
            <div class="flex items-center justify-between p-2 bg-darkBg/50 rounded border border-gold/10 hover:border-gold/30 transition-colors group">
                <code class="text-light text-sm break-all">${password}</code>
                <button class="copy-single-btn ml-2 p-1.5 text-light-muted hover:text-gold transition-colors opacity-0 group-hover:opacity-100 cursor-pointer" data-password="${password}" title="Copy">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                </button>
            </div>
        `).join('');

        // Add click handlers for individual copy buttons
        document.querySelectorAll('.copy-single-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                const password = this.getAttribute('data-password');
                copyToClipboard(password, S.copied);
            });
        });
    }

    // Copy to clipboard
    function copyToClipboard(text, message) {
        navigator.clipboard.writeText(text).then(() => {
            showNotification(message);
        }).catch(() => {
            showError(S.copyFail);
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

    // Hide error notification
    function hideError() {
        errorNotification.classList.add('hidden');
    }

    // Download bulk passwords as TXT
    function downloadTxt() {
        if (bulkPasswords.length === 0) {
            showError(S.noDownload);
            return;
        }

        const content = bulkPasswords.join('\n');
        const blob = new Blob([content], { type: 'text/plain' });
        const url = URL.createObjectURL(blob);
        const now = new Date();
        const timestamp = now.getFullYear() + '-' +
            String(now.getMonth() + 1).padStart(2, '0') + '-' +
            String(now.getDate()).padStart(2, '0') + '-' +
            String(now.getHours()).padStart(2, '0') +
            String(now.getMinutes()).padStart(2, '0') +
            String(now.getSeconds()).padStart(2, '0');

        const a = document.createElement('a');
        a.href = url;
        a.download = `passwords-${timestamp}.txt`;
        document.body.appendChild(a);
        a.click();
        document.body.removeChild(a);
        URL.revokeObjectURL(url);

        showNotification(S.downloaded);
    }

    // Event Listeners
    btnGenerate.addEventListener('click', generateAndDisplay);

    btnCopyPassword.addEventListener('click', function() {
        if (currentPassword) {
            copyToClipboard(currentPassword, S.copied);
        } else {
            showError(S.generateFirst);
        }
    });

    passwordDisplay.addEventListener('click', function() {
        if (currentPassword) {
            copyToClipboard(currentPassword, S.copied);
        }
    });

    btnToggleVisibility.addEventListener('click', function() {
        isPasswordVisible = !isPasswordVisible;
        iconShow.classList.toggle('hidden', !isPasswordVisible);
        iconHide.classList.toggle('hidden', isPasswordVisible);
        updatePasswordDisplay();
    });

    lengthSlider.addEventListener('input', function() {
        lengthDisplay.textContent = this.value;
        if (currentPassword) {
            generateAndDisplay();
        }
    });

    // Auto-generate on option change
    [optUppercase, optLowercase, optNumbers, optSymbols, optExcludeSimilar].forEach(opt => {
        opt.addEventListener('change', function() {
            if (currentPassword) {
                generateAndDisplay();
            }
        });
    });

    btnBulkGenerate.addEventListener('click', generateBulk);

    btnCopyAll.addEventListener('click', function() {
        if (bulkPasswords.length === 0) {
            showError(S.noCopy);
            return;
        }
        copyToClipboard(bulkPasswords.join('\n'), S.copiedCount.replace('{count}', bulkPasswords.length));
    });

    btnDownload.addEventListener('click', downloadTxt);

    btnClearBulk.addEventListener('click', function() {
        bulkPasswords = [];
        bulkList.innerHTML = '';
        bulkContainer.classList.add('hidden');
    });

    // Keyboard shortcut: Enter to generate
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Enter' && !e.ctrlKey && !e.metaKey && !e.shiftKey) {
            if (document.activeElement.tagName !== 'INPUT' && document.activeElement.tagName !== 'TEXTAREA' && document.activeElement.tagName !== 'SELECT') {
                e.preventDefault();
                generateAndDisplay();
            }
        }
    });

    // Initialize - generate a password on page load
    generateAndDisplay();
})();
</script>
