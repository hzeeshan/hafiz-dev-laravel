import { test, expect } from '../fixtures/tool-page';

const SLUG = 'http-status-codes';

test.describe('HTTP Status Codes — functional tests', () => {
  test.beforeEach(async ({ toolPage }) => {
    await toolPage.goto(SLUG);
  });

  test('renders all status codes on load', async ({ page }) => {
    const count = await page.textContent('#result-count');
    expect(Number(count)).toBeGreaterThan(50);
  });

  test('search filters codes by number', async ({ page }) => {
    await page.fill('#search-input', '404');

    const count = await page.textContent('#result-count');
    expect(Number(count)).toBeGreaterThanOrEqual(1);
    expect(Number(count)).toBeLessThan(10);
  });

  test('search filters codes by name', async ({ page }) => {
    await page.fill('#search-input', 'Not Found');

    const count = await page.textContent('#result-count');
    expect(Number(count)).toBeGreaterThanOrEqual(1);
  });

  test('category filter works', async ({ page }) => {
    await page.click('.filter-btn[data-filter="2xx"]');

    const count = await page.textContent('#result-count');
    expect(Number(count)).toBeGreaterThan(0);
    expect(Number(count)).toBeLessThan(20);
  });

  test('shows no results for invalid search', async ({ page }) => {
    await page.fill('#search-input', 'zzzzznonexistent');

    const count = await page.textContent('#result-count');
    expect(Number(count)).toBe(0);
    await expect(page.locator('#no-results')).toBeVisible();
  });

  test('all filter resets view', async ({ page }) => {
    await page.click('.filter-btn[data-filter="4xx"]');
    const filteredCount = Number(await page.textContent('#result-count'));

    await page.click('.filter-btn[data-filter="all"]');
    const allCount = Number(await page.textContent('#result-count'));

    expect(allCount).toBeGreaterThan(filteredCount);
  });
});
