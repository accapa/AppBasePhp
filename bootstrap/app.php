<?php
require_once __DIR__.'/../vendor/autoload.php';

$app = new App\Application(
);

$app->singleton('db', function ($app) {
    return \App\Eloquent::connection($app);
});
$app->withFacades();
$app->withEloquent();

$app->namespace = "App\\Controllers\\";

return $app;
