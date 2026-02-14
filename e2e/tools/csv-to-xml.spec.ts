import { test, expect } from '../fixtures/tool-page';

const SLUG = 'csv-to-xml';

test.describe('CSV to XML — functional tests', () => {
  test.beforeEach(async ({ toolPage }) => {
    await toolPage.goto(SLUG);
  });

  test('converts CSV to XML', async ({ page }) => {
    await page.fill('#csv-input', 'name,age\nJohn,30\nJane,25');
    await page.click('#btn-convert');

    const output = await page.inputValue('#xml-output');
    expect(output).toContain('<data>');
    expect(output).toContain('<record>');
    expect(output).toContain('<name>John</name>');
    expect(output).toContain('<age>30</age>');
  });

  test('shows error on empty input', async ({ page }) => {
    await page.click('#btn-convert');
    await expect(page.locator('#error-notification')).toBeVisible();
  });

  test('sample button loads sample data', async ({ page }) => {
    await page.click('#btn-sample');
    const input = await page.inputValue('#csv-input');
    expect(input.length).toBeGreaterThan(0);
  });

  test('clear button resets all fields', async ({ page }) => {
    await page.fill('#csv-input', 'a,b\n1,2');
    await page.click('#btn-convert');
    await page.click('#btn-clear');

    expect(await page.inputValue('#csv-input')).toBe('');
    expect(await page.inputValue('#xml-output')).toBe('');
    await expect(page.locator('#stats-bar')).toBeHidden();
  });

  test('stats bar shows row and column counts', async ({ page }) => {
    await page.fill('#csv-input', 'name,age\nJohn,30\nJane,25');
    await page.click('#btn-convert');

    await expect(page.locator('#stats-bar')).toBeVisible();
    const rows = await page.textContent('#stat-rows');
    expect(rows).toBe('2');
    const cols = await page.textContent('#stat-cols');
    expect(cols).toBe('2');
  });

  test('copy button shows error when output is empty', async ({ page }) => {
    await page.click('#btn-copy');
    await expect(page.locator('#error-notification')).toBeVisible();
  });
});
