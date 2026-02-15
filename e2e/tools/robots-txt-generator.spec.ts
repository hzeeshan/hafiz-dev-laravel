import { test, expect } from '../fixtures/tool-page';

const SLUG = 'robots-txt-generator';

test.describe('Robots.txt Generator — functional tests', () => {
  test.beforeEach(async ({ toolPage }) => {
    await toolPage.goto(SLUG);
  });

  test('generates default robots.txt output', async ({ page }) => {
    const output = await page.inputValue('#robots-output');
    expect(output).toContain('User-agent: *');
  });

  test('preset allow-all works', async ({ page }) => {
    await page.click('.preset-btn[data-preset="allow-all"]');
    const output = await page.inputValue('#robots-output');
    expect(output).toContain('Allow: /');
  });

  test('preset block-all works', async ({ page }) => {
    await page.click('.preset-btn[data-preset="block-all"]');
    const output = await page.inputValue('#robots-output');
    expect(output).toContain('Disallow: /');
  });

  test('preset block-ai adds AI bot rules', async ({ page }) => {
    await page.click('.preset-btn[data-preset="block-ai"]');
    const output = await page.inputValue('#robots-output');
    expect(output).toContain('GPTBot');
    expect(output).toContain('ClaudeBot');
  });

  test('sitemap URL is included in output', async ({ page }) => {
    await page.fill('#sitemap-urls', 'https://example.com/sitemap.xml');
    const output = await page.inputValue('#robots-output');
    expect(output).toContain('Sitemap: https://example.com/sitemap.xml');
  });
});
