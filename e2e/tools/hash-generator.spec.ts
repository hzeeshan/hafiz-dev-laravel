import { test, expect } from '../fixtures/tool-page';

const SLUG = 'hash-generator';

test.describe('Hash Generator — functional tests', () => {
  test.beforeEach(async ({ toolPage }) => {
    await toolPage.goto(SLUG);
  });

  test('generates hashes from text input', async ({ page }) => {
    await page.fill('#text-input', 'Hello, World!');

    // Wait for hashes to be computed (async Web Crypto API)
    await expect(page.locator('#hash-md5')).not.toHaveText('-');

    // Verify known MD5 hash for "Hello, World!"
    const md5 = await page.textContent('#hash-md5');
    expect(md5?.trim().toLowerCase()).toBe('65a8e27d8879283831b664bd8b7f0ad4');
  });

  test('clears hashes when input is empty', async ({ page }) => {
    await page.fill('#text-input', 'test');
    await expect(page.locator('#hash-md5')).not.toHaveText('-');

    await page.fill('#text-input', '');

    // Hashes should revert to placeholder dash
    await expect(page.locator('#hash-md5')).toHaveText('-');
  });

  test('toggles between uppercase and lowercase', async ({ page }) => {
    await page.fill('#text-input', 'test');
    await expect(page.locator('#hash-md5')).not.toHaveText('-');

    // Click uppercase radio (no ID, use name+value selector)
    await page.click('input[name="output-format"][value="uppercase"]');
    const upperHash = await page.textContent('#hash-md5');
    expect(upperHash?.trim()).toMatch(/^[A-F0-9]+$/);

    // Click lowercase radio
    await page.click('input[name="output-format"][value="lowercase"]');
    const lowerHash = await page.textContent('#hash-md5');
    expect(lowerHash?.trim()).toMatch(/^[a-f0-9]+$/);
  });

  test('character count updates on input', async ({ page }) => {
    await page.fill('#text-input', '12345');
    const count = await page.textContent('#char-count');
    expect(count).toContain('5');
  });
});
