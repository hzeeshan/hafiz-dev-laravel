import { test, expect } from '../fixtures/tool-page';

const SLUG = 'qr-code-generator';

test.describe('QR Code Generator — functional tests', () => {
  test.beforeEach(async ({ toolPage }) => {
    await toolPage.goto(SLUG);
  });

  test('generates QR code from text input', async ({ page }) => {
    await page.fill('#input-text', 'https://hafiz.dev');
    // Wait for debounced generation
    await page.waitForTimeout(500);

    await expect(page.locator('#qr-container')).toBeVisible();
    await expect(page.locator('#qr-placeholder')).toBeHidden();
    await expect(page.locator('#btn-download-png')).toBeEnabled();
    await expect(page.locator('#btn-download-svg')).toBeEnabled();
  });

  test('shows placeholder when input is empty', async ({ page }) => {
    await expect(page.locator('#qr-placeholder')).toBeVisible();
    await expect(page.locator('#qr-container')).toBeHidden();
    await expect(page.locator('#btn-download-png')).toBeDisabled();
    await expect(page.locator('#btn-download-svg')).toBeDisabled();
  });

  test('switches between QR types', async ({ page }) => {
    // Switch to WiFi
    await page.click('[data-type="wifi"]');
    await expect(page.locator('#form-wifi')).toBeVisible();
    await expect(page.locator('#form-text')).toBeHidden();

    // Switch to vCard
    await page.click('[data-type="vcard"]');
    await expect(page.locator('#form-vcard')).toBeVisible();
    await expect(page.locator('#form-wifi')).toBeHidden();

    // Switch to Email
    await page.click('[data-type="email"]');
    await expect(page.locator('#form-email')).toBeVisible();
    await expect(page.locator('#form-vcard')).toBeHidden();

    // Switch to SMS
    await page.click('[data-type="sms"]');
    await expect(page.locator('#form-sms')).toBeVisible();
    await expect(page.locator('#form-email')).toBeHidden();

    // Switch to Phone
    await page.click('[data-type="phone"]');
    await expect(page.locator('#form-phone')).toBeVisible();
    await expect(page.locator('#form-sms')).toBeHidden();

    // Switch back to Text
    await page.click('[data-type="text"]');
    await expect(page.locator('#form-text')).toBeVisible();
    await expect(page.locator('#form-phone')).toBeHidden();
  });

  test('generates WiFi QR code', async ({ page }) => {
    await page.click('[data-type="wifi"]');
    await page.fill('#wifi-ssid', 'TestNetwork');
    await page.fill('#wifi-password', 'secret123');
    await page.waitForTimeout(500);

    await expect(page.locator('#qr-container')).toBeVisible();
    await expect(page.locator('#btn-download-png')).toBeEnabled();
  });

  test('generates vCard QR code', async ({ page }) => {
    await page.click('[data-type="vcard"]');
    await page.fill('#vcard-firstname', 'Mario');
    await page.fill('#vcard-lastname', 'Rossi');
    await page.waitForTimeout(500);

    await expect(page.locator('#qr-container')).toBeVisible();
    await expect(page.locator('#btn-download-png')).toBeEnabled();
  });

  test('character count updates on text input', async ({ page }) => {
    await page.fill('#input-text', 'Hello');
    const count = await page.textContent('#text-count');
    expect(count).toBe('5');
  });

  test('size selector updates display', async ({ page }) => {
    await page.selectOption('#qr-size', '512');
    const sizeText = await page.textContent('#size-value');
    expect(sizeText).toBe('512px');
  });
});
