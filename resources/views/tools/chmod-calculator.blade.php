<x-layout>
    <x-slot:title>Chmod Calculator - Linux File Permissions Calculator Online Free | hafiz.dev</x-slot:title>
    <x-slot:description>Free online chmod calculator. Calculate Linux file permissions with an interactive checkbox grid. Convert between symbolic (rwxr-xr-x) and octal (755) notation instantly.</x-slot:description>
    <x-slot:keywords>chmod calculator, chmod calculator online, linux chmod calculator, file permissions calculator, chmod 755, chmod 644, unix permissions</x-slot:keywords>
    <x-slot:canonical>{{ url('/tools/chmod-calculator') }}</x-slot:canonical>

    <x-slot:ogTitle>Chmod Calculator - Linux File Permissions Calculator Online Free | hafiz.dev</x-slot:ogTitle>
    <x-slot:ogDescription>Free online chmod calculator. Convert between symbolic and octal Linux file permissions with an interactive visual grid.</x-slot:ogDescription>
    <x-slot:ogType>website</x-slot:ogType>
    <x-slot:ogUrl>{{ url('/tools/chmod-calculator') }}</x-slot:ogUrl>

    @push('schemas')
        <script type="application/ld+json">
        {
            "@@context": "https://schema.org",
            "@@type": "SoftwareApplication",
            "name": "Chmod Calculator",
            "description": "Free online chmod calculator. Calculate Linux file permissions interactively.",
            "url": "https://hafiz.dev/tools/chmod-calculator",
            "applicationCategory": "DeveloperApplication",
            "operatingSystem": "Any",
            "offers": { "@@type": "Offer", "price": "0", "priceCurrency": "USD" },
            "author": { "@@type": "Person", "name": "Hafiz Riaz", "url": "https://hafiz.dev" }
        }
        </script>
        <script type="application/ld+json">
        {
            "@@context": "https://schema.org",
            "@@type": "BreadcrumbList",
            "itemListElement": [
                { "@@type": "ListItem", "position": 1, "name": "Home", "item": "https://hafiz.dev" },
                { "@@type": "ListItem", "position": 2, "name": "Tools", "item": "https://hafiz.dev/tools" },
                { "@@type": "ListItem", "position": 3, "name": "Chmod Calculator", "item": "https://hafiz.dev/tools/chmod-calculator" }
            ]
        }
        </script>
        <script type="application/ld+json">
        {
            "@@context": "https://schema.org",
            "@@type": "FAQPage",
            "mainEntity": [
                {
                    "@@type": "Question",
                    "name": "What does chmod 755 mean?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "chmod 755 means the owner has full permissions (read, write, execute = 7), while group and others have read and execute permissions (5). In symbolic notation this is rwxr-xr-x. This is the standard permission for directories and executable scripts."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "What does chmod 644 mean?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "chmod 644 means the owner can read and write (6), while group and others can only read (4). In symbolic notation this is rw-r--r--. This is the standard permission for regular files like HTML, CSS, PHP, and configuration files."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "How do Linux file permissions work?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Linux file permissions control who can read (r=4), write (w=2), and execute (x=1) files. Permissions are set for three groups: owner, group, and others. Each group gets a number from 0-7 by adding the values of allowed permissions."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "What is the difference between symbolic and octal notation?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Octal notation uses three digits (e.g., 755) where each digit represents permissions for owner, group, and others. Symbolic notation uses letters (e.g., rwxr-xr-x) where r=read, w=write, x=execute, and - means no permission."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "Why should I avoid chmod 777?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "chmod 777 gives everyone full read, write, and execute permissions, which is a serious security risk. Any user on the system can modify or delete the file. Use 755 for directories and 644 for files as secure defaults."
                    }
                }
            ]
        }
        </script>
    @endpush

    <div class="relative z-10 py-12 px-4">
        <div class="max-w-7xl mx-auto">
            {{-- Breadcrumb --}}
            <nav class="mb-6 text-sm" aria-label="Breadcrumb">
                <ol class="flex items-center gap-2 text-light-muted">
                    <li><a href="/" class="hover:text-gold transition-colors">Home</a></li>
                    <li><span class="text-gold/50">/</span></li>
                    <li><a href="/tools" class="hover:text-gold transition-colors">Tools</a></li>
                    <li><span class="text-gold/50">/</span></li>
                    <li class="text-gold">Chmod Calculator</li>
                </ol>
            </nav>

            {{-- Header --}}
            <div class="text-center mb-10">
                <h1 class="text-3xl md:text-4xl font-bold text-light mb-4">Chmod Calculator</h1>
                <p class="text-light-muted max-w-2xl mx-auto">
                    Calculate Linux file permissions interactively. Convert between octal (755) and symbolic (rwxr-xr-x) notation with a visual checkbox grid.
                </p>
            </div>

            {{-- Main Tool Card --}}
            <div class="bg-gradient-card rounded-xl border border-gold/20 shadow-dark-card p-6 mb-8">

                <x-tool-privacy-banner />

                {{-- Octal Input --}}
                <div class="mb-8 text-center">
                    <label class="text-light font-semibold mb-3 block text-sm">Octal Permission Code</label>
                    <div class="flex items-center justify-center gap-2">
                        <span class="text-light-muted text-lg font-mono">chmod</span>
                        <input type="text" id="octal-input" class="w-28 bg-darkBg border-2 border-gold/40 rounded-lg px-4 py-3 text-center text-light text-2xl font-mono font-bold focus:border-gold focus:outline-none tracking-widest" value="755" maxlength="4" spellcheck="false">
                        <span class="text-light-muted text-lg font-mono">filename</span>
                    </div>
                </div>

                {{-- Permission Grid --}}
                <div class="overflow-x-auto mb-8">
                    <table class="w-full max-w-2xl mx-auto">
                        <thead>
                            <tr>
                                <th class="text-left text-light-muted text-sm font-medium py-2 px-3 w-28"></th>
                                <th class="text-center text-light text-sm font-semibold py-2 px-3">Read (4)</th>
                                <th class="text-center text-light text-sm font-semibold py-2 px-3">Write (2)</th>
                                <th class="text-center text-light text-sm font-semibold py-2 px-3">Execute (1)</th>
                                <th class="text-center text-light-muted text-sm font-medium py-2 px-3 w-20">Octal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="border-t border-gold/10">
                                <td class="py-4 px-3">
                                    <span class="text-gold font-semibold text-sm">Owner</span>
                                    <span class="text-light-muted text-xs block">User</span>
                                </td>
                                <td class="text-center py-4 px-3"><input type="checkbox" id="owner-r" data-who="owner" data-perm="r" class="perm-cb w-6 h-6 rounded border-gray-600 bg-darkBg text-gold focus:ring-gold focus:ring-offset-0 cursor-pointer" checked></td>
                                <td class="text-center py-4 px-3"><input type="checkbox" id="owner-w" data-who="owner" data-perm="w" class="perm-cb w-6 h-6 rounded border-gray-600 bg-darkBg text-gold focus:ring-gold focus:ring-offset-0 cursor-pointer" checked></td>
                                <td class="text-center py-4 px-3"><input type="checkbox" id="owner-x" data-who="owner" data-perm="x" class="perm-cb w-6 h-6 rounded border-gray-600 bg-darkBg text-gold focus:ring-gold focus:ring-offset-0 cursor-pointer" checked></td>
                                <td class="text-center py-4 px-3"><span id="owner-octal" class="text-2xl font-bold text-gold font-mono">7</span></td>
                            </tr>
                            <tr class="border-t border-gold/10">
                                <td class="py-4 px-3">
                                    <span class="text-blue-400 font-semibold text-sm">Group</span>
                                </td>
                                <td class="text-center py-4 px-3"><input type="checkbox" id="group-r" data-who="group" data-perm="r" class="perm-cb w-6 h-6 rounded border-gray-600 bg-darkBg text-blue-500 focus:ring-blue-500 focus:ring-offset-0 cursor-pointer" checked></td>
                                <td class="text-center py-4 px-3"><input type="checkbox" id="group-w" data-who="group" data-perm="w" class="perm-cb w-6 h-6 rounded border-gray-600 bg-darkBg text-blue-500 focus:ring-blue-500 focus:ring-offset-0 cursor-pointer"></td>
                                <td class="text-center py-4 px-3"><input type="checkbox" id="group-x" data-who="group" data-perm="x" class="perm-cb w-6 h-6 rounded border-gray-600 bg-darkBg text-blue-500 focus:ring-blue-500 focus:ring-offset-0 cursor-pointer" checked></td>
                                <td class="text-center py-4 px-3"><span id="group-octal" class="text-2xl font-bold text-blue-400 font-mono">5</span></td>
                            </tr>
                            <tr class="border-t border-gold/10">
                                <td class="py-4 px-3">
                                    <span class="text-green-400 font-semibold text-sm">Others</span>
                                    <span class="text-light-muted text-xs block">Public</span>
                                </td>
                                <td class="text-center py-4 px-3"><input type="checkbox" id="others-r" data-who="others" data-perm="r" class="perm-cb w-6 h-6 rounded border-gray-600 bg-darkBg text-green-500 focus:ring-green-500 focus:ring-offset-0 cursor-pointer" checked></td>
                                <td class="text-center py-4 px-3"><input type="checkbox" id="others-w" data-who="others" data-perm="w" class="perm-cb w-6 h-6 rounded border-gray-600 bg-darkBg text-green-500 focus:ring-green-500 focus:ring-offset-0 cursor-pointer"></td>
                                <td class="text-center py-4 px-3"><input type="checkbox" id="others-x" data-who="others" data-perm="x" class="perm-cb w-6 h-6 rounded border-gray-600 bg-darkBg text-green-500 focus:ring-green-500 focus:ring-offset-0 cursor-pointer" checked></td>
                                <td class="text-center py-4 px-3"><span id="others-octal" class="text-2xl font-bold text-green-400 font-mono">5</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                {{-- Results --}}
                <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
                    <div class="bg-darkBg rounded-lg p-4 border border-gold/10 text-center">
                        <div class="text-light-muted text-xs mb-1">Octal</div>
                        <div id="result-octal" class="text-3xl font-bold text-gold font-mono cursor-pointer hover:text-gold-light transition-colors" title="Click to copy">755</div>
                    </div>
                    <div class="bg-darkBg rounded-lg p-4 border border-gold/10 text-center">
                        <div class="text-light-muted text-xs mb-1">Symbolic</div>
                        <div id="result-symbolic" class="text-xl font-bold text-light font-mono cursor-pointer hover:text-gold transition-colors" title="Click to copy">rwxr-xr-x</div>
                    </div>
                    <div class="bg-darkBg rounded-lg p-4 border border-gold/10 text-center">
                        <div class="text-light-muted text-xs mb-1">chmod Command</div>
                        <div id="result-command" class="text-sm font-bold text-light font-mono cursor-pointer hover:text-gold transition-colors" title="Click to copy">chmod 755 file</div>
                    </div>
                    <div class="bg-darkBg rounded-lg p-4 border border-gold/10 text-center">
                        <div class="text-light-muted text-xs mb-1">File Type</div>
                        <div id="result-filetype" class="text-sm font-bold text-light">-rwxr-xr-x</div>
                    </div>
                </div>

                {{-- Quick Presets --}}
                <div class="mb-6">
                    <h3 class="text-light font-semibold text-sm mb-3">Common Presets</h3>
                    <div class="flex flex-wrap gap-2">
                        <button class="preset-btn px-3 py-2 bg-darkBg border border-gold/20 rounded-lg text-light text-sm font-mono hover:border-gold/50 hover:text-gold transition-all cursor-pointer" data-octal="755">755 <span class="text-light-muted text-xs">dirs</span></button>
                        <button class="preset-btn px-3 py-2 bg-darkBg border border-gold/20 rounded-lg text-light text-sm font-mono hover:border-gold/50 hover:text-gold transition-all cursor-pointer" data-octal="644">644 <span class="text-light-muted text-xs">files</span></button>
                        <button class="preset-btn px-3 py-2 bg-darkBg border border-gold/20 rounded-lg text-light text-sm font-mono hover:border-gold/50 hover:text-gold transition-all cursor-pointer" data-octal="700">700 <span class="text-light-muted text-xs">private</span></button>
                        <button class="preset-btn px-3 py-2 bg-darkBg border border-gold/20 rounded-lg text-light text-sm font-mono hover:border-gold/50 hover:text-gold transition-all cursor-pointer" data-octal="600">600 <span class="text-light-muted text-xs">ssh keys</span></button>
                        <button class="preset-btn px-3 py-2 bg-darkBg border border-gold/20 rounded-lg text-light text-sm font-mono hover:border-gold/50 hover:text-gold transition-all cursor-pointer" data-octal="775">775 <span class="text-light-muted text-xs">shared</span></button>
                        <button class="preset-btn px-3 py-2 bg-darkBg border border-gold/20 rounded-lg text-light text-sm font-mono hover:border-gold/50 hover:text-gold transition-all cursor-pointer" data-octal="444">444 <span class="text-light-muted text-xs">read-only</span></button>
                        <button class="preset-btn px-3 py-2 bg-darkBg border border-red-500/30 rounded-lg text-red-400 text-sm font-mono hover:border-red-500/50 transition-all cursor-pointer" data-octal="777">777 <span class="text-red-400/60 text-xs">⚠ dangerous</span></button>
                        <button class="preset-btn px-3 py-2 bg-darkBg border border-gold/20 rounded-lg text-light text-sm font-mono hover:border-gold/50 hover:text-gold transition-all cursor-pointer" data-octal="000">000 <span class="text-light-muted text-xs">none</span></button>
                    </div>
                </div>

                {{-- Security Warning --}}
                <div id="security-warning" class="hidden p-3 rounded-lg bg-red-500/10 border border-red-500/30">
                    <div class="flex items-center gap-2">
                        <svg class="w-4 h-4 text-red-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L4.082 16.5c-.77.833.192 2.5 1.732 2.5z"></path></svg>
                        <span id="security-message" class="text-red-400 text-sm"></span>
                    </div>
                </div>

                {{-- Copy notification --}}
                <div id="success-notification" class="hidden mt-4 p-3 rounded-lg bg-green-500/10 border border-green-500/30">
                    <div class="flex items-center gap-2">
                        <svg class="w-4 h-4 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        <span id="success-message" class="text-green-400 text-sm"></span>
                    </div>
                </div>
            </div>

            {{-- Permission Reference Table --}}
            <div class="bg-gradient-card rounded-xl border border-gold/20 shadow-dark-card p-6 mb-8">
                <h2 class="text-lg font-bold text-light mb-4">Permission Reference</h2>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm">
                        <thead>
                            <tr class="border-b border-gold/20">
                                <th class="text-left text-light py-2 px-3">Octal</th>
                                <th class="text-left text-light py-2 px-3">Symbolic</th>
                                <th class="text-left text-light py-2 px-3">Permissions</th>
                                <th class="text-left text-light py-2 px-3">Common Use</th>
                            </tr>
                        </thead>
                        <tbody class="text-light-muted">
                            <tr class="border-b border-gold/10"><td class="py-2 px-3 font-mono text-gold">7</td><td class="py-2 px-3 font-mono">rwx</td><td class="py-2 px-3">Read + Write + Execute</td><td class="py-2 px-3">Owner of directories</td></tr>
                            <tr class="border-b border-gold/10"><td class="py-2 px-3 font-mono text-gold">6</td><td class="py-2 px-3 font-mono">rw-</td><td class="py-2 px-3">Read + Write</td><td class="py-2 px-3">Owner of regular files</td></tr>
                            <tr class="border-b border-gold/10"><td class="py-2 px-3 font-mono text-gold">5</td><td class="py-2 px-3 font-mono">r-x</td><td class="py-2 px-3">Read + Execute</td><td class="py-2 px-3">Group/others for directories</td></tr>
                            <tr class="border-b border-gold/10"><td class="py-2 px-3 font-mono text-gold">4</td><td class="py-2 px-3 font-mono">r--</td><td class="py-2 px-3">Read only</td><td class="py-2 px-3">Group/others for files</td></tr>
                            <tr class="border-b border-gold/10"><td class="py-2 px-3 font-mono text-gold">3</td><td class="py-2 px-3 font-mono">-wx</td><td class="py-2 px-3">Write + Execute</td><td class="py-2 px-3">Rarely used</td></tr>
                            <tr class="border-b border-gold/10"><td class="py-2 px-3 font-mono text-gold">2</td><td class="py-2 px-3 font-mono">-w-</td><td class="py-2 px-3">Write only</td><td class="py-2 px-3">Rarely used</td></tr>
                            <tr class="border-b border-gold/10"><td class="py-2 px-3 font-mono text-gold">1</td><td class="py-2 px-3 font-mono">--x</td><td class="py-2 px-3">Execute only</td><td class="py-2 px-3">Restricted scripts</td></tr>
                            <tr><td class="py-2 px-3 font-mono text-gold">0</td><td class="py-2 px-3 font-mono">---</td><td class="py-2 px-3">No permissions</td><td class="py-2 px-3">Blocked access</td></tr>
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- Related Tools --}}
            <x-related-tools :tool="$tool" />

            {{-- Features Section --}}
            <div class="grid md:grid-cols-3 gap-6 mb-12">
                <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card">
                    <div class="text-gold text-2xl mb-3">🔒</div>
                    <h3 class="text-lg font-semibold text-light mb-2">Visual Permissions</h3>
                    <p class="text-light-muted text-sm">Interactive checkbox grid makes it easy to understand and set permissions for owner, group, and others. Color-coded for clarity.</p>
                </div>
                <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card">
                    <div class="text-gold text-2xl mb-3">⚡</div>
                    <h3 class="text-lg font-semibold text-light mb-2">Quick Presets</h3>
                    <p class="text-light-muted text-sm">One-click presets for common permissions: 755 for directories, 644 for files, 600 for SSH keys, with security warnings for risky settings.</p>
                </div>
                <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card">
                    <div class="text-gold text-2xl mb-3">📋</div>
                    <h3 class="text-lg font-semibold text-light mb-2">Click to Copy</h3>
                    <p class="text-light-muted text-sm">Click any result value to copy it instantly. Get the octal code, symbolic notation, or the full chmod command ready to paste in your terminal.</p>
                </div>
            </div>

            {{-- Dynamic CTA --}}
            <x-tool-cta />

            {{-- FAQ Section --}}
            <div class="bg-gradient-card rounded-xl border border-gold/20 shadow-dark-card p-8">
                <h2 class="text-2xl font-bold text-light mb-6 text-center">Frequently Asked Questions</h2>
                <div class="space-y-4 max-w-3xl mx-auto">
                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">What does chmod 755 mean?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">chmod 755 gives the owner full permissions (read, write, execute = 7), and group and others get read and execute (5). In symbolic notation: rwxr-xr-x. This is the standard for directories and executable scripts.</div>
                    </details>
                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">What does chmod 644 mean?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">chmod 644 gives the owner read and write (6), and group and others read only (4). Symbolic: rw-r--r--. This is the standard for regular files like HTML, CSS, PHP, images, and config files.</div>
                    </details>
                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">How do Linux file permissions work?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">Each file has three permission groups: owner, group, and others. Each group can have read (r=4), write (w=2), and execute (x=1) permissions. Add the values together: rwx = 4+2+1 = 7, r-x = 4+0+1 = 5, r-- = 4+0+0 = 4.</div>
                    </details>
                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">What is the difference between symbolic and octal notation?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">Octal uses digits 0-7 (e.g., 755) where each position is owner, group, others. Symbolic uses letters r, w, x with dashes (e.g., rwxr-xr-x). Both represent the same permissions — octal is used with chmod commands, symbolic is shown by <code class="bg-darkCard px-1 rounded">ls -la</code>.</div>
                    </details>
                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">Why should I avoid chmod 777?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">chmod 777 gives all users full read, write, and execute permissions. This is a major security risk — any user on the system can modify, delete, or execute the file. Use 755 for directories and scripts, 644 for regular files.</div>
                    </details>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
    (function() {
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
            if (octal === '777') warnings.push('chmod 777 is a security risk! All users can read, write, and execute. Use 755 for directories or 644 for files instead.');
            else if (octal === '666') warnings.push('chmod 666 allows all users to read and write. Consider 644 (owner write, others read-only).');
            else if (octal[2] >= '6') warnings.push('World-writable files are a security risk. Public users can modify this file.');
            else if (octal === '000') warnings.push('No one can access this file, including the owner. You\'ll need root (sudo) to change permissions.');

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
                    showSuccess('Copied: ' + this.textContent);
                });
            });
        });

        // Initialize
        updateFromCheckboxes();
    })();
    </script>
    @endpush
</x-layout>
