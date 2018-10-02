<?php

    return [
        'storage' => [
            'default_adapter' => 'local',
            'local' => [ // Local Storage Adapter
                'path' => \UserFrosting\STORAGE_DIR // Default to `app/storage/`
            ],
            'google' => [ // Google Drive Adapter
                // See https://developers.google.com/drive/api/v3/enable-sdk
                'clientID' => getenv('GOOGLE_CLIENT_ID') ?: '', // [app client id].apps.googleusercontent.com
                'clientSecret' => getenv('GOOGLE_CLIENT_SECRET') ?: '',
                'refreshToken' => getenv('GOOGLE_REFRESH_TOKEN') ?: '',
                'rootPath' => getenv('GOOGLE_ROOT_PATH') ?: ''
            ]
        ]
    ];
