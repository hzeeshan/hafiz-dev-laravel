<x-layout>
    <x-slot:title>TypeScript to JavaScript Converter - Convert TS to JS Online Free | hafiz.dev</x-slot:title>
    <x-slot:description>Free online TypeScript to JavaScript converter. Remove type annotations, interfaces, enums, and generics instantly. 100% client-side — your code never leaves your browser.</x-slot:description>
    <x-slot:keywords>typescript to javascript, convert typescript to javascript, ts to js converter, remove types from typescript, typescript compiler online, strip types typescript</x-slot:keywords>
    <x-slot:canonical>{{ url('/tools/typescript-to-javascript') }}</x-slot:canonical>

    <x-slot:ogTitle>TypeScript to JavaScript Converter - Convert TS to JS Online Free | hafiz.dev</x-slot:ogTitle>
    <x-slot:ogDescription>Free online TypeScript to JavaScript converter. Remove type annotations, interfaces, enums, and generics instantly in your browser.</x-slot:ogDescription>
    <x-slot:ogType>website</x-slot:ogType>
    <x-slot:ogUrl>{{ url('/tools/typescript-to-javascript') }}</x-slot:ogUrl>

    @push('schemas')
        <script type="application/ld+json">
        {
            "@@context": "https://schema.org",
            "@@type": "SoftwareApplication",
            "name": "TypeScript to JavaScript Converter",
            "description": "Free online TypeScript to JavaScript converter. Remove type annotations, interfaces, enums, and generics to produce clean JavaScript.",
            "url": "https://hafiz.dev/tools/typescript-to-javascript",
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
                { "@@type": "ListItem", "position": 3, "name": "TypeScript to JavaScript", "item": "https://hafiz.dev/tools/typescript-to-javascript" }
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
                    "name": "How do I convert TypeScript to JavaScript?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Paste your TypeScript code into the input field or upload a .ts file, then click 'Convert to JavaScript'. The tool instantly removes all type annotations, interfaces, enums, and other TypeScript-specific syntax, producing clean JavaScript code."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "Which TypeScript features does this converter handle?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "The converter handles type annotations, interfaces, type aliases, enums (converted to plain objects), generics, access modifiers (public/private/protected), readonly, as-assertions, non-null assertions, import type statements, and declare blocks."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "Is my code secure when using this tool?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Yes, absolutely. All conversion happens locally in your browser using JavaScript. Your code is never sent to any server, ensuring complete privacy and security for proprietary or sensitive code."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "What exactly gets removed from TypeScript code?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "The converter removes interface and type alias declarations, type annotations on variables and parameters, generic type parameters, enum declarations (replaced with JS objects), access modifiers, type assertions, non-null assertions, and import type statements."
                    }
                },
                {
                    "@@type": "Question",
                    "name": "Can I preserve comments in the output?",
                    "acceptedAnswer": {
                        "@@type": "Answer",
                        "text": "Yes! Comments are preserved by default. You can toggle the 'Preserve comments' option off if you want a clean output without any comments. Both single-line (//) and multi-line (/* */) comments are handled."
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
                    <li class="text-gold">TypeScript to JavaScript</li>
                </ol>
            </nav>

            {{-- Header --}}
            <div class="text-center mb-10">
                <h1 class="text-3xl md:text-4xl font-bold text-light mb-4">TypeScript to JavaScript Converter</h1>
                <p class="text-light-muted max-w-2xl mx-auto">
                    Convert TypeScript to plain JavaScript instantly. Strips type annotations, interfaces, enums, generics, and access modifiers. Works entirely in your browser.
                </p>
            </div>

            {{-- Main Tool Card --}}
            <div class="bg-gradient-card rounded-xl border border-gold/20 shadow-dark-card p-6 mb-8">

                <x-tool-privacy-banner />

                {{-- Options --}}
                <div class="mb-6 p-4 bg-darkBg rounded-lg border border-gold/10">
                    <div class="flex flex-wrap gap-6">
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="checkbox" id="preserve-comments" checked class="w-4 h-4 rounded border-gray-600 bg-darkBg text-gold focus:ring-gold focus:ring-offset-0 cursor-pointer">
                            <span class="text-sm text-light-muted">Preserve comments</span>
                        </label>
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="checkbox" id="remove-modifiers" checked class="w-4 h-4 rounded border-gray-600 bg-darkBg text-gold focus:ring-gold focus:ring-offset-0 cursor-pointer">
                            <span class="text-sm text-light-muted">Remove access modifiers</span>
                        </label>
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="checkbox" id="remove-import-types" checked class="w-4 h-4 rounded border-gray-600 bg-darkBg text-gold focus:ring-gold focus:ring-offset-0 cursor-pointer">
                            <span class="text-sm text-light-muted">Remove import type statements</span>
                        </label>
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="checkbox" id="convert-enums" checked class="w-4 h-4 rounded border-gray-600 bg-darkBg text-gold focus:ring-gold focus:ring-offset-0 cursor-pointer">
                            <span class="text-sm text-light-muted">Convert enums to objects</span>
                        </label>
                    </div>
                </div>

                {{-- Input / Output --}}
                <div class="grid lg:grid-cols-2 gap-4 mb-6">
                    <div class="flex flex-col">
                        <div class="flex items-center justify-between mb-2">
                            <label for="ts-input" class="text-light font-semibold flex items-center gap-2">
                                <svg class="w-4 h-4 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                                TypeScript Input
                            </label>
                            <label class="px-3 py-1 border border-gold/30 text-light-muted rounded-lg hover:bg-gold/10 hover:text-gold transition-all text-xs flex items-center gap-1 cursor-pointer">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path></svg>
                                Upload .ts
                                <input type="file" id="file-upload" accept=".ts,.tsx" class="hidden">
                            </label>
                        </div>
                        <textarea
                            id="ts-input"
                            class="flex-1 min-h-[400px] bg-darkBg border border-gold/20 rounded-lg p-4 font-mono text-sm text-light placeholder-light-muted/50 focus:border-gold focus:outline-none focus:ring-1 focus:ring-gold/30 resize-none"
                            placeholder="Paste your TypeScript code here..."
                            spellcheck="false"
                        ></textarea>
                    </div>

                    <div class="flex flex-col">
                        <label class="text-light font-semibold mb-2 flex items-center gap-2">
                            <svg class="w-4 h-4 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path></svg>
                            JavaScript Output
                        </label>
                        <textarea
                            id="js-output"
                            class="flex-1 min-h-[400px] bg-darkBg border border-gold/20 rounded-lg p-4 font-mono text-sm text-light placeholder-light-muted/50 focus:border-gold/50 focus:outline-none resize-none"
                            placeholder="JavaScript code will appear here..."
                            readonly
                        ></textarea>
                    </div>
                </div>

                {{-- Action Buttons --}}
                <div class="flex flex-wrap gap-3 mb-6">
                    <button id="btn-convert" class="px-6 py-3 bg-gold text-darkBg font-semibold rounded-lg hover:bg-gold-light transition-all duration-300 flex items-center gap-2 cursor-pointer">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                        Convert to JavaScript
                    </button>
                    <button id="btn-copy" class="px-4 py-3 border border-gold/50 text-light rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                        Copy
                    </button>
                    <button id="btn-download" class="px-4 py-3 border border-gold/50 text-light rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                        Download .js
                    </button>
                    <button id="btn-sample" class="px-4 py-3 border border-gold/50 text-light rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                        Sample
                    </button>
                    <button id="btn-clear" class="px-4 py-3 border border-gold/50 text-light rounded-lg hover:bg-gold/10 hover:text-gold transition-all duration-300 flex items-center gap-2 cursor-pointer">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                        Clear
                    </button>
                </div>

                {{-- Stats --}}
                <div id="stats-bar" class="hidden bg-darkBg rounded-lg p-4 border border-gold/10">
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                        <div class="text-center">
                            <div id="stat-lines" class="text-2xl font-bold text-gold mb-1">0</div>
                            <div class="text-light-muted text-sm">Lines</div>
                        </div>
                        <div class="text-center">
                            <div id="stat-types" class="text-2xl font-bold text-light mb-1">0</div>
                            <div class="text-light-muted text-sm">Types Removed</div>
                        </div>
                        <div class="text-center">
                            <div id="stat-interfaces" class="text-2xl font-bold text-light mb-1">0</div>
                            <div class="text-light-muted text-sm">Interfaces Removed</div>
                        </div>
                        <div class="text-center">
                            <div id="stat-reduction" class="text-2xl font-bold text-light mb-1">0%</div>
                            <div class="text-light-muted text-sm">Size Reduction</div>
                        </div>
                    </div>
                </div>

                {{-- Notifications --}}
                <div id="success-notification" class="hidden mt-4 p-3 rounded-lg bg-green-500/10 border border-green-500/30">
                    <div class="flex items-center gap-2">
                        <svg class="w-4 h-4 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        <span id="success-message" class="text-green-400 text-sm"></span>
                    </div>
                </div>
                <div id="error-notification" class="hidden mt-4 p-3 rounded-lg bg-red-500/10 border border-red-500/30">
                    <div class="flex items-center gap-2">
                        <svg class="w-4 h-4 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <span id="error-message" class="text-red-400 text-sm"></span>
                    </div>
                </div>
            </div>

            {{-- Related Tools --}}
            <x-related-tools :tool="$tool" />

            {{-- Features Section --}}
            <div class="grid md:grid-cols-3 gap-6 mb-12">
                <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card">
                    <div class="text-gold text-2xl mb-3">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                    </div>
                    <h3 class="text-lg font-semibold text-light mb-2">Fast & Accurate</h3>
                    <p class="text-light-muted text-sm">Instantly converts TypeScript to clean JavaScript. Handles interfaces, enums, generics, decorators, access modifiers, and type assertions.</p>
                </div>
                <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card">
                    <div class="text-gold text-2xl mb-3">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"></path></svg>
                    </div>
                    <h3 class="text-lg font-semibold text-light mb-2">Configurable Output</h3>
                    <p class="text-light-muted text-sm">Preserve or strip comments, convert enums to JS objects, remove access modifiers, and handle import type statements.</p>
                </div>
                <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card">
                    <div class="text-gold text-2xl mb-3">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                    </div>
                    <h3 class="text-lg font-semibold text-light mb-2">100% Private</h3>
                    <p class="text-light-muted text-sm">All processing happens in your browser. Your code never leaves your device — completely secure for proprietary codebases.</p>
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
                            <span class="text-light font-medium">How do I convert TypeScript to JavaScript?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">Paste your TypeScript code into the input field or upload a .ts/.tsx file. Click "Convert to JavaScript" and the tool instantly strips all type annotations, interfaces, enums, and other TypeScript-specific syntax, producing clean JavaScript output.</div>
                    </details>
                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">Which TypeScript features are supported?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">The converter handles type annotations, interfaces, type aliases, enums (converted to plain objects), generics, access modifiers (public/private/protected), readonly, as-assertions, non-null assertions, import type statements, declare blocks, and abstract classes.</div>
                    </details>
                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">Is my code secure?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">Absolutely. All conversion happens locally in your browser using JavaScript. Your code is never uploaded to any server, ensuring complete privacy and security for proprietary or sensitive codebases.</div>
                    </details>
                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">What exactly gets removed from TypeScript code?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">Interface and type alias declarations are removed entirely. Type annotations on variables, parameters, and return types are stripped. Enums are converted to plain JavaScript objects. Access modifiers (public, private, protected), readonly, as-type assertions, non-null assertions (!), and import type statements are all removed.</div>
                    </details>
                    <details class="group">
                        <summary class="flex items-center justify-between cursor-pointer p-4 bg-darkBg rounded-lg border border-gold/10 hover:border-gold/30 transition-colors">
                            <span class="text-light font-medium">Can I preserve comments in the output?</span>
                            <svg class="w-5 h-5 text-gold transform group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="p-4 text-light-muted text-sm leading-relaxed">Yes! Comments are preserved by default. Uncheck "Preserve comments" if you want a clean output without any comments. Both single-line (//) and multi-line (/* */) comments are handled correctly.</div>
                    </details>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
    (function() {
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
            if (!input.trim()) { showError('Please enter TypeScript code'); return; }

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

                showSuccess('TypeScript converted to JavaScript successfully!');
            } catch (e) {
                showError('Conversion error: ' + e.message);
            }
        }

        // Events
        btnConvert.addEventListener('click', convert);

        btnCopy.addEventListener('click', function() {
            const output = jsOutput.value;
            if (!output) { showError('Nothing to copy'); return; }
            navigator.clipboard.writeText(output).then(() => {
                const orig = this.innerHTML;
                this.innerHTML = '<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> Copied!';
                this.classList.add('text-green-400', 'border-green-400');
                setTimeout(() => { this.innerHTML = orig; this.classList.remove('text-green-400', 'border-green-400'); }, 2000);
            });
        });

        btnDownload.addEventListener('click', function() {
            const output = jsOutput.value;
            if (!output) { showError('Nothing to download'); return; }
            const blob = new Blob([output], { type: 'text/javascript;charset=utf-8' });
            const url = URL.createObjectURL(blob);
            const a = document.createElement('a');
            a.href = url; a.download = 'converted.js';
            document.body.appendChild(a); a.click();
            document.body.removeChild(a); URL.revokeObjectURL(url);
            showSuccess('JavaScript file downloaded');
        });

        btnSample.addEventListener('click', function() {
            tsInput.value = sampleTS;
            jsOutput.value = '';
            statsBar.classList.add('hidden');
            showSuccess('Sample TypeScript loaded — click Convert');
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
                showSuccess('File loaded: ' + file.name);
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
    @endpush
</x-layout>
