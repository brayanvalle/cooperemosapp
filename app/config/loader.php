<?php

$loader = new \Phalcon\Loader();


$loader->registerFiles([ $config->application->libraryDir . '/vendor/autoload.php']);

$loader->registerDirs(
    [
        $config->application->controllersDir,
        $config->application->modelsDir,
        $config->application->servicesDir
    ]
)->register();

