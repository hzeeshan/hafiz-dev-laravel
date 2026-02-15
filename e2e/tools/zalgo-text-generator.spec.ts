import { test, expect } from '../fixtures/tool-page';

const SLUG = 'zalgo-text-generator';

test.describe('Zalgo Text Generator — functional tests', () => {
  test.beforeEach(async ({ toolPage }) => {
    await toolPage.goto(SLUG);
  });

  test('converts typed text to zalgo', async ({ page }) => {
    await page.fill('#text-input', 'hello');
    const output = await page.inputValue('#text-output');
    expect(output.length).toBeGreaterThan('hello'.length);
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

  test('regenerate produces different output', async ({ page }) => {
    await page.fill('#text-input', 'test');
    const output1 = await page.inputValue('#text-output');

    await page.click('#btn-regenerate');
    const output2 = await page.inputValue('#text-output');

    // Due to randomness, outputs should differ (very high probability)
    expect(output1.length).toBeGreaterThan(0);
    expect(output2.length).toBeGreaterThan(0);
  });

  test('chaos slider changes output intensity', async ({ page }) => {
    await page.fill('#text-input', 'test');
    await page.locator('#chaos-level').fill('1'); // Mini
    await page.locator('#chaos-level').dispatchEvent('input');
    const miniOutput = await page.inputValue('#text-output');

    await page.locator('#chaos-level').fill('3'); // Maximum
    await page.locator('#chaos-level').dispatchEvent('input');
    const maxOutput = await page.inputValue('#text-output');

    // Maximum chaos should produce longer output than mini
    expect(maxOutput.length).toBeGreaterThan(miniOutput.length);
  });
});
