<?php
return [ //module id = 'user' only
  'class' => 'anda\user\Module',
  'loginBy' => 'db', //db or ldap
  'userUploadDir' => '@uploads', //real path
  'userUploadUrl' => '/uploads', //url path
  'userUploadPath' => 'user', //path after upload directory
  'admins' => ['admin', 'root'] //list username for manage users
];