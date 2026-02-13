import { defineConfig, devices } from '@playwright/test';

export default defineConfig({
  testDir: '.',
  timeout: 15_000,
  retries: 0,
  fullyParallel: true,
  workers: 4,

  reporter: [
    ['list'],
    ['html', { open: 'never' }],
  ],

  use: {
    baseURL: process.env.BASE_URL || 'http://localhost:8000',
    screenshot: 'only-on-failure',
    trace: 'retain-on-failure',
  },

  projects: [
    {
      name: 'en',
      use: { ...devices['Desktop Chrome'] },
    },
    {
      name: 'it',
      use: { ...devices['Desktop Chrome'] },
    },
  ],

  webServer: {
    command: 'php artisan serve --port=8000',
    port: 8000,
    reuseExistingServer: true,
    timeout: 30_000,
  },
});
