<?php

/**
 * Collections let us define groups of routes that will all use the same controller.
 * We can also set the handler to be lazy loaded.  Collections can share a common prefix.
 * @var $exampleCollection
 */

// This is an Immeidately Invoked Function in php.  The return value of the
// anonymous function will be returned to any file that "includes" it.
// e.g. $config = include('config.php');
return call_user_func(function(){

    $rootConfig = new \Phalcon\Config(array(
        'database' => array(
            'adapter'     => 'sqlite',
            'host'        => 'localhost',
            'username'    => 'root',
//            'password'    => '',
            'dbname'      => __DIR__ . '/../../data/database.sqlite',
        ),
        'application' => array(
            'controllersDir'    => __DIR__ . '/../../app/controllers/',
            'modelsDir'         => __DIR__ . '/../../app/models/',
            'viewsDir'          => __DIR__ . '/../../app/views/',
            'pluginsDir'        => __DIR__ . '/../../app/plugins/',
            'libraryDir'        => __DIR__ . '/../../app/library/',
            'cacheDir'          => __DIR__ . '/../../app/cache/',
            'configDir'         => __DIR__ . '/../../app/config/',
            'exceptionsDir'     => __DIR__ . '/../../app/exceptions/',
            'responsesDir'      => __DIR__ . '/../../app/responses/',
            'baseUri'           => '/', // TODO BEWARE
        )
    ));

    // for module --> bad design, but we don't build multi module application .. yet.
    $phalconRestModuleConfig = include(__DIR__ . '/../../app/phalconRest/config/config.php');
    $rootConfig->merge($phalconRestModuleConfig);

    return $rootConfig;
});