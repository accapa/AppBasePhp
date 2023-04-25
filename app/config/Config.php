<?php
/**
 * Variables de configuración del proyecto
 */

define("UPLOAD_TMP_DIR", (ini_get('upload_tmp_dir') ? ini_get('upload_tmp_dir') : sys_get_temp_dir()) . (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN' ? DIRECTORY_SEPARATOR : ""));
const LOGGER_LEVEL = "DEBUG"; //all, DEBUG, ERROR
const BD_CONFIG = [
    'driver' => 'mysql',
    'host' => 'localhost',
    'database' => 'nirespa',
    'username' => 'root',
    'password' => '',
    'charset' => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix' => '',
];
