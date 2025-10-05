<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Printer Configuration
    |--------------------------------------------------------------------------
    |
    | Konfigurasi printer thermal untuk sistem POS
    |
    */

    'default' => env('PRINTER_TYPE', 'file'), // file, windows, network

    'printers' => [
        'file' => [
            'path' => storage_path('receipts'),
        ],

        'windows' => [
            'name' => env('PRINTER_NAME', 'POS-58'),
        ],

        'network' => [
            'ip' => env('PRINTER_IP', '192.168.1.100'),
            'port' => env('PRINTER_PORT', 9100),
        ],
    ],

    'receipt' => [
        'store_name' => env('STORE_NAME', 'POS KASIR'),
        'store_address' => env('STORE_ADDRESS', 'Jl. Contoh No. 123'),
        'store_phone' => env('STORE_PHONE', '(021) 1234567'),
        'footer_message' => env('RECEIPT_FOOTER', 'Terima Kasih Atas Kunjungan Anda'),
    ],
];
