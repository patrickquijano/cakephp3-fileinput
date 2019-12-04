<?php

use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;
use Cake\Routing\Route\DashedRoute;

Router::plugin('FileInput', ['path' => '/file-input'], function (RouteBuilder $routes) {
    $routes->fallbacks(DashedRoute::class);
});
