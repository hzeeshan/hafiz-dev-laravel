{{-- Newsletter Signup Component --}}
<div class="my-12 p-6 bg-darkCard/50 border border-gold/20 rounded-xl shadow-dark-card">
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-6">
        {{-- Left: Text Content --}}
        <div class="flex-1">
            <div class="flex items-center gap-3 mb-2">
                <svg class="w-6 h-6 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                </svg>
                <h3 class="text-lg font-bold text-light">Get web development tips via email</h3>
            </div>
            <p class="text-sm text-light-muted">
                Join <span class="text-gold font-semibold" id="subscriber-count">50+</span> developers • No spam • Unsubscribe anytime
            </p>
        </div>

        {{-- Right: Form --}}
        <div class="flex-shrink-0 w-full md:w-auto">
            <form id="newsletter-form" class="flex flex-col sm:flex-row gap-3" method="POST" action="{{ route('newsletter.subscribe') }}">
                @csrf
                <input
                    type="email"
                    name="email"
                    id="newsletter-email"
                    placeholder="your@email.com"
                    required
                    class="flex-1 sm:min-w-[280px] px-4 py-3 bg-darkBg border border-gold/30 rounded-lg text-light placeholder-light-muted focus:outline-none focus:ring-2 focus:ring-gold/50 focus:border-gold transition-all"
                >
                <button
                    type="submit"
                    id="newsletter-submit"
                    class="px-6 py-3 bg-gold text-darkBg font-semibold rounded-lg hover:bg-gold-light transition-all duration-300 hover:shadow-gold-glow hover:-translate-y-0.5 whitespace-nowrap disabled:opacity-50 disabled:cursor-not-allowed disabled:hover:translate-y-0 cursor-pointer"
                >
                    <span id="submit-text">Subscribe</span>
                    <span id="submit-loading" class="hidden">
                        <svg class="animate-spin h-5 w-5 inline" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                    </span>
                </button>
            </form>

            {{-- Success Message --}}
            <div id="newsletter-success" class="hidden mt-3 p-3 bg-green-500/20 border border-green-500/30 rounded-lg">
                <p class="text-sm text-green-400 flex items-center gap-2">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                    </svg>
                    <span>Thanks! Check your email to confirm your subscription.</span>
                </p>
            </div>

            {{-- Error Message --}}
            <div id="newsletter-error" class="hidden mt-3 p-3 bg-red-500/20 border border-red-500/30 rounded-lg">
                <p class="text-sm text-red-400 flex items-center gap-2">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
                    </svg>
                    <span id="error-message">Something went wrong. Please try again.</span>
                </p>
            </div>
        </div>
    </div>
</div>

{{-- JavaScript for form handling --}}
@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('newsletter-form');
    const submitBtn = document.getElementById('newsletter-submit');
    const submitText = document.getElementById('submit-text');
    const submitLoading = document.getElementById('submit-loading');
    const successMsg = document.getElementById('newsletter-success');
    const errorMsg = document.getElementById('newsletter-error');
    const errorText = document.getElementById('error-message');
    const emailInput = document.getElementById('newsletter-email');

    form.addEventListener('submit', async function(e) {
        e.preventDefault();

        // Reset messages
        successMsg.classList.add('hidden');
        errorMsg.classList.add('hidden');

        // Show loading state
        submitBtn.disabled = true;
        submitText.classList.add('hidden');
        submitLoading.classList.remove('hidden');

        try {
            const formData = new FormData(form);
            const response = await fetch(form.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json'
                }
            });

            const data = await response.json();

            if (response.ok && data.success) {
                // Show success message
                successMsg.classList.remove('hidden');
                form.reset();

                // Auto-dismiss success message after 5 seconds
                setTimeout(() => {
                    successMsg.classList.add('hidden');
                }, 5000);

                // Track conversion (Google Analytics if available)
                if (typeof gtag !== 'undefined') {
                    gtag('event', 'newsletter_signup', {
                        'event_category': 'engagement',
                        'event_label': 'blog_post'
                    });
                }
            } else {
                // Show error message
                errorText.textContent = data.message || 'Something went wrong. Please try again.';
                errorMsg.classList.remove('hidden');
            }
        } catch (error) {
            console.error('Newsletter subscription error:', error);
            errorText.textContent = 'Network error. Please check your connection and try again.';
            errorMsg.classList.remove('hidden');
        } finally {
            // Reset button state
            submitBtn.disabled = false;
            submitText.classList.remove('hidden');
            submitLoading.classList.add('hidden');
        }
    });
});
</script>
@endpush
