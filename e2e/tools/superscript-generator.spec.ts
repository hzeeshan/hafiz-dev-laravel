import { test, expect } from '../fixtures/tool-page';

const SLUG = 'superscript-generator';

test.describe('Superscript Text Generator — functional tests', () => {
  test.beforeEach(async ({ toolPage }) => {
    await toolPage.goto(SLUG);
  });

  test('converts text to superscript on input', async ({ page }) => {
    await page.fill('#text-input', 'Hello');
    // Real-time conversion should populate output
    const output = await page.inputValue('#text-output');
    expect(output.length).toBeGreaterThan(0);
    expect(output).not.toBe('Hello');
  });

  test('real-time conversion produces correct superscript with stats', async ({ page }) => {
    await page.fill('#text-input', 'abc 123');
    const output = await page.inputValue('#text-output');
    expect(output).toContain('ᵃ');
    expect(output).toContain('¹');
    await expect(page.locator('#stats-bar')).toBeVisible();
  });

  test('sample button loads data', async ({ page }) => {
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

  test('copy button works when output exists', async ({ page, context }) => {
    await context.grantPermissions(['clipboard-read', 'clipboard-write']);
    await page.click('#btn-sample');
    await page.click('#btn-copy');
    // Check button text changes to "Copied!"
    await expect(page.locator('#btn-copy')).toContainText('Copied!');
  });

  test('stats bar shows correct counts', async ({ page }) => {
    await page.fill('#text-input', 'ab!');
    await expect(page.locator('#stats-bar')).toBeVisible();
    const chars = await page.textContent('#stat-chars');
    expect(chars).toBe('3');
    const converted = await page.textContent('#stat-converted');
    expect(converted).toBe('2'); // a and b are converted, ! is not
  });

  test('number conversion toggle works', async ({ page }) => {
    await page.fill('#text-input', '123');
    let output = await page.inputValue('#text-output');
    expect(output).toBe('¹²³');

    // Uncheck numbers option
    await page.click('#opt-numbers');
    output = await page.inputValue('#text-output');
    expect(output).toBe('123');
  });
});
