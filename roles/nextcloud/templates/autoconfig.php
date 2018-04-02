<!-- {{ ansible_managed }} -->

<?php
$AUTOCONFIG = array (
  'dbtype' => 'pgsql',
  'dbname' => 'nextcloud',
  'dbhost' => 'localhost',
  'dbport' => '',
  'dbtableprefix' => 'nc_',
  'dbuser' => '{{ nextcloud.db_username }}',
  'dbpass' => '{{ nextcloud.db_password }}',
  'logtimezone' => 'UTC',
);
