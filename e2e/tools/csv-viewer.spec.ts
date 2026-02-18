import { test, expect } from '../fixtures/tool-page';

const SLUG = 'csv-viewer';

test.describe('CSV Viewer — functional tests', () => {
  test.beforeEach(async ({ toolPage }) => {
    await toolPage.goto(SLUG);
  });

  test('renders table from pasted CSV data', async ({ page }) => {
    await page.fill('#csv-input', 'Name,Age\nAlice,30\nBob,25');
    await page.click('#btn-view');

    await expect(page.locator('#table-area')).toBeVisible();
    await expect(page.locator('#csv-table')).toBeVisible();
    await expect(page.locator('#success-notification')).toBeVisible();
  });

  test('shows error on empty input', async ({ page }) => {
    await page.click('#btn-view');
    await expect(page.locator('#error-notification')).toBeVisible();
  });

  test('stats bar shows row and column counts', async ({ page }) => {
    await page.fill('#csv-input', 'A,B,C\n1,2,3\n4,5,6');
    await page.click('#btn-view');

    await expect(page.locator('#stats-bar')).toBeVisible();
    expect(await page.textContent('#stat-rows')).toBe('2');
    expect(await page.textContent('#stat-cols')).toBe('3');
  });

  test('sample button loads CSV data', async ({ page }) => {
    await page.click('#btn-sample');
    const input = await page.inputValue('#csv-input');
    expect(input.length).toBeGreaterThan(0);
  });

  test('clear button resets state', async ({ page }) => {
    await page.fill('#csv-input', 'X,Y\n1,2');
    await page.click('#btn-view');
    await page.click('#btn-clear');

    expect(await page.inputValue('#csv-input')).toBe('');
    await expect(page.locator('#table-area')).toBeHidden();
    await expect(page.locator('#stats-bar')).toBeHidden();
  });

  test('search filters table rows', async ({ page }) => {
    await page.fill('#csv-input', 'Name,City\nAlice,Paris\nBob,London\nCarla,Paris');
    await page.click('#btn-view');
    await expect(page.locator('#table-area')).toBeVisible();

    await page.fill('#table-search', 'Paris');
    const rows = page.locator('#table-body tr');
    await expect(rows).toHaveCount(2);
  });

  test('semicolon delimiter works', async ({ page }) => {
    await page.selectOption('#delimiter', ';');
    await page.fill('#csv-input', 'Name;Age\nAlice;30\nBob;25');
    await page.click('#btn-view');

    await expect(page.locator('#table-area')).toBeVisible();
    expect(await page.textContent('#stat-cols')).toBe('2');
  });
});
