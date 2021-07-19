<?php

/** @var \Laravel\Lumen\Routing\Router $router */

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

// Public routes
$router->get('/', function () {
    //$data = ['message' => 'Pricing is running! :D'];
    //return response()->json($data, 200);

    $client = new Client();
    try {
        $request = $client->request(
            'GET',
            'https://api.github.com/users/silasstoffel-faker'
        );
    } catch (GuzzleHttp\Exception\ClientException $e) {
        if ($e->hasResponse()) {
            echo 'ClientException: ', $e->getResponse()->getBody();
        }
    } catch (GuzzleHttp\Exception\ServerException $e) {
    } catch (RequestException $e) {
        if ($e->hasResponse()) {
            echo 'RequestException: ', $e->getResponse()->getBody();
        }
    }
});
$router->get('/ping', 'Core\PingController@handle');

// Login
$router->get('/login', 'Core\LoginController@handle');

// Protected routes
$v1 = ['prefix' => '/v1', 'middleware' => null];
$router->group($v1, function () use ($router) {
    $router->group(['prefix' => '/products'], function () use ($router) {
        $router->get('/', 'Core\ProductController@all');
        $router->post('/', 'Core\ProductController@store');
    });

    // Endpoint examples
    $router->group(['prefix' => '/endpoint'], function () use ($router) {
        $router->get('/', 'EndpointController@index');
        $router->get('/{id}', 'EndpointController@get');
        $router->post('/', 'EndpointController@store');
        $router->put('/{id}', 'EndpointController@update');
        $router->delete('/{id}', 'EndpointController@delete');
    });
});
