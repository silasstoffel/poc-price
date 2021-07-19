<?php

namespace App\Http\Controllers\Core;

use App\Http\Controllers;
use Illuminate\Http\JsonResponse;

class PingController extends Controllers\Controller
{
    public function handle(): JsonResponse
    {
        $data = [
            'ping' => 'pong',
            'datetime' => date('Y-m-d\TH:i:s')
        ];

        return $this->responseToJsonError(null, 400, 'Fail');

        return $this->responseToJsonSuccess(
            data: $data,
            message: 'Ping request'
        );
    }
}
