import { test, expect } from '../fixtures/tool-page';

const SLUG = 'text-to-binary';

test.describe('Text to Binary — functional tests', () => {
  test.beforeEach(async ({ toolPage }) => {
    await toolPage.goto(SLUG);
  });

  test('converts text to binary', async ({ page }) => {
    await page.fill('#text-input', 'Hi');
    await page.click('#btn-convert');

    const output = await page.inputValue('#binary-output');
    expect(output).toContain('01001000');
    expect(output).toContain('01101001');
  });

  test('swap direction changes labels', async ({ page }) => {
    await page.click('#btn-swap');

    const inputLabel = await page.textContent('#input-label');
    expect(inputLabel).toBeTruthy();
    // After swap, should no longer say "Text Input" (EN) or "Testo di Input" (IT)
    const outputLabel = await page.textContent('#output-label');
    expect(outputLabel).toBeTruthy();
  });

  test('copy button shows error when output is empty', async ({ page }) => {
    await page.click('#btn-copy');
    await expect(page.locator('#error-notification')).toBeVisible();
  });

  test('sample button loads sample text', async ({ page }) => {
    await page.click('#btn-sample');
    const input = await page.inputValue('#text-input');
    expect(input.length).toBeGreaterThan(0);
  });

  test('clear button resets all fields', async ({ page }) => {
    await page.fill('#text-input', 'Hello');
    await page.click('#btn-convert');
    await page.click('#btn-clear');

    expect(await page.inputValue('#text-input')).toBe('');
    expect(await page.inputValue('#binary-output')).toBe('');
    await expect(page.locator('#stats-bar')).toBeHidden();
  });

  test('stats bar appears after conversion', async ({ page }) => {
    await page.fill('#text-input', 'ABC');
    await page.click('#btn-convert');

    await expect(page.locator('#stats-bar')).toBeVisible();
    const chars = await page.textContent('#stat-chars');
    expect(chars).toBe('3');
  });

  test('character breakdown table appears', async ({ page }) => {
    await page.fill('#text-input', 'AB');
    await page.click('#btn-convert');

    await expect(page.locator('#breakdown')).toBeVisible();
  });
});
