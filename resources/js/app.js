import './bootstrap';
import hljs from 'highlight.js';
import 'highlight.js/styles/tokyo-night-dark.css';
import { initReadingProgress } from './readingProgress';

// Initialize syntax highlighting when DOM is loaded
document.addEventListener('DOMContentLoaded', () => {
    // Highlight all code blocks
    document.querySelectorAll('pre code').forEach((block) => {
        hljs.highlightElement(block);

        // Add copy button to code blocks
        addCopyButton(block.parentElement);
    });

    // Initialize reading progress bar (blog posts only)
    initReadingProgress();
});

// Add copy button functionality to code blocks
function addCopyButton(preElement) {
    const button = document.createElement('button');
    button.className = 'absolute top-2 right-2 px-3 py-1.5 bg-gold/20 hover:bg-gold/30 text-gold text-xs rounded border border-gold/30 transition-all duration-200 hover:shadow-gold cursor-pointer';
    button.textContent = 'Copy';
    button.style.cursor = 'pointer';

    button.addEventListener('click', async () => {
        const code = preElement.querySelector('code').textContent;
        await navigator.clipboard.writeText(code);
        button.textContent = 'Copied!';
        button.classList.add('bg-green-600/30', 'text-green-400', 'border-green-400/30');

        setTimeout(() => {
            button.textContent = 'Copy';
            button.classList.remove('bg-green-600/30', 'text-green-400', 'border-green-400/30');
        }, 2000);
    });

    preElement.style.position = 'relative';
    preElement.appendChild(button);
}
