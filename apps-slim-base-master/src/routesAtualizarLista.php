<?php
use Slim\App;
use Slim\Http\Request;
use Slim\Http\Response;
return function (App $app) {
  $container = $app->getContainer();
  $app->get('/atualizar/', function (Request $request, Response $response, array $args) use ($container) {
    // Sample log message
    $container->get('logger')->info("Slim-Skeleton '/' route");
    // Render index view
    return $container->get('renderer')->render($response, 'index4.phtml', $args);
  });
  $app->post('/atualizar/', function (Request $request, Response $response, array $args) use ($container) {
    // Sample log message
    $container->get('logger')->info("Slim-Skeleton '/' route");
    $params = $request->getParsedBody();
    $idCarro = $params["id"];
    $modelo = $params["modelo"];
    $marca = $params["marca"];
    $ano = $params["ano"];
    $nomeDono = $params["nome_dono"];
    
    $conexao = $container->get('pdo');

    $atualiza = mysql_query("UPDATE carro SET modelo = '$modelo', marca = '$ano', ano = '$nomeDono', nome_dono = '$url' 
                            WHERE id_carro = $idCarro");
       
       return $container->get('renderer')->render($response, 'index4.phtml', $args);





  });
  
};