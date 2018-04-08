<!-- {{ ansible_managed }} -->

<?php
$AUTOCONFIG = array (
    'trusted_domains' => array (
        {% for domain in nextcloud_trusted_domains %}
        '{{ domain }}',
        {% endfor %}
    ),

    # Database
    'dbtype' => 'pgsql',
    'dbname' => 'nextcloud',
    'dbhost' => '{{ nextcloud_db_host }}',
    'dbport' => '',
    'dbtableprefix' => 'nc_',
    'dbuser' => '{{ nextcloud_db_username }}',
    'dbpass' => '{{ nextcloud_db_password }}',

    # User experience
    'token_auth_enforced' => true,
    'skeletondirectory' => '',

    # Proxy configuration
    'overwriteprotocol' => 'https',
    'htaccess.RewriteBase' => '/',

    # Logging
    'log_type' => 'syslog',
    'logtimezone' => 'UTC',
    'log_rotate_size' => 52428800,

    # Apps
    'appcodechecker' => true,

    # Memory cache
    'memcache.local' => '\OC\Memcache\APCu',
);
