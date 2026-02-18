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
  'markdown-preview': 'anteprima-markdown',
  'json-to-csv-converter': 'convertitore-json-csv',
  'qr-code-generator': 'generatore-codice-qr',
  'diff-checker': 'confronta-testi',
  'json-to-yaml': 'convertitore-json-yaml',
  'yaml-to-json': 'convertitore-yaml-json',
  'xml-to-json': 'convertitore-xml-json',
  'xml-to-csv': 'convertitore-xml-csv',
  'twitter-character-counter': 'contatore-caratteri-twitter',
  'hex-to-rgb': 'convertitore-hex-rgb',
  'slug-generator': 'generatore-slug',
  'ascii-table': 'tabella-ascii',
  'text-to-binary': 'convertitore-testo-binario',
  'csv-to-xml': 'convertitore-csv-xml',
  'json-to-xml': 'convertitore-json-xml',
  'csv-to-sql': 'convertitore-csv-sql',
  'json-to-typescript': 'convertitore-json-typescript',
  'student-email-signature-generator': 'generatore-firma-email-studente',
  'chmod-calculator': 'calcolatore-chmod',
  'markdown-to-html': 'convertitore-markdown-html',
  'base64-to-image': 'convertitore-base64-immagine',
  'robots-txt-generator': 'generatore-robots-txt',
  'bubble-text-generator': 'generatore-testo-bolle',
  'strikethrough-text-generator': 'generatore-testo-barrato',
  'upside-down-text-generator': 'generatore-testo-capovolto',
  'zalgo-text-generator': 'generatore-testo-zalgo',
  'small-text-generator': 'generatore-testo-piccolo',
  'morse-code-translator': 'traduttore-codice-morse',
  'chronological-age-calculator': 'calcolatore-eta-cronologica',
  'korean-age-calculator': 'calcolatore-eta-coreana',
  'crontab-guru': 'crontab-guru',
  'http-status-codes': 'codici-stato-http',
  'hex-to-binary': 'convertitore-esadecimale-binario',
  'ip-to-binary': 'convertitore-ip-binario',
  'octal-to-decimal': 'convertitore-ottale-decimale',
  'decimal-to-binary': 'convertitore-decimale-binario',
  'decimal-to-octal': 'convertitore-decimale-ottale',
  'binary-to-octal': 'convertitore-binario-ottale',
  'css-to-tailwind': 'convertitore-css-tailwind',
  'json-to-csharp': 'convertitore-json-csharp',
  'json-to-dart': 'convertitore-json-dart',
  'whitespace-remover': 'rimuovi-spazi-bianchi',
  'remove-line-breaks': 'rimuovi-interruzioni-riga',
  'csv-viewer': 'visualizzatore-csv',
  'tsv-to-csv': 'convertitore-tsv-csv',
  'json-to-php-array': 'convertitore-json-php-array',
  'typescript-to-javascript': 'convertitore-typescript-javascript',
  'backward-text-generator': 'generatore-testo-al-contrario',
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
