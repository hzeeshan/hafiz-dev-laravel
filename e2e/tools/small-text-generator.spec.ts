import { test, expect } from '../fixtures/tool-page';

const SLUG = 'small-text-generator';

test.describe('Small Text Generator — functional tests', () => {
  test.beforeEach(async ({ toolPage }) => {
    await toolPage.goto(SLUG);
  });

  test('converts text to superscript by default', async ({ page }) => {
    await page.fill('#text-input', 'Hello');
    const output = await page.inputValue('#text-output');
    expect(output).toBe('ᴴᵉˡˡᵒ');
  });

  test('converts text to subscript', async ({ page }) => {
    await page.click('input[name="style"][value="subscript"]');
    await page.fill('#text-input', 'hello');
    const output = await page.inputValue('#text-output');
    expect(output).toContain('ₕₑₗₗₒ');
  });

  test('converts text to small caps', async ({ page }) => {
    await page.click('input[name="style"][value="smallcaps"]');
    await page.fill('#text-input', 'hello');
    const output = await page.inputValue('#text-output');
    expect(output).toBe('ʜᴇʟʟᴏ');
  });

  test('shows stats on input', async ({ page }) => {
    await page.fill('#text-input', 'Hello');
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
    await page.fill('#text-input', 'Hello');
    await page.click('#btn-clear');
    expect(await page.inputValue('#text-input')).toBe('');
    expect(await page.inputValue('#text-output')).toBe('');
    await expect(page.locator('#stats-bar')).toBeHidden();
  });

  test('preview cards update with input', async ({ page }) => {
    await page.fill('#text-input', 'Test');
    const superPreview = await page.textContent('#preview-superscript');
    expect(superPreview).toBeTruthy();
    expect(superPreview).not.toBe('Hello World');
  });
});
