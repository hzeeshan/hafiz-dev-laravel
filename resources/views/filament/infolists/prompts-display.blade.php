@php
    $prompts = $prompts ?? $getState() ?? null;
@endphp

<div class="space-y-6">
    @if($prompts)
        @foreach($prompts as $key => $promptData)
            <div x-data="{ copied: false }" class="border-b pb-6 last:border-b-0 last:pb-0">
                <div class="flex items-start justify-between gap-4 mb-3">
                    <div class="flex-1 min-w-0">
                        <h4 class="text-sm font-semibold text-gray-950 dark:text-white">
                            {{ $promptData['description'] ?? ucfirst($key) . ' Prompt' }}
                        </h4>
                        <div class="flex flex-wrap gap-2 mt-2">
                            @if(isset($promptData['model']))
                                <span class="fi-badge fi-badge-sm fi-color-gray">
                                    <span class="fi-badge-wrapper">{{ $promptData['model'] }}</span>
                                </span>
                            @endif
                            @if(isset($promptData['provider']))
                                <span class="fi-badge fi-badge-sm fi-color-primary">
                                    <span class="fi-badge-wrapper">{{ class_basename($promptData['provider']) }}</span>
                                </span>
                            @endif
                        </div>
                    </div>
                    <button
                        type="button"
                        @click="navigator.clipboard.writeText($refs.prompt{{ $key }}.textContent); copied = true; setTimeout(() => copied = false, 2000)"
                        class="fi-icon-btn relative flex items-center justify-center rounded-lg outline-none transition duration-75 focus-visible:ring-2 h-9 w-9 shrink-0"
                        :class="copied ? 'text-success-600 dark:text-success-400' : 'text-gray-400 hover:text-gray-500 dark:text-gray-500 dark:hover:text-gray-400'"
                    >
                        <svg x-show="!copied" class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.666 3.888A2.25 2.25 0 0 0 13.5 2.25h-3c-1.03 0-1.9.693-2.166 1.638m7.332 0c.055.194.084.4.084.612v0a.75.75 0 0 1-.75.75H9a.75.75 0 0 1-.75-.75v0c0-.212.03-.418.084-.612m7.332 0c.646.049 1.288.11 1.927.184 1.1.128 1.907 1.077 1.907 2.185V19.5a2.25 2.25 0 0 1-2.25 2.25H6.75A2.25 2.25 0 0 1 4.5 19.5V6.257c0-1.108.806-2.057 1.907-2.185a48.208 48.208 0 0 1 1.927-.184" />
                        </svg>
                        <svg x-show="copied" x-cloak class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </button>
                </div>
                <div class="overflow-x-auto">
                    <pre x-ref="prompt{{ $key }}" class="text-sm text-gray-700 dark:text-gray-300 whitespace-pre-wrap font-mono leading-relaxed p-4 bg-gray-50 dark:bg-gray-950/50 rounded-lg border border-gray-200 dark:border-gray-700 max-w-full" style="word-break: break-word; overflow-wrap: anywhere;">{{ $promptData['prompt'] ?? 'N/A' }}</pre>
                </div>
            </div>
        @endforeach
    @else
        <div class="text-center py-8 text-gray-500 dark:text-gray-400">
            No prompts available for this generation.
        </div>
    @endif
</div>
