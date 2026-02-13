import { test, expect } from '../fixtures/tool-page';

const SLUG = 'jwt-decoder';

// Sample JWT for testing (header.payload.signature)
const SAMPLE_JWT =
  'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiIxMjM0NTY3ODkwIiwibmFtZSI6IkpvaG4gRG9lIiwiaWF0IjoxNTE2MjM5MDIyfQ.SflKxwRJSMeKKF2QT4fwpMeJf36POk6yJV_adQssw5c';

test.describe('JWT Decoder — functional tests', () => {
  test.beforeEach(async ({ toolPage }) => {
    await toolPage.goto(SLUG);
  });

  test('decodes a valid JWT and shows header and payload', async ({ page }) => {
    await page.fill('#jwt-input', SAMPLE_JWT);

    // Wait for decoded output to appear
    await expect(page.locator('#decoded-output')).toBeVisible();
    await expect(page.locator('#placeholder')).toBeHidden();

    // Verify header contains algorithm
    const header = await page.textContent('#header-output');
    expect(header).toContain('HS256');

    // Verify payload contains claims
    const payload = await page.textContent('#payload-output');
    expect(payload).toContain('John Doe');
    expect(payload).toContain('1234567890');
  });

  test('shows error on invalid JWT', async ({ page }) => {
    await page.fill('#jwt-input', 'not-a-valid-jwt');
    await expect(page.locator('#error-display')).toBeVisible();
  });

  test('sample button loads a JWT and decodes it', async ({ page }) => {
    await page.click('#btn-sample');

    const input = await page.inputValue('#jwt-input');
    expect(input.length).toBeGreaterThan(0);
    await expect(page.locator('#decoded-output')).toBeVisible();
  });

  test('clear button resets everything', async ({ page }) => {
    await page.fill('#jwt-input', SAMPLE_JWT);
    await expect(page.locator('#decoded-output')).toBeVisible();

    await page.click('#btn-clear');

    expect(await page.inputValue('#jwt-input')).toBe('');
    await expect(page.locator('#decoded-output')).toBeHidden();
    await expect(page.locator('#placeholder')).toBeVisible();
  });

  test('shows algorithm badge', async ({ page }) => {
    await page.fill('#jwt-input', SAMPLE_JWT);
    await expect(page.locator('#algorithm-badge')).toBeVisible();
    const badge = await page.textContent('#algorithm-badge');
    expect(badge).toContain('HS256');
  });
});
