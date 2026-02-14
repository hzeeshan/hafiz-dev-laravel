import { test, expect } from '../fixtures/tool-page';

const SLUG = 'student-email-signature-generator';

test.describe('Student Email Signature Generator — functional tests', () => {
  test.beforeEach(async ({ toolPage }) => {
    await toolPage.goto(SLUG);
  });

  test('renders preview with default values', async ({ page }) => {
    const preview = await page.locator('#sig-preview');
    await expect(preview).toBeVisible();
    const html = await preview.innerHTML();
    expect(html.length).toBeGreaterThan(0);
  });

  test('updates preview when name is changed', async ({ page }) => {
    await page.fill('#sig-name', 'Test User');
    const preview = await page.locator('#sig-preview');
    const html = await preview.innerHTML();
    expect(html).toContain('Test User');
  });

  test('shows placeholder when name is empty', async ({ page }) => {
    await page.fill('#sig-name', '');
    const preview = await page.locator('#sig-preview');
    const html = await preview.innerHTML();
    expect(html).toContain('font-style:italic');
  });

  test('includes university in preview', async ({ page }) => {
    await page.fill('#sig-name', 'John Doe');
    await page.fill('#sig-university', 'MIT');
    const preview = await page.locator('#sig-preview');
    const html = await preview.innerHTML();
    expect(html).toContain('MIT');
  });

  test('template selector changes output', async ({ page }) => {
    await page.fill('#sig-name', 'John Doe');
    const classicHtml = await page.locator('#sig-preview').innerHTML();

    await page.selectOption('#sig-template', 'modern');
    const modernHtml = await page.locator('#sig-preview').innerHTML();

    expect(classicHtml).not.toBe(modernHtml);
  });
});
