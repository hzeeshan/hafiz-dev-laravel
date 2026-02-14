import { test, expect } from '../fixtures/tool-page';

const SLUG = 'twitter-character-counter';

test.describe('Twitter Character Counter — functional tests', () => {
  test.beforeEach(async ({ toolPage }) => {
    await toolPage.goto(SLUG);
  });

  test('counts characters on input', async ({ page }) => {
    await page.fill('#tweet-input', 'Hello world');
    const count = await page.textContent('#char-count');
    expect(count).toBe('11');
  });

  test('counts words correctly', async ({ page }) => {
    await page.fill('#tweet-input', 'One two three four');
    const words = await page.textContent('#stat-words');
    expect(words).toBe('4');
  });

  test('detects URLs and counts as 23', async ({ page }) => {
    await page.fill('#tweet-input', 'Check https://example.com out');
    const urls = await page.textContent('#stat-urls');
    expect(urls).toBe('1');
    // "Check " (6) + 23 (URL) + " out" (4) = 33
    const count = await page.textContent('#stat-twitter-chars');
    expect(count).toBe('33');
  });

  test('detects mentions', async ({ page }) => {
    await page.fill('#tweet-input', 'Hello @user1 and @user2');
    const mentions = await page.textContent('#stat-mentions');
    expect(mentions).toBe('2');
  });

  test('detects hashtags', async ({ page }) => {
    await page.fill('#tweet-input', '#test #coding');
    const hashtags = await page.textContent('#stat-hashtags');
    expect(hashtags).toBe('2');
  });

  test('mode switching changes limit', async ({ page }) => {
    await page.click('#mode-dm');
    const limit = await page.textContent('#char-limit');
    expect(limit).toBe('10000');
  });

  test('clear button resets input', async ({ page }) => {
    await page.fill('#tweet-input', 'Some text');
    await page.click('#btn-clear');
    expect(await page.inputValue('#tweet-input')).toBe('');
    const count = await page.textContent('#char-count');
    expect(count).toBe('0');
  });

  test('shows remaining characters', async ({ page }) => {
    await page.fill('#tweet-input', 'Hi');
    const remaining = await page.textContent('#remaining-count');
    expect(remaining).toBe('278');
  });
});
