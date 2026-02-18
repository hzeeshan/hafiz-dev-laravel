import { test, expect } from '../fixtures/tool-page';

const SLUG = 'typescript-to-javascript';

test.describe('TypeScript to JavaScript — functional tests', () => {
  test.beforeEach(async ({ toolPage }) => {
    await toolPage.goto(SLUG);
  });

  test('converts TypeScript to JavaScript', async ({ page }) => {
    await page.fill('#ts-input', 'const x: number = 42;');
    await page.click('#btn-convert');

    const output = await page.inputValue('#js-output');
    expect(output).toContain('const x = 42');
    expect(output).not.toContain(': number');
    await expect(page.locator('#stats-bar')).toBeVisible();
  });

  test('removes interface declarations', async ({ page }) => {
    await page.fill('#ts-input', 'interface User {\n  name: string;\n}\nconst u = {};');
    await page.click('#btn-convert');

    const output = await page.inputValue('#js-output');
    expect(output).not.toContain('interface');
    expect(output).toContain('const u = {}');
  });

  test('shows error on empty input', async ({ page }) => {
    await page.click('#btn-convert');
    await expect(page.locator('#error-notification')).toBeVisible();
  });

  test('sample button loads sample TypeScript', async ({ page }) => {
    await page.click('#btn-sample');
    const input = await page.inputValue('#ts-input');
    expect(input.length).toBeGreaterThan(0);
    expect(input).toContain('interface');
  });

  test('clear button resets fields', async ({ page }) => {
    await page.fill('#ts-input', 'const x: string = "hi";');
    await page.click('#btn-convert');
    await page.click('#btn-clear');

    expect(await page.inputValue('#ts-input')).toBe('');
    expect(await page.inputValue('#js-output')).toBe('');
    await expect(page.locator('#stats-bar')).toBeHidden();
  });

  test('stats display after conversion', async ({ page }) => {
    await page.fill('#ts-input', 'interface Foo {\n  bar: string;\n}\nconst x: number = 1;');
    await page.click('#btn-convert');

    await expect(page.locator('#stats-bar')).toBeVisible();
  });
});
