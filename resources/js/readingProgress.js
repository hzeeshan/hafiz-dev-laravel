/**
 * Reading Progress Bar
 *
 * Displays a progress bar at the top of blog posts that fills
 * as the user scrolls through the article content.
 */

export function initReadingProgress() {
    // Only run on blog post pages (check for article with blog-post-content class)
    const article = document.querySelector("article.blog-post-content");
    if (!article) return;

    // Create progress bar element
    const progressBar = document.createElement("div");
    progressBar.className = "reading-progress-bar";
    progressBar.setAttribute("aria-hidden", "true"); // Accessibility: decorative element

    // Apply inline styles directly (intentional - bypasses Tailwind CSS processing issues)
    Object.assign(progressBar.style, {
        position: "fixed",
        top: "0",
        left: "0",
        width: "100%",
        height: "4px",
        background: "#c9aa71",
        transformOrigin: "left",
        transform: "scaleX(0)",
        transition: "transform 0.15s ease-out",
        zIndex: "9999",
        pointerEvents: "none"
    });

    document.body.prepend(progressBar);

    /**
     * Calculate and update reading progress
     */
    const updateProgress = () => {
        const articleTop = article.offsetTop;
        const articleHeight = article.offsetHeight;
        const windowHeight = window.innerHeight;
        const scrollTop = window.scrollY;

        // Calculate how far we've scrolled into the article
        const scrolledIntoArticle = scrollTop - articleTop;

        // Calculate readable height (article height minus one viewport, since we read the last screen too)
        const readableHeight = articleHeight - windowHeight;

        // Calculate progress percentage (0 to 1)
        // 0% = at top of article, 100% = scrolled to bottom of article
        const progress = Math.min(Math.max(scrolledIntoArticle / readableHeight, 0), 1);

        progressBar.style.transform = `scaleX(${progress})`;
    };

    // Listen to scroll events (passive for better performance)
    window.addEventListener("scroll", updateProgress, { passive: true });

    // Listen to resize events (in case article height changes)
    window.addEventListener("resize", updateProgress, { passive: true });

    // Initial calculation
    updateProgress();
}
