<?php
use Slim\App;
use Slim\Http\Request;
use Slim\Http\Response;
return function (App $app) {
  $container = $app->getContainer();
  $app->get('/cadastro/', function (Request $request, Response $response, array $args) use ($container) {
    // Sample log message
    $container->get('logger')->info("Slim-Skeleton '/' route");
    // Render index view
    return $container->get('renderer')->render($response, 'index2.phtml', $args);
  });
  $app->post('/cadastro/', function (Request $request, Response $response, array $args) use ($container) {
    // Sample log message
    $container->get('logger')->info("Slim-Skeleton '/' route");
    $params = $request->getParsedBody();
    $modelo = $params['modelo'];
    $marca = $params['marca'];
    $ano = $params['ano'];
    $dono = $params['dono'];
    $conexao = $container->get('pdo');
        
        
        $result = $conexao->query('INSERT INTO carro (modelo, marca, ano, nome_dono) 
                                   VALUES ("'. $params['modelo'] .'",  "'. $params['marca'] .'",   "'.  $params['ano'] .'",   "'. $params['dono'] .'")');

       return $container->get('renderer')->render($response, 'index2.phtml', $args);
  });
};
