<?php

namespace App;

use Illuminate\Container\Container;
use Illuminate\Database\Connectors\ConnectionFactory;
use Illuminate\Database\ConnectionResolver;
use Illuminate\Database\Eloquent\Model;

class Eloquent
{
    public static function connection(Container $app)
    {
        $config = [
            'driver' => 'mysql',
            'host' => 'localhost',
            'database' => 'nirespa',
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix' => '',
        ];
        $factory = new ConnectionFactory($app);
        $conn = $factory->make($config);
        $resolver = new ConnectionResolver();
        $resolver->addConnection('default', $conn);
        $resolver->setDefaultConnection('default');
        Model::setConnectionResolver($resolver);
        return $conn;
    }
}
