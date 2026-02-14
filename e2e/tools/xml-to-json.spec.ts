import { test, expect } from '../fixtures/tool-page';

const SLUG = 'xml-to-json';

test.describe('XML to JSON Converter — functional tests', () => {
  test.beforeEach(async ({ toolPage }) => {
    await toolPage.goto(SLUG);
  });

  test('converts valid XML to JSON', async ({ page }) => {
    await page.fill('#xml-input', '<root><name>test</name><value>42</value></root>');
    await page.click('#btn-convert');

    const output = await page.inputValue('#json-output-raw');
    const parsed = JSON.parse(output);
    expect(parsed.root.name).toBe('test');
    expect(parsed.root.value).toBe(42);
    await expect(page.locator('#success-notification')).toBeVisible();
  });

  test('shows error on empty input', async ({ page }) => {
    await page.click('#btn-convert');
    await expect(page.locator('#error-notification')).toBeVisible();
  });

  test('shows error on invalid XML', async ({ page }) => {
    await page.fill('#xml-input', '<root><unclosed>');
    await page.click('#btn-convert');
    await expect(page.locator('#error-notification')).toBeVisible();
  });

  test('handles XML attributes', async ({ page }) => {
    await page.fill('#xml-input', '<item id="1" type="test">value</item>');
    await page.click('#btn-convert');

    const output = await page.inputValue('#json-output-raw');
    const parsed = JSON.parse(output);
    expect(parsed.item['@id']).toBe(1);
    expect(parsed.item['@type']).toBe('test');
  });

  test('handles nested XML elements', async ({ page }) => {
    await page.fill('#xml-input', '<a><b><c>deep</c></b></a>');
    await page.click('#btn-convert');

    const output = await page.inputValue('#json-output-raw');
    const parsed = JSON.parse(output);
    expect(parsed.a.b.c).toBe('deep');
  });

  test('converts repeated elements to arrays', async ({ page }) => {
    await page.fill('#xml-input', '<root><item>a</item><item>b</item><item>c</item></root>');
    await page.click('#btn-convert');

    const output = await page.inputValue('#json-output-raw');
    const parsed = JSON.parse(output);
    expect(Array.isArray(parsed.root.item)).toBe(true);
    expect(parsed.root.item).toEqual(['a', 'b', 'c']);
  });

  test('sample button loads XML', async ({ page }) => {
    await page.click('#btn-sample');
    const input = await page.inputValue('#xml-input');
    expect(input.length).toBeGreaterThan(0);
    expect(input).toContain('bookstore');
  });

  test('clear button resets all', async ({ page }) => {
    await page.fill('#xml-input', '<root>test</root>');
    await page.click('#btn-convert');
    await page.click('#btn-clear');

    expect(await page.inputValue('#xml-input')).toBe('');
    expect(await page.inputValue('#json-output-raw')).toBe('');
    await expect(page.locator('#stats-bar')).toBeHidden();
  });

  test('stats bar shows element count', async ({ page }) => {
    await page.fill('#xml-input', '<root><a>1</a><b>2</b></root>');
    await page.click('#btn-convert');

    await expect(page.locator('#stats-bar')).toBeVisible();
    const elements = await page.textContent('#stat-elements');
    expect(parseInt(elements!)).toBeGreaterThan(0);
  });
});
