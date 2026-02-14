import { test, expect } from '../fixtures/tool-page';

const SLUG = 'xml-to-csv';

test.describe('XML to CSV Converter — functional tests', () => {
  test.beforeEach(async ({ toolPage }) => {
    await toolPage.goto(SLUG);
  });

  test('converts XML to CSV', async ({ page }) => {
    const xml = `<items><item><name>Alice</name><value>100</value></item><item><name>Bob</name><value>200</value></item></items>`;
    await page.fill('#xml-input', xml);
    await page.click('#btn-convert');

    const output = await page.inputValue('#csv-output');
    expect(output).toContain('name');
    expect(output).toContain('Alice');
    expect(output).toContain('Bob');
    await expect(page.locator('#success-notification')).toBeVisible();
  });

  test('shows error on empty input', async ({ page }) => {
    await page.click('#btn-convert');
    await expect(page.locator('#error-notification')).toBeVisible();
  });

  test('shows error on invalid XML', async ({ page }) => {
    await page.fill('#xml-input', '<invalid><unclosed>');
    await page.click('#btn-convert');
    await expect(page.locator('#error-notification')).toBeVisible();
  });

  test('sample button loads sample XML', async ({ page }) => {
    await page.click('#btn-sample');
    const input = await page.inputValue('#xml-input');
    expect(input).toContain('<employees>');
  });

  test('clear button resets fields', async ({ page }) => {
    await page.click('#btn-sample');
    await page.click('#btn-convert');
    await page.click('#btn-clear');

    expect(await page.inputValue('#xml-input')).toBe('');
    expect(await page.inputValue('#csv-output')).toBe('');
  });

  test('stats bar shows after conversion', async ({ page }) => {
    await page.click('#btn-sample');
    await page.click('#btn-convert');
    await expect(page.locator('#stats-bar')).toBeVisible();
  });

  test('preview table shows after conversion', async ({ page }) => {
    await page.click('#btn-sample');
    await page.click('#btn-convert');
    await expect(page.locator('#preview-section')).toBeVisible();
  });
});
