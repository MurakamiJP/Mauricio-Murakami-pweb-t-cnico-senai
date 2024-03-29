<?php
use Slim\App;
use Slim\Http\Request;
use Slim\Http\Response;
return function (App $app) {
    $container = $app->getContainer();
    $app->get('/lista/', function (Request $request, Response $response, array $args) use ($container) {
        // Sample log message
        $container->get('logger')->info("Slim-Skeleton '/' route");
        $conexao = $container->get('pdo');

        $resultSet = $conexao->query('SELECT * FROM carro')->fetchAll();
        $args['carros'] = $resultSet;
        
        return $container->get('renderer')->render($response, 'index3.phtml', $args);
    });
};