<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Closure;
use Illuminate\Support\Facades\Log;

class AfterMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $path = $request->path();
        Log::info(
            'Inicio', [
                'start' => microtime(true),
                'path' => $path,
                'pid' => getmypid()
            ]
        );
        return $next($request);
    }

    public function terminate(Request $request, $response)
    {
        $path = $request->path();
        Log::info(
            'Termino', [
                'finish' => microtime(true),
                'path' => $path,
                'pid' => getmypid()
            ]
        );
    }
}
