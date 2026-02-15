<script>
(function() {
    const stringsEl = document.getElementById('tool-strings');
    const S = {
        nothing_to_copy: stringsEl?.dataset.nothingToCopy || 'Nothing to copy',
        copied: stringsEl?.dataset.copied || 'Copied!',
        invalid_ip: stringsEl?.dataset.invalidIp || 'Invalid IPv4 address. Use format: 0-255.0-255.0-255.0-255',
        converted: stringsEl?.dataset.converted || 'Converted {ip} to binary',
        copy_binary: stringsEl?.dataset.copyBinary || 'Copy Binary',
        full_binary: stringsEl?.dataset.fullBinary || 'Full 32-bit Binary',
        dotted_binary: stringsEl?.dataset.dottedBinary || 'Dotted Binary Notation',
        network_bits_gold: stringsEl?.dataset.networkBitsGold || 'Network bits (gold)',
        host_bits_dimmed: stringsEl?.dataset.hostBitsDimmed || 'Host bits (dimmed)',
        usable_hosts: stringsEl?.dataset.usableHosts || '{count} usable hosts',
        bits: stringsEl?.dataset.bits || 'bits',
    };

    const ipInput = document.getElementById('ip-input');
    const cidrInput = document.getElementById('cidr-input');
    const btnCopy = document.getElementById('btn-copy');
    const btnSample = document.getElementById('btn-sample');
    const btnClear = document.getElementById('btn-clear');
    const outputSection = document.getElementById('output-section');
    const fullBinary = document.getElementById('full-binary');
    const dottedBinary = document.getElementById('dotted-binary');
    const octetBody = document.getElementById('octet-body');
    const subnetSection = document.getElementById('subnet-section');
    const successNotification = document.getElementById('success-notification');
    const successMessage = document.getElementById('success-message');
    const errorNotification = document.getElementById('error-notification');
    const errorMessage = document.getElementById('error-message');

    function parseIP(str) {
        const trimmed = str.trim();
        if (!trimmed) return null;

        const parts = trimmed.split('.');
        if (parts.length !== 4) return null;

        const octets = parts.map(p => {
            const n = parseInt(p, 10);
            if (isNaN(n) || n < 0 || n > 255 || p !== String(n)) return -1;
            return n;
        });

        if (octets.some(o => o === -1)) return null;
        return octets;
    }

    function octetToBinary(n) {
        return n.toString(2).padStart(8, '0');
    }

    function octetToHex(n) {
        return n.toString(16).toUpperCase().padStart(2, '0');
    }

    function ipToInt(octets) {
        return ((octets[0] << 24) | (octets[1] << 16) | (octets[2] << 8) | octets[3]) >>> 0;
    }

    function intToIP(n) {
        return [(n >>> 24) & 255, (n >>> 16) & 255, (n >>> 8) & 255, n & 255].join('.');
    }

    function convert() {
        const octets = parseIP(ipInput.value);
        if (!octets) {
            if (ipInput.value.trim()) {
                showError(S.invalid_ip);
            }
            outputSection.classList.add('hidden');
            return;
        }

        const binaryOctets = octets.map(octetToBinary);

        // Full binary
        fullBinary.textContent = binaryOctets.join('');

        // Dotted binary
        dottedBinary.textContent = binaryOctets.join('.');

        // Octet breakdown table
        octetBody.innerHTML = octets.map((o, i) =>
            `<tr class="hover:bg-gold/5 transition-colors">
                <td class="px-4 py-2 font-mono text-gold font-bold">${i + 1}</td>
                <td class="px-4 py-2 font-mono text-light">${o}</td>
                <td class="px-4 py-2 font-mono text-light-muted">${binaryOctets[i]}</td>
                <td class="px-4 py-2 font-mono text-light-muted">0x${octetToHex(o)}</td>
            </tr>`
        ).join('');

        // Subnet info
        const cidr = cidrInput.value;
        if (cidr) {
            const prefix = parseInt(cidr, 10);
            const maskInt = prefix === 0 ? 0 : (0xFFFFFFFF << (32 - prefix)) >>> 0;
            const ipInt = ipToInt(octets);
            const networkInt = (ipInt & maskInt) >>> 0;
            const broadcastInt = (networkInt | (~maskInt >>> 0)) >>> 0;

            document.getElementById('subnet-mask').textContent = intToIP(maskInt);
            document.getElementById('cidr-display').textContent = ipInput.value.trim() + '/' + prefix;
            document.getElementById('network-addr').textContent = intToIP(networkInt);
            document.getElementById('broadcast-addr').textContent = intToIP(broadcastInt);
            document.getElementById('network-bits').textContent = prefix + ' ' + S.bits;
            document.getElementById('host-bits').textContent = (32 - prefix) + ' ' + S.bits + ' (' + S.usable_hosts.replace('{count}', Math.pow(2, 32 - prefix) - 2) + ')';

            // Bit visualization
            const fullBits = binaryOctets.join('');
            let visual = '';
            for (let i = 0; i < 32; i++) {
                if (i > 0 && i % 8 === 0) visual += '<span class="text-light-muted/30">.</span>';
                if (i < prefix) {
                    visual += `<span class="text-gold font-bold">${fullBits[i]}</span>`;
                } else {
                    visual += `<span class="text-light-muted/50">${fullBits[i]}</span>`;
                }
            }
            visual += '<br><span class="text-xs mt-1 inline-block"><span class="text-gold">' + S.network_bits_gold + '</span> · <span class="text-light-muted/50">' + S.host_bits_dimmed + '</span></span>';
            document.getElementById('bit-visual').innerHTML = visual;

            subnetSection.classList.remove('hidden');
        } else {
            subnetSection.classList.add('hidden');
        }

        outputSection.classList.remove('hidden');
        showSuccess(S.converted.replace('{ip}', ipInput.value.trim()));
    }

    function showSuccess(msg) {
        successMessage.textContent = msg;
        successNotification.classList.remove('hidden');
        errorNotification.classList.add('hidden');
        setTimeout(() => successNotification.classList.add('hidden'), 3000);
    }

    function showError(msg) {
        errorMessage.textContent = msg;
        errorNotification.classList.remove('hidden');
        successNotification.classList.add('hidden');
        setTimeout(() => errorNotification.classList.add('hidden'), 5000);
    }

    // Event listeners
    let debounceTimer;
    ipInput.addEventListener('input', function() {
        clearTimeout(debounceTimer);
        debounceTimer = setTimeout(convert, 300);
    });

    cidrInput.addEventListener('change', function() {
        if (ipInput.value.trim()) convert();
    });

    btnCopy.addEventListener('click', function() {
        const output = fullBinary.textContent;
        if (!output) { showError(S.nothing_to_copy); return; }
        navigator.clipboard.writeText(output).then(() => {
            const orig = this.innerHTML;
            this.innerHTML = '<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> ' + S.copied;
            this.classList.add('text-green-400', 'border-green-400');
            setTimeout(() => { this.innerHTML = orig; this.classList.remove('text-green-400', 'border-green-400'); }, 2000);
        });
    });

    const sampleIPs = ['192.168.1.1', '10.0.0.1', '127.0.0.1', '8.8.8.8', '172.16.0.1', '255.255.255.0'];
    let sampleIndex = 0;
    btnSample.addEventListener('click', function() {
        ipInput.value = sampleIPs[sampleIndex % sampleIPs.length];
        sampleIndex++;
        convert();
    });

    btnClear.addEventListener('click', function() {
        ipInput.value = '';
        outputSection.classList.add('hidden');
        successNotification.classList.add('hidden');
        errorNotification.classList.add('hidden');
    });

    // Quick IP buttons
    document.querySelectorAll('.quick-ip').forEach(btn => {
        btn.addEventListener('click', function() {
            ipInput.value = this.dataset.ip;
            convert();
        });
    });

    // Keyboard shortcut
    document.addEventListener('keydown', function(e) {
        if ((e.ctrlKey || e.metaKey) && e.key === 'Enter') { e.preventDefault(); convert(); }
    });
})();
</script>
