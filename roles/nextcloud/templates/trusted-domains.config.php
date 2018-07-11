<?php
$CONFIG = array (
    'trusted_domains' => array (
      {% for domain in nextcloud.trusted_domains %}
      '{{ domain }}',
      {% endfor %}
    ),
  );
