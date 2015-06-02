<?php
use Cake\Routing\Router;

Router::plugin('AuditLog', function ($routes) {
    $routes->fallbacks('InflectedRoute');
});
