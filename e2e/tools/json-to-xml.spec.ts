import { test, expect } from '../fixtures/tool-page';

const SLUG = 'json-to-xml';

test.describe('JSON to XML — functional tests', () => {
  test.beforeEach(async ({ toolPage }) => {
    await toolPage.goto(SLUG);
  });

  test('converts JSON to XML', async ({ page }) => {
    await page.fill('#json-input', '{"name": "John", "age": 30}');
    await page.click('#btn-convert');

    const output = await page.inputValue('#xml-output');
    expect(output).toContain('<root>');
    expect(output).toContain('<name>John</name>');
    expect(output).toContain('<age>30</age>');
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
    expect(input).toContain('company');
  });

  test('clear button resets all fields', async ({ page }) => {
    await page.fill('#json-input', '{"a":1}');
    await page.click('#btn-convert');
    await page.click('#btn-clear');

    expect(await page.inputValue('#json-input')).toBe('');
    expect(await page.inputValue('#xml-output')).toBe('');
    await expect(page.locator('#stats-bar')).toBeHidden();
  });

  test('stats bar shows element count and depth', async ({ page }) => {
    await page.fill('#json-input', '{"name": "John", "age": 30}');
    await page.click('#btn-convert');

    await expect(page.locator('#stats-bar')).toBeVisible();
    const elements = await page.textContent('#stat-elements');
    expect(parseInt(elements!)).toBeGreaterThan(0);
  });

  test('copy button shows error when output is empty', async ({ page }) => {
    await page.click('#btn-copy');
    await expect(page.locator('#error-notification')).toBeVisible();
  });
});
