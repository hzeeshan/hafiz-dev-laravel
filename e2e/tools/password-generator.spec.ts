import { test, expect } from '../fixtures/tool-page';

const SLUG = 'password-generator';

test.describe('Password Generator — functional tests', () => {
  test.beforeEach(async ({ toolPage }) => {
    await toolPage.goto(SLUG);
  });

  test('generates a password on page load', async ({ page }) => {
    // The script auto-generates on load
    const display = page.locator('#password-display');
    await expect(display).toBeVisible();
    const text = await display.textContent();
    // Should not be the placeholder text
    expect(text).not.toContain('Click Generate');
    expect(text).not.toContain('Clicca Genera');
    expect(text!.length).toBeGreaterThan(0);
  });

  test('generate button produces a new password', async ({ page }) => {
    const display = page.locator('#password-display');
    const firstPassword = await display.textContent();

    // Generate several times — at least one should be different (crypto random)
    let foundDifferent = false;
    for (let i = 0; i < 5; i++) {
      await page.click('#btn-generate');
      const newPassword = await display.textContent();
      if (newPassword !== firstPassword) {
        foundDifferent = true;
        break;
      }
    }
    expect(foundDifferent).toBe(true);
  });

  test('length slider changes password length', async ({ page }) => {
    // Set slider to 32
    await page.fill('#password-length', '32');
    await page.click('#btn-generate');

    const display = page.locator('#password-display');
    const password = await display.textContent();
    expect(password!.length).toBe(32);
  });

  test('length display updates with slider', async ({ page }) => {
    await page.fill('#password-length', '24');
    // Trigger input event since fill doesn't always fire it
    await page.locator('#password-length').dispatchEvent('input');
    const lengthText = await page.textContent('#length-display');
    expect(lengthText).toBe('24');
  });

  test('strength meter shows rating', async ({ page }) => {
    const strengthLabel = page.locator('#strength-label');
    await expect(strengthLabel).toBeVisible();
    const text = await strengthLabel.textContent();
    expect(text!.length).toBeGreaterThan(0);
    expect(text).not.toBe('-');
  });

  test('unchecking all character types shows error', async ({ page }) => {
    await page.uncheck('#opt-uppercase');
    await page.uncheck('#opt-lowercase');
    await page.uncheck('#opt-numbers');
    await page.uncheck('#opt-symbols');
    await page.click('#btn-generate');

    await expect(page.locator('#error-notification')).toBeVisible();
  });

  test('bulk generate creates multiple passwords', async ({ page }) => {
    await page.selectOption('#bulk-quantity', '5');
    await page.click('#btn-bulk-generate');

    const bulkContainer = page.locator('#bulk-container');
    await expect(bulkContainer).toBeVisible();

    const items = page.locator('#bulk-list > div');
    expect(await items.count()).toBe(5);
  });

  test('clear bulk button hides bulk list', async ({ page }) => {
    await page.selectOption('#bulk-quantity', '5');
    await page.click('#btn-bulk-generate');
    await expect(page.locator('#bulk-container')).toBeVisible();

    await page.click('#btn-clear-bulk');
    await expect(page.locator('#bulk-container')).toBeHidden();
  });

  test('toggle visibility hides and shows password', async ({ page }) => {
    await page.click('#btn-generate');
    const display = page.locator('#password-display');
    const originalText = await display.textContent();

    // Hide password
    await page.click('#btn-toggle-visibility');
    const hiddenText = await display.textContent();
    // Hidden text should be dots
    expect(hiddenText).toMatch(/^[•]+$/);
    expect(hiddenText!.length).toBe(originalText!.length);

    // Show password again
    await page.click('#btn-toggle-visibility');
    const visibleText = await display.textContent();
    expect(visibleText).toBe(originalText);
  });
});
