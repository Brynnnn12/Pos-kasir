<?php

return
    [
        'layout' => function () {
            // Jika route adalah home (POS) atau transactions, gunakan layout landing
            if (request()->routeIs('home') || request()->routeIs('transactions.index')) {
                return 'components.layout.landing';
            }

            // Default layout untuk komponen lainnya
            return 'components.layout.dashboard';
        },
    ];
