<?php

namespace App\Http\Controllers\Core;

use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function handle(): JsonResponse
    {
        $data = [
            'user' => [
                'name' => 'Batman da Silva Pereira',
                'email' => 'batman@dc.com',
                'google_id' => '1020304050'
            ],
            'token' => 'bee46906-924a-4645-bcd2-114dcc75cc02'
        ];


        return $this->responseToJsonSuccess($data);
    }
}
