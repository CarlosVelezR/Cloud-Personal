#Example file of configuration on NextCloud, You should to modify the trusted domains adding the remotes trusted address to install.
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
  ),
  'datadirectory' => '/var/www/html/data',
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
