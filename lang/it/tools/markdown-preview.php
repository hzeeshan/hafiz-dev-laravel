<?php

return [
    // SEO
    'title' => 'Anteprima Markdown - Editor Markdown Online in Tempo Reale | hafiz.dev',
    'description' => 'Strumento gratuito per anteprima Markdown online. Scrivi e visualizza Markdown con rendering in tempo reale, supporto GitHub Flavored Markdown e evidenziazione sintassi per blocchi di codice. 100% lato client.',
    'keywords' => 'anteprima markdown, editor markdown, visualizzatore markdown, markdown online, markdown tempo reale, github flavored markdown, gfm editor, markdown a html, evidenziazione sintassi markdown',

    // Page content
    'h1' => 'Anteprima Markdown',
    'subtitle' => 'Scrivi e visualizza Markdown con rendering in tempo reale. Supporta GitHub Flavored Markdown con evidenziazione sintassi per blocchi di codice.',

    // UI Labels — Toolbar
    'bold_title' => 'Grassetto (Ctrl+B)',
    'italic_title' => 'Corsivo (Ctrl+I)',
    'strikethrough_title' => 'Barrato',
    'heading1_title' => 'Titolo 1',
    'heading2_title' => 'Titolo 2',
    'heading3_title' => 'Titolo 3',
    'link_title' => 'Link (Ctrl+K)',
    'image_title' => 'Immagine',
    'inline_code_title' => 'Codice inline',
    'code_block_title' => 'Blocco di codice',
    'bullet_list_title' => 'Elenco puntato',
    'numbered_list_title' => 'Elenco numerato',
    'task_list_title' => 'Lista attività',
    'blockquote_title' => 'Citazione',
    'horizontal_rule_title' => 'Linea orizzontale',
    'table_title' => 'Tabella',

    // Action buttons
    'copy_md' => 'Copia MD',
    'copy_md_title' => 'Copia Markdown',
    'copy_html' => 'Copia HTML',
    'copy_html_title' => 'Copia HTML',
    'download' => 'Scarica',
    'download_title' => 'Scarica file .md',
    'clear' => 'Cancella',
    'clear_title' => 'Cancella',

    // Status bar
    'words' => 'Parole',
    'characters' => 'Caratteri',
    'lines' => 'Righe',
    'shortcut_bold' => 'Grassetto',
    'shortcut_italic' => 'Corsivo',
    'shortcut_link' => 'Link',

    // Editor/Preview panels
    'markdown_editor' => 'Editor Markdown',
    'preview' => 'Anteprima',
    'preview_placeholder' => 'L\'anteprima apparirà qui mentre scrivi...',
    'editor_placeholder' => '# Inizia a scrivere il tuo Markdown qui...

## Funzionalità
- Testo **grassetto** e *corsivo*
- [Link](https://example.com)
- Blocchi di codice con evidenziazione sintassi

```javascript
const saluto = \'Ciao, Mondo!\';
console.log(saluto);
```

> Citazioni per evidenziare

| Colonna 1 | Colonna 2 |
|-----------|-----------|
| Cella 1   | Cella 2   |',

    // Quick Reference
    'quick_reference' => 'Guida Rapida Markdown',
    'text_formatting' => 'Formattazione Testo',
    'headings' => 'Titoli',
    'links_images' => 'Link e Immagini',
    'lists' => 'Elenchi',
    'code_blocks' => 'Blocchi di Codice',
    'other' => 'Altro',
    'ref_bold' => 'grassetto',
    'ref_italic' => 'corsivo',
    'ref_strike' => 'barrato',
    'ref_code' => 'codice',
    'ref_heading1' => 'Titolo 1',
    'ref_heading2' => 'Titolo 2',
    'ref_heading3' => 'Titolo 3',
    'ref_link' => 'link',
    'ref_embedded_image' => 'immagine incorporata',
    'ref_bullet_point' => '• punto elenco',
    'ref_numbered' => '1. numerato',
    'ref_done' => 'fatto',
    'ref_todo' => 'da fare',
    'ref_syntax_highlighted' => 'evidenziato',
    'ref_blockquote' => 'citazione',
    'ref_table' => 'tabella',

    // Features
    'features' => [
        [
            'title' => 'Anteprima in Tempo Reale',
            'desc' => 'Visualizza il tuo Markdown renderizzato istantaneamente mentre scrivi. Non serve cliccare nessun pulsante.',
        ],
        [
            'title' => 'Evidenziazione Sintassi',
            'desc' => 'I blocchi di codice vengono evidenziati automaticamente per oltre 180 linguaggi di programmazione.',
        ],
        [
            'title' => '100% Privato',
            'desc' => 'Tutta l\'elaborazione avviene nel tuo browser. I tuoi contenuti non vengono mai inviati a nessun server.',
        ],
    ],

    // FAQ
    'faq' => [
        [
            'question' => 'Cos\'è il GitHub Flavored Markdown (GFM)?',
            'answer' => 'Il GitHub Flavored Markdown (GFM) è una variante di Markdown con funzionalità aggiuntive come tabelle, liste di attività, testo barrato e blocchi di codice con evidenziazione sintassi. Questo strumento supporta completamente la sintassi GFM, rendendolo perfetto per scrivere file README, documentazione e issue su GitHub.',
        ],
        [
            'question' => 'Questo strumento supporta l\'evidenziazione della sintassi?',
            'answer' => 'Sì! I blocchi di codice vengono automaticamente evidenziati per oltre 180 linguaggi di programmazione tra cui JavaScript, Python, PHP, Ruby, Go, Rust e molti altri. Basta specificare il linguaggio dopo i tre backtick di apertura (es. ```javascript).',
        ],
        [
            'question' => 'Posso esportare l\'HTML renderizzato?',
            'answer' => 'Sì, puoi copiare l\'output HTML renderizzato usando il pulsante "Copia HTML", oppure scaricare il tuo Markdown come file .md usando il pulsante "Scarica". Questo rende facile utilizzare i tuoi contenuti in altre applicazioni.',
        ],
        [
            'question' => 'I miei contenuti vengono salvati da qualche parte?',
            'answer' => 'I tuoi contenuti vengono salvati solo nel local storage del tuo browser per comodità, così non perderai il lavoro se chiudi accidentalmente la scheda. Nulla viene mai inviato a nessun server. Tutta l\'elaborazione avviene al 100% lato client nel tuo browser.',
        ],
        [
            'question' => 'Quali funzionalità Markdown sono supportate?',
            'answer' => 'Questo strumento supporta tutte le funzionalità standard di Markdown più le estensioni GitHub Flavored Markdown: titoli (H1-H6), grassetto, corsivo, barrato, link, immagini, elenchi non ordinati, elenchi ordinati, liste di attività (checkbox), citazioni, codice inline, blocchi di codice con evidenziazione sintassi, tabelle e linee orizzontali.',
        ],
    ],

    // JavaScript translatable strings
    'js_strings' => [
        'preview_placeholder' => 'L\'anteprima apparirà qui mentre scrivi...',
        'error_rendering' => 'Errore nel rendering del Markdown:',
        'copied_md' => 'Markdown copiato negli appunti!',
        'copied_html' => 'HTML copiato negli appunti!',
        'copy_fail' => 'Copia negli appunti non riuscita.',
        'nothing_to_copy' => 'Niente da copiare. Scrivi prima del Markdown.',
        'nothing_to_download' => 'Niente da scaricare. Scrivi prima del Markdown.',
        'downloaded' => 'File Markdown scaricato!',
    ],
];
