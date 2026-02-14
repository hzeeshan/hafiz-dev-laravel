import { test, expect } from '../fixtures/tool-page';

const SLUG = 'json-to-typescript';

test.describe('JSON to TypeScript — functional tests', () => {
  test.beforeEach(async ({ toolPage }) => {
    await toolPage.goto(SLUG);
  });

  test('converts JSON to TypeScript interface', async ({ page }) => {
    await page.fill('#json-input', '{"name": "Alice", "age": 30}');
    await page.click('#btn-convert');

    const output = await page.inputValue('#ts-output');
    expect(output).toContain('interface');
    expect(output).toContain('name');
    expect(output).toContain('string');
    expect(output).toContain('age');
    expect(output).toContain('number');
    await expect(page.locator('#success-notification')).toBeVisible();
  });

  test('shows error on invalid JSON', async ({ page }) => {
    await page.fill('#json-input', '{invalid json}');
    await page.click('#btn-convert');
    await expect(page.locator('#error-notification')).toBeVisible();
  });

  test('shows error on empty input', async ({ page }) => {
    await page.click('#btn-convert');
    await expect(page.locator('#error-notification')).toBeVisible();
  });

  test('sample button loads sample JSON', async ({ page }) => {
    await page.click('#btn-sample');
    const input = await page.inputValue('#json-input');
    expect(input.length).toBeGreaterThan(0);
    expect(input).toContain('John Smith');
  });

  test('clear button resets all fields', async ({ page }) => {
    await page.click('#btn-sample');
    await page.click('#btn-convert');
    await page.click('#btn-clear');

    expect(await page.inputValue('#json-input')).toBe('');
    expect(await page.inputValue('#ts-output')).toBe('');
    await expect(page.locator('#stats-bar')).toBeHidden();
  });

  test('stats bar shows after conversion', async ({ page }) => {
    await page.fill('#json-input', '{"name": "Alice", "age": 30}');
    await page.click('#btn-convert');

    await expect(page.locator('#stats-bar')).toBeVisible();
    const interfaces = await page.textContent('#stat-interfaces');
    expect(Number(interfaces)).toBeGreaterThan(0);
  });
});
