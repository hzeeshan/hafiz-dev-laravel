import { test, expect } from '../fixtures/tool-page';

const SLUG = 'lorem-ipsum-generator';

test.describe('Lorem Ipsum Generator — functional tests', () => {
  test.beforeEach(async ({ toolPage }) => {
    await toolPage.goto(SLUG);
  });

  test('generates text on page load', async ({ page }) => {
    const output = await page.inputValue('#output-textarea');
    expect(output.length).toBeGreaterThan(0);
    expect(output).toContain('Lorem ipsum dolor sit amet');
  });

  test('generate button produces new text', async ({ page }) => {
    // Clear first, then generate
    await page.click('#btn-clear');
    expect(await page.inputValue('#output-textarea')).toBe('');

    await page.click('#btn-generate');
    const output = await page.inputValue('#output-textarea');
    expect(output.length).toBeGreaterThan(0);
  });

  test('switching to sentences mode works', async ({ page }) => {
    await page.click('[data-type="sentences"]');
    const output = await page.inputValue('#output-textarea');
    expect(output.length).toBeGreaterThan(0);

    // Sentences mode: single block of text (no double newlines)
    expect(output).not.toContain('\n\n');
  });

  test('switching to words mode works', async ({ page }) => {
    await page.click('[data-type="words"]');
    const output = await page.inputValue('#output-textarea');
    expect(output.length).toBeGreaterThan(0);
  });

  test('quantity slider updates output', async ({ page }) => {
    // Set slider to 1 paragraph
    await page.fill('#quantity-slider', '1');
    await page.dispatchEvent('#quantity-slider', 'input');
    const oneParaOutput = await page.inputValue('#output-textarea');

    // Set slider to 5 paragraphs
    await page.fill('#quantity-slider', '5');
    await page.dispatchEvent('#quantity-slider', 'input');
    const fiveParaOutput = await page.inputValue('#output-textarea');

    expect(fiveParaOutput.length).toBeGreaterThan(oneParaOutput.length);
  });

  test('clear button resets output', async ({ page }) => {
    await page.click('#btn-clear');
    expect(await page.inputValue('#output-textarea')).toBe('');
    expect(await page.textContent('#para-count')).toBe('0');
    expect(await page.textContent('#word-count')).toBe('0');
    expect(await page.textContent('#char-count')).toBe('0');
  });

  test('stats update after generation', async ({ page }) => {
    const wordCount = await page.textContent('#word-count');
    expect(Number(wordCount)).toBeGreaterThan(0);

    const charCount = await page.textContent('#char-count');
    expect(Number(charCount)).toBeGreaterThan(0);
  });
});
