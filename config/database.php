<?php

use Pixie\Connection;
use Pixie\QueryBuilder\QueryBuilderHandler;

$config = [
    'driver' => 'mysql',
    'host' => 'localhost',
    'database' => 'repositori',
    'username' => 'root',
    'password' => '',
    'charset' => 'utf8',
    'collation' => 'utf8_unicode_ci'
];

$connection = new Connection('mysql', $config);

return new QueryBuilderHandler($connection);
