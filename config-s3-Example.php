#Example file of configuration on NextCloud, You should to modify the trusted domains adding the remotes trusted address to install with an S3 as Main Storage.
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
  'passwordsalt' => 'JbV4J42/TuZs9EoLBAhs8Bx78/MgZ7',
  'secret' => '/849HrrzLpXucLD/R0Ey9qd7ni9TdYKN73oeUrhazSSdhakk',
  'trusted_domains' =>
  array (
    0 => '192.168.145.145:8080',
    1 => '192.168.145.145:9000',
    2 => '192.168.145.145:9001',
  ),
  'objectstore' => [
        'class' => '\\OC\\Files\\ObjectStore\\S3',
        'arguments' => [
                'bucket' => 'photobucket',
                'hostname' => '192.168.145.145',
                'key' => 'xNgKFximLspbtFZLhJrt',
                'secret' => 'DbZsziVc952hShStSCWT5sWrJVuK1INdp2eGOfKX',
                'port' => 9000,
                'use_path_style' => true,
				'use_ssl' => false,
        ],
],
  'dbtype' => 'mysql',
  'version' => '29.0.5.1',
  'overwrite.cli.url' => 'http://localhost',
  'dbname' => 'nextcloud',
  'dbhost' => 'db',
  'dbport' => '',
  'dbtableprefix' => 'oc_',
  'mysql.utf8mb4' => true,
  'dbuser' => 'nextcloud',
  'dbpassword' => 'Carlos',
  'installed' => true,
  'instanceid' => 'oc0v2xghyprh',
);

