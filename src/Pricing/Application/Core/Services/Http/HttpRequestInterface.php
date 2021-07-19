<?php

namespace Pricing\Application\Core\Services\Http;

use Throwable;

interface HttpRequestInterface
{
    /**
     * Execute GET request.
     * @param string $uri URI
     * @return HttpResponse|null
     * @throws Throwable
     */
    public function get(string $uri): ?HttpResponse;

    /**
     * Execute POST request.
     * @param string $uri URI
     * @param array|null $data data
     * @return HttpResponse|null
     * @throws Throwable
     */
    public function post(string $uri, ?array $data = []): ?HttpResponse;

    /**
     * Execute PUT request.
     * @param string $uri URI
     * @param array|null $data data
     * @return HttpResponse|null
     * @throws Throwable
     */
    public function put(string $uri, ?array $data = []): ?HttpResponse;

    /**
     * Execute DELETE request.
     * @param string $uri URI
     * @param array|null $data data
     * @return HttpResponse|null
     * @throws Throwable
     */
    public function delete(string $uri, ?array $data): ?HttpResponse;
}
