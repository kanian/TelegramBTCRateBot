<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        WEBHOOK_ROUTE
        //'/450338970AAEw6b2YUpUIUSr72Cf8fuSVeqPq76cbDRo/webhook'
    ];
}
