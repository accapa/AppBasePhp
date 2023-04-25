<?php
/**
 * Created by IntelliJ IDEA.
 * User: accapa
 * Date: 14/02/2020
 * Time: 10:42 AM
 */

namespace App\Helpers;


class Log4phpConf implements \LoggerConfigurator
{
    public function configure(\LoggerHierarchy $hierarchy, $input = null) {

        // Use a different layout for the next appender
        $layout = new \LoggerLayoutPattern();
        $layout->setConversionPattern("%date{d/m/Y h:i:s} [%p] %c: %m (at %F line %L)%n");
        $layout->activateOptions();

        // Create an appender which logs to file
        $appFile = new \LoggerAppenderFile('app');
        $appFile->setFile(UPLOAD_TMP_DIR . "logs/app_log_" . date("Y-m-d") . ".log");
        $appFile->setAppend(true);
        $appFile->setLayout($layout);
        $appFile->setThreshold(LOGGER_LEVEL);
        $appFile->activateOptions();

        $root = $hierarchy->getRootLogger();
        $root->addAppender($appFile);
    }
}