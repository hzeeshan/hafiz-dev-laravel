import { test, expect } from '../fixtures/tool-page';

const SLUG = 'text-repeater';

test.describe('Text Repeater — functional tests', () => {
  test.beforeEach(async ({ toolPage }) => {
    await toolPage.goto(SLUG);
  });

  test('core functionality works — repeats text', async ({ page }) => {
    await page.fill('#input-text', 'Hello');
    await page.fill('#repeat-count', '3');
    await page.selectOption('#separator-select', 'newline');
    await page.click('#btn-repeat');

    const output = await page.inputValue('#output-text');
    expect(output).toBe('Hello\nHello\nHello');
    await expect(page.locator('#success-notification')).toBeVisible();
  });

  test('shows error on empty input', async ({ page }) => {
    await page.click('#btn-repeat');
    await expect(page.locator('#error-notification')).toBeVisible();
  });

  test('sample button loads data', async ({ page }) => {
    await page.click('#btn-sample');
    const input = await page.inputValue('#input-text');
    expect(input.length).toBeGreaterThan(0);
    // Sample also triggers repeat, so output should have content
    const output = await page.inputValue('#output-text');
    expect(output.length).toBeGreaterThan(0);
  });

  test('clear button resets state', async ({ page }) => {
    await page.click('#btn-sample');
    await page.click('#btn-clear');
    const input = await page.inputValue('#input-text');
    expect(input).toBe('');
    const output = await page.inputValue('#output-text');
    expect(output).toBe('');
  });

  test('copy button shows error when output is empty', async ({ page }) => {
    await page.click('#btn-copy');
    await expect(page.locator('#error-notification')).toBeVisible();
  });

  test('output has content after repeat for copy', async ({ page }) => {
    await page.fill('#input-text', 'Test');
    await page.click('#btn-repeat');
    const output = await page.inputValue('#output-text');
    expect(output.length).toBeGreaterThan(0);
  });

  test('space separator works', async ({ page }) => {
    await page.fill('#input-text', 'Hi');
    await page.fill('#repeat-count', '3');
    await page.selectOption('#separator-select', 'space');
    await page.click('#btn-repeat');

    const output = await page.inputValue('#output-text');
    expect(output).toBe('Hi Hi Hi');
  });

  test('comma separator works', async ({ page }) => {
    await page.fill('#input-text', 'A');
    await page.fill('#repeat-count', '4');
    await page.selectOption('#separator-select', 'comma');
    await page.click('#btn-repeat');

    const output = await page.inputValue('#output-text');
    expect(output).toBe('A, A, A, A');
  });

  test('numbering option works', async ({ page }) => {
    await page.fill('#input-text', 'Item');
    await page.fill('#repeat-count', '3');
    await page.selectOption('#separator-select', 'newline');
    await page.check('#opt-numbering');
    await page.click('#btn-repeat');

    const output = await page.inputValue('#output-text');
    expect(output).toBe('1. Item\n2. Item\n3. Item');
  });

  test('stats bar appears after repeat', async ({ page }) => {
    await expect(page.locator('#stats-bar')).toBeHidden();
    await page.fill('#input-text', 'Test');
    await page.click('#btn-repeat');
    await expect(page.locator('#stats-bar')).toBeVisible();
  });

  test('custom separator shows input field', async ({ page }) => {
    await expect(page.locator('#custom-separator-wrapper')).toBeHidden();
    await page.selectOption('#separator-select', 'custom');
    await expect(page.locator('#custom-separator-wrapper')).toBeVisible();
  });
});
