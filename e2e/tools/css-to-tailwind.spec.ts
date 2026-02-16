import { test, expect } from '../fixtures/tool-page';

const SLUG = 'css-to-tailwind';

test.describe('CSS to Tailwind — functional tests', () => {
  test.beforeEach(async ({ toolPage }) => {
    await toolPage.goto(SLUG);
  });

  test('converts CSS to Tailwind classes', async ({ page }) => {
    await page.fill('#css-input', '.box { display: flex; padding: 1rem; }');
    await page.click('#btn-convert');

    const output = await page.inputValue('#tw-output');
    expect(output).toContain('flex');
    expect(output).toContain('p-4');
    await expect(page.locator('#stats-bar')).toBeVisible();
  });

  test('shows error on empty input', async ({ page }) => {
    await page.click('#btn-convert');
    await expect(page.locator('#error-notification')).toBeVisible();
  });

  test('sample button loads sample CSS', async ({ page }) => {
    await page.click('#btn-sample');
    const input = await page.inputValue('#css-input');
    expect(input.length).toBeGreaterThan(0);
    expect(input).toContain('display');
  });

  test('clear button resets everything', async ({ page }) => {
    await page.fill('#css-input', '.x { color: #000; }');
    await page.click('#btn-convert');
    await page.click('#btn-clear');

    expect(await page.inputValue('#css-input')).toBe('');
    expect(await page.inputValue('#tw-output')).toBe('');
    await expect(page.locator('#stats-bar')).toBeHidden();
  });

  test('converts color properties', async ({ page }) => {
    await page.fill('#css-input', '.text { color: #ef4444; background-color: #ffffff; }');
    await page.click('#btn-convert');

    const output = await page.inputValue('#tw-output');
    expect(output).toContain('text-red-500');
    expect(output).toContain('bg-white');
  });
});
