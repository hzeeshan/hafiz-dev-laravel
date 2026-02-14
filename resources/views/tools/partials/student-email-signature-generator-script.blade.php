<script>
(function() {
    const stringsEl = document.getElementById('tool-strings');
    const S = {
        enter_name: stringsEl?.dataset.enterName || 'Enter your name to see a preview...',
        copied_html: stringsEl?.dataset.copiedHtml || 'HTML signature copied — paste into your email client',
        copied_text: stringsEl?.dataset.copiedText || 'Plain text signature copied',
        copied_source: stringsEl?.dataset.copiedSource || 'HTML source code copied',
        copied: stringsEl?.dataset.copied || 'Copied!',
        linkedin_label: stringsEl?.dataset.linkedinLabel || 'LinkedIn',
        github_label: stringsEl?.dataset.githubLabel || 'GitHub',
        twitter_label: stringsEl?.dataset.twitterLabel || 'Twitter/X',
        portfolio_label: stringsEl?.dataset.portfolioLabel || 'Portfolio',
    };

    const fields = {
        name: document.getElementById('sig-name'),
        university: document.getElementById('sig-university'),
        major: document.getElementById('sig-major'),
        gradYear: document.getElementById('sig-grad-year'),
        pronouns: document.getElementById('sig-pronouns'),
        email: document.getElementById('sig-email'),
        phone: document.getElementById('sig-phone'),
        website: document.getElementById('sig-website'),
        linkedin: document.getElementById('sig-linkedin'),
        github: document.getElementById('sig-github'),
        twitter: document.getElementById('sig-twitter'),
    };
    const preview = document.getElementById('sig-preview');
    const templateSel = document.getElementById('sig-template');
    const fontSel = document.getElementById('sig-font');
    const colorPicker = document.getElementById('color-picker');
    const btnCopyHtml = document.getElementById('btn-copy-html');
    const btnCopyText = document.getElementById('btn-copy-text');
    const btnCopySource = document.getElementById('btn-copy-source');
    const successNotification = document.getElementById('success-notification');
    const successMessage = document.getElementById('success-message');

    let accentColor = '#2563EB';

    function esc(str) {
        return str.replace(/&/g,'&amp;').replace(/</g,'&lt;').replace(/>/g,'&gt;').replace(/"/g,'&quot;');
    }

    function getValues() {
        const v = {};
        for (const [k, el] of Object.entries(fields)) v[k] = el.value.trim();
        return v;
    }

    function buildSocialLinks(v, font, color) {
        const links = [];
        if (v.linkedin) links.push(`<a href="${esc(v.linkedin)}" style="color:${color};text-decoration:none;font-family:${font};font-size:12px;" target="_blank">${S.linkedin_label}</a>`);
        if (v.github) links.push(`<a href="${esc(v.github)}" style="color:${color};text-decoration:none;font-family:${font};font-size:12px;" target="_blank">${S.github_label}</a>`);
        if (v.twitter) links.push(`<a href="${esc(v.twitter)}" style="color:${color};text-decoration:none;font-family:${font};font-size:12px;" target="_blank">${S.twitter_label}</a>`);
        if (v.website) links.push(`<a href="${esc(v.website)}" style="color:${color};text-decoration:none;font-family:${font};font-size:12px;" target="_blank">${S.portfolio_label}</a>`);
        return links.join(' &nbsp;|&nbsp; ');
    }

    function buildClassic(v) {
        const font = fontSel.value;
        const c = accentColor;
        let html = `<table cellpadding="0" cellspacing="0" border="0" style="font-family:${font};"><tbody>`;

        // Name + pronouns
        html += `<tr><td style="padding-bottom:4px;">`;
        html += `<span style="font-size:16px;font-weight:bold;color:#1a1a1a;">${esc(v.name)}</span>`;
        if (v.pronouns) html += ` <span style="font-size:12px;color:#888;">(${esc(v.pronouns)})</span>`;
        html += `</td></tr>`;

        // University + Major
        if (v.university || v.major) {
            html += `<tr><td style="padding-bottom:2px;">`;
            const parts = [];
            if (v.major) parts.push(`<span style="font-size:13px;color:#444;">${esc(v.major)}</span>`);
            if (v.university) parts.push(`<span style="font-size:13px;color:${c};font-weight:600;">${esc(v.university)}</span>`);
            html += parts.join(' · ');
            if (v.gradYear) html += ` <span style="font-size:12px;color:#888;">| ${esc(v.gradYear)}</span>`;
            html += `</td></tr>`;
        }

        // Separator
        html += `<tr><td style="padding:6px 0;"><div style="border-top:2px solid ${c};width:60px;"></div></td></tr>`;

        // Contact
        const contactParts = [];
        if (v.email) contactParts.push(`<a href="mailto:${esc(v.email)}" style="color:#444;text-decoration:none;font-size:12px;">${esc(v.email)}</a>`);
        if (v.phone) contactParts.push(`<span style="font-size:12px;color:#444;">${esc(v.phone)}</span>`);
        if (contactParts.length) {
            html += `<tr><td style="padding-bottom:4px;">${contactParts.join(' &nbsp;|&nbsp; ')}</td></tr>`;
        }

        // Social
        const social = buildSocialLinks(v, font, c);
        if (social) html += `<tr><td style="padding-top:2px;">${social}</td></tr>`;

        html += `</tbody></table>`;
        return html;
    }

    function buildModern(v) {
        const font = fontSel.value;
        const c = accentColor;
        let html = `<table cellpadding="0" cellspacing="0" border="0" style="font-family:${font};"><tbody><tr>`;

        // Colored sidebar
        html += `<td style="width:4px;background:${c};border-radius:2px;" width="4"></td>`;
        html += `<td style="padding-left:14px;">`;

        // Name
        html += `<div style="font-size:16px;font-weight:bold;color:#1a1a1a;margin-bottom:2px;">${esc(v.name)}`;
        if (v.pronouns) html += ` <span style="font-size:11px;color:#888;font-weight:normal;">(${esc(v.pronouns)})</span>`;
        html += `</div>`;

        // University line
        if (v.major) html += `<div style="font-size:13px;color:#444;margin-bottom:1px;">${esc(v.major)}</div>`;
        if (v.university) {
            html += `<div style="font-size:13px;color:${c};font-weight:600;margin-bottom:1px;">${esc(v.university)}`;
            if (v.gradYear) html += ` <span style="color:#888;font-weight:normal;font-size:12px;">· ${esc(v.gradYear)}</span>`;
            html += `</div>`;
        }

        // Contact
        const contactParts = [];
        if (v.email) contactParts.push(`<a href="mailto:${esc(v.email)}" style="color:#444;text-decoration:none;font-size:12px;">${esc(v.email)}</a>`);
        if (v.phone) contactParts.push(`<span style="font-size:12px;color:#444;">${esc(v.phone)}</span>`);
        if (contactParts.length) html += `<div style="margin-top:4px;">${contactParts.join(' &nbsp;|&nbsp; ')}</div>`;

        // Social
        const social = buildSocialLinks(v, font, c);
        if (social) html += `<div style="margin-top:3px;">${social}</div>`;

        html += `</td></tr></tbody></table>`;
        return html;
    }

    function buildMinimal(v) {
        const font = fontSel.value;
        const c = accentColor;
        let lines = [];

        let nameLine = `<span style="font-size:14px;font-weight:bold;color:#1a1a1a;">${esc(v.name)}</span>`;
        if (v.pronouns) nameLine += ` <span style="font-size:11px;color:#888;">(${esc(v.pronouns)})</span>`;
        lines.push(nameLine);

        const parts = [];
        if (v.major) parts.push(esc(v.major));
        if (v.university) parts.push(esc(v.university));
        if (v.gradYear) parts.push(esc(v.gradYear));
        if (parts.length) lines.push(`<span style="font-size:12px;color:#666;">${parts.join(' · ')}</span>`);

        const contact = [];
        if (v.email) contact.push(`<a href="mailto:${esc(v.email)}" style="color:${c};text-decoration:none;font-size:12px;">${esc(v.email)}</a>`);
        if (v.phone) contact.push(`<span style="font-size:12px;color:#666;">${esc(v.phone)}</span>`);
        if (contact.length) lines.push(contact.join(' | '));

        const social = buildSocialLinks(v, font, c);
        if (social) lines.push(social);

        return `<div style="font-family:${font};line-height:1.5;">${lines.join('<br>')}</div>`;
    }

    function render() {
        const v = getValues();
        if (!v.name) { preview.innerHTML = '<p style="color:#999;font-style:italic;font-size:14px;">' + S.enter_name + '</p>'; return; }

        const template = templateSel.value;
        let html;
        if (template === 'modern') html = buildModern(v);
        else if (template === 'minimal') html = buildMinimal(v);
        else html = buildClassic(v);

        preview.innerHTML = html;
    }

    function getSignatureHtml() {
        return preview.innerHTML;
    }

    function getPlainText() {
        const v = getValues();
        let lines = [v.name];
        if (v.pronouns) lines[0] += ` (${v.pronouns})`;
        const parts = [];
        if (v.major) parts.push(v.major);
        if (v.university) parts.push(v.university);
        if (v.gradYear) parts.push(v.gradYear);
        if (parts.length) lines.push(parts.join(' · '));
        if (v.email) lines.push(v.email);
        if (v.phone) lines.push(v.phone);
        const social = [];
        if (v.linkedin) social.push(`LinkedIn: ${v.linkedin}`);
        if (v.github) social.push(`GitHub: ${v.github}`);
        if (v.twitter) social.push(`Twitter: ${v.twitter}`);
        if (v.website) social.push(`Web: ${v.website}`);
        if (social.length) lines.push(social.join(' | '));
        return lines.filter(Boolean).join('\n');
    }

    function showSuccess(msg) {
        successMessage.textContent = msg;
        successNotification.classList.remove('hidden');
        setTimeout(() => successNotification.classList.add('hidden'), 3000);
    }

    // Color picker
    colorPicker.addEventListener('click', function(e) {
        const swatch = e.target.closest('.color-swatch');
        if (!swatch) return;
        colorPicker.querySelectorAll('.color-swatch').forEach(s => s.classList.remove('active'));
        swatch.classList.add('active');
        accentColor = swatch.dataset.color;
        render();
    });

    // Copy buttons
    btnCopyHtml.addEventListener('click', function() {
        // Select the preview content and copy — this preserves rich formatting
        // so it pastes as a formatted signature in Gmail, Outlook, etc.
        const range = document.createRange();
        range.selectNodeContents(preview);
        const selection = window.getSelection();
        selection.removeAllRanges();
        selection.addRange(range);
        document.execCommand('copy');
        selection.removeAllRanges();

        const orig = this.innerHTML;
        this.innerHTML = '<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> ' + S.copied;
        setTimeout(() => { this.innerHTML = orig; }, 2000);
        showSuccess(S.copied_html);
    });

    btnCopyText.addEventListener('click', function() {
        navigator.clipboard.writeText(getPlainText()).then(() => {
            const orig = this.innerHTML;
            this.innerHTML = '<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> ' + S.copied;
            setTimeout(() => { this.innerHTML = orig; }, 2000);
            showSuccess(S.copied_text);
        });
    });

    btnCopySource.addEventListener('click', function() {
        navigator.clipboard.writeText(getSignatureHtml()).then(() => {
            const orig = this.innerHTML;
            this.innerHTML = '<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> ' + S.copied;
            setTimeout(() => { this.innerHTML = orig; }, 2000);
            showSuccess(S.copied_source);
        });
    });

    // Live update on any input change
    Object.values(fields).forEach(el => el.addEventListener('input', render));
    templateSel.addEventListener('change', render);
    fontSel.addEventListener('change', render);

    // Initial render
    render();
})();
</script>
