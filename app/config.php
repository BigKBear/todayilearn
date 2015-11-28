<?php 
$global_config['db.options'] = array(
        "driver"    => "pdo_mysql",
        "host"      => "localhost",
        "dbname"    => "til_dev",
        "user"      => "aceakh",
        "password"  => "",
        "charset"   => "utf8mb4",
);

// proposed config for dev
$global_config['dbs.options'] = array (
        'development' => array(
                'driver'    => 'pdo_mysql',
                'host'      => 'localhost',
                'dbname'    => 'til_dev',
                'user'      => 'aceakh',
                'password'  => '',
                'charset'   => 'utf8mb4',
        ),
        'testing' => array(
                'driver'    => 'pdo_mysql',
                'host'      => 'localhost',
                'dbname'    => 'til_test',
                'user'      => 'aceakh',
                'password'  => '',
                'charset'   => 'utf8mb4',
        ),
        'production' => array(
                'driver'    => 'pdo_mysql',
                'host'      => 'localhost',
                'dbname'    => 'til_live',
                'user'      => 'aceakh',
                'password'  => '',
                'charset'   => 'utf8mb4',
        )
);
// echo "<pre>";
// var_dump($global_config);
// echo "</pre>";
// return $global_config;
