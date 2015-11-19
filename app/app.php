<?php 
// /app/app.php
require_once __DIR__.'/bootstrap.php';

use Symfony\Component\HttpFoundation\Response;

$app = new Silex\Application();
$app['debug'] = true;
$app['autoloader']->registerNamespace('TIL', __DIR__.'/../src');
$app->register(new Silex\Provider\DoctrineServiceProvider(), array(
    'db.options' => array (
        'driver'    => 'pdo_mysql',
        'host'      => getenv('IP'),
        'dbname'    => 'til_dev',
        'user'      => getenv('PHINX_DBUSER'),
        'password'  => getenv('PHINX_DBPASS'),
        'charset'   => 'utf8mb4',
    ),
));

$app->get('/hello/{name}', function($name) use($app) { 
    return new Response('Hello '.$app->escape($name)); 
});

$app->get('/post/{id}', function ($id) use ($app) {
    $sql = "SELECT * FROM posts WHERE id = ?";
    $post = $app['db']->fetchAssoc($sql, array((int) $id));

    return  "<p>{$post['post']}</p>".
            "<p>{$post['username']}</p>";
});

$app->get('/posts', function ($id) use ($app) {
    $sql = "SELECT * FROM posts";
    $posts = $app['db']->fetchAssoc($sql, array((int) $id));

    
    return  "<p>{$post['post']}</p>".
            "<p>{$post['username']}</p>";
});

return $app;
