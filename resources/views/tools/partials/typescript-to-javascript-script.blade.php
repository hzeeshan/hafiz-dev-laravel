<script>
(function() {
    const stringsEl = document.getElementById('tool-strings');
    const S = {
        paste_ts: stringsEl?.dataset.pasteTs || 'Paste your TypeScript code here...',
        js_placeholder: stringsEl?.dataset.jsPlaceholder || 'JavaScript code will appear here...',
        please_enter_ts: stringsEl?.dataset.pleaseEnterTs || 'Please enter TypeScript code',
        conversion_error: stringsEl?.dataset.conversionError || 'Conversion error: ',
        converted_success: stringsEl?.dataset.convertedSuccess || 'TypeScript converted to JavaScript successfully!',
        nothing_to_copy: stringsEl?.dataset.nothingToCopy || 'Nothing to copy',
        copied: stringsEl?.dataset.copied || 'Copied!',
        nothing_to_download: stringsEl?.dataset.nothingToDownload || 'Nothing to download',
        js_downloaded: stringsEl?.dataset.jsDownloaded || 'JavaScript file downloaded',
        sample_loaded: stringsEl?.dataset.sampleLoaded || 'Sample TypeScript loaded — click Convert',
        file_loaded: stringsEl?.dataset.fileLoaded || 'File loaded: ',
    };

    const tsInput = document.getElementById('ts-input');
    const jsOutput = document.getElementById('js-output');
    const preserveComments = document.getElementById('preserve-comments');
    const removeModifiers = document.getElementById('remove-modifiers');
    const removeImportTypes = document.getElementById('remove-import-types');
    const convertEnums = document.getElementById('convert-enums');
    const fileUpload = document.getElementById('file-upload');
    const btnConvert = document.getElementById('btn-convert');
    const btnCopy = document.getElementById('btn-copy');
    const btnDownload = document.getElementById('btn-download');
    const btnSample = document.getElementById('btn-sample');
    const btnClear = document.getElementById('btn-clear');
    const statsBar = document.getElementById('stats-bar');
    const successNotification = document.getElementById('success-notification');
    const successMessage = document.getElementById('success-message');
    const errorNotification = document.getElementById('error-notification');
    const errorMessage = document.getElementById('error-message');

    const sampleTS = `import type { Config } from './config';
import { useState, useEffect } from 'react';

// User interface
interface User {
  id: number;
  name: string;
  email: string;
  isActive: boolean;
  address?: Address;
}

interface Address {
  street: string;
  city: string;
  zip: string;
}

// Status enum
enum Status {
  Active = 'active',
  Inactive = 'inactive',
  Pending = 'pending'
}

// Type alias
type UserRole = 'admin' | 'editor' | 'viewer';

// Generic function
function findById<T extends { id: number }>(items: T[], id: number): T | undefined {
  return items.find(item => item.id === id);
}

// Class with access modifiers
class UserService {
  private readonly apiUrl: string;
  protected users: User[] = [];

  constructor(apiUrl: string) {
    this.apiUrl = apiUrl;
  }

  public async getUser(id: number): Promise<User | null> {
    const response = await fetch(\`\${this.apiUrl}/users/\${id}\`);
    const data: User = await response.json();
    return data as User;
  }

  public addUser(user: User): void {
    this.users.push(user);
  }

  private validateEmail(email: string): boolean {
    const regex: RegExp = /^[^\\s@]+@[^\\s@]+\\.[^\\s@]+$/;
    return regex.test(email);
  }
}

// Async function with types
async function fetchUsers(): Promise<User[]> {
  const response = await fetch('/api/users');
  const users: User[] = await response.json();
  return users.filter((u: User) => u.isActive);
}

// Arrow function with generic
const sortBy = <T>(arr: T[], key: keyof T): T[] => {
  return [...arr].sort((a, b) => (a[key] > b[key] ? 1 : -1));
};

// Non-null assertion
const element = document.getElementById('app')!;
const value = element!.textContent!.trim();

// Declare statement
declare const __DEV__: boolean;
declare module 'my-module' {
  export function helper(): void;
}`;

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

    function convert() {
        const input = tsInput.value;
        if (!input.trim()) { showError(S.please_enter_ts); return; }

        try {
            let output = input;
            let interfaceCount = 0;
            let typeCount = 0;

            // Count before removal for stats
            interfaceCount = (input.match(/^(export\s+)?(interface|type)\s+\w+/gm) || []).length;

            // Step 1: Remove import type statements
            if (removeImportTypes.checked) {
                output = output.replace(/^import\s+type\s+\{[^}]*\}\s+from\s+['"][^'"]*['"];?\s*$/gm, '');
                output = output.replace(/^import\s+type\s+\w+\s+from\s+['"][^'"]*['"];?\s*$/gm, '');
            }

            // Step 2: Remove declare statements (single-line and multi-line)
            output = output.replace(/^declare\s+module\s+['"][^'"]*['"]\s*\{[\s\S]*?^\}/gm, '');
            output = output.replace(/^declare\s+.+$/gm, '');

            // Step 3: Remove interface declarations (potentially multi-line with nesting)
            output = output.replace(/^(export\s+)?interface\s+\w+(\s+extends\s+[\w,\s<>]+)?\s*\{[^}]*\}/gm, '');

            // Step 4: Remove type alias declarations
            output = output.replace(/^(export\s+)?type\s+\w+(\s*<[^>]*>)?\s*=\s*[^;]+;/gm, '');

            // Step 5: Remove enums (will convert later, after type stripping)
            // Store enum conversions to insert back after type-annotation stripping
            var enumConversions = [];
            if (convertEnums.checked) {
                output = output.replace(/^(export\s+)?enum\s+(\w+)\s*\{([\s\S]*?)\}/gm, function(match, exp, name, body) {
                    const prefix = exp || '';
                    const members = [];
                    body.split('\n').forEach(function(line) {
                        line = line.trim().replace(/,\s*$/, '');
                        if (!line) return;
                        var eqIdx = line.indexOf('=');
                        if (eqIdx !== -1) {
                            var key = line.substring(0, eqIdx).trim();
                            var val = line.substring(eqIdx + 1).trim();
                            members.push('  ' + key + ': ' + val);
                        } else if (line) {
                            members.push('  ' + line + ': ' + JSON.stringify(line));
                        }
                    });
                    var converted = prefix + 'const ' + name + ' = {\n' + members.join(',\n') + '\n};';
                    var placeholder = '___ENUM_PLACEHOLDER_' + enumConversions.length + '___';
                    enumConversions.push(converted);
                    return placeholder;
                });
            } else {
                output = output.replace(/^(export\s+)?enum\s+\w+\s*\{[\s\S]*?\}/gm, '');
            }

            // Step 6: Remove access modifiers (BEFORE type stripping so class props are bare)
            if (removeModifiers.checked) {
                output = output.replace(/\b(public|private|protected)\s+(readonly\s+)?/g, function(match, mod, ro) {
                    return ro || '';
                });
                output = output.replace(/\breadonly\s+/g, '');
            }

            // Step 7: Remove generic type parameters from functions/classes/arrows
            output = output.replace(/(function\s+\w+)\s*<(?:[^<>]|<[^<>]*>)*>/g, '$1');
            output = output.replace(/(=\s*)<(?:[^<>]|<[^<>]*>)*>\s*\(/g, '$1(');
            output = output.replace(/(class\s+\w+)\s*<(?:[^<>]|<[^<>]*>)*>/g, '$1');
            // Method generics: methodName<T>(
            output = output.replace(/(\w+)\s*<(?:[^<>]|<[^<>]*>)*>\s*\(/g, '$1(');

            // Step 8: Remove return type annotations
            output = output.replace(/\)\s*:\s*[\w<>\[\]|&\s,{}()\.'"]+(?=\s*\{)/g, ')');
            output = output.replace(/\)\s*:\s*[\w<>\[\]|&\s,{}()\.'"]+(?=\s*=>)/g, ')');

            // Step 9: Remove variable/const/let type annotations
            output = output.replace(/((?:const|let|var)\s+\w+):\s*[\w<>\[\]|&{}\s,()=>'".]+?(?=\s*=)/g, '$1');

            // Step 10: Remove class property type annotations (e.g. "  api: string;" → "  api;")
            output = output.replace(/^(\s+)(\w+)(\??)\s*:\s*[\w<>\[\]|&{}\s,()=>'".]+;/gm, '$1$2$3;');
            // Class properties with default values (e.g. "  users: User[] = [];" → "  users = [];")
            output = output.replace(/^(\s+)(\w+)(\??)\s*:\s*[\w<>\[\]|&{}\s,()=>'".]+?(?=\s*=)/gm, '$1$2$3');

            // Step 11: Remove parameter type annotations
            output = output.replace(/(\w+)(\??):\s*[\w<>\[\]|&{}\s,()=>'".]+?(?=[,)\n])/g, function(match, name, optional) {
                return name;
            });

            // Step 12: Restore enum conversions (safe from type stripping)
            enumConversions.forEach(function(converted, i) {
                output = output.replace('___ENUM_PLACEHOLDER_' + i + '___', converted);
            });

            // Step 11: Remove 'as Type' assertions
            output = output.replace(/\s+as\s+[\w<>\[\]|&{}\s,()]+(?=[;\n,)\]}])/g, '');

            // Step 12: Remove non-null assertions (! before . or [)
            output = output.replace(/!(?=\s*[\.\[])/g, '');
            // Standalone ! at end of expression (like getElementById('app')!)
            output = output.replace(/!(?=\s*[;\n,)])/g, '');

            // Step 13: Remove abstract keyword
            output = output.replace(/\babstract\s+/g, '');

            // Step 14: Remove comments if unchecked
            if (!preserveComments.checked) {
                output = output.replace(/\/\*[\s\S]*?\*\//g, '');
                output = output.replace(/\/\/.*$/gm, '');
            }

            // Step 15: Clean up empty lines (collapse 3+ newlines to 2)
            output = output.replace(/\n{3,}/g, '\n\n');
            output = output.trim();

            jsOutput.value = output;

            // Count type annotations removed (rough estimate)
            typeCount = (input.match(/:\s*[\w<>\[\]|&]+/g) || []).length;

            // Stats
            document.getElementById('stat-lines').textContent = output.split('\n').length;
            document.getElementById('stat-types').textContent = typeCount;
            document.getElementById('stat-interfaces').textContent = interfaceCount;
            const reduction = input.length > 0 ? Math.round(((input.length - output.length) / input.length) * 100) : 0;
            document.getElementById('stat-reduction').textContent = reduction + '%';
            statsBar.classList.remove('hidden');

            showSuccess(S.converted_success);
        } catch (e) {
            showError(S.conversion_error + e.message);
        }
    }

    // Events
    btnConvert.addEventListener('click', convert);

    btnCopy.addEventListener('click', function() {
        const output = jsOutput.value;
        if (!output) { showError(S.nothing_to_copy); return; }
        navigator.clipboard.writeText(output).then(() => {
            const orig = this.innerHTML;
            this.innerHTML = '<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> ' + S.copied;
            this.classList.add('text-green-400', 'border-green-400');
            setTimeout(() => { this.innerHTML = orig; this.classList.remove('text-green-400', 'border-green-400'); }, 2000);
        });
    });

    btnDownload.addEventListener('click', function() {
        const output = jsOutput.value;
        if (!output) { showError(S.nothing_to_download); return; }
        const blob = new Blob([output], { type: 'text/javascript;charset=utf-8' });
        const url = URL.createObjectURL(blob);
        const a = document.createElement('a');
        a.href = url; a.download = 'converted.js';
        document.body.appendChild(a); a.click();
        document.body.removeChild(a); URL.revokeObjectURL(url);
        showSuccess(S.js_downloaded);
    });

    btnSample.addEventListener('click', function() {
        tsInput.value = sampleTS;
        jsOutput.value = '';
        statsBar.classList.add('hidden');
        showSuccess(S.sample_loaded);
    });

    btnClear.addEventListener('click', function() {
        tsInput.value = ''; jsOutput.value = '';
        statsBar.classList.add('hidden');
        successNotification.classList.add('hidden');
        errorNotification.classList.add('hidden');
    });

    fileUpload.addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (!file) return;
        const reader = new FileReader();
        reader.onload = function(evt) {
            tsInput.value = evt.target.result;
            jsOutput.value = '';
            statsBar.classList.add('hidden');
            showSuccess(S.file_loaded + file.name);
        };
        reader.readAsText(file);
        this.value = '';
    });

    // Auto-convert on option change
    [preserveComments, removeModifiers, removeImportTypes, convertEnums].forEach(function(el) {
        el.addEventListener('change', function() { if (tsInput.value.trim()) convert(); });
    });

    // Keyboard shortcut: Ctrl/Cmd + Enter
    document.addEventListener('keydown', function(e) {
        if ((e.ctrlKey || e.metaKey) && e.key === 'Enter') { e.preventDefault(); convert(); }
    });
})();
</script>
