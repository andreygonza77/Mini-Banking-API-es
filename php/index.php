<?php
use Slim\Factory\AppFactory;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/controllers/TransactionsController.php';

$app = AppFactory::create();

$app->get('/test', function (Request $request, Response $response, array $args) {
    $response->getBody()->write("Test page");
    return $response;
});

$app->get('/hello/{name}', function (Request $request, Response $response, array $args) {
    $name = $args['name'];
    $response->getBody()->write("Hello, $name");
    return $response;
});
/*
GET /accounts/1/transactions per ottenere l'elenco dei movimenti
GET /accounts/1/transactions/5 per ottenere il dettaglio di un movimento
POST /accounts/1/deposits per registrare un deposito
POST /accounts/1/withdrawals per registrare un prelievo
PUT /accounts/1/transactions/5 per modificare la descrizione di un movimento
DELETE /accounts/1/transactions/5 per eliminare un movimento secondo la regola scelta
*/
$app->get('/accounts/{id}', "/transactions");

$app->run();
