import { test, expect } from '../fixtures/tool-page';

const SLUG = 'glitch-text-generator';

test.describe('Glitch Text Generator — functional tests', () => {
  test.beforeEach(async ({ toolPage }) => {
    await toolPage.goto(SLUG);
  });

  test('generates glitch text from input', async ({ page }) => {
    await page.fill('#text-input', 'Hello World');
    await page.click('#btn-generate');

    const output = await page.inputValue('#text-output');
    expect(output.length).toBeGreaterThan(0);
    // Glitch text should be longer than input due to combining characters
    expect(output.length).toBeGreaterThan('Hello World'.length);
  });

  test('shows error on empty input', async ({ page }) => {
    await page.click('#btn-generate');
    await expect(page.locator('#error-notification')).toBeVisible();
  });

  test('sample button loads data and generates', async ({ page }) => {
    await page.click('#btn-sample');
    const input = await page.inputValue('#text-input');
    expect(input.length).toBeGreaterThan(0);

    const output = await page.inputValue('#text-output');
    expect(output.length).toBeGreaterThan(0);
  });

  test('clear button resets state', async ({ page }) => {
    await page.click('#btn-sample');
    await page.click('#btn-clear');

    const input = await page.inputValue('#text-input');
    expect(input).toBe('');

    const output = await page.inputValue('#text-output');
    expect(output).toBe('');

    await expect(page.locator('#stats-bar')).toBeHidden();
  });

  test('copy button shows error when output is empty', async ({ page }) => {
    await page.click('#btn-copy');
    await expect(page.locator('#error-notification')).toBeVisible();
  });

  test('stats bar appears after generation', async ({ page }) => {
    await page.fill('#text-input', 'Test text');
    await page.click('#btn-generate');
    await expect(page.locator('#stats-bar')).toBeVisible();
  });

  test('style selector changes output', async ({ page }) => {
    await page.fill('#text-input', 'Test');
    await page.selectOption('#glitch-style', 'strike');
    await page.click('#btn-generate');
    const strikeOutput = await page.inputValue('#text-output');

    await page.selectOption('#glitch-style', 'vaporwave');
    await page.click('#btn-generate');
    const vaporwaveOutput = await page.inputValue('#text-output');

    // Different styles should produce different outputs
    expect(strikeOutput).not.toBe(vaporwaveOutput);
  });
});
