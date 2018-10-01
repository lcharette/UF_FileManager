<?php

    return [
        'storage' => [
            'default_adapter' => 'local',
            'local' => [ // Local Storage Adapter
                'path' => \UserFrosting\STORAGE_DIR // Default to `app/storage/`
            ]
        ]
    ];
