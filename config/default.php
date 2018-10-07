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
            ],
            's3' => [
                // https://aws.amazon.com/fr/blogs/security/wheres-my-secret-access-key/
                'key' => getenv('AWS_ACCESS_KEY_ID') ?: '',
                'secret' => getenv('AWS_SECRET_ACCESS_KEY') ?: '',
                'region' => getenv('AWS_DEFAULT_REGION') ?: '', // http://docs.aws.amazon.com/general/latest/gr/rande.html
                'bucket' => getenv('AWS_BUCKET') ?: '',
                'url' => getenv('AWS_URL') ?: '',
            ]
        ]
    ];
