<?php

return [
    // SEO
    'title' => 'Convertitore IP in Binario - Converti Indirizzo IP in Binario Online | hafiz.dev',
    'description' => 'Convertitore online gratuito da IP a binario. Converti indirizzi IPv4 in notazione binaria con scomposizione per ottetto e visualizzazione subnet. Nessuna registrazione richiesta.',
    'keywords' => 'ip in binario, convertire ip in binario, convertitore ip binario, indirizzo ip in binario, ipv4 in binario, conversione indirizzo ip binario',

    // Page content
    'h1' => 'Convertitore IP in Binario',
    'subtitle' => 'Converti indirizzi IPv4 in notazione binaria con scomposizione per ottetto, visualizzazione subnet mask e supporto CIDR.',

    // UI Labels
    'ipv4_address' => 'Indirizzo IPv4',
    'ip_placeholder' => 'es. 192.168.1.1',
    'no_subnet' => 'Nessuna subnet',
    'copy_binary' => 'Copia Binario',
    'sample' => 'Esempio',
    'clear' => 'Cancella',

    // Output sections
    'full_binary' => 'Binario Completo a 32 bit',
    'dotted_binary' => 'Notazione Binaria Puntata',
    'octet_breakdown' => 'Scomposizione per Ottetto',
    'octet' => 'Ottetto',
    'decimal' => 'Decimale',
    'binary' => 'Binario',
    'hex' => 'Hex',

    // Subnet info
    'subnet_information' => 'Informazioni Subnet',
    'subnet_mask' => 'Subnet Mask',
    'cidr_notation' => 'Notazione CIDR',
    'network_address' => 'Indirizzo di Rete',
    'broadcast_address' => 'Indirizzo Broadcast',
    'network_bits' => 'Bit di Rete',
    'host_bits' => 'Bit Host',
    'bit_visualization' => 'Visualizzazione Bit Rete / Host',

    // Common IPs
    'common_ips' => 'Indirizzi IP Comuni',
    'private_home' => 'Rete Privata (Casa)',
    'private_corporate' => 'Rete Privata (Aziendale)',
    'localhost' => 'Localhost (Loopback)',
    'subnet_mask_24' => 'Subnet Mask (/24)',
    'google_dns' => 'Google DNS',
    'default_route' => 'Route Predefinita',

    // Features
    'features' => [
        [
            'title' => 'Scomposizione per Ottetto',
            'desc' => 'Visualizza ognuno dei quattro ottetti convertito separatamente con valori decimale, binario e hex affiancati.',
        ],
        [
            'title' => 'Visualizzazione Subnet',
            'desc' => 'Seleziona un prefisso CIDR per vedere i bit di rete e host evidenziati, con indirizzo di rete e broadcast calcolati.',
        ],
        [
            'title' => 'Preset Rapidi',
            'desc' => 'Clicca indirizzi IP comuni come 192.168.1.1, 127.0.0.1 o 8.8.8.8 per vederne istantaneamente la rappresentazione binaria.',
        ],
    ],

    // FAQ
    'faq' => [
        [
            'question' => 'Come si converte un indirizzo IP in binario?',
            'answer' => 'Converti ognuno dei quattro ottetti (numeri separati da punti) nella sua rappresentazione binaria a 8 bit. Ad esempio, 192.168.1.1 diventa 11000000.10101000.00000001.00000001. Ogni ottetto è un numero da 0 a 255, che entra esattamente in 8 bit binari.',
        ],
        [
            'question' => 'Qual è il binario di 192.168.1.1?',
            'answer' => '192.168.1.1 in binario è 11000000.10101000.00000001.00000001. Nel dettaglio: 192 = 11000000, 168 = 10101000, 1 = 00000001, 1 = 00000001. La rappresentazione completa a 32 bit senza punti è 11000000101010000000000100000001.',
        ],
        [
            'question' => 'Perché gli indirizzi IP sono a 32 bit?',
            'answer' => 'Gli indirizzi IPv4 usano 32 bit (4 byte) perché questa fu la dimensione scelta quando il Protocollo Internet fu progettato nei primi anni \'80. 32 bit permettono circa 4,3 miliardi di indirizzi unici (2^32). Ognuno dei 4 ottetti usa 8 bit, dando un intervallo di 0-255 per ottetto. IPv6 usa 128 bit per uno spazio di indirizzi molto più ampio.',
        ],
        [
            'question' => 'Come funzionano le subnet mask in binario?',
            'answer' => 'Una subnet mask è un numero a 32 bit dove la porzione di rete è tutta 1 e la porzione host è tutta 0. Ad esempio, 255.255.255.0 in binario è 11111111.11111111.11111111.00000000, il che significa che i primi 24 bit identificano la rete e gli ultimi 8 bit identificano gli host. La notazione CIDR /24 significa 24 bit di rete.',
        ],
        [
            'question' => 'Qual è il binario di 255.255.255.0?',
            'answer' => '255.255.255.0 in binario è 11111111.11111111.11111111.00000000. Poiché 255 in binario è 11111111 (tutti gli 8 bit impostati a 1) e 0 è 00000000 (tutti i bit a 0), questa comune subnet mask ha 24 bit a 1 consecutivi seguiti da 8 bit a 0, scritta come /24 nella notazione CIDR.',
        ],
    ],

    // JavaScript translatable strings
    'js_strings' => [
        'nothing_to_copy' => 'Niente da copiare',
        'copied' => 'Copiato!',
        'invalid_ip' => 'Indirizzo IPv4 non valido. Usa il formato: 0-255.0-255.0-255.0-255',
        'converted' => '{ip} convertito in binario',
        'copy_binary' => 'Copia Binario',
        'full_binary' => 'Binario Completo a 32 bit',
        'dotted_binary' => 'Notazione Binaria Puntata',
        'network_bits_gold' => 'Bit di rete (oro)',
        'host_bits_dimmed' => 'Bit host (attenuati)',
        'usable_hosts' => '{count} host utilizzabili',
        'bits' => 'bit',
    ],
];
