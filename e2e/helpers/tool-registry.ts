/**
 * Tool Registry — Single source of truth for EN↔IT slug mappings.
 *
 * When the /translate-tool skill translates a new tool, it adds
 * the Italian slug mapping here so tests automatically cover both locales.
 */

/** Maps English slug → Italian slug for translated tools. */
export const ITALIAN_SLUGS: Record<string, string> = {
  'password-generator': 'generatore-password',
  'word-counter': 'conta-parole',
  'json-formatter': 'formattatore-json',
  'image-compressor': 'compressore-immagini',
  'base64-encoder': 'codificatore-base64',
  'cron-expression-builder': 'generatore-espressioni-cron',
  'uuid-generator': 'generatore-uuid',
  'regex-tester': 'tester-regex',
  'jwt-decoder': 'decodificatore-jwt',
  'hash-generator': 'generatore-hash',
  'url-encoder': 'codificatore-url',
  'lorem-ipsum-generator': 'generatore-lorem-ipsum',
  'timestamp-converter': 'convertitore-timestamp',
  'color-converter': 'convertitore-colori',
};

/** Tools that have been translated and should be tested in both locales. */
export function getTranslatedSlugs(): string[] {
  return Object.keys(ITALIAN_SLUGS);
}

/** Get the full URL path for a tool given its English slug and locale. */
export function getToolUrl(
  enSlug: string,
  locale: 'en' | 'it',
  overrideItSlug?: string,
): string {
  if (locale === 'en') {
    return `/tools/${enSlug}`;
  }
  const itSlug = overrideItSlug || ITALIAN_SLUGS[enSlug];
  if (!itSlug) {
    throw new Error(
      `No Italian slug found for "${enSlug}". Add it to ITALIAN_SLUGS in tool-registry.ts`,
    );
  }
  return `/it/strumenti/${itSlug}`;
}
