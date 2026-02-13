import { test, expect } from '../fixtures/tool-page';

const SLUG = 'json-to-csv-converter';

test.describe('JSON to CSV Converter — functional tests', () => {
  test.beforeEach(async ({ toolPage }) => {
    await toolPage.goto(SLUG);
  });

  test('converts JSON array to CSV', async ({ page }) => {
    const json = JSON.stringify([
      { name: 'Alice', age: 30 },
      { name: 'Bob', age: 25 },
    ], null, 2);

    await page.fill('#data-input', json);
    await page.click('#btn-convert');

    const output = await page.inputValue('#data-output-csv');
    expect(output).toContain('name');
    expect(output).toContain('age');
    expect(output).toContain('Alice');
    expect(output).toContain('Bob');
    await expect(page.locator('#success-notification')).toBeVisible();
  });

  test('shows error on empty input', async ({ page }) => {
    await page.click('#btn-convert');
    await expect(page.locator('#error-notification')).toBeVisible();
  });

  test('shows error on invalid JSON', async ({ page }) => {
    await page.fill('#data-input', '{ invalid json }');
    await page.click('#btn-convert');
    await expect(page.locator('#error-notification')).toBeVisible();
  });

  test('sample button loads sample data', async ({ page }) => {
    await page.click('#btn-sample');
    const input = await page.inputValue('#data-input');
    expect(input.length).toBeGreaterThan(0);
    expect(input).toContain('John Doe');
  });

  test('clear button resets all fields', async ({ page }) => {
    await page.click('#btn-sample');
    await page.click('#btn-convert');
    await page.click('#btn-clear');

    expect(await page.inputValue('#data-input')).toBe('');
    expect(await page.inputValue('#data-output-csv')).toBe('');
    await expect(page.locator('#stats-bar')).toBeHidden();
  });

  test('statistics bar shows after conversion', async ({ page }) => {
    const json = JSON.stringify([
      { name: 'Alice', age: 30 },
      { name: 'Bob', age: 25 },
    ], null, 2);

    await page.fill('#data-input', json);
    await page.click('#btn-convert');

    await expect(page.locator('#stats-bar')).toBeVisible();
    const rows = await page.textContent('#stat-rows');
    expect(rows).toBe('2');
    const cols = await page.textContent('#stat-columns');
    expect(cols).toBe('2');
  });

  test('CSV to JSON tab switches direction', async ({ page }) => {
    await page.click('#csv-to-json-tab');

    const inputLabel = await page.textContent('#input-label');
    expect(inputLabel).toMatch(/CSV/i);
  });

  test('converts CSV to JSON', async ({ page }) => {
    await page.click('#csv-to-json-tab');

    const csv = 'name,age\nAlice,30\nBob,25';
    await page.fill('#data-input', csv);
    await page.click('#btn-convert');

    await expect(page.locator('#success-notification')).toBeVisible();
    await expect(page.locator('#stats-bar')).toBeVisible();
  });
});
