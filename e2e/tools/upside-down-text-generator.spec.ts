import { test, expect } from '../fixtures/tool-page';

const SLUG = 'upside-down-text-generator';

test.describe('Upside Down Text Generator — functional tests', () => {
  test.beforeEach(async ({ toolPage }) => {
    await toolPage.goto(SLUG);
  });

  test('converts typed text to upside down', async ({ page }) => {
    await page.fill('#text-input', 'hello');
    const output = await page.inputValue('#text-output');
    expect(output.length).toBeGreaterThan(0);
    expect(output).not.toBe('hello');
  });

  test('sample button populates input and output', async ({ page }) => {
    await page.click('#btn-sample');
    const input = await page.inputValue('#text-input');
    const output = await page.inputValue('#text-output');
    expect(input.length).toBeGreaterThan(0);
    expect(output.length).toBeGreaterThan(0);
  });

  test('clear button resets both fields', async ({ page }) => {
    await page.click('#btn-sample');
    await page.click('#btn-clear');
    const input = await page.inputValue('#text-input');
    const output = await page.inputValue('#text-output');
    expect(input).toBe('');
    expect(output).toBe('');
  });

  test('reverse checkbox affects output', async ({ page }) => {
    await page.fill('#text-input', 'abc');
    const withReverse = await page.inputValue('#text-output');

    await page.uncheck('#opt-reverse');
    const withoutReverse = await page.inputValue('#text-output');

    expect(withReverse).not.toBe(withoutReverse);
  });

  test('stats bar appears when text is entered', async ({ page }) => {
    await page.fill('#text-input', 'hello world');
    const statsBar = page.locator('#stats-bar');
    await expect(statsBar).toBeVisible();
  });
});
