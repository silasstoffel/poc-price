<?php

/** @var \Laravel\Lumen\Routing\Router $router */

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Facades\DB;

// Public routes
$router->get('/', function () {
    //$data = ['message' => 'Pricing is running! :D'];
    //return response()->json($data, 200);

    $client = new Client();
    try {
        $request = $client->request('GET', 'https://api.github.com/users/silasstoffel-faker');
    } catch (GuzzleHttp\Exception\ClientException $e) {
        if ($e->hasResponse()) {
            echo 'ClientException: ', $e->getResponse()->getBody();
        }
    } catch (GuzzleHttp\Exception\ServerException $e) {

    } catch (RequestException $e) {
        if ($e->hasResponse()) {
            echo 'RequestException: ',$e->getResponse()->getBody();
        }
    }
});

$router->get('/faker', function () {
    $faker = Faker\Factory::create();
    $inserts = [];
    for ($i = 0; $i < 5000; $i++) {
        $inserts[] = [
            'id' => $faker->uuid(),
            'name' => $faker->company,
            'description' => $faker->buildingNumber,
            'sku' => $faker->uuid(),
            'category_id' => $faker->buildingNumber,
            'price' => rand(1, 50000),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ];
    }
    DB::table('products')->insert($inserts);
});

$router->get('/products/take-1', 'ProductHub\LoadProductController@take1');

$router->get('/products/take-2', 'ProductHub\LoadProductController@take2');

$router->get('/ping', 'Core\PingController@handle');

// Login
$router->get('/login', 'Core\LoginController@handle');

// Protected routes
$v1 = ['prefix' => '/v1', 'middleware' => null];
$router->group($v1, function () use($router) {

    // Endpoint examples
    $router->group(['prefix' => '/endpoint'], function () use ($router) {
        $router->get('/', 'EndpointController@index');
        $router->get('/{id}', 'EndpointController@get');
        $router->post('/', 'EndpointController@store');
        $router->put('/{id}', 'EndpointController@update');
        $router->delete('/{id}', 'EndpointController@delete');
    });

});
