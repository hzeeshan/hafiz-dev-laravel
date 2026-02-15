@push('scripts')
<script>
(function() {
    const stringsEl = document.getElementById('tool-strings');
    const S = {
        copied_prefix: stringsEl?.dataset.copiedPrefix || 'Copied: ',
        warn_777: stringsEl?.dataset.warn777 || 'chmod 777 is a security risk! All users can read, write, and execute. Use 755 for directories or 644 for files instead.',
        warn_666: stringsEl?.dataset.warn666 || 'chmod 666 allows all users to read and write. Consider 644 (owner write, others read-only).',
        warn_world_writable: stringsEl?.dataset.warnWorldWritable || 'World-writable files are a security risk. Public users can modify this file.',
        warn_000: stringsEl?.dataset.warn000 || "No one can access this file, including the owner. You'll need root (sudo) to change permissions.",
    };

    const octalInput = document.getElementById('octal-input');
    const checkboxes = document.querySelectorAll('.perm-cb');
    const resultOctal = document.getElementById('result-octal');
    const resultSymbolic = document.getElementById('result-symbolic');
    const resultCommand = document.getElementById('result-command');
    const resultFiletype = document.getElementById('result-filetype');
    const securityWarning = document.getElementById('security-warning');
    const securityMessage = document.getElementById('security-message');
    const successNotification = document.getElementById('success-notification');
    const successMessage = document.getElementById('success-message');

    const permValues = { r: 4, w: 2, x: 1 };

    function getCheckbox(who, perm) {
        return document.getElementById(who + '-' + perm);
    }

    function calcOctalForGroup(who) {
        let val = 0;
        if (getCheckbox(who, 'r').checked) val += 4;
        if (getCheckbox(who, 'w').checked) val += 2;
        if (getCheckbox(who, 'x').checked) val += 1;
        return val;
    }

    function symbolicForGroup(who) {
        let s = '';
        s += getCheckbox(who, 'r').checked ? 'r' : '-';
        s += getCheckbox(who, 'w').checked ? 'w' : '-';
        s += getCheckbox(who, 'x').checked ? 'x' : '-';
        return s;
    }

    function updateFromCheckboxes() {
        const o = calcOctalForGroup('owner');
        const g = calcOctalForGroup('group');
        const ot = calcOctalForGroup('others');
        const octal = '' + o + g + ot;

        document.getElementById('owner-octal').textContent = o;
        document.getElementById('group-octal').textContent = g;
        document.getElementById('others-octal').textContent = ot;

        octalInput.value = octal;
        resultOctal.textContent = octal;
        resultSymbolic.textContent = symbolicForGroup('owner') + symbolicForGroup('group') + symbolicForGroup('others');
        resultCommand.textContent = 'chmod ' + octal + ' file';
        resultFiletype.textContent = '-' + resultSymbolic.textContent;

        checkSecurity(octal);
    }

    function updateFromOctal(val) {
        val = val.replace(/[^0-7]/g, '').slice(0, 3);
        if (val.length !== 3) return;

        const digits = val.split('').map(Number);
        const groups = ['owner', 'group', 'others'];

        groups.forEach((who, i) => {
            const d = digits[i];
            getCheckbox(who, 'r').checked = !!(d & 4);
            getCheckbox(who, 'w').checked = !!(d & 2);
            getCheckbox(who, 'x').checked = !!(d & 1);
            document.getElementById(who + '-octal').textContent = d;
        });

        resultOctal.textContent = val;
        resultSymbolic.textContent = symbolicForGroup('owner') + symbolicForGroup('group') + symbolicForGroup('others');
        resultCommand.textContent = 'chmod ' + val + ' file';
        resultFiletype.textContent = '-' + resultSymbolic.textContent;

        checkSecurity(val);
    }

    function checkSecurity(octal) {
        const warnings = [];
        if (octal === '777') warnings.push(S.warn_777);
        else if (octal === '666') warnings.push(S.warn_666);
        else if (octal[2] >= '6') warnings.push(S.warn_world_writable);
        else if (octal === '000') warnings.push(S.warn_000);

        if (warnings.length) {
            securityMessage.textContent = warnings[0];
            securityWarning.classList.remove('hidden');
        } else {
            securityWarning.classList.add('hidden');
        }
    }

    function showSuccess(msg) {
        successMessage.textContent = msg;
        successNotification.classList.remove('hidden');
        setTimeout(() => successNotification.classList.add('hidden'), 2000);
    }

    // Checkbox changes
    checkboxes.forEach(cb => cb.addEventListener('change', updateFromCheckboxes));

    // Octal input
    octalInput.addEventListener('input', function() {
        const val = this.value.replace(/[^0-7]/g, '');
        this.value = val;
        if (val.length === 3) updateFromOctal(val);
    });

    // Presets
    document.querySelectorAll('.preset-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            const octal = this.dataset.octal;
            octalInput.value = octal;
            updateFromOctal(octal);
        });
    });

    // Click to copy
    [resultOctal, resultSymbolic, resultCommand].forEach(el => {
        el.addEventListener('click', function() {
            navigator.clipboard.writeText(this.textContent).then(() => {
                showSuccess(S.copied_prefix + this.textContent);
            });
        });
    });

    // Initialize
    updateFromCheckboxes();
})();
</script>
@endpush
