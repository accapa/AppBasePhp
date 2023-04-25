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
        $factory = new ConnectionFactory($app);
        $conn = $factory->make(BD_CONFIG);
        $resolver = new ConnectionResolver();
        $resolver->addConnection('default', $conn);
        $resolver->setDefaultConnection('default');
        Model::setConnectionResolver($resolver);
        return $conn;
    }
}
