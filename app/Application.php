<?php
namespace App;

use Illuminate\Container\Container;
use Illuminate\Support\Facades\Facade;
use Illuminate\Contracts\Container\BindingResolutionException;

class Application extends Container
{
    public $namespace = "";
    /**
     * Indicates if the class aliases have been registered.
     *
     * @var bool
     */
    protected static $aliasesRegistered = false;

    /**
     * Register the facades for the application.
     *
     * @param  bool  $aliases
     * @param  array  $userAliases
     * @return void
     */
    public function withFacades($aliases = true, $userAliases = [])
    {
        Facade::setFacadeApplication($this);
        if ($aliases) {
            $this->withAliases($userAliases);
        }
    }

    /**
     * Register the aliases for the application.
     *
     * @param  array  $userAliases
     * @return void
     */
    public function withAliases($userAliases = [])
    {
        $defaults = [
            'Illuminate\Support\Facades\DB' => 'DB'
        ];

        if (! static::$aliasesRegistered) {
            static::$aliasesRegistered = true;

            $merged = array_merge($defaults, $userAliases);

            foreach ($merged as $original => $alias) {
                class_alias($original, $alias);
            }
        }
    }

    /**
     * @throws BindingResolutionException
     */
    public function withEloquent()
    {
        return $this->make('db');
    }

    public function run(Request $request)
    {
        $tmp = $request->getControlador() . 'Controller';
        $metodo = $request->getMetodo();
        $args = $request->getArgs();
        $controllerName = $this->namespace . $tmp;

        if (class_exists($controllerName)) {
            $controller = new $controllerName;
            if (!is_callable([$controller, $metodo])) {
                $metodo = '__noFound';
            }
            if (isset($args)) {
                call_user_func_array([$controller, $metodo], $args);
            } else {
                call_user_func([$controller, $metodo]);
            }
        } else {
            throw new \Exception(utf8_encode("No se encontró el controlador: $controllerName"));
        }
    }
}
