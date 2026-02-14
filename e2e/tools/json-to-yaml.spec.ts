import { test, expect } from '../fixtures/tool-page';

const SLUG = 'json-to-yaml';

test.describe('JSON to YAML Converter — functional tests', () => {
  test.beforeEach(async ({ toolPage }) => {
    await toolPage.goto(SLUG);
  });

  test('converts valid JSON to YAML', async ({ page }) => {
    await page.fill('#json-input', '{"name": "test", "version": "1.0.0"}');
    await page.click('#btn-convert');

    const output = await page.inputValue('#yaml-output');
    expect(output).toContain('name: test');
    expect(output).toContain('version:');
    await expect(page.locator('#success-notification')).toBeVisible();
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

  test('handles nested objects', async ({ page }) => {
    await page.fill('#json-input', '{"a": {"b": {"c": "deep"}}}');
    await page.click('#btn-convert');

    const output = await page.inputValue('#yaml-output');
    expect(output).toContain('a:');
    expect(output).toContain('b:');
    expect(output).toContain('c: deep');
  });

  test('sample button loads JSON', async ({ page }) => {
    await page.click('#btn-sample');
    const input = await page.inputValue('#json-input');
    expect(input.length).toBeGreaterThan(0);
    expect(input).toContain('apiVersion');
  });

  test('clear button resets all', async ({ page }) => {
    await page.fill('#json-input', '{"a": 1}');
    await page.click('#btn-convert');
    await page.click('#btn-clear');

    expect(await page.inputValue('#json-input')).toBe('');
    expect(await page.inputValue('#yaml-output')).toBe('');
    await expect(page.locator('#stats-bar')).toBeHidden();
  });

  test('stats bar appears after conversion', async ({ page }) => {
    await page.fill('#json-input', '{"a": 1, "b": 2}');
    await page.click('#btn-convert');

    await expect(page.locator('#stats-bar')).toBeVisible();
    const keys = await page.textContent('#stat-keys');
    expect(keys).toBe('2');
  });
});
