<?php

use Metarete\ComuniBundle\Controller\HelloController;
use Symfony\Component\Routing\Loader\Configurator\RoutingConfigurator;

/**
 * @link https://symfony.com/doc/current/bundles/best_practices.html#routing
 */
return static function (RoutingConfigurator $routes): void {
    $routes
        // ->add('metarete_comuni_hello_controller', 'test')
        //     ->controller(HelloController::class)
        //     ->methods(['GET'])
    ;
};
