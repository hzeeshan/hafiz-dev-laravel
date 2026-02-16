import { test, expect } from '../fixtures/tool-page';

const SLUG = 'json-to-dart';

test.describe('JSON to Dart — functional tests', () => {
  test.beforeEach(async ({ toolPage }) => {
    await toolPage.goto(SLUG);
  });

  test('converts JSON to Dart classes', async ({ page }) => {
    await page.fill('#json-input', '{"name": "John", "age": 30}');
    await page.click('#btn-convert');

    const output = await page.inputValue('#dart-output');
    expect(output).toContain('class Root');
    expect(output).toContain('String');
    expect(output).toContain('int');
    await expect(page.locator('#stats-bar')).toBeVisible();
  });

  test('shows error on empty input', async ({ page }) => {
    await page.click('#btn-convert');
    await expect(page.locator('#error-notification')).toBeVisible();
  });

  test('shows error on invalid JSON', async ({ page }) => {
    await page.fill('#json-input', '{invalid json}');
    await page.click('#btn-convert');
    await expect(page.locator('#error-notification')).toBeVisible();
  });

  test('sample button loads sample JSON', async ({ page }) => {
    await page.click('#btn-sample');
    const input = await page.inputValue('#json-input');
    expect(input.length).toBeGreaterThan(0);
  });

  test('clear button resets everything', async ({ page }) => {
    await page.fill('#json-input', '{"a": 1}');
    await page.click('#btn-convert');
    await page.click('#btn-clear');

    expect(await page.inputValue('#json-input')).toBe('');
    expect(await page.inputValue('#dart-output')).toBe('');
    await expect(page.locator('#stats-bar')).toBeHidden();
  });

  test('generates fromJson and toJson methods', async ({ page }) => {
    await page.fill('#json-input', '{"name": "John"}');
    await page.click('#btn-convert');

    const output = await page.inputValue('#dart-output');
    expect(output).toContain('fromJson');
    expect(output).toContain('toJson');
  });
});
