import { test, expect } from '../fixtures/tool-page';

const SLUG = 'whitespace-remover';

test.describe('Whitespace Remover — functional tests', () => {
  test.beforeEach(async ({ toolPage }) => {
    await toolPage.goto(SLUG);
  });

  test('cleans extra spaces from input', async ({ page }) => {
    await page.fill('#input-text', 'Hello   World   how   are   you');
    await page.click('#btn-clean');

    const output = await page.inputValue('#output-text');
    expect(output).toBe('Hello World how are you');
  });

  test('removes leading and trailing whitespace', async ({ page }) => {
    await page.fill('#input-text', '   hello world   ');
    await page.click('#btn-clean');

    const output = await page.inputValue('#output-text');
    expect(output.trim()).toBe('hello world');
  });

  test('removes blank lines when option is checked', async ({ page }) => {
    await page.check('#opt-blank-lines');
    await page.fill('#input-text', 'line one\n\nline two\n\nline three');
    await page.click('#btn-clean');

    const output = await page.inputValue('#output-text');
    expect(output).not.toContain('\n\n');
  });

  test('removes all whitespace when option is checked', async ({ page }) => {
    await page.check('#opt-all-whitespace');
    await page.fill('#input-text', 'hello world\nfoo bar');
    await page.click('#btn-clean');

    const output = await page.inputValue('#output-text');
    expect(output).toBe('helloworldfoobar');
  });

  test('stats update after cleaning', async ({ page }) => {
    await page.fill('#input-text', 'a   b   c');
    await page.click('#btn-clean');

    const charsRemoved = await page.textContent('#stat-chars-removed');
    expect(Number(charsRemoved)).toBeGreaterThan(0);
  });

  test('sample button loads text', async ({ page }) => {
    await page.click('#btn-sample');
    const input = await page.inputValue('#input-text');
    expect(input.length).toBeGreaterThan(0);
    await expect(page.locator('#success-notification')).toBeVisible();
  });

  test('clear button resets everything', async ({ page }) => {
    await page.click('#btn-sample');
    await page.click('#btn-clean');
    await page.click('#btn-clear');

    expect(await page.inputValue('#input-text')).toBe('');
    expect(await page.inputValue('#output-text')).toBe('');
    expect(await page.textContent('#stat-chars-removed')).toBe('0');
  });

  test('copy shows error when output is empty', async ({ page }) => {
    await page.click('#btn-copy');
    await expect(page.locator('#error-notification')).toBeVisible();
  });

  test('download shows error when output is empty', async ({ page }) => {
    await page.click('#btn-download');
    await expect(page.locator('#error-notification')).toBeVisible();
  });

  test('processes text in real-time on input', async ({ page }) => {
    await page.fill('#input-text', 'a   b');
    // Wait for debounce
    await page.waitForTimeout(400);
    const output = await page.inputValue('#output-text');
    expect(output).toBe('a b');
  });
});
