@props(['toolSlug' => null])

@php
    $slug = $toolSlug;
    if (!$slug) {
        $path = request()->getPathInfo();
        if (str_starts_with($path, '/it/strumenti/')) {
            $slug = str_replace('/it/strumenti/', '', $path);
        } elseif (str_starts_with($path, '/tools/')) {
            $slug = str_replace('/tools/', '', $path);
        }
    }
@endphp

<!-- Feedback Floating Button -->
<style>
    #feedback-btn {
        bottom: 20px;
        right: 24px;
        z-index: 30;
    }

    @media (min-width: 640px) and (max-width: 1023px) {
        #feedback-btn {
            bottom: 64px;
        }
    }
</style>
<button id="feedback-btn" type="button" aria-label="Report an issue"
    class="fixed w-12 h-12 flex items-center justify-center rounded-full bg-darkCard border border-gold/30 text-gold/70 hover:text-gold hover:border-gold/60 hover:scale-110 shadow-lg transition-all duration-300 cursor-pointer">
    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5">
        <path stroke-linecap="round" stroke-linejoin="round"
            d="M12 20.25c4.97 0 9-3.694 9-8.25s-4.03-8.25-9-8.25S3 7.444 3 12c0 2.104.859 4.023 2.273 5.48.432.447.74 1.04.586 1.641a4.483 4.483 0 0 1-.923 1.785A5.969 5.969 0 0 0 6 21c1.282 0 2.47-.402 3.445-1.087.81.22 1.668.337 2.555.337Z" />
    </svg>
</button>

<!-- Feedback Modal Backdrop -->
<div id="feedback-backdrop"
    class="fixed inset-0 z-50 bg-black/50 backdrop-blur-sm hidden opacity-0 transition-opacity duration-300"></div>

<!-- Feedback Modal -->
<div id="feedback-modal"
    class="fixed inset-0 z-50 flex items-end sm:items-center justify-center p-4 hidden pointer-events-none">
    <div id="feedback-panel"
        class="bg-gradient-card rounded-xl border border-gold/20 shadow-2xl w-full max-w-md pointer-events-auto transform translate-y-8 opacity-0 transition-all duration-300">
        <!-- Header -->
        <div class="flex items-center justify-between px-6 py-4 border-b border-gold/10">
            <h3 class="text-lg font-semibold text-light">Report an Issue</h3>
            <button id="feedback-close" type="button"
                class="text-light-muted hover:text-light transition-colors p-1 cursor-pointer" aria-label="Close">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        <!-- Form -->
        <form id="feedback-form" class="px-6 pt-5 pb-6 space-y-4">
            <!-- Tool name (read-only) -->
            <div>
                <label class="block text-sm font-medium text-light-muted mb-1">Tool</label>
                <div id="feedback-tool-name"
                    class="text-sm text-light bg-darkBg/50 rounded-lg px-3 py-2 border border-gold/10">
                    Loading...
                </div>
            </div>

            <!-- Type -->
            <div>
                <label for="feedback-type" class="block text-sm font-medium text-light-muted mb-1">Type</label>
                <select id="feedback-type" name="type"
                    class="w-full bg-darkBg/80 border border-gold/20 rounded-lg px-3 py-2 text-sm text-light focus:outline-none focus:border-gold/50 focus:ring-1 focus:ring-gold/30 transition-colors">
                    <option value="bug">Bug Report</option>
                    <option value="feature">Feature Request</option>
                    <option value="other">Other</option>
                </select>
            </div>

            <!-- Message -->
            <div>
                <label for="feedback-message" class="block text-sm font-medium text-light-muted mb-1">Message</label>
                <textarea id="feedback-message" name="message" rows="4" minlength="10" maxlength="1000" required
                    placeholder="Describe the issue or your suggestion..."
                    class="w-full bg-darkBg/80 border border-gold/20 rounded-lg px-3 py-2 text-sm text-light placeholder-light-muted/50 focus:outline-none focus:border-gold/50 focus:ring-1 focus:ring-gold/30 transition-colors resize-none"></textarea>
                <div class="flex justify-between items-center mt-1">
                    <span id="feedback-error" class="text-xs text-red-400 hidden"></span>
                    <span id="feedback-char-count" class="text-xs text-light-muted ml-auto">0 / 1000</span>
                </div>
            </div>

            <!-- Email -->
            <div>
                <label for="feedback-email" class="block text-sm font-medium text-light-muted mb-1">Email</label>
                <input id="feedback-email" name="email" type="email"
                    placeholder="your@email.com (optional, for follow-up)"
                    class="w-full bg-darkBg/80 border border-gold/20 rounded-lg px-3 py-2 text-sm text-light placeholder-light-muted/50 focus:outline-none focus:border-gold/50 focus:ring-1 focus:ring-gold/30 transition-colors" />
            </div>

            <!-- Buttons -->
            <div class="flex items-center gap-3 pt-1">
                <button id="feedback-submit" type="submit"
                    class="flex-1 px-4 py-2.5 bg-gold text-darkBg font-semibold rounded-lg hover:bg-gold-light transition-all duration-300 text-sm cursor-pointer disabled:opacity-50 disabled:cursor-not-allowed">
                    Submit
                </button>
                <button id="feedback-cancel" type="button"
                    class="px-4 py-2.5 border border-gold/30 text-light-muted rounded-lg hover:border-gold/50 hover:text-light transition-all duration-300 text-sm cursor-pointer">
                    Cancel
                </button>
            </div>
        </form>

        <!-- Success Message -->
        <div id="feedback-success" class="hidden px-6 py-10 text-center">
            <div class="text-3xl mb-3">&#10003;</div>
            <p class="text-light font-medium">Thanks for your feedback!</p>
            <p class="text-light-muted text-sm mt-1">We'll look into it.</p>
        </div>
    </div>
</div>

<script>
    (function() {
        const toolSlug = @json($slug);
        const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');

        const btn = document.getElementById('feedback-btn');
        const backdrop = document.getElementById('feedback-backdrop');
        const modal = document.getElementById('feedback-modal');
        const panel = document.getElementById('feedback-panel');
        const closeBtn = document.getElementById('feedback-close');
        const cancelBtn = document.getElementById('feedback-cancel');
        const form = document.getElementById('feedback-form');
        const submitBtn = document.getElementById('feedback-submit');
        const messageInput = document.getElementById('feedback-message');
        const charCount = document.getElementById('feedback-char-count');
        const errorSpan = document.getElementById('feedback-error');
        const successDiv = document.getElementById('feedback-success');
        const toolNameDiv = document.getElementById('feedback-tool-name');

        // Extract tool name from page h1
        const h1 = document.querySelector('h1');
        if (h1) {
            toolNameDiv.textContent = h1.textContent.trim();
        } else {
            toolNameDiv.textContent = toolSlug || 'Unknown Tool';
        }

        // Character count
        messageInput.addEventListener('input', function() {
            charCount.textContent = this.value.length + ' / 1000';
            errorSpan.classList.add('hidden');
        });

        function openModal() {
            backdrop.classList.remove('hidden');
            modal.classList.remove('hidden');
            document.body.style.overflow = 'hidden';

            requestAnimationFrame(() => {
                backdrop.classList.remove('opacity-0');
                panel.classList.remove('translate-y-8', 'opacity-0');
            });
        }

        function closeModal() {
            backdrop.classList.add('opacity-0');
            panel.classList.add('translate-y-8', 'opacity-0');

            setTimeout(() => {
                backdrop.classList.add('hidden');
                modal.classList.add('hidden');
                document.body.style.overflow = '';
                resetForm();
            }, 300);
        }

        function resetForm() {
            form.reset();
            form.classList.remove('hidden');
            successDiv.classList.add('hidden');
            charCount.textContent = '0 / 1000';
            errorSpan.classList.add('hidden');
            submitBtn.disabled = false;
            submitBtn.textContent = 'Submit';
        }

        function showError(msg) {
            errorSpan.textContent = msg;
            errorSpan.classList.remove('hidden');
        }

        btn.addEventListener('click', openModal);
        closeBtn.addEventListener('click', closeModal);
        cancelBtn.addEventListener('click', closeModal);

        backdrop.addEventListener('click', closeModal);

        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && !modal.classList.contains('hidden')) {
                closeModal();
            }
        });

        form.addEventListener('submit', async function(e) {
            e.preventDefault();

            const message = messageInput.value.trim();
            if (message.length < 10) {
                showError('Message must be at least 10 characters.');
                return;
            }

            submitBtn.disabled = true;
            submitBtn.textContent = 'Submitting...';
            errorSpan.classList.add('hidden');

            try {
                const response = await fetch('{{ route('tool-feedback.store') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': csrfToken
                    },
                    body: JSON.stringify({
                        tool_slug: toolSlug,
                        type: document.getElementById('feedback-type').value,
                        message: message,
                        email: document.getElementById('feedback-email').value || null,
                        url: window.location.href,
                        user_agent: navigator.userAgent
                    })
                });

                const data = await response.json();

                if (response.status === 429) {
                    showError('Too many submissions. Please try again later.');
                    submitBtn.disabled = false;
                    submitBtn.textContent = 'Submit';
                    return;
                }

                if (!response.ok) {
                    const firstError = data.errors ? Object.values(data.errors)[0][0] :
                        'Something went wrong.';
                    showError(firstError);
                    submitBtn.disabled = false;
                    submitBtn.textContent = 'Submit';
                    return;
                }

                // Show success
                form.classList.add('hidden');
                successDiv.classList.remove('hidden');

                setTimeout(closeModal, 3000);
            } catch (err) {
                showError('Network error. Please try again.');
                submitBtn.disabled = false;
                submitBtn.textContent = 'Submit';
            }
        });
    })();
</script>
