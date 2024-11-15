<?php
$CONFIG = array (
  'htaccess.RewriteBase' => '/',
  'memcache.local' => '\\OC\\Memcache\\APCu',
  'apps_paths' =>
  array (
    0 =>
    array (
      'path' => '/var/www/html/apps',
      'url' => '/apps',
      'writable' => false,
    ),
    1 =>
    array (
      'path' => '/var/www/html/custom_apps',
      'url' => '/custom_apps',
      'writable' => true,
    ),
  ),
  'upgrade.disable-web' => true,
  'passwordsalt' => 'X/jbNFldnOgLL6C4fA+/ifSt4NA1+g',
  'secret' => 'k4qeaJQDy23V3esK0fZQgllxuF3vdyNdhDzPsn61fEjOWSge',
  'trusted_domains' =>
  array (
    0 => 'localhost',
    1 => '192.168.145.145',
  ),

 'objectstore' => [
        'class' => '\\OC\\Files\\ObjectStore\\S3',
        'arguments' => [
                'bucket' => 'nextcloudbucket',
                'hostname' => '192.168.145.145',
                'key' => 'ArgJCTTeaqyhbPmwTcWQ',
                'secret' => 'u96KxoOfSoU1JopJszxpIaKW4kQxl9Nnm3lmorhr',
                'port' => 9000,
                'use_path_style' => true,
                'use_ssl' => false,
        ],
],
  'datadirectory' => '/var/www/html/data',
  'dbtype' => 'mysql',
  'version' => '29.0.6.1',
  'overwrite.cli.url' => 'http://localhost',
  'dbname' => 'nextcloud',
  'dbhost' => 'db',
  'dbport' => '',
  'dbtableprefix' => 'oc_',
  'mysql.utf8mb4' => true,
  'dbuser' => 'nextcloud',
  'dbpassword' => 'Carlos',
  'installed' => true,
  'instanceid' => 'ocwj70xiaj7m',
);
