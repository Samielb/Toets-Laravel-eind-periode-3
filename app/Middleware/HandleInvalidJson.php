<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\ValidationException;

class HandleInvalidJson
{
    public function handle($request, Closure $next)
    {
        try {
            return $next($request);
        } catch (ValidationException $e) {
            throw new HttpResponseException(response()->json([
                'errors' => $e->errors(),
            ], 422));
        }
    }
}