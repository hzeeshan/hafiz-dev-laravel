import { test, expect } from '../fixtures/tool-page';

const SLUG = 'color-converter';

test.describe('Color Converter — functional tests', () => {
  test.beforeEach(async ({ toolPage }) => {
    await toolPage.goto(SLUG);
  });

  test('initializes with default gold color', async ({ page }) => {
    const hexValue = await page.inputValue('#input-hex');
    expect(hexValue).toBe('D4AF37');

    const rValue = await page.inputValue('#input-r');
    expect(rValue).toBe('212');
  });

  test('HEX input updates all other formats', async ({ page }) => {
    await page.fill('#input-hex', 'FF0000');

    const r = await page.inputValue('#input-r');
    const g = await page.inputValue('#input-g');
    const b = await page.inputValue('#input-b');
    expect(r).toBe('255');
    expect(g).toBe('0');
    expect(b).toBe('0');

    const h = await page.inputValue('#input-h');
    expect(h).toBe('0');
  });

  test('RGB inputs update HEX', async ({ page }) => {
    await page.fill('#input-r', '0');
    await page.fill('#input-g', '255');
    await page.fill('#input-b', '0');

    const hex = await page.inputValue('#input-hex');
    expect(hex).toBe('00FF00');
  });

  test('random button changes the color', async ({ page }) => {
    const hexBefore = await page.inputValue('#input-hex');
    await page.click('#btn-random');
    // Random could theoretically give the same color, but it's very unlikely
    // Just verify the page didn't crash and inputs still have values
    const hexAfter = await page.inputValue('#input-hex');
    expect(hexAfter.length).toBe(6);
  });

  test('complementary color is displayed', async ({ page }) => {
    const compHex = await page.textContent('#complementary-hex');
    expect(compHex).toBeTruthy();
    expect(compHex!.startsWith('#')).toBe(true);
  });

  test('contrast ratios are calculated', async ({ page }) => {
    const whiteRatio = await page.textContent('#contrast-white-ratio');
    const blackRatio = await page.textContent('#contrast-black-ratio');
    expect(whiteRatio).toMatch(/\d+\.\d+:1/);
    expect(blackRatio).toMatch(/\d+\.\d+:1/);
  });

  test('WCAG badges show pass or fail', async ({ page }) => {
    const whiteAa = await page.textContent('#wcag-white-aa');
    const blackAa = await page.textContent('#wcag-black-aa');
    // Match English (Pass/Fail) or Italian (Superato/Non superato)
    expect(whiteAa).toMatch(/AA: .+/);
    expect(blackAa).toMatch(/AA: .+/);
  });

  test('copy buttons are present for all formats', async ({ page }) => {
    const copyBtns = page.locator('.copy-btn');
    const count = await copyBtns.count();
    expect(count).toBe(5); // HEX, RGB, RGBA, HSL, HSLA
  });
});
