<?php

return new \Phalcon\Config(array(
    'phalconRest' => array(
        'controllersDir'    => __DIR__ . '/../controllers/',
        'modelsDir'         => __DIR__ . '/../../models/', // USE COMMON
        'viewsDir'          => __DIR__ . '/../../views/',
        'pluginsDir'        => __DIR__ . '/../../plugins/',
        'libraryDir'        => __DIR__ . '/../../library/',
        'cacheDir'          => __DIR__ . '/../../cache/',
        'configDir'         => __DIR__ . '/../config/',
        'exceptionsDir'     => __DIR__ . '/../exceptions/',
        'responsesDir'      => __DIR__ . '/../responses/',
        'routesDir'         => __DIR__ . '/../routes/',
        'baseUri'           => '/' // TODO BEWARE
    )
));