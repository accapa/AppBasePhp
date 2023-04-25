<?php
/**
 * Created by IntelliJ IDEA.
 * User: accapa
 * Date: 12/02/2020
 * Time: 09:46 AM
 */

namespace App\Helpers;

use Logger;

final class Log4php
{
    /**
     * Log4php constructor.
     */
    public function __construct()
    {
    }

    public static function log(){
        Logger::configure(null, new Log4phpConf());
        return Logger::getRootLogger();
    }
}