import { test, expect } from '../fixtures/tool-page';

const SLUG = 'number-to-word-converter';

test.describe('Number to Word Converter — functional tests', () => {
  test.beforeEach(async ({ toolPage }) => {
    await toolPage.goto(SLUG);
  });

  test('converts integer to words', async ({ page }) => {
    await page.fill('#number-input', '42');
    await page.click('#btn-convert');

    const output = await page.inputValue('#words-output');
    expect(output.toLowerCase()).toContain('forty');
    expect(output.toLowerCase()).toContain('two');
    await expect(page.locator('#success-notification')).toBeVisible();
  });

  test('converts large number to words', async ({ page }) => {
    await page.fill('#number-input', '1000000');
    await page.click('#btn-convert');

    const output = await page.inputValue('#words-output');
    expect(output.toLowerCase()).toContain('one');
    expect(output.toLowerCase()).toContain('million');
  });

  test('converts decimal number to words', async ({ page }) => {
    await page.fill('#number-input', '3.14');
    await page.click('#btn-convert');

    const output = await page.inputValue('#words-output');
    expect(output.toLowerCase()).toContain('three');
    expect(output.toLowerCase()).toContain('point');
  });

  test('converts negative number to words', async ({ page }) => {
    await page.fill('#number-input', '-500');
    await page.click('#btn-convert');

    const output = await page.inputValue('#words-output');
    expect(output.toLowerCase()).toContain('negative');
    expect(output.toLowerCase()).toContain('five hundred');
  });

  test('converts zero to words', async ({ page }) => {
    await page.fill('#number-input', '0');
    await page.click('#btn-convert');

    const output = await page.inputValue('#words-output');
    expect(output.toLowerCase()).toContain('zero');
  });

  test('shows error on empty input', async ({ page }) => {
    await page.click('#btn-convert');
    await expect(page.locator('#error-notification')).toBeVisible();
  });

  test('shows error on invalid input', async ({ page }) => {
    await page.fill('#number-input', 'abc');
    await page.click('#btn-convert');
    await expect(page.locator('#error-notification')).toBeVisible();
  });

  test('sample button loads data', async ({ page }) => {
    await page.click('#btn-sample');
    const input = await page.inputValue('#number-input');
    expect(input.length).toBeGreaterThan(0);
  });

  test('clear button resets state', async ({ page }) => {
    await page.click('#btn-sample');
    await page.click('#btn-convert');
    await page.click('#btn-clear');
    const input = await page.inputValue('#number-input');
    const output = await page.inputValue('#words-output');
    expect(input).toBe('');
    expect(output).toBe('');
  });

  test('copy button shows error when output is empty', async ({ page }) => {
    await page.click('#btn-copy');
    await expect(page.locator('#error-notification')).toBeVisible();
  });

  test('currency mode formats as dollars', async ({ page }) => {
    await page.check('#currency-mode');
    await page.fill('#number-input', '42.50');
    await page.click('#btn-convert');

    const output = await page.inputValue('#words-output');
    expect(output.toLowerCase()).toContain('dollar');
    expect(output.toLowerCase()).toContain('cent');
  });

  test('stats bar shows after conversion', async ({ page }) => {
    await page.fill('#number-input', '12345');
    await page.click('#btn-convert');
    await expect(page.locator('#stats-bar')).toBeVisible();
  });

  test('multi-line input converts all numbers', async ({ page }) => {
    await page.fill('#number-input', '1\n2\n3');
    await page.click('#btn-convert');

    const output = await page.inputValue('#words-output');
    const lines = output.split('\n');
    expect(lines.length).toBe(3);
  });
});
