<?php
return  [
        'class' => 'lajax\translatemanager\Module',
        'root' => '@app', 
        'scanRootParentDirectory' => true,
    
        'layout' => '@backend/views/layouts/main-translate',         // Name of the used layout. If using own layout use 'null'.
        'allowedIPs' => ['*'],
        'roles' => ['@'],               // For setting access levels to the translating interface.
        'tmpDir' => '@runtime', 
    
        'phpTranslators' => ['::t'],    // list of the php function for translating messages.
        'jsTranslators' => ['lajax.t'], // list of the js function for translating messages.
        //'patterns' => ['*.js', '*.php'],// list of file extensions that contain language elements.
        'ignoredCategories' => [
            'yii',
            'rbac-admin',
            //'kvexport',
            'kvtree',
            'kvbase',
            'kvdialog',
            'kvgrid',
            'language',
            'model',
            'array',
            'javascript',
        ], // these categories won't be included in the language database.
        //'ignoredItems' => ['config'],   // these files will not be processed.
        'scanTimeLimit' => null,        // increase to prevent "Maximum execution time" errors, if null the default max_execution_time will be used
        'searchEmptyCommand' => '!',    // the search string to enter in the 'Translation' search field to find not yet translated items, set to null to disable this feature
        //'defaultExportStatus' => 1,     // the default selection of languages to export, set to 0 to select all languages by default
        //'defaultExportFormat' => 'json',// the default format for export, can be 'json' or 'xml'  
        'tables' => [                   // Properties of individual tables
            [
                'connection' => 'db',   // connection identifier
                'table' => '{{%language}}',         // table name
                'columns' => ['name', 'name_ascii'],// names of multilingual fields
                'category' => 'database-table-name',// the category is the database table name
            ]
        ],
];