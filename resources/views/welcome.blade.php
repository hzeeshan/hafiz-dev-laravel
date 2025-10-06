<x-layout>
    <x-slot:title>Hafiz Riaz - Full Stack Developer & Laravel Expert</x-slot:title>
    <x-slot:description>Senior Full Stack Developer specializing in Laravel, Vue.js, process automation, and SaaS development. Building web applications and automating business processes.</x-slot:description>

    <div class="relative z-10">
        <!-- Hero Section -->
        <section class="min-h-[85vh] flex items-center justify-center px-4 pt-20" id="home">
            <div class="max-w-4xl mx-auto text-center">
                <div class="mb-10">
                    <img src="/profile-photo.png"
                         alt="Hafiz Riaz"
                         class="w-32 h-32 md:w-40 md:h-40 mx-auto rounded-2xl border-4 border-gold shadow-gold">
                </div>

                <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-light mb-4">
                    Hafiz Riaz
                </h1>

                <p class="text-xl md:text-2xl text-gold mb-8 font-medium">
                    Senior Full Stack Developer
                </p>

                <div class="text-base md:text-lg text-light-muted max-w-3xl mx-auto mb-10 leading-relaxed space-y-4">
                    <p>
                        I'm Hafiz, a Full Stack Developer from Torino, Italy. I specialize in building web applications with PHP, Laravel, Vue.js, and automating business processes that save companies hours of manual work.
                    </p>
                    <p>
                        I've launched my own SaaS products and worked with dozens of businesses, so I understand both the technical challenges and business needs. Whether it's eliminating repetitive tasks or building something from scratch, I focus on creating solutions that actually work.
                    </p>
                    <p class="font-medium text-gold">
                        Let's discuss your project. I'm always interested in solving interesting problems.
                    </p>
                </div>

                <div class="flex flex-wrap gap-4 justify-center mb-12">
                    <a href="/blog"
                       class="px-8 py-4 bg-gold text-darkBg font-semibold rounded-lg hover:bg-gold-light transition-all duration-300 hover:shadow-gold-glow hover:-translate-y-0.5">
                        Read My Blog
                    </a>
                    <a href="#contact"
                       class="px-8 py-4 border-2 border-gold text-gold font-semibold rounded-lg hover:bg-gold/10 transition-all duration-300">
                        Get In Touch
                    </a>
                </div>

                <!-- Social Links -->
                <div class="flex gap-6 justify-center text-light-muted">
                    <a href="https://github.com/hzeeshan" target="_blank" class="hover:text-gold transition-colors">
                        <span class="sr-only">GitHub</span>
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/></svg>
                    </a>
                    <a href="https://www.linkedin.com/in/hafiz-riaz-777501150/" target="_blank" class="hover:text-gold transition-colors">
                        <span class="sr-only">LinkedIn</span>
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg>
                    </a>
                    <a href="https://x.com/hafizzeeshan619" target="_blank" class="hover:text-gold transition-colors">
                        <span class="sr-only">Twitter</span>
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
                    </a>
                </div>
            </div>
        </section>

        <!-- Services Section -->
        <section class="py-20 px-4" id="services">
            <div class="max-w-6xl mx-auto">
                <h2 class="text-4xl font-bold text-light mb-4 text-center">Services & Solutions</h2>
                <p class="text-light-muted text-center mb-12 max-w-2xl mx-auto">
                    I specialize in building web applications and automating business processes that deliver real value.
                </p>

                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <!-- Service 1 -->
                    <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card hover:shadow-dark-card-hover transition-all duration-300 hover:-translate-y-1">
                        <div class="text-gold text-3xl mb-4">⚙️</div>
                        <h3 class="text-xl font-bold text-light mb-3">Process Automation</h3>
                        <p class="text-light-muted text-sm leading-relaxed">
                            Save 10-20 hours weekly by automating repetitive tasks. Custom automation solutions tailored to your business needs.
                        </p>
                    </div>

                    <!-- Service 2 -->
                    <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card hover:shadow-dark-card-hover transition-all duration-300 hover:-translate-y-1">
                        <div class="text-gold text-3xl mb-4">🚀</div>
                        <h3 class="text-xl font-bold text-light mb-3">SaaS Development</h3>
                        <p class="text-light-muted text-sm leading-relaxed">
                            From idea to profitable product. Complete SaaS development including user management, payment processing, and scaling.
                        </p>
                    </div>

                    <!-- Service 3 -->
                    <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card hover:shadow-dark-card-hover transition-all duration-300 hover:-translate-y-1">
                        <div class="text-gold text-3xl mb-4">💻</div>
                        <h3 class="text-xl font-bold text-light mb-3">Laravel Development</h3>
                        <p class="text-light-muted text-sm leading-relaxed">
                            Building robust full-stack applications with Laravel, Filament, and Livewire for scalable web solutions.
                        </p>
                    </div>

                    <!-- Service 4 -->
                    <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card hover:shadow-dark-card-hover transition-all duration-300 hover:-translate-y-1">
                        <div class="text-gold text-3xl mb-4">🤖</div>
                        <h3 class="text-xl font-bold text-light mb-3">AI Integration</h3>
                        <p class="text-light-muted text-sm leading-relaxed">
                            Add intelligent automation to your applications. Content generation, data analysis, and AI-powered features.
                        </p>
                    </div>

                    <!-- Service 5 -->
                    <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card hover:shadow-dark-card-hover transition-all duration-300 hover:-translate-y-1">
                        <div class="text-gold text-3xl mb-4">⚡</div>
                        <h3 class="text-xl font-bold text-light mb-3">Vue.js Development</h3>
                        <p class="text-light-muted text-sm leading-relaxed">
                            Creating interactive user interfaces with Vue.js, Inertia.js, and modern frontend technologies.
                        </p>
                    </div>

                    <!-- Service 6 -->
                    <div class="bg-gradient-card p-6 rounded-xl border border-gold/20 shadow-dark-card hover:shadow-dark-card-hover transition-all duration-300 hover:-translate-y-1">
                        <div class="text-gold text-3xl mb-4">🔌</div>
                        <h3 class="text-xl font-bold text-light mb-3">Chrome Extensions</h3>
                        <p class="text-light-muted text-sm leading-relaxed">
                            Build powerful browser extensions that enhance productivity and streamline workflows for businesses.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Portfolio Section -->
        <section class="py-20 px-4 bg-darkBg/50" id="portfolio">
            <div class="max-w-7xl mx-auto">
                <h2 class="text-4xl font-bold text-light mb-4 text-center">Featured Projects</h2>
                <p class="text-light-muted text-center mb-12 max-w-2xl mx-auto">
                    Some of the SaaS products and client projects I've built over the years.
                </p>

                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <!-- Project 1: ReplyGenius -->
                    <div class="bg-gradient-card rounded-xl border border-gold/20 shadow-dark-card hover:shadow-dark-card-hover transition-all duration-300 overflow-hidden group">
                        <div class="relative overflow-hidden h-48">
                            <img src="/screenshots/replygenius.io-screenshot.png" alt="ReplyGenius.io" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                            <div class="absolute inset-0 bg-gradient-to-t from-darkBg via-darkBg/50 to-transparent"></div>
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-light mb-2">ReplyGenius.io</h3>
                            <p class="text-light-muted text-sm mb-4 leading-relaxed">
                                AI-powered social media reply generator with contextual marketing
                            </p>
                            <div class="flex flex-wrap gap-2 mb-4">
                                <span class="text-xs px-2 py-1 bg-gold/20 text-gold rounded border border-gold/30">Laravel</span>
                                <span class="text-xs px-2 py-1 bg-gold/20 text-gold rounded border border-gold/30">Chrome Ext</span>
                                <span class="text-xs px-2 py-1 bg-gold/20 text-gold rounded border border-gold/30">AI APIs</span>
                            </div>
                            <a href="https://replygenius.io" target="_blank" class="text-gold hover:text-gold-light transition-colors text-sm font-semibold">
                                View Project →
                            </a>
                        </div>
                    </div>

                    <!-- Project 2: StudyLab -->
                    <div class="bg-gradient-card rounded-xl border border-gold/20 shadow-dark-card hover:shadow-dark-card-hover transition-all duration-300 overflow-hidden group">
                        <div class="relative overflow-hidden h-48">
                            <img src="/screenshots/studylab-screenshot.png" alt="StudyLab.app" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                            <div class="absolute inset-0 bg-gradient-to-t from-darkBg via-darkBg/50 to-transparent"></div>
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-light mb-2">StudyLab.app</h3>
                            <p class="text-light-muted text-sm mb-4 leading-relaxed">
                                AI-based quiz and flashcards generator from PDFs
                            </p>
                            <div class="flex flex-wrap gap-2 mb-4">
                                <span class="text-xs px-2 py-1 bg-gold/20 text-gold rounded border border-gold/30">Laravel</span>
                                <span class="text-xs px-2 py-1 bg-gold/20 text-gold rounded border border-gold/30">OpenAI</span>
                                <span class="text-xs px-2 py-1 bg-gold/20 text-gold rounded border border-gold/30">Stripe</span>
                            </div>
                            <a href="https://studylab.app/" target="_blank" class="text-gold hover:text-gold-light transition-colors text-sm font-semibold">
                                View Project →
                            </a>
                        </div>
                    </div>

                    <!-- Project 3: Claude Chat Manager -->
                    <div class="bg-gradient-card rounded-xl border border-gold/20 shadow-dark-card hover:shadow-dark-card-hover transition-all duration-300 overflow-hidden group">
                        <div class="relative overflow-hidden h-48">
                            <img src="/screenshots/claude-chat-manager-screenshot.png" alt="Claude Chat Manager" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                            <div class="absolute inset-0 bg-gradient-to-t from-darkBg via-darkBg/50 to-transparent"></div>
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-light mb-2">Claude Chat Manager</h3>
                            <p class="text-light-muted text-sm mb-4 leading-relaxed">
                                Chrome extension for organizing Claude.ai conversations
                            </p>
                            <div class="flex flex-wrap gap-2 mb-4">
                                <span class="text-xs px-2 py-1 bg-gold/20 text-gold rounded border border-gold/30">Chrome Ext</span>
                                <span class="text-xs px-2 py-1 bg-gold/20 text-gold rounded border border-gold/30">JavaScript</span>
                            </div>
                            <a href="https://chromewebstore.google.com/detail/claude-chat-manager/mimbihfbpnglcblklikcjmibobgmlknf" target="_blank" class="text-gold hover:text-gold-light transition-colors text-sm font-semibold">
                                View Project →
                            </a>
                        </div>
                    </div>

                    <!-- Project 4: Robobook.ai -->
                    <div class="bg-gradient-card rounded-xl border border-gold/20 shadow-dark-card hover:shadow-dark-card-hover transition-all duration-300 overflow-hidden group">
                        <div class="relative overflow-hidden h-48">
                            <img src="/screenshots/robobook-ai-screenshot.png" alt="Robobook.ai" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                            <div class="absolute inset-0 bg-gradient-to-t from-darkBg via-darkBg/50 to-transparent"></div>
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-light mb-2">Robobook.ai</h3>
                            <p class="text-light-muted text-sm mb-4 leading-relaxed">
                                AI platform for automatically writing books and generating royalties
                            </p>
                            <div class="flex flex-wrap gap-2 mb-4">
                                <span class="text-xs px-2 py-1 bg-gold/20 text-gold rounded border border-gold/30">Laravel</span>
                                <span class="text-xs px-2 py-1 bg-gold/20 text-gold rounded border border-gold/30">OpenAI</span>
                                <span class="text-xs px-2 py-1 bg-gold/20 text-gold rounded border border-gold/30">Stripe</span>
                            </div>
                            <a href="https://robobook.ai/" target="_blank" class="text-gold hover:text-gold-light transition-colors text-sm font-semibold">
                                View Project →
                            </a>
                        </div>
                    </div>

                    <!-- Project 5: Quantico Business -->
                    <div class="bg-gradient-card rounded-xl border border-gold/20 shadow-dark-card hover:shadow-dark-card-hover transition-all duration-300 overflow-hidden group">
                        <div class="relative overflow-hidden h-48">
                            <img src="/screenshots/quantico-screenshot.png" alt="Quantico Business" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                            <div class="absolute inset-0 bg-gradient-to-t from-darkBg via-darkBg/50 to-transparent"></div>
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-light mb-2">Quantico Business</h3>
                            <p class="text-light-muted text-sm mb-4 leading-relaxed">
                                Business assessment and evaluation platform
                            </p>
                            <div class="flex flex-wrap gap-2 mb-4">
                                <span class="text-xs px-2 py-1 bg-gold/20 text-gold rounded border border-gold/30">Laravel</span>
                                <span class="text-xs px-2 py-1 bg-gold/20 text-gold rounded border border-gold/30">Vue.js</span>
                                <span class="text-xs px-2 py-1 bg-gold/20 text-gold rounded border border-gold/30">Vuetify</span>
                            </div>
                            <a href="https://assessment.quanticobusiness.com/" target="_blank" class="text-gold hover:text-gold-light transition-colors text-sm font-semibold">
                                View Project →
                            </a>
                        </div>
                    </div>

                    <!-- Project 6: Get Impressed -->
                    <div class="bg-gradient-card rounded-xl border border-gold/20 shadow-dark-card hover:shadow-dark-card-hover transition-all duration-300 overflow-hidden group">
                        <div class="relative overflow-hidden h-48">
                            <img src="/screenshots/getimpressed-screenshot.png" alt="Get Impressed" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                            <div class="absolute inset-0 bg-gradient-to-t from-darkBg via-darkBg/50 to-transparent"></div>
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-light mb-2">Get Impressed</h3>
                            <p class="text-light-muted text-sm mb-4 leading-relaxed">
                                E-commerce platform for promotional products and corporate gifts
                            </p>
                            <div class="flex flex-wrap gap-2 mb-4">
                                <span class="text-xs px-2 py-1 bg-gold/20 text-gold rounded border border-gold/30">PHP</span>
                                <span class="text-xs px-2 py-1 bg-gold/20 text-gold rounded border border-gold/30">jQuery</span>
                                <span class="text-xs px-2 py-1 bg-gold/20 text-gold rounded border border-gold/30">MySQL</span>
                            </div>
                            <a href="https://getimpressed.eu/" target="_blank" class="text-gold hover:text-gold-light transition-colors text-sm font-semibold">
                                View Project →
                            </a>
                        </div>
                    </div>

                    <!-- Project 7: Prompt Optimizer -->
                    <div class="bg-gradient-card rounded-xl border border-gold/20 shadow-dark-card hover:shadow-dark-card-hover transition-all duration-300 overflow-hidden group">
                        <div class="relative overflow-hidden h-48">
                            <img src="/screenshots/promptoptimizer-screenshot.png" alt="Prompt Optimizer" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                            <div class="absolute inset-0 bg-gradient-to-t from-darkBg via-darkBg/50 to-transparent"></div>
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-light mb-2">Prompt Optimizer</h3>
                            <p class="text-light-muted text-sm mb-4 leading-relaxed">
                                Free AI-powered prompt enhancement tool for better AI results
                            </p>
                            <div class="flex flex-wrap gap-2 mb-4">
                                <span class="text-xs px-2 py-1 bg-gold/20 text-gold rounded border border-gold/30">Laravel</span>
                                <span class="text-xs px-2 py-1 bg-gold/20 text-gold rounded border border-gold/30">Vue.js</span>
                                <span class="text-xs px-2 py-1 bg-gold/20 text-gold rounded border border-gold/30">OpenAI</span>
                            </div>
                            <a href="https://promptoptimizer.tools/" target="_blank" class="text-gold hover:text-gold-light transition-colors text-sm font-semibold">
                                View Project →
                            </a>
                        </div>
                    </div>

                    <!-- Project 8: GhibliAIart -->
                    <div class="bg-gradient-card rounded-xl border border-gold/20 shadow-dark-card hover:shadow-dark-card-hover transition-all duration-300 overflow-hidden group">
                        <div class="relative overflow-hidden h-48">
                            <img src="/screenshots/ghibliaiart-screenshot.png" alt="GhibliAIart.com" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                            <div class="absolute inset-0 bg-gradient-to-t from-darkBg via-darkBg/50 to-transparent"></div>
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-light mb-2">GhibliAIart.com</h3>
                            <p class="text-light-muted text-sm mb-4 leading-relaxed">
                                AI art platform for generating Ghibli-style images
                            </p>
                            <div class="flex flex-wrap gap-2 mb-4">
                                <span class="text-xs px-2 py-1 bg-gold/20 text-gold rounded border border-gold/30">Laravel</span>
                                <span class="text-xs px-2 py-1 bg-gold/20 text-gold rounded border border-gold/30">Vue.js</span>
                                <span class="text-xs px-2 py-1 bg-gold/20 text-gold rounded border border-gold/30">OpenAI</span>
                            </div>
                            <a href="https://ghibliaiart.com/" target="_blank" class="text-gold hover:text-gold-light transition-colors text-sm font-semibold">
                                View Project →
                            </a>
                        </div>
                    </div>

                    <!-- Project 9: AI Tools Universe -->
                    <div class="bg-gradient-card rounded-xl border border-gold/20 shadow-dark-card hover:shadow-dark-card-hover transition-all duration-300 overflow-hidden group">
                        <div class="relative overflow-hidden h-48">
                            <img src="/screenshots/aitoolsuniverse-screenshot.png" alt="AI Tools Universe" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                            <div class="absolute inset-0 bg-gradient-to-t from-darkBg via-darkBg/50 to-transparent"></div>
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-light mb-2">AI Tools Universe</h3>
                            <p class="text-light-muted text-sm mb-4 leading-relaxed">
                                Comprehensive directory of AI tools and resources
                            </p>
                            <div class="flex flex-wrap gap-2 mb-4">
                                <span class="text-xs px-2 py-1 bg-gold/20 text-gold rounded border border-gold/30">Laravel</span>
                                <span class="text-xs px-2 py-1 bg-gold/20 text-gold rounded border border-gold/30">Bootstrap</span>
                                <span class="text-xs px-2 py-1 bg-gold/20 text-gold rounded border border-gold/30">htmx</span>
                            </div>
                            <a href="https://aitoolsuniverse.com/" target="_blank" class="text-gold hover:text-gold-light transition-colors text-sm font-semibold">
                                View Project →
                            </a>
                        </div>
                    </div>

                    <!-- Project 10: PianetaGaia -->
                    <div class="bg-gradient-card rounded-xl border border-gold/20 shadow-dark-card hover:shadow-dark-card-hover transition-all duration-300 overflow-hidden group">
                        <div class="relative overflow-hidden h-48">
                            <img src="/screenshots/pianetagaia-screenshot.png" alt="PianetaGaia" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                            <div class="absolute inset-0 bg-gradient-to-t from-darkBg via-darkBg/50 to-transparent"></div>
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-light mb-2">PianetaGaia</h3>
                            <p class="text-light-muted text-sm mb-4 leading-relaxed">
                                Travel agency platform for group tours and custom travel experiences
                            </p>
                            <div class="flex flex-wrap gap-2 mb-4">
                                <span class="text-xs px-2 py-1 bg-gold/20 text-gold rounded border border-gold/30">PHP</span>
                                <span class="text-xs px-2 py-1 bg-gold/20 text-gold rounded border border-gold/30">jQuery</span>
                                <span class="text-xs px-2 py-1 bg-gold/20 text-gold rounded border border-gold/30">MySQL</span>
                            </div>
                            <a href="https://www.pianetagaia.it/" target="_blank" class="text-gold hover:text-gold-light transition-colors text-sm font-semibold">
                                View Project →
                            </a>
                        </div>
                    </div>

                    <!-- Project 11: Soluzione Tasse -->
                    <div class="bg-gradient-card rounded-xl border border-gold/20 shadow-dark-card hover:shadow-dark-card-hover transition-all duration-300 overflow-hidden group">
                        <div class="relative overflow-hidden h-48">
                            <img src="/screenshots/soluzione-tasse-screenshot.png" alt="Soluzione Tasse" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                            <div class="absolute inset-0 bg-gradient-to-t from-darkBg via-darkBg/50 to-transparent"></div>
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-light mb-2">Soluzione Tasse Tools</h3>
                            <p class="text-light-muted text-sm mb-4 leading-relaxed">
                                Tax calculation and business tools platform
                            </p>
                            <div class="flex flex-wrap gap-2 mb-4">
                                <span class="text-xs px-2 py-1 bg-gold/20 text-gold rounded border border-gold/30">Laravel</span>
                                <span class="text-xs px-2 py-1 bg-gold/20 text-gold rounded border border-gold/30">Vue.js</span>
                                <span class="text-xs px-2 py-1 bg-gold/20 text-gold rounded border border-gold/30">Vuetify</span>
                            </div>
                            <a href="https://tools-ced.soluzionetasse.com/" target="_blank" class="text-gold hover:text-gold-light transition-colors text-sm font-semibold">
                                View Project →
                            </a>
                        </div>
                    </div>
                </div>

                <div class="text-center mt-12">
                    <a href="#contact" class="inline-block px-8 py-4 bg-gold text-darkBg font-semibold rounded-lg hover:bg-gold-light transition-all duration-300 hover:shadow-gold-glow hover:-translate-y-0.5">
                        Discuss Your Project
                    </a>
                </div>
            </div>
        </section>

        <!-- Contact Section -->
        <section class="py-20 px-4" id="contact">
            <div class="max-w-4xl mx-auto">
                <h2 class="text-4xl font-bold text-light mb-4 text-center">Get In Touch</h2>
                <p class="text-light-muted text-center mb-12">
                    Have a project in mind? Let's discuss how I can help you achieve your goals.
                </p>

                <div class="grid md:grid-cols-2 gap-8">
                    <!-- Contact Info -->
                    <div class="bg-gradient-card p-8 rounded-xl border border-gold/20 shadow-dark-card">
                        <h3 class="text-2xl font-bold text-light mb-6">Contact Information</h3>

                        <div class="space-y-4">
                            <div class="flex items-start gap-4">
                                <div class="text-gold text-xl">📧</div>
                                <div>
                                    <h4 class="text-light font-semibold mb-1">Email</h4>
                                    <a href="mailto:contact@hafiz.dev" class="text-light-muted hover:text-gold transition-colors">contact@hafiz.dev</a>
                                </div>
                            </div>

                            <div class="flex items-start gap-4">
                                <div class="text-gold text-xl">📱</div>
                                <div>
                                    <h4 class="text-light font-semibold mb-1">Phone</h4>
                                    <a href="tel:+393888255329" class="text-light-muted hover:text-gold transition-colors">(+39) 3888255329</a>
                                </div>
                            </div>

                            <div class="flex items-start gap-4">
                                <div class="text-gold text-xl">📍</div>
                                <div>
                                    <h4 class="text-light font-semibold mb-1">Location</h4>
                                    <p class="text-light-muted">Torino, Italy</p>
                                </div>
                            </div>

                            <div class="flex items-start gap-4">
                                <div class="text-gold text-xl">🌐</div>
                                <div>
                                    <h4 class="text-light font-semibold mb-1">Website</h4>
                                    <a href="https://hafiz.dev" class="text-light-muted hover:text-gold transition-colors">hafiz.dev</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Quick Links -->
                    <div class="bg-gradient-card p-8 rounded-xl border border-gold/20 shadow-dark-card">
                        <h3 class="text-2xl font-bold text-light mb-6">Let's Connect</h3>

                        <p class="text-light-muted mb-6 leading-relaxed">
                            I'm currently available for freelance projects and consulting. Whether you need help with Laravel development, process automation, or building a SaaS product, I'd love to hear from you.
                        </p>

                        <div class="space-y-3">
                            <a href="mailto:contact@hafiz.dev"
                               class="block w-full px-6 py-3 bg-gold text-darkBg font-semibold rounded-lg hover:bg-gold-light transition-all duration-300 text-center">
                                Send Email
                            </a>
                            <a href="/blog"
                               class="block w-full px-6 py-3 border-2 border-gold text-gold font-semibold rounded-lg hover:bg-gold/10 transition-all duration-300 text-center">
                                Read My Blog
                            </a>
                        </div>

                        <p class="text-sm text-light-muted mt-6">
                            ⚡ Currently available for 2-3 new projects
                        </p>
                    </div>
                </div>
            </div>
        </section>
    </div>
</x-layout>
