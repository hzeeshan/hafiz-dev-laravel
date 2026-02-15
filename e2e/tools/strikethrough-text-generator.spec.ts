import { test, expect } from '../fixtures/tool-page';

const SLUG = 'strikethrough-text-generator';

test.describe('Strikethrough Text Generator — functional tests', () => {
  test.beforeEach(async ({ toolPage }) => {
    await toolPage.goto(SLUG);
  });

  test('converts typed text to strikethrough', async ({ page }) => {
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

  test('style radio switches between strikethrough styles', async ({ page }) => {
    await page.fill('#text-input', 'test');
    const singleOutput = await page.inputValue('#text-output');

    await page.click('input[name="style"][value="double"]');
    const doubleOutput = await page.inputValue('#text-output');

    expect(singleOutput).not.toBe(doubleOutput);
  });

  test('stats bar appears when text is entered', async ({ page }) => {
    await page.fill('#text-input', 'hello world');
    const statsBar = page.locator('#stats-bar');
    await expect(statsBar).toBeVisible();
  });
});
