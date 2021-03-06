<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default filesystem disk that should be used
    | by the framework. The "local" disk, as well as a variety of cloud
    | based disks are available to your application. Just store away!
    |
    */

    'default' => env('FILESYSTEM_DRIVER', 'local'),

    /*
    |--------------------------------------------------------------------------
    | Filesystem Disks
    |--------------------------------------------------------------------------
    |
    | Here you may configure as many filesystem "disks" as you wish, and you
    | may even configure multiple disks of the same driver. Defaults have
    | been setup for each driver as an example of the required options.
    |
    | Supported Drivers: "local", "ftp", "sftp", "s3"
    |
    */

    'disks' => [

        'local' => [
            'driver' => 'local',
            'root' => storage_path('app'),
        ],

        'admin_customers' => [
            'driver' => 'local',
            'root' => storage_path('app/public/admin/customers'),
            'url' => env('APP_URL') . '/assets/admin/customers',
            'visibility' => 'public',
        ],

        'admin_items' => [
            'driver' => 'local',
            'root' => storage_path('app/public/admin/items'),
            'url' => env('APP_URL') . '/assets/admin/items',
            'visibility' => 'public'
        ],

        'admin_item_thumbnail_latest' => [
            'driver' => 'local',
            'root' => storage_path('app/public/admin/items/thumbnail/latest'),
            'url' => env('APP_URL') . '/assets/admin/items/thumbnail/latest',
            'visibility' => 'public'
        ],

        'admin_item_thumbnail_ordering' => [
            'driver' => 'local',
            'root' => storage_path('app/public/admin/items/thumbnail/ordering'),
            'url' => env('APP_URL') . '/assets/admin/items/thumbnail/ordering',
            'visibility' => 'public'
        ],

        'public' => [
            'driver' => 'local',
            'root' => storage_path('app/public'),
            'url' => env('APP_URL') . '/storage',
            'visibility' => 'public',
        ],

        's3' => [
            'driver' => 's3',
            'key' => env('AWS_ACCESS_KEY_ID'),
            'secret' => env('AWS_SECRET_ACCESS_KEY'),
            'region' => env('AWS_DEFAULT_REGION'),
            'bucket' => env('AWS_BUCKET'),
            'url' => env('AWS_URL'),
            'endpoint' => env('AWS_ENDPOINT'),
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Symbolic Links
    |--------------------------------------------------------------------------
    |
    | Here you may configure the symbolic links that will be created when the
    | `storage:link` Artisan command is executed. The array keys should be
    | the locations of the links and the values should be their targets.
    |
    */

    'links' => [
        public_path('storage') => storage_path('app/public'),
        public_path('assets') => storage_path('app/public/assets')
    ],

];
