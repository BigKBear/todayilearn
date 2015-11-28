<?php 
// /app/app.php
require_once __DIR__.'/bootstrap.php';

use Symfony\Component\HttpFoundation\Response;
use Dflydev\Provider\DoctrineOrm\DoctrineOrmServiceProvider;
use Silex\Application;
use Silex\Provider\DoctrineServiceProvider;

$app = new Application;
$app['debug'] = true;
$app['config'] = $global_config;

$app->register(new DoctrineServiceProvider, array(
    $global_config["dbs"]["development"],
));

$app->register(new DoctrineOrmServiceProvider, array(
    //"orm.proxies_dir" => "/path/to/proxies",
    "orm.em.options" => array(
        "mappings" => array(
            // Using actual filesystem paths
            array(
                "type" => "annotation",
                "namespace" => "TIL\Entity",
                "path" => __DIR__."/src/TIL/Entities",
            )
        ),
    ),
));

$app['post_repository'] = new TIL\Repository\PostRepository();

$app->get('/{name}', function($name) use($app) { 
    return new Response("Hello, {$name}!"); 
});

$app->mount('/posts',new TIL\Controllers\PostControllerProvider());

return $app;