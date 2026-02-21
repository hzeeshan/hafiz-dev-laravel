import { test, expect } from '../fixtures/tool-page';

const SLUG = 'ai-ascii-art-generator';

test.describe('AI ASCII Art Generator — functional tests', () => {
  test.beforeEach(async ({ toolPage }) => {
    await toolPage.goto(SLUG);
  });

  test('generates ASCII art from text', async ({ page }) => {
    await page.fill('#text-input', 'HI');
    await page.click('#btn-generate');

    const output = await page.inputValue('#text-output');
    expect(output.length).toBeGreaterThan(0);
    // Output should contain multiple lines (ASCII art is multi-line)
    expect(output.split('\n').length).toBeGreaterThan(1);
  });

  test('shows error on empty input', async ({ page }) => {
    await page.click('#btn-generate');
    await expect(page.locator('#error-notification')).toBeVisible();
  });

  test('sample button loads data', async ({ page }) => {
    await page.click('#btn-sample');
    const input = await page.inputValue('#text-input');
    expect(input.length).toBeGreaterThan(0);
  });

  test('sample button generates output automatically', async ({ page }) => {
    await page.click('#btn-sample');
    const output = await page.inputValue('#text-output');
    expect(output.length).toBeGreaterThan(0);
  });

  test('clear button resets state', async ({ page }) => {
    await page.click('#btn-sample');
    await page.click('#btn-clear');
    const input = await page.inputValue('#text-input');
    const output = await page.inputValue('#text-output');
    expect(input).toBe('');
    expect(output).toBe('');
  });

  test('stats bar shows after generation', async ({ page }) => {
    await page.fill('#text-input', 'TEST');
    await page.click('#btn-generate');
    await expect(page.locator('#stats-bar')).toBeVisible();
  });

  test('font change regenerates output', async ({ page }) => {
    await page.fill('#text-input', 'AB');
    await page.click('#btn-generate');
    const output1 = await page.inputValue('#text-output');

    await page.selectOption('#font-select', 'banner');
    const output2 = await page.inputValue('#text-output');

    expect(output1).not.toBe(output2);
  });

  test('copy button exists and is clickable when output exists', async ({ page }) => {
    await page.click('#btn-sample');
    // Verify output is generated before attempting copy
    const output = await page.inputValue('#text-output');
    expect(output.length).toBeGreaterThan(0);
    // Verify copy button is present and clickable
    await expect(page.locator('#btn-copy')).toBeVisible();
    await expect(page.locator('#btn-copy')).toBeEnabled();
  });
});
