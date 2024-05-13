<?php
// using_inversion_of_control_pattern.php
include __DIR__ . '/vendor/autoload.php';
define('SQLITE_DB', __DIR__ . '/data/ioc.db');
use Laminas\ServiceManager\ServiceManager;
use Laminas\Db\Adapter\Adapter;
use Laminas\Db\TableGateway\TableGateway;
$container = new ServiceManager([
    'services' => [
        'db_config' => [
            'driver' => 'pdo_sqlite',
            'database' => SQLITE_DB,
        ],
    ],
    'factories' => [
        'db_adapter' => function ($container) {
            return new Adapter($container->get('db_config'));
        },
        'db_tablegateway' => function ($container) {
            return new TableGateway('status', $container->get('db_adapter'));
        },
    ],
]);
$table = $container->get('db_tablegateway');
$table->insert(['status' => 'OK', 'ticket_date' => date('Y-m-d H:i:s'), 'ticket_num' => bin2hex(random_bytes(8))]);
foreach ($table->select() as $row) echo implode("\t", $row->getArrayCopy()) . PHP_EOL;

// example output:
/*
1	OK	2023-12-04 02:18:32	9192d1b6a2fa527b
2	OK	2023-12-04 02:19:04	d50193b141f5c9cf
3	OK	2023-12-04 02:19:20	fba5d7751ce959ec
4	OK	2023-12-04 02:19:24	4604c4accc714012
*/

