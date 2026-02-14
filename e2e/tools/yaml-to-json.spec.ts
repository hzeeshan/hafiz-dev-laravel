import { test, expect } from '../fixtures/tool-page';

const SLUG = 'yaml-to-json';

test.describe('YAML to JSON Converter — functional tests', () => {
  test.beforeEach(async ({ toolPage }) => {
    await toolPage.goto(SLUG);
  });

  test('converts valid YAML to JSON', async ({ page }) => {
    await page.fill('#yaml-input', 'name: test\nversion: "1.0.0"');
    await page.click('#btn-convert');

    const output = await page.inputValue('#json-output-raw');
    const parsed = JSON.parse(output);
    expect(parsed.name).toBe('test');
    expect(parsed.version).toBe('1.0.0');
    await expect(page.locator('#success-notification')).toBeVisible();
  });

  test('shows error on empty input', async ({ page }) => {
    await page.click('#btn-convert');
    await expect(page.locator('#error-notification')).toBeVisible();
  });

  test('shows error on invalid YAML', async ({ page }) => {
    await page.fill('#yaml-input', 'invalid:\n  - missing\n value');
    await page.click('#btn-convert');
    await expect(page.locator('#error-notification')).toBeVisible();
  });

  test('handles nested YAML structures', async ({ page }) => {
    await page.fill('#yaml-input', 'a:\n  b:\n    c: deep');
    await page.click('#btn-convert');

    const output = await page.inputValue('#json-output-raw');
    const parsed = JSON.parse(output);
    expect(parsed.a.b.c).toBe('deep');
  });

  test('sample button loads YAML', async ({ page }) => {
    await page.click('#btn-sample');
    const input = await page.inputValue('#yaml-input');
    expect(input.length).toBeGreaterThan(0);
    expect(input).toContain('apiVersion');
  });

  test('clear button resets all', async ({ page }) => {
    await page.fill('#yaml-input', 'a: 1');
    await page.click('#btn-convert');
    await page.click('#btn-clear');

    expect(await page.inputValue('#yaml-input')).toBe('');
    expect(await page.inputValue('#json-output-raw')).toBe('');
    await expect(page.locator('#stats-bar')).toBeHidden();
  });

  test('stats bar appears after conversion', async ({ page }) => {
    await page.fill('#yaml-input', 'a: 1\nb: 2');
    await page.click('#btn-convert');

    await expect(page.locator('#stats-bar')).toBeVisible();
    const keys = await page.textContent('#stat-keys');
    expect(keys).toBe('2');
  });

  test('syntax highlighted output is shown', async ({ page }) => {
    await page.fill('#yaml-input', 'name: test');
    await page.click('#btn-convert');

    const outputHtml = await page.innerHTML('#output-code');
    expect(outputHtml).toContain('text-gold'); // key highlighting
    expect(outputHtml).toContain('text-sky-400'); // string highlighting
  });
});
