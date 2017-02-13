<?php
date_default_timezone_set('UTC');

$define = [];

$define['users'] = [
    'id' => 1,
    'name' => 'User Name',
    'created_at' => date(DATE_RFC2822),
    'updated_at' => date(DATE_RFC2822),
];

return $define;
