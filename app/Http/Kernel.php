<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * The application's route middleware.
     *
     * These middleware may be assigned to groups or used individually.
     *
     * @var array<string, class-string|string>
     */
    protected $routeMiddleware = [
        // ... other middlewares
        'siswa' => \App\Http\Middleware\SiswaMiddleware::class,
        'super_admin' => \App\Http\Middleware\SuperAdminMiddleware::class,
    ];
} 