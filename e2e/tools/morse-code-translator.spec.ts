import { test, expect } from '../fixtures/tool-page';

const SLUG = 'morse-code-translator';

test.describe('Morse Code Translator — functional tests', () => {
  test.beforeEach(async ({ toolPage }) => {
    await toolPage.goto(SLUG);
  });

  test('encodes text to Morse code', async ({ page }) => {
    await page.fill('#text-input', 'SOS');
    const output = await page.inputValue('#text-output');
    expect(output).toBe('... --- ...');
  });

  test('decodes Morse code to text', async ({ page }) => {
    await page.click('input[name="direction"][value="morse-to-text"]');
    await page.fill('#text-input', '... --- ...');
    const output = await page.inputValue('#text-output');
    expect(output).toBe('SOS');
  });

  test('handles word separation with /', async ({ page }) => {
    await page.fill('#text-input', 'HI THERE');
    const output = await page.inputValue('#text-output');
    expect(output).toContain('/');
  });

  test('shows stats on input', async ({ page }) => {
    await page.fill('#text-input', 'HELLO');
    await expect(page.locator('#stats-bar')).toBeVisible();
    const chars = await page.textContent('#stat-chars');
    expect(chars).toBe('5');
  });

  test('sample button loads sample text', async ({ page }) => {
    await page.click('#btn-sample');
    const input = await page.inputValue('#text-input');
    expect(input.length).toBeGreaterThan(0);
    const output = await page.inputValue('#text-output');
    expect(output.length).toBeGreaterThan(0);
  });

  test('clear button resets everything', async ({ page }) => {
    await page.fill('#text-input', 'HELLO');
    await page.click('#btn-clear');
    expect(await page.inputValue('#text-input')).toBe('');
    expect(await page.inputValue('#text-output')).toBe('');
    await expect(page.locator('#stats-bar')).toBeHidden();
  });

  test('direction toggle switches labels', async ({ page }) => {
    await page.click('input[name="direction"][value="morse-to-text"]');
    const inputLabel = await page.textContent('#input-label');
    expect(inputLabel).toContain('Morse');
  });
});
