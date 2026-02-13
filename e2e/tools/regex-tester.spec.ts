import { test, expect } from '../fixtures/tool-page';

const SLUG = 'regex-tester';

test.describe('Regex Tester — functional tests', () => {
  test.beforeEach(async ({ toolPage }) => {
    await toolPage.goto(SLUG);
  });

  test('matches email pattern in test string', async ({ page }) => {
    await page.fill('#regex-input', '[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\\.[a-zA-Z]{2,}');
    await page.fill('#test-string', 'Contact support@example.com for help');

    // Wait for debounce
    await page.waitForTimeout(300);

    const count = await page.textContent('#match-count');
    expect(count).toContain('1');
    await expect(page.locator('#match-details')).toBeVisible();
  });

  test('shows multiple matches with global flag', async ({ page }) => {
    await page.fill('#regex-input', '\\d+');
    await page.fill('#test-string', 'There are 3 cats and 5 dogs');

    await page.waitForTimeout(300);

    const count = await page.textContent('#match-count');
    expect(count).toContain('2');
  });

  test('shows error for invalid regex', async ({ page }) => {
    await page.fill('#regex-input', '[invalid');
    await page.fill('#test-string', 'test');

    await page.waitForTimeout(300);

    await expect(page.locator('#error-display')).toBeVisible();
  });

  test('load example populates fields', async ({ page }) => {
    await page.selectOption('#examples-select', 'email');

    const regexValue = await page.inputValue('#regex-input');
    expect(regexValue.length).toBeGreaterThan(0);

    const testValue = await page.inputValue('#test-string');
    expect(testValue.length).toBeGreaterThan(0);

    await page.waitForTimeout(300);

    const count = await page.textContent('#match-count');
    expect(count).not.toContain('0');
  });

  test('clear button resets all fields', async ({ page }) => {
    await page.fill('#regex-input', '\\d+');
    await page.fill('#test-string', '123');
    await page.waitForTimeout(300);

    await page.click('#btn-clear');

    expect(await page.inputValue('#regex-input')).toBe('');
    expect(await page.inputValue('#test-string')).toBe('');
    await expect(page.locator('#match-details')).toBeHidden();
  });

  test('flag toggles update display', async ({ page }) => {
    // Uncheck global flag
    await page.uncheck('#flag-g');
    const flags = await page.textContent('#flags-display');
    expect(flags).not.toContain('g');

    // Check case-insensitive flag
    await page.check('#flag-i');
    const flags2 = await page.textContent('#flags-display');
    expect(flags2).toContain('i');
  });
});
