<script>
(function() {
    const strings = document.getElementById('tool-strings')?.dataset || {};

    const codes = [
        // 1xx Informational
        { code: 100, name: 'Continue', category: '1xx', description: strings.code100 || 'The server has received the request headers and the client should proceed to send the request body.' },
        { code: 101, name: 'Switching Protocols', category: '1xx', description: strings.code101 || 'The server is switching protocols as requested by the client (e.g., upgrading to WebSocket).' },
        { code: 102, name: 'Processing', category: '1xx', description: strings.code102 || 'The server has received and is processing the request, but no response is available yet (WebDAV).' },
        { code: 103, name: 'Early Hints', category: '1xx', description: strings.code103 || 'Used to return some response headers before the final HTTP message, allowing preloading of resources.' },

        // 2xx Success
        { code: 200, name: 'OK', category: '2xx', description: strings.code200 || 'The request succeeded. The response body contains the requested resource.' },
        { code: 201, name: 'Created', category: '2xx', description: strings.code201 || 'The request succeeded and a new resource was created. Typically used after POST or PUT requests.' },
        { code: 202, name: 'Accepted', category: '2xx', description: strings.code202 || 'The request has been accepted for processing, but processing has not been completed (async operations).' },
        { code: 203, name: 'Non-Authoritative Information', category: '2xx', description: strings.code203 || 'The returned metadata is not from the origin server but from a local or third-party copy.' },
        { code: 204, name: 'No Content', category: '2xx', description: strings.code204 || 'The request succeeded but there is no content to return. Often used for DELETE or PUT operations.' },
        { code: 205, name: 'Reset Content', category: '2xx', description: strings.code205 || 'The request succeeded and the client should reset the document view (e.g., clear a form).' },
        { code: 206, name: 'Partial Content', category: '2xx', description: strings.code206 || 'The server is delivering only part of the resource due to a Range header sent by the client.' },
        { code: 207, name: 'Multi-Status', category: '2xx', description: strings.code207 || 'Conveys information about multiple resources where multiple status codes might be appropriate (WebDAV).' },
        { code: 208, name: 'Already Reported', category: '2xx', description: strings.code208 || 'Used inside a DAV: propstat response to avoid repeatedly enumerating members of a binding (WebDAV).' },
        { code: 226, name: 'IM Used', category: '2xx', description: strings.code226 || 'The server has fulfilled a GET request with instance-manipulations applied to the current instance.' },

        // 3xx Redirection
        { code: 300, name: 'Multiple Choices', category: '3xx', description: strings.code300 || 'The request has more than one possible response. The user or agent should choose one.' },
        { code: 301, name: 'Moved Permanently', category: '3xx', description: strings.code301 || 'The resource has been permanently moved to a new URL. Search engines will update their links. Use for permanent URL changes.' },
        { code: 302, name: 'Found', category: '3xx', description: strings.code302 || 'The resource is temporarily at a different URL. The client should continue using the original URL for future requests.' },
        { code: 303, name: 'See Other', category: '3xx', description: strings.code303 || 'The response to the request can be found at another URL using a GET request (often after POST).' },
        { code: 304, name: 'Not Modified', category: '3xx', description: strings.code304 || 'The resource has not been modified since the last request. The client can use its cached copy.' },
        { code: 307, name: 'Temporary Redirect', category: '3xx', description: strings.code307 || 'The resource is temporarily at a different URL. Unlike 302, the request method must not be changed.' },
        { code: 308, name: 'Permanent Redirect', category: '3xx', description: strings.code308 || 'The resource has been permanently moved. Unlike 301, the request method must not be changed.' },

        // 4xx Client Error
        { code: 400, name: 'Bad Request', category: '4xx', description: strings.code400 || 'The server cannot process the request due to a client error (malformed syntax, invalid request, etc.).' },
        { code: 401, name: 'Unauthorized', category: '4xx', description: strings.code401 || 'Authentication is required. The client must authenticate itself to get the requested response.' },
        { code: 402, name: 'Payment Required', category: '4xx', description: strings.code402 || 'Reserved for future use. Originally intended for digital payment systems.' },
        { code: 403, name: 'Forbidden', category: '4xx', description: strings.code403 || 'The server understood the request but refuses to authorize it. Unlike 401, re-authenticating will not help.' },
        { code: 404, name: 'Not Found', category: '4xx', description: strings.code404 || 'The server cannot find the requested resource. The most common HTTP error encountered by users.' },
        { code: 405, name: 'Method Not Allowed', category: '4xx', description: strings.code405 || 'The HTTP method used is not supported for the requested resource (e.g., POST on a read-only resource).' },
        { code: 406, name: 'Not Acceptable', category: '4xx', description: strings.code406 || 'The server cannot produce a response matching the Accept headers sent by the client.' },
        { code: 407, name: 'Proxy Authentication Required', category: '4xx', description: strings.code407 || 'Similar to 401, but authentication must be done through a proxy.' },
        { code: 408, name: 'Request Timeout', category: '4xx', description: strings.code408 || 'The server timed out waiting for the request. The client took too long to send the complete request.' },
        { code: 409, name: 'Conflict', category: '4xx', description: strings.code409 || 'The request conflicts with the current state of the server (e.g., edit conflict, duplicate resource).' },
        { code: 410, name: 'Gone', category: '4xx', description: strings.code410 || 'The resource has been permanently deleted. Unlike 404, this is intentional and the resource will not return.' },
        { code: 411, name: 'Length Required', category: '4xx', description: strings.code411 || 'The server requires the Content-Length header to be specified in the request.' },
        { code: 412, name: 'Precondition Failed', category: '4xx', description: strings.code412 || 'One or more conditions in the request headers evaluated to false on the server.' },
        { code: 413, name: 'Payload Too Large', category: '4xx', description: strings.code413 || 'The request body is larger than the server is willing or able to process.' },
        { code: 414, name: 'URI Too Long', category: '4xx', description: strings.code414 || 'The URL requested is longer than the server is willing to interpret.' },
        { code: 415, name: 'Unsupported Media Type', category: '4xx', description: strings.code415 || 'The media format of the request is not supported by the server.' },
        { code: 416, name: 'Range Not Satisfiable', category: '4xx', description: strings.code416 || 'The range specified in the Range header cannot be fulfilled by the server.' },
        { code: 417, name: 'Expectation Failed', category: '4xx', description: strings.code417 || 'The expectation indicated by the Expect request header cannot be met by the server.' },
        { code: 418, name: "I'm a Teapot", category: '4xx', description: strings.code418 || 'An April Fools\' joke from RFC 2324. The server refuses to brew coffee because it is a teapot.' },
        { code: 421, name: 'Misdirected Request', category: '4xx', description: strings.code421 || 'The request was directed at a server that is not able to produce a response.' },
        { code: 422, name: 'Unprocessable Entity', category: '4xx', description: strings.code422 || 'The request was well-formed but could not be processed due to semantic errors (validation failures).' },
        { code: 423, name: 'Locked', category: '4xx', description: strings.code423 || 'The resource being accessed is locked (WebDAV).' },
        { code: 424, name: 'Failed Dependency', category: '4xx', description: strings.code424 || 'The request failed because it depended on another request that failed (WebDAV).' },
        { code: 425, name: 'Too Early', category: '4xx', description: strings.code425 || 'The server is unwilling to risk processing a request that might be replayed (TLS early data).' },
        { code: 426, name: 'Upgrade Required', category: '4xx', description: strings.code426 || 'The server refuses the request using the current protocol but may accept it after a protocol upgrade.' },
        { code: 428, name: 'Precondition Required', category: '4xx', description: strings.code428 || 'The server requires the request to be conditional to prevent lost update conflicts.' },
        { code: 429, name: 'Too Many Requests', category: '4xx', description: strings.code429 || 'The user has sent too many requests in a given time period (rate limiting).' },
        { code: 431, name: 'Request Header Fields Too Large', category: '4xx', description: strings.code431 || 'The server refuses the request because the header fields are too large.' },
        { code: 451, name: 'Unavailable For Legal Reasons', category: '4xx', description: strings.code451 || 'The resource is unavailable due to legal demands (censorship, court order, etc.). Named after Fahrenheit 451.' },

        // 5xx Server Error
        { code: 500, name: 'Internal Server Error', category: '5xx', description: strings.code500 || 'A generic server error. Something went wrong on the server side that it couldn\'t handle.' },
        { code: 501, name: 'Not Implemented', category: '5xx', description: strings.code501 || 'The server does not support the functionality required to fulfill the request.' },
        { code: 502, name: 'Bad Gateway', category: '5xx', description: strings.code502 || 'The server acting as a gateway received an invalid response from the upstream server.' },
        { code: 503, name: 'Service Unavailable', category: '5xx', description: strings.code503 || 'The server is temporarily unable to handle the request (overloaded or down for maintenance).' },
        { code: 504, name: 'Gateway Timeout', category: '5xx', description: strings.code504 || 'The server acting as a gateway did not receive a timely response from the upstream server.' },
        { code: 505, name: 'HTTP Version Not Supported', category: '5xx', description: strings.code505 || 'The server does not support the HTTP version used in the request.' },
        { code: 506, name: 'Variant Also Negotiates', category: '5xx', description: strings.code506 || 'The server has an internal configuration error: transparent content negotiation results in a circular reference.' },
        { code: 507, name: 'Insufficient Storage', category: '5xx', description: strings.code507 || 'The server is unable to store the representation needed to complete the request (WebDAV).' },
        { code: 508, name: 'Loop Detected', category: '5xx', description: strings.code508 || 'The server detected an infinite loop while processing the request (WebDAV).' },
        { code: 510, name: 'Not Extended', category: '5xx', description: strings.code510 || 'Further extensions to the request are required for the server to fulfill it.' },
        { code: 511, name: 'Network Authentication Required', category: '5xx', description: strings.code511 || 'The client needs to authenticate to gain network access (e.g., captive portal).' }
    ];

    const categoryLabels = {
        '1xx': strings.cat1xx || '1xx — Informational',
        '2xx': strings.cat2xx || '2xx — Success',
        '3xx': strings.cat3xx || '3xx — Redirection',
        '4xx': strings.cat4xx || '4xx — Client Error',
        '5xx': strings.cat5xx || '5xx — Server Error',
    };

    const categoryColors = {
        '1xx': { badge: 'bg-blue-500/20 text-blue-400 border-blue-500/30', border: 'border-blue-500/20 hover:border-blue-500/40' },
        '2xx': { badge: 'bg-green-500/20 text-green-400 border-green-500/30', border: 'border-green-500/20 hover:border-green-500/40' },
        '3xx': { badge: 'bg-yellow-500/20 text-yellow-400 border-yellow-500/30', border: 'border-yellow-500/20 hover:border-yellow-500/40' },
        '4xx': { badge: 'bg-orange-500/20 text-orange-400 border-orange-500/30', border: 'border-orange-500/20 hover:border-orange-500/40' },
        '5xx': { badge: 'bg-red-500/20 text-red-400 border-red-500/30', border: 'border-red-500/20 hover:border-red-500/40' }
    };

    const searchInput = document.getElementById('search-input');
    const codesContainer = document.getElementById('codes-container');
    const resultCount = document.getElementById('result-count');
    const noResults = document.getElementById('no-results');
    const filterBtns = document.querySelectorAll('.filter-btn');

    let activeFilter = 'all';

    function renderCodes(filtered) {
        codesContainer.innerHTML = '';
        resultCount.textContent = filtered.length;

        if (filtered.length === 0) {
            noResults.classList.remove('hidden');
            return;
        }
        noResults.classList.add('hidden');

        let currentCategory = '';
        filtered.forEach(item => {
            if (item.category !== currentCategory) {
                currentCategory = item.category;
                const label = categoryLabels[currentCategory];
                const colors = categoryColors[currentCategory];
                const header = document.createElement('div');
                header.className = 'mt-4 first:mt-0 mb-2';
                header.innerHTML = `<span class="inline-block px-3 py-1 rounded-full text-xs font-semibold border ${colors.badge}">${label}</span>`;
                codesContainer.appendChild(header);
            }

            const colors = categoryColors[item.category];
            const row = document.createElement('div');
            row.className = `bg-darkBg rounded-lg p-4 border ${colors.border} transition-colors`;
            row.innerHTML = `
                <div class="flex flex-col sm:flex-row sm:items-center gap-2 sm:gap-4">
                    <div class="shrink-0">
                        <span class="inline-block px-3 py-1 rounded-md font-mono font-bold text-sm border ${colors.badge}">${item.code}</span>
                    </div>
                    <div class="flex-1 min-w-0">
                        <div class="text-light font-medium">${item.name}</div>
                        <div class="text-light-muted text-sm mt-1">${item.description}</div>
                    </div>
                </div>
            `;
            codesContainer.appendChild(row);
        });
    }

    function filter() {
        const query = searchInput.value.toLowerCase().trim();
        let filtered = codes;

        if (activeFilter !== 'all') {
            filtered = filtered.filter(c => c.category === activeFilter);
        }

        if (query) {
            filtered = filtered.filter(c =>
                String(c.code).includes(query) ||
                c.name.toLowerCase().includes(query) ||
                c.description.toLowerCase().includes(query)
            );
        }

        renderCodes(filtered);
    }

    searchInput.addEventListener('input', filter);

    filterBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            filterBtns.forEach(b => {
                b.classList.remove('active', 'text-gold', 'border-gold/50', 'bg-gold/10');
                b.classList.remove('text-blue-400', 'bg-blue-500/10', 'border-blue-500/50');
                b.classList.remove('text-green-400', 'bg-green-500/10', 'border-green-500/50');
                b.classList.remove('text-yellow-400', 'bg-yellow-500/10', 'border-yellow-500/50');
                b.classList.remove('text-orange-400', 'bg-orange-500/10', 'border-orange-500/50');
                b.classList.remove('text-red-400', 'bg-red-500/10', 'border-red-500/50');
            });

            const f = this.dataset.filter;
            activeFilter = f;

            const colorMap = {
                'all': ['text-gold', 'border-gold/50', 'bg-gold/10'],
                '1xx': ['text-blue-400', 'border-blue-500/50', 'bg-blue-500/10'],
                '2xx': ['text-green-400', 'border-green-500/50', 'bg-green-500/10'],
                '3xx': ['text-yellow-400', 'border-yellow-500/50', 'bg-yellow-500/10'],
                '4xx': ['text-orange-400', 'border-orange-500/50', 'bg-orange-500/10'],
                '5xx': ['text-red-400', 'border-red-500/50', 'bg-red-500/10']
            };

            filterBtns.forEach(b => {
                const bf = b.dataset.filter;
                const defaults = {
                    'all': ['border-gold/50', 'text-gold'],
                    '1xx': ['border-blue-500/30', 'text-blue-400'],
                    '2xx': ['border-green-500/30', 'text-green-400'],
                    '3xx': ['border-yellow-500/30', 'text-yellow-400'],
                    '4xx': ['border-orange-500/30', 'text-orange-400'],
                    '5xx': ['border-red-500/30', 'text-red-400']
                };
                defaults[bf].forEach(c => b.classList.add(c));
            });

            this.classList.add('active', ...colorMap[f]);

            filter();
        });
    });

    // Initial render
    renderCodes(codes);
})();
</script>
