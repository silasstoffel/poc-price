<?php

namespace Pricing\Infra\Http\Core\Services;

use DomainException;
use GuzzleHttp\Exception\RequestException;
use Pricing\Application\Core\Services\Http\HttpRequestInterface;
use Pricing\Application\Core\Services\Http\HttpResponse;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use Throwable;

class GuzzleHttpRequest implements HttpRequestInterface
{
    private Client $client;

    public function __construct(array $clientOptions = [])
    {
        $this->client = new Client($clientOptions);
    }

    /**
     * @inheritDoc
     */
    public function get(string $uri): ?HttpResponse
    {
        $request = new Request('GET', $uri);
        return $this->execute($request);
    }

    /**
     * @inheritDoc
     */
    public function post(string $uri, ?array $data = []): ?HttpResponse
    {
        // TODO: Implement post() method.
    }

    /**
     * @inheritDoc
     */
    public function put(string $uri, ?array $data = []): ?HttpResponse
    {
        // TODO: Implement put() method.
    }

    /**
     * @inheritDoc
     */
    public function delete(string $uri, ?array $data): ?HttpResponse
    {
        // TODO: Implement delete() method.
    }

    private function execute(Request $request): ?HttpResponse
    {
        try {
            $response = $this->client->send($request);
            return new HttpResponse(
                $response->getBody()->getContents(),
                $response->getStatusCode()
            );
        } catch (RequestException $exc) {
             throw new DomainException();
        }
    }
}
