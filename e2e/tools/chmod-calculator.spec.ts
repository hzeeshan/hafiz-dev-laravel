import { test, expect } from '../fixtures/tool-page';

const SLUG = 'chmod-calculator';

test.describe('Chmod Calculator — functional tests', () => {
  test.beforeEach(async ({ toolPage }) => {
    await toolPage.goto(SLUG);
  });

  test('default permission is 755', async ({ page }) => {
    const octal = await page.inputValue('#octal-input');
    expect(octal).toBe('755');
    await expect(page.locator('#result-octal')).toHaveText('755');
    await expect(page.locator('#result-symbolic')).toHaveText('rwxr-xr-x');
  });

  test('checkbox changes update octal', async ({ page }) => {
    // Uncheck owner-x to make it 655
    await page.uncheck('#owner-x');
    await expect(page.locator('#result-octal')).toHaveText('655');
  });

  test('octal input updates checkboxes', async ({ page }) => {
    await page.fill('#octal-input', '644');
    await expect(page.locator('#result-octal')).toHaveText('644');
    await expect(page.locator('#result-symbolic')).toHaveText('rw-r--r--');
  });

  test('preset 777 shows security warning', async ({ page }) => {
    await page.click('.preset-btn[data-octal="777"]');
    await expect(page.locator('#security-warning')).toBeVisible();
  });

  test('preset 644 hides security warning', async ({ page }) => {
    await page.click('.preset-btn[data-octal="644"]');
    await expect(page.locator('#security-warning')).toBeHidden();
  });
});
