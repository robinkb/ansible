<?php
$CONFIG = array (
    'trusted_domains' => array (
      {% for domain in nextcloud_trusted_domains %}
      '{{ domain }}',
      {% endfor %}
    ),
  );
