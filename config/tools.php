<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Tools Ordering Mode
    |--------------------------------------------------------------------------
    |
    | Determines how tools are ordered on the public /tools page.
    | Options: 'manual' (by position field) or 'popularity' (by view count)
    |
    | This can be overridden via TOOLS_ORDER_BY environment variable.
    |
    */
    'order_by' => env('TOOLS_ORDER_BY', 'manual'),
];
