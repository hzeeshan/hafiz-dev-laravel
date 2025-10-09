<div class="space-y-4">
    @forelse($logs as $log)
        <div class="rounded-lg border p-4 {{ $log->status === 'failed' ? 'border-red-200 bg-red-50' : 'border-gray-200 bg-gray-50' }}">
            <div class="flex items-start justify-between mb-2">
                <div>
                    <span class="inline-flex items-center rounded-md px-2 py-1 text-xs font-medium
                        {{ $log->status === 'completed' ? 'bg-green-50 text-green-700 ring-1 ring-inset ring-green-600/20' : '' }}
                        {{ $log->status === 'failed' ? 'bg-red-50 text-red-700 ring-1 ring-inset ring-red-600/20' : '' }}
                        {{ in_array($log->status, ['started', 'content_generated', 'images_generated']) ? 'bg-yellow-50 text-yellow-700 ring-1 ring-inset ring-yellow-600/20' : '' }}">
                        {{ ucfirst($log->status) }}
                    </span>
                </div>
                <span class="text-xs text-gray-500">{{ $log->created_at->diffForHumans() }}</span>
            </div>

            <div class="grid grid-cols-2 gap-4 text-sm">
                @if($log->generation_time)
                    <div>
                        <span class="font-medium text-gray-700">Time:</span>
                        <span class="text-gray-600">{{ $log->generation_time }}s</span>
                    </div>
                @endif

                @if($log->cost_tracking)
                    <div>
                        <span class="font-medium text-gray-700">Cost:</span>
                        <span class="text-gray-600">${{ number_format($log->cost_tracking['total'] ?? 0, 4) }}</span>
                    </div>
                @endif

                @if($log->ai_model)
                    <div>
                        <span class="font-medium text-gray-700">Model:</span>
                        <span class="text-gray-600">{{ $log->ai_model }}</span>
                    </div>
                @endif

                @if($log->content_tokens)
                    <div>
                        <span class="font-medium text-gray-700">Tokens:</span>
                        <span class="text-gray-600">{{ number_format($log->content_tokens) }}</span>
                    </div>
                @endif

                @if($log->image_count > 0)
                    <div>
                        <span class="font-medium text-gray-700">Images:</span>
                        <span class="text-gray-600">{{ $log->image_count }}</span>
                    </div>
                @endif
            </div>

            @if($log->error_message)
                <div class="mt-3 rounded bg-red-100 p-2">
                    <p class="text-xs font-medium text-red-800">Error:</p>
                    <p class="text-xs text-red-700 mt-1">{{ $log->error_message }}</p>
                </div>
            @endif

            @if($log->post_id)
                <div class="mt-3">
                    <a href="{{ route('filament.admin.resources.posts.edit', ['record' => $log->post_id]) }}"
                       class="text-xs text-primary-600 hover:text-primary-700 font-medium">
                        View Generated Post →
                    </a>
                </div>
            @endif
        </div>
    @empty
        <div class="text-center py-8 text-gray-500">
            No generation logs found.
        </div>
    @endforelse
</div>
