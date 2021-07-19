<?php

namespace Pricing\Application\Core\Services\Http;

class HttpResponse
{
    private string $response;
    private int $httpCode;

    /**
     * @param ?string $response response
     * @param int $httpCode http status code. default 200
     */
    public function __construct(?string $response, int $httpCode = 200)
    {
        $this->response = $response;
        $this->httpCode = $httpCode;
    }

    /**
     * Get response
     * @return string|null
     */
    public function getResponse(): ?string
    {
        return $this->response;
    }

    /**
     * Get http status code
     * @return int
     */
    public function getHttpCode(): int
    {
        return $this->httpCode;
    }

}
