import { test, expect } from '../fixtures/tool-page';

const SLUG = 'korean-age-calculator';

test.describe('Korean Age Calculator — functional tests', () => {
  test.beforeEach(async ({ toolPage }) => {
    await toolPage.goto(SLUG);
  });

  test('calculates Korean age correctly', async ({ page }) => {
    await page.fill('#birth-date', '1995-06-15');
    await page.click('#btn-calculate');

    await expect(page.locator('#results-section')).toBeVisible();
    const koreanAge = await page.textContent('#korean-age');
    expect(Number(koreanAge)).toBeGreaterThan(0);
  });

  test('shows results section after calculation', async ({ page }) => {
    await page.fill('#birth-date', '2000-01-01');
    await page.click('#btn-calculate');

    await expect(page.locator('#results-section')).toBeVisible();
    await expect(page.locator('#korean-age')).not.toHaveText('0');
    await expect(page.locator('#international-age')).not.toHaveText('0');
  });

  test('shows alert on empty birth date', async ({ page }) => {
    page.on('dialog', (dialog) => dialog.accept());
    await page.click('#btn-calculate');

    // Results should remain hidden
    await expect(page.locator('#results-section')).toBeHidden();
  });

  test('reset button clears results', async ({ page }) => {
    await page.fill('#birth-date', '1995-06-15');
    await page.click('#btn-calculate');
    await expect(page.locator('#results-section')).toBeVisible();

    await page.click('#btn-reset');
    await expect(page.locator('#results-section')).toBeHidden();
  });

  test('displays zodiac sign', async ({ page }) => {
    await page.fill('#birth-date', '1995-06-15');
    await page.click('#btn-calculate');

    const zodiac = await page.textContent('#zodiac-display');
    expect(zodiac).toContain('♊');
  });

  test('displays formula correctly', async ({ page }) => {
    await page.fill('#birth-date', '1995-06-15');
    await page.click('#btn-calculate');

    const formula = await page.textContent('#formula-display');
    expect(formula).toContain('1995');
    expect(formula).toContain('+ 1');
  });
});
