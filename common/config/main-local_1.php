<?php

return [
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            #server
//             'dsn' => 'mysql:host=mariadb;dbname=hrm_db',
//            'username' => 'root',
//            'password' => 'anda*121#',
            #client
           // 'dsn' => 'mysql:host=localhost;dbname=hrm_db_new',
            //'dsn' => 'mysql:host=localhost;dbname=hrm_db_20180913',
            //'dsn' => 'mysql:host=localhost;dbname=hrm_db_master1',
            'username' => 'root',
            'password' => 'mysql',
            ###
            'charset' => 'utf8',
            #Performance
            'enableSchemaCache' => true,
            'schemaCacheDuration' => 3600,
            'schemaCache' => 'cache',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
    ],
];
