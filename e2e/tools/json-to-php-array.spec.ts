import { test, expect } from '../fixtures/tool-page';

const SLUG = 'json-to-php-array';

test.describe('JSON to PHP Array — functional tests', () => {
  test.beforeEach(async ({ toolPage }) => {
    await toolPage.goto(SLUG);
  });

  test('converts valid JSON to PHP array', async ({ page }) => {
    await page.fill('#json-input', '{"name": "John", "age": 30}');
    await page.click('#btn-convert');

    const output = await page.inputValue('#php-output');
    expect(output).toContain('=>');
    expect(output).toContain('John');
    expect(output).toContain('30');
    await expect(page.locator('#stats-bar')).toBeVisible();
  });

  test('shows error on empty input', async ({ page }) => {
    await page.click('#btn-convert');
    await expect(page.locator('#error-notification')).toBeVisible();
  });

  test('shows error on invalid JSON', async ({ page }) => {
    await page.fill('#json-input', '{invalid json}');
    await page.click('#btn-convert');
    await expect(page.locator('#error-notification')).toBeVisible();
  });

  test('sample button loads sample JSON', async ({ page }) => {
    await page.click('#btn-sample');
    const input = await page.inputValue('#json-input');
    expect(input.length).toBeGreaterThan(0);
    expect(input).toContain('app_name');
  });

  test('clear button resets fields', async ({ page }) => {
    await page.fill('#json-input', '{"a": 1}');
    await page.click('#btn-convert');
    await page.click('#btn-clear');

    expect(await page.inputValue('#json-input')).toBe('');
    expect(await page.inputValue('#php-output')).toBe('');
    await expect(page.locator('#stats-bar')).toBeHidden();
  });

  test('stats display after conversion', async ({ page }) => {
    await page.fill('#json-input', '{"a": 1, "b": [1, 2]}');
    await page.click('#btn-convert');

    await expect(page.locator('#stats-bar')).toBeVisible();
    const keys = await page.textContent('#stat-keys');
    expect(parseInt(keys!)).toBeGreaterThan(0);
  });
});
