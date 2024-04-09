<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as BaseVerifier;

class VerifyCsrfToken extends BaseVerifier
{
    /**
     * Las URIs que deben estar excluidas de la verificación CSRF.
     *
     * @var array
     */
    protected $except = [
        '/*'
    ];
}
