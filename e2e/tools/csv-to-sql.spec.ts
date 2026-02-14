import { test, expect } from '../fixtures/tool-page';

const SLUG = 'csv-to-sql';

test.describe('CSV to SQL — functional tests', () => {
  test.beforeEach(async ({ toolPage }) => {
    await toolPage.goto(SLUG);
  });

  test('converts CSV to SQL INSERT statements', async ({ page }) => {
    await page.fill('#csv-input', 'id,name\n1,Alice\n2,Bob');
    await page.click('#btn-convert');

    const output = await page.inputValue('#sql-output');
    expect(output).toContain('INSERT INTO');
    expect(output).toContain('Alice');
    expect(output).toContain('Bob');
    await expect(page.locator('#success-notification')).toBeVisible();
  });

  test('generates CREATE TABLE when checkbox enabled', async ({ page }) => {
    await page.fill('#csv-input', 'id,name\n1,Alice');
    await page.check('#include-create');
    await page.click('#btn-convert');

    const output = await page.inputValue('#sql-output');
    expect(output).toContain('CREATE TABLE');
  });

  test('shows error on empty input', async ({ page }) => {
    await page.click('#btn-convert');
    await expect(page.locator('#error-notification')).toBeVisible();
  });

  test('sample button loads sample data', async ({ page }) => {
    await page.click('#btn-sample');
    const input = await page.inputValue('#csv-input');
    expect(input.length).toBeGreaterThan(0);
    expect(input).toContain('John Smith');
  });

  test('clear button resets all fields', async ({ page }) => {
    await page.click('#btn-sample');
    await page.click('#btn-convert');
    await page.click('#btn-clear');

    expect(await page.inputValue('#csv-input')).toBe('');
    expect(await page.inputValue('#sql-output')).toBe('');
    await expect(page.locator('#stats-bar')).toBeHidden();
  });

  test('stats bar shows after conversion', async ({ page }) => {
    await page.fill('#csv-input', 'id,name\n1,Alice\n2,Bob');
    await page.click('#btn-convert');

    await expect(page.locator('#stats-bar')).toBeVisible();
    await expect(page.locator('#stat-rows')).toHaveText('2');
    await expect(page.locator('#stat-cols')).toHaveText('2');
  });
});
