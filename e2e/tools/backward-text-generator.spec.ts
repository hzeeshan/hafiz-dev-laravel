import { test, expect } from '../fixtures/tool-page';

const SLUG = 'backward-text-generator';

test.describe('Backward Text Generator — functional tests', () => {
  test.beforeEach(async ({ toolPage }) => {
    await toolPage.goto(SLUG);
  });

  test('core functionality works — reverses characters', async ({ page }) => {
    await page.fill('#text-input', 'Hello World');
    await page.click('#btn-generate');

    const output = await page.inputValue('#text-output');
    expect(output).toBe('dlroW olleH');
    await expect(page.locator('#stats-bar')).toBeVisible();
  });

  test('reverses word order when words mode selected', async ({ page }) => {
    await page.click('#opt-words');
    await page.fill('#text-input', 'Hello World Foo');
    await page.click('#btn-generate');

    const output = await page.inputValue('#text-output');
    expect(output).toBe('Foo World Hello');
  });

  test('reverses each word individually', async ({ page }) => {
    await page.check('#opt-per-word');
    await page.fill('#text-input', 'Hello World');
    await page.click('#btn-generate');

    const output = await page.inputValue('#text-output');
    expect(output).toBe('olleH dlroW');
  });

  test('shows error on empty input', async ({ page }) => {
    await page.click('#btn-generate');
    await expect(page.locator('#error-notification')).toBeVisible();
  });

  test('sample button loads data', async ({ page }) => {
    await page.click('#btn-sample');
    const input = await page.inputValue('#text-input');
    expect(input.length).toBeGreaterThan(0);
    // Sample also triggers convert, so output should have content
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

  test('copy button does nothing when output is empty', async ({ page }) => {
    await page.click('#btn-copy');
    // No notification should appear when there's no output
    await expect(page.locator('#success-notification')).toBeHidden();
  });

  test('keyboard shortcut Ctrl+Enter triggers conversion', async ({ page }) => {
    await page.fill('#text-input', 'Shortcut Test');
    await page.press('#text-input', 'Control+Enter');

    const output = await page.inputValue('#text-output');
    expect(output).toBe('tseT tuctrohS');
  });
});
